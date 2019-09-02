<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PalabraPivot extends Model
{
    protected $table = 'locales_palabrasclaves';
    protected $fillable = ['local_id', 'palabrasclaves_id'];
}
