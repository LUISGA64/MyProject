<?php

namespace App\Models\Resguardo;

use Illuminate\Database\Eloquent\Model;

class Aval extends Model
{
    protected $table = 'avals';
    protected $primaryKey = 'avals_id';
    protected $fillable = [
    	'persona_id',
    	'resguardo_id',
    	'vigencia',
    	'detalle',
        'formato',
        'cargoAspirante',
        'entidadSolicita'
    ];


    public function persona()
    {
    	return $this->belongsTo(Persona::class);
    }

    public function resguardo()
    {
    	return $this->belongsto(Resguardo::class);
    }

}



