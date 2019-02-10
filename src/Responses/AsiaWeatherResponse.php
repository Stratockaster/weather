<?php

namespace Weather\Responses;

class AsiaWeatherResponse implements Response
{
    private $temperature;

    public function __construct($temperature)
    {
        $this->temperature = $temperature;
    }

    public function getTemperature()
    {
        return $this->temperature;
    }
}