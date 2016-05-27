<?php
defined('JPATH_PLATFORM') or die('Restricted acccess');

require_once(JPATH_COMPONENT_SITE.DIRECTORY_SEPARATOR.'controllers'.DIRECTORY_SEPARATOR.'formbase.php');
require_once JPATH_COMPONENT_SITE.DIRECTORY_SEPARATOR.'utils.form2content.php';

defined('F2C_EDITMODE_ALWAYS_CREATE_NEW') 			or define('F2C_EDITMODE_ALWAYS_CREATE_NEW', 0);
defined('F2C_EDITMODE_EDIT_EXISTING_OR_CREATE_NEW') or define('F2C_EDITMODE_EDIT_EXISTING_OR_CREATE_NEW', 1);
defined('F2C_EDITMODE_EDIT_DIRECT') 				or define('F2C_EDITMODE_EDIT_DIRECT', 2);

class Form2ContentControllerForm extends Form2ContentControllerFormBase
{
	private $savedFormId = 0;
	protected $menuParms = null;
	protected $editMode = F2C_EDITMODE_EDIT_DIRECT;
	
	public function __construct($config = array())
	{
		$app				= JFactory::getApplication();
		$menu				= $app->getMenu();
		$activeMenu			= $menu->getActive();
		
		// Check if we have a valid Form2Content menu
		if($activeMenu && $activeMenu->component == 'com_form2content')
		{
			$this->menuParms	= $menu->getActive()->params;
			$this->editMode		= $activeMenu->params->get('editmode', -1);		
		}		
		
		parent::__construct($config);
	}
	
	public function getModel($name = '', $prefix = '', $config = array())
	{
		return parent::getModel($name, $prefix, $config);
	}
	
	function add()
	{
		// Initialise variables.
		$app				= JFactory::getApplication();
		$context			= "$this->option.edit.$this->context";
		$model				= $this->getModel();
		$menu				= $app->getMenu();
		$this->activeMenu	= $menu->getActive();
		
		// get the Content Type from the menu we came from
		$contentTypeId = $this->menuParms->get('contenttypeid');		
		
		$permissionCheck = array();
		$permissionCheck['projectid'] = $contentTypeId;

		// Has the user exceeded the maximum number of forms?
		if(!$model->canSubmitArticle($contentTypeId, -1))
		{
			$this->setMessage($model->getError(), 'error');
			$this->setRedirect(JRoute::_('index.php?option='.$this->option.'&view='.$this->view_list.$this->getRedirectToListAppend(), false));
			return false;
		}
		
		// Access check.
		if (!$this->allowAdd($permissionCheck)) 
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
		$this->setRedirect('index.php?option='.$this->option.'&view='.$this->view_item.$this->getRedirectToItemAppend().'&projectid='.$contentTypeId . '&Itemid=' . $this->input->getInt('Itemid'));
		return true;
	}
	
	public function edit($key = null, $urlVar = null)
	{
		$cid 		= $this->input->get('cid', array(), 'array');
		$app		= JFactory::getApplication();
		$context	= "$this->option.edit.$this->context";
		$return 	= $app->input->get('return', null, 'base64');		

		if(count($cid) || $this->input->getInt('id'))
		{
			// clear the session data
			$app->setUserState($context . '.id', null);	
		}

		if(!parent::edit($key, $urlVar))
		{
			$this->setRedirect($return ? base64_decode($return) : 'index.php');
			return false;
		}
		
		// get the form id
		$arrId		= $app->getUserState($context . '.id');		
		$id 		= $arrId[0];
		
		$this->setRedirect('index.php?option='.$this->option.'&task=form.display&view='.$this->view_item.$this->getRedirectToItemAppend().'&id='.$id.'&Itemid='.$this->input->getInt('Itemid'));	
		return true;
	}
		
	public function display($cachable = false, $urlparams = false)
	{
		parent::display();
		return $this;
	}
	
