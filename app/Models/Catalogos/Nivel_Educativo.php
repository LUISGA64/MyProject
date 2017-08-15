<?php

namespace App\Models\Catalogos;

use Illuminate\Database\Eloquent\Model;

class Nivel_Educativo extends Model
{
    protected $table = 'niveles_educativos';
    protected $primarykey = 'id';
    protected $fillable = ['nivel_educativo'];

    public function persona()
    {
    	return $this->belongsTo('App\Models\Principal\Persona');
    }
}
