@extends('dashboard.user.layouts.user-dash-layout')
@section('title','Projects')

@section('content')

<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Projects</h1>
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
             Project
            </h3>
            <div class="card-tools">
              <ul class="nav nav-pills ml-auto">
          
            </div>
          </div>
        </div>


      </div class="conatiner">
      <div class="row">
      @foreach (Auth::user()->projects as $project)
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
                      <a href="{{route('user.detailproject',$project->id)}}"><h4
                                  class="text-primary card-report-name">{{$project->name}}</h4>
                      </a>
                  </div>
                  
                      <div class="dropdown-menu dropdown-menu-right">
                          <div class="dropdown-list-content dropdown-list-icons"
                           style="border-top: 3px solid #c2274e">
                              <a href=""  class="dropdown-item dropdown-item-desc edit-btn"
                                 data-id="339"><i
                                          class="fas fa-edit mr-2 card-edit-icon"></i> Edit
                              </a>
                              <a href="" class="dropdown-item dropdown-item-desc delete-btn"
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
                              <span>{{$project->tasks->where('status',0)->where('assign',Auth::id())->count() > 0}} Pending Task(s) </span>
                                          </span>
                  </div>
      
                  {{-- @dd($project) --}}
      
                  <div class="float-right">
                                          <span class="mr-1">{{$project->clients ? $project->clients->name :'N/A'}}</span>
                          <span></span>
                                  </div>
              </div>
          
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

        @endsection