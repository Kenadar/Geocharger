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
    
    
}
