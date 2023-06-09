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
            'geodata_id' =>'required|integer'
        ]);

        if ($validated->fails()) {
            return response()->json(['status'=> 'failed']);
        }  

        $alreadyBooked = Booking::where('geodata_id', $request->get('geodata_id'))->get()->isNotEmpty();
        
        if($alreadyBooked){
            return response()->json(['status'=>'already booked!']);
        }

        // if(Geodata::whereNotExist('geodata_id')){
        //         return response()->json(['status'=>'no charging points here!']);
        // }
        try {
            Booking::create([
                'tenant'=>$request->get('tenant'),
                'lessor'=>$request->get('lessor'),
                'geodata_id'=>$request->get('geodata_id')
            ]);    
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['status'=>'no points with this id!']);
        }
        
        return response()->json(['status' => 'success']);
    } 

    
}
