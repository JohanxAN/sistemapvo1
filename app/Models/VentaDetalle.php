<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class VentaDetalle
 *
 * @property $id
 * @property $id_boleta
 * @property $id_producto
 * @property $cantidad
 * @property $total_venta
 * @property $fecha_venta
 * @property $created_at
 * @property $updated_at
 *
 * @property Producto $producto
 * @property VentaCabecera $ventaCabecera
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class VentaDetalle extends Model
{
    
    static $rules = [
		'id_producto' => 'required',
		'cantidad' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_boleta','codigo_producto','descripcion_producto','cantidad',"precio_unitario",'total_venta','fecha_venta'];
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function ventaCabecera()
    {
        return $this->hasOne('App\Models\VentaCabecera', 'id', 'id_boleta');
    }
    

}
