<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategoria extends Model
{
    protected $table = 'subcategorias';
    protected $fillable = ['id', 'nombre', 'descripcion', 'estado', 'imagen'];

    public function categorias($categoria_id)
    {
    	return $this->belongsToMany(Categoria::Class, 'cate_local_subcate', 'subcategoria_id', 'categoria_id');
    }

    public function locales()
    {
    	return $this->belongsToMany(Local::Class, 'cate_local_subcate', 'subcategoria_id', 'local_id');
    }
}
