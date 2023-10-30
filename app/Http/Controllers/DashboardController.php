<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Price;
use App\Models\Geodata;
use App\Models\Dayparting;
use Locale;
class DashboardController extends Controller
{
    public function index(Request $request){
        $geodata = Geodata::all();
        $price = Price::all();
        $dayparting = Dayparting::all();
        
        return view('dashboard', ['geodatas' => $geodata, 'prices' => $price,'dayparting' => $dayparting]);
    }
    public function geoInfo(Request $request){
        $geodata = Geodata::all();
        return response()->json($geodata);  
    }
    public function geoDayparting(Request $request){
        $dayparting = Dayparting::all();
        return response()->json($dayparting);  
    }
}
