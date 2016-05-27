<?php 
defined('JPATH_PLATFORM') or die('Restricted acccess');

JHtml::_('behavior.framework');

require_once(JPATH_COMPONENT_SITE.DIRECTORY_SEPARATOR.'shared.form2content.php');
require_once(JPATH_COMPONENT.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'viewhelper.form2content.php');

JHtml::stylesheet('com_form2content/admin.css', array(), true);
?>
<script type="text/javascript">
Joomla.submitbutton = function(task) 
{
	if (task == 'template.delete')
	{
		if(!confirm('<?php echo JText::_('COM_FORM2CONTENT_CONFIRM_ITEMS_DELETE', true); ?>'))
		{
			return false;
		}
	}
	else if (task == 'template.upload')
	{
		var upload = document.getElementById('upload');
	
		if(!upload.value)
		{
			alert('<?php echo JText::_('COM_FORM2CONTENT_ERROR_TEMPLATE_FILE_UPLOAD_EMPTY'); ?>');
			return false;
		}		
	}
	
	Joomla.submitform(task, document.getElementById('adminForm'));
}
</script>
<form action="<?php echo JRoute::_('index.php?option=com_form2content&view=templates');?>" method="post" name="adminForm" id="adminForm" enctype="multipart/form-data">
<?php if (!empty( $this->sidebar)): ?>
	<div id="j-sidebar-container" class="span2">
		<?php echo $this->sidebar; ?>
	</div>
	<div id="j-main-container" class="span10">
<?php else : ?>
	<div id="j-main-container">
<?php endif;?>
	<div id="uploadform">
		<fieldset id="upload-noflash" class="actions">
			<label for="upload" class="control-label"><?php echo JText::_('COM_FORM2CONTENT_UPLOAD_TEMPLATE'); ?></label>
			<input type="file" id="upload" name="upload" />
			<p class="help-block"><?php echo JText::_('COM_FORM2CONTENT_MAX_SIZE'); ?> =&nbsp;<?php echo ini_get('post_max_size'); ?></p>
		</fieldset>
	</div>
	<div class="clearfix"> </div>
	<table class="table table-striped" id="templateList">
		<thead>
			<tr>
				<th width="1%" class="hidden-phone">
					<input type="checkbox" name="checkall-toggle" value="" title="<?php echo JText::_('JGLOBAL_CHECK_ALL'); ?>" onclick="Joomla.checkAll(this)" />
				</th>
				<th align="left">
					<?php echo JText::_('COM_FORM2CONTENT_FILE_NAME'); ?>
				</th>
				<th align="center" width="1%" class="nowrap hidden-phone">
					<?php echo JText::_('COM_FORM2CONTENT_DOWNLOAD'); ?>
				</th>
				<th align="left" class="nowrap hidden-phone">
					<?php echo JText::_('COM_FORM2CONTENT_FILE_SIZE'); ?>
				</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($this->items as $i => $item) : ?>
			<tr class="row<?php echo $i % 2; ?>">
				<td class="center">
					<?php echo JHtml::_('grid.id', $i, HtmlHelper::stringHTMLSafe(basename($item->id))); ?>
				</td>
				<td>
					<a href="<?php echo JRoute::_('index.php?option=com_form2content&task=template.edit&id='.urlencode($item->fileName));?>">
						<?php echo $this->escape($item->fileName); ?>
					</a>
				</td>		
				<td align="center">
					<a href="<?php echo JURI::root() . 'media/com_form2content/templates/' . HtmlHelper::stringHTMLSafe($item->fileName); ?>" target="_blank" title="<?php echo JText::_('COM_FORM2CONTENT_DOWNLOAD'); ?>" class="centerlink">
						<i class="icon-download f2cicon-large" title="<?php echo JText::_('COM_FORM2CONTENT_DOWNLOAD', true); ?>"></i>
					</a>
				</td>
				<td>
					<?php echo $item->fileSize; ?>
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	<input type="hidden" name="task" value="" />
	<input type="hidden" name="boxchecked" value="0" />
	<?php echo JHtml::_('form.token'); ?>
	<?php echo DisplayCredits(); ?>
	</div>
</form>