<?php

namespace App\Models\Principal;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table = 'personas';
    protected $primaryKey = 'id_persona';
    
    protected $fillable = [
    	'tipodoc_id',
    	'identificacion',
        'expedicion',
    	'nombre_1',
    	'nombre_2',
    	'apellido_1',
    	'apellido_2',
    	'telefono',
    	'direccion',
    	'genero_id',
    	'id_estado_civil',
    	'cabeza_familia',
    	'nivelEducativo_id',
    	'grupofamiliar_id',
        'ocupacion_id',
        'parentesco_id',
        'fecha_nacimiento',
        'edad',
        'vereda_id',
        'fullName'
    ];


    public function grupo_familiar()
    {
        //return $this->belongsto('App\Models\Principal\Grupo_Familiar');
        return $this->belongsto(Grupo_Familiar::class,'id_person');
    }

    public function tipo_doc()
    {
    	return $this->hasOne('App\Models\Catalogos\Tipo_Doc');
    }

    public function generos()
    {
    	return $this->belongsto('App\Models\Catalogos\Genero');
    }

    public function estado_civil()
    {
    	return $this->hasOne('App\Models\Catalogos\Estado_Civil');
    }

    public function nivel_educativo()
    {
    	return $this->hasOne('App\Models\Catalogos\Nivel_Educativo');
    }

    public function ocupacion()
    {
    	return $this->hasOne('App\Models\Catalogos\Ocupacion');
    }

    public function parentesco()
    {
    	return $this->hasOne('App\Models\Catalogos\Parentesco');
    }

    public function vereda()
    {
        return $this->hasOne('App\Models\Localidad\Vereda');
    }

    public function aval()
    {
        return $this->hasMany(Aval::class, persona_id);
    }

}
