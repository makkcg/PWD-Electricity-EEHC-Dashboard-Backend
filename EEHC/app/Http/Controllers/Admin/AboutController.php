<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use App\Models\AboutSound;
use App\Models\AboutVideo;
use App\Traits\FileManagement;

class AboutController extends Controller
{

    use FileManagement;

    public function edit()
    {
        $item=About::first();
        return View('admin.abouts.abouts',compact('item'));
    }

    public function update(Request $request)
    {

         $request->validate([
            'desc_ar'   => 'required|min:3|max:1000' ,
            "sound.*" => ["mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav"],
            'video.*' => 'max:20480|mimetypes:video/x-ms-asf,video/x-flv,video/mp4,application/x-mpegURL,video/MP2T,video/3gpp,video/quicktime,video/x-msvideo,video/x-ms-wmv,video/avi,video/webm',
           ]);


           $data = [
            'ar' => ["desc" => $request->desc_ar],
            'creator_id' => auth()->user()->id,
        ];

        $item = About::first();
        $item->update($data);


        //upload sounds
        if(!$request->sound == null){
            foreach($request->sound as $sound){
                $sound = $this->uploadFile($sound,'uploads/abouts/sounds/');
                $item->sounds()->create([
                    'ar' => ["sound" => $sound],
                    'creator_id' => auth()->user()->id,
                ]);
            }
        }

        //upload videos
        if(!$request->video == null){
            foreach($request->video as $video){
                $video = $this->uploadFile($video,'uploads/abouts/videos/');
                $item->videos()->create([
                    'ar' => ["video" => $video],
                    'creator_id' => auth()->user()->id,
                ]);
            }
        }
        return back()->withFlashMessage('Updated');

    }

    public function soundAjax($id){
        AboutSound::find($id)->delete();
        return json_encode('Deleted');
    }

    public function videoAjax($id){
        AboutVideo::find($id)->delete();
        return json_encode('Deleted');
    }

}
