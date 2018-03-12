<?php

namespace App\Models\Resguardo;

use Illuminate\Database\Eloquent\Model;

class Integrantes extends Model
{
    protected $table = 'integrantes';
    protected $primaryKey = 'integrantes_id';
    protected $fillable = [
    	'integrante',
    	'identificacion',
    	'tipodoc_id',
    	'cargo_id',
    	'vigencia_inicio'
    ];

    public function cargos()
    {
    	return $this->belongsTo('App\Models\Catalogos\Cargos');
    }

    public function tipo_doc()
    {
    	return $this->hasOne('App\Models\Catalogos\Tipo_Doc');
    }
}
