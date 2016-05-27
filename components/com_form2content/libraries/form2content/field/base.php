<?php
defined('JPATH_PLATFORM') or die('Restricted acccess');

/**
 * Custom field base class
 * 
 * This class supports functionality for custom fields e.g. for rendering and storing them.
 * All custom fields must implement this class.
 * 
 * @package     Joomla.Site
 * @subpackage  com_form2content
 * @since       5.5.0
 */
abstract class F2cFieldBase
{
	/**
	 * The Id identifying the field.
	 *
	 * @var    int
	 * @since  5.5.0
	 */
	public $id;
	
	/**
	 * The name of the field.
	 *
	 * @var    string
	 * @since  5.5.0
	 */
	public $fieldname;
	
	/**
	 * The title of the field.
	 *
	 * @var    string
	 * @since  5.5.0
	 */
	public $title;
	
	/**
	 * The type id of the field.
	 *
	 * @var    int
	 * @since  5.5.0
	 */
	public $fieldtypeid;
	
	/**
	 * Object with field settings
	 *
	 * @var    JRegistry
	 * @since  5.5.0
	 */
	public $settings;
	
	
	/**
	 * The description of the field.
	 *
	 * @var    string
	 * @since  5.5.0
	 */
	public $description;
	
	/**
	 * The Id of the Content Type the field belongs to.
	 *
	 * @var    int
	 * @since  5.5.0
	 */
	public $projectid;
	
	/**
	 * The ordering of the field.
	 *
	 * @var    int
	 * @since  5.5.0
	 */
	public $ordering;
	
	/**
	 * Flag to indicate if the field is shown in the front-end Article Manager.
	 *
	 * @var    boolean
	 * @since  5.5.0
	 */
	public $frontvisible;
	
	/**
	 * Array of key-value pairs containing the field data
	 *
	 * @var    array
	 * @since  5.5.0
	 */
	public $values = array();
	
	/**
	 * Array of key-value pairs containing data internal to the field
	 *
	 * @var    array
	 * @since  5.5.0
	 */
	public $internal = array();
	
	/**
	 * Form2Content configuration settings object
	 *
	 * @var    F2cConfig
	 * @since  5.5.0
	 */
	public $f2cConfig;
	
	/**
	 * Base Id of the element as used in the HTML
	 *
	 * @var    string
	 * @since  5.5.0
	 */
	public $elementId;
	
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
	abstract protected function render($translatedFields, $contentTypeSettings, $parms = array(), $form, $formId);
	
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
	abstract protected function prepareSubmittedData($formId);
	
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
	abstract protected function store($formId);
	
	/**
	 * Method to validate the field data. Throws an Exception when validation fails.
	 * All children of this class must implement this function.
	 *
	 * @return  void
	 * 
	 * @since   5.5.0
	 */
	abstract protected function validate();
	
	/**
	 * Method to get the unique prefix for the current field.
	 * All children of this class must implement this function.
	 *
	 * @return  string	The Prefix for the field
	 * 
	 * @since   5.5.0
	 */
	abstract protected function getPrefix();
		
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
	abstract public function addTemplateVar($smarty, $form);
	
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
	abstract public function setData($data);
	
	/**
	 * Constructor. This method will initialize the basic field parameters
	 *
	 * @param	object		$field		Field object as created from the database information
	 * 
	 * @return  void
	 * 
	 * @since   5.5.0
	 */
	function __construct($field)
	{
		$this->id 			= $field->id;
		$this->fieldname 	= $field->fieldname;
		$this->title 		= $field->title;
		$this->fieldtypeid 	= $field->fieldtypeid;
		$this->settings 	= $field->settings;
		$this->description 	= $field->description;
		$this->projectid	= $field->projectid;
		$this->ordering 	= $field->ordering;
		$this->frontvisible = $field->frontvisible;				
		$this->elementId	= 't'.$this->id;
		$this->f2cConfig	= F2cFactory::getConfig();
	}
	
