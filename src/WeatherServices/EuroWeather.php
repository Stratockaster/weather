<?php

namespace Weather\WeatherServices;

use Weather\Responses\EuroWeatherResponse;
use Weather\Responses\Response;

class EuroWeather extends AbstractWeather implements WeatherService
{
    private const URL = 'https://www.metaweather.com/api/location/';

    private $locations = [
        'london' => 44418,
        'berlin' => 638242
    ];

    public function get(string $city): Response
    {
        if (!array_key_exists($city, $this->locations)) {
            throw new \Exception('wrong city name');
        }

        $url = self::URL . $this->locations[$city];
        $data = $this->client->get($url);
        $dataArray = json_decode($data->getBody()->getContents(), true);
        $minTemp = $dataArray['consolidated_weather'][0]['min_temp'];
        $maxTemp = $dataArray['consolidated_weather'][0]['max_temp'];
        $temperature = ($minTemp + $maxTemp) / 2;

        return new EuroWeatherResponse($temperature);
    }
}
