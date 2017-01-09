@extends('layouts.master')

@section('title', 'Dashboard')

@section('navigation')
    @parent
@endsection

@section('content')
	<div class="dashContent">	
		<a id="add-server-btn" class="btn btn-primary btn-lg pull-right" href="/add-server">
		  <i class="fa fa-plus"></i> Add Server
		</a>
		
		@foreach ($servers as $server)
	    	<table>
				<tr>
					<td class="ranknum" width="90px">{{ $server->id }}</td>
					<td class="stitle" width="208px">{{ $server->sname }}</td>
					<td class="pcount" width="170px">0 <span class="small">/250</span> players</td>
				</tr>
				<tr>
					<td colspan="3">
						<ul class="push">
							<li>
								<label style="background: url({{ asset("storage/$server->sbanner") }})">  
									<input type="checkbox" />
									&nbsp;
									  <div class="actions">
									  	<a href="#" class="dashaction">
											{{ Form::open(['method' => 'GET', 'route' => ['info', $server->id]]) }}
												<button type="submit" class="btn btn-primary"><i class="fa fa-info" aria-hidden="true"></i> Info</button>
											{{ Form::close() }}
										</a>
										<a href="#" class="dashaction">
											{{ Form::open(['method' => 'POST', 'route' => ['verify', $server->id]]) }}
												<button type="submit" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i> Verify</button>
											{{ Form::close() }}
										</a>
										<a href="#" class="dashaction">
											{{ Form::open(['method' => 'POST', 'route' => ['edit', $server->id]]) }}
												<button type="submit" class="btn btn-warning"><i class="fa fa-edit" aria-hidden="true"></i> Edit</button>
											{{ Form::close() }}
										</a>
										<a href="#" class="dashaction">
											{{ Form::open(['method' => 'POST', 'route' => ['delete', $server->id]]) }}
												<button type="submit" class="btn btn-danger"><i class="fa fa-remove" aria-hidden="true"></i> Delete</button>
											{{ Form::close() }}
										</a>
									  </div>
								</label>
							</li>
						</ul>
					</td>
				</tr>
			</table>
		@endforeach
	</div><!-- end .dashContent -->
@endsection