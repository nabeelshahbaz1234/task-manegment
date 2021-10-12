<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Project;
use App\Models\Role;
use App\Models\Task;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{


  public function storeUser(Request $request)
  {   
   $user=new User();
   $user->name = $request->name;
   $user->email=$request->email;
   $user->phone=$request->phone;
   $user->password=Hash::make($request->password);
   $user->project=$request->project; 
   $user->pr_roles=$request->pr_roles;
   $user->role=$request->role;
   $user->salary=$request->salary;
  if($request->hasfile('image'))
  {
    $file=$request->file('image');
    $extension=$file->getClientOriginalExtension();
    $name=$file->getClientOriginalName(); 
    $name=pathinfo($name,PATHINFO_FILENAME);
    $filename=$name.time().'.'.$extension;
    $file->move('users/images/',$filename);
    $user->image = $filename;
    $user->save();
    return redirect()->route('admin.users')->with('status','user add successfully');
  }
 }

  public function users()
  {
    $users=User::with('Role','Projects')->where('role','2')->get();     
    // $users = User::where('role','2')->get();
    $roles=Role::all();
    $project=Project::all();

   return view('dashboard.admin.users',compact('users','roles','project'));

  }

  public function edit_user($id)
  {
    // dd($id);
  $users = User::find($id);
  $roles=Role::all();
  $project=Project::all();

  return view('dashboard.admin.edit_user',compact('users','roles','project'));
  }

  public function update_user(Request $request,$id)
  {
    // dd($request);
   $users = User::find($id);
   $users->name = $request->name;
   $users->email=$request->email;
   $users->phone=$request->phone;
   $users->password=Hash::make($request->password);
   $users->project=$request->project; 
   $users->pr_roles=$request->pr_roles;
   $users->role=$request->role;
   $users->salary=$request->salary;
  //  return $request;
  if($request->hasfile('image'))
  {
    $file=$request->file('image');
    $extension=$file->getClientOriginalExtension();
    $name=$file->getClientOriginalName(); 
    $name=pathinfo($name,PATHINFO_FILENAME);
    $filename=$name.time().'.'.$extension;
    $file->move('users/images/',$filename);
    $users->image = $filename;  
  }
  $users->update();
  return redirect()->route('admin.users');
 }
 public function delete_user($id)
  {
  $data= User::find($id);
  $reslut= $data->delete();
  return redirect()->route('admin.users'); 
  }

  public function detail_user($id)
  {
    $user=User::find($id);
    // $user=User::with('tasks','Projects')->where('role','2')->get();
    $Projects=Project::find($id);
    // dd($Projects);
    $task=Task::find($id);
   
    return view('dashboard.admin.detail_user',compact('user','Projects','task'));
  }





}
