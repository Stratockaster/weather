<?php

namespace Weather\WeatherServices;

use GuzzleHttp\Client;

abstract class AbstractWeather
{
    protected $client;

    public function __construct($client = null)
    {
        if ($client) {
            $this->client = $client;
        } else {
            $defaultConfig = [
                'timeout' => 2.0,
            ];
            $this->client = new Client($defaultConfig);
        }
    }
}
