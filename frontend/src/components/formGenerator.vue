<template>
<div>
	<template v-for="x in fields">
		<template v-if="x.name == 'group_input'">
			<div class="row">
				<template v-for="item in x.items">
					<div :class="'col-xs-'+item.col">
						<template v-if="item.type == 'input'">
							<label :for="'formInput'+item.name">{{item.label}}</label>
							<input :type="item.inputType" class="form-control" :id="'formInput'+item.name" :min="item.min" :max="item.max" :placeholder="item.placeholder" v-model="model[item.name]" :disabled="item.disabled">
							<p class="help-block text-red">{{error[item.name]}}</p>
						</template>
						<template v-else-if="item.type == 'textarea'">
				                <label>{{item.label}}</label>
				                <textarea class="form-control" :rows="item.rows" :placeholder="item.placeholder" :disabled="item.disabled" v-model="model[item.name]"></textarea>
						</template>
						<template v-else-if="item.type == 'checkbox'">
								<div class="checkbox">
									<label>
									<input type="checkbox" v-model="model[item.name]" :disabled="item.disabled"> {{item.label}}
									</label>
								</div>
						</template>
						<template v-else-if="item.type == 'select'">
								<label>{{item.label}}</label>
								<select class="form-control" v-model="model[item.name]" :disabled="item.disabled">
									<option v-for="o in item.option" :value="o[item.name]">{{o[item.optionLabel]}}</option>
								</select>
						</template>
						<template v-else-if="item.type == 'datepicker'">
								<datepicker v-model="model[item.name]" :placeholder="item.placeholder" :label="item.label" :bootstrap-styling.Boolean="true"></datepicker>
						</template>
					</div>
				</template>
			</div>
		</template>
		<template v-else>
			<template v-if="x.type == 'input'">
			<div class="form-group">
				<label :for="'formInput'+x.name">{{x.label}}</label>
				<input :type="x.inputType" class="form-control" :id="'formInput'+x.name" :min="x.min" :max="x.max" :placeholder="x.placeholder" v-model="model[x.name]" :disabled="x.disabled">
				<p class="help-block text-red">{{error[x.name]}}</p>
			</div>
			</template>
			<template v-else-if="x.type == 'textarea'">
				<div class="form-group">
	                <label>{{x.label}}</label>
	                <textarea class="form-control" :rows="x.rows" :placeholder="x.placeholder" :disabled="x.disabled" v-model="model[x.name]"></textarea>
	            </div>
			</template>
			<template v-else-if="x.type == 'checkbox'">
				<div class="checkbox">
					<label>
					<input type="checkbox" v-model="model[x.name]" :disabled="x.disabled"> {{x.label}}
					</label>
				</div>
			</template>
			<template v-else-if="x.type == 'select'">
				<div class="form-group">
					<label>{{x.label}}</label>
					<select class="form-control" v-model="model[x.name]" :disabled="x.disabled">
						<option v-for="o in x.option" :value="o[x.name]">{{o[x.optionLabel]}}</option>
					</select>
				</div>
			</template>
			<template v-else-if="x.type == 'datepicker'">
					<datepicker :label="x.label" v-model="model[x.name]" :placeholder="x.placeholder" :bootstrap-styling.Boolean="true"></datepicker>
			</template>
		</template>
	</template>
</div>
</template>
<script>
import Datepicker from 'vuejs-datepicker';
export default {
	components : {
		Datepicker
	},
	props : {
		fields : { //Object -> name, label, hint, placeholder
			type : Array,
			required : true
		},
		model : { //Object -> berasal dari prop fields (pada name)
			type : Object,
			required : true
		},
		error : { // Sama dengan model
			type : Object,
			required : true
		}
	}
}
</script>
