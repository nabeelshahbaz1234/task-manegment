@extends('dashboard.user.layouts.user-dash-layout')
@section('title','tasks')

@section('content')

<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Tasks</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div>
  </div>
  <div class="row">
      <!-- Left col -->
      <section class="col-lg-12 connectedSortable">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-user-ti"></i>
             Tasks
            </h3>
            <div class="card-tools">
              <ul class="nav nav-pills ml-auto">  
            </div>
          </div>
        </div>

        
  <table-section class="m-2">    
  @if(!empty($pros))
  @foreach ($pros as $project )
@if($project->tasks->where('status',0)->where('assign',Auth::id())->count() > 0)    
  <div class="bg-secondary text-center py-2" style="border-radius: 5px">
  <b class=""> Project Name: </b>&nbsp;&nbsp;
<span class="badge badge-info text-uppercase">{{$project->name ?? ''}}</span>
</div>
    <table class="table table-striped table-hover" style="border-radius: 5px; box-shadow: 0.5px 0.5px 10px rgba(0, 0, 0, 50%);
} margin: 10px 0;">
    <tr class="w-100 table-body">  

        @foreach ($project->tasks->where('status',0)->where('assign',Auth::id())->sortByDesc('priority') as $task)
         <td class="align-middle" style="width: 5%"><b>{{ $loop->iteration }}.</b></td>
      <td class="align-middle" style="width: 5%"><b></b>
      
         <span class="badge badge-info"></span></td>
        <td class="align-middle" style="width: 55%">
        <div class="avatar d-flex">
          <div>
           <a href="{{route('user.detailtask',$task->id)}}"><h4> 
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
          
          if( $task->status=='0'){ ?>
              <a class="badge badge-primary text-uppercase ml-1" href="{{route('user.complete_task',$task->id)}}">InComplete</a>
              <?php }
              else { ?>

              <a class=" badge badge-primary text-uppercase" href="{{route('user.complete_task',$task->id)}}">complete</a>                   
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
            <div class="dropdown-menu "style="margin-right:60px;">       
              
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
                  <i class="far fa-comment-alt"></i>
                  </a>
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
                <div class="col-md-2">
                  <a type="button" class="badge badge-info text-uppercase "style="margin-left:50px;margin-block-end:auto; " onclick="taskComment({{ $task->id }})"data-toggle="modal" data-target="#commentModal" >
                    Reply
                    <i class="fa fa-reply" aria-hidden="true"></i>
                  </a>          
                </div>
            <div class="col-md-2"style="margin-left:100px">
                <p> {{$comment->created_at->diffForHumans()}}</p>
                </div>
                <div class="col-md-2" style="margin-left:200px">
                  <a href="{{route('user.delete_comment',$comment->id)}}" >
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
    
<form action="{{route('user.store_comment')}}" method="post" enctype="multipart/form-data">
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
    var route="{{route('user.comment_update',':id')}}";
    route=route.replace(":id" ,id);
    $.ajax({
    type:'get',
    url:route,
    success:function (response) {
     if(response.status==true){

    }else
    alert(response.message)
    
  }
           })
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
</script>

  @endsection






