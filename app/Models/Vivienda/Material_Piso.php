<?php

namespace App\Models\Vivienda;

use Illuminate\Database\Eloquent\Model;

class Material_Piso extends Model
{
    protected $table = 'material_pisos';
    protected $primariKey = 'id';
    protected $fillable = ['material_piso'];

    
    public function grupo_familiar()
    {
    	return $this->belongsTo('App\Models\Principal\Grupo_Familiar');
    }

}
