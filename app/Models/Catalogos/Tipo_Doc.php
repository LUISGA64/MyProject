<?php

namespace App\Models\Catalogos;

use Illuminate\Database\Eloquent\Model;

class Tipo_Doc extends Model
{
    protected $table = 'tipo_docs';
    protected $primaryKey = 'tipodocs_id';
    protected $fillable = ['codigo_doc', 'tipo_documento'];

    public function persona()
    {
    	return $this->belongsTo('App\Models\Principal\Persona');
    }

    public function integrantes()
    {
    	return $this->belongsTo('App\Models\Resguardo\Integrantes');
    }
}
