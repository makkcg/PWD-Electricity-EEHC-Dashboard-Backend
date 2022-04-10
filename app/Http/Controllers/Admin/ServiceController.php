<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Branch;
use App\Models\Service;
use App\Models\ServiceImage;
use App\Models\ServiceTranslationMedia;
use App\Models\ServiceTranslation;
use App\Traits\FileManagement;
use Illuminate\Support\Facades\Cache;

class ServiceController extends Controller
{

    use FileManagement;

    public function index()
    {
        $items= Service::where('parent_id', null)->get();
        return View('admin.services.index',compact('items'));
    }
    public function create()
    {
        $branches = Branch::get();
        $services= Service::where('parent_id', null)->get();
        return View('admin.services.create',compact('branches','services'));
    }

    public function store(Request $request)
    {
         $request->validate([
            'title_ar'   => 'required|min:3|max:191' ,
            'desc_ar'   => 'required|min:3|max:1000' ,
            'services'   => 'nullable' ,
            'branches'   => 'required' ,
            "image.*" => ["image", "mimes:jpg,jpeg,png", "max:2048"],
            "title_sound.*" => ["mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav"],
            'title_video.*' => 'max:20480|mimetypes:video/x-ms-asf,video/x-flv,video/mp4,application/x-mpegURL,video/MP2T,video/3gpp,video/quicktime,video/x-msvideo,video/x-ms-wmv,video/avi,video/webm',
            "desc_sound.*" => ["mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav"],
            'desc_video.*' => 'max:20480|mimetypes:video/x-ms-asf,video/x-flv,video/mp4,application/x-mpegURL,video/MP2T,video/3gpp,video/quicktime,video/x-msvideo,video/x-ms-wmv,video/avi,video/webm',
           ]);

           $data = [
            'ar' => ["title" => $request->title_ar,"desc" => $request->desc_ar],
            'parent_id' => $request->services,
            'creator_id' => auth()->user()->id,
        ];


        $item = Service::create($data);
        $item->branch()->sync($request->branches);
        //upload images
        if(!$request->image == null){
            foreach($request->image as $image){
                $image = $this->uploadFile($image,'uploads/services/images/');
                $item->images()->create([
                    'image' => $image,
                    'creator_id' => auth()->user()->id,
                ]);
            }
        }
        //upload title sounds
        if(!$request->title_sound == null){
            foreach($request->title_sound as $sound){
                $sound = $this->uploadFile($sound,'uploads/services/sounds/title/');
                ServiceTranslationMedia::create([
                    'title_sound' => $sound,
                    'service_translation_id'=>$item->translate('ar')->id
                ]);
            }
        }

        //upload desc sounds
        if(!$request->desc_sound == null){
            foreach($request->desc_sound as $sound){
                $sound = $this->uploadFile($sound,'uploads/services/sounds/desc/');
                ServiceTranslationMedia::create([
                    'desc_sound' => $sound,
                    'service_translation_id'=>$item->translate('ar')->id
                ]);
            }
        }

        //upload title videos
        if(!$request->title_video == null){
            foreach($request->title_video as $video){
                $video = $this->uploadFile($video,'uploads/services/videos/title/');
                ServiceTranslationMedia::create([
                    'title_video' => $video,
                    'service_translation_id'=>$item->translate('ar')->id
                ]);
            }
        }

        //upload desc videos
        if(!$request->desc_video == null){
            foreach($request->desc_video as $video){
                $video = $this->uploadFile($video,'uploads/services/videos/desc/');
                ServiceTranslationMedia::create([
                    'desc_video' => $video,
                    'service_translation_id'=>$item->translate('ar')->id
                ]);
            }
        }
        return redirect(route('admin.services.index'))->withFlashMessage('Created');

    }
    public function edit($id)
    {
        // $branches = Branch::get();
        $branches = Cache::rememberForever('branches', function () {
            return Branch::get();
        });
        $services= Service::where('parent_id', null)->get();
        $item=Service::find($id);
        return View('admin.services.edit',compact('item','branches','services'));
    }

