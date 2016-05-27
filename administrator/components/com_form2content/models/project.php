<?php
defined('JPATH_PLATFORM') or die('Restricted acccess');

require_once(JPATH_SITE.'/components/com_form2content/models/projectbase.php');

if(JFactory::getApplication()->isAdmin())
{
	require_once(JPATH_SITE.DIRECTORY_SEPARATOR.'administrator'.DIRECTORY_SEPARATOR.'components'.DIRECTORY_SEPARATOR.'com_form2content'.DIRECTORY_SEPARATOR.'models'.DIRECTORY_SEPARATOR.'form.php');
}
else 
{
	require_once(JPATH_SITE.DIRECTORY_SEPARATOR.'components'.DIRECTORY_SEPARATOR.'com_form2content'.DIRECTORY_SEPARATOR.'models'.DIRECTORY_SEPARATOR.'form.php');	
}

jimport('joomla.application.component.modeladmin');

class Form2ContentModelProject extends Form2ContentModelProjectBase
{
	public function save($data)
	{
		$jConfig	= JFactory::getConfig();
		$tzoffset 	= $jConfig->get('config.offset');
		$dateNow	= JFactory::getDate(null, $tzoffset); 
		$isNew		= empty($data['id']);

		if($isNew)
		{
			$user 				= JFactory::getUser();
			$data['created_by']	= $user->id;		
			$data['created']	= $dateNow->toSql();
			
			if($configInfo = JInstaller::parseXMLInstallFile(JPATH_COMPONENT.DIRECTORY_SEPARATOR.'manifest.xml'))
			{
				$data['version'] = $configInfo['version'];
			}			
		}

		$data['modified'] = $dateNow->toSql();
				
		if(!parent::save($data))
		{
			return false;
		}
		
		$data['id'] = $this->getState('project.id');
		
		// check if we need to generate a default template
		if($isNew && F2cFactory::getConfig()->get('generate_sample_template'))
		{
			F2C_AdminHelper::generateSampleTemplate($data['id']);
			$data['settings']['intro_template'] = 'default_intro_template_' . JFile::makeSafe($data['title']) . '.tpl';
			$data['settings']['main_template']  = 'default_main_template_' . JFile::makeSafe($data['title']) . '.tpl';

			if(!parent::save($data))
			{
				return false;
			}
		}
		
		return true;
	}

	public function syncJoomlaAdvancedParms($id)
	{
		$query = 	'UPDATE #__f2c_form frm ';
		$query .= 	'INNER JOIN #__f2c_project prj ON frm.projectid = prj.id AND prj.id = ' . (int)$id . ' ';
		$query .=	'SET frm.attribs = prj.attribs';

		$this->_db->setQuery($query);
		
		if(!$this->_db->execute())
		{			
			$this->setError($this->_db->getErrorMsg());
			return false; 
		}

		return true;
	}
	
	function syncMetadata($id)
	{
		$sql = 	'UPDATE #__f2c_form frm ' .
				'INNER JOIN #__f2c_project prj ON frm.projectid = prj.id AND prj.id = ' . (int)$id . ' ' . 
				'SET frm.metadata = prj.metadata, frm.metakey = prj.metakey, frm.metadesc = prj.metadesc';

		$this->_db->setQuery($sql);
		
		if(!$this->_db->execute())
		{			
			$this->setError($this->_db->getErrorMsg());
			return false; 
		}
		else
		{
			return true;
		}
	}
	
	public function copy(&$pks)
	{
		$contentTypeTable		= $this->getTable(); 				
		$contentTypeFieldRow	= JTable::getInstance('ProjectField','Form2ContentTable'); 	
		$dateNow 				= JFactory::getDate();
		$timestamp 				= $dateNow->toMySQL();
		
		foreach ($pks as $i => $pk)
		{
			if(!$contentTypeTable->load($pk))
			{
				$this->setError($formTable->getError());
				return false;
			}
			
			$contentTypeTable->title 	= JText::_('COM_FORM2CONTENT_COPY_OF') . ' ' . $contentTypeTable->title;
			$contentTypeTable->id 		= null; // force insert
			$contentTypeTable->asset_id = null; // force insert
			$contentTypeTable->created 	= $timestamp;
			$contentTypeTable->modified = $this->_db->getNullDate();
			
			if(!$contentTypeTable->store())
			{
				$this->setError($contentTypeTable->getError());
				return false;
			}
			
			// copy the ContentType Fields
			$query = $this->_db->getQuery(true);
			$query->select('*');
			$query->from('#__f2c_projectfields');
			$query->where('projectid = ' . (int)$pk);
			
			$this->_db->setQuery($query->__toString());
			
			$contentTypeFields = $this->_db->loadAssocList();
			
			if(count($contentTypeFields))
			{
				foreach($contentTypeFields as $contentTypeField)
				{
					if (!$contentTypeFieldRow->bind($contentTypeField)) 
					{
						$this->setError($this->_db->getErrorMsg());
						return false;
					}

					$contentTypeFieldRow->id = 0; // force insert
					$contentTypeFieldRow->projectid = $contentTypeTable->id;
				
					if(!$contentTypeFieldRow->store())
					{
						$this->setError($contentTypeFieldRow->getError());
						return false;
					}
				}
			}
		}
		
		return true;
	}
	
