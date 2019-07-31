@extends('components.layout_admin')

{{-- 
  Section tambahan:
  head : untuk penambahan kode didalam head
  script : untuk penambahan kode didalam script bagian paling bawah halaman
  sidebar : untuk mengatur menu pada sidebar
   --}}

@section('title', 'Contoh Halaman')
@section('sidebar_title', 'Contoh Halaman')
@section('user_image', 'images/img.jpg')
@section('username', 'Mandan')
@section('content_title', 'Judul Halaman')

@section('content')
    Ini Adalah konten
    
    @include('components.form.input', ['_data' => ['type' => 'text', 'name' => 'anu', 'class' => 'form-control', 'max' => 20, 'label' => 'Ini Label']])
    @include('components.form.textarea', ['_data' => ['type' => 'text', 'name' => 'anu', 'value' => 'anus', 'label' => 'Ini Label']])
    @include('components.form.select', ['_data' => [ 'name' => 'anu', 'value' => '22113','val' => 'nobp', 'caption' => 'nm_mhs', 'options' => [
      ['nobp' => '2211', 'nm_mhs' => 'sdffefe'],
      ['nobp' => '22112', 'nm_mhs' => '312sdffefe'],
      ['nobp' => '22113', 'nm_mhs' => 'sdff31efe']
    ]]])
    @include('components.form.button', ['_data' => ['type' => 'submit', 'text' => 'Simpan', 'class' => 'btn btn-primary']])
@endsection
