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
</head>
{{-- 
<@php
    $permissions = $role->Permission->pluck('permissions')->toArray();
    $permissions = implode(', ',$permissions)
@endphp  --}}
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">
        <div class="container-fluid">

<div class="card shadow mb-4">
<div class="card-header py-3">
<h6 class="m-0 font-weight-bold text-primary">Edit Role</h6>
</div>
<div class="card-body">
<form action="{{route('admin.update_role',$role->id)}}" method="Post" enctype="multipart/form-data">

    <div class="form-group">
        @csrf
<label> Name:</label>
<input type="text" name="name" value="{{$role->name}}" class="form-control" placeholder="Enter your name">
</div>
{{-- @dd($role->Permission) --}}

<div class="form-group">
    <?php
        $permission= $role->Permission->pluck('permissions')->toArray() 
    ?>  
   
<label>Permissions:</label>
{{-- @dd( $permission) --}}
<br>
{{-- @dd($permission) --}}
<input type="checkbox"  name="permissions[]" value="Manage Calendar View" {{in_array("Manage Calendar View" , $permission) ? 'checked' : '' }}>
<label > Manage Calendar View </label><br>
<input type="checkbox"  name="permissions[]" value="Mange Client" {{ in_array("Mange Client" , $permission) ? 'checked' : '' }} >
<label > Manage Clients</label><br>
<input type="checkbox"  name="permissions[]" value="Manage Users" {{ in_array(" Manage Users " , $permission) ? 'checked' : '' }} >
<label > Manage Users</label><br>
<input type="checkbox"  name="permissions[]" value= "Manage Roles"  {{ in_array(" Manage Roles" , $permission) ? 'checked' : '' }} >
<label > Manage Roles </label><br>
<input type="checkbox"  name="permissions[]" value="Manage Tasks"  {{ in_array(" Manage Tasks" , $permission) ? 'checked' : '' }} >
<label > Manage Tasks</label><br>
<input type="checkbox"  name="permissions[]" value= "Manage Projects" {{ in_array(" Manage Projects " , $permission) ? 'checked' : '' }} >
<label > Manage Projects</label><br>
  </div>
<div class="form-group">
 <label>Description</label>
    <textarea class="form-control" name="description" aria-label="With textarea">{{$role->description}}</textarea>
    </div>

    <a href="" class="btn btn-danger"  data-dismiss="modal">Cancel</a>
    <button type="submit"  class="btn btn-primary"> Update </button>
</form>
</div>
</div>
</div>