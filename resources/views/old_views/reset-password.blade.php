@extends('layouts.master')

@section('title', 'New Password')
@section('user', 'User')

@section('navigation')
    @parent
@endsection

@section('content')
<div class="section">
	<h1>Reset Password</h1>
</div>
<form id="reset-form" method="post" action="{{ route('reset') }}">
	{{ csrf_field() }}

	<input type="hidden" name="token" value="{{ $token }}">

	<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
		<label for="email">Email</label>
		<input class="form-control" type="text" id="email" name="email" placeholder="Email" value="{{ $email or old('email') }}">
		@if ($errors->has('email'))
			<span class="help-block">
				<strong>{{ $errors->first('email') }}</strong>
			</span>
		@endif
	</div>

	<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
		<label for="password">New Password</label>
		<input class="form-control" type="password" id="password" name="password" placeholder="Password">
		@if ($errors->has('password'))
			<span class="help-block">
				<strong>{{ $errors->first('password') }}</strong>
			</span>
		@endif
	</div>

	<div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
		<label for="password-confirm">Confirm New Password</label>
		<input class="form-control" type="password" id="password-confirm" name="password_confirmation" placeholder="Password">
		@if ($errors->has('password_confirmation'))
			<span class="help-block">
				<strong>{{ $errors->first('password_confirmation') }}</strong>
			</span>
		@endif
	</div>

	<button type="submit" class="btn btn-success">Submit</button>
</form>
@endsection