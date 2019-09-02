<?php

namespace App\Imports;

use App\PalabraClave;
use Maatwebsite\Excel\Concerns\ToModel;

class PalabrasClavesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new PalabraClave([
            'id' => $row[0],
            'palabras' => $row[1],
        ]);
    }
}