	public function save($key = null, $urlVar = null)
	{
		$app			= JFactory::getApplication();
		$task			= $this->getTask();
		$return 		= $app->input->get('return', null, 'base64');
		$redirectLink 	= $return ? base64_decode($return) : 'index.php';

		// check if we came from the Single F2C Article menu item
		if($this->editMode >= 0)
		{
			$formId = (int)$_POST['jform']['id'];

			if($formId)
			{
				$ids	= array();
				$ids[]	= $formId;
				$app->setUserState('com_form2content.edit.form.id', $ids);
			}					
		}
		
		if(parent::save($key, $urlVar))
		{			
			if($task != 'apply' && $this->editMode >= 0)
			{
				$this->setRedirect($redirectLink);					
			}
			
			$app->setUserState('com_form2content.edit.form.new', null);
		
			return true;
		}
		else
		{
			// Redirect back to display screen
			$data = $app->getUserState('com_form2content.edit.form.data');
			$this->setRedirect('index.php?option='.$this->option.'&task=form.display&view='.$this->view_item.$this->getRedirectToItemAppend().'&id='.$data['id'].'&Itemid='.$this->input->getInt('Itemid'));	
			return false;
		}
	}
	
	public function cancel($key = null)
	{
		$app			= JFactory::getApplication();
		$model 			= $this->getModel();
		$table 			= $model->getTable();
		
		if (empty($key))
		{
			$key = $table->getKeyName();
		}
		
		$recordId = $this->input->getInt($key);
		
		$app->setUserState('com_form2content.edit.form.new', null);
		
		// check if we came from the Single F2C Article menu item
		if($this->editMode >= 0)
		{
			$formId = (int)$_POST['jform']['id'];
			
			if($formId)
			{
				
				$ids	= array();
				$ids[]	= $formId;
				$app->setUserState('com_form2content.edit.form.id', $ids);
			}					
		}
		
		parent::cancel($key);
		
		$redirectLink = '';
		
		switch($this->editMode)
		{
			case F2C_EDITMODE_ALWAYS_CREATE_NEW:
			case F2C_EDITMODE_EDIT_EXISTING_OR_CREATE_NEW:
				
				switch((int)$this->menuParms->get('redirectmode'))
				{
					case 0:
						// redirect to custom url
						$redirectLink = $this->menuParms->get('redirectaftersave', 'index.php');
						break;
					case 1:
						// redirect to new or modified article if this is published
						$formId				= $this->savedFormId;
						$this->savedFormId	= 0; //reset saved form var
						$redirectLink 		= $this->getFormRedirect($formId);
						break;
				}				
				break;
				
			case F2C_EDITMODE_EDIT_DIRECT:
				
				$return 		= $app->input->get('return', null, 'base64');
				$redirectLink 	= $return ? base64_decode($return) : 'index.php';				
				break;
				
			default;
				// coming from F2C Article manager => no explicit redirect
				break;
		}
		
		if($redirectLink)
		{
			$this->setRedirect($redirectLink);
		}
	}
	
	protected function postSaveHook(JModelLegacy $model, $validData = array())
	{
		$this->savedFormId = $model->getState($model->getName().'.id');
	}
		
	private function getFormRedirect($formId)
	{
		$redirectLink = 'index.php';
		
		if($formId)
		{
			$model 	= $this->getModel();
			$item 	= $model->getItem($formId);
						
			if($item->id)
			{
				if ($item->publish_up || $item->publish_down)
				{
					$nullDate 		= JFactory::getDBO()->getNullDate();
					$nowDate 		= JFactory::getDate()->toUnix();						
					$tz				= JFactory::getApplication()->getCfg('offset');						
					$publish_up		= ($item->publish_up != $nullDate) ? JFactory::getDate($item->publish_up, $tz) 	: false;
					$publish_down 	= ($item->publish_down != $nullDate) ? JFactory::getDate($item->publish_down, $tz) 	: false;
	
					// check if the item is published
					if(	$item->state == 1 &&
						($publish_up && $nowDate >= $publish_up->toUnix()) &&
						(($publish_down && $nowDate <= $publish_down->toUnix()) || !$item->publish_down || $item->publish_down == $nullDate))
					{
						$slug = $item->alias ? ($item->reference_id . ':' . $item->alias) : $item->reference_id;
						$redirectLink = ContentHelperRoute::getArticleRoute($slug, $item->catid);
					}
				}
			}
		}
				
		return 	$redirectLink;
	}	
	
	protected function getRedirectToItemAppend($recordId = null, $urlVar = 'id')
	{
		$app	= JFactory::getApplication();
		$return = $app->input->get('return', null, 'base64');
		
		$append = parent::getRedirectToItemAppend($recordId, $urlVar);
		
		if($return)
		{
			$append .= '&return='.$return;
		}
		
		return($append);
	}
}
?>