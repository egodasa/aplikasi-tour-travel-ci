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
  <button type="button" onclick="showModalTambah()" class="btn btn-primary">Tambah Data</button>
  <table class="table table-bordered table-stripped">
    <tr>
      <th>No</th>
      <th>No Transaksi</th>
      <th>Username</th>
      <th>Program</th>
      <th>DP</th>
      <th>Status</th>
      <th>Aksi</th>
    </tr>
    @foreach($data_list as $nomor => $data)
      <tr>
        <td>{{ ($nomor+1) }}</td>
        <td>{{ $data['id'] }}</td>
        <td>{{ $data['username'] }}</td>
        <td>{{ $data['nama_program'] }}</td>
        <td>{{ rupiah($data['dp']) }}</td>
        <td>{{ $data['status_transaksi'] }}</td>
        <td>
          <button type="button" onclick="showModalEdit({{ $nomor }})" class="btn btn-success">Edit</button>
          <button type="button" onclick="showConfirmationDelete('<?=site_url("admin/transaksi/hapus?id=".$data['id'])?>')" class="btn btn-danger">Hapus</button>
          <a href="<?=site_url("admin/peserta-transaksi?id_transaksi=".$data['id'])?>" class="btn btn-primary">Data Peserta</a>
          <a href="<?=site_url("admin/angsuran?id_transaksi=".$data['id'])?>" class="btn btn-warning">Data Angsuran</a>
        </td>
      </tr>
    @endforeach
  </table>
  
  <script>
    var data = <?=json_encode($data_list)?>;
    
    function resetModal()
    {
      elId("form_modal").action = "";
      elId("judul_modal").innerHTML = "Tambah Data Baru";
      elName("id")[0].value = "";
      elName("dp")[0].value = "";
      elName("id_jenis")[0].value = "";
      elName("status")[0].value = "";
    }
    
    function closeModal()
    {
      resetModal();
      hideModal("#modal");
    }
    
    function showModalTambah()
    {
      resetModal();
      elId("form_modal").action = "{{ site_url('admin/transaksi/tambah') }}";
      showModal("#modal");
    }
    
    function showModalEdit(id)
    {
      elId("judul_modal").innerHTML = "Edit Data";
      resetModal();
      var detail = data[id]; 
      elId("form_modal").action = "{{ site_url('admin/transaksi/edit') }}";
      elName("id")[0].value = detail.id;
      elName("dp")[0].value = detail.dp;
      elName("id_jenis")[0].value = detail.id_jenis;
      elName("status")[0].value = detail.status_transaksi;
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
          <form id="form_modal" method="POST" action="{{ site_url('admin/transaksi/tambah') }}">
            <input type="hidden" name="id">
            <input type="hidden" name="id_pengguna" value="<?=$_SESSION['id']?>" />
            @include('components.form.select', ['_data' => [ 'class' => 'form-control', 'name' => 'id_jenis', 'value' => '','val' => 'id', 'caption' => 'jenis_program', 'label' => 'Nama Program', 'options' => $data_program, 'caption' => 'nama_program']])
            @include('components.form.input', ['_data' => ['type' => 'number', 'name' => 'dp', 'class' => 'form-control', 'label' => 'Dp']])
            @include('components.form.select', ['_data' => [ 'class' => 'form-control', 'name' => 'status', 'value' => 'val','caption' => 'status', 'label' => 'Status', 'options' => [['val' => 'Aktif'], ['val' => 'Dibatalkan']], 'val' => 'val', 'caption' => 'val']])
        
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
