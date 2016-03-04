<!DOCTYPE html>
<html>
<head>
	<title>Project Flyer</title>
	<link rel="stylesheet" type="text/css" href="/css/app.css">
	<link rel="stylesheet" type="text/css" href="/css/libs.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.css">
</head>
<body>

	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Project Flyer</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Project name</a>
			</div>
			<div id="navbar" class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
					<li class="active"><a href="/">Home</a></li>
					<li>
						<a href="{{ route('flyers.index') }}">
							Show Flyers
						</a>
					</li>
					<li>
						<a href="{{ route('flyers.create') }}">
							Create Flyer
						</a>
					</li>
				</ul>

				@if( $signedIn )
					<p class="navbar-text navbar-right">
					Hello, {{ $user->name }}
					</p>
				@else
					<p class="navbar-text navbar-right">
						<a href="/register">Register</a>
					</p>
				@endif
			</div><!--/.nav-collapse -->
		</div>
	</nav>
	<div class="container-fluid">
		@yield('content')
	</div>

	<script src="//code.jquery.com/jquery-2.2.1.min.js"></script>
	<script src="/js/libs.js"></script>
	@include('flash')
	@yield('scripts.footer')

</body>
</html>