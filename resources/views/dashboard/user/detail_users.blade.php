@extends('dashboard.user.layouts.user-dash-layout')
@section('title','clients')

@section('content')



<div class="modal-body">
    <div class="row details-page">
        <div class="form-group col-sm-3">
            <label for="name" class="font-weight-bold">User Name:*</label><br>
            {{$user->name}}
        </div>
        <div class="form-group col-sm-3">
            <label for="name" class="font-weight-bold">Email:*</label>
            <br>
          {{$user->email}}
        </div>
        <div class="form-group col-sm-3">
            <label for="assign" class="font-weight-bold">Role:*</label><br>
            {{$user->role}}
        </div>
        <div class="form-group col-sm-3">
            <label for="due_date" class="font-weight-bold">Phone:*</label>
            <br>
            {{$user->phone}}
        </div>
        <div class="form-group col-sm-3">
          <label for="due_date" class="font-weight-bold">Salary:*</label>
          <br>
          {{$user->salary}}
      </div>
      <div class="form-group col-sm-3">
        <label for="due_date" class="font-weight-bold">pr_roles:*</label>
        <br>
        {{ $user->Role->name}}
    </div>


    <div class="form-group col-sm-3">
    @if ($user->Projects !='')
    @foreach ($user->Projects->pluck('name') as $project )
 
      <label for="due_date" class="">Project:*</label>
      <br>
          <p> {{$project}} </p>
      @endforeach
      @endif
  </div>

  <div class="form-group col-sm-3">
  @if ($user->Tasks !='')
  @foreach ($user->Tasks->pluck('title') as $task )
    <label for="due_date" class="">Tasks Title:*</label>
    <br>
        <p> {{$task}} </p>
         @endforeach
    @endif
  </div>
  <div class="form-group col-sm-3">
    <label for="due_date" class="font-weight-bold">Created_at:*</label>
    <br>
    {{$user->created_at}}
</div>

<div class="form-group col-sm-3">
  <label for="due_date" class="font-weight-bold">Updated_at:*</label>
  <br>
  {{$user->updated_at}}
</div>
<label id="">User</label>
<div class="form-group col-sm-3">
<label for="customer_image" class="font-weight-bold">Profile:*</label><br>
<img class="projectUserAvatar p-0"
src="https://ui-avatars.com/api/?name={{$user->name}}asc&amp;size=64&amp;rounded=true&amp;color=fff&amp;background=fc6369"
title="Icasc">
    
      </div>
      </div>
      </div>
</form>
@endsection