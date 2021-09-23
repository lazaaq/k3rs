<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiseaseWitnessEmployee extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function disease()
    {
        return $this->belongsTo(Disease::class);
    }
    
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
