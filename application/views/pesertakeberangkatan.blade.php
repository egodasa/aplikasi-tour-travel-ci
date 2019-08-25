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
  <button class="btn btn-primary" onclick="showModal('#modal-tambah-peserta-keberangkatan')">Tambah Peserta</button>
  <h4>Detail Keberangkatan</h4>
  <div class="row" style="font-size: 15px;">
    <div class="col-sm-3 col-xs-6"><b>ID Keberangkatan</b></div>
    <div class="col-sm-3 col-xs-6">{{ $detail_keberangkatan['id'] }}</div>
    <div class="col-sm-3 col-xs-6"><b>Tanggal Berangkat</b></div>
    <div class="col-sm-3 col-xs-6">{{ TanggalIndo($detail_keberangkatan['tgl_berangkat']) }}</div>
    
    <div class="col-sm-3 col-xs-6"><b>Program</b></div>
    <div class="col-sm-3 col-xs-6">{{ $detail_keberangkatan['nama_program']." ".$detail_keberangkatan['nm_jenis'] }}</div>
    <div class="col-sm-3 col-xs-6"><b>Nama Maskapai</b></div>
    <div class="col-sm-3 col-xs-6">{{ $detail_keberangkatan['nama_maskapai'] }}</div>
    
    <div class="col-sm-3 col-xs-6"><b>Status Keberangkatan</b></div>
    <div class="col-sm-3 col-xs-6">{{ $detail_keberangkatan['status'] }}</div>
    <div class="col-sm-3 col-xs-6"><b>Keterangan</b></div>
    <div class="col-sm-3 col-xs-6">{{ $detail_keberangkatan['keterangan'] }}</div>
    
    
  </div>
  
  <h4>Daftar Peserta</h4>
  <table class="table table-bordered table-stripped">
    <tr>
      <th>No</th>
      <th>ID Keberangkatan</th>
      <th>ID Transaksi</th>
      <th>Nama Peserta</th>
      <th>Tanggal Lahir</th>
      <th>Jenis Kelamin</th>
      <th>Asal</th>
      <th>Ukuran Baju</th>
      <th>Aksi</th>
    </tr>
    @foreach($data_list as $nomor => $data)
      <tr>
        <td>{{ ($nomor+1) }}</td>
        <td>{{ $data['id_keberangkatan'] }}</td>
        <td>{{ $data['id_transaksi'] }}</td>
        <td>{{ $data['nama_lengkap'] }}</td>
        <td>{{ TanggalIndo($data['tgl_lahir']) }}</td>
        <td>{{ $data['jenis_kelamin'] }}</td>
        <td>{{ $data['nm_kota'] }}</td>
        <td>{{ $data['ukuran_baju'] }}</td>
        <td>
          <a href="{{ site_url('peserta-keberangkatan/hapus/?id='.$data['id'].'&id_keberangkatan='.$data['id_keberangkatan']) }}" class="btn btn-danger">Hapus Peserta</a>
        </td>
      </tr>
    @endforeach
  </table>
  @include('modal-tambah-peserta-keberangkatan')
@endsection
