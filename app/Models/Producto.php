<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Producto
 *
 * @property $id
 * @property $codigo_producto
 * @property $id_categoria_producto
 * @property $descripcion_producto
 * @property $precio_compra_producto
 * @property $precio_venta_producto
 * @property $utilidad
 * @property $stock_producto
 * @property $minimo_stock_producto
 * @property $ventas_producto
 * @property $created_at
 * @property $updated_at
 *
 * @property Categoria $categoria
 * @property VentaDetalle[] $ventaDetalles
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Producto extends Model
{
    
    static $rules = [
		'codigo_producto' => 'required|unique:productos',
		'id_categoria_producto' => 'required',
		'descripcion_producto' => 'required',
		'precio_compra_producto' => 'required',
		'precio_venta_producto' => 'required',
		'stock_producto' => 'required',
		'minimo_stock_producto' => 'required',
		'ventas_producto' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['codigo_producto','id_categoria_producto','descripcion_producto','precio_compra_producto','precio_venta_producto','utilidad','stock_producto','minimo_stock_producto','ventas_producto'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function categoria()
    {
        return $this->hasOne('App\Models\Categoria', 'id', 'id_categoria_producto');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ventaDetalles()
    {
        return $this->hasMany('App\Models\VentaDetalle', 'id_producto', 'id');
    }
    

}
