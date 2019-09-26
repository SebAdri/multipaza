<?php

namespace App\Imports;

use App\Local;
use Maatwebsite\Excel\Concerns\ToModel;

class LocalImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Local([
            'id'     => $row[0],
            'nombre'       => $row[1], 
            'ubicacion'   => $row[2],
            'referencia'   => $row[3],
            'estado'     => $row[4],
            'foto_principal'      => $row[5]
        ]);
    }
}
