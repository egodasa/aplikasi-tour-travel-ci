<template>
<header class="main-header">
<!-- Logo -->
<slot name="logo">
	<a href="/" class="logo">
	<!-- mini logo for sidebar mini 50x50 pixels -->
	<span class="logo-mini"><b>ME</b>VIT</span>
	<!-- logo for regular state and mobile devices -->
	<span class="logo-lg"><b>MEVIT</b></span>
	</a>
</slot>
<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top">
	<slot name="navbarIcon">
		<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</a>
	</slot>
  <div class="navbar-custom-menu">
	<slot name="navbar">
		<ul class="nav navbar-nav">
		  <!-- Messages: style can be found in dropdown.less-->
		  <!-- Notifications: style can be found in dropdown.less -->
		  <!-- Tasks: style can be found in dropdown.less -->
		  <!-- User Account: style can be found in dropdown.less -->
		  <li class="dropdown user user-menu">
			<template v-if="username">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
				  <img src="/img/user2-160x160.jpg" class="user-image" alt="User Image">
				  <span class="hidden-xs">{{username}}</span>
				</a>
			</template>
			<ul class="dropdown-menu">
			  <!-- User image -->
			  <li class="user-header">
				<img src="/img/user2-160x160.jpg" class="img-circle" alt="User Image">
				<p>
				  <small>{{username}}</small>
				</p>
			  </li>
			  <!-- Menu Body -->
			  <!-- Menu Footer-->
			  <li class="user-footer">
				<div class="pull-right">
				  <button class="btn btn-default btn-flat" @click="logout">Logout</button>
				</div>
			  </li>
			</ul>
		  </li>
		</ul>
	</slot>
  </div>
</nav>
</header>
<!--
	Daftar Slot :
	1. Logo 
		Untuk mengisi logo pada bagian atas sidebar
	2. NavbarIcon
		Untuk membuat kustom ikon toggle pada navbar
	3. Navbar
		Untuk menambahkan isi pada navbar
	* Abaikan slot jika tidak ingin mengubah isi asli navbar terutama dibagian logo dan navbarIcon
-->
</template>
<script>
export default {
	props : {
		username: String
	},
	methods : {
		logout (){
			this.$lcs.removeLcs('info_login')
			this.$router.push('/')
		}
	}
}
</script>
