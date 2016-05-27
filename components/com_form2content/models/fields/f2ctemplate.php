<?php
defined('JPATH_BASE') or die;

jimport('joomla.form.formfield');

class JFormFieldF2cTemplate extends JFormField
{
	/**
	 * The form field type.
	 *
	 * @var		string
	 * @since	1.6
	 */
	public $type = 'F2cTemplate';

	protected function getInput()
	{
		$app 	= JFactory::getApplication();
		$doc 	= JFactory::getDocument();
		$link	= '';
		
		if($app->isAdmin())
		{
			$link .= JURI::root();
		}
		
		// add css for the icon
		$doc->addStyleDeclaration('.icon-template:before { content: "k"; }');
		
		$link .= 'index.php?option=com_form2content&amp;task=templates.select&amp;view=templates&amp;layout=modal&amp;tmpl=component&amp;field='.$this->id;
		
		// Initialize JavaScript field attributes.
		$onchange = (string) $this->element['onchange'];

		if (strtolower($this->element['classiclayout']) == 'false' || empty($this->element['classiclayout']))
		{
			$classicLayout = false;
		}
		else 
		{
			$classicLayout = true;
		}
						
		// Load the modal behavior script.
		JHtml::_('behavior.modal', 'a.modal_'.$this->id);

		// Build the script.
		$script = array();
		$script[] = '	function jSelectF2cTemplate_'.$this->id.'(id) {';
		$script[] = '		var old_id = document.getElementById("'.$this->id.'_id").value;';
		$script[] = '		if (old_id != id) {';
		$script[] = '			document.getElementById("'.$this->id.'_id").value = id;';
		$script[] = '			document.getElementById("'.$this->id.'_name").value = id;';
		$script[] = '			'.$onchange;
		$script[] = '		}';
		$script[] = '		SqueezeBox.close();';
		$script[] = '	}';

		// Add the script to the document head.
		JFactory::getDocument()->addScriptDeclaration(implode("\n", $script));
		
		// Initialize some field attributes.
		$attr = $this->element['class'] ? ' class="'.(string) $this->element['class'].'"' : '';
		$attr .= $this->element['size'] ? ' size="'.(int) $this->element['size'].'"' : '';

		if($classicLayout)
		{
			// Create a dummy text field with the user name.
			$html[] = '<div class="fltlft">';
			$html[] = '	<input type="text" id="'.$this->id.'_name"' .
						' value="'.htmlspecialchars($this->value, ENT_COMPAT, 'UTF-8').'"' .
						' disabled="disabled"'.$attr.' />';
			$html[] = '</div>';
			
			// Create the template select button.
			$html[] = '<div class="button2-left">';
			$html[] = '  <div class="blank">';
			
			if ($this->element['readonly'] != 'true') 
			{ 
				$html[] = '		<a class="modal_'.$this->id.'" title="'.JText::_('COM_FORM2CONTENT_SELECT_TEMPLATE').'"' .
								' href="'.$link.'"' .
								' rel="{handler: \'iframe\', size: {x: 800, y: 500}}">';
				$html[] = '			'.JText::_('COM_FORM2CONTENT_SELECT_TEMPLATE').'</a>';
			}
			
			$html[] = '  </div>';
			$html[] = '</div>';
		}
		else 
		{
			// Create a dummy text field with the user name.
			$html[] = '<div class="input-append">';
			$html[] = '	<input type="text" id="'.$this->id.'_name"' .
						' value="'.htmlspecialchars($this->value, ENT_COMPAT, 'UTF-8').'"' .
						' disabled="disabled"'.$attr.' />';
			
			// Create the template select button.		
			if ($this->element['readonly'] != 'true') 
			{ 
				$html[] = '		<a class="btn btn-primary modal_' . $this->id . '" title="' . JText::_('COM_FORM2CONTENT_SELECT_TEMPLATE') . '"' . ' href="' . $link . '"'
					. ' rel="{handler: \'iframe\', size: {x: 800, y: 500}}">';				
				$html[] = '<i class="icon-template"></i></a>';
			}
			
			$html[] = '</div>';
		}
				
		// Create the real field, hidden, that stored the user id.
		$html[] = '<input type="hidden" id="'.$this->id.'_id" name="'.$this->name.'" value="'.htmlspecialchars($this->value).'" />';

		return implode("\n", $html);		
	}
}
?>
