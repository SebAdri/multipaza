<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = ['nombre', 'descripcion', 'estado', 'imagen'];

    public function locales()
    {
    	return $this->belongsToMany(Local::Class, 'cate_local_subcate', 'categoria_id', 'local_id');
    }

    public function subcategorias()
    {
    	return $this->belongsToMany(Categoria::Class, 'cate_local_subcate', 'categoria_id', 'subcategoria_id');
    }
}
