@extends('dashboard.client.layouts.client-dash-layout')
@section('title','Profile')
@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Profile</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </div>
    </div>
  </div>
</section>
<section class="content">
<div class="container-fluid">
<div class="row">
<div class="col-md-3">
  <!-- Profile Image -->
  <div class="card card-primary card-outline">
    <div class="card-body box-profile">
      <div class="text-center">
        <img class="profile-user-img img-fluid img-circle admin_picture" src="{{ Auth::user()->picture }}" alt="User profile picture">
      </div>
      <h3 class="profile-username text-center admin_name">{{Auth::user()->name}}</h3>
      <p class="text-muted text-center">Client</p>
        <input type="file" name="admin_image"  id="#admin_image" style="opacity: 0;height:1px;display:none">
      <button class="btn btn-primary btn-block" id="#change_picture_btn" onClick="changeImage()"><b>Change picture</b></button>
    </div>
  </div>
</div>
<div class="col-md-9">
  <div class="card">
    <div class="card-header p-2">
      <ul class="nav nav-pills">
        <li class="nav-item"><a class="nav-link active" data-toggle="tab">Personal Information</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('client.password') }}" >Change Password</a></li>
      </ul>
    </div>
<div class="card-body">
<div class="tab-content">
<div class="active tab-pane" id="personal_info">
<form class="form-horizontal" method="POST" action="{{ route('client_updateinformation') }}" id="">
@csrf
<div class="form-group row">
  <label for="inputName" class="col-sm-2 col-form-label">Name</label>
  <div class="col-sm-10">
    <input type="text" class="form-control" id="inputName" placeholder="Name" value="{{ Auth::user()->name }}" name="name">

    <span class="text-danger error-text name_error"></span>
  </div>
</div>
<div class="form-group row">
  <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
  <div class="col-sm-10">
    <input type="text" class="form-control" id="inputEmail" placeholder="Email" value="{{ Auth::user()->email }}" name="email">
    <span class="text-danger error-text email_error"></span>
  </div>
</div>

<div class="form-group row">
  <div class="offset-sm-2 col-sm-10">
    <button type="submit" class="btn btn-danger">Save Changes</button>
  </div>
</div>
</form>
</div>

@endsection