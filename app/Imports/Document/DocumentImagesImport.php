<?php

namespace App\Imports\Document;

use App\Models\DocumentImage;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DocumentImagesImport implements ToModel, WithHeadingRow
{

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new DocumentImage([
                'id'     => $row['id'],
                'document_id'     => $row['document_id'],
                'creator_id'     => $row['creator_id'],
                'image'     => $row['image'],
        ]);
    }
}
