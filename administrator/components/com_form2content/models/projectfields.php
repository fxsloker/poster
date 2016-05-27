<?php
defined('JPATH_PLATFORM') or die();

jimport('joomla.application.component.modellist');

class Form2ContentModelProjectFields extends JModelList
{
	protected $contentTypeId;

	public function __construct($config = array())
	{
		if (empty($config['filter_fields'])) 
		{
			$config['filter_fields'] = array(
				'id', 'a.id',
				'title', 'a.title',
				'fieldname', 'a.fieldname',
				'description', 'a.description',
				'ordering', 'a.ordering');
		}
		
		parent::__construct($config);
		$this->contentTypeId = JFactory::getApplication()->input->getInt('projectid', 0);
	}

	protected function populateState($ordering = null, $direction = null)
	{
		// Initialise variables.
		$search = $this->getUserStateFromRequest($this->context.'.projectfields.filter.search', 'projectfields_filter_search');
		$this->setState('projectfields.filter.search', $search);

		// List state information.
		parent::populateState('a.ordering', 'asc');
	}

	protected function getStoreId($id = '')
	{
		// Compile the store id.
		$id	.= ':'.$this->getState('projectfields.filter.search');

		return parent::getStoreId($id);
	}
	
	protected function getListQuery()
	{
		// Create a new query object.
		$db = $this->getDbo();
		$query = $db->getQuery(true);

		$query->select('a.*');
		$query->from('`#__f2c_projectfields` AS a');
		
		// Join over the fieldtype for the description.
		$query->select('t.description AS fieldtype');
		$query->join('LEFT', '`#__f2c_fieldtype` t ON a.fieldtypeid = t.id');

		// Filter by search in title.
		$search = $this->getState('projectfields.filter.search');
		
		// Search filter
		if(!empty($search)) 
		{
			$query->where('(LOWER(a.title) LIKE '.$db->Quote( '%'.$db->escape( $search, true ).'%', false ) . ')');
		}

		// Content Type filter
		$query->where('(projectid = '.(int)$this->contentTypeId.')');

		// Add the list ordering clause.
		$orderCol	= $this->state->get('list.ordering');
		$orderDirn	= $this->state->get('list.direction');

		$query->order($db->escape($orderCol.' '.$orderDirn));		
		
		return $query;
	}
}
?>