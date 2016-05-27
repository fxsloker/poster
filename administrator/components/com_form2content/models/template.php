<?php
defined('JPATH_PLATFORM') or die('Restricted acccess');

require_once(JPATH_COMPONENT_SITE.DIRECTORY_SEPARATOR.'shared.form2content.php');

jimport('joomla.application.component.model');
jimport('joomla.filesystem.file');

class Form2ContentModelTemplate extends JModelLegacy
{
	protected $text_prefix = 'COM_FORM2CONTENT';
	protected $id;
	
	public function getItem()
	{
		$jinput 	= JFactory::getApplication()->input;		
		$this->id 	= $jinput->getString('id');
		
		if(!$this->id)
		{
			$cid = $jinput->get('cid', array(), 'array');

			if (!is_array($cid) || count($cid) < 1) 
			{
				JFactory::getApplication()->enqueueMessage(JText::_($this->text_prefix.'_NO_ITEM_SELECTED'), 'notice');
			}
			
			$this->id = $cid[0];
		}
	
		$templateFile = Path::Combine(F2cFactory::getConfig()->get('template_path'), $this->id);
		return file_get_contents($templateFile);		
	}
	
	function save()
	{
		$jinput 	= JFactory::getApplication()->input;
		$filename 	= Path::Combine(F2cFactory::getConfig()->get('template_path'), $jinput->get('id'));
		$template 	= $jinput->get('template', '','RAW');

		if($this->detectUTF8($template))
		{
			// check if BOM is present
			$utf8bom = "\xEF\xBB\xBF";
			$pos = strpos($template, $utf8bom);
			
			if($pos === false)
			{
				$template = $utf8bom . $template;
			}
		}		
		 
		return JFile::write($filename, $template);
	}
	
	function delete($cid)
	{
		$result = true;
	
		foreach($cid as $id)
		{
			$file = Path::Combine(F2cFactory::getConfig()->get('template_path'), $id);
		
			if(!JFile::exists($file))
			{
				$this->setError(JText::_('COM_FORM2CONTENT_ERROR_TEMPLATE_NOT_FOUND'). ': '. $id);
				$result = false;
				break;
			}
			
			if(!JFile::delete($file))
			{
				$this->setError(JText::_('COM_FORM2CONTENT_ERROR_TEMPLATE_DELETE'). ': '. $id);
				$result = false;
			}
		}
		
		return $result;
	}
	
	function upload()
	{
		$jinput	= JFactory::getApplication()->input;
		$file 	= $jinput->files->get('upload', null, 'raw');
		
		if(empty($file['name'])) 
		{
			$this->setError(JText::_('COM_FORM2CONTENT_ERROR_TEMPLATE_FILE_UPLOAD_EMPTY'));
			return false;
		}

		$templateFile = Path::Combine(F2cFactory::getConfig()->get('template_path'), strtolower($file['name']));
		
		if(JFile::exists($templateFile)) 
		{
			$this->setError(JText::_('COM_FORM2CONTENT_ERROR_TEMPLATE_FILE_UPLOAD_EXISTS'));
			return false;
		}

		if(strtolower(JFile::getExt($templateFile)) != 'tpl')
		{
			$this->setError(JText::_('COM_FORM2CONTENT_ERROR_TEMPLATE_FILE_UPLOAD_INVALID_FILE_TYPE'));
			return false;			
		}
		
		if(!JFile::upload($file['tmp_name'], $templateFile))
		{
			$this->setError(JText::_('COM_FORM2CONTENT_ERROR_TEMPLATE_FILE_UPLOAD_FAILED'));
			return false;			
		}

		JPath::setPermissions($templateFile);			
		return true;
	}

	private function detectUTF8($string)
	{
	    return preg_match('%(?:
	        [\xC2-\xDF][\x80-\xBF]             # non-overlong 2-byte
	        |\xE0[\xA0-\xBF][\x80-\xBF]        # excluding overlongs
	        |[\xE1-\xEC\xEE\xEF][\x80-\xBF]{2} # straight 3-byte
	        |\xED[\x80-\x9F][\x80-\xBF]        # excluding surrogates
	        |\xF0[\x90-\xBF][\x80-\xBF]{2}     # planes 1-3
	        |[\xF1-\xF3][\x80-\xBF]{3}         # planes 4-15
	        |\xF4[\x80-\x8F][\x80-\xBF]{2}     # plane 16
	        )+%xs', 
	    $string);
	}
	
}
?>