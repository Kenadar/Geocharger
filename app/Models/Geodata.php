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

    protected $table = 'geodata';

    public function booking() : HasMany
    {
        return $this->hasMany(Booking::class);
    }
}
