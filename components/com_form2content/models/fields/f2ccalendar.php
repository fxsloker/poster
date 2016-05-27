<?php
defined('JPATH_BASE') or die;

jimport('joomla.html.html');
jimport('joomla.form.formfield');

class JFormFieldF2cCalendar extends JFormField
{
	public $type = 'F2cCalendar';

	protected function getInput()
	{
		// Initialize some field attributes.
		$format = $this->element['format'] ? (string) $this->element['format'] : '%Y-%m-%d';
		
		if (strtolower($this->element['classiclayout']) == 'false' || empty($this->element['classiclayout']))
		{
			$classicLayout = false;
		}
		else 
		{
			$classicLayout = true;
		}
		
		// Build the attributes array.
		$attributes = array();
		if ($this->element['size']) {
			$attributes['size'] = (int) $this->element['size'];
		}
		if ($this->element['maxlength']) {
			$attributes['maxlength'] = (int) $this->element['maxlength'];
		}
		if ($this->element['class']) {
			$attributes['class'] = (string) $this->element['class'];
		}
		if ((string) $this->element['readonly'] == 'true') {
			$attributes['readonly'] = 'readonly';
		}
		if ((string) $this->element['disabled'] == 'true') {
			$attributes['disabled'] = 'disabled';
		}
		if ($this->element['onchange']) {
			$attributes['onchange'] = (string) $this->element['onchange'];
		}

		// Handle the special case for "now".
		if (strtoupper($this->value) == 'NOW') {
			$this->value = strftime($format);
		}

		// Get some system objects.
		$config 	= JFactory::getConfig();
		$user		= JFactory::getUser();
		$date		= JFactory::getDate($this->value);
		$nullDate 	= JFactory::getDbo()->getNullDate();
		$valueRaw	= $this->value;
		
		if($this->value != $nullDate)
		{
			// If a known filter is given use it.
			switch (strtoupper((string) $this->element['filter']))
			{
				case 'SERVER_UTC':
					// Convert a date to UTC based on the server timezone.
					if (intval($this->value)) {
						// Get a date object based on the correct timezone.
						$date = JFactory::getDate($this->value, 'UTC');
						$date->setTimezone(new DateTimeZone($config->get('offset')));
					}
					break;
	
				case 'USER_UTC':
				case 'FORM2CONTENTHELPER::FILTERUSERUTCWITHFORMAT':
					// Convert a date to UTC based on the user timezone.			
					if (intval($this->value)) 
					{
						// Get a date object based on the correct timezone.
						$date = JFactory::getDate($this->value, 'UTC');
						$date->setTimezone(new DateTimeZone($user->getParam('timezone', $config->get('offset'))));
					}
					break;
			}
			
			// Apply the correct formatting to the value
			$dateFormat = str_replace('%','', $format) . ' H:i:s';
			$this->value = $date->format($dateFormat, true);
		}
		else 
		{
			// nulldate
			$this->value = '';
		}
				
		return HtmlHelper::renderCalendar($this->value, $valueRaw, $this->name, $this->id, $format, $attributes, $classicLayout);
	}
}