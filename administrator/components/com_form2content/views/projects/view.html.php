<?php
defined('_JEXEC') or die('Restricted acccess');

class Form2ContentViewProjects extends JViewLegacy
{
	protected $items;
	protected $pagination;
	protected $state;
	protected $f2cConfig;
	
	function display($tpl = null)
	{
		if (!JFactory::getUser()->authorise('core.admin')) 
		{
			throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'), 403);
		}

		if ($this->getLayout() !== 'modal')
		{
			Form2ContentHelperAdmin::addSubmenu('projects');
		}
		
		$db					= $this->get('Dbo');
		$this->items		= $this->get('Items');
		$this->pagination	= $this->get('Pagination');
		$this->state		= $this->get('State');
		$this->f2cConfig 	= F2cFactory::getConfig();
		$this->nullDate		= $db->getNullDate();
		
		// Check for errors.
		if (count($errors = $this->get('Errors'))) 
		{
			throw new Exception(implode("\n", $errors));
			return false;
		}
		
		// We don't need toolbar in the modal window.
		if ($this->getLayout() !== 'modal') 
		{
			$this->addToolbar();
			$this->sidebar = JHtmlSidebar::render();
		}
				
		$doc = JFactory::getDocument();
		$doc->addStyleDeclaration('.icon-syncorder:before { content: "f"; }');
		
		parent::display($tpl);
	}
	
	protected function addToolbar()
	{
		JHtmlSidebar::setAction('index.php?option=com_form2content&view=projects');
		
		JToolBarHelper::title(JText::_('COM_FORM2CONTENT_FORM2CONTENT') . ': ' . JText::_('COM_FORM2CONTENT_PROJECTS'), 'article.png');

		JToolBarHelper::addNew('project.add','JTOOLBAR_NEW');
		JToolBarHelper::editList('project.edit','JTOOLBAR_EDIT');
		JToolBarHelper::custom('projects.copy', 'copy.png', 'copy_f2.png', 'Copy', true);
		JToolBarHelper::divider();
		JToolBarHelper::custom('projects.publish', 'publish.png', 'publish_f2.png','JTOOLBAR_PUBLISH', true);
		JToolBarHelper::custom('projects.unpublish', 'unpublish.png', 'unpublish_f2.png', 'JTOOLBAR_UNPUBLISH', true);
		JToolBarHelper::divider();
		JToolBarHelper::trash('projects.delete','JTOOLBAR_TRASH');
		JToolBarHelper::divider();
		JToolBarHelper::preferences('com_form2content', 550, 800);
		JToolBarHelper::custom('projects.syncorder', 'syncorder', 'syncorder','COM_FORM2CONTENT_SYNC_ORDER', false);		
		JToolBarHelper::custom('project.upload','upload','upload',JText::_('COM_FORM2CONTENT_UPLOAD'),false);
	}	
	
	/**
	 * Returns an array of fields the table can be sorted by
	 *
	 * @return  array  Array containing the field name to sort by as the key and display text as value
	 *
	 * @since   6.0.0
	 */
	protected function getSortFields()
	{
		return array(
			'a.published' => JText::_('JSTATUS'),
			'a.title' => JText::_('JGLOBAL_TITLE'),
			'a.created_by' => JText::_('JAUTHOR'),
			'a.created' => JText::_('COM_FORM2CONTENT_CREATED'),
			'a.modified' => JText::_('COM_FORM2CONTENT_MODIFIED'),
			'a.id' => JText::_('JGRID_HEADING_ID')
		);
	}
}
?>