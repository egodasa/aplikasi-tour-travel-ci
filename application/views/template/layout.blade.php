<!DOCTYPE html>
<html lang="en">
@include('template.head', ['judul' => 'Gundul'])
	<body>
		<div id="top">
		@include('template.top-bar')
		@include('template.modal-login')
		</div>
		<div class="navbar navbar-default yamm" role="navigation" id="navbar">
			<div class="container">
		@include('template.navbar')
			</div>
		</div>
		<div id="all">
			<div id="content">
				<div class="container">
					<!-- CONTENT -->
						@yield('content')
					<!-- EOF CONTENT -->
					
				</div>
		@include('template.footer-atas')
		@include('template.footer-bawah')
			</div>
		</div>
		@include('template.javascript')
	</body>
</html>
