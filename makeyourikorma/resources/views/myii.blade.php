@extends('main')

@section('title', 'Make Your Ikorma')

@section('meta:vp')
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
@endsection

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
							<a href="#" id="shapes-img" class="option" data-shows="#allshapes-container">
								<img class="img-responsive img-center" src="{{ asset('img/myi/shapes.png') }}">
							</a>

							<a href="#" id="colors" class="option" data-shows="#colors-container">
								<img class="img-responsive img-center" src="{{ asset('img/myi/colors.png') }}">
							</a>
							<a href="#" id="layers" class="option" data-shows="#layers-container" data-load-layers="true">
								<img class="img-responsive img-center" src="{{ asset('img/myi/layers.png') }}">
							</a>
						</div>
						<!--
						<div class="dropdown-mine">
						    <ul id="dropdown-menu-mine" class="dropdown-menu-mine menu-slider-target">
						        <li><a id="shapes" class="trigger-toggle-slider" data-shows="#shapes-container" href="#">shapes</a></li>
						        <li><a id="facials" class="trigger-toggle-slider" data-shows="#facials-container" href="#">facials</a></li>						        
						    </ul>
						</div>
						-->
					</ul>
				</div>
				<div class="canvas-container col-xs-12 col-lg-9">
					<!--
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
					-->
					<div id="allshapes-container" class="allshapes-container menu-slider-target">
						<h4>shapes</h4><!--ESTO ES DE EJEMPLO, IGUAL QUE EL LI QUE TIENE LA CLASE SELECTED-->
						<ul class="allshapes-options">
							<li class="selected" data-show="shapes"><a href="#"><img class="img-responsive" src="{{ asset('img/myi/boton1.png') }}" alt=""></a></li>
							<li data-show="eyes"><a href="#" ><img class="img-responsive" src="{{ asset('img/myi/boton2.png') }}" alt=""></a></li>
							<li data-show="mouth"><a href="#" ><img class="img-responsive" src="{{ asset('img/myi/boton3.png') }}" alt=""></a></li>
							<li data-show="nose"><a href="#" ><img class="img-responsive" src="{{ asset('img/myi/boton4.png') }}" alt=""></a></li>
						</ul>
						<ul class="allshapes-ul"></ul>
					</div>

					<div id="colors-container" class="allshapes-container center menu-slider-target">
						<h4>COLORS</h4>
						<div class="colors-wrapper">
							<ul class="colors"></ul>
						</div>
					</div>
		
					<div id="layers-container" class="allshapes-container bottom menu-slider-target">
						<h4>layers</h4>
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
					<div class="direction-container">
						<div>
							<a href="#" data-direction="vertical"><img class="img-responsive" src="{{ asset('img/myi/vertical.png') }}" alt=""></a>
							<a href="#" data-direction="horizontal"><img class="img-responsive" src="{{ asset('img/myi/horizontal.png') }}" alt=""></a>
						</div>
					</div>
					<a href="#" title="Delete" class="delete" id="delete">
						<div>
							<span class="fa-stack fa-lg">
								<i class="fa fa-circle fa-stack-2x"></i>
								<i class="fa fa-trash fa-stack-1x"></i>
							</span>
						</div>
					</a>
					<div id="responsive-canvas-container">
						<canvas width="410" height="450" id="draw-canvas" data-background="{{ asset('myi-app/background.png') }}"></canvas>
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
	<script src="{{ asset('js/myi2.js') }}"></script>
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