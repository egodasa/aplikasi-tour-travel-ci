@extends('components.layout_admin')

{{-- 
  Section tambahan:
  head : untuk penambahan kode didalam head
  script : untuk penambahan kode didalam script bagian paling bawah halaman
  sidebar : untuk mengatur menu pada sidebar
   --}}

@section('title', 'Ubah Data Transaksi')
@section('sidebar_title', 'Ubah Data Transaksi')
@section('user_image', 'images/img.jpg')
@section('username', 'Mandan')
@section('content_title', 'Ubah Data Transaksi')

@section('content')
    
	<form method="POST">
  <h3>Data Transaksi</h3>
    @include('components.form.input', ['_data' => ['type' => 'hidden', 'name' => 'no_registrasi', 'value' => $detail['no_registrasi']]])
    @include('components.form.select', ['_data' => [ 'readonly' => true, 'class' => 'form-control', 'name' => 'id_jenis', 'value' => $detail['id_jenis'], 'val' => 'id_jenis', 'caption' => 'jenis_program', 'label' => 'Nama Program', 'options' => $data_program, 'val' => 'id_jenis', 'caption' => 'nm_program']])
    @include('components.form.input', ['_data' => ['readonly' => true, 'type' => 'number', 'name' => 'dp', 'class' => 'form-control', 'label' => 'Dp', 'value' => $detail['dp']]])
  
    <h3>Data Pelanggan</h3>
    <!-- Bagian Data Pelanggan -->
    <div class="row">
      <div class="col-sm-6 col-xs-12">
        <input type="hidden" value="<?=$detail['id_pelanggan']?>" name="id_pelanggan">
        @include('components.form.input', ['_data' => ['type' => 'text', 'name' => 'nama_lengkap', 'class' => 'form-control', 'max' => 100, 'label' => 'Nama Lengkap', 'value' => $detail['nama_lengkap']]])
        @include('components.form.input', ['_data' => ['type' => 'text', 'name' => 'nama_panggilan', 'class' => 'form-control', 'max' => 50, 'label' => 'Nama Panggilan', 'value' => $detail['nama_panggilan']]])
        <div class="form-group">
          <label>Jenis Kelamin</label>
          <select name="jenis_kelamin" class="form-control">
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
          </select>
        </div>
        <script>
          document.getElementsByName("jenis_kelamin")[0].value = "{{ $detail['jenis_kelamin'] }}";
        </script>
      
        @include('components.form.input', ['_data' => ['type' => 'text', 'name' => 'no_identitas', 'class' => 'form-control', 'max' => 20, 'label' => 'No Identitas', 'value' => $detail['no_identitas']]])
        @include('components.form.select', ['_data' => ['type' => 'text', 'name' => 'tempat_lahir', 'class' => 'form-control', 'label' => 'Tempat Lahir', 'val' => 'id_kota', 'caption' => 'nm_kota', 'options' => $data_kota, 'value' => $detail['tempat_lahir']]])
        @include('components.form.input', ['_data' => ['type' => 'date', 'name' => 'tgl_lahir', 'class' => 'form-control', 'max' => 10, 'label' => 'Tanggal Lahir', 'value' => $detail['tgl_lahir']]])
        @include('components.form.textarea', ['_data' => ['type' => 'text', 'name' => 'alamat', 'class' => 'form-control', 'max' => 225, 'label' => 'Alamat', 'value' => $detail['alamat']]])
        @include('components.form.input', ['_data' => ['type' => 'text', 'name' => 'kel', 'class' => 'form-control', 'max' => 11, 'label' => 'Kelurahan', 'value' => $detail['kel']]])
        <div class="col-xs-4">
          @include('components.form.input', ['_data' => ['type' => 'text', 'name' => 'kode_pos', 'class' => 'form-control', 'max' => 20, 'label' => 'Kode Pos', 'value' => $detail['kode_pos']]])
        </div>
        <div class="col-xs-4">
          @include('components.form.input', ['_data' => ['type' => 'text', 'name' => 'rt', 'class' => 'form-control', 'max' => 10, 'label' => 'RT', 'value' => $detail['rt']]])
        </div>
        <div class="col-xs-4">
          @include('components.form.input', ['_data' => ['type' => 'text', 'name' => 'rw', 'class' => 'form-control', 'max' => 10, 'label' => 'RW', 'value' => $detail['rw']]])
        </div>
      </div>
      <div class="col-sm-6 col-xs-12">
        @include('components.form.input', ['_data' => ['type' => 'text', 'name' => 'tlp_rumah', 'class' => 'form-control', 'max' => 20, 'label' => 'Telepon Rumah', 'value' => $detail['tlp_rumah']]])
        @include('components.form.input', ['_data' => ['type' => 'text', 'name' => 'tlp_kantor', 'class' => 'form-control', 'max' => 20, 'label' => 'Telepon Kantor', 'value' => $detail['tlp_kantor']]])
        @include('components.form.input', ['_data' => ['type' => 'text', 'name' => 'nohp', 'class' => 'form-control', 'max' => 20, 'label' => 'No Hp', 'value' => $detail['nohp']]])
        @include('components.form.input', ['_data' => ['type' => 'email', 'name' => 'email', 'class' => 'form-control', 'max' => 20, 'label' => 'Email', 'value' => $detail['email']]])
        @include('components.form.input', ['_data' => ['type' => 'text', 'name' => 'warga_negara', 'class' => 'form-control', 'max' => 50, 'label' => 'Warga negara', 'value' => $detail['warga_negara'], 'val' => 'value', 'caption' => 'caption', 
          'options' => [
            ['name' => 'WNI', 'value' => 'WNI'],
            ['name' => 'WNA', 'value' => 'WNA'],
          ]
        ]])
        @include('components.form.input', ['_data' => ['type' => 'text', 'name' => 'pekerjaan', 'class' => 'form-control', 'max' => 50, 'label' => 'Pekerjaan', 'value' => $detail['pekerjaan']]])
        @include('components.form.input', ['_data' => ['type' => 'text', 'name' => 'ukuran_baju', 'class' => 'form-control', 'max' => 20, 'label' => 'Ukuran Baju', 'value' => $detail['ukuran_baju']]])
        @include('components.form.input', ['_data' => ['type' => 'text', 'name' => 'nama_ahliwaris', 'class' => 'form-control', 'max' => 50, 'label' => 'Nama Ahli Waris', 'value' => $detail['nama_ahliwaris']]])
        @include('components.form.input', ['_data' => ['type' => 'text', 'name' => 'hubungan_ahliwaris', 'class' => 'form-control', 'max' => 50, 'label' => 'Hubungan Ahli Waris', 'value' => $detail['hubungan_ahliwaris']]])
        
        <div class="form-group">
          <label>Jenis Kelamin Ahli Waris</label>
          <select name="jk_ahliwaris" class="form-control">
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
          </select>
        </div>
        <script>
          document.getElementsByName("jk_ahliwaris")[0].value = "{{ $detail['jk_ahliwaris'] }}";
        </script>
      </div>
      @include('components.form.button', ['_data' => ['type' => 'submit', 'text' => 'Simpan', 'class' => 'btn btn-primary']])
    @include('components.form.button', ['_data' => ['type' => 'reset', 'text' => 'Batal', 'class' => 'btn btn-danger']])
		</form>
@endsection