    public function update(Request $request, $id)
    {

        // $request->validate([
        //     'title_ar'   => 'required|min:3|max:191' ,
        //     'desc_ar'   => 'required|min:3|max:1000' ,
        //     'services'   => 'nullable' ,
        //     'branches'   => 'required' ,
        //     "image.*" => ["image", "mimes:jpg,jpeg,png", "max:2048"],
        //     "title_sound.*" => ["mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav"],
        //     'title_video.*' => 'max:20480|mimetypes:video/x-ms-asf,video/x-flv,video/mp4,application/x-mpegURL,video/MP2T,video/3gpp,video/quicktime,video/x-msvideo,video/x-ms-wmv,video/avi',
        //     "desc_sound.*" => ["mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav"],
        //     'desc_video.*' => 'max:20480|mimetypes:video/x-ms-asf,video/x-flv,video/mp4,application/x-mpegURL,video/MP2T,video/3gpp,video/quicktime,video/x-msvideo,video/x-ms-wmv,video/avi,video/webm',
        //    ]);


           $data = [
            'ar' => ["title" => $request->title_ar,"desc" => $request->desc_ar],
            'parent_id' => $request->services,
            'creator_id' => auth()->user()->id,
        ];

        $item = Service::find($id);
        $item->update($data);
        $item->branch()->sync($request->branches);

        //upload images
        if(!$request->image == null){
            foreach($request->image as $image){
                $image = $this->uploadFile($image,'uploads/services/images/');
                $item->images()->create([
                    'image' => $image,
                    'creator_id' => auth()->user()->id,
                ]);
            }
        }
        //upload title sounds
        if(!$request->title_sound == null){
            foreach($request->title_sound as $sound){
                $sound = $this->uploadFile($sound,'uploads/services/sounds/title/');
                ServiceTranslationMedia::create([
                    'title_sound' => $sound,
                    'service_translation_id'=>$item->translate('ar')->id
                ]);
            }
        }

        //upload desc sounds
        if(!$request->desc_sound == null){
            foreach($request->desc_sound as $sound){
                $sound = $this->uploadFile($sound,'uploads/services/sounds/desc/');
                ServiceTranslationMedia::create([
                    'desc_sound' => $sound,
                    'service_translation_id'=>$item->translate('ar')->id
                ]);
            }
        }

        //upload title videos
        if(!$request->title_video == null){
            foreach($request->title_video as $video){
                $video = $this->uploadFile($video,'uploads/services/videos/title/');
                ServiceTranslationMedia::create([
                    'title_video' => $video,
                    'service_translation_id'=>$item->translate('ar')->id
                ]);
            }
        }

        //upload desc videos
        if(!$request->desc_video == null){
            foreach($request->desc_video as $video){
                $video = $this->uploadFile($video,'uploads/services/videos/desc/');
                ServiceTranslationMedia::create([
                    'desc_video' => $video,
                    'service_translation_id'=>$item->translate('ar')->id
                ]);
            }
        }
        return redirect(route('admin.services.index'))->withFlashMessage('Updated');

    }

    public function imageAjax($id){
        ServiceImage::find($id)->delete();
        return json_encode('Deleted');

    }

    public function titleSoundAjax($id){
        ServiceTranslationMedia::find($id)->update(['title_sound'=>null]);
        return json_encode('Deleted');
    }
    public function titleVideoAjax($id){
        ServiceTranslationMedia::find($id)->update(['title_video'=>null]);
        return json_encode('Deleted');
    }
    public function descSoundAjax($id){
        ServiceTranslationMedia::find($id)->update(['desc_sound'=>null]);
        return json_encode('Deleted');
    }
    public function descVideoAjax($id){
        ServiceTranslationMedia::find($id)->update(['desc_video'=>null]);
        return json_encode('Deleted');
    }

    public function destroy($id)
    {
        $user = Service::find($id);
        $user->delete();
     return redirect(route('admin.services.index'))->withFlashMessage('deleted');
    }
}
