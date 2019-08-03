@extends('components.layout_admin')

{{-- 
  Section tambahan:
  head : untuk penambahan kode didalam head
  script : untuk penambahan kode didalam script bagian paling bawah halaman
  sidebar : untuk mengatur menu pada sidebar
   --}}

@section('title', 'Tambah Data Pengguna')
@section('sidebar_title', 'Tambah Data Pengguna')
@section('user_image', 'images/img.jpg')
@section('username', 'Mandan')
@section('content_title', 'Tambah Data Pengguna')

@section('content')
    
	<form method="POST" >
	
    @include('components.form.input', ['_data' => ['type' => 'hidden', 'name' => 'id_pengguna', 'value' => $detail['id_pengguna']]])
    @include('components.form.input', ['_data' => ['type' => 'text', 'name' => 'username', 'class' => 'form-control', 'max' => 20, 'label' => 'Username', 'value' => $detail['username']]])
    @include('components.form.input', ['_data' => ['type' => 'password', 'name' => 'password', 'class' => 'form-control', 'max' => 50, 'label' => 'Password', 'value' => $detail['password']]])
	  @include('components.form.input', ['_data' => ['type' => 'email', 'name' => 'email', 'class' => 'form-control', 'max' => 50, 'label' => 'Email', 'value' => $detail['email']]])
    @include('components.form.input', ['_data' => ['type' => 'text', 'name' => 'nohp', 'class' => 'form-control', 'max' => 15, 'label' => 'No hp', 'value' => $detail['nohp']]])
    <div class="form-group">
      <label>Level</label>
      <select class="form-control" name="level">
        <option value="Admin">Admin</option>
        <option value="Member">Member</option>
      </select>
    </div>
    <script>
      document.getElementsByName("level")[0].value = "{{ $detail['level'] }}";
    </script>
	
	
    @include('components.form.button', ['_data' => ['type' => 'submit', 'text' => 'Simpan', 'class' => 'btn btn-primary']])
    @include('components.form.button', ['_data' => ['type' => 'reset', 'text' => 'Batal', 'class' => 'btn btn-danger']])
		</form>
@endsection
