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
 * @property $created_at
 * @property $updated_at
 *
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
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['cedula','nombres','apellidos','telefono','telefono_alternativo'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
  
     public function representantesI()
     {
         return $this->belongsToMany(Integrante::class, 'representante_integrante', 'representante_id', 'integrante_id');
     }
    

}
