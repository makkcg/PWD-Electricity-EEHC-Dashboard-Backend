<?php

namespace App\Imports\Regulation;

use App\Models\RegulationImage;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class RegulationImagesImport implements ToModel, WithHeadingRow
{

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new RegulationImage([
                'id'     => $row['id'],
                'regulation_id'     => $row['regulation_id'],
                'creator_id'     => $row['creator_id'],
                'image'     => $row['image'],
        ]);
    }
}
