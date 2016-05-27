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
				'p.title', 'project_title'
						);
		}

		parent::__construct($config);
	}
	
	protected function populateState($ordering = null, $direction = null)
	{
		// Initialise variables.
		$app = JFactory::getApplication();
		
		$search = $this->getUserStateFromRequest($this->context.'.forms.filter.search', 'forms_filter_search');
		$this->setState('forms.filter.search', $search);

		$published = $this->getUserStateFromRequest($this->context.'forms.filter.published', 'forms_filter_published', '');
		$this->setState('forms.filter.published', $published);
		
		$categoryId = $this->getUserStateFromRequest($this->context.'.forms.filter.category_id', 'forms_filter_category_id');
		$this->setState('forms.filter.category_id', $categoryId);

		$contentTypeId = $this->getUserStateFromRequest($this->context.'.forms.filter.contenttype_id', 'forms_filter_contenttype_id');
		$this->setState('forms.filter.contenttype_id', $contentTypeId);

		$authorId = $app->getUserStateFromRequest($this->context.'.forms.filter.author_id', 'forms_filter_author_id');
		$this->setState('forms.filter.author_id', $authorId);

		$level = $app->getUserStateFromRequest($this->context.'.forms.filter.level', 'forms_filter_level');
		$this->setState('forms.filter.level', $level);

		$access = $app->getUserStateFromRequest($this->context.'.forms.filter.access', 'forms_filter_access');
		$this->setState('forms.filter.access', $access);
		
		$language = $this->getUserStateFromRequest($this->context.'.forms.filter.language', 'forms_filter_language', '');
		$this->setState('forms.filter.language', $language);
				
		// List state information.
		parent::populateState('a.title', 'asc');
	}

	protected function getStoreId($id = '')
	{
		// Compile the store id.
		$id	.= ':'.$this->getState('forms.filter.search');
		$id	.= ':'.$this->getState('forms.filter.published');
		$id	.= ':'.$this->getState('forms.filter.category_id');
		$id	.= ':'.$this->getState('forms.filter.contenttype_id');
		$id	.= ':'.$this->getState('forms.filter.author_id');
		$id	.= ':'.$this->getState('forms.filter.access');
		$id	.= ':'.$this->getState('forms.filter.level');
		$id	.= ':'.$this->getState('forms.filter.language');
				
		return parent::getStoreId($id);
	}
	
	protected function getListQuery()
	{
		// Create a new query object.
		$db = $this->getDbo();
		$query = $db->getQuery(true);

		$query->select('a.*');
		$query->from('`#__f2c_form` AS a');
		
		// Join over the content for the Joomla article.
		$query->select('c.state, c.publish_up as publish_up_c, c.publish_down as publish_down_c');
		$query->join('LEFT', '`#__content` c ON a.reference_id = c.id');

		// Join over the project for the ContentType.
		$query->select('p.title as project_title');
		$query->join('LEFT', '`#__f2c_project` p ON a.projectid = p.id');

		// Join over the users for the author.
		$query->select('u.name as author_name');
		$query->join('LEFT', '`#__users` u ON a.created_by = u.id');

		// Join over the category for the category information.
		$query->select('cc.title AS category_title');
		$query->join('LEFT', '`#__categories` AS cc ON a.catid = cc.id');

		// Join over the language
		$query->select('l.title AS language_title');
		$query->join('LEFT', '`#__languages` AS l ON l.lang_code = a.language');
		
		// Join over the asset groups.
		$query->select('ag.title AS access_level');
		$query->join('LEFT', '#__viewlevels AS ag ON ag.id = a.access');
		
		// Filter by access level.
		if ($access = $this->getState('forms.filter.access')) 
		{
			$query->where('a.access = ' . (int) $access);
		}
		
		// Filter by search in title.
		$search = $this->getState('forms.filter.search');
		
		// Search filter
		if (!empty($search)) 
		{
			if (stripos($search, 'id:') === 0) 
			{
				$query->where('a.id = '.(int) substr($search, 3));
			}
			elseif (stripos($search, 'author:') === 0) 
			{
				$search = $db->Quote('%'.$db->escape(substr($search, 7), true).'%');
				$query->where('(u.name LIKE '.$search.' OR u.username LIKE '.$search.')');
			}
			else 
			{
				$search = $db->Quote('%'.$db->escape($search, true).'%');
				$query->where('(a.title LIKE '.$search.' OR a.alias LIKE '.$search.')');
			}
		}
		
		// Filter by published state
		$published = $this->getState('forms.filter.published');
		
		if (is_numeric($published)) 
		{
			$query->where('a.state = ' . (int) $published);
		}
		else if ($published === '') 
		{
			$query->where('(a.state = '.F2C_STATE_UNPUBLISHED.' OR a.state = '.F2C_STATE_PUBLISHED.')');
		}
		
		// Category filter
		$baselevel = 1;
		
		$categoryId = $this->getState('forms.filter.category_id');
		if (is_numeric($categoryId)) 
		{
			$cat_tbl = JTable::getInstance('Category', 'JTable');
			$cat_tbl->load($categoryId);
			$rgt = $cat_tbl->rgt;
			$lft = $cat_tbl->lft;
			$baselevel = (int) $cat_tbl->level;
			$query->where('cc.lft >= '.(int) $lft);
			$query->where('cc.rgt <= '.(int) $rgt);
		}
		elseif (is_array($categoryId)) 
		{
			JArrayHelper::toInteger($categoryId);
			$categoryId = implode(',', $categoryId);
			$query->where('a.catid IN ('.$categoryId.')');
		}
		
		// Filter on the level.
		if ($level = $this->getState('forms.filter.level')) 
		{
			$query->where('cc.level <= '.((int) $level + (int) $baselevel - 1));
		}
		
		// Content Type filter
		$contentTypeId = $this->getState('forms.filter.contenttype_id');
		
		if($contentTypeId > 0)
		{
			$query->where('(projectid = '.(int)$contentTypeId.')');
		}

		// Filter by author
		$authorId = $this->getState('forms.filter.author_id');
		if (is_numeric($authorId)) 
		{
			$type = $this->getState('forms.filter.author_id.include', true) ? '= ' : '<>';
			$query->where('a.created_by '.$type.(int)$authorId);
		}
				
		// Filter on the language.
		if ($language = $this->getState('forms.filter.language')) 
		{
			$query->where('a.language = '.$db->quote($language));
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
	
	/**
	 * Build a list of content types
	 *
	 * @return	JDatabaseQuery
	 * @since	3.0.0
	 */
	public function getContentTypes() 
	{
		// Create a new query object.
		$db = $this->getDbo();
		$query = $db->getQuery(true);
		
		// Construct the query
		$query->select('id AS value, title AS text');
		$query->from('#__f2c_project');
		$query->order('title');
		
		// Setup the query
		$db->setQuery($query);
		
		// Return the result
		return $db->loadObjectList();
	}
	
	/**
	 * Build a list of authors
	 *
	 * @return	JDatabaseQuery
	 * @since	3.0.0
	 */
	public function getAuthors()
	{
		// Create a new query object.
		$db = $this->getDbo();
		$query = $db->getQuery(true);

		// Construct the query
		$query->select('u.id AS value, u.name AS text');
		$query->from('#__users AS u');
		$query->join('INNER', '#__content AS c ON c.created_by = u.id');
		$query->group('u.id');
		$query->order('u.name');

		// Setup the query
		$db->setQuery($query);

		// Return the result
		return $db->loadObjectList();
	}
}
?>
