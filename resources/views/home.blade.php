@extends('layouts.master')

@section('content')
<div class="banner">
	<div class="container">
		<div id="shulker" class="center-block">
			<div class="shulker-top"></div>
			<div class="shulker-core"></div>
			<div class="shulker-bottom"></div>
		</div>
		<div class="info center-block">
			<h1>Welcome to Shulkerlist!</h1>
			<h2>The Best Minecraft Server List</h2>
		</div>
	</div>
</div>

@foreach ($servers as $server)
<table id="server-list" class="server">
	<tr>
		<td class="ranknum" width="90px">{{ $server->id }}</td>
		<td class="stitle" width="208px">{{ $server->sname }}</td>
		<td class="pcount" width="170px"><span class="minPlayers">0</span>/<span class="small maxPlayers">250</span> players</td>
	</tr>
	<tr>
		<td colspan="3">
			<ul class="push">
				<li>
					<label style="background: url({{ asset("storage/$server->sbanner") }})">  
						<input type="checkbox" />
						&nbsp;
						  <div class="actions">
							<a href="/server/{{ $server->id }}" class="in"><i class="fa fa-info-circle fa-lg" aria-hidden="true"></i> Info</a>
							<a href="#" class="ed"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> {{ $server->likes }}</a>
							<a href="#" data-clipboard-action="copy" data-clipboard-text="{{ $server->sip }}:{{ $server->sport }}" class="rm"><i class="fa fa-clipboard" aria-hidden="true"></i> COPY</a>
						  </div>
					</label>
				</li>
			</ul>
		</td>
	</tr>
</table>
@endforeach
@endsection