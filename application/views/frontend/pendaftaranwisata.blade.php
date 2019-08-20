@extends('frontend.layout')
@section('judul', 'Pendaftaran Wisata Muslim')

@section('content')	

            <!-- Start top-section Area -->
            <section class="top-section-area section-gap">
                <div class="container">
                    <div class="row justify-content-between align-items-center d-flex">
                        <div class="col-lg-8 top-left">
                            <h1 class="text-white mb-20">Pendaftaran Wisata Muslim</h1>
                            <ul>
                                <li><a href="index.html">Home</a><span class="lnr lnr-arrow-right"></span></li>
								 <li><a>Wisata Muslim</a><span class="lnr lnr-arrow-right"></span></li>
                                <li><a href="pendaftaranwisata.html">Pendaftaran Wisata Muslim</a></li>
                            </ul>
                        </div>
                    </div>
                </div>  
            </section>
            <!-- End top-section Area -->

    
    <!-- Start post Area -->
    <div class="post-wrapper pt-100">
        <!-- Start post Area -->
        <section class="post-area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="single-page-post">
                            <img class="img-fluid" src="{{ base_url() }}assets/frontend/img/gambarb.jpg" alt="">
                            <div class="top-wrapper ">
                                <div class="row d-flex justify-content-between">
                                    <h2 class="col-lg-8 col-md-12 text-uppercase">
                                        Pendaftaran Wisata Muslim
                                    </h2>
                                   
                                </div>
                            </div>
                            <div class="single-post-content">
								<h3 class="about-title mb-30">Harga Paket Wisata Muslim</h3>
								<ul>
									<li>SIN KUL 4D3N = Rp. 4.500.000</li>
									<li>SIN BKK 4D3N = Rp. 6.500.000</li>
									<li>SIN KUL HATYAI 6D5N = Rp. 6.500.000</li>
									<li>KOREA 6D5N = Rp. 12.000.000</li>
								</ul>
								<br/>
								<h3 class="about-title mb-30">Syarat Pendaftaran Wisata Muslim</h3>
								<ul>
									<li>FC KTP</li>
									<li>FC KK</li>
									<li>FC Akta Kelahiran/Buku Nikah/Ijazah "Jika belum punya paspor"</li>
									<li>FC paspor "jika sudah ada"</li>
								</ul>
                               
                            </div>
                          

                            
                        </div>
                    </div>
                    <div class="col-lg-4 sidebar-area ">

                        <div class="single_widget about_widget">
                            <img src="{{ base_url() }}assets/frontend/img/asset/gambari.jpg" alt="">
                            <h2 class="text-uppercase">Aisyah Tour and Travel</h2>
                            <p>
                                Jalan Veteran No.187A Kel. Kubu Gulai Bancah Mandiangin Koto Selayan Kota Bukittinggi Sumatera Barat 26136 Indonesia
                            </p>
                        </div>
                        <div class="single_widget cat_widget">
                            <h4 class="text-uppercase pb-20">Jam Buka</h4>
                            <ul>
                                <li>
                                    <a>Senin: <span>08.00–16.00</span></a>
                                </li>
                                <li>
                                    <a>Selasa: <span>08.00–16.00</span></a>
                                </li>
                                <li>
                                    <a>Rabu: <span>08.00–16.00</span></a>
                                </li>
                                <li>
                                    <a>Kamis: <span>08.00–16.00</span></a>
                                </li>
                                <li>
                                    <a>Jumat: <span>08.00–16.00</span></a>
                                </li>
                                <li>
                                    <a>Sabtu: <span>08.00–16.00</span></a>
                                </li>
                                <li>
                                    <a>Minggu: <span>08.00–16.00</span></a>
                                </li>                                
                            </ul>
                        </div>

                        <div class="single_widget tag_widget">
                            <h4 class="text-uppercase pb-20">Kontak</h4>
                            <p> 0813-1938-9030</p>
                        </div>                                                 
                    </div>
                </div>
            </div>    
        </section>
        <!-- End post Area -->  
    </div>
    <!-- End post Area -->
    
@endsection
