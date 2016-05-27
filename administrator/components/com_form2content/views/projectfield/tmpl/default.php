<?php 
defined('JPATH_PLATFORM') or die;

require_once(JPATH_COMPONENT.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'viewhelper.form2content.php');

JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
JHtml::_('behavior.keepalive');
JHtml::script('com_form2content/f2c_lists.js', false, true);
JHtml::stylesheet('com_form2content/f2cfields.css', array(), true);
JHtml::stylesheet('com_form2content/admin.css', array(), true);

JForm::addFieldPath(JPATH_COMPONENT.DIRECTORY_SEPARATOR.'models'.DIRECTORY_SEPARATOR.'fields');

$fieldClassName = 'F2cFieldAdmin'.$this->fieldTypeName;
$field 			= new $fieldClassName();
?>
<script type="text/javascript">
//<!--
function prepareRowSelectList(tableId, row)
{
	var cellLeft = row.insertCell(0);
	var el1 = document.createElement('input');
	el1.type = 'text';
	el1.name = row.id + 'key';
	el1.id = row.id + 'key';
	el1.size = 20;	
	el1.maxLength = 20;	  
	cellLeft.appendChild(el1);
	  
	var elHidden = document.createElement('input');
	elHidden.type = 'hidden';
	elHidden.name = tableId + 'RowKey[]';
	elHidden.value = row.id;
	cellLeft.appendChild(elHidden);
	  
	var cellRight = row.insertCell(1);
	var el2 = document.createElement('input');
	el2.type = 'text';
	el2.name = row.id + 'val';
	el2.id = row.id + 'val';
	el2.size = 40;	
	el2.maxLength = 50;	  
	cellRight.appendChild(el2);	
	  
	var cellButtons = row.insertCell(2);
	
	var lnkUp = document.createElement('a');
	lnkUp.href = 'javascript:moveUp(\''+tableId+'\',\'' + row.id + '\');';
	lnkUp.innerHTML = '<i class="icon-arrow-up-3 f2c_row_button" title="<?php echo JText::_('COM_FORM2CONTENT_UP'); ?>"></i>';
	cellButtons.appendChild(lnkUp);	
	var lnkDwn = document.createElement('a');
	lnkDwn.href = 'javascript:moveDown(\''+tableId+'\',\'' + row.id + '\');';
	lnkDwn.innerHTML = '<i class="icon-arrow-down-3 f2c_row_button" title="<?php echo JText::_('COM_FORM2CONTENT_DOWN'); ?>"></i></a>';
	cellButtons.appendChild(lnkDwn);	
	  
	var lnkDel = document.createElement('a');
	lnkDel.href = 'javascript:removeRow(\'' + row.id + '\');';
	lnkDel.innerHTML = '<i class="icon-minus f2c_row_button" title="<?php echo JText::_('COM_FORM2CONTENT_DELETE'); ?>"></i></a>';
	cellButtons.appendChild(lnkDel);	
	
	var lnkAdd = document.createElement('a');
	lnkAdd.href = 'javascript:addRow(\''+tableId+'\',\'' + row.id + '\',\'prepareRowSelectList\');';
	lnkAdd.innerHTML = '<i class="icon-plus f2c_row_button" title="<?php echo JText::_('COM_FORM2CONTENT_ADD'); ?>"></i></a>';
	cellButtons.appendChild(lnkAdd);		
}

function prepareRowExtensionList(tableId, row)
{
	var cellLeft = row.insertCell(0);
	var el1 = document.createElement('input');
	el1.type = 'text';
	el1.name = row.id + 'key';
	el1.id = row.id + 'key';
	el1.size = 20;	
	el1.maxLength = 5;	  
	cellLeft.appendChild(el1);
	  
	var elHidden = document.createElement('input');
	elHidden.type = 'hidden';
	elHidden.name = tableId + 'RowKey[]';
	elHidden.value = row.id;
	cellLeft.appendChild(elHidden);
	
	var cellButtons = row.insertCell(1);
	var lnkDel = document.createElement('a');
	lnkDel.href = 'javascript:removeRow(\'' + row.id + '\');';
	lnkDel.innerHTML = '<i class="icon-minus f2c_row_button" title="<?php echo JText::_('COM_FORM2CONTENT_DELETE'); ?>"></i>';
	cellButtons.appendChild(lnkDel);	
	
	var lnkAdd = document.createElement('a');
	lnkAdd.href = 'javascript:addRow(\''+tableId+'\',\'' + row.id + '\',\'prepareRowExtensionList\');';
	lnkAdd.innerHTML = '<i class="icon-plus f2c_row_button" title="<?php echo JText::_('COM_FORM2CONTENT_ADD'); ?>"></i>';
	cellButtons.appendChild(lnkAdd);		
}

