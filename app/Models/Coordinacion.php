<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Coordinacion
 *
 * @property $id
 * @property $nombre
 * @property $dependencia_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Dependencia $dependencia
 * @property Representante[] $representantes
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Coordinacion extends Model
{
    
    static $rules = [
		'nombre' => 'required|string',
		'dependencia_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','dependencia_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function dependencia()
    {
        return $this->belongsTo(\App\Models\Dependencia::class, 'dependencia_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function representantes()
    {
        return $this->hasMany(\App\Models\Representante::class, 'id', 'coordinacion_id');
    }
    

}
