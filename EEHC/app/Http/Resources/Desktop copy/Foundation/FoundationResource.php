<?php

namespace App\Http\Resources\Desktop\Foundation;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\Desktop\Branch\BranchDetailsResource;
use App\Http\Resources\Desktop\About\AboutResource;
use App\Models\About;

class FoundationResource extends JsonResource
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
            'name' => $this->name,
            'description' => $this->desc,
            'phone' => $this->phone,
            'landline' => $this->landline,
            'website' => $this->website,
            'map' => $this->map,
            'about' => new AboutResource(About::first()),
            'email' => $this->email,
            'images' => FoundationImageResource::collection($this->images),
            'videos' => FoundationVideoResource::collection($this->videos),
            'sounds' => FoundationSoundResource::collection($this->sounds),
            'branches' => BranchDetailsResource::collection($this->branches),
        ];
    }
}
