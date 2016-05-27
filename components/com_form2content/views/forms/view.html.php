<?php
defined('JPATH_PLATFORM') or die('Restricted acccess');

require_once JPATH_COMPONENT.DIRECTORY_SEPARATOR.'helpers'.DIRECTORY_SEPARATOR.'form2content.php';
require_once JPATH_COMPONENT.DIRECTORY_SEPARATOR.'models'.DIRECTORY_SEPARATOR.'project.php';
require_once JPATH_COMPONENT.DIRECTORY_SEPARATOR.'utils.form2content.php';

JLoader::register('F2cViewHelper', JPATH_COMPONENT_SITE.'/helpers/view.php');

jimport('joomla.application.component.view');

class Form2ContentViewForms extends JViewLegacy
{
	protected $items;
	protected $pagination;
	protected $state;
	protected $nullDate;
	protected $menuParms;
	protected $params;
	
	function display($tpl = null)
	{
		$app				= JFactory::getApplication();
		$menu				= $app->getMenu();
		$this->activeMenu	= $menu->getActive();
		$db					= $this->get('Dbo');
		$this->state		= $this->get('State');
		$this->params		= $app->getParams();
		$this->nullDate		= $db->getNullDate();		
		$contentTypeId		= $this->activeMenu->params->get('contenttypeid');
		
		$this->getMenuParameters($contentTypeId);
		
		$model 				= $this->getModel();
		
		$model->setState('ContentTypeId', $contentTypeId);

		if ((int)$this->menuParms->get('classic_layout', 0))
		{
			$this->setLayout('classic');
		}

		// Verify that the Content Type exists
		$contentTypeModel = new Form2ContentModelProject();
		
		if(!($contentType = $contentTypeModel->getItem($contentTypeId)))
		{
			throw new Exception(sprintf(JText::_('COM_FORM2CONTENT_ERROR_ARTICLE_MANAGER_UNKNOWN_CONTENT_TYPE'), $contentTypeId));
			return false;
		}		
		
		$this->items		= $this->get('Items');
		$this->pagination	= $this->get('Pagination');		
		
		$document = JFactory::getDocument();
		$document->addStyleSheet(JURI::root(true) . '/media/com_form2content/css/f2cfrontend.css');
		$document->addStyleSheet(JURI::root(true) . '/media/com_form2content/css/f2cjui.css');
		$document->setTitle(F2cViewHelper::getPageTitle($this->params->get('page_title', '')));
		
		// Load extra language file for Joomla admin functionality
		$lang = JFactory::getLanguage();
		$lang->load('', JPATH_ADMINISTRATOR, $lang->getTag(), true);
		
		parent::display($tpl);
	}
	
	protected function addToolbar()
	{
		JToolBarHelper::title(JText::_('COM_FORM2CONTENT_FORM2CONTENT') . ': ' . JText::_('COM_FORM2CONTENT_FORMS'), 'generic.png');		
	}
	
	private function getMenuParameters($contentTypeId)
	{
		$this->menuParms = new JRegistry();
	
		$canDo			= Form2ContentHelper::getActions($contentTypeId, $this->state->get('filter.category_id'));		
		$queryString 	= F2cMenuHelper::getParameters(JFactory::getApplication()->input->getInt('Itemid'));
		
		$this->menuParms->set('show_category_filter', $this->activeMenu->params->get('show_category_filter', 1));
		$this->menuParms->set('show_search_filter', $this->activeMenu->params->get('show_search_filter', 1));
		$this->menuParms->set('contenttypeid', $this->activeMenu->params->get('contenttypeid', 0));
		$this->menuParms->set('classic_layout', $this->activeMenu->params->get('classic_layout', 0));
		
		switch($this->activeMenu->params->get('show_category_ordering',1))
		{
			case 0:
				$this->menuParms->set('show_category', 0);
				$this->menuParms->set('show_ordering', 0);
				break;
			case 1:
				$this->menuParms->set('show_category', 1);
				$this->menuParms->set('show_ordering', 1);
				break;
			case 2:
				$this->menuParms->set('show_category', 1);
				$this->menuParms->set('show_ordering', 0);
				break;
		}
		
		if ($canDo->get('core.create') && $this->activeMenu->params->get('show_new_button',1)) 
		{
			$this->menuParms->set('show_new_button', 1);
		}
		else
		{
			$this->menuParms->set('show_new_button', 0);
		}
		
		if ($canDo->get('core.create') && $this->activeMenu->params->get('show_copy_button',1)) 
		{
			$this->menuParms->set('show_copy_button', 1);
		}
		else
		{
			$this->menuParms->set('show_copy_button', 0);
		}
		
		if (($canDo->get('core.edit')) || ($canDo->get('core.edit.own'))) 
		{
			$this->menuParms->set('show_edit_button', 1);
		}
		else
		{
			$this->menuParms->set('show_edit_button', 0);
		}
		
		if ($canDo->get('core.edit.state'))
		{
			$this->menuParms->set('show_publish_button', 1);
		}
		else
		{
			$this->menuParms->set('show_publish_button', 0);
		}
		
		if (($canDo->get('core.delete') || $canDo->get('form2content.delete.own')) && $this->activeMenu->params->get('show_delete_button',1)) 
		{
			$this->menuParms->set('show_delete_button', 1);			
		}		
		else
		{
			$this->menuParms->set('show_delete_button', 0);
		}
		
		if ($this->state->get('filter.published') == F2C_STATE_TRASH && ($canDo->get('core.delete') || $canDo->get('form2content.delete.own'))) 
		{
			$this->menuParms->set('show_delete_button', 1);
			$this->menuParms->set('show_trash_button', 0);	
		}
		else
		{
			$this->menuParms->set('show_delete_button', 0);
			
			if ($canDo->get('form2content.trash') || $canDo->get('form2content.trash.own')) 
			{
				$this->menuParms->set('show_trash_button', 1);
			}
			else 
			{
				$this->menuParms->set('show_trash_button', 0);
			}
		}
		
		$this->menuParms->set('show_created_column', $this->activeMenu->params->get('show_created', 1));
		$this->menuParms->set('show_modified_column', $this->activeMenu->params->get('show_modified', 1));
		$this->menuParms->set('show_author_column', $this->activeMenu->params->get('show_author', 1));
		$this->menuParms->set('show_published_column', $this->activeMenu->params->get('show_published', 1));
	}
	
	/**
	 * Returns an array of fields the table can be sorted by
	 *
	 * @return  array  Array containing the field name to sort by as the key and display text as value
	 *
	 * @since   5.0.0
	 */
	protected function getSortFields()
	{
		return array(
			'a.ordering' => JText::_('JGRID_HEADING_ORDERING'),
			'a.state' => JText::_('JSTATUS'),
			'a.title' => JText::_('JGLOBAL_TITLE'),
			'category_title' => JText::_('JCATEGORY'),
			'project_title' => JText::_('COM_FORM2CONTENT_PROJECT'),
			'a.access' => JText::_('JGRID_HEADING_ACCESS'),
			'a.created_by' => JText::_('JAUTHOR'),
			'language' => JText::_('JGRID_HEADING_LANGUAGE'),
			'a.created' => JText::_('COM_FORM2CONTENT_CREATED'),
			'a.modified' => JText::_('COM_FORM2CONTENT_MODIFIED'),
			'a.id' => JText::_('JGRID_HEADING_ID')
		);
	}
}
?>