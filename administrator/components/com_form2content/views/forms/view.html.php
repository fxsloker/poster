<?php
defined('_JEXEC') or die;

class Form2ContentViewForms extends JViewLegacy
{
	protected $items;
	protected $pagination;
	protected $state;
	protected $nullDate;
	protected $authors;
	
	function display($tpl = null)
	{
		if ($this->getLayout() !== 'modal')
		{
			Form2ContentHelperAdmin::addSubmenu('forms');
		}
		
		$db					= $this->get('Dbo');		
		$this->items		= $this->get('Items');
		$this->pagination	= $this->get('Pagination');
		$this->state		= $this->get('State');
		$this->contentTypes	= $this->get('ContentTypes');
		$this->authors		= $this->get('Authors');
		$this->nullDate		= $db->getNullDate();
		
		// Check for errors.
		if (count($errors = $this->get('Errors'))) 
		{
			JError::raiseError(500, implode("\n", $errors));
			return false;
		}
		 
		// Levels filter.
		$options	= array();
		$options[]	= JHtml::_('select.option', '1', JText::_('J1'));
		$options[]	= JHtml::_('select.option', '2', JText::_('J2'));
		$options[]	= JHtml::_('select.option', '3', JText::_('J3'));
		$options[]	= JHtml::_('select.option', '4', JText::_('J4'));
		$options[]	= JHtml::_('select.option', '5', JText::_('J5'));
		$options[]	= JHtml::_('select.option', '6', JText::_('J6'));
		$options[]	= JHtml::_('select.option', '7', JText::_('J7'));
		$options[]	= JHtml::_('select.option', '8', JText::_('J8'));
		$options[]	= JHtml::_('select.option', '9', JText::_('J9'));
		$options[]	= JHtml::_('select.option', '10', JText::_('J10'));

		$this->f_levels = $options;
		
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
		$canDo	= Form2ContentHelperAdmin::getActions($this->state->get('filter.category_id'));
		$user  	= JFactory::getUser();
		$bar 	= JToolBar::getInstance('toolbar');
				
		JToolBarHelper::title(JText::_('COM_FORM2CONTENT_FORM2CONTENT') . ': ' . JText::_('COM_FORM2CONTENT_FORMS'), 'generic.png');
		
		if ($canDo->get('core.create')) 
		{
			JToolBarHelper::addNew('form.projectselect','JTOOLBAR_NEW');
		}
		
		if (($canDo->get('core.edit')) || ($canDo->get('core.edit.own'))) 
		{
			JToolBarHelper::editList('form.edit','JTOOLBAR_EDIT');
		}
		
		if ($canDo->get('core.create')) 
		{
			JToolBarHelper::custom('forms.copy', 'copy.png', 'copy_f2.png', 'Copy', true);
		}
			
		if ($canDo->get('core.edit.state') || $canDo->get('form2content.edit.state.own')) 
		{
			JToolBarHelper::divider();
			JToolBarHelper::custom('forms.publish', 'publish.png', 'publish_f2.png','JTOOLBAR_PUBLISH', true);
			JToolBarHelper::custom('forms.unpublish', 'unpublish.png', 'unpublish_f2.png', 'JTOOLBAR_UNPUBLISH', true);
			JToolBarHelper::custom('forms.refresh', 'refresh', 'refresh', JText::_('COM_FORM2CONTENT_REFRESH'), true);
		}
		
		if ($this->state->get('forms.filter.published') == F2C_STATE_TRASH && ($canDo->get('core.delete') || $canDo->get('form2content.delete.own'))) 
		{
			JToolBarHelper::deleteList('', 'forms.delete','JTOOLBAR_EMPTY_TRASH');
		}
		elseif ($canDo->get('form2content.trash') || $canDo->get('form2content.trash.own')) 
		{
			JToolBarHelper::trash('forms.trash','JTOOLBAR_TRASH');
		}
		
		// Add a batch button
		if ($user->authorise('core.edit'))
		{
			$title = JText::_('JTOOLBAR_BATCH');
			$dhtml = "<button data-toggle=\"modal\" data-target=\"#collapseModal\" class=\"btn btn-small\">
						<i class=\"icon-checkbox-partial\" title=\"$title\"></i>
						$title</button>";
			$bar->appendButton('Custom', $dhtml, 'batch');
		}
		
		if ($canDo->get('core.admin')) 
		{
			JToolBarHelper::divider();		
			JToolBarHelper::preferences('com_form2content', 550, 800);
		}
		
		JHtmlSidebar::setAction('index.php?option=com_form2content&view=forms');

		JHtmlSidebar::addFilter(
			JText::_('JOPTION_SELECT_PUBLISHED'),
			'forms_filter_published',
			JHtml::_('select.options', JHtml::_('jgrid.publishedOptions', array('archived' => 0)), 'value', 'text', $this->state->get('forms.filter.published'), true)
		);

		JHtmlSidebar::addFilter(
			'- ' . JText::_('COM_FORM2CONTENT_SELECT_CONTENTTYPE') . ' -',
			'forms_filter_contenttype_id',
			JHtml::_('select.options', $this->contentTypes, 'value', 'text', $this->state->get('forms.filter.contenttype_id'))
		);
		
		JHtmlSidebar::addFilter(
			JText::_('JOPTION_SELECT_CATEGORY'),
			'forms_filter_category_id',
			JHtml::_('select.options', JHtml::_('category.options', 'com_content'), 'value', 'text', $this->state->get('forms.filter.category_id'))
		);

		JHtmlSidebar::addFilter(
			JText::_('JOPTION_SELECT_MAX_LEVELS'),
			'forms_filter_level',
			JHtml::_('select.options', $this->f_levels, 'value', 'text', $this->state->get('forms.filter.level'))
		);

		JHtmlSidebar::addFilter(
			JText::_('JOPTION_SELECT_ACCESS'),
			'forms_filter_access',
			JHtml::_('select.options', JHtml::_('access.assetgroups'), 'value', 'text', $this->state->get('forms.filter.access'))
		);

		JHtmlSidebar::addFilter(
			JText::_('JOPTION_SELECT_AUTHOR'),
			'forms_filter_author_id',
			JHtml::_('select.options', $this->authors, 'value', 'text', $this->state->get('forms.filter.author_id'))
		);

		JHtmlSidebar::addFilter(
			JText::_('JOPTION_SELECT_LANGUAGE'),
			'forms_filter_language',
			JHtml::_('select.options', JHtml::_('contentlanguage.existing', true, true), 'value', 'text', $this->state->get('forms.filter.language'))
		);
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