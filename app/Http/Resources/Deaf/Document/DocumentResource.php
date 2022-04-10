<?php

namespace App\Http\Resources\Deaf\Document;

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
            'title_sounds' =>DocumentTitleSoundsResource::collection($this->translation->TSMedia),
            'title_videos' => DocumentTitleVideosResource::collection($this->translation->TVMedia),
            'description' => $this->desc,
            'description_sounds' =>DocumentDescSoundsResource::collection($this->translation->DSMedia),
            'description_videos' => DocumentDescVideosResource::collection($this->translation->DVMedia),
            'images' => DocumentImageResource::collection($this->images),
        ];
    }
}
