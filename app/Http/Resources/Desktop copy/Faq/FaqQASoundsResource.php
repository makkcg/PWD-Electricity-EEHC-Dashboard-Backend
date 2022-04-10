<?php

namespace App\Http\Resources\Desktop\Faq;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class FaqQASoundsResource extends JsonResource
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
            'sound' => 'faqs/sounds/q_and_a/'.$this->q_and_a_sound,
        ];
    }
}
