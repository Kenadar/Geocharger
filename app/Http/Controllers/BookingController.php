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
use App\Models\Cities;

class BookingController extends Controller
{
    public function index(Request $request) {
        $geodata = Geodata::all();
        $city = Cities::all();
        // dd($geodata);

        return view('booking/create',['geodatas' => $geodata, 'cities' => $city]);
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
        $decode = $this->bookedDayparting($timestampArray['start_ts'], $timestampArray['end_ts'], $request->get('geodata_id'));


        if ($decode == false){
            return response()->json(['status' => 'You can not book this time!']);
        }


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
    
    function bookedDayparting(int $date1, int $date2, int $geodata_id){
        $dayparting= Dayparting::where('geodata_id', '=', $geodata_id)->first();

        $time1 = new DateTime();
        $time1->setTimestamp($date1);
        $day1= $time1->format('D');
        $hour1= $time1->format('H');
        $dayHour1 = $day1 . $hour1;

        $time2 = new DateTime();
        $time2->setTimestamp($date2);
        $day2= $time2->format('D');
        $hour2= $time2->format('H');
        $dayHour2 = $day2 . $hour2;

        $dayArray=json_decode($dayparting->dayparting,true);

        $hour1Allowed = in_array($dayHour1, $dayArray);
        $hour2Allowed = in_array($dayHour2, $dayArray);
        
        $allowedTime = $hour1Allowed && $hour2Allowed;

         return $allowedTime;
        
    }

    
}

