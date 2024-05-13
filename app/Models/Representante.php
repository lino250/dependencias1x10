<?php

namespace App\Models;
use Illuminate\Validation\Rule;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Representante
 *
 * @property $id
 * @property $cedula
 * @property $nombres
 * @property $telefono
 * @property $telefono_alternativo
 * @property $centro_id
 * @property $parroquia_id
 * @property $dependencia_id
 * @property $coordinacion_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Centro $centro
 * @property Coordinacion $coordinacion
 * @property Dependencia $dependencia
 * @property Parroquia $parroquia
 * @property RepresentanteIntegrante[] $representanteIntegrantes
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Representante extends Model
{
    
     // Otras propiedades y métodos de tu modelo...

     public static $rules = [
        'cedula' => 'required|string',
        'nombres' => 'required|string',
        'telefono' => 'required|string',
        'telefono_alternativo' => 'string',
        'centro_id' => 'required',
        'parroquia_id' => 'required',
        'dependencia_id' => 'required',        
    ];

    public static function getRules()
    {
        // Regla de validación condicional para coordinación_id
        $rules = [
            'coordinacion_id' => [
                'required',
            ],
        ];

        // Combinar las reglas con las reglas estáticas
        return array_merge(self::$rules, $rules);
    }

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['cedula','nombres','telefono','telefono_alternativo','centro_id','parroquia_id','dependencia_id','coordinacion_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function centro()
    {
        return $this->belongsTo(\App\Models\Centro::class, 'centro_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function coordinacion()
    {
        return $this->belongsTo(\App\Models\Coordinacion::class, 'coordinacion_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function dependencia()
    {
        return $this->belongsTo(\App\Models\Dependencia::class, 'dependencia_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parroquia()
    {
        return $this->belongsTo(\App\Models\Parroquia::class, 'parroquia_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function integrantesR()
    {
        return $this->belongsToMany(Integrante::class, 'representante_integrante', 'representante_id', 'integrante_id');
    }
    public function representante()
    {
        return $this->belongsToMany(Integrante::class, 'representante_integrante', 'representante_id', 'integrante_id');
    }
    
    

}
