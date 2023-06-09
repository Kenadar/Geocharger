<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\BookingController;


class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'tenant',
        'lessor',
        'geodata_id',
        'start_time',
        'end_time'
    ];

    public function geodata() : BelongsTo
    {   
        return $this->belongsTo(Geodata::class);
    }
}
