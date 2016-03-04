@extends('main')

@section('title', 'Make Your Ikorma')

@section('head')
	<link rel="stylesheet" href="{{ asset('plugins/perfectscroll/css/perfect-scrollbar.css') }}">
	<link rel="stylesheet" href="{{ asset('css/myi.css') }}">
@endsection

@section('logo')
	<img id="logo"  class="img-responsive" src="{{ asset('img/myi/logo.png') }}">
@endsection

@section('body')
<div id="fb-root"></div>
<script>
window.fbAsyncInit = function() {
FB.init({appId: 'YOUR APP ID', status: true, cookie: true,
xfbml: true});
};
(function() {
 var e = document.createElement('script'); e.async = true;
 e.src = document.location.protocol +
 '//connect.facebook.net/en_US/all.js';
document.getElementById('fb-root').appendChild(e);
}());
window.fbAsyncInit = function() {
    FB.init({
      appId      : '1682507535341378',
      xfbml      : true,
      version    : 'v2.5'
    });
};
</script>
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
						<div class="colors-wrapper center-hv">
							<ul class="colors center-hv"></ul>
						</div>
					</div>
					<div id="layers-container" class="layers-container menu-slider-target">
						<p>layers</p>
						<ul class="layers">
						</ul>
					</div>
					<a href="#" title="Download" class="download" id="download" data-url="{{ url('myi/save') }}">
						<span class="fa-stack fa-lg">
							<i class="fa fa-circle fa-stack-2x"></i>
							<i class="fa fa-download fa-stack-1x"></i>
						</span>
					</a>
					<a href="#" title="Share" class="share" id="share">
						<span class="fa-stack fa-lg">
							<i class="fa fa-circle fa-stack-2x"></i>
							<i class="fa fa-share-alt fa-stack-1x"></i>
						</span>
					</a>
					<a href="#" title="Send" class="download send">
						<span class="fa-stack fa-lg">
							<i class="fa fa-circle fa-stack-2x"></i>
							<i class="fa fa-send fa-stack-1x"></i>
						</span>
					</a>
					<a href="#" title="Delete" class="delete" id="delete">
						<div>
							<span class="fa-stack fa-lg">
								<i class="fa fa-circle fa-stack-2x"></i>
								<i class="fa fa-trash fa-stack-1x"></i>
							</span>
						</div>
					</a>
					<div id="responsive-canvas-container">
						<canvas width="450" height="450" id="draw-canvas" data-background="{{ asset('myi-app/background.png') }}"></canvas>
					</div>
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
	<script src="{{ asset('js/myi.js') }}"></script>
	<!-- Fabric.js -->
	<script src="{{ asset('components/fabric.js/dist/fabric.min.js') }}"></script>

	<!-- Dragsort -->
	<script src="{{ asset('components/dragsort/jquery.dragsort-0.5.2.min.js') }}"></script>

	<script>
		var colors   = {!! $colores !!};
		var uniques  = {!! $unicas !!};
		var variants = {!! $variantes !!};
	</script>

	<script src="{{ asset('myi-app/source.js') }}"></script>

	<script src="{{ asset('myi-app/main.js') }}"></script>


	<script>
		var colors   = {!! $colores !!};
		var uniques  = {!! $unicas !!};
		var variants = {!! $variantes !!};
	</script>
@endsection