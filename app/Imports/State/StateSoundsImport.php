<?php

namespace App\Imports\State;

use App\Models\StateSound;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StateSoundsImport implements ToModel, WithHeadingRow
{

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new StateSound([
                'state_id'     => $row['state_id'],
                'creator_id'     => $row['creator_id'],
                'ar' => ["sound" => $row['sound_ar']],
        ]);
    }
}
