@extends('dashboard.client.layouts.client-dash-layout')
@section('title','tasks')
@section('content')
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
                  </div>
                  </div>
                  <div>
                
                 

<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLongTitle">New Task</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<form action="{{route('client.storetask')}}" method="post" enctype="multipart/form-data">
<div class="form-group col-sm-12">
  @csrf
<label for="title">Title:</label><span class="required">*</span>
<input id="title" class="form-control" required="" name="title" type="text" placeholder="Enter your Task Title ">
</div>
<div class="form-group col-sm-12" >
<label for="project_id">Projects:</label><span class="required">*</span>
<select id="inputdep" name="projects" onchange="project(this.value)" class="form-control">
  <option>Select Projects</option>
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
    <option>Choose Tags</option>
    <option value="Good">Good</option>
    <option value="bad">Bad</option>
    <option value="Important">Important</option>
    </select>
    </div> 
    <div class="form-group col-sm-12" >
      <label for="project_id">Priority</label><span class="required">*</span>
      <select id="inputtag" name="priority" class="form-control">
      <option>Choose Priority</option>
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
       <textarea class="form-control" name="description" aria-label="With textarea"  placeholder="Description"></textarea>
       </div>
       </div>
       
<div class="modal-footer ml-auto">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
<button type="submit" class="btn btn-info">Save changes</button>
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
 @if($project->tasks->where('Assigner',Auth::id())->where('status',0)->count() > 0)    
  <div class="bg-secondary text-center py-2" style="border-radius: 5px">
  <b class=""> Project Name: </b>&nbsp;&nbsp;
<span class="badge badge-info text-uppercase">{{$project->name ?? ''}}</span>
</div>
    <table class="table table-striped table-hover" style="border-radius: 5px; box-shadow: 0.5px 0.5px 10px rgba(0, 0, 0, 50%);
} margin: 10px 0;">
    <tr class="w-100 table-body">  
         @foreach ($project->tasks->where('Assigner',Auth::id())->where('status','0')->sortByDesc('priority') as $task)
         <td class="align-middle" style="width: 5%"><b>{{ $loop->iteration }}.</b></td>
     
         <span class="badge badge-info"></span></td>
        <td class="align-middle" style="width: 55%">
        <div class="avatar d-flex">
          <div>
            <a href="{{route('client.detail_task',$task->id)}}">   
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
         <a type="button" onclick="collapseComments({{ $task->id }})" style="margin-left:40px">
          <span class="badge badge-danger  " id="status_update{{ $task->id }}">{{ $task->comments->where('is_read', 0)->count() ?? 0 }}</span>
            <i class="fas fa-comments"></i>
           
                    
           </a>
        </td>
      
      <td class="align-middle" style="width: 10%">
          <div class="btn-group ">
            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-left:40px">
            
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
                class="notification-toggle action-dropdown position-xs-bottom "style="margin-left:60px">
            <i class="fas fa-ellipsis-v"></i>
        </a>

        <div class="dropdown-menu dropdown-menu-right">
          <div class="dropdown-list-content dropdown-list-icons">
            <a href="{{route('client.edit_task',$task->id)}}"class="dropdown-item dropdown-item-desc edit-btn"
              data-id="1" style="border-top: 3px solid #c227c2"><i
                      class="fas fa-edit mr-2 card-edit-icon"></i> Edit
                  </a>
              <a href="{{route('client.delete_task',$task->id)}}" class="dropdown-item dropdown-item-desc delete-btn"
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
                {{$comment ? $comment->comments : 'N/A'}}
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
                  <a href="{{route('client.delete_comment',$comment->id)}}" >
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
    
<form action="{{route('client.store_comment')}}" method="post" enctype="multipart/form-data">
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

<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script>
function taskComment(task_id){
 $('#task_id').val(task_id);
}
  function update_status(id) {
    $.ajax({ 
          url: 'client/comment_update',
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
          url: 'client/client/project_member',
          data: { id: id ,
            _token: $('meta[name="csrf-token"]').attr('content'),
          },
            method:'POST',
            success:function(response){
             
            
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
                  //  console.log(name);
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

@endsection