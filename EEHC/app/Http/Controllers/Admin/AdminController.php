<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function index()
    {
       $items=User::where('type', 0)->get();
        return view('admin.admins.index', compact('items'));
    }

    public function create()
    {
        $roles=Role::get();
        return view('admin.admins.create',compact('roles'));
    }

    public function store(Request $request)
    {

        $data = $request->validate([
            'name'   => 'required|min:3|max:191' ,
            "email" => ["required", "email:rfc,filter", "unique:users,email"],
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required',
        ]);
        $data['password']= Hash::make($data['password']);

        $data['type'] = 0;
      $user=  User::create($data);
      $user->assignRole($request->role);

      return redirect(route('admin.admins.index'))->withFlashMessage('added');
    }

    public function edit($id)
    {
        $roles=Role::get();
        $item=User::find($id);
        return view('admin.admins.edit',compact('item','roles'));
    }

    public function update(Request $request, $id)
    {
        $user=User::find($id);

        $data = $request->validate([
            'name'   => 'required|min:3|max:191' ,
            "email" => ["nullable", "email:rfc,filter", "unique:users,email,".$user->id],
            'password' => '',
            'role' => 'required',

        ]);

        if($request->password != null){
            $data['password']= Hash::make($data['password']);
        }

        $user->update($data);
        $user->roles()->detach();
        $user->assignRole($request->role);
        return redirect(route('admin.admins.index'))->withFlashMessage('updated');
    }


    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
     return redirect(route('admin.admins.index'))->withFlashMessage('deleted');
    }

    }
