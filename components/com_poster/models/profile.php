<?php

defined('_JEXEC') or die('Restricted access');

class PosterModelProfile extends JModelLegacy
{

	public $_allField = null;

	public function getProfileTypes()
	{
		$db		= $this->getDBO();
		$query	= 'SELECT * FROM ' . $db->quoteName( '#__poster_profiles' );
		$db->setQuery( $query );
		return $db->loadObjectList();
	}

	public function &getAllFields($profileType)
	{
		$this->_loadAllFields($profileType);
		return $this->_allField;
	}

	public function _loadAllFields($type = COMMUNITY_DEFAULT_PROFILE )
	{
		if($this->_allField == null)
		{
			$this->_allField = array();
			$db	= JFactory::getDBO();

			$query	= 'SELECT '.$db->quoteName('field_id').' FROM ' . $db->quoteName( '#__poster_profiles_fields' )
					. ' WHERE ' . $db->quoteName( 'parent' ) . '=' . $db->Quote( $type );
			$db->setQuery( $query );
			$filterIds = $db->loadColumn();

			$wheres[]	= $db->quoteName('id').' IN (' . implode( ',' , $filterIds ) . ')';

			$query	= 'SELECT * FROM ' . $db->quoteName( '#__poster_fields' );

			$query .= " WHERE ".implode(' AND ', $wheres);

			$db->setQuery($query);
			
			$fields = $db->loadObjectList();

			$this->_allField = $fields;

		}
	}		

}