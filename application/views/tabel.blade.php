@extends('template.layout')
@section('content')
	<?php
	$fields = [
		[
			"name" => "nama",
			"title" => "Nama"
		],
		[
			"name" => "kls",
			"title" => "Kelas"
		]
	];
	$data = [
		["nama"=>"AYam 1", "kls"=> "31"],
		["nama"=>"AYam 1", "kls"=> "31"],
		["nama"=>"AYam 1", "kls"=> "31"],
		["nama"=>"AYam 1", "kls"=> "31"],
		["nama"=>"AYam 1", "kls"=> "31"]
	];
	?>
    <div class="box">
		<div class="box-body">
			@include('template.tabel', ['fields' => $fields, 'data' => $data])
			<h4>Form</h4>
			@include('template.form.input', ['data' => ['placeholder' => 'Placeholder', 'type' => 'text', 'min' => '10', 'max' => '15', 'readonly' => 'true', 'class' => 'form-control']])
		</div>
	</div>
@endsection

