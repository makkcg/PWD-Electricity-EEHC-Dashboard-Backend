<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\DocumentImage;
use App\Models\DocumentTranslationMedia;
use App\Models\Service;
use App\Traits\FileManagement;

class DocumentController extends Controller
{

    use FileManagement;

    public function index()
    {
        $items= Document::get();
        return View('admin.documents.index',compact('items'));
    }
    public function create()
    {
        $services = Service::get();
        return View('admin.documents.create',compact('services'));
    }

    public function store(Request $request)
    {
         $request->validate([
            'title_ar'   => 'required|min:3|max:191' ,
            'desc_ar'   => 'required|min:3|max:1000' ,
            'services'   => 'required' ,
            'order'   => 'required' ,
            "image.*" => ["image", "mimes:jpg,jpeg,png", "max:2048"],
            "title_sound.*" => ["mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav"],
            'title_video.*' => 'max:20480|mimetypes:video/x-ms-asf,video/x-flv,video/mp4,application/x-mpegURL,video/MP2T,video/3gpp,video/quicktime,video/x-msvideo,video/x-ms-wmv,video/avi',
            "desc_sound.*" => ["mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav"],
            'desc_video.*' => 'max:20480|mimetypes:video/x-ms-asf,video/x-flv,video/mp4,application/x-mpegURL,video/MP2T,video/3gpp,video/quicktime,video/x-msvideo,video/x-ms-wmv,video/avi,video/webm',
           ]);

           $data = [
            'ar' => ["title" => $request->title_ar,"desc" => $request->desc_ar],
            'service_id' => $request->services,
            'order' => $request->order,
            'creator_id' => auth()->user()->id,
        ];


        $item = Document::create($data);
        //upload images
        if(!$request->image == null){
            foreach($request->image as $image){
                $image = $this->uploadFile($image,'uploads/documents/images/');
                $item->images()->create([
                    'image' => $image,
                    'creator_id' => auth()->user()->id,
                ]);
            }
        }
        //upload title sounds
        if(!$request->title_sound == null){
            foreach($request->title_sound as $sound){
                $sound = $this->uploadFile($sound,'uploads/documents/sounds/title/');
                DocumentTranslationMedia::create([
                    'title_sound' => $sound,
                    'document_translation_id'=>$item->translate('ar')->id
                ]);
            }
        }

        //upload desc sounds
        if(!$request->desc_sound == null){
            foreach($request->desc_sound as $sound){
                $sound = $this->uploadFile($sound,'uploads/documents/sounds/desc/');
                DocumentTranslationMedia::create([
                    'desc_sound' => $sound,
                    'document_translation_id'=>$item->translate('ar')->id
                ]);
            }
        }

        //upload title videos
        if(!$request->title_video == null){
            foreach($request->title_video as $video){
                $video = $this->uploadFile($video,'uploads/documents/videos/title/');
                DocumentTranslationMedia::create([
                    'title_video' => $video,
                    'document_translation_id'=>$item->translate('ar')->id
                ]);
            }
        }

        //upload desc videos
        if(!$request->desc_video == null){
            foreach($request->desc_video as $video){
                $video = $this->uploadFile($video,'uploads/documents/videos/desc/');
                DocumentTranslationMedia::create([
                    'desc_video' => $video,
                    'document_translation_id'=>$item->translate('ar')->id
                ]);
            }
        }
        return redirect(route('admin.documents.index'))->withFlashMessage('Created');

    }
    public function edit($id)
    {
        $services = Service::get();
        $item=Document::find($id);
        return View('admin.documents.edit',compact('item','services'));
    }

    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'title_ar'   => 'required|min:3|max:191' ,
        //     'desc_ar'   => 'required|min:3|max:1000' ,
        //     'services'   => 'required' ,
        //     'order'   => 'required' ,
        //     "image.*" => ["image", "mimes:jpg,jpeg,png", "max:2048"],
        //     "title_sound.*" => ["mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav"],
        //     'title_video.*' => 'max:20480|mimetypes:video/x-ms-asf,video/x-flv,video/mp4,application/x-mpegURL,video/MP2T,video/3gpp,video/quicktime,video/x-msvideo,video/x-ms-wmv,video/avi',
        //     "desc_sound.*" => ["mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav"],
        //     'desc_video.*' => 'max:20480|mimetypes:video/x-ms-asf,video/x-flv,video/mp4,application/x-mpegURL,video/MP2T,video/3gpp,video/quicktime,video/x-msvideo,video/x-ms-wmv,video/avi',
        //    ]);

           $data = [
            'ar' => ["title" => $request->title_ar,"desc" => $request->desc_ar],
            'service_id' => $request->services,
            'order' => $request->order,
            'creator_id' => auth()->user()->id,
        ];

        $item = Document::find($id);
        $item->update($data);

        //upload images
        if(!$request->image == null){
            foreach($request->image as $image){
                $image = $this->uploadFile($image,'uploads/documents/images/');
                $item->images()->create([
                    'image' => $image,
                    'creator_id' => auth()->user()->id,
                ]);
            }
        }
        //upload title sounds
        if(!$request->title_sound == null){
            foreach($request->title_sound as $sound){
                $sound = $this->uploadFile($sound,'uploads/documents/sounds/title/');
                DocumentTranslationMedia::create([
                    'title_sound' => $sound,
                    'document_translation_id'=>$item->translate('ar')->id
                ]);
            }
        }

        //upload desc sounds
        if(!$request->desc_sound == null){
            foreach($request->desc_sound as $sound){
                $sound = $this->uploadFile($sound,'uploads/documents/sounds/desc/');
                DocumentTranslationMedia::create([
                    'desc_sound' => $sound,
                    'document_translation_id'=>$item->translate('ar')->id
                ]);
            }
        }

        //upload title videos
        if(!$request->title_video == null){
            foreach($request->title_video as $video){
                $video = $this->uploadFile($video,'uploads/documents/videos/title/');
                DocumentTranslationMedia::create([
                    'title_video' => $video,
                    'document_translation_id'=>$item->translate('ar')->id
                ]);
            }
        }

        //upload desc videos
        if(!$request->desc_video == null){
            foreach($request->desc_video as $video){
                $video = $this->uploadFile($video,'uploads/documents/videos/desc/');
                DocumentTranslationMedia::create([
                    'desc_video' => $video,
                    'document_translation_id'=>$item->translate('ar')->id
                ]);
            }
        }
        return redirect(route('admin.documents.index'))->withFlashMessage('Updated');

    }

    public function imageAjax($id){
        DocumentImage::find($id)->delete();
        return json_encode('Deleted');

    }

    public function titleSoundAjax($id){
        DocumentTranslationMedia::find($id)->update(['title_sound'=>null]);
        return json_encode('Deleted');
    }
    public function titleVideoAjax($id){
        DocumentTranslationMedia::find($id)->update(['title_video'=>null]);
        return json_encode('Deleted');
    }
    public function descSoundAjax($id){
        DocumentTranslationMedia::find($id)->update(['desc_sound'=>null]);
        return json_encode('Deleted');
    }
    public function descVideoAjax($id){
        DocumentTranslationMedia::find($id)->update(['desc_video'=>null]);
        return json_encode('Deleted');
    }

    public function destroy($id)
    {
        $user = Document::find($id);
        $user->delete();
     return redirect(route('admin.documents.index'))->withFlashMessage('deleted');
    }
}
