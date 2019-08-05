@extends('components.layout_admin')

{{-- 
  Section tambahan:
  head : untuk penambahan kode didalam head
  script : untuk penambahan kode didalam script bagian paling bawah halaman
  sidebar : untuk mengatur menu pada sidebar
   --}}

@section('title', 'Ubah Data Transaksi')
@section('sidebar_title', 'Ubah Data Transaksi')
@section('user_image', 'images/img.jpg')
@section('username', 'Mandan')
@section('content_title', 'Ubah Data Transaksi')

@section('content')
    
	<form method="POST" >
    @include('components.form.input', ['_data' => ['type' => 'hidden', 'name' => 'no_registrasi', 'value' => $detail['no_registrasi']]])
    @include('components.form.select', ['_data' => [ 'readonly' => true, 'class' => 'form-control', 'name' => 'id_jenis', 'value' => $detail['id_jenis'], 'val' => 'id_jenis', 'caption' => 'jenis_program', 'label' => 'Nama Program', 'options' => $data_program, 'val' => 'id_jenis', 'caption' => 'nm_program']])
	  @include('components.form.select', ['_data' => [ 'class' => 'form-control', 'name' => 'id_pelanggan', 'value' => $detail['id_pelanggan'],'val' => 'id_pelanggan', 'caption' => 'nama_lengkap','label' => 'Nama Lengkap', 'options' => $data_pelanggan]])
    @include('components.form.input', ['_data' => ['type' => 'text', 'name' => 'status', 'class' => 'form-control', 'max' => 30, 'value' => $detail['status'], 'label' => 'Status']])
    @include('components.form.input', ['_data' => ['readonly' => true, 'type' => 'number', 'name' => 'dp', 'class' => 'form-control', 'label' => 'Dp', 'value' => $detail['dp']]])
	
    @include('components.form.button', ['_data' => ['type' => 'submit', 'text' => 'Simpan', 'class' => 'btn btn-primary']])
    @include('components.form.button', ['_data' => ['type' => 'reset', 'text' => 'Batal', 'class' => 'btn btn-danger']])
		</form>
@endsection
