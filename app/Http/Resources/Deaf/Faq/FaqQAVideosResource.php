<?php

namespace App\Http\Resources\Deaf\Faq;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class FaqQAVideosResource extends JsonResource
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
            'video' => url('/uploads/faqs/videos/q_and_a/'.$this->q_and_a_video),
        ];
    }
}
