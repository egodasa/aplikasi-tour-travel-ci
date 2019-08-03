@extends('components.layout_admin')

{{-- 
  Section tambahan:
  head : untuk penambahan kode didalam head
  script : untuk penambahan kode didalam script bagian paling bawah halaman
  sidebar : untuk mengatur menu pada sidebar
   --}}

@section('title', 'Kelola Data Pengguna')
@section('sidebar_title', 'Kelola Data Pengguna')
@section('user_image', 'images/img.jpg')
@section('username', 'Mandan')
@section('content_title', 'Kelola Data Pengguna')

@section('content')
  <a href="{{ site_url('admin/pengguna/tambah') }}" class="btn btn-primary">Tambah Data</a>
  <table class="table table-bordered table-stripped">
    <tr>
      <th>No</th>
      <th>Username</th>
      <th>Email</th>
      <th>NOHP</th>
      <th>Level</th>
      <th>Aksi</th>
    </tr>
    @foreach($data_list as $nomor => $data)
      <tr>
        <td>{{ ($nomor+1) }}</td>
        <td>{{ $data['username'] }}</td>
        <td>{{ $data['email'] }}</td>
        <td>{{ $data['nohp'] }}</td>
        <td>{{ $data['level'] }}</td>
        <td>
          <a href="<?=site_url("admin/pengguna/edit?id_pengguna=".$data['id_pengguna'])?>" class="btn btn-success">Edit</a>
          <a href="<?=site_url("admin/pengguna/hapus?id_pengguna=".$data['id_pengguna'])?>" class="btn btn-danger">Hapus</a>
        </td>
      </tr>
    @endforeach
  </table>
@endsection
