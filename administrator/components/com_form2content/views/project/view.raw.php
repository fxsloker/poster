<?php
defined('_JEXEC') or die('Restricted acccess');

jimport('joomla.application.component.view');

require_once(JPATH_COMPONENT_SITE.DIRECTORY_SEPARATOR.'libraries'.DIRECTORY_SEPARATOR.'SimpleXMLExtended.php');

class Form2ContentViewProject extends JViewLegacy
{
	function display($tpl = null)
	{
		$version 			= new JVersion;
		$id					= JFactory::getApplication()->input->getInt('id');
		$model 				= $this->getModel();
		$this->item			= $model->getItem($id);
		$fields				= $model->getFieldDefinitions($id);
		$componentInfo 		= JInstaller::parseXMLInstallFile(JPATH_COMPONENT.DIRECTORY_SEPARATOR.'manifest.xml');
		$componentVersion 	= $componentInfo['version'];		
		$filename 			= $this->item->title . '_f2c_lite_' . $componentVersion . '_'.$version->getShortVersion().'.xml';
		 
		ob_end_clean();
		$document = JFactory::getDocument();		
		$document->setMimeEncoding('text/xml');
		
		header('Content-Disposition: attachment; filename="' . $filename . '"');
	
		$xml = new SimpleXMLExtended('<?xml version="1.0" encoding="UTF-8" standalone="yes"?><contenttype></contenttype>');
		
		$xml->addChild('title', $this->item->title);
		$xml->addChild('version', $componentVersion);
		$xml->addChild('published', $this->item->published);
		$xml->addChild('metakey', $this->item->metakey);
		$xml->addChild('metadesc', $this->item->metadesc);

      	$xmlSettings = $xml->addChild('settings');      	
      	$this->addArrayToXml($xmlSettings, $this->item->settings);

      	$xmlAttribs = $xml->addChild('attribs');      	
      	$this->addArrayToXml($xmlAttribs, $this->item->attribs);
      	
     	$xmlMetadata = $xml->addChild('metadata');      	
      	$this->addArrayToXml($xmlMetadata, $this->item->metadata);
      	
      	$xmlFields = $xml->addChild('fields');
      			
      	if(count($fields))
      	{
      		foreach($fields as $field)
      		{
      			$xmlField = $xmlFields->addChild('field');
      			
      			$xmlField->addChild('fieldname', $field->fieldname);
     			$xmlField->addChild('title', $field->title);
      			$xmlField->addChild('description', $field->description);
     			$xmlField->addChild('fieldtypeid', $field->fieldtypeid);
      			$xmlField->addChild('ordering', $field->ordering);
     			$xmlField->addChild('frontvisible', $field->frontvisible);
      			     			     			
      			$xmlFieldSettings = $xmlField->addChild('settings');
      			
      			if($field->settings)
      			{
      				$this->addRegistryToXml($xmlFieldSettings, $field->settings);
      			}
      		}	
      	}
      	
      	$xmlIntroTemplateFile = $xml->addChild('introtemplatefile');
      	$xmlIntroTemplateFile->addCData($this->getTemplateContents($this->item->settings['intro_template']));
      	$xmlMainTemplateFile = $xml->addChild('maintemplatefile');
      	$xmlMainTemplateFile->addCData($this->getTemplateContents($this->item->settings['main_template']));

		echo $xml->asXML();
	}
	
	/*
	 * Convert an array to an XML structure
	 */
	function addArrayToXml($node, $array, $keyIsElement = true)
	{
		if(count($array))
		{
			foreach($array as $key => $value)
			{
				if($keyIsElement)
				{					
					if(is_array($value))
					{
						// The array key is the element name
						$xmlElement = $node->addChild($key);
						self::addArrayToXml($xmlElement, $value, false);
					}
					else 
					{
						$node->addChild($key, self::valueReplace($value));
					}
				}
				else
				{
					// 'key' is the element name. Use this when $key might 
					// not be a valid XML element name
					$xmlArrayElement	= $node->addChild('arrayelement');
					
					$xmlArrayElement->addChild('key', $key);
					$xmlArrayElement->addChild('value', self::valueReplace($value));
				}
			}
		}
	}
	
	function addRegistryToXml($node, $registry)
	{
		$this->addArrayToXml($node, $registry->toArray());
	}
	
	function getTemplateContents($template)
	{
      	$contents = '';
      	$templateFile = Path::Combine(F2cFactory::getConfig()->get('template_path'), $template);

      	if(JFile::exists($templateFile))
      	{
      		$contents = file_get_contents($templateFile);
      	}
		
      	return $contents;
	}
	
	function valueReplace($value)
	{
		$value = str_replace('&nbsp;', '&amp;nbsp;', $value);
		$value = str_replace('&gt;', '&amp;gt;', $value);
		$value = str_replace('&lt;', '&amp;lt;', $value);
		$value = str_replace('&apos;', '&amp;apos;', $value);
		
		return $value;
	}
}