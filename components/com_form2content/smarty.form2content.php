<?php
defined('_JEXEC') or die('Restricted acccess');

if (!class_exists('Smarty')) 
{
	require_once(JPATH_SITE.DIRECTORY_SEPARATOR.'components'.DIRECTORY_SEPARATOR.'com_form2content'.DIRECTORY_SEPARATOR.'libraries'.DIRECTORY_SEPARATOR.'smarty'.DIRECTORY_SEPARATOR.'Smarty.class.php');
}

class F2C_Smarty
{
	var $templates;
	var $form;
	var $error = '';
	var $smarty = null;
	
	function F2C_Smarty()
	{
		$this->smarty 				= new Smarty();
		$this->smarty->template_dir = F2cFactory::getConfig()->get('template_path');
		$this->smarty->compile_dir 	= JFactory::getConfig()->get('tmp_path');
	}

	function parseIntro()
	{
		$parsedContent = $this->smarty->fetch($this->templates[F2C_TEMPLATE_INTRO]);		
		return $parsedContent;
	}

	function parseMain()
	{
		$parsedContent = '';
		
		if(array_key_exists(F2C_TEMPLATE_MAIN, $this->templates))
		{	
			$parsedContent = $this->smarty->fetch($this->templates[F2C_TEMPLATE_MAIN]);
		}
		
		return $parsedContent;
	}
	
	function addTemplate($templateName, $templateType)
	{
		if(!JFile::exists(Path::Combine(F2cFactory::getConfig()->get('template_path'), $templateName)))
		{
			$this->error = JText::_('COM_FORM2CONTENT_ERROR_TEMPLATE_NOT_FOUND');
			return false;
		}
		
		$this->templates[$templateType] = $templateName;
		
		return true;	
	}

	function clearTemplates()
	{
		// No action necessary
	}
		
	function addVar($name, $value)
	{
		$this->smarty->assign(strtoupper($name), $value);		
	}
	
	function clearVar($name)
	{
		$this->smarty->clearAssign(strtoupper($name));
	}
	
	
	function clearAllVars()
	{
		$this->smarty->clearAllAssign();
	}
		
	public function addFormVar($field)
	{
		// Keep the title for backward compatibility
		$this->addVar($field->fieldname.'_TITLE', HtmlHelper::stringHTMLSafe($field->title));				
		$this->addVar($field->fieldname.'_CAPTION', HtmlHelper::stringHTMLSafe($field->title));				
		$this->addVar($field->fieldname.'_DESCRIPTION', HtmlHelper::stringHTMLSafe($field->description));
						
		$field->addTemplateVar($this, $this->form);
	}
	
	function getTemplateVars($formVars, &$usedVars)
	{
		foreach($this->templates as $templateName)
		{
			$this->_getTemplateVars($templateName, $formVars, $usedVars);
		}
	}
	
	function _getTemplateVars($templateName, $formVars, &$usedVars)
	{
		$contents = file_get_contents(Path::Combine(F2cFactory::getConfig()->get('template_path'), $templateName));

		// check which vars are used within the template
		foreach($formVars as $formVarAlias => $formVarName)
		{
			if(strpos($contents, '{$'.$formVarAlias.'}') !== false)
			{
				$usedVars[] = strtoupper($formVarName);
			}

			if(strpos($contents, '{$'.$formVarAlias.'|') !== false)
			{
				$usedVars[] = strtoupper($formVarName);
			}
		}		
	} 	
}
?>