@extends('components.layout_admin')

{{-- 
  Section tambahan:
  head : untuk penambahan kode didalam head
  script : untuk penambahan kode didalam script bagian paling bawah halaman
  sidebar : untuk mengatur menu pada sidebar
   --}}

@section('title', 'Tambah Data Jadwal Keberangkatan')
@section('sidebar_title', 'Tambah Data Jadwal Keberangkatan')
@section('user_image', 'images/img.jpg')
@section('username', 'Mandan')
@section('content_title', 'Tambah Data Jadwal Keberangkatan')

@section('content')
    
	<form method="POST" >
	
    @include('components.form.input', ['_data' => ['type' => 'date', 'name' => 'tgl_berangkat', 'class' => 'form-control', 'max' => 10, 'label' => 'Tanggal berangkat']])
    @include('components.form.input', ['_data' => ['type' => 'text', 'name' => 'nama_maskapai', 'class' => 'form-control', 'max' => 50, 'label' => 'Nama Maskapai']])
    <div class="form-group">
      <label>Program</label>
      <select name="id_jenis" class="form-control">
        <?php foreach($data_program as $no => $d): ?>
          <option value="<?=$d['id_jenis']?>"><?=$d['nama_program']." ".$d['nm_jenis']?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="form-group">
      <label>Status</label>
      <select name="status" class="form-control">
        <option value="Belum Berangkat">Belum Berangkat</option>
        <option value="Dalam Perjalanan Pergi">Dalam Perjalanan Pergi</option>
        <option value="Sudah Sampai Tujuan">Sudah Sampai Tujuan</option>
        <option value="Dalam Perjalanan Pulang">Dalam Perjalanan Pulang</option>
        <option value="Sudah Kembali">Sudah Kembali</option>
        <option value="Dibatalkan">Dibatalkan</option>
      </select>
    </div>
    @include('components.form.textarea', ['_data' => ['name' => 'keterangan', 'class' => 'form-control', 'label' => 'Keterangan']])
	
	
    @include('components.form.button', ['_data' => ['type' => 'submit', 'text' => 'Simpan', 'class' => 'btn btn-primary']])
    @include('components.form.button', ['_data' => ['type' => 'reset', 'text' => 'Batal', 'class' => 'btn btn-danger']])
		</form>
@endsection