	/**
	 * Method to render a HTML hidden input field
	 *
	 * @param	string		$name		Name of the field
	 * @param	string		$value		Value of the field (optional)
	 * 
	 * @return  string		HTML containing the hidden field
	 * 
	 * @since   5.5.0
	 */
	protected function renderHiddenField($name, $value = '')
	{
		return '<input type="hidden" name="'.$name.'" id="'.$name.'" value="'.$this->stringHTMLSafe($value).'">';
	}
	
	/**
	 * Method to render a HTML text input field
	 *
	 * @param	string		$name		Name of the field
	 * @param	string		$value		Value of the field (optional)
	 * @param	string		$size		Size of the field (optional)
	 * @param	string		$maxlength	Maximum input length of the field (optional)
	 * @param	string		$tags		Extra tags, e.g. for styling (optional)
	 * @param	string		$type		The input type for HMTL5 fields (optional)
	 * 
	 * @return  string		HTML containing the text field
	 * 
	 * @since   5.5.0
	 */
	protected function renderTextBox($name, $value = '', $size = '', $maxlength = '', $tags = '', $type = 'text')
	{
		$html 	= '';
		$class 	= ($tags) ? '' : 'class="inputbox"';
		
		$html .= '<input type="'.$type.'" '.$class.' name="'.$name.'" id="'.$name.'"';
		$html .= ($value != '') ? ' value= "' . $this->stringHTMLSafe($value) . '"' : '';
		$html .= $size ? ' size= "' . $size . '"' : '';
		$html .= $maxlength ? ' maxlength= "' . $maxlength . '"' : '';
		$html .= $tags . '/>';
		
		return $html;
	}
	
	/**
	 * Method to retrieve the (possibly translated) field label
	 *
	 * @param	array		$translatedFields	Array with translated data
	 * 
	 * @return  string		The label for the field
	 * 
	 * @since   5.5.0
	 */
	public function renderLabel($translatedFields)
	{
		$label 		= '';
		$translate 	= $this->f2cConfig->get('custom_translations', false);
		
		if($translate)
		{
			$text 	= JText::_($this->title);
			$desc	= $this->description ? JText::_($this->description) : $text;
		}
		else 
		{
			$text 	= (array_key_exists($this->id, $translatedFields)) ? $translatedFields[$this->id]->title_translation : $this->title;
			$desc	= $this->description ? $this->description : $text;
		}
		
		if(JFactory::getApplication()->isAdmin())
		{
			$displayData = array(
					'text'        => $text,
					'description' => $desc,
					'for'         => $this->id,
					'required'    => (bool)$this->settings->get('requiredfield'),
					'classes'     => array(),
					'position'    => ''
				);
				
			$label = JLayoutHelper::render('joomla.form.renderlabel', $displayData);
		}
		else 
		{
			$label = '<label for="t'.$this->id.'">'.$text.'</label>';
		}		
		
		return $label; 
	}
	
	/**
	 * Method to retrieve the (possibly translated) field description for display in the front-end
	 *
	 * @param	array		$translatedFields	Array with translated data
	 * 
	 * @return  string		The description of the field
	 * 
	 * @since   5.5.0
	 */
	protected function getFieldDescription($translatedFields)
	{
		$translate 	= $this->f2cConfig->get('custom_translations', false);
		$label 		= $this->title;
		$desc 		= $this->description;
		
		if($translate)
		{
			$label = JText::_($label);
			$desc = JText::_($desc);
		}
		else 
		{
			if(array_key_exists($this->id, $translatedFields))
			{
				$label 	= $translatedFields[$this->id]->title_translation;
				$desc 	= $translatedFields[$this->id]->description_translation;
			}
		}
		
		if($desc)
		{
			$desc = '&nbsp;' . JHTML::tooltip($desc, $label);				
		}
		
		return $desc;		
	}
	
