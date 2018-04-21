<template>
<div class="content-wrapper">
	<slot name="otherContent">
	</slot>
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<slot name="contentHeader">
			
		</slot>
	</section>
	
	<!-- Main content -->
	<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<slot name="content">
				
				</slot>
			</div>
		</div>
	</div>
	  <!-- /.row -->
	</section>
	<!-- /.content -->
</div>
<!--
	Daftar slot :
	1. contentHeader
		Mengisi header dari artikel
	2. content
		Mengisi content
-->
</template>