	public function delete(&$pks)
	{
		// Initialise variables.
		$dispatcher			= JDispatcher::getInstance();
		$pks				= (array)$pks;
		$context 			= $this->option.'.'.$this->name;
		$modelForm			= new Form2ContentModelForm();
		$contentTypeTable	= $this->getTable();
		
		// Include the content plugins for the on delete events.
		JPluginHelper::importPlugin('form2content');
		
		// Iterate the items to delete each one.
		foreach ($pks as $i => $pk) 
		{
			$contentType = F2cFactory::getContentType($pk);
			
			if($contentTypeTable->load($pk)) 
			{
				// Get the list of forms for this Content Type
				$query = $this->_db->getQuery(true);
				$query->select('id')->from('#__f2c_form')->where('projectid = ' . (int)$pk);
				
				$this->_db->setQuery($query);
				
				$formIds = $this->_db->loadColumn();
				
				if(!$modelForm->delete($formIds))
				{
					$this->setError($modelForm->getError());
					return false;
				}
				
				foreach($contentType->fields as $field)
				{
					$field->deleteContentType();
				}
				
				// Delete the Content Type Field definitions
				$query = $this->_db->getQuery(true);
				$query->delete('#__f2c_projectfields')->where('projectid = ' . (int)$pk);
				
				$this->_db->setQuery($query);
				
				if(!$this->_db->execute())
				{
					$this->setError($this->_db->getErrorMsg());
					return false;
				}
	
				// Delete the Content Type			
				if (!$contentTypeTable->delete($pk)) 
				{
					$this->setError($contentTypeTable->getError());
					return false;
				}
			}
			else
			{
				$this->setError($contentTypeTable->getError());
				return false;
			}						
		}

		// Clear the component's cache
		$cache = JFactory::getCache($this->option);
		$cache->clean();

		return true;
	}	
	
	public function export()
	{ 
	}
	
