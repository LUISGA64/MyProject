<?php

namespace App\Models\Localidad;

use Illuminate\Database\Eloquent\Model;

class Vereda extends Model
{
    protected $table = 'veredas';
    protected $primarykey = 'id';
    protected $fillable = ['vereda','id_resguardo'];


    public function resguardo()
    {
    	return $this->belongsTo('App\Models\Localidad\Resguardo');
    }
}
