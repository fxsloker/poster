<?php
defined('_JEXEC') or die('Restricted acccess');

require_once(JPATH_COMPONENT_SITE.DIRECTORY_SEPARATOR.'models'.DIRECTORY_SEPARATOR.'project.php');
require_once(JPATH_COMPONENT_SITE.DIRECTORY_SEPARATOR.'helpers'.DIRECTORY_SEPARATOR.'form2content.php');

JLoader::register('F2cViewHelper', JPATH_COMPONENT_SITE.'/helpers/view.php');

jimport('joomla.application.component.view');
jimport('joomla.language.helper');

class Form2ContentViewForm extends JViewLegacy
{
	protected $form;
	protected $item;
	protected $fields;
	protected $state;
	protected $jArticle;
	protected $jsScripts = array();
	protected $nullDate;
	protected $pageTitle;
	protected $contentTypeSettings;
	protected $renderCaptcha = '';
	protected $submitForm = '';
	protected $itemId;
	protected $dateFormat = '';
	protected $params;
	protected $settings;
	protected $return_page;
	private $f2cConfig;
	protected $translatedFields = array();
	protected $contentType;
	
	function display($tpl = null)
	{
		$app				= JFactory::getApplication();
		$model 				= $this->getModel();		
		$db					= $this->get('Dbo');
		$this->f2cConfig	= F2cFactory::getConfig();
		$this->state		= $this->get('State');
		$this->params		= $app->getParams();
		$this->nullDate		= $db->getNullDate();
		$this->dateFormat	= $this->f2cConfig->get('date_format');
		$this->itemId		= $app->input->getInt('Itemid');	
		
		$this->PrepareSettings($model);
		
		if ((int)$this->settings->get('classic_layout', 0))
		{
			$this->setLayout('classic');
			$model->classicLayout = true;
		}
				
		$this->item			= $this->get('Item');		
		$this->form			= $this->get('Form');
		$this->return_page	= $this->get('ReturnPage');		
		
		$data = $app->getUserState('com_form2content.edit.form.data', array());
		
		if(!empty($data))
		{
			$this->item->fields = unserialize($data['fieldData']);
			$contentTypeId = $data['projectid'];
		}
		else 
		{
			$contentTypeId = $this->item->projectid;
		}
		
		// Check for errors.
		if (count($errors = $this->get('Errors'))) 
		{
			throw new Exception(500, implode("\n", $errors));
		}

		$lang = JFactory::getLanguage();
		// load com_content language file
		$lang->load('com_content', JPATH_ADMINISTRATOR);
		
		// set the state to indicate this is a new form or an existing one
		$app->setUserState('com_form2content.edit.form.new', $this->item->id ? false : true);
		
		$this->contentType = F2cFactory::getContentType($this->item->projectid);
		
		$this->contentTypeSettings = new JRegistry();
		$this->contentTypeSettings->loadArray($this->contentType->settings);
				
		$this->prepareForm($this->contentType);
		$this->addToolbar($this->contentType);

		// Set the page title
		JFactory::getDocument()->setTitle(F2cViewHelper::getPageTitle($this->params->get('page_title', '')));
		
		parent::display($tpl);		
	}	
	
	protected function addToolbar($contentType)
	{
		$this->pageTitle = $this->contentTypeSettings->get('article_caption');		
	}
	
	private function prepareForm($contentType)
	{
		$db 							= JFactory::getDBO();		
		$editor 						= JEditor::getInstance(JFactory::getConfig()->get('editor'));
		$languageId 					= JLanguageHelper::detectLanguage();
		$this->jsScripts['validation']	= 'var arrValidation=new Array;';
		$this->jsScripts['fieldInit']	= '';
		
		if(!$languageId)
		{
			$languageId = -1;
		}
		
		$this->form->setFieldAttribute('id', 'label', Jtext::_('COM_FORM2CONTENT_ID'));
		$this->form->setFieldAttribute('id', 'description', '');
		
		$this->overrideFieldLabel('title', $this->contentTypeSettings->get('title_caption'));
		$this->overrideFieldLabel('alias', $this->contentTypeSettings->get('title_alias_caption'));
		$this->overrideFieldLabel('tags', $this->contentTypeSettings->get('tags_caption'));
		
		$translatedDateFormat = F2cDateTimeHelper::getTranslatedDateFormat();
		
		$validationCounter = 0;

		if(count($this->item->fields))
		{
			foreach($this->item->fields as $field)
			{
				if($field->frontvisible)
				{
					$this->jsScripts['validation'] 	.= $field->getClientSideValidationScript($validationCounter);
					$this->jsScripts['fieldInit']	.= $field->getClientSideInitializationScript();
				}
			}
		}
								
		// Add validation scripts for the datefields
		if($this->contentTypeSettings->get('frontend_pubsel'))
		{
			$label = JText::_($this->form->getFieldAttribute('publish_up', 'label'), true);
			$this->jsScripts['validation'] .= F2C_Validation::createDatePickerValidation('jform_publish_up', $label, $this->dateFormat, $translatedDateFormat, false);
			
			$label = JText::_($this->form->getFieldAttribute('publish_down', 'label'), true);
			$this->jsScripts['validation'] .= F2C_Validation::createDatePickerValidation('jform_publish_down', $label, $this->dateFormat, $translatedDateFormat, false);
		}
		
		$this->submitForm 	= 'Joomla.submitform(task, document.getElementById(\'item-form\'));';
	}
	
	private function overrideFieldLabel($field, $caption, $group = null)
	{
		// only override the field label when a value has been provided
		if($caption)
		{
			$this->form->setFieldAttribute($field, 'label', $caption, $group);
		}
	}
	
	private function PrepareSettings($model)
	{		
		$this->settings	= null;
		$app 			= JFactory::getApplication();
		$menu 			= $app->getMenu();
		
		if(is_object($menu))
		{
			if ($item = $menu->getActive())
			{
				$this->settings = $menu->getParams($item->id);
			}
		}
		
		if(is_null($this->settings))
		{
			$this->settings = new JRegistry();
			$this->settings->set('editmode', 2); // direct edit
			
		}
		
		if($this->settings->get('contenttypeid', 0) == 0)
		{
			// Retrieve the item so we can set the Content Type Id for the model
			$item = $model->getItem();
			$this->settings->set('contenttypeid', (int)$item->projectid);
		}
		
		$model->contentTypeId = (int)$this->settings->get('contenttypeid');
		
		$canDo = Form2ContentHelper::getActions($this->state->get('filter.category_id'));
		
		// Set defaults
		$this->settings->set('show_save_and_new_button', true);
		$this->settings->set('show_save_as_copy_button', true);
		
		if($this->settings->get('editmode') != '' || !$canDo->get('core.create'))
		{
			// There's no menu-item (no parameters) or we are in Single Form mode or the user is not allowed to create new articles
			$this->settings->set('show_save_and_new_button', false);
			$this->settings->set('show_save_as_copy_button', false);
		}
	}
}
?>