<button 
<?php
  if(isset($_data['type'])){
    echo "type='".$_data['type']."' "; 
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
  if(isset($_data['disabled'])){
    echo "disabled "; 
  }
?>>
<?php
  if(isset($_data['text'])){
    echo $_data['text']; 
  }
?>
</button>
