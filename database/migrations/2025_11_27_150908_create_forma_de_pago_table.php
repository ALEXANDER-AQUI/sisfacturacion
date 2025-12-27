
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('forma_de_pago', function (Blueprint $table) {
            // PK: Usamos unsignedInteger (INT(11))
            $table->unsignedInteger('id_formapago')->primary()->autoIncrement(); 
            $table->string('descripcion_formapago', 20)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('forma_de_pago');
    }
};