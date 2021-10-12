
<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title')</title>
  <base href="{{\URL::to('')}}">

  <!-- Google Font: Source Sans Pro -->
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="{{asset('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback')}}">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
 
{{-- <script>
  $(document).ready(function () {
  var route={
    status_update:"{{route('admin.update_status')}}",

  };
 
  

  function taskstatus(id){
   
  alert('here');
  }
});
    </script> --}}
    <style>
      .set{
        position: absolute;
        transform: translate3d(0px, 38px, 0px);
        top: 0px;
        left: -61px;
        will-change: transform;
      }
    </style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">


  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
    
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('admin.dashboard')}}" class="nav-link">Home</a>
      </li>   
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
      <a class="dropdown-item" href="{{ route('logout') }}"
          onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
      </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
      </ul>
    </nav>
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{\URL::to('/')}}" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Your Site</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{Auth::user()->picture}}"  class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>
 <!-- Sidebar Menu -->
 <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         
          <li class="nav-item">
            <a href="{{route('admin.dashboard')}}" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
               Admin Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('admin.profile')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
               Profile 
              </p>
            </a>
          </li>        
          <li class="nav-item">
            <a href="{{route('admin.clients')}}" class="nav-link">
              <i class="nav-icon fas fa-user-tie"></i>
              <p>
               Client
              </p>
            </a>
          </li>
          <li class="nav-item">
                <a href="{{route('admin.add_project')}}" class="nav-link ">
                  <i class="far fa-folder-open"></i>
                  <p>Project </p>
                </a> 
</li> 
    <li class="side-menus nav-item dropdown">
        <a href="{{route('admin.tasks')}}" class="nav-link has-dropdown">
          <i class="fas fa-tasks"></i>
            <span>Tasks</span></a>
            <li class="nav-item">
              <a href="{{route('admin.complete_task')}}" class="nav-link">
                <i class="fas fa-tasks"></i>
                <p>
                 complete task
                </p>
              </a>
            </li>
          <li class="nav-item">
            <a href="{{route('admin.calender')}}" class="nav-link">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
               Calender
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.users')}}" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
               Users
              </p>
            </a>
          </li>     
          <li class="nav-item">
            <a href="{{route('admin.roles')}}"class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
               Roles
              </p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>
  <div class="content-wrapper">
    @yield('content')
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Task</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div>
    </div>     
        <div class="row">
          <section class="col-lg-12 connectedSortable">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-user-ti"></i>
                 Task 
                </h3>
                <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
<button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModalLong">
  Task Assign
</button>
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLongTitle">New Task</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>

<form action="{{route('admin.storetask')}}" method="post" enctype="multipart/form-data">
<div class="form-group col-sm-12">
  @csrf
<label for="title">Title:</label><span class="required">*</span>
<input id="title" class="form-control" required="" name="title" type="text" placeholder="Enter Task Title">
</div>
<div class="form-group col-sm-12" >
<label for="project_id">Projects:</label><span class="required">*</span>
<select id="inputdep" name="projects"  onchange="project(this.value) "class="form-control">
  <option value="" selected>Select Projects</option>
  @foreach($pros as $pro) 
  <option value="{{$pro->id}}">{{$pro->name}}</option>
  @endforeach
  </select>
</div>                           
<div class="form-group col-md-12">
<label for="inputtask">Assign To:*</label>               
<select  name="assign" class="form-control" id="users">
  <option disabled>Select Assigne </option>
  {{-- @foreach($datas as $data) 
  <option value="{{$data->id}}">{{$data->name}}</option>
  @endforeach --}}
  </select>
  </div>
  <div class="form-group col-sm-12" >
    <label for="project_id"> Tags</label><span class="required">*</span>
    <select id="inputtag" name="tags" class="form-control">
    <option  value="" selected>Choose Tags</option>
    <option value="Good">Good</option>
    <option value="bad">Bad</option>
    <option value="Important">Important</option>
    </select>
    </div> 
    <div class="form-group col-sm-12" >
      <label for="project_id">Priority</label><span class="required">*</span>
      <select id="inputtag" name="priority" class="form-control">
      <option  value="" selected>Choose Priority</option>
      <option value="2">High</option>
      <option value="1">Medium</option>
      <option value="0">Low</option>
      </select>
      </div> 
<div class="form-group col-sm-12">
<label for="due_date">Due Date:*</label>
<input id="dueDate" class="form-control" autocomplete="off" name="due_date" type="date">
  </div>
<div class="form-group col-sm-12">
  <label for="estimate_time">Estimate Time:*</label>
