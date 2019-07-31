<div class="form-group">
<label>{{ isset($_data['label']) ? $_data['label'] : null }}</label>
<select  
<?php
  if(isset($data['placeholder'])){
    echo "placeholder='".$data['placeholder']."' "; 
  }
  if(isset($data['class'])){
    echo "class='".$data['class']."' "; 
  }
  if(isset($data['name'])){
    echo "name='".$data['name']."' "; 
  }
  if(isset($data['id'])){
    echo "id='".$data['id']."' "; 
  }
  if(isset($data['disabled'])){
    echo "disabled "; 
  }
  if(isset($data['readonly'])){
    echo "readonly "; 
  }
?> >

<?php
  $_val = $_data['val'];
  $_cap = $_data['caption'];
  foreach($_data['options'] as $o)
  {
    if(isset($_data['value']) && $o[$_val] == $_data['value'])
    {
  ?>
    <option value="<?=$o[$_val]?>" selected><?=$o[$_cap]?></option>
  <?php
    }
    else
    {
  ?>
    <option value="<?=$o[$_val]?>"><?=$o[$_cap]?></option>
  <?php
    }
  }
?>
</select>
</div>
