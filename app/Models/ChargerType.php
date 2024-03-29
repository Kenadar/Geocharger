<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\PriceController;

class ChargerType extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'kilowatt',
    ];

    protected $table = 'charger';

}
