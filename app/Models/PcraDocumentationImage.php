<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PcraDocumentationImage extends Model
{
    use HasFactory;

    protected $table = 'pcra_documentation_images';

    protected $guarded = ['id'];
}
