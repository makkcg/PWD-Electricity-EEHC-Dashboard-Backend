<?php

namespace App\Http\Resources\Dictionary;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class ArabicDictionaryResource extends JsonResource
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
            'word' => $this->word,
            'images' => ArabicDictionaryImagesResource::collection($this->media),
            'videos' => ArabicDictionaryVideosResource::collection($this->media),
        ];
    }
}
