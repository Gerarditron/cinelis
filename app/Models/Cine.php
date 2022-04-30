<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cine
 *
 * @property $idCine
 * @property $nombre
 * @property $ubicacion
 * @property $created_at
 * @property $updated_at
 *
 * @property Pelicula[] $peliculas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Cine extends Model
{
    
    static $rules = [
		'idCine' => 'required',
		'nombre' => 'required',
		'ubicacion' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['idCine','nombre','ubicacion'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function peliculas()
    {
        return $this->hasMany('App\Models\Pelicula', 'idCine', 'idCine');
    }
    

}
