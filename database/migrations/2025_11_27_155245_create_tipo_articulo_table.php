<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tipo_articulo', function (Blueprint $table) {
            // PK: id_tipoarticulo (BIGINT UNSIGNED) -> Esto es correcto.
            $table->id('id_tipoarticulo'); 
            
            $table->string('descripcion_articulo', 30)->nullable();
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tipo_articulo');
    }
};