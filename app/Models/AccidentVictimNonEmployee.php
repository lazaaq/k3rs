<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccidentVictimNonEmployee extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function accident()
    {
        return $this->belongsTo(Accident::class);
    }
}
