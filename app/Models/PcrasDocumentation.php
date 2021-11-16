<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PcrasDocumentation extends Model
{
    use HasFactory;

    protected $table = 'pcras_documentation';

    protected $guarded = ['id'];

    protected $hidden = [];
}
