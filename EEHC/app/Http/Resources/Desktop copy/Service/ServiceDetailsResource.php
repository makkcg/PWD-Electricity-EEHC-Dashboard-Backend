<?php

namespace App\Http\Resources\Desktop\Service;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\Desktop\Document\DocumentResource;
use App\Http\Resources\Desktop\Faq\FaqResource;
use App\Http\Resources\Desktop\Procedure\ProcedureResource;
use App\Http\Resources\Desktop\Regulation\RegulationResource;
class ServiceDetailsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $arrayData = [
            'id' => $this->id,
            'branch_name' => $this->branch->first()->name,
            'title' => $this->title,
            'title_sounds' =>ServiceTitleSoundsResource::collection($this->translation->media),
            'title_videos' => ServiceTitleVideosResource::collection($this->translation->media),
            'description' => $this->desc,
            'description_sounds' =>ServiceDescSoundsResource::collection($this->translation->media),
            'description_videos' => ServiceDescVideosResource::collection($this->translation->media),
            'images' => ServiceImageResource::collection($this->images),
        ];

        if(!$this->subServices->isEmpty()){
            $arrayData['sub_services']  = ServiceDetailsResource::collection($this->subServices);
        }
        else{
            $arrayData['documents']   = DocumentResource::collection($this->documents);
            $arrayData['faqs']   = FaqResource::collection($this->faqs);
            $arrayData['procedures']   = ProcedureResource::collection($this->procedures);
            $arrayData['regulations']   = RegulationResource::collection($this->regulations);
        }

        return $arrayData;

    }
}
