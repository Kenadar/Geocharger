<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\BookingController;


class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'tenant_id',
        'lessor_id',
        'geodata_id',
        'interval'
    ];

    public function geodata() : BelongsTo
    {   
        return $this->belongsTo(Geodata::class);
    }
    public function user() : BelongsTo
    {   
        return $this->BelongsTo(User::class);
    }

}
