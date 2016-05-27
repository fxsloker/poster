<?php
defined('JPATH_PLATFORM') or die('Restricted acccess');

/**
 * Custom field Administrator base class
 * 
 * This class supports functionality for the field administration of a custom field.
 * All custom fields must implement this class.
 * 
 * @package     Joomla.Site
 * @subpackage  com_form2content
 * @since       5.5.0
 */
abstract class F2cFieldAdminBase
{
	/**
	 * Method to generate the HTML for the custom field settings.
	 * Must be implemented by all children of this class.
	 *
	 * @param   JForm 	$form 	the form definition object
	 * @param   object 	$item	the admin field object
	 *
	 * @return  string	Generated HTML
	 *
	 * @since   5.5.0
	 */
	abstract public function display($form, $item);
	
	
	/**
	 * Method to generate and echo the script for client site validation.
	 * Must be implemented by all children of this class.
	 *
	 * @param   JView 	$view 	the view definition object
	 *
	 * @return  void
	 *
	 * @since   5.5.0
	 */
	public function clientSideValidation($view)
	{
	}
	
	/**
	 * Method to prepare the data prior to a save operation.
	 * This method is often used to transform the posted data before saving it.
	 *
	 * @param   array	$data 				array of posted data
	 * @param   boolean	$useRequestData 	True when the posted data should be used
	 *
	 * @return  void
	 *
	 * @since   5.5.0
	 */
	public function prepareSave(&$data, $useRequestData)
	{
	}
	
	/**
	 * Method to do additional work when a field is being deleted (e.g. cleaning up data  and directories).
	 *
	 * @param   int	$id	Id of field that will be deleted
	 *
	 * @return  void
	 *
	 * @since   5.5.0
	 */
	public function delete($id) 
	{
	}
	
	/**
	 * Method to generate template code for the sample template
	 *
	 * @param   string	$fieldname	Name of the field
	 *
	 * @return  string	Generated template code
	 *
	 * @since   5.5.0
	 */
	public function getTemplateSample($fieldname)
	{
		return $fieldname.': {$'.strtoupper($fieldname)."}\n";
	}
	
	/**
	 * Method to get a list of options from the posted data.
	 * This function is used in fields like the SingleSelectList that generate a list of options
	 *
	 * @param   string	$tableId	Id of the HTML table that contains the data
	 * @param  	boolean	$hasValue	True when we need to get the value, else we get the key itself
	 *
	 * @since   5.5.0
	 */
	protected function getOptionsArray($tableId, $hasValue = false)
	{
		$options = array();
		$jinput	 = JFactory::getApplication()->input;
		$rowKeys = $jinput->get($tableId, array(), 'array');
		
		if(count($rowKeys))
		{
			foreach($rowKeys as $rowKey)
			{
				$key = $jinput->getString($rowKey . 'key');

				if($key != '')
				{
					if(!$options || !array_key_exists($key, $options))
					{	
						if($hasValue)
						{
							$options[$key] = $jinput->get($rowKey.'val', '', 'RAW');
						}
						else
						{
							$options[$key] = $key;
						}
					}
				}						
			}
		}

		return $options;		
	}
} 
?>
