@extends('components.layout_admin')

{{-- 
  Section tambahan:
  head : untuk penambahan kode didalam head
  script : untuk penambahan kode didalam script bagian paling bawah halaman
  sidebar : untuk mengatur menu pada sidebar
   --}}

@section('title', 'Transaksi')
@section('sidebar_title', 'Transaksi')
@section('user_image', 'images/img.jpg')
@section('username', 'Mandan')
@section('content_title', 'Transaksi')

@section('content')
  <a href="{{ site_url('admin/transaksi/tambah') }}" class="btn btn-primary">Transaksi Baru</a>
  <table class="table table-bordered table-stripped">
    <tr>
      <th>No</th>
      <th>No Transaksi</th>
      <th>Program</th>
      <th>Nama</th>
      <th>DP</th>
      <th>Sisa Pembayaran</th>
      <th>Status</th>
      <th>Aksi</th>
    </tr>
    @foreach($data_list as $nomor => $data)
      <tr>
        <td>{{ ($nomor+1) }}</td>
        <td>{{ $data['no_registrasi'] }}</td>
        <td>{{ $data['nama_program'] }}</td>
        <td>{{ $data['nama_lengkap'] }}</td>
        <td>{{ rupiah($data['dp']) }}</td>
        <td>{{ rupiah($data['sisa_pembayaran']) }}</td>
        <td>
          <?php
            if($data['sisa_pembayaran'] == 0)
            {
              echo "Sudah Lunas";
            }
            else
            {
              echo "Belum Lunas";
            }
          ?>
        </td>
        <td>
          <a href="<?=site_url("admin/transaksi/edit?no_registrasi=".$data['no_registrasi'])?>" class="btn btn-success">Edit</a>
          <a href="<?=site_url("admin/transaksi/hapus?no_registrasi=".$data['no_registrasi'])?>" class="btn btn-danger">Hapus</a>
          <a href="<?=site_url("admin/angsuran?no_registrasi=".$data['no_registrasi']."&sisa_pembayaran=".$data['sisa_pembayaran'])?>" class="btn btn-primary">Data Angsuran</a>
        </td>
      </tr>
    @endforeach
  </table>
@endsection
