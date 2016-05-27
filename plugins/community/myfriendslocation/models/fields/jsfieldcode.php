<?php
// Check to ensure this file is included in Joomla!
    defined('_JEXEC') or die('Restricted access');

    jimport('joomla.form.formfield');

    class JFormFieldJsFieldCode extends JFormField
    {

        protected $type = 'jsfieldcode';

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

            $query = "SELECT id, fieldcode FROM ".$db->quoteName('#__community_fields')." WHERE published=".$db->quote('1');
            $db->setQuery($query);
            $fields = $db->loadObjectList();

            $value = '<option value="0">'.JText::_('PLG_COMMUNITY_MYFRIENDSLOCATION_NONE_OPTION').'</option>';
            foreach($fields as $field){
                $selected = ($this->value == $field->id) ? 'selected': '' ;
                $value .= '<option '.$selected.' value="'.$field->id.'" >'.$field->fieldcode.'</option>';
            }

            return '<select id="' . $this->id . '" name="' . $this->name . '">' .
            $value.
            '</select>';
        }
    }