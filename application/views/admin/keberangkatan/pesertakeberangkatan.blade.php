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
  <a href="{{ site_url('admin/jadwalkeberangkatan') }}" class="btn btn-primary">Kembali</a>
  <h4>Detail Jadwal</h4>
  <div class="row" style="font-size: 15px;">
    <div class="col-sm-3 col-xs-6"><b>ID Jadwal</b></div>
    <div class="col-sm-3 col-xs-6">{{ $detail_jadwal['id_jadwal'] }}</div>
    <div class="col-sm-3 col-xs-6"><b>Tanggal Berangkat</b></div>
    <div class="col-sm-3 col-xs-6">{{ TanggalIndo($detail_jadwal['tgl_berangkat']) }}</div>
    
    <div class="col-sm-3 col-xs-6"><b>Program</b></div>
    <div class="col-sm-3 col-xs-6">{{ $detail_jadwal['nama_program']." ".$detail_jadwal['nm_jenis'] }}</div>
    <div class="col-sm-3 col-xs-6"><b>Nama Maskapai</b></div>
    <div class="col-sm-3 col-xs-6">{{ $detail_jadwal['nama_maskapai'] }}</div>
    
    <div class="col-sm-3 col-xs-6"><b>Status Jadwal</b></div>
    <div class="col-sm-3 col-xs-6">{{ $detail_jadwal['status'] }}</div>
    <div class="col-sm-3 col-xs-6"><b>Keterangan</b></div>
    <div class="col-sm-3 col-xs-6">{{ $detail_jadwal['keterangan'] }}</div>
    
    
  </div>
  
  <h4>Daftar Peserta</h4>
  <table class="table table-bordered table-stripped">
    <tr>
      <th>No</th>
      <th>ID Keberangkatan</th>
      <th>No Registrasi</th>
      <th>Nama Peserta</th>
      <th>JK</th>
      <th>Tempat Lahir</th>
      <th>Status Peserta</th>
      <th>Aksi</th>
    </tr>
    @foreach($data_list as $nomor => $data)
      <tr>
        <td>{{ ($nomor+1) }}</td>
        <td>{{ $data['id_keberangkatan'] }}</td>
        <td>{{ $data['no_registrasi'] }}</td>
        <td>{{ $data['jenis_kelamin'] }}</td>
        <td>{{ $data['tempat_lahir'] }}</td>
        <td>{{ $data['status'] }}</td>
        <td>
          <a href="{{ site_url('admin/jadwalkeberangkatan/peserta/hapus?id_jadwal='.$data['id_jadwal'].'&id_keberangkatan='.$data['id_keberangkatan']) }}">Hapus</a>
        </td>
      </tr>
    @endforeach
  </table>
@endsection
