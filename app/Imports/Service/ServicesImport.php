<?php

namespace App\Imports\Service;

use App\Models\Service;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ServicesImport implements ToModel, WithHeadingRow
{

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Service([
                'id'     => $row['id'],
                'parent_id'     => $row['parent_id'],
                'ar' => ["title" => $row['title_ar'],"desc" => $row['desc_ar']],
                'creator_id'     => $row['creator_id'],
        ]);
    }
}
