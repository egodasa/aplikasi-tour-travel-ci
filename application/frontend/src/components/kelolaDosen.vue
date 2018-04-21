<template>
	<div class="box">
		<div class="box-header with-border">
			<div class="pull-left">
				<h3>Daftar Dosen</h3>
			</div>
			<div class="pull-right">
				<button class="btn btn-primary" @click="modalStatus = !modalStatus">+ Tambah Data Baru</button>
				<modal :show="modalStatus" title="Tambah Data">
					<template slot="modalBody">
						<form-generator :model="form.model" :fields="form.fields" :error="form.error"></form-generator>
					</template>
					<template slot="modalFooter">
						<div class="pull-right">
							<button class="btn btn-primary" @click="saveData()">Simpan</button>
							<button class="btn btn-danger" @click="resetForm()">Reset</button>
							<button class="btn btn-success" @click="toggleForm()">Batal</button>
						</div>
					</template>
				</modal>
			</div>
		</div>
		<div class="box-body">
		<div class="dataTables_wrapper form-inline dt-bootstrap">
		<div class="row">
			<div class="col-sm-4 col-xs-12">
				<div class="dataTables_length pull-left" id="example1_length"><label>Tampilkan
				<select name="example1_length" aria-controls="example1" class="form-control input-sm" v-model="perPage">
					<option value="10">10</option>
					<option value="25">25</option>
					<option value="50">50</option>
					<option value="100">100</option>
				</select> Data</label>
				</div>
			</div>
			<div class="col-sm-4 col-xs-12">
				<div class="dataTables_paginate paging_simple_numbers pull-left" id="example1_paginate">
					<vuetable-pagination ref="pagination" @vuetable-pagination:change-page="onChangePage" :css="pagination">
					</vuetable-pagination>
				</div>
			</div>
			<div class="col-sm-4 col-xs-12">
				<div class="pull-right">
					<div class="input-group">
						<input v-model="search" type="text" class="form-control" placeholder="Search" @keyup.enter="onSearch(search)">
						<div class="input-group-btn">
							<button @click="onSearch(search)" class="btn btn-default" type="submit">
								<i class="glyphicon glyphicon-search"></i>
							</button>
						</div>
						<div class="input-group-btn">
							<button @click="onResetSearch" class="btn btn-default" type="submit">
								<i class="glyphicon glyphicon-remove"></i>
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<vuetable
			ref="vuetable" 
			track-by="tablePk" 
			:sort-order="defaultSort"
			:reactive-api-url.Boolean="true" 
			:fields="columns" 
			pagination-path="" 
			:api-url="url_get" 
			:css="table" 
			@vuetable:pagination-data="onPaginationData"
			:per-page="perPage">
			<template slot="aksi" slot-scope="props">
				<button data-toggle="tooltip_hapus" title="Hapus Data" @click="deleteData(props.rowData[tablePk])" type="button" class="btn btn-default btn-xs">
					<span class="glyphicon glyphicon-remove"></span>
				</button>
				<button data-toggle="tooltip_edit" title="Ubah Data" @click="getDataDetail(props.rowData[tablePk])" type="button" class="btn btn-default btn-xs">
					<span class="glyphicon glyphicon-pencil"></span>
				</button>
			</template>
		</vuetable>
		<div class="row">
			<div class="col-sm-12 col-xs-12">
				<div class="dataTables_info" id="example1_info" role="status" aria-live="polite">
					<vuetable-pagination-info ref="paginationInfo"></vuetable-pagination-info>
				</div>
			</div>
		</div>
		</div>
		</div>
	</div>
</template>

<script>
import Vuetable from 'vuetable-2/src/components/Vuetable'
import VuetablePagination from 'vuetable-2/src/components/VuetablePagination'
import VuetablePaginationInfo from 'vuetable-2/src/components/VuetablePaginationInfo'
import formGenerator from './formGenerator.vue'
import { dataMix } from './dataMix.js'
import modal from './modal.vue'

export default{
	name : 'kelolaDosen',
	components : {
		'vuetable' : Vuetable,
		'vuetable-pagination' : VuetablePagination,
		'vuetable-pagination-info' : VuetablePaginationInfo,
		'modal': modal,
		'form-generator': formGenerator
	},
	mixins : [dataMix],
	data(){
		return {
			tablePk : 'nidn',
			url_get : "http://localhost/ci318/api/dosen",
			defaultSort : [{field:"nidn",direction:"asc"}],
			columns : [
				{name: "__sequence", title:"No"},
				{name: "nidn", title:"ID", sortField : "nidn",visible:false},
				{name: "nm_dosen", title:"Nama Dosen", sortField : "nm_dosen"},
				{name: "__slot:aksi", title:"Aksi"}
			],
			form : {
				model : {
					nidn : null,
					nm_dosen : null
				},
				error : {
					nidn : null,
					nm_dosen : null
				},
				fields : [
					{
						name:'nidn',
						label:'NIDN',
						type : 'input',
						inputType : 'text'
					},
					{
						name:'nm_dosen',
						label:'Nama Dosen',
						type : 'input',
						inputType : 'text'
					}
				]
			}
		}
	}
}
</script>
