<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as Controller;
use DateInterval;
use DatePeriod;
use DateTime;
use App\Models\Dayparting;

class BookingController extends Controller
{

    public function store(Request $request): JsonResponse
    {
        $validated = Validator::make($request->all(), [ 
            'tenant' => 'required|integer',
            'lessor' => 'required|integer',
            'geodata_id' =>'required|integer',
            'start_time' => 'required|integer',
            'end_time' => 'required|integer'
        ]);

        if ($validated->fails()) {
            return response()->json(['status'=> 'failed']);
        }

        $start_interval = $this -> getInterval($request->get('start_time'));
        $end_interval = $this -> getInterval($request->get('end_time'));
        $intervalrange = range($start_interval, $end_interval);

        
        $alreadyBooked = Booking::where('geodata_id', '=', $request->get('geodata_id'))
 
            ->where('interval', '>=', $start_interval) 
            ->where('interval' , '<=', $end_interval)
            ->get()->isNotEmpty();
            

        if($alreadyBooked){
            // return response()->json(['status'=>'already booked!']);
        }

        foreach($intervalrange as $interval){

           Booking::create([
            'tenant'=> $request->get('tenant'),
            'lessor'=> $request->get('lessor'),
            'geodata_id' => $request->get('geodata_id'),
            'interval' => $interval
        ]);
        }

        // return response()->json(['status' => 'success']);
    } 

    function roundMinutes($minutes) {
        $remainder = $minutes % 15;
        if ($remainder <= 7) {
            $roundedMinutes = $minutes - $remainder;
        } else {
            $roundedMinutes = $minutes + (15 - $remainder);
        }
    
        return $roundedMinutes;
    }
    
    function getInterval(int $timestamp): int|float
    {
        $timestampMinutes = intval($timestamp / 60);
        $roundedMinutes = $this -> roundMinutes($timestampMinutes);
        $interval = $roundedMinutes / 15;
        return $interval;
    }
    

    }

