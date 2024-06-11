<?php

namespace App\Imports\Faq;

use App\Models\FaqImage;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class FaqImagesImport implements ToModel, WithHeadingRow
{

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new FaqImage([
                'id'     => $row['id'],
                'faq_id'     => $row['faq_id'],
                'creator_id'     => $row['creator_id'],
                'image'     => $row['image'],
        ]);
    }
}
