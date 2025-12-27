<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleFactura extends Model
{
    protected $table = 'detalle_factura';
    protected $primaryKey = 'cod_detallefactura';
    public $incrementing = true;
    protected $keyType = 'int';
    protected $fillable = [
        'cod_factura',
        'cod_articulo',
        'cantidad',
        'total'
    ];

    // Relación con Factura
    public function factura()
    {
        return $this->belongsTo(\App\Models\Factura::class, 'cod_factura', 'nro_factura');
    }

    // Relación con Articulo
    public function articulo()
    {
        return $this->belongsTo(\App\Models\Articulo::class, 'cod_articulo', 'id_articulo');
    }
}
