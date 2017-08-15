<?php

namespace App\Models\Economia;

use Illuminate\Database\Eloquent\Model;

class Actividad_Economica extends Model
{
    protected $table = 'actividades_economicas';
    protected $primarykey = 'id';
    protected $fillable = ['actividad_economica'];

    public function tipo_actividad()
    {
    	return $this->hasOne('App\Models\Economia\Tipo_Actividad');
    }
}
