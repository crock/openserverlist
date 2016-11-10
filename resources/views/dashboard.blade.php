@extends('layouts.master')

@section('title', 'Dashboard')

@section('navigation')
    @parent
@endsection

@section('content')
	<table>
		<thead>
			<tr>
				<td>Rank</td>
				<td>Server</td>
				<td>Verified?</td>
				<td>Tools</td>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>#1</td>
				<td>
					<span>BestServer</span>
					<span>play.bestserver.com</span>
				</td>
				<td>
					<span>
						{{ Form::open(['method' => 'POST', 'route' => ['verify', 1]]) }}
							<button type="submit" class="waves-effect waves-light btn"><i class="material-icons left">checkmark</i>Verify Server</button>
						{{ Form::close() }}
					</span>
				</td>
				<td>
					<span>Stats</span>
					<span>Ping</span>
					<span>Edit</span>
					<span>Delete</span>
				</td>
			</tr>
		</tbody>
	</table>
@endsection