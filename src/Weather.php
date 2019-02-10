<?php

namespace Weather;

use Weather\WeatherServices\EuroWeather;
use Weather\WeatherServices\AsiaWeather;

class Weather
{
    private $servicesMap = [
        'euroweather' => EuroWeather::class,
        'asiaweather' => AsiaWeather::class,
    ];

    public function get(string $serviceName, string $city, $client = null): Response
    {
        $city = mb_strtolower($city);
        $serviceName = mb_strtolower($serviceName);

        $weatherService = $this->createService($serviceName, $client);

        return $weatherService->get($city);
    }

    private function createService(string $serviceName, $client = null)
    {
        if (!array_key_exists($serviceName, $this->servicesMap)) {
            throw new \Exception('Wrong service name. Use "euroweather" or "asiaweather"');
        }

        return new $this->servicesMap[$serviceName]($client);
    }
}
