@extends('dashboard.user.layouts.user-dash-layout')
@section('title','index')

@section('content') 
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">User Dashboard</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div>
</div>

<section class="section">
  <div class="section-header">

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
                                  <select id="userId" class="user_filter_dropdown" name="users"><option value="6">Adrian Bell</option><option value="2" selected="selected">Aiden Bulter</option><option value="136">bunny</option><option value="126">Çiğdem Ç.</option><option value="124">cron</option><option value="119">DUVAN</option><option value="127">g</option><option value="112">hiral patel</option><option value="1">InfyTracker Admin</option><option value="10">Julie Peterson</option><option value="11">Kathie Ward</option><option value="9">Martin Watkins</option><option value="129">NIku</option><option value="114">nili</option><option value="117">nitya</option><option value="100">pandit</option><option value="67">rg</option><option value="135">ROBAIN</option><option value="120">sathish kumar</option><option value="118">Scott Lawrance</option><option value="16">TIA MAY</option></select>
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
                  <div class="page-header flex-wrap">
                      <h5>Daily Work Report</h5>
                      <div id="rightData">
                          <div id="developers-report-date-picker" class="time_range">
                              <i class="far fa-calendar-alt" aria-hidden="true"></i>&nbsp;&nbsp;
                              <span></span> <b class="caret"></b>
                          </div>
                      </div>
                  </div>
                  <div id="developers-daily-work-report-container" class="pt-2">
                      <canvas id="developers-daily-work-report"></canvas>
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
                  <div id="users-open-tasks-container" class="pt-2">
                      <canvas id="users-open-tasks"></canvas>
                  </div>
              </div>
          </div>
      </div>
  </div>
                      </div>
</section>



@endsection
