<?php
defined('JPATH_PLATFORM') or die('Restricted acccess');

class F2cFieldImage extends F2cFieldBase
{
	public $baseDir; 
	
	function __construct($field)
	{
		$this->reset();
		parent::__construct($field);
		$this->baseDir = Path::Combine(JPATH_SITE, $this->f2cConfig->get('images_path'));
	}
	
	/**
	 * Method to render the field.
	 * All children of this class must implement this function.
	 *
	 * @param	array		$translatedFields		Array of field translations
	 * @param	array		$contentTypeSettings	Array containing settings for the Content Type
	 * @param	array		$parms					Array with additional parameters
	 * @param	JForm		$form					Form object
	 * @param	int			$formId					Id of the current form
	 * 
	 * @return  string		HTML containing the rendered field
	 * 
	 * @since   5.5.0
	 */
	public function render($translatedFields, $contentTypeSettings, $parms = array(), $form, $formId)
	{
		if(!count($parms))
		{
			$parms = JFactory::getApplication()->isSite() ? array(50, 100) : array(75, 100);
		}
		
		$html				= '';
		$uploadAttribs 		= 'class="inputbox"';
		$deleteAttribs 		= 'class="inputbox"';		
		$widthAltText		= $parms[0];
		$maxLengthAltText	= $parms[1];
		$widthTitle			= $parms[0];
		$maxLengthTitle		= $parms[1];
		$fieldName			= $this->elementId;

		$html .= '<div class="f2c_field">';		
		$html .= '<table><tr><td>&nbsp;</td><td>';
		$html .= '<input type="file" id="'.$fieldName.'_fileupload" name="'.$fieldName.'_fileupload" '.$uploadAttribs.'>&nbsp;';
		$html .= '<input type="button" class="btn" onclick="clearUpload(\''.$fieldName.'_fileupload\');return false;" value="'.Jtext::_('COM_FORM2CONTENT_CLEAR_FIELD').'" />&nbsp;';
		$html .= '<input type="checkbox" id="'.$fieldName.'_del" name="'.$fieldName.'_del" '.$deleteAttribs.'>&nbsp;'.Jtext::_('COM_FORM2CONTENT_DELETE_IMAGE');
		
		$html .= $this->renderHiddenField($fieldName . '_filename', $this->values['FILENAME']);
		$html .= $this->getFieldDescription($translatedFields);
					
		$html .= '</td></tr>';
		
		$html .= '<tr><td>'.Jtext::_('COM_FORM2CONTENT_ALT_TEXT').':</td>';
		$html .= '<td>'.$this->renderTextBox($fieldName.'_alt', $this->values['ALT'], $widthAltText, $maxLengthAltText, $this->settings->get('img_attributes_alt_text')).'</td></tr>';

		$html .= '<tr><td>'.Jtext::_('COM_FORM2CONTENT_TITLE').':</td>';
		$html .= '<td>'.$this->renderTextBox($fieldName.'_title', $this->values['TITLE'], $widthTitle, $maxLengthTitle, $this->settings->get('img_attributes_title')).'</td></tr>';

		$html .= '<tr><td valign="top">'.Jtext::_('COM_FORM2CONTENT_PREVIEW').':</td><td>';

		if($this->values['FILENAME'])
		{
			$thumbSrc = Path::Combine(self::GetThumbnailsUrl($this->projectid, $formId), $this->CreateImageName($this->values['FILENAME']));
			$html .= '<img id="'.$fieldName.'_preview" src="' . $thumbSrc . '" style="border: 1px solid #000000;">';
		}

		$html .= '</td></tr></table>';
		$html .= $this->renderHiddenField('hid'.$fieldName, $this->internal['fieldcontentid']);
		$html .= '</div>';
				
		return $html;		
	}	
	
