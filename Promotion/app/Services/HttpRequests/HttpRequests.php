<?php

namespace App\Services\HttpRequests;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

abstract class HttpRequests
{
    protected $client;
    private   $base_url;

    const HEADERS = [
        'Accept'       => 'application/json',
        'Content-Type' => 'application/json',
    ];

    protected static function get(string $url, $params = [], $assoc = false)
    {
        try {
            $response = (new Client)->request('GET', $url, [
                'headers' => self::HEADERS,
                'query'   => $params,
            ]);

            return json_decode($response->getBody()->getContents(), $assoc);
        } catch (RequestException $e) {
            \Log::error($e);

            return [
                'success' => false,
                'message' => 'invalid data',
            ];
        }
    }

    protected static function post(string $url, $body = [], $assoc = false)
    {
        try {
            $response = (new Client)->request('POST', $url, [
                'headers' => self::HEADERS,
                'body'    => json_encode($body),
            ]);

            return json_decode($response->getBody()->getContents(), $assoc);
        } catch (RequestException $e) {
            \Log::info($e);

            return [
                'success' => false,
                'message' => 'invalid data',
            ];
        }
    }

    protected static function getData(string $index, $results)
    {
        return json_decode($results[$index]['value']->getBody()->getContents())->data;
    }
}
