<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table = 'proveedor';

    protected $primaryKey = 'no_documento';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'no_documento',
        'cod_tipo_documento',
        'nombre',
        'apellido',
        'nombre_comercial',
        'direccion',
        'cod_ciudad',
        'telefono'
    ];

    public function ciudad()
    {
        return $this->belongsTo(\App\Models\Ciudad::class, 'cod_ciudad', 'codigo_ciudad');
    }

    public function tipoDocumento()
    {
        return $this->belongsTo(\App\Models\TipoDocumento::class, 'cod_tipo_documento', 'id_tipo_documento');
    }

    public function articulos()
    {
        return $this->hasMany(\App\Models\Articulo::class, 'cod_proveedor', 'no_documento');
    }
}
