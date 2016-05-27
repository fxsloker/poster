<?php
defined('_JEXEC') or die('Restricted acccess');

jimport('joomla.html.pagination');
jimport('joomla.utilities.date');
jimport('joomla.filesystem.folder');
jimport('joomla.filesystem.file');

class Path
{
	static function Combine($path, $fileName)
	{
		return rtrim($path, "/\\") . '/' . $fileName;
	}
	
	/*
	 * Recursively remove a path, thus deleting all its files and subfolders
	 */
	static function Remove($path)
	{
		$path = JPath::clean($path);
	
		if(!JFolder::exists($path)) return false;
		
		$files = JFolder::files($path, '.', false, true);
	
		if(count($files))
		{		
			JFile::delete($files);
		}
	
		$folders = JFolder::folders($path, '.', false, true);
		
		if(count($folders))
		{
			foreach($folders as $folder);
			{
				Path::Remove($folder);
			}
		}
			
		JFolder::delete($path);	
		return true;
	}
}

class F2C_FileInfo
{
	var $id;
	var $fileName;
	var $fileLocation;
	var $fileSize;
	var $fileExtension;
	
	function F2C_FileInfo($fileLocation, $fileName)
	{
		$this->id = $fileLocation.$fileName;
		$this->fileName = $fileName;
		$this->fileLocation = $fileLocation;
		$this->fileExtension = JFile::getExt($this->id);
		$this->fileSize = F2C_FileInfo::FormatFileSize(filesize($this->id));
	}
	
	static function FormatFileSize($filesize)
	{	
		if($filesize > 1024 * 1024)
		{
			$filesize = round($filesize / (1024 * 1024), 2);
			return $filesize . ' Mb';
		}
	
		if($filesize > 1024)
		{
			$filesize = round($filesize / 1024, 2);
			return $filesize . ' kb';
		}
		
		return $filesize . ' bytes';
	}
}

