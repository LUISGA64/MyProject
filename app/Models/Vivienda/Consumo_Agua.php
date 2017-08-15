<?php

namespace App\Models\Vivienda;

use Illuminate\Database\Eloquent\Model;

class Consumo_Agua extends Model
{
    protected $table = 'consumo_agua';
    protected $primarykey = 'id';
    protected $fillable = ['consumo_agua'];

    public function grupo_familiar()
    {
    	return $this->belongsTo('App\Models\Principal\Grupo_Familiar');
    }
}
