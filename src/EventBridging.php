<?php

namespace BpjsBridging;

class EventBridging {
    public $method;
    public $url;
    public $headers;
    public $requestData;
    public $response;
    public $executionTime;
    public $startAt;
    public $endAt;

    public function __construct($method, $url, $headers, $requestData, $response, $executionTime, $startAt, $endAt) {
        $this->method = $method;
        $this->url = $url;
        $this->headers = $headers;
        $this->requestData = $requestData;
        $this->response = $response;
        $this->executionTime = $executionTime;
        $this->startAt = $startAt;
        $this->endAt = $endAt;
    }

    public function __toString() {
        return json_encode([
            'method' => $this->method,
            'url' => $this->url,
            'headers' => $this->headers,
            'requestData' => $this->requestData,
            'response' => $this->response,
            'executionTime' => $this->executionTime,
            'startAt' => $this->startAt,
            'endAt' => $this->endAt
        ]);
    }

    public static function create($method, $url, $headers, $requestData, $response, $executionTime, $startAt, $endAt) {
        return new EventBridging($method, $url, $headers, $requestData, $response, $executionTime, $startAt, $endAt);
    }
}
