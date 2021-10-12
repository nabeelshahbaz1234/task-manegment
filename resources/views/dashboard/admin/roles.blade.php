
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>
  <base href="{{\URL::to('')}}">
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
    <ul class="navbar-nav ml-auto">
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
                <a href="{{route('admin.add_project')}}" class="nav-link">
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
  </aside>
  <div class="content-wrapper">
    @yield('content')
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
            <h1 class="m-0">Role</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
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
                  <!-- Button trigger modal -->
<button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModalLong">
  New Role+
</button>
<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">New Roles</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>  
      
      <form action="{{route('admin.add_role')}}" method="POST" enctype="multipart/form-data"> 
<div class="modal-body">              
<div class="form-group">
<div class="form-group col-sm-7 col-md-7">
  @csrf
    <label for="name">Name:</label><span class="required">*</span>
    <input id="name" class="form-control" required autocomplete="off" name="name" type="text">
</div>
  <div class="form-group">
  <label >Permissions</label><br>
  <input type="checkbox"  name="permissions[]" value="Manage Calendar View" >
<label > Manage Calendar View </label><br>
<input type="checkbox"  name="permissions[]" value="Manage Clients" >
<label > Manage Clients</label><br>
<input type="checkbox"  name="permissions[]" value="Manage Users">
<label > Manage Users</label><br>
<input type="checkbox"  name="permissions[]" value="Manage Roles">
<label > Manage  Roles </label><br>
<input type="checkbox"  name="permissions[]" value="Manage Task">
<label > Manage Tasks</label><br>
<input type="checkbox"  name="permissions[]" value="Manage Project">
<label > Manage Projects</label><br>

  </div>
  <div class="form-row">
    <div class="col-md-12">
<div class="input-group my-3">
<div class="input-group-prepend">
<span class="input-group-text">Description</span>
</div>
<textarea class="form-control" name="description" aria-label="With textarea"></textarea>
</div>
    </div>

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
  @foreach ($roles as $role)
    <div class="col-md-4">
      <div class="livewire-card card card- shadow mb-5 rounded removeMargin hover-card"
      style="border-top: 3px solid #39c227">
                <div class="card-header d-flex justify-content-between align-items-center p-3 role-cards">
                    <a href="{{route('admin.detail_role',$role->id)}}"><h4
                      class="text- ml-2">{{$role->name}}</h4></a>
                    <a class="dropdown dropdown-list-toggle">
                      <a href="#" data-toggle="dropdown" class="notification-toggle action-dropdown ml-auto mr-1">
                        <i class="fas fa-ellipsis-v"></i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-list-content dropdown-list-icons">
                                <a href="{{route('admin.edit_role',$role->id)}}" class="dropdown-item dropdown-item-desc edit-btn"
                                   data-id="1"  style="border-top: 3px solid #2cc227">
                                   <i  class="fas fa-edit mr-2 card-edit-icon"></i> Edit
                                </a>
                                <a href="{{route('admin.delete_role',$role->id)}}" class="dropdown-item dropdown-item-desc delete-btn" 
                                   data-id="1">
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
<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>




