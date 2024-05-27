<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Voto
 *
 * @property $id
 * @property $cedula
 * @property $voto
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Voto extends Model
{
    

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['cedula', 'voto'];



}
