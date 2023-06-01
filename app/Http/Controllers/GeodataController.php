<?php

namespace App\Http\Controllers;

use App\Models\Geodata;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Http\JsonResponse;

class GeodataController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $validated = Validator::make($request->all(), [
            'name' => 'required|string',
            'latitude' => 'required|numeric',
            'longitude' =>'required|numeric'
        ]);


        if ($validated->fails()) {
            return response()->json(['status'=> 'failed']);
        }

        Geodata::create([
            'name' => $request->get('name'),
            'latitude' => $request->get('latitude'),
            'longitude' => $request->get('longitude')
        ]);

        return response()->json(['status' => 'success']);
    } 
}
