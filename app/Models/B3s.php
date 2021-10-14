<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class B3s extends Model
{
    use HasFactory;

    protected $table = 'b3s';

    protected $guarded = [];

    public function action()
    {
        return $this->hasOne(B3sAction::class);
    }
    public function detail()
    {
        return $this->hasOne(B3sDetail::class);
    }
}
