<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Centro
 *
 * @property $id
 * @property $nombre
 * @property $parroquia_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Parroquia $parroquia
 * @property Representante[] $representantes
 * @property Integrante[] $integrantes
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Centro extends Model
{
    
    static $rules = [
		'nombre' => 'required|string',
		'parroquia_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','parroquia_id'];


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
    public function representantes()
    {
        return $this->hasMany(\App\Models\Representante::class, 'id', 'centro_id');
    }
    
    public function integrantes()
    {
        return $this->hasMany(\App\Models\Integrante::class, 'id', 'centro_id');
    }
}
