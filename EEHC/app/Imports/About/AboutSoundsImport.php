<?php

namespace App\Imports\About;

use App\Models\AboutSound;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AboutSoundsImport implements ToModel, WithHeadingRow
{

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new AboutSound([
                'id'     => $row['id'],
                'about_id'     => $row['about_id'],
                'creator_id'     => $row['creator_id'],
                'ar' => ["sound" => $row['sound_ar']],

        ]);
    }
}
