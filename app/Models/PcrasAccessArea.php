<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PcrasAccessArea extends Model
{
    use HasFactory;

    protected $table = 'pcras_access_areas';

    protected $guarded = ['id'];
}
