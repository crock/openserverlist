@extends('layouts.master')

@section('title', 'Forgot Password?')
@section('user', 'User')

@section('navigation')
    @parent
@endsection

@section('content')
<div class="section">
	<h1>Forgot Password?</h1>
</div>
<form id="reset-form" method="post" action="{{ route('send-reset') }}">
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

	<button type="submit" class="btn btn-success">Submit</button>
</form>
@endsection