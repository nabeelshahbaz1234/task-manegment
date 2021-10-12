@extends('dashboard.user.layouts.user-dash-layout')
@section('title','Profile')

@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Profile</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Admin Profile</li>
        </ol>
      </div>
    </div>
  </div>
</section>
<section class="content">
<div class="container-fluid">
<div class="row">
<div class="col-md-3">
  <!-- Profile Image -->
  <div class="card card-primary card-outline">
    <div class="card-body box-profile">
      <div class="text-center">
        <img class="profile-user-img img-fluid img-circle admin_picture" src="{{ Auth::user()->picture }}" alt="User profile picture">
      </div>
      <h3 class="profile-username text-center admin_name">{{Auth::user()->name}}</h3>
      <p class="text-muted text-center">User</p>
        <input type="file" name="admin_image"  id="#admin_image" style="opacity: 0;height:1px;display:none">
      <button class="btn btn-primary btn-block" id="#change_picture_btn" onClick="changeImage()"><b>Change picture</b></button>
    </div>
  </div>
</div>
<div class="col-md-9">
  <div class="card">
    <div class="card-header p-2">
      <ul class="nav nav-pills">
        <li class="nav-item"><a class="nav-link active" data-toggle="tab">Personal Information</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('user_ChangePasswo') }}" >Change Password</a></li>
      </ul>
    </div>
<div class="card-body">
<div class="tab-content">
<div class="active tab-pane" id="personal_info">
<form class="form-horizontal" method="POST" action="{{ route('user_UpdateInfo') }}" id="UserInfoForm">
@csrf
<div class="form-group row">
  <label for="inputName" class="col-sm-2 col-form-label">Name</label>
  <div class="col-sm-10">
    <input type="text" class="form-control" id="inputName" placeholder="Name" value="{{ Auth::user()->name }}" name="name">

    <span class="text-danger error-text name_error"></span>
  </div>
</div>
<div class="form-group row">
  <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
  <div class="col-sm-10">
    <input type="text" class="form-control" id="inputEmail" placeholder="Email" value="{{ Auth::user()->email }}" name="email">
    <span class="text-danger error-text email_error"></span>
  </div>
</div>

<div class="form-group row">
  <div class="offset-sm-2 col-sm-10">
    <button type="submit" class="btn btn-danger">Save Changes</button>
  </div>
</div>
</form>
</div>
                   
                    

                <script>

                  // $.ajaxSetup({
                  //    headers:{
                  //      'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                  //    }
                  // });
                  
                  $(function(){
                
                    /* UPDATE ADMIN PERSONAL INFO */
                
                    $('#AdminInfoForm').on('submit', function(e){
                        e.preventDefault();
                
                        $.ajax({
                           url:$(this).attr('action'),
                           method:$(this).attr('method'),
                           data:new FormData(this),
                           processData:false,
                           dataType:'json',
                           contentType:false,
                           beforeSend:function(){
                               $(document).find('span.error-text').text('');
                           },
                           success:function(data){
                                if(data.status == 0){
                                  $.each(data.error, function(prefix, val){
                                    $('span.'+prefix+'_error').text(val[0]);
                                  });
                                }else{
                                  $('.admin_name').each(function(){
                                     $(this).html( $('#AdminInfoForm').find( $('input[name="name"]') ).val() );
                                  });
                                  alert(data.msg);
                                }
                           }
                        });
                    });
                
                    (function($){
                
                    (document).on('click','change_picture_btn', function(){
                      $('#admin_image').click();
                    });
                  });
                
                  
                  (function($){
                    $('#admin_image').ijaboCropTool({
                          preview : '.admin_picture',
                          setRatio:1,
                          allowedExtensions: ['jpg', 'jpeg','png'],
                          buttonsText:['CROP','QUIT'],
                          buttonsColor:['#30bf7d','#ee5155', -15],
                          processUrl:'{{ route("adminPictureUpdate") }}',
                          // withCSRF:['_token','{{ csrf_token() }}'],
                          onSuccess:function(message, element, status){
                             alert(message);
                          },
                          onError:function(message, element, status){
                            alert(message);
                          }
                       });
                      });
                
                
                
                    
                  });
                
                </script>
                


@endsection
