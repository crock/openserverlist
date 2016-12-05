@extends('layouts.master')

@section('content')
@foreach ($servers as $server)
<table id="server-list">
	<tr>
		<td class="ranknum" width="90px">{{ $server->id }}</td>
		<td class="stitle" width="208px">{{ $server->sname }}</td>
		<td class="pcount" width="170px">0 <span class="small">/250</span> players</td>
	</tr>
	<tr>
		<td colspan="3">
			<ul class="push">
				<li>
					<label>  
						<input type="checkbox" />
						&nbsp;
						  <nav>
							<a href="/server/{{ $server->id }}" class="in"><i class="fa fa-info-circle fa-lg" aria-hidden="true"></i> Info</a>
							<a href="#" class="ed"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> {{ $server->likes }}</a>
							<a href="#" data-clipboard-action="copy" data-clipboard-text="{{ $server->sip }}:{{ $server->sport }}" class="rm"><i class="fa fa-clipboard" aria-hidden="true"></i> COPY</a>
						  </nav>
					</label>
				</li>
			</ul>
		</td>
	</tr>
</table>
@endforeach
@endsection
