<?php

namespace App\Http\Resources\Desktop\Procedure;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class ProcedureResource extends JsonResource
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
            'description_sounds' =>ProcedureDescSoundsResource::collection($this->translation->media),
            'description_videos' => ProcedureDescVideosResource::collection($this->translation->media),
            'images' => ProcedureImageResource::collection($this->images),
        ];
    }
}