<div class="input-group mb-3">
  <input id="estimateTimeHours" class="form-control" autocomplete="off" name="estimate_time" type="time">
  <div class="input-group-append">
      <input type="hidden" name="estimate_time_type" value="0" id="types">
      <button name="type" type="button" class="input-group-text btn btn-primary text-white" id="Hours" value="1">In Hours</button>
  </div>
  </div>
  </div>   
  <div class="form-group col-sm-12">
   <label for="Add Image">Task Image:*</label>
  <input type="file" name="images[]"multiple class="form-control" placeholder="Enter Image file">
  </div>

  <div class="modal-body">
  <div class="form-group">
    <label>Description:*</label>
       <textarea class="form-control" name="description" aria-label="With textarea" placeholder="Description"></textarea>
       </div>
       </div>


       
<div class="modal-footer ml-auto">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
<button type="submit" class="btn btn-info">Save changes</button>
</div>
</div> 
</form> 
</div>
</div>
</div>
  </div>
</div>

  <table-section class="m-2">    
  @if(!empty($pros))
  @foreach ($pros as $project )
 @if($project->tasks->where('status',0)->count() > 0)    
  <div class="bg-secondary text-center py-2" style="border-radius: 5px">
  <b class=""> Project Name: </b>&nbsp;&nbsp;
<span class="badge badge-info text-uppercase">{{$project->name ?? ''}}</span>
</div>
    <table class="table table-striped table-hover" style="border-radius: 5px; box-shadow: 0.5px 0.5px 10px rgba(0, 0, 0, 50%);
} margin: 10px 0;">
    <tr class="w-100 table-body">  
         @foreach ($project->tasks->where('status','0')->sortByDesc('priority') as $task)
         <td class="align-middle" style="width: 5%"><b>{{ $loop->iteration }}.</b></td>
      <td class="align-middle" style="width: 5%"><b></b>
       <input type="checkbox"  name="status"   id="status" onClick="createNew({{$task->id}});">
         <span class="badge badge-info"></span></td>
        <td class="align-middle" style="width: 55%">
        <div class="avatar d-flex">
          <div>
            <a href="{{route('admin.detail_task',$task->id)}}">   
              <img alt="image" width="40" src="https://ui-avatars.com/api/?name={{$task->title}}&amp;size=30&amp;rounded=true&amp;color=fff&amp;background=fc6369">
           </div>
            <div class="detail ml-2 ">
              <a href="" class="text-dark font-weight-bold "></a>     
              <div>
                <span><span data-toggle="tooltip" title="Email is verified">
                  {{$task->users ? $task->users->name : 'N/A'}}<i
                  class="fas fa-check-circle email-verified"></i>| {{$task->tags}}| </span>
                <span></span>
              </div>
            </div>
          </div>   
        </td>  
        <td class="align-middle" style="width: 10%">
        Task Action :
          <?php
          if ($task->status == '0') { ?>
          
          <p  class="badge badge-primary text-uppercase mr-3">InProgress</p> 
          
        <?php }else { ?>
          <p class="badge badge-success text-uppercase mr-3">Completed</p> 
          
        <?php } ?>
        
        <td class="align-middle" style="width: 10%">
         <a type="button" onclick="collapseComments({{ $task->id }})">
          <span class="badge badge-danger  " id="status_update{{ $task->id }}">{{ $task->comments->where('is_read', 0)->count() ?? 0 }}</span>
            <i class="fas fa-comments"></i>
            
           
                    
           </a>
        </td>
      
      <td class="align-middle" style="width: 10%">
          <div class="btn-group ">
            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            
          </button>
            <div class="dropdown-menu "style="margin-right:80px;">       
              
                  Priority
            <span class="badge badge-secondary text-uppercase">
              @if($task->priority==2)
                    {{'High'}}
                    @elseif($task->priority==1)
                        {{'Medium'}}
                      @elseif($task->priority==0)
                        {{'Low'}}
                    @endif
                            </span>
                          </p>
                          
                      Due Date
                      <span class="badge badge-danger text-uppercase">{{ $task->due_date }}</span> 
             
                <div class="dropdown-divider"></div>
                <div class="card shadow mb-4">                   
                  <a type="button" class="badge badge-success text-uppercase " onclick="taskComment({{ $task->id }})"data-toggle="modal" data-target="#commentModal" >
                  Comment
                  </a>
                </div>
              </div>
          </div>
            <td class="align-middle" style="width: 10%">
           <a class="dropdown dropdown-list-toggle">
            <a href="" data-toggle="dropdown"
                class="notification-toggle action-dropdown position-xs-bottom ml-auto">
            <i class="fas fa-ellipsis-v"></i>
        </a>

        <div class="dropdown-menu dropdown-menu-right ">
          <div class="dropdown-list-content dropdown-list-icons">
            <a href="{{route('admin.edit_task',$task->id)}}"class="dropdown-item dropdown-item-desc edit-btn"
              data-id="1" style="border-top: 3px solid #c227c2"><i
                      class="fas fa-edit mr-2 card-edit-icon"></i> Edit
                  </a>
              <a href="{{route('admin.delete_task',$task->id)}}" class="dropdown-item dropdown-item-desc delete-btn"
                  data-id="1"><i
                  class="fas fa-trash mr-2 card-delete-icon"></i>Delete
              </a>
                </div>

              </div>            
             </div>
          </a>
      </div>
     </div>
      </div>
    </tr>
    <tr class="w-100" id="collapseComments{{$task->id}}" style="display:none">
          <td class="w-100" colspan="12">
            @foreach ($task->comments as $comment )
              <div class="row">
                <div class="col-md-2">
                {{$comment ? $comment->comments : 'N/A' }}
             
                </div>
                <div class="col-md-2" style="margin-left:50px">
                  <a type="button" class="badge badge-info text-uppercase "style="margin-left:40px;margin-block-end:auto; " onclick="taskComment({{ $task->id }})"data-toggle="modal" data-target="#commentModal" >
                    Reply
                    <i class="fa fa-reply" aria-hidden="true"></i>
                  </a>     
                </div>
                <div class="col-md-2"style="margin-left:100px">
                <p> {{$comment->created_at->diffForHumans()}}</p>
                </div>
                <div class="col-md-2" style="margin-left:200px">
                  <a href="{{route('admin.delete_comment',$comment->id)}}" >
                 <i class="fas fa-trash-alt"></i> 
                  </a>
                 
                </div>
                <hr>
              </div>
            @endforeach
      </td>
    </tr>
    @endforeach
    <table> 
    </tbody>
    @endif
  @endforeach
  @endif
