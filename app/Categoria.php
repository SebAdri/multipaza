<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = ['nombre', 'descripcion', 'estado'];

    public function subcategorias()
    {
    	return $this->belongsTo(Local::Class, 'cate_local_subcate', 'categoria_id', 'local_id_id');
    }
}
