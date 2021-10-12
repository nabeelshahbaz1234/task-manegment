<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>
  <base href="{{\URL::to('')}}">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">


  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
    
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('admin.dashboard')}}" class="nav-link">Home</a>
      </li>


   
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>      
      <li class="nav-item d-none d-sm-inline-block">
      <a class="dropdown-item" href="{{ route('logout') }}"
    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
      {{ __('Logout') }}
  </a>

  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
      @csrf
  </form>
    </ul>
  </nav>

  
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{\URL::to('/')}}" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Your Site</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{Auth::user()->picture}}"  class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         
          <li class="nav-item">
            <a href="{{route('admin.dashboard')}}" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('admin.profile')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
               Profile 
              </p>
            </a>
          </li>        
          <li class="nav-item">
            <a href="{{route('admin.clients')}}" class="nav-link">
              <i class="nav-icon fas fa-user-tie"></i>
              <p>
               Client
              </p>
            </a>
          </li>
          <li class="nav-item">
                <a href="{{route('admin.add_project')}}" class="nav-link ">
                  <i class="far fa-folder-open"></i>
                  <p>Project</p>
                </a> 
</li>

              <li class="nav-item">      
              <li class="side-menus nav-item dropdown">
           <a href="{{route('admin.tasks')}}" class="nav-link has-dropdown"><i class="fas fa-tasks"></i>
            <span>Tasks</span></a>
          <li class="nav-item">
            <a href="{{route('admin.calender')}}" class="nav-link">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
               Calender
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('admin.users')}}" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
               Users
              </p>
            </a>
          </li>          
          <li class="nav-item">
            <a href="{{route('admin.roles')}}"class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
               Roles
              </p>
            </a>
          </li>
        </ul>
      </nav>

    </div>
  </aside>
  <div class="content-wrapper">
  <aside class="control-sidebar control-sidebar-dark">
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>

              <div class="main-content">
                <section class="section">
                <div class="section-header">
            <h1> Admin Dashboard</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4 col-md-4">
                                    <h5>User Report <span
                                                class="text-muted font-size-15px hours"></span></h5>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-12">
                                    <div class="row justify-content-end">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xl-4 colUsers">
                                                <select id="userId" class="user_filter_dropdown" name="users"> 
                                                  <option>Select User</option>
                                                    @foreach( $datas as $data)
                                                    <option value="{{$data->id}}">{{$data->name}}</option>
                                                    @endforeach
                                                    </select>
                                            </div>
                                            <div class="col-lg-6 col-xl-3 col-md-6 col-sm-6">
                                            <div id="time_range" class="time_range time_range_width w-100">
                                                <i class="far fa-calendar-alt"
                                                   aria-hidden="true"></i>&nbsp;&nbsp;<span></span> <b
                                                        class="caret"></b>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="work-report-container" class="pt-2">
                                <canvas id="daily-work-report"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="page-header">
                                    <h5>Open Tasks</h5>
                                </div>
                                
                                    {{-- <canvas id="users-open-tasks"></canvas> --}}
                                        
                   

                    <div class="table-responsive">
                        
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                            
                                 <th>ID</th>
                                <th> Task_Title </th>
                                <th>Assigner </th>
                                <th>Projects</th>
                                <th>priority</th>
                                <th>View </th>
                                <th>DELETE </th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($tasks as  $task)
                                    <tr>
                                        <td>{{$task['id']}}</td>
                                        <td>{{$task['title']}} </td>
                                       <td> {{ $task->users ? $task->users->name : 'N/A'['name']}}</td>
                                        <td>{{$task->proj ? $task->proj->name : 'N/A'['name']}}</td> 
                                        <td>   
                                          @if($task->priority==2)
                                          {{'High'}}
                                        @elseif($task->priority==1)
                                              {{'Medium'}}
                                              @elseif($task->priority==0)
                                              {{'Low'}}
                                          @endif </td>
                                            <td>

                             <a class="btn btn-success" href="{{route('admin.view',$task->id)}}">view</a>
                                        
                                        </td>
                                        <td>
                            
                                       <a class="btn btn-danger"href="{{route('admin.delete',$task->id)}}">DELETE</a>
                                        </td>
                                        </form>
                                                      

                                    </tr>
                                    @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                                <!-- Projects Status Chart -->
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="page-header">
                                        <h5>Project Status</h5>
                                    </div>
                                    <div class="table-responsive">
                        
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                            
                                 <th>ID</th>
                                <th> projects</th>
                                <th>Prefix</th>
                                <th>Client</th>
                                <th>User</th>
                                <th>View </th>
                                <th>DELETE </th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($pros as  $project)
                                    <tr>
                                        <td>{{$project['id']}}</td>
                                        <td>{{$project['name']}} </td>
                                       <td> {{$project['prefix']}}</td>
                                       <td>{{$project->clients ? $project->clients->name : 'N/A'['name']}}</td> 
                                        <td>   
                                          @foreach ($project->users as $user)
                                          {{$user ? $user->name : 'N/A'}},
                                          @endforeach
                                            <td>

                             <a class="btn btn-success" href="{{route('admin.view_project',$project->id)}}">view</a>
                                        
                                        </td>
                                        <td>
                            
                                       <a class="btn btn-danger"href="{{route('admin.delete_project',$project->id)}}">DELETE</a>
                                        </td>
                                        </form>
                                                      

                                    </tr>
                                    @endforeach
                            </tbody>
                        </table>

                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="page-header">
                                        <h5>User Info</h5>
                                    </div>
                                  <table class="table table-bordered" id="dataTable" width="50%" cellspacing="0">
                            <thead>
                            <tr>
                            
                                 <th>ID</th>
                                <th> Name</th>
                                <th>Email</th>
                                {{-- <th>Slary</th> --}}
                                <th>Image</th>
                                <th>View </th>
                                <th>DELETE </th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($datas as  $data)
                                    <tr>
                                        <td>{{$data['id']}}</td>
                                        <td>{{$data['name']}} </td>
                                       <td> {{$data['email']}}</td>
                                       {{-- <td>{{$data['salary']}}</td>  --}}
                                        <td>   
                                          <img src="{{asset('users/images/'.$data->image)}}" width="70px" alt="img">
                                            <td>

                             <a class="btn btn-success" href="{{route('admin.view_user',$data->id)}}">view</a>
                                        
                                        </td>
                                        <td>
                            
                                       <a class="btn btn-danger"href="{{route('admin.delete_user',$data->id)}}">DELETE</a>
                                        </td>
                                        </form>
                                                      

                                    </tr>
                                    @endforeach
                            </tbody>
                        </table>

                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                                    </div>
    </section>
<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>




