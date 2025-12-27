
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('detalle_factura', function (Blueprint $table) {
            $table->unsignedInteger('cod_detallefactura')->primary()->autoIncrement(); // INT(11) PK
            $table->string('cod_factura', 20)->nullable(); // FK a factura
            $table->unsignedInteger('cod_articulo')->nullable(); // FK a articulo
            $table->integer('cantidad')->nullable();
            $table->decimal('total', 10, 0)->nullable();
            $table->timestamps();

            // Claves Foráneas
            $table->foreign('cod_factura')->references('nro_factura')->on('factura');
            $table->foreign('cod_articulo')->references('id_articulo')->on('articulo');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('detalle_factura');
    }
};