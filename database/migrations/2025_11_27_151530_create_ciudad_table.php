
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ciudad', function (Blueprint $table) {
            // PK: Se define como unsignedInteger (INT(11))
            $table->unsignedInteger('codigo_ciudad')->primary(); 
            $table->string('nombre_ciudad', 30)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ciudad');
    }
};