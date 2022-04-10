<?php

namespace App\Imports\Branch;

use App\Models\Branch;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BranchsImport implements ToModel, WithHeadingRow
{

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Branch([
                'id'     => $row['id'],
                'foundation_id'     => $row['foundation_id'],
                'city_id'     => $row['city_id'],
                'ar' => ["name" => $row['name_ar'],"desc" => $row['desc_ar'],"note" => $row['note_ar'],"address" => $row['address_ar']],
                'map'     => $row['map'],
                'pwd_status'     => $row['pwd_status'],
                'phone1'     => $row['phone1'],
                'phone2'     => $row['phone2'],
                'landline1'     => $row['landline1'],
                'landline2'     => $row['landline2'],
                'email'     => $row['email'],
                'creator_id'     => $row['creator_id'],
        ]);
    }
}
