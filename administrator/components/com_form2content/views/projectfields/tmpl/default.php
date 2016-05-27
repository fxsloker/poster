<?php 
defined('JPATH_PLATFORM') or die('Restricted acccess');

require_once(JPATH_COMPONENT.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'viewhelper.form2content.php');
require_once(JPATH_COMPONENT_SITE.DIRECTORY_SEPARATOR.'shared.form2content.php');

JHtml::_('bootstrap.tooltip');
JHtml::_('behavior.multiselect');
JHtml::_('dropdown.init');

$listDirn	= 'asc';
$listOrder	= $this->escape($this->state->get('list.ordering'));
$listDirn	= $this->escape($this->state->get('list.direction'));
$saveOrder	= $listOrder == 'a.ordering';
$sortFields = $this->getSortFields();

if ($saveOrder)
{
	$saveOrderingUrl = 'index.php?option=com_form2content&task=projectfields.saveOrderAjax&tmpl=component';
	JHtml::_('sortablelist.sortable', 'projectfieldsList', 'adminForm', strtolower($listDirn), $saveOrderingUrl);
}
?>
<script type="text/javascript">
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
<form action="<?php echo JRoute::_('index.php?option=com_form2content&view=projectfields&projectid='.(int)$this->contentTypeId);?>" method="post" name="adminForm" id="adminForm">
<?php if (!empty( $this->sidebar)): ?>
	<div id="j-sidebar-container" class="span2">
		<?php echo $this->sidebar; ?>
	</div>
	<div id="j-main-container" class="span10">
<?php else : ?>
	<div id="j-main-container">
