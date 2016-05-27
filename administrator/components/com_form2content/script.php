<?php
defined('_JEXEC') or die('Restricted acccess');

/**
 * Script file of Form2Content component
 */
class com_Form2ContentInstallerScript
{
        /**
         * method to run before an install/update/uninstall method
         *
         * @return void
         */
        function preflight($type, $parent) 
        {
        	$joomlaVersionRequired = '3.1.5';
        	
        	if(!$this->checkJoomlaVersion($joomlaVersionRequired))
        	{
        		JFactory::getApplication()->enqueueMessage(sprintf(JText::_('COM_FORM2CONTENT_JOOMLA_VERSION_TOO_LOW'), $joomlaVersionRequired), 'error');
        		return false;
        	}
        	
		 	if(!(extension_loaded('gd') && function_exists('gd_info')))
		 	{
		 		JFactory::getApplication()->enqueueMessage(JText::_('COM_FORM2CONTENT_GDI_NOT_INSTALLED'), 'warning');
		 	}
        	
        	return true;
        }
	
    /**
     * method to install the component
     *
     * @return void
     */
    function install($parent) 
    {
		$path = JPATH_SITE . '/images/stories/com_form2content';
		
		if(!JFolder::exists($path))
		{
			JFolder::create($path, 0775);
		}

		$path = JPATH_SITE . '/media/com_form2content/templates';

		if(!JFolder::exists($path))
		{
			JFolder::create($path, 0775);
		}
		
		$path = JPATH_SITE . '/media/com_form2content/documents';
		
		if(!JFolder::exists($path))
		{
			JFolder::create($path, 0775);
		}	    
		?>	
		<script type="text/javascript" src="<?php echo JURI::root(true).'/media/com_form2content/js/'; ?>jquery.blockUI.js"></script>
		<div align="left">
		<img src="../media/com_form2content/images/OSD_logo.png" width="350" height="180" border="0">
		<h2><?php JText::_('COM_FORM2CONTENT_WELCOME_TO_F2C'); ?></h2>
		</div>
		<script type="text/javascript">
			var jBusyInstalling = '<p class="blockUI" style="padding: 10px; margin: 10px;"><img src="<?php echo JURI::root(true).'/media/com_form2content/images/'; ?>busy.gif" /><span style="padding: 10px; margin: 10px; font-weight: bold; font-size: 1.5em;"><?php echo JText::_('COM_FORM2CONTENT_BUSY_INSTALLING_SAMPLE_DATA', true)?></span></p>';
	
			jQuery(document).ready(function() 
			{
				jQuery(document).ajaxStop(jQuery.unblockUI); 
				jQuery.blockUI({message: jBusyInstalling});
	
				jQuery.ajax({
				    type: 'POST',
				    dataType: 'JSON',
				    data: null,
				    url: 'index.php?option=com_form2content&task=project.installsamples&format=raw',
				    cache: false,
				    contentType: false,
				    processData: false,
				    success: function(data)
				    {
				    },
					error: function(jqXHR, textStatus, errorThrown)
					{
						alert(textStatus + '\r\n' + errorThrown);
					}
				});
			});	
		</script>		
		<?php        	
        }
 
        /**
     * method to uninstall the component
     *
     * @return void
     */
    function uninstall($parent) 
    {
    }
 
        /**
     * method to update the component
     *
     * @return void
     */
        function update($parent) 
        {
        	$db = JFactory::getDBO();
        	
        	// Add missing fields
			$sql = 'INSERT INTO #__f2c_fieldtype (`id`, `description`) SELECT 9, \'Hyperlink\' FROM #__f2c_fieldtype Where id = 9 HAVING COUNT(*) = 0';
			$db->setQuery($sql);
			$db->execute();
			
			// add missing columns (release 4.6.0)
			$db->setQuery('SHOW COLUMNS FROM #__f2c_project LIKE \'images\'');
			
			if(!$db->loadResult())
			{
				$db->setQuery('ALTER TABLE #__f2c_project ADD COLUMN `images` TEXT NOT NULL  AFTER `metadesc`');
				$db->execute();
				$db->setQuery('ALTER TABLE #__f2c_project ADD COLUMN `urls` TEXT NOT NULL  AFTER `images`');
				$db->execute();
			}
			
			// Remove the sectionid column
			$db->setQuery('SHOW COLUMNS FROM #__f2c_form LIKE \'sectionid\'');
			
			if($db->loadResult())
			{
				$db->setQuery('ALTER TABLE #__f2c_form DROP COLUMN `sectionid`');
				$db->execute();
			}
			
			// add extended column (release 5.2.0)
			$db->setQuery('SHOW COLUMNS FROM #__f2c_form LIKE \'extended\'');
			
			if(!$db->loadResult())
			{
				$db->setQuery('ALTER TABLE #__f2c_form ADD COLUMN `extended` TEXT NOT NULL  AFTER `language`');
				$db->execute();
			}
			
			// add name column to fieldtype table (release 5.5.0)
			$db->setQuery('SHOW COLUMNS FROM #__f2c_fieldtype LIKE \'name\'');
			
			if(!$db->loadResult())
			{
				$db->setQuery('ALTER TABLE #__f2c_fieldtype ADD COLUMN `name` VARCHAR(45) NOT NULL  AFTER `description`');
				$db->execute();
				$db->setQuery('UPDATE #__f2c_fieldtype set `name` = \'Singlelinetext\' WHERE id = 1');
				$db->execute();
				$db->setQuery('UPDATE #__f2c_fieldtype set `name` = \'Multilinetext\' WHERE id = 2');
				$db->execute();
				$db->setQuery('UPDATE #__f2c_fieldtype set `name` = \'Editor\' WHERE id = 3');
				$db->execute();
				$db->setQuery('UPDATE #__f2c_fieldtype set `name` = \'Singleselectlist\' WHERE id = 5');
				$db->execute();
				$db->setQuery('UPDATE #__f2c_fieldtype set `name` = \'Image\' WHERE id = 6');
				$db->execute();
				$db->setQuery('UPDATE #__f2c_fieldtype set `name` = \'Hyperlink\' WHERE id = 9');
				$db->execute();
				$db->setQuery('UPDATE #__f2c_fieldtype set `name` = \'Infotext\' WHERE id = 11');
				$db->execute();
				// Change the id column to auto increment
				$db->setQuery('ALTER TABLE #__f2c_fieldtype MODIFY COLUMN id int(10) unsigned NOT NULL auto_increment');
				$db->execute();
			}	
        }
 
   /**
     * method to run after an install/update/uninstall method
     *
     * @return void
     */
    function postflight($type, $parent) 
    {
    }
	
    private function checkJoomlaVersion($versionNumber)
    {
    	$version = new JVersion();
    	return $version->isCompatible($versionNumber);
    }
}
?>