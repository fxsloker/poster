<?php
/**
* @copyright (C) 2013 iJoomla, Inc. - All rights reserved.
* @license GNU General Public License, version 2 (http://www.gnu.org/licenses/gpl-2.0.html)
* @author iJoomla.com <webmaster@ijoomla.com>
* @url https://www.jomsocial.com/license-agreement
* The PHP code portions are distributed under the GPL license. If not otherwise stated, all images, manuals, cascading style sheets, and included JavaScript *are NOT GPL, and are released under the IJOOMLA Proprietary Use License v1.0
* More info at https://www.jomsocial.com/license-agreement
*/

defined('_JEXEC') or die('Restricted access');

Class CEventsAccess implements CAccessInterface
{
    	/**
	 * Method to check if a user is authorised to perform an action in this class
	 *
	 * @param	integer	$userId	Id of the user for which to check authorisation.
	 * @param	string	$action	The name of the action to authorise.
	 * @param	mixed	$asset	Name of the asset as a string.
	 *
	 * @return	boolean	True if authorised.
	 * @since	Jomsocial 2.6
	 */
	static public function authorise()
	{
            $args      = func_get_args();
            $assetName = array_shift ( $args );

            if (method_exists(__CLASS__,$assetName)) {
                    return call_user_func_array(array(__CLASS__, $assetName), $args);
            } else {
                    return null;
            }
        }

        /*
         * This function will get the permission to invite list
         * @param type $userId
         * @return : bool
         */
        static public function EventsRepeatView($userId)
        {
            $config = CFactory::getConfig();

            if( !$config->get('enablerepeat') )
            {
                    return false;
            } else {
                    return true;
            }
        }

    static public function eventsCreate($userid)
    {
        $config = CFactory::getConfig();

        // FALSE user not logged in
        if(!$userid) {
            echo "<!--".__FUNCTION__.__LINE__."-->";
            return false;
        }

        // FALSE globally disabled
        if(!$config->get('enableevents')) {
            echo "<!--".__FUNCTION__.__LINE__."-->";
            return false;
        }

        // FALSE creation globally disabled
        if(!$config->get('createevents')) {
            echo "<!--".__FUNCTION__.__LINE__."-->";
            return false;
        }

        echo "<!--".__FUNCTION__.__LINE__."-->";
        return true;
    }

    static public function eventsPhotosCreate($userId, $eventId)
    {
        $config	= CFactory::getConfig();

        $event = JTable::getInstance('Event', 'CTable');
        $event->load($eventId);

        $params = new CParameter($event->params);

        // FALSE globally disabled
        if(!$config->get('eventphotos')) {
            return false;
        }

        // FALSE event photos disabled
        if($params->get('photopermission') == EVENT_PHOTO_PERMISSION_DISABLE) {
            return false;
        }

        // FALSE not logged in
        if(!$userId) {
            return false;
        }

        // TRUE Super Admin
        if(COwnerHelper::isCommunityAdmin($userId)) {
            return true;
        }

        // TRUE owner
        if($event->creator == $userId) {
            return true;
        }

        // FALSE only admins can post
        if($params->get('photopermission') == 1) {
            return false;
        }

        // TRUE member
        if($event->isMember($userId)) {
            return true;
        }

        // default
        return false;
    }

    static public function eventsVideosCreate($userId, $eventId)
    {
        $config	= CFactory::getConfig();

        $event = JTable::getInstance('Event', 'CTable');
        $event->load($eventId);

        $params = new CParameter($event->params);

        $groupModel = CFactory::getModel('groups');

        // FALSE globally disabled or event video itself disabled
        if(!$config->get('eventvideos') || $params->get('videopermission') == -1 || !$userId) {
            return false;
        }

        // TRUE Super Admin
        if(COwnerHelper::isCommunityAdmin($userId)) {
            return true;
        }

        // TRUE owner
        if($event->creator == $userId) {
            return true;
        }

        // FALSE only admins can post
        if($params->get('videopermission') == 1) {
            return false;
        }

        // member and video permission is on for member
        if($event->isMember($userId) && $params->get('videopermission') == 2) {
            return true;
        }

        return false;
    }


    /**
     * Check if the user can do the ban action on events
     * @param $userId
     * @param $eventId
     * @param $event
     * @return bool
     */
    static public function eventsMemberBan($userId, $eventId, $event)
    {
        //only event creator, community admin and event admin can ban
        if( $event->creator == $userId || COwnerHelper::isCommunityAdmin() || $event->isAdmin($userId)) {
            return true;
        }

        return false;
    }

}



?>