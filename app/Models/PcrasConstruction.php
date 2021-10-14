<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PcrasConstruction extends Model
{
    use HasFactory;

    protected $table = 'pcras_construction';

    protected $guarded = ['id'];
}
