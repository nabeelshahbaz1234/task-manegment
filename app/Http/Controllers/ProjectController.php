<?php

namespace App\Http\Controllers;
use App\Models\Project;
use App\Models\User;
use App\Models\Role;
// use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    function add_project(){ 
        $clients=User::where('role','3')->get();
        $users=User::where('role','2')->get();
        $projects = Project::with('clients','users')->get();
        // dd($projects);
        return view('dashboard.admin.add_project',compact('projects','users','clients'));
    }

   public function add_proj(request $request){
   
         $project=new Project();
         $project->name = $request->name;
         $project->prefix=$request->prefix;
         $project->client=$request->client;
         $project->save();
        
        $user=User::find($request->user);
        //exit($user);
        $project->users()->attach($user);
        //  dd($project->users);
       
         return redirect()->route('admin.add_project');
        }
  function edit_project($id)
      {
      $clients=User::Where ('role','3')->get();
      $users=User::where('role','2')->get();
      $project=Project::find($id);
      
      return view('dashboard.admin.edit_project',compact('project','users','clients'));
      }
   public function update_project(request $request,$id)
      {
        $project=Project::find($id);
        $project->name = $request->name;
        $project->prefix=$request->prefix;
        $project->client=$request->client;
        // / $project->user=$request->user;
       $project->users()->sync($request->user);
        $project->update();
        return redirect()->route('admin.add_project');   
      }
      public function delete_project($id)
      {
      $data= Project::find($id);
      $reslut= $data->delete();
      return redirect()->route('admin.add_project'); 
      }
      function detail_project($id)
      {
      $project=Project::find($id);
      return view('dashboard.admin.detail_project',compact('project'));
      }
    

}
