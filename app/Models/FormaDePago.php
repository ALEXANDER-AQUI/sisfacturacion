<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormaDePago extends Model
{
    protected $table = 'forma_de_pago';

    protected $primaryKey = 'id_formapago';

    public $incrementing = true;

    protected $keyType = 'int';

    protected $perPage = 20;

    protected $fillable = ['descripcion_formapago'];

    /**
     * Una forma de pago tiene muchas facturas
     */
    public function facturas()
    {
        return $this->hasMany(\App\Models\Factura::class, 'cod_formapago', 'id_formapago');
    }
}
