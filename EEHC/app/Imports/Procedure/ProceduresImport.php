<?php

namespace App\Imports\Procedure;

use App\Models\Procedure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProceduresImport implements ToModel, WithHeadingRow
{

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Procedure([
                'id'     => $row['id'],
                'service_id'     => $row['service_id'],
                'order'     => $row['order'],
                'ar' => ["desc" => $row['desc_ar']],
                'creator_id'     => $row['creator_id'],
        ]);
    }
}
