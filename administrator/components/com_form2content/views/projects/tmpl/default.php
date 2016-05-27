<?php 
defined('JPATH_PLATFORM') or die('Restricted acccess');

require_once(JPATH_COMPONENT.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'viewhelper.form2content.php');

JHtml::_('bootstrap.tooltip');
JHtml::_('behavior.multiselect');
JHtml::stylesheet('com_form2content/admin.css', array(), true);

$user		= JFactory::getUser();
$userId		= $user->get('id');
$listOrder	= $this->escape($this->state->get('list.ordering'));
$listDirn	= $this->escape($this->state->get('list.direction'));
$f2cConfig	= F2cFactory::getConfig();
$dateFormat = str_replace('%', '', $f2cConfig->get('date_format'));
$sortFields = $this->getSortFields();
$saveOrder	= false;
?>
<script type="text/javascript">
Joomla.submitbutton = function(task) 
{
	if (task == 'projects.syncorder') 
	{
		if(!confirm('<?php echo JText::_('COM_FORM2CONTENT_SYNC_ORDER_CONFIRMATION', true); ?>'))
		{
			return false;
		}
	}
	else if(task == 'project.upload')
	{
		var upload = document.getElementById('upload');
		
		if(!upload.value)
		{
			alert('<?php echo JText::_('COM_FORM2CONTENT_ERROR_CONTENTTYPE_FILE_UPLOAD_EMPTY'); ?>');
			return false;
		}				
	}
	
	Joomla.submitform(task);
	return true;	
}

