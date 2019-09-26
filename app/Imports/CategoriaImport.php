<?php

namespace App\Imports;

use App\Categoria;
use Maatwebsite\Excel\Concerns\ToModel;

class CategoriaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Categoria([
            'id' => $row[0],
            'nombre' => $row[1],
            'descripcion' => $row[2],
            'estado' => $row[3],
            'imagen' => $row[4],
        ]);
    }
}
