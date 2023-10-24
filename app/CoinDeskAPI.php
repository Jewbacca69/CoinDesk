<?php

namespace CoinDesk;

use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Component\HttpClient\HttpClient;

class CoinDeskAPI
{
    private const API_URL = "https://api.coindesk.com/v1/bpi/currentprice.json";
    private HttpClientInterface $client;

    public function __construct()
    {
        $this->client = HttpClient::create();
    }

    public function fetchData(): object
    {
        $response = $this->client->request('GET', self::API_URL)->getContent();
        return json_decode($response);
    }
}
