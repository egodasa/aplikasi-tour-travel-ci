@extends('components.layout_admin')

{{-- 
  Section tambahan:
  head : untuk penambahan kode didalam head
  script : untuk penambahan kode didalam script bagian paling bawah halaman
  sidebar : untuk mengatur menu pada sidebar
   --}}

@section('title', 'Angsuran Transaksi')
@section('sidebar_title', 'Angsuran Transaksi')
@section('user_image', 'images/img.jpg')
@section('username', 'Mandan')
@section('content_title', 'Angsuran Transaksi')

@section('content')
  <a href="{{ site_url('admin/transaksi') }}" class="btn btn-success">Kembali</a>
  <?php
    if($_GET['sisa_pembayaran'] != 0)
    {
  ?>
    <a href="{{ site_url('admin/angsuran/tambah') }}?no_registrasi=<?=$_GET['no_registrasi']?>" class="btn btn-primary">Angsuran Baru</a>
  <?php
    }
  ?>
  <h4>Angsuran Transaksi dengan Nomor Registrasi <?=$_GET['no_registrasi']?></h4>
  <table class="table table-bordered table-stripped">
    <tr>
      <th>No</th>
      <th>ID Angsuran</th>
      <th>Tanggal Bayar</th>
      <th>Jumlah Bayar</th>
      <th>Status Pembayaran</th>
      <th>Jenis Pembayaran</th>
      <th>Keterangan</th>
      <th>Aksi</th>
    </tr>
    @foreach($data_list as $nomor => $data)
      <tr>
        <td>{{ ($nomor+1) }}</td>
        <td>{{ $data['id_angsuran'] }}</td>
        <td>{{ $data['tgl_bayar'] }}</td>
        <td>{{ rupiah($data['juml_bayar']) }}</td>
        <td>{{ $data['status_pembayaran'] }}</td>
        <td>{{ $data['jenis_pembayaran'] }}</td>
        <td>{{ $data['keterangan'] }}</td>
        <td>
          <a href="<?=site_url("admin/angsuran/hapus?id_angsuran=".$data['id_angsuran'])?>" class="btn btn-danger">Hapus</a>
        </td>
      </tr>
    @endforeach
  </table>
@endsection
