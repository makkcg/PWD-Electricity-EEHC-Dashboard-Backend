<?php

namespace App\Imports\Foundation;

use App\Models\FoundationImage;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class FoundationImagesImport implements ToModel, WithHeadingRow
{

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new FoundationImage([
                'id'     => $row['id'],
                'foundation_id'     => $row['foundation_id'],
                'creator_id'     => $row['creator_id'],
                'ar' => ["image" => $row['image_ar']],
        ]);
    }
}
