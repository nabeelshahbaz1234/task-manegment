<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Project</title>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Jquery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">
        <div class="container-fluid">

<div class="card shadow mb-4">
<div class="card-header py-3">
<h6 class="m-0 font-weight-bold text-primary">Edit PROJECT</h6>

</div>
<div class="card-body">

<form action="{{route('admin.update_project',$project->id)}}" method="post" enctype="multipart/form-data">    
<div class="form-group">
        @csrf
<label>Name: </label>
<input type="text" name="name" value="{{$project->name}}" class="form-control" placeholder="Enter name">
    </div>
    <div class="form-group">
<label> prefix: </label>
<input type="text" name="prefix" value="{{$project->prefix}}" class="form-control" placeholder="Enter Prefix">
</div>
<div class="form-group">
<label>Client </label>
<select id="input"name="client"class="form-control">
    <option disabled>Select Client </option>
    @foreach($clients as $client)
    <option  value="{{$client->id}}"{{$project->client == $client->id ? 'selected': ""}}>{{$client->name}}</option>
    @endforeach
    </select>
</div>
    <div class="form-group">
    <label>User </label>
    <select id="input" value="" name="user[]"class="form-control" multiple>
        <option disabled>Select User </option>
        @foreach( $users as $user)
        <option value="{{ $user->id }}"{{ in_array($user->id, $project->users()->pluck('user_id')->toArray()) ? 'selected' : ''}}>{{ $user->name }}</option>
        @endforeach
        </select>
</div>
     
    <a href="" class="btn btn-danger"  data-dismiss="modal">Cancel</a>
    <button type="submit"  class="btn btn-primary"> Update </button>
</form>

</div>
</div>
</div>