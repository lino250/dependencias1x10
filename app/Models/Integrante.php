<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Integrante
 *
 * @property $id
 * @property $cedula
 * @property $nombres
 * @property $apellidos
 * @property $telefono
 * @property $telefono_alternativo
 * @property $parroquia_id
 * @property $centro_id
 * @property $created_at
 * @property $updated_at
 *
 * 
 * @property Parroquia $parroquia
 * @property Centro $centro
 * @property RepresentanteIntegrante[] $representanteIntegrantes
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Integrante extends Model
{
    
    static $rules = [
		'cedula' => 'required|string',
		'nombres' => 'required|string',
		'apellidos' => 'required|string',
		'telefono' => 'required|string',
		'telefono_alternativo' => 'string',
    'parroquia_id' => 'required',
    'centro_id' => 'required',
		
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['cedula','nombres','apellidos','telefono','telefono_alternativo','parroquia_id','centro_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
  
     public function representantesI()
     {
         return $this->belongsToMany(Integrante::class, 'representante_integrante', 'representante_id', 'integrante_id');
     }
    
     public function parroquia()
     {
         return $this->belongsTo(\App\Models\Parroquia::class, 'parroquia_id', 'id');
     }
     public function centro()
     {
         return $this->belongsTo(\App\Models\Centro::class, 'centro_id', 'id');
     }
}
