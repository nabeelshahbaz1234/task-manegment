<?php

namespace App\Http\Controllers;
use App\Models\User;
use Auth;
use App\Models\Task;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Comment;
use App\Models\Task_images;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
  function index(){
    $datas=User::where('role','2')->get();
    $pros=Project::all();
    $tasks=Task::with('proj','users')->where('status','0')->get(); 
    return view('dashboard.client.index',compact('tasks','datas','pros'));

 }
 public function view($id)
  {
  $project=Project::find($id);
  return view('dashboard.client.view',compact('project'));
  }
//  Clinet Dashboard project code
  function project()
  {
  $clients=User::where('role','3')->get();
  $users=User::where('role','2')->get();
  $projects = Project::with('clients','users')->get();
  return view('dashboard.client.project',compact('projects','users','clients'));
  
  }
  public function detail_projects($id)
  {
      $project=Project::find($id);
      return view('dashboard.client.detail_projects',compact('project'));
  }
    

  public function profile(){
      
    return view('dashboard.client.profile');

  }

  // Task of all Clien site


  public function storetask(request $request)
    {
      $task=new Task();
      $task->title = $request->title;
      $task->projects=$request->projects;
      $task->assign=$request->assign;
      $task->Assigner=Auth::id();
      $task->due_date=$request->due_date; 
      $task->tags=$request->tags; 
      $task->priority=$request->priority; 
      $task->estimate_time=$request->estimate_time;
      $task->description=$request->description;
      $task->save();
      $iamges=$request->images;
      if( $iamges){
      foreach ($iamges as $image) {
       // dd($image);
        $image1=new Task_images();
        $image1->task_id = $task->id;
        $image_name = md5(rand(1000, 10000));
        $ext = strtolower($image->getClientOriginalExtension());
        $image_full_name = $image_name.'.'.$ext;
        $upload_path ='users/images/';
        $image_url = $upload_path.$image_full_name;
        $image->move($upload_path, $image_full_name);
        $image1->images =$image_url ;
        $image1->save();
      }
    }

      return redirect()->route('client.tasks');
    }
    public function task(){
      $datas=User::where('role','2')->get();
      $pros=Project::all();
      $tasks=Task::with('proj','users')->where('status','0')->get(); 
      return view('dashboard.client.task',compact('tasks','datas','pros'));
  
    }

    public function edit_task($id)
    {
      
     $task=Task::with('Task_images')->find($id);
     $datas=User::where('role','2')->get();
     $pros=Project::all(); 
     return view('dashboard.client.edit_task',compact('task','pros','datas'));
    }

   
    public function update_task(Request $request,$id)
    {
      $task = Task::find($id);
      // $images=Task_images::find($id);
      $task->title = $request->title;
      $task->projects=$request->projects;
      $task->assign=$request->assign;
      $task->due_date=$request->due_date; 
      $task->tags=$request->tags; 
      $task->priority=$request->priority; 
      $task->estimate_time=$request->estimate_time;
      $task->description=$request->description;  
      $task->update();
      $images=$request->images;
      if($images){
      foreach ($images as $image) {
       // dd($image);
       $image1=new Task_images();
       $image1->task_id = $id;
        $image_name = md5(rand(1000, 10000));
        $ext = strtolower($image->getClientOriginalExtension());
        $image_full_name = $image_name.'.'.$ext;
        $upload_path ='users/images/';
        $image_url = $upload_path.$image_full_name;
        $image->move($upload_path, $image_full_name);
        $image1->images =$image_url ;
        $image1->save();
      }
    }
    return redirect()->back()->with('success',"sucessfully updated");
  }
   
  public function delete_image($id)
  {
    
    $image=Task_images::find($id);
    $reslut= $image->delete();
    return redirect()->back();
  }


    public function delete_task($id)
    {
      //dd($id);
      $task=Task::find($id);
      $reslut= $task->delete();
      $image=Task_images::where('task_id',$id)->get();
      $image->each->delete();

      return redirect()->route('client.tasks');
    }
    public function detail_task($id)
    {
      $task=Task::find($id);
      return view('dashboard.client.detail_task',compact('task'));
    }
    
