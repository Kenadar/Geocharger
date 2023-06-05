<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PizduliSender extends Model
{
    use HasFactory;
    public function pizduli(): HasMany
    {
        return $this->hasMany(Pizduli::class);
    }
}
