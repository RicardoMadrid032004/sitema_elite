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
        Schema::create('webitems', function (Blueprint $table) {
            $table->id();
            $table->string('text1',2000)->nullable(); // Hacer text1 opcional
            $table->string('text2',2000)->nullable(); // Hacer text2 opcional
            $table->string('text3',2000)->nullable(); // Hacer text3 opcional
            $table->string('text4',2000)->nullable(); // Hacer text4 opcional
            $table->string('image1')->nullable(); // Hacer image1 opcional
            $table->string('image2')->nullable(); // Hacer image2 opcional
            $table->string('image3')->nullable(); // Hacer image3 opcional
            $table->string('image4')->nullable(); // Hacer image4 opcional
            $table->string('eslider1')->nullable(); // Hacer eslider1 opcional
            $table->string('eslider2')->nullable(); // Hacer eslider2 opcional
            $table->string('eslider3')->nullable(); // Hacer eslider3 opcional
            $table->string('eslider4')->nullable(); // Hacer eslider4 opcional
            $table->foreignId('webcategoria_id')->constrained('webcategorias')->onDelete('cascade');
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('webitems');
    }
};
