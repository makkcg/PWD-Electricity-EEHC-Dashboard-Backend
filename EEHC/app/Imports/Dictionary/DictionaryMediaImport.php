<?php

namespace App\Imports\Dictionary;

use App\Models\ArabicDictionaryMedia;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DictionaryMediaImport implements ToModel, WithHeadingRow
{

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new ArabicDictionaryMedia([
                'id'     => $row['id'],
                'foundation_id'     => $row['foundation_id'],
                'arabic_dictionary_id'     => $row['arabic_dictionary_id'],
                'image'     => $row['image'],
                'video'     => $row['video'],

        ]);
    }
}
