<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Traits\FileManagement;


class EmployeeController extends Controller
{
    use FileManagement;

    public function index()
    {
       $items=User::where('type', 1)->get();
        return view('admin.employees.index', compact('items'));
    }

    public function create()
    {
        $branches = Branch::get();
        return view('admin.employees.create',compact('branches'));
    }

    public function store(Request $request)
    {

        $data = $request->validate([
            "name" => ["required", "string", "max:60"],
            "phone" => ["required", "string", "max:60","unique:users,phone"],
            "branch_id" => ["required", "integer"],
            "email" => ["required", "email:rfc,filter", "unique:users,email"],
            "password" => ["required", "confirmed",'min:8'],
        ]);
        $user = User::create([
            "name" => $request->name,
            "phone" => $request->phone,
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "branch_id" => $request->branch_id,
        ]);
        if ($user->wasRecentlyCreated) {
            $user->access_token = $user->createToken("khraba", ["user"])->plainTextToken;
            //qr code
           $user->qr_code = $this->generateQrCode();
            $user->save();
            return redirect(route('admin.employees.index'))->withFlashMessage('added');
        } else {
            $error = array(["failed" => [trans("api/user.failed_operation")]]);
            return response()->error($error, trans("api/user.failed_to_register"));
            return redirect(route('admin.employees.index'))->withFlashMessage(trans("api/user.failed_to_register"));

        }

    }

    public function edit($id)
    {
        $branches = Branch::get();
        $item=User::find($id);
        return view('admin.employees.edit',compact('item','branches'));
    }

    public function update(Request $request, $id)
    {
        $user=User::find($id);

        $data = $request->validate([
            "name" => ["nullable", "string", "max:60"],
            "phone" => ["nullable", "string", "max:60","unique:users,phone,".$user->id],
            "email" => ["nullable", "email:rfc,filter", "unique:users,email,".$user->id],
            "password" => ["required", "confirmed",'min:8'],
            "branch_id" => ["required", "integer"],
        ]);
        $user = $user->update([
            "name" => $request->name,
            "phone" => $request->phone,
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "branch_id" => $request->branch_id,
        ]);
        return redirect(route('admin.employees.index'))->withFlashMessage('updated');
    }


    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
     return redirect(route('admin.employees.index'))->withFlashMessage('deleted');
    }

    }