class ImageHelper
{
    static function ResizeImage($srcFile, $dstFile = null, &$dstWidth, &$dstHeight, $jpegQuality = 75) 
    {
		// Initialize variables
		jimport('joomla.client.helper');
		$FTPOptions = JClientHelper::getCredentials('ftp');
    	
		if(!ImageHelper::isGdiLibInstalled())
		{
			JError::raiseError("ResizeImage(): Missing GD Libraries");
			return false;
		}
    	
    	if(!$dstFile)
    	{
			$dstFile = $srcFile;    		
    	}
    	
    	$fileExt = strtolower(JFile::getExt($srcFile));

		if($fileExt != 'gif' && $fileExt != 'jpg' && $fileExt != 'jpeg' && $fileExt != 'png')
		{
			JError::raiseError("ResizeImage(): Invalid file extension: {$fileExt}");
			return false;			
		}
		
		if($dstWidth == 0 || $dstHeight == 0) 
		{
			JError::raiseError("ResizeImage(): Invalid size value (w:{$dstWidth}, h:{$dstHeight})");
			return false;
		}
		
		list($srcWidth, $srcHeight, $imgType) = getimagesize($srcFile);
		
		if(!$srcWidth || !$srcHeight || !$imgType) 
		{
			JError::raiseError("ResizeImage(): Cannot retrieve image information; not a valid image");			

			if(!unlink($srcFile))
			{
				JError::raiseError("ResizeImage(): Cannot delete file");
			}
			
			return false;
		}
		
    	if($srcWidth == 0 || $srcHeight == 0) 
    	{
			JError::raiseError("ResizeImage(): Invalid size value for source image (original width: {$srcWidth}, original height:{$srcHeight})");
			return false;
		}
		
    	if(($srcWidth <= $dstWidth) && ($srcHeight <= $dstHeight))
    	{
    		// No resize necessary: fill the output parameters
    		$dstWidth = $srcWidth;
    		$dstHeight = $srcHeight;
    		
    		if($srcFile == $dstFile)
    		{
    			return true;
    		}
    		
    		return JFile::copy($srcFile, $dstFile);
    	}
    	
    	$srcRatio = $srcWidth / $srcHeight;

		if($dstWidth / $dstHeight > $srcRatio)
		{
		   $dstWidth = $dstHeight * $srcRatio;
		}
		else
		{
		   $dstHeight = $dstWidth / $srcRatio;
		}

		$dstHeight = (int)ceil($dstHeight);
		$dstWidth = (int)ceil($dstWidth);

		if(!($dstImage = imagecreatetruecolor($dstWidth, $dstHeight)))
		{
			return false;
		}
		    			
		switch($imgType)
		{
			case 1: // gif
				if(!($srcImage = imagecreatefromgif($srcFile))) 
				{
					JError::raiseError("ResizeImage(): Invalid GIF file");
					return false;
				}
				
				$colorcount = imagecolorstotal($srcImage);
				
				if($colorcount)
				{
					imagetruecolortopalette($dstImage, true, $colorcount);
				}
				
				imagepalettecopy($dstImage,$srcImage);
				$transparentcolor = imagecolortransparent($srcImage);
				
				if($transparentcolor > -1)
				{
					imagefill($dstImage,0,0,$transparentcolor);
				}
				
				imagecolortransparent($dstImage,$transparentcolor);
				imagecopyresampled($dstImage, $srcImage, 0,0,0,0, $dstWidth, $dstHeight, $srcWidth, $srcHeight); 
				
				if ($FTPOptions['enabled'] == 1)
				{
					ob_start();

					if(!(imagegif($dstImage, null)))
					{
						ob_end_clean();
						JError::raiseError("ResizeImage(): Could not create buffered GIF file");
						return false;
					}
					
					$imgGifData = ob_get_contents();
					ob_end_clean();
					
					if(!JFile::write($dstFile, $imgGifData)) 
					{
						JError::raiseError("ResizeImage(): Could not create GIF file (JFile write)");
						return false;
					}
				}
				else
				{
					if(!(imagegif($dstImage, $dstFile)))
					{
						JError::raiseError("ResizeImage(): Could not create GIF file (Direct write)");
						return false;
					}
				}
				
				break;
				
			case 2: // jpg
				if(!($srcImage = imagecreatefromjpeg($srcFile)))
				{
					JError::raiseError("ResizeImage(): Invalid JPG file");
					return false;
				}
			
				Imagefill($dstImage, 0, 0, imagecolorallocate($dstImage, 255, 255, 255));
				imagecopyresampled($dstImage, $srcImage, 0,0,0,0, $dstWidth, $dstHeight, $srcWidth, $srcHeight);

				if ($FTPOptions['enabled'] == 1)
				{
					ob_start();

					if(!(imagejpeg($dstImage, null, $jpegQuality)))
					{
						ob_end_clean();
						JError::raiseError("ResizeImage(): Could not create buffered JPG file");
						return false;
					}
					
					$imgJpgData = ob_get_contents();
					ob_end_clean();
					
					if(!JFile::write( $dstFile, $imgJpgData)) 
					{
						JError::raiseError("ResizeImage(): Could not create JPG file (JFile write)");
						return false;
					}
				}
				else
				{
					if(!(imagejpeg($dstImage, $dstFile, $jpegQuality)))
					{
						JError::raiseError("ResizeImage(): Could not create JPG file (Direct write)");
						return false;
					}
				}
				break;
				
			case 3: // png
				if(!($srcImage = imagecreatefrompng($srcFile)))
				{
					JError::raiseError("ResizeImage(): Invalid PNG file");
					return false;
				}
			
				imagealphablending($dstImage, false);
	            $colorTransparent = imagecolorallocatealpha($dstImage, 0, 0, 0, 127);
	            imagefill($dstImage, 0, 0, $colorTransparent);
	            imagesavealpha($dstImage, true);
				imagecopyresampled($dstImage, $srcImage, 0,0,0,0, $dstWidth, $dstHeight, $srcWidth, $srcHeight); 
			
				if ($FTPOptions['enabled'] == 1)
				{
					ob_start();

					if(!(imagepng($dstImage, null)))
					{
						ob_end_clean();
						JError::raiseError("ResizeImage(): Could not create buffered PNG file");
						return false;
					}
					
					$imgPngData = ob_get_contents();
					ob_end_clean();
					
					if(!JFile::write($dstFile, $imgPngData)) 
					{
						JError::raiseError("ResizeImage(): Could not create PNG file (JFile write)");
						return false;
					}
				}
				else
				{
					if(!(imagepng($dstImage, $dstFile)))
					{
						JError::raiseError("ResizeImage(): Could not create PNG file (Direct write)");
						return false;
					}
				}
												
				break;
		}

		imagedestroy($dstImage);
		imagedestroy($srcImage);
		return true;
    }
    
