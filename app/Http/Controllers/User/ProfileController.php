<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\User;
use App\Models\Project;
use App\Models\Task;
use App\Models\Role;
use App\Models\Permission;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{

    function index(){
      
        return view('dashboard.user.index');
    
      }
      
    function profile()
    {
      
    return view('dashboard.user.userprofile');
    
    }

function change_Pass ()
{  
return view('dashboard.user.password');
}


function update_info(Request $request)
{
$validator = Validator::make($request->all(),[
'name'=>'required',
'email'=> 'required|email|unique:users,email,'.Auth::user()->id,

  ]);

if(!$validator->passes()){
return response()->json(['status'=>0,'error'=>$validator->errors()->toArray()]);
}else{
$query = User::find(Auth::user()->id)->update([
'name'=>$request->name,
'email'=>$request->email,
  ]);

if(!$query){
    return response()->json(['status'=>0,'msg'=>'Something went wrong.']);
}else{
    return response()->json(['status'=>1,'msg'=>'Your profile info has been update successfuly.']);
}
return redirect()->route('user.userprofile');
}

}

public function change_Passwo(Request $request){
//Validate form
$validator = \Validator::make($request->all(),[
'oldpassword'=>[
'required', function($attribute, $value, $fail){
if( !\Hash::check($value, Auth::user()->password) ){
return $fail(__('The current password is incorrect'));
}
},
  'min:8',
  'max:30'
  ],
  'newpassword'=>'required|min:8|max:30',
  'cnewpassword'=>'required|same:newpassword'
  ],[
  'oldpassword.required'=>'Enter your current password',
  'oldpassword.min'=>'Old password must have atleast 8 characters',
  'oldpassword.max'=>'Old password must not be greater than 30 characters',
  'newpassword.required'=>'Enter new password',
  'newpassword.min'=>'New password must have atleast 8 characters',
  'newpassword.max'=>'New password must not be greater than 30 characters',
  'cnewpassword.required'=>'ReEnter your new password',
  'cnewpassword.same'=>'New password and Confirm new password must match'
  ]);

if( !$validator->passes() ){
return response()->json(['status'=>0,'error'=>$validator->errors()->toArray()]);
}else{

$update = User::find(Auth::user()->id)->update(['password'=>\Hash::make($request->newpassword)]);

if( !$update ){
return response()->json(['status'=>0,'msg'=>'Something went wrong, Failed to update password in db']);
}else{
return response()->json(['status'=>1,'msg'=>'Your password has been changed successfully']);
}
return redirect()->route('user.userprofile');
}

}

public function update_Picture(Request $request){
$path = 'users/images/';
$file = $request->file('admin_image');
$new_name = 'UIMG_'.date('Ymd').uniqid().'.jpg';

//Upload new image
$upload = $file->move(public_path($path), $new_name);

if( !$upload ){
    return response()->json(['status'=>0,'msg'=>'Something went wrong, upload new picture failed.']);
}else{
    //Get Old picture
$oldPicture = User::find(Auth::user()->id)->getAttributes()['picture'];

if( $oldPicture != '' ){
if( \File::exists(public_path($path.$oldPicture))){
    \File::delete(public_path($path.$oldPicture));
}
}
//Update DB
$update = User::find(Auth::user()->id)->update(['picture'=>$new_name]);

if( !$upload ){
    return response()->json(['status'=>0,'msg'=>'Something went wrong, updating picture in db failed.']);
}else{
    return response()->json(['status'=>1,'msg'=>'Your profile picture has been updated successfully']);
}
}
}


    function clients()
    {
    $clients = User::where('role','3')->get();
    return view('dashboard.user.clients',compact('clients'));
    
    }

    function detail_clients($id){
     $clients = User::find($id);
     return view('dashboard.user.detailclient',compact('clients'));
    }

    function project()
    {
    $clients=User::where('role','3')->get();
    $users=User::where('role','2')->get();
    $projects = Project::with('clients','users')->get();
    return view('dashboard.user.project',compact('projects','users','clients'));
    
    }
    public function detail_projects($id)
    {
        $project=Project::find($id);
        return view('dashboard.user.detail_projects',compact('project'));
    }
    // user tasks 
    function task()
    {
        $datas=User::where('role','2')->get();
        $pros=Project::all();
        $tasks=Task::with('proj','users')->get(); 
        return view('dashboard.user.task',compact('tasks','datas','pros'));
    
    }

    public function detail_tasks($id){
        $task=Task::find($id);
        return view('dashboard.user.detail_task',compact('task'));
    }

    public function complete_task($id){

        $tasks=Task::find($id); 
        $tasks->status=!$tasks->status;
        $tasks->update();
        return redirect()->route('user.tasks');
    }
    public function store_comment(request $request){

        $comment = new Comment();
        $comment->comments = $request->comments;
        $comment->users_id=Auth::id();
        $comment->tasks_id=$request->tasks_id;
        $comment->save();
         return redirect()->route('user.tasks');
       }
       public function delete_comment($id)
       {
         $comment=Comment::find($id);
         $reslut= $comment->delete();
         return redirect()->route('user.tasks');
       }
       public function Comment_update($id){
        $comment=Comment::where([
          ['task_id',$id],
          ['is_read',0],
      
        ])->get();
        foreach ($comments as $key => $comment) {
          $comment->is_read=!$comment->is_read;
          $comment->update();
        }
        if($comment)
        return response()->json([
          'status'=>true,
          'msessage'=>'status updated',
          
        ],200);
        else
        return response()->json([
          'status'=>false,
          'msessage'=>'something wrong please try again!',
       
           ],400);
           return view('dashboard.admin.tasks',compact('task'));
      }
       

    //    

    function calender()
    {
      
    return view('dashboard.user.calender');
    
    }

    function roles()
    {
    $roles=Role::with('Permission')->get();          
    return view('dashboard.user.roles',compact('roles'));
    
    }
    public function detail_role($id)
    {
        $role=Role::find($id);
        $permission=Permission::find($id);
        return view('dashboard.user.detail_role',compact('role','permission'));
    }

    // function user()
    // {
    // $users=User::with('Role','Projects')->where('role','2')->get();     
    // // $users = User::where('role','2')->get();
    // $roles=Role::all();
    // $project=Project::all();
    // return view('dashboard.user.users',compact('users','roles','project'));
    
    // }
    // public function detail_users($id){
    //     $user=User::find($id);
    //     // $user=User::with('tasks','Projects')->where('role','2')->get();
    //     $Projects=Project::find($id);
    //     // dd($Projects);
    //     $task=Task::find($id);
    //     return view('dashboard.user.detail_users',compact('user','Projects','task'));
    // }
}
