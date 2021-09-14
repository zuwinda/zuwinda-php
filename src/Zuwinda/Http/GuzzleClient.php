<?php

namespace Zuwinda\Http;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
class GuzzleClient {
    
    private $client;

    public function __construct(Client $client)
    {
        $this->http = $client;
    }

    public function request(string $method, string $url, array $payload, array $params, array $headers, int $timeout = 300) 
    {
        try {
            $options = [
                'timeout' => 300,
                'json' => $payload
            ];
            if ($params) {
                $options['query'] = $params;
            }
            $response = $this->http->request($method, $url, $headers, $options);
        } catch (BadResponseException $exception) {
            $response = $exception->getResponse();
        }
        return $response;
    }
}