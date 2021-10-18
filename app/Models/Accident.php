<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accident extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function accident_victim_employee()
    {
        return $this->hasMany(AccidentVictimEmployee::class);
    }
    
    public function accident_victim_non_employee()
    {
        return $this->hasMany(AccidentVictimNonEmployee::class);
    }

    public function accident_witness_employee()
    {
        return $this->hasMany(AccidentWitnessEmployee::class);
    }
    
    public function accident_witness_non_employee()
    {
        return $this->hasMany(AccidentWitnessNonEmployee::class);
    }
}
