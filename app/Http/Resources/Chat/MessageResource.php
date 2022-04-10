<?php

namespace App\Http\Resources\Chat;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class MessageResource extends JsonResource
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
            'type'   => $this->type,
            'message'   => $this->message,
            'deaf_view'   => $this->deaf_view,
            'employee_view'   => $this->employee_view,
            'created_at'   => $this->created_at->toDateTimeString(),
        ];
    }
}
