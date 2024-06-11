<?php

namespace App\Imports\Branch;

use App\Models\BranchVideo;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BranchVideosImport implements ToModel, WithHeadingRow
{

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new BranchVideo([
                'id'     => $row['id'],
                'branch_id'     => $row['branch_id'],
                'creator_id'     => $row['creator_id'],
                'ar' => ["video" => $row['video_ar']],

        ]);
    }
}
