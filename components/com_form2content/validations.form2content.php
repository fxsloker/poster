<?php
defined('_JEXEC') or die('Restricted acccess');

class F2C_Validation
{
	static function createDatePickerValidation($fieldId, $fieldLabel, $format, $displayFormat, $userField = true)
	{
		$script = 'if(!F2C_ValDateField(\''.$fieldId.'\', \''.$format.'\'))';
		$script .= '{ ';
		$script .= 'alert(\'' . sprintf(JText::_('COM_FORM2CONTENT_ERROR_DATE_FIELD_INCORRECT_DATE', true), $fieldLabel, $displayFormat) . '\'); ';
		$script .= 'return false; }';

		return $script;
	}
}
?>
