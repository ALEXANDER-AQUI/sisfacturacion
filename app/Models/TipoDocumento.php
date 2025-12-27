<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoDocumento extends Model
{
    protected $table = 'tipo_documento';

    protected $primaryKey = 'id_tipo_documento';

    public $incrementing = true;

    protected $keyType = 'int';

    protected $perPage = 20;

    protected $fillable = ['descripcion'];

    /**
     * Un tipo de documento tiene muchos clientes
     */
    public function clientes()
    {
        return $this->hasMany(\App\Models\Cliente::class, 'cod_tipo_documento', 'id_tipo_documento');
    }

    /**
     * Un tipo de documento tiene muchos proveedores
     */
    public function proveedores()
    {
        return $this->hasMany(\App\Models\Proveedor::class, 'cod_tipo_documento', 'id_tipo_documento');
    }
}
