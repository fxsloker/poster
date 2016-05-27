<?php
jimport('joomla.access.rules');

class Form2ContentTableProject extends JTable
{
	/**
	 * Constructor
	 *
	 * @param database Database object
	 */
	function __construct(&$db)
	{
		parent::__construct('#__f2c_project', 'id', $db);
	}

	/**
	 * Method to compute the default name of the asset.
	 * The default name is in the form `table_name.id`
	 * where id is the value of the primary key of the table.
	 *
	 * @return	string
	 * @since	3.0.0
	 */
	protected function _getAssetName()
	{
		$k = $this->_tbl_key;
		return 'com_form2content.project.'.(int)$this->$k;
	}

	/**
	 * Method to return the title to use for the asset table.
	 *
	 * @return	string
	 * @since	3.0.0
	 */
	protected function _getAssetTitle()
	{
		return $this->title;
	}

	/**
	 * Get the parent asset id for the record
	 *
	 * @return	int
	 * @since	3.0.0
	 */
	protected function _getAssetParentId(JTable $table = null, $id = null)
	{
		$asset = JTable::getInstance('Asset');
        $asset->loadByName('com_form2content');
        return $asset->id;		
	}
	 
	/**
	 * Validation
	 *
	 * @return boolean True if buffer valid
	 */
	function check()
	{
		if(trim($this->title) == '')
		{
			$this->setError(JText::_('COM_FORM2CONTENT_ERROR_PROJECT_TITLE_EMPTY'));
			return false;
		}
						
		$settings = new JRegistry;
		$settings->loadString($this->settings);			
	
		if($settings->get('title_front_end') == 0 && trim($settings->get('title_default')) == '')
		{
			$this->setError(JText::_('COM_FORM2CONTENT_ERROR_PROJECT_TITLE_DEFAULT_EMPTY'));
			return false;		
		}
	
		if($settings->get('frontend_templsel') == 0 && trim($settings->get('intro_template')) == '')
		{
			$this->setError(JText::_('COM_FORM2CONTENT_ERROR_PROJECT_INTRO_TEMPLATE_DEFAULT_EMPTY'));
			return false;		
		}
	
		if($settings->get('frontend_catsel') == 0 && $settings->get('catid') == -1)
		{
			$this->setError(JText::_('COM_FORM2CONTENT_ERROR_PROJECT_SECTION_CATEGORY_DEFAULT_EMPTY'));
			return false;		
		}
			
		return true;
	}
	
    public function bind($array, $ignore = '') 
    {
            if (isset($array['attribs']) && is_array($array['attribs'])) 
            {
                    // Convert the params field to a string.
                    $parameter = new JRegistry;
                    $parameter->loadArray($array['attribs']);
                    $array['attribs'] = (string)$parameter;
            }
            
           if (isset($array['metadata']) && is_array($array['metadata'])) 
           {
                    // Convert the params field to a string.
                    $parameter = new JRegistry;
                    $parameter->loadArray($array['metadata']);
                    $array['metadata'] = (string)$parameter;
           }
            
           if (isset($array['settings']) && is_array($array['settings'])) 
           {
                    // Convert the params field to a string.
                    $parameter = new JRegistry;
                    $parameter->loadArray($array['settings']);
                    $array['settings'] = (string)$parameter;
           }

			// Bind the rules.
			if (isset($array['rules']) && is_array($array['rules'])) 
			{
				$rules = new JAccessRules($array['rules']);
				$this->setRules($rules);
			}

           if (isset($array['images']) && is_array($array['images'])) 
           {
                    // Convert the params field to a string.
                    $parameter = new JRegistry;
                    $parameter->loadArray($array['images']);
                    $array['images'] = (string)$parameter;
           }
			
           if (isset($array['urls']) && is_array($array['urls'])) 
           {
                    // Convert the params field to a string.
                    $parameter = new JRegistry;
                    $parameter->loadArray($array['urls']);
                    $array['urls'] = (string)$parameter;
           }
			
           return parent::bind($array, $ignore);
    }	
}
?>