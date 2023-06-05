<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pizduli extends Model
{
    use HasFactory;

    public function pizduliReceiver(): BelongsTo
    {
        return $this->belongsTo(PizduliReceiver::class);
    }
    public function pizduliSender(): BelongsTo
    {
        return $this->belongsTo(PizduliSender::class);
    }
}

$pizduli = new Pizduli();
$pizduli->id;
$pizduli->created_at();
$pizduli->pizduliSender;