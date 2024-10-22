<?php
// app/Http/Controllers/CountryController.php
namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index()
    {
        $countries = Country::all();
        return response()->json($countries);
    }

    public function show($id)
    {
        $country = Country::find($id);
        if ($country) {
            return response()->json($country);
        }

        return response()->json(['message' => 'Country not found'], 404);
    }
}
