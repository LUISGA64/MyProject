<?php

namespace App\Models\Vivienda;

use Illuminate\Database\Eloquent\Model;

class Tipo_Alumbrado extends Model
{
    protected $table = 'tipos_alumbrado';
    protected $primaryKey = 'id';
    protected $fillable = ['tipo_alumbrado'];

    public function grupo_familiar()
   {
   		return $this->belongsTo('App\Models\Principal\Grupo_Familiar');
   }
}
