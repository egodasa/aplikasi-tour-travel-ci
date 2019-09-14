@extends('components.layout_admin')

{{-- 
  Section tambahan:
  head : untuk penambahan kode didalam head
  script : untuk penambahan kode didalam script bagian paling bawah halaman
  sidebar : untuk mengatur menu pada sidebar
   --}}

@section('title', 'Data Angsuran')
@section('sidebar_title', 'Data Angsuran')
@section('user_image', 'images/img.jpg')
@section('username', 'Mandan')
@section('content_title', 'Data Angsuran')

@section('content')
  
  <div class="row">
    <div class="col-sm-2 col-xs-12">
      <a href="{{ site_url('transaksi') }}" class="btn btn-success">< Kembali</a>
    </div>
    <?php if($_SESSION['level'] == "Admin"): ?>
      <div class="col-sm-2 col-xs-12">
        <button type="button" onclick="showModalTambah()" class="btn btn-primary">Tambah Angsuran</button>
      </div>
    <?php endif; ?>
      <div class="col-sm-2 col-xs-12">
        <a href="{{ site_url('bukti-angsuran?id_transaksi='.$_GET['id_transaksi']) }}" class="btn btn-success dropdown-toggle" >Cetak Bukti Angsuran</a>
      </div>
  </div>
  <table class="table table-bordered table-stripped">
  	<thead>
    <tr>
      <th>No</th>
      <th>ID Angsuran</th>
      <th>Tanggal Bayar</th>
      <th>Jumlah Bayar</th>
      <th>Jenis Pembayaran</th>
      <th>Keterangan</th>
      <?php if($_SESSION['level'] == "Admin"): ?>
        <th>Aksi</th>
      <?php endif; ?>
      
    </tr>
    </thead>
    <tbody>
    @foreach($data_list as $nomor => $data)
      <tr>
        <td>{{ ($nomor+1) }}</td>
        <td>{{ $data['id'] }}</td>
        <td>{{ TanggalIndo($data['tgl_bayar']) }}</td>
        <td>{{ rupiah($data['juml_bayar']) }}</td>
        <td>{{ $data['jenis_pembayaran'] }}</td>
        <td>{{ $data['keterangan'] }}</td>
        <?php if($_SESSION['level'] == "Admin"): ?>
          <td>
            <button type="button" onclick="showModalEdit({{ $nomor }})" class="btn btn-success">Edit</button>
            <button type="button" onclick="showConfirmationDelete('<?=site_url("angsuran/hapus?id=".$data['id'])?>')" class="btn btn-danger">Hapus</button>
          </td>
        <?php endif; ?>
        
      </tr>
    @endforeach
    </tbody>
  </table>
  
  <script>
    var data = <?=json_encode($data_list)?>;
    
    function resetModal()
    {
      elId("form_modal").action = "";
      elId("judul_modal").innerHTML = "Tambah Data Baru";
      elName("tgl_bayar")[0].value = "";
      elName("juml_bayar")[0].value = "";
      elName("jenis_pembayaran")[0].value = "";
      elName("keterangan")[0].value = "";
      
    }
    
    function closeModal()
    {
      resetModal();
      hideModal("#modal");
    }
    
    function showModalTambah()
    {
      resetModal();
      elId("form_modal").action = "{{ site_url('angsuran/tambah') }}";
      showModal("#modal");
    }
    
    function showModalEdit(id)
    {
      elId("judul_modal").innerHTML = "Edit Data";
      resetModal();
      var detail = data[id]; 
      elId("form_modal").action = "{{ site_url('angsuran/edit') }}";
      elName("id")[0].value = detail.id;
      elName("tgl_bayar")[0].value = detail.tgl_bayar;
      elName("juml_bayar")[0].value = detail.juml_bayar;
      elName("jenis_pembayaran")[0].value = detail.jenis_pembayaran;
      elName("keterangan")[0].value = detail.keterangan;
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
          <form id="form_modal" method="POST" action="{{ site_url('angsuran/tambah') }}">
            <input type="hidden" name="id">
            <input type="hidden" name="id_transaksi" value="<?=$_SESSION['id_transaksi_terpilih']?>">
            @include('components.form.input', ['_data' => ['type' => 'date', 'name' => 'tgl_bayar', 'class' => 'form-control', 'max' => 10, 'label' => 'Tanggal Bayar']])
            @include('components.form.input', ['_data' => ['type' => 'number', 'name' => 'juml_bayar', 'class' => 'form-control', 'label' => 'Jumlah Bayar']])
            @include('components.form.select', ['_data' => ['name' => 'jenis_pembayaran', 'class' => 'form-control', 'label' => 'Jenis Pembayaran', 'val' => 'val', 'caption' => 'val', 'options' => [['val' => 'DP'], ['val' => 'Angsuran']]]])
            @include('components.form.textarea', ['_data' => ['name' => 'keterangan', 'class' => 'form-control', 'label' => 'Keterangan']])
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-default" onclick="closeModal()">Tutup</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </div>
    </div>
    </form>
  </div>
@endsection
