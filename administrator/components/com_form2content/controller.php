<?php
defined('_JEXEC') or die;

// Set some toolbar icons
$document = JFactory::getDocument();
$document->addStyleDeclaration('.icon-32-refresh {background-image: url(../media/com_form2content/images/icon-32-refresh.png);}');

jimport('joomla.application.component.controller');

class Form2ContentController extends JControllerLegacy
{
	protected $default_view = 'forms';

	public function display($cachable = false, $urlparams = false)
	{
		parent::display();
		return $this;
	}
}