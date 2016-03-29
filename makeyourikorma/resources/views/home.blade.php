@extends('main')

@section('title', 'Ikorma')

@section('head')
	<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection

@section('meta:vp')
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
@endsection

@section('start-body')
	<img class="fondo2" src="{{ asset('img/home/fondo2.png') }}">
@endsection

@section('logo')
	<img class="img-responsive" src="{{ asset('img/home/logo2.png') }}">
@endsection

@section('body')
	
	<footer>
	<img class="img-footer" src="{{ asset('img/home/footer.png') }}" alt="footer">
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
