<?php

namespace App\Models\Vivienda;

use Illuminate\Database\Eloquent\Model;

class Agua_Servida extends Model
{
    protected $table = 'aguas_servidas';
    protected $primarykey = 'id';
    protected $fillable = ['det_aguaservidas'];

    
    public function grupo_familiar()
    {
    	return $this->belongsTo('App\Models\Principal\Grupo_Familiar');
    }
}
