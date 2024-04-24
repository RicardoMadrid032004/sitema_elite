<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boleta extends Model
{
    use HasFactory;
    protected $fillable = [
        'inscripcion_id',
        'concepto',
        'monto',
        'fecha_emision',
        'numero_boleta',
        'numero_transaccion',
        'metodo_pago',
        'estado_pago',
        'observaciones',
        'nombre_cliente',
        'dni_cliente',
        'direccion_cliente',
        'ruc_emisor',
        'nombre_emisor',
        'tipo_documento_cliente',
        'direccion_fiscal_cliente',
        'tipo_moneda',
    ];

    // Relación inversa con la tabla Inscripciones
    public function inscripcion()
    {
        return $this->belongsTo(Inscripcione::class);
    }
}
