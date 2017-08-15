<?php

namespace App\Models\Catalogos;

use Illuminate\Database\Eloquent\Model;

class Ocupacion extends Model
{
    protected $table = 'ocupaciones';
    protected $primarykey = 'id';
    protected $fillable = ['codigo_ocp', 'ocupacion'];

    public function persona()
    {
    	return $this->belongsTo('App\Models\Principal\Persona');
    }
}
