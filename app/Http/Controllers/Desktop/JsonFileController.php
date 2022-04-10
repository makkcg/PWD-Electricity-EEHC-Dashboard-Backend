<?php

namespace App\Http\Controllers\Desktop;

use App\Http\Controllers\Controller;
use App\Http\Resources\Desktop\Foundation\FoundationResource;
use App\Http\Resources\DictionaryTablet\ArabicDictionaryResource;
use App\Models\ArabicDictionary;
use App\Models\Foundation;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use ZipArchive;

/**
 * @group User Management
 *
 * <aside class="notice">Author Fahmi Moustafa</aside>
 * APIs for managing Users
 */
class JsonFileController extends Controller
{

    public function jsonFile()
    {
        ini_set('max_execution_time', 300);
        $table =new FoundationResource(Foundation::with('translation')->first());
        $table= $table->toJson(JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES);
        $filename = "dbd.js";
        File::delete(public_path('uploads/').$filename);
        File::put(public_path('uploads/').$filename,$table);
        $headers = array('Content-type'=> 'application/json');
        $this->dictionaryJsonFile();
        $this->zipFile();
        return back()->withFlashMessage('Updated');

    }

    public function zipFile()
    {
        ini_set('max_execution_time', 300);
        $zip = new ZipArchive();
        $fileName = 'ElecZip.zip';
        $fileTime= 0;

        if(file_exists(public_path('ElecZip.zip'))){
            $fileTime=filemtime(public_path('ElecZip.zip'));
        }

        if ($zip->open(public_path($fileName), ZipArchive::CREATE | ZipArchive::OVERWRITE)== TRUE)
        {
            $files =File::allFiles(public_path('uploads'));
            foreach ($files as  $key => $file){
                if($fileTime<filectime($file)){
                $relativeName = $file->getRelativePathname();
                $zip->addFile($file, $relativeName);
                }
            }
            $zip->close();
        }
        return back()->withFlashMessage('Updated');
    }

    public function dictionaryJsonFile()
    {
        ini_set('max_execution_time', 300);
        $col1= ArabicDictionaryResource::collection(ArabicDictionary::where('column', 1)->wherehas('foundation' , function($q){
            return $q->where('foundation_id', 1);
       })->get());
        $col2=ArabicDictionaryResource::collection(ArabicDictionary::where('column', 2)->wherehas('foundation' , function($q){
            return $q->where('foundation_id', 1);
       })->get());

        $table= [
            'col1' => $col1,
            'col2' => $col2,
        ];

        $table= json_encode($table,JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES);
        $filename = "col.js";
        File::delete(public_path('uploads/').$filename);
        File::put(public_path('uploads/').$filename,$table);
        $headers = array('Content-type'=> 'application/json');
      //  return response()->download($filename,'dicDB.json',$headers);
      return back()->withFlashMessage('Updated');
    }
}
