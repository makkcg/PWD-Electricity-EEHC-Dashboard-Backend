<?php

namespace App\Imports\Branch;

use App\Models\BranchSound;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BranchSoundsImport implements ToModel, WithHeadingRow
{

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new BranchSound([
                'id'     => $row['id'],
                'branch_id'     => $row['branch_id'],
                'creator_id'     => $row['creator_id'],
                'ar' => ["sound" => $row['sound_ar']],

        ]);
    }
}