public function store_comment(request $request){

  $comment = new Comment();
  $comment->comments = $request->comments;
  $comment->users_id=Auth::id();
  $comment->tasks_id=$request->tasks_id;
  $comment->save();
   return redirect()->route('client.tasks');
 }
 public function delete_comment($id)
 {
   $comment=Comment::find($id);
   $reslut= $comment->delete();
   return redirect()->route('client.tasks');
 }
 
 public function Comment_update(REQUEST $request){
   $comments=Comment::where('is_read','=',0)->update(['is_read'=>1]);
   // foreach ($comments as $key => $comment) {
   //   $comment->is_read=!$comment->is_read;
    
   // }
   if($comments)
   return response()->json([
     'status'=>true,
     'msessage'=>'status updated',
     
   ],200);
   else
   return response()->json([
     'status'=>false,
     'msessage'=>'something wrong please try again!',
  
      ],400);
      return view('dashboard.client.tasks',compact('task'));
 }

public function project_member(REQUEST $request){
  $project = Project::with('users')->where('id', $request->id)->first();     
  $users = $project->users;
  return $users;

} public function invoice()
{
  return view('dashboard.client.invoice');
}


      // 
 public function password()
{  
  return view('dashboard.client.password');
}


 public function update_info(Request $request)
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
return redirect()->route('client.profile');
}

}

public function update_Password(Request $request){
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
return redirect()->route('client.profile');
}

}

public function change_picture(Request $request){
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




// Admin Site client code

      public function clients()
      {
      $clients=User::with('clienT_Projects')->where('role','3')->get(); 
      $project=Project::all();
      return view('dashboard.admin.clients', compact('clients','project'));
      }
      public function store(Request $request)
      {   
        
       $clie=new User();
       $clie->name = $request->name;
       $clie->department=$request->department;
       $clie->email=$request->email;
       $clie->role=$request->role;
       $clie->password=Hash::make($request->password);
       $clie->website=$request->website;   
      if($request->hasfile('image'))
      {
        $file=$request->file('image');
        $extension=$file->getClientOriginalExtension();
        $name=$file->getClientOriginalName();
        $name=pathinfo($name,PATHINFO_FILENAME);
        $filename=$name.time().'.'.$extension;
        $file->move('users/images/',$filename);
        $clie->image = $filename;    
          }
          $clie->save();
          return redirect()->route('admin.clients');
        }
       public function edit_client($id)
      {
      $client = User::find($id);
      return view('dashboard.admin.edit_client',compact('client'));
      }

      public function update_client(Request $request)
      {
   
       $client = User::find($request->id);
       $client->name = $request->name;
       $client->department=$request->department;
       $client->email=$request->email;
       $client->password=\Hash::make($request->password);
      //  $client->co_password=\Hash::make($request->co_password);
       $client->website=$request->website;
  
      if($request->hasfile('image'))
      {
        // $destination ='users/images/'.$client->image;
        // if(file::exists($destination))
        // {
        //     File::delete($destination);
        // }
        $file=$request->file('image');
        $extension=$file->getClientOriginalExtension();
        $name=$file->getClientOriginalName(); 
        $name=pathinfo($name,PATHINFO_FILENAME);
        $filename=$name.time().'.'.$extension;
        
        $file->move('users/images/',$filename);
        $client->image = $filename;  
        }  
        $reslut= $client->save();
        return redirect()->route('admin.clients'); 
        }

        public function delete_client($id)
        {
        $data= User::find($id);
        $reslut= $data->delete();
        return redirect()->route('admin.clients'); 
        }


     public function detail_client($id)
     {
      $clients = User::find($id);
      $Projects=Project::find($id);
       return view('dashboard.admin.detail_client',compact('clients','Projects'));
     }

    
}
