<?php defined('_JEXEC') or die('Restricted access'); ?>
<?php
JHtml::_('behavior.mootools');
JHTML::stylesheet( 'default.css', 'administrator/components/com_form2content/media/css/' );
?>
<script type="text/javascript">
<!--
function submitbutton(pressbutton)
{
	var form = document.adminForm;

	if (pressbutton == 'cancel') 
	{
		submitform( pressbutton );
		return;
	}
	
	// field validation
	if (form.projectid.value == -1)
	{
		alert("<?php echo JText::_('SELECT_A_PROJECT'); ?>");
	} 
	else 
	{
		submitform(pressbutton);
	}
}
-->	
</script>
<form action="<?php echo JFilterOutput::ampReplace($this->action); ?>" method="post" name="adminForm" id="adminForm">
<div class="componentheading"><?php echo $this->pagetitle; ?></div>
<fieldset>
	<table class="adminform" width="100%">
	<tr>
		<td class="key">			
			<label for="title">
				<?php echo JText::_('PROJECT'); ?>:
			</label>
		</td>
		<td>
			<div style="float: left;">
				<?php echo $this->lists['projects']; ?>
			</div>
			<div style="float: right;">
				<button type="button" onclick="submitbutton('newform')">
					<?php echo JText::_('Next') ?>
				</button>
				<button type="button" onclick="submitbutton('cancel')">
					<?php echo JText::_('Cancel') ?>
				</button>
			</div>
		</td>
	</tr>
</table>
</fieldset>
<br/>

<input type="hidden" name="option" value="com_form2content" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="c" value="form" />
<input type="hidden" name="Itemid" value="<?php echo JFactory::getApplication()->input->getInt('Itemid'); ?>" />

</form>