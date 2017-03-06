<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>
	Game Server List - @yield('title')
	</title>
	
	<!-- Stylesheets -->
	<script src="https://use.fontawesome.com/5f7fa28864.js"></script>
	<link rel="stylesheet" href="{{ elixir('css/app.css') }}" />
	
</head>

<body>
	@section('navigation')
	<nav class="navbar navbar-inverse">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#slnav" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="{{ url('/') }}">Server List</a>
			</div>
			
			<div class="collapse navbar-collapse" id="slnav">
				<ul class="nav navbar-nav navbar-right">
			<li><a class="highlight" href="#">Buy Premium</a></li>
					<li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
							@if (Auth::guest())
					User <span class="caret"></span>
				@else
					{{ Auth::user()->username }} <span class="caret"></span>
				@endif
						</a>
						<ul class="dropdown-menu">
							@if (Auth::guest())
										<li><a href="{{ url('/login') }}">Login</a></li>
										<li><a href="{{ url('register') }}">Register</a></li>
								@else
										<li><a href="{{ url('/logout') }}"><i class="fa fa-sign-out"></i> Logout</a></li>
										<li role="separator" class="divider"></li>
										<li><a href="/settings">Settings</a></li>
								@endif
						</ul>
					</li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>
		
	<div class="container">
		<div id="app">
			@yield('content')
		</div>
	</div>
	<!--<script src="https://mcapi.us/scripts/minecraft.js"></script>-->
	<script src="{{ elixir('js/bundle.js') }}"></script>
</body>
</html>