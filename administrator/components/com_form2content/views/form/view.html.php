<?php
defined('JPATH_PLATFORM') or die('Restricted acccess');

require_once(JPATH_COMPONENT.DIRECTORY_SEPARATOR.'models'.DIRECTORY_SEPARATOR.'project.php');

jimport('joomla.application.component.view');
jimport('joomla.language.helper');

class Form2ContentViewForm extends JViewLegacy
{
	protected $form;
	protected $item;
	protected $fields;
	protected $fieldsNew;
	protected $fieldValues = array();
	protected $state;
	protected $jArticle;
	protected $jsScripts = array();
	protected $renderer;
	protected $nullDate;
	protected $translatedFields = array();
	protected $contentType;
	
	function display($tpl = null)
	{
		$model 				= $this->getModel();
		$db					= $this->get('Dbo');		
		$this->form			= $this->get('Form');
		$this->item			= $this->get('Item');
		$this->state		= $this->get('State');
		$this->canDo		= Form2ContentHelperAdmin::getActions($this->state->get('filter.category_id'));
		$this->jArticle 	= $model->getJarticle($this->item->id);
		$this->nullDate		= $db->getNullDate();
		$this->fields		= $model->loadFieldData($this->item->id, $this->item->projectid);
		
		// Check for errors.
		if (count($errors = $this->get('Errors'))) 
		{
			throw new Exception(implode("\n", $errors));
			return false;
		}

		// load com_content language file
		$lang = JFactory::getLanguage();
		$lang->load('com_content', JPATH_ADMINISTRATOR);
		
		$this->contentType = F2cFactory::getContentType($this->item->projectid);
		
		$document = JFactory::getDocument();
		$document->addStyleSheet('../media/com_form2content/css/f2cfields.css');
		
		$this->prepareForm($this->contentType);
		$this->addToolbar($this->contentType);

		parent::display($tpl);		
	}	
	
	protected function addToolbar($contentType)
	{		
		JFactory::getApplication()->input->set('hidemainmenu', true);
		
		$canDo		= Form2ContentHelperAdmin::getActions($this->state->get('filter.category_id'), $this->item->id);
		$isNew 		= ($this->item->id == 0);
		$formTitle 	= JText::_('COM_FORM2CONTENT_ARTICLE_MANAGER') . ' : ';
		$formTitle .= ($isNew ? JText::_('COM_FORM2CONTENT_NEW') : JText::_('COM_FORM2CONTENT_EDIT')) . ' ';
		$formTitle .= $contentType->settings['article_caption'] ? $contentType->settings['article_caption'] : JText::_('COM_FORM2CONTENT_FORM');
		
		JToolBarHelper::title($formTitle);
		JToolBarHelper::apply('form.apply', 'JTOOLBAR_APPLY');
		JToolBarHelper::save('form.save', 'JTOOLBAR_SAVE');
		
		if ($canDo->get('core.create')) 
		{
			JToolBarHelper::save2new('form.save2new');
			JToolBarHelper::save2copy('form.save2copy');
		}
		
		if ($isNew)  
		{
			JToolBarHelper::cancel('form.cancel', 'JTOOLBAR_CANCEL');
		} 
		else 
		{
			// for existing items the button is renamed `close`
			JToolBarHelper::cancel('form.cancel', 'JTOOLBAR_CLOSE');
		}
	}
	
	private function prepareForm($contentType)
	{
		$db 							= JFactory::getDBO();	
		$editor 						= JEditor::getInstance(JFactory::getConfig()->get('editor'));
		$languageId 					= JLanguageHelper::detectLanguage();
		$dateFormat						= F2cFactory::getConfig()->get('date_format');
		$this->jsScripts['validation']	= 'var arrValidation=new Array;';
		$this->jsScripts['fieldInit']	= '';
		
		if(!$languageId)
		{
			$languageId = -1;
		}
		
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
		$label = JText::_($this->form->getFieldAttribute('created', 'label'), true);
		$this->jsScripts['validation'] .= F2C_Validation::createDatePickerValidation('jform_created', $label, $dateFormat, $translatedDateFormat, false);
		$label = JText::_($this->form->getFieldAttribute('publish_up', 'label'), true);
		$this->jsScripts['validation'] .= F2C_Validation::createDatePickerValidation('jform_publish_up', $label, $dateFormat, $translatedDateFormat, false);
		$label = JText::_($this->form->getFieldAttribute('publish_down', 'label'), true);
		$this->jsScripts['validation'] .= F2C_Validation::createDatePickerValidation('jform_publish_down', $label, $dateFormat, $translatedDateFormat, false);
	}
}
?>