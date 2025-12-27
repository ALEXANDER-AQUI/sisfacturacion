
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cliente', function (Blueprint $table) {
            $table->string('documento', 15)->primary(); // VARCHAR(15) PK
            $table->unsignedInteger('cod_tipo_documento')->nullable(); // FK
            $table->string('nombres', 30)->nullable();
            $table->string('apellidos', 30)->nullable();
            $table->string('direccion', 30)->nullable();
            $table->unsignedInteger('cod_ciudad')->nullable(); // FK
            $table->string('telefono', 20)->nullable();
            $table->timestamps();

            // Claves Foráneas
            $table->foreign('cod_tipo_documento')->references('id_tipo_documento')->on('tipo_documento');
            $table->foreign('cod_ciudad')->references('codigo_ciudad')->on('ciudad');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cliente');
    }
};