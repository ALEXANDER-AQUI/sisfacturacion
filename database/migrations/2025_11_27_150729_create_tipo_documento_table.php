<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tipo_documento', function (Blueprint $table) {
            // PK: Se define como unsignedInteger y auto-incrementable (INT(11))
            $table->unsignedInteger('id_tipo_documento')->primary()->autoIncrement(); 
            $table->string('descripcion', 10)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tipo_documento');
    }
};