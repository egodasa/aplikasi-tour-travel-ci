@extends('components.layout_admin')

{{-- 
  Section tambahan:
  head : untuk penambahan kode didalam head
  script : untuk penambahan kode didalam script bagian paling bawah halaman
  sidebar : untuk mengatur menu pada sidebar
   --}}

@section('title', 'Kelola Data Pelanggan')
@section('sidebar_title', 'Kelola Data Pelanggan')
@section('user_image', 'images/img.jpg')
@section('username', 'Mandan')
@section('content_title', 'Kelola Data Pelanggan')

@section('content')
  <a href="{{ site_url('admin/pelanggan/tambah') }}" class="btn btn-primary">Tambah Data</a>
  <div class="table-responsive">
    <div style="overflow:auto; max-height:650px; margin:0px 0 0px 0;">
      <table class="table table-bordered table-stripped">
        <tr>
          <th>No</th>
          <th>Username</th>
          <th>Nama Lengkap</th>
          <th>Nama Panggilan</th>
          <th>Jenis Kelamin</th>
          <th>No Identitas</th>
          <th>Tempat Lahir</th>
          <th>Tanggal Lahir</th>
          <th>Alamat</th>
          <th>Telp Rumah</th>
          <th>Telp Kantor</th>
          <th>NoHP</th>
          <th>Email</th>
          <th>Warga Negara</th>
          <th>Pekerjaan</th>
          <th>Ukuran Baju</th>
          <th>Ahli Waris</th>
          <th>Jenis Kelamin Ahli Waris</th>
          <th>Aksi</th>
        </tr>
        @foreach($data_list as $nomor => $data)
          <tr>
            <td>{{ ($nomor+1) }}</td>
            <td>{{ $data['username'] }}</td>
            <td>{{ $data['nama_lengkap'] }}</td>
            <td>{{ $data['nama_panggilan'] }}</td>
            <td>{{ $data['jenis_kelamin'] }}</td>
            <td>{{ $data['no_identitas'] }}</td>
            <td>{{ $data['nm_kota'] }}</td>
            <td>{{ $data['tgl_lahir'] }}</td>
            <td>{{ $data['alamat'] }} {{ $data['kel'] }} RT{{ $data['rt'] }} RW{{ $data['rw'] }} {{ $data['kode_pos'] }}</td>
            <td>{{ $data['tlp_rumah'] }}</td>
            <td>{{ $data['tlp_kantor'] }}</td>
            <td>{{ $data['nohp'] }}</td>
            <td>{{ $data['email'] }}</td>
            <td>{{ $data['warga_negara'] }}</td>
            <td>{{ $data['pekerjaan'] }}</td>
            <td>{{ $data['ukuran_baju'] }}</td>
            <td>{{ $data['nama_ahliwaris'] }} ({{ $data['hubungan_ahliwaris'] }})</td>
            <td>{{ $data['jk_ahliwaris'] }}</td>
            <td>
              <a href="<?=site_url("admin/pelanggan/edit?id_pelanggan=".$data['id_pelanggan'])?>" class="btn btn-success">Edit</a>
              <a href="<?=site_url("admin/pelanggan/hapus?id_pelanggan=".$data['id_pelanggan'])?>" class="btn btn-danger">Hapus</a>
            </td>
          </tr>
        @endforeach
      </table>
    </div>
  </div>
@endsection
