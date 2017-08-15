<?php

namespace App\Models\Vivienda;

use Illuminate\Database\Eloquent\Model;

class Material_Techo extends Model
{
    protected $table = 'materiales_techo';
    protected $primarykey = 'id';
    protected $fillable = ['material_techo'];


    public function grupo_familiar()
    {
    	return $this->belongsTo('App\Models\Principal\Grupo_Familiar');
    }
}
