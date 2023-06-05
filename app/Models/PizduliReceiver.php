<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PizduliReceiver extends Model
{
    use HasFactory;
    public function pizduli(): HasMany
    {
         $this->hasMany(Pizduli::class);
    }
}
