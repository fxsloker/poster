<?php
defined('_JEXEC') or die();

jimport('joomla.html.pagination');
jimport('joomla.application.component.model');

class Form2ContentModelProjectselect extends JModel
{
	var $_data = null;
	var $_pagination = null;
	var $_contentTypeId = -1;

	function __construct()
	{
		parent::__construct();
	}

	function _buildQuery()
	{
		$user 	= JFactory::getUser();
	
		$query =	'SELECT prj.id, prj.title, prj.settings, frm.created_by, count(*) as num_forms ' .
					'FROM #__f2c_project prj ' .
					'LEFT JOIN #__f2c_form frm ON prj.id = frm.projectid AND (frm.created_by = '.$user->id.' or frm.created_by is null) ' .
					$this->_buildContentWhere() .
					'GROUP BY prj.id, prj.title, prj.settings, frm.created_by ' .
    				$this->_buildContentOrderBy();
 
		return $query;
	}

	function getData($contentTypeId = -1)
	{
		$this->_contentTypeId = $contentTypeId;
	
		if(empty($this->_data))
		{
			$query = $this->_buildQuery();						
			$this->_data = $this->_getList($query);
			
			$numContentTypes = count($this->_data);
			
			for($i = $numContentTypes - 1; $i >= 0; $i--)
			{
				$contentType = 	$this->_data[$i];				
				$contentTypeSettings = ($contentType->settings) ? unserialize($contentType->settings) : new F2C_ContentTypeSettings();
				
				if($contentTypeSettings->max_forms)
				{				
					if($contentType->created_by != '')
					{
						if($contentType->num_forms >= $contentTypeSettings->max_forms)
						{
							// remove contentType
							unset($this->_data[$i]);
						}
					}
				}
			}
		}

		return $this->_data;
	}
	
	function _buildContentWhere()
	{
		//only published projects in front-end
		$where[] = ' prj.published = 1 ';
		
		if($this->_contentTypeId != -1)
		{
			$where[] = ' prj.id = '. $this->_contentTypeId . ' ';
		}
		
		$where = (count($where) ? ' WHERE '. implode( ' AND ', $where ) : '' );

		return $where;
	}
	
	function _buildContentOrderBy()
	{
		$orderby 	= ' ORDER BY prj.title ASC';

		return $orderby;
	}		
}
?>
