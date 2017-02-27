@extends('layouts.master')

@section('content')

<div class="alert alert-info" role="alert">Sorry, no servers have been added to the database yet. Why don't you add one?</div>
<server is="server"
		v-if="requestComplete"
		v-for="server in servers"
		:server-index="server.id"
		:server-name="server.sname"
		:server-ip="server.sip"
		:server-port="server.sport"
		:server-banner="server.sbanner"
		:server-likes="server.likes"
		v-bind:data="server"
		v-bind:key="server.id"></server>

@endsection