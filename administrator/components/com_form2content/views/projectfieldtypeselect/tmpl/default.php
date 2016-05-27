<?php defined('JPATH_PLATFORM') or die('Restricted access'); ?>
<?php
require_once(JPATH_COMPONENT.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'viewhelper.form2content.php');

JHtml::_('behavior.framework');
JHtml::_('behavior.keepalive');
JHtml::stylesheet('administrator/components/com_form2content/media/css/default.css');
?>
<script type="text/javascript">
// <!--
Joomla.submitbutton = function(task) 
{
	Joomla.submitform(task, document.getElementById('adminForm'));
}
// -->	
</script>
<form action="<?php echo JRoute::_('index.php?option=com_form2content'); ?>" method="post" name="adminForm" id="adminForm">
<div class="col100">
	<fieldset class="adminform">
		<legend><?php echo JText::_('COM_FORM2CONTENT_DETAILS'); ?></legend>
		<table class="admintable" cellspacing="0" cellpadding="0" border="0" width="80%">
		<tr>
			<td width="200" align="right" class="key">			
				<label for="title">
					<?php echo JText::_('COM_FORM2CONTENT_SELECT_PROJECTFIELD'); ?>:
				</label>
			</td>
			<td>
				<select name="fieldtypeid" id="fieldtypeid" class="inputbox">
					<?php echo JHtml::_('select.options', $this->fieldTypeList, 'id', 'description', -1);?>
				</select>
			</td>
		</tr>
	</table>
	</fieldset>
</div>
<div class="clr"></div>
<?php 
echo DisplayCredits(); 
?>
<input type="hidden" name="task" value="" />
<input type="hidden" name="projectid" value="<?php echo JFactory::getApplication()->input->get('projectid'); ?>" />
<?php echo JHtml::_('form.token'); ?>
</form>