<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit user</title>
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
<h6 class="m-0 font-weight-bold text-primary">Edit user</h6>

</div>
<div class="card-body">
<form action="{{route('admin.update_user',$users->id)}}" method="POST" enctype="multipart/form-data">
<div class="form-group">
@csrf
<label>Name: </label>
<input type="text" name="name" value="{{$users->name}}" class="form-control" placeholder="Enter name">
</div>   
<div class="form-group">
    <label>Phone</label>
    <input type="text" name="phone" id="phone" value="{{$users->phone}}" class="form-control" placeholder="Enter Phone num">
    </div>
    <label> Email</label>
    <input type="text" name="email" id="email" value="{{$users->email}}" class="form-control" placeholder="Enter Email">
    </div>
    <div class="form-group">
    <label> password</label>
    <input type="password" name="password" id="password" class="form-control" placeholder="Enter password">
    </div>
    <div class="form-group">
    <label>Project</label>
    <select id="input"name="project"class="form-control">
      <option disabled>Select Project </option>
      @foreach($project as $pro)
      <option  value="{{$pro->id}}"{{$users->project== $pro->id ? 'selected': ""}}>{{$pro->name}}</option>
      @endforeach
      </select>
    </div>
      <div class="form-group">
    <label>Role</label>
    <select id="input"name="pr_roles"class="form-control">
    <option disabled>Select Role </option>
    @foreach($roles as $role)
    <option value="{{$role->id}}"{{$users->pr_roles == $role->id ? 'selected': ""}}>{{$role->name}}</option>
    @endforeach
    </select>
    </div>
     <div class="form-group">
    <label>Salary</label>
    <input type="text" name="salary" id="Salary" value="{{$users->salary}}" class="form-control" placeholder="Enter Salary">
    </div>
    <div class="form-group">
  <label>image</label>
  <input type="file" name="image" class="form-control" placeholder="Enter Image file">
  <img src="{{asset('users/images/'.$users->image)}}" width="70px" height="70px" padding-top="20px" alt="img">
    </div>
    <a href="" class="btn btn-danger"  data-dismiss="modal">Cancel</a>
    <button type="submit"  class="btn btn-primary"> Update </button>
</form>

</div>
</div>
</div>