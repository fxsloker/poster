<?php
defined('_JEXEC') or die('Restricted acccess');

jimport('joomla.application.component.controllerform');

class Form2ContentControllerFormBase extends JControllerForm
{	
	/**
	 * Method override to check if you can add a new record.
	 *
	 * @param	array	An array of input data.
	 *
	 * @return	boolean
	 * @since	3.0.0
	 */
	protected function allowAdd($data = array())
	{
		// Initialise variables.
		$user				= JFactory::getUser();
		$contentTypeId		= JArrayHelper::getValue($data, 'projectid', $this->input->getInt('forms_filter_contenttype_id'), 'int');
		$allow				= null;
		$allowContentType	= null;
		$allowCategory		= null;
		
		if($contentTypeId)
		{
			// If the category has been passed in the data or URL check it.
			$allow	= $user->authorise('core.create', 'com_form2content.project.'.$contentTypeId);
		}

		if ($allow === null) 
		{
			// In the absense of better information, revert to the component permissions.
			return parent::allowAdd();
		}
		else 
		{
			return $allow;
		}
	}

	/**
	 * Method override to check if you can edit an existing record.
	 *
	 * @param	array	$data	An array of input data.
	 * @param	string	$key	The name of the key for the primary key.
	 *
	 * @return	boolean
	 * @since	3.0.0
	 */
	protected function allowEdit($data = array(), $key = 'id')
	{
		// Initialise variables.
		$recordId	= (int)isset($data[$key]) ? $data[$key] : 0;
		$user		= JFactory::getUser();
		$userId		= $user->get('id');

		// Check general edit permission first.
		if ($user->authorise('core.edit', 'com_form2content.form.'.$recordId)) 
		{
			return true;
		}

		// If this is a new record, check if the user can create new records
		if(empty($recordId) && $this->allowAdd($data))
		{
			return true;
		}
		
		// Fallback on edit.own.
		// First test if the permission is available.
		if ($user->authorise('core.edit.own', 'com_form2content.form.'.$recordId)) 
		{
			// Now test the owner is the user.
			$ownerId	= (int) isset($data['created_by']) ? $data['created_by'] : 0;
			if (empty($ownerId) && $recordId) 
			{
				// Need to do a lookup from the model.
				$record		= $this->getModel()->getItem($recordId);

				if (empty($record)) 
				{
					return false;
				}

				$ownerId = $record->created_by;
			}

			// If the owner matches 'me' then do the test.
			if ($ownerId == $userId) 
			{
				return true;
			}
		}

		// Since there is no asset tracking, revert to the component permissions.
		return parent::allowEdit($data, $key);
	}
	
	/*
	 * Override save for redirect handling in save2new task
	 */
	public function save($key = null, $urlVar = null)
	{
		if($result = parent::save($key, $urlVar))
		{
			$task = $this->getTask();
			
			if($task == 'save2new')
			{
				$newTask = JFactory::getApplication()->isSite() ? 'form.add' : 'form.projectselect';
				
				$this->setRedirect(JRoute::_('index.php?option=' . $this->option . '&task=' . $newTask . 
											 $this->getRedirectToItemAppend(null, $key), false));				
			}
		}
		
		$context 		= "$this->option.edit.$this->context";
		$app 			= JFactory::getApplication();
		$data 			= $app->getUserState($context . '.data');
		$contentType 	= F2cFactory::getContentType($data['projectid']);		
		
		if(!empty($data))
		{
			foreach($contentType->fields as $field)
			{
				$field->prepareSubmittedData($data['id']);
			}
			
			$data['fieldData'] = serialize($contentType->fields);
			
			// Add the fields data to the sessions
			$app->setUserState($context . '.data', $data);
		}
		
		return $result;
	}
	
	public function cancel($key = null)
	{
		parent::cancel();
	
		$jInput				= JFactory::getApplication()->input;
		$jForm 				= $jInput->get('jform', array(), 'array');
		$contentTypeFields	= F2cFactory::getContentType($jForm['projectid'])->fields;
		
		if(count($contentTypeFields))
		{
			foreach($contentTypeFields as $contentTypeField)
			{
				$contentTypeField->cancel();
			}
		}
	}
}
?>
