<?php

namespace App\Imports\Foundation;

use App\Models\Foundation;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class FoundationsImport implements ToModel, WithHeadingRow
{

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Foundation([
                'id'     => $row['id'],
                'creator_id'     => $row['creator_id'],
                'website'     => $row['website'],
                'map'     => $row['map'],
                'phone'     => $row['phone'],
                'landline'     => $row['landline'],
                'email'     => $row['email'],
                'ar' => ["name" => $row['name_ar'],"desc" => $row['desc_ar']],
        ]);
    }
}
