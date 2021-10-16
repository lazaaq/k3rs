<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AparHistory extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function apar()
    {
        return $this->belongsTo(Apar::class);
    }
}
