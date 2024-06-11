<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\helper;
use App\Models\Foundation;
use App\Models\ContactMessage;
use App\Models\FoundationImage;
use App\Models\FoundationSound;
use App\Models\FoundationVideo;
use App\Traits\FileManagement;

class FoundationController extends Controller
{

    use FileManagement;

    public function edit()
    {
        $item=Foundation::first();
        return View('admin.foundations.foundations',compact('item'));
    }

    public function update(Request $request)
    {

         $request->validate([
            'name_ar'   => 'required|min:3|max:191' ,
            'desc_ar'   => 'required|min:3' ,
            'website'   => 'required|min:3|max:191' ,
            'map'   => 'nullable|min:3|max:191' ,
            'phone'   => 'required' ,
            'landline'   => 'nullable|min:5|max:11' ,
            'email'   => 'required|email|min:3|max:191' ,
            "image.*" => ["image", "mimes:jpg,jpeg,png", "max:2048"],
            "sound.*" => ["mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav"],
            'video.*' => 'max:20480|mimetypes:video/x-ms-asf,video/x-flv,video/mp4,application/x-mpegURL,video/MP2T,video/3gpp,video/quicktime,video/x-msvideo,video/x-ms-wmv,video/avi,video/webm',
           ]);


           $data = [
            'ar' => ["name" => $request->name_ar,"desc" => $request->desc_ar],
            'map' => $request->map,
            'website' => $request->website,
            'phone' => $request->phone,
            'landline' =>$request->landline,
            'email' => $request->email,
            'creator_id' => auth()->user()->id,
        ];

        $item = Foundation::first();
        $item->update($data);

        //upload images
        if(!$request->image == null){
            foreach($request->image as $image){
                $image = $this->uploadFile($image,'uploads/foundations/images/');
                $item->images()->create([
                    'ar' => ["image" => $image],
                    'creator_id' => auth()->user()->id,
                ]);
            }
        }

        //upload sounds
        if(!$request->sound == null){
            foreach($request->sound as $sound){
                $sound = $this->uploadFile($sound,'uploads/foundations/sounds/');
                $item->sounds()->create([
                    'ar' => ["sound" => $sound],
                    'creator_id' => auth()->user()->id,
                ]);
            }
        }

        //upload videos
        if(!$request->video == null){
            foreach($request->video as $video){
                $video = $this->uploadFile($video,'uploads/foundations/videos/');
                $item->videos()->create([
                    'ar' => ["video" => $video],
                    'creator_id' => auth()->user()->id,
                ]);
            }
        }
        return back()->withFlashMessage('Updated');

    }

    public function imageAjax($id){
        FoundationImage::find($id)->delete();
        return json_encode('Deleted');

    }

    public function soundAjax($id){
        FoundationSound::find($id)->delete();
        return json_encode('Deleted');
    }

    public function videoAjax($id){
        FoundationVideo::find($id)->delete();
        return json_encode('Deleted');
    }

    public function checkUpdate()
    {

        if(file_exists(public_path('ElecZip.zip'))){
            $fileTime=date("Y-m-d H:i:s",filemtime(public_path('ElecZip.zip')));
        }
        else{
            $fileTime = 'no time';
        }
        return $fileTime;

    }
}
