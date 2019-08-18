@extends('components.layout_admin')

{{-- 
  Section tambahan:
  head : untuk penambahan kode didalam head
  script : untuk penambahan kode didalam script bagian paling bawah halaman
  sidebar : untuk mengatur menu pada sidebar
   --}}

@section('title', 'Program')
@section('sidebar_title', 'Program')
@section('user_image', 'images/img.jpg')
@section('username', 'Mandan')
@section('content_title', 'Program')

@section('content')
  <button type="button" onclick="showModalTambah()" class="btn btn-primary">Tambah Data</button>
  <table class="table table-bordered table-stripped">
    <tr>
      <th>No</th>
      <th>Nama Program</th>
      <th>Kuota Peserta</th>
      <th>Aksi</th>
    </tr>
    @foreach($data_list as $nomor => $data)
      <tr>
        <td>{{ ($nomor+1) }}</td>
        <td>{{ $data['nama_program'] }}</td>
        <td>{{ $data['kuota'] }} Peserta</td>
        <td>
          <button type="button" onclick="showModalEdit({{ $nomor }})" class="btn btn-success">Edit</button>
          <button type="button" onclick="showConfirmationDelete('<?=site_url("admin/program/hapus?id=".$data['id'])?>')" class="btn btn-danger">Hapus</button>
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
      elName("nama_program")[0].value = "";
      elName("kuota")[0].value = 0;
    }
    
    function closeModal()
    {
      resetModal();
      hideModal("#modal");
    }
    
    function showModalTambah()
    {
      resetModal();
      elId("form_modal").action = "{{ site_url('admin/program/tambah') }}";
      showModal("#modal");
    }
    
    function showModalEdit(id)
    {
      elId("judul_modal").innerHTML = "Edit Data";
      resetModal();
      var detail = data[id]; 
      elId("form_modal").action = "{{ site_url('admin/program/edit') }}";
      elName("id")[0].value = detail.id;
      elName("nama_program")[0].value = detail.nama_program;
      elName("kuota")[0].value = detail.kuota;
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
          <form id="form_modal" method="POST" action="{{ site_url('admin/program/tambah') }}">
            <input type="hidden" name="id">
            @include('components.form.input', ['_data' => ['type' => 'text', 'name' => 'nama_program', 'class' => 'form-control', 'max' => 50, 'label' => 'Nama Program']])
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
