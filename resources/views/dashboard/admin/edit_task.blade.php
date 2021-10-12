<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Client</title>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
 
<!-- Jquery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="toastr.js" ></script>
<script src="toastr.min.js" ></script>
@if(Session::has('success'))
    <script>
        toastr.success('{{  Session::get('success') }}')
    </script>
@endif

@if(Session::has('error'))
    <script>
        toastr.error('{{  Session::get('error') }}')
    </script>
@endif


</head>

<style>
.img-wrap {
    display: flex;
}
.img-wrap .close {
    position: absolute;
    top: 2px;
    right: 2px;
    z-index: 100;
    ...
}

.img-wrapper{
    position: relative;
}

.close{
    position: absolute;
    top:0;
    right:0;
}
</style>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">
        <div class="container-fluid">

<div class="card shadow mb-4">
<div class="card-header py-3">
<h6 class="m-0 font-weight-bold text-primary">Edit Task</h6>


</div>
<div class="card-body">

<form action="{{route('admin.update_task',$task->id)}}" method="post" enctype="multipart/form-data">
    <input type="hidden" name="edit_id"  >
    <div class="form-group">
        @csrf
        <label> Title: </label>
        <input type="text" name="title" value="{{$task->title}}" class="form-control" placeholder="Enter title">
    </div>
               {{-- @dd($pros) --}}
    <div class="form-group">
        <label> Projects</label>
        <select id="inputdep" value="" name="projects"class="form-control">
            <option disabled>Projects</option>
            @foreach($pros as $pro)
            <option  value="{{$pro->id}}"{{$task->projects== $pro->id ? 'selected': ""}}>{{$pro->name}}</option>
            @endforeach
            </select>
    
        </div> 
        <div class="form-group">
        <label> Assign To</label>
        <select id="inputdep" value="" name="assign"class="form-control">         
            <option disabled>Assign to</option>
            @foreach($datas as $data)
            <option  value="{{$data->id}}"{{$task->assign == $data->id ? 'selected': ""}}>{{$data->name}}</option>
            @endforeach
            </select>
    
            </div>
            <div class="form-group">
            <label> Tags</label>
            <select id="inputdep" value="{{$task->tags}}" name="tags"class="form-control">
            <option disabled>Choose Tags</option>
            <option value="Good" {{$task->tags == "Good" ? 'selected' : ""}}>Good</option>
            <option value="bad" {{$task->tags == "bad" ? 'selected' : ""}}>Bad</option>
            <option value="Important"  {{$task->tags == "Important" ? 'selected' : ""}}>Important</option>
            </select>
            </div>
<div class="form-group">
    <label> Priority</label>
    <select id="inputdep" value="{{$task->priority}}" name="priority"class="form-control">    
    <option disabled>Choose priority</option>
    <option value="2" {{$task->priority == "2" ? 'selected' : ""}}>High</option>
    <option value="1"{{$task->priority == "1" ? 'selected' : ""}}>Medium</option>
    <option value="0"{{$task->priority == "0" ? 'selected' : ""}}>Low</option>
    </select>
    </div>
    <div class="form-group">
    <label> Due_Date</label>
    <input type="date" name="due_date" value="{{$task->due_date}}" class="form-control" placeholder="Enter Due_Date">
    </div>
    <div class="form-group">
    <label> Estimate_Time</label>
    <input type="time" name="estimate_time" value="{{$task->estimate_time}}" class="form-control" placeholder="Enter Estimate_time">
    </div>
     <div class="form-group">
    <label> Task Image</label>
    <input type="file" name="images[]" multiple value="" class="form-control" placeholder="Enter Image">

<hr>
<div class="img-wrap">
     @if($task->Task_images)
     @foreach (json_decode($task->Task_images) as $image)
      <div class="img-wrapper" style="margin-left:5px">
      <a href="{{route('admin.delete_image',$image->id)}}">
        <span class ="close">&times;</span>
        <img src="http://127.0.0.1:8000/{{$image->images}}"style="height:100px;width:100px;">
      </div>
      </a>
      @endforeach
     @endif
     <hr>
     </a>
</div>
     {{-- @if($task->Task_images)
     @foreach (json_decode($task->Task_images) as $image)
  
     <img src="http://127.0.0.1:8000/{{$image->images}}"style="height:100px;width:100px; margin-left:5px">
     @endforeach
     @endif
     <hr> --}}
    </div>
    <div class="form-group">
    <label>Description</label>
    <input type="text" name="description" value="{{$task->description}}" class="form-control" placeholder="Enter your Description">
    </div>
       <div class="form-group ml-auto">
    <a href="" class="btn btn-danger"  data-dismiss="modal">Cancel</a>
    <button type="submit"  class="btn btn-primary"> Update </button>
    </div>
</form>

</div>
</div>
</div>