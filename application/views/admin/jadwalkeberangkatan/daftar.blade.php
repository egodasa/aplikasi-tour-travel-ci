@extends('components.layout_admin')

{{-- 
  Section tambahan:
  head : untuk penambahan kode didalam head
  script : untuk penambahan kode didalam script bagian paling bawah halaman
  sidebar : untuk mengatur menu pada sidebar
   --}}

@section('title', 'Kelola Data Jadwal Keberangkatan')
@section('sidebar_title', 'Kelola Data Jadwal Keberangkatan')
@section('user_image', 'images/img.jpg')
@section('username', 'Mandan')
@section('content_title', 'Kelola Data Jadwal Keberangkatan')

@section('content')
  <a href="{{ site_url('admin/jadwalkeberangkatan/tambah') }}" class="btn btn-primary">Tambah Data</a>
  <table class="table table-bordered table-stripped">
    <tr>
      <th>No</th>
      <th>Tanggal Berangkat</th>
      <th>Maskapai</th>
      <th>Nama Program</th>
      <th>Status</th>
      <th>Aksi</th>
    </tr>
    @foreach($data_list as $nomor => $data)
      <tr>
        <td>{{ ($nomor+1) }}</td>
        <td>{{ $data['tgl_berangkat'] }}</td>
        <td>{{ $data['nama_maskapai'] }}</td>
        <td>{{ $data['nama_program'] }} {{ $data['nm_jenis'] }}</td>
        <td>{{ $data['status'] }}</td>
        <td>
          <a href="<?=site_url("admin/jadwalkeberangkatan/edit?id_jadwal=".$data['id_jadwal'])?>" class="btn btn-success">Edit</a>
          <a href="<?=site_url("admin/jadwalkeberangkatan/hapus?id_jadwal=".$data['id_jadwal'])?>" class="btn btn-danger">Hapus</a>
        </td>
      </tr>
    @endforeach
  </table>
@endsection
