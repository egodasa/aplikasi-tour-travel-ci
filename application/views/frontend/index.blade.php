@extends('frontend.layout')
@section('judul', 'AISYAH TOUR AND TRAVEL BUKITTINGGI')

@section('content')		

			<!-- start banner Area -->
			<section class="banner-area relative" id="home" data-parallax="scroll" data-image-src="{{ base_url() }}assets/frontend/img/gambar.jpg">
				<div class="overlay-bg overlay"></div>
				<div class="container">
					<div class="row fullscreen">
						<div class="banner-content d-flex align-items-center col-lg-12 col-md-12">
							<h1>
								AISYAH TOUR AND TRAVEL <br>
								BUKITTINGGI								
							</h1>
						</div>	
																	
					</div>
				</div>
			</section>
			<!-- End banner Area -->	


			<!-- Start category Area -->
			<section class="category-area section-gap" id="news">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-70 col-lg-8">
							<div class="title text-center">
								<h1 class="mb-10">Info Dari Aisyah Tour And Travel Bukittinggi</h1>
								<p></p>
							</div>
						</div>
					</div>						
					<div class="active-cat-carusel">
						<div class="item single-cat">
							<img src="{{ base_url() }}assets/frontend/img/gambarh.jpg" alt="">
							<p class="date">28 Jul 2018</p>
							<h4><a href="#">Paket Umrah 12 Hari November 2018</a></h4>
						</div>
						<div class="item single-cat">
							<img src="{{ base_url() }}assets/frontend/img/gambarf.jpg" alt="">
							<p class="date">28 Jul 2018</p>
							<h4><a href="#">Tampak Depan Aisyah Tour And Travel</a></h4>
						</div>
						<div class="item single-cat">
							<img src="{{ base_url() }}assets/frontend/img/gambarg.jpg" alt="">
							<p class="date">28 Jul 2018</p>
							<h4><a href="#">Tampak Dalam Aisyah Tour And Travel</a></h4>
						</div>							
					</div>												
				</div>	
			</section>
			<!-- End category Area -->
			
			
			<!-- Start team Area -->
			<section class="team-area section-gap" id="team">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-70 col-lg-8">
							<div class="title text-center">
								<h1 class="mb-10">Tentang Kami</h1>
								<p></p>
							</div>
						</div>
					</div>						
					<div class="row justify-content-center d-flex align-items-center">
						<div class="col-lg-6 team-left">
							<p>
								Aisyah Tour & Travel berdiri sejak tahun 2016. Aisyah Tour & Travel berlokasi di Jalan Veteran No.187A, Kelurahan Kubu Gulai Bancah, Kecamatan Mandiangin Koto Selayan, kota Bukittinggi. Aisyah Tour & Travel menerima pendaftaran umroh dan haji via kualalumpur dengan Air Asia, via Jakarta dengan Garuda. 
							</p>
							<p>
								Konsumen bisa memilih untuk keberangkatan 9 hari ataupun 17 hari. Harga mampu bersaing dengan usaha sejenis lainnya di Bukittinggi. Info lebih lanjut silahkan hubungi kami atau kunjungi alamat lengkap kami yang tertera di web ini.
							</p>
						</div>
						<div class="col-lg-6 team-right d-flex justify-content-center">
							<div class="row active-team-carusel">
								<div class="single-team">
								    <div class="thumb">
								        <img class="img-fluid" src="{{ base_url() }}assets/frontend/img/gambari.jpg" alt="">
								    </div>
								    <div class="meta-text mt-30 text-center">
									    <h4>Aisyah Tour And Travel</h4>
									    <p></p>									    	
								    </div>
								</div>
							</div>
						</div>
					</div>
				</div>	
			</section>
			<!-- End team Area -->
			
			<!-- start footer Area -->		
			<footer class="footer-area section-gap">
				<div class="container">
					<div class="row">
						<div class="col-lg-3  col-md-12">
							<div class="single-footer-widget">
								<h6>Jam Buka</h6>
								<ul class="footer-nav">
									<li><a>Sen:	08.00–16.00</a></li>
									<li><a>Sel:	08.00–16.00</a></li>
									<li><a>Rab:	08.00–16.00</a></li>
									<li><a>Kam:	08.00–16.00</a></li>
									<li><a>Jum:	08.00–16.00</a></li>
									<li><a>Sab:	08.00–16.00</a></li>
									<li><a>Min:	08.00–16.00</a></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-6  col-md-12">
							<div class="single-footer-widget newsletter">
								<h6>Alamat</h6>
								<p>Jalan Veteran No.187A Kel. Kubu Gulai Bancah Mandiangin Koto Selayan Kota Bukittinggi Sumatera Barat 26136 Indonesia</p>
								
							</div>
						</div>
						<div class="col-lg-3  col-md-12">
							<div class="single-footer-widget newsletter">
								<h6 class="mb-20">Kontak</h6>
								<ul class="instafeed d-flex flex-wrap">
									<p>0813-1938-9030</p>
									
								</ul>
							</div>
						</div>						
					</div>

					<div class="row footer-bottom d-flex justify-content-between">
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						<p class="col-lg-8 col-sm-12 footer-text">Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a></p>
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						<div class="col-lg-4 col-sm-12 footer-social">
							<a href="#"><i class="fa fa-facebook"></i></a>
							<a href="#"><i class="fa fa-twitter"></i></a>
							<a href="#"><i class="fa fa-dribbble"></i></a>
							<a href="#"><i class="fa fa-behance"></i></a>
						</div>
					</div>
				</div>
			</footer>
			<!-- End footer Area -->		

@endsection