</table-section>
</div>

  <div class="modal fade" id="commentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
     <div class="modal-dialog" role="document">
      <div class="modal-content">
      <div class="modal-header">
       <h5 class="modal-title" id="exampleModalLongTitle">ADD T0 Comments</h5>
       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
        </button>
    </div>
    
<form action="{{route('admin.store_comment')}}" method="post" enctype="multipart/form-data">
  <div class="modal-body">
  <div class="form-group">
      @csrf
      <input type="hidden" id="task_id" value="" name="tasks_id">
      <textarea class="form-control" name="comments" placeholder="Leave a comment here" id="comments" style="height: 100px"></textarea>
    </div>
    </div>
     <div class="modal-footer ml-auto">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-info">Save</button>
    </div>




<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>

<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script>
function createNew(id) {
  

      $.ajax({ 
          url: 'admin/admin/update_status',
          data: { id: id ,
            _token: $('meta[name="csrf-token"]').attr('content'),
          },
          type: 'post'
      }).done(function(responseData) {
          console.log('Done: ', responseData);
          location.reload();
      }).fail(function() {
          console.log('Failed');
      });
  
	
}

function taskComment(task_id){
 $('#task_id').val(task_id);
}
  function update_status(id) {
    $.ajax({ 
          url: 'admin/comment_update',
          data: { id: id ,
            _token: $('meta[name="csrf-token"]').attr('content'),
          },
          type: 'post'
      }).done(function(responseData) {
          console.log('Done: ', responseData);
          location.reload();
      }).fail(function() {
          console.log('Failed');
      });
}

</script>

<script>
function collapseComments(task_id){
  update_status(task_id);
  $(`#status_update${task_id}`).text("0");
  var commentstyle=$(`#collapseComments${task_id}`).css('display');
  if(commentstyle== 'none')
  {
  $(`#collapseComments${task_id}`).css('display','');
  }
  else{
    $(`#collapseComments${task_id}`).css('display','none');
  }
}
        function project(id){
        //  alert('here');
          $.ajax({ 
          url: 'admin/admin/project_member',
          data: { id: id ,
            _token: $('meta[name="csrf-token"]').attr('content'),
          },
            method:'POST',
            success:function(response){
              console.log(response);
            
              console.log(response);
              if(response != '' && response != undefined ){
                var html = '';
                html +=`
                  <option name="assign" disabled>Select Asigne</option>
                `;
               jQuery.each(response, function(index, value){
                  html += `
                    <option value="${value['id']}">${value['name']}</option>
                  `
                });
                $('#users').html(html);
                
              }
              else{
                alert(response.message)
              }
            }
          })
        }
</script>

</body>
</html>




