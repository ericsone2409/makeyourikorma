@extends('main')

@section('title', 'Make Your Ikorma')

@section('head')
	<link rel="stylesheet" href="{{ asset('plugins/perfectscroll/css/perfect-scrollbar.css') }}">
	<link rel="stylesheet" href="{{ asset('css/myi.css') }}">
@endsection

@section('logo')
	<img class="img-responsive" src="{{ asset('img/myi/logo.png') }}">
@endsection

@section('body')
<script>
function ejecutar (e) {
		  window.fbAsyncInit = function() {
		    FB.init({
		      appId      : '1682507535341378',
		      xfbml      : true,
		      version    : 'v2.5'
		    });
		    FB.ui({
				method: 'share',
				href: 'https://developers.facebook.com/docs/'
			}, function(response){});
		  };

		  (function(d, s, id){
		     var js, fjs = d.getElementsByTagName(s)[0];
		     if (d.getElementById(id)) {return;}
		     js = d.createElement(s); js.id = id;
		     js.src = "//connect.facebook.net/en_US/sdk.js";
		     fjs.parentNode.insertBefore(js, fjs);
		   }(document, 'script', 'facebook-jssdk'));
	e.preventDefault();
}
</script>
</div>
	<div class="center">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12 col-lg-2">
					<ul class="menu">
						<div class="dropdown-mine">
						    <!-- trigger button -->
							<a href="#" id="shapes-img"><img class="img-responsive" src="{{ asset('img/myi/shapes.png') }}"></a>

						    <!-- dropdown menu -->
						    <ul id="dropdown-menu-mine" class="dropdown-menu-mine">
						        <li><a id="shapes" href="#">shapes</a></li>
						        <li><a id="facials" href="#">facials</a></li>						        
						    </ul>
						</div>
						<a href="#" id="colors"><img class="img-responsive" src="{{ asset('img/myi/colors.png') }}"></a>
						<a href="#" id="layers"><img class="img-responsive" src="{{ asset('img/myi/layers.png') }}"></a>
					</ul>
				</div>
				<div class="canvas-container col-xs-12 col-lg-9">
					<div id="shapes-container" class="shapes-container">
						<p>shapes</p>
						<ul>
						<!--QUITAR-->
							<li></li>
							<li></li>
							<li></li>
							<li></li>
							<li></li>
							<li></li>
							<li></li>
							<li></li>
							<li></li>
							<li></li>
							<li></li>
							<li></li>
							<li></li>
							<li></li>
							<li></li>
							<li></li>
							<li></li>
							<li></li>
							<li></li>
							<li></li>
						</ul>	
					</div>
					<div id="facials-container" class="shapes-container">
						<p>FACIALS</p>
						<ul>
						<!--QUITAR-->
							<li></li>
							<li></li>
							<li></li>
							<li></li>
							<li></li>
							<li></li>
							<li></li>
							<li></li>
							<li></li>
							<li></li>
							<li></li>
							<li></li>
							<li></li>
							<li></li>
							<li></li>
							<li></li>
							<li></li>
							<li></li>
							<li></li>
							<li></li>
						</ul>
					</div>
					<div id="colors-container" class="colors-container">
						<p>COLORS</p>
						<ul class="colors">
						<!--QUITAR-->
							<li></li>
							<li></li>
							<li></li>
							<li></li>
							<li></li>
							<li></li>
							<li></li>
							<li></li>
							<li></li>
							<li></li>
						</ul>
					</div>
					<div id="layers-container" class="layers-container">
						<p>layers</p>
						<ul class="layers">
						<!--QUITAR-->
							<li><img src="{{ asset('img/uniques/1/1.png') }}"><p>layer 1</p><i class="fa fa-trash-o"></i></li>
							<li><img src="{{ asset('img/uniques/1/1.png') }}"><p>layer 1</p><i class="fa fa-trash-o"></i></li>
							<li><img src="{{ asset('img/uniques/1/1.png') }}"><p>layer 1</p><i class="fa fa-trash-o"></i></li>
							<li><img src="{{ asset('img/uniques/1/1.png') }}"><p>layer 1</p><i class="fa fa-trash-o"></i></li>
							<li><img src="{{ asset('img/uniques/1/1.png') }}"><p>layer 1</p><i class="fa fa-trash-o"></i></li>
						</ul>
					</div>
					<a href="#" title="Download" class="download">
						<span class="fa-stack fa-lg">
							<i class="fa fa-circle fa-stack-2x"></i>
							<i class="fa fa-download fa-stack-1x"></i>
						</span>
					</a>
					<a href="#" onclick="ejecutar(event);" title="Share" class="share">
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
					<a href="#" title="Delete" class="delete">
						<div>
							<span class="fa-stack fa-lg">
								<i class="fa fa-circle fa-stack-2x"></i>
								<i class="fa fa-trash fa-stack-1x"></i>
							</span>
						</div>
					</a>
					<canvas width="225" height="260">
						
					</canvas>
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
@endsection