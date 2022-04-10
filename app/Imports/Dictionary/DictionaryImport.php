<?php

namespace App\Imports\Dictionary;

use App\Models\ArabicDictionary;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DictionaryImport implements ToModel, WithHeadingRow
{

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new ArabicDictionary([
                'id'     => $row['id'],
                'word'     => $row['word'],
                'column'     => $row['column'],
        ]);
    }
}
