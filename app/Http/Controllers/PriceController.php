<?php

namespace App\Http\Controllers;

use App\Models\Price;
use Illuminate\Http\Request;
use App\Models\ChargerType;

class PriceController extends Controller
{
    public function index(Request $request){
        $price = Price::all();
        $type = ChargerType::all();
        
        $countryData = Price::select('id', 'country', 'price')->get();

        return view('price/price', ['prices' => $price, 'charger' => $type, 'countryData' => $countryData]);
    }

   
}
