<?php
defined('JPATH_PLATFORM') or die('Restricted acccess');

jimport('joomla.application.component.view');

require_once(JPATH_COMPONENT.DIRECTORY_SEPARATOR.'models'.DIRECTORY_SEPARATOR.'project.php');

class Form2ContentViewProjectFields extends JViewLegacy
{
	protected $items;
	protected $pagination;
	protected $state;
	protected $contentTypeId;

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
		
		$this->items			= $this->get('Items');
		$this->pagination		= $this->get('Pagination');
		$this->state			= $this->get('State');
		$this->contentTypeId	= JFactory::getApplication()->input->getInt('projectid');

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
				
		parent::display($tpl);
	}
	
	protected function addToolbar()
	{
		JHtmlSidebar::setAction('index.php?option=com_form2content&view=projects');
		
		$modelContentType = new Form2ContentModelProject();
		$contentType = $modelContentType->getItem($this->contentTypeId);
		
		JToolBarHelper::title(JText::_('COM_FORM2CONTENT_FORM2CONTENT') . ': ' . JText::_('COM_FORM2CONTENT_PROJECTFIELDS') . ' - ' . $contentType->title, 'generic.png');
		JToolBarHelper::addNew('projectfieldtypeselect.select','JTOOLBAR_NEW');
		JToolBarHelper::custom('projectfield.projectselect', 'copy.png', 'copy_f2.png','COM_FORM2CONTENT_COPY', true);
		JToolBarHelper::editList('projectfield.edit','JTOOLBAR_EDIT');
		JToolBarHelper::trash('projectfields.delete','JTOOLBAR_TRASH');
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
			'a.ordering' => JText::_('JGRID_HEADING_ORDERING'),
			'a.fieldname' => JText::_('COM_FORM2CONTENT_FIELDNAME'),
			'a.title' => JText::_('COM_FORM2CONTENT_FIELD_CAPTION'),
			'a.description' => JText::_('COM_FORM2CONTENT_DESCRIPTION'),
			'a.id' => JText::_('JGRID_HEADING_ORDERING')
		);
	}
}
?>