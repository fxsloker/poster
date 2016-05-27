<?php
defined('JPATH_PLATFORM') or die('Restricted acccess');

class F2cFieldHyperlink extends F2cFieldBase
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
		$html 			= '';
		$listTarget[] 	= JHTML::_('select.option', '_top', 'Parent window');
		$listTarget[] 	= JHTML::_('select.option', '_blank', 'New window');	

		$html .= '<div class="f2c_field">';	
		$html .= '<table><tr><td>'.Jtext::_('COM_FORM2CONTENT_URL').':</td><td>';
		$html .= $this->renderTextBox($this->elementId, $this->values['URL'], 40, 300, $this->settings->get('lnk_attributes_url')); 
		
		if(JFactory::getApplication()->isSite())
		{
			$html 	.= $this->renderRequiredText($contentTypeSettings);
			$html 	.= $this->getFieldDescription($translatedFields);
		}
		
		$html .= '</td></tr>';
	
		if($this->settings->get('lnk_show_display_as', 1))
		{
			$html .= '<tr>';
			$html .= '<td>'.Jtext::_('COM_FORM2CONTENT_DISPLAY_AS').':</td>';
			$html .= '<td>'.$this->renderTextBox($this->elementId.'_display', $this->values['DISPLAY_AS'], 40, 100, $this->settings->get('lnk_attributes_display_as')).'</td>';
			$html .= '</tr>';
		}

		if($this->settings->get('lnk_show_title', 1))
		{
			$html .= '<tr>';
			$html .= '<td>'.Jtext::_('COM_FORM2CONTENT_TITLE').':</td>';
			$html .= '<td>'.$this->renderTextBox($this->elementId.'_title', $this->values['TITLE'], 40, 100, $this->settings->get('lnk_attributes_title')).'</td>';		      							
			$html .= '</tr>';
		}
		
		if($this->settings->get('lnk_show_target', 1))
		{
			$html .= '<tr>';
			$html .= '<td>'.Jtext::_('COM_FORM2CONTENT_TARGET').':</td>';	      							
			$html .= '<td>'.JHTMLSelect::genericlist($listTarget, $this->elementId . '_target',$this->settings->get('lnk_attributes_target') ,'value', 'text', $this->values['TARGET']).'</td>';
			$html .= '</tr>';
		}
		
		$html .= '</table>';
		
		if(!$this->settings->get('lnk_show_display_as', 1))
		{
			$html .= $this->renderHiddenField($this->elementId.'_display', '');
		}

		if(!$this->settings->get('lnk_show_title', 1))
		{
			$html .= $this->renderHiddenField($this->elementId.'_title', '');
		}
		
		if(!$this->settings->get('lnk_show_target', 1))
		{
			$html .= $this->renderHiddenField($this->elementId.'_target', '');
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
		
		$this->values['URL'] 		= $jinput->getString($this->elementId);
		$this->values['DISPLAY_AS'] = $jinput->getString($this->elementId . '_display');
		$this->values['TITLE'] 		= $jinput->getString($this->elementId . '_title');
		$this->values['TARGET'] 	= $jinput->getString($this->elementId . '_target');
		
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
		$content 		= array();					
		$link 			= new JRegistry();
		$fieldId 		= $this->internal['fieldcontentid'];
				
		$link->set('url', $this->values['URL']);
		$link->set('display', $this->values['DISPLAY_AS']);
		$link->set('title', $this->values['TITLE']);
		$link->set('target', $this->values['TARGET']);
		
		$value 			= $link->toString();
		$action 		= ($value) ? (($fieldId) ? 'UPDATE' : 'INSERT') : (($fieldId) ? 'DELETE' : '');
		$content[] 		= new F2cFieldHelperContent($fieldId, 'VALUE', $value, $action);
		
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
		return 'lnk';
	}
	
	public function reset()
	{
		$this->values['URL'] 				= '';
		$this->values['DISPLAY_AS'] 		= '';
		$this->values['TITLE'] 				= '';
		$this->values['TARGET'] 			= '';
		$this->internal['fieldcontentid']	= null;
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
		$linkTitle = '';
		$linkTarget = '';
		$linkDisplay = '';
		$linkUrl = '';
		
		if($this->values['URL'])
		{
			$display 		= $this->values['DISPLAY_AS'] ? $this->values['DISPLAY_AS'] : $this->values['URL'];
			$linkTitle 		= $this->values['TITLE'];
			$linkTarget 	= $this->values['TARGET'];
			$linkDisplay 	= $this->values['DISPLAY_AS'];
			$linkUrl 		= $this->values['URL'];
			
			if($this->settings->get('lnk_add_http_prefix', 0))
			{
				if(!strstr($linkUrl, '://'))
				{
					$linkUrl = 'http://' . $linkUrl;
				}
			}
			
			if($this->settings->get('lnk_output_mode') == 0)
			{
				$linkTag = $linkUrl;
			}
			else
			{
				$linkTag = '<a href="' . $linkUrl . '" target="' . $this->values['TARGET'] . '" title="' . $this->values['TITLE'] . '">' . $display . '</a>';					
			}
			
			$templateEngine->addVar($this->fieldname, $linkTag);
		}
		else
		{
			$templateEngine->addVar($this->fieldname, '');
		}
		
		$templateEngine->addVar($this->fieldname.'_URL', $linkUrl);		
		$templateEngine->addVar($this->fieldname.'_TITLE', $linkTitle);		
		$templateEngine->addVar($this->fieldname.'_TARGET', $linkTarget);		
		$templateEngine->addVar($this->fieldname.'_DISPLAY', $linkDisplay);					
	}
	
	public function getTemplateParameterNames()
	{
		$names = array(	strtoupper($this->fieldname).'_URL',
						strtoupper($this->fieldname).'_TITLE', 
						strtoupper($this->fieldname).'_DISPLAY',
						strtoupper($this->fieldname).'_TARGET');
		
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
		$this->internal['fieldcontentid']	= $data->fieldcontentid;
		$values 							= new JRegistry($data->content);
		$this->values['URL'] 				= $values->get('url');
		$this->values['DISPLAY_AS'] 		= $values->get('display');
		$this->values['TITLE'] 				= $values->get('title');
		$this->values['TARGET'] 			= $values->get('target');
	}
	
	public function validate()
	{
	}	
}
