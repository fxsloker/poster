<?php
defined('JPATH_PLATFORM') or die('Restricted acccess');

jimport('joomla.application.component.view');

class Form2ContentViewProject extends JViewLegacy
{
	protected $form;
	protected $item;
	protected $state;
	
	function display($tpl = null)
	{
		$this->form		= $this->get('Form');
		$this->item		= $this->get('Item');
		$this->state	= $this->get('State');

		// Check for errors.
		if (count($errors = $this->get('Errors'))) 
		{
			throw new Exception(implode("\n", $errors));
			return false;
		}

		// load helper language files
		$lang = JFactory::getLanguage();
		$lang->load('com_content', JPATH_ADMINISTRATOR);
		$lang->load('com_tags', JPATH_ADMINISTRATOR);
		
		$this->form->setFieldAttribute('image_intro', 'query', sprintf($this->form->getFieldAttribute('image_intro', 'query', '', 'images'), $this->item->id), 'images');
		$this->form->setFieldAttribute('image_fulltext', 'query', sprintf($this->form->getFieldAttribute('image_fulltext', 'query', '', 'images'), $this->item->id), 'images');
		$this->form->setFieldAttribute('urla', 'query', sprintf($this->form->getFieldAttribute('urla', 'query', '', 'urls'), $this->item->id), 'urls');
		$this->form->setFieldAttribute('urlb', 'query', sprintf($this->form->getFieldAttribute('urlb', 'query', '', 'urls'), $this->item->id), 'urls');
		$this->form->setFieldAttribute('urlc', 'query', sprintf($this->form->getFieldAttribute('urlc', 'query', '', 'urls'), $this->item->id), 'urls');
		
		$this->addToolbar();
		
		parent::display($tpl);		
	}
	
	protected function addToolbar()
	{
		$isNew = ($this->item->id == 0);
	
		JFactory::getApplication()->input->set('hidemainmenu', true);

		JToolBarHelper::title(JText::_('COM_FORM2CONTENT_CONTENTTYPE_'.($isNew ? 'ADD' : 'EDIT')), 'article-add.png');
		
		// Built the actions for new and existing records.
		if ($isNew)  
		{
			JToolBarHelper::apply('project.apply', 'JTOOLBAR_APPLY');
			JToolBarHelper::save('project.save', 'JTOOLBAR_SAVE');
			JToolBarHelper::cancel('project.cancel', 'JTOOLBAR_CANCEL');
		}
		else 
		{
			JToolBarHelper::apply('project.apply', 'JTOOLBAR_APPLY');
			JToolBarHelper::save('project.save', 'JTOOLBAR_SAVE');
			JToolBarHelper::cancel('project.cancel', 'JTOOLBAR_CLOSE');
		}		
	}	
}
?>