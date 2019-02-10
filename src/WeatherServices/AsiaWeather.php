<?php

namespace Weather\WeatherServices;

use GuzzleHttp\Client;
use Weather\AsiaWeatherResponse;

class AsiaWeather
{
    private const URL = 'https://www.metaweather.com/api/location/';

    private $locations = [
        'busan' => 1132447,
        'beijing' => 2151330
    ];

    private $client;

    public function __construct($client)
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

    public function get(string $city): AsiaWeatherResponse
    {
        if (!array_key_exists($city, $this->locations)) {
            throw new \Exception('wrong city name');
        }

        $url = self::URL . $this->locations[$city];
        $data = $this->client->get($url);
        $dataArray = json_decode($data->getBody()->getContents(), true);

        return AsiaWeatherResponse::createFrom($dataArray);
    }
}
