
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('factura', function (Blueprint $table) {
            $table->string('nro_factura', 20)->primary(); // VARCHAR(20) PK
            $table->string('cod_cliente', 15)->nullable(); // FK a cliente
            $table->string('nombre_empleado', 30)->nullable();
            $table->date('fecha_facturacion')->nullable(); // Cambiado a DATE
            $table->unsignedInteger('cod_formapago')->nullable(); // FK a forma_de_pago
            $table->decimal('total_factura', 10, 0)->nullable(); // DECIMAL(10,0)
            $table->decimal('iva', 10, 0)->nullable(); // DECIMAL(10,0)
            $table->timestamps();

            // Claves Foráneas
            $table->foreign('cod_cliente')->references('documento')->on('cliente');
            $table->foreign('cod_formapago')->references('id_formapago')->on('forma_de_pago');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('factura');
    }
};