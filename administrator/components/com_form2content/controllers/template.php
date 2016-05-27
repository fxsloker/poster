<?php
defined('JPATH_PLATFORM') or die('Restricted acccess');

require_once(JPATH_COMPONENT_SITE.DIRECTORY_SEPARATOR.'utils.form2content.php');

jimport('joomla.application.component.controller');

class Form2ContentControllerTemplate extends JControllerLegacy
{
	public function __construct($config = array())
	{
		// Access check.
		if (!JFactory::getUser()->authorise('core.admin')) 
		{
			throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'));
		}
		
		parent::__construct($config);
	}
	
	function __getRedirect()
	{
		return 'index.php?option=com_form2content&view=templates';
	}
	
	function edit()
	{
		$this->input->set('view', 'template');
		$this->input->set('layout', 'edit');
		parent::display();
	}
	
	function cancel()
	{
		$this->setRedirect($this->__getRedirect());
	}

	function save()
	{
		$model = $this->getModel('Template');
		
		if ($model->save()) 
		{
			$message = JText::_('COM_FORM2CONTENT_TEMPLATE_SAVED');
		} 
		else
		{
			$message = JText::_('COM_FORM2CONTENT_TEMPLATE_SAVE_ERROR');
		}

		$this->setRedirect($this->__getRedirect(), $message);
	}
	
	function delete()
	{
 		$model	= $this->getModel('Template'); 		
		$cid 	= $this->input->get('cid', array(), 'array');

		if (!is_array($cid) || count($cid) < 1) 
		{
			throw new Exception(JText::_($this->text_prefix.'_NO_ITEM_SELECTED'));
		}
		
		if($model->delete($cid))
		{
			$message = JText::_('COM_FORM2CONTENT_TEMPLATE_DELETE_SUCCESSFUL');
		}
		else
		{
			// Check for errors.
			if (count($errors = $model->getErrors())) 
			{
				JFactory::getApplication()->enqueueMessage(implode("\n", $errors), 'notice');
			}
			
			$message = JText::_('COM_FORM2CONTENT_ERRORS_OCCURRED');
		}
		
		$this->setRedirect($this->__getRedirect(), $message);
	}
	
	function upload()
	{
		$model = $this->getModel('Template');
		
		if($model->upload())
		{
			$message = JText::_('COM_FORM2CONTENT_TEMPLATE_UPLOAD_SUCCESSFUL');
		}
		else
		{
			// Check for errors.
			if (count($errors = $model->getErrors())) 
			{
				JFactory::getApplication()->enqueueMessage(implode("\n", $errors), 'notice');
			}
			
			$message = JText::_('COM_FORM2CONTENT_ERRORS_OCCURRED');
		}
		
		$this->setRedirect($this->__getRedirect(), $message);
	}
}
?>