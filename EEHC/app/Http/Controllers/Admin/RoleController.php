<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index',compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::get();
        return view('admin.roles.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name'              => 'required|regex:/^[A-Za-z_-]+$/|unique:roles,name',
                'permissions.*'     => 'required|exists:permissions,id'
            ]);
        $item = Role::create(['name' =>$request->name]);
        $item->permissions()->sync($request->permissions);
        return redirect()->route('admin.roles.index')->with('success', 'New Role add successfully');
    }

    public function edit(Role $role)
    {

        $role=Role::with(['permissions'])->where('id', $role->id)->first();
        $permissions = Permission::get();
        return view('admin.roles.edit',compact('role','permissions'));
    }

    public function update(Request $request, Role $role)
    {

        $request->validate(
            [
                'name'              => 'required|regex:/^[A-Za-z_-]+$/|unique:roles,name,'.$role->id,
                'permissions.*'     => 'required|exists:permissions,id'
            ]);

        $role->update($request->all());
        $role->permissions()->sync($request->permissions);
        return redirect()->route('admin.roles.index')->with('success', 'Role updated successfully');
    }

    public function destroy($id)
    {
        $role = Role::find($id);
        $role->delete();
     return redirect(route('admin.roles.index'))->withFlashMessage('deleted');
    }

}
