<?php

namespace App\Http\Controllers;

use App\Models\Geodata;
use Illuminate\Http\Request;
use Validator;
// use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;

class GeodataController extends Controller
{
    public static function store(Request $request): RedirectResponse
    {
        $validated = Validator::make($request->all(), [
            'name' => 'required|string',
            'latitude' => 'required|numeric',
            'longitude' =>'required|numeric'
        ]);


        if ($validated->fails()) {
            return redirect('/geodata/list'); 
        }

        $alreadyCreated = Geodata::where('latitude', '=', $request->get('latitude'))
            ->where('longitude', '=', $request->get('longitude'))
            ->get()->isNotEmpty();
            

        if($alreadyCreated){
            return redirect('/geodata/list');        }

        Geodata::create([
            'name' => $request->get('name'),
            'latitude' => $request->get('latitude'),
            'longitude' => $request->get('longitude')
        ]);

        return redirect('/geodata/list');
    } 
    public function dayparting(){
        $dayOfWeek = array('Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun');
        $hourOfDay = range(1,24);

        foreach($dayOfWeek as $day){
            foreach($hourOfDay as $hour){
            }
        }
    }
}
