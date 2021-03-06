<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>@yield('meta-title', config('app.name').' | Blog')</title>
	<meta name="description" content="@yield('meta-description', 'Blog de Zendero')">
	@stack('styles')
	<link rel="stylesheet" href="{{asset('css/normalize.css')}}">
	<link rel="stylesheet" href="{{asset('css/framework.css')}}">
	<link rel="stylesheet" href="{{asset('css/style.css')}}">
	<link rel="stylesheet" href="{{asset('css/responsive.css')}}">
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
	<script src="{{asset('adminlte/plugins/jquery/jquery.slim.min.js')}}"></script>
	<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
	@stack('scripts')
</head>
<body>
	<div class="preload"></div>
	<header class="space-inter">
		<div class="container container-flex space-between">
			<figure class="logo"><img src="{{asset('img/logo.png')}}" alt=""></figure>
			@include('partials.nav')
		</div>
	</header>

	<section class="posts container">
		<!-- CONTENIDO -->
		@yield('content')
	</section>
	
	<!--
	<div class="pagination">
		<ul class="list-unstyled container-flex space-center">
			<li><a href="#" class="pagination-active">1</a></li>
			<li><a href="#">2</a></li>
			<li><a href="#">3</a></li>
		</ul>
	</div>
	 -->
	<section class="footer">
		<footer>
			<div class="container">
				<figure class="logo"><img src="{{asset('img/logo.png')}}" alt=""></figure>
				<nav>
					<ul class="container-flex space-center list-unstyled">
						<li><a href="{{route('pages.home')}}" class="text-uppercase c-white">Inicio</a></li>
						<li><a href="{{route('pages.about')}}" class="text-uppercase c-white">Nosotros</a></li>
						<li><a href="{{route('pages.archive')}}" class="text-uppercase c-white">Archivo</a></li>
						<li><a href="{{route('pages.contact')}}" class="text-uppercase c-white">Contacto</a></li>
					</ul>
				</nav>
				<div class="divider-2"></div>
				<p>Nunc placerat dolor at lectus hendrerit dignissim. Ut tortor sem, consectetur nec hendrerit ut, ullamcorper ac odio. Donec viverra ligula at quam tincidunt imperdiet. Nulla mattis tincidunt auctor.</p>
				<div class="divider-2" style="width: 80%;"></div>
				<p>?? 2017 - Zendero. All Rights Reserved. Designed & Developed by <span class="c-white">Agencia De La Web</span></p>
				<ul class="social-media-footer list-unstyled">
					<li><a href="#" class="fb"></a></li>
					<li><a href="#" class="tw"></a></li>
					<li><a href="#" class="in"></a></li>
					<li><a href="#" class="pn"></a></li>
				</ul>
			</div>
		</footer>
	</section>