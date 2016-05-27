<?php
// Check to ensure this file is included in Joomla!
    defined('_JEXEC') or die('Restricted access');

    jimport('joomla.form.formfield');
    jimport('joomla.form.helper');
    JFormHelper::loadFieldClass('list');

    class JFormFieldJsgroup extends JFormFieldList
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
            //$groups = $model->getAllGroups(null, null, null, null, false,false, false);
            $db = JFactory::getDbo();
            $query = "SELECT * FROM ".$db->quoteName('#__community_groups')." WHERE ".$db->quoteName('published').'='.$db->quote(1);
            $db->setQuery($query);
            $groups = $db->loadObjectList();
            $value = '';

            if(!count($groups)){
                return;
            }

            foreach($groups as $group){
                $selected = ( !empty($this->value) && in_array($group->id, $this->value)) ? 'selected': '' ;
                $value .= '<option '.$selected.' value="'.$group->id.'" >'.$group->name.'</option>';
            }

            return '<select multiple id="' . $this->id . '" name="' . $this->name . '">' .
            $value.
            '</select>';
        }
    }