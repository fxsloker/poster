<?php
/**
* @copyright (C) 2015 iJoomla, Inc. - All rights reserved.
* @license GNU General Public License, version 2 (http://www.gnu.org/licenses/gpl-2.0.html)
* @author iJoomla.com <webmaster@ijoomla.com>
* @url https://www.jomsocial.com/license-agreement
* The PHP code portions are distributed under the GPL license. If not otherwise stated, all images, manuals, cascading style sheets, and included JavaScript *are NOT GPL, and are released under the IJOOMLA Proprietary Use License v1.0
* More info at https://www.jomsocial.com/license-agreement
*/
defined('_JEXEC') or die('Restricted access');

// All the module logic should be placed here
if(!class_exists('modCommunityMembers'))
{
    class modCommunityMembers
    {
        function getMembersData($params)
        {
            $limit = $params->get('limit', 12);

            $model = CFactory::getModel('user');
            $filter = $params->get('sorting', 0);

            //let find out if this is a profile type is selected
            $profileFilter = $params->get('profile_filter', 0);
            $profileTypeId = 0;
            if ($profileFilter) {
                $profileTypeId = $params->get('jsprofiletypes',0);
            }

            switch ($filter) {
                case 0 :
                    // newest
                    $members = $model->getLatestMember($limit, false, $profileTypeId);
                    break;
                case 1 :
                    // popular
                    $members = $model->getPopularMember($limit, $profileTypeId);
                    break;
                case 2 :
                    // featured
                    $members = $model->getFeaturedMember($limit, $profileTypeId);
                    break;
                case 3 :
                    // friends
                    $user = CFactory::getUser();
                    if (!$user->id) {
                        // if not logged in, the members should be nothing at all;
                        $members = array();
                        break;
                    }
                    $friends = CFactory::getModel('friends');
                    $members = $friends->getFriends($user->id, 'latest', true, 'all', $limit);
                    break;
                case 4 :
                    // online
                    $members = $model->getLatestMember($limit, true, $profileTypeId);
                    break;
                default:

                    break;
            }

            $respectOnline = $params->get('respect_online',0);
            foreach($members as $key=>$member){
                //if respect online is set and current filter is online members, also check if profile type filter is active
                if(
                    ($respectOnline && $filter == 4) && !$member->isOnline()
                ){
                    unset($members[$key]);
                }
            }

            return $members;
		}

        public function getAllMembers(){
            $db = JFactory::getDbo();
            $query = "SELECT count(id) FROM ".$db->quoteName('#__users')." WHERE ".$db->quoteName('block').'='.$db->quote(0);
            $db->setQuery($query);
            $totalMembers = $db->loadResult();
            return $totalMembers;
        }
	}
}
