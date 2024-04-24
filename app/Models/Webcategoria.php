<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Webcategoria extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function webitems()
    {
        return $this->hasMany(Webitem::class);
    }
   
}
