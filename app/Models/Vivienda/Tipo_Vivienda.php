<?php

namespace App\Models\Vivienda;

use Illuminate\Database\Eloquent\Model;

class Tipo_Vivienda extends Model
{
    protected $table = 'tipos_vivienda';
    protected $primarykey = 'id';
    protected $fillable = ['tipo_vivienda'];

    public function grupo_familiar()
    {
    	return $this->belongsTo('App\Models\Principal\Grupo_Familiar');
    }
}
