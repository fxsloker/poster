<?php 
defined('JPATH_PLATFORM') or die;

require_once(JPATH_COMPONENT.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'viewhelper.form2content.php');

JHtml::_('behavior.tooltip');
JHtml::_('behavior.keepalive');

require_once(JPATH_COMPONENT_SITE.DIRECTORY_SEPARATOR.'shared.form2content.php');
require_once(JPATH_COMPONENT.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'viewhelper.form2content.php');
?>
<script type="text/javascript">
//<!--
Joomla.submitbutton = function(task) 
{
	if (task == 'template.cancel') 
	{
		Joomla.submitform(task, document.getElementById('adminForm'));
		return true;
	}
	
	Joomla.submitform(task, document.getElementById('adminForm'));
	return true;
}
//-->	
</script>
<form action="<?php echo JRoute::_('index.php?option=com_form2content&task=template.edit&layout=edit&id='.urlencode($this->id)); ?>" method="post" name="adminForm" id="adminForm">
<div class="row-fluid">
	<!-- Begin Content -->
	<div class="span12 form-horizontal">
		<div class="control-group">
			<div class="control-label"><label id="jform_title-lbl" for="jform_title"><?php echo JText::_('COM_FORM2CONTENT_TITLE'); ?></label></div>
			<div class="controls">			
				<input id="jform_title" class="readonly" type="text" readonly="readonly" style="width: 400px;" value="<?php echo HtmlHelper::stringHTMLSafe($this->id); ?>" name="jform[title]">
			</div>
		</div>
		<div class="control-group">
			<div class="control-label"><label id="jform_template-lbl" for="jform_template"><?php echo JText::_('COM_FORM2CONTENT_TEMPLATE'); ?></div>
			<div class="controls"><?php echo '<textarea class="text_area" name="template" rows="30" style="width:750px;">' . HtmlHelper::stringHTMLSafe($this->item) . '</textarea>'; ?></div>
		</div>
	</div>
	<!--  End Content -->
</div>
<input type="hidden" name="id" value="<?php echo HtmlHelper::stringHTMLSafe($this->id); ?>" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="return" value="<?php echo JFactory::getApplication()->input->getCmd('return');?>" />
<?php echo JHtml::_('form.token'); ?>
<?php echo DisplayCredits(); ?>
</form>
