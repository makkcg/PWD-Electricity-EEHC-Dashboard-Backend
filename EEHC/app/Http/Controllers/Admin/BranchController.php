<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Branch;
use App\Models\BranchImage;
use App\Models\BranchSound;
use App\Models\BranchVideo;
use App\Models\City;
use App\Models\State;
use App\Traits\FileManagement;

class BranchController extends Controller
{

    use FileManagement;

    public function index()
    {
        $items= Branch::get();
        return View('admin.branches.index',compact('items'));
    }
    public function create()
    {
        $states = State::get();
        return View('admin.branches.create',compact('states'));
    }

    public function store(Request $request)
    {
         $request->validate([
            'name_ar'   => 'required|min:3|max:191' ,
            'desc_ar'   => 'required|min:3|max:1000' ,
            'note_ar'   => 'nullable|min:3|max:1000' ,
            'address_ar'   => 'required|min:3|max:1000' ,
            'map'   => 'nullable|min:3|max:191' ,
            'phone1'   => 'required|regex:/(01)[0-9]{9}/' ,
            'phone2'   => 'nullable|regex:/(01)[0-9]{9}/' ,
            'landline1'   => 'required|min:5|max:11' ,
            'landline2'   => 'nullable|min:5|max:11' ,
            'city'   => 'required' ,
            'email'   => 'required|email|min:3|max:191' ,
            "image.*" => ["image", "mimes:jpg,jpeg,png", "max:2048"],
            "sound.*" => ["mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav"],
            'video.*' => 'max:20480|mimetypes:video/x-ms-asf,video/x-flv,video/mp4,application/x-mpegURL,video/MP2T,video/3gpp,video/quicktime,video/x-msvideo,video/x-ms-wmv,video/avi,video/webm',
           ]);


           $data = [
            'ar' => ["name" => $request->name_ar,"desc" => $request->desc_ar,"note" => $request->note_ar,"address" => $request->address_ar],
            'map' => $request->map,
            'phone1' => $request->phone1,
            'phone2' => $request->phone2,
            'landline1' =>$request->landline1,
            'landline2' =>$request->landline2,
            'email' => $request->email,
            'foundation_id' => 1,
            'city_id' => $request->city,
            'creator_id' => auth()->user()->id,
        ];

         if(isset($request->pwd_status)){
            $data['pwd_status']= 1;
         }
         else{
            $data['pwd_status']= 0;

         }

        $item = Branch::create($data);

        //upload images
        if(!$request->image == null){
            foreach($request->image as $image){
                $image = $this->uploadFile($image,'uploads/branches/images/');
                $item->images()->create([
                    'ar' => ["image" => $image],
                    'creator_id' => auth()->user()->id,
                ]);
            }
        }

        //upload sounds
        if(!$request->sound == null){
            foreach($request->sound as $sound){
                $sound = $this->uploadFile($sound,'uploads/branches/sounds/');
                $item->sounds()->create([
                    'ar' => ["sound" => $sound],
                    'creator_id' => auth()->user()->id,
                ]);
            }
        }

        //upload videos
        if(!$request->video == null){
            foreach($request->video as $video){
                $video = $this->uploadFile($video,'uploads/branches/videos/');
                $item->videos()->create([
                    'ar' => ["video" => $video],
                    'creator_id' => auth()->user()->id,
                ]);
            }
        }
        return redirect(route('admin.branches.index'))->withFlashMessage('Created');

    }
    public function edit($id)
    {
        $states = State::get();
        $item=Branch::find($id);
        return View('admin.branches.edit',compact('item','states'));
    }

    public function update(Request $request, $id)
    {

     /*    $request->validate([
            'name_ar'   => 'required|min:3|max:191' ,
            'desc_ar'   => 'required|min:3|max:1000' ,
            'note_ar'   => 'nullable|min:3|max:1000' ,
            'address_ar'   => 'required|min:3|max:1000' ,
            'map'   => 'nullable|min:3|max:191' ,
            'phone1'   => 'required|regex:/(01)[0-9]{9}/' ,
            'phone2'   => 'nullable|regex:/(01)[0-9]{9}/' ,
            'landline1'   => 'required|min:5|max:11' ,
            'landline2'   => 'nullable|min:5|max:11' ,
            'city'   => 'required' ,
            'email'   => 'required|email|min:3|max:191' ,
            "image.*" => ["image", "mimes:jpg,jpeg,png", "max:2048"],
            "sound.*" => ["mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav"],
            'video.*' => 'max:20480|mimetypes:video/x-ms-asf,video/x-flv,video/mp4,application/x-mpegURL,video/MP2T,video/3gpp,video/quicktime,video/x-msvideo,video/x-ms-wmv,video/avi',
           ]); */


           $data = [
            'ar' => ["name" => $request->name_ar,"desc" => $request->desc_ar,"note" => $request->note_ar,"address" => $request->address_ar],
            'map' => $request->map,
            'phone1' => $request->phone1,
            'phone2' => $request->phone2,
            'landline1' =>$request->landline1,
            'landline2' =>$request->landline2,
            'email' => $request->email,
            'foundation_id' => 1,
            'city_id' => $request->city,
            'creator_id' => auth()->user()->id,
        ];

        if(isset($request->pwd_status)){
            $data['pwd_status']= 1;
         }
         else{
            $data['pwd_status']= 0;

         }
        $item = Branch::find($id);
        $item->update($data);

        //upload images
        if(!$request->image == null){
            foreach($request->image as $image){
                $image = $this->uploadFile($image,'uploads/branches/images/');
                $item->images()->create([
                    'ar' => ["image" => $image],
                    'creator_id' => auth()->user()->id,
                ]);
            }
        }

        //upload sounds
        if(!$request->sound == null){
            foreach($request->sound as $sound){
                $sound = $this->uploadFile($sound,'uploads/branches/sounds/');
                $item->sounds()->create([
                    'ar' => ["sound" => $sound],
                    'creator_id' => auth()->user()->id,
                ]);
            }
        }

        //upload videos
        if(!$request->video == null){
            foreach($request->video as $video){
                $video = $this->uploadFile($video,'uploads/branches/videos/');
                $item->videos()->create([
                    'ar' => ["video" => $video],
                    'creator_id' => auth()->user()->id,
                ]);
            }
        }
        return redirect(route('admin.branches.index'))->withFlashMessage('Updated');

    }

    public function imageAjax($id){
        BranchImage::find($id)->delete();
        return json_encode('Deleted');

    }

    public function soundAjax($id){
        BranchSound::find($id)->delete();
        return json_encode('Deleted');
    }

    public function videoAjax($id){
        BranchVideo::find($id)->delete();
        return json_encode('Deleted');
    }

    public function cityAjax($id)
    {
        $cities = City::where('state_id',$id)->get();
        return json_encode($cities);

    }

    public function destroy($id)
    {
        $user = Branch::find($id);
        $user->delete();
     return redirect(route('admin.branches.index'))->withFlashMessage('deleted');
    }
}
