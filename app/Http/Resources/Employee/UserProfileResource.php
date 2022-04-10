<?php

namespace App\Http\Resources\Employee;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\Deaf\Branch\BranchesResource;
class UserProfileResource extends JsonResource
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
            'phone' => $this->phone,
            'email' => $this->email,
            'branch' =>new BranchesResource($this->branch),
            'image' => url(($this->image != null && file_exists(public_path().'/uploads/employee/' . $this->image)) ?  '/uploads/employee/' . $this->image : '/uploads/Users/avatar.png'),
            'qrCode' => url(($this->qr_code != null && file_exists(public_path().'/uploads/qrcodes/' . $this->qr_code)) ? '/uploads/qrcodes/' . $this->qr_code : '/uploads/Users/avatar.png'),
            'access_token' => $this->access_token,

        ];
    }
}
