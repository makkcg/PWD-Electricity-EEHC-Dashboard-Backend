<?php

namespace App\Imports\Foundation;

use App\Models\FoundationVideo;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class FoundationVideosImport implements ToModel, WithHeadingRow
{

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new FoundationVideo([
                'id'     => $row['id'],
                'foundation_id'     => $row['foundation_id'],
                'creator_id'     => $row['creator_id'],
                'ar' => ["video" => $row['video_ar']],

        ]);
    }
}
