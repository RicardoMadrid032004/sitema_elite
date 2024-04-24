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
        Schema::create('inscripciones', function (Blueprint $table) {
            $table->id();
            $table->string('apellidos', 100);
            $table->string('nombres', 100);
            $table->string('numero_dni', 8)->unique();
            $table->string('dni_boleta',20)->nullable();
            $table->string('phone_alum',50)->nullable();
            $table->string('phone_watpsap',50)->nullable();
            $table->string('apoderado_1', 80)->nullable();
            $table->string('phone_apoderado_1',50)->nullable();
            $table->string('apoderado_2', 80);
            $table->string('phone_apoderado_2', 50);
            $table->string('talla_uniforme', 250);
            $table->string('escuela_procedencia', 150);
            $table->string('modalidad', 90);
            $table->string('carrera', 100);
            $table->string('alergia', 60);
            $table->string('tipo_alergia', 50);
            $table->string('recomendacion', 50);
            $table->string('prom_alumn',50);
            $table->string('ciclos', 60);
            $table->string('turnos', 80);
            $table->string('foto_estudiante', 50);
            $table->foreignId('ciclo_id')->constrained('ciclos')->onDelete('cascade');
            $table->foreignId('modalidade_id')->constrained('modalidades')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inscripciones');
    }
};
