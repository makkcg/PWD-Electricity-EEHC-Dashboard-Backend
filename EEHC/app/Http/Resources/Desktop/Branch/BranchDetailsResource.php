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
            'gov' => $this->city->state->name,
            'branch' => $this->name,
            'description' => $this->desc,
            'note' => $this->note,
            'address' => $this->address,
            'map' => $this->map,
            'mobile' => $this->phone1,
            'phone2' => $this->phone2,
            'tel1' => $this->landline1,
            'tel2' => $this->landline2,
            'disability' => $this->pwd_status,
            'email' => $this->email,
            'imgs' => BranchImageResource::collection($this->images),
            'vids' => BranchVideoResource::collection($this->videos),
            'sound' => BranchSoundResource::collection($this->sounds),

        ];
    }
}
