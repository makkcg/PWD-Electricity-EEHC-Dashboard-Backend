<?php

namespace App\Imports\Procedure;

use App\Models\ProcedureImage;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProcedureImagesImport implements ToModel, WithHeadingRow
{

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new ProcedureImage([
                'id'     => $row['id'],
                'procedure_id'     => $row['procedure_id'],
                'creator_id'     => $row['creator_id'],
                'image'     => $row['image'],
        ]);
    }
}
