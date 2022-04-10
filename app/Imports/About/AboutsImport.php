<?php

namespace App\Imports\About;

use App\Models\About;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AboutsImport implements ToModel, WithHeadingRow
{

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new About([
                'id'     => $row['id'],
                'creator_id'     => $row['creator_id'],
                'ar' => ["desc" => $row['desc_ar']],

        ]);
    }
}
