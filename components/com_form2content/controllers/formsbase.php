<?php
defined('_JEXEC') or die('Restricted acccess');

jimport('joomla.application.component.controlleradmin');

class Form2ContentControllerFormsBase extends JControllerAdmin
{
	public function __construct($config = array())
	{
		parent::__construct($config);
		$this->registerTask('unfeatured', 'featured');		
	}
	
	public function getModel($name = 'Form', $prefix = 'Form2ContentModel', $config = array())
	{
		$model = parent::getModel($name, $prefix, array('ignore_request' => true));

		return $model;
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

			// Access check.
			foreach($cid as $id)
			{
				// load the form to see if the user has enough permissions to copy it
				$item = $model->getItem($id);
				
				$data = array();
				$data['catid'] = $item->catid;
				$data['projectid'] = $item->projectid;
				
				if (!$this->allowAdd($data)) 
				{
					// Set the internal error and also the redirect error.
					$this->setError(JText::_('JLIB_APPLICATION_ERROR_CREATE_RECORD_NOT_PERMITTED'));
					$this->setMessage($this->getError(), 'error');
					$this->setRedirect(JRoute::_('index.php?option='.$this->option.'&view='.$this->view_list, false));
					return false;
				}				
			}

			$result = $model->copy($cid);
			
			if(!is_array($result)) 
			{
				JError::raiseWarning(500, $model->getError());
			}
			else 
			{
				$this->setMessage(JText::plural($this->text_prefix.'_N_ITEMS_COPIED', count($result)));
			}
		}

		$this->setRedirect(JRoute::_('index.php?option='.$this->option.'&view='.$this->view_list, false));
	}
	
	protected function allowAdd($data = array())
	{
		// Initialise variables.
		$user				= JFactory::getUser();
		$categoryId			= JArrayHelper::getValue($data, 'catid', $this->input->getInt('forms_filter_category_id'), 'int');
		$contentTypeId		= JArrayHelper::getValue($data, 'projectid', $this->input->getInt('forms_filter_contenttype_id'), 'int');
		$allow				= null;
		$allowContentType	= null;
		$allowCategory		= null;
		
		if($contentTypeId)
		{
			// If the content type has been passed in the data or URL check it.
			$allow	= $user->authorise('core.create', 'com_form2content.project.'.$contentTypeId);
		}
		
		if($categoryId) 
		{
			// If the category has been passed in the data or URL check it.
			$allowCategory	= $user->authorise('core.create', 'com_content.category.'.$categoryId);
			
			if($allow !== null)
			{
				$allow = $allow && 	$allowCategory;		
			}
			else
			{
				$allow = $allowCategory;
			}
		}

		if ($allow === null) 
		{
			// In the absense of better information, revert to the component permissions.
			//return parent::allowAdd();
			return false;
		}
		else 
		{
			return $allow;
		}
	}
	
	/**
	 * Method to toggle the featured setting of a list of articles.
	 *
	 * @return	void
	 * @since	5.0.0
	 */
	function featured()
	{
		// Check for request forgeries
		JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));

		// Initialise variables.
		$user	= JFactory::getUser();
		$ids	= $this->input->get('cid', array(), 'array');
		$values	= array('featured' => 1, 'unfeatured' => 0);
		$task	= $this->getTask();
		$value	= JArrayHelper::getValue($values, $task, 0, 'int');

		// Access checks.
		foreach ($ids as $i => $id)
		{
			if (!$user->authorise('core.edit.state', 'com_form2content.form.'.(int) $id)) 
			{
				// Prune items that you can't change.
				unset($ids[$i]);
				JFactory::getApplication()->enqueueMessage(JText::_('JLIB_APPLICATION_ERROR_EDITSTATE_NOT_PERMITTED'), 'notice');
			}
		}

		if (empty($ids)) 
		{
			throw new Exception(JText::_('JERROR_NO_ITEMS_SELECTED'));
		}
		else 
		{
			// Get the model.
			$model = $this->getModel();

			// Publish the items.
			if (!$model->featuredList($ids, $value)) 
			{
				throw new Exception($model->getError());
			}
		}

		$this->setRedirect(JRoute::_('index.php?option='.$this->option.'&view='.$this->view_list, false));
	}
	
	/**
	 * Method to save the submitted ordering values for records via AJAX.
	 *
	 * @return	void
	 *
	 * @since   5.0.0
	 */
	public function saveOrderAjax()
	{
		$pks = $this->input->post->get('cid', array(), 'array');
		$order = $this->input->post->get('order', array(), 'array');

		// Sanitize the input
		JArrayHelper::toInteger($pks);
		JArrayHelper::toInteger($order);

		// Get the model
		$model = $this->getModel();

		// Save the ordering
		$return = $model->saveorder($pks, $order);
		
		if ($return)
		{
			echo "1";
		}

		// Close the application
		JFactory::getApplication()->close();
	}
}
?>