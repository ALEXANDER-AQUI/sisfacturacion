<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    protected $table = 'factura';

    protected $primaryKey = 'nro_factura'; // <--- tu PK
    public $incrementing = true;           // o false si no es autoincrement
    protected $keyType = 'int';            // o 'string' si no es número

    protected $fillable = [
        'nro_factura',
        'cod_cliente',
        'nombre_empleado',
        'fecha_facturacion',
        'cod_formapago',
        'total_factura',
    ];

    public function cliente()
    {
        return $this->belongsTo(\App\Models\Cliente::class, 'cod_cliente', 'documento');
    }

    public function formaPago()
    {
        return $this->belongsTo(\App\Models\FormaDePago::class, 'cod_formapago', 'id_formapago');
    }
}
