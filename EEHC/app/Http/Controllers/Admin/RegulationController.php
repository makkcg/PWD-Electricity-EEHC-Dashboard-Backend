<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Regulation;
use App\Models\RegulationImage;
use App\Models\RegulationTranslationMedia;
use App\Models\Service;
use App\Traits\FileManagement;

class RegulationController extends Controller
{

    use FileManagement;

    public function index()
    {
        $items= Regulation::get();
        return View('admin.regulations.index',compact('items'));
    }
    public function create()
    {
        $services = Service::get();
        return View('admin.regulations.create',compact('services'));
    }

    public function store(Request $request)
    {
         $request->validate([
            'desc_ar'   => 'required|min:3|max:1000' ,
            'services'   => 'required' ,
            "image.*" => ["image", "mimes:jpg,jpeg,png", "max:2048"],
            "desc_sound.*" => ["mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav"],
            'desc_video.*' => 'max:20480|mimetypes:video/x-ms-asf,video/x-flv,video/mp4,application/x-mpegURL,video/MP2T,video/3gpp,video/quicktime,video/x-msvideo,video/x-ms-wmv,video/avi',
           ]);

           $data = [
            'ar' => ["desc" => $request->desc_ar],
            'service_id' => $request->services,
            'creator_id' => auth()->user()->id,
        ];


        $item = Regulation::create($data);
        //upload images
        if(!$request->image == null){
            foreach($request->image as $image){
                $image = $this->uploadFile($image,'uploads/regulations/images/');
                $item->images()->create([
                    'image' => $image,
                    'creator_id' => auth()->user()->id,
                ]);
            }
        }


        //upload desc sounds
        if(!$request->desc_sound == null){
            foreach($request->desc_sound as $sound){
                $sound = $this->uploadFile($sound,'uploads/regulations/sounds/desc/');
                RegulationTranslationMedia::create([
                    'desc_sound' => $sound,
                    'regulation_translation_id'=>$item->translate('ar')->id
                ]);
            }
        }


        //upload desc videos
        if(!$request->desc_video == null){
            foreach($request->desc_video as $video){
                $video = $this->uploadFile($video,'uploads/regulations/videos/desc/');
                RegulationTranslationMedia::create([
                    'desc_video' => $video,
                    'regulation_translation_id'=>$item->translate('ar')->id
                ]);
            }
        }
        return redirect(route('admin.regulations.index'))->withFlashMessage('Created');

    }
    public function edit($id)
    {
        $services = Service::get();
        $item=Regulation::find($id);
        return View('admin.regulations.edit',compact('item','services'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'desc_ar'   => 'required|min:3|max:1000' ,
            'services'   => 'required' ,
            "image.*" => ["image", "mimes:jpg,jpeg,png", "max:2048"],
            "desc_sound.*" => ["mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav"],
            'desc_video.*' => 'max:20480|mimetypes:video/x-ms-asf,video/x-flv,video/mp4,application/x-mpegURL,video/MP2T,video/3gpp,video/quicktime,video/x-msvideo,video/x-ms-wmv,video/avi',
           ]);

           $data = [
            'ar' => ["desc" => $request->desc_ar],
            'service_id' => $request->services,
            'creator_id' => auth()->user()->id,
        ];


        $item = Regulation::find($id);
        $item->update($data);

         //upload images
         if(!$request->image == null){
            foreach($request->image as $image){
                $image = $this->uploadFile($image,'uploads/regulations/images/');
                $item->images()->create([
                    'image' => $image,
                    'creator_id' => auth()->user()->id,
                ]);
            }
        }


        //upload desc sounds
        if(!$request->desc_sound == null){
            foreach($request->desc_sound as $sound){
                $sound = $this->uploadFile($sound,'uploads/regulations/sounds/desc/');
                RegulationTranslationMedia::create([
                    'desc_sound' => $sound,
                    'regulation_translation_id'=>$item->translate('ar')->id
                ]);
            }
        }


        //upload desc videos
        if(!$request->desc_video == null){
            foreach($request->desc_video as $video){
                $video = $this->uploadFile($video,'uploads/regulations/videos/desc/');
                RegulationTranslationMedia::create([
                    'desc_video' => $video,
                    'regulation_translation_id'=>$item->translate('ar')->id
                ]);
            }
        }
        return redirect(route('admin.regulations.index'))->withFlashMessage('Updated');

    }

    public function imageAjax($id){
        RegulationImage::find($id)->delete();
        return json_encode('Deleted');

    }


    public function descSoundAjax($id){
        RegulationTranslationMedia::find($id)->update(['desc_sound'=>null]);
        return json_encode('Deleted');
    }
    public function descVideoAjax($id){
        RegulationTranslationMedia::find($id)->update(['desc_video'=>null]);
        return json_encode('Deleted');
    }

    public function destroy($id)
    {
        $user = Regulation::find($id);
        $user->delete();
     return redirect(route('admin.regulations.index'))->withFlashMessage('deleted');
    }
}
