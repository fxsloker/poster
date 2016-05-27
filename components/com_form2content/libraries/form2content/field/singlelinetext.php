<?php
defined('JPATH_PLATFORM') or die('Restricted acccess');

class F2cFieldSinglelinetext extends F2cFieldBase
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
		if(!count($parms))
		{
			$parms = JFactory::getApplication()->isSite() ? array(50, 100) : array(100, 100);
		}
		
		$html			= '';
		$value 			= $this->values['VALUE'];
		$size			= $this->settings->get('slt_size', $parms[0]);	
		$maxLength		= $this->settings->get('slt_max_length', $parms[1]);	
		$attributes		= $this->settings->get('slt_attributes');	
		$htmlInputType	= $this->settings->get('html_inputtype', 'text');
		
		$html .= '<div class="f2c_field">';
		$html .= $this->renderTextBox($this->elementId, $value, $size, $maxLength, $attributes, $htmlInputType);
		
		if(JFactory::getApplication()->isSite())
		{
			$html .= $this->getFieldDescription($translatedFields);
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
		$value 		= isset($this->values['VALUE']) ? $this->values['VALUE'] : '';
		$fieldId 	= $this->internal['fieldcontentid'];
		$action 	= ($value != '') ? (($fieldId) ? 'UPDATE' : 'INSERT') : (($fieldId) ? 'DELETE' : '');
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
		return 'slt';
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
		$templateEngine->addVar($this->fieldname, $this->stringHTMLSafe($this->values['VALUE']));
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
