<?php
// No direct access.
defined('_JEXEC') or die('Restricted acccess');

require_once(JPATH_COMPONENT_SITE.DIRECTORY_SEPARATOR.'utils.form2content.php');
require_once(JPATH_COMPONENT_ADMINISTRATOR.DIRECTORY_SEPARATOR.'sample_data'.DIRECTORY_SEPARATOR.'samples.form2content.php');

jimport('joomla.application.component.controlleradmin');

class Form2ContentControllerProjects extends JControllerAdmin
{
	protected $default_view = 'projects';

	public function __construct($config = array())
	{
		// Access check.
		if (!JFactory::getUser()->authorise('core.admin')) 
		{
			throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'));
		}
		
		parent::__construct($config);
	}

	public function getModel($name = 'Project', $prefix = 'Form2ContentModel', $config = array())
	{
		$model = parent::getModel($name, $prefix, array('ignore_request' => true));

		return $model;
	}
		
	function syncorder()
	{
		$db 	= JFactory::getDBO();
		$query 	= $db->getQuery(true);
		
		$query->select('DISTINCT f.catid');
		$query->from('#__f2c_form f');
		$query->where('f.reference_id IS NOT NULL');
		
		$db->setQuery($query);
		
		$categoryList = $db->loadObjectList();
		
		if(count($categoryList))
		{
			foreach($categoryList as $category)
			{
				F2cContentHelper::syncArticleOrder($category->catid);
			}
		}

		$this->setMessage(JText::_('COM_FORM2CONTENT_SYNC_ORDER_SUCCESS'), 'notice');
		$this->setRedirect(JRoute::_('index.php?option='.$this->option.'&view='.$this->view_list, false));
	}	
}
?>