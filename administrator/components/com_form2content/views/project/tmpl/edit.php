<?php 
defined('JPATH_PLATFORM') or die;

require_once(JPATH_COMPONENT.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'viewhelper.form2content.php');

JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
JHtml::_('behavior.keepalive');

JForm::addFieldPath(JPATH_COMPONENT_SITE.DIRECTORY_SEPARATOR.'models'.DIRECTORY_SEPARATOR.'fields');
?>
<script type="text/javascript">
Joomla.submitbutton = function(task) 
{
	if (task == 'project.cancel') 
	{
		Joomla.submitform(task, document.getElementById('adminForm'));
		return true;
	}
	
	if(!document.formvalidator.isValid(document.id('adminForm')))
	{
		alert('<?php echo $this->escape(JText::_('JGLOBAL_VALIDATION_FORM_FAILED'));?>');
		return false;
	}
	
	var fldTitleFrontEnd = document.getElementById('jform_settings_title_front_end');
	var fldTitleDefault = document.getElementById('jform_settings_title_default');
	
	if(fldTitleFrontEnd.value == 0 && fldTitleDefault.value == '')
	{
		alert("<?php echo JText::_('COM_FORM2CONTENT_ERROR_PROJECT_TITLE_DEFAULT_EMPTY', true); ?>");
		return false;		
	}

	var fldTemplateFrontEnd = document.getElementById('jform_settings_frontend_templsel');
	var fldIntroTemplate = document.getElementById('jform_settings_intro_template_id');

	if(fldTemplateFrontEnd.value == 0 && fldIntroTemplate.value == '')
	{
		alert("<?php echo JText::_('COM_FORM2CONTENT_ERROR_PROJECT_INTRO_TEMPLATE_DEFAULT_EMPTY', true); ?>");
		return false;		
	}

	Joomla.submitform(task, document.getElementById('adminForm'));
	return true;
}

function syncmetadata()
{
	if(confirm("<?php echo JText::_('COM_FORM2CONTENT_SYNC_METADATA_CONFIRM', true); ?>"))
	{
		Joomla.submitform('project.syncmetadata', document.getElementById('adminForm'));
	}
	else
	{
		return false;
	}
}

