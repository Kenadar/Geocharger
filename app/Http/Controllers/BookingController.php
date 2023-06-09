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
            'geodata_id' =>'required|integer',
            'start_time'=>'required|integer',
            'end_time'=>'required|integer'
        ]);

        if ($validated->fails()) {
            return response()->json(['status'=> 'failed']);
        }  

        $alreadyBooked = Booking::where('geodata_id', $request->get('geodata_id'))->get()->isNotEmpty();
        
        if($alreadyBooked){
            return response()->json(['status'=>'already booked!']);
        }

        // try {
            $startTime = (new \DateTime())->setTimestamp($request->get('start_time'));
            $endTime = (new \DateTime())->setTimestamp($request->get('end_time'));
            Booking::create([
                'tenant'=>$request->get('tenant'),
                'lessor'=>$request->get('lessor'),
                'geodata_id'=>$request->get('geodata_id'),
                'start_time'=>$startTime,
                'end_time'=>$endTime
            ]);    
        // } catch (\Illuminate\Database\QueryException $e) {
        //     return response()->json(['status'=>'no points with this id!']);
        // }
        
        return response()->json(['status' => 'success']);
    } 

    
}
