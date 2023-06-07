<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Http\JsonResponse;
use App\Models\Geodata;

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

        // if(Booking::whereExist('geodatas')){
        //     return response()->json(['status'=>'already booked!']);
        // }


        // if(Geodata::whereNotExist('id')){
        //         return response()->json(['status'=>'no charging points here!']);
        // }

        Booking::create([
            'tenant'=>$request->get('tenant'),
            'lessor'=>$request->get('lessor'),
            'geodata'=>$request->get('geodata')
        ]);

        return response()->json(['status' => 'success']);
    } 

    
}
