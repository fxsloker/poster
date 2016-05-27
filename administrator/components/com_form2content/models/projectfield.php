<?php
defined('JPATH_PLATFORM') or die('Restricted acccess');

require_once(JPATH_SITE.'/components/com_form2content/utils.form2content.php');
require_once(JPATH_SITE.'/components/com_form2content/shared.form2content.php');

jimport('joomla.application.component.modeladmin');

class Form2ContentModelProjectField extends JModelAdmin
{
	protected $text_prefix = 'COM_FORM2CONTENT';

	public function getTable($type = 'ProjectField', $prefix = 'Form2ContentTable', $config = array())
	{
		return JTable::getInstance($type, $prefix, $config);
	}
	
	public function getItem($pk = null)
	{
		if ($item = parent::getItem($pk)) 
		{
			// Convert the settings field to an array.
			$registry = new JRegistry;
			$registry->loadString($item->settings);			
			$item->settings = $registry->toArray();
			
			if(!$item->projectid)
			{
				$input = JFactory::getApplication()->input;
				
				$item->projectid 	= $input->getInt('projectid');
				$item->fieldtypeid 	= $input->getInt('fieldtypeid');
			}
		}

		return $item;
	}
	
	public function getForm($data = array(), $loadData = true)
	{
		// get the field name
		$input 	= JFactory::getApplication()->input;
		$db 	= JFactory::getDbo();
		$query	= $db->getQuery(true);
		
		if($input->getInt('id', null) == null)
		{
			// new field
			if(array_key_exists('fieldtypeid', $data))
			{
				$fieldTypeId = $data['fieldtypeid'];
			}
			else 
			{
				$fieldTypeId = $input->get('fieldtypeid');
			}
			
			$query->select('name')->from('#__f2c_fieldtype')->where('id='.$fieldTypeId);
		}
		else 
		{
			// existing field
			$query->select('flt.name');
			$query->from('#__f2c_projectfields prf');
			$query->join('INNER', '#__f2c_fieldtype flt ON prf.fieldtypeid = flt.id');
			$query->where('prf.id='.$input->getInt('id'));
		}
		
		$db->setQuery($query);
		$fieldname = strtolower($db->loadResult());
		
		// Get the form.
		$form = $this->loadForm('com_form2content.projectfield', JPATH_COMPONENT_SITE.'/libraries/form2content/field/admin/forms/'.$fieldname.'.xml', array('control' => 'jform', 'load_data' => $loadData));
		
		// Can't change field type
		$form->setFieldAttribute('fieldtypeid', 'readonly', 'true');
		
		if (empty($form)) 
		{
			return false;
		}

		return $form;
	}	

	protected function loadFormData()
	{
		// Check the session for previously entered form data.
		$data = JFactory::getApplication()->getUserState('com_form2content.edit.projectfield.data', array());

		if (empty($data)) 
		{
			$data = $this->getItem();
		}

		return $data;
	}

	public function save($data, $useRequestData = true)
	{		
		$jinput 		= JFactory::getApplication()->input;
		$db 			= JFactory::getDbo();
		$query 			= $db->getQuery(true);
		$fieldTypeId	= $jinput->get('fieldtypeid', $data['fieldtypeid']);

		$query->select('name')->from('#__f2c_fieldtype')->where('id = '. (int)$fieldTypeId);
		$db->setQuery($query);
		$fieldClassName = 'F2cFieldAdmin'.$db->loadResult();
		$field = new $fieldClassName();
		
		$field->prepareSave($data, $useRequestData);
		
		if(parent::save($data))
		{
			if(F2cFactory::getConfig()->get('generate_sample_template'))
			{
				F2C_AdminHelper::generateSampleTemplate((int)$data['projectid']);
			}			
		}
		else
		{
			return false;
		}	
		
		return true;
	}
	
