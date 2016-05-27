<?php
defined('_JEXEC') or die('Restricted acccess');

require_once(JPATH_SITE.'/components/com_form2content/shared.form2content.php');
require_once(JPATH_SITE.'/components/com_form2content/utils.form2content.php');

jimport('joomla.application.component.modeladmin');

class Form2ContentModelProjectBase extends JModelAdmin
{
	protected $text_prefix = 'COM_FORM2CONTENT';

	public function getTable($type = 'Project', $prefix = 'Form2ContentTable', $config = array())
	{
		return JTable::getInstance($type, $prefix, $config);
	}

	public function getItem($pk = null)
	{
		if ($item = parent::getItem($pk)) 
		{
			// Convert the params field to an array.
			$registry = new JRegistry;
			$registry->loadString($item->attribs);
			$item->attribs = $registry->toArray();

			// Convert the metadata field to an array.
			$registry = new JRegistry;
			$registry->loadString($item->metadata);
			$item->metadata = $registry->toArray();

			// Convert the settings field to an array.
			$registry = new JRegistry;
			$registry->loadString($item->settings);			
			$item->settings = $registry->toArray();
			
			$item->fields = $this->getFieldDefinitions($pk);
		}
		
		return $item;
	}
	
	public function getForm($data = array(), $loadData = true)
	{
		// Get the form.
		$form = $this->loadForm('com_form2content.project', 'project', array('control' => 'jform', 'load_data' => $loadData));
		
		if (empty($form)) 
		{
			return false;
		}

		return $form;
	}

	protected function loadFormData()
	{
		// Check the session for previously entered form data.
		$data = JFactory::getApplication()->getUserState('com_form2content.edit.project.data', array());
		if (empty($data)) 
		{
			$data = $this->getItem();
		}

		return $data;
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
	
	public function getFieldDefinitions($contentTypeId)
	{
		$query = $this->_db->getQuery(true);
		$query->select('pf.*, ft.name');
		$query->from('#__f2c_projectfields pf');
		$query->join('INNER', '#__f2c_fieldtype ft ON pf.fieldtypeid = ft.id');
		$query->where('pf.projectid = ' . (int)$contentTypeId);
		$query->order('pf.ordering ASC');
		
		$this->_db->setQuery($query);
		
		$fields 	= $this->_db->loadObjectList('id');
		$fieldsNew 	= array();
		
		if(count($fields))
		{
			foreach($fields as $field)
			{
				$settings = new JRegistry();
				$settings->loadString($field->settings);
				$field->settings = $settings;
				
				// Dynamically create F2C field
				$className 				= 'F2cField'.$field->name;
				$fieldsNew[$field->id]	= new $className($field);
			}
		}

		return $fieldsNew;
	}	
}
?>