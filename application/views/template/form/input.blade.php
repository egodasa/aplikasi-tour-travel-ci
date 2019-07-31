<input 
{{ isset($_data['type']) ? "type=".$_data['type']." " : null }} 
{{ isset($_data['value']) ? "value=".$_data['value']." " : null }} 
{{ isset($_data['placeholder']) ? "placeholder=".$_data['placeholder']." " : null }} 
{{ isset($_data['class']) ? "class=".$_data['class']." " : null }} 
{{ isset($_data['name']) ? "name=".$_data['name']." " : null }} 
{{ isset($_data['id']) ? "id=".$_data['id']." " : null }} 
{{ isset($_data['min']) ? "min=".$_data['min']." " : null }} 
{{ isset($_data['max']) ? "max=".$_data['max']." " : null }} 
{{ isset($_data['size']) ? "max=".$_data['size']." " : null }} 
{{ isset($_data['disabled']) ? "disabled" : null }} 
{{ isset($_data['readonly']) ? "readonly" : null }} />
