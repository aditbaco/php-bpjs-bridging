<?php

namespace BpjsBridging;

use Carbon\Carbon;
use GuzzleHttp\Client;

class Bridge
{
    private $client;
    private $config;

    public function __construct(Config $configuration)
    {
        $this->client = new Client();
        $this->config = $configuration;
    }

    protected function baseUrl()
    {
        return $this->config->getUrl();
    }

    private function url()
    {
        return rtrim($this->baseUrl(), "/");
    }

    public function get($url)
    {
        $requestTime = Carbon::now()->setTimezone('UTC')->unix();
        $response = $this->client->request('GET', $this->url() . $url, [
            'headers' => $this->headerData($requestTime)
        ]);
        return $this->parseResult($requestTime, $response);
    }

    private function dataRequest($type, $url, $data) {
        $requestTime = Carbon::now()->setTimezone('UTC')->unix();
        $response = $this->client->request($type, $this->url() . $url, [
            'headers' => $this->headerData($requestTime),
            'json' => $data
        ]);
        return $this->parseResult($requestTime, $response);
    }

    public function post($url, $data)
    {
        return $this->dataRequest('POST', $url, $data);
    }

    public function put($url, $data)
    {
        return $this->dataRequest('PUT', $url, $data);
    }

    public function delete($url, $data)
    {
        return $this->dataRequest('DELETE', $url, $data);
    }

    protected function parseResult($requestTime, $response)
    {
        $status = $response->getStatusCode();
        $body = $response->getBody()->getContents();
        if (!json_decode($body)) {
            return (object) [
                'status' => $status,
                'body' => $body,
                'metadata' => null,
            ];
        }
        $body = json_decode($body);
        $metadata = null;
        if (isset($body->metadata)) {
            $metadata = $body->metadata;
        }
        if (isset($body->metaData)) {
            $metadata = $body->metaData;
        }
        if (!property_exists($body, 'response')) {
            return (object) [
                'status' => $status,
                'body' => null,
                'metadata' => $metadata
            ];
        }
        $result = $body->response;
        if (json_decode($result) != null) {
            return (object) [
                'status' => $status,
                'body' => $result,
                'metadata' => $metadata
            ];
        }
        $body = $this->decryptResult($requestTime, $result);
        if (json_decode($body) === null) {
            return (object) [
                'status' => $status,
                'body' => $body,
                'metadata' => $metadata
            ];
        }
        return (object) [
            'status' => $status,
            'body' => json_decode($body),
            'metadata' => $metadata
        ];
    }

    protected function headerData($requestTime)
    {
        $signature = base64_encode(hash_hmac('sha256', $this->config->getConsumerId() . "&" . $requestTime, $this->config->getConsumerSecret(), true));
        $data = [
            'x-cons-id' => $this->config->getConsumerId(),
            'user_key' => $this->config->getUserKey(),
            'x-timestamp' => $requestTime,
            'x-signature' => $signature,
        ];
        if ($this->config->isPCare()) {
            $data['x-authorization'] = 'Basic ' . $this->config->pCareAuth();
        }
        return $data;
    }

    protected function decryptResult($requestTime, $r)
    {
        $key = $this->config->getConsumerId() . $this->config->getConsumerSecret() . ($requestTime);
        $encrypt_method = 'AES-256-CBC';
        $key_hash = hex2bin(hash('sha256', $key));
        $iv = substr(hex2bin(hash('sha256', $key)), 0, 16);
        $output = openssl_decrypt(base64_decode($r), $encrypt_method, $key_hash, OPENSSL_RAW_DATA, $iv);
        return \LZCompressor\LZString::decompressFromEncodedURIComponent($output);
    }
}
