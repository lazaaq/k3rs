<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disease extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
    public function disease_victim_employee()
    {
        return $this->hasMany(DiseaseVictimEmployee::class);
    }
    public function disease_victim_non_employee()
    {
        return $this->hasMany(DiseaseVictimNonEmployee::class);
    }
    public function disease_witness_employee()
    {
        return $this->hasMany(DiseaseWitnessEmployee::class);
    }
    public function disease_witness_non_employee()
    {
        return $this->hasMany(DiseaseWitnessNonEmployee::class);
    }
}
