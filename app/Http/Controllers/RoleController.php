<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Support\Facades\DB;


class RoleController extends Controller
{
    public function roles()
    {
    $roles=Role::with('Permission')->get();          
    return view('dashboard.admin.roles',compact('roles'));
    }

    public function add_role(Request $request)
    {
    $data = [
    'name' => $request->name,
    'description' => $request->description,
    ];

    $role = Role::create($data);
    $pr=$request->permissions;
    if( $pr){
    foreach( $pr as $per){
    $permission = new permission();
    $permission->role_id = $role->id;
    $permission->permissions = $per;
    $permission->save();
    }
}
    return redirect()->route('admin.roles');
    }
       
    public function edit_role($id){  
    $role=Role::find($id);
    $permissions=Permission::where('role_id',$id);
    return view('dashboard.admin.edit_role',compact('role','permissions')); 
}
    public function update_role(Request $request){
    // dd($request);
    $role = Role::find($request->id);
    $role->name=$request->name;
    $role->description=$request->description;
    $role->update();
    $Permission = Permission::where('role_id',$request->id);
    $Permission->delete();
    $pr=$request->permissions;  
    if($pr){
    foreach( $pr as $per){
    $permission = new permission();
    $permission->role_id = $request->id;
    $permission->permissions = $per;
    $permission->save();
    }
}

    return redirect()->route('admin.roles');

    }
    public function delete_role($id)
    {
    $role= Role::find($id);
    $reslut= $role->delete();
    $permission=Permission::where('role_id',$id);
    $reslut= $permission->delete();
    return redirect()->route('admin.roles'); 
    }

    public function detail_role($id)
    {
        $role=Role::find($id);
        $permission=Permission::find($id);
        return view('dashboard.admin.detail_role',compact('role','permission'));
    }
}
