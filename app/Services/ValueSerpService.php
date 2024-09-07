<?php

namespace App\Services;

use GuzzleHttp\Client;

class ValueSerpService
{
    protected $client;
    protected $apiKey;

    public function __construct()
    {
        $this->client = new Client();
        $this->apiKey = env('VALUE_SERP_API_KEY');
    }

    public function search($query)
    {
        $query = "pizza";
        $response = $this->client->get('https://api.valueserp.com/search', [
            'query' => [
                'q' => $query,
                'api_key' => $this->apiKey
            ]
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }
}
