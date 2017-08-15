<?php

namespace App\Models\Catalogos;

use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    protected $table = 'generos';
    protected $primarykey = 'id';
    protected $fillable = ['cod_genero', 'genero'];

    public function persona()
    {
    	return $this->belongsTo('App\Models\Principal\Persona');
    }
    
}
