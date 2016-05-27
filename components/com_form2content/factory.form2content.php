<?php
// No direct access
defined('JPATH_BASE') or die;

abstract class F2cFactory
{
	public static $config = null;
	private static $arrContentType 	= array();
	
	/**
	 * Get a configuration object
	 *
	 * Returns the global {@link JRegistry} object, only creating it
	 * if it doesn't already exist.
	 *
	 * @return JRegistry object
	 */
	public static function getConfig()
	{
		if (!self::$config) 
		{
			self::$config = self::_createConfig();
		}

		return self::$config;
	}
	
	private static function _createConfig()
	{
		$config 		= new JRegistry();		
		$paramvalues 	= JComponentHelper::getParams('com_form2content');
		
		$config->loadString($paramvalues);
		
		$config->set('f2c_pro', false);
		$config->set('template_path', JPATH_SITE.DIRECTORY_SEPARATOR.'media'.DIRECTORY_SEPARATOR.'com_form2content'.DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR);
		$config->set('images_path', 'images/stories/com_form2content');
		
		// Set some defaults
		if($config->get('generate_sample_template') == '')
		{
			$config->set('generate_sample_template', '1');
		}

		if($config->get('jpeg_quality') == '')
		{
			$config->set('jpeg_quality', '75');
		}
		
		if($config->get('date_format') == '')
		{
			$config->set('date_format', '%d-%m-%Y');
		}
		
		if($config->get('edit_items_level') == '')
		{
			$config->set('edit_items_level', '0');
		}
		
		return $config;
	}
	
	public static function getContentType($contentTypeId, $addToCache = true)
	{
		if(array_key_exists($contentTypeId, self::$arrContentType))
		{
			return self::$arrContentType[$contentTypeId];
		}

		// Load the Content Type and add it to the array
		if(!class_exists('Form2ContentModelProject'))
		{
			require_once(JPATH_SITE.'/components/com_form2content/models/project.php');
		}
		
		$model = new Form2ContentModelProject();
		$contentType = $model->getItem($contentTypeId);
		
		if($addToCache)
		{
			self::$arrContentType[$contentTypeId] = $contentType;
		}
		
		return $contentType;
	}
}
?>