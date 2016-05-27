<?php
defined('JPATH_PLATFORM') or die('Restricted acccess');

class F2cFieldAdminHyperlink extends F2cFieldAdminBase
{
	function display($form, $item)
	{
		?>
		<div class="control-group">
			<div class="control-label"><?php echo $form->getLabel('lnk_output_mode', 'settings'); ?></div>
			<div class="controls"><?php echo $form->getInput('lnk_output_mode', 'settings'); ?></div>
		</div>			
		<div class="control-group">
			<div class="control-label"><?php echo $form->getLabel('lnk_attributes_url', 'settings'); ?></div>
			<div class="controls"><?php echo $form->getInput('lnk_attributes_url', 'settings'); ?></div>
		</div>			
		<div class="control-group">
			<div class="control-label"><?php echo $form->getLabel('lnk_attributes_display_as', 'settings'); ?></div>
			<div class="controls"><?php echo $form->getInput('lnk_attributes_display_as', 'settings'); ?></div>
		</div>			
		<div class="control-group">
			<div class="control-label"><?php echo $form->getLabel('lnk_attributes_title', 'settings'); ?></div>
			<div class="controls"><?php echo $form->getInput('lnk_attributes_title', 'settings'); ?></div>
		</div>			
		<div class="control-group">
			<div class="control-label"><?php echo $form->getLabel('lnk_attributes_target', 'settings'); ?></div>
			<div class="controls"><?php echo $form->getInput('lnk_attributes_target', 'settings'); ?></div>
		</div>			
		<div class="control-group">
			<div class="control-label"><?php echo $form->getLabel('lnk_show_display_as', 'settings'); ?></div>
			<div class="controls"><?php echo $form->getInput('lnk_show_display_as', 'settings'); ?></div>
		</div>			
		<div class="control-group">
			<div class="control-label"><?php echo $form->getLabel('lnk_show_title', 'settings'); ?></div>
			<div class="controls"><?php echo $form->getInput('lnk_show_title', 'settings'); ?></div>
		</div>			
		<div class="control-group">
			<div class="control-label"><?php echo $form->getLabel('lnk_show_target', 'settings'); ?></div>
			<div class="controls"><?php echo $form->getInput('lnk_show_target', 'settings'); ?></div>
		</div>			
		<div class="control-group">
			<div class="control-label"><?php echo $form->getLabel('lnk_add_http_prefix', 'settings'); ?></div>
			<div class="controls"><?php echo $form->getInput('lnk_add_http_prefix', 'settings'); ?></div>
		</div>			
		<?php
	}
}
?>
