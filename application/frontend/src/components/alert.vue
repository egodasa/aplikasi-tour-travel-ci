<template>
<div :class="'alert alert-'+type+' alert-dismissible'">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<slot></slot>
</div>
</template>
<script>
export default{
	props : {
		type : {
			required : false,
			default : "info"
		}
	}
}
</script>
