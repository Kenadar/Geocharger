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
            'date'=>'required|date',
            'interval'=>'required|integer'
        ]);

        if ($validated->fails()) {
            return response()->json(['status'=> 'failed']);
        }  

        $alreadyBooked = Booking::where('geodata_id', $request->get('geodata_id'))->get()->isNotEmpty();
        
        if($alreadyBooked){
            return response()->json(['status'=>'already booked!']);
        }

        $startTime = (new \DateTime())->setTimestamp($request->get('start_time'));
        $endTime = (new \DateTime())->setTimestamp($request->get('end_time'));
        $startDate = $startTime->format('Y-m-d');
        $startInterval = $startTime->format('H');
        $endDate = $endTime->format('Y-m-d');
        $endInterval = $endTime->format('H');

        $checkBookingInterval = Booking::where('geodata_id', $request->get('geodata_id'))

            ->where('interval', '>=', $startInterval)
            ->where('interval', '<=', $endInterval)
            ->where('date', '>=', $startDate)
            ->where('date', '<=', $endDate);

        if($checkBookingInterval->count() > 0){
            return response()->json(['status'=>'already booked time interval!']);
        }

        try {
            Booking::create([
                'tenant'=>$request->get('tenant'),
                'lessor'=>$request->get('lessor'),
                'geodata_id'=>$request->get('geodata_id'),
                'date'=>$request->get('date'),
                'interval'=>$request->get('interval')
            ]);    
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['status'=>'no points with this id!']);
        }
        
        return response()->json(['status' => 'success']);
    } 

    
}
