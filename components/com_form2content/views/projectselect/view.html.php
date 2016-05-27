<?php
defined('_JEXEC') or die('Restricted acccess');

require_once(JPATH_COMPONENT_SITE.DIRECTORY_SEPARATOR.'shared.form2content.php');

jimport('joomla.application.component.view');

class Form2ContentViewProjectSelect extends JViewLegacy
{
	function display($tpl = null)
	{
		$uri = JFactory::getURI();

		// add javascript library
		$document = JFactory::getDocument();
		$document->addScript('includes/js/joomla.javascript.js'); 
		$document->addStyleDeclaration('.icon-forward:before { content: ""; }');
				
		$isNew	= true;
		$text = $isNew ? JText::_('New') : JText::_('Edit');
		$pagetitle = JText::_('SELECT_A_PROJECT').':';

		$model = $this->getModel();
				
		$listProjects[] = JHTML::_('select.option', '-1', '--&nbsp;' . JText::_('SELECT_A_PROJECT') . '&nbsp;--', 'id', 'title');		
		
		$lstProjects = $model->getData();

		if(count($lstProjects))
		{
			foreach($lstProjects as $project)
			{
				$listProjects[] = JHTML::_('select.option', $project->id, $project->title, 'id', 'title');
			}
		}
		
		$lists['projects'] = JHTML::_('select.genericlist',  $listProjects, 'projectid', 'class="inputbox" size="1"', 'id', 'title', -1);
		
		$this->assignRef('lists', $lists);
		$this->assignRef('pagetitle', $pagetitle);
		$this->assign('action',	$uri->toString());
		
		parent::display($tpl);		
	}
}

?>