	/**
	 * Method to convert the submitted (post) data into the internal field data structure.
	 * All children of this class must implement this function.
	 *
	 * @param	int			$formId			Id of the current form
	 * 
	 * @return  void
	 * 
	 * @since   5.5.0
	 */
	public function prepareSubmittedData($formId)
	{
		$jinput 							= JFactory::getApplication()->input;
		$upload								= $jinput->files->get($this->elementId . '_fileupload');
		$this->internal['fieldcontentid'] 	= $jinput->getInt('hid'.$this->elementId);
		$this->internal['method'] 			= 'upload';
		$this->internal['delete'] 			= $jinput->get($this->elementId . '_del');
		$this->internal['currentfilename']	= $jinput->getString($this->elementId . '_filename');
		$this->internal['imagelocation']	= ($upload['size']) ? $upload['tmp_name'] : '';
		$this->internal['thumblocation']	= '';					
		$this->values['FILENAME']			= basename($upload['name']);
		$this->values['ALT']				= $jinput->getString($this->elementId . '_alt');
		$this->values['TITLE']				= $jinput->getString($this->elementId . '_title');
		
		return $this;
	}
	
	/**
	 * Method to create an array of F2cFieldHelperContent objects to pass to the storage engine.
	 * All children of this class must implement this function.
	 *
	 * @param	int			$formId			Id of the current form
	 * 
	 * @return  array		Array of F2cFieldHelperContent objects
	 * 
	 * @since   5.5.0
	 */
	public function store($formId)
	{
		$content 				= array();
		$f2cConfig				= F2cFactory::getConfig();		
		$fieldId 				= $this->internal['fieldcontentid'];
		$srcImage 				= $this->internal['imagelocation'];
		$imageContent 			= new JRegistry();
		$saveImage				= false;
		$imagePath 				= Path::Combine(Path::Combine(self::GetImagesRootPath(), 'p'.$this->projectid), 'f'.$formId);				
		$thumbsPath				= Path::Combine($imagePath, 'thumbs');
		$maxImageWidth 			= $this->settings->get('img_max_width', 10000);
		$maxImageHeight 		= $this->settings->get('img_max_height', 10000);
		$defaultThumbnailWidth 	= $f2cConfig->get('default_thumbnail_width', F2C_DEFAULT_THUMBNAIL_WIDTH);
		$defaultThumbnailHeight = $f2cConfig->get('default_thumbnail_height', F2C_DEFAULT_THUMBNAIL_HEIGHT);
		$thumbnailWidth 		= $this->settings->get('img_thumb_width', $defaultThumbnailWidth);
		$thumbnailHeight 		= $this->settings->get('img_thumb_height', $defaultThumbnailHeight);
		$db						= JFactory::getDbo();

		if(empty($this->internal['method']))
		{
			// no image was uploaded
			$srcImage = '';
		}
		
		// Load the image field
		if($fieldId)
		{
			$query = $db->getQuery(true);
			$query->select('content')->from('#__f2c_fieldcontent')->where('id = ' . (int)$fieldId);
			$db->setQuery($query);
			$result = $db->loadResult();
			
			if($result)
			{
				$imageContent->loadString($result);
			}
		}
		
		if(empty($srcImage))
		{
			// no image was uploaded, but the alt and title tags could be modified
			if($imageContent->get('alt') != $this->values['ALT'] || 
			   $imageContent->get('title') != $this->values['TITLE'])
			{
				$saveImage = true;
			}
		}		
		
		if(($srcImage && $imageContent->get('filename')) || $this->internal['delete'])
		{
			// delete thumbnail
			$img = Path::Combine(self::GetThumbnailsPath($this->projectid, $formId), $imageContent->get('filename'));
		
			if(JFile::exists($img))
			{
				JFile::delete($img);
			}
	
			// delete image
			$img = Path::Combine(self::GetImagesPath($this->projectid, $formId), $imageContent->get('filename'));
		
			if(JFile::exists($img))
			{
				JFile::delete($img);
			}
		}
		
		// Check if the image is selected for deletion
		if($this->internal['delete'])
		{
			$content[] 	= new F2cFieldHelperContent($fieldId, '', '', 'DELETE');
			return $content;	
		}
		
		switch($this->internal['method'])
		{
			case 'upload':				
				if($this->internal['imagelocation'])
				{						
					// Store the uploaded image
					$uploadFileName 		= $this->values['FILENAME'];
					$imageFileName 			= $this->CreateImageName($uploadFileName);
					$imageFileLocation 		= Path::Combine($imagePath, $imageFileName);
					$imageFileLocationTmp 	= Path::Combine($imagePath, '~'.$imageFileName);
					$thumbnailLocation 		= Path::Combine($thumbsPath, $this->CreateImageName($uploadFileName));						

					if(!JFolder::exists($thumbsPath)) JFolder::create($thumbsPath);
					
					if(JFile::upload($this->internal['imagelocation'], $imageFileLocationTmp))
					{			
						$imageContent->set('filename', $imageFileName);
						
						// resize image
						if(!ImageHelper::ResizeImage($imageFileLocationTmp, $imageFileLocation, $maxImageWidth, $maxImageHeight, $f2cConfig->get('jpeg_quality', 75)))
						{
							throw new Exception(JText::_('COM_FORM2CONTENT_ERROR_IMAGE_RESIZE_FAILED'));
						}
						
						$imageContent->set('width', $maxImageWidth);
						$imageContent->set('height', $maxImageHeight);
												
						// create thumbnail image
						if(!ImageHelper::ResizeImage($imageFileLocationTmp, $thumbnailLocation, $thumbnailWidth, $thumbnailHeight, $f2cConfig->get('jpeg_quality', 75)))
						{
							throw new Exception(JText::_('COM_FORM2CONTENT_ERROR_IMAGE_RESIZE_FAILED'));
						}
						
						$imageContent->set('widthThumbnail', $thumbnailWidth);
						$imageContent->set('heightThumbnail', $thumbnailHeight);
						
						JFile::delete($imageFileLocationTmp);
						
						// Save the image info to the F2C table
						$saveImage = true;								
					}				
				}
				else 
				{
					// no image was uploaded, but the alt and title tags could be modified
					if($this->internal['fieldcontentid'])
					{
						// Load the image field
						$query = $db->getQuery(true);
						$query->select('content');
						$query->from('#__f2c_fieldcontent');
						$query->where('id = ' . (int)$this->internal['fieldcontentid']);
						$db->setQuery($query);
						$result = $db->loadResult();
						
						if($result)
						{
							$imageContent->loadString($result);
							
							if($imageContent->get('alt') != $this->values['ALT'])
							{
								$imageContent->set('alt', $this->values['ALT']);
								$saveImage = true;
							}

							if($imageContent->get('title') != $this->values['TITLE'])
							{
								$imageContent->set('title', $this->values['TITLE']);
								$saveImage = true;
							}
						}
					}
				}
				break;
				
			case 'copy':				
				if($this->internal['imagelocation'])
				{
					$srcImage 				= $this->internal['imagelocation'];
					$srcThumb 				= $this->internal['thumblocation'];
					$filename				= $this->values['FILENAME'];						
					$imageFileName 			= $this->CreateImageName($filename);
					$imageFileLocation 		= Path::Combine($imagePath, $imageFileName);
					$thumbnailLocation 		= Path::Combine($thumbsPath, $imageFileName);
					
					JFolder::create($thumbsPath);				
					JFile::copy($srcImage, $imageFileLocation);
					JFile::copy($srcThumb, $thumbnailLocation);
					
					list($width, $height, $type, $attr) = getimagesize($imageFileLocation);
					list($widthThumb, $heightThumb, $typeThumb, $attrThumb) = getimagesize($thumbnailLocation);
					
					$imageContent->set('filename', $filename);
					$imageContent->set('width', $width);
					$imageContent->set('height', $height);
					$imageContent->set('widthThumbnail', $widthThumb);
					$imageContent->set('heightThumbnail', $heightThumb);
				}
								
				// Save the image info to the F2C table
				$saveImage = true;													
				break;
				
			case 'remote':
				if($this->internal['imagelocation'])
				{
					$srcImage 				= $this->internal['imagelocation'];
					$srcThumb 				= $this->internal['thumblocation'];
					$filename				= $this->values['FILENAME'];						
					$imageFileName 			= $this->CreateImageName($filename);
					$imageFileLocation 		= Path::Combine($imagePath, $imageFileName);
					$thumbnailLocation 		= Path::Combine($thumbsPath, $imageFileName);
					$tmpImage				= Path::Combine($imagePath, '~'.$imageFileName);
					$tmpThumb				= Path::Combine($thumbsPath, '~'.$imageFileName);;
					
					JFolder::create($thumbsPath);

					if(!$this->downloadFile($srcImage, $tmpImage))
					{
						echo 'Download failed for: ' . $srcImage . ' form id: ' . $formId . '<br/>';
						return $content;
					}
										
					if($srcThumb)
					{
						$this->downloadFile($srcThumb, $tmpThumb);
					}
					
					// resize image
					if(!ImageHelper::ResizeImage($tmpImage, $imageFileLocation, $maxImageWidth, $maxImageHeight, $f2cConfig->get('jpeg_quality', 75)))
					{
						throw new Exception(JText::_('COM_FORM2CONTENT_ERROR_IMAGE_RESIZE_FAILED'));
					}
					
					// Check if we need to generate a thumbnail image
					if($srcThumb)
					{
						// copy the thumbnail image
						JFile::copy($tmpThumb, $thumbnailLocation);
						// determine the size
						list($thumbnailWidth, $thumbnailHeight, $typeThumb, $attrThumb) = getimagesize($thumbnailLocation);
					}
					else 
					{
						// create thumbnail image
						if(!ImageHelper::ResizeImage($tmpImage, $thumbnailLocation, $thumbnailWidth, $thumbnailHeight, $f2cConfig->get('jpeg_quality', 75)))
						{
							throw new Exception(JText::_('COM_FORM2CONTENT_ERROR_IMAGE_RESIZE_FAILED'));
						}
					}
					
					$imageContent->set('filename', $this->id . '.' . JFile::getExt($tmpImage));
					$imageContent->set('width', $maxImageWidth);
					$imageContent->set('height', $maxImageHeight);
					$imageContent->set('widthThumbnail', $thumbnailWidth);
					$imageContent->set('heightThumbnail', $thumbnailHeight);
					
					JFile::delete($tmpImage);
					
					if($srcThumb)
					{
						JFile::delete($tmpThumb);
					}
				}
								
				// Save the image info to the F2C table
				$saveImage = true;													
				break;
		}

		$imageContent->set('alt', $this->values['ALT']);
		$imageContent->set('title', $this->values['TITLE']);
		
		if($saveImage)								
		{
			$value 		= $imageContent->toString();
			$action 	= ($value) ? (($fieldId) ? 'UPDATE' : 'INSERT') : (($fieldId) ? 'DELETE' : '');				
			$content[] 	= new F2cFieldHelperContent($fieldId, 'VALUE', $value, $action);
		}

		return $content;	
		
	}
	
