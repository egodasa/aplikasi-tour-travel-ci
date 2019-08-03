<div class="form-group">
<label>{{ isset($_data['label']) ? $_data['label'] : null }}</label>
<select  
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
  if(isset($_data['disabled'])){
    echo "disabled "; 
  }
  if(isset($_data['readonly'])){
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
