@extends('components.layout_admin')

{{-- 
  Section tambahan:
  head : untuk penambahan kode didalam head
  script : untuk penambahan kode didalam script bagian paling bawah halaman
  sidebar : untuk mengatur menu pada sidebar
   --}}

@section('title', 'Daftar Peserta Keberangkatan')
@section('sidebar_title', 'Daftar Peserta Keberangkatan')
@section('user_image', 'images/img.jpg')
@section('username', 'Mandan')
@section('content_title', 'Daftar Peserta Keberangkatan')

@section('content')
  <a href="{{ site_url('keberangkatan') }}" class="btn btn-success">Kembali</a>
  @if($_SESSION['level'] != "Direktur")
  	@if($detail_keberangkatan['kuota'] > count($data_list))
		  <button class="btn btn-primary" onclick="showModal('#modal-tambah-peserta-keberangkatan')">Tambah Peserta</button>
	  @endif
  @endif
  
  <h4>Detail Keberangkatan</h4>
  <div class="row" style="font-size: 15px;">
    <div class="col-sm-3 col-xs-6"><b>ID Keberangkatan</b></div>
    <div class="col-sm-3 col-xs-6">PK{{ $detail_keberangkatan['id'] }}</div>
    <div class="col-sm-3 col-xs-6"><b>Tanggal Berangkat</b></div>
    <div class="col-sm-3 col-xs-6">{{ TanggalIndo($detail_keberangkatan['tgl_berangkat']) }}</div>
    
    <div class="col-sm-3 col-xs-6"><b>Program</b></div>
    <div class="col-sm-3 col-xs-6">{{ $detail_keberangkatan['nama_program']." ".$detail_keberangkatan['nm_jenis'] }}</div>
    <div class="col-sm-3 col-xs-6"><b>Nama Maskapai</b></div>
    <div class="col-sm-3 col-xs-6">{{ $detail_keberangkatan['nama_maskapai'] }}</div>
    
    <div class="col-sm-3 col-xs-6"><b>Status Keberangkatan</b></div>
    <div class="col-sm-3 col-xs-6">{{ $detail_keberangkatan['status'] }}</div>
    <div class="col-sm-3 col-xs-6"><b>Keterangan</b></div>
    <div class="col-sm-3 col-xs-6">{{ $detail_keberangkatan['keterangan'] }} &nbsp;</div>
    
    <div class="col-sm-3 col-xs-6"><b>Total Peserta</b></div>
    <div class="col-sm-3 col-xs-6">{{ count($data_list) }} Orang</div>
    <div class="col-sm-3 col-xs-6"><b>Kuota</b></div>
    <div class="col-sm-3 col-xs-6">{{ $detail_keberangkatan['kuota'] }} Orang</div>
    
    
  </div>
  
  <h4>Daftar Peserta</h4>
  <table class="table table-bordered table-stripped">
  	<thead>
    <tr>
      <th>No</th>
      <th>ID Transaksi</th>
      <th>Nama Peserta</th>
      <th>Tanggal Lahir</th>
      <th>Jenis Kelamin</th>
      <th>Asal</th>
      <th>Ukuran Baju</th>
      @if($_SESSION['level'] == "Admin")
      <th>Aksi</th>
      @endif
    </tr>
    </thead>
    <tbody>
    @foreach($data_list as $nomor => $data)
      <tr>
        <td>{{ ($nomor+1) }}</td>
        <td>T{{ $data['id_transaksi'] }}</td>
        <td>{{ $data['nama_lengkap'] }}</td>
        <td>{{ TanggalIndo($data['tgl_lahir']) }}</td>
        <td>{{ $data['jenis_kelamin'] }}</td>
        <td>{{ $data['nm_kota'] }}</td>
        <td>{{ $data['ukuran_baju'] }}</td>
        @if($_SESSION['level'] == "Admin")
        <td>
        	@if($_SESSION['level'] != "Direktur")
        		<a href="{{ site_url('peserta-keberangkatan/hapus/?id='.$data['id'].'&id_keberangkatan='.$data['id_keberangkatan']) }}" class="btn btn-danger">Hapus Peserta</a>
        	@endif
        </td>
        @endif
      </tr>
    @endforeach
    </tbody>
  </table>
  @include('modal-tambah-peserta-keberangkatan')
@endsection