	/**
	 * Method to get the unique prefix for the current field.
	 * All children of this class must implement this function.
	 *
	 * @return  string	The Prefix for the field
	 * 
	 * @since   5.5.0
	 */
	public function getPrefix()
	{
		return 'img';
	}
	
	public function reset()
	{
		$this->values['FILENAME'] 			= '';
		$this->values['ALT'] 				= '';
		$this->values['TITLE'] 				= '';
		$this->values['WIDTH'] 				= null;
		$this->values['HEIGHT'] 			= null;
		$this->values['WIDTH_THUMBNAIL'] 	= null;
		$this->values['HEIGHT_THUMBNAIL'] 	= null;
		$this->internal['method'] 			= '';
		$this->internal['delete'] 			= '';
		$this->internal['currentfilename']	= '';
		$this->internal['imagelocation']	= '';
		$this->internal['thumblocation']	= '';
		$this->internal['fieldcontentid']	= null;
	}
	
	/**
	 * Method to add field specific template parameters.
	 * All children of this class must implement this function.
	 *
	 * @param	object		$smarty		Template engine object
	 * @param	JForm		$form		Form object
	 * 
	 * @return  void
	 * 
	 * @since   5.5.0
	 */
	public function addTemplateVar($templateEngine, $form)
	{
		if($this->values['FILENAME'])
		{
			if($this->settings->get('img_output_mode') == 0)
			{				
				$templateEngine->addVar($this->fieldname, self::GetImagesUrl($this->projectid, $form->id) . $this->values['FILENAME']);						
			}
			else
			{
				$tagWidth = ($this->values['WIDTH'] > 0) ? ' width="'.$this->values['WIDTH'].'"' : '';
				$tagHeight = ($this->values['HEIGHT'] > 0) ? ' height="'.$this->values['HEIGHT'].'"' : '';
				$templateEngine->addVar($this->fieldname, '<img src="' . self::GetImagesUrl($this->projectid, $form->id) . $this->values['FILENAME'] . '" alt="' . $this->values['ALT'] . '" title="' . $this->values['TITLE'] . '"' . $tagWidth . $tagHeight . '/>');
			}

			// add image urls
			$templateEngine->addVar($this->fieldname.'_PATH_ABSOLUTE', Path::Combine(self::GetImagesPath($this->projectid, $form->id, false), $this->values['FILENAME']));
			$templateEngine->addVar($this->fieldname.'_PATH_RELATIVE', Path::Combine(self::GetImagesPath($this->projectid, $form->id, true), $this->values['FILENAME']));
			
			// add thumbnail urls
			$templateEngine->addVar($this->fieldname.'_THUMB_URL_ABSOLUTE', Path::Combine(self::GetThumbnailsUrl($this->projectid, $form->id), $this->values['FILENAME']));
			$templateEngine->addVar($this->fieldname.'_THUMB_URL_RELATIVE', Path::Combine(self::GetThumbnailsUrl($this->projectid, $form->id, true), $this->values['FILENAME']));			
		}
		else
		{
			// no image was specified
			$templateEngine->addVar($this->fieldname, '');
			$templateEngine->addVar($this->fieldname.'_PATH_ABSOLUTE', '');
			$templateEngine->addVar($this->fieldname.'_PATH_RELATIVE', '');
			$templateEngine->addVar($this->fieldname.'_THUMB_URL_ABSOLUTE', '');
			$templateEngine->addVar($this->fieldname.'_THUMB_URL_RELATIVE', '');
		}

		$templateEngine->addVar($this->fieldname.'_ALT', $this->stringHTMLSafe($this->values['ALT']));					
		$templateEngine->addVar($this->fieldname.'_TITLE', $this->stringHTMLSafe($this->values['TITLE']));					
	}
	
