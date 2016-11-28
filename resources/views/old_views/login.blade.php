@extends('layouts.master')

@section('title', 'Login')
@section('user', 'User')

@section('navigation')
    @parent
@endsection

@section('content')
<form id="login-form" method="post" action="{{ route('login') }}">
{{ csrf_field() }}
	
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
	
	<div class="form-group">
		<div class="checkbox">
			<label>
				<input type="checkbox" name="remember"> Remember Me
			</label>
		</div>
	</div>

	<button type="submit" class="btn btn-success">Sign in</button>
	<a href="{{ url('/password/reset') }}">Forgot Password?</a>
</form>
<h3>New User? Click below to sign up&mdash;it's free!</h3>
<a href="/register" class="btn btn-primary">Register</a>
@endsection