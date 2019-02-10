<?php

namespace Weather\WeatherServices;

class WeatherServiceFactory
{
    private static $servicesMap = [
        'euroweather' => EuroWeather::class,
        'asiaweather' => AsiaWeather::class,
    ];

    public static function create($serviceName, $client = null)
    {
        $serviceName = mb_strtolower($serviceName);

        if (!array_key_exists($serviceName, self::$servicesMap)) {
            throw new \Exception('Wrong service name. Use "euroweather" or "asiaweather"');
        }

        return new self::$servicesMap[$serviceName]($client);
    }
}
