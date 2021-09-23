<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiseaseWitnessNonEmployee extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function disease()
    {
        return $this->belongsTo(Disease::class);
    }
}
