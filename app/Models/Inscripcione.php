<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscripcione extends Model
{
    use HasFactory;
    protected $fillable = [
        'numeroDocumento',
        'nombres',
        'apellidoPaterno',
        'apellidoMaterno',
        'nombre_apoderado',
        'apellido_apoderado',
        'ciclo_id', 
        'monto_a_pagar',
        'monto_pagado',
        'modalidad_pago',
        'fecha_inscripcion',
    ];

    // public function ciclo()
    // {
    //     return $this->hasMany(Ciclo::class);
    // }
    public function ciclo()
{
    return $this->belongsTo(Ciclo::class, 'ciclo_id');
}

    

    // Relación con la tabla Boletas
    public function boletas()
    {
        return $this->hasMany(Boleta::class);
    }
}
