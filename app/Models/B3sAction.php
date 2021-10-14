<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class B3sAction extends Model
{
    use HasFactory;

    protected $table = 'b3s_action';

    protected $guarded = ['id'];
}
