<?php

namespace App\Imports;

use App\LocalPivot;
use Maatwebsite\Excel\Concerns\ToModel;

class PivotImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new LocalPivot([
            'id'     => $row[0],
            'local_id'       => $row[1], 
            'categoria_id'   => $row[2],
            'subcategoria_id'     => $row[3],
        ]);
    }
}
