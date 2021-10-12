
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
            <h1 class="m-0">Task Details</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->

      <div class="modal-body">
        <div class="row details-page">
            <div class="form-group col-sm-3">
            <img alt="image" width="50" src="https://ui-avatars.com/api/?name={{$task->title}} Admin&amp;size=64&amp;rounded=true&amp;color=fff&amp;background=fc6369"
            class="rounded-circle user-avatar-image uAvatar">
                    <div class="mt-2 ml-2 userActiveDeActiveChk">
                        </div>
    </div>

                <div class="form-group col-sm-3">
                <label for="name" class="font-weight-bold">Title*</label>
                <br>
                {{$task->title}} 
            </div>
            <div class="form-group col-sm-3">
                <label for="name" class="font-weight-bold">Projects:*</label>
                <br>
                {{$task->proj ? $task->proj->name : 'N/A'}} 
            </div>
            <div class="form-group col-sm-3">
                <label for="assign" class="font-weight-bold">Assign:*</label><br>
                {{$task->users ? $task->users->name : 'N/A'}}
            </div>
            <div class="form-group col-sm-3">
                <label for="due_date" class="font-weight-bold">Due_Date:*</label>
                <br>
                {{$task->due_date}}
            </div>
                <div class="form-group col-sm-3 pb-0">
                    <label for="" class="font-weight-bold">estimate_time:*</label><br>
                    {{$task->estimate_time}}
                    </div>
                <div class="form-group col-sm-3 pb-0">
                    <label for="" class="font-weight-bold">Tags:*</label><br>
                    {{$task->tags}}
                </div>
                <div class="form-group col-sm-3 pb-0">
                    <label for="" class="font-weight-bold">Priority:*</label>
                    <br>
                   
                    @if($task->priority==2)
                    {{'High'}}
                  @elseif($task->priority==1)
                        {{'Medium'}}
                        @elseif($task->priority==0)
                        {{'Low'}}
                    @endif          
                    </div>
                      {{-- @dd($task->status) --}}
                    <div class="form-group col-sm-3 pb-0">
                    <label for="description" class="font-weight-bold">status:*</label><br>
                   <p>    
                   <?php  
                   if( $task->status=='0'){ ?>
                    <span class="badge badge-primary text-uppercase ml-1" href="">In-Complete</span>
                    <?php }
                    else { ?>
                    <span class=" badge badge-primary text-uppercase ml-2" href="">complete</span>          
                       <?php } ?> 
                       </p>
                </div>
                <div class="form-group col-sm-3 pb-0">
                    <label for="description" class="font-weight-bold">Description:*</label><br>
                   <p> {{$task->description}} </p>
                </div>
                
                <div class="form-group col-sm-3">
                  <label for="due_date" class="font-weight-bold">Created_at:*</label>
                  <br>
                  {{$task->created_at}}
              </div>

              <div class="form-group col-sm-3">
                <label for="due_date" class="font-weight-bold">Updated_at:*</label>
                <br>
                {{$task->updated_at}}
            </div>      

          <div class="form-group col-sm-3">
            <label for="due_date" class="font-weight-bold">Task Images:*</label>
        @if($task->Task_images)
            @foreach (json_decode($task->Task_images) as $image)
              <hr>
              <div class="img-wrapper" style="margin-left:5px">
                <img src="http://127.0.0.1:8000/{{$image->images}}"style="height:100px;width:100px;">
              </div>
          @endforeach
     @endif
     <hr>
</div>

    </form>
</div>
</div>
</div>
 <script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>