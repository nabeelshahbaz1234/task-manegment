
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
               Admin Dashboard
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
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <div class="content-wrapper">
    @yield('content')
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Users</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>   
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-user-ti"></i>
                 Users
                </h3>
                <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">


                  <div class="form-row">
    <div class="col-7.2">
      <select id="inputState" class="form-control">
        <option  disable selected>status.</option>
        <option>All</option>
        <option>Active</option>
        <option> De Active</option>
        <option></option>
      </select>
    </div>
    
                   
                  <!-- Button trigger modal -->
<button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModalLong">
  New User+
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">New User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('admin.storeUser')}}" method="POST" enctype="multipart/form-data"> 
      <div class="modal-body">
      <div class="form-row">
    <div class="form-group col-md-6">
    @csrf
      <label for="inputname">Name:*</label>
      <input type="text" name="name" class="form-control" id="inputname"  placeholder="Enter your Username ">
    </div>
      <div class="form-group col-md-6">
      <label for="inputphne">phone:*</label>
      <input type="text" name="phone" class="form-control" id="inputphne"  placeholder="Enter your Phone Number">
      </div>
    <div class="form-row">
    <label for="colFormLabel" class="col-sm-6 col-form-label">Email:*</label>
    <div class="col-sm-10">
      <input type="text" name="email" class="form-control" id="colFormLabel" placeholder="Enter your Email Address">
    </div>
  </div>
</div>
<br>

<div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputpass">Password:*</label>
      <input type="password" name="password"class="form-control" id="inputpass"  placeholder="Enter your Password">
    </div>

        <div class="form-group col-md-10">
        <label for="inputdeo">Select Project:*</label>
        <select id="inputdep"name="project" class="form-control"  placeholder="Enter your Project name">
        <option disabled>Select Project </option>
          @foreach($project as $pro)
            <option selected value="{{$pro->id}}">{{$pro->name}}</option>
            @endforeach
        </select>
        </div>
      <div class="form-group col-md-6">
        <label for="inputdeo">Permissions:*</label>
          <select id="inputpr_roles" name="pr_roles" value="pr_roles" class="form-control"  placeholder="Enter your Prrmission">
            <option disabled>Select Permissions </option>
          @foreach($roles as $role)
            <option selected value="{{$role->id}}">{{$role->name}}</option>
            @endforeach
        </select>
      </div>   
      <div class="form-group col-md-6">
          <label for="colFormLabel">Salary:*</label>
          <div class="col-sm-10">
          <input type="text" name="salary" class="form-control" id="colFormLabel" placeholder="Enter your Salary">
      </div>
    </div>

      <div class= "form-group col-md-12">
          <label>Select Type:*</label>
          <select id="inputdep" name="role" class="form-control"  placeholder="Enter your user Type">
            <option value="" slected>Select Type.</option>
            <option value="2">User type</option>
          </select>
          </div>
    </div>
    
   <label>image</label>
  <input type="file" name="image" class="form-control" placeholder="Enter Image file">
  <img src="" width="70px" height="70px" padding-top="20px" alt="img">
    </div>

<br>
    <div class="modal-footer ml-auto">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-info">Save changes</button>
    </div>
</form>
    
               
      </ul>
    </div>
  </div>
  
</div>
<div class="row">
  @foreach ($users as $user)
 <div class="col-md-4">
  <div class="livewire-card card card-dark shadow mb-5 rounded user-card-view hover-card"
  style="border-top: 3px solid #a6c227">
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
                  <a href="{{route('admin.detail_user',$user->id)}}"><h4
                    class="text- ml-2">{{$user->name}}</h4></a>
                </div>
                <a class="dropdown dropdown-list-toggle">
                    <a href="#" data-toggle="dropdown"
                       class="notification-toggle action-dropdown position-xs-bottom " >
                        <i class="fas fa-ellipsis-v action-toggle-mr"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right bg-black">
                                                                <div class="dropdown-list-content dropdown-list-icons">
                                <a href="{{route('admin.edit_user',$user->id)}}" class="dropdown-item dropdown-item-desc edit-btn bg-blue"
                                   data-id="2"><i
                                            class="fas fa-edit mr-2 card-edit-icon"></i> Edit
                                </a>
                                <a href="{{route('admin.delete_user',$user->id)}}" class="dropdown-item dropdown-item-desc delete-btn bg-blue"
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
            <span class="badge badge-dark text-uppercase">{{$user->tasks->where('status',0)->count()}}</span> Tasks Active
        </div>
          
      </div>
   
</div>

        </div>
        @endforeach
    </div>
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>





