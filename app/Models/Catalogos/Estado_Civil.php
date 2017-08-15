<?php

namespace App\Models\Catalogos;

use Illuminate\Database\Eloquent\Model;

class Estado_Civil extends Model
{
    protected $table = 'estados_civiles';
    protected $primarykey = 'id';
    protected $fillable = ['estado_civil'];

    public function persona()
    {
    	return $this->belongsTo('App\Models\Principal\Persona');
    }
}
