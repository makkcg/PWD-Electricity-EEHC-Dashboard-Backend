<?php

namespace App\Http\Resources\Desktop\Branch;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\Desktop\Service\ServiceDetailsResource;

class BranchDetailsResource extends JsonResource
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
            'city_name' => $this->city->name,
            'name' => $this->name,
            'description' => $this->desc,
            'note' => $this->note,
            'address' => $this->address,
            'map' => $this->map,
            'phone1' => $this->phone1,
            'phone2' => $this->phone2,
            'landline1' => $this->landline1,
            'landline2' => $this->landline2,
            'pwd_status' => $this->pwd_status,
            'email' => $this->email,
            'images' => BranchImageResource::collection($this->images),
            'videos' => BranchVideoResource::collection($this->videos),
            'sounds' => BranchSoundResource::collection($this->sounds),
            'services' => ServiceDetailsResource::collection($this->services),

        ];
    }
}
