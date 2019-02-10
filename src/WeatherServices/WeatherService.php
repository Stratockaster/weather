<?php

namespace Weather\WeatherServices;

use Weather\Responses\Response;

interface WeatherService
{
    public function get(string $city): Response;
}