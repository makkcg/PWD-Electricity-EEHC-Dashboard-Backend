<?php

namespace App\Http\Resources\Desktop\Document;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class DocumentResource extends JsonResource
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
            'title' => $this->title,
            'desc' => $this->desc,
            'sound' =>DocumentTitleSoundsResource::collection($this->translation->media),
            'vids' => DocumentTitleVideosResource::collection($this->translation->media),
            'imgs' => DocumentImageResource::collection($this->images),
        ];
    }
}
