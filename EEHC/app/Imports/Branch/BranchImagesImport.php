<?php

namespace App\Imports\Branch;

use App\Models\BranchImage;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BranchImagesImport implements ToModel, WithHeadingRow
{

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new BranchImage([
                'id'     => $row['id'],
                'branch_id'     => $row['branch_id'],
                'creator_id'     => $row['creator_id'],
                'ar' => ["image" => $row['image_ar']],
        ]);
    }
}
