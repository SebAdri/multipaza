<?php

namespace App\Imports;

use App\SubCategoria;
use Maatwebsite\Excel\Concerns\ToModel;

class SubcategoriaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new SubCategoria([
            'id'     => $row[0],
            'nombre'       => $row[1], 
            'descripcion'   => $row[2],
            'estado'     => $row[3],
        ]);
    }
}
