
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('proveedor', function (Blueprint $table) {
            $table->string('no_documento', 20)->primary(); // VARCHAR(20) PK
            $table->unsignedInteger('cod_tipo_documento')->nullable(); // FK
            $table->string('nombre', 20)->nullable();
            $table->string('apellido', 20)->nullable();
            $table->string('nombre_comercial', 20)->nullable();
            $table->string('direccion', 20)->nullable();
            $table->unsignedInteger('cod_ciudad')->nullable(); // FK
            $table->string('telefono', 15)->nullable();
            $table->timestamps();

            // Claves Foráneas
            $table->foreign('cod_tipo_documento')->references('id_tipo_documento')->on('tipo_documento');
            $table->foreign('cod_ciudad')->references('codigo_ciudad')->on('ciudad');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('proveedor');
    }
};