<?php
defined('_JEXEC') or die('Restricted access');

require_once(JPATH_COMPONENT.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'viewhelper.form2content.php');
?>
<?php if (!empty( $this->sidebar)): ?>
	<div id="j-sidebar-container" class="span2">
		<?php echo $this->sidebar; ?>
	</div>
	<div id="j-main-container" class="span10">
<?php else : ?>
	<div id="j-main-container">
<?php endif;?>
		<div align="center">
			<a href="http://www.opensourcedesign.nl" target="_blank">
			<img src="../media/com_form2content/images/OSD_logo.png" alt="Logo OpenSource Design" width="350" height="180" border="0" />
			</a>
			<p style="text-align:justify; width: 600px;"><?php echo JText::_('COM_FORM2CONTENT_ABOUT_LINE1'); ?></p>
			<p style="text-align:justify; width: 600px;"><?php echo JText::_('COM_FORM2CONTENT_ABOUT_LINE2'); ?></p>
			<p style="text-align:justify; width: 600px;"><?php echo JText::_('COM_FORM2CONTENT_ABOUT_LINE3'); ?> <a href="http://www.opensourcedesign.nl" target="_blank">www.opensourcedesign.nl</a></p>
		</div>
		<?php echo DisplayCredits(); ?>
	</div>
