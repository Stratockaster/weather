<?php

namespace Weather\Responses;

class EuroWeatherResponse implements Response
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