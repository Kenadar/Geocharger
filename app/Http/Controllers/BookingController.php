<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as Controller;

class BookingController extends Controller
{

    public function store(Request $request): JsonResponse
    {
        $validated = Validator::make($request->all(), [
            'tenant' => 'required|integer',
            'lessor' => 'required|integer',
            'geodata' =>'required|integer'
        ]);


        if ($validated->fails()) {
            return response()->json(['status'=> 'failed']);
        }

        Booking::create([
            'tenant'=>$request->get('tenant'),
            'lessor'=>$request->get('lessor'),
            'geodata'=>$request->get('geodata')
        ]);

        return response()->json(['status' => 'success']);
    } 
}
