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

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">
        <div class="container-fluid">

<div class="card shadow mb-4">
<div class="card-header py-3">
<h6 class="m-0 font-weight-bold text-primary">Edit Client</h6>

</div>
<div class="card-body">

<form action="{{route('admin.update_client',$client->id)}}" method="post" enctype="multipart/form-data">
    <input type="hidden" name="edit_id"  >
    <div class="form-group">
        @csrf
        

        <label> Client Name: </label>
        <input type="text" name="name" value="{{$client->name}}" class="form-control" placeholder="Enter product name">
    </div>
    <div class="form-group">
        <label> Department</label>
        <select id="inputdep" value="{{$client->department}}" name="department"class="form-control">
            <option>Choose Department</option>
            <option value="Accounting" {{$client->department == "Accounting" ? 'selected' : ""}}>Accounting</option>
            <option value="Web Devlopment"{{$client->department == "Web Devlopment" ? 'selected' : ""}}>Web Devlopment</option>
            <option value="App Devlopment"{{$client->department == "App Devlopment" ? 'selected' : ""}}>App Devlopment</option>
            </select>
                    </div>
            
    <div class="form-group">
        <label> Email</label>
        <input type="text" name="email" id="email" value="{{$client->email}}" class="form-control" placeholder="Enter Email">
        </div>
        <div class="form-group">
        <label> password</label>
        <input type="password" name="pass" id="password"  class="form-control" placeholder="Enter password">
        </div>
      


        <div class="form-group">
        <label> Website</label>
        <input type="text" name="website"  value="{{$client->website}}" class="form-control" placeholder="Enter Website name">
    </div>
    

    <div class="form-group">

        <label>image</label>
        <input type="file" name="image" class="form-control" placeholder="Enter Image file">
        <img src="{{asset('users/images/'.$client->image)}}" width="70px" height="70px" padding-top="20px" alt="img">
                                </div>

    <a href="" class="btn btn-danger"  data-dismiss="modal">Cancel</a>
    <button type="submit"  class="btn btn-primary"> Update </button>
</form>

</div>
</div>
</div>