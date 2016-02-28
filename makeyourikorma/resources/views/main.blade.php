<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="{{ asset('css/main.css') }}">
	@yield('head')
</head>
<body>
	@yield('start-body')
	<header>
		<nav class="navbar-mine navbar navbar-default">
			<div class="container-fluid">
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a id="logo" class="navbar-brand" href="#">
		      	@yield('logo')
		      </a>
		    </div>

		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse lista" id="bs-example-navbar-collapse-1">
		      <ul class="nav navbar-nav">
		        <li><a class="centrar" href="{{ route('home') }}">HOME</a></li>
		        <li><a href="{{ route('myi') }}" class="top-margin">
		        	<div class="compact">
						<p class="primero" id="ampms">MAKE YOUR</p>
						<p class="segundo" id="segundo">IKORMA</p>
					</div>
		        </a></li>
		        <li><a href="#" class="top-margin">
		        	<div class="compact">
						<p class="primero" id="ampms">IKORMA</p>
						<p class="segundo" id="segundo">UNIVERSE</p>
					</div>
		        </a></li>
		        <li><a class="centrar" href="#">CONTACT</a></li>
		      </ul>
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>	
	</header>
	
	@yield('body')

	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	@yield('scripts')
</body>