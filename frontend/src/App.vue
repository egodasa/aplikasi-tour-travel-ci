<template>
  <div id="app">
    <kelola-dosen/>
  </div>
</template>

<script>
import kelolaDosen from './components/kelolaDosen.vue'
export default {
  name: 'app',
  components : {
	  'kelola-dosen': kelolaDosen
  }
}
</script>
