@extends('template.layout')
@section('content')
    <div class="row products">
		@include('template.listProduct')
		@include('template.listProduct')
		@include('template.listProduct')
		@include('template.listProduct')
		@include('template.listProduct')
		@include('template.listProduct')
		<?php
		echo $ayam;
		$a = [
			["nama" => "ayam"],
			["nama" => "ayam"],
			["nama" => "ayam"],
			["nama" => "ayam"]
		];
		
		$c = '[
		{"nama": "ayam json"},
		{"nama": "ayam json"},
		{"nama": "ayam json"},
		{"nama": "ayam json"}
		]';
		
		$c1 = json_decode($c);
		print_r($c1);
		echo json_encode($a);
		?>
	</div>
@endsection