Joomla.submitbutton = function(task) 
{
	if (task == 'projectfield.cancel')
	{
		Joomla.submitform(task, document.getElementById('adminForm'));
		return true;
	}
	
	if(!document.formvalidator.isValid(document.id('adminForm')))
	{
		alert('<?php echo $this->escape(JText::_('JGLOBAL_VALIDATION_FORM_FAILED', true));?>');
		return false;
	}

	var fldFieldname = document.getElementById('jform_fieldname');
	var fldTitle = document.getElementById('jform_title');
	var fldFieldTypeId = document.getElementById('jform_fieldtypeid');

	if(fldFieldname.value == '')
	{
		alert('<?php echo $this->escape(JText::_('COM_FORM2CONTENT_ERROR_PROJECTFIELD_FIELDNAME_EMPTY', true)); ?>');
		return false;
	}

	var re = new RegExp('^[A-Za-z0-9_]+$');
	var result = fldFieldname.value.match(re);

	if (result == null)
	{
		alert('<?php echo $this->escape(JText::_('COM_FORM2CONTENT_ERROR_PROJECTFIELD_FIELDNAME_INVALID_CHARS', true)); ?>');
		return false;
	}

	if(fldFieldname.value.toLowerCase() == 'joomla' || fldFieldname.value.toLowerCase() == 'f2c')
	{
		alert('<?php echo $this->escape(JText::_('COM_FORM2CONTENT_ERROR_PROJECTFIELD_FIELDNAME_JOOMLA_OR_F2C', true)); ?>');
		return false;		
	}
	
	if(fldTitle.value == '' && (parseInt(fldFieldTypeId.value) != 11))
	{
		alert('<?php echo $this->escape(JText::_('COM_FORM2CONTENT_ERROR_FIELD_CAPTION_EMPTY', true)); ?>');
		return false;
	}

	<?php $field->clientSideValidation($this); ?>
	
	Joomla.submitform(task, document.getElementById('adminForm'));
	return true;		
}
//-->	
</script>
<form action="<?php echo JRoute::_('index.php?option=com_form2content&view=projectfields&layout=edit&id='.(int) $this->item->id); ?>" method="post" name="adminForm" id="adminForm" class="form-validate">
<div class="row-fluid">
	<!-- Begin Content -->
	<div class="span12 form-horizontal">
		<h4><?php echo empty($this->item->id) ? JText::_('COM_FORM2CONTENT_NEW_CONTENTTYPEFIELD') : JText::sprintf('COM_FORM2CONTENT_EDIT_CONTENTTYPEFIELD', $this->item->id); ?></h4>
		<div class="control-group">
			<div class="control-label"><?php echo $this->form->getLabel('id'); ?></div>
			<div class="controls"><?php echo $this->form->getInput('id'); ?></div>
		</div>
		<div class="control-group" id="rowFieldName">
			<div class="control-label"><?php echo $this->form->getLabel('fieldname'); ?></div>
			<div class="controls"><?php echo $this->form->getInput('fieldname'); ?></div>			
		</div>
		<div class="control-group" id="rowFieldCaption">
			<div class="control-label"><?php echo $this->form->getLabel('title'); ?></div>
			<div class="controls"><?php echo $this->form->getInput('title'); ?></div>			
		</div>
		<div class="control-group">
			<div class="control-label"><?php echo $this->form->getLabel('description'); ?></div>
			<div class="controls"><?php echo $this->form->getInput('description'); ?></div>
		</div>
		<div class="control-group">
			<div class="control-label"><?php echo $this->form->getLabel('frontvisible'); ?></div>
			<div class="controls"><?php echo $this->form->getInput('frontvisible'); ?></div>
		</div>	
		<div class="control-group">
			<div class="control-label"><?php echo $this->form->getLabel('fieldtypeid'); ?></div>
			<div class="controls"><?php echo $this->form->getInput('fieldtypeid'); ?></div>
		</div>	
		<h4><?php echo JText::_('COM_FORM2CONTENT_ADDITIONAL_FIELD_SETTINGS'); ?></h4>
		<?php $field->display($this->form, $this->item);?>
	</div>
	<!-- End Content -->
</div>
<?php echo DisplayCredits(); ?>
<input type="hidden" name="task" value="" />
<?php echo $this->form->getInput('projectid'); ?>
<input type="hidden" name="return" value="<?php echo JFactory::getApplication()->input->getCmd('return');?>" />
<?php echo JHtml::_('form.token'); ?>
</form>