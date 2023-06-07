<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\GeodataController;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
}
