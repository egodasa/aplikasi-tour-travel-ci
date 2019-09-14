@extends('components.layout_admin')

{{-- 
  Section tambahan:
  head : untuk penambahan kode didalam head
  script : untuk penambahan kode didalam script bagian paling bawah halaman
  sidebar : untuk mengatur menu pada sidebar
   --}}

@section('title', 'Pengguna')
@section('sidebar_title', 'Pengguna')
@section('user_image', 'images/img.jpg')
@section('username', 'Mandan')
@section('content_title', 'Pengguna')

@section('content')
  <button type="button" onclick="showModalTambah()" class="btn btn-primary">Tambah Pengguna</button>
  <table class="table table-bordered table-stripped">
  	<thead>
    <tr>
      <th>No</th>
      <th>Username</th>
      <th>Email</th>
      <th>NOHP</th>
      <th>Level</th>
      <th>Aksi</th>
    </tr>
    </thead>
    <tbody>
    @foreach($data_list as $nomor => $data)
      <tr>
        <td>{{ ($nomor+1) }}</td>
        <td>{{ $data['username'] }}</td>
        <td>{{ $data['email'] }}</td>
        <td>{{ $data['nohp'] }}</td>
        <td>{{ $data['level'] }}</td>
        <td>
          <button type="button" onclick="showModalEdit({{ $nomor }})" class="btn btn-success">Edit</button>
          <button type="button" onclick="showConfirmationDelete('<?=site_url("pengguna/hapus?id=".$data['id'])?>')" class="btn btn-danger">Hapus</button>
        </td>
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
      elName("id")[0].value = "";
      elName("username")[0].value = "";
      elName("email")[0].value = "";
      elName("nohp")[0].value = "";
      elName("level")[0].value = "";
      elName("password")[0].value = "";
    }
    
    function closeModal()
    {
      resetModal();
      hideModal("#modal");
    }
    
    function showModalTambah()
    {
      resetModal();
      elId("form_modal").action = "{{ site_url('pengguna/tambah') }}";
      showModal("#modal");
    }
    
    function showModalEdit(id)
    {
      elId("judul_modal").innerHTML = "Edit Data";
      resetModal();
      var detail = data[id]; 
      elId("form_modal").action = "{{ site_url('pengguna/edit') }}";
      elName("id")[0].value = detail.id;
      elName("username")[0].value = detail.username;
      elName("email")[0].value = detail.email;
      elName("nohp")[0].value = detail.nohp;
      elName("level")[0].value = detail.level;
      elName("password")[0].value = detail.password;
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
          <form id="form_modal" method="POST" action="{{ site_url('pengguna/tambah') }}">
            <input type="hidden" name="id">
            @include('components.form.input', ['_data' => ['type' => 'text', 'name' => 'username', 'class' => 'form-control', 'max' => 20, 'label' => 'Username']])
    @include('components.form.input', ['_data' => ['type' => 'password', 'name' => 'password', 'class' => 'form-control', 'max' => 50, 'label' => 'Password']])
	  @include('components.form.input', ['_data' => ['type' => 'email', 'name' => 'email', 'class' => 'form-control', 'max' => 50, 'label' => 'Email']])
    @include('components.form.input', ['_data' => ['type' => 'text', 'name' => 'nohp', 'class' => 'form-control', 'max' => 15, 'label' => 'No hp']])
    <div class="form-group">
      <label>Level</label>
      <select class="form-control" name="level">
        <option value="Admin">Admin</option>
        <option value="Member">Member</option>
        <option value="Direktur">Direktur</option>
      </select>
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