	public function import($file)
	{
		require_once(JPATH_COMPONENT.DIRECTORY_SEPARATOR.'models'.DIRECTORY_SEPARATOR.'projectfield.php');

		$f2cConfig 			= F2cFactory::getConfig();
		$contentTypeData 	= array();
		$data				= array();
		
		if(!$xml = @simplexml_load_file($file))
		{
			$this->setError(JText::_('COM_FORM2CONTENT_ERROR_IMPORT_CONTENTTYPE_NO_CONTENTTYPE'));
			return false;
		}

		if($xml->getName() != 'contenttype')
		{
			$this->setError(JText::_('COM_FORM2CONTENT_ERROR_IMPORT_CONTENTTYPE_NO_CONTENTTYPE'));
			return false;
		}
		
		$contentTypeTitle 	= $xml->title;
		$version 			= $xml->version;	
		$nodeSettings		=& $xml->settings;
		$introTemplate 		= $nodeSettings->intro_template;
		$mainTemplate 		= $nodeSettings->main_template;
		
		// Check if the version of the component is equal or higher
		// to the version of the imported Content Type
		$versionCheck = false;
		
		if(!$version)
		{
			$this->setError(JText::sprintf(JText::_('COM_FORM2CONTENT_ERROR_IMPORT_CONTENTTYPE_INCOMPATIBLE_VERSION'), $componentVersion, $version));
			return false;
		}
				
		list($importMajor, $importMinor, $importRevision) = explode('.', $version);
		
		$componentInfo = JInstaller::parseXMLInstallFile(JPATH_COMPONENT.DIRECTORY_SEPARATOR.'manifest.xml');
		$componentVersion = $componentInfo['version'];
		list($compMajor, $compMinor, $compRevision) = explode('.', $componentVersion);
		
		// Major versions must be the same
		if((int)$compMajor != (int)$importMajor)
		{
			$this->setError(JText::sprintf(JText::_('COM_FORM2CONTENT_ERROR_IMPORT_CONTENTTYPE_INCOMPATIBLE_VERSION'), $componentVersion, $version));
			return false;
		}
		
		if((int)$compMinor > (int)$importMinor)
		{
			$versionCheck = true;
		}
		else if(((int)$compMinor == (int)$importMinor) &&
				((int)$compRevision >= (int)$importRevision))
		{
			$versionCheck = true;
		}
				
		if(!$versionCheck)
		{
			$this->setError(JText::sprintf(JText::_('COM_FORM2CONTENT_ERROR_IMPORT_CONTENTTYPE_VERSION_TOO_LOW'), $componentVersion, $version));
			return false;
		}
		
		// Check if the Content Type doesn't exist yet
		$query = $this->_db->getQuery(true);
		$query->select('count(*)');
		$query->from('#__f2c_project');
		$query->where('title = ' . $this->_db->quote($contentTypeTitle));
		
		$this->_db->setQuery($query);
				
		if($this->_db->loadResult())
		{
			$this->setError(JText::sprintf(JText::_('COM_FORM2CONTENT_ERROR_IMPORT_CONTENTTYPE_EXISTS'), $contentTypeTitle));
			return false;			
		}
		
		// Check if the templates don't exist yet
      	$introTemplateFile = Path::Combine($f2cConfig->get('template_path'), $introTemplate);

      	if(JFile::exists($introTemplateFile))
      	{
			$this->setError(JText::sprintf(JText::_('COM_FORM2CONTENT_ERROR_IMPORT_CONTENTTYPE_TEMPLATE_EXISTS'), $introTemplate));
			return false;			
      	}
		
      	$mainTemplateFile = Path::Combine($f2cConfig->get('template_path'), $mainTemplate);
      	
      	if(JFile::exists($mainTemplateFile))
      	{
			$this->setError(JText::sprintf(JText::_('COM_FORM2CONTENT_ERROR_IMPORT_CONTENTTYPE_TEMPLATE_EXISTS'), $mainTemplate));
			return false;			
      	}

		$data['title'] 		= (string)$xml->title;
		$data['id'] 		= null; // force insert
		$data['asset_id'] 	= null; // force insert
		$data['published']	= (string)$xml->published;
		$data['metakey']	= (string)$xml->metakey;
		$data['metadesc']	= (string)$xml->metadesc;
				
		$settings = array();
		$attribs = array();
		$metadata = array();
	
		$this->xmlToArray($xml->settings, $settings);
		$this->xmlToArray($xml->attribs, $attribs);
		$this->xmlToArray($xml->metadata, $metadata);
		
		$data['settings'] = $settings;
		$data['attribs'] = $attribs;
		$data['metadata'] = $metadata;
		
		if(!$this->save($data))
		{
			return false;
		}	
		
		$contentTypeId =  $this->getState('project.id');
		
      	if($xml->fields->children())
      	{
      		foreach($xml->fields->children() as $field)
      		{
				$fld 						= new Form2ContentModelProjectField();				
				$fldSettings 				= array();
				
				$this->xmlToArray($field->settings, $fldSettings);

				$fldData 					= array();
				$fldData['projectid'] 		= $contentTypeId;
				$fldData['fieldname'] 		= (string)$field->fieldname;
				$fldData['title'] 			= (string)$field->title;
				$fldData['description'] 	= (string)$field->description;
				$fldData['frontvisible']	= (string)$field->frontvisible;
				$fldData['fieldtypeid'] 	= (string)$field->fieldtypeid;
				$fldData['settings']		= $fldSettings;
				
				$fld->save($fldData, false);
      		}
      	}
		
		// Write the template files
		$introTemplate = (string)$xml->introtemplatefile;
		$mainTemplate = (string)$xml->maintemplatefile;
		JFile::write($introTemplateFile, $introTemplate);
		JFile::write($mainTemplateFile, $mainTemplate);
		
		return true;
	}	
	
	function xmlToArray($node, &$array)
	{
		if(count($node->children()))
		{
			foreach($node->children() as $elementName => $child)
			{
				if($child->children())
				{
					if($elementName != 'arrayelement')
					{
						$childData = array();
						self::xmlToArray($child, $childData);
						$array[$elementName] = $childData;
					}
					else 
					{
						$array[(string)$child->key] = (string)$child->value;
					}					
				}
				else
				{
					$array[$elementName] = (string)$child;
				}
			}
		}
	}
}
?>