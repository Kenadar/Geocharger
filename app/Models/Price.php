<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;


class Price extends Model
{
    use HasFactory;

    protected $fillable = [
        'country',
        'price',
    ];

    protected $table = 'prices';

  
   

}
