<?php 
defined('_JEXEC') or die( 'Restricted access' );

JHtml::_('behavior.mootools');
jimport('joomla.html.html');

require_once(JPATH_COMPONENT.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'viewhelper.form2content.php');

function _IconButton($link, $image, $text, $path='/administrator/images/' ) 
{
	?>
	<div style="float:left;">
		<div class="icon">
			<a href="<?php echo $link; ?>">
				<?php echo JHtml::_('image.administrator', $image, $path, NULL, NULL, $text ); ?>
				<span><?php echo $text; ?></span>
			</a>
		</div>
	</div>
	<?php
}
?>
<table width="90%" border="0" cellpadding="2" cellspacing="2" class="adminform">
<tr>
	<td width="55%" valign="top">
		<div id="cpanel">
		<?php
		$link = 'index.php?option=com_form2content&amp;task=viewprojectlist&amp;c=projects';
		_IconButton( $link, 'addedit.png', JText::_('PROJECT_MANAGER'));
	
		$link = 'index.php?option=com_form2content&amp;task=viewformlist&amp;c=forms';
		_IconButton( $link, 'addedit.png', JText::_('FORM_MANAGER'));
		
		$link = 'index.php?option=com_form2content&amp;task=translations&amp;c=translations';
		_IconButton( $link, 'browser.png', JText::_('TRANSLATIONS'));

		$link = 'index.php?option=com_form2content&amp;task=documentation';
		_IconButton( $link, 'help_header.png', JText::_('DOCUMENTATION'));

		echo '<div style="clear: both;" />';

		$link = 'index.php?option=com_form2content&amp;task=viewtemplatelist&amp;c=templates';
		_IconButton( $link, 'templatemanager.png', JText::_('TEMPLATE_MANAGER'));
	
		$link = 'index.php?option=com_form2content&amp;c=configuration';
		_IconButton( $link, 'config.png', JText::_('CONFIGURATION'));
	
		$link = 'index.php?option=com_form2content&amp;task=about';
		_IconButton( $link, 'langmanager.png', JText::_('ABOUT'));
		?>
	</div>
	</td>
</tr>
</table>

<?php echo DisplayCredits(); ?>
