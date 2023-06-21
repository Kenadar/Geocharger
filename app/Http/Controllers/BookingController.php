<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as Controller;
use DateInterval;
use DatePeriod;

class BookingController extends Controller
{

    public function store(Request $request): JsonResponse
    {
        $validated = Validator::make($request->all(), [
            'tenant' => 'required|integer',
            'lessor' => 'required|integer',
            'geodata_id' =>'required|integer',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'stary_time' => 'required|integer'
        ]);


        if ($validated->fails()) {
            return response()->json(['status'=> 'failed']);
        }

        $alreadyBooked = Booking::where('geodata_id', '=',$request->get('geodata_id'))
            ->where('date', '>=', $request->get('start_date'))
            ->where('date', '<=', $request->get('end_date'))
            ->get()->isNotEmpty();
            

        if($alreadyBooked){
            return response()->json(['status'=>'already booked!']);
        }

        /// create dateinterval

        $start_date = date_create($request->get('start_date'));
        $end_date = date_create($request->get('end_date'))->modify('+1 day');

        $interval = DateInterval::createFromDateString('1 day');
        $daterange = new DatePeriod($start_date, $interval , $end_date);

        foreach($daterange as $date){
            $date = $date->format('Y-m-d');

           Booking::create([
            'tenant'=> $request->get('tenant'),
            'lessor'=> $request->get('lessor'),
            'geodata_id'=> $request->get('geodata_id'),
            'date'=>$date
        ]);
        }

        return response()->json(['status' => 'success']);
    } 

    }

