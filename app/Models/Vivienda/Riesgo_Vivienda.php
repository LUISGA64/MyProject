<?php

namespace App\Models\Vivienda;

use Illuminate\Database\Eloquent\Model;

class Riesgo_Vivienda extends Model
{
    protected $table = 'riesgos_vivienda';
    protected $primarykey = 'id';
    protected $fillable = ['riesgo'];

    public function grupo_familiar()
   {
   		return $this->belongsTo('App\Models\Principal\Grupo_Familiar');
   }
}
