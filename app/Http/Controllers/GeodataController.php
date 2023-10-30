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
    public function index(Request $request){
        $geodata = Geodata::all();

        return view('geodata/geodata', ['geodatas' => $geodata]);
    }

    public function create(){
        return view('geodata/create');
    }
    
    public static function store(Request $request): RedirectResponse
    {
        $validated = Validator::make($request->all(), [
            'name' => 'required|string',
            'aboutGeo' => 'required|string',
            'latitude' => 'required|decimal:3,9',
            'longitude' => 'required|decimal:3,9',
        ]);

        if ($validated->fails()) {
            return redirect('/geodata/list'); 
        }        

        $alreadyCreated = Geodata::where('name', '=', $request->get('name'))
            ->get()->isNotEmpty();

        if($alreadyCreated){
            return redirect('/geodata/list');        
        }

        $geodata = Geodata::create([
            'name' => $request->get('name'),
            'aboutGeo' =>$request->get('aboutGeo'),
            'latitude' => $request->get('latitude'),
            'longitude' => $request->get('longitude'),
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
    public static function deleteById(int $id){
        $geodata = Geodata::find($id);
        $deleteDayparting = Dayparting::deleteById($id);
        $geodata->delete();
        return redirect('/geodata/list');
    }
    public function edit(int $id){
        $geodata = Geodata::find($id);
       
        return view("geodata/edit", ['geodata' => $geodata]);
    }
    public static function updateById(Request $request, $params, $id)
    {
        $params=[
            'name' => $request->get('name'),
            'address' => $request->get('address'),
            'dayparting' => $request->get('dayparting')
        ];

        $geodata= Geodata::find($id);
        Geodata::updateById($params, $id);
        $geodata->name = $params['name'];        
        $geodata->address = $params ['address'];
        $geodata->save();

        Dayparting::updateById($params, $id);

        return redirect('/geodata/list');       
    }
}
