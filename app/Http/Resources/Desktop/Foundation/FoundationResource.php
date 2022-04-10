<?php

namespace App\Http\Resources\Desktop\Foundation;

use App\Http\Resources\Desktop\Branch\BranchDetailsResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\Desktop\Service\ServiceDetailsResource;
use App\Http\Resources\Desktop\About\AboutResource;
use App\Models\About;
use App\Models\Service;

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
        $data= [
            'foundation' =>[
            'foundation_id' => $this->id,
            'name' => $this->name,
            'foundation_desc' => $this->desc,
            'branchname' => 'كل الفروع',
            'phone' => $this->phone,
            'landline' => $this->landline,
            'website' => $this->website,
            'map' => $this->map,
            'about' => new AboutResource(About::first()),
            'email' => $this->email,
            'imgs' => FoundationImageResource::collection($this->images),
            'vids' => FoundationVideoResource::collection($this->videos),
            'sound' => FoundationSoundResource::collection($this->sounds),
            'branches' => [],
            ],
            'allservices' => [
               [ 'title' => 'خدمات وزارة الكهرباء',
                'id' => '1',
                'has_subservice' => 1,
                'desc' => 'تقدم وزارة الكهرباء العديد من الخدمات',
               'sub_services' => ServiceDetailsResource::collection(Service::where('parent_id', null)->get()),
             ] ],
            'branches_contacts' =>  BranchDetailsResource::collection($this->branches),
        ];

        return ['data'=> $data];
    }
}