function syncjadvparms()
{
	if(confirm("<?php echo JText::_('COM_FORM2CONTENT_SYNC_JADVPARMS_CONFIRM', true); ?>"))
	{
		Joomla.submitform('project.syncjadvparms', document.getElementById('adminForm'));
	}
	else
	{
		return false;
	}
}
</script>
<form action="<?php echo JRoute::_('index.php?option=com_form2content&layout=edit&id='.(int) $this->item->id); ?>" method="post" name="adminForm" id="adminForm" class="form-validate">
<div class="row-fluid">
	<!-- Begin Content -->
	<div class="span12 form-horizontal">
		<div class="control-group">
			<div class="control-label"><?php echo $this->form->getLabel('id'); ?></div>
			<div class="controls"><?php echo $this->form->getInput('id'); ?></div>
		</div>
		<div class="control-group">
			<div class="control-label"><?php echo $this->form->getLabel('title'); ?></div>
			<div class="controls"><?php echo $this->form->getInput('title'); ?></div>
		</div>
		<div class="control-group">
			<div class="control-label"><?php echo $this->form->getLabel('article_caption', 'settings'); ?></div>
			<div class="controls"><?php echo $this->form->getInput('article_caption', 'settings'); ?></div>
		</div>

		<ul class="nav nav-tabs">
			<li class="active"><a href="#settings" data-toggle="tab"><?php echo JText::_('COM_FORM2CONTENT_F2C_SETTINGS');?></a></li>
			<li><a href="#advartparams" data-toggle="tab"><?php echo JText::_('COM_FORM2CONTENT_JOOMLA_ADVANCED_ARTICLE_PARAMETERS');?></a></li>
			<li><a href="#imagesurls" data-toggle="tab"><?php echo JText::_('COM_FORM2CONTENT_FIELDSET_URLS_AND_IMAGES');?></a></li>
			<li><a href="#metadata" data-toggle="tab"><?php echo JText::_('COM_FORM2CONTENT_METADATA_INFORMATION');?></a></li>
			<li><a href="#permissions" data-toggle="tab"><?php echo JText::_('COM_FORM2CONTENT_FIELDSET_RULES_CONTENTTYPE');?></a></li>
		</ul>
		<div class="tab-content">
			<!-- Begin Tabs -->
			<div class="tab-pane active" id="settings">
				<?php  $fieldSets = $this->form->getFieldsets('settings'); ?>
				<?php foreach ($fieldSets as $name => $fieldSet) : ?>
					<h4><?php echo !empty($fieldSet->description) ? $this->escape(JText::_($fieldSet->description)) : ''; ?></h4>
					<?php foreach ($this->form->getFieldset($name) as $field) : ?>
						<div class="control-group">
							<div class="control-label">
								<?php echo $field->label; ?>
							</div>
							<div class="controls">
								<?php echo $field->input; ?>
							</div>
						</div>
					<?php endforeach; ?>
					<?php if($fieldSet->name == 'form_template') : ?>
						<div class="control-group">
							<div class="control-label">&nbsp;</div>
							<div class="controls">
								<input type="button" value="<?php echo JText::_('COM_FORM2CONTENT_GENERATE_DEFAULT_FORM_TEMPLATE');?>" onclick="generateDefaultFormTemplate(<?php echo $this->item->id; ?>, 0);" class="btn" />
							</div>
						</div>
					<?php endif; ?>
				<?php endforeach; ?>
			</div>
			<div class="tab-pane" id="advartparams">
	 			<?php  $fieldSets = $this->form->getFieldsets('attribs'); ?>
				<?php foreach ($fieldSets as $name => $fieldSet) : ?>
					<?php if (isset($fieldSet->description) && trim($fieldSet->description)) : ?>
						<p class="tip"><?php echo $this->escape(JText::_($fieldSet->description));?></p>
					<?php endif;
					foreach ($this->form->getFieldset($name) as $field) : ?>
						<div class="control-group">
							<div class="control-label">
								<?php echo $field->label; ?>
							</div>
							<div class="controls">
								<?php echo $field->input; ?>
							</div>
						</div>
					<?php endforeach; ?>
					<div class="control-group">
						<div class="control-label">
							<label id="jform_attribs_sync-lbl" for="jform_attribs_sync" class="hasTip" title="<?php echo JText::_('COM_FORM2CONTENT_SYNCHRONIZE'); ?>::<?php echo JText::_('COM_FORM2CONTENT_SYNC_JADVPARMS_DESC'); ?>"><?php echo JText::_('COM_FORM2CONTENT_SYNCHRONIZE'); ?></label>
						</div>
						<div class="controls">
							<input type="button" name="jform[attribs][sync]" id="jform_attribs_sync" value="<?php echo JText::_('COM_FORM2CONTENT_SYNC_EXISTING_ARTICLES'); ?>" class="btn" onclick="syncjadvparms();" />
						</div>
					</div>
				<?php endforeach; ?>
			</div>
			<div class="tab-pane" id="imagesurls">
				<div class="control-group">
					<!-- 
					<div class="control-label">
						<?php echo $this->form->getLabel('images'); ?>
					</div>
					<div class="controls">
						<?php echo $this->form->getInput('images'); ?>
					</div>
					 -->
					<div class="span6 form-horizontal">
						<?php foreach($this->form->getGroup('images') as $field): ?>
							<div class="control-group">
								<div class="control-label">
								<?php if (!$field->hidden): ?>
									<?php echo $field->label; ?>
								<?php endif; ?>
								</div>
								<div class="controls">
								<?php echo $field->input; ?>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
					<div class="span6 form-horizontal">
						<?php foreach($this->form->getGroup('urls') as $field): ?>
							<div class="control-group">
								<div class="control-label">
								<?php if (!$field->hidden): ?>
									<?php echo $field->label; ?>
								<?php endif; ?>
								</div>
								<div class="controls">
								<?php echo $field->input; ?>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
			<div class="tab-pane" id="metadata">
				<fieldset>
					<?php echo $this->loadTemplate('metadata'); ?>
					<div class="control-group">
						<div class="control-label"><label id="jform_metadata_sync-lbl" for="jform_metadata_sync" class="hasTip" title="<?php echo JText::_('COM_FORM2CONTENT_SYNCHRONIZE'); ?>::<?php echo JText::_('COM_FORM2CONTENT_SYNC_METADATA_DESC'); ?>"><?php echo JText::_('COM_FORM2CONTENT_SYNCHRONIZE'); ?></label></div>
						<div class="controls"><input type="button" name="jform[metadata][sync]" id="jform_metadata_sync" value="<?php echo JText::_('COM_FORM2CONTENT_SYNC_EXISTING_ARTICLES'); ?>" class="btn" onclick="syncmetadata();" /></div>
					</div>
				</fieldset>			
			</div>
			<div class="tab-pane" id="permissions">
				<fieldset><?php echo $this->form->getInput('rules'); ?></fieldset>
			</div>
		</div>
	</div>	
	<!--  End Content -->
</div>
<?php echo $this->form->getInput('published'); ?>
<?php echo $this->form->getInput('created_by'); ?>
<?php echo $this->form->getInput('created'); ?>
<?php echo $this->form->getInput('modified'); ?>
<?php echo $this->form->getInput('version'); ?>
<input type="hidden" name="task" value="" />
<input type="hidden" name="return" value="<?php echo JFactory::getApplication()->input->getCmd('return');?>" />
<?php echo JHtml::_('form.token'); ?>
<?php echo DisplayCredits(); ?>
</form>