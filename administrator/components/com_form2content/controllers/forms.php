<?php
defined('_JEXEC') or die('Restricted acccess');

require_once(JPATH_COMPONENT_SITE.DIRECTORY_SEPARATOR.'controllers'.DIRECTORY_SEPARATOR.'formsbase.php');

class Form2ContentControllerForms extends Form2ContentControllerFormsBase
{
	function refresh()
	{
		// Check for request forgeries
		JSession::checkToken() or die(JText::_('JINVALID_TOKEN'));

		// Get items to publish from the request.
		$cid = $this->input->get('cid', array(), 'array');

		if (empty($cid)) 
		{
			JError::raiseWarning(500, JText::_($this->text_prefix.'_NO_ITEM_SELECTED'));
		}
		else 
		{
			// Get the model.
			$model = $this->getModel();

			// Make sure the item ids are integers
			JArrayHelper::toInteger($cid);

			// Refresh the items -> publish with -1 retains state.
			if (!$model->publish($cid, F2C_STATE_RETAIN)) 
			{
				JError::raiseWarning(500, $model->getError());
			}
			else 
			{
				$this->setMessage(JText::plural($this->text_prefix.'_N_ITEMS_REFRESHED', count($cid)));
			}
		}

		$this->setRedirect(JRoute::_('index.php?option='.$this->option.'&view='.$this->view_list, false));
	}
}
?>