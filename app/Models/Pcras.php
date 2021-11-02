<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pcras extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
    public function construction()
    {
        return $this->hasOne(PcrasConstruction::class);
    }
    public function access_areas()
    {
        return $this->hasOne(PcrasAccessArea::class);
    }
    public function traffic()
    {
        return $this->hasOne(PcrasTraffic::class);
    }
    public function detail()
    {
        return $this->hasOne(PcrasDetail::class);
    }
    public function documentation()
    {
        return $this->hasMany(PcrasDocumentation::class);
    }
}
