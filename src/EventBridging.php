<?php

namespace BpjsBridging;

class EventBridging {
    public $method;
    public $url;
    public $headers;
    public $requestData;
    public $result;
    public $executionTime;
    public $startAt;
    public $endAt;

    public function __construct($method, $url, $headers, $requestData, $result, $executionTime, $startAt, $endAt) {
        $this->method = $method;
        $this->url = $url;
        $this->headers = $headers;
        $this->requestData = $requestData;
        $this->result = $result;
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
            'result' => $this->result,
            'executionTime' => $this->executionTime,
            'startAt' => $this->startAt,
            'endAt' => $this->endAt
        ]);
    }

    public static function create($method, $url, $headers, $requestData, $result, $executionTime, $startAt, $endAt) {
        return new EventBridging($method, $url, $headers, $requestData, $result, $executionTime, $startAt, $endAt);
    }
}
