<?php
// app/Http/Controllers/ExchangeRateController.php
namespace App\Http\Controllers;

use App\Models\ExchangeRate;
use Illuminate\Http\Request;

class ExchangeRateController extends Controller
{
    protected $exchangeRate;

    public function __construct(ExchangeRate $exchangeRate)
    {
        $this->exchangeRate = $exchangeRate;
    }

    public function getRate(Request $request)
    {
        $targetCurrency = $request->input('currency');
        $amount = $request->input('amount', 1); // Valor a convertir, por defecto 1
        $fromCurrency = 'COP'; // Moneda base fija en pesos colombianos

        $rateData = $this->exchangeRate->getExchangeRate($fromCurrency, $targetCurrency);

        if ($rateData) {
            $conversionRate = $rateData['conversion_rate'] ?? null;
            $convertedValue = $conversionRate ? $amount * $conversionRate : null;

            return response()->json([
                'success' => true,
                'rate' => $conversionRate,
                'converted_value' => $convertedValue,
                'message' => 'Tasa de cambio obtenida con éxito',
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'No se pudo obtener la tasa de cambio',
        ], 500);
    }
}