	public function getTemplateParameterNames()
	{
		$names = array(	strtoupper($this->fieldname).'_ALT',
						strtoupper($this->fieldname).'_TITLE',
						strtoupper($this->fieldname).'_PATH_ABSOLUTE',
						strtoupper($this->fieldname).'_PATH_RELATIVE',
						strtoupper($this->fieldname).'_THUMB_URL_ABSOLUTE',
						strtoupper($this->fieldname).'_THUMB_URL_RELATIVE');
		
		return array_merge($names, parent::getTemplateParameterNames());
	}
	
	/**
	 * Method to fill the field data structure from an external data structure. 
	 * (called from createFormDataObjects)
	 * All children of this class must implement this function.
	 *
	 * @param	object		$data	Data structure containing the form data
	 * 
	 * @return  void
	 * 
	 * @since   5.5.0
	 */
	public function setData($data)
	{
		$this->internal['fieldcontentid']	= $data->fieldcontentid;
		$values 							= new JRegistry($data->content);
		$this->values['FILENAME'] 			= $values->get('filename');
		$this->values['ALT'] 				= $values->get('alt');
		$this->values['TITLE'] 				= $values->get('title');					
		$this->values['WIDTH'] 				= ($values->get('width') != -1) ? $values->get('width') : null;
		$this->values['HEIGHT'] 			= ($values->get('height') != -1) ? $values->get('height') : null;
		$this->values['WIDTH_THUMBNAIL'] 	= ($values->get('widthThumbnail') != -1) ? $values->get('widthThumbnail') : null;
		$this->values['HEIGHT_THUMBNAIL'] 	= ($values->get('heightThumbnail') != -1) ? $values->get('heightThumbnail') : null;						
		$this->internal['method'] 			= '';
		$this->internal['delete'] 			= '';
		$this->internal['currentfilename']	= $values->get('filename');
		
		if($values->get('filename'))
		{
			$this->internal['imagelocation'] = Path::Combine(self::GetImagesPath($data->projectid, $data->formid, false), $values->get('filename'));
			$this->internal['thumblocation'] = Path::Combine(self::GetThumbnailsPath($data->projectid, $data->formid), $values->get('filename'));
		}
	}
	
