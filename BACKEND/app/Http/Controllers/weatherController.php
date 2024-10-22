<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Weather;

class weatherController extends Controller
{
    public function getWeather($city)
    {
        $weatherData = Weather::getWeatherByCity($city);

        if ($weatherData) {
            return response()->json($weatherData);
        }

        return response()->json(['error' => 'No se pudo obtener el clima'], 404);
    }
}
