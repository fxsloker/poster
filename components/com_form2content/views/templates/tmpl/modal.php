<?php
defined('JPATH_PLATFORM') or die;

JHtml::_('behavior.tooltip');
JHtml::stylesheet('com_form2content/modal.css', array(), true);

$field 		= JFactory::getApplication()->input->get('field');
$function 	= 'jSelectF2cTemplate_'.$field;
?>
<form action="<?php echo JRoute::_('index.php?option=com_form2content&task=templates.select&layout=modal&tmpl=component'); ?>" method="post" name="adminForm" id="adminForm">
	<table class="adminlist">
		<thead>
			<tr>
				<th><?php echo JText::_('COM_FORM2CONTENT_TEMPLATE'); ?></th>
			</tr>
		</thead>
		<tbody>
		<?php
		$i = 0;
		foreach ($this->items as $item)
		{
		?>
			<tr class="row<?php echo $i % 2; ?>">
				<td>
					<a class="pointer" onclick="if (window.parent) window.parent.<?php echo $function;?>('<?php echo $this->escape(addslashes($item->fileName)); ?>');">
						<?php echo $item->fileName; ?></a>
				</td>
			</tr>
		<?php
			$i++;
		}
		?>
		</tbody>
	</table>
	<div>
		<input type="hidden" name="task" value="" />
		<input type="hidden" name="field" value="<?php echo $field; ?>" />
		<?php echo JHtml::_('form.token'); ?>
	</div>
</form>
