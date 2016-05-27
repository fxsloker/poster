<?php
defined('_JEXEC') or die('Restricted acccess');

require_once(JPATH_SITE.DIRECTORY_SEPARATOR.'components'.DIRECTORY_SEPARATOR.'com_form2content'.DIRECTORY_SEPARATOR.'parser.form2content.php');
require_once(JPATH_SITE.DIRECTORY_SEPARATOR.'components'.DIRECTORY_SEPARATOR.'com_content'.DIRECTORY_SEPARATOR.'helpers'.DIRECTORY_SEPARATOR.'route.php');

jimport('joomla.template.template');
jimport('joomla.utilities.date');

defined('F2C_FIELDTYPE_SINGLELINE') 		or define('F2C_FIELDTYPE_SINGLELINE', 1);
defined('F2C_FIELDTYPE_MULTILINETEXT') 		or define('F2C_FIELDTYPE_MULTILINETEXT', 2);
defined('F2C_FIELDTYPE_MULTILINEEDITOR')	or define('F2C_FIELDTYPE_MULTILINEEDITOR', 3);
defined('F2C_FIELDTYPE_SINGLESELECTLIST')	or define('F2C_FIELDTYPE_SINGLESELECTLIST', 5);
defined('F2C_FIELDTYPE_IMAGE') 				or define('F2C_FIELDTYPE_IMAGE', 6);
defined('F2C_FIELDTYPE_HYPERLINK') 			or define('F2C_FIELDTYPE_HYPERLINK', 9);
defined('F2C_FIELDTYPE_INFOTEXT') 			or define('F2C_FIELDTYPE_INFOTEXT', 11);

defined('F2C_ENTITY_CONTENTTYPE')			or define('F2C_ENTITY_CONTENTTYPE', 1);
defined('F2C_ENTITY_CONTENTTYPEFIELD')		or define('F2C_ENTITY_CONTENTTYPEFIELD', 2);
defined('F2C_ENTITY_ARTICLE')				or define('F2C_ENTITY_ARTICLE', 3);
defined('F2C_ENTITY_ARTICLEFIELD')			or define('F2C_ENTITY_ARTICLEFIELD', 4);

defined('F2C_DEFAULT_THUMBNAIL_WIDTH')		or define('F2C_DEFAULT_THUMBNAIL_WIDTH', 150);
defined('F2C_DEFAULT_THUMBNAIL_HEIGHT')		or define('F2C_DEFAULT_THUMBNAIL_HEIGHT', 150);

class HtmlHelper
{
	static function detectUTF8($string)
	{
	    return preg_match('%(?:
	        [\xC2-\xDF][\x80-\xBF]             # non-overlong 2-byte
	        |\xE0[\xA0-\xBF][\x80-\xBF]        # excluding overlongs
	        |[\xE1-\xEC\xEE\xEF][\x80-\xBF]{2} # straight 3-byte
	        |\xED[\x80-\x9F][\x80-\xBF]        # excluding surrogates
	        |\xF0[\x90-\xBF][\x80-\xBF]{2}     # planes 1-3
	        |[\xF1-\xF3][\x80-\xBF]{3}         # planes 4-15
	        |\xF4[\x80-\x8F][\x80-\xBF]{2}     # plane 16
	        )+%xs', 
	    $string);
	}

	static function stringHTMLSafe($string)
	{
		if(HtmlHelper::detectUTF8($string))
		{
			$safeString = htmlentities ($string, ENT_COMPAT, 'UTF-8');
		}
		else
		{
			$safeString = htmlentities ($string, ENT_COMPAT);
		}
		
		return $safeString;
	}
	
	static public function renderCalendar($valueFormatted, $valueRaw, $name, $id, $format = '%Y-%m-%d', $attribs = null,  $classicLayout = false)
	{
		static $done;

		if ($done === null) 
		{
			$done = array();
		}

		$readonly = isset($attribs['readonly']) && $attribs['readonly'] == 'readonly';
		$disabled = isset($attribs['disabled']) && $attribs['disabled'] == 'disabled';
		if (is_array($attribs)) {
			$attribs = JArrayHelper::toString($attribs);
		}

		if ((!$readonly) && (!$disabled)) 
		{
			// Load the calendar behavior
			JHtml::_('behavior.calendar');
			JHtml::_('behavior.tooltip');

			// Only display the triggers once for each control.
			if (!in_array($id, $done))
			{
				$document = JFactory::getDocument();
				$document->addScriptDeclaration('window.addEvent(\'domready\', function() {Calendar.setup({
				inputField: "'.$id.'",		// id of the input field
				ifFormat: "'.$format.'",	// format of the input field
				button: "'.$id.'_img",		// trigger for the calendar (button ID)
				align: "Tl",				// alignment (defaults to "Bl")
				singleClick: true,
				firstDay: '.JFactory::getLanguage()->getFirstDay().'
				});});');
				$done[] = $id;
			}
			
			if($classicLayout)
			{
				return '<input type="text" title="'.(0!==(int)$valueRaw ? JHtml::_('date',$valueRaw):'').'" name="'.$name.'" id="'.$id.'" value="'.htmlspecialchars($valueFormatted, ENT_COMPAT, 'UTF-8').'" '.$attribs.' />'.
						($readonly ? '' : JHTML::_('image','system/calendar.png', JText::_('JLIB_HTML_CALENDAR'), array( 'class' => 'calendar', 'id' => $id.'_img'), true));				
			}
			else 
			{
				return '<div class="input-append"><input type="text" title="' . (0 !== (int)$valueRaw ? JHtml::_('date', $valueRaw) : '') . '" name="' . $name . '" id="' . $id
					. '" value="' . htmlspecialchars($valueFormatted, ENT_COMPAT, 'UTF-8') . '" ' . $attribs . ' /><button class="btn" id="' . $id . '_img"><i class="icon-calendar"></i></button></div>';
			}			
		}
		else 
		{
			return '<input type="text" title="' . (0 !== (int)$valueRaw ? JHtml::_('date', $valueRaw, null, null) : '')
				. '" value="' . (0 !== (int)$valueRaw ? htmlspecialchars($valueFormatted, ENT_COMPAT, 'UTF-8') : '') . '" ' . $attribs
				. ' /><input type="hidden" name="' . $name . '" id="' . $id . '" value="' . htmlspecialchars($valueFormatted, ENT_COMPAT, 'UTF-8') . '" />';
					}
	}
}
?>
