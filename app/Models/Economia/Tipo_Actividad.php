<?php

namespace App\Models\Economia;

use Illuminate\Database\Eloquent\Model;

class Tipo_Actividad extends Model
{
    protected $table = 'tipo_actividades';
    protected $primarykey = 'id';
    protected $fillable = ['tipo_actividad', 'id_actividad_economica'];


    public function actividad_economica()
    {
    	return $this->belongsTo('App\Models\Economia\Actividad_Economica');
    }

    public function grupo_familiar()
    {
    	return $this->belongsTo('App\Models\Principal\Grupo_Familiar');
    }
}
