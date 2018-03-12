<?php

namespace App\Models\Localidad;

use Illuminate\Database\Eloquent\Model;

class Resguardo extends Model
{
    protected $table = 'resguardos';
    protected $primaryKey = 'id';
    protected $fillable = [
    'resguardo',
    'tipodoc_resg',
    'identificacion_resg',
    'pueblo',
    'resolucion',
    'direccion_resg',
    'jurisdiccion',
    'logo_resg',
    'email_resg'
    ];

    public function veredas()
    {
        return $this->hasOne('App\Models\Localidad\Vereda');
    }

    public function grupo_familiar()
    {
        return $this->belongsTo('App\Models\Principal\Grupo_Familiar');
    }

    public function cargos ()
    {
        return $this->hasMany('App\Models\Catalogos\Cargos');
    }

    public function aval()
    {
        return $this->hasOne(Aval::class);
    }
}
