<?php
defined('JPATH_PLATFORM') or die('Restricted acccess');

class F2cFieldAdminMultiLineText extends F2cFieldAdminBase
{
	function display($form, $item)
	{
		?>
		<div class="control-group">
			<div class="control-label"><?php echo $form->getLabel('mlt_max_num_chars', 'settings'); ?></div>
			<div class="controls"><?php echo $form->getInput('mlt_max_num_chars', 'settings'); ?></div>
		</div>			
		<?php
	}
	
	public function prepareSave(&$data, $useRequestData)
	{
		if((int)$data['settings']['mlt_max_num_chars'] == 0)
		{
			$data['settings']['mlt_max_num_chars'] = '';
		}
	}
}
?>
