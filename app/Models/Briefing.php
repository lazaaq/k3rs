<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Briefing extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    public function briefing_presence()
    {
        return $this->hasMany(BriefingPresence::class);
    }

    public function excerpt()
    {
        return Str::limit($this->result, 100);
    }
}

