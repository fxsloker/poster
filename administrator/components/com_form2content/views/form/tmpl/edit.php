<?php
// No direct access.
defined('JPATH_PLATFORM') or die;

require_once(JPATH_COMPONENT.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'viewhelper.form2content.php');

JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
JHtml::_('behavior.keepalive');
JHtml::_('formbehavior.chosen', 'select');

$input = JFactory::getApplication()->input;

JHtml::script('com_form2content/f2c_frmval.js', false, true);
JHtml::script('com_form2content/f2c_util.js', false, true);

JForm::addFieldPath(JPATH_COMPONENT_SITE.DIRECTORY_SEPARATOR.'models'.DIRECTORY_SEPARATOR.'fields');

$document 	= JFactory::getDocument();
$version	= new JVersion();
?>
<script type="text/javascript">
<!--
var jTextUp = '<?php echo JText::_('COM_FORM2CONTENT_UP', true); ?>';
var jTextDown = '<?php echo JText::_('COM_FORM2CONTENT_DOWN', true); ?>';
var jTextAdd = '<?php echo JText::_('COM_FORM2CONTENT_ADD', true); ?>';
var jTextDelete = '<?php echo JText::_('COM_FORM2CONTENT_DELETE', true); ?>';
var jImagePath = '<?php echo JURI::root(true).'/media/com_form2content/images/'; ?>';
<?php
echo $this->jsScripts['fieldInit'];
?>
Joomla.submitbutton = function(task) 
{
	if (task == 'form.cancel')
	{
		Joomla.submitform(task, document.getElementById('adminForm'));
		return true;
	}
	
	if(!document.formvalidator.isValid(document.id('adminForm')))
	{
		alert('<?php echo $this->escape(JText::_('JGLOBAL_VALIDATION_FORM_FAILED'));?>');
		return false;
	}

	var form = document.id('adminForm');

	if(form.jform_catid.value == '')
	{
		alert('<?php echo sprintf(JText::_('COM_FORM2CONTENT_ERROR_FIELD_X_REQUIRED', true), JText::_($this->form->getFieldAttribute('catid', 'label'))); ?>');
		return false;
	}
	
	<?php echo $this->jsScripts['validation']; ?>
	Joomla.submitform(task, document.getElementById('adminForm'));		
}
-->
</script>
<form action="<?php echo JRoute::_('index.php?option=com_form2content&layout=edit&id='.(int)$this->item->id); ?>" method="post" name="adminForm" id="adminForm" class="form-validate" enctype="multipart/form-data">
	<div class="row-fluid">
		<!-- Begin Content -->
		<div class="span10 form-horizontal">
			<ul class="nav nav-tabs">
				<li class="active"><a href="#general" data-toggle="tab"><?php echo JText::_('COM_FORM2CONTENT_ARTICLE_DETAILS');?></a></li>
				<li><a href="#publishing" data-toggle="tab"><?php echo JText::_('COM_FORM2CONTENT_FIELDSET_PUBLISHING');?></a></li>
				<?php $fieldSets = $this->form->getFieldsets('attribs'); ?>
				<?php foreach ($fieldSets as $name => $fieldSet) : ?>
					<li><a href="#attrib-<?php echo $name;?>" data-toggle="tab"><?php echo JText::_($fieldSet->label);?></a></li>
				<?php endforeach; ?>				
				<li><a href="#metadata" data-toggle="tab"><?php echo JText::_('JGLOBAL_FIELDSET_METADATA_OPTIONS');?></a></li>
				<li><a href="#permissions" data-toggle="tab"><?php echo JText::_('COM_FORM2CONTENT_FIELDSET_RULES');?></a></li>
			</ul>
				
			<div class="tab-content">
			<!-- Begin Tabs -->
			<div class="tab-pane active" id="general">
				<div class="row-fluid">
					<div class="span6">
						<div class="control-group">
							<div class="control-label"><?php echo $this->form->getLabel('title'); ?></div>
							<div class="controls"><?php echo $this->form->getInput('title'); ?></div>
						</div>
						<div class="control-group">
							<div class="control-label"><?php echo $this->form->getLabel('catid'); ?></div>
							<div class="controls"><?php echo $this->form->getInput('catid'); ?></div>
						</div>
					</div>
					<div class="span6">
						<div class="control-group">
							<div class="control-label"><?php echo $this->form->getLabel('intro_template'); ?></div>
							<div class="controls"><?php echo $this->form->getInput('intro_template'); ?></div>
						</div>
						<div class="control-group">
							<div class="control-label"><?php echo $this->form->getLabel('main_template'); ?></div>
							<div class="controls"><?php echo $this->form->getInput('main_template'); ?></div>
						</div>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span12">
					<?php
					// User defined fields
					if(count($this->fields))
					{
						foreach($this->fields as $field)
						{								
							?>
							<div class="control-group">
								<div class="control-label"><?php echo $field->renderLabel($this->translatedFields); ?></div>
								<div class="controls f2cfield"><?php echo $field->render($this->translatedFields, $this->contentType->settings, array(), $this->form, $this->item->id); ?></div>
							</div>
							<?php
						}
					}
					?>							
					</div>
				</div>
			</div>
			<div class="tab-pane" id="publishing">
				<div class="row-fluid">
					<div class="span6">
						<div class="control-group">
							<div class="control-label">
								<?php echo $this->form->getLabel('alias'); ?>
							</div>
							<div class="controls">
								<?php echo $this->form->getInput('alias'); ?>
							</div>
						</div>
						<div class="control-group">
							<div class="control-label">
								<?php echo $this->form->getLabel('id'); ?>
							</div>
							<div class="controls">
								<?php echo $this->form->getInput('id'); ?>
							</div>
						</div>
						<div class="control-group">
							<div class="control-label">
								<?php echo $this->form->getLabel('created_by'); ?>
							</div>
							<div class="controls">
								<?php echo $this->form->getInput('created_by'); ?>
							</div>
						</div>
						<div class="control-group">
							<div class="control-label">
								<?php echo $this->form->getLabel('created_by_alias'); ?>
							</div>
							<div class="controls">
								<?php echo $this->form->getInput('created_by_alias'); ?>
							</div>
						</div>
						<div class="control-group">
							<div class="control-label">
								<?php echo $this->form->getLabel('created'); ?>
							</div>
							<div class="controls">
								<?php echo $this->form->getInput('created'); ?>
							</div>
						</div>
					</div>
					<div class="span6">
						<div class="control-group">
							<div class="control-label">
								<?php echo $this->form->getLabel('publish_up'); ?>
							</div>
							<div class="controls">
								<?php echo $this->form->getInput('publish_up'); ?>
							</div>
						</div>
						<div class="control-group">
							<div class="control-label">
								<?php echo $this->form->getLabel('publish_down'); ?>
							</div>
							<div class="controls">
								<?php echo $this->form->getInput('publish_down'); ?>
							</div>
						</div>
						<?php if ($this->jArticle->modified_by) : ?>
							<div class="control-group">
								<div class="control-label">
									<?php echo $this->form->getLabel('modified'); ?>
								</div>
								<div class="controls">
									<?php echo $this->form->getInput('modified'); ?>
								</div>
							</div>
						<?php endif; ?>
	
						<?php if ($this->jArticle->version) : ?>
							<div class="control-group">
								<div class="control-label">
									<?php echo $this->form->getLabel('version'); ?>
								</div>
								<div class="controls">
									<?php echo $this->form->getInput('version'); ?>
								</div>
							</div>
						<?php endif; ?>
	
						<?php if ($this->jArticle->hits) : ?>
							<div class="control-group">
								<div class="control-label">
									<?php echo $this->form->getLabel('hits'); ?>
								</div>
								<div class="controls">
									<?php echo $this->form->getInput('hits'); ?>
								</div>
							</div>
						<?php endif; ?>
					</div>
				</div>			
			</div>
					
 			<?php  $fieldSets = $this->form->getFieldsets('attribs'); ?>
			<?php foreach ($fieldSets as $name => $fieldSet) : ?>
				<div class="tab-pane" id="attrib-<?php echo $name;?>">
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
				</div>
			<?php endforeach; ?>
			
			<div class="tab-pane" id="metadata">
				<fieldset>
					<?php echo $this->loadTemplate('metadata'); ?>
				</fieldset>
			</div>

			<?php if ($this->canDo->get('core.admin')): ?>
				<div class="tab-pane" id="permissions">
					<fieldset>
						<?php echo $this->form->getInput('rules'); ?>
					</fieldset>
				</div>
			<?php endif; ?>
			<!-- End Tabs -->
			</div>
			<input type="hidden" name="task" value="" />
			<input type="hidden" name="return" value="<?php echo $input->getCmd('return');?>" />
			<?php echo JHtml::_('form.token'); ?>								
		</div>
		<!-- End Content -->
		<!-- Begin Sidebar -->
		<div class="span2">
			<h4><?php echo JText::_('JDETAILS');?></h4>
			<hr />
			<fieldset class="form-vertical">
				<div class="control-group">
					<div class="controls">
						<?php echo $this->form->getValue('title'); ?>
					</div>
				</div>
				<div class="control-group">
					<div class="control-label">
						<?php echo $this->form->getLabel('state'); ?>
					</div>
					<div class="controls">
						<?php echo $this->form->getInput('state'); ?>
					</div>
				</div>

				<div class="control-group">
					<div class="control-label">
						<?php echo $this->form->getLabel('access'); ?>
					</div>
					<div class="controls">
						<?php echo $this->form->getInput('access'); ?>
					</div>
				</div>
				<div class="control-group">
					<div class="control-label">
						<?php echo $this->form->getLabel('featured'); ?>
					</div>
					<div class="controls">
						<?php echo $this->form->getInput('featured'); ?>
					</div>
				</div>
				<div class="control-group">
					<div class="control-label">
						<?php echo $this->form->getLabel('language'); ?>
					</div>
					<div class="controls">
						<?php echo $this->form->getInput('language'); ?>
					</div>
				</div>
				<div class="control-group">
					<div class="control-label">
						<?php echo $this->form->getLabel('tags'); ?>
					</div>
					<div class="controls">
						<?php echo $this->form->getInput('tags'); ?>
					</div>
				</div>
			</fieldset>
		</div>
		<!-- End Sidebar -->
		<?php echo DisplayCredits(); ?>	
	</div>
	<?php echo $this->form->getInput('projectid'); ?>
</form>