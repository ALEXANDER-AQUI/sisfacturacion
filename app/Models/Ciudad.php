<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
      protected $table = 'ciudad';
    protected $primaryKey = 'codigo_ciudad';
    public $incrementing = true;     // <- Autoincremental ACTIVADO
    protected $keyType = 'int';      // <- El código es numérico

    protected $fillable = [
        'nombre_ciudad'             // <- OJO: QUITA código_ciudad
    ];

    public function clientes()
    {
        return $this->hasMany(\App\Models\Cliente::class, 'cod_ciudad', 'codigo_ciudad');
    }

    public function proveedores()
    {
        return $this->hasMany(\App\Models\Proveedor::class, 'cod_ciudad', 'codigo_ciudad');
    }
}
