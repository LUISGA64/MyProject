<?php

namespace App\Models\Vivienda;

use Illuminate\Database\Eloquent\Model;

class Eliminar_Excretas extends Model
{
    protected $table = 'eliminar_excretas';
    protected $primaryKey = 'id';
    protected $fillable = ['eliminar_excretas'];

    public function grupo_familiar()
   {
   		return $this->belongsTo('App\Models\Principal\Grupo_Familiar');
   }
}
