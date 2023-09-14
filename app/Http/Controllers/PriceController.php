<?php

namespace App\Http\Controllers;

use App\Models\Price;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    public function index(Request $request){
        $price = Price::all();
        return view('price');
    }
}
