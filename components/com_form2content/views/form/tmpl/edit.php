<?php
// No direct access.
defined('_JEXEC') or die;

JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
JHtml::_('behavior.keepalive');
JHTML::_('behavior.framework');

JHtml::script('com_form2content/f2c_frmval.js', false, true);
JHtml::script('com_form2content/f2c_util.js', false, true);

JForm::addFieldPath(JPATH_COMPONENT_SITE . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . 'fields');

$document 	= JFactory::getDocument();
?>
<style>
.form-horizontal .control-label 
{
    text-align: left;
}

.row-fluid
{
	padding-top: 20px;
}

.f2c_button_bar
{
	float: right;
}
</style>
<script type="text/javascript">
<!--	
var jTextUp = '<?php echo JText::_('COM_FORM2CONTENT_UP', true); ?>';
var jTextDown = '<?php echo JText::_('COM_FORM2CONTENT_DOWN', true); ?>';
var jTextAdd = '<?php echo JText::_('COM_FORM2CONTENT_ADD', true); ?>';
var jTextDelete = '<?php echo JText::_('COM_FORM2CONTENT_DELETE', true); ?>';
var jImagePath = '<?php echo JURI::root(true).'/media/com_form2content/images/'; ?>';
var dateFormat = '<?php echo $this->dateFormat; ?>'
<?php
echo $this->jsScripts['fieldInit'];
?>
Joomla.submitbutton = function(task) 
{
	if (task == 'form.cancel')
	{
		Joomla.submitform(task, document.getElementById('item-form'));
		return true;
	}

	if(!document.formvalidator.isValid(document.id('item-form')))
	{
		alert('<?php echo $this->escape(JText::_('JGLOBAL_VALIDATION_FORM_FAILED'));?>');
		return false;
	}

	var form = document.id('item-form');

	<?php if($this->contentTypeSettings->get('title_front_end')) : ?>		
	if(form.jform_title.value == '')
	{
		alert('<?php echo sprintf(JText::_('COM_FORM2CONTENT_ERROR_FIELD_X_REQUIRED', true), $this->form->getFieldAttribute('title', 'label')); ?>');
		return false;
	}
	<?php endif; ?>
	
	if(form.jform_catid.value == '')
	{
		alert('<?php echo sprintf(JText::_('COM_FORM2CONTENT_ERROR_FIELD_X_REQUIRED', true), JText::_($this->form->getFieldAttribute('catid', 'label'))); ?>');
		return false;
	}	
		
	<?php 
	echo $this->jsScripts['validation'];
	echo $this->submitForm;
	?>
}
-->
</script>
<div class="f2c-article<?php echo htmlspecialchars($this->params->get('pageclass_sfx')); ?>">
	<h1><?php echo $this->pageTitle; ?></h1>
	<form action="<?php echo JRoute::_('index.php?option=com_form2content&view=form&layout=edit&id='.(int) $this->item->id); ?>" method="post" name="adminForm" id="item-form" class="form-validate" enctype="multipart/form-data">
	
		<div class="f2c_button_bar">
			<button class="btn" type="button" onclick="javascript:Joomla.submitbutton('form.apply')"><?php echo JText::_('COM_FORM2CONTENT_TOOLBAR_APPLY'); ?></button>
			<button class="btn" type="button" onclick="javascript:Joomla.submitbutton('form.save')"><?php echo JText::_('COM_FORM2CONTENT_TOOLBAR_SAVE'); ?></button>
			<?php if($this->settings->get('show_save_and_new_button')) :?>
				<button class="btn" type="button" class="f2c_button f2c_saveandnew" onclick="javascript:Joomla.submitbutton('form.save2new')"><?php echo JText::_('COM_FORM2CONTENT_TOOLBAR_SAVE_AND_NEW'); ?></button>
			<?php endif;?>
			<?php if($this->settings->get('show_save_as_copy_button')) :?>
				<button class="btn" type="button" class="f2c_button f2c_saveascopy" onclick="javascript:Joomla.submitbutton('form.save2copy')"><?php echo JText::_('COM_FORM2CONTENT_TOOLBAR_SAVE_AS_COPY'); ?></button>
			<?php endif;?>
			<?php if($this->item->id == 0) { ?>
				<button class="btn" type="button" onclick="javascript:Joomla.submitbutton('form.cancel')"><?php echo JText::_('COM_FORM2CONTENT_TOOLBAR_CANCEL'); ?></button>
			<?php } else { ?>
				<button class="btn" type="button" onclick="javascript:Joomla.submitbutton('form.cancel')"><?php echo JText::_('COM_FORM2CONTENT_TOOLBAR_CLOSE'); ?></button>
			<?php } ?>
		</div>

		<div class="clearfix"></div>
		
		<div class="row-fluid  form-horizontal">
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('id'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('id'); ?></div>
			</div>
			<?php if($this->contentTypeSettings->get('title_front_end')) : ?>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('title'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('title'); ?></div>
			</div>
			<?php endif; ?>
			<?php if($this->contentTypeSettings->get('title_alias_front_end')) : ?>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('alias'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('alias'); ?></div>
			</div>
			<?php endif; ?>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('metadesc'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('metadesc'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('metakey'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('metakey'); ?></div>
			</div>
			<?php if($this->contentTypeSettings->get('tags_front_end', 0)) : ?>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('tags'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('tags'); ?></div>
			</div>
			<?php endif; ?>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('catid'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('catid'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('created_by'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('created_by'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('created_by_alias'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('created_by_alias'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('access'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('access'); ?></div>
			</div>
			<?php if($this->contentTypeSettings->get('frontend_templsel')) : ?>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('intro_template'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('intro_template'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('main_template'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('main_template'); ?></div>
			</div>
			<?php endif; ?>
			<?php if($this->contentTypeSettings->get('date_created_front_end')) : ?>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('created'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('created'); ?></div>
			</div>
			<?php endif; ?>
			<?php if($this->contentTypeSettings->get('frontend_pubsel')) : ?>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('publish_up'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('publish_up'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('publish_down'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('publish_down'); ?></div>
			</div>
			<?php endif; ?>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('state'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('state'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('language'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('language'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('featured'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('featured'); ?></div>
			</div>
			<?php
			// User defined fields
			if(count($this->item->fields))
			{
				foreach ($this->item->fields as $field) 
				{
					// skip processing of hidden fields
					if(!$field->frontvisible) continue;
					?>
					<div class="control-group f2c_field <?php echo 'f2c_' . $field->fieldname; ?>">
						<div class="control-label f2c_field_label"><?php echo $field->renderLabel($this->translatedFields); ?></div>
						<div class="controls f2c_field_value"><?php echo $field->render($this->translatedFields, $this->contentType->settings, array(), $this->form, $this->item->id); ?></div>
					</div>
					<?php
				}
			}
			?>					
		</div>
		
		<div class="clearfix"></div>
				
		<div class="f2c_button_bar">
			<button class="btn" type="button" onclick="javascript:Joomla.submitbutton('form.apply')"><?php echo JText::_('COM_FORM2CONTENT_TOOLBAR_APPLY'); ?></button>
			<button class="btn" type="button" onclick="javascript:Joomla.submitbutton('form.save')"><?php echo JText::_('COM_FORM2CONTENT_TOOLBAR_SAVE'); ?></button>
			<?php if($this->settings->get('show_save_and_new_button')) :?>
				<button class="btn" type="button" class="f2c_button f2c_saveandnew" onclick="javascript:Joomla.submitbutton('form.save2new')"><?php echo JText::_('COM_FORM2CONTENT_TOOLBAR_SAVE_AND_NEW'); ?></button>
			<?php endif;?>
			<?php if($this->settings->get('show_save_as_copy_button')) :?>
				<button class="btn" type="button" class="f2c_button f2c_saveascopy" onclick="javascript:Joomla.submitbutton('form.save2copy')"><?php echo JText::_('COM_FORM2CONTENT_TOOLBAR_SAVE_AS_COPY'); ?></button>
			<?php endif;?>
			<?php if($this->item->id == 0) { ?>
				<button class="btn" type="button" onclick="javascript:Joomla.submitbutton('form.cancel')"><?php echo JText::_('COM_FORM2CONTENT_TOOLBAR_CANCEL'); ?></button>
			<?php } else { ?>
				<button class="btn" type="button" onclick="javascript:Joomla.submitbutton('form.cancel')"><?php echo JText::_('COM_FORM2CONTENT_TOOLBAR_CLOSE'); ?></button>
			<?php } ?>
		</div>

		<?php echo $this->form->getInput('projectid'); ?>
		<input type="hidden" name="task" value="" />
		<input type="hidden" name="return" value="<?php echo $this->return_page; ?>" />
		<input type="hidden" name="Itemid" value="<?php echo JFactory::getApplication()->input->getInt('Itemid'); ?>" />			
		<?php echo JHtml::_('form.token'); ?>
		
	</form>
</div>