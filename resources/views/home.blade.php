@extends('layouts.master')

@section('content')
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
@endsection
