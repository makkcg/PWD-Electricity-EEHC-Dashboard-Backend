<?php

namespace App\Http\Resources\Deaf\Branch;

use App\Http\Resources\StateSoundResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class StateResource extends JsonResource
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
            'sounds' => StateSoundResource::collection($this->sounds),
        ];
    }
}
