@extends('dashboard.client.layouts.client-dash-layout')
@section('title','Project')
@section('content')



<div class="modal-body">
    <div class="row details-page">
        <div class="form-group col-sm-3">
        <img alt="image" width="50" src="https://ui-avatars.com/api/?name={{$task->title}} Admin&amp;size=64&amp;rounded=true&amp;color=fff&amp;background=fc6369"
        class="rounded-circle user-avatar-image uAvatar">
                <div class="mt-2 ml-2 userActiveDeActiveChk">
                    </div>
</div>
        <div class="form-group col-sm-3">
            <label for="name" class="font-weight-bold">Projects:*</label>
            <br>
          {{$task->proj->name}}
        </div>
        <div class="form-group col-sm-3">
            <label for="assign" class="font-weight-bold">Assign:*</label><br>
            {{$task->users->name}}
        </div>
        <div class="form-group col-sm-3">
            <label for="due_date" class="font-weight-bold">Due_Date:*</label>
            <br>
            {{$task->due_date}}
        </div>
            <div class="form-group col-sm-3 pb-0">
                <label for="" class="font-weight-bold">estimate_time:*</label><br>
                {{$task->estimate_time}}
                </div>
            <div class="form-group col-sm-3 pb-0">
                <label for="" class="font-weight-bold">Tags:*</label><br>
                {{$task->tags}}
            </div>
            <div class="form-group col-sm-3 pb-0">
                <label for="" class="font-weight-bold">Priority:*</label>
                <br>
                @if($task->priority==2)
                {{'High'}}
              @elseif($task->priority==1)
                    {{'Medium'}}
                    @elseif($task->priority==0)
                    {{'Low'}}        
                @endif        
                </div>
                     <div class="form-group col-sm-3 pb-0">
                    <label for="description" class="font-weight-bold">status:*</label><br>
                   <p>    
                   <?php  
                   if( $task->status=='0'){ ?>
                              <span class="badge badge-primary text-uppercase ml-1" href="">In-Complete</span>
                              <?php }
                              else { ?>
        
                              <span class=" badge badge-primary text-uppercase ml-2" href="">complete</span>
                              
                       <?php } ?> 
                       </p>
                </div>
            <div class="form-group col-sm-3 pb-0">
                <label for="description" class="font-weight-bold">Description:*</label><br>
               <p> {{$task->description}} </p>
            </div>
            
            <div class="form-group col-sm-3">
              <label for="due_date" class="font-weight-bold">Created_at:*</label>
              <br>
              {{$task->created_at}}
          </div>

          <div class="form-group col-sm-3">
            <label for="due_date" class="font-weight-bold">Updated_at:*</label>
            <br>
            {{$task->updated_at}}
        </div>    
                 <div class="form-group col-sm-3">
            <label for="due_date" class="font-weight-bold">Task Images:*</label>
        @if($task->Task_images)
            @foreach (json_decode($task->Task_images) as $image)
              <hr>
              <div class="img-wrapper" style="margin-left:5px">
                <img src="http://127.0.0.1:8000/{{$image->images}}"style="height:100px;width:100px;">
              </div>
          @endforeach
     @endif
     <hr>
</div>  
</form>
</div>
</div>
</div>
@endsection