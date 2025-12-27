<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Devolucion extends Model
{
    // 👇 Nombre real de la tabla
    protected $table = 'devolucion';

    // 👇 Clave primaria real
    protected $primaryKey = 'cod_detallefactura';

    // 👇 No es autoincremental
    public $incrementing = false;

    // 👇 Tipo de la PK
    protected $keyType = 'int';

    protected $perPage = 20;

    protected $fillable = [
        'cod_detallefactura',
        'cod_factura',
        'cod_articulo',
        'motivo',
        'fecha_devolucion',
        'cantidad'
    ];

    /**
     * Relación con DetalleFactura
     */
    public function detalleFactura()
    {
        return $this->belongsTo(
            \App\Models\DetalleFactura::class,
            'cod_detallefactura',
            'cod_detallefactura'
        );
    }
}
