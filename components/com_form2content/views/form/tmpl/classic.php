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
?>
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
		<div style="float: right;">
			<button type="button" onclick="javascript:Joomla.submitbutton('form.apply')"><?php echo JText::_('COM_FORM2CONTENT_TOOLBAR_APPLY'); ?></button>
			<button type="button" onclick="javascript:Joomla.submitbutton('form.save')"><?php echo JText::_('COM_FORM2CONTENT_TOOLBAR_SAVE'); ?></button>
			<?php if($this->settings->get('show_save_and_new_button')) :?>
				<button type="button" class="f2c_button f2c_saveandnew" onclick="javascript:Joomla.submitbutton('form.save2new')"><?php echo JText::_('COM_FORM2CONTENT_TOOLBAR_SAVE_AND_NEW'); ?></button>
			<?php endif;?>
			<?php if($this->settings->get('show_save_as_copy_button')) :?>
				<button type="button" class="f2c_button f2c_saveascopy" onclick="javascript:Joomla.submitbutton('form.save2copy')"><?php echo JText::_('COM_FORM2CONTENT_TOOLBAR_SAVE_AS_COPY'); ?></button>
			<?php endif;?>
			<?php if($this->item->id == 0) { ?>
				<button type="button" onclick="javascript:Joomla.submitbutton('form.cancel')"><?php echo JText::_('COM_FORM2CONTENT_TOOLBAR_CANCEL'); ?></button>
			<?php } else { ?>
				<button type="button" onclick="javascript:Joomla.submitbutton('form.cancel')"><?php echo JText::_('COM_FORM2CONTENT_TOOLBAR_CLOSE'); ?></button>
			<?php } ?>
		</div>
	
		<div class="clearfix"></div>
		
		<div class="width-60 fltlft">
			<fieldset class="adminform">
			<table class="adminform" width="100%">
			<tr>
				<td valign="top"><?php echo $this->form->getLabel('id'); ?></td>
				<td valign="top"><?php echo $this->form->getInput('id'); ?></td>
			</tr>
			<?php if($this->contentTypeSettings->get('title_front_end')) : ?>
			<tr>
				<td valign="top"><?php echo $this->form->getLabel('title'); ?></td>
				<td valign="top"><?php echo $this->form->getInput('title'); ?></td>
			</tr>
			<?php endif; ?>
			<?php if($this->contentTypeSettings->get('title_alias_front_end')) : ?>
			<tr>
				<td valign="top"><?php echo $this->form->getLabel('alias'); ?></td>
				<td valign="top"><?php echo $this->form->getInput('alias'); ?></td>
			</tr>
			<?php endif; ?>
			<tr>
				<td valign="top"><?php echo $this->form->getLabel('metadesc'); ?></td>
				<td valign="top"><?php echo $this->form->getInput('metadesc'); ?></td>
			</tr>
			<tr>
				<td valign="top"><?php echo $this->form->getLabel('metakey'); ?></td>
				<td valign="top"><?php echo $this->form->getInput('metakey'); ?></td>
			</tr>
			<?php if($this->contentTypeSettings->get('tags_front_end', 0)) : ?>
			<tr>
				<td valign="top"><?php echo $this->form->getLabel('tags'); ?></td>
				<td valign="top"><?php echo $this->form->getInput('tags'); ?></td>
			</tr>
			<?php endif; ?>
			<tr>
				<td valign="top"><?php echo $this->form->getLabel('catid'); ?></td>
				<td valign="top"><?php echo $this->form->getInput('catid'); ?></td>
			</tr>
			<tr>
				<td valign="top"><?php echo $this->form->getLabel('created_by'); ?></td>
				<td valign="top"><?php echo $this->form->getInput('created_by'); ?></td>
			</tr>
			<tr>
				<td valign="top"><?php echo $this->form->getLabel('created_by_alias'); ?></td>
				<td valign="top"><?php echo $this->form->getInput('created_by_alias'); ?></td>
			</tr>
			<tr>
				<td valign="top"><?php echo $this->form->getLabel('access'); ?></td>
				<td valign="top"><?php echo $this->form->getInput('access'); ?></td>
			</tr>
			<?php
			if($this->contentTypeSettings->get('frontend_templsel')) : ?>
			<tr>
				<td valign="top"><?php echo $this->form->getLabel('intro_template'); ?></td>
				<td valign="top"><?php echo $this->form->getInput('intro_template'); ?></td>
			</tr>
			<tr>
				<td valign="top"><?php echo $this->form->getLabel('main_template'); ?></td>
				<td valign="top"><?php echo $this->form->getInput('main_template'); ?></td>
			</tr>
			<?php endif; ?>
			<?php if($this->contentTypeSettings->get('date_created_front_end')) : ?>
			<tr>
				<td valign="top"><?php echo $this->form->getLabel('created'); ?></td>
				<td valign="top"><?php echo $this->form->getInput('created'); ?></td>
			</tr>
			<?php endif; ?>					
			<?php if($this->contentTypeSettings->get('frontend_pubsel')) : ?>
			<tr>
				<td valign="top"><?php echo $this->form->getLabel('publish_up'); ?></td>
				<td valign="top"><?php echo $this->form->getInput('publish_up'); ?></td>
			</tr>
			<tr>
				<td valign="top"><?php echo $this->form->getLabel('publish_down'); ?></td>
				<td valign="top"><?php echo $this->form->getInput('publish_down'); ?></td>
			</tr>
			<?php endif; ?>					
			<tr>
				<td valign="top"><?php echo $this->form->getLabel('state'); ?></td>
				<td valign="top"><?php echo $this->form->getInput('state'); ?></td>
			</tr>
			<tr>
				<td valign="top"><?php echo $this->form->getLabel('language'); ?></td>
				<td valign="top"><?php echo $this->form->getInput('language'); ?></td>
			</tr>
			<tr>
				<td valign="top"><?php echo $this->form->getLabel('featured'); ?></td>
				<td valign="top"><?php echo $this->form->getInput('featured'); ?></td>
			</tr>
			<?php
			// User defined fields
			if(count($this->item->fields))
			{
				foreach ($this->item->fields as $field) 
				{
					// skip processing of hidden fields
					if(!$field->frontvisible) continue;																			
					?>
					<tr class="f2c_field <?php echo 'f2c_' . $field->fieldname; ?>">
						<td width="100" align="left" class="key f2c_field_label" valign="top">
							<?php echo $field->renderLabel($this->translatedFields); ?>
						</td>
						<td valign="top" class="f2c_field_value">
							<?php echo $field->render($this->translatedFields, $this->contentType->settings, array(), $this->form, $this->item->id); ?>			
						</td>
					</tr>
					<?php
				}
			}
			?>		
			</table>						
			</fieldset>
		</div>
		<div class="clr"></div>
		<div>
			<?php echo $this->form->getInput('projectid'); ?>
			<input type="hidden" name="task" value="" />
			<input type="hidden" name="return" value="<?php echo $this->return_page; ?>" />
			<input type="hidden" name="Itemid" value="<?php echo JFactory::getApplication()->input->getInt('Itemid'); ?>" />			
			<?php echo JHtml::_('form.token'); ?>
		</div>
		
		<div class="clearfix"></div>
		
		<div style="float: right;">
			<button type="button" onclick="javascript:Joomla.submitbutton('form.apply')"><?php echo JText::_('COM_FORM2CONTENT_TOOLBAR_APPLY'); ?></button>
			<button type="button" onclick="javascript:Joomla.submitbutton('form.save')"><?php echo JText::_('COM_FORM2CONTENT_TOOLBAR_SAVE'); ?></button>
			<?php if($this->settings->get('show_save_and_new_button')) :?>
				<button type="button" class="f2c_button f2c_saveandnew" onclick="javascript:Joomla.submitbutton('form.save2new')"><?php echo JText::_('COM_FORM2CONTENT_TOOLBAR_SAVE_AND_NEW'); ?></button>
			<?php endif;?>
			<?php if($this->settings->get('show_save_as_copy_button')) :?>
				<button type="button" class="f2c_button f2c_saveascopy" onclick="javascript:Joomla.submitbutton('form.save2copy')"><?php echo JText::_('COM_FORM2CONTENT_TOOLBAR_SAVE_AS_COPY'); ?></button>
			<?php endif;?>
			<?php if($this->item->id == 0) { ?>
				<button type="button" onclick="javascript:Joomla.submitbutton('form.cancel')"><?php echo JText::_('COM_FORM2CONTENT_TOOLBAR_CANCEL'); ?></button>
			<?php } else { ?>
				<button type="button" onclick="javascript:Joomla.submitbutton('form.cancel')"><?php echo JText::_('COM_FORM2CONTENT_TOOLBAR_CLOSE'); ?></button>
			<?php } ?>
		</div>
	</form>
</div>