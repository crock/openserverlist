<html>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="csrf-token" content="{{ csrf_token() }}" />

	<title>Enderlist - @yield('title')</title>
	
	<!-- Stylesheets -->
	<link rel="stylesheet" href="{{ asset('css/reset.css') }}" />
	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('css/styles.css') }}" />
	
	<!-- Scripts -->
	<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script src="https://use.fontawesome.com/5f7fa28864.js"></script>
	<script src="{{ asset('js/clipboard.min.js') }}"></script>
	<script src="{{ asset('js/MinecraftColorCodes.min.3.7.js') }}"></script>
	<script src="{{ asset('js/custom.js') }}"></script>
</head>

<body>
	@section('navigation')
	<div class="wrapper-fluid">	
		<nav class="navbar">
			<div class="navbar-header collapsed">
				<div class="navbar-item"><button type="button" class="navsearch"><i class="fa fa-search"></i></button></div>
				<div class="navbar-item"><a class="navlogo" href="/"><h1>ender<span>list</span></h1></a></div>
				<div class="navbar-item"><button type="button" class="navtoggle"><i class="fa fa-bars"></i></button></div>
			</div>	

			<ul id="collapsible">
				@if (Auth::user())	
					<li class="navitem"><a class="navlink" href="/dashboard">Dashboard</a></li>
				@endif
				<li class="navitem"><a class="navlink" href="/sponsored">Sponsored</a></li>
				@if (Auth::guest())	
					<li class="navitem hidden-on-desktop"><a class="navlink" href="/login">Login</a></li>
					<li class="navitem hidden-on-desktop"><a class="navlink" href="/register">Register</a></li>
				@else
					<li class="navitem hidden-on-desktop"><a class="navlink" href="/settings">Settings</a></li>
					<li class="navitem hidden-on-desktop"><a class="navlink" href="/logout">Logout</a></li>
				@endif
				<li class="navitem hidden-on-mobile">
					<a id="userMenu" class="navlink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					@if (Auth::guest())
						User <span class="caret"></span>
					@else
						{{ Auth::user()->username }} <span class="caret"></span>
					@endif
					</a>
					<ul class="dropdown-menu" aria-labelledby="userMenu">
						@if (Auth::guest())
	                        <li><a href="{{ url('/login') }}">Login</a></li>
	                        <li><a href="{{ url('/register') }}">Register</a></li>
	                    @else
	                        <li><a href="{{ url('/logout') }}"><i class="fa fa-sign-out"></i> Logout</a></li>
	                        <li role="separator" class="divider"></li>
	                        <li><a href="/settings">Settings</a></li>
	                    @endif
					</ul>
				</li>
				<li class="navitem hidden-on-mobile"><a class="navlink" href="#">Search</a></li>
			</ul>
		</nav>
		
		<form method="get" action="" id="search">
			<input type="text" class="searchbar" placeholder="Search Enderlist...">
			<input type="submit" class="hidden">
		</form>
	</div>
	
	@show

	<div class="container">
		@yield('content')
	</div>

	
</body>

</html>