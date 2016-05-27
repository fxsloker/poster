<?php
/**
 * @package		plg_easyblogtoolbar
 * @copyright	Copyright (C) 2010 Stack Ideas Private Limited. All rights reserved.
 * @license		GNU/GPL, see LICENSE.php
 *
 * EasyBlog is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * See COPYRIGHT.php for copyright notices and details.
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

require_once( JPATH_ROOT . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'com_community' . DIRECTORY_SEPARATOR . 'libraries' . DIRECTORY_SEPARATOR . 'core.php');

if(!class_exists('plgCommunityEasyBlogToolbar'))
{
	class plgCommunityEasyBlogToolbar extends CApplications
	{
		var $name 		= "EasyBlog Toolbar";
		var $_name		= 'easyblogtoolbar';
		var $_path		= '';
		var $_user		= '';
		var $_my		= '';

	    function plgCommunityEasyBlogToolbar(& $subject, $config)
	    {
			$this->_path	= JPATH_ROOT . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'com_easyblog';
			parent::__construct($subject, $config);
	    }

	    function onSystemStart()
	    {
	    	JPlugin::loadLanguage( 'plg_easyblogtoolbar', JPATH_ADMINISTRATOR );

	    	$my				= CFactory::getUser();

			if( !file_exists( $this->_path . DIRECTORY_SEPARATOR . 'helpers' . DIRECTORY_SEPARATOR . 'router.php' ) )
				return;

			if( !file_exists( $this->_path . DIRECTORY_SEPARATOR . 'helpers' . DIRECTORY_SEPARATOR . 'helper.php' ) )
				return;

			if( !file_exists( $this->_path . DIRECTORY_SEPARATOR . 'helpers' . DIRECTORY_SEPARATOR . 'acl.php' ) )
				return;

			include_once ( $this->_path . DIRECTORY_SEPARATOR . 'helpers' . DIRECTORY_SEPARATOR . 'router.php' );
			include_once ( $this->_path . DIRECTORY_SEPARATOR . 'helpers' . DIRECTORY_SEPARATOR . 'helper.php' );
			include_once ( $this->_path . DIRECTORY_SEPARATOR . 'helpers' . DIRECTORY_SEPARATOR . 'acl.php' );

			$easyBlogItemid		= EasyBlogRouter::getItemId('latest');
			$bloggerItemid		= EasyBlogRouter::getItemId('blogger');
			$dashboardItemid	= EasyBlogRouter::getItemId('dashboard');

			$config 		= EasyBlogHelper::getConfig();
			$acl			= EasyBlogACLHelper::getRuleSet();
			$toolbar		= CFactory::getToolbar();

	        // JomSocial Toolbar group - EasyBlog
	        $url	= 'index.php?option=com_easyblog&view=latest&Itemid='.$easyBlogItemid;
			$toolbar->addGroup('EASYBLOG', JText::_('PLG_EASYBLOG_TOOLBAR_EASYBLOG'), $url);

			// Add any additional toolbars
			$toolbar->addItem('EASYBLOG', 'EASYBLOG_LATEST', JText::_('PLG_EASYBLOG_ALL_BLOGS'), $url);

			if(! empty($acl->rules->add_entry))
			{

				$url	= 'index.php?option=com_easyblog&view=blogger&layout=listings&id=' . $my->id . '&Itemid='.$bloggerItemid;
				$toolbar->addItem('EASYBLOG', 'EASYBLOG_VIEW', JText::_('PLG_EASYBLOG_YOUR_BLOGS'), $url);

	            $url	= 'index.php?option=com_easyblog&view=dashboard&layout=comments&Itemid='.$dashboardItemid;
	            $toolbar->addItem('EASYBLOG', 'EASYBLOG_COMMENTS', JText::_('PLG_EASYBLOG_YOUR_COMMENTS'), $url);

	            $url	= 'index.php?option=com_easyblog&view=dashboard&layout=tags&Itemid='.$dashboardItemid;
	            $toolbar->addItem('EASYBLOG', 'EASYBLOG_TAGS', JText::_('PLG_EASYBLOG_YOUR_TAGS'), $url);

	            $url	= 'index.php?option=com_easyblog&view=dashboard&Itemid='.$dashboardItemid;
	            $toolbar->addItem('EASYBLOG', 'EASYBLOG_DASHBOARD', JText::_('PLG_EASYBLOG_DASHBOARD'), $url);

	            $url	= 'index.php?option=com_easyblog&view=dashboard&layout=write&Itemid='.$dashboardItemid;
	            $toolbar->addItem('EASYBLOG', 'EASYBLOG_WRITE', JText::_('PLG_EASYBLOG_WRITE_BLOG'), $url);
            }

			$this->_user = null;
	    }
	}
}
