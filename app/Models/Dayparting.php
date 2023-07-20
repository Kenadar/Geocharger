<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dayparting extends Model
{
    use HasFactory;

    protected $fillable = [
        'geodata_id',
        'dayparting',
    ];

    protected $table = 'dayparting';

    public function geodata() : BelongsTo
    {
        return $this->belongsTo(Geodata::class);
    }

    public static function updateById($params, $id){
        $dayparting = Dayparting::where('geodata_id', '=', $id)->first();
        $dayparting->dayparting = $params['dayparting'];
        $dayparting->save();
    }
    // public static function deleteById(int $id){
    //     $dayparting = Dayparting::where('geodata_id', '=', $id)->first();
    //     $dayparting->delete();
    // }
    
}
