<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;
use Maatwebsite\Excel\Facades\Excel;
use Throwable;

class ExcelController extends Controller
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function importExportView()
    {
       return View('admin.excels.excels');

    }


    /**
    * @return \Illuminate\Support\Collection
    */
    public function import(Request $request)
    {
        $request->validate([
            'className'   => 'required' ,
            'file'   => 'required' ,
        ]);
        $class =  $request->className;
        try{

            Excel::import(new $class(), $request->file('file'));
        }
        catch(Throwable $e){
            return back()->withErrors($e->getMessage());

        }
        return back()->withFlashMessage('تم الادخال بنجاح');
    }
}
