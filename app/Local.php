<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Local extends Model
{
    protected $table = 'locales';
    protected $fillable = ['id', 'nombre', 'ubicacion', 'referencia','estado', 'foto_principal'];

    public function subCategorias()
    {
    	return $this->belongsToMany(SubCategoria::Class, 'cate_local_subcate', 'local_id', 'subcategoria_id');
    }

    public function Categorias()
    {
        return $this->belongsToMany(Categoria::Class, 'cate_local_subcate', 'local_id', 'categoria_id');
    }

    public function promociones()
    {
    	return $this->hasMany(Promocion::Class);
    }

    public function palabrasClaves()
    {
        return $this->belongsToMany(PalabraClave::Class,'locales_palabrasclaves', 'local_id', 'palabrasclaves_id');
    }
}
