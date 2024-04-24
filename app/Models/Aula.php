<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aula extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'ciclo_id', 'capacidad'];

    public function ciclo()
    {
        return $this->belongsTo(Ciclo::class);
    }
}
