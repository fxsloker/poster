<?php
defined('JPATH_PLATFORM') or die('Restricted acccess');

class F2cFieldAdminInfoText extends F2cFieldAdminBase
{
	function display($form, $item)
	{
		?>
		<div class="control-group">
			<div class="control-label"><?php echo $form->getLabel('inf_text', 'settings'); ?></div>
			<div class="controls"><?php echo $form->getInput('inf_text', 'settings'); ?></div>
		</div>
		<script type="text/javascript">
		jQuery(function($) {
			$('#rowFieldRequired').hide();
			$('#rowFieldRequiredErrorMessage').hide();
		});
		</script>			
		<?php
	}
	
	public function prepareSave(&$data, $useRequestData)
	{
		if($useRequestData)
		{
			$tmpData = JFactory::getApplication()->input->get('jform', array(), 'array');
			
			if(count($tmpData))
			{
				$data['settings']['inf_text'] = $tmpData['settings']['inf_text'];
			}
		}				
	}
}
?>