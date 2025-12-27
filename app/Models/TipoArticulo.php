<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoArticulo extends Model
{
    protected $table = 'tipo_articulo';

    protected $primaryKey = 'id_tipoarticulo';

    public $incrementing = true; // si es AUTO_INCREMENT

    protected $keyType = 'int';

    protected $perPage = 20;

    protected $fillable = [
        'id_tipoarticulo',
        'descripcion_articulo'
    ];

    /**
     * Relación con Articulos
     */
    public function articulos()
    {
        return $this->hasMany(\App\Models\Articulo::class, 'cod_tipo_articulo', 'id_tipoarticulo');
    }
}
