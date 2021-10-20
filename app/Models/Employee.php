<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Employee extends Model
{
    use HasFactory, HasApiTokens;

    protected $guarded = ['id'];

    public function manager()
    {
        return $this->belongsTo(Manager::class);
    }
    public function salary()
    {
        return $this->belongsTo(Salary::class);
    }
}
