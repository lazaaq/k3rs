<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
// use Illuminate\Foundation\Auth\User as Authenticatable;
// use Tymon\JWTAuth\Contracts\JWTSubject;

class Employee extends Model
{
    use HasFactory, HasApiTokens;

    protected $guarded = ['id'];
    
    protected $hidden = [
        'password',
        'remember_token'
    ];

    public function manager()
    {
        return $this->belongsTo(Manager::class);
    }
    public function salary()
    {
        return $this->belongsTo(Salary::class);
    }
}
