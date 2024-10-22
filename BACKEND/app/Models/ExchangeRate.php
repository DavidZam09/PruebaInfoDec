<?php
// app/Models/ExchangeRate.php
namespace App\Models;

use Illuminate\Support\Facades\Http;

class ExchangeRate
{
    protected $apiKey;

    public function __construct()
    {
        $this->apiKey = env('EXCHANGE_API_KEY');
    }

    public function getExchangeRate($fromCurrency, $toCurrency)
    {
        $url = "https://v6.exchangerate-api.com/v6/{$this->apiKey}/pair/{$fromCurrency}/{$toCurrency}";

        $response = Http::get($url);

        if ($response->successful()) {
            return $response->json();
        }

        return null;
    }
}
