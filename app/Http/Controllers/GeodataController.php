<?php

namespace App\Http\Controllers;

use App\Models\Geodata;
use Illuminate\Http\Request;

class GeodataController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'latitude' => 'required|float',
            'longitude' =>'required|float'
        ]);

        dd($validated);

        Geodata::create([
            'name' => $request->get('name'),
            'latitude' => $request->get('latitude'),
            'longitude' => $request->get('longitude')
        ]);
    } 
}
