<?php

namespace Weather;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use PHPUnit\Framework\TestCase;

class WeatherTest extends TestCase
{
    public function testGetWeather()
    {
        $weather = new Weather();

        $json = '{"consolidated_weather":[{"id":4865274155106304,"weather_state_name":"Light Rain","weather_state_abbr":"lr","wind_direction_compass":"WNW","created":"2019-02-10T10:49:02.838570Z","applicable_date":"2019-02-10","min_temp":3.8200000000000003,"max_temp":6.6933333333333325,"the_temp":6.215,"wind_speed":10.264222896997534,"wind_direction":295.12328750779085,"air_pressure":995.775,"humidity":80,"visibility":8.056698878549273,"predictability":75},{"id":6357723750858752,"weather_state_name":"Light Cloud","weather_state_abbr":"lc","wind_direction_compass":"NW","created":"2019-02-10T10:49:03.184809Z","applicable_date":"2019-02-11","min_temp":1.7833333333333332,"max_temp":8.896666666666667,"the_temp":8.05,"wind_speed":5.213217861091227,"wind_direction":318.7482120120107,"air_pressure":1027.9,"humidity":75,"visibility":10.728905690765927,"predictability":70},{"id":5069251882778624,"weather_state_name":"Heavy Cloud","weather_state_abbr":"hc","wind_direction_compass":"SW","created":"2019-02-10T10:49:02.944371Z","applicable_date":"2019-02-12","min_temp":3.296666666666667,"max_temp":11.6,"the_temp":10.51,"wind_speed":6.923522050509027,"wind_direction":224.5032057226068,"air_pressure":1034.4099999999999,"humidity":77,"visibility":11.863218802195181,"predictability":71},{"id":5340465444421632,"weather_state_name":"Heavy Cloud","weather_state_abbr":"hc","wind_direction_compass":"SSW","created":"2019-02-10T10:49:03.096195Z","applicable_date":"2019-02-13","min_temp":3.6500000000000004,"max_temp":10.926666666666668,"the_temp":10.934999999999999,"wind_speed":6.355926593392587,"wind_direction":203.1296143014564,"air_pressure":1035.775,"humidity":76,"visibility":12.21274009782868,"predictability":71},{"id":6691969547894784,"weather_state_name":"Light Cloud","weather_state_abbr":"lc","wind_direction_compass":"SSE","created":"2019-02-10T10:49:03.445572Z","applicable_date":"2019-02-14","min_temp":3.393333333333333,"max_temp":12.479999999999999,"the_temp":12.02,"wind_speed":6.038844987916567,"wind_direction":159.0654952477335,"air_pressure":1035.03,"humidity":72,"visibility":13.653389207030939,"predictability":70},{"id":6452832177750016,"weather_state_name":"Light Cloud","weather_state_abbr":"lc","wind_direction_compass":"S","created":"2019-02-10T10:49:05.677427Z","applicable_date":"2019-02-15","min_temp":3.9766666666666666,"max_temp":12.876666666666667,"the_temp":12.39,"wind_speed":5.549238182348418,"wind_direction":177.184433149705,"air_pressure":1030.96,"humidity":77,"visibility":9.997862483098704,"predictability":70}],"time":"2019-02-10T11:33:35.856177Z","sun_rise":"2019-02-10T07:24:19.235049Z","sun_set":"2019-02-10T17:05:51.151342Z","timezone_name":"LMT","parent":{"title":"England","location_type":"Region / State / Province","woeid":24554868,"latt_long":"52.883560,-1.974060"},"sources":[{"title":"BBC","slug":"bbc","url":"http://www.bbc.co.uk/weather/","crawl_rate":180},{"title":"Forecast.io","slug":"forecast-io","url":"http://forecast.io/","crawl_rate":480},{"title":"HAMweather","slug":"hamweather","url":"http://www.hamweather.com/","crawl_rate":360},{"title":"Met Office","slug":"met-office","url":"http://www.metoffice.gov.uk/","crawl_rate":180},{"title":"OpenWeatherMap","slug":"openweathermap","url":"http://openweathermap.org/","crawl_rate":360},{"title":"Weather Underground","slug":"wunderground","url":"https://www.wunderground.com/?apiref=fc30dc3cd224e19b","crawl_rate":720},{"title":"World Weather Online","slug":"world-weather-online","url":"http://www.worldweatheronline.com/","crawl_rate":360},{"title":"Yahoo","slug":"yahoo","url":"http://weather.yahoo.com/","crawl_rate":180}],"title":"London","location_type":"City","woeid":44418,"latt_long":"51.506321,-0.12714","timezone":"Europe/London"}';

        $mock = new MockHandler([
            new \GuzzleHttp\Psr7\Response(200, ['Content-Type' => 'application/json'], $json),
        ]);
        $handler = HandlerStack::create($mock);
        $client = new Client(['handler' => $handler]);

        $result = $weather->get('euroweather', 'london', $client);

        $this->assertEquals($result->getTemperature(), 5.2566666666667);
    }
}
