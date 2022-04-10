<?php

namespace App\Imports\Regulation;

use App\Models\Regulation;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class RegulationsImport implements ToModel, WithHeadingRow
{

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Regulation([
                'id'     => $row['id'],
                'service_id'     => $row['service_id'],
                'ar' => ["desc" => $row['desc_ar']],
                'creator_id'     => $row['creator_id'],
        ]);
    }
}
