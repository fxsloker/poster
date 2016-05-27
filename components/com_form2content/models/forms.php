<?php
defined('_JEXEC') or die();

jimport('joomla.application.component.modellist');

class Form2ContentModelForms extends JModelList
{
	public function __construct($config = array())
	{
		if (empty($config['filter_fields'])) 
		{
			$config['filter_fields'] = array(
			'id', 'a.id',
			'title', 'a.title',
			'alias', 'a.alias',
			'catid', 'a.catid', 'category_title', 'category_title',
			'state', 'a.state',
			'access', 'a.access', 'access_level',
			'created', 'a.created',
			'modified', 'a.modified',
			'created_by', 'a.created_by',
			'ordering', 'a.ordering',
			'featured', 'a.featured',
			'language', 'a.language',
			'p.title', 'project_title');
		}

		parent::__construct($config);
		
		// Make the context unique by adding the menu id
		$app			= JFactory::getApplication();
		$menu			= $app->getMenu();
		$activeMenu		= $menu->getActive();
		$this->context 	= strtolower($this->option . '.' . $this->getName().'.menu'.$activeMenu->id);		
	}
	
	protected function populateState($ordering = null, $direction = null)
	{
		// List state information.
		parent::populateState('a.title', 'asc');
		
		// Initialise variables.
		$search = $this->getUserStateFromRequest($this->context.'.filter.search', 'filter_search');
		$this->setState('filter.search', $search);

		$published = $this->getUserStateFromRequest($this->context.'.filter.published', 'filter_published');
		$this->setState('filter.published', $published);
		
		$categoryId = $this->getUserStateFromRequest($this->context.'.filter.category_id', 'filter_category_id');
		$this->setState('filter.category_id', $categoryId);
	}

	protected function getStoreId($id = '')
	{
		// Compile the store id.
		$id	.= ':'.$this->getState('filter.search');
		$id	.= ':'.$this->getState('filter.published');
		$id	.= ':'.$this->getState('filter.category_id');

		return parent::getStoreId($id);
	}
	
	protected function getListQuery()
	{
		$menuParms 	=  F2cMenuHelper::getParameters(JFactory::getApplication()->input->getInt('Itemid'));
		$user 		= JFactory::getUser();
		$db 		= $this->getDbo();
		$query 		= $db->getQuery(true);

		$query->select('a.*');
		$query->from('`#__f2c_form` AS a');
		
		// Join over the content for the Joomla article.
		$query->select('c.state, c.publish_up as publish_up_c, c.publish_down as publish_down_c');
		$query->join('LEFT', '`#__content` c ON a.reference_id = c.id');

		// Join over the users for the author.
		$query->select('u.username as author_name');
		$query->join('LEFT', '`#__users` u ON a.created_by = u.id');

		// Filter on author based on edit_items_level setting
		if((int)F2cFactory::getConfig()->get('edit_items_level') == 1)
		{
			$query->where('a.created_by = '.JFactory::getUser()->id);
		}
		
		// Join over the project to ensure only published projects.
		$query->join('INNER', '`#__f2c_project` p ON a.projectid = p.id AND p.published = 1');

		// Join over the category for the category information.
		$query->select('cc.title AS category_title');
		$query->join('LEFT', '`#__categories` AS cc ON a.catid = cc.id');

		// Join over the language
		$query->select('l.title AS language_title');
		$query->join('LEFT', '`#__languages` AS l ON l.lang_code = a.language');
		
		// Filter by search in title.
		$search = $this->getState('filter.search');
		
		// Search filter
		if(!empty($search)) 
		{
			$query->where('(LOWER(a.title) LIKE '.$db->Quote( '%'.$db->escape( $search, true ).'%', false ) .
						  ' OR c.id = ' . (int) $search . ')');
		}

		// Filter by published state
		$published = $this->getState('filter.published');

		if (is_numeric($published)) 
		{
			$query->where('a.state = ' . (int) $published);
		}
		else if ($published == '') 
		{
			$query->where('(a.state = '.F2C_STATE_UNPUBLISHED.' OR a.state = '.F2C_STATE_PUBLISHED.')');
		}
		
		// Category filter
		$categoryId = $this->getState('filter.category_id');
		
		if ($categoryId > 0) 
		{
			$query->where('(a.catid = '.(int)$categoryId.')');
		}

		// Content Type filter
		$query->where('(projectid = '.(int)$this->getState('ContentTypeId').')');

		// Own articles only?
		if($menuParms->get('show_own_items_only', 0)) // own items
		{
			$query->where('a.created_by = ' . $user->id);
		}

		// Add the list ordering clause.
		$orderCol	= $this->state->get('list.ordering');
		$orderDirn	= $this->state->get('list.direction');

		if ($orderCol == 'a.ordering' || $orderCol == 'category_title') 
		{
			$orderCol = 'cc.title '.$orderDirn.', a.ordering';
		}
		
		$query->order($db->escape($orderCol.' '.$orderDirn));
		
		return $query;
	}
}
?>
