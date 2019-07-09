<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategoria extends Model
{
    protected $table = 'subcategorias';

    public function categorias()
    {
    	return $this->belongsToMany(Categoria::Class, 'categorias_subcategorias', 'subcategoria_id', 'categoria_id');
    }

    public function locales()
    {
    	return $this->belongsToMany(Local::Class, 'local_subcategoria');
    }
}
