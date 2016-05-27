<?php
// No direct access 
defined('_JEXEC') or die('Restricted access');

JHtml::_('bootstrap.tooltip');
JHtml::_('behavior.multiselect');
JHtml::_('formbehavior.chosen', 'select');

JHtml::addIncludePath(JPATH_COMPONENT.'/helpers/html');

$user		= JFactory::getUser();
$userId		= $user->get('id');
$listOrder	= $this->state->get('list.ordering');
$listDirn	= $this->state->get('list.direction');
$archived	= $this->state->get('filter.published') == 2 ? true : false;
$trashed	= $this->state->get('filter.published') == -2 ? true : false;
$saveOrder	= $listOrder == 'a.ordering';
$f2cConfig	= F2cFactory::getConfig();
$dateFormat = str_replace('%', '', $f2cConfig->get('date_format'));
$sortFields = $this->getSortFields();

if ($saveOrder)
{
	$saveOrderingUrl = 'index.php?option=com_form2content&task=forms.saveOrderAjax&tmpl=component';
	JHtml::_('sortablelist.sortable', 'articleList', 'adminForm', strtolower($listDirn), $saveOrderingUrl);
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
<div class="f2c-articlemanager<?php echo htmlspecialchars($this->params->get('pageclass_sfx')); ?>">
	<?php if ($this->params->get('show_page_heading', 1)) : ?>
		<h1><?php echo $this->escape($this->params->get('page_heading')); ?></h1>
	<?php endif; ?>
	<form action="<?php echo JRoute::_('index.php?option=com_form2content&task=forms.display&view=forms');?>" method="post" name="adminForm" id="adminForm">
	
	<div id="filter-bar" class="btn-toolbar">
		<div class="pull-left hidden-phone">
			<?php if($this->menuParms->get('show_new_button', 0)) : ?>
			<button class="btn" type="button" onclick="javascript:Joomla.submitbutton('form.add')"><?php echo JText::_('COM_FORM2CONTENT_NEW'); ?></button>
			<?php endif; ?>
			<?php if($this->menuParms->get('show_copy_button', 1)) : ?>
			<button class="btn" type="button" onclick="javascript:if(document.adminForm.boxchecked.value==0){alert('<?php echo JText::sprintf(JText::_('COM_FORM2CONTENT_PLEASE_MAKE_A_SELECTION_FROM_THE_LIST_TO'), JText::_('COM_FORM2CONTENT_COPY')); ?>');}else{  Joomla.submitbutton('forms.copy')}"><?php echo JText::_('COM_FORM2CONTENT_COPY'); ?></button>
			<?php endif; ?>
			<?php if($this->menuParms->get('show_edit_button', 1)) : ?>
			<button class="btn" type="button" onclick="javascript:if(document.adminForm.boxchecked.value==0){alert('<?php echo JText::sprintf(JText::_('COM_FORM2CONTENT_PLEASE_MAKE_A_SELECTION_FROM_THE_LIST_TO'), JText::_('COM_FORM2CONTENT_EDIT')); ?>');}else{  Joomla.submitbutton('form.edit')}"><?php echo JText::_('COM_FORM2CONTENT_EDIT'); ?></button>
			<?php endif; ?>
			<?php if($this->menuParms->get('show_publish_button', 1)) : ?>
			<button class="btn" type="button" onclick="javascript:if(document.adminForm.boxchecked.value==0){alert('<?php echo JText::sprintf(JText::_('COM_FORM2CONTENT_PLEASE_MAKE_A_SELECTION_FROM_THE_LIST_TO'), JText::_('COM_FORM2CONTENT_PUBLISH')); ?>');}else{  Joomla.submitbutton('forms.publish')}"><?php echo JText::_('COM_FORM2CONTENT_PUBLISH'); ?></button>
			<button class="btn" type="button" onclick="javascript:if(document.adminForm.boxchecked.value==0){alert('<?php echo JText::sprintf(JText::_('COM_FORM2CONTENT_PLEASE_MAKE_A_SELECTION_FROM_THE_LIST_TO'), JText::_('COM_FORM2CONTENT_UNPUBLISH')); ?>');}else{  Joomla.submitbutton('forms.unpublish')}"><?php echo JText::_('COM_FORM2CONTENT_UNPUBLISH'); ?></button>
			<?php endif; ?>
			<?php if($this->menuParms->get('show_delete_button', 1)) : ?>
			<button class="btn" type="button" onclick="javascript:if(document.adminForm.boxchecked.value==0){alert('<?php echo JText::sprintf(JText::_('COM_FORM2CONTENT_PLEASE_MAKE_A_SELECTION_FROM_THE_LIST_TO'), JText::_('COM_FORM2CONTENT_DELETE')); ?>');}else{  Joomla.submitbutton('forms.delete')}"><?php echo JText::_('COM_FORM2CONTENT_DELETE'); ?></button>
			<?php endif; ?>			
			<?php if($this->menuParms->get('show_trash_button', 1)) : ?>
			<button class="btn" type="button" onclick="javascript:if(document.adminForm.boxchecked.value==0){alert('<?php echo JText::sprintf(JText::_('COM_FORM2CONTENT_PLEASE_MAKE_A_SELECTION_FROM_THE_LIST_TO'), JText::_('COM_FORM2CONTENT_TRASH')); ?>');}else{  Joomla.submitbutton('forms.trash')}"><?php echo JText::_('COM_FORM2CONTENT_TRASH'); ?></button>
			<?php endif; ?>			
		</div>
	</div>
	
	<div class="clearfix"></div>
	
	<div id="filter-bar2" class="btn-toolbar">	
		<?php if($this->menuParms->get('show_search_filter')) : ?>
		<div class="filter-search btn-group pull-left">		
			<label class="element-invisible" for="filter_search"><?php echo JText::_('JSEARCH_FILTER_LABEL'); ?></label>
			<input type="text" name="filter_search" id="filter_search" value="<?php echo $this->escape($this->state->get('filter.search')); ?>" title="<?php echo JText::_('COM_FORM2CONTENT_FILTER_SEARCH_DESC'); ?>" />
			<button type="submit" class="btn tip" style="margin-top: -10px;"><?php echo JText::_('JSEARCH_FILTER_SUBMIT'); ?></button>
			<button type="button" class="btn tip" style="margin-top: -10px;" onclick="document.getElementById('filter_search').value='';this.form.submit();"><?php echo JText::_('JSEARCH_FILTER_CLEAR'); ?></button>
		</div>
		<?php endif; ?>
	
		<div class="clearfix"></div>
		
		<div class="filter-search pull-right">
			<?php if($this->menuParms->get('show_category_filter')) : ?>
			<select name="filter_category_id" id="filter_category_id" class="inputbox" onchange="this.form.submit()">
				<option value=""><?php echo JText::_('JOPTION_SELECT_CATEGORY');?></option>
				<?php echo JHtml::_('select.options', JHtml::_('category.options', 'com_content'), 'value', 'text', $this->state->get('filter.category_id'));?>
			</select>
			<?php endif; ?>
		</div>
		<div class="filter-search pull-right">
			<select name="filter_published" id="filter_published" class="inputbox" onchange="this.form.submit()">
				<option value=""><?php echo JText::_('JOPTION_SELECT_PUBLISHED'); ?></option>
				<?php echo JHtml::_('select.options', JHtml::_('jgrid.publishedOptions', array('archived' => 0)), 'value', 'text', $this->state->get('filter.published'), true); ?>
			</select>
		</div>
	
		<div class="clearfix"></div>
	</div>
	
	<table class="table table-striped" id="articleList">
		<thead>
			<tr>
				<th width="1%" class="nowrap center hidden-phone">
					<?php echo JHtml::_('grid.sort', '<i class="icon-menu-2"></i>', 'a.ordering', $listDirn, $listOrder, null, 'asc', 'JGRID_HEADING_ORDERING'); ?>
				</th>
				<th width="1%" class="hidden-phone">
					<input type="checkbox" name="checkall-toggle" value="" title="<?php echo JText::_('JGLOBAL_CHECK_ALL'); ?>" onclick="Joomla.checkAll(this)" />
				</th>
				<th width="1%" style="min-width:55px" class="nowrap center">
					<?php echo JHtml::_('grid.sort', 'JSTATUS', 'a.state', $listDirn, $listOrder); ?>
				</th>
				<th>
					<?php echo JHtml::_('grid.sort', 'JGLOBAL_TITLE', 'a.title', $listDirn, $listOrder); ?>
				</th>
				<th width="10%" class="nowrap hidden-phone">
					<?php echo JHtml::_('grid.sort', 'COM_FORM2CONTENT_CATEGORY', 'category_title', $listDirn, $listOrder); ?>
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
				<th width="1%" class="nowrap hidden-phone">
					<?php echo JHtml::_('grid.sort',  'JGRID_HEADING_ID', 'a.id', $listDirn, $listOrder); ?>
				</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($this->items as $i => $item) :
				$item->max_ordering = 0; //??
				$ordering   		= ($listOrder == 'a.ordering');
				$canEdit			= $user->authorise('core.edit', 'com_form2content.form.'.$item->id);
				$canCheckin = true;
				$canEditOwn	= $user->authorise('core.edit.own', 'com_form2content.form.'.$item->id) && $item->created_by == $userId;
				$canChange	= ($user->authorise('core.edit.state', 'com_form2content.form.'.$item->id) ||
							  ($user->authorise('form2content.edit.state.own', 'com_form2content.form.'.$item->id) && $item->created_by == $userId)) && $canCheckin;
				$canTrash	= ($user->authorise('form2content.trash', 'com_form2content.form.'.$item->id) ||
							  ($user->authorise('form2content.trash.own', 'com_form2content.form.'.$item->id) && $item->created_by == $userId));
			?>
				<tr class="row<?php echo $i % 2; ?>" sortable-group-id="<?php echo $item->catid?>">
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
					<td class="center">
						<div class="btn-group">
							<?php echo JHtml::_('jgrid.published', $item->state, $i, 'forms.', $canChange, 'cb', $item->publish_up, $item->publish_down); ?>
							<?php echo Form2ContentHelper::CreateFeaturedButton($item->featured, $i, $canChange); ?>
						</div>
					</td>
					<td class="nowrap has-context">
						<?php if ($item->language == '*'):?>
							<?php $language = JText::alt('JALL', 'language'); ?>
						<?php else:?>
							<?php $language = $item->language_title ? $this->escape($item->language_title) : JText::_('JUNDEFINED'); ?>
						<?php endif;?>
						<?php if ($canEdit || $canEditOwn) : ?>
							<a href="<?php echo JRoute::_('index.php?option=com_form2content&task=form.edit&id=' . $item->id);?>" title="<?php echo JText::_('JACTION_EDIT') . ' (' . JText::_('JFIELD_ALIAS_LABEL'). ': '. $this->escape($item->alias) . ')';?>">
								<?php echo $this->escape($item->title); ?></a>
						<?php else : ?>
							<span title="<?php echo JText::sprintf('JFIELD_ALIAS_LABEL', $this->escape($item->alias));?>"><?php echo $this->escape($item->title); ?></span>
						<?php endif; ?>
					</td>
					<td class="center hidden-phone">
						<?php echo $this->escape($item->category_title); ?>
					</td>
					<td class="hidden-phone">
						<?php echo $this->escape($item->author_name); ?>
						<?php if ($item->created_by_alias) : ?>
							<div class="small">
								<?php echo JText::sprintf('JGLOBAL_LIST_ALIAS', $this->escape($item->created_by_alias));?>
							</div>
						<?php endif; ?>		
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
					<td class="center hidden-phone">
						<?php echo (int) $item->id; ?>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
		<tfoot>
		<tr>
			<td class="f2c_pagination" colspan="9">
				<?php echo $this->pagination->getListFooter(); ?>
				<label for="limit" class="element-invisible"><?php echo JText::_('JFIELD_PLG_SEARCH_SEARCHLIMIT_DESC');?></label>
				<?php echo $this->pagination->getLimitBox(); ?>
			</td>
		</tr>
		</tfoot>
	</table>
	<input type="hidden" name="task" value="" />
	<input type="hidden" name="boxchecked" value="0" />
	<input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>" />
	<input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>" />
	<?php echo JHtml::_('form.token'); ?>
	</form>
</div>