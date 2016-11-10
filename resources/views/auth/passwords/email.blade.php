@extends('layouts.master')

@section('title', 'Forgot Password')
@section('user', 'User')

@section('navigation')
    @parent
@endsection

@section('content')
<div class="section">
	<h1>Forgot Your Password?</h1>
</div>
@if (session('status'))
	<div class="alert alert-success">
		{{ session('status') }}
	</div>
@endif
<form id="reset-request-form" method="post" action="{{ url('/password/email') }}">

	<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
		<label for="email">Email</label>
			<h3>Enter the email you signed up with and we will email you a link to reset your password.</h3>
		<input class="form-control" type="email" id="email" name="email" placeholder="Email" value="{{ old('email') }}">
		@if ($errors->has('email'))
			<span class="help-block">
				<strong>{{ $errors->first('email') }}</strong>
			</span>
		@endif
	</div>
	<button type="submit" class="btn btn-success">Submit</button>
</form>
@endsection