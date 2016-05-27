<?php
defined('_JEXEC') or die;
?>
<div class="control-group">
	<div class="control-label">
		<?php echo $this->form->getLabel('metadesc'); ?>
	</div>
	<div class="controls">
		<?php echo $this->form->getInput('metadesc'); ?>
	</div>
</div>
<div class="control-group">
	<div class="control-label">
		<?php echo $this->form->getLabel('metakey'); ?>
	</div>
	<div class="controls">
		<?php echo $this->form->getInput('metakey'); ?>
	</div>
</div>
<?php foreach($this->form->getGroup('metadata') as $field): ?>
<div class="control-group">
	<?php if (!$field->hidden): ?>
		<div class="control-label">
			<?php echo $field->label; ?>
		</div>
	<?php endif; ?>
	<div class="controls">
		<?php echo $field->input; ?>
	</div>
</div>
<?php endforeach; ?>