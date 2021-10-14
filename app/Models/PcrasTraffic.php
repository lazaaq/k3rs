<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PcrasTraffic extends Model
{
    use HasFactory;

    protected $table = 'pcras_traffic';

    protected $guarded = ['id'];
}
