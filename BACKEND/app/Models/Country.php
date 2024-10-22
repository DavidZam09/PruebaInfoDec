<?php
// app/Models/Country.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = ['name', 'currency', 'currency_symbol', 'cities'];

    protected $casts = [
        'cities' => 'array', // Para convertir el campo JSON a un array
    ];
}
