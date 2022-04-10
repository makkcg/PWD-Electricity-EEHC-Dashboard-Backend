<?php

namespace App\Http\Resources\Desktop\Regulation;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class RegulationDescVideosResource extends JsonResource
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
            'video' => 'regulations/videos/desc/'.$this->desc_video,
        ];
    }
}
