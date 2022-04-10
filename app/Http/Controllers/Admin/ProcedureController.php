<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Procedure;
use App\Models\ProcedureImage;
use App\Models\ProcedureTranslationMedia;
use App\Models\Service;
use App\Traits\FileManagement;

class ProcedureController extends Controller
{

    use FileManagement;

    public function index()
    {
        $items= Procedure::get();
        return View('admin.procedures.index',compact('items'));
    }
    public function create()
    {
        $services = Service::get();
        return View('admin.procedures.create',compact('services'));
    }

    public function store(Request $request)
    {
         $request->validate([
            'desc_ar'   => 'required|min:3|max:1000' ,
            'services'   => 'required' ,
            'order'   => 'required' ,
            "image.*" => ["image", "mimes:jpg,jpeg,png", "max:2048"],
            "desc_sound.*" => ["mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav"],
            'desc_video.*' => 'max:20480|mimetypes:video/x-ms-asf,video/x-flv,video/mp4,application/x-mpegURL,video/MP2T,video/3gpp,video/quicktime,video/x-msvideo,video/x-ms-wmv,video/avi,video/webm',
           ]);

           $data = [
            'ar' => ["desc" => $request->desc_ar],
            'service_id' => $request->services,
            'order' => $request->order,
            'creator_id' => auth()->user()->id,
        ];


        $item = Procedure::create($data);
        //upload images
        if(!$request->image == null){
            foreach($request->image as $image){
                $image = $this->uploadFile($image,'uploads/procedures/images/');
                $item->images()->create([
                    'image' => $image,
                    'creator_id' => auth()->user()->id,
                ]);
            }
        }


        //upload desc sounds
        if(!$request->desc_sound == null){
            foreach($request->desc_sound as $sound){
                $sound = $this->uploadFile($sound,'uploads/procedures/sounds/desc/');
                ProcedureTranslationMedia::create([
                    'desc_sound' => $sound,
                    'procedure_translation_id'=>$item->translate('ar')->id
                ]);
            }
        }


        //upload desc videos
        if(!$request->desc_video == null){
            foreach($request->desc_video as $video){
                $video = $this->uploadFile($video,'uploads/procedures/videos/desc/');
                ProcedureTranslationMedia::create([
                    'desc_video' => $video,
                    'procedure_translation_id'=>$item->translate('ar')->id
                ]);
            }
        }
        return redirect(route('admin.procedures.index'))->withFlashMessage('Created');

    }
    public function edit($id)
    {
        $services = Service::get();
        $item=Procedure::find($id);
        return View('admin.procedures.edit',compact('item','services'));
    }

    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'desc_ar'   => 'required|min:3|max:1000' ,
        //     'services'   => 'required' ,
        //     'order'   => 'required' ,
        //     "image.*" => ["image", "mimes:jpg,jpeg,png", "max:2048"],
        //     "desc_sound.*" => ["mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav"],
        //     'desc_video.*' => 'max:20480|mimetypes:video/x-ms-asf,video/x-flv,video/mp4,application/x-mpegURL,video/MP2T,video/3gpp,video/quicktime,video/x-msvideo,video/x-ms-wmv,video/avi',
        //    ]);

           $data = [
            'ar' => ["desc" => $request->desc_ar],
            'service_id' => $request->services,
            'order' => $request->order,
            'creator_id' => auth()->user()->id,
        ];


        $item = Procedure::find($id);
        $item->update($data);

         //upload images
         if(!$request->image == null){
            foreach($request->image as $image){
                $image = $this->uploadFile($image,'uploads/procedures/images/');
                $item->images()->create([
                    'image' => $image,
                    'creator_id' => auth()->user()->id,
                ]);
            }
        }


        //upload desc sounds
        if(!$request->desc_sound == null){
            foreach($request->desc_sound as $sound){
                $sound = $this->uploadFile($sound,'uploads/procedures/sounds/desc/');
                ProcedureTranslationMedia::create([
                    'desc_sound' => $sound,
                    'procedure_translation_id'=>$item->translate('ar')->id
                ]);
            }
        }


        //upload desc videos
        if(!$request->desc_video == null){
            foreach($request->desc_video as $video){
                $video = $this->uploadFile($video,'uploads/procedures/videos/desc/');
                ProcedureTranslationMedia::create([
                    'desc_video' => $video,
                    'procedure_translation_id'=>$item->translate('ar')->id
                ]);
            }
        }
        return redirect(route('admin.procedures.index'))->withFlashMessage('Updated');

    }

    public function imageAjax($id){
        ProcedureImage::find($id)->delete();
        return json_encode('Deleted');

    }


    public function descSoundAjax($id){
        ProcedureTranslationMedia::find($id)->update(['desc_sound'=>null]);
        return json_encode('Deleted');
    }
    public function descVideoAjax($id){
        ProcedureTranslationMedia::find($id)->update(['desc_video'=>null]);
        return json_encode('Deleted');
    }

    public function destroy($id)
    {
        $user = Procedure::find($id);
        $user->delete();
     return redirect(route('admin.procedures.index'))->withFlashMessage('deleted');
    }
}
