@extends('layouts.master')

@section('title', 'Home')
@section('user', 'User')

@section('navigation')
    @parent
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
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
								<a href="#" class="in"><i class="fa fa-info-circle fa-lg" aria-hidden="true"></i> Info</a>
								<a href="#" class="ed"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 541</a>
								<a href="#" class="rm"><i class="fa fa-clipboard" aria-hidden="true"></i> COPY</a>
							  </nav>
						</label>
					</li>
				</ul>
			</td>
		</tr>
	</table>
</div>
@endsection
