<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    //Types:
    //0 - Documentos
    //1 - Presentaciones
    //2 - Info Inversionistas
    protected $table = 'files';

    public function user(){
    	return $this->belongsTo('App\User', 'user_id');
    }
}
