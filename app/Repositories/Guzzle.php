<?php

namespace App\Repositories;

use GuzzleHttp\Client;

class Guzzle
{
    protected $client;
    public function __construct( Client $client)
    {
        $this->client = $client;
    }
    protected function get($url)
    {
        $response =$this->client->request('GET', $url);
        return json_decode($response->getBody()->getContents(),true);
    }
}