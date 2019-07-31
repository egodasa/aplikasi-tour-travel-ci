@extends('components.layout_admin')

{{-- 
  Section tambahan:
  head : untuk penambahan kode didalam head
  script : untuk penambahan kode didalam script bagian paling bawah halaman
  sidebar : untuk mengatur menu pada sidebar
   --}}

@section('title', 'Kelola Data Transaksi')
@section('sidebar_title', 'Kelola Data Transaksi')
@section('user_image', 'images/img.jpg')
@section('username', 'Mandan')
@section('content_title', 'Kelola Data Transaksi')

@section('content')
    @include('components.table', ['fields' => $fields, 'data' => $data])
@endsection
