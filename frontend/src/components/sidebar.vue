<template>
<aside class="main-sidebar">
	<section class="sidebar">
		<slot name="sidebarContent">
		</slot>
		<ul class="sidebar-menu" data-widget="tree">
			<li class="header">MAIN NAVIGATION</li>
			<template v-for="(x,index,key) in listMenu">
				<template v-if="x.child">
					<li class="treeview">
						<a href="#">
							<i :class="x.icon"></i> <span>{{x.text}}</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<template v-for="(y,index,key) in x.child">
								<li><router-link :to="y.url"><i :class="y.icon"></i> <span> {{y.text}}</span></router-link></li>
							</template>
						</ul>
					</li>
				</template>
				<template v-else>
					<li><router-link :to="x.url"><i :class="x.icon"></i> <span> {{x.text}}</span></router-link></li>
				</template>
			</template>
		</ul>
	</section>
</aside>
<!--
	Daftar slot :
	1. sidebarContent
		Untuk menambah kustom konten pada bagian atas sidebar (diatas menu sidebar) seperti informasi profil user, pencarian dll
-->
</template>
<script>
export default {
	props : {
		listMenu : {
			type : Array,
			required : true
		/*	default : [
					{
						url : 'contoh1',
						icon : 'fa fa-dashboard',
						text : 'contoh 1'
					},
					{
						icon : 'fa fa-dashboard',
						text : 'contoh 2',
						child : [
							{
								url : 'contoh2.1',
								icon : 'fa fa-dashboard',
								text : 'contoh 2.1'
							},
							{
								url : 'contoh2.2',
								icon : 'fa fa-dashboard',
								text : 'contoh 2.2'
							}
						]
					}
				]
		
		*/	
		}
	}
}
</script>
