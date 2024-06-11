<?php

namespace App\Imports\Regulation;

use App\Models\RegulationTranslationMedia;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class RegulationMediasImport implements ToModel, WithHeadingRow
{

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new RegulationTranslationMedia([
                'id'     => $row['id'],
                'regulation_translation_id'     => $row['regulation_translation_id'],
                'desc_sound'     => $row['desc_sound'],
                'desc_video'     => $row['desc_video'],
        ]);
    }
}
