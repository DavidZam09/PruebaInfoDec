<?php

namespace App\Models;

use Illuminate\Support\Facades\Http;
use \Illuminate\Support\Facades\Log;

class Weather
{
    public static function getWeatherByCity($city)
    {
        $apiKey = env('WEATHER_API_KEY');
        $url = "http://api.openweathermap.org/data/2.5/weather?q={$city}&units=metric&appid={$apiKey}";

        $response = Http::get($url);

        if ($response->successful()) {
            return $response->json();
        }

        // Registrar el error para más detalles
        Log::error('Error al obtener el clima', [
            'city' => $city,
            'status' => $response->status(),
            'response' => $response->body()
        ]);

        return null;
    }
}
