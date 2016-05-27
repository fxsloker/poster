<?php
// Check to ensure this file is included in Joomla!
    defined('_JEXEC') or die('Restricted access');

    jimport('joomla.form.formfield');

    class JFormFieldJsgender extends JFormField
    {

        protected $type = 'jsgender';

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

            $db = JFactory::getDbo();

            $query = "SELECT fieldcode FROM ".$db->quoteName('#__community_fields')." WHERE type=".$db->quote('gender');
            $db->setQuery($query);
            $fields = $db->loadObjectList();

            $value = '';
            foreach($fields as $field){
                $selected = ($this->value == $field->fieldcode) ? 'selected': '' ;
                $value .= '<option '.$selected.' value="'.$field->fieldcode.'" >'.$field->fieldcode.'</option>';
            }

            return '<select id="' . $this->id . '" name="' . $this->name . '">' .
            $value.
            '</select>';
        }
    }