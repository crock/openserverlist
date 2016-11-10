@extends('layouts.master')

@section('title', 'Server')

@section('navigation')
    @parent
@endsection

@section('content')
	<div class="section">
		<h5>Dashboard</h5>
		<div class="divider"></div>
		<div class="row">
			<div class="col m8">
				this is a test
			</div>
			<div class="col m4">
				<table>
					<thead>
						<tr>
							<td colspan="2">BestServer</td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Status</td>
							<td>Online</td>
						</tr>
						<tr>
							<td>IP</td>
							<td>play.bestserver.com</td>
						</tr>
						<tr>
							<td>Port</td>
							<td>25565</td>
						</tr>
						<tr>
							<td>Players</td>
							<td>12/250</td>
						</tr>
						<tr>
							<td>Version</td>
							<td>Spigot 1.10.2</td>
						</tr>
						<tr>
							<td>Country</td>
							<td>United States</td>
						</tr>
						<tr>
							<td>Votes</td>
							<td>125</td>
						</tr>
						<tr>
							<td>Likes</td>
							<td>489</td>
						</tr>
						<tr>
							<td>Website</td>
							<td><a href="#"><i class="fa fa-external-link" aria-hidden="true"></i></a></td>
						</tr>
						<tr>
							<td>Owner</td>
							<td>JohnDoe</td>
						</tr>
						<tr>
							<td>Last Ping</td>
							<td>2m</td>
						</tr>
						<tr>
							<td>Uptime</td>
							<td>99.8%</td>
						</tr>
						<tr>
							<td>Tags</td>
							<td>
								<span>pvp</span>
								<span>factions</span>
							</td>
						</tr>
						<tr>
							<td>
								{{ Form::open(['method' => 'POST', 'route' => ['vote', 'Crockr']]) }}
									<button type="submit" class="waves-effect waves-light btn">Vote for <span>BestServer</span></button>
								{{ Form::close() }}
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
@endsection