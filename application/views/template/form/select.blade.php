<select 
<?php
$selected = '';
if(!empty($data['placeholder'])){
	echo "placeholder='".$data['placeholder']."' "; 
}
if(!empty($data['value'])){
	echo "value='".$data['value']."' "; 
}else{
	$data['value'] = '';
}
if(!empty($data['class'])){
	echo "class='".$data['class']."' "; 
}
if(!empty($data['name'])){
	echo "name='".$data['name']."' "; 
}
if(!empty($data['id'])){
	echo "id='".$data['id']."' "; 
}
if(!empty($data['disabled'])){
	echo "disabled "; 
}
if(!empty($data['readonly'])){
	echo "readonly "; 
}
 ?>
>
@foreach($data['options'] as $option)
	@if($option['value'] == $data['value'])
		<option value="{{ $option['value'] }}" selected>{{ $option['text'] }}</option>
	@else
		<option value="{{ $option['value'] }}" >{{ $option['text'] }}</option>
	@endif
@endforeach
</select>
