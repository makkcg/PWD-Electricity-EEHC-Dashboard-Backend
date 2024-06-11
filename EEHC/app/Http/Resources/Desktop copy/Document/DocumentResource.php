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
            'title_sounds' =>DocumentTitleSoundsResource::collection($this->translation->media),
            'title_videos' => DocumentTitleVideosResource::collection($this->translation->media),
            'description' => $this->desc,
            'description_sounds' =>DocumentDescSoundsResource::collection($this->translation->media),
            'description_videos' => DocumentDescVideosResource::collection($this->translation->media),
            'images' => DocumentImageResource::collection($this->images),
        ];
    }
}
