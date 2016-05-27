<?php
defined('_JEXEC') or die('Restricted acccess');

require_once(JPATH_ADMINISTRATOR.'/components/com_form2content/models/project.php');
require_once(JPATH_ADMINISTRATOR.'/components/com_form2content/models/projectfield.php');
require_once(JPATH_ADMINISTRATOR.'/components/com_form2content/models/form.php');

class F2cSampleDataHelper
{
	public function install()
	{
		$contentTypeModel 	= new Form2ContentModelProject();
		
		$contentTypeModel->import(JPATH_ADMINISTRATOR.'/components/com_form2content/sample_data/contenttype_blog_articles.xml');
		
		$this->createSampleForms($contentTypeModel->getState('project.id'));
	}
	
	private function createSampleForms($contentTypeId)
	{
		$user			= JFactory::getUser();
		$form 			= new Form2ContentModelForm();
		$contentType	= F2cFactory::getContentType($contentTypeId);
		
		$rules = array();
		$rules['core.delete'] = array();
		$rules['core.edit'] = array();
		$rules['core.edit.state'] = array();
		
		$metadata = array();
		$metadata['robots'] = '';
		$metadata['author'] = '';
		$metadata['rights'] = '';
		$metadata['xreference'] = '';
		
		$attribs = array();
		$attribs['show_title']= '';
		$attribs['link_titles']= ''; 
		$attribs['show_intro']= '0'; 
		$attribs['show_category']= ''; 
		$attribs['link_category']= ''; 
		$attribs['show_parent_category']= ''; 
		$attribs['link_parent_category']= '';
		$attribs['show_author']= ''; 
		$attribs['link_author']= ''; 
		$attribs['show_create_date']= ''; 
		$attribs['show_modify_date']= ''; 
		$attribs['show_publish_date']= ''; 
		$attribs['show_item_navigation']= ''; 
		$attribs['show_icons']= ''; 
		$attribs['show_print_icon']= ''; 
		$attribs['show_email_icon']= ''; 
		$attribs['show_vote']= ''; 
		$attribs['show_hits']= ''; 
		$attribs['show_noauth']= ''; 
		$attribs['alternative_readmore']= ''; 
		$attribs['article_layout']= '';
		$attribs['info_block_position'] = '0';
		
		$extended = array();
		$extended['tags'] = '';
		
		// Sample form #1
		$data = array();
		$data['id'] = 0;
		$data['projectid'] = $contentTypeId;
		$data['title'] = 'Getting started with Form2Content Lite';
		$data['alias'] = '';
		$data['intro_template'] = 'blog_intro_template.tpl';
		$data['main_template'] = 'blog_main_template.tpl';
		$data['state'] = 0;
		$data['catid'] = self::getDefaultCategory();
		$data['created'] = '';
		$data['created_by'] = $user->id;
		$data['created_by_alias'] = '';
		$data['modified'] = '';
		$data['publish_up'] = '';
		$data['publish_down'] = '';
		$data['metakey'] = '';
		$data['metadesc'] = '';
		$data['access'] = 1;
		$data['language'] = '*';
		$data['featured'] = 0;
		$data['rules'] = $rules;
		$data['attribs'] = $attribs;
		$data['metadata'] = $metadata;
		$data['extended'] = $extended;
		$data['saveFormOnly'] = true;
		
		foreach($contentType->fields as $field)
		{
			$field->internal['fieldcontentid'] = null;
			
			switch($field->fieldname)
			{
				case 'intro':
					$field->values['VALUE'] = 'Thank you for downloading and installing Form2Content LITE. In this demo content and article we hope to help you get started using our Joomla Content Construction Kit.';
					break;
				case 'image';
					$field->internal['method'] 			= 'copy';
					$field->internal['delete'] 			= null;
					$field->internal['currentfilename']	= null;
					$field->internal['imagelocation']	= JPATH_ADMINISTRATOR.'/components/com_form2content/sample_data/osd_logo.png';
					$field->internal['thumblocation']	= JPATH_ADMINISTRATOR.'/components/com_form2content/sample_data/osd_logo_thumb.png';					
					$field->values['FILENAME']			= $field->id.'.png';
					$field->values['ALT']				= 'Open Source Design';
					$field->values['TITLE']				= 'F2C is developed by Open Source Design';	
					$field->values['WIDTH']				= 700;
					$field->values['HEIGHT']			= 360;
					$field->values['WIDTH_THUMBNAIL']	= 150;
					$field->values['HEIGHT_THUMBNAIL']	= 78;
					break;
				case 'article';
					$field->values['VALUE'] = '<p><strong>Getting started with Form2Content!</strong></p>
<p>In the below steps we will show you how to create your own Joomla articles via Form2Content.<br /><a href="http://documentation.form2content.com/f2c-getting-started/32-getting-started-f2c-step-by-step">http://documentation.form2content.com/f2c-getting-started/32-getting-started-f2c-step-by-step</a></p>
<h2>What type of articles do you want to create?</h2>
<p>The installed demo <em>content type</em> is an example of a blog. Each time a F2C form is filled out a Joomla article is created. In the content type manager you define permissions, in which category the Joomla article is saved and article settings like show/hide title, intro etc.</p>
<p><a href="http://documentation.form2content.com/f2c-content-types">http://documentation.form2content.com/f2c-content-types</a></p>
<h2>Define the fields to collect the article data</h2>
<p>In the F2C Content Type manager you will find the link to the F2C <em>Fields Manager</em> (cog icon in the second column). In the field manager you define the data you want to collect via a range of different fields. In our <em>blog example</em> we have used single-select list, multiline text field, an editor, image upload etc.</p>
<p><a href="http://documentation.form2content.com/f2c-field-types">http://documentation.form2content.com/f2c-field-types</a></p>
<h2>Define the article template (layout with placeholders)</h2>
<p>Now that we can collect the article data we need to create a template to display this data within the Joomla article. Each created article will look teh same since we use the same layout (template).</p>
<p><strong>The Form2Content rule:</strong> Form fields data + template layout = Joomla article html</p>
<p>Please see our other example article about where the F2C article templates are located and how the placeholders for the data work.</p>
<p><a href="http://documentation.form2content.com/f2c-templating">http://documentation.form2content.com/f2c-templating</a></p>
<h2>When all works in the back-end, create a menu link to the front-end</h2>
<p>When you can create Joomla article via Form2Content in the back-end you can add the front-end access and let your website users add Joomla articles with great ease ... and they all look the same!</p>
<p><a href="http://documentation.form2content.com/f2c-front-end">http://documentation.form2content.com/f2c-front-end</a></p>';
				break;
				case 'source';
					$field->values['URL'] = 'http://documentation.form2content.com/';
					$field->values['DISPLAY_AS'] = 'Form2Content Documentation';			
					$field->values['TITLE'] = 'Form2Content Documentation';
					$field->values['TARGET'] = '_blank';
					break;
				case 'author';
					$field->values['VALUE'] = 'custom';
					break;
				case 'info_article';
					break;
				case 'author_name';
					$field->values['VALUE'] = 'Patrick Faasse, Julien Brouns - creators of Form2Content Joomla CCK';
					break;
			}
		}
		
		$data['preparedFieldData'] = $contentType->fields;
		
		$form->save($data);
		
		// Sample form #2
		$form = new Form2ContentModelForm();		
		$data = array();
		$data['id'] = 0;
		$data['projectid'] = $contentTypeId;
		$data['title'] = 'Article templates, the true strength of Form2Content';
		$data['alias'] = '';
		$data['intro_template'] = 'blog_intro_template.tpl';
		$data['main_template'] = 'blog_main_template.tpl';
		$data['state'] = 0;
		$data['catid'] = self::getDefaultCategory();
		$data['created'] = '';
		$data['created_by'] = $user->id;
		$data['created_by_alias'] = '';
		$data['modified'] = '';
		$data['publish_up'] = '';
		$data['publish_down'] = '';
		$data['metakey'] = '';
		$data['metadesc'] = '';
		$data['access'] = 1;
		$data['language'] = '*';
		$data['featured'] = 0;
		$data['rules'] = $rules;
		$data['attribs'] = $attribs;
		$data['metadata'] = $metadata;
		$data['extended'] = $extended;
		$data['saveFormOnly'] = true;
		
		foreach($contentType->fields as $field)
		{
			$field->internal['fieldcontentid'] = null;
			
			switch($field->fieldname)
			{
				case 'intro':
					$field->values['VALUE'] = 'With a content construction kit there is always a small learning curve. Hopefully our BLOG demo will help you understand the relation between the Form2Contnet submission form (data) and the creation of your Joomla article quickly.';
					break;
				case 'image';
					$field->internal['method'] 			= 'copy';
					$field->internal['delete'] 			= null;
					$field->internal['currentfilename']	= null;
					$field->internal['imagelocation']	= JPATH_ADMINISTRATOR.'/components/com_form2content/sample_data/osd_logo.png';
					$field->internal['thumblocation']	= JPATH_ADMINISTRATOR.'/components/com_form2content/sample_data/osd_logo_thumb.png';					
					$field->values['FILENAME']			= $field->id.'.png';
					$field->values['ALT']				= 'Open Source Design';
					$field->values['TITLE']				= 'F2C is developed by Open Source Design';	
					$field->values['WIDTH']				= 700;
					$field->values['HEIGHT']			= 360;
					$field->values['WIDTH_THUMBNAIL']	= 150;
					$field->values['HEIGHT_THUMBNAIL']	= 78;
					break;
				case 'article';
					$field->values['VALUE'] = '<p>In the Joomla back-end under components you can find the link to Form2Content. One of the links is to the Form2Content Template manager.</p>
<p>The F2C article templates are used to render the form data into the layout of your Joomla article. Probably the easiest way to understand this is to have a look at the two files we have included to generate the BLOG demo articles.<br />The two files can be seen in the F2C Template Manager or via FTP:</p>
<p>&lt; root &gt;/media/com_form2content/templates</p>
<p>blog_intro_template.tpl<br />blog_main_template.tpl</p>
<p><strong>Use of Smarty Templating and Template parameters (placeholders)</strong></p>
<p>In the two F2C article templates included we have added extra documentation to show what you can do with them. This will hopefully get you to grips with the syntax quickly!</p>
<p><a href="http://documentation.form2content.com/f2c-templating" target="_blank">PLEASE read all the documentation on Form2Content templating here!</a></p>
<p> </p>
<p> </p>';
				break;
				case 'source';
					$field->values['URL'] = 'http://documentation.form2content.com/f2c-templating';
					$field->values['DISPLAY_AS'] = 'F2C Documentatation on article templates';			
					$field->values['TITLE'] = 'F2C Documentatation';
					$field->values['TARGET'] = '_blank';
					break;
				case 'author';
					$field->values['VALUE'] = 'custom';
					break;
				case 'info_article';
					break;
				case 'author_name';
					$field->values['VALUE'] = 'Patrick Faasse, Julien Brouns - creators of Form2Content Joomla CCK';
					break;
			}
		}
		
		$data['preparedFieldData'] = $contentType->fields;
		
		$form->save($data);
	}
	
	private function getDefaultCategory()
	{
		$db 	= JFactory::getDbo();		
		$query	= $db->getQuery(true);
		
		$query->select('id');
		$query->from('#__categories');
		$query->where('extension = \'com_content\' AND published = 1');
		
		$db->setQuery($query, 0, 1);
		
		return $db->loadResult();
	}
}
?>