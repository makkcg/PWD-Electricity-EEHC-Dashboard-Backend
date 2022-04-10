<?php

namespace App\Imports\Faq;

use App\Models\Faq;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class FaqsImport implements ToModel, WithHeadingRow
{

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Faq([
                'id'     => $row['id'],
                'service_id'     => $row['service_id'],
                'order'     => $row['order'],
                'ar' => ["q_and_a" => $row['q_and_a_ar']],
                'creator_id'     => $row['creator_id'],
        ]);
    }
}
