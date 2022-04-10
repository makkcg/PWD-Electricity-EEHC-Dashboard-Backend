<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;


class DeafController extends Controller
{

    public function index()
    {
        $items=User::where('type', '2')->get();
        return view('admin.users.index',compact('items'));
    }

}
