<?php

namespace App\Imports\Service;

use App\Models\ServiceTranslationMedia;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ServiceMediasImport implements ToModel, WithHeadingRow
{

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new ServiceTranslationMedia([
                'id'     => $row['id'],
                'service_translation_id'     => $row['service_translation_id'],
                'title_sound'     => $row['title_sound'],
                'title_video'     => $row['title_video'],
                'desc_sound'     => $row['desc_sound'],
                'desc_video'     => $row['desc_video'],
        ]);
    }
}
