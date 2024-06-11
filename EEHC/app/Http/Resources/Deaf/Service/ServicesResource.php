<?php

namespace App\Http\Resources\Deaf\Service;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class ServicesResource extends JsonResource
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
          //  'branch_name' => $this->branch->first()->name,
            'title' => $this->title,
            'title_sounds' =>ServiceTitleSoundsResource::collection($this->translation->TSMedia),
            'title_videos' => ServiceTitleVideosResource::collection($this->translation->TVMedia),
            'description' => $this->desc,
            'description_sounds' =>ServiceDescSoundsResource::collection($this->translation->DSMedia),
            'description_videos' => ServiceDescVideosResource::collection($this->translation->DVMedia),
            'images' => ServiceImageResource::collection($this->images),
        ];
    }
}
