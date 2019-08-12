@extends('components.layout_admin')

{{-- 
  Section tambahan:
  head : untuk penambahan kode didalam head
  script : untuk penambahan kode didalam script bagian paling bawah halaman
  sidebar : untuk mengatur menu pada sidebar
   --}}

@section('title', 'Program')
@section('sidebar_title', 'Program')
@section('user_image', 'images/img.jpg')
@section('username', 'Mandan')
@section('content_title', 'Program')

@section('content')
  <a href="{{ site_url('admin/program/tambah') }}" class="btn btn-primary">Tambah Data</a>
  <table class="table table-bordered table-stripped">
    <tr>
      <th>No</th>
      <th>Nama Program</th>
      <th>Aksi</th>
    </tr>
    @foreach($data_list as $nomor => $data)
      <tr>
        <td>{{ ($nomor+1) }}</td>
        <td>{{ $data['nama_program'] }}</td>
        <td>
          <a href="<?=site_url("admin/program/edit?id_program=".$data['id_program'])?>" class="btn btn-success">Edit</a>
          <a href="<?=site_url("admin/program/hapus?id_program=".$data['id_program'])?>" class="btn btn-danger">Hapus</a>
        </td>
      </tr>
    @endforeach
  </table>
@endsection
