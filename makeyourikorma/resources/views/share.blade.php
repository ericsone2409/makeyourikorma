@extends('main')

@section('title', 'Share Make Your Ikorma')

@section('meta:vp')
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
@endsection

@section('head')
	<link rel="stylesheet" href="{{ asset('plugins/perfectscroll/css/perfect-scrollbar.css') }}">
	<link rel="stylesheet" href="{{ asset('css/myi.css') }}">
@endsection

@section('logo')
	<img class="img-responsive" src="{{ asset('img/myi/logo.png') }}">
@endsection

@section('body')

</div>
	<div class="center">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12 col-lg-2">
					<ul class="menu" id="creation-menu">
						<div class="main-options">
							<a href="#" id="shapes-img" class="option" data-shows="#dropdown-menu-mine">
								<img class="img-responsive img-center" src="{{ asset('img/myi/shapes.png') }}">
							</a>

							<a href="#" id="colors" class="option" data-shows="#colors-container">
								<img class="img-responsive img-center" src="{{ asset('img/myi/colors.png') }}">
							</a>
							<a href="#" id="layers" class="option" data-shows="#layers-container" data-load-layers="true">
								<img class="img-responsive img-center" src="{{ asset('img/myi/layers.png') }}">
							</a>
						</div>
						<div class="dropdown-mine">
						    <ul id="dropdown-menu-mine" class="dropdown-menu-mine menu-slider-target">
						        <li><a id="shapes" class="trigger-toggle-slider" data-shows="#shapes-container" href="#">shapes</a></li>
						        <li><a id="facials" class="trigger-toggle-slider" data-shows="#facials-container" href="#">facials</a></li>						        
						    </ul>
						</div>
					</ul>
				</div>
				<div class="canvas-container col-xs-12 col-lg-9">
					<div id="shapes-container" class="shapes-container menu-slider-target">
						<p>shapes</p>
						<ul>
						</ul>	
					</div>
					<div id="facials-container" class="shapes-container menu-slider-target">
						<p>FACIALS</p>
						<ul>
						</ul>
					</div>
					<div id="colors-container" class="colors-container menu-slider-target">
						<p>COLORS</p>
						<ul class="colors">
						</ul>
					</div>
					<div id="layers-container" class="layers-container menu-slider-target">
						<p>layers</p>
						<ul class="layers">
						</ul>
					</div>
					<img src="{{ url('myi/show/'.$id) }}">
				</div>
			</div>
		</div>
	</div>

	<footer>
		<div class="container-fluid">
			<div class="row">
				<div class="copy">
					<p>Copyright © 2016 IKORMA. <p class="hidden-xs"> All rights reserved.</p> </p>
				</div>
				<a href="https://www.youtube.com/user/ikorma" target="_BLANK" class="social">
					<span class="fa-stack fa-lg">
						<i class="fa fa-circle fa-stack-2x"></i>
						<i class="fa fa-youtube-play fa-stack-1x"></i>
					</span>
				</a>
				<a href="https://www.facebook.com/ikormartinez/" target="_BLANK" class="social">
					<span class="fa-stack fa-lg">
						<i class="fa fa-circle fa-stack-2x"></i>
						<i class="fa fa-facebook fa-stack-1x"></i>
					</span>
				</a>
				<a href="https://www.instagram.com/ikorma/" target="_BLANK" class="social">
					<span class="fa-stack fa-lg">
						<i class="fa fa-circle fa-stack-2x"></i>
						<i class="fa fa-instagram fa-stack-1x"></i>
					</span>
				</a>
			</div>
		</div>	
	</footer>
@endsection

@section('scripts')
	<script src="{{ asset('plugins/perfectscroll/js/perfect-scrollbar.jquery.js') }}"></script>
	<script src="{{ asset('js/myi2.js') }}"></script>
@endsection