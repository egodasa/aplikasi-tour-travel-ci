@extends('components.layout_admin')

{{-- 
  Section tambahan:
  head : untuk penambahan kode didalam head
  script : untuk penambahan kode didalam script bagian paling bawah halaman
  sidebar : untuk mengatur menu pada sidebar
   --}}

@section('title', 'Tambah Data Transaksi')
@section('sidebar_title', 'Tambah Data Transaksi')
@section('user_image', 'images/img.jpg')
@section('username', 'Mandan')
@section('content_title', 'Tambah Data Transaksi')

@section('content')
    
	<form method="POST" >
    <h3>Data Transaksi</h3>
	  @include('components.form.select', ['_data' => [ 'class' => 'form-control', 'name' => 'id_jenis', 'value' => '','val' => 'id_jenis', 'caption' => 'jenis_program', 'label' => 'Nama Program', 'options' => $data_program, 'val' => 'id_jenis', 'caption' => 'nm_program']])
    @include('components.form.input', ['_data' => ['type' => 'number', 'name' => 'dp', 'class' => 'form-control', 'label' => 'Dp']])
	  
    <h3>Data Pelanggan</h3>
    <!-- Bagian Data Pelanggan -->
    <div class="col-sm-6 col-xs-12">
        <input type="hidden" name="id_pengguna" value="<?=$_SESSION['id_pengguna']?>" />
        @include('components.form.input', ['_data' => ['type' => 'text', 'name' => 'nama_lengkap', 'class' => 'form-control', 'max' => 100, 'label' => 'Nama Lengkap']])
        @include('components.form.input', ['_data' => ['type' => 'text', 'name' => 'nama_panggilan', 'class' => 'form-control', 'max' => 50, 'label' => 'Nama Panggilan']])
        <div class="form-group">
          <label>Jenis Kelamin</label>
          <select name="jenis_kelamin" class="form-control">
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
          </select>
        </div>
      
        @include('components.form.input', ['_data' => ['type' => 'text', 'name' => 'no_identitas', 'class' => 'form-control', 'max' => 20, 'label' => 'No Identitas']])
        @include('components.form.select', ['_data' => ['type' => 'text', 'name' => 'tempat_lahir', 'class' => 'form-control', 'label' => 'Tempat Lahir', 'val' => 'id_kota', 'caption' => 'nm_kota', 'options' => $data_kota]])
        @include('components.form.input', ['_data' => ['type' => 'date', 'name' => 'tgl_lahir', 'class' => 'form-control', 'max' => 10, 'label' => 'Tanggal Lahir']])
        @include('components.form.textarea', ['_data' => ['type' => 'text', 'name' => 'alamat', 'class' => 'form-control', 'max' => 225, 'label' => 'Alamat']])
        @include('components.form.input', ['_data' => ['type' => 'text', 'name' => 'kel', 'class' => 'form-control', 'max' => 11, 'label' => 'Kelurahan']])
        <div class="col-xs-4">
          @include('components.form.input', ['_data' => ['type' => 'text', 'name' => 'kode_pos', 'class' => 'form-control', 'max' => 20, 'label' => 'Kode Pos']])
        </div>
        <div class="col-xs-4">
          @include('components.form.input', ['_data' => ['type' => 'text', 'name' => 'rt', 'class' => 'form-control', 'max' => 10, 'label' => 'RT']])
        </div>
        <div class="col-xs-4">
          @include('components.form.input', ['_data' => ['type' => 'text', 'name' => 'rw', 'class' => 'form-control', 'max' => 10, 'label' => 'RW']])
        </div>
      </div>
      <div class="col-sm-6 col-xs-12">
        @include('components.form.input', ['_data' => ['type' => 'text', 'name' => 'tlp_rumah', 'class' => 'form-control', 'max' => 20, 'label' => 'Telepon Rumah']])
        @include('components.form.input', ['_data' => ['type' => 'text', 'name' => 'tlp_kantor', 'class' => 'form-control', 'max' => 20, 'label' => 'Telepon Kantor']])
        @include('components.form.input', ['_data' => ['type' => 'text', 'name' => 'nohp', 'class' => 'form-control', 'max' => 20, 'label' => 'No Hp']])
        @include('components.form.input', ['_data' => ['type' => 'email', 'name' => 'email', 'class' => 'form-control', 'max' => 20, 'label' => 'Email']])
        @include('components.form.input', ['_data' => ['type' => 'text', 'name' => 'warga_negara', 'class' => 'form-control', 'max' => 50, 'label' => 'Warga negara', 'val' => 'value', 'caption' => 'caption', 
          'options' => [
            ['name' => 'WNI', 'value' => 'WNI'],
            ['name' => 'WNA', 'value' => 'WNA'],
          ]
        ]])
        @include('components.form.input', ['_data' => ['type' => 'text', 'name' => 'pekerjaan', 'class' => 'form-control', 'max' => 50, 'label' => 'Pekerjaan']])
        @include('components.form.input', ['_data' => ['type' => 'text', 'name' => 'ukuran_baju', 'class' => 'form-control', 'max' => 20, 'label' => 'Ukuran Baju']])
        @include('components.form.input', ['_data' => ['type' => 'text', 'name' => 'nama_ahliwaris', 'class' => 'form-control', 'max' => 50, 'label' => 'Nama Ahli Waris']])
        @include('components.form.input', ['_data' => ['type' => 'text', 'name' => 'hubungan_ahliwaris', 'class' => 'form-control', 'max' => 50, 'label' => 'Hubungan Ahli Waris']])
        
        <div class="form-group">
          <label>Jenis Kelamin Ahli Waris</label>
          <select name="jk_ahliwaris" class="form-control">
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
          </select>
        </div>
      </div>
	
    @include('components.form.button', ['_data' => ['type' => 'submit', 'text' => 'Simpan', 'class' => 'btn btn-primary']])
    @include('components.form.button', ['_data' => ['type' => 'reset', 'text' => 'Batal', 'class' => 'btn btn-danger']])
		</form>
@endsection
