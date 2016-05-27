<?php
defined('JPATH_PLATFORM') or die('Restricted acccess');

class F2cFieldAdminImage extends F2cFieldAdminBase
{
	function display($form, $item)
	{
		?>
		<div class="control-group">
			<div class="control-label"><?php echo JText::_('COM_FORM2CONTENT_SHRINK_IMAGE_WHEN'); ?></div>
			<div class="controls"><?php echo $form->getInput('img_max_width', 'settings'); ?> X <?php echo $form->getInput('img_max_height', 'settings'); ?> <?php echo JText::_('COM_FORM2CONTENT_PIXELS'); ?> (<?php echo JText::_('COM_FORM2CONTENT_WIDTH_X_HEIGHT'); ?>)</div>
		</div>			
		<div class="control-group">
			<div class="control-label"><?php echo $form->getLabel('img_output_mode', 'settings'); ?></div>
			<div class="controls"><?php echo $form->getInput('img_output_mode', 'settings'); ?></div>
		</div>			
		<?php
	}
	
	public function delete($id)
	{
		JLoader::register('F2cFieldImage', JPATH_COMPONENT_SITE.'/libraries/form2content/field/image.php');
		
		$db 	= JFactory::getDBO(); 
		$query 	= $db->getQuery(true);
		
		$query->select("pfl.projectid, fct.formid, fct.content")->from("#__f2c_projectfields pfl");
		$query->join("INNER", "#__f2c_fieldcontent fct ON pfl.id = fct.fieldid");
		$query->join("INNER", "#__f2c_fieldtype ftp ON pfl.fieldtypeid = ftp.id AND ftp.name = 'Image'");
		$query->where("pfl.id = ".(int)$id);
		
		$db->setQuery($query);
		$rows = $db->loadObjectList();
		
		for ($i=0, $n=count($rows); $i < $n; $i++) 
		{
	  		$row = &$rows[$i];
			  		
	  		if($row->content)
	  		{
	  			$imageData = new JRegistry();
	  			$imageData->loadString($row->content);
	  			
				// delete thumbnail
				$img = Path::Combine(F2cFieldImage::GetThumbnailsPath($row->projectid, $row->formid), $imageData->get('filename'));
			
				if(JFile::exists($img))
				{
					JFile::delete($img);
				}
		
				// delete image
				$img = Path::Combine(F2cFieldImage::GetImagesPath($row->projectid, $row->formid), $imageData->get('filename'));
			
				if(JFile::exists($img))
				{
					JFile::delete($img);
				}
	  		}
		}					
	}
}
?>