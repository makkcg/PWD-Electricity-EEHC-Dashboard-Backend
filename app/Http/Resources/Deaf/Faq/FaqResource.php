<?php

namespace App\Http\Resources\Deaf\Faq;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class FaqResource extends JsonResource
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
            'q_and_a' => $this->q_and_a,
            'q_and_a_sounds' =>FaqQASoundsResource::collection($this->translation->SMedia),
            'q_and_a_videos' => FaqQAVideosResource::collection($this->translation->VMedia),
            'images' => FaqImageResource::collection($this->images),
        ];
    }
}
