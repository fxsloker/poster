<?php
defined('JPATH_PLATFORM') or die('Restricted acccess');

class F2cFieldSingleselectlist extends F2cFieldBase
{
	function __construct($field)
	{
		$this->reset();
		parent::__construct($field);
	}
	
	/**
	 * Method to render the field.
	 * All children of this class must implement this function.
	 *
	 * @param	array		$translatedFields		Array of field translations
	 * @param	array		$contentTypeSettings	Array containing settings for the Content Type
	 * @param	array		$parms					Array with additional parameters
	 * @param	JForm		$form					Form object
	 * @param	int			$formId					Id of the current form
	 * 
	 * @return  string		HTML containing the rendered field
	 * 
	 * @since   5.5.0
	 */
	public function render($translatedFields, $contentTypeSettings, $parms = array(), $form, $formId)
	{
		$html			= '';
		$fieldValue		= $this->values['VALUE'];		
		$listOptions 	= null;
		$translate 		= $this->f2cConfig->get('custom_translations', false);

		$html .= '<div class="f2c_field">';
		
		if($this->settings->get('ssl_show_empty_choice_text'))
		{ 
			$emptyText = $translate ? JText::_($this->settings->get('ssl_empty_choice_text')) : $this->settings->get('ssl_empty_choice_text');
			$listOptions[] = JHTML::_('select.option', '', $emptyText);
		}
			     				
		if(count((array)$this->settings->get('ssl_options')))
		{
			foreach((array)$this->settings->get('ssl_options') as $key => $value)
			{ 
				$optionValue = $translate ? JText::_($value) : $value;
				$listOptions[] = JHTML::_('select.option', $key, $optionValue);  	
			}			
		}
		
		if((int)$this->settings->get('ssl_display_mode') == 0)
		{
			$html .= JHTMLSelect::genericlist($listOptions, $this->elementId, $this->settings->get('ssl_attributes'), 'value', 'text', $fieldValue);
		}
		else
		{  
			$html .= '<fieldset class="radio">' . JHTML::_('select.radiolist', $listOptions, $this->elementId, 'class="radiobutton"', 'value', 'text', $fieldValue) . '</fieldset>';
		}
		
		if(JFactory::getApplication()->isSite())
		{
			$html 	.= $this->renderRequiredText($contentTypeSettings);
			$html 	.= $this->getFieldDescription($translatedFields);
		}
		
		$html .= $this->renderHiddenField('hid'.$this->elementId, $this->internal['fieldcontentid']);
		
		$html .= '</div>';
		
		return $html;
	}	
	
	/**
	 * Method to convert the submitted (post) data into the internal field data structure.
	 * All children of this class must implement this function.
	 *
	 * @param	int			$formId			Id of the current form
	 * 
	 * @return  void
	 * 
	 * @since   5.5.0
	 */
	public function prepareSubmittedData($formId)
	{
		$jinput = JFactory::getApplication()->input;
		
		$this->internal['fieldcontentid'] = $jinput->getInt('hid'.$this->elementId);
		$this->values['VALUE'] = $jinput->get($this->elementId, '', 'RAW');		
		
		return $this;
	}
	
	/**
	 * Method to create an array of F2cFieldHelperContent objects to pass to the storage engine.
	 * All children of this class must implement this function.
	 *
	 * @param	int			$formId			Id of the current form
	 * 
	 * @return  array		Array of F2cFieldHelperContent objects
	 * 
	 * @since   5.5.0
	 */
	public function store($formId)
	{
		$content 	= array();					
		$value 		= $this->values['VALUE'];
		$fieldId 	= $this->internal['fieldcontentid'];
		$action 	= ($value) ? (($fieldId) ? 'UPDATE' : 'INSERT') : (($fieldId) ? 'DELETE' : '');
		$content[] 	= new F2cFieldHelperContent($fieldId, 'VALUE', $value, $action);
		
		return $content;		
	}
	
	/**
	 * Method to get the unique prefix for the current field.
	 * All children of this class must implement this function.
	 *
	 * @return  string	The Prefix for the field
	 * 
	 * @since   5.5.0
	 */
	public function getPrefix()
	{
		return 'ssl';
	}
	
	/**
	 * Method to add field specific template parameters.
	 * All children of this class must implement this function.
	 *
	 * @param	object		$smarty		Template engine object
	 * @param	JForm		$form		Form object
	 * 
	 * @return  void
	 * 
	 * @since   5.5.0
	 */
	public function addTemplateVar($templateEngine, $form)
	{
		$options 	= (array)$this->settings->get('ssl_options');
		$fieldText 	= '';					
		$fieldValue	= '';					
		
		if($this->values['VALUE'])
		{
			$fieldValue = $this->values['VALUE'];
			
			// TODO: why doesn't array_key_exists work here?
			foreach($options as $key => $value)
			{
				if($key == $fieldValue)
				{
					$fieldText = $value;
					break;
				}
			}
		}
		
		$fieldText = JText::_($fieldText);
		
		$templateEngine->addVar($this->fieldname, $fieldValue);
		$templateEngine->addVar($this->fieldname.'_TEXT', $fieldText);
	}
	
	public function getTemplateParameterNames()
	{
		$names = array(strtoupper($this->fieldname).'_TEXT');
		
		return array_merge($names, parent::getTemplateParameterNames());
	}
	
	/**
	 * Method to fill the field data structure from an external data structure. 
	 * (called from createFormDataObjects)
	 * All children of this class must implement this function.
	 *
	 * @param	object		$data	Data structure containing the form data
	 * 
	 * @return  void
	 * 
	 * @since   5.5.0
	 */
	public function setData($data)
	{
		if($data->attribute)
		{
			$this->values[$data->attribute] 	= $data->content;
			$this->internal['fieldcontentid'] 	= $data->fieldcontentid;
		}
	}
	
	public function validate()
	{
	}
}
