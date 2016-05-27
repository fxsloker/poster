<?php
// Check to ensure this file is included in Joomla!
    defined('_JEXEC') or die('Restricted access');

    jimport('joomla.form.formfield');

    class JFormFieldJsgroup extends JFormField
    {

        protected $type = 'jsgroup';

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

            $model = CFactory::getModel('groups');
            $groups = $model->getAllGroups(null, null, null, null, false,false, false);

            $value = '';
            foreach($groups as $group){
                $selected = ($this->value == $group->id) ? 'selected': '' ;
                $value .= '<option '.$selected.' value="'.$group->id.'" >'.$group->name.'</option>';
            }

            return '<select id="' . $this->id . '" name="' . $this->name . '">' .
            $value.
            '</select>';
        }
    }