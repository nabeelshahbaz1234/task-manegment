@extends('dashboard.user.layouts.user-dash-layout')
@section('title','detailclient')

@section('content')

<div class="modal-body">
    <div class="row details-page">
        <div class="form-group col-sm-3">
            <label for="name" class="font-weight-bold">Client Name:*</label><br>
            {{$clients->name}}
        </div>
        <div class="form-group col-sm-3">
            <label for="name" class="font-weight-bold">Email:*</label>
            <br>
          {{$clients->email}}
        </div>
          <div class="form-group col-sm-3">
            <label for="due_date" class="font-weight-bold">Website:*</label>
            <br>
            {{$clients->website}}
        </div>

        
        <div class="form-group col-sm-3">
          <label for="due_date" class="font-weight-bold">Department:*</label>
          <br>
          {{$clients->department}}
      </div>
        
      <div class="form-group col-sm-3">
        @if ($clients->clienT_Projects !='')
        @foreach ($clients->clienT_Projects->pluck('name') as $project )
          <label for="due_date" class="">Project:*</label>
          <br>
              <p> {{$project}} </p>
          @endforeach
          @endif
      </div>
    
  <div class="form-group col-sm-3">
    <label for="due_date" class="font-weight-bold">Created_at:*</label>
    <br>
    {{$clients->created_at}}
</div>

<div class="form-group col-sm-3">
  <label for="due_date" class="font-weight-bold">Updated_at:*</label>
  <br>
  {{$clients->updated_at}}
</div>

<div class="form-group col-sm-3">
<label for="customer_image" class="font-weight-bold">User Profile:*</label><br>
<img class="projectUserAvatar p-0"
src="https://ui-avatars.com/api/?name={{$clients->name}}asc&amp;size=64&amp;rounded=true&amp;color=fff&amp;background=fc6369"
title="Icasc">
    
      </div>
      </div>
      </div>
</form>

@endsection