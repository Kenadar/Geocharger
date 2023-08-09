<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
    use HasFactory;

    protected $fillable = [
        'city'
    ];

    protected $table = 'cities';

    public function geodata(): BelongsTo {
        return $this->BelonпsTo(Geodata::class);
    }
}
