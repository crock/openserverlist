<html>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<title>Enderlist - @yield('title')</title>

	<script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
	
	<!-- Bootstrap CDN -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	
	<!-- Other scripts -->
	<link rel='stylesheet' href='{{ asset("css/animate.min.css") }}'>
	<script src="https://use.fontawesome.com/5f7fa28864.js"></script>

	<!-- Custom Stylesheet -->
	<link rel="stylesheet" href='{{ asset("css/styles.css") }}'>
	
	<!-- Custom Javascript -->
	<script src='{{ asset("js/custom.js") }}'></script>
</head>

<body>
	@section('navigation')
	<div class="container">	
		<nav class="navbar navbar-inverse">
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#enderlist-navbar-collapse-1" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand">
						<img alt="Brand" src="http://croc.buzz/1dMJt+">
					</a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="enderlist-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-left">
						<li><a href="/"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
						<li><a class="randomize" href="#"><i class="fa fa-random" aria-hidden="true"></i> Random</a></li>
						<li><a href="#">Stats</a></li>
						<li><a href="#">Sponsored</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="#">Dashboard</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">@yield('user') <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="/login">Login</a></li>
								<li><a href="/register">Register</a></li>
								<li role="separator" class="divider"></li>
								<li><a href="#">Help</a></li>
								<li><a href="#">Settings</a></li>
							</ul>
						</li>
					</ul>
				</div>
				<!-- /.navbar-collapse -->
			</div>
			<!-- /.container-fluid -->
		</nav>
	</div>
	
	@show

	<div class="container">
		@yield('content')
	</div>

	
</body>

</html>