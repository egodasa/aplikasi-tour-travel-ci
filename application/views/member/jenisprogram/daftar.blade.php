@extends('components.layout_admin')

{{-- 
  Section tambahan:
  head : untuk penambahan kode didalam head
  script : untuk penambahan kode didalam script bagian paling bawah halaman
  sidebar : untuk mengatur menu pada sidebar
   --}}

@section('title', 'Jenis Program')
@section('sidebar_title', 'Jenis Program')
@section('user_image', 'images/img.jpg')
@section('username', 'Mandan')
@section('content_title', 'Jenis Program')

@section('content')
  <a href="{{ site_url('admin/jenisprogram/tambah') }}" class="btn btn-primary">Tambah Data</a>
  <table class="table table-bordered table-stripped">
    <tr>
      <th>No</th>
      <th>Nama Jenis Program</th>
      <th>Program</th>
      <th>Harga</th>
      <th>Aksi</th>
    </tr>
    @foreach($data_list as $nomor => $data)
      <tr>
        <td>{{ ($nomor+1) }}</td>
        <td>{{ $data['nm_jenis'] }}</td>
        <td>{{ $data['nama_program'] }}</td>
        <td>{{ rupiah($data['harga']) }}</td>
        <td>
          <a href="<?=site_url("admin/jenisprogram/edit?id_jenis=".$data['id_jenis'])?>" class="btn btn-success">Edit</a>
          <a href="<?=site_url("admin/jenisprogram/hapus?id_jenis=".$data['id_jenis'])?>" class="btn btn-danger">Hapus</a>
        </td>
      </tr>
    @endforeach
  </table>
@endsection
