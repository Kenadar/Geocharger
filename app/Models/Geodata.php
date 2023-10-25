<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Geodata extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'latitude',
        'longitude',

    ];

    protected $table = 'geodatas';

    public function booking() : HasMany
    {
        return $this->hasMany(Booking::class);
    }
    
    public function dayparting() : HasMany
    {
        return $this->hasOne(Dayparting::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'foreign_key', 'other_key');
    }
    
    
}