<?php
class TableFieldContent extends JTable
{
	/** @var int Primary key **/
	var $id = null;	
	/** @var int Form Id **/
	var $formid = null;	
	/** @var int Field Id **/
	var $fieldid = null;	
	/** @var string Content **/
	var $content = null;
	
	/**
	 * Constructor
	 *
	 * @param database Database object
	 */
	function __construct(&$db)
	{
		parent::__construct('#__f2c_fieldcontent', 'id', $db);
	}
	 
	/**
	 * Validation
	 *
	 * @return boolean True if buffer valid
	 */
	function check()
	{
		return true;
	}
}
?>