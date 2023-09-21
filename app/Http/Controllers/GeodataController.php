<?php

namespace App\Http\Controllers;

use App\Models\Geodata;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Http\RedirectResponse;
use App\Models\Dayparting;
use Illuminate\Support\Facades\Auth;

class GeodataController extends Controller
{
    public static function store(Request $request): RedirectResponse
    {
        $validated = Validator::make($request->all(), [
            'name' => 'required|string',
            'address' => 'required|string',
        ]);


        if ($validated->fails()) {
            return redirect('/geodata/list'); 
        }

        // $userId = Auth::user()->id;
        

        $alreadyCreated = Geodata::where('address', '=', $request->get('address'))
            ->get()->isNotEmpty();
            

        if($alreadyCreated){
            return redirect('/geodata/list');        
        }

        $geodata = Geodata::create([
            'name' => $request->get('name'),
            'address' => $request->get('address'),
            'user_id' => $id = auth()->user()->id
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
