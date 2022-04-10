<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;
use App\Models\FaqImage;
use App\Models\FaqTranslationMedia;
use App\Models\Service;
use App\Traits\FileManagement;

class FaqController extends Controller
{

    use FileManagement;

    public function index()
    {
        $items= Faq::get();
        return View('admin.faqs.index',compact('items'));
    }
    public function create()
    {
        $services = Service::get();
        return View('admin.faqs.create',compact('services'));
    }

    public function store(Request $request)
    {
         $request->validate([
            'q_and_a_ar'   => 'required|min:3|max:191' ,
            'services'   => 'required' ,
            'order'   => 'required' ,
            "image.*" => ["image", "mimes:jpg,jpeg,png", "max:2048"],
            "q_and_a_sound.*" => ["mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav"],
            'q_and_a_video.*' => 'max:20480|mimetypes:video/x-ms-asf,video/x-flv,video/mp4,application/x-mpegURL,video/MP2T,video/3gpp,video/quicktime,video/x-msvideo,video/x-ms-wmv,video/avi,video/webm',
           ]);

           $data = [
            'ar' => ["q_and_a" => $request->q_and_a_ar],
            'service_id' => $request->services,
            'order' => $request->order,
            'creator_id' => auth()->user()->id,
        ];


        $item = Faq::create($data);
        //upload images
        if(!$request->image == null){
            foreach($request->image as $image){
                $image = $this->uploadFile($image,'uploads/faqs/images/');
                $item->images()->create([
                    'image' => $image,
                    'creator_id' => auth()->user()->id,
                ]);
            }
        }
        //upload q_and_a sounds
        if(!$request->q_and_a_sound == null){
            foreach($request->q_and_a_sound as $sound){
                $sound = $this->uploadFile($sound,'uploads/faqs/sounds/q_and_a/');
                FaqTranslationMedia::create([
                    'q_and_a_sound' => $sound,
                    'faq_translation_id'=>$item->translate('ar')->id
                ]);
            }
        }


        //upload q_and_a videos
        if(!$request->q_and_a_video == null){
            foreach($request->q_and_a_video as $video){
                $video = $this->uploadFile($video,'uploads/faqs/videos/q_and_a/');
                FaqTranslationMedia::create([
                    'q_and_a_video' => $video,
                    'faq_translation_id'=>$item->translate('ar')->id
                ]);
            }
        }


        return redirect(route('admin.faqs.index'))->withFlashMessage('Created');

    }
    public function edit($id)
    {
        $services = Service::get();
        $item=Faq::find($id);
        return View('admin.faqs.edit',compact('item','services'));
    }

    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'q_and_a_ar'   => 'required|min:3|max:191' ,
        //     'services'   => 'required' ,
        //     'order'   => 'required' ,
        //     "image.*" => ["image", "mimes:jpg,jpeg,png", "max:2048"],
        //     "q_and_a_sound.*" => ["mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav"],
        //     'q_and_a_video.*' => 'max:20480|mimetypes:video/x-ms-asf,video/x-flv,video/mp4,application/x-mpegURL,video/MP2T,video/3gpp,video/quicktime,video/x-msvideo,video/x-ms-wmv,video/avi',
        //    ]);

           $data = [
            'ar' => ["q_and_a" => $request->q_and_a_ar],
            'service_id' => $request->services,
            'order' => $request->order,
            'creator_id' => auth()->user()->id,
        ];

        $item = Faq::find($id);
        $item->update($data);

        //upload images
        if(!$request->image == null){
            foreach($request->image as $image){
                $image = $this->uploadFile($image,'uploads/faqs/images/');
                $item->images()->create([
                    'image' => $image,
                    'creator_id' => auth()->user()->id,
                ]);
            }
        }
        //upload q_and_a sounds
        if(!$request->q_and_a_sound == null){
            foreach($request->q_and_a_sound as $sound){
                $sound = $this->uploadFile($sound,'uploads/faqs/sounds/q_and_a/');
                FaqTranslationMedia::create([
                    'q_and_a_sound' => $sound,
                    'faq_translation_id'=>$item->translate('ar')->id
                ]);
            }
        }


        //upload q_and_a videos
        if(!$request->q_and_a_video == null){
            foreach($request->q_and_a_video as $video){
                $video = $this->uploadFile($video,'uploads/faqs/videos/q_and_a/');
                FaqTranslationMedia::create([
                    'q_and_a_video' => $video,
                    'faq_translation_id'=>$item->translate('ar')->id
                ]);
            }
        }
        return redirect(route('admin.faqs.index'))->withFlashMessage('Updated');

    }

    public function imageAjax($id){
        FaqImage::find($id)->delete();
        return json_encode('Deleted');

    }

    public function qAndASoundAjax($id){
        FaqTranslationMedia::find($id)->update(['q_and_a_sound'=>null]);
        return json_encode('Deleted');
    }
    public function qAndAVideoAjax($id){
        FaqTranslationMedia::find($id)->update(['q_and_a_video'=>null]);
        return json_encode('Deleted');
    }

    public function destroy($id)
    {
        $user = Faq::find($id);
        $user->delete();
     return redirect(route('admin.faqs.index'))->withFlashMessage('deleted');
    }
}