<?php endif;?>
	<div id="filter-bar" class="btn-toolbar">
		<div class="filter-search btn-group pull-left">
			<label for="projectfields_filter_search" class="element-invisible"><?php echo JText::_('COM_FORM2CONTENT_PROJECTFIELDS_FILTER_SEARCH_DESC');?></label>
			<input type="text" name="projectfields_filter_search" placeholder="<?php echo JText::_('COM_FORM2CONTENT_PROJECTFIELDS_FILTER_SEARCH_DESC'); ?>" id="projectfields_filter_search" value="<?php echo $this->escape($this->state->get('projectfields.filter.search')); ?>" title="<?php echo JText::_('COM_FORM2CONTENT_PROJECTFIELDS_FILTER_SEARCH_DESC'); ?>" />
		</div>
		<div class="btn-group pull-left hidden-phone">
			<button class="btn tip" type="submit" rel="tooltip" title="<?php echo JText::_('JSEARCH_FILTER_SUBMIT'); ?>"><i class="icon-search"></i></button>
			<button class="btn tip" type="button" onclick="document.id('projectfields_filter_search').value='';this.form.submit();" rel="tooltip" title="<?php echo JText::_('JSEARCH_FILTER_CLEAR'); ?>"><i class="icon-remove"></i></button>
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

	<table class="table table-striped" id="projectfieldsList">
		<thead>
			<tr>
				<th width="1%" class="nowrap center hidden-phone">
					<?php echo JHtml::_('grid.sort', '<i class="icon-menu-2"></i>', 'a.ordering', $listDirn, $listOrder, null, 'asc', 'JGRID_HEADING_ORDERING'); ?>
				</th>
				<th width="1%" class="nowrap center hidden-phone">
					<input type="checkbox" name="checkall-toggle" value="" title="<?php echo JText::_('JGLOBAL_CHECK_ALL'); ?>" onclick="Joomla.checkAll(this)" />
				</th>
				<th width="10%" class="nowrap hidden-phone">
					<?php echo JHtml::_('grid.sort', 'COM_FORM2CONTENT_FIELDNAME', 'a.fieldname', $listDirn, $listOrder); ?>
				</th>
				<th width="10%" class="nowrap hidden-phone">
					<?php echo JHtml::_('grid.sort', 'COM_FORM2CONTENT_FIELD_CAPTION', 'a.title', $listDirn, $listOrder); ?>
				</th>
				<th width="10%" class="nowrap hidden-phone">
					<?php echo JHtml::_('grid.sort', 'COM_FORM2CONTENT_DESCRIPTION', 'a.description', $listDirn, $listOrder); ?>
				</th>
				<th width="10%" class="nowrap hidden-phone">
					<?php echo JText::_('COM_FORM2CONTENT_FIELDTYPE'); ?>
				</th>
				<th width="1%" class="nowrap hidden-phone">
					<?php echo JText::_('COM_FORM2CONTENT_FRONT_END_VISIBLE'); ?>
				</th>
				<th width="1%" class="nowrap hidden-phone">
					<?php echo JHtml::_('grid.sort',  'JGRID_HEADING_ID', 'a.id', $listDirn, $listOrder); ?>
				</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($this->items as $i => $item) :
			$item->max_ordering = 0; //??
			$ordering   		= ($listOrder == 'a.ordering');
			$canChange	= true;		
			
			$frontendvisible = '<img src="'.JURI::root().'/media/com_form2content/images/' . (($item->frontvisible) ? 'tick.png' : 'publish_r.png') . '">';		
		
			if($item->settings)
			{
				$registry = new JRegistry;
				$registry->loadString($item->settings);
				$requiredField = '<img src="'.JURI::root().'/media/com_form2content/images/' . (($registry->get('requiredfield')) ? 'tick.png' : 'publish_r.png') . '">';	
			}
			else
			{
				$requiredField = '<img src="'.JURI::root().'/media/com_form2content/images/publish_r.png">';
			}
			?>
			<tr class="row<?php echo $i % 2; ?>" sortable-group-id="<?php echo $item->projectid?>">
				<td class="order nowrap center hidden-phone">
				<?php if ($canChange) :
					$disableClassName = '';
					$disabledLabel	  = '';

					if (!$saveOrder) :
						$disabledLabel    = JText::_('JORDERINGDISABLED');
						$disableClassName = 'inactive tip-top';
					endif; ?>
					<span class="sortable-handler <?php echo $disableClassName?>" title="<?php echo $disabledLabel?>" rel="tooltip">
						<i class="icon-menu"></i>
					</span>
					<input type="text" style="display:none"  name="order[]" size="5" value="<?php echo $item->ordering;?>" class="width-20 text-area-order " />
				<?php else : ?>
					<span class="sortable-handler inactive" >
						<i class="icon-menu"></i>
					</span>
				<?php endif; ?>
				</td>			
				<td class="center hidden-phone">
					<?php echo JHtml::_('grid.id', $i, $item->id); ?>
				</td>
				<td class="nowrap has-context">
					<a href="<?php echo JRoute::_('index.php?option=com_form2content&task=projectfield.edit&id=' . $item->id);?>" title="<?php echo JText::_('JACTION_EDIT');?>">
						<?php echo $this->escape($item->fieldname); ?>
					</a>
				</td>
				<td class="small hidden-phone">
					<?php echo $item->title; ?>
				</td>
				<td class="small hidden-phone">
					<?php echo $this->escape($item->description); ?>
				</td>
				<td class="small hidden-phone">
					<?php echo $this->escape($item->fieldtype); ?>
				</td>
				<td class="small hidden-phone">
					<?php echo $frontendvisible; ?>
				</td>
				<td class="center hidden-phone">
					<?php echo (int) $item->id; ?>
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
		<tfoot>
			<tr>
				<td colspan="8"><?php echo $this->pagination->getListFooter(); ?></td>
			</tr>
		</tfoot>				
	</table>
	<input type="hidden" name="task" value="" />
	<input type="hidden" name="boxchecked" value="0" />
	<input type="hidden" name="projectid" value="<?php echo $this->contentTypeId ?>" />
	<input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>" />
	<input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>" />	
	<?php echo JHtml::_('form.token'); ?>
	<?php echo DisplayCredits(); ?>
</div>
</form>