@extends('components.layout_admin')

{{-- 
  Section tambahan:
  head : untuk penambahan kode didalam head
  script : untuk penambahan kode didalam script bagian paling bawah halaman
  sidebar : untuk mengatur menu pada sidebar
   --}}

@section('title', 'Beranda')
@section('sidebar_title', 'Beranda')
@section('user_image', 'images/img.jpg')
@section('username', 'Mandan')
@section('content_title', '')

@section('content')
<h2>Paket Umroh 12 dan 9 Hari</h2><br/>
  <h3>Fasilitas :</h3><br/>
  <h4><img  src="{{ base_url() }}gambar/hotelmakkah.jpg" width="100"> &nbsp Hotel Makkah : Villa Hilton (Hilton Tower)<br/>
	  <br/><img  src="{{ base_url() }}gambar/hotelmadinah.jpg" width="100"> &nbsp Hotel Madinah : Al Shourfah Jadeed/ Al Majeedi <br/>
	  <br/><img  src="{{ base_url() }}gambar/maskapai.jpg" width="100"> &nbsp Maskapai : Maskapai SV/MH transit KL
	</h4><br/>
  	<h3>Perlengakapan : </h3><br/>
  <h4>1. Bag Travel 22 inc<br/>  
	  2. Ransel Trolley<br/>   	 
	  3. Tas Dokumen<br/>  		
	  4. Dasar Seragam<br/>
	  5. Buku Panduan<br/>
	  6. ID Card<br/>
	  7. Syal<br/>
	  8. Kain Ihram/Mukena<br/>
	  
	</h4> 
@endsection
