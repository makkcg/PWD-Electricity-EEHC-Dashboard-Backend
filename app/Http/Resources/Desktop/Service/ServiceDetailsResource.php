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
            'title' => $this->title,
            'has_subservice' => $this->subServices->isEmpty() ? 0 : 1,
         //   'title_sounds' =>ServiceTitleSoundsResource::collection($this->translation->media),
         //   'title_videos' => ServiceTitleVideosResource::collection($this->translation->media),
            'desc' => $this->desc,
            'sound' =>ServiceDescSoundsResource::collection($this->translation->media),
            'vids' => ServiceDescVideosResource::collection($this->translation->media),
            'imgs' => ServiceImageResource::collection($this->images),
            'sub_sub_services'=>ServiceDetailsResource::collection($this->subServices),
            'docs'=>DocumentResource::collection($this->documents),
            'faqs'=>FaqResource::collection($this->faqs),
            'procedures'=>ProcedureResource::collection($this->procedures),
            'regulations'=>RegulationResource::collection($this->regulations),

        ];



        return $arrayData;

    }
}
