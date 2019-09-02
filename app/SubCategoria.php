<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategoria extends Model
{
    protected $table = 'subcategorias';
    protected $fillable = ['id', 'nombre', 'descripcion', 'estado'];

    // public function categorias()
    // {
    // 	return $this->belongsToMany(Categoria::Class, 'categorias_subcategorias', 'subcategoria_id', 'categoria_id');
    // }

    public function locales()
    {
    	return $this->belongsTo(Local::Class, 'cate_local_subcate', 'categoria_id', 'local_id_id');
    }
}
