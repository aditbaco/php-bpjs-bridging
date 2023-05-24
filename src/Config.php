<?php

namespace BpjsBridging;

class Config {
    private $url;
    private $consumer_id;
    private $consumer_secret;
    private $user_key;

    public function __construct($url = null, $consumer_id = null, $consumer_secret = null, $user_key = null)
    {
        $this->url = $url ?: env('BPJS_URL');
        $this->consumer_id = $consumer_id ?: env('BPJS_CONSUMER_ID');
        $this->consumer_secret = $consumer_secret ?: env('BPJS_CONSUMER_SECRET');
        $this->user_key = $user_key ?: env('BPJS_USER_KEY');
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function getConsumerId()
    {
        return $this->consumer_id;
    }

    public function getConsumerSecret()
    {
        return $this->consumer_secret;
    }

    public function getUserKey()
    {
        return $this->user_key;
    }

    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    public function setUserKey($user_key)
    {
        $this->user_key = $user_key;
        return $this;
    }

    public function setConsumerId($consumer_id)
    {
        $this->consumer_id = $consumer_id;
        return $this;
    }

    public function setConsumerSecret($consumer_secret)
    {
        $this->consumer_secret = $consumer_secret;
        return $this;
    }
}
