<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>
	Shulkerlist - @yield('title')
	</title>
	
	<!-- Stylesheets -->
	<script src="https://use.fontawesome.com/5f7fa28864.js"></script>
	<link rel="stylesheet" href="{{ asset('css/app.css') }}" />
	
	<!-- Scripts -->
	<script src="{{ asset('js/clipboard.min.js') }}"></script>
	<script src="{{ asset('js/MinecraftColorCodes.min.3.7.js') }}"></script>
	<script src="{{ asset('js/app.js') }}"></script>
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
		  <button type="button" class="navbar-toggle collapsed nav-search" data-toggle="collapse" data-target="#slsearch" aria-expanded="false">
			  <span class="sr-only">Toggle search</span>
			  <i class="fa fa-search"></i>
		  </button>
	      <a class="navbar-brand" href="{{ url('/') }}">Shulkerlist</a>
	    </div>
		  
	    <div class="collapse navbar-collapse" id="slnav">
	      <ul class="nav navbar-nav navbar-left hidden-xs">
			  <li><a class="search-btn" href="#" data-toggle="collapse" data-target="#slsearch" aria-expanded="false"><i class="fa fa-search" aria-hidden="true"></i> Search</a></li>
		  </ul>
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
	
	<form method="get" action="" id="slsearch">
		<input type="text" class="searchbar" placeholder="Search Shulkerlist...">
		<input type="submit" class="hidden">
	</form>
	
	@show

	
	@yield('content')
</body>
</html>