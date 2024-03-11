<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Parroquia
 *
 * @property $id
 * @property $nombre
 * @property $created_at
 * @property $updated_at
 *
 * @property Centro[] $centros
 * @property Representante[] $representantes
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Parroquia extends Model
{
    
    static $rules = [
		'nombre' => 'required|string',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function centros()
    {
        return $this->hasMany(\App\Models\Centro::class, 'id', 'parroquia_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function representantes()
    {
        return $this->hasMany(\App\Models\Representante::class, 'id', 'parroquia_id');
    }
    

}
