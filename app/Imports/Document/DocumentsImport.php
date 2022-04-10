<?php

namespace App\Imports\Document;

use App\Models\Document;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DocumentsImport implements ToModel, WithHeadingRow
{

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Document([
                'id'     => $row['id'],
                'service_id'     => $row['service_id'],
                'order'     => $row['order'],
                'ar' => ["title" => $row['title_ar'],"desc" => $row['desc_ar']],
                'creator_id'     => $row['creator_id'],
        ]);
    }
}
