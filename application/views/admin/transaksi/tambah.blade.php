@extends('components.layout_admin')

{{-- 
  Section tambahan:
  head : untuk penambahan kode didalam head
  script : untuk penambahan kode didalam script bagian paling bawah halaman
  sidebar : untuk mengatur menu pada sidebar
   --}}

@section('title', 'Tambah Data Transaksi')
@section('sidebar_title', 'Tambah Data Transaksi')
@section('user_image', 'images/img.jpg')
@section('username', 'Mandan')
@section('content_title', 'Tambah Data Transaksi')

@section('content')
    
	<form method="POST" >
	
	@include('components.form.select', ['_data' => [ 'name' => 'id_jenis', 'value' => '','val' => 'id_jenis', 'caption' => 'jenis_program','label' => 'Nama Program', 'options' => []]])
	@include('components.form.select', ['_data' => [ 'name' => 'id_pelanggan', 'value' => '','val' => 'id_pelanggan', 'caption' => 'nama_lengkap','label' => 'Nama Lengkap', 'options' => []]])
    @include('components.form.input', ['_data' => ['type' => 'text', 'name' => 'status', 'class' => 'form-control', 'max' => 30, 'label' => 'Status']])
    @include('components.form.input', ['_data' => ['type' => 'number', 'name' => 'dp', 'class' => 'form-control', 'max' => 11, 'label' => 'Dp']])
	
	
    @include('components.form.button', ['_data' => ['type' => 'submit', 'text' => 'Simpan', 'class' => 'btn btn-primary']])
    @include('components.form.button', ['_data' => ['type' => 'reset', 'text' => 'Batal', 'class' => 'btn btn-danger']])
		</form>
@endsection
