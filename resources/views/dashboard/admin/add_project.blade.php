
<!DOCTYPE html>
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
  <p>Project Add</p>
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
            <h1 class="m-0">Projet</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
          </div><!-- /.col -->
        </div><!-- /.row -->
      <div>
      </div>
      </div>
        
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12 connectedSortable">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-user-ti"></i>
                 Project
                </h3>
                <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
                   
                  <!-- Button trigger modal -->
<button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModalLong">
  New Project+
</button>

<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
  <h5 class="modal-title" id="exampleModalLongTitle">New Project</h5>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<form action="{{route('admin.add_proj')}}" method="post" enctype="multipart/form-data"> 
<div class="modal-body">
<div class="row">
    <div class="form-group col-sm-12 col-md-6">
        @csrf
        <label for="name">Name:</label><span class="required">*</span>
        <input id="name" class="form-control" required autocomplete="off"  name="name" type="text" placeholder="Enter you Project Name">
    </div>
    <div class="form-group col-sm-12 col-md-6">
        <label for="prefix">Prefix:</label><span class="required">*</span>
        <input type="text" id="prefix" class="form-control" name="prefix" type="text" placeholder="Enter you Perfix">
    </div>
</div>

      <div class="row">
        <div class="form-group col-md-6">

            <label>Client:*</label>
            <select id="inputclient" name="client" class="form-control">
                <option>Select Client</option>
                  @foreach($clients as $client) 
                  <option value="{{$client->id}}">{{$client->name}}</option>
                  @endforeach
            </select>
        </div>
      </div>
    <div class="form-row">
       <div class="form-group col-sm-12 project-users">
        <label>Users:*</label>
        <select id="input user" name="user[]" class="form-control" multiple>
         <option>Select User</option>
           @foreach( $users as $user)
           <option value="{{$user->id}}">{{$user->name}}</option>
           @endforeach
           </select>
          </div>
    </div>
   <div class="text-right">
    <button type="submit" class="btn btn-info mr-2" id="btnSave" data-loading-text="&lt;span class=&#039;spinner-border spinner-border-sm&#039;&gt;&lt;/span&gt; Processing...">Save</button>
    <button type="button" id="btnCancel" class="btn btn-light"
    data-dismiss="modal">Cancel</button>
  </div>
  </form>
  </div>            
  </ul>
  </div>
</div>
</div>

</div class="conatiner">
<div class="row">
@foreach ($projects as $project)
  <div class="col-md-3">
            <div class="livewire-card card project-card shadow mb-5 rounded removeMarginX hover-card"
            style="border-top: 3px solid #c2274e">
                <div class="col-md-12">
                    <div class="progress progress-bar-mini height-25 mt-2 project-progress  bg-red">
                        <div class="progress-bar" role="progressbar" aria-valuenow="" aria-valuemin="0"
                             aria-valuemax="100" style="width:100% ; background-color
                    : #3F51B5">
                </div>
                <p class="project-progress-width-text text-white mt-1">20%
                    </p>
            </div>
        </div>
        <div class="card-header d-flex justify-content-between align-items-center pt-0 pr-3 pb-3 pl-3">
            <div class="d-flex">
                (<small class="text-primary mt-1">{{$project->name}}</small>)-
                <a href="{{route('admin.detail_project',$project->id)}}"><h4
                            class="text-primary card-report-name">{{$project->name}}</h4>
                </a>
            </div>
            <a class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
                                                        class="notification-toggle action-dropdown ml-auto"><i
                            class="fas fa-ellipsis-v"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="dropdown-list-content dropdown-list-icons">
                        <a href="{{route('admin.edit_project',$project->id)}}"  class="dropdown-item dropdown-item-desc edit-btn"
                           data-id="339"  style="border-top: 3px solid #c2274e"><i
                                    class="fas fa-edit mr-2 card-edit-icon"></i> Edit
                        </a>
                        <a href="{{route('admin.delete_project',$project->id)}}" class="dropdown-item dropdown-item-desc delete-btn"
                           data-id="339"><i
                                    class="fas fa-trash mr-2 card-delete-icon"></i>Delete
                        </a>
                    </div>
                </div>
            </a>
        </div>
        <div class="card-body pt-0 pl-3 pb-0">
            <div>
                <span class="badge badge-primary text-uppercase projectStatus">Ongoing</span>
                <span class="float-right projectStatistics">
                                            <b></b>
                  <span>{{$project->tasks->where('status',0)->count()}} Pending Task(s) </span>
                              </span>
            </div>
            {{-- @dd($project) --}}
            <div class="float-right">
              <span class="mr-1">{{$project->clients ? $project->clients->name :'N/A'}}</span>
              <span></span>
                  </div>
        </div>

           
                              {{-- {{ $project->users->pluck('name') ?? '' }} --}}                
          <div class="card-body d-flex justify-content-between align-items-center pt-0 pl-3 pb-2 pr-0">
              @foreach ($project->users as $user)
             <div class="d-inline-block">                               
                       <img class="projectUserAvatar p-0" 
              src="https://ui-avatars.com/api/?name={{$user ? $user->name : 'N/A'}}asc&amp;size=64&amp;rounded=true&amp;color=fff&amp;background=fc6369"
              title="Icasc">    
             </div> 
               @endforeach
          </div>
  

      </div>
       
      </div>
@endforeach
</div>
</div>
</div>


  <script src="plugins/jquery/jquery.min.js"></script>
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="dist/js/adminlte.min.js"></script>
  </body>
  </html>
 









