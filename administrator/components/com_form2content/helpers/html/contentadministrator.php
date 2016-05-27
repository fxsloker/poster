<?php
// no direct access
defined('_JEXEC') or die;

abstract class JHtmlContentAdministrator
{
	/**
	 * @param	int $value	The state value
	 * @param	int $i
	 */
	function featured($value = 0, $i, $canChange = true)
	{
		// Array of image, task, title, action
		$states	= array(
			0	=> array('disabled.png', 'forms.featured', 'COM_FORM2CONTENT_UNFEATURED',	'COM_FORM2CONTENT_TOGGLE_TO_FEATURE'),
			1	=> array('featured.png', 'forms.unfeatured',	'COM_FORM2CONTENT_FEATURED', 'COM_FORM2CONTENT_TOGGLE_TO_UNFEATURE'),
		);
		$state	= JArrayHelper::getValue($states, (int) $value, $states[1]);
		$html	= JHtml::_('image','admin/'.$state[0], JText::_($state[2]), NULL, true);
		if ($canChange) {
			$html	= '<a href="javascript:void(0);" onclick="return listItemTask(\'cb'.$i.'\',\''.$state[1].'\')" title="'.JText::_($state[3]).'">'
					. $html.'</a>';
		}

		return $html;
	}
}
