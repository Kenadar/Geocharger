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
            'geodata_id' =>'required|integer',
            'date'=>'required|date'
        ]);


        if ($validated->fails()) {
            return response()->json(['status'=> 'failed']);
        }
        $alreadyBooked = Booking::where([
            'geodata_id'=> $request->get('geodata_id'),
            'date'=>$request->get('date')
            ])->get()->isNotEmpty();

        if($alreadyBooked){
            return response()->json(['status'=>'already booked!']);
        }


        Booking::create([
            'tenant'=>$request->get('tenant'),
            'lessor'=>$request->get('lessor'),
            'geodata_id'=>$request->get('geodata_id'),
            'date'=>$request->get('date')
        ]);

        return response()->json(['status' => 'success']);
    } 
}
