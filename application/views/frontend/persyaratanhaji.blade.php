@extends('frontend.layout')
@section('judul', 'Persyaratan Haji')

@section('content')	
            <!-- Start top-section Area -->
            <section class="top-section-area section-gap">
                <div class="container">
                    <div class="row justify-content-between align-items-center d-flex">
                        <div class="col-lg-8 top-left">
                            <h1 class="text-white mb-20">Persyaratan Haji</h1>
                            <ul>
                                <li><a href="index.html">Home</a><span class="lnr lnr-arrow-right"></span></li>
								 <li><a>Haji</a><span class="lnr lnr-arrow-right"></span></li>
                                <li><a href="persyaratanumroh.html">Persyaratan Haji</a></li>
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
                                        Persyaratan Haji
                                    </h2>
                                   
                                </div>
                            </div>
                            <div class="single-post-content">
								<h3 class="about-title mb-30">Syarat Pengurusan Paspor</h3>
								<ul>
									<li>Lembaran Registrasi</li>
									<li>KTP Asli</li>
									<li>KK Asli</li>
									<li>Akta Kelahiran/Ijajah/Buku Nikah </li>
									<li>Surat Rekomendasi dan legalitas Biro</li>
									<li>Paspor Lama "jika prosedur memperpanjang paspor"</li>
									<li>Biaya Rp 355.000</li>
									<p>catt : Paling lambat 4 bulan sebelum jadwal keberangkatan</p>
								</ul>
								<br/>
								<h3 class="about-title mb-30">Syarat Pengurusan VFS Tasheel</h3>
								<ul>
									<li>Lembaran Janji Temu</li>
									<li>Paspor Asli</li>
									<li>KTP Asli</li>
									<li>Biaya Rp 120.000</li>
									<p>catt : Berlaku 6 bulan setelah terbit</p>
								</ul>
								<br/>
								
								<h3 class="about-title mb-30">Syarat Suntik Meningitis</h3>
								<ul>
									<li>Lembaran Janji Temu</li>
									<li>FC Paspor</li>
									<li>FC KTP</li>
									<li>Pas Photo 4x6 = 1 lembar</li>
									<li>Biaya Rp 305.000</li>
									<p>catt : Paling lambat 1.5 bulan sebelum jadwal keberangkatan</p>
								</ul>
								<br/>
								
								<h3 class="about-title mb-30">Syarat Pengurusan Visa</h3>
								<ul>
									<li>Paspor</li>
									<li>Buku Kuning</li>
									<li>FC KTP</li>
									<li>FC KK</li>
									<li>Pas Photo Umroh :</li>
									<li>3x4 = 6 lbr</li>
									<li>4x6 = 6 lbr</li>
									<li>Fokus wajah 80%</li>
									<li>Background putih</li>
									<li> FC Buku Nikah "bagi pasutri"</li>
									<li> FC Akta Kelahiran "bagi wanita <45 th atau pria <17th"</li>
									<li> Buku Kuning "Vaksin Meningitis"</li>
									<li> Lembaran rekam biometrik VFS Tasheel</li>
								</ul>
								<br/>
                               
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
