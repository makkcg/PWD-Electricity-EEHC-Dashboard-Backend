<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ArabicDictionary;
use App\Models\ArabicDictionaryMedia;
use App\Traits\FileManagement;

class DictionaryController extends Controller
{

    use FileManagement;

    public function index()
    {
        $items= ArabicDictionary::get();
        return View('admin.dictionaries.index',compact('items'));
    }
    public function create()
    {
        return View('admin.dictionaries.create');
    }

    public function store(Request $request)
    {
         $request->validate([
            'word'   => 'required|min:1|max:1000' ,
            'column'   => 'required' ,
            "image.*" => ["image", "mimes:jpg,jpeg,png", "max:2048"],
            'video.*' => 'max:20480|mimetypes:video/x-ms-asf,video/x-flv,video/mp4,application/x-mpegURL,video/MP2T,video/3gpp,video/quicktime,video/x-msvideo,video/x-ms-wmv,video/avi,video/webm',
           ]);

           $data = [
            'word' => $request->word,
            'column' => $request->column,
        ];


        $item = ArabicDictionary::create($data);

        $item->foundation()->sync([
            'foundation_id' => 1
        ]);
        //upload images
        if(!$request->image == null){
            foreach($request->image as $image){
                $image = $this->uploadFile($image,'uploads/dictionary/images/');
                ArabicDictionaryMedia::create([
                    'image' => $image,
                    'foundation_id'=>1,
                    'arabic_dictionary_id'=>$item->id,
                ]);
            }
        }

        //upload videos
        if(!$request->video == null){
            foreach($request->video as $video){
                $video = $this->uploadFile($video,'uploads/dictionary/videos/');
                ArabicDictionaryMedia::create([
                    'video' => $video,
                    'foundation_id'=>1,
                    'arabic_dictionary_id'=>$item->id,
           ]);
            }
        }
        return redirect(route('admin.dictionaries.index'))->withFlashMessage('Created');

    }
    public function edit($id)
    {
        $item=ArabicDictionary::find($id);
        return View('admin.dictionaries.edit',compact('item'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'word'   => 'required|min:1|max:1000' ,
            'column'   => 'required' ,
            "image.*" => ["image", "mimes:jpg,jpeg,png", "max:2048"],
            'video.*' => 'max:20480|mimetypes:video/x-ms-asf,video/x-flv,video/mp4,application/x-mpegURL,video/MP2T,video/3gpp,video/quicktime,video/x-msvideo,video/x-ms-wmv,video/avi,video/webm',
           ]);

           $data = [
            'word' => $request->word,
            'column' => $request->column,
        ];

        $item = ArabicDictionary::find($id);
        $item->update($data);

        $item->foundation()->sync([
            'foundation_id' => 1
        ]);
        //upload images
        if(!$request->image == null){
            foreach($request->image as $image){
                $image = $this->uploadFile($image,'uploads/dictionary/images/');
                ArabicDictionaryMedia::create([
                    'image' => $image,
                    'foundation_id'=>1,
                    'arabic_dictionary_id'=>$item->id,
                ]);
            }
        }

        //upload videos
        if(!$request->video == null){
            foreach($request->video as $video){
                $video = $this->uploadFile($video,'uploads/dictionary/videos/');
                ArabicDictionaryMedia::create([
                    'video' => $video,
                    'foundation_id'=>1,
                    'arabic_dictionary_id'=>$item->id,
           ]);
            }
        }
        return redirect(route('admin.dictionaries.index'))->withFlashMessage('Updated');

    }

    public function imageAjax($id){
        ArabicDictionaryMedia::find($id)->update(['image'=>null]);
        return json_encode('Deleted');

    }

    public function videoAjax($id){
        ArabicDictionaryMedia::find($id)->update(['video'=>null]);
        return json_encode('Deleted');
    }

    public function destroy($id)
    {
        $user = ArabicDictionary::find($id);
        $user->delete();
     return redirect(route('admin.dictionaries.index'))->withFlashMessage('deleted');
    }
}
