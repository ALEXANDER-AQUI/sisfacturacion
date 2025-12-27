<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    protected $table = 'articulo';

    protected $primaryKey = 'id_articulo';

    public $incrementing = true;

    protected $keyType = 'int';

    protected $perPage = 20;

    protected $fillable = [
        'id_articulo',
        'descripcion',
        'precio_venta',
        'precio_costo',
        'stock',
        'cod_tipo_articulo',
        'cod_proveedor',
        'fecha_ingreso'
    ];

    /**
     * Proveedor
     */
    public function proveedor()
    {
        return $this->belongsTo(\App\Models\Proveedor::class, 'cod_proveedor', 'no_documento');
    }

    /**
     * Tipo Artículo
     */
    public function tipoArticulo()
    {
        return $this->belongsTo(\App\Models\TipoArticulo::class, 'cod_tipo_articulo', 'id_tipoarticulo');
    }

    /**
     * Detalle Factura
     */
    public function detalleFacturas()
    {
        return $this->hasMany(\App\Models\DetalleFactura::class, 'cod_articulo', 'id_articulo');
    }
}
