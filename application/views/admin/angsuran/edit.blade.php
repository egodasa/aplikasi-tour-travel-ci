@extends('components.layout_admin')

{{-- 
  Section tambahan:
  head : untuk penambahan kode didalam head
  script : untuk penambahan kode didalam script bagian paling bawah halaman
  sidebar : untuk mengatur menu pada sidebar
   --}}

@section('title', 'Ubah Data Program')
@section('sidebar_title', 'Ubah Data Program')
@section('user_image', 'images/img.jpg')
@section('username', 'Mandan')
@section('content_title', 'Ubah Data Program')

@section('content')
	<form method="POST">
    @include('components.form.input', ['_data' => ['type' => 'date', 'name' => 'tgl_bayar', 'class' => 'form-control', 'label' => 'Tanggal Bayar', 'value' => $detail['tgl_bayar'], 'readonly' => true]])	
    @include('components.form.input', ['_data' => ['type' => 'number', 'name' => 'juml_bayar', 'class' => 'form-control', 'label' => 'Jumlah Bayar', 'min' => 0, 'value' => $detail['juml_bayar'], 'readonly' => true]])	
    
    <?php
      if($_SESSION['level'] == "Admin")
      {
    ?>
    <div class="form-group">
      <label>Status Pembayaran</label>
      <select class="form-control" name="status_pembayaran">
        <option value="Sedang Diproses">Sedang Diproses</option>
        <option value="Sudah Dibayar">Sudah Dibayar</option>
        <option value="Ditolak">Ditolak</option>
      </select>  
    </div>
    <?php
      }
      else
      {
    ?>
      <input type="hidden" name="status_pembayaran" value="Sedang Diproses">
    <?php
      }
    ?>
    <script>
      document.getElementsByName("status_pembayaran")[0].value = "<?=$detail['']?>";
    </script>
    <div class="form-group">
      <label>Jenis Pembayaran</label>
      <select class="form-control" name="jenis_pembayaran">
        <option value="DP">Pembayaran DP</option>
        <option value="Angsuran">Pembayaran Angsuran</option>
      </select>  
    </div>
    @include('components.form.input', ['_data' => ['type' => 'text', 'name' => 'keterangan', 'class' => 'form-control', 'label' => 'Keterangan']])
    @include('components.form.button', ['_data' => ['type' => 'submit', 'text' => 'Simpan', 'class' => 'btn btn-primary']])
    @include('components.form.button', ['_data' => ['type' => 'reset', 'text' => 'Batal', 'class' => 'btn btn-danger']])
  </form>
@endsection