	public function validate()
	{
		$uploadfile = JFactory::getApplication()->input->files->get('t'.$this->id.'_fileupload');
		
		if(array_key_exists('size', $uploadfile) && $uploadfile['size'])
		{
			$maxImageUploadSize = (int)$this->f2cConfig->get('max_image_upload_size');
		
			if($maxImageUploadSize != 0 && (int)($uploadfile['size']/1024) > $maxImageUploadSize)
			{
				throw new Exception(JText::_('COM_FORM2CONTENT_ERROR_IMAGE_UPLOAD_MAX_SIZE_F2C_CONFIG'));
			}			
		}
		else if(array_key_exists('error', $uploadfile) && $uploadfile['error'] == 1)
		{
			throw new Exception(JText::_('COM_FORM2CONTENT_ERROR_IMAGE_UPLOAD_MAX_SIZE'));
		}
	}
		
	public function copy($formId)
	{
		$filename							= '';
		$this->internal['fieldcontentid'] 	= null;
		$this->internal['method'] 			= 'copy';
		
		if(empty($this->values['FILENAME']))
		{
			$this->values['FILENAME'] = $this->internal['currentfilename'];
		}

		$this->internal['imagelocation'] = $this->values['FILENAME'] ? Path::Combine(self::GetImagesPath($this->projectid, $formId), $this->values['FILENAME']) : '';
		$this->internal['thumblocation'] = $this->values['FILENAME'] ? Path::Combine(self::GetThumbnailsPath($this->projectid, $formId), $this->values['FILENAME']) : '';
	}
	
