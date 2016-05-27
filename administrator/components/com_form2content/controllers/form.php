<?php
defined('_JEXEC') or die('Restricted acccess');

require_once(JPATH_COMPONENT_SITE.DIRECTORY_SEPARATOR.'controllers'.DIRECTORY_SEPARATOR.'formbase.php');

class Form2ContentControllerForm extends Form2ContentControllerFormBase
{
	function projectselect()
	{
		$view = $this->getView('projectselect', 'html');
		$view->setModel( $this->getModel('form'), true );
			
		if($contentTypeId = $view->display())
		{
			// If there's only one Content Type that the user is allowed to create,
			// redirect immediately to that Content Type
			$this->setRedirect(JRoute::_('index.php?option='.$this->option.'&view='.$this->view_item.$this->getRedirectToItemAppend().'&projectid='.$contentTypeId, false));
		}
	}
	
	function add()
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
		$this->setRedirect(JRoute::_('index.php?option='.$this->option.'&view='.$this->view_item.$this->getRedirectToItemAppend().'&projectid='.$this->input->getInt('projectid'), false));

		return true;
	}
	
	/**
	 * Method to run batch operations.
	 *
	 * @param   object  $model  The model.
	 *
	 * @return  boolean	 True if successful, false otherwise and internal error is set.
	 *
	 * @since   3.4.0
	 */
	public function batch($model = null)
	{
		JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));

		// Set the model
		$model = $this->getModel('Form', '', array());

		// Preset the redirect
		$this->setRedirect(JRoute::_('index.php?option=com_form2content&view=forms' . $this->getRedirectToListAppend(), false));

		return parent::batch($model);
	}	
}
?>