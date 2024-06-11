<?php

namespace App\Http\Resources\Chat;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class ChatResource extends JsonResource
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
            'id'   => $this->id,
            'deaf_name' => $this->deaf->name,
            'employee_name' => $this->employee->name,
            'status' => $this->status,
            'created_at' => $this->created_at->toDateString(),
            'messages' => MessageResource::collection($this->messages),

        ];
    }
}
