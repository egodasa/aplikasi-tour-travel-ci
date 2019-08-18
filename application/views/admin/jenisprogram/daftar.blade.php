@extends('components.layout_admin')

{{-- 
  Section tambahan:
  head : untuk penambahan kode didalam head
  script : untuk penambahan kode didalam script bagian paling bawah halaman
  sidebar : untuk mengatur menu pada sidebar
   --}}

@section('title', 'Jenis Program')
@section('sidebar_title', 'Jenis Program')
@section('user_image', 'images/img.jpg')
@section('username', 'Mandan')
@section('content_title', 'Jenis Program')

@section('content')
  <button type="button" onclick="showModalTambah()" class="btn btn-primary">Tambah Data</button>
  <table class="table table-bordered table-stripped">
    <tr>
      <th>No</th>
      <th>Nama Jenis Program</th>
      <th>Program</th>
      <th>Harga</th>
      <th>Aksi</th>
    </tr>
    @foreach($data_list as $nomor => $data)
      <tr>
        <td>{{ ($nomor+1) }}</td>
        <td>{{ $data['nm_jenis'] }}</td>
        <td>{{ $data['nama_program'] }}</td>
        <td>{{ rupiah($data['harga']) }}</td>
        <td>
          <button type="button" onclick="showModalEdit({{ $nomor }})" class="btn btn-success">Edit</button>
          <button type="button" onclick="showConfirmationDelete('<?=site_url("admin/jenisprogram/hapus?id=".$data['id'])?>')" class="btn btn-danger">Hapus</button>
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
      elName("id_program")[0].value = "";
      elName("harga")[0].value = 0;
      elName("nm_jenis")[0].value = "";
    }
    
    function closeModal()
    {
      resetModal();
      hideModal("#modal");
    }
    
    function showModalTambah()
    {
      resetModal();
      elId("form_modal").action = "{{ site_url('admin/jenisprogram/tambah') }}";
      showModal("#modal");
    }
    
    function showModalEdit(id)
    {
      elId("judul_modal").innerHTML = "Edit Data";
      resetModal();
      var detail = data[id]; 
      elId("form_modal").action = "{{ site_url('admin/jenisprogram/edit') }}";
      elName("id")[0].value = detail.id;
      elName("id_program")[0].value = detail.id_program;
      elName("harga")[0].value = detail.harga;
      elName("nm_jenis")[0].value = detail.nm_jenis;
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
          <form id="form_modal" method="POST" action="{{ site_url('admin/jenisprogram/tambah') }}">
            <input type="hidden" name="id">
            @include('components.form.input', ['_data' => ['type' => 'text', 'name' => 'nm_jenis', 'class' => 'form-control', 'max' => 50, 'label' => 'Nama Jenis Program']])
            @include('components.form.select', ['_data' => [ 'name' => 'id_program', 'class' => 'form-control', 'val' => 'id', 'caption' => 'nama_program','label' => 'Nama Program', 'options' => $data_program]])
            @include('components.form.input', ['_data' => ['type' => 'number', 'name' => 'harga', 'class' => 'form-control', 'label' => 'Harga']])
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
