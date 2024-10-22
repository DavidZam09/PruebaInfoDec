<?php

namespace App\Http\Controllers;

use App\Models\Request;
use Illuminate\Http\Request as HttpRequest;

class RequestController extends Controller
{
    public function store(HttpRequest $request)
    {
        $data = $request->validate([
            'pais' => 'required|string|max:255',
            'ciudad' => 'required|string|max:255',
            'cantidad' => 'required|integer',
            'rate' => 'required|numeric',
            'convert_cantidad' => 'required|numeric',
            'clima' => 'required|string|max:255',
            'temperatura' => 'required|numeric',
        ]);

        $newRequest = Request::create($data);

        return response()->json([
            'message' => 'Request created successfully',
            'data' => $newRequest,
        ], 201);
    }
}
