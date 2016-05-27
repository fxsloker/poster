<?php
defined('_JEXEC') or die('Restricted acccess');

jimport('joomla.application.component.model');

class Form2ContentModelFieldContent extends JModel
{
	var $_id;
	var $_data;
	
	function __construct()
	{
		parent::__construct();

		$jinput = JFactory::getApplication()->input;
		$cid 	= $jinput->get('cid', false, 'array');
		
		if($cid)
		{
			$id = $cid[0];
		}
		else
		{
			$id = $jinput->getInt('id', 0);
		}
		
		$this->setId($id);
	}
	
	function setId($id = 0)
	{
		$this->_id = $id;
		$this->_data = null;
	}
	
	function getData()
	{
		if(!$this->_data)
		{
			$db = $this->getDBO();
			$query = "SELECT * FROM " . $db->nameQuote('#__f2c_fieldcontent') . " WHERE " . $db->nameQuote('id') . " = " . $this->_id;
			$db->setQuery($query);
			$this->_data = $db->loadObject();
		}
		
		return $this->_data;
	}
	
	function save($data)
	{
		$row = $this->getTable('FieldContent');
			
		// Bind the form fields to the table
		if (!$row->bind($data)) 
		{
			$this->setError($this->_db->getErrorMsg());
			return false;
		}
			
		if(!$row->save($data))
		{
			$this->setError($row->getError());
			return false;
		}
		
		return true;
	}
	
	function delete()
	{
		$cids = JFactory::getApplication()->input->get('cid', array(0), 'array');

		$row = $this->getTable();

		if (count($cids))
		{
			foreach($cids as $cid) 
			{
				if (!$row->delete($cid)) 
				{
					$this->setError($row->getErrorMsg());
					return false;
				}
			}						
		}
		return true;
	}	
		
	function display()
	{
	}	
}
?>