	/**
	 * Method to detect if a string contains UTF-8 characters
	 *
	 * @param	string		$string		String to be inspected
	 * 
	 * @return  boolean		True when string contains UTF-8 characters
	 * 
	 * @since   5.5.0
	 */
	protected function detectUTF8($string)
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

	/**
	 * Method to generate a HTML safe string
	 *
	 * @param	string		$string		String to be parsed
	 * 
	 * @return  string		HTML safe string
	 * 
	 * @since   5.5.0
	 */
	protected function stringHTMLSafe($string)
	{
		if($this->detectUTF8($string))
		{
			$safeString = htmlentities($string, ENT_COMPAT, 'UTF-8');
		}
		else
		{
			$safeString = htmlentities($string, ENT_COMPAT);
		}
		
		return $safeString;
	}
	
	/**
	 * Method to download a file from an URL to a file on the filesystem
	 *
	 * @param	string		$srcUrl		URL of the file to be downloaded
	 * @param	string		$dstFile	Filename of the destination file
	 * 
	 * @return  boolean		True when download completed successfully
	 * 
	 * @since   5.5.0
	 */
	protected function downloadFile($srcUrl, $dstFile)
	{	
		global $php_errormsg;
		
		// Capture PHP errors
		$track_errors = ini_get('track_errors');
		ini_set('track_errors', true);

		// Open the remote server socket for reading
		$srcUrl 		= str_ireplace(' ', '%20', $srcUrl);
		$inputHandle 	= fopen($srcUrl, "r");
		$error 			= $php_errormsg;
		
		if (!$inputHandle)
		{
			JFactory::getApplication()->enqueueMessage(JFactory::getDate()->format('c') . ';' . $error);
			return false;
		}

		// Initialise contents buffer
		$contents = null;

		while (!feof($inputHandle))
		{
			$contents 	.= fread($inputHandle, 4096);
			$error 		= $php_errormsg;
						
			if ($contents == false)
			{
				JFactory::getApplication()->enqueueMessage(JFactory::getDate()->format('c') . ';' . $error);
				return false;
			}
		}

		// Write buffer to file
		JFile::write($dstFile, $contents);

		// Close file pointer resource
		fclose($inputHandle);

		// restore error tracking to what it was before
		ini_set('track_errors',$track_errors);
		
		return true;
	}
	
	/**
	 * Method to ensure unique filename for a given file.
	 * Check if the file in a given directory exists
	 * If it does not exist, return the filename, if it does exist create a new (non-existing) filename
	 * Create new filenames based on suffix with - followed by a number
	 *
	 * @param	string		$path		Path to the file
	 * @param	string		$filename	Current filename
	 * 
	 * @return  string	Unique filename
	 * 
	 * @since   5.5.0
	 */
	protected function createUniqueFilename($path, $filename)
	{
		if(!JFile::exists(Path::Combine($path, $filename)))
		{
			// filename does not exist yet
			return $filename;
		}
		
		// create a new unique filename
		$suffix				= 1;
		$extension 			= JFile::getExt($filename);
		// filename without extension
		$baseFilename 		= substr($filename, 0, strlen($filename) - strlen($extension) - 1);
		$arrBaseFilename 	= explode('-', $baseFilename);
			
		// Detect if filename ends on -xxx where xxx is a number greater than 0
		if(count($arrBaseFilename) > 1)
		{
			$tmpSuffix = $arrBaseFilename[count($arrBaseFilename)-1];

			if((int)$tmpSuffix == $tmpSuffix && $tmpSuffix > 0)
			{
				$suffix 		= $tmpSuffix;
				$baseFilename	= substr($baseFilename, 0, strlen($baseFilename) - strlen($tmpSuffix) - 1);
			}
		}
			
		// Try to create a new unique filename by increasing the number in the prefix
		while(true)
		{
			$tmpFilename = $baseFilename.'-'.$suffix.'.'.$extension;
			
			if(!JFile::exists(Path::Combine($path, $tmpFilename)))
			{
				return $tmpFilename;
			}
			
			$suffix++;
		}
	}
	
