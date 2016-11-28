@extends('layouts.master')

@section('title', 'Dashboard')

@section('navigation')
    @parent
@endsection

@section('content')
	<a class="btn btn-primary btn-lg pull-right" href="/add-server">
	  <i class="fa fa-plus"></i> Add Server
	</a>
	
	<table>
		<tr>
			<td class="ranknum" width="90px">#1</td>
			<td class="stitle" width="208px">Lucky Prison</td>
			<td class="pcount" width="170px">211 <span class="small">/250</span> players</td>
		</tr>
		<tr>
			<td colspan="3">
				<ul class="push">
					<li>
						<label>  
							<input type="checkbox" />
							&nbsp;
							  <nav>
							  	<a href="#" class="dashaction">
									{{ Form::open(['method' => 'GET', 'route' => ['info', 1]]) }}
										<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> Info</button>
									{{ Form::close() }}
								</a>
								<a href="#" class="dashaction">
									{{ Form::open(['method' => 'POST', 'route' => ['verify', 1]]) }}
										<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Verify</button>
									{{ Form::close() }}
								</a>
								<a href="#" class="dashaction">
									{{ Form::open(['method' => 'POST', 'route' => ['edit', 1]]) }}
										<button type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit</button>
									{{ Form::close() }}
								</a>
								<a href="#" class="dashaction">
									{{ Form::open(['method' => 'POST', 'route' => ['delete', 1]]) }}
										<button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Delete</button>
									{{ Form::close() }}
								</a>
							  </nav>
						</label>
					</li>
				</ul>
			</td>
		</tr>
	</table>
@endsection