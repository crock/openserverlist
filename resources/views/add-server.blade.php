@extends('layouts.master')

@section('title', 'Add Server')
@section('user', 'User')

@section('navigation')
    @parent
@endsection

@section('content')
	<div class="section">
		<h1>Add Server</h1>
	</div>
	<form id="add-server" method="post" action="{{ route('add-server') }}" enctype="multipart/form-data">
		<input type="hidden" name="_token" value="{{ Session::token() }}">
		<input type="hidden" name="ownerID" value="{{ Auth::user()->id }}">
		<div class="form-group">
			<label for="sname">Server Name</label>
			<input class="form-control" type="text" id="sname" name="sname" placeholder="Server Name" length="20">
		</div>
		
		<div class="form-group">
			<label for="scountry">Country</label>
			<select class="form-control" type="text" id="scountry" name="scountry">
				@foreach ($countries as $country)
				<option value="{{ $country->name }}">{{ $country->name }}</option>
				@endforeach
			</select>
		</div>
		
		<div class="form-group">
			<label for="sip">Server IP</label>
			<input class="form-control" type="text" id="sip" name="sip" placeholder="Server IP">
		</div>

		<div class="form-group">
			<label for="sport">Server Port</label>
			<input class="form-control" type="text" id="sport" name="sport" placeholder="Server Port" minlength="3" maxlength="6">
		</div>
		
		<div class="form-group">
			<label for="sdesc">Server Description</label>
			<textarea class="form-control" id="sdesc" name="sdesc" rows="10" placeholder="Write a eye-catching description of your server here to attract many players!" length="5000"></textarea>
		</div>

		<div class="form-group">
			<label for="website">Website</label>
			<input class="form-control" type="url" id="website" name="website" placeholder="Enter your website URL here">
		</div>
		
		<div class="form-group">
			<label for="tags">Tags</label>
			<input class="form-control" type="text" id="tags" name="tags" placeholder="Tags">
		</div>

		<div class="form-group">
			<label>Upload Banner</label>
			<input class="btn btn-primary" id="sbanner" name="sbanner" type="file">
		</div>
		
		<div class="form-group">
			<label for="sport">Enable Votifier?</label>
			<input type="checkbox" id="votifier" name="votifier">
		</div>
		
		<fieldset disabled="true"> 
			<div class="form-group">
				<label for="sport">Votifier Port</label>
				<input class="form-control" type="text" id="vport" name="vport" placeholder="Votifier Port" minlength="2" maxlength="6">

				<label for="sdesc">Votifier Public Key</label>
				<textarea class="form-control" id="spubkey" name="vpubkey" placeholder="Paste the contents of your public.key EXACTLY as it appears in the file" length="5000"></textarea>
			</div>
		</fieldset>	

		<button class="btn btn-success" type="submit" name="action">Submit
			<i class="fa fa-send"></i>
		</button>
	</form>
@endsection