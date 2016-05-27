<?php
defined('_JEXEC') or die();

jimport('joomla.application.component.modellist');

class Form2ContentModelProjects extends JModelList
{
	public function __construct($config = array())
	{
		if (empty($config['filter_fields'])) 
		{
			$config['filter_fields'] = array(
				'id', 'a.id',
				'title', 'a.title',
				'published', 'a.published',
				'created', 'a.created',
				'modified', 'a.modified',
				'created_by', 'a.created_by',
			);
		}

		parent::__construct($config);
	}
	
	protected function populateState($ordering = null, $direction = null)
	{
		// Initialise variables.
		$search = $this->getUserStateFromRequest($this->context.'.contenttypes.filter.search', 'contenttypes_filter_search');
		$this->setState('contenttypes.filter.search', $search);

		// List state information.
		parent::populateState('a.title', 'asc');
	}

	protected function getStoreId($id = '')
	{
		// Compile the store id.
		$id	.= ':'.$this->getState('contenttypes.filter.search');

		return parent::getStoreId($id);
	}
	
	protected function getListQuery()
	{
		// Create a new query object.
		$db = $this->getDbo();
		$query = $db->getQuery(true);

		$query->select('a.*');
		$query->from('`#__f2c_project` AS a');
		
		// Join over the users for the author.
		$query->select('u.name AS username');
		$query->join('LEFT', '`#__users` u ON a.created_by = u.id');

		// Filter by search in title.
		$search = $this->getState('contenttypes.filter.search');
		
		if(!empty($search)) 
		{
			$search = $db->Quote('%'.$db->escape($search, true).'%');
			$query->where('(a.title LIKE '.$search.')');
		}

		// Add the list ordering clause.
		$orderCol	= $this->state->get('list.ordering');
		$orderDirn	= $this->state->get('list.direction');
		
		$query->order($db->escape($orderCol.' '.$orderDirn));
		
		return $query;
	}	
}
?>
