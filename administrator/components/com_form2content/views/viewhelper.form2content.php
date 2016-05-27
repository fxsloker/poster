<?php
defined('_JEXEC') or die('Restricted acccess');

function DisplayCredits()
{
	if($data = JInstaller::parseXMLInstallFile(JPATH_COMPONENT.DIRECTORY_SEPARATOR.'manifest.xml')) 
	{
		$version = $data['version'];
	}
	else
	{
		$version = 'undefined';
	}
	?>
	<table width="100%" border="0">
	<tr>
	  <td width="99%" align="right" valign="top">
		<br/>
		<div align="center">
			<p>Form2Content LITE is our free GPL  version of <a href="http://www.form2content.com/joomla-extension/f2c-pro-joomla-cck" title="Form2Content PRO" target="_blank">Form2Content PRO</a> (<a href="http://www.form2content.com/faqs/f2c-pro-lite-comparison-chart" title="Compare F2C Lite &amp; Pro" target="_blank">comparison chart of functions</a>). Other F2C extensions include <a href="http://www.form2content.com/joomla-extension/f2c-search" title="Form2Content Search" target="_blank">F2C Search</a>, <a href="http://www.form2content.com/joomla-extension/f2c-kml-feeds-google-maps" title="F2C KML Feeds" target="_blank">F2C KML feeds</a> and several <a href="http://www.form2content.com/download/f2c-plugins" title="F2C Plugins" target="_blank">free plugins</a>.</p>
			<p>F2C Support: <a href="http://forum.form2content.com/" title="F2C Forum" target="_blank">F2C Forum</a> | <a href="http://documentation.form2content.com/" title="F2C Documentation" target="_blank">F2C Documentation</a> | <a href="http://documentation.form2content.com/support" title="Contact F2C Support" target="_blank">Contact support</a></p>
			<p>Form2Content Lite <?php echo JText::_('COM_FORM2CONTENT_VERSION'). ' ' . $version; ?> (<a href="http://www.form2content.com/changelog/lite-joomla3" target="_blank"><?php echo JText::_('COM_FORM2CONTENT_CHECK_VERSION'); ?></a>), Copyright © 2009 - 2015 by <a href="http://www.opensourcedesign.nl" target="_blank">Open Source Design</a></p>
		</div>
	  </td>
	  </tr>
	</table>
	<?php		
}

function displayArticleStats(&$row)
{
	$db = JFactory::getDBO();

	$create_date 	= null;
	$nullDate 		= $db->getNullDate();

	// used to hide "Reset Hits" when hits = 0
	if ( !$row->hits ) {
		$visibility = 'style="display: none; visibility: hidden;"';
	} else {
		$visibility = '';
	}

	?>
	<table width="100%" style="border: 1px dashed silver; padding: 5px; margin-bottom: 10px;">
	<?php
	if ( $row->id ) {
	?>
	<tr>
		<td>
			<strong><?php echo JText::_('JOOMLA_ARTICLE_ID'); ?>:</strong>
		</td>
		<td>
			<?php echo $row->id; ?>
		</td>
	</tr>
	<?php
	}
	?>
	<tr>
		<td>
			<strong><?php echo JText::_('STATE'); ?></strong>
		</td>
		<td>
			<?php
			if($row->id)
			{
				echo $row->state > 0 ? JText::_('PUBLISHED') : ($row->state < 0 ? JText::_('ARCHIVED') : JText::_('UNPUBLISHED') );
			}
			else
			{
				echo $row->state > 0 ? JText::_('DRAFT_TO_BE_PUBLISHED') : JText::_('DRAFT_UNPUBLISHED');
			}
			?>
		</td>
	</tr>
	<tr>
		<td>
			<strong><?php echo JText::_('HITS'); ?></strong>
		</td>
		<td>
			<?php echo $row->hits;?>
		</td>
	</tr>
	<tr>
		<td>
			<strong><?php echo JText::_('REVISED'); ?></strong>
		</td>
		<td>
			<?php echo $row->version;?> <?php echo JText::_('TIMES'); ?>
		</td>
	</tr>
	<tr>
		<td>
			<strong><?php echo JText::_('CREATED'); ?></strong>
		</td>
		<td>
			<?php
			if ( $row->created == $nullDate ) {
				echo JText::_('NEW_DOCUMENT');
			} else {
				echo JHTML::_('date',  $row->created,  JText::_('DATE_FORMAT_LC2') );
			}
			?>
		</td>
	</tr>
	<tr>
		<td>
			<strong><?php echo JText::_('MODIFIED'); ?></strong>
		</td>
		<td>
			<?php
				if ( $row->modified == $nullDate ) {
					echo JText::_('NOT_MODIFIED');
				} else {
					echo JHTML::_('date',  $row->modified, JText::_('DATE_FORMAT_LC2'));
				}
			?>
		</td>
	</tr>
	</table>
	<?php
}
?>