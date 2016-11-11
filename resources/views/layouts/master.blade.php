<html>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<title>Enderlist - @yield('title')</title>
	
	<!-- Stylesheets -->
	<link rel="stylesheet" href='{{ asset("css/reset.css") }}'>
	<link rel='stylesheet' href='{{ asset("css/animate.min.css") }}'>
	<link rel="stylesheet" href='{{ asset("css/styles.css") }}'>
	
	<!-- Scripts -->
	<script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
	<script src="https://use.fontawesome.com/5f7fa28864.js"></script>
	<script src='{{ asset("js/custom.js") }}'></script>
</head>

<body>
	@section('navigation')
	<div class="wrapper-fluid">	
		<nav class="navbar">
			<a href="/"><h1>ender<span>list</span></h1></a>
			<form id="search">
				<input type="text" placeholder="Search" name="search">
				<button type="submit"><i class="fa fa-search"></i></button>
			</form>
			<ul>
				<li><a href="/dashboard">Dashboard</a></li>
				<li><a href="/sponsored">Sponsored</a></li>
				<li><a href="/login">Login</a></li>
				<li><a href="/register">Register</a></li>
			</ul>
		</nav>
	</div>
	
	@show

	<div class="container">
		@yield('content')
	</div>

	
</body>

</html>