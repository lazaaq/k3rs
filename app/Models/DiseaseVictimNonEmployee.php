<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiseaseVictimNonEmployee extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function disease()
    {
        return $this->belongsTo(Disease::class);
    }
}
