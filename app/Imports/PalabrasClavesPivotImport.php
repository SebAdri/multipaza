<?php

namespace App\Imports;

use App\PalabraPivot;
use Maatwebsite\Excel\Concerns\ToModel;

class PalabrasClavesPivotImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new PalabraPivot([
            'local_id' => $row[0],
            'palabrasclaves_id' => $row[1],
        ]);
    }
}
