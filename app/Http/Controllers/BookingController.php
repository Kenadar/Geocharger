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

        $start_time = new \DateTime();
        $start_time->setTimestamp($request->get('start_time'));

        $end_time = new \DateTime();
        $end_time->setTimestamp($request->get('end_time'));

        $interval = DateInterval::createFromDateString('15 minutes');
        $daterange = new DatePeriod($start_time, $interval , $end_time);

        
        $alreadyBooked = Booking::where('geodata_id', '=', $request->get('geodata_id'))
 
            ->where('interval', '>=', $this -> getInterval($start_time)) 
            ->where('interval' , '<=', $this -> getInterval($end_time))
            ->where('date', '>=', $this -> getDate($start_time))
            ->where('date', '<=', $this -> getDate($end_time))
            ->get()->isNotEmpty();
            

        if($alreadyBooked){
            return response()->json(['status'=>'already booked!']);
        }

        foreach($daterange as $date){

           Booking::create([
            'tenant'=> $request->get('tenant'),
            'lessor'=> $request->get('lessor'),
            'geodata_id'=> $request->get('geodata_id'),
            'date'=> $this-> getDate($date),
            'interval' => $this->getInterval($date)
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
    
    function getInterval(DateTime $dateTime): int|float
    {
        $hours = $dateTime->format('H');
        $minutes = $dateTime->format('i');
        $roundedMinutes = $this->roundMinutes($minutes);
        $minutesFromDayStart = (($hours * 60) + $roundedMinutes);
        $interval = $minutesFromDayStart / 15;
        return $interval;
    }
    
    function getDate(DateTime $dateTime) {
        $date = $dateTime->format('Y-m-d');
    
        return $date;
    }
    

    }