    static function isGdiLibInstalled()
    {
    	if((!function_exists('imagecreatetruecolor')) 	|| (!function_exists('imagecreatefromgif')) 	||
		   (!function_exists('imagecopyresampled'))		|| (!function_exists('imagegif')) 				||
		   (!function_exists('imagecreatefromgif')) 	|| (!function_exists('imagecreatefromjpeg')) 	||
		   (!function_exists('imagecreatefrompng'))		|| (!function_exists('imagecolorstotal'))		||
		   (!function_exists('imagecolortransparent'))	|| (!function_exists('imagefill'))				||
		   (!function_exists('imagetruecolortopalette'))|| (!function_exists('imagepalettecopy')))
		{		
			return false;
		}
		else
		{
			return true;
		}
    }	
}

class F2cContentHelper
{
	static function syncArticleOrder($catid)
	{
		$db		= JFactory::getDBO();
		$query	= $db->getQuery(true);
		
		$query->update('#__content c');
		$query->innerJoin('#__f2c_form f ON f.reference_id = c.id');
		$query->set('c.ordering = f.ordering');
		$query->where('f.catid = ' . (int)$catid);
		
		$db->setQuery($query);
		$db->execute();
		
		$cache = JFactory::getCache('com_content');
		$cache->clean();
	}	
}

class F2cDateTimeHelper
{
	static function ParseDate($date, $format)
	{
		$day = 0;
		$month = 0;
		$year = 0;
		$date = trim($date);

		if(stristr($date, ' ') === FALSE)
		{
			$date .= ' 00:00:00';
		}
		
		list($datePart, $timePart) = explode(' ', $date);
	
		$strippedFormat = JString::str_ireplace('%d', '', $format);
		$strippedFormat = JString::str_ireplace('%m', '', $strippedFormat);
		$strippedFormat = JString::str_ireplace('%Y', '', $strippedFormat);
		$separator 		= JString::substr($strippedFormat, 0, 1);
		$dateFormat 	= explode($separator, $format); 
		$dateParts 		= explode($separator, $datePart);
		$timeParts 		= explode(':', $timePart);
			
		if(count($dateParts) != 3)
		{
			return false;
		}
	
		if(count($timeParts) == 1)
		{
			$timeParts[1] = '00';
			$timeParts[2] = '00';
		}
	
		if(count($timeParts) == 2)
		{
			$timeParts[2] = '00';
		}
	
		$timeParts[0] = (int)$timeParts[0];
		$timeParts[1] = (int)$timeParts[1];
		$timeParts[2] = (int)$timeParts[2];
		
		if(!F2cDateTimeHelper::checktime($timeParts[0], $timeParts[1], $timeParts[2]))
		{
			return false;
		}
				
		for($i = 0; $i < count($dateFormat); $i++)
		{
			switch($dateFormat[$i])
			{
				case '%d':
					$day = (int)$dateParts[$i];
					break;
				case '%m':
					$month = (int)$dateParts[$i];
					break;
				case '%Y':
					$year = (int)$dateParts[$i];
					break;
			}
		}
				
		if(checkdate($month, $day, $year))
		{
			return new JDate($year.'-'.$month.'-'.$day. ' '.$timeParts[0].':'.$timeParts[1].':'.$timeParts[2]);
		}
		else
		{
			return false;
		}	
	}
	
	static function checktime($hours, $minutes, $seconds)
	{
		if($hours < 0 || $hours > 23) return false;
		if($minutes < 0 || $minutes > 59) return false;
		if($seconds < 0 || $seconds > 59) return false;
		return true;
	}
	
