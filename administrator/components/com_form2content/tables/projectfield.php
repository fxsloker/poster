<?php
class Form2ContentTableProjectField extends JTable
{
	/**
	 * Constructor
	 *
	 * @param database Database object
	 */
	function __construct(&$db)
	{
		parent::__construct('#__f2c_projectfields', 'id', $db);
	}
	 
	/**
	 * Validation
	 *
	 * @return boolean True if buffer valid
	 */
	function check()
	{
		if (trim($this->fieldname) == '') 
		{
			$this->setError(JText::_('COM_FORM2CONTENT_ERROR_PROJECTFIELD_FIELDNAME_EMPTY'));
			return false;
		}
		
		if(!preg_match('/^[a-zA-Z0-9_]+$/', $this->fieldname))
		{
			$this->setError(JText::_('COM_FORM2CONTENT_ERROR_PROJECTFIELD_FIELDNAME_INVALID_CHARS'));
			return false;			
		}

		$compareId = ($this->id) ? $this->id : -1;
						
		$db	= JFactory::getDBO();
		
		// check unique for project.....
		$query = $db->getQuery(true);
		
		$query->select('COUNT(*)');
		$query->from('#__f2c_projectfields');
		$query->where('fieldname = \''.$this->fieldname.'\'');
		$query->where('id <> ' .$compareId);
		$query->where('projectid = ' .$this->projectid);
						
		$db->setQuery($query->__toString());
			
		if($db->loadResult())
		{
			$this->setError(JText::_('COM_FORM2CONTENT_ERROR_PROJECTFIELD_FIELDNAME_NOT_UNIQUE'));
			return false;						
		}									

		return true;
	}
	
    public function bind($array, $ignore = '') 
    {
       if (isset($array['settings']) && is_array($array['settings'])) 
       {
                // Convert the params field to a string.
                $parameter = new JRegistry;
                $parameter->loadArray($array['settings']);
                $array['settings'] = (string)$parameter;
       }
        
       return parent::bind($array, $ignore);
    }
    
    public function store($updateNulls = false)
    {
    	if(empty($this->id))
    	{
    		// new Content Type Field => Get ordering
    		$this->ordering = $this->getNextOrder('projectid = ' . (int)$this->projectid);
    	}
    	
    	return parent::store($updateNulls);
    }
}
?>