<?php

namespace Zuwinda\Services;

use Zuwinda\Http\GuzzleClient as Http;

class Instances {
    protected $params;
    protected $to;
    protected $content;
    protected $http;
    
    public function __construct(string $token, Http $http)
    {
        $this->baseUrl = 'https://api.zuwinda.com';
        $this->token = $token;
        $this->to;
        $this->content;
        $this->http = $http;
    }

    public function setParams($params)
    {
        $this->params = $params;
        return $this;
    }

    public function setTo($to)
    {
        $this->to = $to;
        return $this;
    }

    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    public function send()
    {
        return $this->http->request('POST', $this->baseUrl, [
            'to' => $this->to,
            'content' => $this->content
        ], [], [
            'x-access-key' => $this->token,
            'Accept' => 'application/json'
        ]);
    }
}