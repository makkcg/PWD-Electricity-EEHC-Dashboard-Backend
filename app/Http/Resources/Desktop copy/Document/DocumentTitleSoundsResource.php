<?php

namespace App\Http\Resources\Desktop\Document;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class DocumentTitleSoundsResource extends JsonResource
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
            'sound' => 'documents/sounds/title/'.$this->title_sound,
        ];
    }
}
