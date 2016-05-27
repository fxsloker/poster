<?php
defined('_JEXEC') or die('Restricted acccess');

jimport('joomla.application.component.controllerform');

class Form2ContentControllerProjectField extends JControllerForm
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

	public function projectselect()
	{
		$view = $this->getView('copyfieldselect', 'html');
		$view->setModel( $this->getModel('projectfield'), true );
		$view->display();
	}

	public function add()
	{
		// Initialise variables.
		$app		= JFactory::getApplication();
		$context	= "$this->option.edit.$this->context";

		// Access check.
		if (!$this->allowAdd()) 
		{
			// Set the internal error and also the redirect error.
			$this->setError(JText::_('JLIB_APPLICATION_ERROR_CREATE_RECORD_NOT_PERMITTED'));
			$this->setMessage($this->getError(), 'error');
			$this->setRedirect(JRoute::_('index.php?option='.$this->option.'&view='.$this->view_list.$this->getRedirectToListAppend(), false));

			return false;
		}

		// Clear the record edit information from the session.
		$app->setUserState($context.'.data', null);
		// Redirect to the edit screen.	
		$this->setRedirect(JRoute::_('index.php?option='.$this->option.'&view='.$this->view_item.$this->getRedirectToItemAppend().'&fieldtypeid='.$app->input->getInt('fieldtypeid'), false));

		return true;
	}
	
	public function copy()
	{
		// Check for request forgeries
		JSession::checkToken() or die(JText::_('JINVALID_TOKEN'));

		// Get items to publish from the request.
		$cid = $this->input->get('cid', array(), 'array');

		if (empty($cid)) 
		{
			throw new Exception(JText::_($this->text_prefix.'_NO_ITEM_SELECTED'));
		}
		else 
		{
			// Get the model.
			$model = $this->getModel();

			// Make sure the item ids are integers
			JArrayHelper::toInteger($cid);

			if (!$model->copy($cid)) 
			{
				JFactory::getApplication()->enqueueMessage($model->getError(), 'notice');
			}
			else 
			{
				$this->setMessage(JText::plural($this->text_prefix.'_N_ITEMS_COPIED', count($cid)));
			}
		}

		$this->setRedirect(JRoute::_('index.php?option='.$this->option.'&view='.$this->view_list.'&projectid='.$this->input->getInt('projectid'), false));
	}	
	
	/*
	 * Override save for redirect handling in save2new task
	 */
	public function save($key = null, $urlVar = null)
	{
		$arrJForm 		= $this->input->post->get('jform', array(), 'array');
		$contentTypeId 	= (int)$arrJForm['projectid'];
		
		if($result = parent::save($key, $urlVar))
		{
			$task = $this->getTask();
			
			if($task == 'save2new')
			{
				$this->setRedirect(JRoute::_('index.php?option=' . $this->option . '&task=projectfieldtypeselect.select&projectid=' . $contentTypeId . 
											 $this->getRedirectToItemAppend(null, $key), false));				
			}
		}
		
		return $result;
	}
	
	protected function getRedirectToListAppend()
	{
		$tmpl		= $this->input->getString('tmpl');
		$append		= '';

		// Setup redirect info.
		if ($tmpl) 
		{
			$append .= '&tmpl='.$tmpl;
		}

		$jform = $this->input->get('jform', array(), 'array');
		$append .= '&projectid='.(int)$jform['projectid'];
		
		return $append;
	}

	protected function getRedirectToItemAppend($recordId = null, $urlVar = 'id')
	{
		$redirect = parent::getRedirectToItemAppend($recordId, $urlVar);
	
		if($contentTypeId = $this->input->getInt('projectid'))
		{
			$redirect .= '&projectid='.$contentTypeId;
		}
		
		return $redirect;
	}
}
?>