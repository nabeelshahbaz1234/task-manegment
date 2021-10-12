@extends('dashboard.user.layouts.user-dash-layout')
@section('title','users')

@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">User</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div>
  </div>
  <div class="row">
      <!-- Left col -->
      <section class="col-lg-12 connectedSortable">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-user-ti"></i>
             User
            </h3>
            <div class="card-tools">
              <ul class="nav nav-pills ml-auto">
              </div>
            </div>
          </div>

          <div class="row">
            @foreach ($users as $user)
                
           
           <div class="col-md-4">
            <div class="livewire-card card card-dark shadow mb-5 rounded user-card-view hover-card">
              <div class="card-header d-flex align-items-center user-card-index d-sm-flex-wrap-0">
                  <div class="author-box-left pl-0 mb-auto">
                          <img alt="image" width="50" src="{{asset('users/images/'.$user->image)}}"
                               class="rounded-circle user-avatar-image uAvatar">
                                              <div class="mt-2 ml-2 userActiveDeActiveChk">
                                                          <label class="custom-switch pl-0" data-placement="bottom"
                                     title="Active">
                                  <input type="checkbox" name="is_active" class="custom-switch-input is-active"
                                         data-id="2" value="1"
                                         data-class="is_active" checked >
                                  <span class="custom-switch-indicator"></span>
                              </label>
                                                  </div>
                                              </div>
                  <div class="ml-2 w-100 mb-auto">
                      <div class="justify-content-between d-flex">
                          <div class="user-card-name pb-1">
                            <a href="{{route('user.detailuser',$user->id)}}"><h4
                              class="text- ml-2">{{$user->name}}</h4></a>
                          </div>
                          <a class="dropdown dropdown-list-toggle">
                              <a href="#" data-toggle="dropdown"
                                 class="notification-toggle action-dropdown position-xs-bottom " >
                                  <i class="fas fa-ellipsis-v action-toggle-mr"></i>
                              </a>
                              <div class="dropdown-menu dropdown-menu-right bg-black">
                                                                          <div class="dropdown-list-content dropdown-list-icons">
                                          <a href="" class="dropdown-item dropdown-item-desc edit-btn bg-blue"
                                             data-id="2"><i
                                                      class="fas fa-edit mr-2 card-edit-icon"></i> Edit
                                          </a>
                                          <a href="" class="dropdown-item dropdown-item-desc delete-btn bg-blue"
                                             data-id="2"><i
                                                      class="fas fa-trash mr-2 card-delete-icon"></i>Delete
                                          </a>
                                      </div>
                                                                      </div>
                          </a>
                      </div>
                                                  <div class="card-client-website ">
                                                    {{-- @dd($user->Role->name) --}}
                              {{$user->Role ? $user->Role->name : 'N/A'}}
                          </div>
                                              <div class="card-user-email pt-1 mb-3">
                          {{$user->email}}
                                                          <span data-toggle="tooltip" title="Email is verified"><i
                                          class="fas fa-check-circle email-verified"></i></span>
                                                  </div>
                  </div>
              </div>
            
              <div class="card-body d-flex align-items-center pt-0 pl-3">
                  <div class="mr-3">
                   
                      <span class="badge badge-primary text-uppercase">{{$user->Projects->count()}} </span> Projects
                  </div>
                  <div>
                      <span class="badge badge-dark text-uppercase">{{$user->tasks->count()}}</span> Tasks Active
                  </div>
                    
                </div>
             
          </div>
          
                  </div>
                  @endforeach
              </div>


@endsection