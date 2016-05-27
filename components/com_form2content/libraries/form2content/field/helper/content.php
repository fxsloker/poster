<?php
defined('JPATH_PLATFORM') or die('Restricted acccess');

/**
 * Helper class to facilitate the storage of field data
 */
class F2cFieldHelperContent
{
	/**
	 * The Id identifying element.
	 *
	 * @var    int
	 * @since  6.8.0
	 */
	var $id;
	
	/**
	 * The data attribute identifying the element.
	 *
	 * @var    string
	 * @since  6.8.0
	 */
	var $attribute;
	
	/**
	 * The content (actual data) of the element.
	 *
	 * @var    string
	 * @since  6.8.0
	 */
	var $content;
	
	/**
	 * The action to be performed with this element.
	 * Possible values: INSERT, UPDATE, DELETE
	 *
	 * @var    string
	 * @since  6.8.0
	 */
	var $action;
	
	/**
	 * Constructor to initialize the object
	 * 
	 * @param   int		Id
	 * @param   string  Attribute
	 * @param   string  Content
	 * @param   string  Action
	 * 
	 * @since  6.8.0
	 */
	function F2cFieldHelperContent($id, $attribute, $content, $action)
	{
		$this->id 			= $id;
		$this->attribute 	= $attribute;
		$this->content 		= $content;
		$this->action		= $action;
	}
}
?>