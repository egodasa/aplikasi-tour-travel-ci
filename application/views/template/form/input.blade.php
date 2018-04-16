<input
 <?php
if(!empty($data['type'])){
	echo "type='".$data['type']."' "; 
}
if(!empty($data['placeholder'])){
	echo "placeholder='".$data['placeholder']."' "; 
}
if(!empty($data['value'])){
	echo "value='".$data['value']."' "; 
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
if(!empty($data['min'])){
	echo "min='".$data['min']."' "; 
}
if(!empty($data['max'])){
	echo "max='".$data['max']."' "; 
}
if(!empty($data['size'])){
	echo "size='".$data['size']."' "; 
}
if(!empty($data['disabled'])){
	echo "disabled "; 
}
if(!empty($data['readonly'])){
	echo "readonly "; 
}
 ?>
 />
