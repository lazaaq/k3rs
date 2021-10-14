<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PcrasDetail extends Model
{
    use HasFactory;

    protected $table = 'pcras_detail';

    protected $guarded = ['id'];
}
