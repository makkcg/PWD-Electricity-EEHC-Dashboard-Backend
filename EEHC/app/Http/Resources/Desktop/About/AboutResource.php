<?php

namespace App\Http\Resources\Desktop\About;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class AboutResource extends JsonResource
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
            'description' => $this->desc,
            'videos' => AboutVideoResource::collection($this->videos),
            'sounds' => AboutSoundResource::collection($this->sounds),
        ];
    }
}
