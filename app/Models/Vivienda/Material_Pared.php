<?php

namespace App\Models\Vivienda;

use Illuminate\Database\Eloquent\Model;

class Material_Pared extends Model
{
    protected $table = 'material_paredes';
    protected $primaryKey = 'id';
    protected $fillable = ['material_pared'];

    public function grupo_familiar()
    {
    	return $this->belongsTo('App\Models\Principal\Grupo_Familiar');
    }
}
