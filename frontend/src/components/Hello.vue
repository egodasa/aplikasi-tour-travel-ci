<template>
  <table>
	<thead>
	  <tr>
	    <th v-for="(x,index,key) in table.field" :key="index">{{x.text}}</th>
	  </tr>
	</thead>
	<tbody>
	  <tr v-for="(data,index,key) in listDosen" :key="index">
	    <td v-for="(x,index,key) in table.field" :key="index">
	      {{data[x.name]}}
	    </td>
	  </tr>
	</tbody>
  </table>
</template>

<script>
import axios from 'axios'
export default {
  name: 'hello',
  data () {
    return {
      listDosen: [],
      table: {
		  field: [
			{name: "nidn", text: "NIDN"},
			{name: "nm_dosen", text: "Nama Dosen"},
		  ]
	  }
    }
  },
  created () {
	  axios.get('api/dosen')
		.then(res=>{
			this.listDosen = res.data.data
		})
		.catch(err=>{
			console.log(err)
		})
  }
}
</script>
