<?php

namespace App\Http\Resources\Desktop\Regulation;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class RegulationResource extends JsonResource
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
            'description_sounds' =>RegulationDescSoundsResource::collection($this->translation->media),
            'description_videos' => RegulationDescVideosResource::collection($this->translation->media),
            'images' => RegulationImageResource::collection($this->images),
        ];
    }
}
