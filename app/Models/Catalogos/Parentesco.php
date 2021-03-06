<?php

namespace App\Models\Catalogos;

use Illuminate\Database\Eloquent\Model;

class Parentesco extends Model
{
    protected $table = 'parentescos';
    protected $primaryKey = 'parentescos_id';
    protected $fillable = ['parentesco'];

    public function persona()
    {
    	return $this->belongsTo('App\Models\Principal\Persona');
    }
}
