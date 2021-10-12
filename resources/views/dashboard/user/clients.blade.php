@extends('dashboard.user.layouts.user-dash-layout')
@section('title','clients')

@section('content')

<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Clients</h1>
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
             Clients
            </h3>
            <div class="card-tools">
              <ul class="nav nav-pills ml-auto">
            </div>
          </div>
        </div>
        <div class="row">
          @foreach ($clients as $client)
            <div class="col-md-4">
                <div class="livewire-card card author-box shadow mb-5 rounded client-card-view hover-card"
                style="border-top: 3px solid #c227ba">
                <div class="card-header client-card d-flex align-items-center user-card-index d-sm-flex-wrap-0">
                    <div class="author-box-left pl-0 mb-auto uAvatarCon">
                        <img alt="image" width="50" src="{{asset('users/images/'.$client->image)}}"
                            class="rounded-circle user-avatar-image uAvatar">
                    </div>
                    <div class="ml-2 w-100 mb-auto">
                        <div class="justify-content-between d-flex">
                            <div class="user-card-name pb-1">
                                <h4><a href="{{route('user.detailclient',$client->id)}}" class="show-btn" data-id="101">{{$client->name}}</a>
                                </h4>
                                </div>
                               
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <div class="dropdown-list-content dropdown-list-icons"
                                        style="border-top: 3px solid #c227ba">
                                            <a href="" class="dropdown-item dropdown-item-desc edit-btn"
                                              data-id="101"><i
                                                        class="fas fa-edit mr-2 card-edit-icon"></i> Edit
                                            </a>
                                            <a href="" class="dropdown-item dropdown-item-desc delete-btn"
                                              data-id="101"><i
                                                        class="fas fa-trash mr-2 card-delete-icon"></i>Delete
                                            </a>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="client-card-department"><a href=""
                                          class="text-decoration-none">{{$client->email}}</a>
                                </div>
                                <div class="card-client-website mb-3"><a href="" target="-_blank"
                                      class="text-decoration-none">{{$client->website}}</a>
                                </div>
                                                </div>
                    </div>
                </div>
            </div>
          @endforeach
    </div>
      </div>




@endsection