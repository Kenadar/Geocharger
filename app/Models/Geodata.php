<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Geodata extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'latitude',
        'longitude'
    ];

    protected $table = 'geodatas';

    public function booking() : HasMany
    {
        return $this->hasMany(Booking::class);
    }

    public static function deleteById(int $id){
        $geodata = Geodata::find($id);
        $geodata->delete();
    }

    public function edit(int $id){
        $geodata = Geodata::find($id);


        return view("geodata/edit/", ['geodata' => $geodata]);
    }

    public function update(Request $request, $id): Response
    {
        $geodata = Geodata::find($request->id);
        $name = $request->input('name');
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');
        $geodata->save();

        return redirect('/geodata/list');
    }
    

}