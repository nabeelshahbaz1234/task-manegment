@extends('dashboard.user.layouts.user-dash-layout')
@section('title','Profile')

@section('content')
<section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Change-Password</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item active">Admin Profile</li>
              </ol>
            </div>
          </div>
        </div>
      </section>
      <section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3">
      </div>
      </div>
      </div>
<div class="tab-pane" id="user_changepass">    
    <form class="form-horizontal" action="{{ route('user_ChangePass') }}" method="POST" id="">            
        <div class="form-group row">
            @csrf
        <label for="inputName" class="col-sm-2 col-form-label">Old Password</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" id="inputpassword" placeholder="Enter current password" name="oldpassword">
            <span class="text-danger error-text oldpassword_error"></span>
        </div>
        </div>
        <div class="form-group row">
        <label for="inputName2" class="col-sm-2 col-form-label">New Password</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" id="newpassword" placeholder="Enter new password" name="newpassword">
            <span class="text-danger error-text newpassword_error"></span>
        </div>
        </div>
        <div class="form-group row">
        <label for="inputName2" class="col-sm-2 col-form-label">Confirm New Password</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" id="cnewpassword" placeholder="ReEnter new password" name="cnewpassword">
            <span class="text-danger error-text cnewpassword_error"></span>
        </div>
        </div>
        <div class="form-group row">
        <div class="offset-sm-2 col-sm-10">
            <button type="submit" class="btn btn-danger">Update Password</button>
        </div>
        </div>
    </form>
    </div>



@endsection