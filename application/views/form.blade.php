@extends('template.layout')
@section('content')
    <div class="box">
		<div class="box-body">
			<h4>Contoh form menggunakan blade</h4>
			<p>File : views/form.blade.php</p>
			<div class="form-group">
				<label>Input</label>
				@include('template.form.input', ['data' => ['type' => 'text', 'min' => '10', 'max' => '15', 'readonly' => 'true', 'class' => 'form-control']])
				<p>Komponen : views/template/form/input.blade.php</p>
			</div>
			<div class="form-group">
				<label>Textarea</label>
				@include('template.form.textarea', ['data' => ['min' => '10', 'max' => '15', 'value' => 'isi', 'class' => 'form-control']])
				<p>Komponen : views/template/form/textarea.blade.php</p>
			</div>
			<div class="form-group">
				<label>Select</label>
				@include('template.form.select', [
					'data' => [
						'class' => 'form-control',
						'options' => [
							[
								'text' => 'satu',
								'value' => '1'
							],
							[
								'text' => 'dua',
								'value' => '2'
							]
						]
					]
				])
				<p>Komponen : views/template/form/select.blade.php</p>
			</div>
		</div>
	</div>
@endsection

