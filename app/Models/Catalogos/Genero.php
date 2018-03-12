<?php

namespace App\Models\Catalogos;

use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    protected $table = 'generos';
    protected $primaryKey = 'generos_id';
    protected $fillable = ['cod_genero', 'genero'];

    public function persona()
    {
    	//return $this->belongsTo('App\Models\Principal\Persona');
    	//
    	return $this->hasMany('App\Models\Principal\Persona');
    }
    
}