	static function getTranslatedDateFormat()
	{
		$dateFormat	= F2cFactory::getConfig()->get('date_format');
		$dateFormat = str_replace('%', '', $dateFormat);
		$dateFormat = str_replace('-', '_', $dateFormat);
		return JText::_('COM_FORM2CONTENT_DATE_FORMAT_'.strtoupper($dateFormat));
	}
}

class F2C_AdminHelper
{
	static function generateSampleTemplate($contentTypeId)
	{
		$db = JFactory::getDBO();
		$query 	= $db->getQuery(true);
		
		$query->select('title')->from('#__f2c_project')->where('id='.(int)$contentTypeId);
		$db->setQuery($query);

		$projectTitle = JFile::makeSafe($db->loadResult());
	
		$template = '';		
		$template .= 'This template is based on the Smarty template engine<br/>'."\n";
		$template .= 'Please find the documentation at <a href="http://www.form2content.com/documentation" target="_blank">http://www.form2content.com/documentation</a>.<br/>'."\n";
		$template .= 'The list of all possible template parameters can be found <a href="http://www.form2content.com/f2c-joomla/pro/f2c-documentation/16-form2content-template-parameters" target="_blank">here</a>.<hr/>'."\n";
		$template .= '<h1>{$JOOMLA_TITLE}</h1>'."\n";		
		$template .= "<p>This is an automatically generated default intro template - please do not edit.</p>\n";			
		$template .= '<hr/>'."\n";
		
		$query 	= $db->getQuery(true);
		
		$query->select('fieldname, name');
		$query->from('#__f2c_projectfields prf');
		$query->join('INNER', '#__f2c_fieldtype flt ON prf.fieldtypeid = flt.id');
		$query->where('projectid='.(int)$contentTypeId);
		$query->order('ordering ASC');
		
		$db->setQuery($query);
				
		$rows = $db->loadObjectList();
		
		for ($i=0, $n=count($rows); $i < $n; $i++) 
	    {
	      	$row = $rows[$i];
	      
			$fieldClassName = 'F2cFieldAdmin'.$row->name;
			$field = new $fieldClassName();
	      	
			$template .= $field->getTemplateSample($row->fieldname);
   			$template .= '<hr/>';			
		}
			
		$fileName = Path::Combine(F2cFactory::getConfig()->get('template_path'), 'default_intro_template_' .$projectTitle.'.tpl');
		JFile::write($fileName, $template);
		
		$template = "";	
		$template .= "<hr/>\n";
		$template .= "<p>This is an automatically generated default main template - please do not edit.</p>\n";
		$template .= "<p>Please note: the main template does not contain any fields.</p>\n";
		$template .= "<hr/>\n";
	
		$fileName = Path::Combine(F2cFactory::getConfig()->get('template_path'), 'default_main_template_'.$projectTitle.'.tpl');
		JFile::write($fileName, $template);
	}	
}

class F2cArrayHelper
{
	static function getValue($array, $key, $default = '')
	{
		return array_key_exists($key, $array) ? $array[$key] : $default;  
	}
}

class F2cMenuHelper
{
	/*
	 * Return the Request menu parameters as a JRegistry object
	 */
	static function getParameters($itemId)
	{
		$arrQueryString	= array();
		$db 			= JFactory::getDbo();
		$query 			= $db->getQuery(true);
		$queryString 	= new JRegistry();

		$query->select('link');
		$query->from('#__menu');
		$query->where('id='.(int)$itemId);
		
		$db->setQuery($query->__toString());
		
		parse_str(parse_url($db->loadResult(), PHP_URL_QUERY), $arrQueryString);
		
		$queryString->loadArray($arrQueryString);
		
		return $queryString;
	}
}

class F2cUri
{
	static function GetClientRoot()
	{
		$config = JFactory::getConfig();
		$root	= JURI::root();
		
		switch((int)$config->get('force_ssl'))
		{
			case 0: // none
				if(strpos(strtolower($root), 'https') === 0)
				{
					$root = substr_replace($root, 'http', 0, 5);
				}
				break;
			case 1: // admin only
				$root = substr_replace(JURI::root(), 'http', 0, 5);
				break;
			case 2: // entire site
				break;
		}

		return $root;
	}	
}
?>
