<?php

namespace App\Imports\Document;

use App\Models\DocumentTranslationMedia;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DocumentMediasImport implements ToModel, WithHeadingRow
{

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new DocumentTranslationMedia([
                'id'     => $row['id'],
                'document_translation_id'     => $row['document_translation_id'],
                'title_sound'     => $row['title_sound'],
                'title_video'     => $row['title_video'],
                'desc_sound'     => $row['desc_sound'],
                'desc_video'     => $row['desc_video'],
        ]);
    }
}
