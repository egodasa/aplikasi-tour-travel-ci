	<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="{{ base_url() }}assets/frontend/img/fav.png">
		<!-- Author Meta -->
		<meta name="author" content="colorlib">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>@yield('judul')</title>

		<link href="https://fonts.googleapis.com/{{ base_url() }}assets/frontend/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="{{ base_url() }}assets/frontend/css/linearicons.css">
			<link rel="stylesheet" href="{{ base_url() }}assets/frontend/css/font-awesome.min.css">
			<link rel="stylesheet" href="{{ base_url() }}assets/frontend/css/bootstrap.css">
			<link rel="stylesheet" href="{{ base_url() }}assets/frontend/css/owl.carousel.css">
			<link rel="stylesheet" href="{{ base_url() }}assets/frontend/css/main.css">
		</head>
		<body>

			<!-- Start Header Area -->
			<header class="default-header">
				<nav class="navbar navbar-expand-lg navbar-light">
					<div class="container">
						  <a class="navbar-brand" href="index.html">
						  	<img src="{{ base_url() }}assets/images/logo-small.png" height="40" alt="">
						  </a>
						  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						    <span class="navbar-toggler-icon"></span>
						  </button>

						  <div class="collapse navbar-collapse justify-content-end align-items-center" id="navbarSupportedContent">
						    <ul class="navbar-nav">
								<li><a href="{{ site_url('/') }}">Home</a></li>
								<!-- Dropdown -->
								<li class="dropdown">
							      <a class="dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
							        Haji							      </a>
							      <div class="dropdown-menu">
							        <a class="dropdown-item" href="{{ site_url('cara-haji') }}">Tata Cara Haji</a>
							        <a class="dropdown-item" href="{{ site_url('persyaratan-haji') }}">Persyaratan Haji</a>
							        <a class="dropdown-item" href="{{ site_url('pendaftaran-haji') }}">Pendaftaran Haji</a>
							      </div>
							    </li>		
								<li class="dropdown">
							      <a class="dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
							        Umroh							      </a>
							      <div class="dropdown-menu">
							        <a class="dropdown-item" href="{{ site_url('cara-umroh') }}">Tata Cara Umroh</a>
							        <a class="dropdown-item" href="{{ site_url('persyaratan-umroh') }}">Persyaratan Umroh</a>
							        <a class="dropdown-item" href="{{ site_url('pendaftaran-umroh') }}">Pendaftaran Umroh</a>
							      </div>
							    </li>
								<li class="dropdown">
							      <a class="dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
							        Wisata Muslim							      </a>
							      <div class="dropdown-menu">
							        <a class="dropdown-item" href="{{ site_url('info-wisata') }}">Info Wisata Muslim</a>
							        <a class="dropdown-item" href="{{ site_url('persyaratan-wisata') }}">Persyaratan Wisata Muslim</a>
							        <a class="dropdown-item" href="{{ site_url('pendaftaran-wisata') }}">Pendaftaran Wisata Muslim</a>
							      </div>
							    </li>
                @if(isset($_SESSION['username']))
                  <li><a href="{{ site_url('logout') }}">Logout</a></li>
                @else
                  <li><a href="{{ site_url('login') }}">Login</a></li>
                  <li><a href="{{ site_url('register') }}">Register</a></li>
                @endif
								
															
						    </ul>
						  </div>						
					</div>
				</nav>
			</header>
			<!-- End Header Area -->
      
      @yield('content')

			<script src="{{ base_url() }}assets/frontend/js/vendor/jquery-2.2.4.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
			<script src="{{ base_url() }}assets/frontend/js/vendor/bootstrap.min.js"></script>
			<script src="{{ base_url() }}assets/frontend/js/jquery.ajaxchimp.min.js"></script>
			<script src="{{ base_url() }}assets/frontend/js/parallax.min.js"></script>			
			<script src="{{ base_url() }}assets/frontend/js/owl.carousel.min.js"></script>		
			<script src="{{ base_url() }}assets/frontend/js/jquery.magnific-popup.min.js"></script>				
			<script src="{{ base_url() }}assets/frontend/js/jquery.sticky.js"></script>
			<script src="{{ base_url() }}assets/frontend/js/main.js"></script>	
		</body>
	</html>
