<?php

namespace App\Http\Resources\Deaf\Service;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\Deaf\Document\DocumentResource;
use App\Http\Resources\Deaf\Faq\FaqResource;
use App\Http\Resources\Deaf\Procedure\ProcedureResource;
use App\Http\Resources\Deaf\Regulation\RegulationResource;
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
          //  'branch_name' => $this->branch->first()->name,
            'title' => $this->title,
            'title_sounds' =>ServiceTitleSoundsResource::collection($this->translation->TSMedia),
            'title_videos' => ServiceTitleVideosResource::collection($this->translation->TVMedia),
            'description' => $this->desc,
            'description_sounds' =>ServiceDescSoundsResource::collection($this->translation->DSMedia),
            'description_videos' => ServiceDescVideosResource::collection($this->translation->DVMedia),
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
