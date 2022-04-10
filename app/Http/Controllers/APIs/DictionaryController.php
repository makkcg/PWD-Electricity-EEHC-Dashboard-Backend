<?php

namespace App\Http\Controllers\APIs;
use App\Http\Controllers\Controller;
use App\Models\ArabicDictionary;
use App\Http\Resources\Dictionary\ArabicDictionaryResource;
use App\Traits\FileManagement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class DictionaryController extends Controller
{
    use FileManagement;

   public function column(Request $request){

    $validator = Validator::make($request->all(), [
        'foundation_id' => ['required', 'integer', 'exists:foundations,id'],
        'column'        => ['required', 'integer'],
    ]);
    if ($validator->fails()) {
        return response()->error(array($validator->errors()), trans("api/user.check_inputs"), 422);
    }
   $column= ArabicDictionary::where('column' , $request->column)->wherehas('foundation' , function($q) use($request){
        return $q->where('foundation_id', $request->foundation_id);
   })->paginate(10);


   $data = [
    'dictionary' => ArabicDictionaryResource::collection($column),
    'pages_count' => $column->lastPage(),
    'current_page' => $column->currentPage(),
];
   return response()->success($data, trans("api/deaf.successfull_operation"));

}


//    public function getWord(Request $request){
//     $validator = Validator::make($request->all(), [
//         'foundation_id' => ['required', 'integer', 'exists:foundations,id'],
//         'word_id' => ['required', 'integer', 'exists:arabic_dictionaries,id'],
//     ]);
//     if ($validator->fails()) {
//         return response()->error(array($validator->errors()), trans("api/user.check_inputs"), 422);
//     }
//    $word = ArabicDictionary::where('id',$request->word_id)->where('foundation_id' , $request->foundation_id)->first();
//    return response()->success(new ArabicDictionaryResource($word), trans("api/deaf.successfull_operation"));

//     }

}


