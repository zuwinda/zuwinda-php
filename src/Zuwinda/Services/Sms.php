<?php

namespace Zuwinda\Services;

use Zuwinda\Http\GuzzleClient;

class Sms
{

    protected $baseUrl, $endpoint, $token, $method, $headers, $data, $params;

    public function __construct(string $token)
    {
        $this->baseUrl = 'https://api.zuwinda.com/v1.2/message/';
        $this->token = $token;
    }

    public function buildSend($to, $content, $premium = true)
    {
        $this->method = 'post';
        $this->endpoint = 'sms/send-text';
        $this->headers = [
            'x-access-key' => $this->token
        ];
        $this->data = [
            'to' => $to,
            'content' => $content,
            'premium' => $premium
        ];
        return $this;
    }

    public function buildGet($page = null, $perPage = null, $from = null, $to = null)
    {
        $this->method = 'get';
        $this->endpoint = 'sms';
        $this->headers = [
            'x-access-key' => $this->token
        ];
        $this->params = [
            'page' => $page,
            'perPage' => $perPage,
            'from' => $from,
            'to' => $to
        ];
        return $this;
    }

    public function send(GuzzleClient $client)
    {
        $client->request($this->method, $this->baseUrl . $this->endpoint, $this->data, $this->params, $this->headers);
    }

    public function get(GuzzleClient $client)
    {
        $client->request($this->method, $this->baseUrl . $this->endpoint, $this->data, $this->params, $this->headers);
    }
}
