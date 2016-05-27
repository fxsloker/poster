<?php
defined('JPATH_PLATFORM') or die('Restricted acccess');

jimport('joomla.application.component.controlleradmin');

class Form2ContentControllerProjectFields extends JControllerAdmin
{
	protected $default_view = 'projectfields';

	public function getModel($name = 'ProjectField', $prefix = 'Form2ContentModel', $config = array())
	{
		$model = parent::getModel($name, $prefix, array('ignore_request' => true));

		return $model;
	}
	
	public function reorder()
	{
		parent::reorder();
		$this->redirect .= '&projectid='.$this->input->getInt('projectid');
	
	}
	
	function saveorder()
	{
		parent::saveorder();
		$this->redirect .= '&projectid='.$this->input->getInt('projectid');	
	}
	
	function delete()
	{
		parent::delete();
		$this->redirect .= '&projectid='.$this->input->getInt('projectid');
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