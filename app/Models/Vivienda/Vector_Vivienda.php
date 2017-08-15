<?php

namespace App\Models\Vivienda;

use Illuminate\Database\Eloquent\Model;

class Vector_Vivienda extends Model
{
    protected $table = 'vectores_vivienda';
    protected $primarykey = 'id';
    protected $fillable = ['vector_vivienda'];

   public function grupo_familiar()
   {
   		return $this->belongsTo('App\Models\Principal\Grupo_Familiar');
   }
}
