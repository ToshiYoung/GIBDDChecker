<?php

namespace TY\CarChecker\Gibdd;

use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Exception\GuzzleException;
use TY\CarChecker\Exceptions\ResponseException;

class Api {
    protected string $base_uri = 'https://xn--b1afk4ade.xn--90adear.xn--p1ai/';
    protected string $api_point = '/proxy/check/auto/';
    protected int $timeout = 10;
    protected string $method;

    protected HttpClient $client;

    public function __construct(protected array $data)
    {
        $this->client = new HttpClient([
            'base_uri' => $this->base_uri,
            'timeout' => $this->timeout,
            'connect_timeout' => $this->timeout,
        ]);
    }

    /**
     * @throws ResponseException
     * @throws GuzzleException
     */
    public function request($method): array
    {
        $base = [
            'checkType' => $method
        ];

        $params = http_build_query(array_merge($base, array_filter($this->data)));

        try {
            $response = $this->client->post($this->api_point.$this->method.'?'.$params, [
                'headers' => $this->generateHeaders()
            ]);

            return json_decode((string)$response->getBody(), true);
        } catch (\Exception $exception) {
            throw ResponseException::connectionError($exception);
        }
    }

    private function generateHeaders(): array
    {
        return [
            'Accept'     => 'application/json',
            'User-Agent' => 'Runtime',
            'registerToken' => sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            mt_rand(0, 0xffff), mt_rand(0, 0xffff),
                    mt_rand(0, 0xffff),
                    mt_rand(0, 0x0fff) | 0x4000,
                    mt_rand(0, 0x3fff) | 0x8000,
                    mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
            )
        ];
    }
}