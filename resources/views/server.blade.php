@extends('layouts.master')

@section('title', 'Server')

@section('navigation')
    @parent
@endsection

@section('content')
	<div class="row">	
		<div class="col-md-4">	
			<table id="server-info" class="table table-striped table-condensed">
				<thead>
					<tr>
						<td>{{ $server->sname }}</td>
						<td><a class="likebtn" href="#"><i class="fa fa-heart-o"></i></a></td>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Status</td>
						<td class="{{ ($info) ? 'online' : 'offline' }}">{{ ($info) ? "Online" : "Offline" }}</td>
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
						<td class="{{ ($info) ? "" : 'faded' }}">{{ ($info) ? $info['players']['online']."/".$info['players']['max'] : "No Connection" }}</td>
					</tr>
					<tr>
						<td>Version</td>
						<td class="{{ ($info) ? "" : 'faded' }}">{{ ($info) ? $info['version']['name'] : "No Connection" }}</td>
					</tr>
					<tr>
						<td>Country</td>
						<td>{{ $server->scountry }}</td>
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
						<td><a href="{{ $server->website }}">Visit Site <i class="fa fa-external-link" aria-hidden="true"></i></a></td>
					</tr>
					<tr>
						<td>Owner</td>
						<td>{{ $user->username }}</td>
					</tr>
					<tr>
						<td>Tags</td>
						<td>
						@foreach($tags as $tag)
							<a href="/tags/{{ $tag->slug }}" class="tag">{{ $tag->name }}</a>
						@endforeach
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		
		<div class="col-md-8">
			<div id="secondary-info">	
				<ul class="nav nav-tabs">
					<li class="active"><a data-toggle="tab" href="#home">About</a></li>
					<li><a data-toggle="tab" href="#menu1">Vote</a></li>
					<li><a data-toggle="tab" href="#menu2">Stats</a></li>
				</ul>
				
				<div class="tab-content">
				<div id="home" class="tab-pane fade in active">
					<img src="{{ $info['favicon'] }}" alt="server icon">
					@if ($server->sbanner == NULL)
						<img src="http://placehold.it/468x60" alt="banner" />
					@else 
						<img src='{{ asset("storage/$server->sbanner") }}' alt="banner" />
					@endif
					<p>{{ $server->sdesc }}</p>
				</div>
				<div id="menu1" class="tab-pane fade">
				  <h3>Menu 1</h3>
				  <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>				
				</div>
				<div id="menu2" class="tab-pane fade">
				  <h3>Menu 2</h3>
				  <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
				</div>
			</div>
		</div>
	</div>	
@endsection