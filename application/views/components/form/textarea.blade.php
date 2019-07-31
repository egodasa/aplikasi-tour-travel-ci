<div class="form-group">
<label>{{ isset($_data['label']) ? $_data['label'] : null }}</label>
<textarea
 <?php
if(isset($_data['placeholder'])){
	echo "placeholder='".$_data['placeholder']."' "; 
}
if(isset($_data['class'])){
	echo "class='".$_data['class']."' "; 
}
if(isset($_data['name'])){
	echo "name='".$_data['name']."' "; 
}
if(isset($_data['id'])){
	echo "id='".$_data['id']."' "; 
}
if(isset($_data['min'])){
	echo "min='".$_data['min']."' "; 
}
if(isset($_data['max'])){
	echo "max='".$_data['max']."' "; 
}
if(isset($_data['size'])){
	echo "size='".$_data['size']."' "; 
}
if(isset($_data['disabled'])){
	echo "disabled "; 
}
if(isset($_data['readonly'])){
	echo "readonly "; 
}
 ?>
>
<?php
if(isset($_data['value'])){
	echo $_data['value']; 
}
?>
</textarea>
</div>
