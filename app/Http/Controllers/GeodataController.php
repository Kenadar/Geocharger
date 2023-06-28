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

        $alreadyCreated = Geodata::where('latitude', '=', $request->get('latitude'))
            ->where('longitude', '=', $request->get('longitude'))
            ->get()->isNotEmpty();
            

        if($alreadyCreated){
            return response()->json(['status'=>'Geodata already exist! Create new!']);
        }

        Geodata::create([
            'name' => $request->get('name'),
            'latitude' => $request->get('latitude'),
            'longitude' => $request->get('longitude')
        ]);

        return response()->json(['status' => 'success']);
    } 
}
