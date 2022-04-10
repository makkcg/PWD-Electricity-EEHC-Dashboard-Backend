<?php

namespace App\Http\Resources\Desktop\Service;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class ServiceTitleSoundsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'sound' => 'services/sounds/title/'.$this->title_sound,
        ];
    }
}