	/**
	 * Method to generate client-side script (javascript / css) to initialize the field
	 *
	 * @return  string	Generated script	
	 * 
	 * @since   5.5.0
	 */
	public function getClientSideInitializationScript()
	{
		return '';
	}
	
	public function getClientSideValidationScript(&$validationCounter)
	{
		$script = '';
		return $script;
	}	
	
	/**
	 * Method to prepare the field's data structure for a copy operation
	 *
	 * @param   int		$formId	Id of the form to be copied	
	 * 
	 * @return  void	
	 * 
	 * @since   5.5.0
	 */
	public function copy($formId)
	{
		$this->internal['fieldcontentid'] = null;
	}
	
	/**
	 * Method to get the CSS class for the field
	 *
	 * @return  string	CSS class name	
	 * 
	 * @since   5.5.0
	 */
	public function getCssClass()
	{
		return '';
	}
	
	/**
	 * Helper method to get the contents of a file.
	 *
	 * @param   string	$filename	Full path to the file	
	 * 
	 * @return  string	Contents of the file	
	 * 
	 * @since   5.5.0
	 */
	protected function getFileContents($filename)
	{
      	$contents = '';

      	if(JFile::exists($filename))
      	{
      		$contents = file_get_contents($filename);
      	}
		
      	return $contents;
	}
	
	/**
	 * Method to generate an array of all possible template parameter names for this field.
	 *
	 * @return  array	Array of template parameter names
	 * 
	 * @since   5.5.0
	 */
	public function getTemplateParameterNames()
	{
		return array(strtoupper($this->fieldname));
	}
	
	/**
	 * Method to modify the form object definition before it is rendered.
	 *
	 * @param   JForm	$form	The form definition object
	 * 
	 * @return  void
	 * 
	 * @since   5.5.0
	 */
	public function preprocessForm(JForm $form)
	{
	}
	
	/**
	 * Method to abort the current action.
	 * 
	 * @return  void
	 * 
	 * @since   5.5.0
	 */
	public function cancel()
	{
	}	

	/**
	 * Method to reset the field data to its initial values.
	 *
	 * @return  void
	 * 
	 * @since   5.5.0
	 */
	public function reset()
	{
		$this->values['VALUE']				= '';
		$this->internal['fieldcontentid']	= null;
	}
	
	/**
	 * Method is called when the ContentType this field belongs to is being deleted.
	 * This method can be used to clean-up directories for example
	 *
	 * @return  void
	 * 
	 * @since   5.5.0
	 */
	public function deleteContentType()
	{
	}
	
	/**
	 * Method is called when the Article this field belongs to is being deleted.
	 * This method can be used to clean-up directories for example
	 * 
	 * @param   int		$formId	Id of the Form that will be deleted
	 * 
	 * @return  void
	 *
	 * @since   5.5.0
	 */
	public function deleteArticle($formId)
	{
	}
	
	/**
	 * Renders an upload control, consisting of a button and an upload element.
	 * The upload element is hidden and the button is used to trigger the control.
	 * This set-up is used because the button of the upload element itself can't be styled.
	 * 
	 * @param   int		Id of the field for which the control will be created.
	 * @param	string	Javascript that will be executed in the onchange handler of the control
	 * 
	 * @return  string
	 *
	 * @since   5.5.0
	 */
	protected function renderUploadControl($id, $onchange)
	{
		$html = '<button type=\"button\" class=\"btn f2c_select_file\">'.Jtext::_('COM_FORM2CONTENT_BROWSE').'...</button>';
		$html .= '<input type=\"file\" id=\"'.$id.'_fileupload\" name=\"'.$id.'_fileupload\" class=\"inputbox f2c_upload_control\" style=\"display: none;\" onchange=\"'.$onchange.'\">';
		
		return $html;
	}
	
	protected function renderRequiredText($contentTypeSettings)
	{
		return '';
	}
}
?>