Joomla.orderTable = function() {
	table = document.getElementById("sortTable");
	direction = document.getElementById("directionTable");
	order = table.options[table.selectedIndex].value;
	if (order != '<?php echo $listOrder; ?>') {
		dirn = 'asc';
	} else {
		dirn = direction.options[direction.selectedIndex].value;
	}
	Joomla.tableOrdering(order, dirn, '');
}
</script>
<form action="<?php echo JRoute::_('index.php?option=com_form2content&view=projects');?>" method="post" name="adminForm" id="adminForm" enctype="multipart/form-data">
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
				<label for="upload" class="control-label"><?php echo JText::_('COM_FORM2CONTENT_IMPORT_CONTENTTYPE'); ?></label>
				<input type="file" id="upload" name="upload" />
				<p class="help-block"><?php echo JText::_('COM_FORM2CONTENT_MAX_SIZE'); ?> =&nbsp;<?php echo ini_get('post_max_size'); ?></p>
			</fieldset>
		</div>	
		<div class="clearfix"> </div>	
		<div id="filter-bar" class="btn-toolbar">
			<div class="filter-search btn-group pull-left">
				<label for="contenttypes_filter_search" class="element-invisible"><?php echo JText::_('COM_FORM2CONTENT_PROJECTS_FILTER_SEARCH_DESC');?></label>
				<input type="text" name="contenttypes_filter_search" placeholder="<?php echo JText::_('COM_FORM2CONTENT_PROJECTS_FILTER_SEARCH_DESC'); ?>" id="contenttypes_filter_search" value="<?php echo $this->escape($this->state->get('contenttypes.filter.search')); ?>" title="<?php echo JText::_('COM_FORM2CONTENT_PROJECTS_FILTER_SEARCH_DESC'); ?>" />
			</div>
			<div class="btn-group pull-left hidden-phone">
				<button class="btn tip" type="submit" rel="tooltip" title="<?php echo JText::_('JSEARCH_FILTER_SUBMIT'); ?>"><i class="icon-search"></i></button>
				<button class="btn tip" type="button" onclick="document.id('contenttypes_filter_search').value='';this.form.submit();" rel="tooltip" title="<?php echo JText::_('JSEARCH_FILTER_CLEAR'); ?>"><i class="icon-remove"></i></button>
			</div>
			<div class="btn-group pull-right hidden-phone">
				<label for="limit" class="element-invisible"><?php echo JText::_('JFIELD_PLG_SEARCH_SEARCHLIMIT_DESC');?></label>
				<?php echo $this->pagination->getLimitBox(); ?>
			</div>
			<div class="btn-group pull-right hidden-phone">
				<label for="directionTable" class="element-invisible"><?php echo JText::_('JFIELD_ORDERING_DESC');?></label>
				<select name="directionTable" id="directionTable" class="input-medium" onchange="Joomla.orderTable()">
					<option value=""><?php echo JText::_('JFIELD_ORDERING_DESC');?></option>
					<option value="asc" <?php if ($listDirn == 'asc') echo 'selected="selected"'; ?>><?php echo JText::_('JGLOBAL_ORDER_ASCENDING');?></option>
					<option value="desc" <?php if ($listDirn == 'desc') echo 'selected="selected"'; ?>><?php echo JText::_('JGLOBAL_ORDER_DESCENDING');?></option>
				</select>
			</div>
			<div class="btn-group pull-right">
				<label for="sortTable" class="element-invisible"><?php echo JText::_('JGLOBAL_SORT_BY');?></label>
				<select name="sortTable" id="sortTable" class="input-medium" onchange="Joomla.orderTable()">
					<option value=""><?php echo JText::_('JGLOBAL_SORT_BY');?></option>
					<?php echo JHtml::_('select.options', $sortFields, 'value', 'text', $listOrder);?>
				</select>
			</div>
		</div>
		<div class="clearfix"> </div>
	
		<table class="table table-striped" id="articleList">
			<thead>
				<tr>
					<th width="1%" class="hidden-phone">
						<input type="checkbox" name="checkall-toggle" value="" title="<?php echo JText::_('JGLOBAL_CHECK_ALL'); ?>" onclick="Joomla.checkAll(this)" />
					</th>
					<th width="1%" style="min-width:55px" class="nowrap center">
						<?php echo JHtml::_('grid.sort', 'JSTATUS', 'a.published', $listDirn, $listOrder); ?>
					</th>
					<th>
						<?php echo JHtml::_('grid.sort', 'JGLOBAL_TITLE', 'a.title', $listDirn, $listOrder); ?>
					</th>
					<th width="10%" class="nowrap hidden-phone center">
						<?php echo JText::_('COM_FORM2CONTENT_FIELDS'); ?>
					</th>
					<th width="10%" class="nowrap hidden-phone">
						<?php echo JHtml::_('grid.sort',  'JAUTHOR', 'a.created_by', $listDirn, $listOrder); ?>
					</th>
					<th width="10%" class="nowrap hidden-phone">
						<?php echo JHtml::_('grid.sort',  'COM_FORM2CONTENT_CREATED', 'a.created', $listDirn, $listOrder); ?>
					</th>
					<th width="10%" class="nowrap hidden-phone">
						<?php echo JHtml::_('grid.sort',  'COM_FORM2CONTENT_MODIFIED', 'a.modified', $listDirn, $listOrder); ?>
					</th>
					<th width="10%" class="nowrap hidden-phone center">
						<?php echo JText::_('COM_FORM2CONTENT_EXPORT'); ?>
					</th>
					<th width="1%" class="nowrap hidden-phone">
						<?php echo JHtml::_('grid.sort',  'JGRID_HEADING_ID', 'a.id', $listDirn, $listOrder); ?>
					</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($this->items as $i => $item) :
				$item->max_ordering = 0; //??
				$canChange = true;
				$ordering   		= ($listOrder == 'a.ordering');
				?>
				<tr class="row<?php echo $i % 2; ?>">
					<td class="center hidden-phone">
						<?php echo JHtml::_('grid.id', $i, $item->id); ?>
					</td>
					<td class="center">
						<div class="btn-group">
							<?php echo JHtml::_('jgrid.published', $item->published, $i, 'projects.', $canChange, 'cb'); ?>
						</div>
					</td>
					<td class="nowrap has-context">
						<a href="<?php echo JRoute::_('index.php?option=com_form2content&task=project.edit&id=' . $item->id);?>" title="<?php echo JText::_('JACTION_EDIT');?>">
							<?php echo $this->escape($item->title); ?>
						</a>
					</td>
					<td class="small hidden-phone">
						<a href="<?php echo JRoute::_('index.php?option=com_form2content&view=projectfields&projectid='. $item->id); ?>" class="centerlink">
							<i class="icon-cog f2cicon-large" title="<?php echo JText::_('COM_FORM2CONTENT_PROJECTFIELDS', true); ?>"></i>
						</a>
					</td>
					<td class="small hidden-phone">
						<?php echo $this->escape($item->username); ?>
					</td>
					<td class="nowrap small hidden-phone">
						<?php echo JHtml::_('date', $item->created, $dateFormat); ?>
					</td>
					<td class="nowrap small hidden-phone">
						<?php
						if($item->modified && ($item->modified != $this->nullDate))
						{
							echo JHtml::_('date',$item->modified, $dateFormat);
						} 
						?>
					</td>
					<td class="nowrap small hidden-phone">
						<a href="<?php echo JRoute::_('index.php?option=com_form2content&task=project.export&view=project&format=raw&id='.$item->id);?>" target="_blank" title="<?php echo JText::_('COM_FORM2CONTENT_EXPORT'); ?>" class="centerlink">
							<i class="icon-download f2cicon-large" title="<?php echo JText::_('COM_FORM2CONTENT_EXPORT', true); ?>"></i>
						</a>
					</td>
					<td class="center hidden-phone">
						<?php echo (int) $item->id; ?>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>		
		</table>
		<?php echo $this->pagination->getListFooter(); ?>
		
		<input type="hidden" name="task" value="" />
		<input type="hidden" name="boxchecked" value="0" />
		<input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>" />
		<input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>" />
		<?php echo JHtml::_('form.token'); ?>
		<?php echo DisplayCredits(); ?>	
	</div>
</form>
