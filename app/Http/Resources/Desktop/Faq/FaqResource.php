<?php

namespace App\Http\Resources\Desktop\Faq;

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
        $myArray = explode('؟', $this->q_and_a);
        return [
            'id' => $this->id,
            'question' => $myArray[0].'؟',
            'answer' => $myArray[1],
            'sound' =>FaqQASoundsResource::collection($this->translation->media),
            'vids' => FaqQAVideosResource::collection($this->translation->media),
            'imgs' => FaqImageResource::collection($this->images),
        ];
    }
}
