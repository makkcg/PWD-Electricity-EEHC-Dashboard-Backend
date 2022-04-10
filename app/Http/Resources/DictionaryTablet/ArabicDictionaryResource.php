<?php

namespace App\Http\Resources\DictionaryTablet;
use App\Http\Resources\DictionaryTablet\ArabicDictionaryColumnsResource;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class ArabicDictionaryResource extends JsonResource
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
            'word' => $this->word,
            'pic' =>'/dictionary/images/'.$this->media[0]->image,
            'vid' => '/dictionary/videos/'.$this->media[0]->video,
           ];
    }
}
