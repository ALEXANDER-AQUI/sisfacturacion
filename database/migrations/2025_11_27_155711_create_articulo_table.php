<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('articulo', function (Blueprint $table) {
            $table->unsignedInteger('id_articulo')->primary()->autoIncrement(); 
            $table->string('descripcion', 30)->nullable();
            $table->integer('precio_venta')->nullable();
            $table->integer('precio_costo')->nullable();
            $table->integer('stock')->default(0);

            // ✅ CORREGIDO el TIPO: unsignedBigInteger para coincidir con $table->id()
            // ✅ CORREGIDO el NOMBRE: 'cod_tipo_articulo'
            $table->unsignedBigInteger('cod_tipo_articulo')->nullable(); 
            
            // Clave Foránea a proveedor (string(20) es correcto)
            $table->string('cod_proveedor', 20)->nullable(); 
            
            $table->date('fecha_ingreso')->nullable();
            $table->timestamps();

            // Definición de las FK
            $table->foreign('cod_tipo_articulo')->references('id_tipoarticulo')->on('tipo_articulo');
            $table->foreign('cod_proveedor')->references('no_documento')->on('proveedor');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('articulo');
    }
};