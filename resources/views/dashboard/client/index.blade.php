@extends('dashboard.client.layouts.client-dash-layout')
@section('title','dashboard')
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="page-header">
                        <h5>Project Status</h5>
                    </div>
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                            
                                 <th>ID</th>
                                <th> projects</th>
                                <th>Prefix</th>
                                <th>Client</th>
                                <th>User</th>
                                <th>View </th>
                             
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

                             <a class="btn btn-success" href="{{route('client.view',$project->id)}}">view</a>
                                        
                                        </td>
                                        </form>
                                                      

                                    </tr>
                                    @endforeach
                            </tbody>
                        </table>

               
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="page-header">
                        <h5>Invoice Status</h5>
                    </div>
                    <div id="client-invoices-container" class="pt-2">
                        <canvas id="client-invoices"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
</div>


@endsection