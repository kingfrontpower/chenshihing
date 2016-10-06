@extends('layouts.main')

@section('content')

	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">

					@if(Session::has('message'))
						<div class="alert alert-info">
							{{Session::get('message')}}
						</div>

						@endif
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form  method="post" action="{{url('/auth/login')}}">
							{{csrf_field()}}
							<input type="email" placeholder="Email Address" id="email" name="email" />
							<input type="password" placeholder="Password" id="password" name="password" />
							<span>
								<input type="checkbox" class="checkbox"> 
								Keep me signed in
							</span>
							<button type="submit" class="btn btn-default">Login</button>
							<a href="{{url('/fb_redirect')}}"><button type="button"  class="btn btn-default">Login with facebook</button></a>

						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<form method="post" action="{{url('/register')}}">
							{{csrf_field()}}
							<input type="text" placeholder="Name" name="name" id="name"/>
							<input type="email" name="email" id="email" placeholder="Email Address"/>
							<input type="password" placeholder="Password" name="password" id="password"/>
							<button type="submit" class="btn btn-default">Signup</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->

@endsection