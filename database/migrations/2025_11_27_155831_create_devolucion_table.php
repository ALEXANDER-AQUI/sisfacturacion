
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('devolucion', function (Blueprint $table) {
            // PK que también es FK a detalle_factura
            $table->unsignedInteger('cod_detallefactura')->primary();
            
            // Campos de referencia (son redundantes si la PK es la FK, pero se mantienen por el diagrama)
            $table->string('cod_factura', 20)->nullable();
            $table->unsignedInteger('cod_articulo')->nullable();
            
            $table->string('motivo', 15)->nullable();
            $table->date('fecha_devolucion')->nullable(); // Cambiado a DATE
            $table->integer('cantidad')->nullable();
            $table->timestamps();

            // Clave Foránea principal
            $table->foreign('cod_detallefactura')->references('cod_detallefactura')->on('detalle_factura');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('devolucion');
    }
};