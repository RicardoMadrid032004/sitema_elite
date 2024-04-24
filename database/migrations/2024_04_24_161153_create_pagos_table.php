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
        Schema::create('pagos', function (Blueprint $table) {
            
            $table->id();

            $table->string('alumno');
            $table->timestamps();
            $table->foreignId('inscripcione_id')->constrained('inscripciones')->onDelete('cascade');
            $table->decimal('10.2');
            $table->string('cuotas');
            $table->string('material');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagos');
    }
};
