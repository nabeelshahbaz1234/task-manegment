<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Kodinger">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Login page</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/my-login.css">
	 <link rel="stylesheet" type="text/css" href="css/toastr1.css" >
    <link rel="stylesheet" type="text/css" href="css/toastr2.css" >
</head>

<body class="my-login-page">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
			{{-- @if($errors->any())
			@foreach ($errors()->all() as $error )
				<li>{{ $error}}</li>
			@endforeach
			@endif --}}
			      <div class="invalid-feedback">
					Please choose a username.
				</div>
					<div class="cardx fat mt-5">
						<div class="card-body">
							<h4 class="card-title">Login</h4>
							<form method="POST" class="my-login-validation" autocomplete="off" action="{{ route('login') }}">
                                @csrf
								<span class="text-danger">@error('message'){{ $message }}@enderror</span>
								{{-- @dd($errors) --}}
								<div class="form-group">
									<label for="email">E-Mail Address</label>
									<input id="email" type="text" class="form-control" name="email" class="@error('email') is-invalid @enderror"required autofocus placeholder="Enter email">
                                     <span class="text-danger">@error('email'){{ $message }}@enderror</span>
								</div>

								<div class="form-group">
									<label for="password">Password
										<a href="{{route('password.request')}}" class="float-right">
											Forgot Password?
										</a>
									</label>
									<input id="password" type="password" class="form-control" name="password" required data-eye placeholder="Enter password">
                                    <span class="text-danger">@error('password'){{ $message }}@enderror</span>
								</div>

								<div class="form-group">
									<div class="custom-checkbox custom-control">
										<input type="checkbox" name="remember" id="remember" class="custom-control-input">
										<label for="remember" class="custom-control-label">Remeber Me</label>
									</div>
								</div>

								<div class="form-group m-0">
									<button type="submit" class="btn btn-primary btn-block">
										Login
									</button>
								</div>
								<div class="mt-4 text-center">
									Don't have an account? <a href="{{route('register')}}">Create One</a>
								</div>
							</form>
						</div>
					</div>
				
				</div>
			</div>
		</div>
	</section>


	<script src="bootstrap/js/popper.js"></script>
	<script src="bootstrap/js/bootstrap.js"></script>
	<script src="js/my-login.js"></script>
	<script src="js/toastr.js"></script>
   <script src="js/toastr.min.js"></script>
@if(Session::has('success'))
    <script>
        toastr.success('{{Session::get('success') }}')
    </script>
@endif

@if(Session::has('error'))
    <script>
        toastr.error('{{Session::get('error') }}')
    </script>
@endif
</body>
</html>