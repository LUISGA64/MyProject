<?php 

namespace App\Models\Catalogos;

use Illuminate\Database\Eloquent\Model;

class Cargos extends Model
{
    protected $table = 'cargos';
    protected $primaryKey = 'cargo_id';
    protected $fillable = ['cargo', 'resguardo_id','principal','prioridad'];

    public function resguardo()
    {
    	return $this->belongsTo('App\Models\Localidad\Resguardo');
    }

    public function Integrantes()
    {
    	return $this->hasMany('App\Models\Resguardo\Integrantes');
    }

}



