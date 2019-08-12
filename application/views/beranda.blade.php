@extends('components.layout_admin')

{{-- 
  Section tambahan:
  head : untuk penambahan kode didalam head
  script : untuk penambahan kode didalam script bagian paling bawah halaman
  sidebar : untuk mengatur menu pada sidebar
   --}}

@section('title', 'Beranda')
@section('sidebar_title', 'Beranda')
@section('user_image', 'images/img.jpg')
@section('username', 'Mandan')
@section('content_title', '')

@section('content')
  <h1>Selamat Datang!</h1>
@endsection
