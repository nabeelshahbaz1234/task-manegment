
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
                <a href="{{route('admin.add_project')}}" class="nav-link ">
                  <i class="far fa-folder-open"></i>
                  <p>Project </p>
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
</div>
</aside>
  <div class="content-wrapper">
    @yield('content')
  <aside class="control-sidebar control-sidebar-dark">
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Client</h1>
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
      Client
    </h3>
    <div class="card-tools">
      <ul class="nav nav-pills ml-auto">
      <div class="form-row">
<div class="col-7.2">
<select id="inputState" class="form-control">
<option selected>All Department.</option>
<option value="Accounting">Accounting</option>
<option value="Web Devlopment">Web Devlopment</option>
<option value="App Devlopment">App Devlopment</option>
</select>
</div>
                   <!-- Button trigger modal -->
<button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModalLong">
  New Client+
</button>

<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">New Client</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('admin.store')}}" method="POST" enctype="multipart/form-data"> 
      <div class="modal-body">
      <div class="form-row">
    <div class="form-group col-md-6">
    @csrf
      <label>Name:*</label>
      <input type="text" name="name" class="form-control" id="inputname" placeholder="Enter your Client name">
    </div>
      <div class="form-group col-md-6">
        <label>department:*</label>
        <select id="inputdep" name="department" class="form-control">
          <option selected>Choose dep.</option>
          <option value="Accounting">Accounting</option>
          <option value="web dev">Web dev</option>
          <option value="app dev">App dev</option>
          <option></option>
        </select>
      </div>


    <label class="col-sm-6 col-form-label">Email:*</label>
    <div class="col-sm-12">
      <input type="text" name="email" class="form-control" id="email@example.com" placeholder="Enter your Email Address">
    </div>

      </div>
<br>
      <div class="form-row" >       
  <div class="custom-control custom-checkbox mb-5">
      <input type="checkbox" class="custom-control-input" id="customCheck" name="example1">
      <label class="custom-control-label" for="customCheck">Want to creat client panel:*</label>
    </div>
</div>
  <label >Password:*</label>
  <input type="password" name="password" class="form-control" id="inputpassword"  placeholder="Enter your Password">
  <span class="text-danger">@error('password'){{ $message }}@enderror</span>
<div class="form-row">
  <label class="col-sm-5 col-form-label">Website:*</label>

    <input type="text" name="website" id="website" class="form-control" placeholder="Enter your Website name">
  </div>
<div class="form-row">
  <label>Select Type:*</label>
  <select id="inputdep" name="role" class="form-control">
    <option value="" slected>Select Type .</option>
    <option value="3">Client type</option>
  </select>
</div>
  <div class="form-row">
      <label class="col-sm-12 col-form-label">Add Image:*</label>
<input type="file" name="image" class="form-control" placeholder="Enter Image file">
</div>

  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-info">Save changes</button>
  </div>
  </form>           
  </ul>
</div>
</div> 
</div>

    <div class="row">
          @foreach ($clients as $client)
            <div class="col-md-4">
                <div class="livewire-card card author-box shadow mb-5 rounded client-card-view hover-card"
                style="border-top: 3px solid #5027c2">
                <div class="card-header client-card d-flex align-items-center user-card-index d-sm-flex-wrap-0">
                    <div class="author-box-left pl-0 mb-auto uAvatarCon">
                        <img alt="image" width="50" src="{{asset('users/images/'.$client->image)}}"
                            class="rounded-circle user-avatar-image uAvatar">
                    </div>
                    <div class="ml-2 w-100 mb-auto">
                        <div class="justify-content-between d-flex">
                            <div class="user-card-name pb-1">
                                <h4><a href="{{route('admin.detail_client',$client->id)}}" class="show-btn" data-id="101">{{$client->name}}</a>
                                </h4>
                                </div>
                                <a class="dropdown dropdown-list-toggle">
                                     <a class="dropdown dropdown-list-toggle">
                      <a href="" data-toggle="dropdown"
                         class="notification-toggle action-dropdown position-xs-bottom ml-auto">
                          <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <div class="dropdown-list-content dropdown-list-icons">
                                            <a href="{{route('admin.edit_client',$client->id)}}" class="dropdown-item dropdown-item-desc edit-btn"
                                              data-id="101" ><i
                                                        class="fas fa-edit mr-2 card-edit-icon"></i> Edit
                                            </a>
                                            <a href="{{route('admin.delete_client',$client->id)}}" class="dropdown-item dropdown-item-desc delete-btn"
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
       

 <script src="plugins/jquery/jquery.min.js"></script>
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="dist/js/adminlte.min.js"></script>
  </body>
  </html>




