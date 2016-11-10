@extends('layouts.master')

@section('title', 'Register')
@section('user', 'User')

@section('navigation')
    @parent
@endsection

@section('content')
<div class="section">
		<h1>Register</h1>
	</div>
	<form id="register-form" method="post" action="{{ route('register') }}">
		{{ csrf_field() }}
		
		<div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
			<label for="username">Username</label>
			<input class="form-control" type="text" id="username" name="username" placeholder="Username">
			@if ($errors->has('name'))
				<span class="help-block">
					<strong>{{ $errors->first('username') }}</strong>
				</span>
			@endif
		</div>
		
		<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
			<label for="email">Email</label>
			<input class="form-control" type="email" id="email" name="email" placeholder="Email">
			@if ($errors->has('email'))
				<span class="help-block">
					<strong>{{ $errors->first('email') }}</strong>
				</span>
			@endif
		</div>
		
		<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
			<label for="password">Password</label>
			<input class="form-control" type="password" id="password" name="password" placeholder="Password">
			@if ($errors->has('password'))
				<span class="help-block">
					<strong>{{ $errors->first('password') }}</strong>
				</span>
			@endif
		</div>
		
		<div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
			<label for="password-confirm">Confirm Password</label>
			<input class="form-control" type="password" id="password-confirm" name="password-confirm" placeholder="Password">
			@if ($errors->has('password_confirmation'))
				<span class="help-block">
					<strong>{{ $errors->first('password_confirmation') }}</strong>
				</span>
			@endif
		</div>

		<button type="submit" class="btn btn-success">Register</button>
		<input type="hidden" name="_token" value="{{ Session::token() }}">
	</form>
	<div class="section">
		<h3>Existing user? Click below to login!</h3>
	</div>
	<a href="/login" class="btn btn-primary">Login</a>
@endsection