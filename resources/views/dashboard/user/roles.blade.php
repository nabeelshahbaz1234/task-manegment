@extends('dashboard.user.layouts.user-dash-layout')
@section('title','roles')

@section('content')

<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Roles</h1>
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
             Roles
            </h3>
            <div class="card-tools">
              <ul class="nav nav-pills ml-auto">
                 
            </div>
          </div>
        </div>

        <div class="row">
          @foreach ($roles as $role)
            <div class="col-md-4">
              <div class="livewire-card card card- shadow mb-5 rounded removeMargin hover-card">
                        <div class="card-header d-flex justify-content-between align-items-center p-3 role-cards"
                        style="border-top: 3px solid #39c227">
                            <a href="{{route('user.detailrole',$role->id)}}"><h4
                              class="text- ml-2">{{$role->name}}</h4></a>
                           
                                <div class="dropdown-menu dropdown-menu-right">
                                    <div class="dropdown-list-content dropdown-list-icons" style="border-top: 3px solid #39c227">
                                        <a href="" class="dropdown-item dropdown-item-desc edit-btn"
                                           data-id="1">
                                           <i  class="fas fa-edit mr-2 card-edit-icon"></i> Edit
                                        </a>
                                        <a href="" class="dropdown-item dropdown-item-desc delete-btn" 
                                           data-id="1" >
                                           <i class="fas fa-trash mr-2 card-delete-icon"></i>Delete
                                        </a>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="card-body d-flex justify-content-between align-items-center p-2 mt-3">
                            <div>
                                <span class="total-permission-count">
                                   <?php echo count($role->Permission)?> Permissions
                                  </span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
              </div>
        </div>          


@endsection