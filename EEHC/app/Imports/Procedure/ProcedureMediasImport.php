<?php

namespace App\Imports\Procedure;

use App\Models\ProcedureTranslationMedia;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProcedureMediasImport implements ToModel, WithHeadingRow
{

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new ProcedureTranslationMedia([
                'id'     => $row['id'],
                'procedure_translation_id'     => $row['procedure_translation_id'],
                'desc_sound'     => $row['desc_sound'],
                'desc_video'     => $row['desc_video'],
        ]);
    }
}
