<?php
defined('JPATH_PLATFORM') or die('Restricted acccess');

class F2cFieldMultilinetext extends F2cFieldBase
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
			$parms = JFactory::getApplication()->isSite() ? array('cols="50" rows="5" style="width:500px; height:120px"') : array('cols="100" rows="6"');
		}
		
		$html 					= '';
		$fieldHtml 				= '';
		$attribs				= '';
		$maxNumChars 			= (int)$this->settings->get('mlt_max_num_chars');		
		$value 					= $this->values['VALUE'];
		
		if((int)$this->settings->get('mlt_num_rows')) $attribs .= ' rows="'.(int)$this->settings->get('mlt_num_rows').'"';
		if((int)$this->settings->get('mlt_num_cols')) $attribs .= ' cols="'.(int)$this->settings->get('mlt_num_cols').'"';		
		if($this->settings->get('mlt_attributes')) $attribs .= ' '.$this->settings->get('mlt_attributes');

		if(!$attribs)
		{
			$attribs = $parms[0];
			$attribs .= ' class="text_area"';			
		}
		
		$fieldHtml .= ' '.$attribs;
		
		if($maxNumChars)
		{
			if(function_exists('mb_substr_count') && function_exists('mb_substr') && function_exists('mb_strlen'))
			{
				$numNewLines = mb_substr_count($value, "\r\n", 'UTF-8');
				$charsRemaining = $maxNumChars + $numNewLines - mb_strlen($value, 'UTF-8');			
				$fieldValue = mb_substr($value, 0, $maxNumChars + $numNewLines, 'UTF-8');
			}
			else
			{
				$numNewLines = substr_count($value, "\r\n");
				$charsRemaining = $maxNumChars + $numNewLines - strlen($value);			
				$fieldValue = substr($value, 0, $maxNumChars + $numNewLines);
			}
			
			if($charsRemaining < 0)
			{
				$charsRemaining = 0;
			}
			
			$fieldHtml .= ' onKeyDown="F2C_limitTextArea(this.form.'.$this->elementId.',this.form.'.$this->elementId .'remLen,'.$maxNumChars.');" onKeyUp="F2C_limitTextArea(this.form.' . $this->elementId . ',this.form.'.$this->elementId .'remLen,'.$maxNumChars.');"';
		}

		$html .= '<div class="f2c_field">';	
		$html .= '<textarea name="'.$this->elementId.'" id="'.$this->elementId.'"'.$fieldHtml.'>'.$value.'</textarea>';
		
		if($maxNumChars)
		{
			$html .= '<div style="clear:both;"><input readonly type="text" name="'.$this->elementId .'remLen" size="6" width="6" value="'.$charsRemaining.'" class="mlt_charsleft"> '.Jtext::_('COM_FORM2CONTENT_CHARACTERS_LEFT').'</div>';		
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
		
		if((int)$this->settings->get('mlt_max_num_chars'))
		{
			if(function_exists('mb_substr_count') && function_exists('mb_substr'))
			{
				$numNewLines = mb_substr_count ($value, "\r\n", 'UTF-8');
				$value = mb_substr($value, 0, (int)$this->settings->get('mlt_max_num_chars') + $numNewLines, 'UTF-8');
			}
			else
			{
				$numNewLines = substr_count ($value, "\r\n");
				$value = substr($value, 0, (int)$this->settings->get('mlt_max_num_chars') + $numNewLines);
			}
		}
							
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
		return 'mlt';
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
		$templateEngine->addVar($this->fieldname, nl2br($this->stringHTMLSafe($this->values['VALUE'])));
		$templateEngine->addVar($this->fieldname .'_RAW', nl2br($this->values['VALUE']));
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
