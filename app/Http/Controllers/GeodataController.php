<?php

namespace App\Http\Controllers;

use App\Models\Geodata;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Http\RedirectResponse;
use App\Models\Dayparting;

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
            return redirect('/geodata/list');        
        }

        $geodata = Geodata::create([
            'name' => $request->get('name'),
            'latitude' => $request->get('latitude'),
            'longitude' => $request->get('longitude')
        ]);
        $dayparting=$request->get('dayparting');
        $json=json_encode($dayparting);

        Dayparting::create([
            'geodata_id'=>$geodata->id,
            'dayparting'=>$json
        ]);

        return redirect('/geodata/list');
    } 

    
    
}
