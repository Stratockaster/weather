<?php

namespace Weather;

class EuroWeatherResponse implements Response
{
    private $temperature;

    public static function createFrom($dataArray)
    {
        $minTemp = $dataArray['consolidated_weather'][0]['min_temp'];
        $maxTemp = $dataArray['consolidated_weather'][0]['max_temp'];

        $response = new self();
        $response->temperature = ($minTemp + $maxTemp) / 2;

        return $response;
    }

    public function getTemperature()
    {
        return $this->temperature;
    }
}