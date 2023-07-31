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
use App\Models\Geodata;
use App\Models\Dayparting;

class BookingController extends Controller
{
    public function index(Request $request) {
        $geodata = Geodata::all();

        return view('booking/create',['geodatas' => $geodata]);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = Validator::make($request->all(), [ 
            'tenant' => 'required|integer',
            'lessor' => 'required|integer',
            'geodata_id' =>'required|integer',
            'start_time' => 'required|integer',
            'end_time' => 'required|integer'
        ]);
        
        $timestampArray = $this->getTimestamp($request['start_time'], $request['end_time']);

        if ($validated->fails()) {
            // return response()->json(['status'=> 'failed']);
        }

        $start_interval = $this -> getInterval($timestampArray['start_ts']);
        $end_interval = $this -> getInterval($timestampArray['end_ts']);
        $intervalrange = range($start_interval, $end_interval);

        
        $alreadyBooked = Booking::where('geodata_id', '=', $request->get('geodata_id'))
 
            ->where('interval', '>=', $start_interval) 
            ->where('interval' , '<=', $end_interval)
            ->get()->isNotEmpty();
            

        if($alreadyBooked){
            return response()->json(['status'=>'already booked!']);
        }

        foreach($intervalrange as $interval){

           Booking::create([
            'tenant'=> $request->get('tenant'),
            'lessor'=> $request->get('lessor'),
            'geodata_id' => $request->get('geodata_id'),
            'interval' => $interval
        ]);
        }

        // $daypartingArray = $this->bookedDayparting()->isEmpty();
        // if($daypartingArray){
        //     return response()->json(['status' => 'You can not book this time!']);
        // }


        return response()->json(['status' => 'success']);
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

    function getTimestamp(string $date1, string $date2) {
        return [
            'start_ts' => strtotime($date1),
            'end_ts' => strtotime($date2),
        ];
    }
    
    function getInterval(int $timestamp): int|float
    {
        $timestampMinutes = intval($timestamp / 60);
        $roundedMinutes = $this -> roundMinutes($timestampMinutes);
        $interval = $roundedMinutes / 15;
        return $interval;
    }
    
    function bookedDayparting(string $date1, string $date2){
        $dayparting= Dayparing::where('geodata_id', '=', $request->get('geodata_id'));

        $time1 = new DateTime();
        $time1->setTimestamp($date1);
        $time1->format('D H');

        $time2 = new DateTime();
        $time2->setTimestamp($date2);
        $time2->format('D H');

        $json=json_decode($dayparting);
        foreach($dayparting as $day){};

        return $day;
    }

}

