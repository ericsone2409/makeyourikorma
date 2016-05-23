@extends('main')

@section('title', 'Share Make Your Ikorma')

@section('meta:vp')
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta property="fb:app_id" content="1682507535341378" />
	<meta property="og:title" content="Make Your Ikorma" />
	<meta property="og:type" content="article" />
	<meta property="og:url" content="{{ url('myi/share/'.$id) }}" />
	<meta property="og:image" content="{{ asset('img/home/logo2.png') }}" />
	<meta property="og:description" content="I just made this ikorma" />
@endsection

@section('head')
	<link rel="stylesheet" href="{{ asset('plugins/perfectscroll/css/perfect-scrollbar.css') }}">
	<link rel="stylesheet" href="{{ asset('css/myii.css') }}">
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
					</ul>
				</div>
				<div class="canvas-container col-xs-12 col-lg-9">
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