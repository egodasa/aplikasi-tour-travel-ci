@extends('components.layout_admin')

{{-- 
  Section tambahan:
  head : untuk penambahan kode didalam head
  script : untuk penambahan kode didalam script bagian paling bawah halaman
  sidebar : untuk mengatur menu pada sidebar
   --}}

@section('title', 'Pelanggan')
@section('sidebar_title', 'Pelanggan')
@section('user_image', 'images/img.jpg')
@section('username', 'Mandan')
@section('content_title', 'Pelanggan')

@section('content')
  <button type="button" onclick="showModalTambah()" class="btn btn-primary">Tambah Data</button>
  <div class="table-responsive">
    <div style="overflow:auto; max-height:650px; margin:0px 0 0px 0;">
      <table class="table table-bordered table-stripped">
        <tr>
          <th>No</th>
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
              <button type="button" onclick="showModalEdit({{ $nomor }})" class="btn btn-success">Edit</button>
              <button type="button" onclick="showConfirmationDelete('<?=site_url("admin/peserta/hapus?id=".$data['id'])?>')" class="btn btn-danger">Hapus</button>
            </td>
          </tr>
        @endforeach
      </table>
    </div>
  </div>
  <script>
    var data = <?=json_encode($data_list)?>;
    
    function resetModal()
    {
      elId("form_modal").action = "";
      elId("judul_modal").innerHTML = "Tambah Data Baru";
      elName("id")[0].value = "";
      elName("nama_lengkap")[0].value = "";
      elName("nama_panggilan")[0].value = "";
      elName("jenis_kelamin")[0].value = "";
      elName("id_pengguna")[0].value = "";
      elName("no_identitas")[0].value = "";
      elName("tempat_lahir")[0].value = "";
      elName("tgl_lahir")[0].value = "";
      elName("alamat")[0].value = "";
      elName("kel")[0].value = "";
      elName("tlp_rumah")[0].value = "";
      elName("tlp_kantor")[0].value = "";
      elName("nohp")[0].value = "";
      elName("email")[0].value = "";
      elName("warga_negara")[0].value = "";
      elName("pekerjaan")[0].value = "";
      elName("ukuran_baju")[0].value = "";
      elName("nama_ahliwaris")[0].value = "";
      elName("hubungan_ahliwaris")[0].value = "";
      elName("jk_ahliwaris")[0].value = "";
      elName("kode_pos")[0].value = "";
      elName("rt")[0].value = "";
      elName("rw")[0].value = "";
    }
    
    function closeModal()
    {
      resetModal();
      hideModal("#modal");
    }
    
    function showModalTambah()
    {
      resetModal();
      elId("form_modal").action = "{{ site_url('admin/peserta/tambah') }}";
      showModal("#modal");
    }
    
    function showModalEdit(id)
    {
      elId("judul_modal").innerHTML = "Edit Data";
      resetModal();
      var detail = data[id]; 
      elId("form_modal").action = "{{ site_url('admin/peserta/edit') }}";
      elName("id")[0].value = detail.id;
      elName("nama_lengkap")[0].value = detail.nama_lengkap;
      elName("nama_panggilan")[0].value = detail.nama_panggilan;
      elName("jenis_kelamin")[0].value = detail.jenis_kelamin;
      elName("id_pengguna")[0].value = detail.id_pengguna;
      elName("no_identitas")[0].value = detail.no_identitas;
      elName("tempat_lahir")[0].value = detail.tempat_lahir;
      elName("tgl_lahir")[0].value = detail.tgl_lahir;
      elName("alamat")[0].value = detail.alamat;
      elName("kel")[0].value = detail.ket;
      elName("tlp_rumah")[0].value = detail.tlp_rumah;
      elName("tlp_kantor")[0].value = detail.tlp_kantor;
      elName("nohp")[0].value = detail.nohp;
      elName("email")[0].value = detail.email;
      elName("warga_negara")[0].value = detail.warga_negara;
      elName("pekerjaan")[0].value = detail.pekerjaan;
      elName("ukuran_baju")[0].value = detail.ukuran_baju;
      elName("nama_ahliwaris")[0].value = detail.nama_ahliwaris;
      elName("hubungan_ahliwaris")[0].value = detail.hubungan_ahliwaris;
      elName("jk_ahliwaris")[0].value = detail.jk_ahliwaris;
      elName("kode_pos")[0].value = detail.kode_pos;
      elName("rt")[0].value = detail.rt;
      elName("rw")[0].value = detail.rw;
      showModal("#modal");
    }
  </script>
  
  <div class="modal fade hide-modal" id="modal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="judul_modal">Judul Modal</h4>
        </div>
        <div class="modal-body">
          <form id="form_modal" method="POST" action="{{ site_url('admin/peserta/tambah') }}">
            <input type="hidden" name="id">
            <div class="row">
      <div class="col-sm-6 col-xs-12">
        @include('components.form.select', ['_data' => [ 'name' => 'id_pengguna', 'value' => '','val' => 'id', 'caption' => 'username', 'class' => 'form-control','label' => 'Username', 'options' => $data_pengguna, 'caption' => 'username']])
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
        @include('components.form.select', ['_data' => ['type' => 'text', 'name' => 'tempat_lahir', 'class' => 'form-control', 'label' => 'Tempat Lahir', 'val' => 'id', 'caption' => 'nm_kota', 'options' => $data_kota]])
        @include('components.form.input', ['_data' => ['type' => 'date', 'name' => 'tgl_lahir', 'class' => 'form-control', 'max' => 10, 'label' => 'Tanggal Lahir']])
        @include('components.form.textarea', ['_data' => ['type' => 'text', 'name' => 'alamat', 'class' => 'form-control', 'max' => 225, 'label' => 'Alamat']])
        @include('components.form.input', ['_data' => ['type' => 'text', 'name' => 'kel', 'class' => 'form-control', 'max' => 11, 'label' => 'Kelurahan']])
        @include('components.form.input', ['_data' => ['type' => 'text', 'name' => 'kode_pos', 'class' => 'form-control', 'max' => 20, 'label' => 'Kode Pos']])
        @include('components.form.input', ['_data' => ['type' => 'text', 'name' => 'rt', 'class' => 'form-control', 'max' => 10, 'label' => 'RT']])
        @include('components.form.input', ['_data' => ['type' => 'text', 'name' => 'rw', 'class' => 'form-control', 'max' => 10, 'label' => 'RW']])
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
    </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" onclick="closeModal()">Tutup</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        </form>
      </div>
    </div>
  </div>
@endsection
