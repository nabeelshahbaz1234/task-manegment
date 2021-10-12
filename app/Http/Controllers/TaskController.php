<?php

namespace App\Http\Controllers;
use App\Models\Task;
use App\Models\Project;
use App\Models\User;
use App\Models\Comment;
use App\Models\Task_images;
use Auth;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function tasks()
    {
      $datas=User::where('role','2')->get();
      $pros=Project::all();
      $tasks=Task::with('proj','users')->where('status','0')->get(); 
    return view('dashboard.admin.tasks',compact('tasks','datas','pros'));
    }
    
    public function storetask(request $request)
    {
      $task=new Task();
      $task->title = $request->title;
      $task->projects=$request->projects;
      $task->assign=$request->assign;
      $task->due_date=$request->due_date; 
      $task->tags=$request->tags; 
      $task->Assigner=Auth::id();
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
     
      return redirect()->route('admin.tasks');
    }


    public function edit_task($id)
    {
      
     $task=Task::with('Task_images')->find($id);
     $datas=User::where('role','2')->get();
     $pros=Project::all(); 
     return view('dashboard.admin.edit_task',compact('task','pros','datas',));
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

      return redirect()->route('admin.tasks');
    }
    
    public function detail_task($id)
    {
      $task=Task::find($id);
      //  $Projects=Project::find($id);
      //  $users=User::find($id);
      return view('dashboard.admin.detail_task',compact('task'));
  }
  public function update_status(request $request){
    //return($id);
    $task=Task::find($request->id);
    $task->status=1;

    if($task->update())
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
    public function complete_task(){
      $datas=User::where('role','2')->get();
      $pros=Project::all();
      $tasks=Task::with('proj','users')->where('status',1)->get(); 
    return view('dashboard.admin.complete_task',compact('tasks','datas','pros'));
  

    }

    public function status_change($id){
    
      $tasks=Task::find($id);
      $tasks->status=!$tasks->status;
      $tasks->update();
      return redirect()->route('admin.complete_task');
    }

public function store_comment(request $request){

 $comment = new Comment();
 $comment->comments = $request->comments;
 $comment->users_id=Auth::id();
 $comment->tasks_id=$request->tasks_id;
 $comment->save();
  return redirect()->route('admin.tasks');
}
public function delete_comment($id)
{
  $comment=Comment::find($id);
  $reslut= $comment->delete();
  return redirect()->route('admin.tasks');
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
     return view('dashboard.admin.tasks',compact('task'));
}

public function project_member(REQUEST $request){
  $project = Project::with('users')->where('id', $request->id)->first();     
  $users = $project->users;
  return $users;


}

}
