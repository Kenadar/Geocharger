<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

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
    public function dayparting() : HasMany
    {
        return $this->hasOne(Dayparting::class);
    }
    public static function deleteById(int $id){
        $geodata = Geodata::find($id);
        $geodata->delete();
    }

    public function edit(int $id){
        $geodata = Geodata::find($id);
       
        return view("geodata/edit/", ['geodata' => $geodata]);
    }

    public static function updateById($params, $id)
    {
        $geodata = Geodata::find($id); 
        $geodata->name = $params['name'];        
        $geodata->latitude = $params ['latitude'];
        $geodata->longitude = $params ['longitude'];


        $geodata->save();
    }
    
}