<?php

namespace Weather;

use Weather\Responses\Response;
use Weather\WeatherServices\WeatherService;

class Weather
{
    private $service;

    public function __construct(WeatherService $service)
    {
        $this->service = $service;
    }

    public function get(string $city): Response
    {
        $city = mb_strtolower($city);

        return $this->service->get($city);
    }
}
