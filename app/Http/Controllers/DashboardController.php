<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Price;
use App\Models\Geodata;

class DashboardController extends Controller
{
    public function index(Request $request){
        $geodata = Geodata::all();
        $price = Price::all();

        return view('dashboard', ['geodatas' => $geodata, 'prices' => $price]);
    }
}
