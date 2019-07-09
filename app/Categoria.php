<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = ['nombre', 'descripcion', 'estado'];

    public function subcategorias()
    {
    	return $this->belongsToMany(SubCategoria::Class, 'categorias_subcategorias', 'categoria_id', 'subcategoria_id');
    }
}
