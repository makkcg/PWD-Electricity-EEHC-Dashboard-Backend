<?php

namespace App\Http\Resources\Deaf\Document;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class DocumentDescVideosResource extends JsonResource
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
            'video' => url('/uploads/documents/videos/desc/'.$this->desc_video),
        ];
    }
}
