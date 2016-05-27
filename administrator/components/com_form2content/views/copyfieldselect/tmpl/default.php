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
	if (task == 'form.cancel' || document.adminForm.projectid.value != -1) 
	{
		Joomla.submitform(task, document.getElementById('adminForm'));
	}
	else 
	{
		alert('<?php echo $this->escape(JText::_('COM_FORM2CONTENT_SELECT_CONTENTTYPE', true));?>');
	}
}
// -->	
</script>
<form action="<?php echo JRoute::_('index.php?option=com_form2content'); ?>" method="post" name="adminForm" id="adminForm">
<div class="col100">
	<fieldset class="adminform">
		<legend><?php echo JText::_('COM_FORM2CONTENT_DETAILS'); ?></legend>
		<table class="admintable" cellspacing="0" cellpadding="0" border="0" width="80%">
		<tr>
			<td width="100" align="right" class="key">			
				<label for="title">
					<?php echo JText::_('COM_FORM2CONTENT_SELECT_CONTENT_TYPE_COPY_FIELDS'); ?>:
				</label>
			</td>
			<td>
				<select name="projectid" id="projectid" class="inputbox">
					<option value="-1">- <?php echo JText::_('COM_FORM2CONTENT_CONTENTTYPEFIELD_COPY_DESC');?> -</option>
					<?php echo JHtml::_('select.options', $this->contentTypeList, 'value', 'text', -1);?>
				</select>
			</td>
		</tr>
	</table>
	</fieldset>
</div>
<div class="clr"></div>
<?php 
echo DisplayCredits();
 
$cids = JFactory::getApplication()->input->get('cid', array(0), 'array');

if(count($cids))
{
	foreach($cids as $cid)
	{
		echo '<input type="hidden" name="cid[]" id="cid[]" value="'.htmlspecialchars($cid).'">';
	}
}
?>

<input type="hidden" name="task" value="" />
<?php echo JHtml::_('form.token'); ?>
</form>