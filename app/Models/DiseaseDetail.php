<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiseaseDetail extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function disease_list()
    {
        return $this->hasMany(DiseaseList::class);
    }
}