	public function copy()
	{
		$jinput					= JFactory::getApplication()->input;
		$cids 					= $jinput->getVar('cid', array(0), 'array' );
		$contentTypeId 			= $jinput->getInt('projectid');
		$contentTypeFieldRow 	= $this->getTable('ProjectField');
		
		if(count($cids))
		{
			$db = $this->getDbo();
			$query = $db->getQuery(true);
	
			$query->select('*');
			$query->from('`#__f2c_projectfields`');
			$query->where('id IN (' . implode(',', $cids) . ')');
			
			$db->setQuery($query->__toString());	
			$contentTypeFields = $db->loadObjectList();
			
			foreach($contentTypeFields as $contentTypeField)
			{
				if (!$contentTypeFieldRow->bind((array)$contentTypeField)) 
				{
					$this->setError($contentTypeFieldRow->getError());
					return false;
				}

				$contentTypeFieldRow->id 		= 0; // force insert
				$contentTypeFieldRow->fieldname = $contentTypeFieldRow->fieldname . '_copy';
				$contentTypeFieldRow->projectid = $contentTypeId;
				$contentTypeFieldRow->ordering 	= 0;
			
				if(!$contentTypeFieldRow->store())
				{
					$this->setError($contentTypeFieldRow->getError());
					return false;
				}								
			}
			
			if(F2cFactory::getConfig()->get('generate_sample_template'))
			{
				F2C_AdminHelper::generateSampleTemplate((int)$contentTypeId);
			}			
			
			$cache = JFactory::getCache('com_form2content');
			$cache->clean();			
		}
		
		return true;		
	}
	
	protected function prepareTable($table)
	{
		// Reorder the Content Type fields within the Content Type so the new article is Content Type field
		if (empty($table->id)) 
		{
			$table->reorder('projectid = '.(int) $table->projectid);
		}
	}
	
	protected function getReorderConditions($table = null)
	{
		$condition = array();
		$condition[] = 'projectid = '.(int) $table->projectid;
		return $condition;
	}
		
	public function delete(&$pks)
	{
		// Initialise variables.
		$user			= JFactory::getUser();
		$f2cConfig 		= F2cFactory::getConfig();
		$pks			= (array)$pks;
		$table			= $this->getTable();
		$contentTypeId	= -1;
		$db 			= JFactory::getDbo();
		
		// Iterate the items to delete each one.
		foreach ($pks as $i => $pk) 
		{
			if ($table->load($pk)) 
			{
				if ($this->canDelete($table)) 
				{
					$context = $this->option.'.'.$this->name;

					$query 	= $db->getQuery(true);
					
					$query->select('name')->from('#__f2c_fieldtype')->where('id = '. (int)$table->fieldtypeid);
					$db->setQuery($query);
					$fieldClassName = 'F2cFieldAdmin'.$db->loadResult();
					$field = new $fieldClassName();
					
					$field->delete($pk);
					
					if($f2cConfig->get('generate_sample_template'))
					{
						$contentTypeId = $table->projectid;
					}			

					$query = $db->getQuery(true);
	
					$query->delete('#__f2c_translation')->where('reference_id=' . (int)$pk);
					
					$db->setQuery($query);
						
					if(!$db->execute())
					{
						$this->setError($db->getError());
						return false;
					}					
					
					$query = $db->getQuery(true);
	
					$query->delete('#__f2c_fieldcontent')->where('fieldid=' . (int)$pk);
					
					$db->setQuery($query);
						
					if(!$db->execute())
					{
						$this->setError($db->getError());
						return false;
					}					
					
					if (!$table->delete($pk)) 
					{
						$this->setError($table->getError());
						return false;
					}
					
					if($f2cConfig->get('generate_sample_template'))
					{
						F2C_AdminHelper::generateSampleTemplate((int)$contentTypeId);
					}			
				} 
				else
				{
					// Prune items that you can't change.
					unset($pks[$i]);
					$error = $this->getError();
					if ($error) 
					{
						JFactory::getApplication()->enqueueMessage($error, 'notice');
					}
					else 
					{
						JFactory::getApplication()->enqueueMessage(JText::_('JLIB_APPLICATION_ERROR_DELETE_NOT_PERMITTED'), 'notice');
					}
				}
			} 
			else 
			{
				$this->setError($table->getError());
				return false;
			}
		}

		// Clear the component's cache
		$cache = JFactory::getCache($this->option);
		$cache->clean();

		return true;
	}
}
?>