	public function deleteContentType()
	{
		// remove the base image dir
		$baseDir = Path::Combine(self::GetImagesRootPath(), 'p'.$this->projectid);
		
		if(JFolder::exists($baseDir))
		{
			JFolder::delete($baseDir);
		}
	}
	
	public function deleteArticle($formId)
	{
		Path::Remove((Path::Combine(self::GetImagesRootPath(), 'p'.$this->projectid.'/f'.$formId)));
	}
	
	public static function GetImagesUrl($projectId, $formId, $relative = false, $fullRelative = false)
	{
		$imagesPath = F2cFactory::getConfig()->get('images_path');
		
		if($relative)
		{
			if($fullRelative)
			{
				return $imagesPath.'/p'.$projectId.'/f'.$formId.'/';
			}
			else 
			{
				return self::convertToRelativePath($imagesPath)."/p$projectId/f$formId/";
			}
		}
		else
		{
			return F2cUri::GetClientRoot().$imagesPath."/p$projectId/f$formId/";			
		}
	}
	
	public static function GetThumbnailsUrl($projectId, $formId, $relative = false, $fullRelative = false)
	{
		return Path::Combine(self::GetImagesUrl($projectId, $formId, $relative, $fullRelative), 'thumbs');	
	}

	public static function GetImagesRootPath($relative = false, $fullRelative = false)
	{
		$imagesPath = F2cFactory::getConfig()->get('images_path');
		
		if($relative)
		{
			if($fullRelative)
			{
				return $imagesPath.'/p'.$projectId.'/f'.$formId.'/';
			}
			else 
			{
				return self::convertToRelativePath($imagesPath).'/';
			}
		}
		else
		{
			return JPATH_SITE.DIRECTORY_SEPARATOR.$imagesPath.'/';
		}				
	}
	
	public static function GetImagesPath($projectId, $formId, $relative = false)
	{
		return Path::Combine(self::GetImagesRootPath($relative), 'p'.$projectId.'/'.'f'.$formId);
	}

	public static function GetThumbnailsPath($projectId, $formId, $relative = false)
	{
		return Path::Combine(self::GetImagesPath($projectId, $formId, $relative), 'thumbs');	
	}
	
	/* For backward compatibility purposes the path is relative to images/stories when the image path is images/stories/xxxxxxxxxxx.
	 * In all other cases the relative path is relative to the website root
	 */		
	private static function convertToRelativePath($path)
	{
		$search = 'images/stories/';

		if(stripos($path, $search) === 0)
		{
			return substr($path, strlen($search));
		}
		else
		{
			return $path;
		}
	}
	
	private function CreateImageName($uploadFilename)
	{
		if(!$uploadFilename)
		{
			return '';
		}	
		
		return $this->id . '.' . JFile::getExt($uploadFilename);
	}
}
