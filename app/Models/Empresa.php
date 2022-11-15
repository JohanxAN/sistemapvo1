<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Empresa
 *
 * @property $id
 * @property $razon_social
 * @property $rut
 * @property $direccion
 * @property $marca
 * @property $serie_boleta
 * @property $nro_correlativo_venta
 * @property $email
 * @property $created_at
 * @property $updated_at
 *
 * @property VentaCabecera[] $ventaCabeceras
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Empresa extends Model
{
    
    static $rules = [
		'razon_social' => 'required',
		'rut' => 'required',
		'direccion' => 'required',
		'marca' => 'required',
		'serie_boleta' => 'required',
		'nro_correlativo_venta' => 'required',
		'email' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['razon_social','rut','direccion','marca','serie_boleta','nro_correlativo_venta','email'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ventaCabeceras()
    {
        return $this->hasMany('App\Models\VentaCabecera', 'id_empresa', 'id');
    }
    

}
