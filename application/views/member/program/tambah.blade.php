@extends('components.layout_admin')

{{-- 
  Section tambahan:
  head : untuk penambahan kode didalam head
  script : untuk penambahan kode didalam script bagian paling bawah halaman
  sidebar : untuk mengatur menu pada sidebar
   --}}

@section('title', 'Tambah Data Program')
@section('sidebar_title', 'Tambah Data Program')
@section('user_image', 'images/img.jpg')
@section('username', 'Mandan')
@section('content_title', 'Tambah Data Program')

@section('content')
    
	<form method="POST" action="{{ site_url('admin/program/tambah') }}">
    @include('components.form.input', ['_data' => ['type' => 'text', 'name' => 'nama_program', 'class' => 'form-control', 'max' => 50, 'label' => 'Nama Program']])	
    @include('components.form.button', ['_data' => ['type' => 'submit', 'text' => 'Simpan', 'class' => 'btn btn-primary']])
    @include('components.form.button', ['_data' => ['type' => 'reset', 'text' => 'Batal', 'class' => 'btn btn-danger']])
  </form>
@endsection
