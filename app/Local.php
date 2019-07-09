<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Local extends Model
{
    protected $table = 'locales';

    public function subCategorias()
    {
    	return $this->belongsToMany(SubCategoria::Class, 'local_subcategoria', 'local_id', 'subcategoria_id');
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
