<?php

namespace App\Imports\Faq;

use App\Models\FaqTranslationMedia;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class FaqMediasImport implements ToModel, WithHeadingRow
{

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new FaqTranslationMedia([
                'id'     => $row['id'],
                'faq_translation_id'     => $row['faq_translation_id'],
                'q_and_a_sound'     => $row['q_and_a_sound'],
                'q_and_a_video'     => $row['q_and_a_video'],
        ]);
    }
}
