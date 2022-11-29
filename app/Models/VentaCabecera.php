<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class VentaCabecera
 *
 * @property $id
 * @property $id_empresa
 * @property $descripcion
 * @property $subtotal
 * @property $IVA
 * @property $total_venta
 * @property $fecha_venta
 * @property $created_at
 * @property $updated_at
 *
 * @property Empresa $empresa
 * @property VentaDetalle[] $ventaDetalles
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class VentaCabecera extends Model
{
    
    static $rules = [
		'id_empresa',
		'descripcion',
		'subtotal',
		'IVA',
		'total_venta',
		'fecha_venta',
        'monto_efectivo' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_empresa','descripcion','subtotal','IVA','total_venta','fecha_venta', 'monto_efectivo'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function empresa()
    {
        return $this->hasOne('App\Models\Empresa', 'id', 'id_empresa');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ventaDetalles()
    {
        return $this->hasMany('App\Models\VentaDetalle', 'id_boleta', 'id');
    }
    

}
