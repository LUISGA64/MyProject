<?php

namespace App\Models\Principal;

use Illuminate\Database\Eloquent\Model;

class Grupo_Familiar extends Model
{
    protected $table = 'grupos_familiares';
    protected $primaryKey = 'id';
    protected $fillable = [
    	'numero_ficha',
    	'direccion',
    	'zona',
    	'id_tipo_vivienda',
    	'id_material_paredes',
    	'id_material_pisos',
    	'id_material_techo',
    	'id_tipo_actividad',
        'id_acteconomica',
    	'id_consumo_agua',
    	'id_tipo_alumbrado',
    	'id_elimina_excretas',
    	'id_aguas_servidas',
    	'id_vector_viviendas',
    	'id_riesgo_vivienda',
        'id_resguardo'
    ];

    public function persona()
    {        
        //return $this->hasmany(Persona::class, 'id_persona','id');    id_persona
        //return $this->hasMany(Persona::Class,'grupofamiliar_id');
        return $this->hasMany(Persona::class);
    }

    public function tipo_vivienda()
    {
    	return $this->hasOne('App\Models\Vivienda\Tipo_Vivienda');
    }

    public function material_pared()
    {
    	return $this->hasMany('App\Models\Vivienda\Material_Pared');
    }

    public function material_piso()
    {
    	return $this->hasMany('App\Models\Vivienda\Material_Piso');
    }

    public function material_techo()
    {
        return $this->hasOne('App\Models\Vivienda\Material_Techo');
    }

    public function tipo_actividad()
    {
    	return $this->hasmany('App\Models\Economia\Tipo_Actividad');
    }

    public function vector_vivienda()
    {
    	return $this->hasMany('App\Models\Vivienda\Vector_Vivienda');
    }

    public function riesgo_vivienda()
    {
    	return $this->hasOne('App\Models\Vivienda\Riesgo_Vivienda');
    }

    public function resguardo()
    {
        return $this->hasOne('App\Models\Localidad\Resguardo');
    }

    public function getNumero_FichaAttribute($value)
    {
        $ficha = 0;
        $this->attribute['numero_ficha']=$ficha+1;
    }

    public function agua_servida()
    {
        return $this->hasmany('App\Models\Vivienda\Agua_Servida');
    }

    public function consumo_agua()
    {
        return $this->hasmany('App\Models\Vivienda\Consumo_Agua');
    }

    public function elimina_excretas()
    {
        return $this->hasmany('App\Models\Vivienda\Eliminar_Excretas');   
    }

    public function tipo_alumbrado()
    {
        return $this->hasmany('App\Models\Vivienda\Tipo_Alumbrado');
    }

    public function actividad_economica()
    {
        return $this->hasOne('App\Models\Economia\Actividad_Economica');
    }

}
