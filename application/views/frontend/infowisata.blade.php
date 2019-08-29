@extends('frontend.layout')
@section('judul', 'Info Wisata Muslim')

@section('content')			

            <!-- Start top-section Area -->
            <section class="top-section-area section-gap">
                <div class="container">
                    <div class="row justify-content-between align-items-center d-flex">
                        <div class="col-lg-8 top-left">
                            <h1 class="text-white mb-20">Info Wisata Muslim</h1>
                            <ul>
                                <li><a href="index.html">Home</a><span class="lnr lnr-arrow-right"></span></li>
								 <li><a>Wisata Muslim</a><span class="lnr lnr-arrow-right"></span></li>
                                <li><a href="caraumroh.html">Info Wisata Muslim</a></li>
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
                            <img class="img-fluid" src="{{ base_url() }}assets/frontend/img/gambard.jpg" alt="">
                            <div class="top-wrapper ">
                                <div class="row d-flex justify-content-between">
                                    <h2 class="col-lg-8 col-md-12 text-uppercase">
                                        Tata Cara Umroh
                                    </h2>
                                   
                                </div>
                            </div>
                            <div class="single-post-content">
								<h3 class="about-title mb-30">Rukun Umroh</h3>
								<p> 1. Ihrom <br/>
									2. Thowaf<br/>
									3. Sa’i<br/>
									4. Bercukur<br/>
									5. Tertib<br/>
								 </p>
								<br/>
								<h3 class="about-title mb-30">Wajib Umroh</h3>
								<p> 1. Ihrom dari miqot<br/>
									2. Menghindari muharromat<br/>
								 </p>
                               
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
