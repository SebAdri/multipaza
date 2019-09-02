<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class LocalPivot extends Pivot
{
    protected $table= 'cate_local_subcate';

    protected $fillable = ['id','local_id','categoria_id','subcategoria_id'];
}
