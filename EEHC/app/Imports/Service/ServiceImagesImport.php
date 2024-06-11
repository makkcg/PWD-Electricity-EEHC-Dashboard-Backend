<?php

namespace App\Imports\Service;

use App\Models\ServiceImage;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ServiceImagesImport implements ToModel, WithHeadingRow
{

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new ServiceImage([
                'id'     => $row['id'],
                'service_id'     => $row['service_id'],
                'creator_id'     => $row['creator_id'],
                'image'     => $row['image'],
        ]);
    }
}
