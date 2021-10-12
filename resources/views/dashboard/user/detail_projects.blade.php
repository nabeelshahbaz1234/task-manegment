@extends('dashboard.user.layouts.user-dash-layout')
@section('title','detail projects')

@section('content')

<div class="modal-body">
    <div class="row details-page">
        <div class="form-group col-sm-3">
            <label for="name" class="font-weight-bold">Project Name:*</label><br>
            {{$project->name}}
        </div>
        <div class="form-group col-sm-3">
            <label for="name" class="font-weight-bold">Prefix:*</label>
            <br>
          {{$project->prefix}}
        </div>
        <div class="form-group col-sm-3">
            <label for="assign" class="font-weight-bold">Client Name:*</label><br>
            {{$project->clients->name}}
        </div>
        @foreach ($project->users as $user)
          <div class="form-group col-sm-3">
            <label for="due_date" class="font-weight-bold">User Name:*</label>
            <br>
            {{$user ? $user->name : 'N/A'}}
          </div>
        @endforeach
        <div class="form-group col-sm-3">
          <label for="due_date" class="font-weight-bold">Created_at:*</label>
          <br>
          {{$project->created_at}}
      </div>

      <div class="form-group col-sm-3">
        <label for="due_date" class="font-weight-bold">Updated_at:*</label>
        <br>
        {{$project->updated_at}}
    </div>
    <div class="form-group col-sm-3">
      <label for="due_date" class="font-weight-bold">Pending Task:*</label>
      <br>
      {{$project->tasks->where('status',0)->where('assign',Auth::id())->count() > 0}}
  </div>

    <div class="form-group col-sm-3">
      <label for="due_date" class="font-weight-bold">Project Progress:*</label>
      <div class="progress progress-bar-mini height-25 mt-2 project-progress  bg-red">
          <div class="progress-bar" role="progressbar" aria-valuenow="" aria-valuemin="0"
               aria-valuemax="100" style="width:100% ; background-color
      : #3F51B5">
  </div>
  <p class="project-progress-width-text text-white mt-1">20%
      </p>
</div>
</div>

      <div class="form-group col-sm-4">
        <label id="">User</label>
      @foreach ($project->users as $user)
      <label for="customer_image" class="font-weight-bold">Profile:</label><br>
      <img class="projectUserAvatar p-0"
      src="https://ui-avatars.com/api/?name={{$user ? $user->name : 'N/A'}}asc&amp;size=64&amp;rounded=true&amp;color=fff&amp;background=fc6369"
      title="Icasc">  
    </div>
   @endforeach
  </div>
  </div>
</form>

@endsection