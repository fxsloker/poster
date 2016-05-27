<?php
// Check to ensure this file is included in Joomla!
    defined('_JEXEC') or die('Restricted access');

    jimport('joomla.form.formfield');

    class JFormFieldJseventcategory extends JFormField
    {

        protected $type = 'jseventcategory';

        // getLabel() left out

        public function getInput()
        {
            // Check if JomSocial core file exists
            $corefile 	= JPATH_ROOT . '/components/com_community/libraries/core.php';

            jimport( 'joomla.filesystem.file' );
            if( !JFile::exists( $corefile ) )
            {
                return;
            }
            require_once( $corefile );
            /* Create the Application */
            $app = JFactory::getApplication('site');

            jimport( 'joomla.application.module.helper' );

            $model = CFactory::getModel('events');
            $eventCategories = $model->getAllCategories();

            $value = '<option id="0">'.JText::_('MOD_COMMUNITY_EVENTSCALENDAR_ALL_CATEGORIES_SETTINGS').'</option>';
            foreach($eventCategories as $category){
                $selected = ($this->value == $category->id) ? 'selected': '' ;
                $value .= '<option '.$selected.' value="'.$category->id.'" >'.$category->name.'</option>';
            }

            return '<select id="' . $this->id . '" name="' . $this->name . '">' .
            $value.
            '</select>';
        }
    }