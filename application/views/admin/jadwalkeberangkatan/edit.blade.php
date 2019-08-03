@extends('components.layout_admin')

{{-- 
  Section tambahan:
  head : untuk penambahan kode didalam head
  script : untuk penambahan kode didalam script bagian paling bawah halaman
  sidebar : untuk mengatur menu pada sidebar
   --}}

@section('title', 'Ubah Data Jadwal keberangkatan')
@section('sidebar_title', 'Ubah Data Jadwal Keberangkatan')
@section('user_image', 'images/img.jpg')
@section('username', 'Mandan')
@section('content_title', 'Ubah Data Jadwal Keberangkatan')

@section('content')
    
	<form method="POST" >
	  @include('components.form.input', ['_data' => ['type' => 'hidden', 'name' => 'id_jadwal', 'value' => $detail['id_jadwal']]])
	  @include('components.form.input', ['_data' => ['type' => 'date', 'name' => 'tgl_berangkat', 'class' => 'form-control', 'max' => 10, 'label' => 'Tanggal berangkat', 'value' => $detail['tgl_berangkat']]])
    @include('components.form.input', ['_data' => ['type' => 'text', 'name' => 'nama_maskapai', 'class' => 'form-control', 'max' => 50, 'label' => 'Nama Maskapai', 'value' => $detail['nama_maskapai']]])
    <div class="form-group">
      <label>Program</label>
      <select name="id_jenis" class="form-control">
        <?php foreach($data_program as $no => $d): ?>
          <option value="<?=$d['id_jenis']?>"><?=$d['nama_program']." ".$d['nm_jenis']?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <script>
      document.getElementsByName("id_jenis")[0].value = "{{ $detail['id_jenis'] }}";
    </script>
    @include('components.form.input', ['_data' => ['type' => 'text', 'name' => 'status', 'class' => 'form-control', 'max' => 20, 'label' => 'Status', 'value' => $detail['status']]])
    
    @include('components.form.button', ['_data' => ['type' => 'submit', 'text' => 'Simpan', 'class' => 'btn btn-primary']])
    @include('components.form.button', ['_data' => ['type' => 'reset', 'text' => 'Batal', 'class' => 'btn btn-danger']])
  </form>
@endsection
