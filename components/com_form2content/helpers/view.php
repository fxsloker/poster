<?php
defined('JPATH_PLATFORM') or die('Restricted acccess');

class F2cViewHelper
{
	/**
	 * Create the HTML page title.
	 *
	 * @param	string	$title	The title as provided by the component.
	 *
	 * @return	string	The title as it should be displayed in the browser.
	 * @since	3.2.1
	 */
	static function getPageTitle($title)
	{
		$config 	= JFactory::getConfig();
		$sitename 	= $config->get('sitename');
		
		if(empty($title))
		{
			$title = $sitename;	
		}
		else
		{
			// test the version of of Joomla, see if we have 1.7.x or higher
			list($major, $minor, $revision) = explode('.', JVERSION);
			
			switch($config->get('sitename_pagetitles', 0))
			{
				case 0: // No
					break;
				case 1: // After
					$title = JText::sprintf('JPAGETITLE', $sitename, $title);
					break;
				case 2: // Before
					$title = JText::sprintf('JPAGETITLE', $title, $sitename);
					break;
			}
		}

		return $title;		
	}
}
?>