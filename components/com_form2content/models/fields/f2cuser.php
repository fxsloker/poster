<?php
defined('JPATH_BASE') or die;

jimport('joomla.form.formfield');

/**
 * Field to select a user id from a modal list.
 *
 * @since		4.0.0
 */
class JFormFieldF2cUser extends JFormField
{
	/**
	 * The form field type.
	 *
	 * @var		string
	 * @since	4.0.0
	 */
	public $type = 'F2cUser';

	/**
	 * Method to get the field input markup.
	 *
	 * @return	string	The field input markup.
	 * @since	4.0.0
	 */
	protected function getInput()
	{
		// Initialize variables.
		$html 			= array();
		$groups 		= $this->getGroups();
		$excluded 		= $this->getExcluded();

		if (strtolower($this->element['classiclayout']) == 'false' || empty($this->element['classiclayout']))
		{
			$classicLayout = false;
		}
		else 
		{
			$classicLayout = true;
		}
				
		$link = 'index.php?option=com_form2content&amp;task=users.display&amp;view=users&amp;layout=modal&amp;tmpl=component&amp;field='.$this->id.(isset($groups) ? ('&amp;groups='.base64_encode(json_encode($groups))) : '').(isset($excluded) ? ('&amp;excluded='.base64_encode(json_encode($excluded))) : '');

		// Initialize some field attributes.
		$attr = $this->element['class'] ? ' class="'.(string) $this->element['class'].'"' : '';
		$attr .= $this->element['size'] ? ' size="'.(int) $this->element['size'].'"' : '';

		// Initialize JavaScript field attributes.
		$onchange = (string) $this->element['onchange'];

		// Load the modal behavior script.
		JHtml::_('behavior.modal', 'a.modal_'.$this->id);

		// Build the script.
		$script = array();
		$script[] = '	function jSelectUser_'.$this->id.'(id, title) {';
		$script[] = '		var old_id = document.getElementById("'.$this->id.'_id").value;';
		$script[] = '		if (old_id != id) {';
		$script[] = '			document.getElementById("'.$this->id.'_id").value = id;';
		$script[] = '			document.getElementById("'.$this->id.'_name").value = title;';
		$script[] = '			'.$onchange;
		$script[] = '		}';
		$script[] = '		SqueezeBox.close();';
		$script[] = '	}';

		// Add the script to the document head.
		JFactory::getDocument()->addScriptDeclaration(implode("\n", $script));

		// Load the current username if available.
		$table = JTable::getInstance('user');
		if ($this->value) {
			$table->load($this->value);
		} else {
			$table->username = JText::_('JLIB_FORM_SELECT_USER');
		}

		if($classicLayout)
		{
			// Create a dummy text field with the user name.
			$html[] = '<div class="fltlft">';
			$html[] = '	<input type="text" id="'.$this->id.'_name"' .
						' value="'.htmlspecialchars($table->username, ENT_COMPAT, 'UTF-8').'"' .
						' disabled="disabled"'.$attr.' />';
			$html[] = '</div>';
	
			// Create the user select button.
			$html[] = '<div class="button2-left">';
			$html[] = '  <div class="blank">';
			if ($this->element['readonly'] != 'true') {
				$html[] = '		<a class="modal_'.$this->id.'" title="'.JText::_('JLIB_FORM_CHANGE_USER').'"' .
								' href="'.$link.'"' .
								' rel="{handler: \'iframe\', size: {x: 800, y: 500}}">';
				$html[] = '			'.JText::_('JLIB_FORM_CHANGE_USER').'</a>';
			}
			$html[] = '  </div>';
			$html[] = '</div>';
		}
		else 
		{
			// Create a dummy text field with the user name.
			$html[] = '<div class="input-append">';
			$html[] = '	<input class="input-medium" type="text" id="'.$this->id.'_name"' .
						' value="'.htmlspecialchars($table->username, ENT_COMPAT, 'UTF-8').'"' .
						' disabled="disabled"'.$attr.' />';
			// Create the user select button.
			if ($this->element['readonly'] != 'true') {
				
				$html[] = '<a class="btn btn-primary modal_' . $this->id . '" title="' . JText::_('JLIB_FORM_CHANGE_USER') . '"' . ' href="' . $link . '"'
					. ' rel="{handler: \'iframe\', size: {x: 800, y: 500}}">';
				$html[] = '<i class="icon-user"></i></a>';
				
			}
			$html[] = '</div>';			
		}		

		// Create the real field, hidden, that stored the user id.
		$html[] = '<input type="hidden" id="'.$this->id.'_id" name="'.$this->name.'" value="'.(int) $this->value.'" />';

		return implode("\n", $html);
	}

	/**
	 * Method to get the filtering groups (null means no filtering)
	 *
	 * @return	array|null	array of filtering groups or null.
	 * @since	1.6
	 */
	protected function getGroups()
	{
		return null;
	}

	/**
	/**
	 * Method to get the users to exclude from the list of users
	 *
	 * @return	array|null array of users to exclude or null to to not exclude them
	 * @since	1.6
	 */
	protected function getExcluded()
	{
		return null;
	}
}