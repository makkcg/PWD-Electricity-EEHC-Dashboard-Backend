<?php

namespace App\Imports\About;

use App\Models\AboutVideo;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AboutVideosImport implements ToModel, WithHeadingRow
{

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new AboutVideo([
                'id'     => $row['id'],
                'about_id'     => $row['about_id'],
                'creator_id'     => $row['creator_id'],
                'ar' => ["video" => $row['video_ar']],

        ]);
    }
}
