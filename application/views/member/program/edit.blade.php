@extends('components.layout_admin')

{{-- 
  Section tambahan:
  head : untuk penambahan kode didalam head
  script : untuk penambahan kode didalam script bagian paling bawah halaman
  sidebar : untuk mengatur menu pada sidebar
   --}}

@section('title', 'Ubah Data Program')
@section('sidebar_title', 'Ubah Data Program')
@section('user_image', 'images/img.jpg')
@section('username', 'Mandan')
@section('content_title', 'Ubah Data Program')

@section('content')
	<form method="POST" action="{{ site_url('admin/program/edit') }}">    
    @include('components.form.input', ['_data' => ['type' => 'text', 'name' => 'nama_program', 'class' => 'form-control', 'max' => 50, 'value' => $detail['nama_program'], 'label' => 'Nama Program']])
    @include('components.form.button', ['_data' => ['type' => 'submit', 'text' => 'Simpan', 'class' => 'btn btn-primary']])
    @include('components.form.button', ['_data' => ['type' => 'reset', 'text' => 'Batal', 'class' => 'btn btn-danger']])
    @include('components.form.input', ['_data' => ['type' => 'hidden', 'name' => 'id_program', 'value' => $detail['id_program']]])
  </form>
@endsection
