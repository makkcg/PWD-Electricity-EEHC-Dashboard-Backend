<?php

namespace App\Http\Resources\Deaf\Regulation;

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
            'description_sounds' =>RegulationDescSoundsResource::collection($this->translation->DSMedia),
            'description_videos' => RegulationDescVideosResource::collection($this->translation->DVMedia),
            'images' => RegulationImageResource::collection($this->images),
        ];
    }
}
