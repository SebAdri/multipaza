<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PalabraClave extends Model
{
    protected $fillable = ['palabras'];
    protected $table = 'palabras_claves';

    public function locales()
    {
    	return $this->belongsToMany(Local::Class,'locales_palabrasclaves','palabrasclaves_id','local_id');
    }
}
