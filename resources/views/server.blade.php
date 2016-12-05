@extends('layouts.master')

@section('title', 'Server')

@section('navigation')
    @parent
@endsection

@section('content')
	<table id="server-info" class="table table-striped table-condensed">
		<thead>
			<tr>
				<td colspan="2">{{ $server->sname }}</td>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Status</td>
				<td>Online</td>
			</tr>
			<tr>
				<td>IP</td>
				<td>{{ $server->sip }}</td>
			</tr>
			<tr>
				<td>Port</td>
				<td>{{ $server->sport }}</td>
			</tr>
			<tr>
				<td>Players</td>
				<td>{{ $info['players']['online'] }}/{{ $info['players']['max'] }}</td>
			</tr>
			<tr>
				<td>Version</td>
				<td>{{ $info['version']['name'] }}</td>
			</tr>
			<tr>
				<td>Country</td>
				<td>{{ $server->country }}</td>
			</tr>
			<tr>
				<td>Votes</td>
				<td>{{ $server->votes }}</td>
			</tr>
			<tr>
				<td>Likes</td>
				<td>{{ $server->likes }}</td>
			</tr>
			<tr>
				<td>Website</td>
				<td><a href="#"><i class="fa fa-external-link" aria-hidden="true"></i></a></td>
			</tr>
			<tr>
				<td>Owner</td>
				<td>{{ Auth::user()->username }}</td>
			</tr>
			<tr>
				<td>Tags</td>
				<td>
					<span>pvp</span>
					<span>factions</span>
				</td>
			</tr>
		</tbody>
	</table>
@endsection