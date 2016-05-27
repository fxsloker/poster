<?php
defined('_JEXEC') or die();

require_once(JPATH_COMPONENT_SITE.DIRECTORY_SEPARATOR.'utils.form2content.php');

jimport('joomla.application.component.modellist');
jimport('joomla.filesystem.folder');

class Form2ContentModelTemplates extends JModelList
{
	public function getItems()
	{
		$templatePath = F2cFactory::getConfig()->get('template_path');
		$arrFiles = array();
		
		if(JFolder::exists($templatePath))
		{
			$files = JFolder::files($templatePath);
			
			if($files)
			{
				foreach($files as $file)	
				{
					// base key on lowerstring for sorting purposes
					$arrFiles[strtolower($file)] = new F2C_FileInfo($templatePath, $file);					
				}
				
				// sort the files alphabetically
				ksort($arrFiles);								
			}			
		}

		return $arrFiles;		
	}
}
?>