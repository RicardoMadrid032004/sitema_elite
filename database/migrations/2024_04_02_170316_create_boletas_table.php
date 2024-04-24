<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('boletas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('inscripcion_id')->constrained('inscripciones')->onDelete('cascade');
            $table->string('concepto'); // Concepto de la boleta
            $table->decimal('monto', 8, 2); // Monto de la boleta
            $table->date('fecha_emision'); // Fecha de emisión de la boleta
            $table->string('numero_boleta')->nullable(); // Número de boleta o factura
            $table->string('numero_transaccion')->nullable(); // Número de transacción bancaria
            $table->string('metodo_pago'); // Método de pago: efectivo, tarjeta, transferencia, etc.
            $table->string('estado_pago'); // Estado del pago: pendiente, pagado, anulado, etc.
            $table->string('observaciones')->nullable(); // Observaciones adicionales
            $table->string('nombre_cliente'); // Nombre del cliente (alumno)
            $table->string('dni_cliente'); // DNI del cliente (alumno)
            $table->string('direccion_cliente')->nullable(); // Dirección del cliente (alumno)
            
            // Campos necesarios para SUNAT
            $table->string('ruc_emisor'); // RUC del emisor (tu academia)
            $table->string('nombre_emisor'); // Nombre o razón social del emisor
            $table->string('tipo_documento_cliente'); // Tipo de documento del cliente (DNI, RUC, etc.)
            $table->string('direccion_fiscal_cliente'); // Dirección fiscal del cliente
            $table->string('tipo_moneda'); // Tipo de moneda (soles, dólares, etc.)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('boletas');
    }
};
