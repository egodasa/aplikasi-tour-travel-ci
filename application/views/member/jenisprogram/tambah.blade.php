@extends('components.layout_admin')

{{-- 
  Section tambahan:
  head : untuk penambahan kode didalam head
  script : untuk penambahan kode didalam script bagian paling bawah halaman
  sidebar : untuk mengatur menu pada sidebar
   --}}

@section('title', 'Tambah Data Jenis Program')
@section('sidebar_title', 'Tambah Data Jenis Program')
@section('user_image', 'images/img.jpg')
@section('username', 'Mandan')
@section('content_title', 'Tambah Data Jenis Program')

@section('content')
    
	<form method="POST">
	  @include('components.form.input', ['_data' => ['type' => 'text', 'name' => 'nm_jenis', 'class' => 'form-control', 'max' => 50, 'label' => 'Nama Jenis Program']])
	  @include('components.form.select', ['_data' => [ 'name' => 'id_program', 'class' => 'form-control', 'val' => 'id_program', 'caption' => 'nama_program','label' => 'Nama Program', 'options' => $data_program]])
    @include('components.form.input', ['_data' => ['type' => 'number', 'name' => 'harga', 'class' => 'form-control', 'label' => 'Harga']])
	
    @include('components.form.button', ['_data' => ['type' => 'submit', 'text' => 'Simpan', 'class' => 'btn btn-primary']])
    @include('components.form.button', ['_data' => ['type' => 'reset', 'text' => 'Batal', 'class' => 'btn btn-danger']])
  </form>
@endsection
