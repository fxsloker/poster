<?php defined('_JEXEC') or die('Restricted access'); ?>
<?php
require_once(JPATH_COMPONENT.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'viewhelper.form2content.php');

JHTML::stylesheet( 'default.css', 'administrator/components/com_form2content/media/css/' );

JHtml::_('behavior.keepalive');

?>
<script type="text/javascript">
<!--
Joomla.submitbutton = function(task) 
{
	if (task == 'form.cancel' || document.adminForm.projectid.value != -1) 
	{
		Joomla.submitform(task, document.getElementById('adminForm'));
	}
	else 
	{
		alert('<?php echo $this->escape(JText::_('COM_FORM2CONTENT_SELECT_CONTENTTYPE', true));?>');
	}
}
-->	
</script>
<form action="<?php echo JRoute::_('index.php?option=com_form2content'); ?>" method="post" name="adminForm" id="adminForm">
	<div class="row-fluid">
		<!-- Begin Content -->
		<div class="span12 form-horizontal">
			<div class="control-group">
				<div class="control-label"><?php echo JText::_('COM_FORM2CONTENT_PROJECT'); ?></div>
				<div class="controls">
					<select name="projectid" id="projectid" class="inputbox">
						<option value="-1">- <?php echo JText::_('COM_FORM2CONTENT_SELECT_CONTENTTYPE');?> -</option>
						<?php echo JHtml::_('select.options', $this->contentTypeList, 'value', 'text', -1);?>
					</select>
				</div>
			</div>
		</div>
		<!-- End Content -->
		<?php echo DisplayCredits(); ?>
		<input type="hidden" name="task" value="" />
		<?php echo JHtml::_('form.token'); ?>
	</div>
</form>