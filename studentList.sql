-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 27, 2016 at 12:20 PM
-- Server version: 5.5.49-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `studentList`
--

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_ablog_categories`
--

CREATE TABLE IF NOT EXISTS `n1wr9_ablog_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0',
  `lft` int(11) NOT NULL DEFAULT '0',
  `rgt` int(11) NOT NULL DEFAULT '0',
  `level` int(10) unsigned NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL DEFAULT '',
  `access` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `path` varchar(255) NOT NULL DEFAULT '',
  `checked_out` int(11) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL,
  `published` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_left_right` (`lft`,`rgt`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_ablog_comments`
--

CREATE TABLE IF NOT EXISTS `n1wr9_ablog_comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_date` datetime NOT NULL,
  `email_adress` varchar(120) NOT NULL,
  `creator` varchar(100) NOT NULL,
  `post_creator` int(11) NOT NULL,
  `content` text NOT NULL,
  `comment_answer_id` int(11) NOT NULL,
  `published` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `checked_out` int(11) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_ablog_comment_answers`
--

CREATE TABLE IF NOT EXISTS `n1wr9_ablog_comment_answers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `creator` varchar(100) NOT NULL,
  `email_adress` varchar(100) NOT NULL,
  `created_date` datetime NOT NULL,
  `published` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `checked_out` int(11) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_ablog_posts`
--

CREATE TABLE IF NOT EXISTS `n1wr9_ablog_posts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `created_date` datetime DEFAULT NULL,
  `title` varchar(50) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `checked_out` int(11) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL,
  `published` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `hits` int(11) unsigned NOT NULL DEFAULT '0',
  `creator` varchar(100) NOT NULL,
  `creator_username` varchar(100) NOT NULL,
  `creator_id` int(11) NOT NULL,
  `categorie_id` int(11) NOT NULL,
  `trashed` int(11) NOT NULL,
  `publish_start` datetime NOT NULL,
  `publish_stop` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_assets`
--

CREATE TABLE IF NOT EXISTS `n1wr9_assets` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `parent_id` int(11) NOT NULL DEFAULT '0' COMMENT 'Nested set parent.',
  `lft` int(11) NOT NULL DEFAULT '0' COMMENT 'Nested set lft.',
  `rgt` int(11) NOT NULL DEFAULT '0' COMMENT 'Nested set rgt.',
  `level` int(10) unsigned NOT NULL COMMENT 'The cached level in the nested tree.',
  `name` varchar(50) NOT NULL COMMENT 'The unique name for the asset.\n',
  `title` varchar(100) NOT NULL COMMENT 'The descriptive title for the asset.',
  `rules` varchar(5120) NOT NULL COMMENT 'JSON encoded access control.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_asset_name` (`name`),
  KEY `idx_lft_rgt` (`lft`,`rgt`),
  KEY `idx_parent_id` (`parent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=113 ;

--
-- Dumping data for table `n1wr9_assets`
--

INSERT INTO `n1wr9_assets` (`id`, `parent_id`, `lft`, `rgt`, `level`, `name`, `title`, `rules`) VALUES
(1, 0, 0, 205, 0, 'root.1', 'Root Asset', '{"core.login.site":{"6":1,"2":1},"core.login.admin":{"6":1},"core.login.offline":{"6":1},"core.admin":{"8":1},"core.manage":{"7":1},"core.create":{"6":1,"3":1},"core.delete":{"6":1},"core.edit":{"6":1,"4":1},"core.edit.state":{"6":1,"5":1},"core.edit.own":{"6":1,"3":1}}'),
(2, 1, 1, 2, 1, 'com_admin', 'com_admin', '{}'),
(3, 1, 3, 6, 1, 'com_banners', 'com_banners', '{"core.admin":{"7":1},"core.manage":{"6":1},"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[]}'),
(4, 1, 7, 8, 1, 'com_cache', 'com_cache', '{"core.admin":{"7":1},"core.manage":{"7":1}}'),
(5, 1, 9, 10, 1, 'com_checkin', 'com_checkin', '{"core.admin":{"7":1},"core.manage":{"7":1}}'),
(6, 1, 11, 12, 1, 'com_config', 'com_config', '{}'),
(7, 1, 13, 16, 1, 'com_contact', 'com_contact', '{"core.admin":{"7":1},"core.manage":{"6":1},"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[],"core.edit.own":[]}'),
(8, 1, 17, 24, 1, 'com_content', 'com_content', '{"core.admin":{"7":1},"core.manage":{"6":1},"core.create":{"3":1},"core.delete":[],"core.edit":{"4":1},"core.edit.state":{"5":1},"core.edit.own":[]}'),
(9, 1, 25, 26, 1, 'com_cpanel', 'com_cpanel', '{}'),
(10, 1, 27, 28, 1, 'com_installer', 'com_installer', '{"core.admin":[],"core.manage":{"7":0},"core.delete":{"7":0},"core.edit.state":{"7":0}}'),
(11, 1, 29, 30, 1, 'com_languages', 'com_languages', '{"core.admin":{"7":1},"core.manage":[],"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[]}'),
(12, 1, 31, 32, 1, 'com_login', 'com_login', '{}'),
(13, 1, 33, 34, 1, 'com_mailto', 'com_mailto', '{}'),
(14, 1, 35, 36, 1, 'com_massmail', 'com_massmail', '{}'),
(15, 1, 37, 38, 1, 'com_media', 'com_media', '{"core.admin":{"7":1},"core.manage":{"6":1},"core.create":{"3":1},"core.delete":{"5":1}}'),
(16, 1, 39, 40, 1, 'com_menus', 'com_menus', '{"core.admin":{"7":1},"core.manage":[],"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[]}'),
(17, 1, 41, 42, 1, 'com_messages', 'com_messages', '{"core.admin":{"7":1},"core.manage":{"7":1}}'),
(18, 1, 43, 158, 1, 'com_modules', 'com_modules', '{"core.admin":{"7":1},"core.manage":[],"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[]}'),
(19, 1, 159, 162, 1, 'com_newsfeeds', 'com_newsfeeds', '{"core.admin":{"7":1},"core.manage":{"6":1},"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[],"core.edit.own":[]}'),
(20, 1, 163, 164, 1, 'com_plugins', 'com_plugins', '{"core.admin":{"7":1},"core.manage":[],"core.edit":[],"core.edit.state":[]}'),
(21, 1, 165, 166, 1, 'com_redirect', 'com_redirect', '{"core.admin":{"7":1},"core.manage":[]}'),
(22, 1, 167, 168, 1, 'com_search', 'com_search', '{"core.admin":{"7":1},"core.manage":{"6":1}}'),
(23, 1, 169, 170, 1, 'com_templates', 'com_templates', '{"core.admin":{"7":1},"core.manage":[],"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[]}'),
(24, 1, 171, 174, 1, 'com_users', 'com_users', '{"core.admin":{"7":1},"core.options":[],"core.manage":[],"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[]}'),
(26, 1, 175, 176, 1, 'com_wrapper', 'com_wrapper', '{}'),
(27, 8, 18, 23, 2, 'com_content.category.2', 'Uncategorised', '{"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[],"core.edit.own":[]}'),
(28, 3, 4, 5, 2, 'com_banners.category.3', 'Uncategorised', '{"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[]}'),
(29, 7, 14, 15, 2, 'com_contact.category.4', 'Uncategorised', '{"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[],"core.edit.own":[]}'),
(30, 19, 160, 161, 2, 'com_newsfeeds.category.5', 'Uncategorised', '{"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[],"core.edit.own":[]}'),
(32, 24, 172, 173, 1, 'com_users.category.7', 'Uncategorised', '{"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[]}'),
(33, 1, 177, 178, 1, 'com_finder', 'com_finder', '{"core.admin":{"7":1},"core.manage":{"6":1}}'),
(34, 1, 179, 180, 1, 'com_joomlaupdate', 'com_joomlaupdate', '{"core.admin":[],"core.manage":[],"core.delete":[],"core.edit.state":[]}'),
(35, 1, 181, 182, 1, 'com_tags', 'com_tags', '{"core.admin":[],"core.manage":[],"core.manage":[],"core.delete":[],"core.edit.state":[]}'),
(36, 1, 183, 184, 1, 'com_contenthistory', 'com_contenthistory', '{}'),
(37, 1, 185, 186, 1, 'com_ajax', 'com_ajax', '{}'),
(38, 1, 187, 188, 1, 'com_postinstall', 'com_postinstall', '{}'),
(39, 18, 44, 45, 2, 'com_modules.module.1', 'Main Menu', '{"core.delete":[],"core.edit":[],"core.edit.state":[]}'),
(40, 18, 46, 47, 2, 'com_modules.module.2', 'Login', '{"core.delete":[],"core.edit":[],"core.edit.state":[]}'),
(41, 18, 48, 49, 2, 'com_modules.module.3', 'Popular Articles', '{"core.delete":[],"core.edit":[],"core.edit.state":[]}'),
(42, 18, 50, 51, 2, 'com_modules.module.4', 'Recently Added Articles', '{"core.delete":[],"core.edit":[],"core.edit.state":[]}'),
(43, 18, 52, 53, 2, 'com_modules.module.8', 'Toolbar', '{"core.delete":[],"core.edit":[],"core.edit.state":[]}'),
(44, 18, 54, 55, 2, 'com_modules.module.9', 'Quick Icons', '{"core.delete":[],"core.edit":[],"core.edit.state":[]}'),
(45, 18, 56, 57, 2, 'com_modules.module.10', 'Logged-in Users', '{"core.delete":[],"core.edit":[],"core.edit.state":[]}'),
(46, 18, 58, 59, 2, 'com_modules.module.12', 'Admin Menu', '{"core.delete":[],"core.edit":[],"core.edit.state":[]}'),
(47, 18, 60, 61, 2, 'com_modules.module.13', 'Admin Submenu', '{"core.delete":[],"core.edit":[],"core.edit.state":[]}'),
(48, 18, 62, 63, 2, 'com_modules.module.14', 'User Status', '{"core.delete":[],"core.edit":[],"core.edit.state":[]}'),
(49, 18, 64, 65, 2, 'com_modules.module.15', 'Title', '{"core.delete":[],"core.edit":[],"core.edit.state":[]}'),
(50, 18, 66, 67, 2, 'com_modules.module.16', 'Login Form', '{"core.delete":[],"core.edit":[],"core.edit.state":[]}'),
(51, 18, 68, 69, 2, 'com_modules.module.17', 'Breadcrumbs', '{"core.delete":[],"core.edit":[],"core.edit.state":[]}'),
(52, 18, 70, 71, 2, 'com_modules.module.79', 'Multilanguage status', '{"core.delete":[],"core.edit":[],"core.edit.state":[]}'),
(53, 18, 72, 73, 2, 'com_modules.module.86', 'Joomla Version', '{"core.delete":[],"core.edit":[],"core.edit.state":[]}'),
(54, 1, 189, 190, 1, 'com_easyblog', 'com_easyblog', '{}'),
(55, 18, 74, 75, 2, 'com_modules.module.87', 'EasyBlog - Archive Module', '{}'),
(56, 18, 76, 77, 2, 'com_modules.module.88', 'EasyBlog - Biography Module', '{}'),
(57, 18, 78, 79, 2, 'com_modules.module.89', 'EasyBlog - Calendar Module', '{}'),
(58, 18, 80, 81, 2, 'com_modules.module.90', 'Easyblog - Categories Module', '{}'),
(59, 18, 82, 83, 2, 'com_modules.module.91', 'EasyBlog - Image Wall Module', '{}'),
(60, 18, 84, 85, 2, 'com_modules.module.92', 'EasyBlog - Latest Bloggers Module', '{}'),
(61, 18, 86, 87, 2, 'com_modules.module.93', 'EasyBlog - Latest Blogs Module', '{}'),
(62, 18, 88, 89, 2, 'com_modules.module.94', 'EasyBlog - Latest Comments Module', '{}'),
(63, 18, 90, 91, 2, 'com_modules.module.95', 'EasyBlog - Posts List', '{}'),
(64, 18, 92, 93, 2, 'com_modules.module.96', 'EasyBlog - Most Commented Post Module', '{}'),
(65, 18, 94, 95, 2, 'com_modules.module.97', 'EasyBlog - Most Popular Post Module', '{}'),
(66, 18, 96, 97, 2, 'com_modules.module.98', 'EasyBlog - Post Map Module', '{}'),
(67, 18, 98, 99, 2, 'com_modules.module.99', 'EasyBlog - Post Meta Module', '{}'),
(68, 18, 100, 101, 2, 'com_modules.module.100', 'EasyBlog - Quick Post Module', '{}'),
(69, 18, 102, 103, 2, 'com_modules.module.101', 'EasyBlog - Random Post Module', '{}'),
(70, 18, 104, 105, 2, 'com_modules.module.102', 'EasyBlog - Related Posts Module', '{}'),
(71, 18, 106, 107, 2, 'com_modules.module.103', 'EasyBlog - Search Blogs Module', '{}'),
(72, 18, 108, 109, 2, 'com_modules.module.104', 'EasyBlog - Showcase Module', '{}'),
(73, 18, 110, 111, 2, 'com_modules.module.105', 'EasyBlog - Subscribe Module', '{}'),
(74, 18, 112, 113, 2, 'com_modules.module.106', 'EasyBlog - Subscribers Listing Module', '{}'),
(75, 18, 114, 115, 2, 'com_modules.module.107', 'EasyBlog - Tag Cloud Module', '{}'),
(76, 18, 116, 117, 2, 'com_modules.module.108', 'EasyBlog - Team Blogs Module', '{}'),
(77, 18, 118, 119, 2, 'com_modules.module.109', 'EasyBlog - Ticker Module', '{}'),
(78, 18, 120, 121, 2, 'com_modules.module.110', 'EasyBlog - Top Blogs Module', '{}'),
(79, 18, 122, 123, 2, 'com_modules.module.111', 'EasyBlog - Welcome Module', '{}'),
(80, 1, 191, 192, 1, 'com_community', 'Community', '{}'),
(81, 18, 124, 125, 2, 'com_modules.module.112', 'JS Activity Stream', '{}'),
(82, 18, 126, 127, 2, 'com_modules.module.113', 'JS Discussions', '{}'),
(83, 18, 128, 129, 2, 'com_modules.module.114', 'JS Events', '{}'),
(84, 18, 130, 131, 2, 'com_modules.module.115', 'JS Events Calendar', '{}'),
(85, 18, 132, 133, 2, 'com_modules.module.116', 'JS Groups', '{}'),
(86, 18, 134, 135, 2, 'com_modules.module.117', 'JS Hello Me', '{}'),
(87, 18, 136, 137, 2, 'com_modules.module.118', 'JS Members', '{}'),
(88, 18, 138, 139, 2, 'com_modules.module.119', 'JS Members Search', '{}'),
(89, 18, 140, 141, 2, 'com_modules.module.120', 'JS Nearby Events Search', '{}'),
(90, 18, 142, 143, 2, 'com_modules.module.121', 'JS Notifications', '{}'),
(91, 18, 144, 145, 2, 'com_modules.module.122', 'JS Photo Comments', '{}'),
(92, 18, 146, 147, 2, 'com_modules.module.123', 'JS Photos', '{}'),
(93, 18, 148, 149, 2, 'com_modules.module.124', 'JS Statistics', '{}'),
(94, 18, 150, 151, 2, 'com_modules.module.125', 'JS Top Members', '{}'),
(95, 18, 152, 153, 2, 'com_modules.module.126', 'JS Video Comments', '{}'),
(96, 18, 154, 155, 2, 'com_modules.module.127', 'JS Videos', '{}'),
(103, 1, 193, 194, 1, 'com_simpleregistration', 'Simple Registration', '{}'),
(104, 18, 156, 157, 2, 'com_modules.module.128', 'Simple Registration', '{}'),
(105, 1, 195, 196, 1, 'com_poster', 'Poster!', '{}'),
(107, 1, 197, 204, 1, 'com_form2content', 'com_form2content', '{}'),
(108, 107, 198, 203, 2, 'com_form2content.project.1', 'Blog articles', '{"core.create":[],"form2content.trash":[],"form2content.trash.own":[],"core.delete":[],"form2content.delete.own":[],"core.edit":[],"core.edit.state":[],"core.edit.own":[],"form2content.edit.state.own":[]}'),
(109, 108, 199, 200, 3, 'com_form2content.form.1', 'Getting started with Form2Content Lite', '{"core.delete":[],"core.edit":[],"core.edit.state":[]}'),
(110, 27, 19, 20, 3, 'com_content.article.1', 'Getting started with Form2Content Lite', '{"core.admin":{"7":1},"core.manage":{"6":1},"core.create":{"3":1},"core.delete":[],"core.edit":{"4":1},"core.edit.state":{"5":1},"core.edit.own":[]}'),
(111, 108, 201, 202, 3, 'com_form2content.form.2', 'Article templates, the true strength of Form2Content', '{"core.delete":[],"core.edit":[],"core.edit.state":[]}'),
(112, 27, 21, 22, 3, 'com_content.article.2', 'Article templates, the true strength of Form2Content', '{"core.admin":{"7":1},"core.manage":{"6":1},"core.create":{"3":1},"core.delete":[],"core.edit":{"4":1},"core.edit.state":{"5":1},"core.edit.own":[]}');

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_associations`
--

CREATE TABLE IF NOT EXISTS `n1wr9_associations` (
  `id` int(11) NOT NULL COMMENT 'A reference to the associated item.',
  `context` varchar(50) NOT NULL COMMENT 'The context of the associated item.',
  `key` char(32) NOT NULL COMMENT 'The key for the association computed from an md5 on associated ids.',
  PRIMARY KEY (`context`,`id`),
  KEY `idx_key` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_banners`
--

CREATE TABLE IF NOT EXISTS `n1wr9_banners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL DEFAULT '0',
  `type` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '',
  `alias` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `imptotal` int(11) NOT NULL DEFAULT '0',
  `impmade` int(11) NOT NULL DEFAULT '0',
  `clicks` int(11) NOT NULL DEFAULT '0',
  `clickurl` varchar(200) NOT NULL DEFAULT '',
  `state` tinyint(3) NOT NULL DEFAULT '0',
  `catid` int(10) unsigned NOT NULL DEFAULT '0',
  `description` text NOT NULL,
  `custombannercode` varchar(2048) NOT NULL,
  `sticky` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `metakey` text NOT NULL,
  `params` text NOT NULL,
  `own_prefix` tinyint(1) NOT NULL DEFAULT '0',
  `metakey_prefix` varchar(255) NOT NULL DEFAULT '',
  `purchase_type` tinyint(4) NOT NULL DEFAULT '-1',
  `track_clicks` tinyint(4) NOT NULL DEFAULT '-1',
  `track_impressions` tinyint(4) NOT NULL DEFAULT '-1',
  `checked_out` int(10) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_up` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_down` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `reset` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `language` char(7) NOT NULL DEFAULT '',
  `created_by` int(10) unsigned NOT NULL DEFAULT '0',
  `created_by_alias` varchar(255) NOT NULL DEFAULT '',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(10) unsigned NOT NULL DEFAULT '0',
  `version` int(10) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `idx_state` (`state`),
  KEY `idx_own_prefix` (`own_prefix`),
  KEY `idx_metakey_prefix` (`metakey_prefix`),
  KEY `idx_banner_catid` (`catid`),
  KEY `idx_language` (`language`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_banner_clients`
--

CREATE TABLE IF NOT EXISTS `n1wr9_banner_clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `contact` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `extrainfo` text NOT NULL,
  `state` tinyint(3) NOT NULL DEFAULT '0',
  `checked_out` int(10) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `metakey` text NOT NULL,
  `own_prefix` tinyint(4) NOT NULL DEFAULT '0',
  `metakey_prefix` varchar(255) NOT NULL DEFAULT '',
  `purchase_type` tinyint(4) NOT NULL DEFAULT '-1',
  `track_clicks` tinyint(4) NOT NULL DEFAULT '-1',
  `track_impressions` tinyint(4) NOT NULL DEFAULT '-1',
  PRIMARY KEY (`id`),
  KEY `idx_own_prefix` (`own_prefix`),
  KEY `idx_metakey_prefix` (`metakey_prefix`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_banner_tracks`
--

CREATE TABLE IF NOT EXISTS `n1wr9_banner_tracks` (
  `track_date` datetime NOT NULL,
  `track_type` int(10) unsigned NOT NULL,
  `banner_id` int(10) unsigned NOT NULL,
  `count` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`track_date`,`track_type`,`banner_id`),
  KEY `idx_track_date` (`track_date`),
  KEY `idx_track_type` (`track_type`),
  KEY `idx_banner_id` (`banner_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_categories`
--

CREATE TABLE IF NOT EXISTS `n1wr9_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `asset_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'FK to the #__assets table.',
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0',
  `lft` int(11) NOT NULL DEFAULT '0',
  `rgt` int(11) NOT NULL DEFAULT '0',
  `level` int(10) unsigned NOT NULL DEFAULT '0',
  `path` varchar(255) NOT NULL DEFAULT '',
  `extension` varchar(50) NOT NULL DEFAULT '',
  `title` varchar(255) NOT NULL,
  `alias` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `note` varchar(255) NOT NULL DEFAULT '',
  `description` mediumtext NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `checked_out` int(11) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `access` int(10) unsigned NOT NULL DEFAULT '0',
  `params` text NOT NULL,
  `metadesc` varchar(1024) NOT NULL COMMENT 'The meta description for the page.',
  `metakey` varchar(1024) NOT NULL COMMENT 'The meta keywords for the page.',
  `metadata` varchar(2048) NOT NULL COMMENT 'JSON encoded metadata properties.',
  `created_user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `created_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `modified_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `hits` int(10) unsigned NOT NULL DEFAULT '0',
  `language` char(7) NOT NULL,
  `version` int(10) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `cat_idx` (`extension`,`published`,`access`),
  KEY `idx_access` (`access`),
  KEY `idx_checkout` (`checked_out`),
  KEY `idx_path` (`path`),
  KEY `idx_left_right` (`lft`,`rgt`),
  KEY `idx_alias` (`alias`),
  KEY `idx_language` (`language`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `n1wr9_categories`
--

INSERT INTO `n1wr9_categories` (`id`, `asset_id`, `parent_id`, `lft`, `rgt`, `level`, `path`, `extension`, `title`, `alias`, `note`, `description`, `published`, `checked_out`, `checked_out_time`, `access`, `params`, `metadesc`, `metakey`, `metadata`, `created_user_id`, `created_time`, `modified_user_id`, `modified_time`, `hits`, `language`, `version`) VALUES
(1, 0, 0, 0, 11, 0, '', 'system', 'ROOT', 'root', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{}', '', '', '{}', 42, '2011-01-01 00:00:01', 0, '0000-00-00 00:00:00', 0, '*', 1),
(2, 27, 1, 1, 2, 1, 'uncategorised', 'com_content', 'Uncategorised', 'uncategorised', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{"category_layout":"","image":""}', '', '', '{"author":"","robots":""}', 42, '2011-01-01 00:00:01', 0, '0000-00-00 00:00:00', 0, '*', 1),
(3, 28, 1, 3, 4, 1, 'uncategorised', 'com_banners', 'Uncategorised', 'uncategorised', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{"category_layout":"","image":""}', '', '', '{"author":"","robots":""}', 42, '2011-01-01 00:00:01', 0, '0000-00-00 00:00:00', 0, '*', 1),
(4, 29, 1, 5, 6, 1, 'uncategorised', 'com_contact', 'Uncategorised', 'uncategorised', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{"category_layout":"","image":""}', '', '', '{"author":"","robots":""}', 42, '2011-01-01 00:00:01', 0, '0000-00-00 00:00:00', 0, '*', 1),
(5, 30, 1, 7, 8, 1, 'uncategorised', 'com_newsfeeds', 'Uncategorised', 'uncategorised', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{"category_layout":"","image":""}', '', '', '{"author":"","robots":""}', 42, '2011-01-01 00:00:01', 0, '0000-00-00 00:00:00', 0, '*', 1),
(7, 32, 1, 9, 10, 1, 'uncategorised', 'com_users', 'Uncategorised', 'uncategorised', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{"category_layout":"","image":""}', '', '', '{"author":"","robots":""}', 42, '2011-01-01 00:00:01', 0, '0000-00-00 00:00:00', 0, '*', 1);

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_community_activities`
--

CREATE TABLE IF NOT EXISTS `n1wr9_community_activities` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `actor` int(10) unsigned NOT NULL,
  `target` int(10) unsigned NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `app` varchar(200) NOT NULL,
  `verb` varchar(200) NOT NULL,
  `cid` int(10) NOT NULL,
  `groupid` int(10) DEFAULT NULL,
  `eventid` int(10) DEFAULT NULL,
  `group_access` tinyint(4) NOT NULL DEFAULT '0',
  `event_access` tinyint(4) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `access` tinyint(3) unsigned NOT NULL,
  `params` text NOT NULL,
  `points` int(4) NOT NULL DEFAULT '1',
  `archived` tinyint(3) NOT NULL,
  `location` text NOT NULL,
  `latitude` float(10,6) NOT NULL DEFAULT '255.000000',
  `longitude` float(10,6) NOT NULL DEFAULT '255.000000',
  `comment_id` int(10) NOT NULL,
  `comment_type` varchar(200) NOT NULL,
  `like_id` int(10) NOT NULL,
  `like_type` varchar(200) NOT NULL,
  `actors` text NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `actor` (`actor`),
  KEY `target` (`target`),
  KEY `app` (`app`),
  KEY `created` (`created`),
  KEY `archived` (`archived`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `n1wr9_community_activities`
--

INSERT INTO `n1wr9_community_activities` (`id`, `actor`, `target`, `title`, `content`, `app`, `verb`, `cid`, `groupid`, `eventid`, `group_access`, `event_access`, `created`, `access`, `params`, `points`, `archived`, `location`, `latitude`, `longitude`, `comment_id`, `comment_type`, `like_id`, `like_type`, `actors`, `updated_at`) VALUES
(1, 312, 0, '{actor} created new blog post <a href="http://xn--h1aaggsl.xn--p1ai/blog/moya-pervaya-zapis">Моя первая запись</a> in <a href="http://xn--h1aaggsl.xn--p1ai/blog/categories/uncategorized">Uncategorized</a>', '<div>\n        <p>Моя первая запись ...</p>\n    \n    <div style="clear:both;"></div>\n\n    <div style="text-align: right;">\n        <a href="http://xn--h1aaggsl.xn--p1ai/blog/moya-pervaya-zapis">Continue reading</a>\n    </div>\n</div>', 'easyblog', '', 2, 0, 0, 0, 0, '2016-04-14 09:40:30', 0, '', 1, 0, '', 255.000000, 255.000000, 2, 'com_easyblog', 2, 'com_easyblog', '', '2016-04-14 09:40:30'),
(2, 0, 0, '', '', 'profile.like', '', 312, 0, 0, 0, 0, '2016-04-14 11:57:11', 0, '{"action":"profile.like","actors":"312"}', 1, 0, '', 255.000000, 255.000000, 0, '', 0, '', '{"userid":[{"id":"312"}]}', '2016-04-14 11:57:11');

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_community_activities_hide`
--

CREATE TABLE IF NOT EXISTS `n1wr9_community_activities_hide` (
  `activity_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_community_apps`
--

CREATE TABLE IF NOT EXISTS `n1wr9_community_apps` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userid` int(10) unsigned NOT NULL,
  `apps` varchar(200) NOT NULL,
  `ordering` int(10) unsigned NOT NULL,
  `position` varchar(50) NOT NULL DEFAULT 'content',
  `params` text NOT NULL,
  `privacy` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_userid` (`userid`),
  KEY `idx_user_apps` (`userid`,`apps`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_community_avatar`
--

CREATE TABLE IF NOT EXISTS `n1wr9_community_avatar` (
  `id` int(10) unsigned NOT NULL,
  `apptype` varchar(255) NOT NULL,
  `path` text NOT NULL,
  `type` tinyint(3) unsigned NOT NULL COMMENT '0 = small, 1 = medium, 2=large',
  UNIQUE KEY `id` (`id`,`apptype`,`type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_community_badges`
--

CREATE TABLE IF NOT EXISTS `n1wr9_community_badges` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(64) NOT NULL,
  `points` int(11) NOT NULL DEFAULT '0',
  `image` varchar(256) NOT NULL,
  `published` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `points` (`points`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `n1wr9_community_badges`
--

INSERT INTO `n1wr9_community_badges` (`id`, `title`, `points`, `image`, `published`) VALUES
(1, '0', 0, 'png', 1),
(2, '50', 50, 'png', 1),
(3, '100', 100, 'png', 1),
(4, '200', 200, 'png', 1),
(5, '350', 350, 'png', 1),
(6, '600', 600, 'png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_community_blocklist`
--

CREATE TABLE IF NOT EXISTS `n1wr9_community_blocklist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `blocked_userid` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`),
  KEY `blocked_userid` (`blocked_userid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_community_config`
--

CREATE TABLE IF NOT EXISTS `n1wr9_community_config` (
  `name` varchar(64) NOT NULL,
  `params` longtext NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `n1wr9_community_config`
--

INSERT INTO `n1wr9_community_config` (`name`, `params`) VALUES
('dbversion', '19'),
('config', '{"enablereporting":"0","maxReport":"50","notifyMaxReport":"","enableguestreporting":"0","predefinedreports":"Spamming \\/ Advertisement\\\\nProfanity \\/ Inappropriate content.\\\\nAbusive.","guestsearch":"1","privacy_search_email":"0","sendemailonpageload":"0","archive_activity_max_day":"1","archive_activity_limit":"1500","enableterms":"0","registrationTerms":"","profile_deletion":"1","alloweddomains":"","denieddomains":"","nocaptcha":"0","nocaptchapublic":"","nocaptchaprivate":"","nocaptchatheme":"light","respectactivityprivacy":"1","newtab":"0","allmemberactivitycomment":"1","likes_groups":"0","likes_events":"0","likes_photo":"1","likes_videos":"0","likes_profile":"1","sitename":"JomSocial","redirect_login":"profile","redirect_logout":"frontpage","enablesharethis":"1","shareviaemail":"1","enablepm":"1","message_file_sharing":"0","message_file_maxsize":"2","notifications_ajax_enable_refresh":"0","notifications_ajax_refresh_interval":"","wallediting":"1","lockprofilewalls":"1","lockvideoswalls":"0","lockphotoswalls":"0","lockgroupwalls":"1","lockeventwalls":"1","enable_refresh":"1","stream_refresh_interval":"30000","stream_default_comments":"3","stream_comment_length":"150","daylightsavingoffset":"0","htmlemail":"1","copyrightemail":"Copyright of Your Company","statusmaxchar":"400","streamlocation":"0","statusemoticon":"0","profile_multiprofile":"0","alphabetfiltering":"1","cfgSection":"video","network_keywords":"","enablegroups":"0","enableguestsearchgroups":"1","moderategroupcreation":"0","creategroups":"1","groupcreatelimit":"300","groupphotouploadlimit":"500","groupvideouploadlimit":"500","createannouncement":"1","creatediscussion":"1","groupphotos":"1","groupvideos":"1","group_events":"1","groupdiscussnotification":"0","discussionfilelimit":"500","groupdiscussfilesharing":"1","filemaxuploadsize":"8","groupbulletinfilesharing":"1","enableevents":"0","enableguestsearchevents":"1","event_moderation":"0","createevents":"1","enablerepeat":"0","eventphotos":"1","eventvideos":"1","eventcreatelimit":"300","eventphotouploadlimit":"500","eventvideouploadlimit":"500","eventexportical":"1","event_import_ical":"1","eventshowmap":"1","eventshowampm":"1","eventshowtimezone":"0","enablevideos":"0","enableguestsearchvideos":"1","enableprofilevideo":"1","enablevideosupload":"0","videouploadlimit":"500","videosmapdefault":"0","deleteoriginalvideos":"0","videofolder":"images","maxvideouploadsize":"8","ffmpegPath":"","flvtool2":"","qscale":"11","videosSize":"480x360","videosThumbSize":"320x180","customCommandForVideo":"","enablevideopseudostream":"0","videodebug":"0","video_mode":"0","video_native":"1","enable_zencoder":"0","zencoder_api_key":""}');

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_community_connection`
--

CREATE TABLE IF NOT EXISTS `n1wr9_community_connection` (
  `connection_id` int(11) NOT NULL AUTO_INCREMENT,
  `connect_from` int(11) NOT NULL,
  `connect_to` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `group` int(11) NOT NULL,
  `msg` text NOT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`connection_id`),
  KEY `connect_from` (`connect_from`,`connect_to`,`status`,`group`),
  KEY `idx_connect_to` (`connect_to`),
  KEY `idx_connect_from` (`connect_from`),
  KEY `idx_connect_tofrom` (`connect_to`,`connect_from`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_community_connect_users`
--

CREATE TABLE IF NOT EXISTS `n1wr9_community_connect_users` (
  `connectid` bigint(20) NOT NULL,
  `type` varchar(255) NOT NULL,
  `userid` int(11) NOT NULL,
  PRIMARY KEY (`connectid`),
  KEY `type` (`type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_community_engagement`
--

CREATE TABLE IF NOT EXISTS `n1wr9_community_engagement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `action` varchar(64) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `week` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `n1wr9_community_engagement`
--

INSERT INTO `n1wr9_community_engagement` (`id`, `action`, `user_id`, `created`, `week`) VALUES
(1, 'com_easyblog.like', 312, '2016-04-14 11:56:35', 15),
(2, 'profile.like', 312, '2016-04-14 11:57:11', 15);

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_community_events`
--

CREATE TABLE IF NOT EXISTS `n1wr9_community_events` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `parent` int(11) NOT NULL COMMENT 'parent for recurring event',
  `catid` int(11) unsigned NOT NULL,
  `contentid` int(11) unsigned DEFAULT '0' COMMENT '0 - if type == profile, else it hold the group id',
  `type` varchar(255) NOT NULL DEFAULT 'profile' COMMENT 'profile, group',
  `title` varchar(255) NOT NULL,
  `location` text NOT NULL,
  `summary` text NOT NULL,
  `unlisted` tinyint(1) NOT NULL,
  `description` text,
  `creator` int(11) unsigned NOT NULL,
  `startdate` datetime NOT NULL,
  `enddate` datetime NOT NULL,
  `permission` tinyint(4) unsigned NOT NULL DEFAULT '0' COMMENT '0 - Open (Anyone can mark attendence), 1 - Private (Only invited can mark attendence)',
  `avatar` varchar(255) DEFAULT NULL,
  `thumb` varchar(255) DEFAULT NULL,
  `cover` text NOT NULL,
  `invitedcount` int(11) unsigned DEFAULT '0',
  `confirmedcount` int(11) unsigned DEFAULT '0' COMMENT 'treat this as member count as well',
  `declinedcount` int(11) unsigned DEFAULT '0',
  `maybecount` int(11) unsigned DEFAULT '0',
  `wallcount` int(11) unsigned DEFAULT '0',
  `ticket` int(11) unsigned DEFAULT '0' COMMENT 'Represent how many guest can be joined or invited.',
  `allowinvite` tinyint(1) unsigned DEFAULT '1' COMMENT '0 - guest member cannot invite thier friends to join. 1 - yes, guest member can invite any of thier friends to join.',
  `created` datetime DEFAULT NULL,
  `hits` int(11) unsigned DEFAULT '0',
  `published` int(11) unsigned DEFAULT '1',
  `latitude` float(10,6) NOT NULL DEFAULT '255.000000',
  `longitude` float(10,6) NOT NULL DEFAULT '255.000000',
  `offset` varchar(5) DEFAULT NULL,
  `allday` tinyint(11) NOT NULL DEFAULT '0',
  `repeat` varchar(50) DEFAULT NULL COMMENT 'null,daily,weekly,monthly',
  `repeatend` date NOT NULL,
  `storage` varchar(64) NOT NULL DEFAULT 'file',
  `params` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_creator` (`creator`),
  KEY `idx_period` (`startdate`,`enddate`),
  KEY `idx_type` (`type`),
  KEY `idx_catid` (`catid`),
  KEY `idx_published` (`published`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_community_events_category`
--

CREATE TABLE IF NOT EXISTS `n1wr9_community_events_category` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `parent` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `n1wr9_community_events_category`
--

INSERT INTO `n1wr9_community_events_category` (`id`, `parent`, `name`, `description`) VALUES
(1, 0, 'General', 'General events'),
(2, 0, 'Birthday', 'Birthday events'),
(3, 0, 'Party', 'Party events');

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_community_events_members`
--

CREATE TABLE IF NOT EXISTS `n1wr9_community_events_members` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `eventid` int(11) unsigned NOT NULL,
  `memberid` int(11) unsigned NOT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '[Join / Invite]: 0 - [pending approval/pending invite], 1 - [approved/confirmed], 2 - [rejected/declined], 3 - [maybe/maybe], 4 - [blocked/blocked]',
  `permission` tinyint(1) unsigned NOT NULL DEFAULT '3' COMMENT '1 - creator, 2 - admin, 3 - member',
  `invited_by` int(11) unsigned DEFAULT '0',
  `approval` tinyint(1) unsigned DEFAULT '0' COMMENT '0 - no approval required, 1 - required admin approval',
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_eventid` (`eventid`),
  KEY `idx_status` (`status`),
  KEY `idx_invitedby` (`invited_by`),
  KEY `idx_permission` (`eventid`,`permission`),
  KEY `idx_member_event` (`eventid`,`memberid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_community_event_stats`
--

CREATE TABLE IF NOT EXISTS `n1wr9_community_event_stats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `eid` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `count` int(11) NOT NULL,
  `date` date NOT NULL,
  `params` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_community_featured`
--

CREATE TABLE IF NOT EXISTS `n1wr9_community_featured` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `target_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `type` (`type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_community_fields`
--

CREATE TABLE IF NOT EXISTS `n1wr9_community_fields` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  `ordering` int(11) DEFAULT '0',
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `min` int(5) NOT NULL,
  `max` int(5) NOT NULL,
  `name` varchar(255) NOT NULL,
  `tips` text NOT NULL,
  `visible` tinyint(1) DEFAULT '0',
  `required` tinyint(1) DEFAULT '0',
  `searchable` tinyint(1) DEFAULT '1',
  `registration` tinyint(1) DEFAULT '1',
  `options` text,
  `fieldcode` varchar(255) NOT NULL,
  `params` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fieldcode` (`fieldcode`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `n1wr9_community_fields`
--

INSERT INTO `n1wr9_community_fields` (`id`, `type`, `ordering`, `published`, `min`, `max`, `name`, `tips`, `visible`, `required`, `searchable`, `registration`, `options`, `fieldcode`, `params`) VALUES
(1, 'group', 1, 1, 10, 100, 'Basic Information', 'Basic information for user', 1, 1, 1, 1, '', '', ''),
(2, 'gender', 2, 1, 10, 100, 'Gender', 'Select gender', 1, 1, 1, 1, 'COM_COMMUNITY_MALE\nCOM_COMMUNITY_FEMALE', 'FIELD_GENDER', ''),
(3, 'birthdate', 3, 1, 10, 100, 'Birthdate', 'Enter your date of birth so other users can know when to wish you happy birthday ', 1, 1, 1, 1, '', 'FIELD_BIRTHDATE', ''),
(4, 'textarea', 4, 1, 1, 800, 'About me', 'Tell us more about yourself', 1, 1, 1, 1, '', 'FIELD_ABOUTME', ''),
(5, 'group', 5, 1, 10, 100, 'Contact Information', 'Specify your contact details', 1, 1, 1, 1, '', '', ''),
(6, 'text', 6, 0, 10, 100, 'Mobile phone', 'Mobile carrier number that other users can contact you.', 0, 0, 1, 1, '', 'FIELD_MOBILE', ''),
(7, 'text', 7, 0, 10, 100, 'Land phone', 'Contact number that other users can contact you.', 0, 0, 1, 1, '', 'FIELD_LANDPHONE', ''),
(8, 'textarea', 8, 0, 10, 100, 'Address', 'Your Address', 0, 0, 1, 1, '', 'FIELD_ADDRESS', ''),
(9, 'text', 9, 1, 10, 100, 'State', 'Your state', 1, 0, 1, 1, '', 'FIELD_STATE', ''),
(10, 'text', 10, 1, 10, 100, 'City / Town', 'Your city or town name', 1, 1, 1, 1, '', 'FIELD_CITY', ''),
(11, 'country', 11, 1, 10, 100, 'Country', 'Your country', 1, 1, 1, 1, 'Afghanistan\nAlbania\nAlgeria\nAmerican Samoa\nAndorra\nAngola\nAnguilla\nAntarctica\nAntigua and Barbuda\nArgentina\nArmenia\nAruba\nAustralia\nAustria\nAzerbaijan\nBahamas\nBahrain\nBangladesh\nBarbados\nBelarus\nBelgium\nBelize\nBenin\nBermuda\nBhutan\nBolivia\nBosnia and Herzegovina\nBotswana\nBouvet Island\nBrazil\nBritish Indian Ocean Territory\nBrunei Darussalam\nBulgaria\nBurkina Faso\nBurundi\nCambodia\nCameroon\nCanada\nCape Verde\nCayman Islands\nCentral African Republic\nChad\nChile\nChina\nChristmas Island\nCocos (Keeling) Islands\nColombia\nComoros\nCongo\nCook Islands\nCosta Rica\nCote D''Ivoire (Ivory Coast)\nCroatia (Hrvatska)\nCuba\nCyprus\nCzechoslovakia (former)\nCzech Republic\nDenmark\nDjibouti\nDominica\nDominican Republic\nEast Timor\nEcuador\nEgypt\nEl Salvador\nEquatorial Guinea\nEritrea\nEstonia\nEthiopia\nFalkland Islands (Malvinas)\nFaroe Islands\nFiji\nFinland\nFrance\nFrance, Metropolitan\nFrench Guiana\nFrench Polynesia\nFrench Southern Territories\nGabon\nGambia\nGeorgia\nGermany\nGhana\nGibraltar\nGreat Britain (UK)\nGreece\nGreenland\nGrenada\nGuadeloupe\nGuam\nGuatemala\nGuinea\nGuinea-Bissau\nGuyana\nHaiti\nHeard and McDonald Islands\nHonduras\nHong Kong\nHungary\nIceland\nIndia\nIndonesia\nIran\nIraq\nIreland\nIsrael\nItaly\nJamaica\nJapan\nJordan\nKazakhstan\nKenya\nKiribati\nKorea, North\nSouth Korea\nKuwait\nKyrgyzstan\nLaos\nLatvia\nLebanon\nLesotho\nLiberia\nLibya\nLiechtenstein\nLithuania\nLuxembourg\nMacau\nMacedonia\nMadagascar\nMalawi\nMalaysia\nMaldives\nMali\nMalta\nMarshall Islands\nMartinique\nMauritania\nMauritius\nMayotte\nMexico\nMicronesia\nMoldova\nMonaco\nMongolia\nMontserrat\nMorocco\nMozambique\nMyanmar\nNamibia\nNauru\nNepal\nNetherlands\nNetherlands Antilles\nNeutral Zone\nNew Caledonia\nNew Zealand\nNicaragua\nNiger\nNigeria\nNiue\nNorfolk Island\nNorthern Mariana Islands\nNorway\nOman\nPakistan\nPalau\nPanama\nPapua New Guinea\nParaguay\nPeru\nPhilippines\nPitcairn\nPoland\nPortugal\nPuerto Rico\nQatar\nReunion\nRomania\nRussian Federation\nRwanda\nSaint Kitts and Nevis\nSaint Lucia\nSaint Vincent and the Grenadines\nSamoa\nSan Marino\nSao Tome and Principe\nSaudi Arabia\nSenegal\nSeychelles\nS. Georgia and S. Sandwich Isls.\nSierra Leone\nSingapore\nSlovak Republic\nSlovenia\nSolomon Islands\nSomalia\nSouth Africa\nSpain\nSri Lanka\nSt. Helena\nSt. Pierre and Miquelon\nSudan\nSuriname\nSvalbard and Jan Mayen Islands\nSwaziland\nSweden\nSwitzerland\nSyria\nTaiwan\nTajikistan\nTanzania\nThailand\nTogo\nTokelau\nTonga\nTrinidad and Tobago\nTunisia\nTurkey\nTurkmenistan\nTurks and Caicos Islands\nTuvalu\nUganda\nUkraine\nUnited Arab Emirates\nUnited Kingdom\nUnited States\nUruguay\nUS Minor Outlying Islands\nUSSR (former)\nUzbekistan\nVanuatu\nVatican City State (Holy Sea)\nVenezuela\nViet Nam\nVirgin Islands (British)\nVirgin Islands (U.S.)\nWallis and Futuna Islands\nWestern Sahara\nYemen\nYugoslavia\nZaire\nZambia\nZimbabwe', 'FIELD_COUNTRY', ''),
(12, 'url', 12, 0, 10, 100, 'Website', 'Your website', 0, 0, 1, 1, '', 'FIELD_WEBSITE', ''),
(13, 'group', 13, 0, 10, 100, 'Education', 'Educations', 0, 0, 1, 1, '', '', ''),
(14, 'text', 14, 0, 10, 200, 'College / University', 'Your college or university name', 0, 0, 1, 1, '', 'FIELD_COLLEGE', ''),
(15, 'text', 15, 0, 5, 100, 'Graduation Year', 'Graduation year', 0, 0, 1, 1, '', 'FIELD_GRADUATION', '');

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_community_fields_values`
--

CREATE TABLE IF NOT EXISTS `n1wr9_community_fields_values` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `field_id` int(10) NOT NULL,
  `value` text NOT NULL,
  `access` tinyint(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `field_id` (`field_id`),
  KEY `user_id` (`user_id`),
  KEY `idx_user_fieldid` (`user_id`,`field_id`),
  KEY `access` (`access`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `n1wr9_community_fields_values`
--

INSERT INTO `n1wr9_community_fields_values` (`id`, `user_id`, `field_id`, `value`, `access`) VALUES
(1, 312, 2, 'COM_COMMUNITY_MALE', 10),
(2, 312, 3, '1993-6-2 23:59:59', 10),
(3, 312, 4, 'тестовый', 10),
(4, 312, 9, '', 10),
(5, 312, 10, 'Киров', 10),
(6, 312, 11, 'COM_COMMUNITY_LANG_NAME_RUSSIANFEDERATION', 10),
(7, 316, 2, 'COM_COMMUNITY_MALE', 10),
(8, 316, 3, '2016-5-1 23:59:59', 10),
(9, 316, 4, 'scsac', 10),
(10, 316, 9, '', 10),
(11, 316, 10, 'Киров', 10),
(12, 316, 11, 'COM_COMMUNITY_LANG_NAME_ALBANIA', 10);

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_community_files`
--

CREATE TABLE IF NOT EXISTS `n1wr9_community_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `groupid` int(11) NOT NULL,
  `discussionid` int(11) NOT NULL,
  `bulletinid` int(11) NOT NULL,
  `eventid` int(11) NOT NULL,
  `profileid` int(11) NOT NULL,
  `messageid` int(11) NOT NULL,
  `filepath` varchar(255) NOT NULL,
  `filesize` int(11) NOT NULL,
  `hits` int(11) NOT NULL,
  `storage` varchar(64) NOT NULL,
  `creator` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `discussionid` (`discussionid`),
  KEY `groupid` (`groupid`),
  KEY `creator` (`creator`),
  KEY `bulletinid` (`bulletinid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_community_groups`
--

CREATE TABLE IF NOT EXISTS `n1wr9_community_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `published` tinyint(1) NOT NULL,
  `ownerid` int(11) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `summary` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `approvals` tinyint(1) NOT NULL,
  `unlisted` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `avatar` text NOT NULL,
  `thumb` text NOT NULL,
  `cover` text NOT NULL,
  `discusscount` int(11) NOT NULL DEFAULT '0',
  `wallcount` int(11) NOT NULL DEFAULT '0',
  `membercount` int(11) NOT NULL DEFAULT '0',
  `params` text NOT NULL,
  `hits` int(11) NOT NULL,
  `storage` varchar(64) NOT NULL DEFAULT 'file',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_community_groups_bulletins`
--

CREATE TABLE IF NOT EXISTS `n1wr9_community_groups_bulletins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `groupid` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `published` tinyint(1) NOT NULL,
  `title` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL,
  `params` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `groupid` (`groupid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_community_groups_category`
--

CREATE TABLE IF NOT EXISTS `n1wr9_community_groups_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `n1wr9_community_groups_category`
--

INSERT INTO `n1wr9_community_groups_category` (`id`, `parent`, `name`, `description`) VALUES
(1, 0, 'General', 'General group category.'),
(2, 0, 'Internet', 'Internet group category.'),
(3, 0, 'Business', 'Business groups category'),
(4, 0, 'Automotive', 'Automotive groups category'),
(5, 0, 'Music', 'Music groups category');

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_community_groups_discuss`
--

CREATE TABLE IF NOT EXISTS `n1wr9_community_groups_discuss` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parentid` int(11) NOT NULL DEFAULT '0',
  `groupid` int(11) NOT NULL,
  `creator` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `title` text NOT NULL,
  `message` text NOT NULL,
  `lastreplied` datetime NOT NULL,
  `lock` tinyint(1) NOT NULL DEFAULT '0',
  `params` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `groupid` (`groupid`),
  KEY `parentid` (`parentid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_community_groups_invite`
--

CREATE TABLE IF NOT EXISTS `n1wr9_community_groups_invite` (
  `groupid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `creator` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_community_groups_members`
--

CREATE TABLE IF NOT EXISTS `n1wr9_community_groups_members` (
  `groupid` int(11) NOT NULL,
  `memberid` int(11) NOT NULL,
  `approved` int(11) NOT NULL,
  `permissions` int(1) NOT NULL,
  KEY `groupid` (`groupid`),
  KEY `idx_memberid` (`memberid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_community_group_stats`
--

CREATE TABLE IF NOT EXISTS `n1wr9_community_group_stats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gid` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `count` int(11) NOT NULL,
  `date` date NOT NULL,
  `params` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_community_hashtag`
--

CREATE TABLE IF NOT EXISTS `n1wr9_community_hashtag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag` varchar(128) NOT NULL,
  `params` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tag` (`tag`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_community_invitations`
--

CREATE TABLE IF NOT EXISTS `n1wr9_community_invitations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `callback` varchar(255) NOT NULL,
  `cid` int(11) NOT NULL,
  `users` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_community_likes`
--

CREATE TABLE IF NOT EXISTS `n1wr9_community_likes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `element` varchar(200) NOT NULL,
  `uid` int(10) NOT NULL,
  `like` text NOT NULL,
  `dislike` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `element` (`element`,`uid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `n1wr9_community_likes`
--

INSERT INTO `n1wr9_community_likes` (`id`, `element`, `uid`, `like`, `dislike`) VALUES
(1, 'com_easyblog', 2, '312', ''),
(2, 'profile', 312, '312', '');

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_community_location_cache`
--

CREATE TABLE IF NOT EXISTS `n1wr9_community_location_cache` (
  `address` varchar(255) NOT NULL,
  `latitude` float(10,6) NOT NULL DEFAULT '255.000000',
  `longitude` float(10,6) NOT NULL DEFAULT '255.000000',
  `data` text NOT NULL,
  `status` varchar(2) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_community_mailq`
--

CREATE TABLE IF NOT EXISTS `n1wr9_community_mailq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `recipient` text NOT NULL,
  `subject` text NOT NULL,
  `body` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created` datetime NOT NULL,
  `template` varchar(64) NOT NULL,
  `email_type` text,
  `params` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `status` (`status`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_community_memberlist`
--

CREATE TABLE IF NOT EXISTS `n1wr9_community_memberlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `condition` varchar(255) NOT NULL,
  `avataronly` int(11) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_community_memberlist_criteria`
--

CREATE TABLE IF NOT EXISTS `n1wr9_community_memberlist_criteria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `listid` int(11) NOT NULL,
  `field` varchar(255) NOT NULL,
  `condition` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `listid` (`listid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_community_moods`
--

CREATE TABLE IF NOT EXISTS `n1wr9_community_moods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `description` varchar(128) NOT NULL,
  `image` varchar(256) DEFAULT NULL,
  `custom` tinyint(4) NOT NULL,
  `published` tinyint(4) NOT NULL DEFAULT '1',
  `allowcustomtext` tinyint(4) NOT NULL DEFAULT '0',
  `ordering` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `n1wr9_community_moods`
--

INSERT INTO `n1wr9_community_moods` (`id`, `title`, `description`, `image`, `custom`, `published`, `allowcustomtext`, `ordering`) VALUES
(1, 'happy', 'COM_COMMUNITY_MOOD_HAPPY', NULL, 0, 1, 0, 0),
(2, 'meh', 'COM_COMMUNITY_MOOD_MEH', NULL, 0, 1, 0, 0),
(3, 'sad', 'COM_COMMUNITY_MOOD_SAD', NULL, 0, 1, 0, 0),
(4, 'loved', 'COM_COMMUNITY_MOOD_LOVED', NULL, 0, 1, 0, 0),
(5, 'excited', 'COM_COMMUNITY_MOOD_EXCITED', NULL, 0, 1, 0, 0),
(6, 'pretty', 'COM_COMMUNITY_MOOD_PRETTY', NULL, 0, 1, 0, 0),
(7, 'tired', 'COM_COMMUNITY_MOOD_TIRED', NULL, 0, 1, 0, 0),
(8, 'angry', 'COM_COMMUNITY_MOOD_ANGRY', NULL, 0, 1, 0, 0),
(9, 'speachless', 'COM_COMMUNITY_MOOD_SPEACHLESS', NULL, 0, 1, 0, 0),
(10, 'shocked', 'COM_COMMUNITY_MOOD_SHOCKED', NULL, 0, 1, 0, 0),
(11, 'irretated', 'COM_COMMUNITY_MOOD_IRRETATED', NULL, 0, 1, 0, 0),
(12, 'sick', 'COM_COMMUNITY_MOOD_SICK', NULL, 0, 1, 0, 0),
(13, 'annoyed', 'COM_COMMUNITY_MOOD_ANNOYED', NULL, 0, 1, 0, 0),
(14, 'relieved', 'COM_COMMUNITY_MOOD_RELIEVED', NULL, 0, 1, 0, 0),
(15, 'blessed', 'COM_COMMUNITY_MOOD_BLESSED', NULL, 0, 1, 0, 0),
(16, 'bored', 'COM_COMMUNITY_MOOD_BORED', NULL, 0, 1, 0, 0),
(19, 'COM_COMMUNITY_MOOD_SHORT_HAPPY', 'COM_COMMUNITY_MOOD_HAPPY', 'png', 1, 1, 0, 0),
(20, 'COM_COMMUNITY_MOOD_SHORT_SAD', 'COM_COMMUNITY_MOOD_SAD', 'png', 1, 1, 0, 0),
(21, 'COM_COMMUNITY_MOOD_SHORT_COOL', 'COM_COMMUNITY_MOOD_COOL', 'png', 1, 1, 0, 0),
(22, 'COM_COMMUNITY_MOOD_SHORT_IRRITATED', 'COM_COMMUNITY_MOOD_IRRITATED', 'png', 1, 1, 0, 0),
(23, 'COM_COMMUNITY_MOOD_SHORT_ANNOYED', 'COM_COMMUNITY_MOOD_ANNOYED', 'png', 1, 1, 0, 0),
(24, 'COM_COMMUNITY_MOOD_SHORT_SHOCKED', 'COM_COMMUNITY_MOOD_SHOCKED', 'png', 1, 1, 0, 0),
(25, 'COM_COMMUNITY_MOOD_SHORT_AMUSED', 'COM_COMMUNITY_MOOD_AMUSED', 'png', 1, 1, 0, 0),
(26, 'COM_COMMUNITY_MOOD_SHORT_SPEECHLESS', 'COM_COMMUNITY_MOOD_SPEECHLESS', 'png', 1, 1, 0, 0),
(27, 'COM_COMMUNITY_MOOD_SHORT_RICH', 'COM_COMMUNITY_MOOD_RICH', 'png', 1, 1, 0, 0),
(28, 'COM_COMMUNITY_MOOD_SHORT_CHEEKY', 'COM_COMMUNITY_MOOD_CHEEKY', 'png', 1, 1, 0, 0),
(29, 'COM_COMMUNITY_MOOD_SHORT_ANGRY', 'COM_COMMUNITY_MOOD_ANGRY', 'png', 1, 1, 0, 0),
(30, 'COM_COMMUNITY_MOOD_SHORT_HUNGRY', 'COM_COMMUNITY_MOOD_HUNGRY', 'png', 1, 1, 0, 0),
(31, 'COM_COMMUNITY_MOOD_SHORT_FESTIVE', 'COM_COMMUNITY_MOOD_FESTIVE', 'png', 1, 1, 0, 0),
(32, 'COM_COMMUNITY_MOOD_SHORT_ROYAL', 'COM_COMMUNITY_MOOD_ROYAL', 'png', 1, 1, 0, 0),
(33, 'COM_COMMUNITY_MOOD_SHORT_LOVE', 'COM_COMMUNITY_MOOD_LOVE', 'png', 1, 1, 0, 0),
(34, 'COM_COMMUNITY_MOOD_SHORT_AFRAID', 'COM_COMMUNITY_MOOD_AFRAID', 'png', 1, 1, 0, 0),
(35, 'COM_COMMUNITY_MOOD_SHORT_POWERFUL', 'COM_COMMUNITY_MOOD_POWERFUL', 'png', 1, 1, 0, 0),
(36, 'COM_COMMUNITY_MOOD_SHORT_INVISIBLE', 'COM_COMMUNITY_MOOD_INVISIBLE', 'png', 1, 1, 0, 0),
(37, 'COM_COMMUNITY_MOOD_SHORT_SWEET', 'COM_COMMUNITY_MOOD_SWEET', 'png', 1, 1, 0, 0),
(38, 'COM_COMMUNITY_MOOD_SHORT_THIRSTY', 'COM_COMMUNITY_MOOD_THIRSTY', 'png', 1, 1, 0, 0),
(39, 'COM_COMMUNITY_MOOD_SHORT_CLEAN', 'COM_COMMUNITY_MOOD_CLEAN', 'png', 1, 1, 0, 0),
(40, 'COM_COMMUNITY_MOOD_SHORT_WATCHING', 'COM_COMMUNITY_MOOD_WATCHING', 'png', 1, 1, 0, 0),
(41, 'COM_COMMUNITY_MOOD_SHORT_BORED', 'COM_COMMUNITY_MOOD_BORED', 'png', 1, 1, 0, 0),
(42, 'COM_COMMUNITY_MOOD_SHORT_BUMMED', 'COM_COMMUNITY_MOOD_BUMMED', 'png', 1, 1, 0, 0),
(43, 'COM_COMMUNITY_MOOD_SHORT_INNOVATIVE', 'COM_COMMUNITY_MOOD_INNOVATIVE', 'png', 1, 1, 0, 0),
(44, 'COM_COMMUNITY_MOOD_SHORT_LUCKY', 'COM_COMMUNITY_MOOD_LUCKY', 'png', 1, 1, 0, 0),
(45, 'COM_COMMUNITY_MOOD_SHORT_FOCUSED', 'COM_COMMUNITY_MOOD_FOCUSED', 'png', 1, 1, 0, 0),
(46, 'COM_COMMUNITY_MOOD_SHORT_SURFING', 'COM_COMMUNITY_MOOD_SURFING', 'png', 1, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_community_msg`
--

CREATE TABLE IF NOT EXISTS `n1wr9_community_msg` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `from` int(10) unsigned NOT NULL,
  `parent` int(10) unsigned NOT NULL,
  `deleted` tinyint(3) unsigned DEFAULT '0',
  `from_name` varchar(45) NOT NULL,
  `posted_on` datetime DEFAULT NULL,
  `subject` tinytext NOT NULL,
  `body` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_community_msg_recepient`
--

CREATE TABLE IF NOT EXISTS `n1wr9_community_msg_recepient` (
  `msg_id` int(10) unsigned NOT NULL,
  `msg_parent` int(10) unsigned NOT NULL DEFAULT '0',
  `msg_from` int(10) unsigned NOT NULL,
  `to` int(10) unsigned NOT NULL,
  `bcc` tinyint(3) unsigned DEFAULT '0',
  `is_read` tinyint(3) unsigned DEFAULT '0',
  `deleted` tinyint(3) unsigned DEFAULT '0',
  UNIQUE KEY `un` (`msg_id`,`to`),
  KEY `msg_id` (`msg_id`),
  KEY `to` (`to`),
  KEY `idx_isread_to_deleted` (`is_read`,`to`,`deleted`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_community_notifications`
--

CREATE TABLE IF NOT EXISTS `n1wr9_community_notifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `actor` int(11) NOT NULL,
  `target` int(11) NOT NULL,
  `content` text NOT NULL,
  `type` varchar(200) NOT NULL,
  `cmd_type` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created` datetime NOT NULL,
  `params` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `created` (`created`),
  KEY `status` (`status`),
  KEY `type` (`type`),
  KEY `target` (`target`),
  KEY `actor` (`actor`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_community_oauth`
--

CREATE TABLE IF NOT EXISTS `n1wr9_community_oauth` (
  `userid` int(11) NOT NULL,
  `requesttoken` text NOT NULL,
  `accesstoken` text NOT NULL,
  `app` varchar(255) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_community_photos`
--

CREATE TABLE IF NOT EXISTS `n1wr9_community_photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `albumid` int(11) NOT NULL,
  `caption` text NOT NULL,
  `published` tinyint(1) NOT NULL,
  `creator` int(11) NOT NULL,
  `permissions` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `original` varchar(255) NOT NULL,
  `filesize` int(11) NOT NULL DEFAULT '0',
  `storage` varchar(64) NOT NULL DEFAULT 'file',
  `created` datetime NOT NULL,
  `ordering` int(11) NOT NULL DEFAULT '0',
  `hits` int(11) NOT NULL DEFAULT '0',
  `status` varchar(200) NOT NULL,
  `params` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `albumid` (`albumid`),
  KEY `idx_storage` (`storage`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `n1wr9_community_photos`
--

INSERT INTO `n1wr9_community_photos` (`id`, `albumid`, `caption`, `published`, `creator`, `permissions`, `image`, `thumbnail`, `original`, `filesize`, `storage`, `created`, `ordering`, `hits`, `status`, `params`) VALUES
(1, 1, '', 1, 312, '', 'images/avatar/00e63bc3ba973b4097c067282fb2267c.png', 'images/avatar/thumb_00e63bc3ba973b4097c067282fb2267c.png', 'images/avatar/original_00e63bc3ba973b4097c067282fb2267c.png', 140089, 'file', '2016-04-14 09:38:02', 0, 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_community_photos_albums`
--

CREATE TABLE IF NOT EXISTS `n1wr9_community_photos_albums` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `photoid` int(11) NOT NULL,
  `creator` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `permissions` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `path` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `groupid` int(11) NOT NULL DEFAULT '0',
  `eventid` int(11) NOT NULL DEFAULT '0',
  `hits` int(11) NOT NULL DEFAULT '0',
  `location` text NOT NULL,
  `latitude` float(10,6) NOT NULL DEFAULT '255.000000',
  `longitude` float(10,6) NOT NULL DEFAULT '255.000000',
  `default` tinyint(1) NOT NULL DEFAULT '0',
  `params` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `creator` (`creator`),
  KEY `idx_type` (`type`),
  KEY `idx_albumtype` (`id`,`type`),
  KEY `idx_creatortype` (`creator`,`type`),
  KEY `idx_groupid` (`groupid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `n1wr9_community_photos_albums`
--

INSERT INTO `n1wr9_community_photos_albums` (`id`, `photoid`, `creator`, `name`, `description`, `permissions`, `created`, `path`, `type`, `groupid`, `eventid`, `hits`, `location`, `latitude`, `longitude`, `default`, `params`) VALUES
(1, 1, 312, 'Обложка альбома s', '', '0', '2016-04-14 09:37:17', 'images/avatar/profile/', 'profile.avatar', 0, 0, 0, '', 255.000000, 255.000000, 0, '{"count":"1","lastupdated":"2016-04-14 09:38:02","thumbnail":"images\\/avatar\\/thumb_00e63bc3ba973b4097c067282fb2267c.png"}'),
(2, 0, 312, 'Обложка профиля Вячеслав', '', '0', '2016-04-14 09:37:17', 'images/cover/profile/312/', 'profile.Cover', 0, 0, 0, '', 255.000000, 255.000000, 0, '{"count":"0","lastupdated":"2016-04-14 09:38:42","thumbnail":"\\/components\\/com_community\\/assets\\/photo_thumb.png"}'),
(3, 0, 312, 'Stream Photos', '', '0', '2016-04-14 09:37:17', 'images/photos/312/', 'profile', 0, 0, 0, '', 255.000000, 255.000000, 1, '{"count":"0","lastupdated":"2016-04-14 09:38:42","thumbnail":"\\/components\\/com_community\\/assets\\/photo_thumb.png"}'),
(4, 0, 315, 'Обложка альбома s', '', '0', '2016-04-26 15:05:36', 'images/avatar/profile/', 'profile.avatar', 0, 0, 0, '', 255.000000, 255.000000, 0, '{"count":"0","lastupdated":"2016-04-26 15:05:36"}'),
(5, 0, 315, 'Обложка профиля ыс', '', '0', '2016-04-26 15:05:36', 'images/cover/profile/315/', 'profile.Cover', 0, 0, 0, '', 255.000000, 255.000000, 0, '{"count":"0","lastupdated":"2016-05-17 13:19:08","thumbnail":"\\/components\\/com_community\\/assets\\/photo_thumb.png"}'),
(6, 0, 315, 'Stream Photos', '', '0', '2016-04-26 15:05:36', 'images/photos/315/', 'profile', 0, 0, 0, '', 255.000000, 255.000000, 1, '{"count":"0","lastupdated":"2016-05-17 13:19:08","thumbnail":"\\/components\\/com_community\\/assets\\/photo_thumb.png"}'),
(7, 0, 316, 'Обложка альбома s', '', '0', '2016-05-05 09:16:08', 'images/avatar/profile/', 'profile.avatar', 0, 0, 0, '', 255.000000, 255.000000, 0, '{"count":"0","lastupdated":"2016-05-05 09:16:08"}'),
(8, 0, 316, 'Обложка профиля Scsc', '', '0', '2016-05-05 09:16:08', 'images/cover/profile/316/', 'profile.Cover', 0, 0, 0, '', 255.000000, 255.000000, 0, '{"count":"0","lastupdated":"2016-05-17 13:19:07","thumbnail":"\\/components\\/com_community\\/assets\\/photo_thumb.png"}'),
(9, 0, 316, 'Stream Photos', '', '0', '2016-05-05 09:16:08', 'images/photos/316/', 'profile', 0, 0, 0, '', 255.000000, 255.000000, 1, '{"count":"0","lastupdated":"2016-05-17 13:19:08","thumbnail":"\\/components\\/com_community\\/assets\\/photo_thumb.png"}');

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_community_photos_tag`
--

CREATE TABLE IF NOT EXISTS `n1wr9_community_photos_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `photoid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `position` varchar(50) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_photoid` (`photoid`),
  KEY `idx_userid` (`userid`),
  KEY `idx_created_by` (`created_by`),
  KEY `idx_photo_user` (`photoid`,`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_community_photos_tokens`
--

CREATE TABLE IF NOT EXISTS `n1wr9_community_photos_tokens` (
  `userid` int(11) NOT NULL,
  `token` varchar(200) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_community_photo_stats`
--

CREATE TABLE IF NOT EXISTS `n1wr9_community_photo_stats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `count` int(11) NOT NULL,
  `date` date NOT NULL,
  `params` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_community_profiles`
--

CREATE TABLE IF NOT EXISTS `n1wr9_community_profiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `approvals` tinyint(3) NOT NULL,
  `published` tinyint(3) NOT NULL,
  `avatar` text NOT NULL,
  `watermark` text NOT NULL,
  `watermark_hash` varchar(255) NOT NULL,
  `watermark_location` text NOT NULL,
  `thumb` text NOT NULL,
  `created` datetime NOT NULL,
  `create_groups` tinyint(1) DEFAULT '1',
  `create_events` int(11) DEFAULT '1',
  `profile_lock` tinyint(1) DEFAULT '0',
  `ordering` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `approvals` (`approvals`,`published`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `n1wr9_community_profiles`
--

INSERT INTO `n1wr9_community_profiles` (`id`, `name`, `description`, `approvals`, `published`, `avatar`, `watermark`, `watermark_hash`, `watermark_location`, `thumb`, `created`, `create_groups`, `create_events`, `profile_lock`, `ordering`) VALUES
(1, 'test', '', 0, 1, 'images/watermarks/ef7dc25c1f5ba7f94995618e.jpg', '', '', '', 'images/watermarks/thumb_ef7dc25c1f5ba7f94995618e.jpg', '2016-05-25 09:58:01', 0, 0, 0, 1),
(2, 'test2', '', 0, 1, 'images/watermarks/d5f19c062c37b8c42c0a7d21.jpg', '', '', '', 'images/watermarks/thumb_d5f19c062c37b8c42c0a7d21.jpg', '2016-05-25 09:58:11', 0, 0, 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_community_profiles_fields`
--

CREATE TABLE IF NOT EXISTS `n1wr9_community_profiles_fields` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent` int(11) NOT NULL,
  `field_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `multiprofile_id` (`parent`),
  KEY `field_id` (`field_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `n1wr9_community_profiles_fields`
--

INSERT INTO `n1wr9_community_profiles_fields` (`id`, `parent`, `field_id`) VALUES
(1, 1, 2),
(2, 1, 3),
(3, 1, 4),
(4, 1, 1),
(5, 2, 6),
(6, 2, 7),
(7, 2, 8),
(8, 2, 9),
(9, 2, 10),
(10, 2, 11),
(11, 2, 12),
(12, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_community_profile_stats`
--

CREATE TABLE IF NOT EXISTS `n1wr9_community_profile_stats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `count` int(11) NOT NULL,
  `date` date NOT NULL,
  `params` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `n1wr9_community_profile_stats`
--

INSERT INTO `n1wr9_community_profile_stats` (`id`, `uid`, `type`, `count`, `date`, `params`, `created_at`) VALUES
(1, 311, 'view', 1, '2016-04-14', '', '2016-04-14 09:34:10'),
(2, 312, 'view', 1, '2016-04-14', '', '2016-04-14 09:38:42'),
(3, 312, 'like', 1, '2016-04-14', '', '2016-04-14 11:57:11'),
(4, 312, 'view', 1, '2016-05-17', '', '2016-05-17 13:19:08'),
(5, 312, 'view', 7, '2016-05-18', '', '2016-05-18 10:47:46');

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_community_register`
--

CREATE TABLE IF NOT EXISTS `n1wr9_community_register` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `token` varchar(200) NOT NULL,
  `name` varchar(255) NOT NULL,
  `firstname` varchar(180) NOT NULL,
  `lastname` varchar(180) NOT NULL,
  `username` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created` datetime DEFAULT NULL,
  `ip` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `n1wr9_community_register`
--

INSERT INTO `n1wr9_community_register` (`id`, `token`, `name`, `firstname`, `lastname`, `username`, `email`, `password`, `created`, `ip`) VALUES
(24, '96800f7d7cc7342735b441db99fbb224', 'sdcsdsdv', '', '', 'sdcsddf43', 'testcdns@mail.ru', '8ed0a499b30c2663ec3b4b2289b1234d:S01m6nLTpLDjh3r2yxGTHP8kmqwwpxL8', '2016-05-25 10:06:35', '127.0.0.1'),
(23, '2ab8e6296f9af2dbd7dd60da91ec8639', 'vdfvdfv', '', '', 'fdvdfv', 'dfvdfvdfbgn@mail.ru', 'd330a6831961f36f6cef46d76476fe8f:SsCJ42gju1yVesU9utCJsCluXwo2oWzX', '2016-05-25 10:01:41', '127.0.0.1'),
(22, '5011984e45107a1c6e96e2f8787109bb', 'sdsdv', '', '', 'sdvdsv', 'sdvsdv@mail.ru', '7589f9ef22851a42bf750aafb490b4b4:MGuTd0Vuh1itYiNe1hvV7Syr63MuXHQt', '2016-05-25 09:59:22', '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_community_register_auth_token`
--

CREATE TABLE IF NOT EXISTS `n1wr9_community_register_auth_token` (
  `token` varchar(200) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `auth_key` varchar(200) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`token`),
  KEY `ip` (`ip`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `n1wr9_community_register_auth_token`
--

INSERT INTO `n1wr9_community_register_auth_token` (`token`, `ip`, `auth_key`, `created`) VALUES
('96800f7d7cc7342735b441db99fbb224', '127.0.0.1', 'f94169a8155d4011bd0b1890fe04c9ff', '2016-05-25 10:06:14'),
('f6eb94670ba9846d560c94ac8c90f062', '127.0.0.1', '52e64d465584a6e91d693978e3e0561c', '2016-05-25 10:06:11'),
('2ab8e6296f9af2dbd7dd60da91ec8639', '127.0.0.1', 'e8fb399f16815a08343396ce26422dc7', '2016-05-25 10:01:28'),
('5011984e45107a1c6e96e2f8787109bb', '127.0.0.1', '90fad68020f3ecbbfa7e8c766f9710fe', '2016-05-25 09:59:09');

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_community_reports`
--

CREATE TABLE IF NOT EXISTS `n1wr9_community_reports` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniquestring` varchar(200) NOT NULL,
  `link` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_community_reports_actions`
--

CREATE TABLE IF NOT EXISTS `n1wr9_community_reports_actions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reportid` int(11) NOT NULL,
  `label` varchar(255) NOT NULL,
  `method` varchar(255) NOT NULL,
  `parameters` varchar(255) NOT NULL,
  `defaultaction` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_community_reports_reporter`
--

CREATE TABLE IF NOT EXISTS `n1wr9_community_reports_reporter` (
  `reportid` int(11) NOT NULL,
  `message` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `ip` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_community_storage_s3`
--

CREATE TABLE IF NOT EXISTS `n1wr9_community_storage_s3` (
  `storageid` varchar(255) NOT NULL,
  `resource_path` varchar(255) NOT NULL,
  UNIQUE KEY `storageid` (`storageid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_community_tags`
--

CREATE TABLE IF NOT EXISTS `n1wr9_community_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `element` varchar(200) NOT NULL,
  `userid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `tag` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_community_tags_words`
--

CREATE TABLE IF NOT EXISTS `n1wr9_community_tags_words` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag` varchar(200) NOT NULL,
  `count` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_community_theme`
--

CREATE TABLE IF NOT EXISTS `n1wr9_community_theme` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(32) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `key` (`key`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `n1wr9_community_theme`
--

INSERT INTO `n1wr9_community_theme` (`id`, `key`, `value`) VALUES
(1, 'scss-default', '{"colors":{"scss-color-primary":"5677FC","scss-color-secondary":"259B24","scss-color-neutral":"ECF0F1","scss-color-important":"E74C3C","scss-color-info":"E67E22","scss-color-background":"ECF0F1","scss-color-toolbar":"F5F7F7","scss-color-focus-background":"FFFFFF","scss-color-postbox":"FFFFFF","scss-color-postbox-tab":"F5F5F5","scss-color-module-background":"FFFFFF","scss-color-moduletab-background":"E0E7E8","scss-color-dropdown-background":"FFFFFF","scss-color-dropdown-border":"E3E5E7"},"general":{"scss-stream-position":"right","scss-button-style":"flat","scss-avatar-shape":"circle","scss-avatar-style":"bordered"}}');

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_community_userpoints`
--

CREATE TABLE IF NOT EXISTS `n1wr9_community_userpoints` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rule_name` varchar(255) NOT NULL DEFAULT '',
  `rule_description` text NOT NULL,
  `rule_plugin` varchar(255) NOT NULL DEFAULT '',
  `action_string` varchar(255) NOT NULL DEFAULT '',
  `component` varchar(255) NOT NULL DEFAULT '',
  `access` tinyint(1) NOT NULL DEFAULT '1',
  `points` int(11) NOT NULL DEFAULT '0',
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `system` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `n1wr9_community_userpoints`
--

INSERT INTO `n1wr9_community_userpoints` (`id`, `rule_name`, `rule_description`, `rule_plugin`, `action_string`, `component`, `access`, `points`, `published`, `system`) VALUES
(1, 'Profile Application Added', 'Assign number of points and select wether activity stream item will be created when user add profile application.', 'com_community', 'application.add', '', 1, 0, 1, 1),
(2, 'Profile Application Removed', 'Assign number of points and select wether activity stream item will be created when user remove profile application.', 'com_community', 'application.remove', '', 1, 0, 0, 1),
(3, 'Photo Upload', 'Assign number of points for photo upload action and select wether activity stream item will be created.', 'com_community', 'photo.upload', '', 1, 0, 1, 1),
(4, 'New Group Created', 'Assign number of points when user create new group and select wether activity stream will be created.', 'com_community', 'group.create', '', 1, 3, 1, 1),
(5, 'New Group Discussion', 'Assign number of points when user open new discussion in group and select wether activity stream item for this action will be created.', 'com_community', 'group.discussion.create', '', 1, 2, 1, 1),
(6, 'User Leave The Group', 'Deduct points when registered user leave a group. * There is no activity stream item for this action.', 'com_community', 'group.leave', '', 1, -1, 1, 1),
(7, 'Friend Request Is Approved', 'Assign number of points when user approve friends request and select wether activity stream item for this action will be created.', 'com_community', 'friends.request.approve', '', 1, 1, 1, 1),
(8, 'New Photo Album Created', 'Assign number of points when user creates new album and select wether activity stream item for this action will be created.', 'com_community', 'album.create', '', 1, 1, 1, 1),
(9, 'Post Group Comment', 'Assign number of points when user post from group''s share box and select wether to create activity stream item for this action.', 'com_community', 'group.wall.create', '', 1, 1, 1, 1),
(10, 'Join Group', 'Assign number of points when user joins the group and select wether to create activity stream item for this action.', 'com_community', 'group.join', '', 1, 1, 1, 1),
(11, 'Reply Group''s Discussion', 'Assign number of points when registered user replied on group''s discussion and select wether to create activity stream item for this action.', 'com_community', 'group.discussion.reply', '', 1, 1, 1, 1),
(12, 'Comment Profile From Share Box', 'Assign number of points when user post from Share Box on other people''s profiles and select wether to create activity stream item for this action.', 'com_community', 'profile.wall.create', '', 1, 1, 1, 1),
(13, 'Post Status From Share Box', 'Assign number of points when user post status from Share Box and select wether to create activity stream item for this action.', 'com_community', 'profile.status.update', '', 1, 1, 1, 1),
(14, 'Profile Updated', 'Assign number of points when profile is updated. There is no activity stream item for this action.', 'com_community', 'profile.save', '', 1, 1, 1, 1),
(15, 'Group Updated', 'Assign number of points when user updates the group information and select wether to create activity stream item for this action.', 'com_community', 'group.updated', '', 1, 1, 1, 1),
(16, 'Change Group Avatar', 'Assign number of points when group admin or owner changes its avatar.', 'com_community', 'group.avatar.upload', '', 1, 0, 1, 1),
(17, 'Create Group''s Announcement', 'Assign number of points when user publish new announcement in group and select wether to create activity stream item for this action.', 'com_community', 'group.news.create', '', 1, 1, 1, 1),
(18, 'Comment Photo', 'Assign number of points when new photo comment is added and select wether to create activity stream item for this action', 'com_community', 'photos.wall.create', '', 1, 1, 1, 1),
(19, 'Remove Friend', 'Deduct points when registered user remove a friend. There is no activity stream item for this action', 'com_community', 'friends.remove', '', 1, 0, 1, 1),
(20, 'Change Profile Picture', 'Assign number of points when user changes profile picture and select wether to create activity stream item for this action', 'com_community', 'profile.avatar.upload', '', 1, 100, 0, 1),
(21, 'Update Profile Privacy', 'Assign number of points when user update profile privacy. There is no activity stream item for this action.', 'com_community', 'profile.privacy.update', '', 1, 0, 1, 1),
(22, 'Reply Private Message', 'Give points when user reply private message. Naturally, activity stream item for this action does not exist.', 'com_community', 'inbox.message.reply', '', 1, 0, 1, 1),
(23, 'New Private Message', 'Give points when user send a new private message.', 'com_community', 'inbox.message.send', '', 1, 0, 1, 1),
(24, 'Remove Group Member', 'Assign number of points when group owner or admin user remove a group memeber.', 'com_community', 'group.member.remove', '', 1, 0, 1, 1),
(25, 'Delete Announcement', 'Deduct points when user remove announcement in group.', 'com_community', 'group.news.remove', '', 1, 0, 1, 1),
(26, 'Remove Wall Comment', 'Deduct points to original poster when wall comment is removed.', 'com_community', 'wall.remove', '', 1, 0, 1, 1),
(27, 'Delete Photo Album', 'Deduct points when user delete photo album.', 'com_community', 'album.remove', '', 1, 0, 1, 1),
(28, 'Delete Photo', 'Deduct points when user delete a photo.', 'com_community', 'photo.remove', '', 1, 0, 1, 1),
(29, 'Event Updated', 'Assign number of points when user update event information.', 'com_community', 'events.update', '', 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_community_users`
--

CREATE TABLE IF NOT EXISTS `n1wr9_community_users` (
  `userid` int(11) NOT NULL,
  `status` text NOT NULL,
  `status_access` int(11) NOT NULL DEFAULT '0',
  `points` int(11) NOT NULL,
  `posted_on` datetime NOT NULL,
  `avatar` text NOT NULL,
  `thumb` text NOT NULL,
  `cover` text NOT NULL,
  `invite` int(11) NOT NULL DEFAULT '0',
  `params` text NOT NULL,
  `view` int(11) NOT NULL DEFAULT '0',
  `friends` text NOT NULL,
  `groups` text NOT NULL,
  `events` text NOT NULL,
  `friendcount` int(11) NOT NULL DEFAULT '0',
  `alias` varchar(255) NOT NULL,
  `latitude` float(10,6) NOT NULL DEFAULT '255.000000',
  `longitude` float(10,6) NOT NULL DEFAULT '255.000000',
  `profile_id` int(11) NOT NULL DEFAULT '0',
  `storage` varchar(64) NOT NULL DEFAULT 'file',
  `watermark_hash` varchar(255) NOT NULL,
  `search_email` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `n1wr9_community_users`
--

INSERT INTO `n1wr9_community_users` (`userid`, `status`, `status_access`, `points`, `posted_on`, `avatar`, `thumb`, `cover`, `invite`, `params`, `view`, `friends`, `groups`, `events`, `friendcount`, `alias`, `latitude`, `longitude`, `profile_id`, `storage`, `watermark_hash`, `search_email`) VALUES
(311, '', 0, 0, '0000-00-00 00:00:00', 'images/watermarks/ef7dc25c1f5ba7f94995618e.jpg', 'images/watermarks/thumb_ef7dc25c1f5ba7f94995618e.jpg', '', 0, '{"notifyEmailSystem":1,"privacyProfileView":0,"privacyPhotoView":0,"privacyFriendsView":0,"privacyGroupsView":"","privacyVideoView":0,"notifyEmailMessage":1,"notifyEmailApps":1,"notifyWallComment":0,"notif_groups_notify_admin":1,"etype_groups_notify_admin":1,"notif_user_profile_delete":1,"etype_user_profile_delete":1,"notif_system_reports_threshold":1,"etype_system_reports_threshold":1,"notif_profile_activity_add_comment":1,"etype_profile_activity_add_comment":1,"notif_profile_activity_reply_comment":1,"etype_profile_activity_reply_comment":1,"notif_profile_status_update":1,"etype_profile_status_update":1,"notif_profile_like":1,"etype_profile_like":1,"notif_profile_stream_like":1,"etype_profile_stream_like":1,"notif_friends_request_connection":1,"etype_friends_request_connection":1,"notif_friends_create_connection":1,"etype_friends_create_connection":1,"notif_inbox_create_message":1,"etype_inbox_create_message":1,"notif_groups_invite":1,"etype_groups_invite":1,"notif_groups_discussion_reply":1,"etype_groups_discussion_reply":1,"notif_groups_wall_create":1,"etype_groups_wall_create":1,"notif_groups_create_discussion":1,"etype_groups_create_discussion":1,"notif_groups_create_news":1,"etype_groups_create_news":1,"notif_groups_create_album":1,"etype_groups_create_album":1,"notif_groups_create_video":1,"etype_groups_create_video":1,"notif_groups_create_event":1,"etype_groups_create_event":1,"notif_groups_sendmail":1,"etype_groups_sendmail":1,"notif_groups_member_approved":1,"etype_groups_member_approved":1,"notif_groups_member_join":1,"etype_groups_member_join":1,"notif_groups_notify_creator":1,"etype_groups_notify_creator":1,"notif_groups_discussion_newfile":1,"etype_groups_discussion_newfile":1,"notif_groups_activity_add_comment":1,"etype_groups_activity_add_comment":1,"notif_events_notify_admin":1,"etype_events_notify_admin":1,"notif_events_invite":1,"etype_events_invite":1,"notif_events_invitation_approved":1,"etype_events_invitation_approved":1,"notif_events_sendmail":1,"etype_events_sendmail":1,"notif_event_notify_creator":0,"etype_event_notify_creator":0,"notif_event_join_request":1,"etype_event_join_request":1,"notif_events_activity_add_comment":0,"etype_events_activity_add_comment":0,"notif_events_wall_create":1,"etype_events_wall_create":1,"notif_videos_submit_wall":1,"etype_videos_submit_wall":1,"notif_videos_reply_wall":1,"etype_videos_reply_wall":1,"notif_videos_tagging":1,"etype_videos_tagging":1,"notif_videos_like":1,"etype_videos_like":1,"notif_videos_convert_success":1,"etype_videos_convert_success":1,"notif_photos_submit_wall":1,"etype_photos_submit_wall":1,"notif_photos_reply_wall":1,"etype_photos_reply_wall":1,"notif_photos_tagging":1,"etype_photos_tagging":1,"notif_photos_like":1,"etype_photos_like":1,"notif_system_messaging":1,"etype_system_messaging":1,"postFacebookStatus":1}', 1, '', '', '', 0, '311:super-user', 255.000000, 255.000000, 0, 'file', '', 1),
(312, '', 0, 2, '0000-00-00 00:00:00', 'images/avatar/184dafd1355580774ee1e3ba.png', 'images/avatar/thumb_184dafd1355580774ee1e3ba.png', '', 0, '{"notifyEmailSystem":1,"privacyProfileView":0,"privacyPhotoView":0,"privacyFriendsView":0,"privacyGroupsView":"","privacyVideoView":0,"notifyEmailMessage":1,"notifyEmailApps":1,"notifyWallComment":0,"notif_groups_notify_admin":1,"etype_groups_notify_admin":1,"notif_user_profile_delete":1,"etype_user_profile_delete":1,"notif_system_reports_threshold":1,"etype_system_reports_threshold":1,"notif_profile_activity_add_comment":1,"etype_profile_activity_add_comment":1,"notif_profile_activity_reply_comment":1,"etype_profile_activity_reply_comment":1,"notif_profile_status_update":1,"etype_profile_status_update":1,"notif_profile_like":1,"etype_profile_like":1,"notif_profile_stream_like":1,"etype_profile_stream_like":1,"notif_friends_request_connection":1,"etype_friends_request_connection":1,"notif_friends_create_connection":1,"etype_friends_create_connection":1,"notif_inbox_create_message":1,"etype_inbox_create_message":1,"notif_groups_invite":1,"etype_groups_invite":1,"notif_groups_discussion_reply":1,"etype_groups_discussion_reply":1,"notif_groups_wall_create":1,"etype_groups_wall_create":1,"notif_groups_create_discussion":1,"etype_groups_create_discussion":1,"notif_groups_create_news":1,"etype_groups_create_news":1,"notif_groups_create_album":1,"etype_groups_create_album":1,"notif_groups_create_video":1,"etype_groups_create_video":1,"notif_groups_create_event":1,"etype_groups_create_event":1,"notif_groups_sendmail":1,"etype_groups_sendmail":1,"notif_groups_member_approved":1,"etype_groups_member_approved":1,"notif_groups_member_join":1,"etype_groups_member_join":1,"notif_groups_notify_creator":1,"etype_groups_notify_creator":1,"notif_groups_discussion_newfile":1,"etype_groups_discussion_newfile":1,"notif_groups_activity_add_comment":1,"etype_groups_activity_add_comment":1,"notif_events_notify_admin":1,"etype_events_notify_admin":1,"notif_events_invite":1,"etype_events_invite":1,"notif_events_invitation_approved":1,"etype_events_invitation_approved":1,"notif_events_sendmail":1,"etype_events_sendmail":1,"notif_event_notify_creator":0,"etype_event_notify_creator":0,"notif_event_join_request":1,"etype_event_join_request":1,"notif_events_activity_add_comment":0,"etype_events_activity_add_comment":0,"notif_events_wall_create":1,"etype_events_wall_create":1,"notif_videos_submit_wall":1,"etype_videos_submit_wall":1,"notif_videos_reply_wall":1,"etype_videos_reply_wall":1,"notif_videos_tagging":1,"etype_videos_tagging":1,"notif_videos_like":1,"etype_videos_like":1,"notif_videos_convert_success":1,"etype_videos_convert_success":1,"notif_photos_submit_wall":1,"etype_photos_submit_wall":1,"notif_photos_reply_wall":1,"etype_photos_reply_wall":1,"notif_photos_tagging":1,"etype_photos_tagging":1,"notif_photos_like":1,"etype_photos_like":1,"notif_system_messaging":1,"etype_system_messaging":1,"postFacebookStatus":1,"lastnotificationlist":"2016-04-14 11:57:46"}', 9, '', '', '', 0, '312:vyacheslav', 58.603531, 49.666798, 0, 'file', '', 1),
(313, '', 0, 0, '0000-00-00 00:00:00', 'images/watermarks/ef7dc25c1f5ba7f94995618e.jpg', 'images/watermarks/thumb_ef7dc25c1f5ba7f94995618e.jpg', '', 0, '{"notifyEmailSystem":1,"privacyProfileView":0,"privacyPhotoView":0,"privacyFriendsView":0,"privacyGroupsView":"","privacyVideoView":0,"notifyEmailMessage":1,"notifyEmailApps":1,"notifyWallComment":0,"notif_groups_notify_admin":1,"etype_groups_notify_admin":1,"notif_user_profile_delete":1,"etype_user_profile_delete":1,"notif_system_reports_threshold":1,"etype_system_reports_threshold":1,"notif_profile_activity_add_comment":1,"etype_profile_activity_add_comment":1,"notif_profile_activity_reply_comment":1,"etype_profile_activity_reply_comment":1,"notif_profile_status_update":1,"etype_profile_status_update":1,"notif_profile_like":1,"etype_profile_like":1,"notif_profile_stream_like":1,"etype_profile_stream_like":1,"notif_friends_request_connection":1,"etype_friends_request_connection":1,"notif_friends_create_connection":1,"etype_friends_create_connection":1,"notif_inbox_create_message":1,"etype_inbox_create_message":1,"notif_photos_submit_wall":1,"etype_photos_submit_wall":1,"notif_photos_reply_wall":1,"etype_photos_reply_wall":1,"notif_photos_tagging":1,"etype_photos_tagging":1,"notif_photos_like":1,"etype_photos_like":1,"notif_system_messaging":1,"etype_system_messaging":1}', 0, '', '', '', 0, '', 255.000000, 255.000000, 0, 'file', '', 1),
(314, '', 0, 0, '0000-00-00 00:00:00', 'images/watermarks/ef7dc25c1f5ba7f94995618e.jpg', 'images/watermarks/thumb_ef7dc25c1f5ba7f94995618e.jpg', '', 0, '{"notifyEmailSystem":1,"privacyProfileView":0,"privacyPhotoView":0,"privacyFriendsView":0,"privacyGroupsView":"","privacyVideoView":0,"notifyEmailMessage":1,"notifyEmailApps":1,"notifyWallComment":0,"notif_groups_notify_admin":1,"etype_groups_notify_admin":1,"notif_user_profile_delete":1,"etype_user_profile_delete":1,"notif_system_reports_threshold":1,"etype_system_reports_threshold":1,"notif_profile_activity_add_comment":1,"etype_profile_activity_add_comment":1,"notif_profile_activity_reply_comment":1,"etype_profile_activity_reply_comment":1,"notif_profile_status_update":1,"etype_profile_status_update":1,"notif_profile_like":1,"etype_profile_like":1,"notif_profile_stream_like":1,"etype_profile_stream_like":1,"notif_friends_request_connection":1,"etype_friends_request_connection":1,"notif_friends_create_connection":1,"etype_friends_create_connection":1,"notif_inbox_create_message":1,"etype_inbox_create_message":1,"notif_photos_submit_wall":1,"etype_photos_submit_wall":1,"notif_photos_reply_wall":1,"etype_photos_reply_wall":1,"notif_photos_tagging":1,"etype_photos_tagging":1,"notif_photos_like":1,"etype_photos_like":1,"notif_system_messaging":1,"etype_system_messaging":1}', 0, '', '', '', 0, '', 255.000000, 255.000000, 0, 'file', '', 1),
(315, '', 0, 2, '0000-00-00 00:00:00', 'images/watermarks/ef7dc25c1f5ba7f94995618e.jpg', 'images/watermarks/thumb_ef7dc25c1f5ba7f94995618e.jpg', '', 0, '{"notifyEmailSystem":1,"privacyProfileView":0,"privacyPhotoView":0,"privacyFriendsView":0,"privacyGroupsView":"","privacyVideoView":0,"notifyEmailMessage":1,"notifyEmailApps":1,"notifyWallComment":0,"notif_groups_notify_admin":1,"etype_groups_notify_admin":1,"notif_user_profile_delete":1,"etype_user_profile_delete":1,"notif_system_reports_threshold":1,"etype_system_reports_threshold":1,"notif_profile_activity_add_comment":1,"etype_profile_activity_add_comment":1,"notif_profile_activity_reply_comment":1,"etype_profile_activity_reply_comment":1,"notif_profile_status_update":1,"etype_profile_status_update":1,"notif_profile_like":1,"etype_profile_like":1,"notif_profile_stream_like":1,"etype_profile_stream_like":1,"notif_friends_request_connection":1,"etype_friends_request_connection":1,"notif_friends_create_connection":1,"etype_friends_create_connection":1,"notif_inbox_create_message":1,"etype_inbox_create_message":1,"notif_photos_submit_wall":1,"etype_photos_submit_wall":1,"notif_photos_reply_wall":1,"etype_photos_reply_wall":1,"notif_photos_tagging":1,"etype_photos_tagging":1,"notif_photos_like":1,"etype_photos_like":1,"notif_system_messaging":1,"etype_system_messaging":1,"postFacebookStatus":1}', 0, '', '', '', 0, '', 255.000000, 255.000000, 0, 'file', '', 1),
(316, '', 0, 2, '0000-00-00 00:00:00', 'images/watermarks/ef7dc25c1f5ba7f94995618e.jpg', 'images/watermarks/thumb_ef7dc25c1f5ba7f94995618e.jpg', '', 0, '{"notifyEmailSystem":1,"privacyProfileView":0,"privacyPhotoView":0,"privacyFriendsView":0,"privacyGroupsView":"","privacyVideoView":0,"notifyEmailMessage":1,"notifyEmailApps":1,"notifyWallComment":0,"notif_groups_notify_admin":1,"etype_groups_notify_admin":1,"notif_user_profile_delete":1,"etype_user_profile_delete":1,"notif_system_reports_threshold":1,"etype_system_reports_threshold":1,"notif_profile_activity_add_comment":1,"etype_profile_activity_add_comment":1,"notif_profile_activity_reply_comment":1,"etype_profile_activity_reply_comment":1,"notif_profile_status_update":1,"etype_profile_status_update":1,"notif_profile_like":1,"etype_profile_like":1,"notif_profile_stream_like":1,"etype_profile_stream_like":1,"notif_friends_request_connection":1,"etype_friends_request_connection":1,"notif_friends_create_connection":1,"etype_friends_create_connection":1,"notif_inbox_create_message":1,"etype_inbox_create_message":1,"notif_photos_submit_wall":1,"etype_photos_submit_wall":1,"notif_photos_reply_wall":1,"etype_photos_reply_wall":1,"notif_photos_tagging":1,"etype_photos_tagging":1,"notif_photos_like":1,"etype_photos_like":1,"notif_system_messaging":1,"etype_system_messaging":1,"postFacebookStatus":1}', 0, '', '', '', 0, '', 58.603531, 49.666798, 0, 'file', '', 1),
(322, '', 0, 0, '0000-00-00 00:00:00', 'images/watermarks/ef7dc25c1f5ba7f94995618e.jpg', 'images/watermarks/thumb_ef7dc25c1f5ba7f94995618e.jpg', '', 0, '{"notifyEmailSystem":1,"privacyProfileView":0,"privacyPhotoView":0,"privacyFriendsView":0,"privacyGroupsView":"","privacyVideoView":0,"notifyEmailMessage":1,"notifyEmailApps":1,"notifyWallComment":0,"notif_groups_notify_admin":1,"etype_groups_notify_admin":1,"notif_user_profile_delete":1,"etype_user_profile_delete":1,"notif_system_reports_threshold":1,"etype_system_reports_threshold":1,"notif_profile_activity_add_comment":1,"etype_profile_activity_add_comment":1,"notif_profile_activity_reply_comment":1,"etype_profile_activity_reply_comment":1,"notif_profile_status_update":1,"etype_profile_status_update":1,"notif_profile_like":1,"etype_profile_like":1,"notif_profile_stream_like":1,"etype_profile_stream_like":1,"notif_friends_request_connection":1,"etype_friends_request_connection":1,"notif_friends_create_connection":1,"etype_friends_create_connection":1,"notif_inbox_create_message":1,"etype_inbox_create_message":1,"notif_photos_submit_wall":1,"etype_photos_submit_wall":1,"notif_photos_reply_wall":1,"etype_photos_reply_wall":1,"notif_photos_tagging":1,"etype_photos_tagging":1,"notif_photos_like":1,"etype_photos_like":1,"notif_system_messaging":1,"etype_system_messaging":1}', 0, '', '', '', 0, '', 255.000000, 255.000000, 0, 'file', '', 1),
(321, '', 0, 0, '0000-00-00 00:00:00', 'images/watermarks/ef7dc25c1f5ba7f94995618e.jpg', 'images/watermarks/thumb_ef7dc25c1f5ba7f94995618e.jpg', '', 0, '{"notifyEmailSystem":1,"privacyProfileView":0,"privacyPhotoView":0,"privacyFriendsView":0,"privacyGroupsView":"","privacyVideoView":0,"notifyEmailMessage":1,"notifyEmailApps":1,"notifyWallComment":0,"notif_groups_notify_admin":1,"etype_groups_notify_admin":1,"notif_user_profile_delete":1,"etype_user_profile_delete":1,"notif_system_reports_threshold":1,"etype_system_reports_threshold":1,"notif_profile_activity_add_comment":1,"etype_profile_activity_add_comment":1,"notif_profile_activity_reply_comment":1,"etype_profile_activity_reply_comment":1,"notif_profile_status_update":1,"etype_profile_status_update":1,"notif_profile_like":1,"etype_profile_like":1,"notif_profile_stream_like":1,"etype_profile_stream_like":1,"notif_friends_request_connection":1,"etype_friends_request_connection":1,"notif_friends_create_connection":1,"etype_friends_create_connection":1,"notif_inbox_create_message":1,"etype_inbox_create_message":1,"notif_photos_submit_wall":1,"etype_photos_submit_wall":1,"notif_photos_reply_wall":1,"etype_photos_reply_wall":1,"notif_photos_tagging":1,"etype_photos_tagging":1,"notif_photos_like":1,"etype_photos_like":1,"notif_system_messaging":1,"etype_system_messaging":1}', 0, '', '', '', 0, '', 255.000000, 255.000000, 0, 'file', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_community_user_status`
--

CREATE TABLE IF NOT EXISTS `n1wr9_community_user_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `status` text NOT NULL,
  `posted_on` int(11) NOT NULL,
  `location` text NOT NULL,
  `latitude` float(10,6) NOT NULL DEFAULT '255.000000',
  `longitude` float(10,6) NOT NULL DEFAULT '255.000000',
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_community_videos`
--

CREATE TABLE IF NOT EXISTS `n1wr9_community_videos` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `type` varchar(200) NOT NULL DEFAULT 'file',
  `video_id` varchar(200) DEFAULT NULL,
  `description` text NOT NULL,
  `creator` int(11) unsigned NOT NULL,
  `creator_type` varchar(200) NOT NULL DEFAULT 'user',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `permissions` varchar(255) NOT NULL DEFAULT '0',
  `category_id` int(11) unsigned NOT NULL,
  `hits` int(11) unsigned NOT NULL DEFAULT '0',
  `published` tinyint(3) NOT NULL DEFAULT '1',
  `featured` tinyint(3) NOT NULL DEFAULT '0',
  `duration` float unsigned DEFAULT '0',
  `status` varchar(200) NOT NULL DEFAULT 'pending',
  `thumb` varchar(255) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `groupid` int(11) unsigned NOT NULL DEFAULT '0',
  `eventid` int(11) unsigned NOT NULL DEFAULT '0',
  `filesize` int(11) NOT NULL DEFAULT '0',
  `storage` varchar(64) NOT NULL DEFAULT 'file',
  `location` text NOT NULL,
  `latitude` float(10,6) NOT NULL DEFAULT '255.000000',
  `longitude` float(10,6) NOT NULL DEFAULT '255.000000',
  `params` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `creator` (`creator`),
  KEY `idx_groupid` (`groupid`),
  KEY `idx_storage` (`storage`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_community_videos_category`
--

CREATE TABLE IF NOT EXISTS `n1wr9_community_videos_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `published` tinyint(3) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `n1wr9_community_videos_category`
--

INSERT INTO `n1wr9_community_videos_category` (`id`, `parent`, `name`, `description`, `published`) VALUES
(1, 0, 'General', 'General video channel', 1);

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_community_videos_tag`
--

CREATE TABLE IF NOT EXISTS `n1wr9_community_videos_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `videoid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `position` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_community_video_stats`
--

CREATE TABLE IF NOT EXISTS `n1wr9_community_video_stats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vid` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `count` int(11) NOT NULL,
  `date` date NOT NULL,
  `params` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_community_wall`
--

CREATE TABLE IF NOT EXISTS `n1wr9_community_wall` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `contentid` int(10) unsigned NOT NULL DEFAULT '0',
  `post_by` int(10) unsigned NOT NULL DEFAULT '0',
  `ip` varchar(45) NOT NULL,
  `comment` text NOT NULL,
  `date` varchar(45) NOT NULL,
  `published` tinyint(1) unsigned NOT NULL,
  `type` varchar(200) NOT NULL,
  `params` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `contentid` (`contentid`),
  KEY `type` (`type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_contact_details`
--

CREATE TABLE IF NOT EXISTS `n1wr9_contact_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `alias` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `con_position` varchar(255) DEFAULT NULL,
  `address` text,
  `suburb` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `postcode` varchar(100) DEFAULT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `fax` varchar(255) DEFAULT NULL,
  `misc` mediumtext,
  `image` varchar(255) DEFAULT NULL,
  `email_to` varchar(255) DEFAULT NULL,
  `default_con` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `checked_out` int(10) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `params` text NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `catid` int(11) NOT NULL DEFAULT '0',
  `access` int(10) unsigned NOT NULL DEFAULT '0',
  `mobile` varchar(255) NOT NULL DEFAULT '',
  `webpage` varchar(255) NOT NULL DEFAULT '',
  `sortname1` varchar(255) NOT NULL,
  `sortname2` varchar(255) NOT NULL,
  `sortname3` varchar(255) NOT NULL,
  `language` char(7) NOT NULL,
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(10) unsigned NOT NULL DEFAULT '0',
  `created_by_alias` varchar(255) NOT NULL DEFAULT '',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(10) unsigned NOT NULL DEFAULT '0',
  `metakey` text NOT NULL,
  `metadesc` text NOT NULL,
  `metadata` text NOT NULL,
  `featured` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT 'Set if article is featured.',
  `xreference` varchar(50) NOT NULL COMMENT 'A reference to enable linkages to external data sets.',
  `publish_up` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_down` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `version` int(10) unsigned NOT NULL DEFAULT '1',
  `hits` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_access` (`access`),
  KEY `idx_checkout` (`checked_out`),
  KEY `idx_state` (`published`),
  KEY `idx_catid` (`catid`),
  KEY `idx_createdby` (`created_by`),
  KEY `idx_featured_catid` (`featured`,`catid`),
  KEY `idx_language` (`language`),
  KEY `idx_xreference` (`xreference`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_content`
--

CREATE TABLE IF NOT EXISTS `n1wr9_content` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `asset_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'FK to the #__assets table.',
  `title` varchar(255) NOT NULL DEFAULT '',
  `alias` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `introtext` mediumtext NOT NULL,
  `fulltext` mediumtext NOT NULL,
  `state` tinyint(3) NOT NULL DEFAULT '0',
  `catid` int(10) unsigned NOT NULL DEFAULT '0',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(10) unsigned NOT NULL DEFAULT '0',
  `created_by_alias` varchar(255) NOT NULL DEFAULT '',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(10) unsigned NOT NULL DEFAULT '0',
  `checked_out` int(10) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_up` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_down` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `images` text NOT NULL,
  `urls` text NOT NULL,
  `attribs` varchar(5120) NOT NULL,
  `version` int(10) unsigned NOT NULL DEFAULT '1',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `metakey` text NOT NULL,
  `metadesc` text NOT NULL,
  `access` int(10) unsigned NOT NULL DEFAULT '0',
  `hits` int(10) unsigned NOT NULL DEFAULT '0',
  `metadata` text NOT NULL,
  `featured` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT 'Set if article is featured.',
  `language` char(7) NOT NULL COMMENT 'The language code for the article.',
  `xreference` varchar(50) NOT NULL COMMENT 'A reference to enable linkages to external data sets.',
  PRIMARY KEY (`id`),
  KEY `idx_access` (`access`),
  KEY `idx_checkout` (`checked_out`),
  KEY `idx_state` (`state`),
  KEY `idx_catid` (`catid`),
  KEY `idx_createdby` (`created_by`),
  KEY `idx_featured_catid` (`featured`,`catid`),
  KEY `idx_language` (`language`),
  KEY `idx_xreference` (`xreference`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `n1wr9_content`
--

INSERT INTO `n1wr9_content` (`id`, `asset_id`, `title`, `alias`, `introtext`, `fulltext`, `state`, `catid`, `created`, `created_by`, `created_by_alias`, `modified`, `modified_by`, `checked_out`, `checked_out_time`, `publish_up`, `publish_down`, `images`, `urls`, `attribs`, `version`, `ordering`, `metakey`, `metadesc`, `access`, `hits`, `metadata`, `featured`, `language`, `xreference`) VALUES
(1, 110, 'Getting started with Form2Content Lite', 'getting-started-with-form2content-lite', '<!--\nThis is the FORM2CONTENT INTRO TEMPLATE for the BLOG CONTENT TYPE \n\nIt can be found in < root >/media/com_from2content/templates\n\nThe template shows you how you can:\n\n1) Add HTML/CSS for your article\n2) Add F2C Template Parameters (placeholders for your form data)\n3) Use basic SMARTY syntax\n\n-->\n<!--block escaping so SMARTY doesn''t break on use of {} tags-->\n<style>\n.f2c_intro_image {float:left; padding:5px;}\n</style>\n\n\n<div class="f2c article_intro_wrapper">\n	<!--check to add the read more around the image-->\n    <a href="index.php?option=com_content&view=article&id=1:getting-started-with-form2content-lite&catid=2:uncategorised" target="_parent" title="Getting started with Form2Content Lite">\n    		<img src="images/stories/com_form2content/p1/f1/thumbs/2.png" alt="Open Source Design" title="F2C is developed by Open Source Design" class="f2c_intro_image">\n    	</a>\n    	<p>Thank you for downloading and installing Form2Content LITE. In this demo content and article we hope to help you get started using our Joomla Content Construction Kit.</p>\n</div><!--article intro wrapper-->', '<!--If no article text, NO read more button will generate because the template will be empty! -->\n<!--PLEASE REMEMBER THAT YOU CAN HIDE THE INTRO in your article by using the Joomla article setting => show intro: NO -->\n			<img src="images/stories/com_form2content/p1/f1/thumbs/2.png" alt="Open Source Design" title="F2C is developed by Open Source Design" class="f2c_intro_image" style="float:right; padding-left:15px;">\n	    <div><p><strong>Getting started with Form2Content!</strong></p>\r\n<p>In the below steps we will show you how to create your own Joomla articles via Form2Content.<br /><a href="http://documentation.form2content.com/f2c-getting-started/32-getting-started-f2c-step-by-step">http://documentation.form2content.com/f2c-getting-started/32-getting-started-f2c-step-by-step</a></p>\r\n<h2>What type of articles do you want to create?</h2>\r\n<p>The installed demo <em>content type</em> is an example of a blog. Each time a F2C form is filled out a Joomla article is created. In the content type manager you define permissions, in which category the Joomla article is saved and article settings like show/hide title, intro etc.</p>\r\n<p><a href="http://documentation.form2content.com/f2c-content-types">http://documentation.form2content.com/f2c-content-types</a></p>\r\n<h2>Define the fields to collect the article data</h2>\r\n<p>In the F2C Content Type manager you will find the link to the F2C <em>Fields Manager</em> (cog icon in the second column). In the field manager you define the data you want to collect via a range of different fields. In our <em>blog example</em> we have used single-select list, multiline text field, an editor, image upload etc.</p>\r\n<p><a href="http://documentation.form2content.com/f2c-field-types">http://documentation.form2content.com/f2c-field-types</a></p>\r\n<h2>Define the article template (layout with placeholders)</h2>\r\n<p>Now that we can collect the article data we need to create a template to display this data within the Joomla article. Each created article will look teh same since we use the same layout (template).</p>\r\n<p><strong>The Form2Content rule:</strong> Form fields data + template layout = Joomla article html</p>\r\n<p>Please see our other example article about where the F2C article templates are located and how the placeholders for the data work.</p>\r\n<p><a href="http://documentation.form2content.com/f2c-templating">http://documentation.form2content.com/f2c-templating</a></p>\r\n<h2>When all works in the back-end, create a menu link to the front-end</h2>\r\n<p>When you can create Joomla article via Form2Content in the back-end you can add the front-end access and let your website users add Joomla articles with great ease ... and they all look the same!</p>\r\n<p><a href="http://documentation.form2content.com/f2c-front-end">http://documentation.form2content.com/f2c-front-end</a></p></div>\n    \n        <p><strong>Source:</strong> <a href="http://documentation.form2content.com/" target="_blank" title="Form2Content Documentation">Form2Content Documentation</a></p>\n    \n                        <p><strong>Author:</strong> Patrick Faasse, Julien Brouns - creators of Form2Content Joomla CCK</p>\n                    ', 1, 2, '2016-04-19 10:00:25', 311, '', '2016-05-06 12:45:04', 311, 0, '0000-00-00 00:00:00', '2016-04-19 10:00:25', '0000-00-00 00:00:00', '{"image_intro":"","float_intro":"","image_intro_alt":"","image_intro_caption":"","image_fulltext":"","float_fulltext":"","image_fulltext_alt":"","image_fulltext_caption":""}', '{"urla":"","urlatext":"","targeta":"","urlb":"","urlbtext":"","targetb":"","urlc":"","urlctext":"","targetc":""}', '{"show_title":"","link_titles":"","show_intro":"0","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_vote":"","show_hits":"","show_noauth":"","alternative_readmore":"","article_layout":"","info_block_position":"0"}', 2, 0, '', '', 1, 0, '{"robots":"","author":"","rights":"","xreference":""}', 0, '*', ''),
(2, 112, 'Article templates, the true strength of Form2Content', 'article-templates-the-true-strength-of-form2content', '<!--\nThis is the FORM2CONTENT INTRO TEMPLATE for the BLOG CONTENT TYPE \n\nIt can be found in < root >/media/com_from2content/templates\n\nThe template shows you how you can:\n\n1) Add HTML/CSS for your article\n2) Add F2C Template Parameters (placeholders for your form data)\n3) Use basic SMARTY syntax\n\n-->\n<!--block escaping so SMARTY doesn''t break on use of {} tags-->\n<style>\n.f2c_intro_image {float:left; padding:5px;}\n</style>\n\n\n<div class="f2c article_intro_wrapper">\n	<!--check to add the read more around the image-->\n    <a href="index.php?option=com_content&view=article&id=2:article-templates-the-true-strength-of-form2content&catid=2:uncategorised" target="_parent" title="Article templates, the true strength of Form2Content">\n    		<img src="images/stories/com_form2content/p1/f2/thumbs/2.png" alt="Open Source Design" title="F2C is developed by Open Source Design" class="f2c_intro_image">\n    	</a>\n    	<p>With a content construction kit there is always a small learning curve. Hopefully our BLOG demo will help you understand the relation between the Form2Contnet submission form (data) and the creation of your Joomla article quickly.</p>\n</div><!--article intro wrapper-->', '<!--If no article text, NO read more button will generate because the template will be empty! -->\n<!--PLEASE REMEMBER THAT YOU CAN HIDE THE INTRO in your article by using the Joomla article setting => show intro: NO -->\n			<img src="images/stories/com_form2content/p1/f2/thumbs/2.png" alt="Open Source Design" title="F2C is developed by Open Source Design" class="f2c_intro_image" style="float:right; padding-left:15px;">\n	    <div><p>In the Joomla back-end under components you can find the link to Form2Content. One of the links is to the Form2Content Template manager.</p>\r\n<p>The F2C article templates are used to render the form data into the layout of your Joomla article. Probably the easiest way to understand this is to have a look at the two files we have included to generate the BLOG demo articles.<br />The two files can be seen in the F2C Template Manager or via FTP:</p>\r\n<p>&lt; root &gt;/media/com_form2content/templates</p>\r\n<p>blog_intro_template.tpl<br />blog_main_template.tpl</p>\r\n<p><strong>Use of Smarty Templating and Template parameters (placeholders)</strong></p>\r\n<p>In the two F2C article templates included we have added extra documentation to show what you can do with them. This will hopefully get you to grips with the syntax quickly!</p>\r\n<p><a href="http://documentation.form2content.com/f2c-templating" target="_blank">PLEASE read all the documentation on Form2Content templating here!</a></p>\r\n<p> </p>\r\n<p> </p></div>\n    \n        <p><strong>Source:</strong> <a href="http://documentation.form2content.com/f2c-templating" target="_blank" title="F2C Documentatation">F2C Documentatation on article templates</a></p>\n    \n                        <p><strong>Author:</strong> Patrick Faasse, Julien Brouns - creators of Form2Content Joomla CCK</p>\n                    ', 1, 2, '2016-04-19 10:00:25', 311, '', '2016-05-06 12:46:06', 311, 0, '0000-00-00 00:00:00', '2016-04-19 10:00:25', '0000-00-00 00:00:00', '{"image_intro":"","float_intro":"","image_intro_alt":"","image_intro_caption":"","image_fulltext":"","float_fulltext":"","image_fulltext_alt":"","image_fulltext_caption":""}', '{"urla":"","urlatext":"","targeta":"","urlb":"","urlbtext":"","targetb":"","urlc":"","urlctext":"","targetc":""}', '{"show_title":"","link_titles":"","show_intro":"0","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_vote":"","show_hits":"","show_noauth":"","alternative_readmore":"","article_layout":"","info_block_position":"0"}', 2, 0, '', '', 1, 0, '{"robots":"","author":"","rights":"","xreference":""}', 0, '*', '');

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_contentitem_tag_map`
--

CREATE TABLE IF NOT EXISTS `n1wr9_contentitem_tag_map` (
  `type_alias` varchar(255) NOT NULL DEFAULT '',
  `core_content_id` int(10) unsigned NOT NULL COMMENT 'PK from the core content table',
  `content_item_id` int(11) NOT NULL COMMENT 'PK from the content type table',
  `tag_id` int(10) unsigned NOT NULL COMMENT 'PK from the tag table',
  `tag_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Date of most recent save for this tag-item',
  `type_id` mediumint(8) NOT NULL COMMENT 'PK from the content_type table',
  UNIQUE KEY `uc_ItemnameTagid` (`type_id`,`content_item_id`,`tag_id`),
  KEY `idx_tag_type` (`tag_id`,`type_id`),
  KEY `idx_date_id` (`tag_date`,`tag_id`),
  KEY `idx_tag` (`tag_id`),
  KEY `idx_type` (`type_id`),
  KEY `idx_core_content_id` (`core_content_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Maps items from content tables to tags';

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_content_frontpage`
--

CREATE TABLE IF NOT EXISTS `n1wr9_content_frontpage` (
  `content_id` int(11) NOT NULL DEFAULT '0',
  `ordering` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`content_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_content_rating`
--

CREATE TABLE IF NOT EXISTS `n1wr9_content_rating` (
  `content_id` int(11) NOT NULL DEFAULT '0',
  `rating_sum` int(10) unsigned NOT NULL DEFAULT '0',
  `rating_count` int(10) unsigned NOT NULL DEFAULT '0',
  `lastip` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`content_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_content_types`
--

CREATE TABLE IF NOT EXISTS `n1wr9_content_types` (
  `type_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_title` varchar(255) NOT NULL DEFAULT '',
  `type_alias` varchar(255) NOT NULL DEFAULT '',
  `table` varchar(255) NOT NULL DEFAULT '',
  `rules` text NOT NULL,
  `field_mappings` text NOT NULL,
  `router` varchar(255) NOT NULL DEFAULT '',
  `content_history_options` varchar(5120) DEFAULT NULL COMMENT 'JSON string for com_contenthistory options',
  PRIMARY KEY (`type_id`),
  KEY `idx_alias` (`type_alias`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `n1wr9_content_types`
--

INSERT INTO `n1wr9_content_types` (`type_id`, `type_title`, `type_alias`, `table`, `rules`, `field_mappings`, `router`, `content_history_options`) VALUES
(1, 'Article', 'com_content.article', '{"special":{"dbtable":"#__content","key":"id","type":"Content","prefix":"JTable","config":"array()"},"common":{"dbtable":"#__ucm_content","key":"ucm_id","type":"Corecontent","prefix":"JTable","config":"array()"}}', '', '{"common":{"core_content_item_id":"id","core_title":"title","core_state":"state","core_alias":"alias","core_created_time":"created","core_modified_time":"modified","core_body":"introtext", "core_hits":"hits","core_publish_up":"publish_up","core_publish_down":"publish_down","core_access":"access", "core_params":"attribs", "core_featured":"featured", "core_metadata":"metadata", "core_language":"language", "core_images":"images", "core_urls":"urls", "core_version":"version", "core_ordering":"ordering", "core_metakey":"metakey", "core_metadesc":"metadesc", "core_catid":"catid", "core_xreference":"xreference", "asset_id":"asset_id"}, "special":{"fulltext":"fulltext"}}', 'ContentHelperRoute::getArticleRoute', '{"formFile":"administrator\\/components\\/com_content\\/models\\/forms\\/article.xml", "hideFields":["asset_id","checked_out","checked_out_time","version"],"ignoreChanges":["modified_by", "modified", "checked_out", "checked_out_time", "version", "hits"],"convertToInt":["publish_up", "publish_down", "featured", "ordering"],"displayLookup":[{"sourceColumn":"catid","targetTable":"#__categories","targetColumn":"id","displayColumn":"title"},{"sourceColumn":"created_by","targetTable":"#__users","targetColumn":"id","displayColumn":"name"},{"sourceColumn":"access","targetTable":"#__viewlevels","targetColumn":"id","displayColumn":"title"},{"sourceColumn":"modified_by","targetTable":"#__users","targetColumn":"id","displayColumn":"name"} ]}'),
(2, 'Contact', 'com_contact.contact', '{"special":{"dbtable":"#__contact_details","key":"id","type":"Contact","prefix":"ContactTable","config":"array()"},"common":{"dbtable":"#__ucm_content","key":"ucm_id","type":"Corecontent","prefix":"JTable","config":"array()"}}', '', '{"common":{"core_content_item_id":"id","core_title":"name","core_state":"published","core_alias":"alias","core_created_time":"created","core_modified_time":"modified","core_body":"address", "core_hits":"hits","core_publish_up":"publish_up","core_publish_down":"publish_down","core_access":"access", "core_params":"params", "core_featured":"featured", "core_metadata":"metadata", "core_language":"language", "core_images":"image", "core_urls":"webpage", "core_version":"version", "core_ordering":"ordering", "core_metakey":"metakey", "core_metadesc":"metadesc", "core_catid":"catid", "core_xreference":"xreference", "asset_id":"null"}, "special":{"con_position":"con_position","suburb":"suburb","state":"state","country":"country","postcode":"postcode","telephone":"telephone","fax":"fax","misc":"misc","email_to":"email_to","default_con":"default_con","user_id":"user_id","mobile":"mobile","sortname1":"sortname1","sortname2":"sortname2","sortname3":"sortname3"}}', 'ContactHelperRoute::getContactRoute', '{"formFile":"administrator\\/components\\/com_contact\\/models\\/forms\\/contact.xml","hideFields":["default_con","checked_out","checked_out_time","version","xreference"],"ignoreChanges":["modified_by", "modified", "checked_out", "checked_out_time", "version", "hits"],"convertToInt":["publish_up", "publish_down", "featured", "ordering"], "displayLookup":[ {"sourceColumn":"created_by","targetTable":"#__users","targetColumn":"id","displayColumn":"name"},{"sourceColumn":"catid","targetTable":"#__categories","targetColumn":"id","displayColumn":"title"},{"sourceColumn":"modified_by","targetTable":"#__users","targetColumn":"id","displayColumn":"name"},{"sourceColumn":"access","targetTable":"#__viewlevels","targetColumn":"id","displayColumn":"title"},{"sourceColumn":"user_id","targetTable":"#__users","targetColumn":"id","displayColumn":"name"} ] }'),
(3, 'Newsfeed', 'com_newsfeeds.newsfeed', '{"special":{"dbtable":"#__newsfeeds","key":"id","type":"Newsfeed","prefix":"NewsfeedsTable","config":"array()"},"common":{"dbtable":"#__ucm_content","key":"ucm_id","type":"Corecontent","prefix":"JTable","config":"array()"}}', '', '{"common":{"core_content_item_id":"id","core_title":"name","core_state":"published","core_alias":"alias","core_created_time":"created","core_modified_time":"modified","core_body":"description", "core_hits":"hits","core_publish_up":"publish_up","core_publish_down":"publish_down","core_access":"access", "core_params":"params", "core_featured":"featured", "core_metadata":"metadata", "core_language":"language", "core_images":"images", "core_urls":"link", "core_version":"version", "core_ordering":"ordering", "core_metakey":"metakey", "core_metadesc":"metadesc", "core_catid":"catid", "core_xreference":"xreference", "asset_id":"null"}, "special":{"numarticles":"numarticles","cache_time":"cache_time","rtl":"rtl"}}', 'NewsfeedsHelperRoute::getNewsfeedRoute', '{"formFile":"administrator\\/components\\/com_newsfeeds\\/models\\/forms\\/newsfeed.xml","hideFields":["asset_id","checked_out","checked_out_time","version"],"ignoreChanges":["modified_by", "modified", "checked_out", "checked_out_time", "version", "hits"],"convertToInt":["publish_up", "publish_down", "featured", "ordering"],"displayLookup":[{"sourceColumn":"catid","targetTable":"#__categories","targetColumn":"id","displayColumn":"title"},{"sourceColumn":"created_by","targetTable":"#__users","targetColumn":"id","displayColumn":"name"},{"sourceColumn":"access","targetTable":"#__viewlevels","targetColumn":"id","displayColumn":"title"},{"sourceColumn":"modified_by","targetTable":"#__users","targetColumn":"id","displayColumn":"name"} ]}'),
(4, 'User', 'com_users.user', '{"special":{"dbtable":"#__users","key":"id","type":"User","prefix":"JTable","config":"array()"},"common":{"dbtable":"#__ucm_content","key":"ucm_id","type":"Corecontent","prefix":"JTable","config":"array()"}}', '', '{"common":{"core_content_item_id":"id","core_title":"name","core_state":"null","core_alias":"username","core_created_time":"registerdate","core_modified_time":"lastvisitDate","core_body":"null", "core_hits":"null","core_publish_up":"null","core_publish_down":"null","access":"null", "core_params":"params", "core_featured":"null", "core_metadata":"null", "core_language":"null", "core_images":"null", "core_urls":"null", "core_version":"null", "core_ordering":"null", "core_metakey":"null", "core_metadesc":"null", "core_catid":"null", "core_xreference":"null", "asset_id":"null"}, "special":{}}', 'UsersHelperRoute::getUserRoute', ''),
(5, 'Article Category', 'com_content.category', '{"special":{"dbtable":"#__categories","key":"id","type":"Category","prefix":"JTable","config":"array()"},"common":{"dbtable":"#__ucm_content","key":"ucm_id","type":"Corecontent","prefix":"JTable","config":"array()"}}', '', '{"common":{"core_content_item_id":"id","core_title":"title","core_state":"published","core_alias":"alias","core_created_time":"created_time","core_modified_time":"modified_time","core_body":"description", "core_hits":"hits","core_publish_up":"null","core_publish_down":"null","core_access":"access", "core_params":"params", "core_featured":"null", "core_metadata":"metadata", "core_language":"language", "core_images":"null", "core_urls":"null", "core_version":"version", "core_ordering":"null", "core_metakey":"metakey", "core_metadesc":"metadesc", "core_catid":"parent_id", "core_xreference":"null", "asset_id":"asset_id"}, "special":{"parent_id":"parent_id","lft":"lft","rgt":"rgt","level":"level","path":"path","extension":"extension","note":"note"}}', 'ContentHelperRoute::getCategoryRoute', '{"formFile":"administrator\\/components\\/com_categories\\/models\\/forms\\/category.xml", "hideFields":["asset_id","checked_out","checked_out_time","version","lft","rgt","level","path","extension"], "ignoreChanges":["modified_user_id", "modified_time", "checked_out", "checked_out_time", "version", "hits", "path"],"convertToInt":["publish_up", "publish_down"], "displayLookup":[{"sourceColumn":"created_user_id","targetTable":"#__users","targetColumn":"id","displayColumn":"name"},{"sourceColumn":"access","targetTable":"#__viewlevels","targetColumn":"id","displayColumn":"title"},{"sourceColumn":"modified_user_id","targetTable":"#__users","targetColumn":"id","displayColumn":"name"},{"sourceColumn":"parent_id","targetTable":"#__categories","targetColumn":"id","displayColumn":"title"}]}'),
(6, 'Contact Category', 'com_contact.category', '{"special":{"dbtable":"#__categories","key":"id","type":"Category","prefix":"JTable","config":"array()"},"common":{"dbtable":"#__ucm_content","key":"ucm_id","type":"Corecontent","prefix":"JTable","config":"array()"}}', '', '{"common":{"core_content_item_id":"id","core_title":"title","core_state":"published","core_alias":"alias","core_created_time":"created_time","core_modified_time":"modified_time","core_body":"description", "core_hits":"hits","core_publish_up":"null","core_publish_down":"null","core_access":"access", "core_params":"params", "core_featured":"null", "core_metadata":"metadata", "core_language":"language", "core_images":"null", "core_urls":"null", "core_version":"version", "core_ordering":"null", "core_metakey":"metakey", "core_metadesc":"metadesc", "core_catid":"parent_id", "core_xreference":"null", "asset_id":"asset_id"}, "special":{"parent_id":"parent_id","lft":"lft","rgt":"rgt","level":"level","path":"path","extension":"extension","note":"note"}}', 'ContactHelperRoute::getCategoryRoute', '{"formFile":"administrator\\/components\\/com_categories\\/models\\/forms\\/category.xml", "hideFields":["asset_id","checked_out","checked_out_time","version","lft","rgt","level","path","extension"], "ignoreChanges":["modified_user_id", "modified_time", "checked_out", "checked_out_time", "version", "hits", "path"],"convertToInt":["publish_up", "publish_down"], "displayLookup":[{"sourceColumn":"created_user_id","targetTable":"#__users","targetColumn":"id","displayColumn":"name"},{"sourceColumn":"access","targetTable":"#__viewlevels","targetColumn":"id","displayColumn":"title"},{"sourceColumn":"modified_user_id","targetTable":"#__users","targetColumn":"id","displayColumn":"name"},{"sourceColumn":"parent_id","targetTable":"#__categories","targetColumn":"id","displayColumn":"title"}]}'),
(7, 'Newsfeeds Category', 'com_newsfeeds.category', '{"special":{"dbtable":"#__categories","key":"id","type":"Category","prefix":"JTable","config":"array()"},"common":{"dbtable":"#__ucm_content","key":"ucm_id","type":"Corecontent","prefix":"JTable","config":"array()"}}', '', '{"common":{"core_content_item_id":"id","core_title":"title","core_state":"published","core_alias":"alias","core_created_time":"created_time","core_modified_time":"modified_time","core_body":"description", "core_hits":"hits","core_publish_up":"null","core_publish_down":"null","core_access":"access", "core_params":"params", "core_featured":"null", "core_metadata":"metadata", "core_language":"language", "core_images":"null", "core_urls":"null", "core_version":"version", "core_ordering":"null", "core_metakey":"metakey", "core_metadesc":"metadesc", "core_catid":"parent_id", "core_xreference":"null", "asset_id":"asset_id"}, "special":{"parent_id":"parent_id","lft":"lft","rgt":"rgt","level":"level","path":"path","extension":"extension","note":"note"}}', 'NewsfeedsHelperRoute::getCategoryRoute', '{"formFile":"administrator\\/components\\/com_categories\\/models\\/forms\\/category.xml", "hideFields":["asset_id","checked_out","checked_out_time","version","lft","rgt","level","path","extension"], "ignoreChanges":["modified_user_id", "modified_time", "checked_out", "checked_out_time", "version", "hits", "path"],"convertToInt":["publish_up", "publish_down"], "displayLookup":[{"sourceColumn":"created_user_id","targetTable":"#__users","targetColumn":"id","displayColumn":"name"},{"sourceColumn":"access","targetTable":"#__viewlevels","targetColumn":"id","displayColumn":"title"},{"sourceColumn":"modified_user_id","targetTable":"#__users","targetColumn":"id","displayColumn":"name"},{"sourceColumn":"parent_id","targetTable":"#__categories","targetColumn":"id","displayColumn":"title"}]}'),
(8, 'Tag', 'com_tags.tag', '{"special":{"dbtable":"#__tags","key":"tag_id","type":"Tag","prefix":"TagsTable","config":"array()"},"common":{"dbtable":"#__ucm_content","key":"ucm_id","type":"Corecontent","prefix":"JTable","config":"array()"}}', '', '{"common":{"core_content_item_id":"id","core_title":"title","core_state":"published","core_alias":"alias","core_created_time":"created_time","core_modified_time":"modified_time","core_body":"description", "core_hits":"hits","core_publish_up":"null","core_publish_down":"null","core_access":"access", "core_params":"params", "core_featured":"featured", "core_metadata":"metadata", "core_language":"language", "core_images":"images", "core_urls":"urls", "core_version":"version", "core_ordering":"null", "core_metakey":"metakey", "core_metadesc":"metadesc", "core_catid":"null", "core_xreference":"null", "asset_id":"null"}, "special":{"parent_id":"parent_id","lft":"lft","rgt":"rgt","level":"level","path":"path"}}', 'TagsHelperRoute::getTagRoute', '{"formFile":"administrator\\/components\\/com_tags\\/models\\/forms\\/tag.xml", "hideFields":["checked_out","checked_out_time","version", "lft", "rgt", "level", "path", "urls", "publish_up", "publish_down"],"ignoreChanges":["modified_user_id", "modified_time", "checked_out", "checked_out_time", "version", "hits", "path"],"convertToInt":["publish_up", "publish_down"], "displayLookup":[{"sourceColumn":"created_user_id","targetTable":"#__users","targetColumn":"id","displayColumn":"name"}, {"sourceColumn":"access","targetTable":"#__viewlevels","targetColumn":"id","displayColumn":"title"}, {"sourceColumn":"modified_user_id","targetTable":"#__users","targetColumn":"id","displayColumn":"name"}]}'),
(9, 'Banner', 'com_banners.banner', '{"special":{"dbtable":"#__banners","key":"id","type":"Banner","prefix":"BannersTable","config":"array()"},"common":{"dbtable":"#__ucm_content","key":"ucm_id","type":"Corecontent","prefix":"JTable","config":"array()"}}', '', '{"common":{"core_content_item_id":"id","core_title":"name","core_state":"published","core_alias":"alias","core_created_time":"created","core_modified_time":"modified","core_body":"description", "core_hits":"null","core_publish_up":"publish_up","core_publish_down":"publish_down","core_access":"access", "core_params":"params", "core_featured":"null", "core_metadata":"metadata", "core_language":"language", "core_images":"images", "core_urls":"link", "core_version":"version", "core_ordering":"ordering", "core_metakey":"metakey", "core_metadesc":"metadesc", "core_catid":"catid", "core_xreference":"null", "asset_id":"null"}, "special":{"imptotal":"imptotal", "impmade":"impmade", "clicks":"clicks", "clickurl":"clickurl", "custombannercode":"custombannercode", "cid":"cid", "purchase_type":"purchase_type", "track_impressions":"track_impressions", "track_clicks":"track_clicks"}}', '', '{"formFile":"administrator\\/components\\/com_banners\\/models\\/forms\\/banner.xml", "hideFields":["checked_out","checked_out_time","version", "reset"],"ignoreChanges":["modified_by", "modified", "checked_out", "checked_out_time", "version", "imptotal", "impmade", "reset"], "convertToInt":["publish_up", "publish_down", "ordering"], "displayLookup":[{"sourceColumn":"catid","targetTable":"#__categories","targetColumn":"id","displayColumn":"title"}, {"sourceColumn":"cid","targetTable":"#__banner_clients","targetColumn":"id","displayColumn":"name"}, {"sourceColumn":"created_by","targetTable":"#__users","targetColumn":"id","displayColumn":"name"},{"sourceColumn":"modified_by","targetTable":"#__users","targetColumn":"id","displayColumn":"name"} ]}'),
(10, 'Banners Category', 'com_banners.category', '{"special":{"dbtable":"#__categories","key":"id","type":"Category","prefix":"JTable","config":"array()"},"common":{"dbtable":"#__ucm_content","key":"ucm_id","type":"Corecontent","prefix":"JTable","config":"array()"}}', '', '{"common":{"core_content_item_id":"id","core_title":"title","core_state":"published","core_alias":"alias","core_created_time":"created_time","core_modified_time":"modified_time","core_body":"description", "core_hits":"hits","core_publish_up":"null","core_publish_down":"null","core_access":"access", "core_params":"params", "core_featured":"null", "core_metadata":"metadata", "core_language":"language", "core_images":"null", "core_urls":"null", "core_version":"version", "core_ordering":"null", "core_metakey":"metakey", "core_metadesc":"metadesc", "core_catid":"parent_id", "core_xreference":"null", "asset_id":"asset_id"}, "special": {"parent_id":"parent_id","lft":"lft","rgt":"rgt","level":"level","path":"path","extension":"extension","note":"note"}}', '', '{"formFile":"administrator\\/components\\/com_categories\\/models\\/forms\\/category.xml", "hideFields":["asset_id","checked_out","checked_out_time","version","lft","rgt","level","path","extension"], "ignoreChanges":["modified_user_id", "modified_time", "checked_out", "checked_out_time", "version", "hits", "path"], "convertToInt":["publish_up", "publish_down"], "displayLookup":[{"sourceColumn":"created_user_id","targetTable":"#__users","targetColumn":"id","displayColumn":"name"},{"sourceColumn":"access","targetTable":"#__viewlevels","targetColumn":"id","displayColumn":"title"},{"sourceColumn":"modified_user_id","targetTable":"#__users","targetColumn":"id","displayColumn":"name"},{"sourceColumn":"parent_id","targetTable":"#__categories","targetColumn":"id","displayColumn":"title"}]}'),
(11, 'Banner Client', 'com_banners.client', '{"special":{"dbtable":"#__banner_clients","key":"id","type":"Client","prefix":"BannersTable"}}', '', '', '', '{"formFile":"administrator\\/components\\/com_banners\\/models\\/forms\\/client.xml", "hideFields":["checked_out","checked_out_time"], "ignoreChanges":["checked_out", "checked_out_time"], "convertToInt":[], "displayLookup":[]}'),
(12, 'User Notes', 'com_users.note', '{"special":{"dbtable":"#__user_notes","key":"id","type":"Note","prefix":"UsersTable"}}', '', '', '', '{"formFile":"administrator\\/components\\/com_users\\/models\\/forms\\/note.xml", "hideFields":["checked_out","checked_out_time", "publish_up", "publish_down"],"ignoreChanges":["modified_user_id", "modified_time", "checked_out", "checked_out_time"], "convertToInt":["publish_up", "publish_down"],"displayLookup":[{"sourceColumn":"catid","targetTable":"#__categories","targetColumn":"id","displayColumn":"title"}, {"sourceColumn":"created_user_id","targetTable":"#__users","targetColumn":"id","displayColumn":"name"}, {"sourceColumn":"user_id","targetTable":"#__users","targetColumn":"id","displayColumn":"name"}, {"sourceColumn":"modified_user_id","targetTable":"#__users","targetColumn":"id","displayColumn":"name"}]}'),
(13, 'User Notes Category', 'com_users.category', '{"special":{"dbtable":"#__categories","key":"id","type":"Category","prefix":"JTable","config":"array()"},"common":{"dbtable":"#__ucm_content","key":"ucm_id","type":"Corecontent","prefix":"JTable","config":"array()"}}', '', '{"common":{"core_content_item_id":"id","core_title":"title","core_state":"published","core_alias":"alias","core_created_time":"created_time","core_modified_time":"modified_time","core_body":"description", "core_hits":"hits","core_publish_up":"null","core_publish_down":"null","core_access":"access", "core_params":"params", "core_featured":"null", "core_metadata":"metadata", "core_language":"language", "core_images":"null", "core_urls":"null", "core_version":"version", "core_ordering":"null", "core_metakey":"metakey", "core_metadesc":"metadesc", "core_catid":"parent_id", "core_xreference":"null", "asset_id":"asset_id"}, "special":{"parent_id":"parent_id","lft":"lft","rgt":"rgt","level":"level","path":"path","extension":"extension","note":"note"}}', '', '{"formFile":"administrator\\/components\\/com_categories\\/models\\/forms\\/category.xml", "hideFields":["checked_out","checked_out_time","version","lft","rgt","level","path","extension"], "ignoreChanges":["modified_user_id", "modified_time", "checked_out", "checked_out_time", "version", "hits", "path"], "convertToInt":["publish_up", "publish_down"], "displayLookup":[{"sourceColumn":"created_user_id","targetTable":"#__users","targetColumn":"id","displayColumn":"name"}, {"sourceColumn":"access","targetTable":"#__viewlevels","targetColumn":"id","displayColumn":"title"},{"sourceColumn":"modified_user_id","targetTable":"#__users","targetColumn":"id","displayColumn":"name"},{"sourceColumn":"parent_id","targetTable":"#__categories","targetColumn":"id","displayColumn":"title"}]}');

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_core_log_searches`
--

CREATE TABLE IF NOT EXISTS `n1wr9_core_log_searches` (
  `search_term` varchar(128) NOT NULL DEFAULT '',
  `hits` int(10) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_easyblog_acl`
--

CREATE TABLE IF NOT EXISTS `n1wr9_easyblog_acl` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `group` varchar(255) NOT NULL,
  `action` varchar(255) NOT NULL,
  `default` tinyint(1) NOT NULL DEFAULT '1',
  `description` text NOT NULL,
  `published` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `ordering` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `easyblog_post_acl_action` (`action`),
  KEY `idx_acl_published` (`published`),
  KEY `idx_acl_published_id` (`published`,`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `n1wr9_easyblog_acl`
--

INSERT INTO `n1wr9_easyblog_acl` (`id`, `group`, `action`, `default`, `description`, `published`, `ordering`) VALUES
(1, 'composer', 'add_entry', 1, 'COM_EASYBLOG_ACL_DESC_ADD_ENTRY', 1, 0),
(2, 'composer', 'publish_entry', 1, 'COM_EASYBLOG_ACL_DESC_PUBLISH_ENTRY', 1, 0),
(3, 'profile', 'allow_feedburner', 1, 'COM_EASYBLOG_ACL_DESC_ALLOW_FEEDBURNER', 1, 0),
(4, 'profile', 'upload_avatar', 1, 'COM_EASYBLOG_ACL_DESC_UPLOAD_AVATAR', 1, 0),
(5, 'manage', 'manage_comment', 1, 'COM_EASYBLOG_ACL_DESC_MANAGE_COMMENT', 1, 0),
(6, 'profile', 'update_twitter', 1, 'COM_EASYBLOG_ACL_DESC_UPDATE_TWITTER', 1, 0),
(8, 'manage', 'delete_entry', 1, 'COM_EASYBLOG_ACL_DESC_DELETE_ENTRY', 1, 0),
(10, 'composer', 'contribute_frontpage', 1, 'COM_EASYBLOG_ACL_DESC_CONTRIBUTE_FRONTPAGE', 1, 0),
(11, 'manage', 'create_category', 1, 'COM_EASYBLOG_ACL_DESC_CREATE_CATEGORY', 1, 0),
(12, 'manage', 'create_tag', 1, 'COM_EASYBLOG_ACL_DESC_CREATE_TAG', 1, 0),
(13, 'profile', 'add_adsense', 1, 'COM_EASYBLOG_ACL_DESC_ADD_ADSENSE', 1, 0),
(14, 'profile', 'allow_shortcode', 1, 'COM_EASYBLOG_ACL_DESC_ALLOW_SHORTCODE', 1, 0),
(15, 'profile', 'allow_rss', 1, 'COM_EASYBLOG_ACL_DESC_ALLOW_RSS', 1, 0),
(16, 'profile', 'custom_template', 1, 'COM_EASYBLOG_ACL_DESC_CUSTOM_TEMPLATE', 1, 0),
(17, 'composer', 'enable_privacy', 1, 'COM_EASYBLOG_ACL_DESC_ENABLE_PRIVACY', 1, 0),
(18, 'comment', 'allow_comment', 1, 'COM_EASYBLOG_ACL_DESC_ALLOW_COMMENT', 1, 0),
(19, 'subscription', 'allow_subscription', 1, 'COM_EASYBLOG_ACL_DESC_ALLOW_SUBSCRIPTION', 1, 0),
(20, 'manage', 'manage_pending', 1, 'COM_EASYBLOG_ACL_DESC_MANAGE_PENDING', 1, 0),
(21, 'media', 'upload_image', 1, 'COM_EASYBLOG_ACL_DESC_UPLOAD_IMAGE', 1, 0),
(23, 'manage', 'upload_cavatar', 1, 'COM_EASYBLOG_ACL_DESC_UPLOAD_CAVATAR', 1, 0),
(24, 'profile', 'update_linkedin', 1, 'COM_EASYBLOG_ACL_DESC_UPDATE_LINKEDIN', 1, 0),
(25, 'composer', 'change_setting_comment', 1, 'COM_EASYBLOG_ACL_DESC_CHANGE_SETTING_COMMENT', 1, 0),
(26, 'composer', 'change_setting_subscription', 1, 'COM_EASYBLOG_ACL_DESC_CHANGE_SETTING_SUBSCRIPTION', 1, 0),
(27, 'profile', 'update_facebook', 1, 'COM_EASYBLOG_ACL_DESC_UPDATE_FACEBOOK', 1, 0),
(28, 'manage', 'delete_category', 1, 'COM_EASYBLOG_ACL_DESC_DELETE_CATEGORY', 1, 0),
(29, 'moderate', 'moderate_entry', 1, 'COM_EASYBLOG_ACL_DESC_MODERATE_ENTRY', 1, 0),
(30, 'manage', 'edit_comment', 1, 'COM_EASYBLOG_ACL_DESC_EDIT_COMMENT', 1, 0),
(31, 'manage', 'delete_comment', 1, 'COM_EASYBLOG_ACL_DESC_DELETE_COMMENT', 1, 0),
(32, 'moderate', 'feature_entry', 1, 'COM_EASYBLOG_ACL_DESC_FEATURE_ENTRY', 1, 0),
(33, 'media', 'media_places_album', 1, 'COM_EASYBLOG_ACL_DESC_MEDIA_PLACES_ALBUM', 1, 0),
(34, 'media', 'media_places_flickr', 1, 'COM_EASYBLOG_ACL_DESC_MEDIA_PLACES_FLICKR', 1, 0),
(35, 'media', 'media_places_shared', 1, 'COM_EASYBLOG_ACL_DESC_MEDIA_PLACES_SHARED', 1, 0),
(36, 'profile', 'allow_seo', 1, 'COM_EASYBLOG_ACL_DESC_ALLOW_SEO', 1, 0),
(37, 'profile', 'access_toolbar', 1, 'COM_EASYBLOG_ACL_DESC_ACCESS_TOOLBAR', 1, 0),
(38, 'profile', 'custom_css', 1, 'COM_EASYBLOG_ACL_DESC_UPDATE_CSS', 1, 0),
(39, 'subscription', 'allow_subscription_rss', 1, 'COM_EASYBLOG_ACL_DESC_ACCESS_RSS', 1, 0),
(40, 'profile', 'add_google_authorship', 1, 'COM_EASYBLOG_ACL_DESC_ADD_GOOGLE_AUTHORSHIP', 1, 0),
(41, 'profile', 'allow_user_permalink', 1, 'COM_EASYBLOG_ACL_DESC_ALLOW_USER_PERMALINK', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_easyblog_acl_filters`
--

CREATE TABLE IF NOT EXISTS `n1wr9_easyblog_acl_filters` (
  `content_id` bigint(20) unsigned NOT NULL,
  `disallow_tags` text NOT NULL,
  `disallow_attributes` text NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `n1wr9_easyblog_acl_filters`
--

INSERT INTO `n1wr9_easyblog_acl_filters` (`content_id`, `disallow_tags`, `disallow_attributes`, `type`) VALUES
(1, 'script,applet,iframe', 'onclick,onblur,onchange,onfocus,onreset,onselect,onsubmit,onabort,onkeydown,onkeypress,onkeyup,onmouseover,onmouseout,ondblclick,onmousemove,onmousedown,onmouseup,onerror,onload,onunload', 'group'),
(9, 'script,applet,iframe', 'onclick,onblur,onchange,onfocus,onreset,onselect,onsubmit,onabort,onkeydown,onkeypress,onkeyup,onmouseover,onmouseout,ondblclick,onmousemove,onmousedown,onmouseup,onerror,onload,onunload', 'group'),
(6, 'script,applet,iframe', 'onclick,onblur,onchange,onfocus,onreset,onselect,onsubmit,onabort,onkeydown,onkeypress,onkeyup,onmouseover,onmouseout,ondblclick,onmousemove,onmousedown,onmouseup,onerror,onload,onunload', 'group'),
(7, '', '', 'group'),
(2, 'script,applet,iframe', 'onclick,onblur,onchange,onfocus,onreset,onselect,onsubmit,onabort,onkeydown,onkeypress,onkeyup,onmouseover,onmouseout,ondblclick,onmousemove,onmousedown,onmouseup,onerror,onload,onunload', 'group'),
(3, 'script,applet,iframe', 'onclick,onblur,onchange,onfocus,onreset,onselect,onsubmit,onabort,onkeydown,onkeypress,onkeyup,onmouseover,onmouseout,ondblclick,onmousemove,onmousedown,onmouseup,onerror,onload,onunload', 'group'),
(4, 'script,applet,iframe', 'onclick,onblur,onchange,onfocus,onreset,onselect,onsubmit,onabort,onkeydown,onkeypress,onkeyup,onmouseover,onmouseout,ondblclick,onmousemove,onmousedown,onmouseup,onerror,onload,onunload', 'group'),
(5, 'script,applet,iframe', 'onclick,onblur,onchange,onfocus,onreset,onselect,onsubmit,onabort,onkeydown,onkeypress,onkeyup,onmouseover,onmouseout,ondblclick,onmousemove,onmousedown,onmouseup,onerror,onload,onunload', 'group'),
(8, '', '', 'group');

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_easyblog_acl_group`
--

CREATE TABLE IF NOT EXISTS `n1wr9_easyblog_acl_group` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `content_id` bigint(20) unsigned NOT NULL,
  `acl_id` bigint(20) unsigned NOT NULL,
  `status` tinyint(1) NOT NULL,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `easyblog_post_acl_content_type` (`content_id`,`type`),
  KEY `easyblog_post_acl` (`acl_id`),
  KEY `acl_grp_acl_type` (`acl_id`,`type`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=343 ;

--
-- Dumping data for table `n1wr9_easyblog_acl_group`
--

INSERT INTO `n1wr9_easyblog_acl_group` (`id`, `content_id`, `acl_id`, `status`, `type`) VALUES
(1, 1, 18, 1, 'group'),
(2, 1, 19, 1, 'group'),
(3, 1, 37, 1, 'group'),
(4, 1, 39, 1, 'group'),
(5, 1, 1, 0, 'group'),
(6, 1, 2, 0, 'group'),
(7, 1, 3, 0, 'group'),
(8, 1, 4, 0, 'group'),
(9, 1, 5, 0, 'group'),
(10, 1, 6, 0, 'group'),
(11, 1, 8, 0, 'group'),
(12, 1, 10, 0, 'group'),
(13, 1, 11, 0, 'group'),
(14, 1, 12, 0, 'group'),
(15, 1, 13, 0, 'group'),
(16, 1, 14, 0, 'group'),
(17, 1, 15, 0, 'group'),
(18, 1, 16, 0, 'group'),
(19, 1, 17, 0, 'group'),
(20, 1, 20, 0, 'group'),
(21, 1, 21, 0, 'group'),
(22, 1, 23, 0, 'group'),
(23, 1, 24, 0, 'group'),
(24, 1, 25, 0, 'group'),
(25, 1, 26, 0, 'group'),
(26, 1, 27, 0, 'group'),
(27, 1, 28, 0, 'group'),
(28, 1, 29, 0, 'group'),
(29, 1, 30, 0, 'group'),
(30, 1, 31, 0, 'group'),
(31, 1, 32, 0, 'group'),
(32, 1, 33, 0, 'group'),
(33, 1, 34, 0, 'group'),
(34, 1, 35, 0, 'group'),
(35, 1, 36, 0, 'group'),
(36, 1, 38, 0, 'group'),
(37, 1, 40, 0, 'group'),
(38, 1, 41, 0, 'group'),
(39, 9, 18, 1, 'group'),
(40, 9, 19, 1, 'group'),
(41, 9, 37, 1, 'group'),
(42, 9, 39, 1, 'group'),
(43, 9, 1, 0, 'group'),
(44, 9, 2, 0, 'group'),
(45, 9, 3, 0, 'group'),
(46, 9, 4, 0, 'group'),
(47, 9, 5, 0, 'group'),
(48, 9, 6, 0, 'group'),
(49, 9, 8, 0, 'group'),
(50, 9, 10, 0, 'group'),
(51, 9, 11, 0, 'group'),
(52, 9, 12, 0, 'group'),
(53, 9, 13, 0, 'group'),
(54, 9, 14, 0, 'group'),
(55, 9, 15, 0, 'group'),
(56, 9, 16, 0, 'group'),
(57, 9, 17, 0, 'group'),
(58, 9, 20, 0, 'group'),
(59, 9, 21, 0, 'group'),
(60, 9, 23, 0, 'group'),
(61, 9, 24, 0, 'group'),
(62, 9, 25, 0, 'group'),
(63, 9, 26, 0, 'group'),
(64, 9, 27, 0, 'group'),
(65, 9, 28, 0, 'group'),
(66, 9, 29, 0, 'group'),
(67, 9, 30, 0, 'group'),
(68, 9, 31, 0, 'group'),
(69, 9, 32, 0, 'group'),
(70, 9, 33, 0, 'group'),
(71, 9, 34, 0, 'group'),
(72, 9, 35, 0, 'group'),
(73, 9, 36, 0, 'group'),
(74, 9, 38, 0, 'group'),
(75, 9, 40, 0, 'group'),
(76, 9, 41, 0, 'group'),
(77, 6, 1, 1, 'group'),
(78, 6, 3, 1, 'group'),
(79, 6, 4, 1, 'group'),
(80, 6, 6, 1, 'group'),
(81, 6, 8, 1, 'group'),
(82, 6, 10, 1, 'group'),
(83, 6, 11, 1, 'group'),
(84, 6, 12, 1, 'group'),
(85, 6, 13, 1, 'group'),
(86, 6, 14, 1, 'group'),
(87, 6, 15, 1, 'group'),
(88, 6, 16, 1, 'group'),
(89, 6, 17, 1, 'group'),
(90, 6, 18, 1, 'group'),
(91, 6, 19, 1, 'group'),
(92, 6, 21, 1, 'group'),
(93, 6, 23, 1, 'group'),
(94, 6, 24, 1, 'group'),
(95, 6, 25, 1, 'group'),
(96, 6, 26, 1, 'group'),
(97, 6, 27, 1, 'group'),
(98, 6, 28, 1, 'group'),
(99, 6, 30, 1, 'group'),
(100, 6, 33, 1, 'group'),
(101, 6, 34, 1, 'group'),
(102, 6, 35, 1, 'group'),
(103, 6, 36, 1, 'group'),
(104, 6, 37, 1, 'group'),
(105, 6, 39, 1, 'group'),
(106, 6, 2, 0, 'group'),
(107, 6, 5, 0, 'group'),
(108, 6, 20, 0, 'group'),
(109, 6, 29, 0, 'group'),
(110, 6, 31, 0, 'group'),
(111, 6, 32, 0, 'group'),
(112, 6, 38, 0, 'group'),
(113, 6, 40, 0, 'group'),
(114, 6, 41, 0, 'group'),
(115, 7, 1, 1, 'group'),
(116, 7, 2, 1, 'group'),
(117, 7, 3, 1, 'group'),
(118, 7, 4, 1, 'group'),
(119, 7, 5, 1, 'group'),
(120, 7, 6, 1, 'group'),
(121, 7, 8, 1, 'group'),
(122, 7, 10, 1, 'group'),
(123, 7, 11, 1, 'group'),
(124, 7, 12, 1, 'group'),
(125, 7, 13, 1, 'group'),
(126, 7, 14, 1, 'group'),
(127, 7, 15, 1, 'group'),
(128, 7, 16, 1, 'group'),
(129, 7, 17, 1, 'group'),
(130, 7, 18, 1, 'group'),
(131, 7, 19, 1, 'group'),
(132, 7, 20, 1, 'group'),
(133, 7, 21, 1, 'group'),
(134, 7, 23, 1, 'group'),
(135, 7, 24, 1, 'group'),
(136, 7, 25, 1, 'group'),
(137, 7, 26, 1, 'group'),
(138, 7, 27, 1, 'group'),
(139, 7, 28, 1, 'group'),
(140, 7, 29, 1, 'group'),
(141, 7, 30, 1, 'group'),
(142, 7, 31, 1, 'group'),
(143, 7, 32, 1, 'group'),
(144, 7, 33, 1, 'group'),
(145, 7, 34, 1, 'group'),
(146, 7, 35, 1, 'group'),
(147, 7, 36, 1, 'group'),
(148, 7, 37, 1, 'group'),
(149, 7, 38, 1, 'group'),
(150, 7, 39, 1, 'group'),
(151, 7, 40, 1, 'group'),
(152, 7, 41, 1, 'group'),
(153, 2, 1, 1, 'group'),
(154, 2, 3, 1, 'group'),
(155, 2, 4, 1, 'group'),
(156, 2, 6, 1, 'group'),
(157, 2, 8, 1, 'group'),
(158, 2, 10, 1, 'group'),
(159, 2, 11, 1, 'group'),
(160, 2, 12, 1, 'group'),
(161, 2, 13, 1, 'group'),
(162, 2, 14, 1, 'group'),
(163, 2, 15, 1, 'group'),
(164, 2, 16, 1, 'group'),
(165, 2, 17, 1, 'group'),
(166, 2, 18, 1, 'group'),
(167, 2, 19, 1, 'group'),
(168, 2, 21, 1, 'group'),
(169, 2, 23, 1, 'group'),
(170, 2, 24, 1, 'group'),
(171, 2, 25, 1, 'group'),
(172, 2, 26, 1, 'group'),
(173, 2, 27, 1, 'group'),
(174, 2, 28, 1, 'group'),
(175, 2, 30, 1, 'group'),
(176, 2, 33, 1, 'group'),
(177, 2, 34, 1, 'group'),
(178, 2, 35, 1, 'group'),
(179, 2, 36, 1, 'group'),
(180, 2, 37, 1, 'group'),
(181, 2, 39, 1, 'group'),
(182, 2, 2, 0, 'group'),
(183, 2, 5, 0, 'group'),
(184, 2, 20, 0, 'group'),
(185, 2, 29, 0, 'group'),
(186, 2, 31, 0, 'group'),
(187, 2, 32, 0, 'group'),
(188, 2, 38, 0, 'group'),
(189, 2, 40, 0, 'group'),
(190, 2, 41, 0, 'group'),
(191, 3, 1, 1, 'group'),
(192, 3, 3, 1, 'group'),
(193, 3, 4, 1, 'group'),
(194, 3, 6, 1, 'group'),
(195, 3, 8, 1, 'group'),
(196, 3, 10, 1, 'group'),
(197, 3, 11, 1, 'group'),
(198, 3, 12, 1, 'group'),
(199, 3, 13, 1, 'group'),
(200, 3, 14, 1, 'group'),
(201, 3, 15, 1, 'group'),
(202, 3, 16, 1, 'group'),
(203, 3, 17, 1, 'group'),
(204, 3, 18, 1, 'group'),
(205, 3, 19, 1, 'group'),
(206, 3, 21, 1, 'group'),
(207, 3, 23, 1, 'group'),
(208, 3, 24, 1, 'group'),
(209, 3, 25, 1, 'group'),
(210, 3, 26, 1, 'group'),
(211, 3, 27, 1, 'group'),
(212, 3, 28, 1, 'group'),
(213, 3, 30, 1, 'group'),
(214, 3, 33, 1, 'group'),
(215, 3, 34, 1, 'group'),
(216, 3, 35, 1, 'group'),
(217, 3, 36, 1, 'group'),
(218, 3, 37, 1, 'group'),
(219, 3, 39, 1, 'group'),
(220, 3, 2, 0, 'group'),
(221, 3, 5, 0, 'group'),
(222, 3, 20, 0, 'group'),
(223, 3, 29, 0, 'group'),
(224, 3, 31, 0, 'group'),
(225, 3, 32, 0, 'group'),
(226, 3, 38, 0, 'group'),
(227, 3, 40, 0, 'group'),
(228, 3, 41, 0, 'group'),
(229, 4, 1, 1, 'group'),
(230, 4, 3, 1, 'group'),
(231, 4, 4, 1, 'group'),
(232, 4, 6, 1, 'group'),
(233, 4, 8, 1, 'group'),
(234, 4, 10, 1, 'group'),
(235, 4, 11, 1, 'group'),
(236, 4, 12, 1, 'group'),
(237, 4, 13, 1, 'group'),
(238, 4, 14, 1, 'group'),
(239, 4, 15, 1, 'group'),
(240, 4, 16, 1, 'group'),
(241, 4, 17, 1, 'group'),
(242, 4, 18, 1, 'group'),
(243, 4, 19, 1, 'group'),
(244, 4, 21, 1, 'group'),
(245, 4, 23, 1, 'group'),
(246, 4, 24, 1, 'group'),
(247, 4, 25, 1, 'group'),
(248, 4, 26, 1, 'group'),
(249, 4, 27, 1, 'group'),
(250, 4, 28, 1, 'group'),
(251, 4, 30, 1, 'group'),
(252, 4, 33, 1, 'group'),
(253, 4, 34, 1, 'group'),
(254, 4, 35, 1, 'group'),
(255, 4, 36, 1, 'group'),
(256, 4, 37, 1, 'group'),
(257, 4, 39, 1, 'group'),
(258, 4, 2, 0, 'group'),
(259, 4, 5, 0, 'group'),
(260, 4, 20, 0, 'group'),
(261, 4, 29, 0, 'group'),
(262, 4, 31, 0, 'group'),
(263, 4, 32, 0, 'group'),
(264, 4, 38, 0, 'group'),
(265, 4, 40, 0, 'group'),
(266, 4, 41, 0, 'group'),
(267, 5, 1, 1, 'group'),
(268, 5, 3, 1, 'group'),
(269, 5, 4, 1, 'group'),
(270, 5, 6, 1, 'group'),
(271, 5, 8, 1, 'group'),
(272, 5, 10, 1, 'group'),
(273, 5, 11, 1, 'group'),
(274, 5, 12, 1, 'group'),
(275, 5, 13, 1, 'group'),
(276, 5, 14, 1, 'group'),
(277, 5, 15, 1, 'group'),
(278, 5, 16, 1, 'group'),
(279, 5, 17, 1, 'group'),
(280, 5, 18, 1, 'group'),
(281, 5, 19, 1, 'group'),
(282, 5, 21, 1, 'group'),
(283, 5, 23, 1, 'group'),
(284, 5, 24, 1, 'group'),
(285, 5, 25, 1, 'group'),
(286, 5, 26, 1, 'group'),
(287, 5, 27, 1, 'group'),
(288, 5, 28, 1, 'group'),
(289, 5, 30, 1, 'group'),
(290, 5, 33, 1, 'group'),
(291, 5, 34, 1, 'group'),
(292, 5, 35, 1, 'group'),
(293, 5, 36, 1, 'group'),
(294, 5, 37, 1, 'group'),
(295, 5, 39, 1, 'group'),
(296, 5, 2, 0, 'group'),
(297, 5, 5, 0, 'group'),
(298, 5, 20, 0, 'group'),
(299, 5, 29, 0, 'group'),
(300, 5, 31, 0, 'group'),
(301, 5, 32, 0, 'group'),
(302, 5, 38, 0, 'group'),
(303, 5, 40, 0, 'group'),
(304, 5, 41, 0, 'group'),
(305, 8, 1, 1, 'group'),
(306, 8, 2, 1, 'group'),
(307, 8, 3, 1, 'group'),
(308, 8, 4, 1, 'group'),
(309, 8, 5, 1, 'group'),
(310, 8, 6, 1, 'group'),
(311, 8, 8, 1, 'group'),
(312, 8, 10, 1, 'group'),
(313, 8, 11, 1, 'group'),
(314, 8, 12, 1, 'group'),
(315, 8, 13, 1, 'group'),
(316, 8, 14, 1, 'group'),
(317, 8, 15, 1, 'group'),
(318, 8, 16, 1, 'group'),
(319, 8, 17, 1, 'group'),
(320, 8, 18, 1, 'group'),
(321, 8, 19, 1, 'group'),
(322, 8, 20, 1, 'group'),
(323, 8, 21, 1, 'group'),
(324, 8, 23, 1, 'group'),
(325, 8, 24, 1, 'group'),
(326, 8, 25, 1, 'group'),
(327, 8, 26, 1, 'group'),
(328, 8, 27, 1, 'group'),
(329, 8, 28, 1, 'group'),
(330, 8, 29, 1, 'group'),
(331, 8, 30, 1, 'group'),
(332, 8, 31, 1, 'group'),
(333, 8, 32, 1, 'group'),
(334, 8, 33, 1, 'group'),
(335, 8, 34, 1, 'group'),
(336, 8, 35, 1, 'group'),
(337, 8, 36, 1, 'group'),
(338, 8, 37, 1, 'group'),
(339, 8, 38, 1, 'group'),
(340, 8, 39, 1, 'group'),
(341, 8, 40, 1, 'group'),
(342, 8, 41, 1, 'group');

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_easyblog_adsense`
--

CREATE TABLE IF NOT EXISTS `n1wr9_easyblog_adsense` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `code` varchar(255) NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `display` varchar(255) NOT NULL DEFAULT 'both',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_easyblog_associations`
--

CREATE TABLE IF NOT EXISTS `n1wr9_easyblog_associations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `key` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_postid` (`post_id`),
  KEY `idx_key` (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_easyblog_autoarticle_map`
--

CREATE TABLE IF NOT EXISTS `n1wr9_easyblog_autoarticle_map` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` bigint(20) unsigned NOT NULL,
  `content_id` bigint(20) unsigned NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `autoarticle_map_post_id` (`post_id`),
  KEY `autoarticle_map_content_id` (`content_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_easyblog_captcha`
--

CREATE TABLE IF NOT EXISTS `n1wr9_easyblog_captcha` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `response` varchar(5) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_easyblog_category`
--

CREATE TABLE IF NOT EXISTS `n1wr9_easyblog_category` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_by` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `parent_id` int(11) DEFAULT '0',
  `private` int(11) unsigned NOT NULL DEFAULT '0',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `published` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `autopost` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `ordering` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `level` int(11) unsigned DEFAULT '0',
  `lft` int(11) unsigned DEFAULT '0',
  `rgt` int(11) unsigned DEFAULT '0',
  `default` tinyint(1) unsigned DEFAULT '0',
  `theme` varchar(255) NOT NULL,
  `language` char(7) NOT NULL,
  `params` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `easyblog_cat_published` (`published`),
  KEY `easyblog_cat_parentid` (`parent_id`),
  KEY `easyblog_cat_private` (`private`),
  KEY `easyblog_cat_lft` (`lft`),
  KEY `idx_category_access` (`published`,`parent_id`,`private`,`lft`),
  KEY `idx_category_alias` (`alias`),
  KEY `idx_category_alias_id` (`alias`,`id`),
  KEY `idx_cat_lftrgt` (`lft`,`rgt`),
  KEY `idx_author` (`created_by`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `n1wr9_easyblog_category`
--

INSERT INTO `n1wr9_easyblog_category` (`id`, `created_by`, `title`, `description`, `alias`, `avatar`, `parent_id`, `private`, `created`, `status`, `published`, `autopost`, `ordering`, `level`, `lft`, `rgt`, `default`, `theme`, `language`, `params`) VALUES
(1, 311, 'Uncategorized', '', 'uncategorized', NULL, 0, 0, '2016-04-14 09:30:14', 1, 1, 1, 1, 0, 1, 2, 1, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_easyblog_category_acl`
--

CREATE TABLE IF NOT EXISTS `n1wr9_easyblog_category_acl` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `category_id` bigint(20) NOT NULL,
  `acl_id` bigint(20) NOT NULL,
  `type` varchar(255) NOT NULL,
  `content_id` bigint(20) NOT NULL,
  `status` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `easyblog_category_acl` (`category_id`),
  KEY `easyblog_category_acl_id` (`acl_id`),
  KEY `easyblog_content_type` (`content_id`,`type`),
  KEY `easyblog_category_content_type` (`category_id`,`content_id`,`type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_easyblog_category_acl_item`
--

CREATE TABLE IF NOT EXISTS `n1wr9_easyblog_category_acl_item` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `action` varchar(255) NOT NULL,
  `description` text,
  `published` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `default` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `n1wr9_easyblog_category_acl_item`
--

INSERT INTO `n1wr9_easyblog_category_acl_item` (`id`, `action`, `description`, `published`, `default`) VALUES
(1, 'view', 'can view the category blog posts.', 1, 1),
(2, 'select', 'can select the category during blog post creation', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_easyblog_category_fields_groups`
--

CREATE TABLE IF NOT EXISTS `n1wr9_easyblog_category_fields_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`,`group_id`),
  KEY `cat_id` (`category_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_easyblog_comment`
--

CREATE TABLE IF NOT EXISTS `n1wr9_easyblog_comment` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` bigint(20) unsigned NOT NULL,
  `comment` text,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT '',
  `url` varchar(255) DEFAULT '',
  `ip` varchar(255) DEFAULT '',
  `created_by` bigint(20) unsigned DEFAULT '0',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` datetime DEFAULT '0000-00-00 00:00:00',
  `published` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `publish_up` datetime DEFAULT '0000-00-00 00:00:00',
  `publish_down` datetime DEFAULT '0000-00-00 00:00:00',
  `ordering` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `vote` int(11) unsigned NOT NULL DEFAULT '0',
  `hits` int(11) unsigned NOT NULL DEFAULT '0',
  `sent` tinyint(1) DEFAULT '1',
  `parent_id` int(11) unsigned DEFAULT '0',
  `lft` int(11) unsigned NOT NULL DEFAULT '0',
  `rgt` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `easyblog_comment_postid` (`post_id`),
  KEY `easyblog_comment_parent_id` (`parent_id`),
  KEY `idx_comment_createdby` (`created_by`),
  KEY `idx_comment_post_items` (`post_id`,`published`,`rgt`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_easyblog_composer_blocks`
--

CREATE TABLE IF NOT EXISTS `n1wr9_easyblog_composer_blocks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group` varchar(255) NOT NULL,
  `element` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `keywords` text NOT NULL,
  `published` tinyint(3) NOT NULL,
  `created` datetime DEFAULT NULL,
  `ordering` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_published` (`published`),
  KEY `idx_ordering` (`ordering`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `n1wr9_easyblog_composer_blocks`
--

INSERT INTO `n1wr9_easyblog_composer_blocks` (`id`, `group`, `element`, `title`, `description`, `keywords`, `published`, `created`, `ordering`) VALUES
(1, 'media', 'audio', 'Audio Block', 'Allows you to embed an audio block into your blog post.', '', 1, NULL, 17),
(2, 'embeddables', 'behance', 'Behance Block', 'Allows you to embed a Behance widget in your blog post.', '', 1, NULL, 27),
(3, 'embeddables', 'blip', 'Blip', 'Allows you to embed videos from Blip', '', 1, NULL, 41),
(4, 'elements', 'buttons', 'Buttons Block', 'Allows you to insert a button into the editor', '', 1, NULL, 9),
(5, 'elements', 'code', 'Code Block', 'Allows you to insert a code block in the editor.', '', 1, NULL, 11),
(6, 'embeddables', 'codepen', 'Codepen Block', 'Allows you to embed codepen block in your blog post.', '', 1, NULL, 30),
(7, 'layout', 'columns', 'Columns Block', 'Allows you to insert multi column row into the editor', '', 1, NULL, 4),
(8, 'embeddables', 'dailymotion', 'Daily Motion', 'Allows you to embed a DailyMotion video.', '', 1, NULL, 35),
(9, 'media', 'file', 'File Block', 'Allows you to insert a file into the editor.', '', 1, NULL, 18),
(10, 'media', 'gallery', 'Gallery Block', 'Allows you to select multiple images to construct a picture gallery.', '', 1, NULL, 14),
(11, 'embeddables', 'gist', 'Gist', 'Embed Gist codes in your blog post by using this block.', '', 1, NULL, 24),
(12, 'layout', 'heading', 'Heading Block', 'Heading block allows the author to insert heading tags in the blog post.', '', 1, NULL, 1),
(13, 'misc', 'html', 'Html Block', 'Allows you to insert custom html codes within the editor', '', 1, NULL, 19),
(14, 'media', 'image', 'Image Block', 'Allows you to embed an image into the editor.', '', 1, NULL, 12),
(15, 'embeddables', 'instagram', 'Instagram Block', 'Allows you to embed an Instagram widget from Instagram in your blog post.', '', 1, NULL, 25),
(16, 'elements', 'links', 'Links Block', 'Allows you to insert a link content into the editor.''', '', 1, NULL, 10),
(17, 'embeddables', 'liveleak', 'Live Leak', 'Allows you to embed videos from Live Leak', '', 1, NULL, 40),
(18, 'embeddables', 'livestream', 'Live Stream', 'Allows you to embed videos from Live Stream', '', 1, NULL, 39),
(19, 'embeddables', 'metacafe', 'Metacafe', 'Allows you to embed videos from Metacafe', '', 1, NULL, 38),
(20, 'embeddables', 'mtv', 'MTV', 'Allows you to embed a MTV video', '', 1, NULL, 36),
(21, 'elements', 'note', 'Note Block', 'Allows you to insert an emphasis into the editor.', '', 1, NULL, 7),
(22, 'misc', 'pagebreak', 'Page Break', 'Allows you to add page break in your blog post', '', 1, NULL, 23),
(23, 'misc', 'post', 'Post', 'Allows users to insert a post block into the document.', '', 2, NULL, 22),
(24, 'embeddables', 'pinterest', 'Pinterest Block', 'Allows you to embed a pinterest pin within the post.', '', 1, NULL, 32),
(25, 'elements', 'quotes', 'Quotes Block', 'Allows you to insert a block quote in the editor.', '', 1, NULL, 8),
(26, 'misc', 'readmore', 'Readmore Block', 'Allows insertion of a read more block to separate the contents between intro text and full text', '', 1, NULL, 21),
(27, 'misc', 'rule', 'Rule Block', 'Allows you to insert a horizontal line block in the editor', '', 1, NULL, 20),
(28, 'embeddables', 'slideshare', 'Slideshare Block', 'Allows you to embed slideshare slides in your blog post.', '', 1, NULL, 29),
(29, 'embeddables', 'soundcloud', 'Soundcloud Block', 'Allows you to embed a Soundcloud widget in your blog post.', '', 1, NULL, 28),
(30, 'embeddables', 'spotify', 'Spotify Block', 'Allows you to embed a Spotify widget from in  your blog post.', '', 1, NULL, 26),
(31, 'layout', 'table', 'Table Block', 'Allows you to insert a table into the editor', '', 1, NULL, 5),
(32, 'layout', 'tabs', 'Tabs Block', 'Tab block allows the author to create tabs within their blog post.', '', 1, NULL, 3),
(33, 'embeddables', 'ted', 'TED', 'Allows you to embed videos from TED', '', 1, NULL, 37),
(34, 'layout', 'text', 'Text Block', 'Text block is simply just a paragraph of text which the author can insert into their blog post.', '', 1, NULL, 2),
(35, 'media', 'thumbnails', 'Thumbnails Block', 'Allows you to insert a thumbnail into the editor', '', 1, NULL, 15),
(36, 'embeddables', 'tweet', 'Tweet', 'Allows you to embed a twitter post.', '', 1, NULL, 31),
(37, 'media', 'video', 'Video Block', 'Allows you to insert an external video source from video providers within a blog post.', '', 1, NULL, 13),
(38, 'embeddables', 'vimeo', 'Vimeo', 'Allows you to embed a vimeo video.', '', 1, NULL, 34),
(39, 'embeddables', 'yahoo', 'Yahoo Screen', 'Allows you to embed videos from Yahoo Screen', '', 1, NULL, 42),
(40, 'embeddables', 'youtube', 'Youtube Block', 'Allows you to embed a youtube video', '', 1, NULL, 33);

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_easyblog_configs`
--

CREATE TABLE IF NOT EXISTS `n1wr9_easyblog_configs` (
  `name` varchar(255) NOT NULL,
  `params` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Store any configuration in key => params maps';

--
-- Dumping data for table `n1wr9_easyblog_configs`
--

INSERT INTO `n1wr9_easyblog_configs` (`name`, `params`) VALUES
('dbversion', '5.0.32'),
('scriptversion', '5.0.32'),
('config', 'main_title="EasyBlog"\nmain_description="This is some blog description about this site"\nmain_pagetitle_autoappend="1"\nmain_pagetitle_autoappend_entry="1"\nmain_login_read="0"\nmain_copyrights="0"\nmain_password_protect="1"\nmain_microblog="1"\nmain_multi_language="1"\nmain_start_of_week="monday"\nmain_hits_session="1"\nmain_newblogonfrontpage="1"\nmain_defaultallowcomment="0"\nmain_blogprivacy="0"\nmain_sendemailnotifications="1"\nmain_ratings="1"\nmain_ratings_frontpage_locked="0"\nmain_ratings_guests="0"\nmain_ratings_allow_author="1"\nmain_ratings_display_raters="1"\nmain_rss="0"\nmain_rss_content="introtext"\nmain_feedburner="0"\nmain_feedburnerblogger="0"\nmain_feedburner_url=""\nmain_sitesubscription="1"\nmain_subscription="1"\nmain_bloggersubscription="1"\nmain_categorysubscription="1"\nmain_teamsubscription="1"\nmain_allowguestsubscribe="1"\nmain_registeronsubscribe="0"\nmain_subscription_confirmation="1"\nmain_subscription_admin_notification="1"\nmain_locations_blog_language="en"\nmain_locations_static_maps="0"\nmain_locations_blog_map_height="300"\nmain_locations_map_type="ROADMAP"\nmain_locations_default_zoom_level="17"\nmain_locations_max_zoom_level="18"\nmain_locations_min_zoom_level="3"\nmain_locations="1"\nlocation_service_provider="maps"\nfoursquare_client_id=""\nfoursquare_client_secret=""\ngooglemaps_api_key=""\ngoogleplaces_api_key=""\ncomment_moderatecomment="0"\ncomment_moderateauthorcomment="0"\ncomment_moderateguestcomment="1"\nmain_post_min="0"\nmain_post_length="50"\nmain_blocked_words=""\nlayout_editor="tinymce"\nlayout_composer_permalink="1"\nlayout_composer_fields="1"\nlayout_dashboardseo="1"\nlayout_composer_history="1"\nlayout_composer_tags="1"\nmax_tags_allowed="5"\ncomposer_templates="1"\nmain_autofill_tags="1"\nmain_autofill_keywords="1"\nlayout_composer_language="1"\nlayout_composer_creationdate="1"\nlayout_composer_publishingdate="1"\nlayout_composer_unpublishdate="1"\nlayout_composer_privacy="1"\nlayout_composer_comment="1"\nmain_autodraft="1"\nmain_autodraft_interval="90"\nmain_keepalive="1"\nmain_keepalive_interval="90"\nmain_reporting="1"\nmain_reporting_guests="0"\nmain_reporting_maxip="0"\n919b8266153e1a518a6d6fb65d995c0f="1"\nactiveTab="jomsocial"\nmain_joomlauserparams="0"\nmain_dashboard_editaccount="1"\nmain_login_provider="jomsocial"\nmain_nonblogger_profile="1"\nlayout_exclude_bloggers=""\nlayout_exclude_categories=""\nmain_blogprivacy_override="1"\nmain_bloggerlistingoption="1"\nmain_autofeatured="0"\nlayout_blogger_breadcrumb="1"\nlayout_nameformat="name"\nmain_categories_hideempty="1"\nlayout_zero_as_plural="1"\nlayout_responsive="1"\nlayout_dashboard_biography_editor="0"\nlayout_enablebloggertheme="1"\nlayout_postorder="latest"\nlayout_postsort="desc"\nlayout_teamblogsort="desc"\nlayout_bloggerorder="latest"\nlayout_tagstyle="1"\nlisting_post_image="1"\nlisting_post_image_placeholder="0"\nlisting_post_title="1"\nlisting_post_category="1"\nlisting_post_hits="1"\nlisting_post_date="1"\nlisting_post_date_source="created"\nlisting_post_ratings="1"\nlisting_post_copyrights="0"\nlisting_post_author="1"\nlisting_post_author_avatar="1"\nlisting_post_tags="1"\nlisting_post_type="0"\nlisting_post_social_buttons="1"\nlisting_post_readmore="1"\nlisting_post_fields="1"\nlisting_post_nickel_column="2"\nlisting_post_comment_counter="1"\nlisting_post_comment_preview="1"\nlisting_post_comment_preview_limit="3"\nlisting_featured_slider="1"\nlisting_featured_slider_all_pages="1"\nlisting_featured_auto_slide="1"\nlisting_featured_auto_slide_interval="8"\nlisting_featured_post_image="1"\nlisting_featured_post_title="1"\nlisting_featured_post_category="1"\nlisting_featured_post_author="1"\nlisting_featured_post_author_avatar="1"\nlisting_featured_post_content="1"\nlisting_featured_post_content_limit="250"\nlisting_featured_post_date="1"\nlisting_featured_post_date_source="created"\nlisting_featured_post_readmore="1"\nlisting_featured_top_navigation="1"\nlisting_featured_bottom_navigation="1"\ncategory_category_header="1"\ncategory_category_avatar="1"\ncategory_category_title="1"\ncategory_category_description="1"\ncategory_category_subcategories="1"\ncategory_category_subcategories_posts="1"\ncategory_category_subscribe_email="1"\ncategory_category_subscribe_rss="1"\ncategory_category_post_customfields="1"\ncategory_post_nickel_column="2"\ncategory_post_image="1"\ncategory_post_image_placeholder="0"\ncategory_post_title="1"\ncategory_post_category="1"\ncategory_post_hits="1"\ncategory_post_date="1"\ncategory_post_date_source="created"\ncategory_post_ratings="1"\ncategory_post_copyrights="1"\ncategory_post_author="1"\ncategory_post_author_avatar="1"\ncategory_post_tags="1"\ncategory_post_type="0"\ncategory_post_social_buttons="1"\ncategory_post_comment_counter="1"\ncategory_post_comment_preview="1"\ncategory_post_comment_preview_limit="3"\nblogger_author_header="1"\nblogger_author_avatar="1"\nblogger_author_name="1"\nblogger_author_bio="1"\nblogger_author_twitter="1"\nblogger_author_website="1"\nblogger_post_image="1"\nblogger_post_image_placeholder="0"\nblogger_post_title="1"\nblogger_post_category="1"\nblogger_post_hits="1"\nblogger_post_date="1"\nblogger_post_date_source="created"\nblogger_post_ratings="1"\nblogger_post_copyrights="0"\nblogger_post_author="1"\nblogger_post_author_avatar="1"\nblogger_post_tags="1"\nblogger_post_type="0"\nblogger_post_social_buttons="1"\nblogger_post_comment_counter="1"\nblogger_post_comment_preview="1"\nblogger_post_comment_preview_limit="3"\ntag_tag_title="1"\ntag_tag_subscribe_rss="1"\ntag_post_nickel_column="2"\ntag_post_image="1"\ntag_post_image_placeholder="0"\ntag_post_title="1"\ntag_post_category="1"\ntag_post_hits="1"\ntag_post_date="1"\ntag_post_date_source="created"\ntag_post_ratings="1"\ntag_post_copyrights="1"\ntag_post_author="1"\ntag_post_author_avatar="1"\ntag_post_tags="1"\ntag_post_type="0"\ntag_post_social_buttons="1"\ntag_post_comment_counter="1"\ntag_post_comment_preview="1"\ntag_post_comment_preview_limit="3"\nlayout_show_intro="1"\nlayout_post_image="1"\nlayout_post_image_placeholder="0"\nlayout_post_title="1"\nlayout_post_category="1"\nlayout_post_date="1"\nlayout_post_date_source="created"\nlayout_post_ratings="1"\nlayout_post_hits="1"\nlayout_post_location="1"\nlayout_post_fields="1"\nlayout_post_copyrights="0"\nlayout_post_pdf="1"\nlayout_post_font_resize="1"\nlayout_post_subscribe_link="1"\nlayout_post_print="1"\nlayout_post_bookmark="1"\nlayout_post_bookmark_provider="addthis"\nlayout_post_navigation="1"\nlayout_post_navigation_type="site"\nlayout_post_tags="1"\nlayout_post_type="0"\nlayout_post_reporting="1"\nlayout_post_social_buttons="1"\nlayout_post_related="1"\nlayout_post_related_image="1"\nlayout_post_related_limit="5"\nlayout_post_comment_counter="1"\nlayout_post_comment_form="1"\nlayout_post_author_recent="1"\nlayout_post_author_recent_limit="3"\nlayout_post_author="1"\nlayout_post_author_box="1"\nlayout_post_author_box_avatar="1"\nlayout_post_author_box_title="1"\nlayout_post_author_box_view_profile="1"\nlayout_post_author_box_more_posts="1"\nlayout_post_author_box_website="1"\nlayout_post_author_box_biography="1"\nlayout_listlength="0"\nlayout_pagination_categories="5"\nlayout_pagination_bloggers="5"\nlayout_pagination_teamblogs="5"\nlayout_pagination_categories_per_page="5"\nlayout_pagination_bloggers_per_page="5"\nlayout_pagination_archive="5"\nlayout_pagination_dashboard_post_per_page="0"\nlayout_pagination_dashboard_comment_per_page="0"\ncomposer_truncation_enabled="1"\ncomposer_truncation_chars="350"\ncomposer_truncation_readmore="1"\ncomposer_truncate_image_position="hidden"\ncomposer_truncate_image_limit="0"\ncomposer_truncate_video_position="hidden"\ncomposer_truncate_video_limit="0"\ncomposer_truncate_audio_position="hidden"\ncomposer_truncate_audio_limit="0"\nlayout_blogasintrotext="0"\nmain_truncate_type="paragraph"\nlayout_maxlengthasintrotext="150"\nmain_truncate_maxtag="5"\nmain_truncate_ellipses="1"\nlayout_respect_readmore="0"\nmain_truncate_image_position="top"\nmain_truncate_video_position="top"\nmain_truncate_audio_position="top"\nmain_truncate_gallery_position="top"\nlayout_avatar="1"\nlayout_categoryavatar="1"\nlayout_teamavatar="1"\nlayout_avatar_link_name="1"\nlayout_avatarIntegration="default"\nlayout_phpbb_path=""\nlayout_headers="1"\nlayout_header_description="1"\nlayout_headers_respect_author="1"\nlayout_toolbar="1"\nlayout_latest="1"\nlayout_option_toolbar="1"\nlayout_categories="1"\nlayout_tags="1"\nlayout_bloggers="1"\nlayout_search="1"\nlayout_teamblog="1"\nlayout_archives="1"\nlayout_calendar="1"\nlayout_login="1"\ntoolbar_editprofile="1"\ntoolbar_teamrequest="1"\ntoolbar_logout="1"\nlayout_enabledashboardtoolbar="1"\nlayout_dashboardhome="1"\nlayout_dashboardmain="1"\nlayout_dashboardblogs="1"\nlayout_dashboardcomments="1"\nlayout_dashboardcategories="1"\nlayout_dashboardtags="1"\nlayout_dashboardteamrequest="1"\nlayout_dashboardnewpost="1"\nlayout_dashboardsettings="1"\nlayout_dashboardlogout="1"\ncover_size="large"\ncover_crop="0"\ncover_width_full="1"\ncover_height="200"\ncover_alignment="left"\ncover_size_entry="large"\ncover_crop_entry="0"\ncover_width_entry_full="1"\ncover_height_entry="200"\ncover_alignment_entry="center"\ncover_featured_size="large"\ncover_featured_crop="0"\ncover_featured_width="300"\ncover_featured_height="200"\ncover_featured_alignment="left"\nintegrations_easysocial_badges="1"\nintegrations_easysocial_conversations="1"\nintegrations_easysocial_points="0"\nintegrations_easysocial_friends="1"\nintegrations_easysocial_followers="1"\nintegrations_easysocial_editprofile="1"\nintegrations_easysocial_privacy="0"\nintegrations_easysocial_album="1"\nintegrations_easysocial_stream_newpost="1"\nintegrations_easysocial_stream_newrss="1"\nintegrations_easysocial_stream_featurepost="1"\nintegrations_easysocial_stream_updatepost="1"\nintegrations_easysocial_stream_newpost_source="intro"\nintegrations_easysocial_stream_newcomment="1"\nintegrations_easysocial_notifications_newpost="1"\nintegrations_easysocial_notifications_newcomment="1"\nintegrations_easysocial_notifications_ratings="1"\nintegrations_easysocial_indexer_newpost="1"\nintegrations_easysocial_indexer_newpost_length="250"\nintegrations_easydiscuss_points="1"\nintegrations_easydiscuss_badges="1"\nintegrations_easydiscuss_notification_blog="1"\nintegrations_easydiscuss_notification_comment="1"\nintegrations_easydiscuss_notification_rating="1"\nintegrations_jfbconnect_login="0"\nmain_jomsocial_privacy="1"\nintegrations_jomsocial_toolbar="1"\nmain_jomsocial_friends="1"\nmain_jomsocial_messaging="1"\nmain_jomsocial_userpoint="1"\nintegrations_jomsocial_album="1"\nintegrations_jomsocial_blog_new_activity="1"\nintegrations_jomsocial_rss_import_activity="0"\nintegrations_jomsocial_blog_update_activity="1"\nintegrations_jomsocial_unpublish_remove_activity="0"\nintegrations_jomsocial_comment_new_activity="1"\nintegrations_jomsocial_feature_blog_activity="1"\nintegrations_jomsocial_submit_content="1"\nintegrations_jomsocial_show_category="1"\nintegrations_jomsocial_activity_likes="1"\nintegrations_jomsocial_activity_comments="1"\nintegrations_jomsocial_blogs_length="250"\nintegrations_jomsocial_comments_length="250"\njomsocial_blog_title_length="80"\nmain_alpha_userpoint="1"\nmain_alpha_userpoint_points="1"\nmain_alpha_userpoint_medals="1"\nmain_alpha_userpoint_ranks="1"\nmain_ratings_aup_rate="0"\nmain_phocapdf_enable="0"\nintegration_google_adsense_enable="1"\nintegration_google_adsense_centralized="0"\nintegrations_google_adsense_blogger="1"\nintegration_google_adsense_display="both"\nintegration_google_adsense_display_access="both"\nintegration_google_adsense_responsive="1"\nintegration_google_adsense_responsive_code=""\nintegration_google_adsense_code=""\nmain_pingomatic="0"\nsubscription_mailchimp="0"\nsubscription_mailchimp_key=""\nsubscription_mailchimp_listid=""\nsubscription_mailchimp_welcome="1"\nmailchimp_campaign="0"\nmailchimp_from_name=""\nmailchimp_from_email=""\nsubscription_sendy="0"\nsubscription_sendy_url=""\nsubscription_sendy_listid=""\n255f394fd676507f91b728638260c138="1"');

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_easyblog_external`
--

CREATE TABLE IF NOT EXISTS `n1wr9_easyblog_external` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `source` text NOT NULL,
  `post_id` bigint(20) NOT NULL,
  `uid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `external_groups_post_id` (`post_id`),
  KEY `external_groups_group_id` (`uid`),
  KEY `external_groups_posts` (`uid`,`post_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_easyblog_external_groups`
--

CREATE TABLE IF NOT EXISTS `n1wr9_easyblog_external_groups` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `source` text NOT NULL,
  `post_id` bigint(20) NOT NULL,
  `group_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `external_groups_post_id` (`post_id`),
  KEY `external_groups_group_id` (`group_id`),
  KEY `external_groups_posts` (`group_id`,`post_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_easyblog_featured`
--

CREATE TABLE IF NOT EXISTS `n1wr9_easyblog_featured` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `content_id` bigint(20) unsigned NOT NULL,
  `type` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `easyblog_featured_content_type` (`content_id`,`type`),
  KEY `easyblog_content` (`content_id`),
  KEY `idx_featured_created` (`created`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_easyblog_feedburner`
--

CREATE TABLE IF NOT EXISTS `n1wr9_easyblog_feedburner` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `userid` bigint(20) unsigned NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_easyblog_feeds`
--

CREATE TABLE IF NOT EXISTS `n1wr9_easyblog_feeds` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `url` text NOT NULL,
  `interval` int(11) NOT NULL,
  `cron` tinyint(3) NOT NULL,
  `item_creator` int(11) NOT NULL,
  `item_team` int(11) NOT NULL,
  `item_category` bigint(20) NOT NULL,
  `item_frontpage` tinyint(3) NOT NULL,
  `item_published` tinyint(3) NOT NULL,
  `item_content` text NOT NULL,
  `item_get_fulltext` tinyint(3) NOT NULL DEFAULT '0',
  `author` tinyint(3) NOT NULL,
  `params` text NOT NULL,
  `published` tinyint(3) NOT NULL,
  `created` datetime NOT NULL,
  `last_import` datetime NOT NULL,
  `flag` tinyint(3) DEFAULT '0',
  `language` text,
  PRIMARY KEY (`id`),
  KEY `cron` (`cron`),
  KEY `item_creator` (`item_creator`),
  KEY `author` (`author`),
  KEY `item_frontpage` (`item_frontpage`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_easyblog_feeds_history`
--

CREATE TABLE IF NOT EXISTS `n1wr9_easyblog_feeds_history` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `feed_id` bigint(20) NOT NULL,
  `post_id` int(11) NOT NULL,
  `uid` text NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `feed_post_id` (`feed_id`,`post_id`),
  KEY `feed_uids` (`feed_id`,`uid`(255))
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_easyblog_fields`
--

CREATE TABLE IF NOT EXISTS `n1wr9_easyblog_fields` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `help` text NOT NULL,
  `state` tinyint(3) NOT NULL,
  `required` tinyint(3) NOT NULL,
  `type` varchar(255) NOT NULL,
  `params` text NOT NULL,
  `created` datetime DEFAULT NULL,
  `options` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `group_id` (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_easyblog_fields_groups`
--

CREATE TABLE IF NOT EXISTS `n1wr9_easyblog_fields_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created` datetime DEFAULT NULL,
  `state` tinyint(3) NOT NULL,
  `read` text NOT NULL,
  `write` text NOT NULL,
  `params` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `state` (`state`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_easyblog_fields_values`
--

CREATE TABLE IF NOT EXISTS `n1wr9_easyblog_fields_values` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `field_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `field_id` (`field_id`),
  KEY `post_id` (`post_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_easyblog_hashkeys`
--

CREATE TABLE IF NOT EXISTS `n1wr9_easyblog_hashkeys` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `uid` bigint(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `key` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`),
  KEY `type` (`type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_easyblog_languages`
--

CREATE TABLE IF NOT EXISTS `n1wr9_easyblog_languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `locale` varchar(255) NOT NULL,
  `updated` datetime NOT NULL,
  `state` tinyint(3) NOT NULL,
  `translator` varchar(255) NOT NULL,
  `progress` int(11) NOT NULL,
  `params` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_easyblog_likes`
--

CREATE TABLE IF NOT EXISTS `n1wr9_easyblog_likes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(20) NOT NULL,
  `content_id` int(11) NOT NULL,
  `created_by` bigint(20) unsigned DEFAULT '0',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `easyblog_content_type` (`type`,`content_id`),
  KEY `easyblog_contentid` (`content_id`),
  KEY `easyblog_createdby` (`created_by`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_easyblog_mailq`
--

CREATE TABLE IF NOT EXISTS `n1wr9_easyblog_mailq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mailfrom` varchar(255) DEFAULT NULL,
  `fromname` varchar(255) DEFAULT NULL,
  `recipient` varchar(255) NOT NULL,
  `subject` text NOT NULL,
  `body` text NOT NULL,
  `created` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `template` varchar(255) DEFAULT '',
  `data` longtext,
  `param` text,
  PRIMARY KEY (`id`),
  KEY `easyblog_mailq_status` (`status`),
  KEY `idx_mailq_created` (`created`),
  KEY `idx_mailq_statuscreated` (`status`,`created`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `n1wr9_easyblog_mailq`
--

INSERT INTO `n1wr9_easyblog_mailq` (`id`, `mailfrom`, `fromname`, `recipient`, `subject`, `body`, `created`, `status`, `template`, `data`, `param`) VALUES
(1, 'webmaster.work2@gmail.com', 'тримик', 'webmaster.work2@gmail.com', 'New blog post - You have successfully ins...', '', '2016-04-14 09:30:14', 1, 'post.new', '{"blogTitle":"You have successfully installed EasyBlog","blogAuthor":"Super User","blogAuthorAvatar":"http:\\/\\/xn--h1aaggsl.xn--p1ai\\/components\\/com_easyblog\\/assets\\/images\\/default_blogger.png","blogAuthorLink":"http:\\/\\/xn--h1aaggsl.xn--p1ai\\/index.php\\/blog\\/blogger\\/admin","blogAuthorEmail":"webmaster.work2@gmail.com","blogIntro":"\\n    \\nWith EasyBlog, you can be assured of quality blogging with the following features:\\u200b\\n    \\n        \\n    \\n    \\n        \\n    Drag and Drop BlocksAdd elements to your blog with a simple drag and drop element blocks.\\u200b\\n\\n    \\n        \\n    \\n    \\n        \\n    Blog now, post laterYou can compose a blog now, suffer temporal writer''s block, save and write...","blogContent":"\\n    \\nWith EasyBlog, you can be assured of quality blogging with the following features:\\u200b\\n    \\n        \\n    \\n    \\n        \\n    Drag and Drop BlocksAdd elements to your blog with a simple drag and drop element blocks.\\u200b\\n\\n    \\n        \\n    \\n    \\n        \\n    Blog now, post laterYou can compose a blog now, suffer temporal writer''s block, save and write...","blogCategory":"Uncategorized","blogLink":"http:\\/\\/xn--h1aaggsl.xn--p1ai\\/index.php\\/blog\\/easyblog-installed-successfully","blogDate":"14.04.2016","blogCover":false}', NULL),
(2, 'webmaster.work2@gmail.com', 'тримик', 'sloker.new@gmail.com', 'Your post requires approval from the site moderator', '', '2016-04-14 09:39:37', 1, 'post.moderated', '{"blogTitle":"\\u041c\\u043e\\u044f \\u043f\\u0435\\u0440\\u0432\\u0430\\u044f \\u0437\\u0430\\u043f\\u0438\\u0441\\u044c","blogAuthor":"\\u0412\\u044f\\u0447\\u0435\\u0441\\u043b\\u0430\\u0432","blogAuthorAvatar":"http:\\/\\/xn--h1aaggsl.xn--p1ai\\/components\\/com_easyblog\\/assets\\/images\\/default_blogger.png","blogAuthorLink":"http:\\/\\/xn--h1aaggsl.xn--p1ai\\/blog\\/blogger\\/sloker","blogAuthorEmail":"sloker.new@gmail.com","blogIntro":"<p>\\u041c\\u043e\\u044f \\u043f\\u0435\\u0440\\u0432\\u0430\\u044f \\u0437\\u0430\\u043f\\u0438\\u0441\\u044c<\\/p>","blogContent":"<p>\\u041c\\u043e\\u044f \\u043f\\u0435\\u0440\\u0432\\u0430\\u044f \\u0437\\u0430\\u043f\\u0438\\u0441\\u044c<\\/p>","blogCategory":"Uncategorized","blogLink":"http:\\/\\/xn--h1aaggsl.xn--p1ai\\/blog\\/moya-pervaya-zapis","blogDate":"14.04.2016","blogCover":false}', NULL),
(3, 'webmaster.work2@gmail.com', 'тримик', 'webmaster.work2@gmail.com', 'New post on the site requires moderation', '', '2016-04-14 09:39:37', 1, 'post.moderation', '{"blogTitle":"\\u041c\\u043e\\u044f \\u043f\\u0435\\u0440\\u0432\\u0430\\u044f \\u0437\\u0430\\u043f\\u0438\\u0441\\u044c","blogAuthor":"\\u0412\\u044f\\u0447\\u0435\\u0441\\u043b\\u0430\\u0432","blogAuthorAvatar":"http:\\/\\/xn--h1aaggsl.xn--p1ai\\/components\\/com_easyblog\\/assets\\/images\\/default_blogger.png","blogAuthorLink":"http:\\/\\/xn--h1aaggsl.xn--p1ai\\/blog\\/blogger\\/sloker","blogAuthorEmail":"sloker.new@gmail.com","blogIntro":"<p>\\u041c\\u043e\\u044f \\u043f\\u0435\\u0440\\u0432\\u0430\\u044f \\u0437\\u0430\\u043f\\u0438\\u0441\\u044c<\\/p>","blogContent":"<p>\\u041c\\u043e\\u044f \\u043f\\u0435\\u0440\\u0432\\u0430\\u044f \\u0437\\u0430\\u043f\\u0438\\u0441\\u044c<\\/p>","blogCategory":"Uncategorized","blogLink":"http:\\/\\/xn--h1aaggsl.xn--p1ai\\/blog\\/moya-pervaya-zapis","blogDate":"14.04.2016","blogCover":false}', NULL),
(4, 'webmaster.work2@gmail.com', 'тримик', 'webmaster.work2@gmail.com', 'New blog post - Моя первая запись...', '', '2016-04-14 09:40:30', 1, 'post.new', '{"blogTitle":"\\u041c\\u043e\\u044f \\u043f\\u0435\\u0440\\u0432\\u0430\\u044f \\u0437\\u0430\\u043f\\u0438\\u0441\\u044c","blogAuthor":"\\u0412\\u044f\\u0447\\u0435\\u0441\\u043b\\u0430\\u0432","blogAuthorAvatar":"http:\\/\\/xn--h1aaggsl.xn--p1ai\\/components\\/com_easyblog\\/assets\\/images\\/default_blogger.png","blogAuthorLink":"http:\\/\\/xn--h1aaggsl.xn--p1ai\\/blog\\/blogger\\/sloker","blogAuthorEmail":"sloker.new@gmail.com","blogIntro":"<p>\\u041c\\u043e\\u044f \\u043f\\u0435\\u0440\\u0432\\u0430\\u044f \\u0437\\u0430\\u043f\\u0438\\u0441\\u044c<\\/p>","blogContent":"<p>\\u041c\\u043e\\u044f \\u043f\\u0435\\u0440\\u0432\\u0430\\u044f \\u0437\\u0430\\u043f\\u0438\\u0441\\u044c<\\/p>","blogCategory":"Uncategorized","blogLink":"http:\\/\\/xn--h1aaggsl.xn--p1ai\\/blog\\/moya-pervaya-zapis","blogDate":"14.04.2016","blogCover":false}', NULL),
(5, 'webmaster.work2@gmail.com', 'тримик', 'sloker.new@gmail.com', 'The post that you have submitted earlier was approved by the site moderator....', '', '2016-04-14 09:40:30', 1, 'post.approved', '{"blogTitle":"\\u041c\\u043e\\u044f \\u043f\\u0435\\u0440\\u0432\\u0430\\u044f \\u0437\\u0430\\u043f\\u0438\\u0441\\u044c","blogAuthor":"\\u0412\\u044f\\u0447\\u0435\\u0441\\u043b\\u0430\\u0432","blogAuthorAvatar":"http:\\/\\/xn--h1aaggsl.xn--p1ai\\/components\\/com_easyblog\\/assets\\/images\\/default_blogger.png","blogAuthorLink":"http:\\/\\/xn--h1aaggsl.xn--p1ai\\/blog\\/blogger\\/sloker","blogAuthorEmail":"sloker.new@gmail.com","blogIntro":"<p>\\u041c\\u043e\\u044f \\u043f\\u0435\\u0440\\u0432\\u0430\\u044f \\u0437\\u0430\\u043f\\u0438\\u0441\\u044c<\\/p>","blogContent":"<p>\\u041c\\u043e\\u044f \\u043f\\u0435\\u0440\\u0432\\u0430\\u044f \\u0437\\u0430\\u043f\\u0438\\u0441\\u044c<\\/p>","blogCategory":"Uncategorized","blogLink":"http:\\/\\/xn--h1aaggsl.xn--p1ai\\/blog\\/moya-pervaya-zapis","blogDate":"14.04.2016","blogCover":false}', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_easyblog_mediamanager`
--

CREATE TABLE IF NOT EXISTS `n1wr9_easyblog_mediamanager` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `path` text NOT NULL,
  `type` varchar(255) NOT NULL,
  `params` longtext NOT NULL,
  PRIMARY KEY (`id`),
  KEY `type` (`type`),
  FULLTEXT KEY `path` (`path`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_easyblog_meta`
--

CREATE TABLE IF NOT EXISTS `n1wr9_easyblog_meta` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(20) NOT NULL,
  `content_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `keywords` text,
  `description` text,
  `indexing` int(3) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `idx_meta_content_type` (`content_id`,`type`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `n1wr9_easyblog_meta`
--

INSERT INTO `n1wr9_easyblog_meta` (`id`, `type`, `content_id`, `title`, `keywords`, `description`, `indexing`) VALUES
(1, 'view', 1, '', '', '', 1),
(2, 'view', 2, '', '', '', 1),
(3, 'view', 3, '', '', '', 1),
(4, 'view', 4, '', '', '', 1),
(5, 'view', 5, '', '', '', 1),
(6, 'view', 6, '', '', '', 1),
(7, 'view', 7, '', '', '', 1),
(8, 'view', 8, '', '', '', 1),
(9, 'post', 1, '', '', '', 1),
(10, 'post', 2, '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_easyblog_migrate_content`
--

CREATE TABLE IF NOT EXISTS `n1wr9_easyblog_migrate_content` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `content_id` bigint(20) unsigned NOT NULL,
  `post_id` bigint(20) unsigned NOT NULL,
  `session_id` varchar(255) NOT NULL,
  `component` varchar(255) NOT NULL DEFAULT 'com_content',
  `filename` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `content_id` (`content_id`),
  KEY `post_id` (`post_id`),
  KEY `session_id` (`session_id`),
  KEY `component_content` (`content_id`,`component`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Store migrated joomla content id and map with eblog post id.' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_easyblog_oauth`
--

CREATE TABLE IF NOT EXISTS `n1wr9_easyblog_oauth` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `auto` tinyint(1) NOT NULL,
  `request_token` text NOT NULL,
  `access_token` text NOT NULL,
  `message` text NOT NULL,
  `created` datetime NOT NULL,
  `private` tinyint(4) NOT NULL,
  `params` text NOT NULL,
  `system` tinyint(3) unsigned DEFAULT '0',
  `expires` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `easyblog_oauth_user_type` (`user_id`,`type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_easyblog_oauth_posts`
--

CREATE TABLE IF NOT EXISTS `n1wr9_easyblog_oauth_posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `oauth_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `sent` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `easyblog_oauth_posts_ids` (`oauth_id`,`post_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_easyblog_post`
--

CREATE TABLE IF NOT EXISTS `n1wr9_easyblog_post` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_by` bigint(20) unsigned NOT NULL,
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` datetime DEFAULT '0000-00-00 00:00:00',
  `title` text,
  `permalink` text NOT NULL,
  `content` longtext NOT NULL,
  `intro` longtext NOT NULL,
  `excerpt` text,
  `category_id` bigint(20) unsigned NOT NULL,
  `published` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `state` int(1) unsigned NOT NULL,
  `publish_up` datetime DEFAULT '0000-00-00 00:00:00',
  `publish_down` datetime DEFAULT '0000-00-00 00:00:00',
  `ordering` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `vote` int(11) unsigned NOT NULL DEFAULT '0',
  `hits` int(11) unsigned NOT NULL DEFAULT '0',
  `access` int(11) unsigned NOT NULL DEFAULT '0',
  `allowcomment` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `subscription` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `frontpage` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `isnew` tinyint(3) unsigned DEFAULT '0' COMMENT 'To indicate whether the post is new created or already been edited',
  `blogpassword` varchar(100) NOT NULL DEFAULT '',
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `address` text,
  `posttype` varchar(255) NOT NULL,
  `robots` text,
  `copyrights` text,
  `image` text,
  `language` char(7) NOT NULL,
  `send_notification_emails` tinyint(1) NOT NULL DEFAULT '1',
  `locked` tinyint(3) NOT NULL,
  `revision_id` int(11) DEFAULT NULL,
  `source_id` bigint(20) DEFAULT '0',
  `source_type` varchar(64) DEFAULT '',
  `ip` varchar(255) NOT NULL,
  `doctype` varchar(255) NOT NULL,
  `document` text,
  PRIMARY KEY (`id`),
  KEY `easyblog_post_catid` (`category_id`),
  KEY `easyblog_post_published` (`published`),
  KEY `easyblog_post_created_by` (`created_by`),
  KEY `easyblog_post_blogger_list` (`published`,`id`,`created_by`),
  KEY `easyblog_post_searchnew` (`access`,`published`,`created`),
  KEY `easyblog_frontpage1` (`published`,`frontpage`,`created`),
  KEY `idx_pre_soucetype_postcount` (`published`,`state`,`source_type`,`source_id`),
  KEY `idx_post_sql1` (`published`,`state`,`source_type`,`source_id`,`created`),
  KEY `idx_post_revision` (`revision_id`),
  KEY `idx_permalink` (`permalink`(255))
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `n1wr9_easyblog_post`
--

INSERT INTO `n1wr9_easyblog_post` (`id`, `created_by`, `created`, `modified`, `title`, `permalink`, `content`, `intro`, `excerpt`, `category_id`, `published`, `state`, `publish_up`, `publish_down`, `ordering`, `vote`, `hits`, `access`, `allowcomment`, `subscription`, `frontpage`, `isnew`, `blogpassword`, `latitude`, `longitude`, `address`, `posttype`, `robots`, `copyrights`, `image`, `language`, `send_notification_emails`, `locked`, `revision_id`, `source_id`, `source_type`, `ip`, `doctype`, `document`) VALUES
(1, 311, '2016-04-14 09:30:14', '2016-04-14 09:30:14', 'You have successfully installed EasyBlog', 'easyblog-installed-successfully', '<div class="ebd-block " data-type="html" ><p><img src="http://stackideas.com/images/eblog/install_success5.png">\n    \n</p></div><div class="ebd-block " data-type="text" >With EasyBlog, you can be assured of quality blogging with the following features:<span class="redactor-invisible-space">​</span></div><div class="ebd-block " data-type="rule" ><hr></div><div class="ebd-block " data-type="columns" ><div class="row" data-responsive="400,300,200,100">\n    <div class="col col-md-4" data-size="6">\n        \n    <div class="ebd-block  is-nested" data-type="youtube" ><div class="youtube-embed video-embed-wrapper is-responsive">\n    <iframe src="https://www.youtube.com/embed/f-YEli-NK-w?feature=oembed" width="480" height="270" allowfullscreen></iframe>\n</div></div></div>\n    <div class="col col-md-8" data-size="6">\n        \n    <div class="ebd-block  is-nested" data-type="heading" ><h4>Drag and Drop Blocks<br><br></h4></div><div class="ebd-block  is-nested" data-type="text" >Add elements to your blog with a simple drag and drop element blocks.<span class="redactor-invisible-space">​</span></div></div>\n</div></div><div class="ebd-block " data-type="rule" ><hr></div><div class="ebd-block " data-type="columns" ><div class="row" data-responsive="400,300,200,100">\n    <div class="col col-md-1" data-size="6">\n        \n    </div>\n    <div class="col col-md-8" data-size="6">\n        \n    <div class="ebd-block  is-nested" data-type="heading" ><h4>Blog now, post later<br></h4></div><div class="ebd-block  is-nested" data-type="text" >You can compose a blog now, suffer temporal writer''s block, save and write again, later.<span class="redactor-invisible-space">​</span></div></div>\n</div></div><div class="ebd-block " data-type="columns" ><div class="row" data-responsive="400,300,200,100">\n    <div class="col col-md-1" data-size="6">\n        \n    </div>\n    <div class="col col-md-6" data-size="6">\n        \n    <div class="ebd-block  is-nested" data-type="heading" ><h4><br>Social media sharing<br></h4></div><div class="ebd-block  is-nested" data-type="text" >Automatically post into your Twitter, Facebook and LinkedIn whenever you create new blog entries.<span class="redactor-invisible-space">​</span></div></div>\n</div></div><div class="ebd-block " data-type="columns" ><div class="row" data-responsive="400,300,200,100">\n    <div class="col col-md-1" data-size="6">\n        \n    </div>\n    <div class="col col-md-6" data-size="6">\n        \n    <div class="ebd-block  is-nested" data-type="heading" ><h4><br>Browse media<br></h4></div><div class="ebd-block  is-nested" data-type="text" >Embedding images and videos is fast and easy.<span class="redactor-invisible-space">​</span></div></div>\n</div></div><div class="ebd-block " data-type="columns" ><div class="row" data-responsive="400,300,200,100">\n    <div class="col col-md-1" data-size="6">\n        \n    </div>\n    <div class="col col-md-6" data-size="6">\n        \n    <div class="ebd-block  is-nested" data-type="heading" ><h4><br>More third party integrations<br></h4></div><div class="ebd-block  is-nested" data-type="text" >Having other Joomla! plugins and extensions to work with EasyBlog is just a few clicks away.<span class="redactor-invisible-space">​</span></div></div>\n</div></div><div class="ebd-block " data-type="columns" ><div class="row" data-responsive="400,300,200,100">\n    <div class="col col-md-1" data-size="6">\n        \n    </div>\n    <div class="col col-md-6" data-size="6">\n        \n    <div class="ebd-block  is-nested" data-type="heading" ><h4><br>Blog rating<br></h4></div><div class="ebd-block  is-nested" data-type="text" >Users can show intensity of their favorite blog post by rating them with stars.<span class="redactor-invisible-space">​</span></div></div>\n</div></div><div class="ebd-block " data-type="rule" ><hr></div><div class="ebd-block " data-type="text" ><p>And many more powerful features that you can use to make your blog work beautifully and professionally. Need any help? Drop by our <a target="_blank" class="" title="" href="http://stackideas.com/forums/index/easyblog">Official forum</a> or send our support team a ticket via our <a target="_blank" class="" title="" href="https://crm.stackideas.com">CRM</a>. You can even check out <a target="_blank" class="" title="" href="http://stackideas.com/docs/easyblog">EasyBlog''s Documentation</a>.</p></div>', '\n    \nWith EasyBlog, you can be assured of quality blogging with the following features:​\n    \n        \n    \n    \n        \n    Drag and Drop BlocksAdd elements to your blog with a simple drag and drop element blocks.​\n\n    \n        \n    \n    \n        \n    Blog now, post laterYou can compose a blog now, suffer temporal writer''s block, save and write...', NULL, 1, 1, 0, '2016-04-14 09:30:14', '0000-00-00 00:00:00', 0, 0, 0, 0, 1, 1, 1, 0, '', NULL, NULL, NULL, '', NULL, NULL, NULL, '', 1, 0, 1, 0, 'easyblog.sitewide', '91.144.174.213', 'ebd', '{"type":"ebd","blocks":[{"uid":"07094988151957076","type":"html","html":"<p><img src=\\"http:\\/\\/stackideas.com\\/images\\/eblog\\/install_success5.png\\">\\n    \\n<\\/p>","data":{},"blocks":[],"nested":false,"isolated":false,"text":"\\n    \\n","editableHtml":"<p><img src=\\"http:\\/\\/stackideas.com\\/images\\/eblog\\/install_success5.png\\">\\n    \\n<\\/p>"},{"uid":"03040071225259453","type":"text","html":"With EasyBlog, you can be assured of quality blogging with the following features:<span class=\\"redactor-invisible-space\\">\\u200b<\\/span>","data":{},"blocks":[],"nested":false,"isolated":false,"text":"With EasyBlog, you can be assured of quality blogging with the following features:\\u200b","editableHtml":"<div class=\\"ebd-nest\\" data-type=\\"content\\" data-eb-text-block-wrapper=\\"\\"><div data-content-type=\\"html\\" data-eb-text-content-wrapper=\\"\\" contenteditable=\\"true\\">With EasyBlog, you can be assured of quality blogging with the following features:<span class=\\"redactor-invisible-space\\">\\u200b<\\/span><\\/div><\\/div>"},{"uid":"0346444247988984","type":"rule","html":"\\n            <hr>        ","data":{},"blocks":[],"nested":false,"isolated":false,"text":"","editableHtml":"\\n            <hr>        "},{"uid":"05725746976677328","type":"columns","html":"\\n            <div class=\\"row\\" data-responsive=\\"400,300,200,100\\">\\n    <div class=\\"col col-md-4\\" data-size=\\"6\\">\\n        \\n    <!--block06016321050556486--><\\/div>\\n    <div class=\\"col col-md-8\\" data-size=\\"6\\">\\n        \\n    <!--block029067436303012073--><!--block038569004484452307--><\\/div>\\n<\\/div>        ","data":{"columns":[{"size":6,"content":"COM_EASYBLOG_BLOCK_COLUMN_DEFAULT_TITLE"},{"size":6,"content":"COM_EASYBLOG_BLOCK_COLUMN_DEFAULT_TITLE"}]},"blocks":[{"uid":"06016321050556486","type":"youtube","html":"<iframe src=\\"https:\\/\\/www.youtube.com\\/embed\\/f-YEli-NK-w?feature=oembed\\" allowfullscreen=\\"\\" frameborder=\\"0\\" height=\\"270\\" width=\\"480\\"><\\/iframe>","data":{"author":{"name":"StackIdeas","url":"http:\\/\\/www.youtube.com\\/user\\/stackideas"},"url":"https:\\/\\/www.youtube.com\\/watch?v=f-YEli-NK-w","width":480,"height":270,"fluid":true,"embed":"<iframe width=\\"480\\" height=\\"270\\" src=\\"https:\\/\\/www.youtube.com\\/embed\\/f-YEli-NK-w?feature=oembed\\" frameborder=\\"0\\" allowfullscreen><\\/iframe>","source":"https:\\/\\/www.youtube.com\\/embed\\/f-YEli-NK-w?feature=oembed"},"blocks":[],"nested":true,"isolated":false,"text":"https:\\/\\/www.youtube.com\\/embed\\/f-YEli-NK-w?feature=oembed","editableHtml":""},{"uid":"029067436303012073","type":"heading","html":"\\n            <h4>Drag and Drop Blocks<br><br><\\/h4>        ","data":{},"blocks":[],"nested":true,"isolated":false,"text":"\\n    \\n        \\n    \\n    \\n        \\n            Drag and Drop Blocks        \\n        \\n            \\n                \\n            \\n        \\n    \\n    \\n        \\n            \\n                Drag to move block.\\n            \\n        \\n    \\n","editableHtml":"\\n            <h4 contenteditable=\\"true\\">Drag and Drop Blocks<br><br><\\/h4>        "},{"uid":"038569004484452307","type":"text","html":"Add elements to your blog with a simple drag and drop element blocks.<span class=\\"redactor-invisible-space\\">\\u200b<\\/span>","data":{},"blocks":[],"nested":true,"isolated":false,"text":"Add elements to your blog with a simple drag and drop element blocks.\\u200b","editableHtml":"<div class=\\"ebd-nest\\" data-type=\\"content\\" data-eb-text-block-wrapper=\\"\\"><div data-content-type=\\"html\\" data-eb-text-content-wrapper=\\"\\" contenteditable=\\"true\\">Add elements to your blog with a simple drag and drop element blocks.<span class=\\"redactor-invisible-space\\">\\u200b<\\/span><\\/div><\\/div>"},{"uid":"06016321050556486","type":"youtube","html":"<iframe src=\\"https:\\/\\/www.youtube.com\\/embed\\/f-YEli-NK-w?feature=oembed\\" allowfullscreen=\\"\\" frameborder=\\"0\\" height=\\"270\\" width=\\"480\\"><\\/iframe>","data":{"author":{"name":"StackIdeas","url":"http:\\/\\/www.youtube.com\\/user\\/stackideas"},"url":"https:\\/\\/www.youtube.com\\/watch?v=f-YEli-NK-w","width":480,"height":270,"fluid":true,"embed":"<iframe width=\\"480\\" height=\\"270\\" src=\\"https:\\/\\/www.youtube.com\\/embed\\/f-YEli-NK-w?feature=oembed\\" frameborder=\\"0\\" allowfullscreen><\\/iframe>","source":"https:\\/\\/www.youtube.com\\/embed\\/f-YEli-NK-w?feature=oembed"},"blocks":[],"nested":true,"isolated":false,"text":"https:\\/\\/www.youtube.com\\/embed\\/f-YEli-NK-w?feature=oembed","editableHtml":""},{"uid":"029067436303012073","type":"heading","html":"\\n            <h4>Drag and Drop Blocks<br><br><\\/h4>        ","data":{},"blocks":[],"nested":true,"isolated":false,"text":"\\n    \\n        \\n    \\n    \\n        \\n            Drag and Drop Blocks        \\n        \\n            \\n                \\n            \\n        \\n    \\n    \\n        \\n            \\n                Drag to move block.\\n            \\n        \\n    \\n","editableHtml":"\\n            <h4 contenteditable=\\"true\\">Drag and Drop Blocks<br><br><\\/h4>        "},{"uid":"038569004484452307","type":"text","html":"Add elements to your blog with a simple drag and drop element blocks.<span class=\\"redactor-invisible-space\\">\\u200b<\\/span>","data":{},"blocks":[],"nested":true,"isolated":false,"text":"Add elements to your blog with a simple drag and drop element blocks.\\u200b","editableHtml":"<div class=\\"ebd-nest\\" data-type=\\"content\\" data-eb-text-block-wrapper=\\"\\"><div data-content-type=\\"html\\" data-eb-text-content-wrapper=\\"\\" contenteditable=\\"true\\">Add elements to your blog with a simple drag and drop element blocks.<span class=\\"redactor-invisible-space\\">\\u200b<\\/span><\\/div><\\/div>"}],"nested":false,"isolated":false,"text":"\\n            \\n    \\n        \\n    \\n        \\n    \\n    \\n        \\n        \\n            \\n                \\n            \\n        \\n    \\n    \\n        \\n            \\n                Drag to move block.\\n            \\n        \\n    \\n\\n\\n\\n            \\n        \\n    \\n    \\n        \\n    \\n        \\n    \\n    \\n        \\n            Drag and Drop Blocks        \\n        \\n            \\n                \\n            \\n        \\n    \\n    \\n        \\n            \\n                Drag to move block.\\n            \\n        \\n    \\n\\n\\n\\n            \\n    \\n        \\n    \\n    \\n        Add elements to your blog with a simple drag and drop element blocks.\\u200b\\n        \\n            \\n                \\n            \\n        \\n    \\n    \\n        \\n            \\n                Drag to move block.\\n            \\n        \\n    \\n\\n\\n\\n\\n\\n        \\n    \\n        ","editableHtml":"\\n            <div class=\\"row\\" data-responsive=\\"400,300,200,100\\">\\n    <div class=\\"col col-md-4\\" data-size=\\"6\\">\\n        <div class=\\"ebd-nest\\" data-type=\\"block\\" data-col-wrapper=\\"\\"><!--block06016321050556486-->\\n\\n\\n            \\n        <\\/div>\\n    <\\/div>\\n    <div class=\\"col col-md-8\\" data-size=\\"6\\">\\n        <div class=\\"ebd-nest\\" data-type=\\"block\\" data-col-wrapper=\\"\\"><!--block029067436303012073-->\\n\\n\\n            <!--block038569004484452307-->\\n\\n\\n\\n\\n        <\\/div>\\n    <\\/div>\\n<\\/div>        "},{"uid":"026837448799051344","type":"rule","html":"\\n            <hr>        ","data":{},"blocks":[],"nested":false,"isolated":false,"text":"","editableHtml":"\\n            <hr>        "},{"uid":"0046830407343804836","type":"columns","html":"\\n            <div class=\\"row\\" data-responsive=\\"400,300,200,100\\">\\n    <div class=\\"col col-md-1\\" data-size=\\"6\\">\\n        \\n    <\\/div>\\n    <div class=\\"col col-md-8\\" data-size=\\"6\\">\\n        \\n    <!--block08473397800698876--><!--block07279896603431553--><\\/div>\\n<\\/div>        ","data":{"columns":[{"size":6,"content":"COM_EASYBLOG_BLOCK_COLUMN_DEFAULT_TITLE"},{"size":6,"content":"COM_EASYBLOG_BLOCK_COLUMN_DEFAULT_TITLE"}]},"blocks":[{"uid":"08473397800698876","type":"heading","html":"\\n            <h4>Blog now, post later<br><\\/h4>        ","data":{},"blocks":[],"nested":true,"isolated":false,"text":"\\n    \\n        \\n    \\n    \\n        \\n            Blog now, post later        \\n        \\n            \\n                \\n            \\n        \\n    \\n    \\n        \\n            \\n                Drag to move block.\\n            \\n        \\n    \\n","editableHtml":"\\n            <h4 contenteditable=\\"true\\">Blog now, post later<br><\\/h4>        "},{"uid":"07279896603431553","type":"text","html":"You can compose a blog now, suffer temporal writer''s block, save and write again, later.<span class=\\"redactor-invisible-space\\">\\u200b<\\/span>","data":{},"blocks":[],"nested":true,"isolated":false,"text":"You can compose a blog now, suffer temporal writer''s block, save and write again, later.\\u200b","editableHtml":"<div class=\\"ebd-nest\\" data-type=\\"content\\" data-eb-text-block-wrapper=\\"\\"><div data-content-type=\\"html\\" data-eb-text-content-wrapper=\\"\\" contenteditable=\\"true\\">You can compose a blog now, suffer temporal writer''s block, save and write again, later.<span class=\\"redactor-invisible-space\\">\\u200b<\\/span><\\/div><\\/div>"},{"uid":"08473397800698876","type":"heading","html":"\\n            <h4>Blog now, post later<br><\\/h4>        ","data":{},"blocks":[],"nested":true,"isolated":false,"text":"\\n    \\n        \\n    \\n    \\n        \\n            Blog now, post later        \\n        \\n            \\n                \\n            \\n        \\n    \\n    \\n        \\n            \\n                Drag to move block.\\n            \\n        \\n    \\n","editableHtml":"\\n            <h4 contenteditable=\\"true\\">Blog now, post later<br><\\/h4>        "},{"uid":"07279896603431553","type":"text","html":"You can compose a blog now, suffer temporal writer''s block, save and write again, later.<span class=\\"redactor-invisible-space\\">\\u200b<\\/span>","data":{},"blocks":[],"nested":true,"isolated":false,"text":"You can compose a blog now, suffer temporal writer''s block, save and write again, later.\\u200b","editableHtml":"<div class=\\"ebd-nest\\" data-type=\\"content\\" data-eb-text-block-wrapper=\\"\\"><div data-content-type=\\"html\\" data-eb-text-content-wrapper=\\"\\" contenteditable=\\"true\\">You can compose a blog now, suffer temporal writer''s block, save and write again, later.<span class=\\"redactor-invisible-space\\">\\u200b<\\/span><\\/div><\\/div>"}],"nested":false,"isolated":false,"text":"\\n            \\n    \\n        \\n\\n\\n            \\n        \\n    \\n    \\n        \\n    \\n        \\n    \\n    \\n        \\n            Blog now, post later        \\n        \\n            \\n                \\n            \\n        \\n    \\n    \\n        \\n            \\n                Drag to move block.\\n            \\n        \\n    \\n\\n\\n\\n            \\n    \\n        \\n    \\n    \\n        You can compose a blog now, suffer temporal writer''s block, save and write again, later.\\u200b\\n        \\n            \\n                \\n            \\n        \\n    \\n    \\n        \\n            \\n                Drag to move block.\\n            \\n        \\n    \\n\\n\\n\\n\\n\\n        \\n    \\n        ","editableHtml":"\\n            <div class=\\"row\\" data-responsive=\\"400,300,200,100\\">\\n    <div class=\\"col col-md-1\\" data-size=\\"6\\">\\n        <div class=\\"ebd-nest\\" data-type=\\"block\\" data-col-wrapper=\\"\\">\\n\\n\\n            \\n        <\\/div>\\n    <\\/div>\\n    <div class=\\"col col-md-8\\" data-size=\\"6\\">\\n        <div class=\\"ebd-nest\\" data-type=\\"block\\" data-col-wrapper=\\"\\"><!--block08473397800698876-->\\n\\n\\n            <!--block07279896603431553-->\\n\\n\\n\\n\\n        <\\/div>\\n    <\\/div>\\n<\\/div>        "},{"uid":"034305927456222685","type":"columns","html":"\\n            <div class=\\"row\\" data-responsive=\\"400,300,200,100\\">\\n    <div class=\\"col col-md-1\\" data-size=\\"6\\">\\n        \\n    <\\/div>\\n    <div class=\\"col col-md-6\\" data-size=\\"6\\">\\n        \\n    <!--block09808841066849929--><!--block036551126970772363--><\\/div>\\n<\\/div>        ","data":{"columns":[{"size":6,"content":"COM_EASYBLOG_BLOCK_COLUMN_DEFAULT_TITLE"},{"size":6,"content":"COM_EASYBLOG_BLOCK_COLUMN_DEFAULT_TITLE"}]},"blocks":[{"uid":"09808841066849929","type":"heading","html":"<h4><br>Social media sharing<br><\\/h4>","data":{},"blocks":[],"nested":true,"isolated":false,"text":"\\n    \\n        \\n    \\n    \\n        Social media sharing\\n        \\n            \\n                \\n            \\n        \\n    \\n    \\n        \\n            \\n                Drag to move block.\\n            \\n        \\n    \\n","editableHtml":"<h4 contenteditable=\\"true\\"><br>Social media sharing<br><\\/h4>"},{"uid":"036551126970772363","type":"text","html":"Automatically post into your Twitter, Facebook and LinkedIn whenever you create new blog entries.<span class=\\"redactor-invisible-space\\">\\u200b<\\/span>","data":{},"blocks":[],"nested":true,"isolated":false,"text":"Automatically post into your Twitter, Facebook and LinkedIn whenever you create new blog entries.\\u200b","editableHtml":"<div class=\\"ebd-nest\\" data-type=\\"content\\" data-eb-text-block-wrapper=\\"\\"><div data-content-type=\\"html\\" data-eb-text-content-wrapper=\\"\\" contenteditable=\\"true\\">Automatically post into your Twitter, Facebook and LinkedIn whenever you create new blog entries.<span class=\\"redactor-invisible-space\\">\\u200b<\\/span><\\/div><\\/div>"},{"uid":"09808841066849929","type":"heading","html":"<h4><br>Social media sharing<br><\\/h4>","data":{},"blocks":[],"nested":true,"isolated":false,"text":"\\n    \\n        \\n    \\n    \\n        Social media sharing\\n        \\n            \\n                \\n            \\n        \\n    \\n    \\n        \\n            \\n                Drag to move block.\\n            \\n        \\n    \\n","editableHtml":"<h4 contenteditable=\\"true\\"><br>Social media sharing<br><\\/h4>"},{"uid":"036551126970772363","type":"text","html":"Automatically post into your Twitter, Facebook and LinkedIn whenever you create new blog entries.<span class=\\"redactor-invisible-space\\">\\u200b<\\/span>","data":{},"blocks":[],"nested":true,"isolated":false,"text":"Automatically post into your Twitter, Facebook and LinkedIn whenever you create new blog entries.\\u200b","editableHtml":"<div class=\\"ebd-nest\\" data-type=\\"content\\" data-eb-text-block-wrapper=\\"\\"><div data-content-type=\\"html\\" data-eb-text-content-wrapper=\\"\\" contenteditable=\\"true\\">Automatically post into your Twitter, Facebook and LinkedIn whenever you create new blog entries.<span class=\\"redactor-invisible-space\\">\\u200b<\\/span><\\/div><\\/div>"}],"nested":false,"isolated":false,"text":"\\n            \\n    \\n        \\n            \\n        \\n    \\n    \\n        \\n    \\n        \\n    \\n    \\n        Social media sharing\\n        \\n            \\n                \\n            \\n        \\n    \\n    \\n        \\n            \\n                Drag to move block.\\n            \\n        \\n    \\n\\n            \\n    \\n        \\n    \\n    \\n        Automatically post into your Twitter, Facebook and LinkedIn whenever you create new blog entries.\\u200b\\n        \\n            \\n                \\n            \\n        \\n    \\n    \\n        \\n            \\n                Drag to move block.\\n            \\n        \\n    \\n\\n        \\n    \\n        ","editableHtml":"\\n            <div class=\\"row\\" data-responsive=\\"400,300,200,100\\">\\n    <div class=\\"col col-md-1\\" data-size=\\"6\\">\\n        <div class=\\"ebd-nest\\" data-type=\\"block\\" data-col-wrapper=\\"\\">\\n            \\n        <\\/div>\\n    <\\/div>\\n    <div class=\\"col col-md-6\\" data-size=\\"6\\">\\n        <div class=\\"ebd-nest\\" data-type=\\"block\\" data-col-wrapper=\\"\\"><!--block09808841066849929-->\\n            <!--block036551126970772363-->\\n        <\\/div>\\n    <\\/div>\\n<\\/div>        "},{"uid":"04238469158738458","type":"columns","html":"\\n            <div class=\\"row\\" data-responsive=\\"400,300,200,100\\">\\n    <div class=\\"col col-md-1\\" data-size=\\"6\\">\\n        \\n    <\\/div>\\n    <div class=\\"col col-md-6\\" data-size=\\"6\\">\\n        \\n    <!--block039449238301486433--><!--block0558766089683463--><\\/div>\\n<\\/div>        ","data":{"columns":[{"size":6,"content":"COM_EASYBLOG_BLOCK_COLUMN_DEFAULT_TITLE"},{"size":6,"content":"COM_EASYBLOG_BLOCK_COLUMN_DEFAULT_TITLE"}]},"blocks":[{"uid":"039449238301486433","type":"heading","html":"<h4><br>Browse media<br><\\/h4>","data":{},"blocks":[],"nested":true,"isolated":false,"text":"\\n    \\n        \\n    \\n    \\n        Browse media\\n        \\n            \\n                \\n            \\n        \\n    \\n    \\n        \\n            \\n                Drag to move block.\\n            \\n        \\n    \\n","editableHtml":"<h4 contenteditable=\\"true\\"><br>Browse media<br><\\/h4>"},{"uid":"0558766089683463","type":"text","html":"Embedding images and videos is fast and easy.<span class=\\"redactor-invisible-space\\">\\u200b<\\/span>","data":{},"blocks":[],"nested":true,"isolated":false,"text":"Embedding images and videos is fast and easy.\\u200b","editableHtml":"<div class=\\"ebd-nest\\" data-type=\\"content\\" data-eb-text-block-wrapper=\\"\\"><div data-content-type=\\"html\\" data-eb-text-content-wrapper=\\"\\" contenteditable=\\"true\\">Embedding images and videos is fast and easy.<span class=\\"redactor-invisible-space\\">\\u200b<\\/span><\\/div><\\/div>"},{"uid":"039449238301486433","type":"heading","html":"<h4><br>Browse media<br><\\/h4>","data":{},"blocks":[],"nested":true,"isolated":false,"text":"\\n    \\n        \\n    \\n    \\n        Browse media\\n        \\n            \\n                \\n            \\n        \\n    \\n    \\n        \\n            \\n                Drag to move block.\\n            \\n        \\n    \\n","editableHtml":"<h4 contenteditable=\\"true\\"><br>Browse media<br><\\/h4>"},{"uid":"0558766089683463","type":"text","html":"Embedding images and videos is fast and easy.<span class=\\"redactor-invisible-space\\">\\u200b<\\/span>","data":{},"blocks":[],"nested":true,"isolated":false,"text":"Embedding images and videos is fast and easy.\\u200b","editableHtml":"<div class=\\"ebd-nest\\" data-type=\\"content\\" data-eb-text-block-wrapper=\\"\\"><div data-content-type=\\"html\\" data-eb-text-content-wrapper=\\"\\" contenteditable=\\"true\\">Embedding images and videos is fast and easy.<span class=\\"redactor-invisible-space\\">\\u200b<\\/span><\\/div><\\/div>"}],"nested":false,"isolated":false,"text":"\\n            \\n    \\n        \\n            \\n        \\n    \\n    \\n        \\n    \\n        \\n    \\n    \\n        Browse media\\n        \\n            \\n                \\n            \\n        \\n    \\n    \\n        \\n            \\n                Drag to move block.\\n            \\n        \\n    \\n\\n            \\n    \\n        \\n    \\n    \\n        Embedding images and videos is fast and easy.\\u200b\\n        \\n            \\n                \\n            \\n        \\n    \\n    \\n        \\n            \\n                Drag to move block.\\n            \\n        \\n    \\n\\n        \\n    \\n        ","editableHtml":"\\n            <div class=\\"row\\" data-responsive=\\"400,300,200,100\\">\\n    <div class=\\"col col-md-1\\" data-size=\\"6\\">\\n        <div class=\\"ebd-nest\\" data-type=\\"block\\" data-col-wrapper=\\"\\">\\n            \\n        <\\/div>\\n    <\\/div>\\n    <div class=\\"col col-md-6\\" data-size=\\"6\\">\\n        <div class=\\"ebd-nest\\" data-type=\\"block\\" data-col-wrapper=\\"\\"><!--block039449238301486433-->\\n            <!--block0558766089683463-->\\n        <\\/div>\\n    <\\/div>\\n<\\/div>        "},{"uid":"0048939211996886","type":"columns","html":"\\n            <div class=\\"row\\" data-responsive=\\"400,300,200,100\\">\\n    <div class=\\"col col-md-1\\" data-size=\\"6\\">\\n        \\n    <\\/div>\\n    <div class=\\"col col-md-6\\" data-size=\\"6\\">\\n        \\n    <!--block03671041092431052--><!--block018677022024891388--><\\/div>\\n<\\/div>        ","data":{"columns":[{"size":6,"content":"COM_EASYBLOG_BLOCK_COLUMN_DEFAULT_TITLE"},{"size":6,"content":"COM_EASYBLOG_BLOCK_COLUMN_DEFAULT_TITLE"}]},"blocks":[{"uid":"03671041092431052","type":"heading","html":"<h4><br>More third party integrations<br><\\/h4>","data":{},"blocks":[],"nested":true,"isolated":false,"text":"\\n    \\n        \\n    \\n    \\n        More third party integrations\\n        \\n            \\n                \\n            \\n        \\n    \\n    \\n        \\n            \\n                Drag to move block.\\n            \\n        \\n    \\n","editableHtml":"<h4 contenteditable=\\"true\\"><br>More third party integrations<br><\\/h4>"},{"uid":"018677022024891388","type":"text","html":"Having other Joomla! plugins and extensions to work with EasyBlog is just a few clicks away.<span class=\\"redactor-invisible-space\\">\\u200b<\\/span>","data":{},"blocks":[],"nested":true,"isolated":false,"text":"Having other Joomla! plugins and extensions to work with EasyBlog is just a few clicks away.\\u200b","editableHtml":"<div class=\\"ebd-nest\\" data-type=\\"content\\" data-eb-text-block-wrapper=\\"\\"><div data-content-type=\\"html\\" data-eb-text-content-wrapper=\\"\\" contenteditable=\\"true\\">Having other Joomla! plugins and extensions to work with EasyBlog is just a few clicks away.<span class=\\"redactor-invisible-space\\">\\u200b<\\/span><\\/div><\\/div>"},{"uid":"03671041092431052","type":"heading","html":"<h4><br>More third party integrations<br><\\/h4>","data":{},"blocks":[],"nested":true,"isolated":false,"text":"\\n    \\n        \\n    \\n    \\n        More third party integrations\\n        \\n            \\n                \\n            \\n        \\n    \\n    \\n        \\n            \\n                Drag to move block.\\n            \\n        \\n    \\n","editableHtml":"<h4 contenteditable=\\"true\\"><br>More third party integrations<br><\\/h4>"},{"uid":"018677022024891388","type":"text","html":"Having other Joomla! plugins and extensions to work with EasyBlog is just a few clicks away.<span class=\\"redactor-invisible-space\\">\\u200b<\\/span>","data":{},"blocks":[],"nested":true,"isolated":false,"text":"Having other Joomla! plugins and extensions to work with EasyBlog is just a few clicks away.\\u200b","editableHtml":"<div class=\\"ebd-nest\\" data-type=\\"content\\" data-eb-text-block-wrapper=\\"\\"><div data-content-type=\\"html\\" data-eb-text-content-wrapper=\\"\\" contenteditable=\\"true\\">Having other Joomla! plugins and extensions to work with EasyBlog is just a few clicks away.<span class=\\"redactor-invisible-space\\">\\u200b<\\/span><\\/div><\\/div>"}],"nested":false,"isolated":false,"text":"\\n            \\n    \\n        \\n            \\n        \\n    \\n    \\n        \\n    \\n        \\n    \\n    \\n        More third party integrations\\n        \\n            \\n                \\n            \\n        \\n    \\n    \\n        \\n            \\n                Drag to move block.\\n            \\n        \\n    \\n\\n            \\n    \\n        \\n    \\n    \\n        Having other Joomla! plugins and extensions to work with EasyBlog is just a few clicks away.\\u200b\\n        \\n            \\n                \\n            \\n        \\n    \\n    \\n        \\n            \\n                Drag to move block.\\n            \\n        \\n    \\n\\n        \\n    \\n        ","editableHtml":"\\n            <div class=\\"row\\" data-responsive=\\"400,300,200,100\\">\\n    <div class=\\"col col-md-1\\" data-size=\\"6\\">\\n        <div class=\\"ebd-nest\\" data-type=\\"block\\" data-col-wrapper=\\"\\">\\n            \\n        <\\/div>\\n    <\\/div>\\n    <div class=\\"col col-md-6\\" data-size=\\"6\\">\\n        <div class=\\"ebd-nest\\" data-type=\\"block\\" data-col-wrapper=\\"\\"><!--block03671041092431052-->\\n            <!--block018677022024891388-->\\n        <\\/div>\\n    <\\/div>\\n<\\/div>        "},{"uid":"0680012258160072","type":"columns","html":"\\n            <div class=\\"row\\" data-responsive=\\"400,300,200,100\\">\\n    <div class=\\"col col-md-1\\" data-size=\\"6\\">\\n        \\n    <\\/div>\\n    <div class=\\"col col-md-6\\" data-size=\\"6\\">\\n        \\n    <!--block09070874272077539--><!--block002974416423671611--><\\/div>\\n<\\/div>        ","data":{"columns":[{"size":6,"content":"COM_EASYBLOG_BLOCK_COLUMN_DEFAULT_TITLE"},{"size":6,"content":"COM_EASYBLOG_BLOCK_COLUMN_DEFAULT_TITLE"}]},"blocks":[{"uid":"09070874272077539","type":"heading","html":"<h4><br>Blog rating<br><\\/h4>","data":{},"blocks":[],"nested":true,"isolated":false,"text":"\\n    \\n        \\n    \\n    \\n        Blog rating\\n        \\n            \\n                \\n            \\n        \\n    \\n    \\n        \\n            \\n                Drag to move block.\\n            \\n        \\n    \\n","editableHtml":"<h4 contenteditable=\\"true\\"><br>Blog rating<br><\\/h4>"},{"uid":"002974416423671611","type":"text","html":"Users can show intensity of their favorite blog post by rating them with stars.<span class=\\"redactor-invisible-space\\">\\u200b<\\/span>","data":{},"blocks":[],"nested":true,"isolated":false,"text":"Users can show intensity of their favorite blog post by rating them with stars.\\u200b","editableHtml":"<div class=\\"ebd-nest\\" data-type=\\"content\\" data-eb-text-block-wrapper=\\"\\"><div data-content-type=\\"html\\" data-eb-text-content-wrapper=\\"\\" contenteditable=\\"true\\">Users can show intensity of their favorite blog post by rating them with stars.<span class=\\"redactor-invisible-space\\">\\u200b<\\/span><\\/div><\\/div>"},{"uid":"09070874272077539","type":"heading","html":"<h4><br>Blog rating<br><\\/h4>","data":{},"blocks":[],"nested":true,"isolated":false,"text":"\\n    \\n        \\n    \\n    \\n        Blog rating\\n        \\n            \\n                \\n            \\n        \\n    \\n    \\n        \\n            \\n                Drag to move block.\\n            \\n        \\n    \\n","editableHtml":"<h4 contenteditable=\\"true\\"><br>Blog rating<br><\\/h4>"},{"uid":"002974416423671611","type":"text","html":"Users can show intensity of their favorite blog post by rating them with stars.<span class=\\"redactor-invisible-space\\">\\u200b<\\/span>","data":{},"blocks":[],"nested":true,"isolated":false,"text":"Users can show intensity of their favorite blog post by rating them with stars.\\u200b","editableHtml":"<div class=\\"ebd-nest\\" data-type=\\"content\\" data-eb-text-block-wrapper=\\"\\"><div data-content-type=\\"html\\" data-eb-text-content-wrapper=\\"\\" contenteditable=\\"true\\">Users can show intensity of their favorite blog post by rating them with stars.<span class=\\"redactor-invisible-space\\">\\u200b<\\/span><\\/div><\\/div>"}],"nested":false,"isolated":false,"text":"\\n            \\n    \\n        \\n            \\n        \\n    \\n    \\n        \\n    \\n        \\n    \\n    \\n        Blog rating\\n        \\n            \\n                \\n            \\n        \\n    \\n    \\n        \\n            \\n                Drag to move block.\\n            \\n        \\n    \\n\\n            \\n    \\n        \\n    \\n    \\n        Users can show intensity of their favorite blog post by rating them with stars.\\u200b\\n        \\n            \\n                \\n            \\n        \\n    \\n    \\n        \\n            \\n                Drag to move block.\\n            \\n        \\n    \\n\\n        \\n    \\n        ","editableHtml":"\\n            <div class=\\"row\\" data-responsive=\\"400,300,200,100\\">\\n    <div class=\\"col col-md-1\\" data-size=\\"6\\">\\n        <div class=\\"ebd-nest\\" data-type=\\"block\\" data-col-wrapper=\\"\\">\\n            \\n        <\\/div>\\n    <\\/div>\\n    <div class=\\"col col-md-6\\" data-size=\\"6\\">\\n        <div class=\\"ebd-nest\\" data-type=\\"block\\" data-col-wrapper=\\"\\"><!--block09070874272077539-->\\n            <!--block002974416423671611-->\\n        <\\/div>\\n    <\\/div>\\n<\\/div>        "},{"uid":"021494898851960897","type":"rule","html":"\\n            <hr>        ","data":{},"blocks":[],"nested":false,"isolated":false,"text":"","editableHtml":"\\n            <hr>        "},{"uid":"031212949855866967","type":"text","html":"<p>And many more powerful features that you can use to make your blog work beautifully and professionally. Need any help? Drop by our <a target=\\"_blank\\" class=\\"\\" title=\\"\\" href=\\"http:\\/\\/stackideas.com\\/forums\\/index\\/easyblog\\">Official forum<\\/a> or send our support team a ticket via our <a target=\\"_blank\\" class=\\"\\" title=\\"\\" href=\\"https:\\/\\/crm.stackideas.com\\">CRM<\\/a>. You can even check out <a target=\\"_blank\\" class=\\"\\" title=\\"\\" href=\\"http:\\/\\/stackideas.com\\/docs\\/easyblog\\">EasyBlog''s Documentation<\\/a>.<\\/p>","data":{},"blocks":[],"nested":false,"isolated":false,"text":"And many more powerful features that you can use to make your blog work beautifully and professionally. Need any help? Drop by our Official forum or send our support team a ticket via our CRM. You can even check out EasyBlog''s Documentation.","editableHtml":"<div class=\\"ebd-nest\\" data-type=\\"content\\" data-eb-text-block-wrapper=\\"\\"><div data-content-type=\\"html\\" data-eb-text-content-wrapper=\\"\\" contenteditable=\\"true\\"><p>And many more powerful features that you can use to make your blog work beautifully and professionally. Need any help? Drop by our <a target=\\"_blank\\" class=\\"\\" title=\\"\\" href=\\"http:\\/\\/stackideas.com\\/forums\\/index\\/easyblog\\">Official forum<\\/a> or send our support team a ticket via our <a target=\\"_blank\\" class=\\"\\" title=\\"\\" href=\\"https:\\/\\/crm.stackideas.com\\">CRM<\\/a>. You can even check out <a target=\\"_blank\\" class=\\"\\" title=\\"\\" href=\\"http:\\/\\/stackideas.com\\/docs\\/easyblog\\">EasyBlog''s Documentation<\\/a>.<\\/p><\\/div><\\/div>"}],"version":"1.0"}'),
(2, 312, '2016-04-14 09:39:21', '2016-04-14 09:40:30', 'Моя первая запись', 'moya-pervaya-zapis', '', '<p>Моя первая запись</p>', NULL, 1, 1, 0, '2016-04-14 09:39:21', '0000-00-00 00:00:00', 0, 0, 1, 0, 0, 1, 1, 0, '', '', '', '', '', '', NULL, '', '*', 1, 0, 2, 0, 'easyblog.sitewide', '91.144.174.213', 'legacy', '');

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_easyblog_post_assets`
--

CREATE TABLE IF NOT EXISTS `n1wr9_easyblog_post_assets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `blog_id` (`post_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_easyblog_post_category`
--

CREATE TABLE IF NOT EXISTS `n1wr9_easyblog_post_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `primary` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `eb_post_category_postid` (`post_id`),
  KEY `eb_post_category_catid` (`category_id`),
  KEY `eb_post_category_post_cat` (`post_id`,`category_id`),
  KEY `eb_post_category_cat_post` (`category_id`,`post_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `n1wr9_easyblog_post_category`
--

INSERT INTO `n1wr9_easyblog_post_category` (`id`, `post_id`, `category_id`, `primary`) VALUES
(1, 1, 1, 1),
(3, 2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_easyblog_post_rejected`
--

CREATE TABLE IF NOT EXISTS `n1wr9_easyblog_post_rejected` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` int(20) unsigned NOT NULL,
  `created_by` int(11) NOT NULL,
  `message` text NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `draft_id` (`post_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_easyblog_post_tag`
--

CREATE TABLE IF NOT EXISTS `n1wr9_easyblog_post_tag` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tag_id` bigint(20) unsigned NOT NULL,
  `post_id` bigint(20) unsigned NOT NULL,
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `easyblog_post_tag_tag_id` (`tag_id`),
  KEY `easyblog_post_tag_post_id` (`post_id`),
  KEY `easyblog_post_tagpost_id` (`tag_id`,`post_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_easyblog_post_templates`
--

CREATE TABLE IF NOT EXISTS `n1wr9_easyblog_post_templates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `data` text NOT NULL,
  `created` datetime NOT NULL,
  `system` tinyint(1) NOT NULL,
  `core` tinyint(1) DEFAULT '0',
  `screenshot` text NOT NULL,
  `published` tinyint(3) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `n1wr9_easyblog_post_templates`
--

INSERT INTO `n1wr9_easyblog_post_templates` (`id`, `user_id`, `title`, `data`, `created`, `system`, `core`, `screenshot`, `published`) VALUES
(1, 311, 'Blank post', '{}', '2016-04-14 09:30:14', 2, 1, '/components/com_easyblog/assets/images/template-blank.png', 1),
(3, 311, 'Template for Event', '{"title":"Template for Event","permalink":"template-for-event-1-1","type":"ebd","version":"1.0","blocks":[{"uid":"04869970544241369","type":"text","html":"\\n            <p>Duis ac quam leo. Phasellus malesuada, leo at lobortis egestas, felis lorem condimentum lacus, id iaculis quam urna ac urna. Vivamus aliquam laoreet semper. Ut lacinia sem nisi. Sed vulputate convallis odio posuere porttitor. Aliquam turpis felis, faucibus non orci vel, laoreet dapibus diam. Nam rhoncus tortor velit, sollicitudin semper nisl pulvinar sed.<br><br><\\/p>\\n","data":{},"blocks":[],"nested":false,"isolated":false,"text":"\\n            Duis ac quam leo. Phasellus malesuada, leo at lobortis egestas, felis lorem condimentum lacus, id iaculis quam urna ac urna. Vivamus aliquam laoreet semper. Ut lacinia sem nisi. Sed vulputate convallis odio posuere porttitor. Aliquam turpis felis, faucibus non orci vel, laoreet dapibus diam. Nam rhoncus tortor velit, sollicitudin semper nisl pulvinar sed.\\n","editableHtml":"\\n            <div class=\\"ebd-nest\\" data-type=\\"content\\" data-eb-text-block-wrapper=\\"\\"><div data-eb-text-content-wrapper=\\"\\" data-content-type=\\"html\\" contenteditable=\\"true\\">\\n            <p>Duis ac quam leo. Phasellus malesuada, leo at lobortis egestas, felis lorem condimentum lacus, id iaculis quam urna ac urna. Vivamus aliquam laoreet semper. Ut lacinia sem nisi. Sed vulputate convallis odio posuere porttitor. Aliquam turpis felis, faucibus non orci vel, laoreet dapibus diam. Nam rhoncus tortor velit, sollicitudin semper nisl pulvinar sed.<br><br><\\/p>\\n<\\/div><\\/div>        "},{"uid":"06658816069830209","type":"table","html":"<table class=\\"table table-bordered\\" style=\\"table-layout: fixed\\">\\n    <tbody><tr>\\n        <td>\\u200bTime<\\/td>\\n        <td>\\u200b<span class=\\"redactor-invisible-space\\">\\u200b<\\/span>November 15, 2015 - 10:00 PM<br><\\/td>\\n        \\n    <\\/tr>\\n    <tr>\\n        <td>\\u200bLocation<br><\\/td>\\n        <td>\\u200b3200 Barbaros Bulvar\\u0131 Besiktas\\/Istanbul, TR<br><\\/td>\\n        \\n    <\\/tr>\\n<tr><td>\\u200bTickets<br><\\/td><td>\\u200b246 tickets remaining<br><\\/td><\\/tr><\\/tbody><\\/table>","data":{"striped":0,"bordered":1,"hover":0,"condensed":0,"rows":3,"columns":2},"blocks":[],"nested":false,"isolated":false,"text":"\\n    \\n        \\n            \\u200bTime\\n        \\n        \\n            \\u200b\\u200bNovember 15, 2015 - 10:00 PM\\n        \\n        \\n    \\n    \\n        \\n            \\u200bLocation\\n        \\n        \\n            \\u200b3200 Barbaros Bulvar\\u0131 Besiktas\\/Istanbul, TR\\n        \\n        \\n    \\n\\u200bTickets\\u200b246 tickets remaining","editableHtml":"\\n            <table class=\\"table table-bordered\\" style=\\"table-layout: fixed\\">\\n    <tbody><tr>\\n        <td>\\n            <div contenteditable=\\"true\\">\\u200bTime<\\/div>\\n        <\\/td>\\n        <td>\\n            <div contenteditable=\\"true\\">\\u200b<span class=\\"redactor-invisible-space\\">\\u200b<\\/span>November 15, 2015 - 10:00 PM<br><\\/div>\\n        <\\/td>\\n        \\n    <\\/tr>\\n    <tr>\\n        <td>\\n            <div contenteditable=\\"true\\">\\u200bLocation<br><\\/div>\\n        <\\/td>\\n        <td>\\n            <div contenteditable=\\"true\\">\\u200b3200 Barbaros Bulvar\\u0131 Besiktas\\/Istanbul, TR<br><\\/div>\\n        <\\/td>\\n        \\n    <\\/tr>\\n<tr><td><div contenteditable=\\"true\\">\\u200bTickets<br><\\/div><\\/td><td><div contenteditable=\\"true\\">\\u200b246 tickets remaining<br><\\/div><\\/td><\\/tr><\\/tbody><\\/table>        "},{"uid":"09581912469584495","type":"rule","html":"\\n            <hr>        ","data":{},"blocks":[],"nested":false,"isolated":false,"text":"","editableHtml":"\\n            <hr>        "},{"uid":"08785801255144179","type":"heading","html":"\\n            <h4>Schedule<\\/h4>        ","data":{},"blocks":[],"nested":false,"isolated":false,"text":"\\n    \\n        \\n    \\n    \\n        \\n            Schedule        \\n        \\n            \\n                \\n            \\n        \\n    \\n    \\n        \\n            \\n                Drag to move block.\\n            \\n        \\n    \\n","editableHtml":"\\n            <h4 contenteditable=\\"true\\">Schedule<\\/h4>        "},{"uid":"09648641077801585","type":"text","html":"\\n            <p>Praesent ac sem in neque venenatis tristique. Morbi et ligula velit. Nullam a augue vel mi porta vestibulum non ac elit. Vivamus convallis tortor et fermentum semper.<br><br><\\/p>        ","data":{},"blocks":[],"nested":false,"isolated":false,"text":"\\n            Praesent ac sem in neque venenatis tristique. Morbi et ligula velit. Nullam a augue vel mi porta vestibulum non ac elit. Vivamus convallis tortor et fermentum semper.        ","editableHtml":"\\n            <div class=\\"ebd-nest\\" data-type=\\"content\\" data-eb-text-block-wrapper=\\"\\"><div data-eb-text-content-wrapper=\\"\\" data-content-type=\\"html\\" contenteditable=\\"true\\">\\n            <p>Praesent ac sem in neque venenatis tristique. Morbi et ligula velit. Nullam a augue vel mi porta vestibulum non ac elit. Vivamus convallis tortor et fermentum semper.<br><br><\\/p>        <\\/div><\\/div>        "},{"uid":"09790925409179181","type":"table","html":"<table class=\\"table table-bordered table-striped\\" style=\\"table-layout: fixed\\">\\n    <tbody><tr>\\n        <td>\\u200b7:00 am - 8:25 am<br><\\/td>\\n        <td>\\u200bWhat is a CSS framework<br><\\/td>\\n        \\n    <\\/tr>\\n    <tr>\\n        <td>\\u200b8:30 am - 10:25 am<br><\\/td>\\n        <td>\\u200bCSS architecture for front-ends<br><\\/td>\\n        \\n    <\\/tr>\\n<tr><td>\\u200b10:30 am - 11:50 am<br><\\/td><td>\\u200bDesigning Responsive Websites<br><\\/td><\\/tr><tr><td>\\u200b12:00 am - 2:25 pm<br><\\/td><td>\\u200bPrivate Pesticide Applicators Training<br><\\/td><\\/tr><\\/tbody><\\/table>","data":{"striped":1,"bordered":1,"hover":0,"condensed":0,"rows":4,"columns":2},"blocks":[],"nested":false,"isolated":false,"text":"\\n    \\n        \\n            \\u200b7:00 am - 8:25 am\\n        \\n        \\n            \\u200bWhat is a CSS framework\\n        \\n        \\n    \\n    \\n        \\n            \\u200b8:30 am - 10:25 am\\n        \\n        \\n            \\u200bCSS architecture for front-ends\\n        \\n        \\n    \\n\\u200b10:30 am - 11:50 am\\u200bDesigning Responsive Websites\\u200b12:00 am - 2:25 pm\\u200bPrivate Pesticide Applicators Training","editableHtml":"\\n            <table class=\\"table table-bordered table-striped\\" style=\\"table-layout: fixed\\">\\n    <tbody><tr>\\n        <td>\\n            <div contenteditable=\\"true\\">\\u200b7:00 am - 8:25 am<br><\\/div>\\n        <\\/td>\\n        <td>\\n            <div contenteditable=\\"true\\">\\u200bWhat is a CSS framework<br><\\/div>\\n        <\\/td>\\n        \\n    <\\/tr>\\n    <tr>\\n        <td>\\n            <div contenteditable=\\"true\\">\\u200b8:30 am - 10:25 am<br><\\/div>\\n        <\\/td>\\n        <td>\\n            <div contenteditable=\\"true\\">\\u200bCSS architecture for front-ends<br><\\/div>\\n        <\\/td>\\n        \\n    <\\/tr>\\n<tr><td><div contenteditable=\\"true\\">\\u200b10:30 am - 11:50 am<br><\\/div><\\/td><td><div contenteditable=\\"true\\">\\u200bDesigning Responsive Websites<br><\\/div><\\/td><\\/tr><tr><td><div contenteditable=\\"true\\">\\u200b12:00 am - 2:25 pm<br><\\/div><\\/td><td><div contenteditable=\\"true\\">\\u200bPrivate Pesticide Applicators Training<br><\\/div><\\/td><\\/tr><\\/tbody><\\/table>        "},{"uid":"026126078073866665","type":"rule","html":"\\n            <hr>        ","data":{},"blocks":[],"nested":false,"isolated":false,"text":"","editableHtml":"\\n            <hr>        "},{"uid":"08552929288707674","type":"heading","html":"\\n            <h4>Speakers<\\/h4>        ","data":{},"blocks":[],"nested":false,"isolated":false,"text":"\\n    \\n        \\n    \\n    \\n        \\n            Speakers        \\n        \\n            \\n                \\n            \\n        \\n    \\n    \\n        \\n            \\n                Drag to move block.\\n            \\n        \\n    \\n","editableHtml":"\\n            <h4 contenteditable=\\"true\\">Speakers<\\/h4>        "},{"uid":"031816470227204263","type":"text","html":"\\n            <p>In hac habitasse platea dictumst. Curabitur eget dui id metus pulvinar suscipit. Quisque vitae ligula laoreet, scelerisque leo quis, facilisis metus.<br><br><\\/p>        ","data":{},"blocks":[],"nested":false,"isolated":false,"text":"\\n            In hac habitasse platea dictumst. Curabitur eget dui id metus pulvinar suscipit. Quisque vitae ligula laoreet, scelerisque leo quis, facilisis metus.        ","editableHtml":"\\n            <div class=\\"ebd-nest\\" data-type=\\"content\\" data-eb-text-block-wrapper=\\"\\"><div data-eb-text-content-wrapper=\\"\\" data-content-type=\\"html\\" contenteditable=\\"true\\">\\n            <p>In hac habitasse platea dictumst. Curabitur eget dui id metus pulvinar suscipit. Quisque vitae ligula laoreet, scelerisque leo quis, facilisis metus.<br><br><\\/p>        <\\/div><\\/div>        "},{"uid":"010195815097540617","type":"columns","html":"\\n            <div class=\\"row\\" data-responsive=\\"400,300,200,100\\">\\n    <div class=\\"col col-md-3\\" data-size=\\"6\\">\\n        \\n    <!--block03488495028577745--><\\/div>\\n    <div class=\\"col col-md-9\\" data-size=\\"6\\">\\n        \\n    <!--block063396499841474--><\\/div>\\n<\\/div>        ","data":{"columns":[{"size":6,"content":"COM_EASYBLOG_BLOCK_COLUMN_DEFAULT_TITLE"},{"size":6,"content":"COM_EASYBLOG_BLOCK_COLUMN_DEFAULT_TITLE"}]},"blocks":[{"uid":"03488495028577745","type":"image","html":"","data":{"isurl":false,"url":"","uri":"","variation":"","size_enabled":true,"mode":"simple","mode_lock":false,"fluid":false,"width":"","width_lock":false,"height":"","height_lock":false,"ratio":"","ratio_lock":true,"alignment":"center","strategy":"fit","element_width":"","element_height":"","element_top":"","element_left":"","element_ratio":"","element_ratio_lock":true,"natural_width":"","natural_height":"","natural_ratio":"","style_enabled":true,"style":"clear","caption_enabled":true,"caption_text":"","link_enabled":true,"link_url":"","link_title":"","link_target":"","popup_enabled":true,"popup_url":"","popup_uri":"","popup_variation":""},"blocks":[],"nested":true,"isolated":false,"style":"text-align: center;","text":"\\nundefined","editableHtml":"\\n            <div class=\\"eb-composer-placeholder eb-composer-placeholder-image text-center\\" data-eb-composer-image-placeholder=\\"\\" data-key=\\"_cG9zdA--\\" data-type=\\"image\\" data-plupload-multi-selection=\\"0\\">\\n\\n    <div data-plupload-drop-element=\\"\\" style=\\"position: relative;\\">\\n        <i class=\\"eb-composer-placeholder-icon fa fa-camera\\"><\\/i>\\n\\n                <b class=\\"eb-composer-placeholder-title\\">Drop an image block here<\\/b>\\n        <p class=\\"eb-composer-placeholder-brief\\">Supports jpeg, png, gif.<\\/p>\\n        \\n        <button type=\\"button\\" class=\\"btn btn-sm btn-primary\\" data-eb-mm-browse-button=\\"\\" data-eb-mm-start-uri=\\"_cG9zdA--\\" data-eb-mm-filter=\\"image\\">\\n            <i class=\\"fa fa-photo\\"><\\/i> Browse Media        <\\/button>\\n\\n                <button type=\\"button\\" class=\\"btn btn-sm btn-primary\\" data-plupload-browse-button=\\"\\" style=\\"position: relative; z-index: 1;\\">\\n            <i class=\\"fa fa-upload\\"><\\/i> Upload        <\\/button>\\n        \\n\\n        <div class=\\"eb-composer-upload-progress\\" data-eb-mm-upload-progress=\\"\\">\\n    <div class=\\"col-cell\\">\\n        <div class=\\"progress\\">\\n            <b class=\\"progress-bar progress-bar-success progress-bar-striped\\" role=\\"progressbar\\" aria-valuenow=\\"0\\" aria-valuemin=\\"0\\" aria-valuemax=\\"100\\" style=\\"width: 0%;\\" data-eb-mm-upload-progress-bar=\\"\\"><\\/b>\\n        <\\/div>\\n    <\\/div>\\n    <div class=\\"col-cell\\">\\n        <div class=\\"progress-value\\" data-eb-mm-upload-progress-value=\\"\\">0%<\\/div>\\n        <span data-eb-mm-upload-name=\\"\\" class=\\"hide\\"><\\/span>\\n    <\\/div>\\n<\\/div>\\n        <div class=\\"eb-composer-placeholder-fail\\">\\n    <div class=\\"row-table\\">\\n        <div class=\\"col-cell\\">\\n            <p data-eb-mm-upload-error-text=\\"\\"><\\/p>\\n            <a href=\\"javascript:void(0);\\" class=\\"btn btn-primary\\" data-eb-mm-upload-error-retry=\\"\\">Try Again<\\/a>\\n        <\\/div>\\n    <\\/div>\\n<\\/div>    <div id=\\"html5_19jirfvs4ph2p40iopdj41it1p_container\\" class=\\"moxie-shim moxie-shim-html5\\" style=\\"position: absolute; top: 1000px; left: 95px; width: 70px; height: 28px; overflow: hidden; z-index: 0;\\"><input id=\\"html5_19jirfvs4ph2p40iopdj41it1p\\" style=\\"font-size: 999px; opacity: 0; position: absolute; top: 0px; left: 0px; width: 100%; height: 100%;\\" accept=\\"image\\/jpeg,image\\/png,image\\/gif\\" type=\\"file\\"><\\/div><div style=\\"position: absolute; top: 959px; left: 264px; width: 70px; height: 29px; overflow: hidden; z-index: 0;\\" class=\\"moxie-shim moxie-shim-html5\\" id=\\"html5_19k2bk0et18st1ubg10il1ocd1afob_container\\"><input id=\\"html5_19k2bk0et18st1ubg10il1ocd1afob\\" style=\\"font-size: 999px; opacity: 0; position: absolute; top: 0px; left: 0px; width: 100%; height: 100%;\\" accept=\\"image\\/jpeg,image\\/png,image\\/gif\\" type=\\"file\\"><\\/div><div style=\\"position: absolute; top: 942px; left: 262px; width: 70px; height: 29px; overflow: hidden; z-index: 0;\\" class=\\"moxie-shim moxie-shim-html5\\" id=\\"html5_1a10gm14a1kro24g150eth61k5fb_container\\"><input id=\\"html5_1a10gm14a1kro24g150eth61k5fb\\" style=\\"font-size: 999px; opacity: 0; position: absolute; top: 0px; left: 0px; width: 100%; height: 100%;\\" multiple=\\"\\" accept=\\"image\\/jpeg,image\\/png,image\\/gif\\" type=\\"file\\"><\\/div><\\/div>\\n<\\/div>        "},{"uid":"063396499841474","type":"text","html":"\\n            <p><strong data-verified=\\"redactor\\" data-redactor-tag=\\"strong\\">Julius Cesar <\\/strong><br>Front-end Developer&nbsp;<\\/p><p>Curabitur eget dui id metus pulvinar suscipit. Quisque vitae ligula laoreet, scelerisque leo quis, facilisis metus.<\\/p>        ","data":{},"blocks":[],"nested":true,"isolated":false,"text":"\\n            Julius Cesar Front-end Developer\\u00a0Curabitur eget dui id metus pulvinar suscipit. Quisque vitae ligula laoreet, scelerisque leo quis, facilisis metus.        ","editableHtml":"\\n            <div class=\\"ebd-nest\\" data-type=\\"content\\" data-eb-text-block-wrapper=\\"\\"><div data-eb-text-content-wrapper=\\"\\" data-content-type=\\"html\\" contenteditable=\\"true\\">\\n            <p><strong data-verified=\\"redactor\\" data-redactor-tag=\\"strong\\">Julius Cesar <\\/strong><br>Front-end Developer&nbsp;<\\/p><p>Curabitur eget dui id metus pulvinar suscipit. Quisque vitae ligula laoreet, scelerisque leo quis, facilisis metus.<\\/p>        <\\/div><\\/div>        "},{"uid":"03488495028577745","type":"image","html":"","data":{"isurl":false,"url":"","uri":"","variation":"","size_enabled":true,"mode":"simple","mode_lock":false,"fluid":false,"width":"","width_lock":false,"height":"","height_lock":false,"ratio":"","ratio_lock":true,"alignment":"center","strategy":"fit","element_width":"","element_height":"","element_top":"","element_left":"","element_ratio":"","element_ratio_lock":true,"natural_width":"","natural_height":"","natural_ratio":"","style_enabled":true,"style":"clear","caption_enabled":true,"caption_text":"","link_enabled":true,"link_url":"","link_title":"","link_target":"","popup_enabled":true,"popup_url":"","popup_uri":"","popup_variation":""},"blocks":[],"nested":true,"isolated":false,"style":"text-align: center;","text":"\\nundefined","editableHtml":"\\n            <div class=\\"eb-composer-placeholder eb-composer-placeholder-image text-center\\" data-eb-composer-image-placeholder=\\"\\" data-key=\\"_cG9zdA--\\" data-type=\\"image\\" data-plupload-multi-selection=\\"0\\">\\n\\n    <div data-plupload-drop-element=\\"\\" style=\\"position: relative;\\">\\n        <i class=\\"eb-composer-placeholder-icon fa fa-camera\\"><\\/i>\\n\\n                <b class=\\"eb-composer-placeholder-title\\">Drop an image block here<\\/b>\\n        <p class=\\"eb-composer-placeholder-brief\\">Supports jpeg, png, gif.<\\/p>\\n        \\n        <button type=\\"button\\" class=\\"btn btn-sm btn-primary\\" data-eb-mm-browse-button=\\"\\" data-eb-mm-start-uri=\\"_cG9zdA--\\" data-eb-mm-filter=\\"image\\">\\n            <i class=\\"fa fa-photo\\"><\\/i> Browse Media        <\\/button>\\n\\n                <button type=\\"button\\" class=\\"btn btn-sm btn-primary\\" data-plupload-browse-button=\\"\\" style=\\"position: relative; z-index: 1;\\">\\n            <i class=\\"fa fa-upload\\"><\\/i> Upload        <\\/button>\\n        \\n\\n        <div class=\\"eb-composer-upload-progress\\" data-eb-mm-upload-progress=\\"\\">\\n    <div class=\\"col-cell\\">\\n        <div class=\\"progress\\">\\n            <b class=\\"progress-bar progress-bar-success progress-bar-striped\\" role=\\"progressbar\\" aria-valuenow=\\"0\\" aria-valuemin=\\"0\\" aria-valuemax=\\"100\\" style=\\"width: 0%;\\" data-eb-mm-upload-progress-bar=\\"\\"><\\/b>\\n        <\\/div>\\n    <\\/div>\\n    <div class=\\"col-cell\\">\\n        <div class=\\"progress-value\\" data-eb-mm-upload-progress-value=\\"\\">0%<\\/div>\\n        <span data-eb-mm-upload-name=\\"\\" class=\\"hide\\"><\\/span>\\n    <\\/div>\\n<\\/div>\\n        <div class=\\"eb-composer-placeholder-fail\\">\\n    <div class=\\"row-table\\">\\n        <div class=\\"col-cell\\">\\n            <p data-eb-mm-upload-error-text=\\"\\"><\\/p>\\n            <a href=\\"javascript:void(0);\\" class=\\"btn btn-primary\\" data-eb-mm-upload-error-retry=\\"\\">Try Again<\\/a>\\n        <\\/div>\\n    <\\/div>\\n<\\/div>    <div id=\\"html5_19jirfvs4ph2p40iopdj41it1p_container\\" class=\\"moxie-shim moxie-shim-html5\\" style=\\"position: absolute; top: 1000px; left: 95px; width: 70px; height: 28px; overflow: hidden; z-index: 0;\\"><input id=\\"html5_19jirfvs4ph2p40iopdj41it1p\\" style=\\"font-size: 999px; opacity: 0; position: absolute; top: 0px; left: 0px; width: 100%; height: 100%;\\" accept=\\"image\\/jpeg,image\\/png,image\\/gif\\" type=\\"file\\"><\\/div><div style=\\"position: absolute; top: 959px; left: 264px; width: 70px; height: 29px; overflow: hidden; z-index: 0;\\" class=\\"moxie-shim moxie-shim-html5\\" id=\\"html5_19k2bk0et18st1ubg10il1ocd1afob_container\\"><input id=\\"html5_19k2bk0et18st1ubg10il1ocd1afob\\" style=\\"font-size: 999px; opacity: 0; position: absolute; top: 0px; left: 0px; width: 100%; height: 100%;\\" accept=\\"image\\/jpeg,image\\/png,image\\/gif\\" type=\\"file\\"><\\/div><div style=\\"position: absolute; top: 942px; left: 262px; width: 70px; height: 29px; overflow: hidden; z-index: 0;\\" class=\\"moxie-shim moxie-shim-html5\\" id=\\"html5_1a10gm14a1kro24g150eth61k5fb_container\\"><input id=\\"html5_1a10gm14a1kro24g150eth61k5fb\\" style=\\"font-size: 999px; opacity: 0; position: absolute; top: 0px; left: 0px; width: 100%; height: 100%;\\" multiple=\\"\\" accept=\\"image\\/jpeg,image\\/png,image\\/gif\\" type=\\"file\\"><\\/div><\\/div>\\n<\\/div>        "},{"uid":"063396499841474","type":"text","html":"\\n            <p><strong data-verified=\\"redactor\\" data-redactor-tag=\\"strong\\">Julius Cesar <\\/strong><br>Front-end Developer&nbsp;<\\/p><p>Curabitur eget dui id metus pulvinar suscipit. Quisque vitae ligula laoreet, scelerisque leo quis, facilisis metus.<\\/p>        ","data":{},"blocks":[],"nested":true,"isolated":false,"text":"\\n            Julius Cesar Front-end Developer\\u00a0Curabitur eget dui id metus pulvinar suscipit. Quisque vitae ligula laoreet, scelerisque leo quis, facilisis metus.        ","editableHtml":"\\n            <div class=\\"ebd-nest\\" data-type=\\"content\\" data-eb-text-block-wrapper=\\"\\"><div data-eb-text-content-wrapper=\\"\\" data-content-type=\\"html\\" contenteditable=\\"true\\">\\n            <p><strong data-verified=\\"redactor\\" data-redactor-tag=\\"strong\\">Julius Cesar <\\/strong><br>Front-end Developer&nbsp;<\\/p><p>Curabitur eget dui id metus pulvinar suscipit. Quisque vitae ligula laoreet, scelerisque leo quis, facilisis metus.<\\/p>        <\\/div><\\/div>        "}],"nested":false,"isolated":false,"text":"\\n            \\n    \\n        \\n    \\n        \\n    \\n    \\n        \\n            \\n\\n    \\n        \\n\\n                Drop an image block here\\n        Supports jpeg, png, gif.\\n        \\n        \\n             Browse Media        \\n\\n                \\n             Upload        \\n        \\n\\n        \\n    \\n        \\n            \\n        \\n    \\n    \\n        0%\\n        \\n    \\n\\n        \\n    \\n        \\n            \\n            Try Again\\n        \\n    \\n    \\n        \\n        \\n            \\n                \\n            \\n        \\n    \\n    \\n        \\n            \\n                Drag to move block.\\n            \\n        \\n    \\n\\n\\n\\n\\n            \\n        \\n    \\n    \\n        \\n            \\n    \\n        \\n    \\n    \\n        \\n            \\n            Julius Cesar Front-end Developer\\u00a0Curabitur eget dui id metus pulvinar suscipit. Quisque vitae ligula laoreet, scelerisque leo quis, facilisis metus.                \\n        \\n            \\n                \\n            \\n        \\n    \\n    \\n        \\n            \\n                Drag to move block.\\n            \\n        \\n    \\n\\n\\n\\n\\n        \\n    \\n        ","editableHtml":"\\n            <div class=\\"row\\" data-responsive=\\"400,300,200,100\\">\\n    <div class=\\"col col-md-3\\" data-size=\\"6\\">\\n        <div class=\\"ebd-nest\\" data-type=\\"block\\" data-col-wrapper=\\"\\"><!--block03488495028577745-->\\n\\n\\n\\n            \\n        <\\/div>\\n    <\\/div>\\n    <div class=\\"col col-md-9\\" data-size=\\"6\\">\\n        <div class=\\"ebd-nest\\" data-type=\\"block\\" data-col-wrapper=\\"\\">\\n            <!--block063396499841474-->\\n\\n\\n\\n        <\\/div>\\n    <\\/div>\\n<\\/div>        "},{"uid":"09532270370982587","type":"rule","html":"\\n            <hr>        ","data":{},"blocks":[],"nested":false,"isolated":false,"text":"","editableHtml":"\\n            <hr>        "},{"uid":"08414754318073392","type":"columns","html":"\\n            <div class=\\"row\\" data-responsive=\\"400,300,200,100\\">\\n    <div class=\\"col col-md-3\\" data-size=\\"6\\">\\n        \\n    <!--block07281011568848044--><\\/div>\\n    <div class=\\"col col-md-9\\" data-size=\\"6\\">\\n        \\n    <!--block08399178786203265--><\\/div>\\n<\\/div>        ","data":{"columns":[{"size":6,"content":"COM_EASYBLOG_BLOCK_COLUMN_DEFAULT_TITLE"},{"size":6,"content":"COM_EASYBLOG_BLOCK_COLUMN_DEFAULT_TITLE"}]},"blocks":[{"uid":"07281011568848044","type":"image","html":"","data":{"isurl":false,"url":"","uri":"","variation":"","size_enabled":true,"mode":"simple","mode_lock":false,"fluid":false,"width":"","width_lock":false,"height":"","height_lock":false,"ratio":"","ratio_lock":true,"alignment":"center","strategy":"fit","element_width":"","element_height":"","element_top":"","element_left":"","element_ratio":"","element_ratio_lock":true,"natural_width":"","natural_height":"","natural_ratio":"","style_enabled":true,"style":"clear","caption_enabled":true,"caption_text":"","link_enabled":true,"link_url":"","link_title":"","link_target":"","popup_enabled":true,"popup_url":"","popup_uri":"","popup_variation":""},"blocks":[],"nested":true,"isolated":false,"style":"text-align: center;","text":"\\nundefined","editableHtml":"\\n            <div class=\\"eb-composer-placeholder eb-composer-placeholder-image text-center\\" data-eb-composer-image-placeholder=\\"\\" data-key=\\"_cG9zdA--\\" data-type=\\"image\\" data-plupload-multi-selection=\\"0\\">\\n\\n    <div data-plupload-drop-element=\\"\\" style=\\"position: relative;\\">\\n        <i class=\\"eb-composer-placeholder-icon fa fa-camera\\"><\\/i>\\n\\n                <b class=\\"eb-composer-placeholder-title\\">Drop an image block here<\\/b>\\n        <p class=\\"eb-composer-placeholder-brief\\">Supports jpeg, png, gif.<\\/p>\\n        \\n        <button type=\\"button\\" class=\\"btn btn-sm btn-primary\\" data-eb-mm-browse-button=\\"\\" data-eb-mm-start-uri=\\"_cG9zdA--\\" data-eb-mm-filter=\\"image\\">\\n            <i class=\\"fa fa-photo\\"><\\/i> Browse Media        <\\/button>\\n\\n                <button type=\\"button\\" class=\\"btn btn-sm btn-primary\\" data-plupload-browse-button=\\"\\" style=\\"position: relative; z-index: 1;\\">\\n            <i class=\\"fa fa-upload\\"><\\/i> Upload        <\\/button>\\n        \\n\\n        <div class=\\"eb-composer-upload-progress\\" data-eb-mm-upload-progress=\\"\\">\\n    <div class=\\"col-cell\\">\\n        <div class=\\"progress\\">\\n            <b class=\\"progress-bar progress-bar-success progress-bar-striped\\" role=\\"progressbar\\" aria-valuenow=\\"0\\" aria-valuemin=\\"0\\" aria-valuemax=\\"100\\" style=\\"width: 0%;\\" data-eb-mm-upload-progress-bar=\\"\\"><\\/b>\\n        <\\/div>\\n    <\\/div>\\n    <div class=\\"col-cell\\">\\n        <div class=\\"progress-value\\" data-eb-mm-upload-progress-value=\\"\\">0%<\\/div>\\n        <span data-eb-mm-upload-name=\\"\\" class=\\"hide\\"><\\/span>\\n    <\\/div>\\n<\\/div>\\n        <div class=\\"eb-composer-placeholder-fail\\">\\n    <div class=\\"row-table\\">\\n        <div class=\\"col-cell\\">\\n            <p data-eb-mm-upload-error-text=\\"\\"><\\/p>\\n            <a href=\\"javascript:void(0);\\" class=\\"btn btn-primary\\" data-eb-mm-upload-error-retry=\\"\\">Try Again<\\/a>\\n        <\\/div>\\n    <\\/div>\\n<\\/div>    <div id=\\"html5_19jirf7o51og171u64lu8114cvb_container\\" class=\\"moxie-shim moxie-shim-html5\\" style=\\"position: absolute; top: 1067px; left: 95px; width: 70px; height: 28px; overflow: hidden; z-index: 0;\\"><input id=\\"html5_19jirf7o51og171u64lu8114cvb\\" style=\\"font-size: 999px; opacity: 0; position: absolute; top: 0px; left: 0px; width: 100%; height: 100%;\\" accept=\\"image\\/jpeg,image\\/png,image\\/gif\\" type=\\"file\\"><\\/div><div style=\\"position: absolute; top: 1192px; left: 264px; width: 70px; height: 29px; overflow: hidden; z-index: 0;\\" class=\\"moxie-shim moxie-shim-html5\\" id=\\"html5_19k2bk0fl1iq318u7n7l18bfknre_container\\"><input id=\\"html5_19k2bk0fl1iq318u7n7l18bfknre\\" style=\\"font-size: 999px; opacity: 0; position: absolute; top: 0px; left: 0px; width: 100%; height: 100%;\\" accept=\\"image\\/jpeg,image\\/png,image\\/gif\\" type=\\"file\\"><\\/div><div style=\\"position: absolute; top: 1185px; left: 262px; width: 70px; height: 29px; overflow: hidden; z-index: 0;\\" class=\\"moxie-shim moxie-shim-html5\\" id=\\"html5_1a10gm14pipv1vbl1cedd3l19tne_container\\"><input id=\\"html5_1a10gm14pipv1vbl1cedd3l19tne\\" style=\\"font-size: 999px; opacity: 0; position: absolute; top: 0px; left: 0px; width: 100%; height: 100%;\\" multiple=\\"\\" accept=\\"image\\/jpeg,image\\/png,image\\/gif\\" type=\\"file\\"><\\/div><\\/div>\\n<\\/div>        "},{"uid":"08399178786203265","type":"text","html":"\\n            <p><strong data-verified=\\"redactor\\" data-redactor-tag=\\"strong\\">Agness Monica<\\/strong><br>Interface Designer<\\/p><p>Curabitur eget dui id metus pulvinar suscipit. Quisque vitae ligula laoreet, scelerisque leo quis, facilisis metus.<\\/p>        ","data":{},"blocks":[],"nested":true,"isolated":false,"text":"\\n            Agness MonicaInterface DesignerCurabitur eget dui id metus pulvinar suscipit. Quisque vitae ligula laoreet, scelerisque leo quis, facilisis metus.        ","editableHtml":"\\n            <div class=\\"ebd-nest\\" data-type=\\"content\\" data-eb-text-block-wrapper=\\"\\"><div data-eb-text-content-wrapper=\\"\\" data-content-type=\\"html\\" contenteditable=\\"true\\">\\n            <p><strong data-verified=\\"redactor\\" data-redactor-tag=\\"strong\\">Agness Monica<\\/strong><br>Interface Designer<\\/p><p>Curabitur eget dui id metus pulvinar suscipit. Quisque vitae ligula laoreet, scelerisque leo quis, facilisis metus.<\\/p>        <\\/div><\\/div>        "},{"uid":"07281011568848044","type":"image","html":"","data":{"isurl":false,"url":"","uri":"","variation":"","size_enabled":true,"mode":"simple","mode_lock":false,"fluid":false,"width":"","width_lock":false,"height":"","height_lock":false,"ratio":"","ratio_lock":true,"alignment":"center","strategy":"fit","element_width":"","element_height":"","element_top":"","element_left":"","element_ratio":"","element_ratio_lock":true,"natural_width":"","natural_height":"","natural_ratio":"","style_enabled":true,"style":"clear","caption_enabled":true,"caption_text":"","link_enabled":true,"link_url":"","link_title":"","link_target":"","popup_enabled":true,"popup_url":"","popup_uri":"","popup_variation":""},"blocks":[],"nested":true,"isolated":false,"style":"text-align: center;","text":"\\nundefined","editableHtml":"\\n            <div class=\\"eb-composer-placeholder eb-composer-placeholder-image text-center\\" data-eb-composer-image-placeholder=\\"\\" data-key=\\"_cG9zdA--\\" data-type=\\"image\\" data-plupload-multi-selection=\\"0\\">\\n\\n    <div data-plupload-drop-element=\\"\\" style=\\"position: relative;\\">\\n        <i class=\\"eb-composer-placeholder-icon fa fa-camera\\"><\\/i>\\n\\n                <b class=\\"eb-composer-placeholder-title\\">Drop an image block here<\\/b>\\n        <p class=\\"eb-composer-placeholder-brief\\">Supports jpeg, png, gif.<\\/p>\\n        \\n        <button type=\\"button\\" class=\\"btn btn-sm btn-primary\\" data-eb-mm-browse-button=\\"\\" data-eb-mm-start-uri=\\"_cG9zdA--\\" data-eb-mm-filter=\\"image\\">\\n            <i class=\\"fa fa-photo\\"><\\/i> Browse Media        <\\/button>\\n\\n                <button type=\\"button\\" class=\\"btn btn-sm btn-primary\\" data-plupload-browse-button=\\"\\" style=\\"position: relative; z-index: 1;\\">\\n            <i class=\\"fa fa-upload\\"><\\/i> Upload        <\\/button>\\n        \\n\\n        <div class=\\"eb-composer-upload-progress\\" data-eb-mm-upload-progress=\\"\\">\\n    <div class=\\"col-cell\\">\\n        <div class=\\"progress\\">\\n            <b class=\\"progress-bar progress-bar-success progress-bar-striped\\" role=\\"progressbar\\" aria-valuenow=\\"0\\" aria-valuemin=\\"0\\" aria-valuemax=\\"100\\" style=\\"width: 0%;\\" data-eb-mm-upload-progress-bar=\\"\\"><\\/b>\\n        <\\/div>\\n    <\\/div>\\n    <div class=\\"col-cell\\">\\n        <div class=\\"progress-value\\" data-eb-mm-upload-progress-value=\\"\\">0%<\\/div>\\n        <span data-eb-mm-upload-name=\\"\\" class=\\"hide\\"><\\/span>\\n    <\\/div>\\n<\\/div>\\n        <div class=\\"eb-composer-placeholder-fail\\">\\n    <div class=\\"row-table\\">\\n        <div class=\\"col-cell\\">\\n            <p data-eb-mm-upload-error-text=\\"\\"><\\/p>\\n            <a href=\\"javascript:void(0);\\" class=\\"btn btn-primary\\" data-eb-mm-upload-error-retry=\\"\\">Try Again<\\/a>\\n        <\\/div>\\n    <\\/div>\\n<\\/div>    <div id=\\"html5_19jirf7o51og171u64lu8114cvb_container\\" class=\\"moxie-shim moxie-shim-html5\\" style=\\"position: absolute; top: 1067px; left: 95px; width: 70px; height: 28px; overflow: hidden; z-index: 0;\\"><input id=\\"html5_19jirf7o51og171u64lu8114cvb\\" style=\\"font-size: 999px; opacity: 0; position: absolute; top: 0px; left: 0px; width: 100%; height: 100%;\\" accept=\\"image\\/jpeg,image\\/png,image\\/gif\\" type=\\"file\\"><\\/div><div style=\\"position: absolute; top: 1192px; left: 264px; width: 70px; height: 29px; overflow: hidden; z-index: 0;\\" class=\\"moxie-shim moxie-shim-html5\\" id=\\"html5_19k2bk0fl1iq318u7n7l18bfknre_container\\"><input id=\\"html5_19k2bk0fl1iq318u7n7l18bfknre\\" style=\\"font-size: 999px; opacity: 0; position: absolute; top: 0px; left: 0px; width: 100%; height: 100%;\\" accept=\\"image\\/jpeg,image\\/png,image\\/gif\\" type=\\"file\\"><\\/div><div style=\\"position: absolute; top: 1185px; left: 262px; width: 70px; height: 29px; overflow: hidden; z-index: 0;\\" class=\\"moxie-shim moxie-shim-html5\\" id=\\"html5_1a10gm14pipv1vbl1cedd3l19tne_container\\"><input id=\\"html5_1a10gm14pipv1vbl1cedd3l19tne\\" style=\\"font-size: 999px; opacity: 0; position: absolute; top: 0px; left: 0px; width: 100%; height: 100%;\\" multiple=\\"\\" accept=\\"image\\/jpeg,image\\/png,image\\/gif\\" type=\\"file\\"><\\/div><\\/div>\\n<\\/div>        "},{"uid":"08399178786203265","type":"text","html":"\\n            <p><strong data-verified=\\"redactor\\" data-redactor-tag=\\"strong\\">Agness Monica<\\/strong><br>Interface Designer<\\/p><p>Curabitur eget dui id metus pulvinar suscipit. Quisque vitae ligula laoreet, scelerisque leo quis, facilisis metus.<\\/p>        ","data":{},"blocks":[],"nested":true,"isolated":false,"text":"\\n            Agness MonicaInterface DesignerCurabitur eget dui id metus pulvinar suscipit. Quisque vitae ligula laoreet, scelerisque leo quis, facilisis metus.        ","editableHtml":"\\n            <div class=\\"ebd-nest\\" data-type=\\"content\\" data-eb-text-block-wrapper=\\"\\"><div data-eb-text-content-wrapper=\\"\\" data-content-type=\\"html\\" contenteditable=\\"true\\">\\n            <p><strong data-verified=\\"redactor\\" data-redactor-tag=\\"strong\\">Agness Monica<\\/strong><br>Interface Designer<\\/p><p>Curabitur eget dui id metus pulvinar suscipit. Quisque vitae ligula laoreet, scelerisque leo quis, facilisis metus.<\\/p>        <\\/div><\\/div>        "}],"nested":false,"isolated":false,"text":"\\n            \\n    \\n        \\n    \\n        \\n    \\n    \\n        \\n            \\n\\n    \\n        \\n\\n                Drop an image block here\\n        Supports jpeg, png, gif.\\n        \\n        \\n             Browse Media        \\n\\n                \\n             Upload        \\n        \\n\\n        \\n    \\n        \\n            \\n        \\n    \\n    \\n        0%\\n        \\n    \\n\\n        \\n    \\n        \\n            \\n            Try Again\\n        \\n    \\n    \\n        \\n        \\n            \\n                \\n            \\n        \\n    \\n    \\n        \\n            \\n                Drag to move block.\\n            \\n        \\n    \\n\\n\\n\\n\\n            \\n        \\n    \\n    \\n        \\n            \\n    \\n        \\n    \\n    \\n        \\n            \\n            Agness MonicaInterface DesignerCurabitur eget dui id metus pulvinar suscipit. Quisque vitae ligula laoreet, scelerisque leo quis, facilisis metus.                \\n        \\n            \\n                \\n            \\n        \\n    \\n    \\n        \\n            \\n                Drag to move block.\\n            \\n        \\n    \\n\\n\\n\\n\\n        \\n    \\n        ","editableHtml":"\\n            <div class=\\"row\\" data-responsive=\\"400,300,200,100\\">\\n    <div class=\\"col col-md-3\\" data-size=\\"6\\">\\n        <div class=\\"ebd-nest\\" data-type=\\"block\\" data-col-wrapper=\\"\\"><!--block07281011568848044-->\\n\\n\\n\\n            \\n        <\\/div>\\n    <\\/div>\\n    <div class=\\"col col-md-9\\" data-size=\\"6\\">\\n        <div class=\\"ebd-nest\\" data-type=\\"block\\" data-col-wrapper=\\"\\">\\n            <!--block08399178786203265-->\\n\\n\\n\\n        <\\/div>\\n    <\\/div>\\n<\\/div>        "}]}', '2016-04-14 09:30:14', 1, 1, '/components/com_easyblog/assets/images/template-events.png', 1);
INSERT INTO `n1wr9_easyblog_post_templates` (`id`, `user_id`, `title`, `data`, `created`, `system`, `core`, `screenshot`, `published`) VALUES
(2, 311, 'Template for News', '{"title":"Template for News","permalink":"template-for-news","type":"ebd","version":"1.0","blocks":[{"uid":"05234665782190859","type":"text","html":"\\n            <p>Tart lollipop candy toffee danish candy liquorice cookie fruitcake. Powder croissant jelly-o jelly-o danish chocolate bar. Chocolate cake gummies croissant halvah jelly beans tootsie roll pudding.&nbsp;<\\/p><p>Danish brownie tart cookie jelly beans tiramisu jelly. Marzipan drag\\u00e9e lollipop cake ice cream. Sesame snaps souffl\\u00e9 souffl\\u00e9 sugar plum ice cream jelly beans chocolate bar brownie. Fruitcake bonbon pastry.&nbsp;<\\/p><p>Tiramisu jujubes marzipan. Biscuit carrot cake fruitcake drag\\u00e9e chocolate donut.<\\/p>        ","data":{},"blocks":[],"nested":false,"isolated":false,"text":"\\n            Tart lollipop candy toffee danish candy liquorice cookie fruitcake. Powder croissant jelly-o jelly-o danish chocolate bar. Chocolate cake gummies croissant halvah jelly beans tootsie roll pudding.\\u00a0Danish brownie tart cookie jelly beans tiramisu jelly. Marzipan drag\\u00e9e lollipop cake ice cream. Sesame snaps souffl\\u00e9 souffl\\u00e9 sugar plum ice cream jelly beans chocolate bar brownie. Fruitcake bonbon pastry.\\u00a0Tiramisu jujubes marzipan. Biscuit carrot cake fruitcake drag\\u00e9e chocolate donut.        ","editableHtml":"\\n            <div class=\\"ebd-nest\\" data-type=\\"content\\" data-eb-text-block-wrapper=\\"\\"><div data-eb-text-content-wrapper=\\"\\" data-content-type=\\"html\\" contenteditable=\\"true\\">\\n            <p>Tart lollipop candy toffee danish candy liquorice cookie fruitcake. Powder croissant jelly-o jelly-o danish chocolate bar. Chocolate cake gummies croissant halvah jelly beans tootsie roll pudding.&nbsp;<\\/p><p>Danish brownie tart cookie jelly beans tiramisu jelly. Marzipan drag\\u00e9e lollipop cake ice cream. Sesame snaps souffl\\u00e9 souffl\\u00e9 sugar plum ice cream jelly beans chocolate bar brownie. Fruitcake bonbon pastry.&nbsp;<\\/p><p>Tiramisu jujubes marzipan. Biscuit carrot cake fruitcake drag\\u00e9e chocolate donut.<\\/p>        <\\/div><\\/div>        "},{"uid":"07758479909971356","type":"quotes","html":"\\n            <blockquote class=\\"eb-quote style-default\\">\\n    <p>Jujubes lemon drops tart lollipop brownie<br><\\/p>\\n    <cite>Cupcake Ipsum, 2015<\\/cite>\\n<\\/blockquote>        ","data":{"style":"style-default","citation":1,"current":"style-default"},"blocks":[],"nested":false,"isolated":false,"text":"","editableHtml":"\\n            <blockquote class=\\"eb-quote style-default\\">\\n    <p contenteditable=\\"true\\">Jujubes lemon drops tart lollipop brownie<br><\\/p>\\n    <cite contenteditable=\\"true\\">Cupcake Ipsum, 2015<\\/cite>\\n<\\/blockquote>        "},{"uid":"035853996756486595","type":"text","html":"\\n            <p>Lollipop marzipan apple pie oat cake sweet roll carrot cake toffee dessert marzipan. Gummi bears jelly-o liquorice lollipop chocolate bar.&nbsp;<\\/p><p>Pastry jelly jelly sugar plum jelly tiramisu cupcake sugar plum. Pastry pie pudding tiramisu donut ice cream candy. Sweet marshmallow souffl\\u00e9 pudding.&nbsp;<span>Marzipan macaroon jelly beans. Croissant gummi bears chupa chups sugar plum tootsie roll apple pie cupcake.<\\/span><\\/p><p><span>Candy sweet roll jelly beans candy marzipan. Powder jelly-o cookie sweet roll tart pudding croissant bonbon pudding. Gummi bears caramels donut carrot cake carrot cake chupa chups bonbon tootsie roll.<br><\\/span><\\/p>        ","data":{},"blocks":[],"nested":false,"isolated":false,"text":"\\n            Lollipop marzipan apple pie oat cake sweet roll carrot cake toffee dessert marzipan. Gummi bears jelly-o liquorice lollipop chocolate bar.\\u00a0Pastry jelly jelly sugar plum jelly tiramisu cupcake sugar plum. Pastry pie pudding tiramisu donut ice cream candy. Sweet marshmallow souffl\\u00e9 pudding.\\u00a0Marzipan macaroon jelly beans. Croissant gummi bears chupa chups sugar plum tootsie roll apple pie cupcake.Candy sweet roll jelly beans candy marzipan. Powder jelly-o cookie sweet roll tart pudding croissant bonbon pudding. Gummi bears caramels donut carrot cake carrot cake chupa chups bonbon tootsie roll.        ","editableHtml":"\\n            <div class=\\"ebd-nest\\" data-type=\\"content\\" data-eb-text-block-wrapper=\\"\\"><div data-eb-text-content-wrapper=\\"\\" data-content-type=\\"html\\" contenteditable=\\"true\\">\\n            <p>Lollipop marzipan apple pie oat cake sweet roll carrot cake toffee dessert marzipan. Gummi bears jelly-o liquorice lollipop chocolate bar.&nbsp;<\\/p><p>Pastry jelly jelly sugar plum jelly tiramisu cupcake sugar plum. Pastry pie pudding tiramisu donut ice cream candy. Sweet marshmallow souffl\\u00e9 pudding.&nbsp;<span>Marzipan macaroon jelly beans. Croissant gummi bears chupa chups sugar plum tootsie roll apple pie cupcake.<\\/span><\\/p><p><span>Candy sweet roll jelly beans candy marzipan. Powder jelly-o cookie sweet roll tart pudding croissant bonbon pudding. Gummi bears caramels donut carrot cake carrot cake chupa chups bonbon tootsie roll.<br><\\/span><\\/p>        <\\/div><\\/div>        "},{"uid":"04488845628220588","type":"rule","html":"\\n            <hr>        ","data":{},"blocks":[],"nested":false,"isolated":false,"text":"","editableHtml":"\\n            <hr>        "},{"uid":"037803769996389747","type":"columns","html":"\\n            <div class=\\"row\\" data-responsive=\\"400,300,200,100\\">\\n    <div class=\\"col col-md-4\\" data-size=\\"6\\">\\n        \\n    <!--block04553489580284804--><!--block0993169609690085--><!--block019192429818212986--><\\/div>\\n    <div class=\\"col col-md-4\\" data-size=\\"6\\">\\n        \\n    <!--block020360507280565798--><!--block01288135687354952--><!--block02684249742887914--><\\/div>\\n<div class=\\"col col-md-4\\" data-size=\\"1\\"><!--block08189400548581034--><!--block05865874881856143--><!--block07594925842713565--><\\/div><\\/div>        ","data":{"columns":[{"default":0,"content":"<div class=\\"col-cell no-wrap\\" style=\\"padding-right: 10px;\\">Column Size<\\/div>\\n                    <div class=\\"col-cell\\">\\n                        <select data-select-width=\\"\\">\\n                            <option>Select Size<\\/option>\\n\\n                                                        <option value=\\"1\\">1<\\/option>\\n                                                        <option value=\\"2\\">2<\\/option>\\n                                                        <option value=\\"3\\">3<\\/option>\\n                                                        <option value=\\"4\\">4<\\/option>\\n                                                        <option value=\\"5\\">5<\\/option>\\n                                                        <option value=\\"6\\" selected=\\"selected\\">6<\\/option>\\n                                                        <option value=\\"7\\">7<\\/option>\\n                                                        <option value=\\"8\\">8<\\/option>\\n                                                        <option value=\\"9\\">9<\\/option>\\n                                                        <option value=\\"10\\">10<\\/option>\\n                                                        <option value=\\"11\\">11<\\/option>\\n                                                        <option value=\\"12\\">12<\\/option>\\n                                                    <\\/select>\\n                    <\\/div>"},{"default":0,"content":"<div class=\\"col-cell no-wrap\\" style=\\"padding-right: 10px;\\">Column Size<\\/div>\\n                    <div class=\\"col-cell\\">\\n                        <select data-select-width=\\"\\">\\n                            <option>Select Size<\\/option>\\n\\n                                                        <option value=\\"1\\">1<\\/option>\\n                                                        <option value=\\"2\\">2<\\/option>\\n                                                        <option value=\\"3\\">3<\\/option>\\n                                                        <option value=\\"4\\">4<\\/option>\\n                                                        <option value=\\"5\\">5<\\/option>\\n                                                        <option value=\\"6\\" selected=\\"selected\\">6<\\/option>\\n                                                        <option value=\\"7\\">7<\\/option>\\n                                                        <option value=\\"8\\">8<\\/option>\\n                                                        <option value=\\"9\\">9<\\/option>\\n                                                        <option value=\\"10\\">10<\\/option>\\n                                                        <option value=\\"11\\">11<\\/option>\\n                                                        <option value=\\"12\\">12<\\/option>\\n                                                    <\\/select>\\n                    <\\/div>"},{"default":0,"content":"<div class=\\"col-cell no-wrap\\" style=\\"padding-right: 10px;\\">Column Size<\\/div>\\n                    <div class=\\"col-cell\\">\\n                        <select data-select-width=\\"\\">\\n                            <option>Select Size<\\/option>\\n\\n                                                        <option value=\\"1\\">1<\\/option>\\n                                                        <option value=\\"2\\">2<\\/option>\\n                                                        <option value=\\"3\\">3<\\/option>\\n                                                        <option value=\\"4\\">4<\\/option>\\n                                                        <option value=\\"5\\">5<\\/option>\\n                                                        <option value=\\"6\\" selected=\\"selected\\">6<\\/option>\\n                                                        <option value=\\"7\\">7<\\/option>\\n                                                        <option value=\\"8\\">8<\\/option>\\n                                                        <option value=\\"9\\">9<\\/option>\\n                                                        <option value=\\"10\\">10<\\/option>\\n                                                        <option value=\\"11\\">11<\\/option>\\n                                                        <option value=\\"12\\">12<\\/option>\\n                                                    <\\/select>\\n                    <\\/div>"}]},"blocks":[{"uid":"04553489580284804","type":"image","html":"","data":{"isurl":false,"url":"","uri":"","variation":"","size_enabled":true,"mode":"simple","mode_lock":false,"fluid":false,"width":"","width_lock":false,"height":"","height_lock":false,"ratio":"","ratio_lock":true,"alignment":"center","strategy":"fit","element_width":"","element_height":"","element_top":"","element_left":"","element_ratio":"","element_ratio_lock":true,"natural_width":"","natural_height":"","natural_ratio":"","style_enabled":true,"style":"clear","caption_enabled":true,"caption_text":"","link_enabled":true,"link_url":"","link_title":"","link_target":"","popup_enabled":true,"popup_url":"","popup_uri":"","popup_variation":""},"blocks":[],"nested":true,"isolated":false,"style":"text-align: center;","text":"\\nundefined","editableHtml":"\\n            <div class=\\"eb-composer-placeholder eb-composer-placeholder-image text-center\\" data-eb-composer-image-placeholder=\\"\\" data-key=\\"_cG9zdA--\\" data-type=\\"image\\" data-plupload-multi-selection=\\"0\\">\\n\\n    <div data-plupload-drop-element=\\"\\" style=\\"position: relative;\\">\\n        <i class=\\"eb-composer-placeholder-icon fa fa-camera\\"><\\/i>\\n\\n                <b class=\\"eb-composer-placeholder-title\\">Drop an image block here<\\/b>\\n        <p class=\\"eb-composer-placeholder-brief\\">Supports jpeg, png, gif.<\\/p>\\n        \\n        <button type=\\"button\\" class=\\"btn btn-sm btn-primary\\" data-eb-mm-browse-button=\\"\\" data-eb-mm-start-uri=\\"_cG9zdA--\\" data-eb-mm-filter=\\"image\\">\\n            <i class=\\"fa fa-photo\\"><\\/i> Browse Media        <\\/button>\\n\\n                <button type=\\"button\\" class=\\"btn btn-sm btn-primary\\" data-plupload-browse-button=\\"\\" style=\\"position: relative; z-index: 1;\\">\\n            <i class=\\"fa fa-upload\\"><\\/i> Upload        <\\/button>\\n        \\n\\n        <div class=\\"eb-composer-upload-progress\\" data-eb-mm-upload-progress=\\"\\">\\n    <div class=\\"col-cell\\">\\n        <div class=\\"progress\\">\\n            <b class=\\"progress-bar progress-bar-success progress-bar-striped\\" role=\\"progressbar\\" aria-valuenow=\\"0\\" aria-valuemin=\\"0\\" aria-valuemax=\\"100\\" style=\\"width: 0%;\\" data-eb-mm-upload-progress-bar=\\"\\"><\\/b>\\n        <\\/div>\\n    <\\/div>\\n    <div class=\\"col-cell\\">\\n        <div class=\\"progress-value\\" data-eb-mm-upload-progress-value=\\"\\">0%<\\/div>\\n        <span data-eb-mm-upload-name=\\"\\" class=\\"hide\\"><\\/span>\\n    <\\/div>\\n<\\/div>\\n        <div class=\\"eb-composer-placeholder-fail\\">\\n    <div class=\\"row-table\\">\\n        <div class=\\"col-cell\\">\\n            <p data-eb-mm-upload-error-text=\\"\\"><\\/p>\\n            <a href=\\"javascript:void(0);\\" class=\\"btn btn-primary\\" data-eb-mm-upload-error-retry=\\"\\">Try Again<\\/a>\\n        <\\/div>\\n    <\\/div>\\n<\\/div>    <div id=\\"html5_19jir9d82ksh1g6oihrf38u8ri_container\\" class=\\"moxie-shim moxie-shim-html5\\" style=\\"position: absolute; top: 671px; left: 195px; width: 70px; height: 28px; overflow: hidden; z-index: 0;\\"><input id=\\"html5_19jir9d82ksh1g6oihrf38u8ri\\" style=\\"font-size: 999px; opacity: 0; position: absolute; top: 0px; left: 0px; width: 100%; height: 100%;\\" accept=\\"image\\/jpeg,image\\/png,image\\/gif\\" type=\\"file\\"><\\/div><div style=\\"position: absolute; top: 665px; left: 318px; width: 70px; height: 29px; overflow: hidden; z-index: 0;\\" class=\\"moxie-shim moxie-shim-html5\\" id=\\"html5_1a10g69ms1683rkgfeo1occ1rssb_container\\"><input id=\\"html5_1a10g69ms1683rkgfeo1occ1rssb\\" style=\\"font-size: 999px; opacity: 0; position: absolute; top: 0px; left: 0px; width: 100%; height: 100%;\\" multiple=\\"\\" accept=\\"image\\/jpeg,image\\/png,image\\/gif\\" type=\\"file\\"><\\/div><div style=\\"position: absolute; top: 665px; left: 318px; width: 70px; height: 29px; overflow: hidden; z-index: 0;\\" class=\\"moxie-shim moxie-shim-html5\\" id=\\"html5_1a1dtgqca1gai9j91ugo1defjn2b_container\\"><input id=\\"html5_1a1dtgqca1gai9j91ugo1defjn2b\\" style=\\"font-size: 999px; opacity: 0; position: absolute; top: 0px; left: 0px; width: 100%; height: 100%;\\" multiple=\\"\\" accept=\\"image\\/jpeg,image\\/png,image\\/gif\\" type=\\"file\\"><\\/div><\\/div>\\n<\\/div>        "},{"uid":"0993169609690085","type":"heading","html":"\\n            <h4><br><a href=\\"http:\\/\\/www.google.com\\" title=\\"\\" class=\\"\\" target=\\"_blank\\">Related Post Title A<\\/a><\\/h4>        ","data":{},"blocks":[],"nested":true,"isolated":false,"text":"\\n    \\n        \\n    \\n    \\n        \\n            Related Post Title A        \\n        \\n            \\n                \\n            \\n        \\n    \\n    \\n        \\n            \\n                Drag to move block.\\n            \\n        \\n    \\n","editableHtml":"\\n            <h4 contenteditable=\\"true\\"><br><a href=\\"http:\\/\\/www.google.com\\" title=\\"\\" class=\\"\\" target=\\"_blank\\">Related Post Title A<\\/a><\\/h4>        "},{"uid":"019192429818212986","type":"text","html":"\\n            <p>Gummi bears caramels donut carrot cake carrot cake chupa chups bonbon tootsie roll.<\\/p>        ","data":{},"blocks":[],"nested":true,"isolated":false,"text":"\\n            Gummi bears caramels donut carrot cake carrot cake chupa chups bonbon tootsie roll.        ","editableHtml":"\\n            <div class=\\"ebd-nest\\" data-type=\\"content\\" data-eb-text-block-wrapper=\\"\\"><div data-eb-text-content-wrapper=\\"\\" data-content-type=\\"html\\" contenteditable=\\"true\\">\\n            <p>Gummi bears caramels donut carrot cake carrot cake chupa chups bonbon tootsie roll.<\\/p>        <\\/div><\\/div>        "},{"uid":"020360507280565798","type":"image","html":"","data":{"isurl":false,"url":"","uri":"","variation":"","size_enabled":true,"mode":"simple","mode_lock":false,"fluid":false,"width":"","width_lock":false,"height":"","height_lock":false,"ratio":"","ratio_lock":true,"alignment":"center","strategy":"fit","element_width":"","element_height":"","element_top":"","element_left":"","element_ratio":"","element_ratio_lock":true,"natural_width":"","natural_height":"","natural_ratio":"","style_enabled":true,"style":"clear","caption_enabled":true,"caption_text":"","link_enabled":true,"link_url":"","link_title":"","link_target":"","popup_enabled":true,"popup_url":"","popup_uri":"","popup_variation":""},"blocks":[],"nested":true,"isolated":false,"style":"text-align: center;","text":"\\nundefined","editableHtml":"\\n            <div class=\\"eb-composer-placeholder eb-composer-placeholder-image text-center\\" data-eb-composer-image-placeholder=\\"\\" data-key=\\"_cG9zdA--\\" data-type=\\"image\\" data-plupload-multi-selection=\\"0\\">\\n\\n    <div data-plupload-drop-element=\\"\\" style=\\"position: relative;\\">\\n        <i class=\\"eb-composer-placeholder-icon fa fa-camera\\"><\\/i>\\n\\n                <b class=\\"eb-composer-placeholder-title\\">Drop an image block here<\\/b>\\n        <p class=\\"eb-composer-placeholder-brief\\">Supports jpeg, png, gif.<\\/p>\\n        \\n        <button type=\\"button\\" class=\\"btn btn-sm btn-primary\\" data-eb-mm-browse-button=\\"\\" data-eb-mm-start-uri=\\"_cG9zdA--\\" data-eb-mm-filter=\\"image\\">\\n            <i class=\\"fa fa-photo\\"><\\/i> Browse Media        <\\/button>\\n\\n                <button type=\\"button\\" class=\\"btn btn-sm btn-primary\\" data-plupload-browse-button=\\"\\" style=\\"position: relative; z-index: 1;\\">\\n            <i class=\\"fa fa-upload\\"><\\/i> Upload        <\\/button>\\n        \\n\\n        <div class=\\"eb-composer-upload-progress\\" data-eb-mm-upload-progress=\\"\\">\\n    <div class=\\"col-cell\\">\\n        <div class=\\"progress\\">\\n            <b class=\\"progress-bar progress-bar-success progress-bar-striped\\" role=\\"progressbar\\" aria-valuenow=\\"0\\" aria-valuemin=\\"0\\" aria-valuemax=\\"100\\" style=\\"width: 0%;\\" data-eb-mm-upload-progress-bar=\\"\\"><\\/b>\\n        <\\/div>\\n    <\\/div>\\n    <div class=\\"col-cell\\">\\n        <div class=\\"progress-value\\" data-eb-mm-upload-progress-value=\\"\\">0%<\\/div>\\n        <span data-eb-mm-upload-name=\\"\\" class=\\"hide\\"><\\/span>\\n    <\\/div>\\n<\\/div>\\n        <div class=\\"eb-composer-placeholder-fail\\">\\n    <div class=\\"row-table\\">\\n        <div class=\\"col-cell\\">\\n            <p data-eb-mm-upload-error-text=\\"\\"><\\/p>\\n            <a href=\\"javascript:void(0);\\" class=\\"btn btn-primary\\" data-eb-mm-upload-error-retry=\\"\\">Try Again<\\/a>\\n        <\\/div>\\n    <\\/div>\\n<\\/div>    <div id=\\"html5_19jir9n5l1tv61kr4s9a17511e5tp_container\\" class=\\"moxie-shim moxie-shim-html5\\" style=\\"position: absolute; top: 671px; left: 554px; width: 70px; height: 28px; overflow: hidden; z-index: 0;\\"><input id=\\"html5_19jir9n5l1tv61kr4s9a17511e5tp\\" style=\\"font-size: 999px; opacity: 0; position: absolute; top: 0px; left: 0px; width: 100%; height: 100%;\\" accept=\\"image\\/jpeg,image\\/png,image\\/gif\\" type=\\"file\\"><\\/div><div style=\\"position: absolute; top: 665px; left: 762px; width: 70px; height: 29px; overflow: hidden; z-index: 0;\\" class=\\"moxie-shim moxie-shim-html5\\" id=\\"html5_1a10g69ndh1bbtpatq16agirle_container\\"><input id=\\"html5_1a10g69ndh1bbtpatq16agirle\\" style=\\"font-size: 999px; opacity: 0; position: absolute; top: 0px; left: 0px; width: 100%; height: 100%;\\" multiple=\\"\\" accept=\\"image\\/jpeg,image\\/png,image\\/gif\\" type=\\"file\\"><\\/div><div style=\\"position: absolute; top: 665px; left: 762px; width: 70px; height: 29px; overflow: hidden; z-index: 0;\\" class=\\"moxie-shim moxie-shim-html5\\" id=\\"html5_1a1dtgqco8d01sjd1rjc5vh1n72e_container\\"><input id=\\"html5_1a1dtgqco8d01sjd1rjc5vh1n72e\\" style=\\"font-size: 999px; opacity: 0; position: absolute; top: 0px; left: 0px; width: 100%; height: 100%;\\" multiple=\\"\\" accept=\\"image\\/jpeg,image\\/png,image\\/gif\\" type=\\"file\\"><\\/div><\\/div>\\n<\\/div>        "},{"uid":"01288135687354952","type":"heading","html":"\\n            <h4><br><a href=\\"http:\\/\\/www.google.com\\" title=\\"\\" class=\\"\\" target=\\"_blank\\">Related Post Title B<\\/a><br><\\/h4>        ","data":{},"blocks":[],"nested":true,"isolated":false,"text":"\\n    \\n        \\n    \\n    \\n        \\n            Related Post Title B        \\n        \\n            \\n                \\n            \\n        \\n    \\n    \\n        \\n            \\n                Drag to move block.\\n            \\n        \\n    \\n","editableHtml":"\\n            <h4 contenteditable=\\"true\\"><br><a href=\\"http:\\/\\/www.google.com\\" title=\\"\\" class=\\"\\" target=\\"_blank\\">Related Post Title B<\\/a><br><\\/h4>        "},{"uid":"02684249742887914","type":"text","html":"\\n            <p>Gummi bears caramels donut carrot cake carrot cake chupa chups bonbon tootsie roll.<\\/p>        ","data":{},"blocks":[],"nested":true,"isolated":false,"text":"\\n            Gummi bears caramels donut carrot cake carrot cake chupa chups bonbon tootsie roll.        ","editableHtml":"\\n            <div class=\\"ebd-nest\\" data-type=\\"content\\" data-eb-text-block-wrapper=\\"\\"><div data-eb-text-content-wrapper=\\"\\" data-content-type=\\"html\\" contenteditable=\\"true\\">\\n            <p>Gummi bears caramels donut carrot cake carrot cake chupa chups bonbon tootsie roll.<\\/p>        <\\/div><\\/div>        "},{"uid":"08189400548581034","type":"image","html":"","data":{"isurl":false,"url":"","uri":"","variation":"","size_enabled":true,"mode":"simple","mode_lock":false,"fluid":false,"width":"","width_lock":false,"height":"","height_lock":false,"ratio":"","ratio_lock":true,"alignment":"center","strategy":"fit","element_width":"","element_height":"","element_top":"","element_left":"","element_ratio":"","element_ratio_lock":true,"natural_width":"","natural_height":"","natural_ratio":"","style_enabled":true,"style":"clear","caption_enabled":true,"caption_text":"","link_enabled":true,"link_url":"","link_title":"","link_target":"","popup_enabled":true,"popup_url":"","popup_uri":"","popup_variation":""},"blocks":[],"nested":true,"isolated":false,"style":"text-align: center;","text":"\\nundefined","editableHtml":"\\n            <div class=\\"eb-composer-placeholder eb-composer-placeholder-image text-center\\" data-eb-composer-image-placeholder=\\"\\" data-key=\\"_cG9zdA--\\" data-type=\\"image\\" data-plupload-multi-selection=\\"0\\">\\n\\n    <div data-plupload-drop-element=\\"\\" style=\\"position: relative;\\">\\n        <i class=\\"eb-composer-placeholder-icon fa fa-camera\\"><\\/i>\\n\\n                <b class=\\"eb-composer-placeholder-title\\">Drop an image block here<\\/b>\\n        <p class=\\"eb-composer-placeholder-brief\\">Supports jpeg, png, gif.<\\/p>\\n        \\n        <button type=\\"button\\" class=\\"btn btn-sm btn-primary\\" data-eb-mm-browse-button=\\"\\" data-eb-mm-start-uri=\\"_cG9zdA--\\" data-eb-mm-filter=\\"image\\">\\n            <i class=\\"fa fa-photo\\"><\\/i> Browse Media        <\\/button>\\n\\n                <button type=\\"button\\" class=\\"btn btn-sm btn-primary\\" data-plupload-browse-button=\\"\\" style=\\"position: relative; z-index: 1;\\">\\n            <i class=\\"fa fa-upload\\"><\\/i> Upload        <\\/button>\\n        \\n\\n        <div class=\\"eb-composer-upload-progress\\" data-eb-mm-upload-progress=\\"\\">\\n    <div class=\\"col-cell\\">\\n        <div class=\\"progress\\">\\n            <b class=\\"progress-bar progress-bar-success progress-bar-striped\\" role=\\"progressbar\\" aria-valuenow=\\"0\\" aria-valuemin=\\"0\\" aria-valuemax=\\"100\\" style=\\"width: 0%;\\" data-eb-mm-upload-progress-bar=\\"\\"><\\/b>\\n        <\\/div>\\n    <\\/div>\\n    <div class=\\"col-cell\\">\\n        <div class=\\"progress-value\\" data-eb-mm-upload-progress-value=\\"\\">0%<\\/div>\\n        <span data-eb-mm-upload-name=\\"\\" class=\\"hide\\"><\\/span>\\n    <\\/div>\\n<\\/div>\\n        <div class=\\"eb-composer-placeholder-fail\\">\\n    <div class=\\"row-table\\">\\n        <div class=\\"col-cell\\">\\n            <p data-eb-mm-upload-error-text=\\"\\"><\\/p>\\n            <a href=\\"javascript:void(0);\\" class=\\"btn btn-primary\\" data-eb-mm-upload-error-retry=\\"\\">Try Again<\\/a>\\n        <\\/div>\\n    <\\/div>\\n<\\/div>    <div id=\\"html5_19jira09b1bal1tb5fol7491iho10_container\\" class=\\"moxie-shim moxie-shim-html5\\" style=\\"position: absolute; top: 671px; left: 914px; width: 70px; height: 28px; overflow: hidden; z-index: 0;\\"><input id=\\"html5_19jira09b1bal1tb5fol7491iho10\\" style=\\"font-size: 999px; opacity: 0; position: absolute; top: 0px; left: 0px; width: 100%; height: 100%;\\" accept=\\"image\\/jpeg,image\\/png,image\\/gif\\" type=\\"file\\"><\\/div><div style=\\"position: absolute; top: 665px; left: 1207px; width: 70px; height: 29px; overflow: hidden; z-index: 0;\\" class=\\"moxie-shim moxie-shim-html5\\" id=\\"html5_1a10g69np4th1becama166f60ah_container\\"><input id=\\"html5_1a10g69np4th1becama166f60ah\\" style=\\"font-size: 999px; opacity: 0; position: absolute; top: 0px; left: 0px; width: 100%; height: 100%;\\" multiple=\\"\\" accept=\\"image\\/jpeg,image\\/png,image\\/gif\\" type=\\"file\\"><\\/div><div style=\\"position: absolute; top: 665px; left: 1207px; width: 70px; height: 29px; overflow: hidden; z-index: 0;\\" class=\\"moxie-shim moxie-shim-html5\\" id=\\"html5_1a1dtgqd318dqqb42fd1js21gknh_container\\"><input id=\\"html5_1a1dtgqd318dqqb42fd1js21gknh\\" style=\\"font-size: 999px; opacity: 0; position: absolute; top: 0px; left: 0px; width: 100%; height: 100%;\\" multiple=\\"\\" accept=\\"image\\/jpeg,image\\/png,image\\/gif\\" type=\\"file\\"><\\/div><\\/div>\\n<\\/div>        "},{"uid":"05865874881856143","type":"heading","html":"\\n            <h4><br><a href=\\"http:\\/\\/www.google.com\\" title=\\"\\" class=\\"\\" target=\\"_blank\\">Related Post Title C<\\/a><br><\\/h4>        ","data":{},"blocks":[],"nested":true,"isolated":false,"text":"\\n    \\n        \\n    \\n    \\n        \\n            Related Post Title C        \\n        \\n            \\n                \\n            \\n        \\n    \\n    \\n        \\n            \\n                Drag to move block.\\n            \\n        \\n    \\n","editableHtml":"\\n            <h4 contenteditable=\\"true\\"><br><a href=\\"http:\\/\\/www.google.com\\" title=\\"\\" class=\\"\\" target=\\"_blank\\">Related Post Title C<\\/a><br><\\/h4>        "},{"uid":"07594925842713565","type":"text","html":"\\n            <p>Gummi bears caramels donut carrot cake carrot cake chupa chups bonbon tootsie roll.<\\/p>        ","data":{},"blocks":[],"nested":true,"isolated":false,"text":"\\n            Gummi bears caramels donut carrot cake carrot cake chupa chups bonbon tootsie roll.        ","editableHtml":"\\n            <div class=\\"ebd-nest\\" data-type=\\"content\\" data-eb-text-block-wrapper=\\"\\"><div data-eb-text-content-wrapper=\\"\\" data-content-type=\\"html\\" contenteditable=\\"true\\">\\n            <p>Gummi bears caramels donut carrot cake carrot cake chupa chups bonbon tootsie roll.<\\/p>        <\\/div><\\/div>        "},{"uid":"04553489580284804","type":"image","html":"","data":{"isurl":false,"url":"","uri":"","variation":"","size_enabled":true,"mode":"simple","mode_lock":false,"fluid":false,"width":"","width_lock":false,"height":"","height_lock":false,"ratio":"","ratio_lock":true,"alignment":"center","strategy":"fit","element_width":"","element_height":"","element_top":"","element_left":"","element_ratio":"","element_ratio_lock":true,"natural_width":"","natural_height":"","natural_ratio":"","style_enabled":true,"style":"clear","caption_enabled":true,"caption_text":"","link_enabled":true,"link_url":"","link_title":"","link_target":"","popup_enabled":true,"popup_url":"","popup_uri":"","popup_variation":""},"blocks":[],"nested":true,"isolated":false,"style":"text-align: center;","text":"\\nundefined","editableHtml":"\\n            <div class=\\"eb-composer-placeholder eb-composer-placeholder-image text-center\\" data-eb-composer-image-placeholder=\\"\\" data-key=\\"_cG9zdA--\\" data-type=\\"image\\" data-plupload-multi-selection=\\"0\\">\\n\\n    <div data-plupload-drop-element=\\"\\" style=\\"position: relative;\\">\\n        <i class=\\"eb-composer-placeholder-icon fa fa-camera\\"><\\/i>\\n\\n                <b class=\\"eb-composer-placeholder-title\\">Drop an image block here<\\/b>\\n        <p class=\\"eb-composer-placeholder-brief\\">Supports jpeg, png, gif.<\\/p>\\n        \\n        <button type=\\"button\\" class=\\"btn btn-sm btn-primary\\" data-eb-mm-browse-button=\\"\\" data-eb-mm-start-uri=\\"_cG9zdA--\\" data-eb-mm-filter=\\"image\\">\\n            <i class=\\"fa fa-photo\\"><\\/i> Browse Media        <\\/button>\\n\\n                <button type=\\"button\\" class=\\"btn btn-sm btn-primary\\" data-plupload-browse-button=\\"\\" style=\\"position: relative; z-index: 1;\\">\\n            <i class=\\"fa fa-upload\\"><\\/i> Upload        <\\/button>\\n        \\n\\n        <div class=\\"eb-composer-upload-progress\\" data-eb-mm-upload-progress=\\"\\">\\n    <div class=\\"col-cell\\">\\n        <div class=\\"progress\\">\\n            <b class=\\"progress-bar progress-bar-success progress-bar-striped\\" role=\\"progressbar\\" aria-valuenow=\\"0\\" aria-valuemin=\\"0\\" aria-valuemax=\\"100\\" style=\\"width: 0%;\\" data-eb-mm-upload-progress-bar=\\"\\"><\\/b>\\n        <\\/div>\\n    <\\/div>\\n    <div class=\\"col-cell\\">\\n        <div class=\\"progress-value\\" data-eb-mm-upload-progress-value=\\"\\">0%<\\/div>\\n        <span data-eb-mm-upload-name=\\"\\" class=\\"hide\\"><\\/span>\\n    <\\/div>\\n<\\/div>\\n        <div class=\\"eb-composer-placeholder-fail\\">\\n    <div class=\\"row-table\\">\\n        <div class=\\"col-cell\\">\\n            <p data-eb-mm-upload-error-text=\\"\\"><\\/p>\\n            <a href=\\"javascript:void(0);\\" class=\\"btn btn-primary\\" data-eb-mm-upload-error-retry=\\"\\">Try Again<\\/a>\\n        <\\/div>\\n    <\\/div>\\n<\\/div>    <div id=\\"html5_19jir9d82ksh1g6oihrf38u8ri_container\\" class=\\"moxie-shim moxie-shim-html5\\" style=\\"position: absolute; top: 671px; left: 195px; width: 70px; height: 28px; overflow: hidden; z-index: 0;\\"><input id=\\"html5_19jir9d82ksh1g6oihrf38u8ri\\" style=\\"font-size: 999px; opacity: 0; position: absolute; top: 0px; left: 0px; width: 100%; height: 100%;\\" accept=\\"image\\/jpeg,image\\/png,image\\/gif\\" type=\\"file\\"><\\/div><div style=\\"position: absolute; top: 665px; left: 318px; width: 70px; height: 29px; overflow: hidden; z-index: 0;\\" class=\\"moxie-shim moxie-shim-html5\\" id=\\"html5_1a10g69ms1683rkgfeo1occ1rssb_container\\"><input id=\\"html5_1a10g69ms1683rkgfeo1occ1rssb\\" style=\\"font-size: 999px; opacity: 0; position: absolute; top: 0px; left: 0px; width: 100%; height: 100%;\\" multiple=\\"\\" accept=\\"image\\/jpeg,image\\/png,image\\/gif\\" type=\\"file\\"><\\/div><div style=\\"position: absolute; top: 665px; left: 318px; width: 70px; height: 29px; overflow: hidden; z-index: 0;\\" class=\\"moxie-shim moxie-shim-html5\\" id=\\"html5_1a1dtgqca1gai9j91ugo1defjn2b_container\\"><input id=\\"html5_1a1dtgqca1gai9j91ugo1defjn2b\\" style=\\"font-size: 999px; opacity: 0; position: absolute; top: 0px; left: 0px; width: 100%; height: 100%;\\" multiple=\\"\\" accept=\\"image\\/jpeg,image\\/png,image\\/gif\\" type=\\"file\\"><\\/div><\\/div>\\n<\\/div>        "},{"uid":"0993169609690085","type":"heading","html":"\\n            <h4><br><a href=\\"http:\\/\\/www.google.com\\" title=\\"\\" class=\\"\\" target=\\"_blank\\">Related Post Title A<\\/a><\\/h4>        ","data":{},"blocks":[],"nested":true,"isolated":false,"text":"\\n    \\n        \\n    \\n    \\n        \\n            Related Post Title A        \\n        \\n            \\n                \\n            \\n        \\n    \\n    \\n        \\n            \\n                Drag to move block.\\n            \\n        \\n    \\n","editableHtml":"\\n            <h4 contenteditable=\\"true\\"><br><a href=\\"http:\\/\\/www.google.com\\" title=\\"\\" class=\\"\\" target=\\"_blank\\">Related Post Title A<\\/a><\\/h4>        "},{"uid":"019192429818212986","type":"text","html":"\\n            <p>Gummi bears caramels donut carrot cake carrot cake chupa chups bonbon tootsie roll.<\\/p>        ","data":{},"blocks":[],"nested":true,"isolated":false,"text":"\\n            Gummi bears caramels donut carrot cake carrot cake chupa chups bonbon tootsie roll.        ","editableHtml":"\\n            <div class=\\"ebd-nest\\" data-type=\\"content\\" data-eb-text-block-wrapper=\\"\\"><div data-eb-text-content-wrapper=\\"\\" data-content-type=\\"html\\" contenteditable=\\"true\\">\\n            <p>Gummi bears caramels donut carrot cake carrot cake chupa chups bonbon tootsie roll.<\\/p>        <\\/div><\\/div>        "},{"uid":"020360507280565798","type":"image","html":"","data":{"isurl":false,"url":"","uri":"","variation":"","size_enabled":true,"mode":"simple","mode_lock":false,"fluid":false,"width":"","width_lock":false,"height":"","height_lock":false,"ratio":"","ratio_lock":true,"alignment":"center","strategy":"fit","element_width":"","element_height":"","element_top":"","element_left":"","element_ratio":"","element_ratio_lock":true,"natural_width":"","natural_height":"","natural_ratio":"","style_enabled":true,"style":"clear","caption_enabled":true,"caption_text":"","link_enabled":true,"link_url":"","link_title":"","link_target":"","popup_enabled":true,"popup_url":"","popup_uri":"","popup_variation":""},"blocks":[],"nested":true,"isolated":false,"style":"text-align: center;","text":"\\nundefined","editableHtml":"\\n            <div class=\\"eb-composer-placeholder eb-composer-placeholder-image text-center\\" data-eb-composer-image-placeholder=\\"\\" data-key=\\"_cG9zdA--\\" data-type=\\"image\\" data-plupload-multi-selection=\\"0\\">\\n\\n    <div data-plupload-drop-element=\\"\\" style=\\"position: relative;\\">\\n        <i class=\\"eb-composer-placeholder-icon fa fa-camera\\"><\\/i>\\n\\n                <b class=\\"eb-composer-placeholder-title\\">Drop an image block here<\\/b>\\n        <p class=\\"eb-composer-placeholder-brief\\">Supports jpeg, png, gif.<\\/p>\\n        \\n        <button type=\\"button\\" class=\\"btn btn-sm btn-primary\\" data-eb-mm-browse-button=\\"\\" data-eb-mm-start-uri=\\"_cG9zdA--\\" data-eb-mm-filter=\\"image\\">\\n            <i class=\\"fa fa-photo\\"><\\/i> Browse Media        <\\/button>\\n\\n                <button type=\\"button\\" class=\\"btn btn-sm btn-primary\\" data-plupload-browse-button=\\"\\" style=\\"position: relative; z-index: 1;\\">\\n            <i class=\\"fa fa-upload\\"><\\/i> Upload        <\\/button>\\n        \\n\\n        <div class=\\"eb-composer-upload-progress\\" data-eb-mm-upload-progress=\\"\\">\\n    <div class=\\"col-cell\\">\\n        <div class=\\"progress\\">\\n            <b class=\\"progress-bar progress-bar-success progress-bar-striped\\" role=\\"progressbar\\" aria-valuenow=\\"0\\" aria-valuemin=\\"0\\" aria-valuemax=\\"100\\" style=\\"width: 0%;\\" data-eb-mm-upload-progress-bar=\\"\\"><\\/b>\\n        <\\/div>\\n    <\\/div>\\n    <div class=\\"col-cell\\">\\n        <div class=\\"progress-value\\" data-eb-mm-upload-progress-value=\\"\\">0%<\\/div>\\n        <span data-eb-mm-upload-name=\\"\\" class=\\"hide\\"><\\/span>\\n    <\\/div>\\n<\\/div>\\n        <div class=\\"eb-composer-placeholder-fail\\">\\n    <div class=\\"row-table\\">\\n        <div class=\\"col-cell\\">\\n            <p data-eb-mm-upload-error-text=\\"\\"><\\/p>\\n            <a href=\\"javascript:void(0);\\" class=\\"btn btn-primary\\" data-eb-mm-upload-error-retry=\\"\\">Try Again<\\/a>\\n        <\\/div>\\n    <\\/div>\\n<\\/div>    <div id=\\"html5_19jir9n5l1tv61kr4s9a17511e5tp_container\\" class=\\"moxie-shim moxie-shim-html5\\" style=\\"position: absolute; top: 671px; left: 554px; width: 70px; height: 28px; overflow: hidden; z-index: 0;\\"><input id=\\"html5_19jir9n5l1tv61kr4s9a17511e5tp\\" style=\\"font-size: 999px; opacity: 0; position: absolute; top: 0px; left: 0px; width: 100%; height: 100%;\\" accept=\\"image\\/jpeg,image\\/png,image\\/gif\\" type=\\"file\\"><\\/div><div style=\\"position: absolute; top: 665px; left: 762px; width: 70px; height: 29px; overflow: hidden; z-index: 0;\\" class=\\"moxie-shim moxie-shim-html5\\" id=\\"html5_1a10g69ndh1bbtpatq16agirle_container\\"><input id=\\"html5_1a10g69ndh1bbtpatq16agirle\\" style=\\"font-size: 999px; opacity: 0; position: absolute; top: 0px; left: 0px; width: 100%; height: 100%;\\" multiple=\\"\\" accept=\\"image\\/jpeg,image\\/png,image\\/gif\\" type=\\"file\\"><\\/div><div style=\\"position: absolute; top: 665px; left: 762px; width: 70px; height: 29px; overflow: hidden; z-index: 0;\\" class=\\"moxie-shim moxie-shim-html5\\" id=\\"html5_1a1dtgqco8d01sjd1rjc5vh1n72e_container\\"><input id=\\"html5_1a1dtgqco8d01sjd1rjc5vh1n72e\\" style=\\"font-size: 999px; opacity: 0; position: absolute; top: 0px; left: 0px; width: 100%; height: 100%;\\" multiple=\\"\\" accept=\\"image\\/jpeg,image\\/png,image\\/gif\\" type=\\"file\\"><\\/div><\\/div>\\n<\\/div>        "},{"uid":"01288135687354952","type":"heading","html":"\\n            <h4><br><a href=\\"http:\\/\\/www.google.com\\" title=\\"\\" class=\\"\\" target=\\"_blank\\">Related Post Title B<\\/a><br><\\/h4>        ","data":{},"blocks":[],"nested":true,"isolated":false,"text":"\\n    \\n        \\n    \\n    \\n        \\n            Related Post Title B        \\n        \\n            \\n                \\n            \\n        \\n    \\n    \\n        \\n            \\n                Drag to move block.\\n            \\n        \\n    \\n","editableHtml":"\\n            <h4 contenteditable=\\"true\\"><br><a href=\\"http:\\/\\/www.google.com\\" title=\\"\\" class=\\"\\" target=\\"_blank\\">Related Post Title B<\\/a><br><\\/h4>        "},{"uid":"02684249742887914","type":"text","html":"\\n            <p>Gummi bears caramels donut carrot cake carrot cake chupa chups bonbon tootsie roll.<\\/p>        ","data":{},"blocks":[],"nested":true,"isolated":false,"text":"\\n            Gummi bears caramels donut carrot cake carrot cake chupa chups bonbon tootsie roll.        ","editableHtml":"\\n            <div class=\\"ebd-nest\\" data-type=\\"content\\" data-eb-text-block-wrapper=\\"\\"><div data-eb-text-content-wrapper=\\"\\" data-content-type=\\"html\\" contenteditable=\\"true\\">\\n            <p>Gummi bears caramels donut carrot cake carrot cake chupa chups bonbon tootsie roll.<\\/p>        <\\/div><\\/div>        "},{"uid":"08189400548581034","type":"image","html":"","data":{"isurl":false,"url":"","uri":"","variation":"","size_enabled":true,"mode":"simple","mode_lock":false,"fluid":false,"width":"","width_lock":false,"height":"","height_lock":false,"ratio":"","ratio_lock":true,"alignment":"center","strategy":"fit","element_width":"","element_height":"","element_top":"","element_left":"","element_ratio":"","element_ratio_lock":true,"natural_width":"","natural_height":"","natural_ratio":"","style_enabled":true,"style":"clear","caption_enabled":true,"caption_text":"","link_enabled":true,"link_url":"","link_title":"","link_target":"","popup_enabled":true,"popup_url":"","popup_uri":"","popup_variation":""},"blocks":[],"nested":true,"isolated":false,"style":"text-align: center;","text":"\\nundefined","editableHtml":"\\n            <div class=\\"eb-composer-placeholder eb-composer-placeholder-image text-center\\" data-eb-composer-image-placeholder=\\"\\" data-key=\\"_cG9zdA--\\" data-type=\\"image\\" data-plupload-multi-selection=\\"0\\">\\n\\n    <div data-plupload-drop-element=\\"\\" style=\\"position: relative;\\">\\n        <i class=\\"eb-composer-placeholder-icon fa fa-camera\\"><\\/i>\\n\\n                <b class=\\"eb-composer-placeholder-title\\">Drop an image block here<\\/b>\\n        <p class=\\"eb-composer-placeholder-brief\\">Supports jpeg, png, gif.<\\/p>\\n        \\n        <button type=\\"button\\" class=\\"btn btn-sm btn-primary\\" data-eb-mm-browse-button=\\"\\" data-eb-mm-start-uri=\\"_cG9zdA--\\" data-eb-mm-filter=\\"image\\">\\n            <i class=\\"fa fa-photo\\"><\\/i> Browse Media        <\\/button>\\n\\n                <button type=\\"button\\" class=\\"btn btn-sm btn-primary\\" data-plupload-browse-button=\\"\\" style=\\"position: relative; z-index: 1;\\">\\n            <i class=\\"fa fa-upload\\"><\\/i> Upload        <\\/button>\\n        \\n\\n        <div class=\\"eb-composer-upload-progress\\" data-eb-mm-upload-progress=\\"\\">\\n    <div class=\\"col-cell\\">\\n        <div class=\\"progress\\">\\n            <b class=\\"progress-bar progress-bar-success progress-bar-striped\\" role=\\"progressbar\\" aria-valuenow=\\"0\\" aria-valuemin=\\"0\\" aria-valuemax=\\"100\\" style=\\"width: 0%;\\" data-eb-mm-upload-progress-bar=\\"\\"><\\/b>\\n        <\\/div>\\n    <\\/div>\\n    <div class=\\"col-cell\\">\\n        <div class=\\"progress-value\\" data-eb-mm-upload-progress-value=\\"\\">0%<\\/div>\\n        <span data-eb-mm-upload-name=\\"\\" class=\\"hide\\"><\\/span>\\n    <\\/div>\\n<\\/div>\\n        <div class=\\"eb-composer-placeholder-fail\\">\\n    <div class=\\"row-table\\">\\n        <div class=\\"col-cell\\">\\n            <p data-eb-mm-upload-error-text=\\"\\"><\\/p>\\n            <a href=\\"javascript:void(0);\\" class=\\"btn btn-primary\\" data-eb-mm-upload-error-retry=\\"\\">Try Again<\\/a>\\n        <\\/div>\\n    <\\/div>\\n<\\/div>    <div id=\\"html5_19jira09b1bal1tb5fol7491iho10_container\\" class=\\"moxie-shim moxie-shim-html5\\" style=\\"position: absolute; top: 671px; left: 914px; width: 70px; height: 28px; overflow: hidden; z-index: 0;\\"><input id=\\"html5_19jira09b1bal1tb5fol7491iho10\\" style=\\"font-size: 999px; opacity: 0; position: absolute; top: 0px; left: 0px; width: 100%; height: 100%;\\" accept=\\"image\\/jpeg,image\\/png,image\\/gif\\" type=\\"file\\"><\\/div><div style=\\"position: absolute; top: 665px; left: 1207px; width: 70px; height: 29px; overflow: hidden; z-index: 0;\\" class=\\"moxie-shim moxie-shim-html5\\" id=\\"html5_1a10g69np4th1becama166f60ah_container\\"><input id=\\"html5_1a10g69np4th1becama166f60ah\\" style=\\"font-size: 999px; opacity: 0; position: absolute; top: 0px; left: 0px; width: 100%; height: 100%;\\" multiple=\\"\\" accept=\\"image\\/jpeg,image\\/png,image\\/gif\\" type=\\"file\\"><\\/div><div style=\\"position: absolute; top: 665px; left: 1207px; width: 70px; height: 29px; overflow: hidden; z-index: 0;\\" class=\\"moxie-shim moxie-shim-html5\\" id=\\"html5_1a1dtgqd318dqqb42fd1js21gknh_container\\"><input id=\\"html5_1a1dtgqd318dqqb42fd1js21gknh\\" style=\\"font-size: 999px; opacity: 0; position: absolute; top: 0px; left: 0px; width: 100%; height: 100%;\\" multiple=\\"\\" accept=\\"image\\/jpeg,image\\/png,image\\/gif\\" type=\\"file\\"><\\/div><\\/div>\\n<\\/div>        "},{"uid":"05865874881856143","type":"heading","html":"\\n            <h4><br><a href=\\"http:\\/\\/www.google.com\\" title=\\"\\" class=\\"\\" target=\\"_blank\\">Related Post Title C<\\/a><br><\\/h4>        ","data":{},"blocks":[],"nested":true,"isolated":false,"text":"\\n    \\n        \\n    \\n    \\n        \\n            Related Post Title C        \\n        \\n            \\n                \\n            \\n        \\n    \\n    \\n        \\n            \\n                Drag to move block.\\n            \\n        \\n    \\n","editableHtml":"\\n            <h4 contenteditable=\\"true\\"><br><a href=\\"http:\\/\\/www.google.com\\" title=\\"\\" class=\\"\\" target=\\"_blank\\">Related Post Title C<\\/a><br><\\/h4>        "},{"uid":"07594925842713565","type":"text","html":"\\n            <p>Gummi bears caramels donut carrot cake carrot cake chupa chups bonbon tootsie roll.<\\/p>        ","data":{},"blocks":[],"nested":true,"isolated":false,"text":"\\n            Gummi bears caramels donut carrot cake carrot cake chupa chups bonbon tootsie roll.        ","editableHtml":"\\n            <div class=\\"ebd-nest\\" data-type=\\"content\\" data-eb-text-block-wrapper=\\"\\"><div data-eb-text-content-wrapper=\\"\\" data-content-type=\\"html\\" contenteditable=\\"true\\">\\n            <p>Gummi bears caramels donut carrot cake carrot cake chupa chups bonbon tootsie roll.<\\/p>        <\\/div><\\/div>        "}],"nested":false,"isolated":false,"text":"\\n            \\n    \\n        \\n    \\n        \\n    \\n    \\n        \\n            \\n\\n    \\n        \\n\\n                Drop an image block here\\n        Supports jpeg, png, gif.\\n        \\n        \\n             Browse Media        \\n\\n                \\n             Upload        \\n        \\n\\n        \\n    \\n        \\n            \\n        \\n    \\n    \\n        0%\\n        \\n    \\n\\n        \\n    \\n        \\n            \\n            Try Again\\n        \\n    \\n    \\n        \\n        \\n            \\n                \\n            \\n        \\n    \\n    \\n        \\n            \\n                Drag to move block.\\n            \\n        \\n    \\n\\n\\n\\n\\n    \\n        \\n    \\n    \\n        \\n            Related Post Title A        \\n        \\n            \\n                \\n            \\n        \\n    \\n    \\n        \\n            \\n                Drag to move block.\\n            \\n        \\n    \\n\\n\\n\\n\\n            \\n    \\n        \\n    \\n    \\n        \\n            \\n            Gummi bears caramels donut carrot cake carrot cake chupa chups bonbon tootsie roll.                \\n        \\n            \\n                \\n            \\n        \\n    \\n    \\n        \\n            \\n                Drag to move block.\\n            \\n        \\n    \\n\\n\\n\\n\\n        \\n    \\n    \\n        \\n    \\n        \\n    \\n    \\n        \\n            \\n\\n    \\n        \\n\\n                Drop an image block here\\n        Supports jpeg, png, gif.\\n        \\n        \\n             Browse Media        \\n\\n                \\n             Upload        \\n        \\n\\n        \\n    \\n        \\n            \\n        \\n    \\n    \\n        0%\\n        \\n    \\n\\n        \\n    \\n        \\n            \\n            Try Again\\n        \\n    \\n    \\n        \\n        \\n            \\n                \\n            \\n        \\n    \\n    \\n        \\n            \\n                Drag to move block.\\n            \\n        \\n    \\n\\n\\n\\n\\n    \\n        \\n    \\n    \\n        \\n            Related Post Title B        \\n        \\n            \\n                \\n            \\n        \\n    \\n    \\n        \\n            \\n                Drag to move block.\\n            \\n        \\n    \\n\\n\\n\\n\\n            \\n    \\n        \\n    \\n    \\n        \\n            \\n            Gummi bears caramels donut carrot cake carrot cake chupa chups bonbon tootsie roll.                \\n        \\n            \\n                \\n            \\n        \\n    \\n    \\n        \\n            \\n                Drag to move block.\\n            \\n        \\n    \\n\\n\\n\\n\\n        \\n    \\n\\n    \\n        \\n    \\n    \\n        \\n            \\n\\n    \\n        \\n\\n                Drop an image block here\\n        Supports jpeg, png, gif.\\n        \\n        \\n             Browse Media        \\n\\n                \\n             Upload        \\n        \\n\\n        \\n    \\n        \\n            \\n        \\n    \\n    \\n        0%\\n        \\n    \\n\\n        \\n    \\n        \\n            \\n            Try Again\\n        \\n    \\n    \\n        \\n        \\n            \\n                \\n            \\n        \\n    \\n    \\n        \\n            \\n                Drag to move block.\\n            \\n        \\n    \\n\\n\\n\\n\\n    \\n        \\n    \\n    \\n        \\n            Related Post Title C        \\n        \\n            \\n                \\n            \\n        \\n    \\n    \\n        \\n            \\n                Drag to move block.\\n            \\n        \\n    \\n\\n\\n\\n\\n    \\n        \\n    \\n    \\n        \\n            \\n            Gummi bears caramels donut carrot cake carrot cake chupa chups bonbon tootsie roll.                \\n        \\n            \\n                \\n            \\n        \\n    \\n    \\n        \\n            \\n                Drag to move block.\\n            \\n        \\n    \\n\\n\\n\\n        ","editableHtml":"\\n            <div class=\\"row\\" data-responsive=\\"400,300,200,100\\">\\n    <div class=\\"col col-md-4\\" data-size=\\"6\\">\\n        <div class=\\"ebd-nest\\" data-type=\\"block\\" data-col-wrapper=\\"\\"><!--block04553489580284804-->\\n\\n\\n<!--block0993169609690085-->\\n\\n\\n\\n            <!--block019192429818212986-->\\n\\n\\n\\n        <\\/div>\\n    <\\/div>\\n    <div class=\\"col col-md-4\\" data-size=\\"6\\">\\n        <div class=\\"ebd-nest\\" data-type=\\"block\\" data-col-wrapper=\\"\\"><!--block020360507280565798-->\\n\\n\\n<!--block01288135687354952-->\\n\\n\\n\\n            <!--block02684249742887914-->\\n\\n\\n\\n        <\\/div>\\n    <\\/div>\\n<div class=\\"col col-md-4\\" data-size=\\"1\\"><div class=\\"ebd-nest ui-sortable\\" data-type=\\"block\\" data-col-wrapper=\\"\\"><!--block08189400548581034-->\\n\\n\\n<!--block05865874881856143-->\\n\\n\\n<!--block07594925842713565-->\\n\\n\\n<\\/div><\\/div><\\/div>        "}]}', '2016-04-14 09:30:14', 1, 1, '/components/com_easyblog/assets/images/template-news.png', 1);
INSERT INTO `n1wr9_easyblog_post_templates` (`id`, `user_id`, `title`, `data`, `created`, `system`, `core`, `screenshot`, `published`) VALUES
(4, 311, 'Template for Videos', '{"title":"Template for Videos","permalink":"template-for-videos","type":"ebd","version":"1.0","blocks":[{"uid":"03040071225259453","type":"text","html":"\\n            <p>Duis ac quam leo. Phasellus malesuada, leo at lobortis egestas, felis lorem condimentum lacus, id iaculis quam urna ac urna. Vivamus aliquam laoreet semper. Ut lacinia sem nisi. Sed vulputate convallis odio posuere porttitor. Aliquam turpis felis, faucibus non orci vel, laoreet dapibus diam. Nam rhoncus tortor velit, sollicitudin semper nisl pulvinar sed.<\\/p>        ","data":{},"blocks":[],"nested":false,"isolated":false,"text":"\\n            Duis ac quam leo. Phasellus malesuada, leo at lobortis egestas, felis lorem condimentum lacus, id iaculis quam urna ac urna. Vivamus aliquam laoreet semper. Ut lacinia sem nisi. Sed vulputate convallis odio posuere porttitor. Aliquam turpis felis, faucibus non orci vel, laoreet dapibus diam. Nam rhoncus tortor velit, sollicitudin semper nisl pulvinar sed.        ","editableHtml":"<div class=\\"ebd-nest\\" data-type=\\"content\\" data-eb-text-block-wrapper=\\"\\"><div data-eb-text-content-wrapper=\\"\\" data-content-type=\\"html\\" contenteditable=\\"true\\">\\n            <p>Duis ac quam leo. Phasellus malesuada, leo at lobortis egestas, felis lorem condimentum lacus, id iaculis quam urna ac urna. Vivamus aliquam laoreet semper. Ut lacinia sem nisi. Sed vulputate convallis odio posuere porttitor. Aliquam turpis felis, faucibus non orci vel, laoreet dapibus diam. Nam rhoncus tortor velit, sollicitudin semper nisl pulvinar sed.<\\/p>        <\\/div><\\/div>"},{"uid":"0346444247988984","type":"rule","html":"\\n            <hr>        ","data":{},"blocks":[],"nested":false,"isolated":false,"text":"","editableHtml":"\\n            <hr>        "},{"uid":"05725746976677328","type":"columns","html":"\\n            <div class=\\"row\\" data-responsive=\\"400,300,200,100\\">\\n    <div class=\\"col col-md-4\\" data-size=\\"6\\">\\n        \\n    <!--block06036547953262925--><\\/div>\\n    <div class=\\"col col-md-8\\" data-size=\\"6\\">\\n        \\n    <!--block029067436303012073--><!--block038569004484452307--><!--block08367778363171965--><\\/div>\\n<\\/div>        ","data":{"columns":[{"size":6,"content":"COM_EASYBLOG_BLOCK_COLUMN_DEFAULT_TITLE"},{"size":6,"content":"COM_EASYBLOG_BLOCK_COLUMN_DEFAULT_TITLE"}]},"blocks":[{"uid":"06036547953262925","type":"video","html":"","data":{"url":"","width":"100%","height":"","ratio":"16:9","autoplay":false,"loop":false,"muted":false},"blocks":[],"nested":true,"isolated":false,"text":"","editableHtml":""},{"uid":"029067436303012073","type":"heading","html":"\\n            <h4>Linkin Park - Somewhere I Belong<br><\\/h4>        ","data":{},"blocks":[],"nested":true,"isolated":false,"text":"\\n    \\n        \\n    \\n    \\n        \\n            Linkin Park - Somewhere I Belong        \\n        \\n            \\n                \\n            \\n        \\n    \\n    \\n        \\n            \\n                Drag to move block.\\n            \\n        \\n    \\n","editableHtml":"\\n            <h4 contenteditable=\\"true\\">Linkin Park - Somewhere I Belong<br><\\/h4>        "},{"uid":"038569004484452307","type":"text","html":"\\n            <p>Aliquam turpis felis, faucibus non orci vel, laoreet dapibus diam. Nam rhoncus tortor velit.<\\/p>        ","data":{},"blocks":[],"nested":true,"isolated":false,"text":"\\n            Aliquam turpis felis, faucibus non orci vel, laoreet dapibus diam. Nam rhoncus tortor velit.        ","editableHtml":"<div class=\\"ebd-nest\\" data-type=\\"content\\" data-eb-text-block-wrapper=\\"\\"><div data-eb-text-content-wrapper=\\"\\" data-content-type=\\"html\\" contenteditable=\\"true\\">\\n            <p>Aliquam turpis felis, faucibus non orci vel, laoreet dapibus diam. Nam rhoncus tortor velit.<\\/p>        <\\/div><\\/div>"},{"uid":"08367778363171965","type":"buttons","html":"\\n            <a href=\\"javascript:void(0);\\" class=\\"btn btn-default btn-danger\\" rel=\\"\\">\\n    <span><strong data-redactor-tag=\\"strong\\" data-verified=\\"redactor\\">Watch Now<\\/strong><\\/span>\\n<\\/a>        ","data":{"caption":"Button Text","style":"btn-danger","size":"","link":"","nofollow":0,"target":""},"blocks":[],"nested":true,"isolated":false,"text":"","editableHtml":"\\n            <a href=\\"javascript:void(0);\\" class=\\"btn btn-default btn-danger\\" rel=\\"\\">\\n    <span contenteditable=\\"true\\"><strong data-redactor-tag=\\"strong\\" data-verified=\\"redactor\\">Watch Now<\\/strong><\\/span>\\n<\\/a>        "},{"uid":"06036547953262925","type":"video","html":"","data":{"url":"","width":"100%","height":"","ratio":"16:9","autoplay":false,"loop":false,"muted":false},"blocks":[],"nested":true,"isolated":false,"text":"","editableHtml":""},{"uid":"029067436303012073","type":"heading","html":"\\n            <h4>Linkin Park - Somewhere I Belong<br><\\/h4>        ","data":{},"blocks":[],"nested":true,"isolated":false,"text":"\\n    \\n        \\n    \\n    \\n        \\n            Linkin Park - Somewhere I Belong        \\n        \\n            \\n                \\n            \\n        \\n    \\n    \\n        \\n            \\n                Drag to move block.\\n            \\n        \\n    \\n","editableHtml":"\\n            <h4 contenteditable=\\"true\\">Linkin Park - Somewhere I Belong<br><\\/h4>        "},{"uid":"038569004484452307","type":"text","html":"\\n            <p>Aliquam turpis felis, faucibus non orci vel, laoreet dapibus diam. Nam rhoncus tortor velit.<\\/p>        ","data":{},"blocks":[],"nested":true,"isolated":false,"text":"\\n            Aliquam turpis felis, faucibus non orci vel, laoreet dapibus diam. Nam rhoncus tortor velit.        ","editableHtml":"<div class=\\"ebd-nest\\" data-type=\\"content\\" data-eb-text-block-wrapper=\\"\\"><div data-eb-text-content-wrapper=\\"\\" data-content-type=\\"html\\" contenteditable=\\"true\\">\\n            <p>Aliquam turpis felis, faucibus non orci vel, laoreet dapibus diam. Nam rhoncus tortor velit.<\\/p>        <\\/div><\\/div>"},{"uid":"08367778363171965","type":"buttons","html":"\\n            <a href=\\"javascript:void(0);\\" class=\\"btn btn-default btn-danger\\" rel=\\"\\">\\n    <span><strong data-redactor-tag=\\"strong\\" data-verified=\\"redactor\\">Watch Now<\\/strong><\\/span>\\n<\\/a>        ","data":{"caption":"Button Text","style":"btn-danger","size":"","link":"","nofollow":0,"target":""},"blocks":[],"nested":true,"isolated":false,"text":"","editableHtml":"\\n            <a href=\\"javascript:void(0);\\" class=\\"btn btn-default btn-danger\\" rel=\\"\\">\\n    <span contenteditable=\\"true\\"><strong data-redactor-tag=\\"strong\\" data-verified=\\"redactor\\">Watch Now<\\/strong><\\/span>\\n<\\/a>        "}],"nested":false,"isolated":false,"text":"\\n            \\n    \\n        \\n    \\n        \\n    \\n    \\n        \\n            \\n\\n    \\n        \\n        Drop a video file here\\n        Supports 3gp, m4v, mp4, flv, wmv mp3, and webm.\\n\\n        Please upload a supported video file\\n\\n        \\n             Browse Videos        \\n\\n        \\n            \\n                 Upload File            \\n        \\n\\n        \\n    \\n        \\n            \\n        \\n    \\n    \\n        0%\\n        \\n    \\n\\n        \\n    \\n        \\n            \\n            Try Again\\n        \\n    \\n    \\n        \\n        \\n            \\n                \\n            \\n        \\n    \\n    \\n        \\n            \\n                Drag to move block.\\n            \\n        \\n    \\n\\n\\n\\n            \\n        \\n    \\n    \\n        \\n    \\n        \\n    \\n    \\n        \\n            Linkin Park - Somewhere I Belong        \\n        \\n            \\n                \\n            \\n        \\n    \\n    \\n        \\n            \\n                Drag to move block.\\n            \\n        \\n    \\n\\n\\n\\n            \\n    \\n        \\n    \\n    \\n        \\n            Aliquam turpis felis, faucibus non orci vel, laoreet dapibus diam. Nam rhoncus tortor velit.        \\n        \\n            \\n                \\n            \\n        \\n    \\n    \\n        \\n            \\n                Drag to move block.\\n            \\n        \\n    \\n\\n\\n\\n    \\n        \\n    \\n    \\n        \\n            \\n    Watch Now\\n        \\n        \\n            \\n                \\n            \\n        \\n    \\n    \\n        \\n            \\n                Drag to move block.\\n            \\n        \\n    \\n\\n\\n\\n        \\n    \\n        ","editableHtml":"\\n            <div class=\\"row\\" data-responsive=\\"400,300,200,100\\">\\n    <div class=\\"col col-md-4\\" data-size=\\"6\\">\\n        <div class=\\"ebd-nest\\" data-type=\\"block\\" data-col-wrapper=\\"\\"><!--block06036547953262925-->\\n\\n\\n            \\n        <\\/div>\\n    <\\/div>\\n    <div class=\\"col col-md-8\\" data-size=\\"6\\">\\n        <div class=\\"ebd-nest\\" data-type=\\"block\\" data-col-wrapper=\\"\\"><!--block029067436303012073-->\\n\\n\\n            <!--block038569004484452307-->\\n\\n<!--block08367778363171965-->\\n\\n\\n        <\\/div>\\n    <\\/div>\\n<\\/div>        "},{"uid":"026837448799051344","type":"rule","html":"\\n            <hr>        ","data":{},"blocks":[],"nested":false,"isolated":false,"text":"","editableHtml":"\\n            <hr>        "},{"uid":"0046830407343804836","type":"columns","html":"\\n            <div class=\\"row\\" data-responsive=\\"400,300,200,100\\">\\n    <div class=\\"col col-md-4\\" data-size=\\"6\\">\\n        \\n    <!--block06734710435848683--><\\/div>\\n    <div class=\\"col col-md-8\\" data-size=\\"6\\">\\n        \\n    <!--block08473397800698876--><!--block07279896603431553--><!--block05163364168256521--><\\/div>\\n<\\/div>        ","data":{"columns":[{"size":6,"content":"COM_EASYBLOG_BLOCK_COLUMN_DEFAULT_TITLE"},{"size":6,"content":"COM_EASYBLOG_BLOCK_COLUMN_DEFAULT_TITLE"}]},"blocks":[{"uid":"06734710435848683","type":"video","html":"","data":{"url":"","width":"100%","height":"","ratio":"16:9","autoplay":false,"loop":false,"muted":false},"blocks":[],"nested":true,"isolated":false,"text":"","editableHtml":""},{"uid":"08473397800698876","type":"heading","html":"\\n            <h4>Linkin Park - Masquarade<br><\\/h4>        ","data":{},"blocks":[],"nested":true,"isolated":false,"text":"\\n    \\n        \\n    \\n    \\n        \\n            Linkin Park - Masquarade        \\n        \\n            \\n                \\n            \\n        \\n    \\n    \\n        \\n            \\n                Drag to move block.\\n            \\n        \\n    \\n","editableHtml":"\\n            <h4 contenteditable=\\"true\\">Linkin Park - Masquarade<br><\\/h4>        "},{"uid":"07279896603431553","type":"text","html":"\\n            <p>Aliquam turpis felis, faucibus non orci vel, laoreet dapibus diam. Nam rhoncus tortor velit.<\\/p>        ","data":{},"blocks":[],"nested":true,"isolated":false,"text":"\\n            Aliquam turpis felis, faucibus non orci vel, laoreet dapibus diam. Nam rhoncus tortor velit.        ","editableHtml":"<div class=\\"ebd-nest\\" data-type=\\"content\\" data-eb-text-block-wrapper=\\"\\"><div data-eb-text-content-wrapper=\\"\\" data-content-type=\\"html\\" contenteditable=\\"true\\">\\n            <p>Aliquam turpis felis, faucibus non orci vel, laoreet dapibus diam. Nam rhoncus tortor velit.<\\/p>        <\\/div><\\/div>"},{"uid":"05163364168256521","type":"buttons","html":"\\n            <a href=\\"javascript:void(0);\\" class=\\"btn btn-default btn-danger\\" rel=\\"\\">\\n    <span><strong data-redactor-tag=\\"strong\\" data-verified=\\"redactor\\">Watch Now<\\/strong><\\/span>\\n<\\/a>        ","data":{"caption":"Button Text","style":"btn-danger","size":"","link":"","nofollow":0,"target":""},"blocks":[],"nested":true,"isolated":false,"text":"","editableHtml":"\\n            <a href=\\"javascript:void(0);\\" class=\\"btn btn-default btn-danger\\" rel=\\"\\">\\n    <span contenteditable=\\"true\\"><strong data-redactor-tag=\\"strong\\" data-verified=\\"redactor\\">Watch Now<\\/strong><\\/span>\\n<\\/a>        "},{"uid":"06734710435848683","type":"video","html":"","data":{"url":"","width":"100%","height":"","ratio":"16:9","autoplay":false,"loop":false,"muted":false},"blocks":[],"nested":true,"isolated":false,"text":"","editableHtml":""},{"uid":"08473397800698876","type":"heading","html":"\\n            <h4>Linkin Park - Masquarade<br><\\/h4>        ","data":{},"blocks":[],"nested":true,"isolated":false,"text":"\\n    \\n        \\n    \\n    \\n        \\n            Linkin Park - Masquarade        \\n        \\n            \\n                \\n            \\n        \\n    \\n    \\n        \\n            \\n                Drag to move block.\\n            \\n        \\n    \\n","editableHtml":"\\n            <h4 contenteditable=\\"true\\">Linkin Park - Masquarade<br><\\/h4>        "},{"uid":"07279896603431553","type":"text","html":"\\n            <p>Aliquam turpis felis, faucibus non orci vel, laoreet dapibus diam. Nam rhoncus tortor velit.<\\/p>        ","data":{},"blocks":[],"nested":true,"isolated":false,"text":"\\n            Aliquam turpis felis, faucibus non orci vel, laoreet dapibus diam. Nam rhoncus tortor velit.        ","editableHtml":"<div class=\\"ebd-nest\\" data-type=\\"content\\" data-eb-text-block-wrapper=\\"\\"><div data-eb-text-content-wrapper=\\"\\" data-content-type=\\"html\\" contenteditable=\\"true\\">\\n            <p>Aliquam turpis felis, faucibus non orci vel, laoreet dapibus diam. Nam rhoncus tortor velit.<\\/p>        <\\/div><\\/div>"},{"uid":"05163364168256521","type":"buttons","html":"\\n            <a href=\\"javascript:void(0);\\" class=\\"btn btn-default btn-danger\\" rel=\\"\\">\\n    <span><strong data-redactor-tag=\\"strong\\" data-verified=\\"redactor\\">Watch Now<\\/strong><\\/span>\\n<\\/a>        ","data":{"caption":"Button Text","style":"btn-danger","size":"","link":"","nofollow":0,"target":""},"blocks":[],"nested":true,"isolated":false,"text":"","editableHtml":"\\n            <a href=\\"javascript:void(0);\\" class=\\"btn btn-default btn-danger\\" rel=\\"\\">\\n    <span contenteditable=\\"true\\"><strong data-redactor-tag=\\"strong\\" data-verified=\\"redactor\\">Watch Now<\\/strong><\\/span>\\n<\\/a>        "}],"nested":false,"isolated":false,"text":"\\n            \\n    \\n        \\n    \\n        \\n    \\n    \\n        \\n            \\n\\n    \\n        \\n        Drop a video file here\\n        Supports 3gp, m4v, mp4, flv, wmv mp3, and webm.\\n\\n        Please upload a supported video file\\n\\n        \\n             Browse Videos        \\n\\n        \\n            \\n                 Upload File            \\n        \\n\\n        \\n    \\n        \\n            \\n        \\n    \\n    \\n        0%\\n        \\n    \\n\\n        \\n    \\n        \\n            \\n            Try Again\\n        \\n    \\n    \\n        \\n        \\n            \\n                \\n            \\n        \\n    \\n    \\n        \\n            \\n                Drag to move block.\\n            \\n        \\n    \\n\\n\\n\\n            \\n        \\n    \\n    \\n        \\n    \\n        \\n    \\n    \\n        \\n            Linkin Park - Masquarade        \\n        \\n            \\n                \\n            \\n        \\n    \\n    \\n        \\n            \\n                Drag to move block.\\n            \\n        \\n    \\n\\n\\n\\n            \\n    \\n        \\n    \\n    \\n        \\n            Aliquam turpis felis, faucibus non orci vel, laoreet dapibus diam. Nam rhoncus tortor velit.        \\n        \\n            \\n                \\n            \\n        \\n    \\n    \\n        \\n            \\n                Drag to move block.\\n            \\n        \\n    \\n\\n\\n\\n    \\n        \\n    \\n    \\n        \\n            \\n    Watch Now\\n        \\n        \\n            \\n                \\n            \\n        \\n    \\n    \\n        \\n            \\n                Drag to move block.\\n            \\n        \\n    \\n\\n\\n\\n        \\n    \\n        ","editableHtml":"\\n            <div class=\\"row\\" data-responsive=\\"400,300,200,100\\">\\n    <div class=\\"col col-md-4\\" data-size=\\"6\\">\\n        <div class=\\"ebd-nest\\" data-type=\\"block\\" data-col-wrapper=\\"\\"><!--block06734710435848683-->\\n\\n\\n            \\n        <\\/div>\\n    <\\/div>\\n    <div class=\\"col col-md-8\\" data-size=\\"6\\">\\n        <div class=\\"ebd-nest\\" data-type=\\"block\\" data-col-wrapper=\\"\\"><!--block08473397800698876-->\\n\\n\\n            <!--block07279896603431553-->\\n\\n<!--block05163364168256521-->\\n\\n\\n        <\\/div>\\n    <\\/div>\\n<\\/div>        "},{"uid":"021494898851960897","type":"rule","html":"\\n            <hr>        ","data":{},"blocks":[],"nested":false,"isolated":false,"text":"","editableHtml":"\\n            <hr>        "},{"uid":"024545535701327026","type":"columns","html":"\\n            <div class=\\"row\\" data-responsive=\\"400,300,200,100\\">\\n    <div class=\\"col col-md-4\\" data-size=\\"6\\">\\n        \\n    <!--block0334950162563473--><\\/div>\\n    <div class=\\"col col-md-8\\" data-size=\\"6\\">\\n        \\n    <!--block04196579670533538--><!--block09463341725058854--><!--block02782213247846812--><\\/div>\\n<\\/div>        ","data":{"columns":[{"size":6,"content":"COM_EASYBLOG_BLOCK_COLUMN_DEFAULT_TITLE"},{"size":6,"content":"COM_EASYBLOG_BLOCK_COLUMN_DEFAULT_TITLE"}]},"blocks":[{"uid":"0334950162563473","type":"video","html":"","data":{"url":"","width":"100%","height":"","ratio":"16:9","autoplay":false,"loop":false,"muted":false},"blocks":[],"nested":true,"isolated":false,"text":"","editableHtml":""},{"uid":"04196579670533538","type":"heading","html":"\\n            <h4>Linkin Park - Mateora<br><\\/h4>        ","data":{},"blocks":[],"nested":true,"isolated":false,"text":"\\n    \\n        \\n    \\n    \\n        \\n            Linkin Park - Mateora        \\n        \\n            \\n                \\n            \\n        \\n    \\n    \\n        \\n            \\n                Drag to move block.\\n            \\n        \\n    \\n","editableHtml":"\\n            <h4 contenteditable=\\"true\\">Linkin Park - Mateora<br><\\/h4>        "},{"uid":"09463341725058854","type":"text","html":"\\n            <p>Aliquam turpis felis, faucibus non orci vel, laoreet dapibus diam. Nam rhoncus tortor velit.<\\/p>        ","data":{},"blocks":[],"nested":true,"isolated":false,"text":"\\n            Aliquam turpis felis, faucibus non orci vel, laoreet dapibus diam. Nam rhoncus tortor velit.        ","editableHtml":"<div class=\\"ebd-nest\\" data-type=\\"content\\" data-eb-text-block-wrapper=\\"\\"><div data-eb-text-content-wrapper=\\"\\" data-content-type=\\"html\\" contenteditable=\\"true\\">\\n            <p>Aliquam turpis felis, faucibus non orci vel, laoreet dapibus diam. Nam rhoncus tortor velit.<\\/p>        <\\/div><\\/div>"},{"uid":"02782213247846812","type":"buttons","html":"\\n            <a href=\\"javascript:void(0);\\" class=\\"btn btn-default btn-danger\\" rel=\\"\\">\\n    <span><strong data-redactor-tag=\\"strong\\" data-verified=\\"redactor\\">Watch Now<\\/strong><\\/span>\\n<\\/a>        ","data":{"caption":"Button Text","style":"btn-danger","size":"","link":"","nofollow":0,"target":""},"blocks":[],"nested":true,"isolated":false,"text":"","editableHtml":"\\n            <a href=\\"javascript:void(0);\\" class=\\"btn btn-default btn-danger\\" rel=\\"\\">\\n    <span contenteditable=\\"true\\"><strong data-redactor-tag=\\"strong\\" data-verified=\\"redactor\\">Watch Now<\\/strong><\\/span>\\n<\\/a>        "},{"uid":"0334950162563473","type":"video","html":"","data":{"url":"","width":"100%","height":"","ratio":"16:9","autoplay":false,"loop":false,"muted":false},"blocks":[],"nested":true,"isolated":false,"text":"","editableHtml":""},{"uid":"04196579670533538","type":"heading","html":"\\n            <h4>Linkin Park - Mateora<br><\\/h4>        ","data":{},"blocks":[],"nested":true,"isolated":false,"text":"\\n    \\n        \\n    \\n    \\n        \\n            Linkin Park - Mateora        \\n        \\n            \\n                \\n            \\n        \\n    \\n    \\n        \\n            \\n                Drag to move block.\\n            \\n        \\n    \\n","editableHtml":"\\n            <h4 contenteditable=\\"true\\">Linkin Park - Mateora<br><\\/h4>        "},{"uid":"09463341725058854","type":"text","html":"\\n            <p>Aliquam turpis felis, faucibus non orci vel, laoreet dapibus diam. Nam rhoncus tortor velit.<\\/p>        ","data":{},"blocks":[],"nested":true,"isolated":false,"text":"\\n            Aliquam turpis felis, faucibus non orci vel, laoreet dapibus diam. Nam rhoncus tortor velit.        ","editableHtml":"<div class=\\"ebd-nest\\" data-type=\\"content\\" data-eb-text-block-wrapper=\\"\\"><div data-eb-text-content-wrapper=\\"\\" data-content-type=\\"html\\" contenteditable=\\"true\\">\\n            <p>Aliquam turpis felis, faucibus non orci vel, laoreet dapibus diam. Nam rhoncus tortor velit.<\\/p>        <\\/div><\\/div>"},{"uid":"02782213247846812","type":"buttons","html":"\\n            <a href=\\"javascript:void(0);\\" class=\\"btn btn-default btn-danger\\" rel=\\"\\">\\n    <span><strong data-redactor-tag=\\"strong\\" data-verified=\\"redactor\\">Watch Now<\\/strong><\\/span>\\n<\\/a>        ","data":{"caption":"Button Text","style":"btn-danger","size":"","link":"","nofollow":0,"target":""},"blocks":[],"nested":true,"isolated":false,"text":"","editableHtml":"\\n            <a href=\\"javascript:void(0);\\" class=\\"btn btn-default btn-danger\\" rel=\\"\\">\\n    <span contenteditable=\\"true\\"><strong data-redactor-tag=\\"strong\\" data-verified=\\"redactor\\">Watch Now<\\/strong><\\/span>\\n<\\/a>        "}],"nested":false,"isolated":false,"text":"\\n            \\n    \\n        \\n    \\n        \\n    \\n    \\n        \\n            \\n\\n    \\n        \\n        Drop a video file here\\n        Supports 3gp, m4v, mp4, flv, wmv mp3, and webm.\\n\\n        Please upload a supported video file\\n\\n        \\n             Browse Videos        \\n\\n        \\n            \\n                 Upload File            \\n        \\n\\n        \\n    \\n        \\n            \\n        \\n    \\n    \\n        0%\\n        \\n    \\n\\n        \\n    \\n        \\n            \\n            Try Again\\n        \\n    \\n    \\n        \\n        \\n            \\n                \\n            \\n        \\n    \\n    \\n        \\n            \\n                Drag to move block.\\n            \\n        \\n    \\n\\n\\n\\n            \\n        \\n    \\n    \\n        \\n    \\n        \\n    \\n    \\n        \\n            Linkin Park - Mateora        \\n        \\n            \\n                \\n            \\n        \\n    \\n    \\n        \\n            \\n                Drag to move block.\\n            \\n        \\n    \\n\\n\\n\\n            \\n    \\n        \\n    \\n    \\n        \\n            Aliquam turpis felis, faucibus non orci vel, laoreet dapibus diam. Nam rhoncus tortor velit.        \\n        \\n            \\n                \\n            \\n        \\n    \\n    \\n        \\n            \\n                Drag to move block.\\n            \\n        \\n    \\n\\n\\n\\n    \\n        \\n    \\n    \\n        \\n            \\n    Watch Now\\n        \\n        \\n            \\n                \\n            \\n        \\n    \\n    \\n        \\n            \\n                Drag to move block.\\n            \\n        \\n    \\n\\n\\n\\n        \\n    \\n        ","editableHtml":"\\n            <div class=\\"row\\" data-responsive=\\"400,300,200,100\\">\\n    <div class=\\"col col-md-4\\" data-size=\\"6\\">\\n        <div class=\\"ebd-nest\\" data-type=\\"block\\" data-col-wrapper=\\"\\"><!--block0334950162563473-->\\n\\n\\n            \\n        <\\/div>\\n    <\\/div>\\n    <div class=\\"col col-md-8\\" data-size=\\"6\\">\\n        <div class=\\"ebd-nest\\" data-type=\\"block\\" data-col-wrapper=\\"\\"><!--block04196579670533538-->\\n\\n\\n            <!--block09463341725058854-->\\n\\n<!--block02782213247846812-->\\n\\n\\n        <\\/div>\\n    <\\/div>\\n<\\/div>        "}]}', '2016-04-14 09:30:14', 1, 1, '/components/com_easyblog/assets/images/template-videos.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_easyblog_ratings`
--

CREATE TABLE IF NOT EXISTS `n1wr9_easyblog_ratings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `sessionid` varchar(200) NOT NULL,
  `value` int(11) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `published` tinyint(3) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `post_id` (`uid`),
  KEY `created_by` (`created_by`),
  KEY `rating` (`value`),
  KEY `idx_uid_type` (`uid`,`type`(64),`value`),
  KEY `idx_uid_type_user` (`uid`,`type`(64),`created_by`),
  KEY `idx_uid_type_user_session` (`created_by`,`sessionid`),
  KEY `idx_uid_type_user_ipaddr` (`uid`,`type`(64),`created_by`,`ip`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_easyblog_reports`
--

CREATE TABLE IF NOT EXISTS `n1wr9_easyblog_reports` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `obj_id` bigint(20) NOT NULL,
  `obj_type` varchar(255) NOT NULL,
  `reason` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `ip` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `obj_id` (`obj_id`,`created_by`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_easyblog_revisions`
--

CREATE TABLE IF NOT EXISTS `n1wr9_easyblog_revisions` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `post_id` bigint(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `created_by` bigint(20) unsigned NOT NULL,
  `content` longtext NOT NULL,
  `state` tinyint(4) NOT NULL DEFAULT '0',
  `ordering` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_postid` (`post_id`),
  KEY `idx_ordering` (`post_id`,`ordering`),
  KEY `idx_revision_state` (`post_id`,`state`),
  KEY `idx_state` (`state`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `n1wr9_easyblog_revisions`
--

INSERT INTO `n1wr9_easyblog_revisions` (`id`, `post_id`, `title`, `created`, `modified`, `created_by`, `content`, `state`, `ordering`) VALUES
(1, 1, 'Initial Post', '2016-04-14 09:30:14', '2016-04-14 09:30:14', 311, '{"id":1,"created_by":"311","created":"2016-04-14 09:30:14","modified":"2016-04-14 09:30:14","title":"You have successfully installed EasyBlog","permalink":"easyblog-installed-successfully","content":"<div class=\\"ebd-block \\" data-type=\\"html\\" ><p><img src=\\"http:\\/\\/stackideas.com\\/images\\/eblog\\/install_success5.png\\">\\n    \\n<\\/p><\\/div><div class=\\"ebd-block \\" data-type=\\"text\\" >With EasyBlog, you can be assured of quality blogging with the following features:<span class=\\"redactor-invisible-space\\">\\u200b<\\/span><\\/div><div class=\\"ebd-block \\" data-type=\\"rule\\" ><hr><\\/div><div class=\\"ebd-block \\" data-type=\\"columns\\" ><div class=\\"row\\" data-responsive=\\"400,300,200,100\\">\\n    <div class=\\"col col-md-4\\" data-size=\\"6\\">\\n        \\n    <div class=\\"ebd-block  is-nested\\" data-type=\\"youtube\\" ><div class=\\"youtube-embed video-embed-wrapper is-responsive\\">\\n    <iframe src=\\"https:\\/\\/www.youtube.com\\/embed\\/f-YEli-NK-w?feature=oembed\\" width=\\"480\\" height=\\"270\\" allowfullscreen><\\/iframe>\\n<\\/div><\\/div><\\/div>\\n    <div class=\\"col col-md-8\\" data-size=\\"6\\">\\n        \\n    <div class=\\"ebd-block  is-nested\\" data-type=\\"heading\\" ><h4>Drag and Drop Blocks<br><br><\\/h4><\\/div><div class=\\"ebd-block  is-nested\\" data-type=\\"text\\" >Add elements to your blog with a simple drag and drop element blocks.<span class=\\"redactor-invisible-space\\">\\u200b<\\/span><\\/div><\\/div>\\n<\\/div><\\/div><div class=\\"ebd-block \\" data-type=\\"rule\\" ><hr><\\/div><div class=\\"ebd-block \\" data-type=\\"columns\\" ><div class=\\"row\\" data-responsive=\\"400,300,200,100\\">\\n    <div class=\\"col col-md-1\\" data-size=\\"6\\">\\n        \\n    <\\/div>\\n    <div class=\\"col col-md-8\\" data-size=\\"6\\">\\n        \\n    <div class=\\"ebd-block  is-nested\\" data-type=\\"heading\\" ><h4>Blog now, post later<br><\\/h4><\\/div><div class=\\"ebd-block  is-nested\\" data-type=\\"text\\" >You can compose a blog now, suffer temporal writer''s block, save and write again, later.<span class=\\"redactor-invisible-space\\">\\u200b<\\/span><\\/div><\\/div>\\n<\\/div><\\/div><div class=\\"ebd-block \\" data-type=\\"columns\\" ><div class=\\"row\\" data-responsive=\\"400,300,200,100\\">\\n    <div class=\\"col col-md-1\\" data-size=\\"6\\">\\n        \\n    <\\/div>\\n    <div class=\\"col col-md-6\\" data-size=\\"6\\">\\n        \\n    <div class=\\"ebd-block  is-nested\\" data-type=\\"heading\\" ><h4><br>Social media sharing<br><\\/h4><\\/div><div class=\\"ebd-block  is-nested\\" data-type=\\"text\\" >Automatically post into your Twitter, Facebook and LinkedIn whenever you create new blog entries.<span class=\\"redactor-invisible-space\\">\\u200b<\\/span><\\/div><\\/div>\\n<\\/div><\\/div><div class=\\"ebd-block \\" data-type=\\"columns\\" ><div class=\\"row\\" data-responsive=\\"400,300,200,100\\">\\n    <div class=\\"col col-md-1\\" data-size=\\"6\\">\\n        \\n    <\\/div>\\n    <div class=\\"col col-md-6\\" data-size=\\"6\\">\\n        \\n    <div class=\\"ebd-block  is-nested\\" data-type=\\"heading\\" ><h4><br>Browse media<br><\\/h4><\\/div><div class=\\"ebd-block  is-nested\\" data-type=\\"text\\" >Embedding images and videos is fast and easy.<span class=\\"redactor-invisible-space\\">\\u200b<\\/span><\\/div><\\/div>\\n<\\/div><\\/div><div class=\\"ebd-block \\" data-type=\\"columns\\" ><div class=\\"row\\" data-responsive=\\"400,300,200,100\\">\\n    <div class=\\"col col-md-1\\" data-size=\\"6\\">\\n        \\n    <\\/div>\\n    <div class=\\"col col-md-6\\" data-size=\\"6\\">\\n        \\n    <div class=\\"ebd-block  is-nested\\" data-type=\\"heading\\" ><h4><br>More third party integrations<br><\\/h4><\\/div><div class=\\"ebd-block  is-nested\\" data-type=\\"text\\" >Having other Joomla! plugins and extensions to work with EasyBlog is just a few clicks away.<span class=\\"redactor-invisible-space\\">\\u200b<\\/span><\\/div><\\/div>\\n<\\/div><\\/div><div class=\\"ebd-block \\" data-type=\\"columns\\" ><div class=\\"row\\" data-responsive=\\"400,300,200,100\\">\\n    <div class=\\"col col-md-1\\" data-size=\\"6\\">\\n        \\n    <\\/div>\\n    <div class=\\"col col-md-6\\" data-size=\\"6\\">\\n        \\n    <div class=\\"ebd-block  is-nested\\" data-type=\\"heading\\" ><h4><br>Blog rating<br><\\/h4><\\/div><div class=\\"ebd-block  is-nested\\" data-type=\\"text\\" >Users can show intensity of their favorite blog post by rating them with stars.<span class=\\"redactor-invisible-space\\">\\u200b<\\/span><\\/div><\\/div>\\n<\\/div><\\/div><div class=\\"ebd-block \\" data-type=\\"rule\\" ><hr><\\/div><div class=\\"ebd-block \\" data-type=\\"text\\" ><p>And many more powerful features that you can use to make your blog work beautifully and professionally. Need any help? Drop by our <a target=\\"_blank\\" class=\\"\\" title=\\"\\" href=\\"http:\\/\\/stackideas.com\\/forums\\/index\\/easyblog\\">Official forum<\\/a> or send our support team a ticket via our <a target=\\"_blank\\" class=\\"\\" title=\\"\\" href=\\"https:\\/\\/crm.stackideas.com\\">CRM<\\/a>. You can even check out <a target=\\"_blank\\" class=\\"\\" title=\\"\\" href=\\"http:\\/\\/stackideas.com\\/docs\\/easyblog\\">EasyBlog''s Documentation<\\/a>.<\\/p><\\/div>","intro":"\\n    \\nWith EasyBlog, you can be assured of quality blogging with the following features:\\u200b\\n    \\n        \\n    \\n    \\n        \\n    Drag and Drop BlocksAdd elements to your blog with a simple drag and drop element blocks.\\u200b\\n\\n    \\n        \\n    \\n    \\n        \\n    Blog now, post laterYou can compose a blog now, suffer temporal writer''s block, save and write...","excerpt":null,"category_id":"1","published":1,"state":0,"publish_up":"2016-04-14 09:30:14","publish_down":"0000-00-00 00:00:00","ordering":null,"vote":null,"hits":null,"access":0,"allowcomment":1,"subscription":1,"frontpage":true,"isnew":false,"blogpassword":null,"latitude":null,"longitude":null,"address":null,"posttype":null,"source_id":0,"source_type":"easyblog.sitewide","robots":null,"copyrights":null,"image":null,"language":null,"locked":null,"ip":"91.144.174.213","doctype":"ebd","document":"{\\"type\\":\\"ebd\\",\\"blocks\\":[{\\"uid\\":\\"07094988151957076\\",\\"type\\":\\"html\\",\\"html\\":\\"<p><img src=\\\\\\"http:\\\\\\/\\\\\\/stackideas.com\\\\\\/images\\\\\\/eblog\\\\\\/install_success5.png\\\\\\">\\\\n    \\\\n<\\\\\\/p>\\",\\"data\\":{},\\"blocks\\":[],\\"nested\\":false,\\"isolated\\":false,\\"text\\":\\"\\\\n    \\\\n\\",\\"editableHtml\\":\\"<p><img src=\\\\\\"http:\\\\\\/\\\\\\/stackideas.com\\\\\\/images\\\\\\/eblog\\\\\\/install_success5.png\\\\\\">\\\\n    \\\\n<\\\\\\/p>\\"},{\\"uid\\":\\"03040071225259453\\",\\"type\\":\\"text\\",\\"html\\":\\"With EasyBlog, you can be assured of quality blogging with the following features:<span class=\\\\\\"redactor-invisible-space\\\\\\">\\\\u200b<\\\\\\/span>\\",\\"data\\":{},\\"blocks\\":[],\\"nested\\":false,\\"isolated\\":false,\\"text\\":\\"With EasyBlog, you can be assured of quality blogging with the following features:\\\\u200b\\",\\"editableHtml\\":\\"<div class=\\\\\\"ebd-nest\\\\\\" data-type=\\\\\\"content\\\\\\" data-eb-text-block-wrapper=\\\\\\"\\\\\\"><div data-content-type=\\\\\\"html\\\\\\" data-eb-text-content-wrapper=\\\\\\"\\\\\\" contenteditable=\\\\\\"true\\\\\\">With EasyBlog, you can be assured of quality blogging with the following features:<span class=\\\\\\"redactor-invisible-space\\\\\\">\\\\u200b<\\\\\\/span><\\\\\\/div><\\\\\\/div>\\"},{\\"uid\\":\\"0346444247988984\\",\\"type\\":\\"rule\\",\\"html\\":\\"\\\\n            <hr>        \\",\\"data\\":{},\\"blocks\\":[],\\"nested\\":false,\\"isolated\\":false,\\"text\\":\\"\\",\\"editableHtml\\":\\"\\\\n            <hr>        \\"},{\\"uid\\":\\"05725746976677328\\",\\"type\\":\\"columns\\",\\"html\\":\\"\\\\n            <div class=\\\\\\"row\\\\\\" data-responsive=\\\\\\"400,300,200,100\\\\\\">\\\\n    <div class=\\\\\\"col col-md-4\\\\\\" data-size=\\\\\\"6\\\\\\">\\\\n        \\\\n    <!--block06016321050556486--><\\\\\\/div>\\\\n    <div class=\\\\\\"col col-md-8\\\\\\" data-size=\\\\\\"6\\\\\\">\\\\n        \\\\n    <!--block029067436303012073--><!--block038569004484452307--><\\\\\\/div>\\\\n<\\\\\\/div>        \\",\\"data\\":{\\"columns\\":[{\\"size\\":6,\\"content\\":\\"COM_EASYBLOG_BLOCK_COLUMN_DEFAULT_TITLE\\"},{\\"size\\":6,\\"content\\":\\"COM_EASYBLOG_BLOCK_COLUMN_DEFAULT_TITLE\\"}]},\\"blocks\\":[{\\"uid\\":\\"06016321050556486\\",\\"type\\":\\"youtube\\",\\"html\\":\\"<iframe src=\\\\\\"https:\\\\\\/\\\\\\/www.youtube.com\\\\\\/embed\\\\\\/f-YEli-NK-w?feature=oembed\\\\\\" allowfullscreen=\\\\\\"\\\\\\" frameborder=\\\\\\"0\\\\\\" height=\\\\\\"270\\\\\\" width=\\\\\\"480\\\\\\"><\\\\\\/iframe>\\",\\"data\\":{\\"author\\":{\\"name\\":\\"StackIdeas\\",\\"url\\":\\"http:\\\\\\/\\\\\\/www.youtube.com\\\\\\/user\\\\\\/stackideas\\"},\\"url\\":\\"https:\\\\\\/\\\\\\/www.youtube.com\\\\\\/watch?v=f-YEli-NK-w\\",\\"width\\":480,\\"height\\":270,\\"fluid\\":true,\\"embed\\":\\"<iframe width=\\\\\\"480\\\\\\" height=\\\\\\"270\\\\\\" src=\\\\\\"https:\\\\\\/\\\\\\/www.youtube.com\\\\\\/embed\\\\\\/f-YEli-NK-w?feature=oembed\\\\\\" frameborder=\\\\\\"0\\\\\\" allowfullscreen><\\\\\\/iframe>\\",\\"source\\":\\"https:\\\\\\/\\\\\\/www.youtube.com\\\\\\/embed\\\\\\/f-YEli-NK-w?feature=oembed\\"},\\"blocks\\":[],\\"nested\\":true,\\"isolated\\":false,\\"text\\":\\"https:\\\\\\/\\\\\\/www.youtube.com\\\\\\/embed\\\\\\/f-YEli-NK-w?feature=oembed\\",\\"editableHtml\\":\\"\\"},{\\"uid\\":\\"029067436303012073\\",\\"type\\":\\"heading\\",\\"html\\":\\"\\\\n            <h4>Drag and Drop Blocks<br><br><\\\\\\/h4>        \\",\\"data\\":{},\\"blocks\\":[],\\"nested\\":true,\\"isolated\\":false,\\"text\\":\\"\\\\n    \\\\n        \\\\n    \\\\n    \\\\n        \\\\n            Drag and Drop Blocks        \\\\n        \\\\n            \\\\n                \\\\n            \\\\n        \\\\n    \\\\n    \\\\n        \\\\n            \\\\n                Drag to move block.\\\\n            \\\\n        \\\\n    \\\\n\\",\\"editableHtml\\":\\"\\\\n            <h4 contenteditable=\\\\\\"true\\\\\\">Drag and Drop Blocks<br><br><\\\\\\/h4>        \\"},{\\"uid\\":\\"038569004484452307\\",\\"type\\":\\"text\\",\\"html\\":\\"Add elements to your blog with a simple drag and drop element blocks.<span class=\\\\\\"redactor-invisible-space\\\\\\">\\\\u200b<\\\\\\/span>\\",\\"data\\":{},\\"blocks\\":[],\\"nested\\":true,\\"isolated\\":false,\\"text\\":\\"Add elements to your blog with a simple drag and drop element blocks.\\\\u200b\\",\\"editableHtml\\":\\"<div class=\\\\\\"ebd-nest\\\\\\" data-type=\\\\\\"content\\\\\\" data-eb-text-block-wrapper=\\\\\\"\\\\\\"><div data-content-type=\\\\\\"html\\\\\\" data-eb-text-content-wrapper=\\\\\\"\\\\\\" contenteditable=\\\\\\"true\\\\\\">Add elements to your blog with a simple drag and drop element blocks.<span class=\\\\\\"redactor-invisible-space\\\\\\">\\\\u200b<\\\\\\/span><\\\\\\/div><\\\\\\/div>\\"},{\\"uid\\":\\"06016321050556486\\",\\"type\\":\\"youtube\\",\\"html\\":\\"<iframe src=\\\\\\"https:\\\\\\/\\\\\\/www.youtube.com\\\\\\/embed\\\\\\/f-YEli-NK-w?feature=oembed\\\\\\" allowfullscreen=\\\\\\"\\\\\\" frameborder=\\\\\\"0\\\\\\" height=\\\\\\"270\\\\\\" width=\\\\\\"480\\\\\\"><\\\\\\/iframe>\\",\\"data\\":{\\"author\\":{\\"name\\":\\"StackIdeas\\",\\"url\\":\\"http:\\\\\\/\\\\\\/www.youtube.com\\\\\\/user\\\\\\/stackideas\\"},\\"url\\":\\"https:\\\\\\/\\\\\\/www.youtube.com\\\\\\/watch?v=f-YEli-NK-w\\",\\"width\\":480,\\"height\\":270,\\"fluid\\":true,\\"embed\\":\\"<iframe width=\\\\\\"480\\\\\\" height=\\\\\\"270\\\\\\" src=\\\\\\"https:\\\\\\/\\\\\\/www.youtube.com\\\\\\/embed\\\\\\/f-YEli-NK-w?feature=oembed\\\\\\" frameborder=\\\\\\"0\\\\\\" allowfullscreen><\\\\\\/iframe>\\",\\"source\\":\\"https:\\\\\\/\\\\\\/www.youtube.com\\\\\\/embed\\\\\\/f-YEli-NK-w?feature=oembed\\"},\\"blocks\\":[],\\"nested\\":true,\\"isolated\\":false,\\"text\\":\\"https:\\\\\\/\\\\\\/www.youtube.com\\\\\\/embed\\\\\\/f-YEli-NK-w?feature=oembed\\",\\"editableHtml\\":\\"\\"},{\\"uid\\":\\"029067436303012073\\",\\"type\\":\\"heading\\",\\"html\\":\\"\\\\n            <h4>Drag and Drop Blocks<br><br><\\\\\\/h4>        \\",\\"data\\":{},\\"blocks\\":[],\\"nested\\":true,\\"isolated\\":false,\\"text\\":\\"\\\\n    \\\\n        \\\\n    \\\\n    \\\\n        \\\\n            Drag and Drop Blocks        \\\\n        \\\\n            \\\\n                \\\\n            \\\\n        \\\\n    \\\\n    \\\\n        \\\\n            \\\\n                Drag to move block.\\\\n            \\\\n        \\\\n    \\\\n\\",\\"editableHtml\\":\\"\\\\n            <h4 contenteditable=\\\\\\"true\\\\\\">Drag and Drop Blocks<br><br><\\\\\\/h4>        \\"},{\\"uid\\":\\"038569004484452307\\",\\"type\\":\\"text\\",\\"html\\":\\"Add elements to your blog with a simple drag and drop element blocks.<span class=\\\\\\"redactor-invisible-space\\\\\\">\\\\u200b<\\\\\\/span>\\",\\"data\\":{},\\"blocks\\":[],\\"nested\\":true,\\"isolated\\":false,\\"text\\":\\"Add elements to your blog with a simple drag and drop element blocks.\\\\u200b\\",\\"editableHtml\\":\\"<div class=\\\\\\"ebd-nest\\\\\\" data-type=\\\\\\"content\\\\\\" data-eb-text-block-wrapper=\\\\\\"\\\\\\"><div data-content-type=\\\\\\"html\\\\\\" data-eb-text-content-wrapper=\\\\\\"\\\\\\" contenteditable=\\\\\\"true\\\\\\">Add elements to your blog with a simple drag and drop element blocks.<span class=\\\\\\"redactor-invisible-space\\\\\\">\\\\u200b<\\\\\\/span><\\\\\\/div><\\\\\\/div>\\"}],\\"nested\\":false,\\"isolated\\":false,\\"text\\":\\"\\\\n            \\\\n    \\\\n        \\\\n    \\\\n        \\\\n    \\\\n    \\\\n        \\\\n        \\\\n            \\\\n                \\\\n            \\\\n        \\\\n    \\\\n    \\\\n        \\\\n            \\\\n                Drag to move block.\\\\n            \\\\n        \\\\n    \\\\n\\\\n\\\\n\\\\n            \\\\n        \\\\n    \\\\n    \\\\n        \\\\n    \\\\n        \\\\n    \\\\n    \\\\n        \\\\n            Drag and Drop Blocks        \\\\n        \\\\n            \\\\n                \\\\n            \\\\n        \\\\n    \\\\n    \\\\n        \\\\n            \\\\n                Drag to move block.\\\\n            \\\\n        \\\\n    \\\\n\\\\n\\\\n\\\\n            \\\\n    \\\\n        \\\\n    \\\\n    \\\\n        Add elements to your blog with a simple drag and drop element blocks.\\\\u200b\\\\n        \\\\n            \\\\n                \\\\n            \\\\n        \\\\n    \\\\n    \\\\n        \\\\n            \\\\n                Drag to move block.\\\\n            \\\\n        \\\\n    \\\\n\\\\n\\\\n\\\\n\\\\n\\\\n        \\\\n    \\\\n        \\",\\"editableHtml\\":\\"\\\\n            <div class=\\\\\\"row\\\\\\" data-responsive=\\\\\\"400,300,200,100\\\\\\">\\\\n    <div class=\\\\\\"col col-md-4\\\\\\" data-size=\\\\\\"6\\\\\\">\\\\n        <div class=\\\\\\"ebd-nest\\\\\\" data-type=\\\\\\"block\\\\\\" data-col-wrapper=\\\\\\"\\\\\\"><!--block06016321050556486-->\\\\n\\\\n\\\\n            \\\\n        <\\\\\\/div>\\\\n    <\\\\\\/div>\\\\n    <div class=\\\\\\"col col-md-8\\\\\\" data-size=\\\\\\"6\\\\\\">\\\\n        <div class=\\\\\\"ebd-nest\\\\\\" data-type=\\\\\\"block\\\\\\" data-col-wrapper=\\\\\\"\\\\\\"><!--block029067436303012073-->\\\\n\\\\n\\\\n            <!--block038569004484452307-->\\\\n\\\\n\\\\n\\\\n\\\\n        <\\\\\\/div>\\\\n    <\\\\\\/div>\\\\n<\\\\\\/div>        \\"},{\\"uid\\":\\"026837448799051344\\",\\"type\\":\\"rule\\",\\"html\\":\\"\\\\n            <hr>        \\",\\"data\\":{},\\"blocks\\":[],\\"nested\\":false,\\"isolated\\":false,\\"text\\":\\"\\",\\"editableHtml\\":\\"\\\\n            <hr>        \\"},{\\"uid\\":\\"0046830407343804836\\",\\"type\\":\\"columns\\",\\"html\\":\\"\\\\n            <div class=\\\\\\"row\\\\\\" data-responsive=\\\\\\"400,300,200,100\\\\\\">\\\\n    <div class=\\\\\\"col col-md-1\\\\\\" data-size=\\\\\\"6\\\\\\">\\\\n        \\\\n    <\\\\\\/div>\\\\n    <div class=\\\\\\"col col-md-8\\\\\\" data-size=\\\\\\"6\\\\\\">\\\\n        \\\\n    <!--block08473397800698876--><!--block07279896603431553--><\\\\\\/div>\\\\n<\\\\\\/div>        \\",\\"data\\":{\\"columns\\":[{\\"size\\":6,\\"content\\":\\"COM_EASYBLOG_BLOCK_COLUMN_DEFAULT_TITLE\\"},{\\"size\\":6,\\"content\\":\\"COM_EASYBLOG_BLOCK_COLUMN_DEFAULT_TITLE\\"}]},\\"blocks\\":[{\\"uid\\":\\"08473397800698876\\",\\"type\\":\\"heading\\",\\"html\\":\\"\\\\n            <h4>Blog now, post later<br><\\\\\\/h4>        \\",\\"data\\":{},\\"blocks\\":[],\\"nested\\":true,\\"isolated\\":false,\\"text\\":\\"\\\\n    \\\\n        \\\\n    \\\\n    \\\\n        \\\\n            Blog now, post later        \\\\n        \\\\n            \\\\n                \\\\n            \\\\n        \\\\n    \\\\n    \\\\n        \\\\n            \\\\n                Drag to move block.\\\\n            \\\\n        \\\\n    \\\\n\\",\\"editableHtml\\":\\"\\\\n            <h4 contenteditable=\\\\\\"true\\\\\\">Blog now, post later<br><\\\\\\/h4>        \\"},{\\"uid\\":\\"07279896603431553\\",\\"type\\":\\"text\\",\\"html\\":\\"You can compose a blog now, suffer temporal writer''s block, save and write again, later.<span class=\\\\\\"redactor-invisible-space\\\\\\">\\\\u200b<\\\\\\/span>\\",\\"data\\":{},\\"blocks\\":[],\\"nested\\":true,\\"isolated\\":false,\\"text\\":\\"You can compose a blog now, suffer temporal writer''s block, save and write again, later.\\\\u200b\\",\\"editableHtml\\":\\"<div class=\\\\\\"ebd-nest\\\\\\" data-type=\\\\\\"content\\\\\\" data-eb-text-block-wrapper=\\\\\\"\\\\\\"><div data-content-type=\\\\\\"html\\\\\\" data-eb-text-content-wrapper=\\\\\\"\\\\\\" contenteditable=\\\\\\"true\\\\\\">You can compose a blog now, suffer temporal writer''s block, save and write again, later.<span class=\\\\\\"redactor-invisible-space\\\\\\">\\\\u200b<\\\\\\/span><\\\\\\/div><\\\\\\/div>\\"},{\\"uid\\":\\"08473397800698876\\",\\"type\\":\\"heading\\",\\"html\\":\\"\\\\n            <h4>Blog now, post later<br><\\\\\\/h4>        \\",\\"data\\":{},\\"blocks\\":[],\\"nested\\":true,\\"isolated\\":false,\\"text\\":\\"\\\\n    \\\\n        \\\\n    \\\\n    \\\\n        \\\\n            Blog now, post later        \\\\n        \\\\n            \\\\n                \\\\n            \\\\n        \\\\n    \\\\n    \\\\n        \\\\n            \\\\n                Drag to move block.\\\\n            \\\\n        \\\\n    \\\\n\\",\\"editableHtml\\":\\"\\\\n            <h4 contenteditable=\\\\\\"true\\\\\\">Blog now, post later<br><\\\\\\/h4>        \\"},{\\"uid\\":\\"07279896603431553\\",\\"type\\":\\"text\\",\\"html\\":\\"You can compose a blog now, suffer temporal writer''s block, save and write again, later.<span class=\\\\\\"redactor-invisible-space\\\\\\">\\\\u200b<\\\\\\/span>\\",\\"data\\":{},\\"blocks\\":[],\\"nested\\":true,\\"isolated\\":false,\\"text\\":\\"You can compose a blog now, suffer temporal writer''s block, save and write again, later.\\\\u200b\\",\\"editableHtml\\":\\"<div class=\\\\\\"ebd-nest\\\\\\" data-type=\\\\\\"content\\\\\\" data-eb-text-block-wrapper=\\\\\\"\\\\\\"><div data-content-type=\\\\\\"html\\\\\\" data-eb-text-content-wrapper=\\\\\\"\\\\\\" contenteditable=\\\\\\"true\\\\\\">You can compose a blog now, suffer temporal writer''s block, save and write again, later.<span class=\\\\\\"redactor-invisible-space\\\\\\">\\\\u200b<\\\\\\/span><\\\\\\/div><\\\\\\/div>\\"}],\\"nested\\":false,\\"isolated\\":false,\\"text\\":\\"\\\\n            \\\\n    \\\\n        \\\\n\\\\n\\\\n            \\\\n        \\\\n    \\\\n    \\\\n        \\\\n    \\\\n        \\\\n    \\\\n    \\\\n        \\\\n            Blog now, post later        \\\\n        \\\\n            \\\\n                \\\\n            \\\\n        \\\\n    \\\\n    \\\\n        \\\\n            \\\\n                Drag to move block.\\\\n            \\\\n        \\\\n    \\\\n\\\\n\\\\n\\\\n            \\\\n    \\\\n        \\\\n    \\\\n    \\\\n        You can compose a blog now, suffer temporal writer''s block, save and write again, later.\\\\u200b\\\\n        \\\\n            \\\\n                \\\\n            \\\\n        \\\\n    \\\\n    \\\\n        \\\\n            \\\\n                Drag to move block.\\\\n            \\\\n        \\\\n    \\\\n\\\\n\\\\n\\\\n\\\\n\\\\n        \\\\n    \\\\n        \\",\\"editableHtml\\":\\"\\\\n            <div class=\\\\\\"row\\\\\\" data-responsive=\\\\\\"400,300,200,100\\\\\\">\\\\n    <div class=\\\\\\"col col-md-1\\\\\\" data-size=\\\\\\"6\\\\\\">\\\\n        <div class=\\\\\\"ebd-nest\\\\\\" data-type=\\\\\\"block\\\\\\" data-col-wrapper=\\\\\\"\\\\\\">\\\\n\\\\n\\\\n            \\\\n        <\\\\\\/div>\\\\n    <\\\\\\/div>\\\\n    <div class=\\\\\\"col col-md-8\\\\\\" data-size=\\\\\\"6\\\\\\">\\\\n        <div class=\\\\\\"ebd-nest\\\\\\" data-type=\\\\\\"block\\\\\\" data-col-wrapper=\\\\\\"\\\\\\"><!--block08473397800698876-->\\\\n\\\\n\\\\n            <!--block07279896603431553-->\\\\n\\\\n\\\\n\\\\n\\\\n        <\\\\\\/div>\\\\n    <\\\\\\/div>\\\\n<\\\\\\/div>        \\"},{\\"uid\\":\\"034305927456222685\\",\\"type\\":\\"columns\\",\\"html\\":\\"\\\\n            <div class=\\\\\\"row\\\\\\" data-responsive=\\\\\\"400,300,200,100\\\\\\">\\\\n    <div class=\\\\\\"col col-md-1\\\\\\" data-size=\\\\\\"6\\\\\\">\\\\n        \\\\n    <\\\\\\/div>\\\\n    <div class=\\\\\\"col col-md-6\\\\\\" data-size=\\\\\\"6\\\\\\">\\\\n        \\\\n    <!--block09808841066849929--><!--block036551126970772363--><\\\\\\/div>\\\\n<\\\\\\/div>        \\",\\"data\\":{\\"columns\\":[{\\"size\\":6,\\"content\\":\\"COM_EASYBLOG_BLOCK_COLUMN_DEFAULT_TITLE\\"},{\\"size\\":6,\\"content\\":\\"COM_EASYBLOG_BLOCK_COLUMN_DEFAULT_TITLE\\"}]},\\"blocks\\":[{\\"uid\\":\\"09808841066849929\\",\\"type\\":\\"heading\\",\\"html\\":\\"<h4><br>Social media sharing<br><\\\\\\/h4>\\",\\"data\\":{},\\"blocks\\":[],\\"nested\\":true,\\"isolated\\":false,\\"text\\":\\"\\\\n    \\\\n        \\\\n    \\\\n    \\\\n        Social media sharing\\\\n        \\\\n            \\\\n                \\\\n            \\\\n        \\\\n    \\\\n    \\\\n        \\\\n            \\\\n                Drag to move block.\\\\n            \\\\n        \\\\n    \\\\n\\",\\"editableHtml\\":\\"<h4 contenteditable=\\\\\\"true\\\\\\"><br>Social media sharing<br><\\\\\\/h4>\\"},{\\"uid\\":\\"036551126970772363\\",\\"type\\":\\"text\\",\\"html\\":\\"Automatically post into your Twitter, Facebook and LinkedIn whenever you create new blog entries.<span class=\\\\\\"redactor-invisible-space\\\\\\">\\\\u200b<\\\\\\/span>\\",\\"data\\":{},\\"blocks\\":[],\\"nested\\":true,\\"isolated\\":false,\\"text\\":\\"Automatically post into your Twitter, Facebook and LinkedIn whenever you create new blog entries.\\\\u200b\\",\\"editableHtml\\":\\"<div class=\\\\\\"ebd-nest\\\\\\" data-type=\\\\\\"content\\\\\\" data-eb-text-block-wrapper=\\\\\\"\\\\\\"><div data-content-type=\\\\\\"html\\\\\\" data-eb-text-content-wrapper=\\\\\\"\\\\\\" contenteditable=\\\\\\"true\\\\\\">Automatically post into your Twitter, Facebook and LinkedIn whenever you create new blog entries.<span class=\\\\\\"redactor-invisible-space\\\\\\">\\\\u200b<\\\\\\/span><\\\\\\/div><\\\\\\/div>\\"},{\\"uid\\":\\"09808841066849929\\",\\"type\\":\\"heading\\",\\"html\\":\\"<h4><br>Social media sharing<br><\\\\\\/h4>\\",\\"data\\":{},\\"blocks\\":[],\\"nested\\":true,\\"isolated\\":false,\\"text\\":\\"\\\\n    \\\\n        \\\\n    \\\\n    \\\\n        Social media sharing\\\\n        \\\\n            \\\\n                \\\\n            \\\\n        \\\\n    \\\\n    \\\\n        \\\\n            \\\\n                Drag to move block.\\\\n            \\\\n        \\\\n    \\\\n\\",\\"editableHtml\\":\\"<h4 contenteditable=\\\\\\"true\\\\\\"><br>Social media sharing<br><\\\\\\/h4>\\"},{\\"uid\\":\\"036551126970772363\\",\\"type\\":\\"text\\",\\"html\\":\\"Automatically post into your Twitter, Facebook and LinkedIn whenever you create new blog entries.<span class=\\\\\\"redactor-invisible-space\\\\\\">\\\\u200b<\\\\\\/span>\\",\\"data\\":{},\\"blocks\\":[],\\"nested\\":true,\\"isolated\\":false,\\"text\\":\\"Automatically post into your Twitter, Facebook and LinkedIn whenever you create new blog entries.\\\\u200b\\",\\"editableHtml\\":\\"<div class=\\\\\\"ebd-nest\\\\\\" data-type=\\\\\\"content\\\\\\" data-eb-text-block-wrapper=\\\\\\"\\\\\\"><div data-content-type=\\\\\\"html\\\\\\" data-eb-text-content-wrapper=\\\\\\"\\\\\\" contenteditable=\\\\\\"true\\\\\\">Automatically post into your Twitter, Facebook and LinkedIn whenever you create new blog entries.<span class=\\\\\\"redactor-invisible-space\\\\\\">\\\\u200b<\\\\\\/span><\\\\\\/div><\\\\\\/div>\\"}],\\"nested\\":false,\\"isolated\\":false,\\"text\\":\\"\\\\n            \\\\n    \\\\n        \\\\n            \\\\n        \\\\n    \\\\n    \\\\n        \\\\n    \\\\n        \\\\n    \\\\n    \\\\n        Social media sharing\\\\n        \\\\n            \\\\n                \\\\n            \\\\n        \\\\n    \\\\n    \\\\n        \\\\n            \\\\n                Drag to move block.\\\\n            \\\\n        \\\\n    \\\\n\\\\n            \\\\n    \\\\n        \\\\n    \\\\n    \\\\n        Automatically post into your Twitter, Facebook and LinkedIn whenever you create new blog entries.\\\\u200b\\\\n        \\\\n            \\\\n                \\\\n            \\\\n        \\\\n    \\\\n    \\\\n        \\\\n            \\\\n                Drag to move block.\\\\n            \\\\n        \\\\n    \\\\n\\\\n        \\\\n    \\\\n        \\",\\"editableHtml\\":\\"\\\\n            <div class=\\\\\\"row\\\\\\" data-responsive=\\\\\\"400,300,200,100\\\\\\">\\\\n    <div class=\\\\\\"col col-md-1\\\\\\" data-size=\\\\\\"6\\\\\\">\\\\n        <div class=\\\\\\"ebd-nest\\\\\\" data-type=\\\\\\"block\\\\\\" data-col-wrapper=\\\\\\"\\\\\\">\\\\n            \\\\n        <\\\\\\/div>\\\\n    <\\\\\\/div>\\\\n    <div class=\\\\\\"col col-md-6\\\\\\" data-size=\\\\\\"6\\\\\\">\\\\n        <div class=\\\\\\"ebd-nest\\\\\\" data-type=\\\\\\"block\\\\\\" data-col-wrapper=\\\\\\"\\\\\\"><!--block09808841066849929-->\\\\n            <!--block036551126970772363-->\\\\n        <\\\\\\/div>\\\\n    <\\\\\\/div>\\\\n<\\\\\\/div>        \\"},{\\"uid\\":\\"04238469158738458\\",\\"type\\":\\"columns\\",\\"html\\":\\"\\\\n            <div class=\\\\\\"row\\\\\\" data-responsive=\\\\\\"400,300,200,100\\\\\\">\\\\n    <div class=\\\\\\"col col-md-1\\\\\\" data-size=\\\\\\"6\\\\\\">\\\\n        \\\\n    <\\\\\\/div>\\\\n    <div class=\\\\\\"col col-md-6\\\\\\" data-size=\\\\\\"6\\\\\\">\\\\n        \\\\n    <!--block039449238301486433--><!--block0558766089683463--><\\\\\\/div>\\\\n<\\\\\\/div>        \\",\\"data\\":{\\"columns\\":[{\\"size\\":6,\\"content\\":\\"COM_EASYBLOG_BLOCK_COLUMN_DEFAULT_TITLE\\"},{\\"size\\":6,\\"content\\":\\"COM_EASYBLOG_BLOCK_COLUMN_DEFAULT_TITLE\\"}]},\\"blocks\\":[{\\"uid\\":\\"039449238301486433\\",\\"type\\":\\"heading\\",\\"html\\":\\"<h4><br>Browse media<br><\\\\\\/h4>\\",\\"data\\":{},\\"blocks\\":[],\\"nested\\":true,\\"isolated\\":false,\\"text\\":\\"\\\\n    \\\\n        \\\\n    \\\\n    \\\\n        Browse media\\\\n        \\\\n            \\\\n                \\\\n            \\\\n        \\\\n    \\\\n    \\\\n        \\\\n            \\\\n                Drag to move block.\\\\n            \\\\n        \\\\n    \\\\n\\",\\"editableHtml\\":\\"<h4 contenteditable=\\\\\\"true\\\\\\"><br>Browse media<br><\\\\\\/h4>\\"},{\\"uid\\":\\"0558766089683463\\",\\"type\\":\\"text\\",\\"html\\":\\"Embedding images and videos is fast and easy.<span class=\\\\\\"redactor-invisible-space\\\\\\">\\\\u200b<\\\\\\/span>\\",\\"data\\":{},\\"blocks\\":[],\\"nested\\":true,\\"isolated\\":false,\\"text\\":\\"Embedding images and videos is fast and easy.\\\\u200b\\",\\"editableHtml\\":\\"<div class=\\\\\\"ebd-nest\\\\\\" data-type=\\\\\\"content\\\\\\" data-eb-text-block-wrapper=\\\\\\"\\\\\\"><div data-content-type=\\\\\\"html\\\\\\" data-eb-text-content-wrapper=\\\\\\"\\\\\\" contenteditable=\\\\\\"true\\\\\\">Embedding images and videos is fast and easy.<span class=\\\\\\"redactor-invisible-space\\\\\\">\\\\u200b<\\\\\\/span><\\\\\\/div><\\\\\\/div>\\"},{\\"uid\\":\\"039449238301486433\\",\\"type\\":\\"heading\\",\\"html\\":\\"<h4><br>Browse media<br><\\\\\\/h4>\\",\\"data\\":{},\\"blocks\\":[],\\"nested\\":true,\\"isolated\\":false,\\"text\\":\\"\\\\n    \\\\n        \\\\n    \\\\n    \\\\n        Browse media\\\\n        \\\\n            \\\\n                \\\\n            \\\\n        \\\\n    \\\\n    \\\\n        \\\\n            \\\\n                Drag to move block.\\\\n            \\\\n        \\\\n    \\\\n\\",\\"editableHtml\\":\\"<h4 contenteditable=\\\\\\"true\\\\\\"><br>Browse media<br><\\\\\\/h4>\\"},{\\"uid\\":\\"0558766089683463\\",\\"type\\":\\"text\\",\\"html\\":\\"Embedding images and videos is fast and easy.<span class=\\\\\\"redactor-invisible-space\\\\\\">\\\\u200b<\\\\\\/span>\\",\\"data\\":{},\\"blocks\\":[],\\"nested\\":true,\\"isolated\\":false,\\"text\\":\\"Embedding images and videos is fast and easy.\\\\u200b\\",\\"editableHtml\\":\\"<div class=\\\\\\"ebd-nest\\\\\\" data-type=\\\\\\"content\\\\\\" data-eb-text-block-wrapper=\\\\\\"\\\\\\"><div data-content-type=\\\\\\"html\\\\\\" data-eb-text-content-wrapper=\\\\\\"\\\\\\" contenteditable=\\\\\\"true\\\\\\">Embedding images and videos is fast and easy.<span class=\\\\\\"redactor-invisible-space\\\\\\">\\\\u200b<\\\\\\/span><\\\\\\/div><\\\\\\/div>\\"}],\\"nested\\":false,\\"isolated\\":false,\\"text\\":\\"\\\\n            \\\\n    \\\\n        \\\\n            \\\\n        \\\\n    \\\\n    \\\\n        \\\\n    \\\\n        \\\\n    \\\\n    \\\\n        Browse media\\\\n        \\\\n            \\\\n                \\\\n            \\\\n        \\\\n    \\\\n    \\\\n        \\\\n            \\\\n                Drag to move block.\\\\n            \\\\n        \\\\n    \\\\n\\\\n            \\\\n    \\\\n        \\\\n    \\\\n    \\\\n        Embedding images and videos is fast and easy.\\\\u200b\\\\n        \\\\n            \\\\n                \\\\n            \\\\n        \\\\n    \\\\n    \\\\n        \\\\n            \\\\n                Drag to move block.\\\\n            \\\\n        \\\\n    \\\\n\\\\n        \\\\n    \\\\n        \\",\\"editableHtml\\":\\"\\\\n            <div class=\\\\\\"row\\\\\\" data-responsive=\\\\\\"400,300,200,100\\\\\\">\\\\n    <div class=\\\\\\"col col-md-1\\\\\\" data-size=\\\\\\"6\\\\\\">\\\\n        <div class=\\\\\\"ebd-nest\\\\\\" data-type=\\\\\\"block\\\\\\" data-col-wrapper=\\\\\\"\\\\\\">\\\\n            \\\\n        <\\\\\\/div>\\\\n    <\\\\\\/div>\\\\n    <div class=\\\\\\"col col-md-6\\\\\\" data-size=\\\\\\"6\\\\\\">\\\\n        <div class=\\\\\\"ebd-nest\\\\\\" data-type=\\\\\\"block\\\\\\" data-col-wrapper=\\\\\\"\\\\\\"><!--block039449238301486433-->\\\\n            <!--block0558766089683463-->\\\\n        <\\\\\\/div>\\\\n    <\\\\\\/div>\\\\n<\\\\\\/div>        \\"},{\\"uid\\":\\"0048939211996886\\",\\"type\\":\\"columns\\",\\"html\\":\\"\\\\n            <div class=\\\\\\"row\\\\\\" data-responsive=\\\\\\"400,300,200,100\\\\\\">\\\\n    <div class=\\\\\\"col col-md-1\\\\\\" data-size=\\\\\\"6\\\\\\">\\\\n        \\\\n    <\\\\\\/div>\\\\n    <div class=\\\\\\"col col-md-6\\\\\\" data-size=\\\\\\"6\\\\\\">\\\\n        \\\\n    <!--block03671041092431052--><!--block018677022024891388--><\\\\\\/div>\\\\n<\\\\\\/div>        \\",\\"data\\":{\\"columns\\":[{\\"size\\":6,\\"content\\":\\"COM_EASYBLOG_BLOCK_COLUMN_DEFAULT_TITLE\\"},{\\"size\\":6,\\"content\\":\\"COM_EASYBLOG_BLOCK_COLUMN_DEFAULT_TITLE\\"}]},\\"blocks\\":[{\\"uid\\":\\"03671041092431052\\",\\"type\\":\\"heading\\",\\"html\\":\\"<h4><br>More third party integrations<br><\\\\\\/h4>\\",\\"data\\":{},\\"blocks\\":[],\\"nested\\":true,\\"isolated\\":false,\\"text\\":\\"\\\\n    \\\\n        \\\\n    \\\\n    \\\\n        More third party integrations\\\\n        \\\\n            \\\\n                \\\\n            \\\\n        \\\\n    \\\\n    \\\\n        \\\\n            \\\\n                Drag to move block.\\\\n            \\\\n        \\\\n    \\\\n\\",\\"editableHtml\\":\\"<h4 contenteditable=\\\\\\"true\\\\\\"><br>More third party integrations<br><\\\\\\/h4>\\"},{\\"uid\\":\\"018677022024891388\\",\\"type\\":\\"text\\",\\"html\\":\\"Having other Joomla! plugins and extensions to work with EasyBlog is just a few clicks away.<span class=\\\\\\"redactor-invisible-space\\\\\\">\\\\u200b<\\\\\\/span>\\",\\"data\\":{},\\"blocks\\":[],\\"nested\\":true,\\"isolated\\":false,\\"text\\":\\"Having other Joomla! plugins and extensions to work with EasyBlog is just a few clicks away.\\\\u200b\\",\\"editableHtml\\":\\"<div class=\\\\\\"ebd-nest\\\\\\" data-type=\\\\\\"content\\\\\\" data-eb-text-block-wrapper=\\\\\\"\\\\\\"><div data-content-type=\\\\\\"html\\\\\\" data-eb-text-content-wrapper=\\\\\\"\\\\\\" contenteditable=\\\\\\"true\\\\\\">Having other Joomla! plugins and extensions to work with EasyBlog is just a few clicks away.<span class=\\\\\\"redactor-invisible-space\\\\\\">\\\\u200b<\\\\\\/span><\\\\\\/div><\\\\\\/div>\\"},{\\"uid\\":\\"03671041092431052\\",\\"type\\":\\"heading\\",\\"html\\":\\"<h4><br>More third party integrations<br><\\\\\\/h4>\\",\\"data\\":{},\\"blocks\\":[],\\"nested\\":true,\\"isolated\\":false,\\"text\\":\\"\\\\n    \\\\n        \\\\n    \\\\n    \\\\n        More third party integrations\\\\n        \\\\n            \\\\n                \\\\n            \\\\n        \\\\n    \\\\n    \\\\n        \\\\n            \\\\n                Drag to move block.\\\\n            \\\\n        \\\\n    \\\\n\\",\\"editableHtml\\":\\"<h4 contenteditable=\\\\\\"true\\\\\\"><br>More third party integrations<br><\\\\\\/h4>\\"},{\\"uid\\":\\"018677022024891388\\",\\"type\\":\\"text\\",\\"html\\":\\"Having other Joomla! plugins and extensions to work with EasyBlog is just a few clicks away.<span class=\\\\\\"redactor-invisible-space\\\\\\">\\\\u200b<\\\\\\/span>\\",\\"data\\":{},\\"blocks\\":[],\\"nested\\":true,\\"isolated\\":false,\\"text\\":\\"Having other Joomla! plugins and extensions to work with EasyBlog is just a few clicks away.\\\\u200b\\",\\"editableHtml\\":\\"<div class=\\\\\\"ebd-nest\\\\\\" data-type=\\\\\\"content\\\\\\" data-eb-text-block-wrapper=\\\\\\"\\\\\\"><div data-content-type=\\\\\\"html\\\\\\" data-eb-text-content-wrapper=\\\\\\"\\\\\\" contenteditable=\\\\\\"true\\\\\\">Having other Joomla! plugins and extensions to work with EasyBlog is just a few clicks away.<span class=\\\\\\"redactor-invisible-space\\\\\\">\\\\u200b<\\\\\\/span><\\\\\\/div><\\\\\\/div>\\"}],\\"nested\\":false,\\"isolated\\":false,\\"text\\":\\"\\\\n            \\\\n    \\\\n        \\\\n            \\\\n        \\\\n    \\\\n    \\\\n        \\\\n    \\\\n        \\\\n    \\\\n    \\\\n        More third party integrations\\\\n        \\\\n            \\\\n                \\\\n            \\\\n        \\\\n    \\\\n    \\\\n        \\\\n            \\\\n                Drag to move block.\\\\n            \\\\n        \\\\n    \\\\n\\\\n            \\\\n    \\\\n        \\\\n    \\\\n    \\\\n        Having other Joomla! plugins and extensions to work with EasyBlog is just a few clicks away.\\\\u200b\\\\n        \\\\n            \\\\n                \\\\n            \\\\n        \\\\n    \\\\n    \\\\n        \\\\n            \\\\n                Drag to move block.\\\\n            \\\\n        \\\\n    \\\\n\\\\n        \\\\n    \\\\n        \\",\\"editableHtml\\":\\"\\\\n            <div class=\\\\\\"row\\\\\\" data-responsive=\\\\\\"400,300,200,100\\\\\\">\\\\n    <div class=\\\\\\"col col-md-1\\\\\\" data-size=\\\\\\"6\\\\\\">\\\\n        <div class=\\\\\\"ebd-nest\\\\\\" data-type=\\\\\\"block\\\\\\" data-col-wrapper=\\\\\\"\\\\\\">\\\\n            \\\\n        <\\\\\\/div>\\\\n    <\\\\\\/div>\\\\n    <div class=\\\\\\"col col-md-6\\\\\\" data-size=\\\\\\"6\\\\\\">\\\\n        <div class=\\\\\\"ebd-nest\\\\\\" data-type=\\\\\\"block\\\\\\" data-col-wrapper=\\\\\\"\\\\\\"><!--block03671041092431052-->\\\\n            <!--block018677022024891388-->\\\\n        <\\\\\\/div>\\\\n    <\\\\\\/div>\\\\n<\\\\\\/div>        \\"},{\\"uid\\":\\"0680012258160072\\",\\"type\\":\\"columns\\",\\"html\\":\\"\\\\n            <div class=\\\\\\"row\\\\\\" data-responsive=\\\\\\"400,300,200,100\\\\\\">\\\\n    <div class=\\\\\\"col col-md-1\\\\\\" data-size=\\\\\\"6\\\\\\">\\\\n        \\\\n    <\\\\\\/div>\\\\n    <div class=\\\\\\"col col-md-6\\\\\\" data-size=\\\\\\"6\\\\\\">\\\\n        \\\\n    <!--block09070874272077539--><!--block002974416423671611--><\\\\\\/div>\\\\n<\\\\\\/div>        \\",\\"data\\":{\\"columns\\":[{\\"size\\":6,\\"content\\":\\"COM_EASYBLOG_BLOCK_COLUMN_DEFAULT_TITLE\\"},{\\"size\\":6,\\"content\\":\\"COM_EASYBLOG_BLOCK_COLUMN_DEFAULT_TITLE\\"}]},\\"blocks\\":[{\\"uid\\":\\"09070874272077539\\",\\"type\\":\\"heading\\",\\"html\\":\\"<h4><br>Blog rating<br><\\\\\\/h4>\\",\\"data\\":{},\\"blocks\\":[],\\"nested\\":true,\\"isolated\\":false,\\"text\\":\\"\\\\n    \\\\n        \\\\n    \\\\n    \\\\n        Blog rating\\\\n        \\\\n            \\\\n                \\\\n            \\\\n        \\\\n    \\\\n    \\\\n        \\\\n            \\\\n                Drag to move block.\\\\n            \\\\n        \\\\n    \\\\n\\",\\"editableHtml\\":\\"<h4 contenteditable=\\\\\\"true\\\\\\"><br>Blog rating<br><\\\\\\/h4>\\"},{\\"uid\\":\\"002974416423671611\\",\\"type\\":\\"text\\",\\"html\\":\\"Users can show intensity of their favorite blog post by rating them with stars.<span class=\\\\\\"redactor-invisible-space\\\\\\">\\\\u200b<\\\\\\/span>\\",\\"data\\":{},\\"blocks\\":[],\\"nested\\":true,\\"isolated\\":false,\\"text\\":\\"Users can show intensity of their favorite blog post by rating them with stars.\\\\u200b\\",\\"editableHtml\\":\\"<div class=\\\\\\"ebd-nest\\\\\\" data-type=\\\\\\"content\\\\\\" data-eb-text-block-wrapper=\\\\\\"\\\\\\"><div data-content-type=\\\\\\"html\\\\\\" data-eb-text-content-wrapper=\\\\\\"\\\\\\" contenteditable=\\\\\\"true\\\\\\">Users can show intensity of their favorite blog post by rating them with stars.<span class=\\\\\\"redactor-invisible-space\\\\\\">\\\\u200b<\\\\\\/span><\\\\\\/div><\\\\\\/div>\\"},{\\"uid\\":\\"09070874272077539\\",\\"type\\":\\"heading\\",\\"html\\":\\"<h4><br>Blog rating<br><\\\\\\/h4>\\",\\"data\\":{},\\"blocks\\":[],\\"nested\\":true,\\"isolated\\":false,\\"text\\":\\"\\\\n    \\\\n        \\\\n    \\\\n    \\\\n        Blog rating\\\\n        \\\\n            \\\\n                \\\\n            \\\\n        \\\\n    \\\\n    \\\\n        \\\\n            \\\\n                Drag to move block.\\\\n            \\\\n        \\\\n    \\\\n\\",\\"editableHtml\\":\\"<h4 contenteditable=\\\\\\"true\\\\\\"><br>Blog rating<br><\\\\\\/h4>\\"},{\\"uid\\":\\"002974416423671611\\",\\"type\\":\\"text\\",\\"html\\":\\"Users can show intensity of their favorite blog post by rating them with stars.<span class=\\\\\\"redactor-invisible-space\\\\\\">\\\\u200b<\\\\\\/span>\\",\\"data\\":{},\\"blocks\\":[],\\"nested\\":true,\\"isolated\\":false,\\"text\\":\\"Users can show intensity of their favorite blog post by rating them with stars.\\\\u200b\\",\\"editableHtml\\":\\"<div class=\\\\\\"ebd-nest\\\\\\" data-type=\\\\\\"content\\\\\\" data-eb-text-block-wrapper=\\\\\\"\\\\\\"><div data-content-type=\\\\\\"html\\\\\\" data-eb-text-content-wrapper=\\\\\\"\\\\\\" contenteditable=\\\\\\"true\\\\\\">Users can show intensity of their favorite blog post by rating them with stars.<span class=\\\\\\"redactor-invisible-space\\\\\\">\\\\u200b<\\\\\\/span><\\\\\\/div><\\\\\\/div>\\"}],\\"nested\\":false,\\"isolated\\":false,\\"text\\":\\"\\\\n            \\\\n    \\\\n        \\\\n            \\\\n        \\\\n    \\\\n    \\\\n        \\\\n    \\\\n        \\\\n    \\\\n    \\\\n        Blog rating\\\\n        \\\\n            \\\\n                \\\\n            \\\\n        \\\\n    \\\\n    \\\\n        \\\\n            \\\\n                Drag to move block.\\\\n            \\\\n        \\\\n    \\\\n\\\\n            \\\\n    \\\\n        \\\\n    \\\\n    \\\\n        Users can show intensity of their favorite blog post by rating them with stars.\\\\u200b\\\\n        \\\\n            \\\\n                \\\\n            \\\\n        \\\\n    \\\\n    \\\\n        \\\\n            \\\\n                Drag to move block.\\\\n            \\\\n        \\\\n    \\\\n\\\\n        \\\\n    \\\\n        \\",\\"editableHtml\\":\\"\\\\n            <div class=\\\\\\"row\\\\\\" data-responsive=\\\\\\"400,300,200,100\\\\\\">\\\\n    <div class=\\\\\\"col col-md-1\\\\\\" data-size=\\\\\\"6\\\\\\">\\\\n        <div class=\\\\\\"ebd-nest\\\\\\" data-type=\\\\\\"block\\\\\\" data-col-wrapper=\\\\\\"\\\\\\">\\\\n            \\\\n        <\\\\\\/div>\\\\n    <\\\\\\/div>\\\\n    <div class=\\\\\\"col col-md-6\\\\\\" data-size=\\\\\\"6\\\\\\">\\\\n        <div class=\\\\\\"ebd-nest\\\\\\" data-type=\\\\\\"block\\\\\\" data-col-wrapper=\\\\\\"\\\\\\"><!--block09070874272077539-->\\\\n            <!--block002974416423671611-->\\\\n        <\\\\\\/div>\\\\n    <\\\\\\/div>\\\\n<\\\\\\/div>        \\"},{\\"uid\\":\\"021494898851960897\\",\\"type\\":\\"rule\\",\\"html\\":\\"\\\\n            <hr>        \\",\\"data\\":{},\\"blocks\\":[],\\"nested\\":false,\\"isolated\\":false,\\"text\\":\\"\\",\\"editableHtml\\":\\"\\\\n            <hr>        \\"},{\\"uid\\":\\"031212949855866967\\",\\"type\\":\\"text\\",\\"html\\":\\"<p>And many more powerful features that you can use to make your blog work beautifully and professionally. Need any help? Drop by our <a target=\\\\\\"_blank\\\\\\" class=\\\\\\"\\\\\\" title=\\\\\\"\\\\\\" href=\\\\\\"http:\\\\\\/\\\\\\/stackideas.com\\\\\\/forums\\\\\\/index\\\\\\/easyblog\\\\\\">Official forum<\\\\\\/a> or send our support team a ticket via our <a target=\\\\\\"_blank\\\\\\" class=\\\\\\"\\\\\\" title=\\\\\\"\\\\\\" href=\\\\\\"https:\\\\\\/\\\\\\/crm.stackideas.com\\\\\\">CRM<\\\\\\/a>. You can even check out <a target=\\\\\\"_blank\\\\\\" class=\\\\\\"\\\\\\" title=\\\\\\"\\\\\\" href=\\\\\\"http:\\\\\\/\\\\\\/stackideas.com\\\\\\/docs\\\\\\/easyblog\\\\\\">EasyBlog''s Documentation<\\\\\\/a>.<\\\\\\/p>\\",\\"data\\":{},\\"blocks\\":[],\\"nested\\":false,\\"isolated\\":false,\\"text\\":\\"And many more powerful features that you can use to make your blog work beautifully and professionally. Need any help? Drop by our Official forum or send our support team a ticket via our CRM. You can even check out EasyBlog''s Documentation.\\",\\"editableHtml\\":\\"<div class=\\\\\\"ebd-nest\\\\\\" data-type=\\\\\\"content\\\\\\" data-eb-text-block-wrapper=\\\\\\"\\\\\\"><div data-content-type=\\\\\\"html\\\\\\" data-eb-text-content-wrapper=\\\\\\"\\\\\\" contenteditable=\\\\\\"true\\\\\\"><p>And many more powerful features that you can use to make your blog work beautifully and professionally. Need any help? Drop by our <a target=\\\\\\"_blank\\\\\\" class=\\\\\\"\\\\\\" title=\\\\\\"\\\\\\" href=\\\\\\"http:\\\\\\/\\\\\\/stackideas.com\\\\\\/forums\\\\\\/index\\\\\\/easyblog\\\\\\">Official forum<\\\\\\/a> or send our support team a ticket via our <a target=\\\\\\"_blank\\\\\\" class=\\\\\\"\\\\\\" title=\\\\\\"\\\\\\" href=\\\\\\"https:\\\\\\/\\\\\\/crm.stackideas.com\\\\\\">CRM<\\\\\\/a>. You can even check out <a target=\\\\\\"_blank\\\\\\" class=\\\\\\"\\\\\\" title=\\\\\\"\\\\\\" href=\\\\\\"http:\\\\\\/\\\\\\/stackideas.com\\\\\\/docs\\\\\\/easyblog\\\\\\">EasyBlog''s Documentation<\\\\\\/a>.<\\\\\\/p><\\\\\\/div><\\\\\\/div>\\"}],\\"version\\":\\"1.0\\"}","autoposting":null,"categories":["1"],"tags":"","fields":[],"keywords":"","description":"","custom_title":null,"send_notification_emails":1,"association":[]}', 0, 1),
(2, 2, 'Initial Post', '2016-04-14 09:39:21', '2016-04-14 09:40:30', 312, '{"id":2,"created_by":"312","created":"2016-04-14 09:39:21","modified":"2016-04-14 09:40:30","title":"\\u041c\\u043e\\u044f \\u043f\\u0435\\u0440\\u0432\\u0430\\u044f \\u0437\\u0430\\u043f\\u0438\\u0441\\u044c","permalink":"moya-pervaya-zapis","content":"","intro":"<p>\\u041c\\u043e\\u044f \\u043f\\u0435\\u0440\\u0432\\u0430\\u044f \\u0437\\u0430\\u043f\\u0438\\u0441\\u044c<\\/p>","excerpt":null,"category_id":"1","published":1,"state":0,"publish_up":"2016-04-14 09:39:21","publish_down":"0000-00-00 00:00:00","ordering":"0","vote":"0","hits":0,"access":"0","allowcomment":"0","subscription":"1","frontpage":"1","isnew":false,"blogpassword":"","latitude":"","longitude":"","address":"","posttype":"","source_id":0,"source_type":"easyblog.sitewide","robots":"","copyrights":null,"image":"","language":"*","locked":"0","ip":"91.144.174.213","doctype":"legacy","document":"","autoposting":null,"categories":["1"],"tags":"","fields":[],"keywords":"","description":"","custom_title":"","send_notification_emails":"1","association":[]}', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_easyblog_subscriptions`
--

CREATE TABLE IF NOT EXISTS `n1wr9_easyblog_subscriptions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uid` bigint(20) unsigned NOT NULL,
  `utype` varchar(64) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT '0',
  `fullname` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `easyblog_subscriptions_types` (`uid`,`utype`),
  KEY `easyblog_subscriptions_types_userid` (`uid`,`utype`,`user_id`),
  KEY `easyblog_subscriptions_types_email` (`uid`,`utype`,`email`),
  KEY `easyblog_subscriptions_userid` (`user_id`),
  KEY `easyblog_subscriptions_email` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_easyblog_tag`
--

CREATE TABLE IF NOT EXISTS `n1wr9_easyblog_tag` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_by` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `published` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `default` tinyint(1) NOT NULL DEFAULT '0',
  `ordering` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `easyblog_tag_title` (`title`),
  KEY `easyblog_tag_published` (`published`),
  KEY `easyblog_tag_alias` (`alias`),
  KEY `easyblog_tag_query1` (`published`,`id`,`title`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_easyblog_team`
--

CREATE TABLE IF NOT EXISTS `n1wr9_easyblog_team` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `access` tinyint(1) DEFAULT '1',
  `published` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `allow_join` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_viewable_team` (`published`,`access`,`created`),
  KEY `idx_published` (`published`),
  KEY `idx_access` (`access`),
  KEY `idx_created` (`created`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_easyblog_team_groups`
--

CREATE TABLE IF NOT EXISTS `n1wr9_easyblog_team_groups` (
  `team_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  KEY `team_id` (`team_id`),
  KEY `group_id` (`group_id`),
  KEY `idx_team_group` (`team_id`,`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_easyblog_team_post`
--

CREATE TABLE IF NOT EXISTS `n1wr9_easyblog_team_post` (
  `team_id` int(11) NOT NULL,
  `post_id` bigint(11) NOT NULL,
  KEY `easyblog_teampost_tid` (`team_id`),
  KEY `easyblog_teampost_pid` (`post_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_easyblog_team_request`
--

CREATE TABLE IF NOT EXISTS `n1wr9_easyblog_team_request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `team_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ispending` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `easyblog_team_request_teamid` (`team_id`),
  KEY `easyblog_team_request_userid` (`user_id`),
  KEY `easyblog_team_request_pending` (`ispending`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_easyblog_team_users`
--

CREATE TABLE IF NOT EXISTS `n1wr9_easyblog_team_users` (
  `team_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `isadmin` tinyint(1) DEFAULT '0',
  KEY `easyblog_team_id` (`team_id`),
  KEY `easyblog_team_userid` (`user_id`),
  KEY `easyblog_team_isadmin` (`team_id`,`user_id`,`isadmin`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_easyblog_twitter_microblog`
--

CREATE TABLE IF NOT EXISTS `n1wr9_easyblog_twitter_microblog` (
  `id_str` text NOT NULL,
  `oauth_id` int(11) NOT NULL,
  `post_id` bigint(20) NOT NULL,
  `created` datetime NOT NULL,
  `tweet_author` text NOT NULL,
  KEY `post_id` (`post_id`),
  FULLTEXT KEY `id_str` (`id_str`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_easyblog_uploader_tmp`
--

CREATE TABLE IF NOT EXISTS `n1wr9_easyblog_uploader_tmp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `path` text NOT NULL,
  `uri` text NOT NULL,
  `raw` text NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`,`type`),
  KEY `idx_uploader_created` (`created`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_easyblog_users`
--

CREATE TABLE IF NOT EXISTS `n1wr9_easyblog_users` (
  `id` bigint(20) unsigned NOT NULL,
  `nickname` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `description` text,
  `url` varchar(255) DEFAULT NULL,
  `params` text,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `title` varchar(255) NOT NULL DEFAULT '',
  `biography` text,
  `permalink` varchar(255) DEFAULT NULL,
  `custom_css` text,
  PRIMARY KEY (`id`),
  KEY `easyblog_users_permalink` (`permalink`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `n1wr9_easyblog_users`
--

INSERT INTO `n1wr9_easyblog_users` (`id`, `nickname`, `avatar`, `description`, `url`, `params`, `published`, `title`, `biography`, `permalink`, `custom_css`) VALUES
(311, 'Super User', 'default_blogger.png', '', '', '', 1, '', NULL, 'admin', NULL),
(312, 'Вячеслав', 'default_blogger.png', '', '', '', 1, '', NULL, 'sloker', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_easyblog_xml_wpdata`
--

CREATE TABLE IF NOT EXISTS `n1wr9_easyblog_xml_wpdata` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `session_id` varchar(255) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `post_id` bigint(20) NOT NULL,
  `source` varchar(15) NOT NULL,
  `data` longtext NOT NULL,
  `comments` longtext,
  PRIMARY KEY (`id`),
  KEY `xml_wpdate_session` (`session_id`),
  KEY `xml_wpdate_post_source` (`post_id`,`source`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_extensions`
--

CREATE TABLE IF NOT EXISTS `n1wr9_extensions` (
  `extension_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `type` varchar(20) NOT NULL,
  `element` varchar(100) NOT NULL,
  `folder` varchar(100) NOT NULL,
  `client_id` tinyint(3) NOT NULL,
  `enabled` tinyint(3) NOT NULL DEFAULT '1',
  `access` int(10) unsigned NOT NULL DEFAULT '1',
  `protected` tinyint(3) NOT NULL DEFAULT '0',
  `manifest_cache` text NOT NULL,
  `params` text NOT NULL,
  `custom_data` text NOT NULL,
  `system_data` text NOT NULL,
  `checked_out` int(10) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ordering` int(11) DEFAULT '0',
  `state` int(11) DEFAULT '0',
  PRIMARY KEY (`extension_id`),
  KEY `element_clientid` (`element`,`client_id`),
  KEY `element_folder_clientid` (`element`,`folder`,`client_id`),
  KEY `extension` (`type`,`element`,`folder`,`client_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10085 ;

--
-- Dumping data for table `n1wr9_extensions`
--

INSERT INTO `n1wr9_extensions` (`extension_id`, `name`, `type`, `element`, `folder`, `client_id`, `enabled`, `access`, `protected`, `manifest_cache`, `params`, `custom_data`, `system_data`, `checked_out`, `checked_out_time`, `ordering`, `state`) VALUES
(1, 'com_mailto', 'component', 'com_mailto', '', 0, 1, 1, 1, '{"name":"com_mailto","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2015 Open Source Matters. All rights reserved.\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"COM_MAILTO_XML_DESCRIPTION","group":"","filename":"mailto"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(2, 'com_wrapper', 'component', 'com_wrapper', '', 0, 1, 1, 1, '{"name":"com_wrapper","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2015 Open Source Matters. All rights reserved.\\n\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"COM_WRAPPER_XML_DESCRIPTION","group":"","filename":"wrapper"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(3, 'com_admin', 'component', 'com_admin', '', 1, 1, 1, 1, '{"name":"com_admin","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"COM_ADMIN_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(4, 'com_banners', 'component', 'com_banners', '', 1, 1, 1, 0, '{"name":"com_banners","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"COM_BANNERS_XML_DESCRIPTION","group":"","filename":"banners"}', '{"purchase_type":"3","track_impressions":"0","track_clicks":"0","metakey_prefix":"","save_history":"1","history_limit":10}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(5, 'com_cache', 'component', 'com_cache', '', 1, 1, 1, 1, '{"name":"com_cache","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"COM_CACHE_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(6, 'com_categories', 'component', 'com_categories', '', 1, 1, 1, 1, '{"name":"com_categories","type":"component","creationDate":"December 2007","author":"Joomla! Project","copyright":"(C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"COM_CATEGORIES_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(7, 'com_checkin', 'component', 'com_checkin', '', 1, 1, 1, 1, '{"name":"com_checkin","type":"component","creationDate":"Unknown","author":"Joomla! Project","copyright":"(C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"COM_CHECKIN_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(8, 'com_contact', 'component', 'com_contact', '', 1, 1, 1, 0, '{"name":"com_contact","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"COM_CONTACT_XML_DESCRIPTION","group":"","filename":"contact"}', '{"show_contact_category":"hide","save_history":"1","history_limit":10,"show_contact_list":"0","presentation_style":"sliders","show_name":"1","show_position":"1","show_email":"0","show_street_address":"1","show_suburb":"1","show_state":"1","show_postcode":"1","show_country":"1","show_telephone":"1","show_mobile":"1","show_fax":"1","show_webpage":"1","show_misc":"1","show_image":"1","image":"","allow_vcard":"0","show_articles":"0","show_profile":"0","show_links":"0","linka_name":"","linkb_name":"","linkc_name":"","linkd_name":"","linke_name":"","contact_icons":"0","icon_address":"","icon_email":"","icon_telephone":"","icon_mobile":"","icon_fax":"","icon_misc":"","show_headings":"1","show_position_headings":"1","show_email_headings":"0","show_telephone_headings":"1","show_mobile_headings":"0","show_fax_headings":"0","allow_vcard_headings":"0","show_suburb_headings":"1","show_state_headings":"1","show_country_headings":"1","show_email_form":"1","show_email_copy":"1","banned_email":"","banned_subject":"","banned_text":"","validate_session":"1","custom_reply":"0","redirect":"","show_category_crumb":"0","metakey":"","metadesc":"","robots":"","author":"","rights":"","xreference":""}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(9, 'com_cpanel', 'component', 'com_cpanel', '', 1, 1, 1, 1, '{"name":"com_cpanel","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"COM_CPANEL_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10, 'com_installer', 'component', 'com_installer', '', 1, 1, 1, 1, '{"name":"com_installer","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"COM_INSTALLER_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(11, 'com_languages', 'component', 'com_languages', '', 1, 1, 1, 1, '{"name":"com_languages","type":"component","creationDate":"2006","author":"Joomla! Project","copyright":"(C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"COM_LANGUAGES_XML_DESCRIPTION","group":""}', '{"administrator":"ru-RU","site":"ru-RU"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(12, 'com_login', 'component', 'com_login', '', 1, 1, 1, 1, '{"name":"com_login","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"COM_LOGIN_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(13, 'com_media', 'component', 'com_media', '', 1, 1, 0, 1, '{"name":"com_media","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"COM_MEDIA_XML_DESCRIPTION","group":"","filename":"media"}', '{"upload_extensions":"bmp,csv,doc,gif,ico,jpg,jpeg,odg,odp,ods,odt,pdf,png,ppt,swf,txt,xcf,xls,BMP,CSV,DOC,GIF,ICO,JPG,JPEG,ODG,ODP,ODS,ODT,PDF,PNG,PPT,SWF,TXT,XCF,XLS","upload_maxsize":"10","file_path":"images","image_path":"images","restrict_uploads":"1","allowed_media_usergroup":"3","check_mime":"1","image_extensions":"bmp,gif,jpg,png","ignore_extensions":"","upload_mime":"image\\/jpeg,image\\/gif,image\\/png,image\\/bmp,application\\/x-shockwave-flash,application\\/msword,application\\/excel,application\\/pdf,application\\/powerpoint,text\\/plain,application\\/x-zip","upload_mime_illegal":"text\\/html"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(14, 'com_menus', 'component', 'com_menus', '', 1, 1, 1, 1, '{"name":"com_menus","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"COM_MENUS_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(15, 'com_messages', 'component', 'com_messages', '', 1, 1, 1, 1, '{"name":"com_messages","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"COM_MESSAGES_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(16, 'com_modules', 'component', 'com_modules', '', 1, 1, 1, 1, '{"name":"com_modules","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"COM_MODULES_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(17, 'com_newsfeeds', 'component', 'com_newsfeeds', '', 1, 1, 1, 0, '{"name":"com_newsfeeds","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"COM_NEWSFEEDS_XML_DESCRIPTION","group":"","filename":"newsfeeds"}', '{"newsfeed_layout":"_:default","save_history":"1","history_limit":5,"show_feed_image":"1","show_feed_description":"1","show_item_description":"1","feed_character_count":"0","feed_display_order":"des","float_first":"right","float_second":"right","show_tags":"1","category_layout":"_:default","show_category_title":"1","show_description":"1","show_description_image":"1","maxLevel":"-1","show_empty_categories":"0","show_subcat_desc":"1","show_cat_items":"1","show_cat_tags":"1","show_base_description":"1","maxLevelcat":"-1","show_empty_categories_cat":"0","show_subcat_desc_cat":"1","show_cat_items_cat":"1","filter_field":"1","show_pagination_limit":"1","show_headings":"1","show_articles":"0","show_link":"1","show_pagination":"1","show_pagination_results":"1"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(18, 'com_plugins', 'component', 'com_plugins', '', 1, 1, 1, 1, '{"name":"com_plugins","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"COM_PLUGINS_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(19, 'com_search', 'component', 'com_search', '', 1, 1, 1, 0, '{"name":"com_search","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"COM_SEARCH_XML_DESCRIPTION","group":"","filename":"search"}', '{"enabled":"0","show_date":"1"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(20, 'com_templates', 'component', 'com_templates', '', 1, 1, 1, 1, '{"name":"com_templates","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"COM_TEMPLATES_XML_DESCRIPTION","group":""}', '{"template_positions_display":"0","upload_limit":"2","image_formats":"gif,bmp,jpg,jpeg,png","source_formats":"txt,less,ini,xml,js,php,css","font_formats":"woff,ttf,otf","compressed_formats":"zip"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(22, 'com_content', 'component', 'com_content', '', 1, 1, 0, 1, '{"name":"com_content","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"COM_CONTENT_XML_DESCRIPTION","group":"","filename":"content"}', '{"article_layout":"_:default","show_title":"1","link_titles":"1","show_intro":"1","show_category":"1","link_category":"1","show_parent_category":"0","link_parent_category":"0","show_author":"1","link_author":"0","show_create_date":"0","show_modify_date":"0","show_publish_date":"1","show_item_navigation":"1","show_vote":"0","show_readmore":"1","show_readmore_title":"1","readmore_limit":"100","show_icons":"1","show_print_icon":"1","show_email_icon":"1","show_hits":"1","show_noauth":"0","show_publishing_options":"1","show_article_options":"1","save_history":"1","history_limit":10,"show_urls_images_frontend":"0","show_urls_images_backend":"1","targeta":0,"targetb":0,"targetc":0,"float_intro":"left","float_fulltext":"left","category_layout":"_:blog","show_category_title":"0","show_description":"0","show_description_image":"0","maxLevel":"1","show_empty_categories":"0","show_no_articles":"1","show_subcat_desc":"1","show_cat_num_articles":"0","show_base_description":"1","maxLevelcat":"-1","show_empty_categories_cat":"0","show_subcat_desc_cat":"1","show_cat_num_articles_cat":"1","num_leading_articles":"1","num_intro_articles":"4","num_columns":"2","num_links":"4","multi_column_order":"0","show_subcategory_content":"0","show_pagination_limit":"1","filter_field":"hide","show_headings":"1","list_show_date":"0","date_format":"","list_show_hits":"1","list_show_author":"1","orderby_pri":"order","orderby_sec":"rdate","order_date":"published","show_pagination":"2","show_pagination_results":"1","show_feed_link":"1","feed_summary":"0"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(23, 'com_config', 'component', 'com_config', '', 1, 1, 0, 1, '{"name":"com_config","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"COM_CONFIG_XML_DESCRIPTION","group":""}', '{"filters":{"1":{"filter_type":"NH","filter_tags":"","filter_attributes":""},"9":{"filter_type":"BL","filter_tags":"","filter_attributes":""},"6":{"filter_type":"BL","filter_tags":"","filter_attributes":""},"7":{"filter_type":"NONE","filter_tags":"","filter_attributes":""},"2":{"filter_type":"NH","filter_tags":"","filter_attributes":""},"3":{"filter_type":"BL","filter_tags":"","filter_attributes":""},"4":{"filter_type":"BL","filter_tags":"","filter_attributes":""},"5":{"filter_type":"BL","filter_tags":"","filter_attributes":""},"8":{"filter_type":"NONE","filter_tags":"","filter_attributes":""}}}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(24, 'com_redirect', 'component', 'com_redirect', '', 1, 1, 0, 1, '{"name":"com_redirect","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"COM_REDIRECT_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(25, 'com_users', 'component', 'com_users', '', 1, 1, 0, 1, '{"name":"com_users","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"COM_USERS_XML_DESCRIPTION","group":"","filename":"users"}', '{"allowUserRegistration":"1","new_usertype":"2","guest_usergroup":"9","sendpassword":"0","useractivation":"1","mail_to_admin":"0","captcha":"","frontend_userparams":"1","site_language":"0","change_login_name":"0","reset_count":"10","reset_time":"1","minimum_length":"4","minimum_integers":"0","minimum_symbols":"0","minimum_uppercase":"0","save_history":"1","history_limit":5,"mailSubjectPrefix":"","mailBodySuffix":""}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(27, 'com_finder', 'component', 'com_finder', '', 1, 1, 0, 0, '{"name":"com_finder","type":"component","creationDate":"August 2011","author":"Joomla! Project","copyright":"(C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"COM_FINDER_XML_DESCRIPTION","group":"","filename":"finder"}', '{"show_description":"1","description_length":255,"allow_empty_query":"0","show_url":"1","show_advanced":"1","expand_advanced":"0","show_date_filters":"0","highlight_terms":"1","opensearch_name":"","opensearch_description":"","batch_size":"50","memory_table_limit":30000,"title_multiplier":"1.7","text_multiplier":"0.7","meta_multiplier":"1.2","path_multiplier":"2.0","misc_multiplier":"0.3","stemmer":"snowball"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(28, 'com_joomlaupdate', 'component', 'com_joomlaupdate', '', 1, 1, 0, 1, '{"name":"com_joomlaupdate","type":"component","creationDate":"February 2012","author":"Joomla! Project","copyright":"(C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"COM_JOOMLAUPDATE_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(29, 'com_tags', 'component', 'com_tags', '', 1, 1, 1, 1, '{"name":"com_tags","type":"component","creationDate":"December 2013","author":"Joomla! Project","copyright":"(C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.1.0","description":"COM_TAGS_XML_DESCRIPTION","group":"","filename":"tags"}', '{"tag_layout":"_:default","save_history":"1","history_limit":5,"show_tag_title":"0","tag_list_show_tag_image":"0","tag_list_show_tag_description":"0","tag_list_image":"","show_tag_num_items":"0","tag_list_orderby":"title","tag_list_orderby_direction":"ASC","show_headings":"0","tag_list_show_date":"0","tag_list_show_item_image":"0","tag_list_show_item_description":"0","tag_list_item_maximum_characters":0,"return_any_or_all":"1","include_children":"0","maximum":200,"tag_list_language_filter":"all","tags_layout":"_:default","all_tags_orderby":"title","all_tags_orderby_direction":"ASC","all_tags_show_tag_image":"0","all_tags_show_tag_descripion":"0","all_tags_tag_maximum_characters":20,"all_tags_show_tag_hits":"0","filter_field":"1","show_pagination_limit":"1","show_pagination":"2","show_pagination_results":"1","tag_field_ajax_mode":"1","show_feed_link":"1"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(30, 'com_contenthistory', 'component', 'com_contenthistory', '', 1, 1, 1, 0, '{"name":"com_contenthistory","type":"component","creationDate":"May 2013","author":"Joomla! Project","copyright":"(C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.2.0","description":"COM_CONTENTHISTORY_XML_DESCRIPTION","group":"","filename":"contenthistory"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(31, 'com_ajax', 'component', 'com_ajax', '', 1, 1, 1, 0, '{"name":"com_ajax","type":"component","creationDate":"August 2013","author":"Joomla! Project","copyright":"(C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.2.0","description":"COM_AJAX_XML_DESCRIPTION","group":"","filename":"ajax"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(32, 'com_postinstall', 'component', 'com_postinstall', '', 1, 1, 1, 1, '{"name":"com_postinstall","type":"component","creationDate":"September 2013","author":"Joomla! Project","copyright":"(C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.2.0","description":"COM_POSTINSTALL_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(101, 'SimplePie', 'library', 'simplepie', '', 0, 1, 1, 1, '{"name":"SimplePie","type":"library","creationDate":"2004","author":"SimplePie","copyright":"Copyright (c) 2004-2009, Ryan Parman and Geoffrey Sneddon","authorEmail":"","authorUrl":"http:\\/\\/simplepie.org\\/","version":"1.2","description":"LIB_SIMPLEPIE_XML_DESCRIPTION","group":"","filename":"simplepie"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(102, 'phputf8', 'library', 'phputf8', '', 0, 1, 1, 1, '{"name":"phputf8","type":"library","creationDate":"2006","author":"Harry Fuecks","copyright":"Copyright various authors","authorEmail":"hfuecks@gmail.com","authorUrl":"http:\\/\\/sourceforge.net\\/projects\\/phputf8","version":"0.5","description":"LIB_PHPUTF8_XML_DESCRIPTION","group":"","filename":"phputf8"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(103, 'Joomla! Platform', 'library', 'joomla', '', 0, 1, 1, 1, '{"name":"Joomla! Platform","type":"library","creationDate":"2008","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"http:\\/\\/www.joomla.org","version":"13.1","description":"LIB_JOOMLA_XML_DESCRIPTION","group":"","filename":"joomla"}', '{"mediaversion":"4a15af77e1919d4ecaf31b28e9e2540b"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(104, 'IDNA Convert', 'library', 'idna_convert', '', 0, 1, 1, 1, '{"name":"IDNA Convert","type":"library","creationDate":"2004","author":"phlyLabs","copyright":"2004-2011 phlyLabs Berlin, http:\\/\\/phlylabs.de","authorEmail":"phlymail@phlylabs.de","authorUrl":"http:\\/\\/phlylabs.de","version":"0.8.0","description":"LIB_IDNA_XML_DESCRIPTION","group":"","filename":"idna_convert"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(105, 'FOF', 'library', 'fof', '', 0, 1, 1, 1, '{"name":"FOF","type":"library","creationDate":"2015-04-22 13:15:32","author":"Nicholas K. Dionysopoulos \\/ Akeeba Ltd","copyright":"(C)2011-2015 Nicholas K. Dionysopoulos","authorEmail":"nicholas@akeebabackup.com","authorUrl":"https:\\/\\/www.akeebabackup.com","version":"2.4.3","description":"LIB_FOF_XML_DESCRIPTION","group":"","filename":"fof"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(106, 'PHPass', 'library', 'phpass', '', 0, 1, 1, 1, '{"name":"PHPass","type":"library","creationDate":"2004-2006","author":"Solar Designer","copyright":"","authorEmail":"solar@openwall.com","authorUrl":"http:\\/\\/www.openwall.com\\/phpass\\/","version":"0.3","description":"LIB_PHPASS_XML_DESCRIPTION","group":"","filename":"phpass"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(200, 'mod_articles_archive', 'module', 'mod_articles_archive', '', 0, 1, 1, 0, '{"name":"mod_articles_archive","type":"module","creationDate":"July 2006","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_ARTICLES_ARCHIVE_XML_DESCRIPTION","group":"","filename":"mod_articles_archive"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(201, 'mod_articles_latest', 'module', 'mod_articles_latest', '', 0, 1, 1, 0, '{"name":"mod_articles_latest","type":"module","creationDate":"July 2004","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_LATEST_NEWS_XML_DESCRIPTION","group":"","filename":"mod_articles_latest"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(202, 'mod_articles_popular', 'module', 'mod_articles_popular', '', 0, 1, 1, 0, '{"name":"mod_articles_popular","type":"module","creationDate":"July 2006","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_POPULAR_XML_DESCRIPTION","group":"","filename":"mod_articles_popular"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(203, 'mod_banners', 'module', 'mod_banners', '', 0, 1, 1, 0, '{"name":"mod_banners","type":"module","creationDate":"July 2006","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_BANNERS_XML_DESCRIPTION","group":"","filename":"mod_banners"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(204, 'mod_breadcrumbs', 'module', 'mod_breadcrumbs', '', 0, 1, 1, 1, '{"name":"mod_breadcrumbs","type":"module","creationDate":"July 2006","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_BREADCRUMBS_XML_DESCRIPTION","group":"","filename":"mod_breadcrumbs"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(205, 'mod_custom', 'module', 'mod_custom', '', 0, 1, 1, 1, '{"name":"mod_custom","type":"module","creationDate":"July 2004","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_CUSTOM_XML_DESCRIPTION","group":"","filename":"mod_custom"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(206, 'mod_feed', 'module', 'mod_feed', '', 0, 1, 1, 0, '{"name":"mod_feed","type":"module","creationDate":"July 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_FEED_XML_DESCRIPTION","group":"","filename":"mod_feed"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(207, 'mod_footer', 'module', 'mod_footer', '', 0, 1, 1, 0, '{"name":"mod_footer","type":"module","creationDate":"July 2006","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_FOOTER_XML_DESCRIPTION","group":"","filename":"mod_footer"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(208, 'mod_login', 'module', 'mod_login', '', 0, 1, 1, 1, '{"name":"mod_login","type":"module","creationDate":"July 2006","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_LOGIN_XML_DESCRIPTION","group":"","filename":"mod_login"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(209, 'mod_menu', 'module', 'mod_menu', '', 0, 1, 1, 1, '{"name":"mod_menu","type":"module","creationDate":"July 2004","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_MENU_XML_DESCRIPTION","group":"","filename":"mod_menu"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(210, 'mod_articles_news', 'module', 'mod_articles_news', '', 0, 1, 1, 0, '{"name":"mod_articles_news","type":"module","creationDate":"July 2006","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_ARTICLES_NEWS_XML_DESCRIPTION","group":"","filename":"mod_articles_news"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(211, 'mod_random_image', 'module', 'mod_random_image', '', 0, 1, 1, 0, '{"name":"mod_random_image","type":"module","creationDate":"July 2006","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_RANDOM_IMAGE_XML_DESCRIPTION","group":"","filename":"mod_random_image"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(212, 'mod_related_items', 'module', 'mod_related_items', '', 0, 1, 1, 0, '{"name":"mod_related_items","type":"module","creationDate":"July 2004","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_RELATED_XML_DESCRIPTION","group":"","filename":"mod_related_items"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(213, 'mod_search', 'module', 'mod_search', '', 0, 1, 1, 0, '{"name":"mod_search","type":"module","creationDate":"July 2004","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_SEARCH_XML_DESCRIPTION","group":"","filename":"mod_search"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(214, 'mod_stats', 'module', 'mod_stats', '', 0, 1, 1, 0, '{"name":"mod_stats","type":"module","creationDate":"July 2004","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_STATS_XML_DESCRIPTION","group":"","filename":"mod_stats"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(215, 'mod_syndicate', 'module', 'mod_syndicate', '', 0, 1, 1, 1, '{"name":"mod_syndicate","type":"module","creationDate":"May 2006","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_SYNDICATE_XML_DESCRIPTION","group":"","filename":"mod_syndicate"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(216, 'mod_users_latest', 'module', 'mod_users_latest', '', 0, 1, 1, 0, '{"name":"mod_users_latest","type":"module","creationDate":"December 2009","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_USERS_LATEST_XML_DESCRIPTION","group":"","filename":"mod_users_latest"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(218, 'mod_whosonline', 'module', 'mod_whosonline', '', 0, 1, 1, 0, '{"name":"mod_whosonline","type":"module","creationDate":"July 2004","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_WHOSONLINE_XML_DESCRIPTION","group":"","filename":"mod_whosonline"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(219, 'mod_wrapper', 'module', 'mod_wrapper', '', 0, 1, 1, 0, '{"name":"mod_wrapper","type":"module","creationDate":"October 2004","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_WRAPPER_XML_DESCRIPTION","group":"","filename":"mod_wrapper"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(220, 'mod_articles_category', 'module', 'mod_articles_category', '', 0, 1, 1, 0, '{"name":"mod_articles_category","type":"module","creationDate":"February 2010","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_ARTICLES_CATEGORY_XML_DESCRIPTION","group":"","filename":"mod_articles_category"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(221, 'mod_articles_categories', 'module', 'mod_articles_categories', '', 0, 1, 1, 0, '{"name":"mod_articles_categories","type":"module","creationDate":"February 2010","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_ARTICLES_CATEGORIES_XML_DESCRIPTION","group":"","filename":"mod_articles_categories"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(222, 'mod_languages', 'module', 'mod_languages', '', 0, 1, 1, 1, '{"name":"mod_languages","type":"module","creationDate":"February 2010","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_LANGUAGES_XML_DESCRIPTION","group":"","filename":"mod_languages"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(223, 'mod_finder', 'module', 'mod_finder', '', 0, 1, 0, 0, '{"name":"mod_finder","type":"module","creationDate":"August 2011","author":"Joomla! Project","copyright":"(C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_FINDER_XML_DESCRIPTION","group":"","filename":"mod_finder"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(300, 'mod_custom', 'module', 'mod_custom', '', 1, 1, 1, 1, '{"name":"mod_custom","type":"module","creationDate":"July 2004","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_CUSTOM_XML_DESCRIPTION","group":"","filename":"mod_custom"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(301, 'mod_feed', 'module', 'mod_feed', '', 1, 1, 1, 0, '{"name":"mod_feed","type":"module","creationDate":"July 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_FEED_XML_DESCRIPTION","group":"","filename":"mod_feed"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(302, 'mod_latest', 'module', 'mod_latest', '', 1, 1, 1, 0, '{"name":"mod_latest","type":"module","creationDate":"July 2004","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_LATEST_XML_DESCRIPTION","group":"","filename":"mod_latest"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(303, 'mod_logged', 'module', 'mod_logged', '', 1, 1, 1, 0, '{"name":"mod_logged","type":"module","creationDate":"January 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_LOGGED_XML_DESCRIPTION","group":"","filename":"mod_logged"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(304, 'mod_login', 'module', 'mod_login', '', 1, 1, 1, 1, '{"name":"mod_login","type":"module","creationDate":"March 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_LOGIN_XML_DESCRIPTION","group":"","filename":"mod_login"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(305, 'mod_menu', 'module', 'mod_menu', '', 1, 1, 1, 0, '{"name":"mod_menu","type":"module","creationDate":"March 2006","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_MENU_XML_DESCRIPTION","group":"","filename":"mod_menu"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(307, 'mod_popular', 'module', 'mod_popular', '', 1, 1, 1, 0, '{"name":"mod_popular","type":"module","creationDate":"July 2004","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_POPULAR_XML_DESCRIPTION","group":"","filename":"mod_popular"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(308, 'mod_quickicon', 'module', 'mod_quickicon', '', 1, 1, 1, 1, '{"name":"mod_quickicon","type":"module","creationDate":"Nov 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_QUICKICON_XML_DESCRIPTION","group":"","filename":"mod_quickicon"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(309, 'mod_status', 'module', 'mod_status', '', 1, 1, 1, 0, '{"name":"mod_status","type":"module","creationDate":"Feb 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_STATUS_XML_DESCRIPTION","group":"","filename":"mod_status"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(310, 'mod_submenu', 'module', 'mod_submenu', '', 1, 1, 1, 0, '{"name":"mod_submenu","type":"module","creationDate":"Feb 2006","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_SUBMENU_XML_DESCRIPTION","group":"","filename":"mod_submenu"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(311, 'mod_title', 'module', 'mod_title', '', 1, 1, 1, 0, '{"name":"mod_title","type":"module","creationDate":"Nov 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_TITLE_XML_DESCRIPTION","group":"","filename":"mod_title"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(312, 'mod_toolbar', 'module', 'mod_toolbar', '', 1, 1, 1, 1, '{"name":"mod_toolbar","type":"module","creationDate":"Nov 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_TOOLBAR_XML_DESCRIPTION","group":"","filename":"mod_toolbar"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(313, 'mod_multilangstatus', 'module', 'mod_multilangstatus', '', 1, 1, 1, 0, '{"name":"mod_multilangstatus","type":"module","creationDate":"September 2011","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_MULTILANGSTATUS_XML_DESCRIPTION","group":"","filename":"mod_multilangstatus"}', '{"cache":"0"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(314, 'mod_version', 'module', 'mod_version', '', 1, 1, 1, 0, '{"name":"mod_version","type":"module","creationDate":"January 2012","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_VERSION_XML_DESCRIPTION","group":"","filename":"mod_version"}', '{"format":"short","product":"1","cache":"0"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(315, 'mod_stats_admin', 'module', 'mod_stats_admin', '', 1, 1, 1, 0, '{"name":"mod_stats_admin","type":"module","creationDate":"July 2004","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_STATS_XML_DESCRIPTION","group":"","filename":"mod_stats_admin"}', '{"serverinfo":"0","siteinfo":"0","counter":"0","increase":"0","cache":"1","cache_time":"900","cachemode":"static"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(316, 'mod_tags_popular', 'module', 'mod_tags_popular', '', 0, 1, 1, 0, '{"name":"mod_tags_popular","type":"module","creationDate":"January 2013","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.1.0","description":"MOD_TAGS_POPULAR_XML_DESCRIPTION","group":"","filename":"mod_tags_popular"}', '{"maximum":"5","timeframe":"alltime","owncache":"1"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(317, 'mod_tags_similar', 'module', 'mod_tags_similar', '', 0, 1, 1, 0, '{"name":"mod_tags_similar","type":"module","creationDate":"January 2013","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.1.0","description":"MOD_TAGS_SIMILAR_XML_DESCRIPTION","group":"","filename":"mod_tags_similar"}', '{"maximum":"5","matchtype":"any","owncache":"1"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(400, 'plg_authentication_gmail', 'plugin', 'gmail', 'authentication', 0, 0, 1, 0, '{"name":"plg_authentication_gmail","type":"plugin","creationDate":"February 2006","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_GMAIL_XML_DESCRIPTION","group":"","filename":"gmail"}', '{"applysuffix":"0","suffix":"","verifypeer":"1","user_blacklist":""}', '', '', 0, '0000-00-00 00:00:00', 1, 0),
(401, 'plg_authentication_joomla', 'plugin', 'joomla', 'authentication', 0, 1, 1, 1, '{"name":"plg_authentication_joomla","type":"plugin","creationDate":"November 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_AUTH_JOOMLA_XML_DESCRIPTION","group":"","filename":"joomla"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(402, 'plg_authentication_ldap', 'plugin', 'ldap', 'authentication', 0, 0, 1, 0, '{"name":"plg_authentication_ldap","type":"plugin","creationDate":"November 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_LDAP_XML_DESCRIPTION","group":"","filename":"ldap"}', '{"host":"","port":"389","use_ldapV3":"0","negotiate_tls":"0","no_referrals":"0","auth_method":"bind","base_dn":"","search_string":"","users_dn":"","username":"admin","password":"bobby7","ldap_fullname":"fullName","ldap_email":"mail","ldap_uid":"uid"}', '', '', 0, '0000-00-00 00:00:00', 3, 0),
(403, 'plg_content_contact', 'plugin', 'contact', 'content', 0, 1, 1, 0, '{"name":"plg_content_contact","type":"plugin","creationDate":"January 2014","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.2.2","description":"PLG_CONTENT_CONTACT_XML_DESCRIPTION","group":"","filename":"contact"}', '', '', '', 0, '0000-00-00 00:00:00', 1, 0),
(404, 'plg_content_emailcloak', 'plugin', 'emailcloak', 'content', 0, 1, 1, 0, '{"name":"plg_content_emailcloak","type":"plugin","creationDate":"November 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_CONTENT_EMAILCLOAK_XML_DESCRIPTION","group":"","filename":"emailcloak"}', '{"mode":"1"}', '', '', 0, '0000-00-00 00:00:00', 1, 0),
(406, 'plg_content_loadmodule', 'plugin', 'loadmodule', 'content', 0, 1, 1, 0, '{"name":"plg_content_loadmodule","type":"plugin","creationDate":"November 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_LOADMODULE_XML_DESCRIPTION","group":"","filename":"loadmodule"}', '{"style":"xhtml"}', '', '', 0, '2011-09-18 15:22:50', 0, 0),
(407, 'plg_content_pagebreak', 'plugin', 'pagebreak', 'content', 0, 1, 1, 0, '{"name":"plg_content_pagebreak","type":"plugin","creationDate":"November 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_CONTENT_PAGEBREAK_XML_DESCRIPTION","group":"","filename":"pagebreak"}', '{"title":"1","multipage_toc":"1","showall":"1"}', '', '', 0, '0000-00-00 00:00:00', 4, 0),
(408, 'plg_content_pagenavigation', 'plugin', 'pagenavigation', 'content', 0, 1, 1, 0, '{"name":"plg_content_pagenavigation","type":"plugin","creationDate":"January 2006","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_PAGENAVIGATION_XML_DESCRIPTION","group":"","filename":"pagenavigation"}', '{"position":"1"}', '', '', 0, '0000-00-00 00:00:00', 5, 0),
(409, 'plg_content_vote', 'plugin', 'vote', 'content', 0, 1, 1, 0, '{"name":"plg_content_vote","type":"plugin","creationDate":"November 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_VOTE_XML_DESCRIPTION","group":"","filename":"vote"}', '', '', '', 0, '0000-00-00 00:00:00', 6, 0),
(410, 'plg_editors_codemirror', 'plugin', 'codemirror', 'editors', 0, 1, 1, 1, '{"name":"plg_editors_codemirror","type":"plugin","creationDate":"28 March 2011","author":"Marijn Haverbeke","copyright":"Copyright (C) 2014 by Marijn Haverbeke <marijnh@gmail.com> and others","authorEmail":"marijnh@gmail.com","authorUrl":"http:\\/\\/codemirror.net\\/","version":"5.6","description":"PLG_CODEMIRROR_XML_DESCRIPTION","group":"","filename":"codemirror"}', '{"lineNumbers":"1","lineWrapping":"1","matchTags":"1","matchBrackets":"1","marker-gutter":"1","autoCloseTags":"1","autoCloseBrackets":"1","autoFocus":"1","theme":"default","tabmode":"indent"}', '', '', 0, '0000-00-00 00:00:00', 1, 0),
(411, 'plg_editors_none', 'plugin', 'none', 'editors', 0, 1, 1, 1, '{"name":"plg_editors_none","type":"plugin","creationDate":"September 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_NONE_XML_DESCRIPTION","group":"","filename":"none"}', '', '', '', 0, '0000-00-00 00:00:00', 2, 0),
(412, 'plg_editors_tinymce', 'plugin', 'tinymce', 'editors', 0, 1, 1, 0, '{"name":"plg_editors_tinymce","type":"plugin","creationDate":"2005-2014","author":"Moxiecode Systems AB","copyright":"Moxiecode Systems AB","authorEmail":"N\\/A","authorUrl":"tinymce.moxiecode.com","version":"4.1.7","description":"PLG_TINY_XML_DESCRIPTION","group":"","filename":"tinymce"}', '{"mode":"1","skin":"0","mobile":"0","entity_encoding":"raw","lang_mode":"1","text_direction":"ltr","content_css":"1","content_css_custom":"","relative_urls":"1","newlines":"0","invalid_elements":"script,applet,iframe","extended_elements":"","html_height":"550","html_width":"750","resizing":"1","element_path":"1","fonts":"1","paste":"1","searchreplace":"1","insertdate":"1","colors":"1","table":"1","smilies":"1","hr":"1","link":"1","media":"1","print":"1","directionality":"1","fullscreen":"1","alignment":"1","visualchars":"1","visualblocks":"1","nonbreaking":"1","template":"1","blockquote":"1","wordcount":"1","advlist":"1","autosave":"1","contextmenu":"1","inlinepopups":"1","custom_plugin":"","custom_button":""}', '', '', 0, '0000-00-00 00:00:00', 3, 0),
(413, 'plg_editors-xtd_article', 'plugin', 'article', 'editors-xtd', 0, 1, 1, 0, '{"name":"plg_editors-xtd_article","type":"plugin","creationDate":"October 2009","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_ARTICLE_XML_DESCRIPTION","group":"","filename":"article"}', '', '', '', 0, '0000-00-00 00:00:00', 1, 0),
(414, 'plg_editors-xtd_image', 'plugin', 'image', 'editors-xtd', 0, 1, 1, 0, '{"name":"plg_editors-xtd_image","type":"plugin","creationDate":"August 2004","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_IMAGE_XML_DESCRIPTION","group":"","filename":"image"}', '', '', '', 0, '0000-00-00 00:00:00', 2, 0),
(415, 'plg_editors-xtd_pagebreak', 'plugin', 'pagebreak', 'editors-xtd', 0, 1, 1, 0, '{"name":"plg_editors-xtd_pagebreak","type":"plugin","creationDate":"August 2004","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_EDITORSXTD_PAGEBREAK_XML_DESCRIPTION","group":"","filename":"pagebreak"}', '', '', '', 0, '0000-00-00 00:00:00', 3, 0),
(416, 'plg_editors-xtd_readmore', 'plugin', 'readmore', 'editors-xtd', 0, 1, 1, 0, '{"name":"plg_editors-xtd_readmore","type":"plugin","creationDate":"March 2006","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_READMORE_XML_DESCRIPTION","group":"","filename":"readmore"}', '', '', '', 0, '0000-00-00 00:00:00', 4, 0);
INSERT INTO `n1wr9_extensions` (`extension_id`, `name`, `type`, `element`, `folder`, `client_id`, `enabled`, `access`, `protected`, `manifest_cache`, `params`, `custom_data`, `system_data`, `checked_out`, `checked_out_time`, `ordering`, `state`) VALUES
(417, 'plg_search_categories', 'plugin', 'categories', 'search', 0, 1, 1, 0, '{"name":"plg_search_categories","type":"plugin","creationDate":"November 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_SEARCH_CATEGORIES_XML_DESCRIPTION","group":"","filename":"categories"}', '{"search_limit":"50","search_content":"1","search_archived":"1"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(418, 'plg_search_contacts', 'plugin', 'contacts', 'search', 0, 1, 1, 0, '{"name":"plg_search_contacts","type":"plugin","creationDate":"November 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_SEARCH_CONTACTS_XML_DESCRIPTION","group":"","filename":"contacts"}', '{"search_limit":"50","search_content":"1","search_archived":"1"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(419, 'plg_search_content', 'plugin', 'content', 'search', 0, 1, 1, 0, '{"name":"plg_search_content","type":"plugin","creationDate":"November 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_SEARCH_CONTENT_XML_DESCRIPTION","group":"","filename":"content"}', '{"search_limit":"50","search_content":"1","search_archived":"1"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(420, 'plg_search_newsfeeds', 'plugin', 'newsfeeds', 'search', 0, 1, 1, 0, '{"name":"plg_search_newsfeeds","type":"plugin","creationDate":"November 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_SEARCH_NEWSFEEDS_XML_DESCRIPTION","group":"","filename":"newsfeeds"}', '{"search_limit":"50","search_content":"1","search_archived":"1"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(422, 'plg_system_languagefilter', 'plugin', 'languagefilter', 'system', 0, 0, 1, 1, '{"name":"plg_system_languagefilter","type":"plugin","creationDate":"July 2010","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_SYSTEM_LANGUAGEFILTER_XML_DESCRIPTION","group":"","filename":"languagefilter"}', '', '', '', 0, '0000-00-00 00:00:00', 1, 0),
(423, 'plg_system_p3p', 'plugin', 'p3p', 'system', 0, 0, 1, 0, '{"name":"plg_system_p3p","type":"plugin","creationDate":"September 2010","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_P3P_XML_DESCRIPTION","group":"","filename":"p3p"}', '{"headers":"NOI ADM DEV PSAi COM NAV OUR OTRo STP IND DEM"}', '', '', 0, '0000-00-00 00:00:00', 2, 0),
(424, 'plg_system_cache', 'plugin', 'cache', 'system', 0, 0, 1, 1, '{"name":"plg_system_cache","type":"plugin","creationDate":"February 2007","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_CACHE_XML_DESCRIPTION","group":"","filename":"cache"}', '{"browsercache":"0","cachetime":"15"}', '', '', 0, '0000-00-00 00:00:00', 9, 0),
(425, 'plg_system_debug', 'plugin', 'debug', 'system', 0, 1, 1, 0, '{"name":"plg_system_debug","type":"plugin","creationDate":"December 2006","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_DEBUG_XML_DESCRIPTION","group":"","filename":"debug"}', '{"profile":"1","queries":"1","memory":"1","language_files":"1","language_strings":"1","strip-first":"1","strip-prefix":"","strip-suffix":""}', '', '', 0, '0000-00-00 00:00:00', 4, 0),
(426, 'plg_system_log', 'plugin', 'log', 'system', 0, 1, 1, 1, '{"name":"plg_system_log","type":"plugin","creationDate":"April 2007","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_LOG_XML_DESCRIPTION","group":"","filename":"log"}', '', '', '', 0, '0000-00-00 00:00:00', 5, 0),
(427, 'plg_system_redirect', 'plugin', 'redirect', 'system', 0, 0, 1, 1, '{"name":"plg_system_redirect","type":"plugin","creationDate":"April 2009","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_SYSTEM_REDIRECT_XML_DESCRIPTION","group":"","filename":"redirect"}', '', '', '', 0, '0000-00-00 00:00:00', 6, 0),
(428, 'plg_system_remember', 'plugin', 'remember', 'system', 0, 1, 1, 1, '{"name":"plg_system_remember","type":"plugin","creationDate":"April 2007","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_REMEMBER_XML_DESCRIPTION","group":"","filename":"remember"}', '', '', '', 0, '0000-00-00 00:00:00', 7, 0),
(429, 'plg_system_sef', 'plugin', 'sef', 'system', 0, 1, 1, 0, '{"name":"plg_system_sef","type":"plugin","creationDate":"December 2007","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_SEF_XML_DESCRIPTION","group":"","filename":"sef"}', '', '', '', 0, '0000-00-00 00:00:00', 8, 0),
(430, 'plg_system_logout', 'plugin', 'logout', 'system', 0, 1, 1, 1, '{"name":"plg_system_logout","type":"plugin","creationDate":"April 2009","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_SYSTEM_LOGOUT_XML_DESCRIPTION","group":"","filename":"logout"}', '', '', '', 0, '0000-00-00 00:00:00', 3, 0),
(431, 'plg_user_contactcreator', 'plugin', 'contactcreator', 'user', 0, 0, 1, 0, '{"name":"plg_user_contactcreator","type":"plugin","creationDate":"August 2009","author":"Joomla! Project","copyright":"(C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_CONTACTCREATOR_XML_DESCRIPTION","group":"","filename":"contactcreator"}', '{"autowebpage":"","category":"34","autopublish":"0"}', '', '', 0, '0000-00-00 00:00:00', 1, 0),
(432, 'plg_user_joomla', 'plugin', 'joomla', 'user', 0, 1, 1, 0, '{"name":"plg_user_joomla","type":"plugin","creationDate":"December 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_USER_JOOMLA_XML_DESCRIPTION","group":"","filename":"joomla"}', '{"autoregister":"1","mail_to_user":"1","forceLogout":"1"}', '', '', 0, '0000-00-00 00:00:00', 2, 0),
(433, 'plg_user_profile', 'plugin', 'profile', 'user', 0, 0, 1, 0, '{"name":"plg_user_profile","type":"plugin","creationDate":"January 2008","author":"Joomla! Project","copyright":"(C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_USER_PROFILE_XML_DESCRIPTION","group":"","filename":"profile"}', '{"register-require_address1":"1","register-require_address2":"1","register-require_city":"1","register-require_region":"1","register-require_country":"1","register-require_postal_code":"1","register-require_phone":"1","register-require_website":"1","register-require_favoritebook":"1","register-require_aboutme":"1","register-require_tos":"1","register-require_dob":"1","profile-require_address1":"1","profile-require_address2":"1","profile-require_city":"1","profile-require_region":"1","profile-require_country":"1","profile-require_postal_code":"1","profile-require_phone":"1","profile-require_website":"1","profile-require_favoritebook":"1","profile-require_aboutme":"1","profile-require_tos":"1","profile-require_dob":"1"}', '', '', 311, '2016-05-22 13:28:22', 0, 0),
(434, 'plg_extension_joomla', 'plugin', 'joomla', 'extension', 0, 1, 1, 1, '{"name":"plg_extension_joomla","type":"plugin","creationDate":"May 2010","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_EXTENSION_JOOMLA_XML_DESCRIPTION","group":"","filename":"joomla"}', '', '', '', 0, '0000-00-00 00:00:00', 1, 0),
(435, 'plg_content_joomla', 'plugin', 'joomla', 'content', 0, 1, 1, 0, '{"name":"plg_content_joomla","type":"plugin","creationDate":"November 2010","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_CONTENT_JOOMLA_XML_DESCRIPTION","group":"","filename":"joomla"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(436, 'plg_system_languagecode', 'plugin', 'languagecode', 'system', 0, 0, 1, 0, '{"name":"plg_system_languagecode","type":"plugin","creationDate":"November 2011","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_SYSTEM_LANGUAGECODE_XML_DESCRIPTION","group":"","filename":"languagecode"}', '', '', '', 0, '0000-00-00 00:00:00', 10, 0),
(437, 'plg_quickicon_joomlaupdate', 'plugin', 'joomlaupdate', 'quickicon', 0, 1, 1, 1, '{"name":"plg_quickicon_joomlaupdate","type":"plugin","creationDate":"August 2011","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_QUICKICON_JOOMLAUPDATE_XML_DESCRIPTION","group":"","filename":"joomlaupdate"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(438, 'plg_quickicon_extensionupdate', 'plugin', 'extensionupdate', 'quickicon', 0, 1, 1, 1, '{"name":"plg_quickicon_extensionupdate","type":"plugin","creationDate":"August 2011","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_QUICKICON_EXTENSIONUPDATE_XML_DESCRIPTION","group":"","filename":"extensionupdate"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(439, 'plg_captcha_recaptcha', 'plugin', 'recaptcha', 'captcha', 0, 0, 1, 0, '{"name":"plg_captcha_recaptcha","type":"plugin","creationDate":"December 2011","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.4.0","description":"PLG_CAPTCHA_RECAPTCHA_XML_DESCRIPTION","group":"","filename":"recaptcha"}', '{"public_key":"","private_key":"","theme":"clean"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(440, 'plg_system_highlight', 'plugin', 'highlight', 'system', 0, 1, 1, 0, '{"name":"plg_system_highlight","type":"plugin","creationDate":"August 2011","author":"Joomla! Project","copyright":"(C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_SYSTEM_HIGHLIGHT_XML_DESCRIPTION","group":"","filename":"highlight"}', '', '', '', 0, '0000-00-00 00:00:00', 7, 0),
(441, 'plg_content_finder', 'plugin', 'finder', 'content', 0, 0, 1, 0, '{"name":"plg_content_finder","type":"plugin","creationDate":"December 2011","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_CONTENT_FINDER_XML_DESCRIPTION","group":"","filename":"finder"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(442, 'plg_finder_categories', 'plugin', 'categories', 'finder', 0, 1, 1, 0, '{"name":"plg_finder_categories","type":"plugin","creationDate":"August 2011","author":"Joomla! Project","copyright":"(C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_FINDER_CATEGORIES_XML_DESCRIPTION","group":"","filename":"categories"}', '', '', '', 0, '0000-00-00 00:00:00', 1, 0),
(443, 'plg_finder_contacts', 'plugin', 'contacts', 'finder', 0, 1, 1, 0, '{"name":"plg_finder_contacts","type":"plugin","creationDate":"August 2011","author":"Joomla! Project","copyright":"(C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_FINDER_CONTACTS_XML_DESCRIPTION","group":"","filename":"contacts"}', '', '', '', 0, '0000-00-00 00:00:00', 2, 0),
(444, 'plg_finder_content', 'plugin', 'content', 'finder', 0, 1, 1, 0, '{"name":"plg_finder_content","type":"plugin","creationDate":"August 2011","author":"Joomla! Project","copyright":"(C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_FINDER_CONTENT_XML_DESCRIPTION","group":"","filename":"content"}', '', '', '', 0, '0000-00-00 00:00:00', 3, 0),
(445, 'plg_finder_newsfeeds', 'plugin', 'newsfeeds', 'finder', 0, 1, 1, 0, '{"name":"plg_finder_newsfeeds","type":"plugin","creationDate":"August 2011","author":"Joomla! Project","copyright":"(C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_FINDER_NEWSFEEDS_XML_DESCRIPTION","group":"","filename":"newsfeeds"}', '', '', '', 0, '0000-00-00 00:00:00', 4, 0),
(447, 'plg_finder_tags', 'plugin', 'tags', 'finder', 0, 1, 1, 0, '{"name":"plg_finder_tags","type":"plugin","creationDate":"February 2013","author":"Joomla! Project","copyright":"(C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_FINDER_TAGS_XML_DESCRIPTION","group":"","filename":"tags"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(448, 'plg_twofactorauth_totp', 'plugin', 'totp', 'twofactorauth', 0, 0, 1, 0, '{"name":"plg_twofactorauth_totp","type":"plugin","creationDate":"August 2013","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.2.0","description":"PLG_TWOFACTORAUTH_TOTP_XML_DESCRIPTION","group":"","filename":"totp"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(449, 'plg_authentication_cookie', 'plugin', 'cookie', 'authentication', 0, 1, 1, 0, '{"name":"plg_authentication_cookie","type":"plugin","creationDate":"July 2013","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_AUTH_COOKIE_XML_DESCRIPTION","group":"","filename":"cookie"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(450, 'plg_twofactorauth_yubikey', 'plugin', 'yubikey', 'twofactorauth', 0, 0, 1, 0, '{"name":"plg_twofactorauth_yubikey","type":"plugin","creationDate":"September 2013","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.2.0","description":"PLG_TWOFACTORAUTH_YUBIKEY_XML_DESCRIPTION","group":"","filename":"yubikey"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(451, 'plg_search_tags', 'plugin', 'tags', 'search', 0, 1, 1, 0, '{"name":"plg_search_tags","type":"plugin","creationDate":"March 2014","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_SEARCH_TAGS_XML_DESCRIPTION","group":"","filename":"tags"}', '{"search_limit":"50","show_tagged_items":"1"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(503, 'beez3', 'template', 'beez3', '', 0, 1, 1, 0, '{"name":"beez3","type":"template","creationDate":"25 November 2009","author":"Angie Radtke","copyright":"Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.","authorEmail":"a.radtke@derauftritt.de","authorUrl":"http:\\/\\/www.der-auftritt.de","version":"3.1.0","description":"TPL_BEEZ3_XML_DESCRIPTION","group":"","filename":"templateDetails"}', '{"wrapperSmall":"53","wrapperLarge":"72","sitetitle":"","sitedescription":"","navposition":"center","templatecolor":"nature"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(504, 'hathor', 'template', 'hathor', '', 1, 1, 1, 0, '{"name":"hathor","type":"template","creationDate":"May 2010","author":"Andrea Tarr","copyright":"Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.","authorEmail":"hathor@tarrconsulting.com","authorUrl":"http:\\/\\/www.tarrconsulting.com","version":"3.0.0","description":"TPL_HATHOR_XML_DESCRIPTION","group":"","filename":"templateDetails"}', '{"showSiteName":"0","colourChoice":"0","boldText":"0"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(506, 'protostar', 'template', 'protostar', '', 0, 1, 1, 0, '{"name":"protostar","type":"template","creationDate":"4\\/30\\/2012","author":"Kyle Ledbetter","copyright":"Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"","version":"1.0","description":"TPL_PROTOSTAR_XML_DESCRIPTION","group":"","filename":"templateDetails"}', '{"templateColor":"","logoFile":"","googleFont":"1","googleFontName":"Open+Sans","fluidContainer":"0"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(507, 'isis', 'template', 'isis', '', 1, 1, 1, 0, '{"name":"isis","type":"template","creationDate":"3\\/30\\/2012","author":"Kyle Ledbetter","copyright":"Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"","version":"1.0","description":"TPL_ISIS_XML_DESCRIPTION","group":"","filename":"templateDetails"}', '{"templateColor":"","logoFile":""}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(600, 'English (en-GB)', 'language', 'en-GB', '', 0, 1, 1, 1, '{"name":"English (en-GB)","type":"language","creationDate":"2013-03-07","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.4.3","description":"en-GB site language","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(601, 'English (en-GB)', 'language', 'en-GB', '', 1, 1, 1, 1, '{"name":"English (en-GB)","type":"language","creationDate":"2013-03-07","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.4.3","description":"en-GB administrator language","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(700, 'files_joomla', 'file', 'joomla', '', 0, 1, 1, 1, '{"name":"files_joomla","type":"file","creationDate":"December 2015","author":"Joomla! Project","copyright":"(C) 2005 - 2015 Open Source Matters. All rights reserved","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.4.8","description":"FILES_JOOMLA_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10000, 'Russian', 'language', 'ru-RU', '', 0, 1, 0, 0, '{"name":"Russian","type":"language","creationDate":"2015-05-29","author":"Russian Translation Team","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved","authorEmail":"smart@joomlaportal.ru","authorUrl":"www.joomlaportal.ru","version":"3.4.1.3","description":"Russian language pack (site) for Joomla! 3.4.1","group":"","filename":"install"}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10001, 'Russian', 'language', 'ru-RU', '', 1, 1, 0, 0, '{"name":"Russian","type":"language","creationDate":"2015-05-29","author":"Russian Translation Team","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved","authorEmail":"smart@joomlaportal.ru","authorUrl":"www.joomlaportal.ru","version":"3.4.1.3","description":"Russian language pack (administrator) for Joomla! 3.4.1","group":"","filename":"install"}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10002, 'Russian Language Pack', 'package', 'pkg_ru-RU', '', 0, 1, 1, 0, '{"name":"Russian Language Pack","type":"package","creationDate":"Unknown","author":"Unknown","copyright":"","authorEmail":"","authorUrl":"","version":"3.4.1.3","description":"Joomla 3.4 Russian Language Package","group":"","filename":"pkg_ru-RU"}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10003, 'com_easyblog', 'component', 'com_easyblog', '', 1, 1, 0, 0, '{"name":"com_easyblog","type":"component","creationDate":"19th January 2016","author":"Stack Ideas Sdn Bhd","copyright":"Copyright 2009 - 2015 Stack Ideas Sdn Bhd. All rights reserved.","authorEmail":"support@stackideas.com","authorUrl":"http:\\/\\/stackideas.com","version":"5.0.32","description":"\\n\\t\\tEasyBlog is a Joomla! blog extension that simplifies your day to day blogging experience with Joomla. Coupled with a powerful multiple bloggers platform.\\n\\t","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10004, 'EasyBlog - Archive Module', 'module', 'mod_easyblogarchive', '', 0, 1, 1, 0, '{"name":"EasyBlog - Archive Module","type":"module","creationDate":"19th January 2016","author":"Stack Ideas Sdn Bhd","copyright":"Copyright 2009 - 2015 Stack Ideas Sdn Bhd. All rights reserved.","authorEmail":"support@stackideas.com","authorUrl":"http:\\/\\/stackideas.com","version":"5.0.32","description":"The module displays a list of archived months in years for blog posts created within EasyBlog.","group":"","filename":"mod_easyblogarchive"}', '{"filter":"all","bloggerId":"","teamId":"","count":"0","showfuture":"1","showempty":"1","showemptyyear":"1","collapse":"0","order":"asc","cache":"0","cache_time":"900"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10005, 'EasyBlog - Biography Module', 'module', 'mod_easyblogbio', '', 0, 1, 1, 0, '{"name":"EasyBlog - Biography Module","type":"module","creationDate":"19th January 2016","author":"Stack Ideas Sdn Bhd","copyright":"Copyright 2009 - 2015 Stack Ideas Sdn Bhd. All rights reserved.","authorEmail":"support@stackideas.com","authorUrl":"http:\\/\\/stackideas.com","version":"5.0.32","description":"Bio module which displays current blog''s author in a module.","group":"","filename":"mod_easyblogbio"}', '{"biolimit":"100","showavatar":"1","showbio":"1","cache":"0","cache_time":"900"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10006, 'EasyBlog - Calendar Module', 'module', 'mod_easyblogcalendar', '', 0, 1, 1, 0, '{"name":"EasyBlog - Calendar Module","type":"module","creationDate":"19th January 2016","author":"Stack Ideas Sdn Bhd","copyright":"Copyright 2009 - 2015 Stack Ideas Sdn Bhd. All rights reserved.","authorEmail":"support@stackideas.com","authorUrl":"http:\\/\\/stackideas.com","version":"5.0.32","description":"Displays a calendar on the site. It also displays the number of posts available on the specific dates.","group":"","filename":"mod_easyblogcalendar"}', '{"cache":"0"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10007, 'Easyblog - Categories Module', 'module', 'mod_easyblogcategories', '', 0, 1, 1, 0, '{"name":"Easyblog - Categories Module","type":"module","creationDate":"19th January 2016","author":"Stack Ideas Sdn Bhd","copyright":"Copyright 2009 - 2015 Stack Ideas Sdn Bhd. All rights reserved.","authorEmail":"support@stackideas.com","authorUrl":"http:\\/\\/stackideas.com","version":"5.0.32","description":"\\n\\t\\tLists down categories which are created in EasyBlog.\\n\\t","group":"","filename":"mod_easyblogcategories"}', '{"order":"popular","catid":"","count":"","showcount":"0","hideemptypost":"1","showcavatar":"1","showrss":"1","cache":"0","cache_time":"900"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10008, 'EasyBlog - Image Wall Module', 'module', 'mod_easyblogimagewall', '', 0, 1, 1, 0, '{"name":"EasyBlog - Image Wall Module","type":"module","creationDate":"19th January 2016","author":"Stack Ideas Sdn Bhd","copyright":"Copyright 2009 - 2015 Stack Ideas Sdn Bhd. All rights reserved.","authorEmail":"support@stackideas.com","authorUrl":"http:\\/\\/stackideas.com","version":"5.0.32","description":"\\n\\t\\tDisplays a list of blog posts represented as an image stream in a module.\\n\\t","group":"","filename":"mod_easyblogimagewall"}', '{"count":"5","catid":"","columns":"1","sorting":"latest","ordering":"desc","cache":"0","cache_time":"900"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10009, 'EasyBlog - Latest Bloggers Module', 'module', 'mod_easybloglatestblogger', '', 0, 1, 1, 0, '{"name":"EasyBlog - Latest Bloggers Module","type":"module","creationDate":"19th January 2016","author":"Stack Ideas Sdn Bhd","copyright":"Copyright 2009 - 2015 Stack Ideas Sdn Bhd. All rights reserved.","authorEmail":"support@stackideas.com","authorUrl":"http:\\/\\/stackideas.com","version":"5.0.32","description":"Latest bloggers module for your EasyBlog''s component.","group":"","filename":"mod_easybloglatestblogger"}', '{"count":"5","showavatar":"1","showbio":"1","bio_length":"50","showwebsite":"1","showcount":"1","excludeemptypost":"0","onlyfeatured":"0","ordertype":"DESC","cache":"0","cache_time":"900"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10010, 'EasyBlog - Latest Blogs Module', 'module', 'mod_easybloglatestblogs', '', 0, 1, 1, 0, '{"name":"EasyBlog - Latest Blogs Module","type":"module","creationDate":"19th January 2016","author":"Stack Ideas Sdn Bhd","copyright":"Copyright 2009 - 2015 Stack Ideas Sdn Bhd. All rights reserved.","authorEmail":"support@stackideas.com","authorUrl":"http:\\/\\/stackideas.com","version":"5.0.32","description":"\\n\\t\\tLatest blogs by module for your EasyBlog''s component.","group":"","filename":"mod_easybloglatestblogs"}', '{"type":"0","layout":"vertical","column":"3","allentrieslink":"0","catid":"","usefeatured":"0","bloggerlisttype":"include","bloggerlist":"","showbavatar":"1","showwebsite":"1","showbcount":"1","biography_length":"50","cid":"0","showcavatar":"1","showccount":"1","tagid":"","showtcount":"1","tid":"","showtavatar":"1","trigger_plugins":"0","striptags":"0","dateformat":"%d %B %Y","count":"5","showintro":"-1","postType":"all","textcount":"0","showauthor":"1","showavatar":"1","showcommentcount":"1","showratings":"1","enableratings":"1","showhits":"1","showreadmore":"1","showdate":"1","showcategory":"1","includesubcategory":"0","sortby":"0","photo_show":"1","photo_legacy":"1","show_photo_placeholder":"0","photo_size":"default","video_show":"1","video_width":"250","video_height":"250","cache":"0","cache_time":"900"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10011, 'EasyBlog - Latest Comments Module', 'module', 'mod_easybloglatestcomment', '', 0, 1, 1, 0, '{"name":"EasyBlog - Latest Comments Module","type":"module","creationDate":"19th January 2016","author":"Stack Ideas Sdn Bhd","copyright":"Copyright 2009 - 2015 Stack Ideas Sdn Bhd. All rights reserved.","authorEmail":"support@stackideas.com","authorUrl":"http:\\/\\/stackideas.com","version":"5.0.32","description":"The module will list down recent comments that user has contributed in the site through EasyBlog.","group":"","filename":"mod_easybloglatestcomment"}', '{"count":"5","showprivate":"1","showtitle":"1","showavatar":"1","showauthor":"1","dateformat":"%d.%m.%Y","maxcommenttext":"100","maxtitletext":"30","cache":"0","cache_time":"900"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10012, 'EasyBlog - Posts List', 'module', 'mod_easybloglist', '', 0, 1, 1, 0, '{"name":"EasyBlog - Posts List","type":"module","creationDate":"19th January 2016","author":"Stack Ideas Sdn Bhd","copyright":"Copyright 2009 - 2015 Stack Ideas Sdn Bhd. All rights reserved.","authorEmail":"support@stackideas.com","authorUrl":"http:\\/\\/stackideas.com","version":"5.0.32","description":"This module displays a select list for user to quickly browse a blog post.","group":"","filename":"mod_easybloglist"}', '{"count":"5","catid":"","sorting":"latest","ordering":"desc","cache":"0","cache_time":"900"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10013, 'EasyBlog - Most Commented Post Module', 'module', 'mod_easyblogmostcommentedpost', '', 0, 1, 1, 0, '{"name":"EasyBlog - Most Commented Post Module","type":"module","creationDate":"19th January 2016","author":"Stack Ideas Sdn Bhd","copyright":"Copyright 2009 - 2015 Stack Ideas Sdn Bhd. All rights reserved.","authorEmail":"support@stackideas.com","authorUrl":"http:\\/\\/stackideas.com","version":"5.0.32","description":"Most commented post module for your EasyBlog''s component.","group":"","filename":"mod_easyblogmostcommentedpost"}', '{"layout":"vertical","column":"4","count":"5","catid":"","showprivate":"1","showintro":"0","textcount":"200","showlatestcomment":"1","showcount":"1","showratings":"1","enableratings":"1","showhits":"1","showavatar":"1","showreadmore":"1","showauthor":"1","showdate":"1","@spacer":"","video_show":"1","video_width":"250","video_height":"250","photo_show":"1","photo_width":"250","photo_height":"250","alignment":"default","photo_size":"default","photo_responsive":"1","cache":"0","cache_time":"900"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10014, 'EasyBlog - Most Popular Post Module', 'module', 'mod_easyblogmostpopularpost', '', 0, 1, 1, 0, '{"name":"EasyBlog - Most Popular Post Module","type":"module","creationDate":"19th January 2016","author":"Stack Ideas Sdn Bhd","copyright":"Copyright 2009 - 2015 Stack Ideas Sdn Bhd. All rights reserved.","authorEmail":"support@stackideas.com","authorUrl":"http:\\/\\/stackideas.com","version":"5.0.32","description":"Most popular post module for your EasyBlog''s component.","group":"","filename":"mod_easyblogmostpopularpost"}', '{"layout":"vertical","column":"4","count":"5","textcount":"200","showintro":"0","catid":"","showcommentcount":"1","showratings":"1","enableratings":"1","showhits":"1","showavatar":"1","showreadmore":"1","showauthor":"1","showdate":"1","showcategory":"1","show_post_type_icon":"1","photo_show":"1","photo_legacy":"1","photo_size":"default","alignment":"center","video_show":"1","video_width":"250","video_height":"250","cache":"0","cache_time":"900"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10015, 'EasyBlog - Post Map Module', 'module', 'mod_easyblogpostmap', '', 0, 1, 1, 0, '{"name":"EasyBlog - Post Map Module","type":"module","creationDate":"19th January 2016","author":"Stack Ideas Sdn Bhd","copyright":"Copyright 2009 - 2015 Stack Ideas Sdn Bhd. All rights reserved.","authorEmail":"support@stackideas.com","authorUrl":"http:\\/\\/stackideas.com","version":"5.0.32","description":"Post map using Google Maps for your EasyBlog''s component","group":"","filename":"mod_easyblogpostmap"}', '{"type":"0","count":"5","showimage":"1","showauthor":"1","showavatar":"1","showaddress":"1","showhits":"1","showratings":"1","enableratings":"1","showcommentcount":"1","usefeatured":"0","bloggerid":"","categoryid":"","tagid":"","teamid":"","fluid":"1","mapwidth":"600","mapheight":"600","infowidth":"250","featuredimgwidth":"230","featuredimgheight":"150","mapui":"0","fitbounds":"1","zoom":"15","language":"en"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10016, 'EasyBlog - Post Meta Module', 'module', 'mod_easyblogpostmeta', '', 0, 1, 1, 0, '{"name":"EasyBlog - Post Meta Module","type":"module","creationDate":"19th January 2016","author":"Stack Ideas Sdn Bhd","copyright":"Copyright 2009 - 2015 Stack Ideas Sdn Bhd. All rights reserved.","authorEmail":"support@stackideas.com","authorUrl":"http:\\/\\/stackideas.com","version":"5.0.32","description":"This module displays the meta for the current blog post a user is currently viewing.\\n\\t","group":"","filename":"mod_easyblogpostmeta"}', '{"showAuthor":"1","showavatar":"1","showcommentcount":"1","showDate":"1","showhits":"1","showcategory":"1","cache":"0","cache_time":"900"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10017, 'EasyBlog - Quick Post Module', 'module', 'mod_easyblogquickpost', '', 0, 1, 1, 0, '{"name":"EasyBlog - Quick Post Module","type":"module","creationDate":"19th January 2016","author":"Stack Ideas Sdn Bhd","copyright":"Copyright 2009 - 2015 Stack Ideas Sdn Bhd. All rights reserved.","authorEmail":"support@stackideas.com","authorUrl":"http:\\/\\/stackideas.com","version":"5.0.32","description":"\\n\\t\\t\\n\\t\\tThis module displays quick post option.\\n\\t\\t\\n\\t","group":"","filename":"mod_easyblogquickpost"}', '{"cache":"0","cache_time":"900"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10018, 'EasyBlog - Random Post Module', 'module', 'mod_easyblograndompost', '', 0, 1, 1, 0, '{"name":"EasyBlog - Random Post Module","type":"module","creationDate":"19th January 2016","author":"Stack Ideas Sdn Bhd","copyright":"Copyright 2009 - 2015 Stack Ideas Sdn Bhd. All rights reserved.","authorEmail":"support@stackideas.com","authorUrl":"http:\\/\\/stackideas.com","version":"5.0.32","description":"Displays random blog posting from EasyBlog.","group":"","filename":"mod_easyblograndompost"}', '{"layout":"vertical","column":"4","total":"5","catid":"","showintro":"0","textcount":"200","showcommentcount":"1","showratings":"1","enableratings":"1","showhits":"1","showavatar":"1","showreadmore":"1","showauthor":"1","showdate":"1","photo_show":"1","photo_legacy":"1","photo_size":"default","alignment":"center","video_show":"1","video_width":"250","video_height":"250","cache":"0","cache_time":"900"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10019, 'EasyBlog - Related Posts Module', 'module', 'mod_easyblogrelatedpost', '', 0, 1, 1, 0, '{"name":"EasyBlog - Related Posts Module","type":"module","creationDate":"19th January 2016","author":"Stack Ideas Sdn Bhd","copyright":"Copyright 2009 - 2015 Stack Ideas Sdn Bhd. All rights reserved.","authorEmail":"support@stackideas.com","authorUrl":"http:\\/\\/stackideas.com","version":"5.0.32","description":"\\n\\t\\t\\n\\t\\tThis module displays a list of related blog post based on the current blog post a user is currently viewing.\\n\\t\\t\\n\\t","group":"","filename":"mod_easyblogrelatedpost"}', '{"striptags":"0","count":"5","showintro":"-1","textcount":"0","showcontent":"1","showicon":"1","showauthor":"1","showavatar":"1","showcommentcount":"1","showratings":"1","enableratings":"1","showhits":"1","showreadmore":"1","showdate":"1","showcategory":"1","includesubcategory":"0","sortby":"0","photo_show":"1","photo_legacy":"1","photo_size":"medium","alignment":"center","video_show":"1","video_width":"250","video_height":"250","cache":"0","cache_time":"900"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10020, 'EasyBlog - Search Blogs Module', 'module', 'mod_easyblogsearch', '', 0, 1, 1, 0, '{"name":"EasyBlog - Search Blogs Module","type":"module","creationDate":"19th January 2016","author":"Stack Ideas Sdn Bhd","copyright":"Copyright 2009 - 2015 Stack Ideas Sdn Bhd. All rights reserved.","authorEmail":"support@stackideas.com","authorUrl":"http:\\/\\/stackideas.com","version":"5.0.32","description":"A simple form which allows users to search for blog posts","group":"","filename":"mod_easyblogsearch"}', '{"cache":"0"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10021, 'EasyBlog - Showcase Module', 'module', 'mod_easyblogshowcase', '', 0, 1, 1, 0, '{"name":"EasyBlog - Showcase Module","type":"module","creationDate":"19th January 2016","author":"Stack Ideas Sdn Bhd","copyright":"Copyright 2009 - 2015 Stack Ideas Sdn Bhd. All rights reserved.","authorEmail":"support@stackideas.com","authorUrl":"http:\\/\\/stackideas.com","version":"5.0.32","description":"This module allows you to choose several display mode for the posts on the site.","group":"","filename":"mod_easyblogshowcase"}', '{"count":"5","catid":"0","subcat":"1","textlimit":"200","showposttype":"featured","showratings":"1","enableratings":"1","contentfrom":"content","showreadmore":"1","autoshuffle":"0","authoravatar":"1","avatarwidth":"50","avatarheight":"50","contentauthor":"1","contentdate":"1","autorotate":"1","autorotate_seconds":"30","photo_show":"1","photo_legacy":"1","photo_size":"default","alignment":"left","cache":"0","cache_time":"900"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10022, 'EasyBlog - Subscribe Module', 'module', 'mod_easyblogsubscribe', '', 0, 1, 1, 0, '{"name":"EasyBlog - Subscribe Module","type":"module","creationDate":"19th January 2016","author":"Stack Ideas Sdn Bhd","copyright":"Copyright 2009 - 2015 Stack Ideas Sdn Bhd. All rights reserved.","authorEmail":"support@stackideas.com","authorUrl":"http:\\/\\/stackideas.com","version":"5.0.32","description":"Displays a subscribe to blog link in a module.","group":"","filename":"mod_easyblogsubscribe"}', '{"type":"1","cache":"0","cache_time":"900"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10023, 'EasyBlog - Subscribers Listing Module', 'module', 'mod_easyblogsubscribers', '', 0, 1, 1, 0, '{"name":"EasyBlog - Subscribers Listing Module","type":"module","creationDate":"19th January 2016","author":"Stack Ideas Sdn Bhd","copyright":"Copyright 2009 - 2015 Stack Ideas Sdn Bhd. All rights reserved.","authorEmail":"support@stackideas.com","authorUrl":"http:\\/\\/stackideas.com","version":"5.0.32","description":"This module renders a list of subscribers for the current blog post that is being viewed in EasyBlog.","group":"","filename":"mod_easyblogsubscribers"}', '{"cache":"0","cache_time":"900"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10024, 'EasyBlog - Tag Cloud Module', 'module', 'mod_easyblogtagcloud', '', 0, 1, 1, 0, '{"name":"EasyBlog - Tag Cloud Module","type":"module","creationDate":"19th January 2016","author":"Stack Ideas Sdn Bhd","copyright":"Copyright 2009 - 2015 Stack Ideas Sdn Bhd. All rights reserved.","authorEmail":"support@stackideas.com","authorUrl":"http:\\/\\/stackideas.com","version":"5.0.32","description":"This module will list down tags created through EasyBlog in a tag cloud layout.","group":"","filename":"mod_easyblogtagcloud"}', '{"layout":"default","order":"postcount","sort":"desc","count":"0","cache":"0","cache_time":"900","shuffleTags":"1","minsize":"10","maxsize":"30"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10025, 'EasyBlog - Team Blogs Module', 'module', 'mod_easyblogteamblogs', '', 0, 1, 1, 0, '{"name":"EasyBlog - Team Blogs Module","type":"module","creationDate":"19th January 2016","author":"Stack Ideas Sdn Bhd","copyright":"Copyright 2009 - 2015 Stack Ideas Sdn Bhd. All rights reserved.","authorEmail":"support@stackideas.com","authorUrl":"http:\\/\\/stackideas.com","version":"5.0.32","description":"Displays a list of team blogs that are created in EasyBlog in the module.","group":"","filename":"mod_easyblogteamblogs"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10026, 'EasyBlog - Ticker Module', 'module', 'mod_easyblogticker', '', 0, 1, 1, 0, '{"name":"EasyBlog - Ticker Module","type":"module","creationDate":"19th January 2016","author":"Stack Ideas Sdn Bhd","copyright":"Copyright 2009 - 2015 Stack Ideas Sdn Bhd. All rights reserved.","authorEmail":"support@stackideas.com","authorUrl":"http:\\/\\/stackideas.com","version":"5.0.32","description":"Displays ticker-like view for latest post","group":"","filename":"mod_easyblogticker"}', '{"count":"5","catid":"0","cache":"0","cache_time":"900"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10027, 'EasyBlog - Top Blogs Module', 'module', 'mod_easyblogtopblogs', '', 0, 1, 1, 0, '{"name":"EasyBlog - Top Blogs Module","type":"module","creationDate":"19th January 2016","author":"Stack Ideas Sdn Bhd","copyright":"Copyright 2009 - 2015 Stack Ideas Sdn Bhd. All rights reserved.","authorEmail":"support@stackideas.com","authorUrl":"http:\\/\\/stackideas.com","version":"5.0.32","description":"\\n\\t\\tTop rated blog entries will display a list of blog entries that are highly rated.","group":"","filename":"mod_easyblogtopblogs"}', '{"layout":"vertical","column":"4","count":"5","catid":"","textcount":"200","showintro":"0","showprivate":"1","showratings":"1","enableratings":"1","showcommentcount":"1","showhits":"1","showavatar":"1","showreadmore":"1","showauthor":"1","showdate":"1","category_title":"1","photo_show":"1","photo_legacy":"1","photo_size":"medium","alignment":"center","video_show":"1","video_width":"250","video_height":"250","cache":"0","cache_time":"900"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10028, 'EasyBlog - Welcome Module', 'module', 'mod_easyblogwelcome', '', 0, 1, 1, 0, '{"name":"EasyBlog - Welcome Module","type":"module","creationDate":"19th January 2016","author":"Stack Ideas Sdn Bhd","copyright":"Copyright 2009 - 2015 Stack Ideas Sdn Bhd. All rights reserved.","authorEmail":"support@stackideas.com","authorUrl":"http:\\/\\/stackideas.com","version":"5.0.32","description":"A module that provides users login and will welcome the users if they are already logged in. Also consist of all sort of shortcut for easy access to EasyBlog''s features.","group":"","filename":"mod_easyblogwelcome"}', '{"display_avatar":"1","enable_login":"1","usesecure":"0","login":"none","logout":"none","cache":"0"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10029, 'EasyBlog - Auto Article', 'plugin', 'autoarticle', 'easyblog', 0, 0, 1, 0, '{"name":"EasyBlog - Auto Article","type":"plugin","creationDate":"24 Sept 2010","author":"Stack Ideas Sdn Bhd","copyright":"Copyright 2009 - 2010 StackIdeas. All rights reserved.","authorEmail":"support@stackideas.com","authorUrl":"http:\\/\\/www.stackideas.com","version":"5.0.1","description":"\\n\\t\\tEasyBlog auto article creation\\n\\t","group":"","filename":"autoarticle"}', '{"status":"0","access":"-1","frontpage":"1","unpublish":"0","sectionCategory":"0","autocategory":"0"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10030, 'Smart Search - EasyBlog Posts', 'plugin', 'easyblog', 'finder', 0, 1, 1, 0, '{"name":"Smart Search - EasyBlog Posts","type":"plugin","creationDate":"March 2012","author":"Stack Ideas Sdn Bhd","copyright":"Copyright 2009 - 2012 StackIdeas. All rights reserved.","authorEmail":"support@stackideas.com","authorUrl":"http:\\/\\/www.stackideas.com","version":"3.5.0","description":"This plugin indexes EasyBlog blog entries in Smart Search.","group":"","filename":"easyblog"}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10031, 'Search - Easy Blog', 'plugin', 'easyblog', 'search', 0, 1, 1, 0, '{"name":"Search - Easy Blog","type":"plugin","creationDate":"12\\/05\\/2010","author":"StackIdeas Private Limited","copyright":"Copyright (C) 2009 - 2010 StackIdeas Private Limited. All rights reserved.","authorEmail":"support@stackideas.com","authorUrl":"stackideas.com","version":"3.7.0","description":"Allows user to search for blog entries created from Easy Blog","group":"","filename":"easyblog"}', '{"limit":"50"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10032, 'User - EasyBlog Users', 'plugin', 'easyblogusers', 'user', 0, 1, 1, 0, '{"name":"User - EasyBlog Users","type":"plugin","creationDate":"03 June 2010","author":"Stack Ideas Sdn Bhd","copyright":"Copyright 2009 - 2010 StackIdeas. All rights reserved.","authorEmail":"support@stackideas.com","authorUrl":"http:\\/\\/www.stackideas.com","version":"5.0.1","description":"EasyBlog user plugin. This plugin is responsible to delete user''s related records such as blog post and etc.","group":"","filename":"easyblogusers"}', '{"show_subscribe":"0"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10033, 'Community', 'component', 'com_community', '', 1, 1, 0, 0, '{"name":"Community","type":"component","creationDate":"July 2011","author":"JomSocial Team","copyright":"Copyright 2008 by Slashes & Dots Sdn Bhd. All rights reserved","authorEmail":"support@jomsocial.com","authorUrl":"http:\\/\\/www.jomsocial.com","version":"4.1.6 Pro","description":"JomSocial is a social networking component for Joomla!","group":"","filename":"community"}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10034, 'System - JomSocial System', 'plugin', 'jomsocial.system', 'system', 0, 1, 1, 0, '{"name":"System - JomSocial System","type":"plugin","creationDate":"July 2011","author":"JomSocial Team","copyright":"Copyright 2008 - 2010 by Slashes & Dots Sdn Bhd. All rights reserved","authorEmail":"support@jomsocial.com","authorUrl":"http:\\/\\/www.jomsocial.com","version":"4.1.6","description":"\\n\\t\\tAjax System for Joomla, JomSocial.com\\n\\t","group":"","filename":"jomsocial.system"}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10035, 'System - Jomsocial Facebook Connect', 'plugin', 'jomsocialconnect', 'system', 0, 1, 1, 0, '{"name":"System - Jomsocial Facebook Connect","type":"plugin","creationDate":"March 2011","author":"JomSocial","copyright":"Copyright (C) 2008 - 2009. All rights reserved.","authorEmail":"support@jomsocial.com","authorUrl":"http:\\/\\/www.jomsocial.com","version":"4.1.6","description":"PLG_JOMSOCIALCONNECT_XML_DESCRIPTION","group":"","filename":"jomsocialconnect"}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10036, 'System - Jomsocial Redirect', 'plugin', 'jomsocialredirect', 'system', 0, 0, 1, 0, '{"name":"System - Jomsocial Redirect","type":"plugin","creationDate":"Aug 11 2011","author":"JomSocial Team","copyright":"Copyright 2008 - 2010 by Slashes & Dots Sdn Bhd. All rights reserved","authorEmail":"support@jomsocial.com","authorUrl":"http:\\/\\/jomsocial.com","version":"4.1.6","description":"","group":"","filename":"jomsocialredirect"}', '{"override_com_user_registration":"1","redirect_previous":"0","redirect_login":"1","redirect_login_msg":"LOGIN_SUCCESSFUL","redirect_login_failed":"1","redirect_login_failed_msg":"LOGIN_FAILED","redirect_logout":"1","redirect_logout_msg":"YOU_HAVE_LOGGED_OUT","redirect_registration_msg":"REDIRECTED_TO_COMMUNITY_REGISTRATION"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10037, 'User - Jomsocial User', 'plugin', 'jomsocialuser', 'user', 0, 1, 1, 0, '{"name":"User - Jomsocial User","type":"plugin","creationDate":"March 2011","author":"JomSocial","copyright":"Copyright 2008 - 2010 by Slashes & Dots Sdn Bhd. All rights reserved","authorEmail":"support@jomsocial.com","authorUrl":"http:\\/\\/www.jomsocial.com","version":"4.1.6","description":"PLG_JOMSOCIALUSER_XML_DESCRIPTION","group":"","filename":"jomsocialuser"}', '{"delete_jommla_contact":"0"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10038, 'PLG_MUTUALFRIENDS_TITLE', 'plugin', 'mutualfriends', 'community', 0, 0, 1, 0, '{"name":"PLG_MUTUALFRIENDS_TITLE","type":"plugin","creationDate":"July 2015","author":"iJoomla","copyright":"Copyright (C) 2008 - 2015 iJoomla. All rights reserved.","authorEmail":"support@jomsocial.com","authorUrl":"http:\\/\\/jomsocial.com","version":"4.1.6","description":"PLG_MUTUALFRIENDS_XML_DESCRIPTION","group":"","filename":"mutualfriends"}', '{"title_override":"","favicon":"","desc_override":"","count":"12","coreapp":"0","position":"content","hide_empty":"1"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10039, 'PLG_MYARTICLES_TITLE', 'plugin', 'myarticles', 'community', 0, 0, 1, 0, '{"name":"PLG_MYARTICLES_TITLE","type":"plugin","creationDate":"July 2015","author":"iJoomla","copyright":"Copyright (C) 2008 - 2015 iJoomla. All rights reserved.","authorEmail":"support@jomsocial.com","authorUrl":"http:\\/\\/jomsocial.com","version":"4.1.6","description":"PLG_MYARTICLES_XML_DESCRIPTION","group":"","filename":"myarticles"}', '{"title_override":"","favicon":"","desc_override":"","count":"12","coreapp":"0","position":"content","hide_empty":"1","limit":"50"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10040, 'PLG_MYCONTACTS_TITLE', 'plugin', 'mycontacts', 'community', 0, 0, 1, 0, '{"name":"PLG_MYCONTACTS_TITLE","type":"plugin","creationDate":"July 2015","author":"iJoomla","copyright":"Copyright (C) 2008 - 2015 iJoomla. All rights reserved.","authorEmail":"support@jomsocial.com","authorUrl":"http:\\/\\/jomsocial.com","version":"4.1.6","description":"PLG_MYCONTACTS_XML_DESCRIPTION","group":"","filename":"mycontacts"}', '{"title_override":"","favicon":"","desc_override":"","coreapp":"0","position":"content","hide_empty":"0","hide_empty_fields":"0","home_address":"0","city":"0","postal_code":"0","country":"0","phone_number":"0","mobile_number":"0","fax_number":"0","website":"0","my_company":"0","work_address":"0","comp_website":"0","department":"0","job_title":"0","main_im_id":"0","im_list":"0"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10041, 'PLG_MYEVENTS_TITLE', 'plugin', 'myevents', 'community', 0, 0, 1, 0, '{"name":"PLG_MYEVENTS_TITLE","type":"plugin","creationDate":"July 2015","author":"iJoomla","copyright":"Copyright (C) 2008 - 2015 iJoomla. All rights reserved.","authorEmail":"support@jomsocial.com","authorUrl":"http:\\/\\/jomsocial.com","version":"4.1.6","description":"PLG_MYEVENTS_XML_DESCRIPTION","group":"","filename":"myevents"}', '{"title_override":"","favicon":"","desc_override":"","count":"12","coreapp":"0","position":"content","hide_empty":"1"}', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `n1wr9_extensions` (`extension_id`, `name`, `type`, `element`, `folder`, `client_id`, `enabled`, `access`, `protected`, `manifest_cache`, `params`, `custom_data`, `system_data`, `checked_out`, `checked_out_time`, `ordering`, `state`) VALUES
(10042, 'PLG_MYFRIENDS_TITLE', 'plugin', 'myfriends', 'community', 0, 0, 1, 0, '{"name":"PLG_MYFRIENDS_TITLE","type":"plugin","creationDate":"July 2015","author":"iJoomla","copyright":"Copyright (C) 2008 - 2015 iJoomla. All rights reserved.","authorEmail":"support@jomsocial.com","authorUrl":"http:\\/\\/jomsocial.com","version":"4.1.6","description":"PLG_MYFRIENDS_XML_DESCRIPTION","group":"","filename":"myfriends"}', '{"title_override":"","favicon":"","desc_override":"","count":"12","coreapp":"0","position":"content","hide_empty":"1"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10043, 'PLG_FRIENDSLOCATION_TITLE', 'plugin', 'myfriendslocation', 'community', 0, 0, 1, 0, '{"name":"PLG_FRIENDSLOCATION_TITLE","type":"plugin","creationDate":"July 2015","author":"iJoomla","copyright":"Copyright (C) 2008 - 2015 iJoomla. All rights reserved.","authorEmail":"support@jomsocial.com","authorUrl":"http:\\/\\/jomsocial.com","version":"4.1.6","description":"PLG_FRIENDSLOCATION_XML_DESCRIPTION","group":"","filename":"myfriendslocation"}', '{"title_override":"","favicon":"","desc_override":"","count":"10","coreapp":"0","position":"content","hide_empty":"0","address_field_code":"0","town_field_code":"0","zip_field_code":"0","state_field_code":"0","country_field_code":"0"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10044, 'PLG_MYGOOGLEADS_TITLE', 'plugin', 'mygoogleads', 'community', 0, 0, 1, 0, '{"name":"PLG_MYGOOGLEADS_TITLE","type":"plugin","creationDate":"July 2015","author":"iJoomla","copyright":"Copyright (C) 2008 - 2015 iJoomla. All rights reserved.","authorEmail":"support@jomsocial.com","authorUrl":"http:\\/\\/jomsocial.com","version":"4.1.6","description":"PLG_GOOGLE_XML_DESCRIPTION","group":"","filename":"mygoogleads"}', '{"title_override":"","favicon":"","desc_override":"","coreapp":"0","position":"content"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10045, 'PLG_MYGROUPS_TITLE', 'plugin', 'mygroups', 'community', 0, 0, 1, 0, '{"name":"PLG_MYGROUPS_TITLE","type":"plugin","creationDate":"July 2015","author":"iJoomla","copyright":"Copyright (C) 2008 - 2015 iJoomla. All rights reserved.","authorEmail":"support@jomsocial.com","authorUrl":"http:\\/\\/jomsocial.com","version":"4.1.6","description":"PLG_MYGROUPS_XML_DESCRIPTION","group":"","filename":"mygroups"}', '{"title_override":"","favicon":"","desc_override":"","count":"5","coreapp":"0","position":"content","hide_empty":"1"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10046, 'PLG_KUNENA_TITLE', 'plugin', 'mykunenaposts', 'community', 0, 0, 1, 0, '{"name":"PLG_KUNENA_TITLE","type":"plugin","creationDate":"July 2015","author":"iJoomla","copyright":"Copyright (C) 2008 - 2015 iJoomla. All rights reserved.","authorEmail":"support@jomsocial.com","authorUrl":"http:\\/\\/jomsocial.com","version":"4.1.6","description":"PLG_KUNENA_XML_DESCRIPTION","group":"","filename":"mykunenaposts"}', '{"title_override":"","favicon":"","desc_override":"","count":"6","coreapp":"0","position":"content","hide_empty":"0"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10047, 'PLG_COMMUNITY_MYLATESTPHOTOS_TITLE', 'plugin', 'mylatestphotos', 'community', 0, 0, 1, 0, '{"name":"PLG_COMMUNITY_MYLATESTPHOTOS_TITLE","type":"plugin","creationDate":"July 2015","author":"iJoomla","copyright":"Copyright (C) 2008 - 2015 iJoomla. All rights reserved.","authorEmail":"support@jomsocial.com","authorUrl":"http:\\/\\/jomsocial.com","version":"4.1.6","description":"PLG_COMMUNITY_MYLATESTPHOTOS_XML_DESCRIPTION","group":"","filename":"mylatestphotos"}', '{"title_override":"","favicon":"","desc_override":"","count":"10","coreapp":"0","position":"content","hide_empty":"0"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10048, 'PLG_MYRSSFEEDS_TITLE', 'plugin', 'myrssfeeds', 'community', 0, 0, 1, 0, '{"name":"PLG_MYRSSFEEDS_TITLE","type":"plugin","creationDate":"July 2015","author":"iJoomla","copyright":"Copyright (C) 2008 - 2015 iJoomla. All rights reserved.","authorEmail":"support@jomsocial.com","authorUrl":"http:\\/\\/jomsocial.com","version":"4.1.6","description":"PLG_MYRSSFEEDS_XML_DESCRIPTION","group":"","filename":"myrssfeeds"}', '{"title_override":"","favicon":"","desc_override":"","coreapp":"0","position":"content"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10049, 'PLG_MYTAGGEDVIDEOS_TITLE', 'plugin', 'mytaggedvideos', 'community', 0, 0, 1, 0, '{"name":"PLG_MYTAGGEDVIDEOS_TITLE","type":"plugin","creationDate":"July 2015","author":"iJoomla","copyright":"Copyright (C) 2008 - 2015 iJoomla. All rights reserved.","authorEmail":"support@jomsocial.com","authorUrl":"http:\\/\\/jomsocial.com","version":"4.1.6","description":"PLG_MYTAGGEDVIDEOS_XML_DESCRIPTION","group":"","filename":"mytaggedvideos"}', '{"title_override":"","favicon":"","desc_override":"","count":"6","coreapp":"0","position":"content","hide_empty":"1"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10050, 'PLG_MYVIDEOS_TITLE', 'plugin', 'myvideos', 'community', 0, 0, 1, 0, '{"name":"PLG_MYVIDEOS_TITLE","type":"plugin","creationDate":"July 2015","author":"iJoomla","copyright":"Copyright (C) 2008 - 2015 iJoomla. All rights reserved.","authorEmail":"support@jomsocial.com","authorUrl":"http:\\/\\/jomsocial.com","version":"4.1.6","description":"PLG_MYVIDEOS_XML_DESCRIPTION","group":"","filename":"myvideos"}', '{"title_override":"","favicon":"","desc_override":"","count":"12","coreapp":"0","position":"content","hide_empty":"1"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10051, 'PLG_TWITTER_XML_TITLE', 'plugin', 'twitter', 'community', 0, 0, 1, 0, '{"name":"PLG_TWITTER_XML_TITLE","type":"plugin","creationDate":"July 2015","author":"iJoomla","copyright":"Copyright (C) 2008 - 2015 iJoomla. All rights reserved.","authorEmail":"support@jomsocial.com","authorUrl":"http:\\/\\/jomsocial.com","version":"4.1.6","description":"PLG_TWITTER_XML_DESCRIPTION","group":"","filename":"twitter"}', '{"title_override":"","favicon":"","desc_override":"","coreapp":"0","position":"content","consumerKey":"","consumerSecret":""}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10052, 'PLG_WALLS_TITLE', 'plugin', 'walls', 'community', 0, 1, 1, 0, '{"name":"PLG_WALLS_TITLE","type":"plugin","creationDate":"March 2011","author":"JomSocial Team","copyright":"Copyright 2008 - 2013 by iJoomla, Inc. - All rights reserved.","authorEmail":"support@jomsocial.com","authorUrl":"http:\\/\\/www.jomsocial.com","version":"4.1.6","description":"PLG_WALLS_XML_DESCRIPTION","group":"","filename":"walls"}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10053, 'PLG_WORDFILTER_TITLE', 'plugin', 'wordfilter', 'community', 0, 0, 1, 0, '{"name":"PLG_WORDFILTER_TITLE","type":"plugin","creationDate":"March 2011","author":"JomSocial Team","copyright":"Copyright 2008 - 2013 by iJoomla, Inc. - All rights reserved.","authorEmail":"support@jomsocial.com","authorUrl":"http:\\/\\/www.jomsocial.com","version":"4.1.6","description":"PLG_WORDFILTER_XML_DESCRIPTION","group":"","filename":"wordfilter"}', '{"replacement":"*","badwords":"fuck,shit"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10054, 'JS Activity Stream', 'module', 'mod_community_activitystream', '', 0, 1, 0, 0, '{"name":"JS Activity Stream","type":"module","creationDate":"June 2015","author":"iJoomla","copyright":"Copyright (C) 2008 - 2015 iJoomla. All rights reserved.","authorEmail":"support@jomsocial.com","authorUrl":"http:\\/\\/jomsocial.com","version":"4.1.6","description":"Activity stream module for JomSocial","group":"","filename":"mod_community_activitystream"}', '{"stream_type":"0","limit":"20","cache":"0"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10055, 'JS Discussions', 'module', 'mod_community_discussions', '', 0, 1, 0, 0, '{"name":"JS Discussions","type":"module","creationDate":"June 2015","author":"iJoomla","copyright":"Copyright (C) 2008 - 2015 iJoomla. All rights reserved.","authorEmail":"support@jomsocial.com","authorUrl":"http:\\/\\/jomsocial.com","version":"4.1.6","description":"Discussions module for JomSocial","group":"","filename":"mod_community_discussions"}', '{"displaysetting":"0","show_private_discussion":"1","show_avatar":"0","limit":"10","cache":"0"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10056, 'JS Events', 'module', 'mod_community_events', '', 0, 1, 0, 0, '{"name":"JS Events","type":"module","creationDate":"April 2015","author":"iJoomla","copyright":"Copyright (C) 2008 - 2015 iJoomla. All rights reserved.","authorEmail":"support@jomsocial.com","authorUrl":"http:\\/\\/jomsocial.com","version":"4.1.6","description":"Events module for JomSocial. Display upcoming and current events.","group":"","filename":"mod_community_events"}', '{"displaysetting":"0","filter_by":"0","limit":"5","cache":"0"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10057, 'JS Events Calendar', 'module', 'mod_community_eventscalendar', '', 0, 1, 0, 0, '{"name":"JS Events Calendar","type":"module","creationDate":"April 2015","author":"iJoomla","copyright":"Copyright (C) 2008 - 2015 iJoomla. All rights reserved.","authorEmail":"support@jomsocial.com","authorUrl":"http:\\/\\/jomsocial.com","version":"4.1.6","description":"Events Calendar module for JomSocial","group":"","filename":"mod_community_eventscalendar"}', '{"displaysetting":"0","firstday":"0","cache":"0"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10058, 'JS Groups', 'module', 'mod_community_groups', '', 0, 1, 0, 0, '{"name":"JS Groups","type":"module","creationDate":"April 2015","author":"iJoomla","copyright":"Copyright (C) 2008 - 2015 iJoomla. All rights reserved.","authorEmail":"support@jomsocial.com","authorUrl":"http:\\/\\/jomsocial.com","version":"4.1.6","description":"JS Groups module for JomSocial","group":"","filename":"mod_community_groups"}', '{"displaysetting":"0","filter_by":"0","limit":"5","cache":"0"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10059, 'JS Hello Me', 'module', 'mod_community_hellome', '', 0, 1, 0, 0, '{"name":"JS Hello Me","type":"module","creationDate":"April 2015","author":"iJoomla","copyright":"Copyright (C) 2008 - 2015 iJoomla. All rights reserved.","authorEmail":"support@jomsocial.com","authorUrl":"http:\\/\\/jomsocial.com","version":"4.1.6","description":"Profile module for JomSocial","group":"","filename":"mod_community_hellome"}', '{"show_avatar":"1","show_name":"1","show_badge":"1","show_notifications":"1","show_menu":"1","show_logout":"1","show_facebook":"1","show_forgotpwd":"1","show_forgotusr":"1","show_activation":"1","remember_me":"1","cache":"0"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10060, 'JS Members', 'module', 'mod_community_members', '', 0, 1, 0, 0, '{"name":"JS Members","type":"module","creationDate":"April 2015","author":"iJoomla","copyright":"Copyright (C) 2008 - 2015 iJoomla. All rights reserved.","authorEmail":"support@jomsocial.com","authorUrl":"http:\\/\\/jomsocial.com","version":"4.1.6","description":"Members module for JomSocial","group":"","filename":"mod_community_members"}', '{"profile_filter":"0","sorting":"0","respect_online":"1","show_total_members":"1","limit":"12","cache":"0"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10061, 'JS Members Search', 'module', 'mod_community_memberssearch', '', 0, 1, 0, 0, '{"name":"JS Members Search","type":"module","creationDate":"April 2015","author":"iJoomla","copyright":"Copyright (C) 2008 - 2015 iJoomla. All rights reserved.","authorEmail":"support@jomsocial.com","authorUrl":"http:\\/\\/jomsocial.com","version":"4.1.6","description":"Member search module for JomSocial","group":"","filename":"mod_community_memberssearch"}', '{"search_layout":"0","cache":"0"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10062, 'JS Nearby Events Search', 'module', 'mod_community_nearbyevents', '', 0, 1, 0, 0, '{"name":"JS Nearby Events Search","type":"module","creationDate":"April 2015","author":"iJoomla","copyright":"Copyright (C) 2008 - 2015 JomSocial. All rights reserved.","authorEmail":"support@jomsocial.com","authorUrl":"http:\\/\\/www.jomsocial.com","version":"4.1.6","description":"Nearby events search","group":"","filename":"mod_community_nearbyevents"}', '{"event_nearby_radius":"10","eventradiusmeasure":"miles","auto_detect_location":"1","cache":"0"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10063, 'JS Notifications', 'module', 'mod_community_notifications', '', 0, 1, 0, 0, '{"name":"JS Notifications","type":"module","creationDate":"June 2015","author":"iJoomla","copyright":"Copyright (C) 2008 - 2015 iJoomla. All rights reserved.","authorEmail":"support@jomsocial.com","authorUrl":"http:\\/\\/jomsocial.com","version":"4.1.6","description":"Notifications module for JomSocial","group":"","filename":"mod_community_notifications"}', '{"show_notification":"1","show_privatemsg":"1","show_request":"1","cache":"0"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10064, 'JS Photo Comments', 'module', 'mod_community_photocomments', '', 0, 1, 0, 0, '{"name":"JS Photo Comments","type":"module","creationDate":"June 2015","author":"iJoomla","copyright":"Copyright (C) 2008 - 2015 iJoomla. All rights reserved.","authorEmail":"support@jomsocial.com","authorUrl":"http:\\/\\/jomsocial.com","version":"4.1.6","description":"Photo comments module for JomSocial","group":"","filename":"mod_community_photocomments"}', '{"album_type":"0","show_image":"1","limit":"10","char_limit":"50","cache":"0"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10065, 'JS Photos', 'module', 'mod_community_photos', '', 0, 1, 0, 0, '{"name":"JS Photos","type":"module","creationDate":"April 2015","author":"iJoomla","copyright":"Copyright (C) 2008 - 2015 iJoomla. All rights reserved.","authorEmail":"support@jomsocial.com","authorUrl":"http:\\/\\/jomsocial.com","version":"4.1.6","description":"Photo module for JomSocial","group":"","filename":"mod_community_photos"}', '{"display_type":"1","category_type":"0","filter_by":"0","limit":"20","cache":"0"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10066, 'JS Statistics', 'module', 'mod_community_statistics', '', 0, 1, 0, 0, '{"name":"JS Statistics","type":"module","creationDate":"June 2015","author":"iJoomla","copyright":"Copyright (C) 2008 - 2015 iJoomla. All rights reserved.","authorEmail":"support@jomsocial.com","authorUrl":"http:\\/\\/jomsocial.com","version":"4.1.6","description":"Statistics module for JomSocial","group":"","filename":"mod_community_statistics"}', '{"show_groups":"1","show_discussions":"1","show_announcements":"1","show_upcoming_events":"1","show_albums":"1","show_photos":"1","show_videos":"1","show_activities":"1","show_walls":"1","show_members":"1","show_males":"1","show_females":"1","show_unspecified":"1","cache":"0"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10067, 'JS Top Members', 'module', 'mod_community_topmembers', '', 0, 1, 0, 0, '{"name":"JS Top Members","type":"module","creationDate":"June 2015","author":"iJoomla","copyright":"Copyright (C) 2008 - 2015 iJoomla. All rights reserved.","authorEmail":"support@jomsocial.com","authorUrl":"http:\\/\\/jomsocial.com","version":"4.1.6","description":"Top Members module for JomSocial","group":"","filename":"mod_community_topmembers"}', '{"sort_by":"0","timespan":"0","custom_days":"7","limit":"10","cache":"0"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10068, 'JS Video Comments', 'module', 'mod_community_videocomments', '', 0, 1, 0, 0, '{"name":"JS Video Comments","type":"module","creationDate":"June 2015","author":"iJoomla","copyright":"Copyright (C) 2008 - 2015 iJoomla. All rights reserved.","authorEmail":"support@jomsocial.com","authorUrl":"http:\\/\\/jomsocial.com","version":"4.1.6","description":"Video comments module for JomSocial","group":"","filename":"mod_community_videocomments"}', '{"video_type":"0","show_image":"2","limit":"10","char_limit":"50","cache":"0"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10069, 'JS Videos', 'module', 'mod_community_videos', '', 0, 1, 0, 0, '{"name":"JS Videos","type":"module","creationDate":"June 2015","author":"iJoomla","copyright":"Copyright (C) 2008 - 2015 iJoomla. All rights reserved.","authorEmail":"support@jomsocial.com","authorUrl":"http:\\/\\/jomsocial.com","version":"4.1.6","description":"videos module for JomSocial","group":"","filename":"mod_community_videos"}', '{"category_type":"0","filter_by":"0","limit":"6","cache":"0"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10070, '[ru-RU] JomSocial Russian language Pack', 'file', 'ru-RUJomSocialRussianlanguagePack', '', 0, 1, 0, 0, '{"name":"[ru-RU] JomSocial Russian language Pack","type":"file","creationDate":"November 2015","author":"Nelegal","copyright":"Nelegal","authorEmail":"","authorUrl":"","version":"4.1.0","description":"\\n\\t\\t\\n\\t<div class=\\"bs-docs-example\\">\\n<h4 class=\\"alert-heading\\">ABOUT JOMSOCIAL FULL RUSSIAN TRANSLATION:<\\/h4>\\n <br\\/> \\u042d\\u0442\\u043e\\u0442 \\u043f\\u0435\\u0440\\u0435\\u0432\\u043e\\u0434 \\u043d\\u0435 \\u0441\\u043e\\u0437\\u0434\\u0430\\u043d \\"\\u0441 \\u043d\\u0443\\u043b\\u044f\\". \\u042d\\u0442\\u043e\\u0442 \\u043f\\u0435\\u0440\\u0435\\u0432\\u043e\\u0434 - \\u043c\\u0435\\u0440\\u0436 \\u043f\\u0435\\u0440\\u0435\\u0432\\u043e\\u0434\\u043e\\u0432 \\u043d\\u0435\\u0441\\u043a\\u043e\\u043b\\u044c\\u043a\\u0438\\u0445 \\u0430\\u0432\\u0442\\u043e\\u0440\\u043e\\u0432, \\u043a\\u043e\\u0442\\u043e\\u0440\\u044b\\u0445, \\u043a \\u0441\\u043e\\u0436\\u0430\\u043b\\u0435\\u043d\\u0438\\u044e, \\u044f \\u043d\\u0435 \\u0437\\u043d\\u0430\\u044e. \\n <br\\/>\\u0417\\u0434\\u0435\\u0441\\u044c \\u043f\\u0440\\u0438\\u0441\\u0443\\u0442\\u0441\\u0442\\u0432\\u0443\\u0435\\u0442 \\u043d\\u0435\\u0431\\u043e\\u043b\\u044c\\u0448\\u0430\\u044f \\u0447\\u0430\\u0441\\u0442\\u044c \\u0444\\u0440\\u0430\\u0437 Kharol''\\u0430, \\u0447\\u0430\\u0441\\u0442\\u044c \\u0432\\u0437\\u044f\\u0442\\u0430 \\u0438\\u0437 \\u0444\\u0430\\u0439\\u043b\\u043e\\u0432 \\u0441 Transifex \\u0438 \\u0431\\u043e\\u043b\\u044c\\u0448\\u0430\\u044f \\u0447\\u0430\\u0441\\u0442\\u044c \\u043f\\u0435\\u0440\\u0435\\u0432\\u043e\\u0434\\u0430 \\u043c\\u043e\\u044f.\\n <br\\/>\\u042f \\u043d\\u0435 \\u043f\\u0440\\u0435\\u0442\\u0435\\u043d\\u0434\\u0443\\u044e \\u043d\\u0430 \\u0430\\u0432\\u0442\\u043e\\u0440\\u0441\\u0442\\u0432\\u043e \\u0438 \\u0430\\u0432\\u0442\\u043e\\u0440\\u0441\\u043a\\u0438\\u0435 \\u043f\\u0440\\u0430\\u0432\\u0430 \\u0441\\u0435\\u0433\\u043e \\u043f\\u0435\\u0440\\u0435\\u0432\\u043e\\u0434\\u0430 (\\u0447\\u0442\\u043e \\u0432 \\u043f\\u0440\\u0438\\u043d\\u0446\\u0438\\u043f\\u0435 \\u043d\\u0430 \\u043c\\u043e\\u0439 \\u0432\\u0437\\u0433\\u043b\\u044f\\u0434 \\u043d\\u0435\\u0432\\u043e\\u0437\\u043c\\u043e\\u0436\\u043d\\u043e) \\u0438 \\u043e\\u0442\\u043a\\u0440\\u044b\\u0442\\u043e \\u0438 \\u0431\\u0435\\u0437\\u0432\\u043e\\u0437\\u043c\\u0435\\u0437\\u0434\\u043d\\u043e \\u043f\\u0435\\u0440\\u0435\\u0434\\u0430\\u044e \\u0435\\u0433\\u043e \\u0441\\u043e\\u043e\\u0431\\u0449\\u0435\\u0441\\u0442\\u0432\\u0443, \\u041d\\u041e...\\n <br\\/>\\n <br\\/>\\u041f\\u043e\\u0447\\u0442\\u0438 3500 \\u0441\\u0442\\u0440\\u043e\\u043a \\u0431\\u044b\\u043b\\u043e \\u043f\\u0435\\u0440\\u0435\\u0431\\u0440\\u0430\\u043d\\u043e \\u0432\\u0440\\u0443\\u0447\\u043d\\u0443\\u044e, \\u0438\\u0441\\u043f\\u0440\\u0430\\u0432\\u043b\\u0435\\u043d\\u043e, \\u0434\\u043e\\u043f\\u043e\\u043b\\u043d\\u0435\\u043d\\u043e \\u0438 \\u0432\\u044b\\u0447\\u0438\\u0442\\u0430\\u043d\\u043e.\\n <br\\/>\\u0412\\u0441\\u0451 \\u044d\\u0442\\u043e \\u0431\\u044b\\u043b\\u043e \\u043e\\u0442\\u0442\\u0435\\u0441\\u0442\\u0438\\u0440\\u043e\\u0432\\u0430\\u043d\\u043e \\u043d\\u0430 \\u0434\\u0435\\u043c\\u043e-\\u0441\\u0442\\u0435\\u043d\\u0434\\u0435 \\u043d\\u0430 \\u043f\\u0440\\u0435\\u0434\\u043c\\u0435\\u0442 \\u0441\\u0442\\u0438\\u043b\\u0438\\u0441\\u0442\\u0438\\u0447\\u0435\\u0441\\u043a\\u0438\\u0445 \\u043e\\u0448\\u0438\\u0431\\u043e\\u043a \\u0438 \\u043f\\u0440\\u0430\\u0432\\u0438\\u043b\\u044c\\u043d\\u043e\\u0441\\u0442\\u0438 \\u043f\\u0440\\u0438\\u043c\\u0435\\u043d\\u0435\\u043d\\u0438\\u044f \\u0432 \\u043a\\u043e\\u043d\\u0442\\u0435\\u043a\\u0441\\u0442\\u0435, \\u0441\\u043e\\u0433\\u043b\\u0430\\u0441\\u043d\\u043e \\u043f\\u0440\\u0430\\u0432\\u0438\\u043b\\u0430\\u043c \\u0440\\u0443\\u0441\\u0441\\u043a\\u043e\\u0433\\u043e \\u044f\\u0437\\u044b\\u043a\\u0430.\\n <br\\/>\\u042f \\u0443\\u0432\\u0435\\u0440\\u0435\\u043d, \\u0447\\u0442\\u043e \\u043d\\u0435 \\u0432\\u0441\\u0435 \\u0431\\u044b\\u043b\\u043e \\u0438\\u0441\\u043f\\u0440\\u0430\\u0432\\u043b\\u0435\\u043d\\u043e \\u0438 \\u0434\\u043e\\u0432\\u0435\\u0434\\u0435\\u043d\\u043e \\u0434\\u043e \\u0441\\u043e\\u0441\\u0442\\u043e\\u044f\\u043d\\u0438\\u044f \\u043f\\u043e\\u043b\\u043d\\u043e\\u0439 \\u0433\\u043e\\u0442\\u043e\\u0432\\u043d\\u043e\\u0441\\u0442\\u0438, \\u043f\\u043e\\u044d\\u0442\\u043e\\u043c\\u0443 \\u0434\\u0430\\u043b\\u044c\\u043d\\u0435\\u0439\\u0448\\u0435\\u0435 \\u0440\\u0430\\u0437\\u0432\\u0438\\u0442\\u0438\\u0435 \\u043f\\u0435\\u0440\\u0435\\u0432\\u043e\\u0434\\u0430 \\u043d\\u0430\\u043f\\u0440\\u044f\\u043c\\u0443\\u044e \\u0437\\u0430\\u0432\\u0438\\u0441\\u0438\\u0442 \\u043e\\u0442 \\u0412\\u0430\\u0441!\\n <br\\/>\\u042f, \\u0432 \\u0441\\u0432\\u043e\\u044e \\u043e\\u0447\\u0435\\u0440\\u0435\\u0434\\u044c, \\u043f\\u043e \\u0440\\u0435\\u0437\\u0443\\u043b\\u044c\\u0442\\u0430\\u0442\\u0430\\u043c \\u0412\\u0430\\u0448\\u0438\\u0445 \\u043e\\u0442\\u0437\\u044b\\u0432\\u043e\\u0432 \\u043e\\u0431\\u0435\\u0449\\u0430\\u044e \\u043f\\u0440\\u043e\\u0434\\u043e\\u043b\\u0436\\u0430\\u0442\\u044c \\u0440\\u0430\\u0431\\u043e\\u0442\\u0443 \\u043d\\u0430\\u0434 \\u043f\\u0435\\u0440\\u0435\\u0432\\u043e\\u0434\\u043e\\u043c.\\n <br\\/>\\n <br\\/>\\u041d\\u0430 \\u0442\\u0435\\u043a\\u0443\\u0449\\u0438\\u0439 \\u043c\\u043e\\u043c\\u0435\\u043d\\u0442 \\u0440\\u0430\\u0431\\u043e\\u0442\\u0430 \\u043d\\u0430\\u0434 \\u043f\\u0435\\u0440\\u0435\\u0432\\u043e\\u0434\\u043e\\u043c \\u0438\\u0434\\u0435\\u0442 \\u043f\\u043e \\u043f\\u0440\\u0438\\u0447\\u0438\\u043d\\u0435 \\u0432\\u043d\\u0435\\u0434\\u0440\\u0435\\u043d\\u0438\\u044f \\u043c\\u043e\\u0434\\u0443\\u043b\\u044f \\u0432 \\u0441\\u0432\\u043e\\u0439 \\u043f\\u0440\\u043e\\u0435\\u043a\\u0442, \\u043d\\u043e \\u044f \\u0433\\u043e\\u0442\\u043e\\u0432 \\u043f\\u0440\\u043e\\u0434\\u043e\\u043b\\u0436\\u0438\\u0442\\u044c \\u0440\\u0430\\u0431\\u043e\\u0442\\u0443 \\u043d\\u0430\\u0434 \\u043d\\u0438\\u043c \\u0438 \\u0434\\u0430\\u043b\\u044c\\u0448\\u0435.\\n <br\\/>\\u041d\\u0435 \\u0441\\u043a\\u0440\\u043e\\u044e, \\u0447\\u0442\\u043e \\u0441\\u0442\\u0438\\u043c\\u0443\\u043b\\u0430 \\u0434\\u043b\\u044f \\u0440\\u0430\\u0431\\u043e\\u0442\\u044b \\u043c\\u043e\\u0433\\u043b\\u043e \\u0431\\u044b \\u0434\\u043e\\u0431\\u0430\\u0432\\u0438\\u0442\\u044c \\u0412\\u0430\\u0448\\u0435 \\u0444\\u0438\\u043d\\u0430\\u043d\\u0441\\u043e\\u0432\\u043e\\u0435 \\u0443\\u0447\\u0430\\u0441\\u0442\\u0438\\u0435.\\n <br\\/>\\u041f\\u043e\\u044d\\u0442\\u043e\\u043c\\u0443 \\u0431\\u0435\\u0437 \\u0442\\u0435\\u043d\\u0438 \\u0441\\u043c\\u0443\\u0449\\u0435\\u043d\\u0438\\u044f \\u043e\\u0441\\u0442\\u0430\\u0432\\u043b\\u044e \\u0437\\u0434\\u0435\\u0441\\u044c \\u0440\\u0435\\u043a\\u0432\\u0438\\u0437\\u0438\\u0442\\u044b \\u0434\\u043b\\u044f \\u0436\\u0435\\u043b\\u0430\\u044e\\u0449\\u0438\\u0445 \\u0441\\u043a\\u0430\\u0437\\u0430\\u0442\\u044c \\"\\u0421\\u043f\\u0430\\u0441\\u0438\\u0431\\u043e\\".\\n <br\\/>\\n <br\\/>WM: R438506102625\\n <br\\/>\\u042f\\u0414: 4100142137915\\n <hr>\\n Version: 4.1.0 13 November 2015\\n <br\\/> \\n <br\\/> <b>Tranlated by \\u0410\\u043b\\u0435\\u043a\\u0441\\u0435\\u0439 aka \\"Nelegal\\" | Especially for cmsheaven.org members<\\/b>\\n <br\\/> \\n <br\\/> \\n\\n<div class=\\"alert alert-success\\">\\n<h4 class=\\"alert-heading\\">\\u0412 \\u043a\\u043e\\u043c\\u043f\\u043b\\u0435\\u043a\\u0442 \\u043f\\u0435\\u0440\\u0435\\u0432\\u043e\\u0434\\u0430 \\u0432\\u0445\\u043e\\u0434\\u044f\\u0442 \\u0441\\u043b\\u0435\\u0434\\u0443\\u044e\\u0449\\u0438\\u0435 \\u0444\\u0430\\u0439\\u043b\\u044b \\u043b\\u043e\\u043a\\u0430\\u043b\\u0438\\u0437\\u0430\\u0446\\u0438\\u0438:<\\/h4>\\n <br\\/> \\u00bb \\u041f\\u0435\\u0440\\u0435\\u0432\\u043e\\u0434 \\u0430\\u0434\\u043c\\u0438\\u043d\\u0438\\u0441\\u0442\\u0440\\u0430\\u0442\\u0438\\u0432\\u043d\\u043e\\u0439 \\u0447\\u0430\\u0441\\u0442\\u0438 JomSocial (backend)\\n <br\\/> \\u00bb \\u041f\\u0435\\u0440\\u0435\\u0432\\u043e\\u0434 \\u0444\\u0440\\u043e\\u043d\\u0442\\u0430\\u043b\\u044c\\u043d\\u043e\\u0439 \\u0447\\u0430\\u0441\\u0442\\u0438 JomSocial (frontend)\\n <br\\/> \\u00bb \\u041f\\u0435\\u0440\\u0435\\u0432\\u043e\\u0434 \\u044f\\u0437\\u044b\\u043a\\u043e\\u0432\\u044b\\u0445 \\u0444\\u0430\\u0439\\u043b\\u043e\\u0432 \\u043c\\u043e\\u0434\\u0443\\u043b\\u0435\\u0439 JomSocial\\n <br\\/> \\u00bb \\u041f\\u0435\\u0440\\u0435\\u0432\\u043e\\u0434 \\u044f\\u0437\\u044b\\u043a\\u043e\\u0432\\u044b\\u0445 \\u0444\\u0430\\u0439\\u043b\\u043e\\u0432 \\u043f\\u043b\\u0430\\u0433\\u0438\\u043d\\u043e\\u0432 JomSocial \\n <\\/div>\\n<\\/div>\\n","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10071, 'EasyBlog Toolbar', 'plugin', 'easyblogtoolbar', 'community', 0, 1, 1, 0, '{"name":"EasyBlog Toolbar","type":"plugin","creationDate":"01 June 2010","author":"StackIdeas","copyright":"Copyright 2009 - 2010 StackIdeas. All rights reserved.","authorEmail":"support@stackideas.com","authorUrl":"http:\\/\\/www.stackideas.com","version":"3.9.2","description":"\\n\\t\\tEasyBlog Toolbar for JomSocial\\n\\t","group":"","filename":"easyblogtoolbar"}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10078, 'Simple Registration', 'component', 'com_simpleregistration', '', 1, 1, 0, 0, '{"name":"Simple Registration","type":"component","creationDate":"2013-09-03","author":"GiBiLogic","copyright":"Copyright (C) 2011-2013 GiBiLogic. All rights reserved","authorEmail":"info@gibilogic.com","authorUrl":"http:\\/\\/www.gibilogic..com","version":"3.0.1","description":"\\n\\t\\t<img src=''http:\\/\\/extensions.gibilogic.com\\/images\\/gibilogicextensions-150x150.png'' alt='''' style=''float: left;margin: 0 10px 10px 0'' \\/>\\n\\t\\t<h1>GiBi Simpleregistration<\\/h1>\\n\\t\\t<h2>A Joomla extension by <a href=\\"http:\\/\\/www.gibilogic.com\\">GiBiLogic<\\/a><\\/h2>\\n\\t\\t<p>This component allows user to register by inserting only an e-mail address: it will be used both as \\"Full name\\" and \\"Username\\"; password will be created randomly and sent to the user.<\\/p>\\n\\t\\t<p>To use this component, just create a menu item which links to Simple Registration -> Registration Form.<\\/p>\\n\\t\\t<p>Discover other extension by <strong>GiBiLogic<\\/strong> at <a href=\\"http:\\/\\/extensions.gibilogic.com\\">extensions.gibilogic.com<\\/a><\\/p>\\n\\t","group":"","filename":"simpleregistration"}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10079, 'Simple Registration', 'module', 'mod_simpleregistration', '', 0, 1, 0, 0, '{"name":"Simple Registration","type":"module","creationDate":"2013-09-03","author":"GiBiLogic","copyright":"Copyright (C) 2011-2013 GiBiLogic. All rights reserved","authorEmail":"info@gibilogic.com","authorUrl":"http:\\/\\/www.gibilogic..com","version":"3.0.1","description":"\\n\\t\\t<img src=''http:\\/\\/extensions.gibilogic.com\\/images\\/gibilogicextensions-150x150.png'' alt='''' style=''float: left;margin: 0 10px 10px 0'' \\/>\\n\\t\\t<h1>GiBi Simpleregistration<\\/h1>\\n\\t\\t<h2>A Joomla extension by <a href=\\"http:\\/\\/www.gibilogic.com\\">GiBiLogic<\\/a><\\/h2>\\n\\t\\t<p>This module allows user to register by inserting only an e-mail address: it will be used both as \\"Full name\\" and \\"Username\\"; password will be created randomly and sent to the user.<\\/p>\\n\\t\\t<p>Discover other extension by <strong>GiBiLogic<\\/strong> at <a href=\\"http:\\/\\/extensions.gibilogic.com\\">extensions.gibilogic.com<\\/a><\\/p>\\n\\t","group":"","filename":"mod_simpleregistration"}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10080, 'SimpleRegistration', 'package', 'pkg_lexity', '', 0, 1, 1, 0, '{"name":"SimpleRegistration","type":"package","creationDate":"2013-08-28","author":"GiBiLogic","copyright":"(C) 2012-2013 Lexity, Inc. All rights reserved.","authorEmail":"","authorUrl":"https:\\/\\/extensions.gibilogic.com","version":"3.0.0","description":"\\n  <p>This package installs both SimpleRegistration component and module at once.<\\/p>\\n  ","group":"","filename":"simpleregistration"}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10081, 'Poster!', 'component', 'com_poster', '', 1, 1, 0, 0, '{"name":"Poster!","type":"component","creationDate":"April 2016","author":"sloker","copyright":"Copyright Info","authorEmail":"","authorUrl":"","version":"0.0.2","description":"Description of the Poster component ...","group":"","filename":"poster"}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10083, 'com_form2content', 'component', 'com_form2content', '', 1, 1, 0, 0, '{"name":"com_form2content","type":"component","creationDate":"2015-08-12","author":"Open Source Design","copyright":"(c) 2009-2015 - Open Source Design","authorEmail":"info@opensourcedesign.nl","authorUrl":"http:\\/\\/www.opensourcedesign.nl","version":"5.5.1","description":"A Joomla! Content Creation Kit","group":"","filename":"manifest"}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10084, 'System - Poster System', 'plugin', 'poster.system', 'system', 0, 1, 1, 0, '{"name":"System - Poster System","type":"plugin","creationDate":"July 2011","author":"sloker","copyright":"All rights reserved","authorEmail":"","authorUrl":"","version":"4.1.6","description":"\\n\\t\\tAjax System for Joomla","group":"","filename":"poster.system"}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_f2c_fieldcontent`
--

CREATE TABLE IF NOT EXISTS `n1wr9_f2c_fieldcontent` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `formid` int(10) unsigned NOT NULL DEFAULT '0',
  `fieldid` int(10) unsigned NOT NULL DEFAULT '0',
  `attribute` varchar(10) NOT NULL DEFAULT 'VALUE',
  `content` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `n1wr9_f2c_fieldcontent`
--

INSERT INTO `n1wr9_f2c_fieldcontent` (`id`, `formid`, `fieldid`, `attribute`, `content`) VALUES
(1, 1, 1, 'VALUE', 'Thank you for downloading and installing Form2Content LITE. In this demo content and article we hope to help you get started using our Joomla Content Construction Kit.'),
(2, 1, 2, 'VALUE', '{"filename":"2.png","width":700,"height":360,"widthThumbnail":150,"heightThumbnail":78,"alt":"Open Source Design","title":"F2C is developed by Open Source Design"}'),
(3, 1, 3, 'VALUE', '{"url":"http:\\/\\/documentation.form2content.com\\/","display":"Form2Content Documentation","title":"Form2Content Documentation","target":"_blank"}'),
(4, 1, 4, 'VALUE', 'custom'),
(5, 1, 5, 'VALUE', 'Patrick Faasse, Julien Brouns - creators of Form2Content Joomla CCK'),
(6, 1, 7, 'VALUE', '<p><strong>Getting started with Form2Content!</strong></p>\r\n<p>In the below steps we will show you how to create your own Joomla articles via Form2Content.<br /><a href="http://documentation.form2content.com/f2c-getting-started/32-getting-started-f2c-step-by-step">http://documentation.form2content.com/f2c-getting-started/32-getting-started-f2c-step-by-step</a></p>\r\n<h2>What type of articles do you want to create?</h2>\r\n<p>The installed demo <em>content type</em> is an example of a blog. Each time a F2C form is filled out a Joomla article is created. In the content type manager you define permissions, in which category the Joomla article is saved and article settings like show/hide title, intro etc.</p>\r\n<p><a href="http://documentation.form2content.com/f2c-content-types">http://documentation.form2content.com/f2c-content-types</a></p>\r\n<h2>Define the fields to collect the article data</h2>\r\n<p>In the F2C Content Type manager you will find the link to the F2C <em>Fields Manager</em> (cog icon in the second column). In the field manager you define the data you want to collect via a range of different fields. In our <em>blog example</em> we have used single-select list, multiline text field, an editor, image upload etc.</p>\r\n<p><a href="http://documentation.form2content.com/f2c-field-types">http://documentation.form2content.com/f2c-field-types</a></p>\r\n<h2>Define the article template (layout with placeholders)</h2>\r\n<p>Now that we can collect the article data we need to create a template to display this data within the Joomla article. Each created article will look teh same since we use the same layout (template).</p>\r\n<p><strong>The Form2Content rule:</strong> Form fields data + template layout = Joomla article html</p>\r\n<p>Please see our other example article about where the F2C article templates are located and how the placeholders for the data work.</p>\r\n<p><a href="http://documentation.form2content.com/f2c-templating">http://documentation.form2content.com/f2c-templating</a></p>\r\n<h2>When all works in the back-end, create a menu link to the front-end</h2>\r\n<p>When you can create Joomla article via Form2Content in the back-end you can add the front-end access and let your website users add Joomla articles with great ease ... and they all look the same!</p>\r\n<p><a href="http://documentation.form2content.com/f2c-front-end">http://documentation.form2content.com/f2c-front-end</a></p>'),
(7, 2, 1, 'VALUE', 'With a content construction kit there is always a small learning curve. Hopefully our BLOG demo will help you understand the relation between the Form2Contnet submission form (data) and the creation of your Joomla article quickly.'),
(8, 2, 2, 'VALUE', '{"filename":"2.png","width":700,"height":360,"widthThumbnail":150,"heightThumbnail":78,"alt":"Open Source Design","title":"F2C is developed by Open Source Design"}'),
(9, 2, 3, 'VALUE', '{"url":"http:\\/\\/documentation.form2content.com\\/f2c-templating","display":"F2C Documentatation on article templates","title":"F2C Documentatation","target":"_blank"}'),
(10, 2, 4, 'VALUE', 'custom'),
(11, 2, 5, 'VALUE', 'Patrick Faasse, Julien Brouns - creators of Form2Content Joomla CCK'),
(12, 2, 7, 'VALUE', '<p>In the Joomla back-end under components you can find the link to Form2Content. One of the links is to the Form2Content Template manager.</p>\r\n<p>The F2C article templates are used to render the form data into the layout of your Joomla article. Probably the easiest way to understand this is to have a look at the two files we have included to generate the BLOG demo articles.<br />The two files can be seen in the F2C Template Manager or via FTP:</p>\r\n<p>&lt; root &gt;/media/com_form2content/templates</p>\r\n<p>blog_intro_template.tpl<br />blog_main_template.tpl</p>\r\n<p><strong>Use of Smarty Templating and Template parameters (placeholders)</strong></p>\r\n<p>In the two F2C article templates included we have added extra documentation to show what you can do with them. This will hopefully get you to grips with the syntax quickly!</p>\r\n<p><a href="http://documentation.form2content.com/f2c-templating" target="_blank">PLEASE read all the documentation on Form2Content templating here!</a></p>\r\n<p> </p>\r\n<p> </p>');

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_f2c_fieldtype`
--

CREATE TABLE IF NOT EXISTS `n1wr9_f2c_fieldtype` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(45) NOT NULL DEFAULT '',
  `name` varchar(45) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `n1wr9_f2c_fieldtype`
--

INSERT INTO `n1wr9_f2c_fieldtype` (`id`, `description`, `name`) VALUES
(1, 'Single line text (textbox)', 'Singlelinetext'),
(2, 'Multi-line text (text area)', 'Multilinetext'),
(3, 'Multi-line text (editor)', 'Editor'),
(5, 'Single select list', 'Singleselectlist'),
(6, 'Image', 'Image'),
(9, 'Hyperlink', 'Hyperlink'),
(11, 'Info Text', 'Infotext');

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_f2c_form`
--

CREATE TABLE IF NOT EXISTS `n1wr9_f2c_form` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `asset_id` int(10) unsigned NOT NULL,
  `projectid` int(10) unsigned NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL DEFAULT '',
  `alias` varchar(255) NOT NULL DEFAULT '',
  `created_by` int(10) unsigned NOT NULL DEFAULT '0',
  `created_by_alias` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `metakey` text,
  `metadesc` text,
  `catid` int(10) NOT NULL DEFAULT '0',
  `intro_template` varchar(100) NOT NULL DEFAULT '',
  `main_template` varchar(100) DEFAULT NULL,
  `reference_id` int(11) DEFAULT NULL,
  `ordering` int(11) NOT NULL DEFAULT '0',
  `publish_up` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_down` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `state` tinyint(3) NOT NULL DEFAULT '0',
  `featured` tinyint(3) NOT NULL DEFAULT '0',
  `access` int(10) unsigned NOT NULL DEFAULT '0',
  `attribs` text NOT NULL,
  `metadata` text NOT NULL,
  `language` char(7) NOT NULL,
  `extended` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `n1wr9_f2c_form`
--

INSERT INTO `n1wr9_f2c_form` (`id`, `asset_id`, `projectid`, `title`, `alias`, `created_by`, `created_by_alias`, `created`, `modified`, `metakey`, `metadesc`, `catid`, `intro_template`, `main_template`, `reference_id`, `ordering`, `publish_up`, `publish_down`, `state`, `featured`, `access`, `attribs`, `metadata`, `language`, `extended`) VALUES
(1, 109, 1, 'Getting started with Form2Content Lite', 'getting-started-with-form2content-lite', 311, '', '2016-04-19 10:00:25', '2016-05-06 12:45:04', '', '', 2, 'blog_intro_template.tpl', 'blog_main_template.tpl', 1, 1, '2016-04-19 10:00:25', '0000-00-00 00:00:00', 1, 0, 1, '{"show_title":"","link_titles":"","show_intro":"0","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_vote":"","show_hits":"","show_noauth":"","alternative_readmore":"","article_layout":"","info_block_position":"0"}', '{"robots":"","author":"","rights":"","xreference":""}', '*', '{"tags":""}'),
(2, 111, 1, 'Article templates, the true strength of Form2Content', 'article-templates-the-true-strength-of-form2content', 311, '', '2016-04-19 10:00:25', '2016-05-06 12:46:06', '', '', 2, 'blog_intro_template.tpl', 'blog_main_template.tpl', 2, 0, '2016-04-19 10:00:25', '0000-00-00 00:00:00', 1, 0, 1, '{"show_title":"","link_titles":"","show_intro":"0","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_vote":"","show_hits":"","show_noauth":"","alternative_readmore":"","article_layout":"","info_block_position":"0"}', '{"robots":"","author":"","rights":"","xreference":""}', '*', '{"tags":""}');

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_f2c_project`
--

CREATE TABLE IF NOT EXISTS `n1wr9_f2c_project` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `asset_id` int(10) unsigned NOT NULL,
  `title` varchar(100) NOT NULL DEFAULT '',
  `created_by` int(10) unsigned NOT NULL DEFAULT '0',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `version` varchar(10) NOT NULL DEFAULT '',
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `settings` text NOT NULL,
  `attribs` text NOT NULL,
  `metadata` text NOT NULL,
  `metakey` text NOT NULL,
  `metadesc` text NOT NULL,
  `images` text NOT NULL,
  `urls` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `n1wr9_f2c_project`
--

INSERT INTO `n1wr9_f2c_project` (`id`, `asset_id`, `title`, `created_by`, `created`, `modified`, `version`, `published`, `settings`, `attribs`, `metadata`, `metakey`, `metadesc`, `images`, `urls`) VALUES
(1, 108, 'Blog articles', 311, '2016-04-19 10:00:24', '2016-05-06 12:46:56', '5.5.1', 1, '{"article_caption":"Blog article","title_front_end":"1","title_caption":"Blog article title","title_default":"","title_alias_front_end":"1","title_alias_caption":"","frontend_templsel":"1","intro_template":"default_intro_template_Blog articles.tpl","main_template":"default_main_template_Blog articles.tpl","frontend_pubsel":"1","tags_front_end":"1","tags_caption":"Add tags to your blog","tag_field_ajax_mode":"1","tags_allow_custom":"1"}', '{"show_title":"","link_titles":"1","show_tags":"","show_intro":"0","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_vote":"","show_hits":"","show_noauth":"","alternative_readmore":"","article_layout":""}', '{"robots":"","author":"","rights":"","xreference":""}', '', '', '{"image_intro":"","imagetype_intro":"full","float_intro":"","image_intro_alt":"","image_intro_caption":"","image_fulltext":"","imagetype_fulltext":"full","float_fulltext":"","image_fulltext_alt":"","image_fulltext_caption":""}', '{"urla":"","urlatext":"","targeta":"","urlb":"","urlbtext":"","targetb":"","urlc":"","urlctext":"","targetc":""}');

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_f2c_projectfields`
--

CREATE TABLE IF NOT EXISTS `n1wr9_f2c_projectfields` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `projectid` int(10) unsigned NOT NULL DEFAULT '0',
  `fieldname` varchar(45) NOT NULL DEFAULT '',
  `title` varchar(45) NOT NULL DEFAULT '',
  `description` varchar(100) NOT NULL DEFAULT '',
  `fieldtypeid` int(10) unsigned NOT NULL DEFAULT '0',
  `settings` text,
  `ordering` int(10) unsigned NOT NULL DEFAULT '0',
  `frontvisible` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `n1wr9_f2c_projectfields`
--

INSERT INTO `n1wr9_f2c_projectfields` (`id`, `projectid`, `fieldname`, `title`, `description`, `fieldtypeid`, `settings`, `ordering`, `frontvisible`) VALUES
(1, 1, 'intro', 'Article introduction', 'Shown in category blog layout', 2, '{"mlt_max_num_chars":"250"}', 1, 1),
(2, 1, 'image', 'Blog image', '', 6, '{"img_max_width":"960","img_max_height":"480","img_output_mode":"0"}', 2, 1),
(3, 1, 'source', 'Article source (link)', '', 9, '{"lnk_output_mode":"0","lnk_attributes_url":"","lnk_attributes_display_as":"placeholder=\\"link text\\"","lnk_attributes_title":"placeholder=\\"title text\\"","lnk_attributes_target":"","lnk_add_http_prefix":"0"}', 3, 1),
(4, 1, 'author', 'Display author name?', '', 5, '{"ssl_display_mode":"0","ssl_show_empty_choice_text":"1","ssl_empty_choice_text":"- make a choice -","ssl_options":{"no":"No author name","joomla":"Joomla author name","custom":"Custom name (from textbox below)"}}', 4, 1),
(5, 1, 'author_name', 'Author name (custom)', '', 1, '{}', 5, 1),
(6, 1, 'info_article', '', '', 11, '{"inf_text":"<p>The introduction text from above is shown in the Category Blog Layout. The text for the article below is shown on the Article page. If the introduction text shows up above the article text you can choose to hide this using the Joomla article paramaters <strong>display intro<\\/strong> and setting it to <strong>no<\\/strong>.<\\/p>\\r\\n<p>If <strong>NO<\\/strong> content is added in the article text, there weill be <strong>NO<\\/strong> Read More link! Do not use the read more button of the editor.<\\/p>"}', 6, 1),
(7, 1, 'article', 'Article text', '', 3, '{}', 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_f2c_translation`
--

CREATE TABLE IF NOT EXISTS `n1wr9_f2c_translation` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `language_id` varchar(10) NOT NULL DEFAULT '',
  `reference_id` int(10) unsigned NOT NULL DEFAULT '0',
  `title_translation` mediumtext NOT NULL,
  `description_translation` mediumtext,
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_finder_filters`
--

CREATE TABLE IF NOT EXISTS `n1wr9_finder_filters` (
  `filter_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `state` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(10) unsigned NOT NULL,
  `created_by_alias` varchar(255) NOT NULL,
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(10) unsigned NOT NULL DEFAULT '0',
  `checked_out` int(10) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `map_count` int(10) unsigned NOT NULL DEFAULT '0',
  `data` text NOT NULL,
  `params` mediumtext,
  PRIMARY KEY (`filter_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_finder_links`
--

CREATE TABLE IF NOT EXISTS `n1wr9_finder_links` (
  `link_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL,
  `route` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `indexdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `md5sum` varchar(32) DEFAULT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `state` int(5) DEFAULT '1',
  `access` int(5) DEFAULT '0',
  `language` varchar(8) NOT NULL,
  `publish_start_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_end_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `start_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `end_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `list_price` double unsigned NOT NULL DEFAULT '0',
  `sale_price` double unsigned NOT NULL DEFAULT '0',
  `type_id` int(11) NOT NULL,
  `object` mediumblob NOT NULL,
  PRIMARY KEY (`link_id`),
  KEY `idx_type` (`type_id`),
  KEY `idx_title` (`title`),
  KEY `idx_md5` (`md5sum`),
  KEY `idx_url` (`url`(75)),
  KEY `idx_published_list` (`published`,`state`,`access`,`publish_start_date`,`publish_end_date`,`list_price`),
  KEY `idx_published_sale` (`published`,`state`,`access`,`publish_start_date`,`publish_end_date`,`sale_price`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `n1wr9_finder_links`
--

INSERT INTO `n1wr9_finder_links` (`link_id`, `url`, `route`, `title`, `description`, `indexdate`, `md5sum`, `published`, `state`, `access`, `language`, `publish_start_date`, `publish_end_date`, `start_date`, `end_date`, `list_price`, `sale_price`, `type_id`, `object`) VALUES
(1, 'index.php?option=com_easyblog&view=entry&id=2', '/blog/moya-pervaya-zapis', 'Моя первая запись', ' Моя первая запись ', '2016-04-14 05:40:30', 'bef6fb9f85c90445b78a81ebbae14a23', 1, 1, 1, '*', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 6, 0x4f3a31393a2246696e646572496e6465786572526573756c74223a31393a7b733a31313a22002a00656c656d656e7473223b613a34373a7b733a323a226964223b733a313a2232223b733a31303a22637265617465645f6279223b733a333a22333132223b733a373a2263726561746564223b733a31393a22323031362d30342d31342030393a33393a3231223b733a383a226d6f646966696564223b733a31393a22323031362d30342d31342030393a34303a3330223b733a393a227065726d616c696e6b223b733a31383a226d6f79612d706572766179612d7a61706973223b733a373a22636f6e74656e74223b733a303a22223b733a353a22696e74726f223b733a33393a223c703ed09cd0bed18f20d0bfd0b5d180d0b2d0b0d18f20d0b7d0b0d0bfd0b8d181d18c3c2f703e223b733a373a2265786365727074223b4e3b733a31313a2263617465676f72795f6964223b733a313a2231223b733a31303a227075626c6973685f7570223b733a31393a22323031362d30342d31342030393a33393a3231223b733a31323a227075626c6973685f646f776e223b733a31393a22303030302d30302d30302030303a30303a3030223b733a383a226f72646572696e67223b733a313a2232223b733a343a22766f7465223b733a313a2230223b733a343a2268697473223b733a313a2230223b733a31323a22616c6c6f77636f6d6d656e74223b733a313a2230223b733a31323a22737562736372697074696f6e223b733a313a2231223b733a393a2266726f6e7470616765223b733a313a2231223b733a353a2269736e6577223b733a313a2230223b733a31323a22626c6f6770617373776f7264223b733a303a22223b733a383a226c61746974756465223b733a303a22223b733a393a226c6f6e676974756465223b733a303a22223b733a373a2261646472657373223b733a303a22223b733a383a22706f737474797065223b733a303a22223b733a363a22726f626f7473223b733a303a22223b733a31303a22636f7079726967687473223b4e3b733a353a22696d616765223b733a303a22223b733a32343a2273656e645f6e6f74696669636174696f6e5f656d61696c73223b733a313a2231223b733a363a226c6f636b6564223b733a313a2230223b733a31313a227265766973696f6e5f6964223b733a313a2232223b733a393a22736f757263655f6964223b733a313a2230223b733a31313a22736f757263655f74797065223b733a31373a2265617379626c6f672e7369746577696465223b733a323a226970223b733a31343a2239312e3134342e3137342e323133223b733a373a22646f6374797065223b733a363a226c6567616379223b733a383a22646f63756d656e74223b733a303a22223b733a383a2263617465676f7279223b733a31333a22556e63617465676f72697a6564223b733a363a22617574686f72223b733a31363a22d092d18fd187d0b5d181d0bbd0b0d0b2223b733a31363a22637265617465645f62795f616c696173223b733a31363a22d092d18fd187d0b5d181d0bbd0b0d0b2223b733a393a226361745f7374617465223b733a313a2231223b733a31303a226361745f616363657373223b733a313a2231223b733a373a226d6574616b6179223b733a303a22223b733a383a226d65746164657363223b733a303a22223b733a363a226c61796f7574223b733a353a22656e747279223b733a343a2270617468223b733a32333a22626c6f672f6d6f79612d706572766179612d7a61706973223b733a373a2273756d6d617279223b733a33393a223c703ed09cd0bed18f20d0bfd0b5d180d0b2d0b0d18f20d0b7d0b0d0bfd0b8d181d18c3c2f703e223b733a343a22626f6479223b733a33393a223c703ed09cd0bed18f20d0bfd0b5d180d0b2d0b0d18f20d0b7d0b0d0bfd0b8d181d18c3c2f703e223b733a31303a226d657461617574686f72223b733a31363a22d092d18fd187d0b5d181d0bbd0b0d0b2223b733a363a22706172616d73223b4f3a32343a224a6f6f6d6c615c52656769737472795c5265676973747279223a323a7b733a373a22002a0064617461223b4f3a383a22737464436c617373223a313a7b733a353a22696d616765223b733a39383a22687474703a2f2f786e2d2d683161616767736c2e786e2d2d703161692f636f6d706f6e656e74732f636f6d5f65617379626c6f672f7468656d65732f776972656672616d652f696d616765732f706c616365686f6c6465722d696d6167652e706e67223b7d733a393a22736570617261746f72223b733a313a222e223b7d7d733a31353a22002a00696e737472756374696f6e73223b613a353a7b693a313b613a333a7b693a303b733a353a227469746c65223b693a313b733a383a227375627469746c65223b693a323b733a323a226964223b7d693a323b613a323a7b693a303b733a373a2273756d6d617279223b693a313b733a343a22626f6479223b7d693a333b613a373a7b693a303b733a343a226d657461223b693a313b733a31303a226c6973745f7072696365223b693a323b733a31303a2273616c655f7072696365223b693a333b733a373a226d6574616b6579223b693a343b733a383a226d65746164657363223b693a353b733a31303a226d657461617574686f72223b693a363b733a363a22617574686f72223b7d693a343b613a323a7b693a303b733a343a2270617468223b693a313b733a353a22616c696173223b7d693a353b613a313a7b693a303b733a383a22636f6d6d656e7473223b7d7d733a31313a22002a007461786f6e6f6d79223b613a343a7b733a343a2254797065223b613a313a7b733a383a2245617379426c6f67223b4f3a373a224a4f626a656374223a343a7b733a31303a22002a005f6572726f7273223b613a303a7b7d733a353a227469746c65223b733a383a2245617379426c6f67223b733a353a227374617465223b693a313b733a363a22616363657373223b693a313b7d7d733a363a22417574686f72223b613a313a7b733a31363a22d092d18fd187d0b5d181d0bbd0b0d0b2223b4f3a373a224a4f626a656374223a343a7b733a31303a22002a005f6572726f7273223b613a303a7b7d733a353a227469746c65223b733a31363a22d092d18fd187d0b5d181d0bbd0b0d0b2223b733a353a227374617465223b693a313b733a363a22616363657373223b693a313b7d7d733a383a2243617465676f7279223b613a313a7b733a31333a22556e63617465676f72697a6564223b4f3a373a224a4f626a656374223a343a7b733a31303a22002a005f6572726f7273223b613a303a7b7d733a353a227469746c65223b733a31333a22556e63617465676f72697a6564223b733a353a227374617465223b693a313b733a363a22616363657373223b693a313b7d7d733a383a224c616e6775616765223b613a313a7b733a313a222a223b4f3a373a224a4f626a656374223a343a7b733a31303a22002a005f6572726f7273223b613a303a7b7d733a353a227469746c65223b733a313a222a223b733a353a227374617465223b693a313b733a363a22616363657373223b693a313b7d7d7d733a333a2275726c223b733a34353a22696e6465782e7068703f6f7074696f6e3d636f6d5f65617379626c6f6726766965773d656e7472792669643d32223b733a353a22726f757465223b733a32343a222f626c6f672f6d6f79612d706572766179612d7a61706973223b733a353a227469746c65223b733a33323a22d09cd0bed18f20d0bfd0b5d180d0b2d0b0d18f20d0b7d0b0d0bfd0b8d181d18c223b733a31313a226465736372697074696f6e223b733a33343a2220d09cd0bed18f20d0bfd0b5d180d0b2d0b0d18f20d0b7d0b0d0bfd0b8d181d18c20223b733a393a227075626c6973686564223b733a313a2231223b733a353a227374617465223b733a313a2231223b733a363a22616363657373223b693a313b733a383a226c616e6775616765223b733a313a222a223b733a31383a227075626c6973685f73746172745f64617465223b733a31393a22303030302d30302d30302030303a30303a3030223b733a31363a227075626c6973685f656e645f64617465223b733a31393a22303030302d30302d30302030303a30303a3030223b733a31303a2273746172745f64617465223b733a31393a22303030302d30302d30302030303a30303a3030223b733a383a22656e645f64617465223b733a31393a22303030302d30302d30302030303a30303a3030223b733a31303a226c6973745f7072696365223b4e3b733a31303a2273616c655f7072696365223b4e3b733a373a22747970655f6964223b693a363b733a31353a2264656661756c744c616e6775616765223b733a353a2272752d5255223b7d);

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_finder_links_terms0`
--

CREATE TABLE IF NOT EXISTS `n1wr9_finder_links_terms0` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL,
  PRIMARY KEY (`link_id`,`term_id`),
  KEY `idx_term_weight` (`term_id`,`weight`),
  KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_finder_links_terms1`
--

CREATE TABLE IF NOT EXISTS `n1wr9_finder_links_terms1` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL,
  PRIMARY KEY (`link_id`,`term_id`),
  KEY `idx_term_weight` (`term_id`,`weight`),
  KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_finder_links_terms2`
--

CREATE TABLE IF NOT EXISTS `n1wr9_finder_links_terms2` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL,
  PRIMARY KEY (`link_id`,`term_id`),
  KEY `idx_term_weight` (`term_id`,`weight`),
  KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_finder_links_terms3`
--

CREATE TABLE IF NOT EXISTS `n1wr9_finder_links_terms3` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL,
  PRIMARY KEY (`link_id`,`term_id`),
  KEY `idx_term_weight` (`term_id`,`weight`),
  KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_finder_links_terms4`
--

CREATE TABLE IF NOT EXISTS `n1wr9_finder_links_terms4` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL,
  PRIMARY KEY (`link_id`,`term_id`),
  KEY `idx_term_weight` (`term_id`,`weight`),
  KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_finder_links_terms5`
--

CREATE TABLE IF NOT EXISTS `n1wr9_finder_links_terms5` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL,
  PRIMARY KEY (`link_id`,`term_id`),
  KEY `idx_term_weight` (`term_id`,`weight`),
  KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_finder_links_terms6`
--

CREATE TABLE IF NOT EXISTS `n1wr9_finder_links_terms6` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL,
  PRIMARY KEY (`link_id`,`term_id`),
  KEY `idx_term_weight` (`term_id`,`weight`),
  KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `n1wr9_finder_links_terms6`
--

INSERT INTO `n1wr9_finder_links_terms6` (`link_id`, `term_id`, `weight`) VALUES
(1, 7, 0.5334),
(1, 8, 2.8),
(1, 9, 3.2);

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_finder_links_terms7`
--

CREATE TABLE IF NOT EXISTS `n1wr9_finder_links_terms7` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL,
  PRIMARY KEY (`link_id`,`term_id`),
  KEY `idx_term_weight` (`term_id`,`weight`),
  KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `n1wr9_finder_links_terms7`
--

INSERT INTO `n1wr9_finder_links_terms7` (`link_id`, `term_id`, `weight`) VALUES
(1, 12, 1.04004),
(1, 19, 1.24),
(1, 20, 4.44323);

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_finder_links_terms8`
--

CREATE TABLE IF NOT EXISTS `n1wr9_finder_links_terms8` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL,
  PRIMARY KEY (`link_id`,`term_id`),
  KEY `idx_term_weight` (`term_id`,`weight`),
  KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `n1wr9_finder_links_terms8`
--

INSERT INTO `n1wr9_finder_links_terms8` (`link_id`, `term_id`, `weight`) VALUES
(1, 10, 0.9334),
(1, 11, 2.8666);

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_finder_links_terms9`
--

CREATE TABLE IF NOT EXISTS `n1wr9_finder_links_terms9` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL,
  PRIMARY KEY (`link_id`,`term_id`),
  KEY `idx_term_weight` (`term_id`,`weight`),
  KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `n1wr9_finder_links_terms9`
--

INSERT INTO `n1wr9_finder_links_terms9` (`link_id`, `term_id`, `weight`) VALUES
(1, 3, 0.5334),
(1, 4, 2.6),
(1, 5, 3.1334);

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_finder_links_termsa`
--

CREATE TABLE IF NOT EXISTS `n1wr9_finder_links_termsa` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL,
  PRIMARY KEY (`link_id`,`term_id`),
  KEY `idx_term_weight` (`term_id`,`weight`),
  KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `n1wr9_finder_links_termsa`
--

INSERT INTO `n1wr9_finder_links_termsa` (`link_id`, `term_id`, `weight`) VALUES
(1, 16, 0.62),
(1, 17, 4.13323),
(1, 18, 4.85677);

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_finder_links_termsb`
--

CREATE TABLE IF NOT EXISTS `n1wr9_finder_links_termsb` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL,
  PRIMARY KEY (`link_id`,`term_id`),
  KEY `idx_term_weight` (`term_id`,`weight`),
  KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `n1wr9_finder_links_termsb`
--

INSERT INTO `n1wr9_finder_links_termsb` (`link_id`, `term_id`, `weight`) VALUES
(1, 14, 1.91988);

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_finder_links_termsc`
--

CREATE TABLE IF NOT EXISTS `n1wr9_finder_links_termsc` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL,
  PRIMARY KEY (`link_id`,`term_id`),
  KEY `idx_term_weight` (`term_id`,`weight`),
  KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `n1wr9_finder_links_termsc`
--

INSERT INTO `n1wr9_finder_links_termsc` (`link_id`, `term_id`, `weight`) VALUES
(1, 2, 0.17);

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_finder_links_termsd`
--

CREATE TABLE IF NOT EXISTS `n1wr9_finder_links_termsd` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL,
  PRIMARY KEY (`link_id`,`term_id`),
  KEY `idx_term_weight` (`term_id`,`weight`),
  KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `n1wr9_finder_links_termsd`
--

INSERT INTO `n1wr9_finder_links_termsd` (`link_id`, `term_id`, `weight`) VALUES
(1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_finder_links_termse`
--

CREATE TABLE IF NOT EXISTS `n1wr9_finder_links_termse` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL,
  PRIMARY KEY (`link_id`,`term_id`),
  KEY `idx_term_weight` (`term_id`,`weight`),
  KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `n1wr9_finder_links_termse`
--

INSERT INTO `n1wr9_finder_links_termse` (`link_id`, `term_id`, `weight`) VALUES
(1, 6, 0.63996),
(1, 15, 1.24);

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_finder_links_termsf`
--

CREATE TABLE IF NOT EXISTS `n1wr9_finder_links_termsf` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL,
  PRIMARY KEY (`link_id`,`term_id`),
  KEY `idx_term_weight` (`term_id`,`weight`),
  KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `n1wr9_finder_links_termsf`
--

INSERT INTO `n1wr9_finder_links_termsf` (`link_id`, `term_id`, `weight`) VALUES
(1, 13, 0.6666);

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_finder_taxonomy`
--

CREATE TABLE IF NOT EXISTS `n1wr9_finder_taxonomy` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL,
  `state` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `access` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `ordering` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `parent_id` (`parent_id`),
  KEY `state` (`state`),
  KEY `ordering` (`ordering`),
  KEY `access` (`access`),
  KEY `idx_parent_published` (`parent_id`,`state`,`access`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `n1wr9_finder_taxonomy`
--

INSERT INTO `n1wr9_finder_taxonomy` (`id`, `parent_id`, `title`, `state`, `access`, `ordering`) VALUES
(1, 0, 'ROOT', 0, 0, 0),
(2, 1, 'Type', 1, 1, 0),
(3, 2, 'EasyBlog', 1, 1, 0),
(4, 1, 'Author', 1, 1, 0),
(5, 4, 'Вячеслав', 1, 1, 0),
(6, 1, 'Category', 1, 1, 0),
(7, 6, 'Uncategorized', 1, 1, 0),
(8, 1, 'Language', 1, 1, 0),
(9, 8, '*', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_finder_taxonomy_map`
--

CREATE TABLE IF NOT EXISTS `n1wr9_finder_taxonomy_map` (
  `link_id` int(10) unsigned NOT NULL,
  `node_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`link_id`,`node_id`),
  KEY `link_id` (`link_id`),
  KEY `node_id` (`node_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `n1wr9_finder_taxonomy_map`
--

INSERT INTO `n1wr9_finder_taxonomy_map` (`link_id`, `node_id`) VALUES
(1, 3),
(1, 5),
(1, 7),
(1, 9);

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_finder_terms`
--

CREATE TABLE IF NOT EXISTS `n1wr9_finder_terms` (
  `term_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `term` varchar(75) NOT NULL,
  `stem` varchar(75) NOT NULL,
  `common` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `phrase` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `weight` float unsigned NOT NULL DEFAULT '0',
  `soundex` varchar(75) NOT NULL,
  `links` int(10) NOT NULL DEFAULT '0',
  `language` char(3) NOT NULL DEFAULT '',
  PRIMARY KEY (`term_id`),
  UNIQUE KEY `idx_term` (`term`),
  KEY `idx_term_phrase` (`term`,`phrase`),
  KEY `idx_stem_phrase` (`stem`,`phrase`),
  KEY `idx_soundex_phrase` (`soundex`,`phrase`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `n1wr9_finder_terms`
--

INSERT INTO `n1wr9_finder_terms` (`term_id`, `term`, `stem`, `common`, `phrase`, `weight`, `soundex`, `links`, `language`) VALUES
(1, '', '', 0, 0, 0, '', 1, '*'),
(2, '2', '2', 0, 0, 0.1, '', 1, '*'),
(3, 'blog', 'blog', 0, 0, 0.2667, 'B420', 1, '*'),
(4, 'blog moya', 'blog moya', 0, 1, 1.3, 'B425', 1, '*'),
(5, 'blog moya pervaya', 'blog moya pervaya', 0, 1, 1.5667, 'B425161', 1, '*'),
(6, 'easyblog', 'easyblog', 0, 0, 0.5333, 'E2142', 1, '*'),
(7, 'moya', 'moya', 0, 0, 0.2667, 'M000', 1, '*'),
(8, 'moya pervaya', 'moya pervaya', 0, 1, 1.4, 'M161', 1, '*'),
(9, 'moya pervaya zapis', 'moya pervaya zapis', 0, 1, 1.6, 'M161212', 1, '*'),
(10, 'pervaya', 'pervaya', 0, 0, 0.4667, 'P610', 1, '*'),
(11, 'pervaya zapis', 'pervaya zapis', 0, 1, 1.4333, 'P61212', 1, '*'),
(12, 'uncategorized', 'uncategorized', 0, 0, 0.8667, 'U5232623', 1, '*'),
(13, 'zapis', 'zapis', 0, 0, 0.3333, 'Z120', 1, '*'),
(14, 'вячеслав', 'вячеслав', 0, 0, 0.5333, 'в000', 1, '*'),
(15, 'запись', 'запись', 0, 0, 0.4, 'з000', 1, '*'),
(16, 'моя', 'моя', 0, 0, 0.2, 'м000', 1, '*'),
(17, 'моя первая', 'моя первая', 0, 1, 1.3333, 'м000', 1, '*'),
(18, 'моя первая запись', 'моя первая запись', 0, 1, 1.5667, 'м000', 1, '*'),
(19, 'первая', 'первая', 0, 0, 0.4, 'п000', 1, '*'),
(20, 'первая запись', 'первая запись', 0, 1, 1.4333, 'п000', 1, '*');

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_finder_terms_common`
--

CREATE TABLE IF NOT EXISTS `n1wr9_finder_terms_common` (
  `term` varchar(75) NOT NULL,
  `language` varchar(3) NOT NULL,
  KEY `idx_word_lang` (`term`,`language`),
  KEY `idx_lang` (`language`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `n1wr9_finder_terms_common`
--

INSERT INTO `n1wr9_finder_terms_common` (`term`, `language`) VALUES
('a', 'en'),
('about', 'en'),
('after', 'en'),
('ago', 'en'),
('all', 'en'),
('am', 'en'),
('an', 'en'),
('and', 'en'),
('ani', 'en'),
('any', 'en'),
('are', 'en'),
('aren''t', 'en'),
('as', 'en'),
('at', 'en'),
('be', 'en'),
('but', 'en'),
('by', 'en'),
('for', 'en'),
('from', 'en'),
('get', 'en'),
('go', 'en'),
('how', 'en'),
('if', 'en'),
('in', 'en'),
('into', 'en'),
('is', 'en'),
('isn''t', 'en'),
('it', 'en'),
('its', 'en'),
('me', 'en'),
('more', 'en'),
('most', 'en'),
('must', 'en'),
('my', 'en'),
('new', 'en'),
('no', 'en'),
('none', 'en'),
('not', 'en'),
('noth', 'en'),
('nothing', 'en'),
('of', 'en'),
('off', 'en'),
('often', 'en'),
('old', 'en'),
('on', 'en'),
('onc', 'en'),
('once', 'en'),
('onli', 'en'),
('only', 'en'),
('or', 'en'),
('other', 'en'),
('our', 'en'),
('ours', 'en'),
('out', 'en'),
('over', 'en'),
('page', 'en'),
('she', 'en'),
('should', 'en'),
('small', 'en'),
('so', 'en'),
('some', 'en'),
('than', 'en'),
('thank', 'en'),
('that', 'en'),
('the', 'en'),
('their', 'en'),
('theirs', 'en'),
('them', 'en'),
('then', 'en'),
('there', 'en'),
('these', 'en'),
('they', 'en'),
('this', 'en'),
('those', 'en'),
('thus', 'en'),
('time', 'en'),
('times', 'en'),
('to', 'en'),
('too', 'en'),
('true', 'en'),
('under', 'en'),
('until', 'en'),
('up', 'en'),
('upon', 'en'),
('use', 'en'),
('user', 'en'),
('users', 'en'),
('veri', 'en'),
('version', 'en'),
('very', 'en'),
('via', 'en'),
('want', 'en'),
('was', 'en'),
('way', 'en'),
('were', 'en'),
('what', 'en'),
('when', 'en'),
('where', 'en'),
('whi', 'en'),
('which', 'en'),
('who', 'en'),
('whom', 'en'),
('whose', 'en'),
('why', 'en'),
('wide', 'en'),
('will', 'en'),
('with', 'en'),
('within', 'en'),
('without', 'en'),
('would', 'en'),
('yes', 'en'),
('yet', 'en'),
('you', 'en'),
('your', 'en'),
('yours', 'en');

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_finder_tokens`
--

CREATE TABLE IF NOT EXISTS `n1wr9_finder_tokens` (
  `term` varchar(75) NOT NULL,
  `stem` varchar(75) NOT NULL,
  `common` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `phrase` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `weight` float unsigned NOT NULL DEFAULT '1',
  `context` tinyint(1) unsigned NOT NULL DEFAULT '2',
  `language` char(3) NOT NULL DEFAULT '',
  KEY `idx_word` (`term`),
  KEY `idx_context` (`context`)
) ENGINE=MEMORY DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_finder_tokens_aggregate`
--

CREATE TABLE IF NOT EXISTS `n1wr9_finder_tokens_aggregate` (
  `term_id` int(10) unsigned NOT NULL,
  `map_suffix` char(1) NOT NULL,
  `term` varchar(75) NOT NULL,
  `stem` varchar(75) NOT NULL,
  `common` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `phrase` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `term_weight` float unsigned NOT NULL,
  `context` tinyint(1) unsigned NOT NULL DEFAULT '2',
  `context_weight` float unsigned NOT NULL,
  `total_weight` float unsigned NOT NULL,
  `language` char(3) NOT NULL DEFAULT '',
  KEY `token` (`term`),
  KEY `keyword_id` (`term_id`)
) ENGINE=MEMORY DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_finder_types`
--

CREATE TABLE IF NOT EXISTS `n1wr9_finder_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `mime` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `title` (`title`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `n1wr9_finder_types`
--

INSERT INTO `n1wr9_finder_types` (`id`, `title`, `mime`) VALUES
(1, 'Tag', ''),
(2, 'Category', ''),
(3, 'Contact', ''),
(4, 'Article', ''),
(5, 'News Feed', ''),
(6, 'EasyBlog', '');

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_languages`
--

CREATE TABLE IF NOT EXISTS `n1wr9_languages` (
  `lang_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `lang_code` char(7) NOT NULL,
  `title` varchar(50) NOT NULL,
  `title_native` varchar(50) NOT NULL,
  `sef` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `description` varchar(512) NOT NULL,
  `metakey` text NOT NULL,
  `metadesc` text NOT NULL,
  `sitename` varchar(1024) NOT NULL DEFAULT '',
  `published` int(11) NOT NULL DEFAULT '0',
  `access` int(10) unsigned NOT NULL DEFAULT '0',
  `ordering` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`lang_id`),
  UNIQUE KEY `idx_sef` (`sef`),
  UNIQUE KEY `idx_image` (`image`),
  UNIQUE KEY `idx_langcode` (`lang_code`),
  KEY `idx_access` (`access`),
  KEY `idx_ordering` (`ordering`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `n1wr9_languages`
--

INSERT INTO `n1wr9_languages` (`lang_id`, `lang_code`, `title`, `title_native`, `sef`, `image`, `description`, `metakey`, `metadesc`, `sitename`, `published`, `access`, `ordering`) VALUES
(1, 'en-GB', 'English (UK)', 'English (UK)', 'en', 'en', '', '', '', '', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_menu`
--

CREATE TABLE IF NOT EXISTS `n1wr9_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menutype` varchar(24) NOT NULL COMMENT 'The type of menu this item belongs to. FK to #__menu_types.menutype',
  `title` varchar(255) NOT NULL COMMENT 'The display title of the menu item.',
  `alias` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT 'The SEF alias of the menu item.',
  `note` varchar(255) NOT NULL DEFAULT '',
  `path` varchar(1024) NOT NULL COMMENT 'The computed path of the menu item based on the alias field.',
  `link` varchar(1024) NOT NULL COMMENT 'The actually link the menu item refers to.',
  `type` varchar(16) NOT NULL COMMENT 'The type of link: Component, URL, Alias, Separator',
  `published` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'The published state of the menu link.',
  `parent_id` int(10) unsigned NOT NULL DEFAULT '1' COMMENT 'The parent menu item in the menu tree.',
  `level` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'The relative level in the tree.',
  `component_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'FK to #__extensions.id',
  `checked_out` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'FK to #__users.id',
  `checked_out_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'The time the menu item was checked out.',
  `browserNav` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'The click behaviour of the link.',
  `access` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'The access level required to view the menu item.',
  `img` varchar(255) NOT NULL COMMENT 'The image of the menu item.',
  `template_style_id` int(10) unsigned NOT NULL DEFAULT '0',
  `params` text NOT NULL COMMENT 'JSON encoded data for the menu item.',
  `lft` int(11) NOT NULL DEFAULT '0' COMMENT 'Nested set lft.',
  `rgt` int(11) NOT NULL DEFAULT '0' COMMENT 'Nested set rgt.',
  `home` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT 'Indicates if this menu item is the home or default page.',
  `language` char(7) NOT NULL DEFAULT '',
  `client_id` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_client_id_parent_id_alias_language` (`client_id`,`parent_id`,`alias`,`language`),
  KEY `idx_componentid` (`component_id`,`menutype`,`published`,`access`),
  KEY `idx_menutype` (`menutype`),
  KEY `idx_left_right` (`lft`,`rgt`),
  KEY `idx_alias` (`alias`),
  KEY `idx_path` (`path`(255)),
  KEY `idx_language` (`language`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=172 ;

--
-- Dumping data for table `n1wr9_menu`
--

INSERT INTO `n1wr9_menu` (`id`, `menutype`, `title`, `alias`, `note`, `path`, `link`, `type`, `published`, `parent_id`, `level`, `component_id`, `checked_out`, `checked_out_time`, `browserNav`, `access`, `img`, `template_style_id`, `params`, `lft`, `rgt`, `home`, `language`, `client_id`) VALUES
(1, '', 'Menu_Item_Root', 'root', '', '', '', '', 1, 0, 0, 0, 0, '0000-00-00 00:00:00', 0, 0, '', 0, '', 0, 159, 0, '*', 0),
(2, 'menu', 'com_banners', 'Banners', '', 'Banners', 'index.php?option=com_banners', 'component', 0, 1, 1, 4, 0, '0000-00-00 00:00:00', 0, 0, 'class:banners', 0, '', 1, 10, 0, '*', 1),
(3, 'menu', 'com_banners', 'Banners', '', 'Banners/Banners', 'index.php?option=com_banners', 'component', 0, 2, 2, 4, 0, '0000-00-00 00:00:00', 0, 0, 'class:banners', 0, '', 2, 3, 0, '*', 1),
(4, 'menu', 'com_banners_categories', 'Categories', '', 'Banners/Categories', 'index.php?option=com_categories&extension=com_banners', 'component', 0, 2, 2, 6, 0, '0000-00-00 00:00:00', 0, 0, 'class:banners-cat', 0, '', 4, 5, 0, '*', 1),
(5, 'menu', 'com_banners_clients', 'Clients', '', 'Banners/Clients', 'index.php?option=com_banners&view=clients', 'component', 0, 2, 2, 4, 0, '0000-00-00 00:00:00', 0, 0, 'class:banners-clients', 0, '', 6, 7, 0, '*', 1),
(6, 'menu', 'com_banners_tracks', 'Tracks', '', 'Banners/Tracks', 'index.php?option=com_banners&view=tracks', 'component', 0, 2, 2, 4, 0, '0000-00-00 00:00:00', 0, 0, 'class:banners-tracks', 0, '', 8, 9, 0, '*', 1),
(7, 'menu', 'com_contact', 'Contacts', '', 'Contacts', 'index.php?option=com_contact', 'component', 0, 1, 1, 8, 0, '0000-00-00 00:00:00', 0, 0, 'class:contact', 0, '', 11, 16, 0, '*', 1),
(8, 'menu', 'com_contact', 'Contacts', '', 'Contacts/Contacts', 'index.php?option=com_contact', 'component', 0, 7, 2, 8, 0, '0000-00-00 00:00:00', 0, 0, 'class:contact', 0, '', 12, 13, 0, '*', 1),
(9, 'menu', 'com_contact_categories', 'Categories', '', 'Contacts/Categories', 'index.php?option=com_categories&extension=com_contact', 'component', 0, 7, 2, 6, 0, '0000-00-00 00:00:00', 0, 0, 'class:contact-cat', 0, '', 14, 15, 0, '*', 1),
(10, 'menu', 'com_messages', 'Messaging', '', 'Messaging', 'index.php?option=com_messages', 'component', 0, 1, 1, 15, 0, '0000-00-00 00:00:00', 0, 0, 'class:messages', 0, '', 17, 22, 0, '*', 1),
(11, 'menu', 'com_messages_add', 'New Private Message', '', 'Messaging/New Private Message', 'index.php?option=com_messages&task=message.add', 'component', 0, 10, 2, 15, 0, '0000-00-00 00:00:00', 0, 0, 'class:messages-add', 0, '', 18, 19, 0, '*', 1),
(12, 'menu', 'com_messages_read', 'Read Private Message', '', 'Messaging/Read Private Message', 'index.php?option=com_messages', 'component', 0, 10, 2, 15, 0, '0000-00-00 00:00:00', 0, 0, 'class:messages-read', 0, '', 20, 21, 0, '*', 1),
(13, 'menu', 'com_newsfeeds', 'News Feeds', '', 'News Feeds', 'index.php?option=com_newsfeeds', 'component', 0, 1, 1, 17, 0, '0000-00-00 00:00:00', 0, 0, 'class:newsfeeds', 0, '', 23, 28, 0, '*', 1),
(14, 'menu', 'com_newsfeeds_feeds', 'Feeds', '', 'News Feeds/Feeds', 'index.php?option=com_newsfeeds', 'component', 0, 13, 2, 17, 0, '0000-00-00 00:00:00', 0, 0, 'class:newsfeeds', 0, '', 24, 25, 0, '*', 1),
(15, 'menu', 'com_newsfeeds_categories', 'Categories', '', 'News Feeds/Categories', 'index.php?option=com_categories&extension=com_newsfeeds', 'component', 0, 13, 2, 6, 0, '0000-00-00 00:00:00', 0, 0, 'class:newsfeeds-cat', 0, '', 26, 27, 0, '*', 1),
(16, 'menu', 'com_redirect', 'Redirect', '', 'Redirect', 'index.php?option=com_redirect', 'component', 0, 1, 1, 24, 0, '0000-00-00 00:00:00', 0, 0, 'class:redirect', 0, '', 29, 30, 0, '*', 1),
(17, 'menu', 'com_search', 'Basic Search', '', 'Basic Search', 'index.php?option=com_search', 'component', 0, 1, 1, 19, 0, '0000-00-00 00:00:00', 0, 0, 'class:search', 0, '', 31, 32, 0, '*', 1),
(18, 'menu', 'com_finder', 'Smart Search', '', 'Smart Search', 'index.php?option=com_finder', 'component', 0, 1, 1, 27, 0, '0000-00-00 00:00:00', 0, 0, 'class:finder', 0, '', 33, 34, 0, '*', 1),
(19, 'menu', 'com_joomlaupdate', 'Joomla! Update', '', 'Joomla! Update', 'index.php?option=com_joomlaupdate', 'component', 1, 1, 1, 28, 0, '0000-00-00 00:00:00', 0, 0, 'class:joomlaupdate', 0, '', 35, 36, 0, '*', 1),
(20, 'main', 'com_tags', 'Tags', '', 'Tags', 'index.php?option=com_tags', 'component', 0, 1, 1, 29, 0, '0000-00-00 00:00:00', 0, 1, 'class:tags', 0, '', 37, 38, 0, '', 1),
(21, 'main', 'com_postinstall', 'Post-installation messages', '', 'Post-installation messages', 'index.php?option=com_postinstall', 'component', 0, 1, 1, 32, 0, '0000-00-00 00:00:00', 0, 1, 'class:postinstall', 0, '', 39, 40, 0, '*', 1),
(101, 'mainmenu', 'Home', 'home', '', 'home', 'index.php?option=com_content&view=featured', 'component', 1, 1, 1, 22, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '{"featured_categories":[""],"layout_type":"blog","num_leading_articles":"1","num_intro_articles":"3","num_columns":"3","num_links":"0","multi_column_order":"1","orderby_pri":"","orderby_sec":"front","order_date":"","show_pagination":"2","show_pagination_results":"1","show_title":"","link_titles":"","show_intro":"","info_block_position":"","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_vote":"","show_readmore":"","show_readmore_title":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_hits":"","show_noauth":"","show_feed_link":"1","feed_summary":"","menu-anchor_title":"","menu-anchor_css":"","menu_image":"","menu_text":1,"page_title":"","show_page_heading":1,"page_heading":"","pageclass_sfx":"","menu-meta_description":"","menu-meta_keywords":"","robots":"","secure":0}', 41, 42, 1, '*', 0),
(102, 'main', 'COM_EASYBLOG', 'com-easyblog', '', 'com-easyblog', 'index.php?option=com_easyblog', 'component', 0, 1, 1, 10003, 0, '0000-00-00 00:00:00', 0, 1, '../media/com_easyblog/images/easyblog-16x16.png', 0, '{}', 43, 84, 0, '', 1),
(103, 'main', 'COM_EASYBLOG_ADMIN_MENU_SETTINGS', 'com-easyblog-admin-menu-settings', '', 'com-easyblog/com-easyblog-admin-menu-settings', 'index.php?option=com_easyblog&view=settings', 'component', 0, 102, 2, 10003, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '{}', 44, 45, 0, '', 1),
(104, 'main', 'COM_EASYBLOG_ADMIN_MENU_AUTOPOSTING', 'com-easyblog-admin-menu-autoposting', '', 'com-easyblog/com-easyblog-admin-menu-autoposting', 'index.php?option=com_easyblog&view=autoposting', 'component', 0, 102, 2, 10003, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '{}', 46, 47, 0, '', 1),
(105, 'main', 'COM_EASYBLOG_ADMIN_MENU_POSTS', 'com-easyblog-admin-menu-posts', '', 'com-easyblog/com-easyblog-admin-menu-posts', 'index.php?option=com_easyblog&view=blogs', 'component', 0, 102, 2, 10003, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '{}', 48, 49, 0, '', 1),
(106, 'main', 'COM_EASYBLOG_ADMIN_MENU_BLOCKS', 'com-easyblog-admin-menu-blocks', '', 'com-easyblog/com-easyblog-admin-menu-blocks', 'index.php?option=com_easyblog&view=blocks', 'component', 0, 102, 2, 10003, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '{}', 50, 51, 0, '', 1),
(107, 'main', 'COM_EASYBLOG_ADMIN_MENU_CUSTOMFIELDS', 'com-easyblog-admin-menu-customfields', '', 'com-easyblog/com-easyblog-admin-menu-customfields', 'index.php?option=com_easyblog&view=fields', 'component', 0, 102, 2, 10003, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '{}', 52, 53, 0, '', 1),
(108, 'main', 'COM_EASYBLOG_ADMIN_MENU_CATEGORIES', 'com-easyblog-admin-menu-categories', '', 'com-easyblog/com-easyblog-admin-menu-categories', 'index.php?option=com_easyblog&view=categories', 'component', 0, 102, 2, 10003, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '{}', 54, 55, 0, '', 1),
(109, 'main', 'COM_EASYBLOG_ADMIN_MENU_COMMENTS', 'com-easyblog-admin-menu-comments', '', 'com-easyblog/com-easyblog-admin-menu-comments', 'index.php?option=com_easyblog&view=comments', 'component', 0, 102, 2, 10003, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '{}', 56, 57, 0, '', 1),
(110, 'main', 'COM_EASYBLOG_ADMIN_MENU_ACL', 'com-easyblog-admin-menu-acl', '', 'com-easyblog/com-easyblog-admin-menu-acl', 'index.php?option=com_easyblog&view=acls', 'component', 0, 102, 2, 10003, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '{}', 58, 59, 0, '', 1),
(111, 'main', 'COM_EASYBLOG_ADMIN_MENU_AUTHORS', 'com-easyblog-admin-menu-authors', '', 'com-easyblog/com-easyblog-admin-menu-authors', 'index.php?option=com_easyblog&view=bloggers', 'component', 0, 102, 2, 10003, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '{}', 60, 61, 0, '', 1),
(112, 'main', 'COM_EASYBLOG_ADMIN_MENU_FEED_IMPORTER', 'com-easyblog-admin-menu-feed-importer', '', 'com-easyblog/com-easyblog-admin-menu-feed-importer', 'index.php?option=com_easyblog&view=feeds', 'component', 0, 102, 2, 10003, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '{}', 62, 63, 0, '', 1),
(113, 'main', 'COM_EASYBLOG_ADMIN_MENU_MAIL_ACTIVITIES', 'com-easyblog-admin-menu-mail-activities', '', 'com-easyblog/com-easyblog-admin-menu-mail-activities', 'index.php?option=com_easyblog&view=spools', 'component', 0, 102, 2, 10003, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '{}', 64, 65, 0, '', 1),
(114, 'main', 'COM_EASYBLOG_ADMIN_MENU_LANGUAGES', 'com-easyblog-admin-menu-languages', '', 'com-easyblog/com-easyblog-admin-menu-languages', 'index.php?option=com_easyblog&view=languages', 'component', 0, 102, 2, 10003, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '{}', 66, 67, 0, '', 1),
(115, 'main', 'COM_EASYBLOG_ADMIN_MENU_SEO', 'com-easyblog-admin-menu-seo', '', 'com-easyblog/com-easyblog-admin-menu-seo', 'index.php?option=com_easyblog&view=metas', 'component', 0, 102, 2, 10003, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '{}', 68, 69, 0, '', 1),
(116, 'main', 'COM_EASYBLOG_ADMIN_MENU_MIGRATORS', 'com-easyblog-admin-menu-migrators', '', 'com-easyblog/com-easyblog-admin-menu-migrators', 'index.php?option=com_easyblog&view=migrators', 'component', 0, 102, 2, 10003, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '{}', 70, 71, 0, '', 1),
(117, 'main', 'COM_EASYBLOG_ADMIN_MENU_REPORTING', 'com-easyblog-admin-menu-reporting', '', 'com-easyblog/com-easyblog-admin-menu-reporting', 'index.php?option=com_easyblog&view=reports', 'component', 0, 102, 2, 10003, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '{}', 72, 73, 0, '', 1),
(118, 'main', 'COM_EASYBLOG_ADMIN_MENU_SUBSCRIPTIONS', 'com-easyblog-admin-menu-subscriptions', '', 'com-easyblog/com-easyblog-admin-menu-subscriptions', 'index.php?option=com_easyblog&view=subscriptions', 'component', 0, 102, 2, 10003, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '{}', 74, 75, 0, '', 1),
(119, 'main', 'COM_EASYBLOG_ADMIN_MENU_TAGS', 'com-easyblog-admin-menu-tags', '', 'com-easyblog/com-easyblog-admin-menu-tags', 'index.php?option=com_easyblog&view=tags', 'component', 0, 102, 2, 10003, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '{}', 76, 77, 0, '', 1),
(120, 'main', 'COM_EASYBLOG_ADMIN_MENU_TEAMBLOGS', 'com-easyblog-admin-menu-teamblogs', '', 'com-easyblog/com-easyblog-admin-menu-teamblogs', 'index.php?option=com_easyblog&view=teamblogs', 'component', 0, 102, 2, 10003, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '{}', 78, 79, 0, '', 1),
(121, 'main', 'COM_EASYBLOG_ADMIN_MENU_THEMES', 'com-easyblog-admin-menu-themes', '', 'com-easyblog/com-easyblog-admin-menu-themes', 'index.php?option=com_easyblog&view=themes', 'component', 0, 102, 2, 10003, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '{}', 80, 81, 0, '', 1),
(122, 'main', 'COM_EASYBLOG_ADMIN_MENU_MAINTENANCE', 'com-easyblog-admin-menu-maintenance', '', 'com-easyblog/com-easyblog-admin-menu-maintenance', 'index.php?option=com_easyblog&view=maintenance', 'component', 0, 102, 2, 10003, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '{}', 82, 83, 0, '', 1),
(123, 'mainmenu', 'Blog', 'blog', '', 'blog', 'index.php?option=com_easyblog&view=latest', 'component', 1, 1, 1, 10003, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '', 85, 86, 0, '*', 0),
(124, 'main', 'COM_COMMUNITY', 'com-community', '', 'com-community', 'index.php?option=com_community', 'component', 0, 1, 1, 10033, 0, '0000-00-00 00:00:00', 0, 1, 'components/com_community/assets/icons/community-favicon.png', 0, '{}', 87, 88, 0, '', 1),
(125, 'mainmenu', 'JomSocial', 'jomsocial', '', 'jomsocial', 'index.php?option=com_community&view=frontpage', 'component', 1, 1, 1, 10033, 0, '0000-00-00 00:00:00', 0, 1, ' ', 0, '{}', 89, 90, 0, '*', 0),
(126, 'jomsocial', 'Profile', 'profile', '', 'profile', 'index.php?option=com_community&view=profile', 'component', 1, 1, 1, 10033, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '', 91, 108, 0, '*', 0),
(127, 'jomsocial', 'Change Profile Picture', 'change-profile-picture', '', 'profile/change-profile-picture', 'index.php?option=com_community&view=profile&task=uploadAvatar', 'component', 1, 126, 2, 10033, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '', 92, 93, 0, '*', 0),
(128, 'jomsocial', 'Change Profile Video', 'change-profile-video', '', 'profile/change-profile-video', 'index.php?option=com_community&view=profile&task=linkVideo', 'component', 1, 126, 2, 10033, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '', 94, 95, 0, '*', 0),
(129, 'jomsocial', 'Edit Profile', 'edit-profile', '', 'profile/edit-profile', 'index.php?option=com_community&view=profile&task=edit', 'component', 1, 126, 2, 10033, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '', 96, 97, 0, '*', 0),
(130, 'jomsocial', 'Edit Details', 'edit-details', '', 'profile/edit-details', 'index.php?option=com_community&view=profile&task=editDetails', 'component', 1, 126, 2, 10033, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '', 98, 99, 0, '*', 0),
(131, 'jomsocial', 'Privacy', 'privacy', '', 'profile/privacy', 'index.php?option=com_community&view=profile&task=privacy', 'component', 1, 126, 2, 10033, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '', 100, 101, 0, '*', 0),
(132, 'jomsocial', 'Preferences', 'preferences', '', 'profile/preferences', 'index.php?option=com_community&view=profile&task=preferences', 'component', 1, 126, 2, 10033, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '', 102, 103, 0, '*', 0),
(133, 'jomsocial', 'Customize My Page', 'customize-my-page', '', 'profile/customize-my-page', 'index.php?option=com_community&view=profile&task=editPage', 'component', 1, 126, 2, 10033, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '', 104, 105, 0, '*', 0),
(134, 'jomsocial', 'Notifications', 'notifications', '', 'profile/notifications', 'index.php?option=com_community&view=profile&task=notifications', 'component', 1, 126, 2, 10033, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '', 106, 107, 0, '*', 0),
(135, 'jomsocial', 'Members', 'members', '', 'members', 'index.php?option=com_community&view=search&task=browse', 'component', 1, 1, 1, 10033, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '', 109, 114, 0, '*', 0),
(136, 'jomsocial', 'All Members', 'all-members', '', 'members/all-members', 'index.php?option=com_community&view=search&task=browse', 'component', 1, 135, 2, 10033, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '', 110, 111, 0, '*', 0),
(137, 'jomsocial', 'Advanced Search', 'advanced-search', '', 'members/advanced-search', 'index.php?option=com_community&view=search&task=advancesearch', 'component', 1, 135, 2, 10033, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '', 112, 113, 0, '*', 0),
(138, 'jomsocial', 'Friends', 'friends', '', 'friends', 'index.php?option=com_community&view=friends', 'component', 1, 1, 1, 10033, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '', 115, 122, 0, '*', 0),
(139, 'jomsocial', 'All Friends', 'all-friends', '', 'friends/all-friends', 'index.php?option=com_community&view=friends', 'component', 1, 138, 2, 10033, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '', 116, 117, 0, '*', 0),
(140, 'jomsocial', 'Request Sent', 'request-sent', '', 'friends/request-sent', 'index.php?option=com_community&view=friends&task=sent', 'component', 1, 138, 2, 10033, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '', 118, 119, 0, '*', 0),
(141, 'jomsocial', 'Pending my approval', 'pending-my-approval', '', 'friends/pending-my-approval', 'index.php?option=com_community&view=friends&task=pending', 'component', 1, 138, 2, 10033, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '', 120, 121, 0, '*', 0),
(142, 'jomsocial', 'Groups', 'groups', '', 'groups', 'index.php?option=com_community&view=groups&task=display', 'component', 1, 1, 1, 10033, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '', 123, 124, 0, '*', 0),
(143, 'jomsocial', 'Photos', 'photos', '', 'photos', 'index.php?option=com_community&view=photos&task=display', 'component', 1, 1, 1, 10033, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '', 125, 126, 0, '*', 0),
(144, 'jomsocial', 'Videos', 'videos', '', 'videos', 'index.php?option=com_community&view=videos&task=display', 'component', 1, 1, 1, 10033, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '', 127, 128, 0, '*', 0),
(145, 'jomsocial', 'Events', 'events', '', 'events', 'index.php?option=com_community&view=events&task=display', 'component', 1, 1, 1, 10033, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '', 129, 130, 0, '*', 0),
(146, 'jomsocial', 'Inbox', 'inbox', '', 'inbox', 'index.php?option=com_community&view=inbox', 'component', 1, 1, 1, 10033, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '', 131, 132, 0, '*', 0),
(153, 'mainmenu', 'тест', 'test', '', 'test', 'index.php?option=com_poster&view=poster&id=2', 'component', 1, 1, 1, 10081, 0, '0000-00-00 00:00:00', 0, 1, ' ', 0, '{"menu-anchor_title":"","menu-anchor_css":"","menu_image":"","menu_text":1,"page_title":"","show_page_heading":"","page_heading":"","pageclass_sfx":"","menu-meta_description":"","menu-meta_keywords":"","robots":"","secure":0}', 133, 134, 0, '*', 0),
(154, 'main', 'com_simpleregistration', 'com-simpleregistration', '', 'com-simpleregistration', 'index.php?option=com_simpleregistration', 'component', 0, 1, 1, 10078, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '{}', 135, 136, 0, '', 1),
(155, 'mainmenu', 'рег', 'reg', '', 'reg', 'index.php?option=com_simpleregistration&view=registrationform', 'component', 1, 1, 1, 10078, 0, '0000-00-00 00:00:00', 0, 1, ' ', 0, '{"menu-anchor_title":"","menu-anchor_css":"","menu_image":"","menu_text":1,"page_title":"","show_page_heading":"","page_heading":"","pageclass_sfx":"","menu-meta_description":"","menu-meta_keywords":"","robots":"","secure":0}', 137, 138, 0, '*', 0),
(156, 'main', 'poster', 'poster', '', 'poster', 'index.php?option=com_poster', 'component', 0, 1, 1, 10081, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '{}', 139, 140, 0, '', 1),
(163, 'main', 'com_form2content', 'com-form2content', '', 'com-form2content', 'index.php?option=com_form2content', 'component', 0, 1, 1, 10083, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '{}', 141, 152, 0, '', 1),
(164, 'main', 'COM_FORM2CONTENT_CONTENTTYPE_MANAGER', 'com-form2content-contenttype-manager', '', 'com-form2content/com-form2content-contenttype-manager', 'index.php?option=com_form2content&view=projects', 'component', 0, 163, 2, 10083, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '{}', 142, 143, 0, '', 1),
(165, 'main', 'COM_FORM2CONTENT_ARTICLE_MANAGER', 'com-form2content-article-manager', '', 'com-form2content/com-form2content-article-manager', 'index.php?option=com_form2content&view=forms', 'component', 0, 163, 2, 10083, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '{}', 144, 145, 0, '', 1),
(166, 'main', 'COM_FORM2CONTENT_TEMPLATE_MANAGER', 'com-form2content-template-manager', '', 'com-form2content/com-form2content-template-manager', 'index.php?option=com_form2content&view=templates', 'component', 0, 163, 2, 10083, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '{}', 146, 147, 0, '', 1),
(167, 'main', 'COM_FORM2CONTENT_DOCUMENTATION', 'com-form2content-documentation', '', 'com-form2content/com-form2content-documentation', 'index.php?option=com_form2content&view=documentation', 'component', 0, 163, 2, 10083, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '{}', 148, 149, 0, '', 1),
(168, 'main', 'COM_FORM2CONTENT_ABOUT', 'com-form2content-about', '', 'com-form2content/com-form2content-about', 'index.php?option=com_form2content&view=about', 'component', 0, 163, 2, 10083, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '{}', 150, 151, 0, '', 1),
(169, 'mainmenu', 'менеджер', 'menedzher', '', 'menedzher', 'index.php?option=com_form2content&view=forms', 'component', 1, 1, 1, 10083, 0, '0000-00-00 00:00:00', 0, 1, ' ', 0, '{"contenttypeid":"1","classic_layout":"0","menu-anchor_title":"","menu-anchor_css":"","menu_image":"","menu_text":1,"page_title":"","show_page_heading":"","page_heading":"","pageclass_sfx":"","menu-meta_description":"","menu-meta_keywords":"","robots":"","secure":0}', 153, 154, 0, '*', 0),
(170, 'mainmenu', 'Регистрация', 'signup', '', 'signup', 'index.php?option=com_poster&view=register', 'component', 1, 1, 1, 10081, 0, '0000-00-00 00:00:00', 0, 1, ' ', 0, '{"menu-anchor_title":"","menu-anchor_css":"","menu_image":"","menu_text":1,"page_title":"","show_page_heading":"","page_heading":"","pageclass_sfx":"","menu-meta_description":"","menu-meta_keywords":"","robots":"","secure":0}', 155, 156, 0, '*', 0),
(171, 'mainmenu', 'Войти', 'signin', '', 'signin', 'index.php?option=com_poster&view=login&task=showLogin', 'component', 1, 1, 1, 10081, 0, '0000-00-00 00:00:00', 0, 1, ' ', 0, '{"menu-anchor_title":"","menu-anchor_css":"","menu_image":"","menu_text":1,"page_title":"","show_page_heading":"","page_heading":"","pageclass_sfx":"","menu-meta_description":"","menu-meta_keywords":"","robots":"","secure":0}', 157, 158, 0, '*', 0);

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_menu_types`
--

CREATE TABLE IF NOT EXISTS `n1wr9_menu_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `menutype` varchar(24) NOT NULL,
  `title` varchar(48) NOT NULL,
  `description` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_menutype` (`menutype`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `n1wr9_menu_types`
--

INSERT INTO `n1wr9_menu_types` (`id`, `menutype`, `title`, `description`) VALUES
(1, 'mainmenu', 'Main Menu', 'The main menu for the site'),
(2, 'jomsocial', 'JomSocial toolbar', 'Toolbar items for JomSocial toolbar');

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_messages`
--

CREATE TABLE IF NOT EXISTS `n1wr9_messages` (
  `message_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id_from` int(10) unsigned NOT NULL DEFAULT '0',
  `user_id_to` int(10) unsigned NOT NULL DEFAULT '0',
  `folder_id` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `date_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `state` tinyint(1) NOT NULL DEFAULT '0',
  `priority` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `subject` varchar(255) NOT NULL DEFAULT '',
  `message` text NOT NULL,
  PRIMARY KEY (`message_id`),
  KEY `useridto_state` (`user_id_to`,`state`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_messages_cfg`
--

CREATE TABLE IF NOT EXISTS `n1wr9_messages_cfg` (
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `cfg_name` varchar(100) NOT NULL DEFAULT '',
  `cfg_value` varchar(255) NOT NULL DEFAULT '',
  UNIQUE KEY `idx_user_var_name` (`user_id`,`cfg_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_modules`
--

CREATE TABLE IF NOT EXISTS `n1wr9_modules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `asset_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'FK to the #__assets table.',
  `title` varchar(100) NOT NULL DEFAULT '',
  `note` varchar(255) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `ordering` int(11) NOT NULL DEFAULT '0',
  `position` varchar(50) NOT NULL DEFAULT '',
  `checked_out` int(10) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_up` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_down` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `module` varchar(50) DEFAULT NULL,
  `access` int(10) unsigned NOT NULL DEFAULT '0',
  `showtitle` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `params` text NOT NULL,
  `client_id` tinyint(4) NOT NULL DEFAULT '0',
  `language` char(7) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `published` (`published`,`access`),
  KEY `newsfeeds` (`module`,`published`),
  KEY `idx_language` (`language`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=129 ;

--
-- Dumping data for table `n1wr9_modules`
--

INSERT INTO `n1wr9_modules` (`id`, `asset_id`, `title`, `note`, `content`, `ordering`, `position`, `checked_out`, `checked_out_time`, `publish_up`, `publish_down`, `published`, `module`, `access`, `showtitle`, `params`, `client_id`, `language`) VALUES
(1, 39, 'Main Menu', '', '', 1, 'position-7', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_menu', 1, 1, '{"menutype":"mainmenu","startLevel":"0","endLevel":"0","showAllChildren":"0","tag_id":"","class_sfx":"","window_open":"","layout":"","moduleclass_sfx":"_menu","cache":"1","cache_time":"900","cachemode":"itemid"}', 0, '*'),
(2, 40, 'Login', '', '', 1, 'login', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_login', 1, 1, '', 1, '*'),
(3, 41, 'Popular Articles', '', '', 3, 'cpanel', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_popular', 3, 1, '{"count":"5","catid":"","user_id":"0","layout":"_:default","moduleclass_sfx":"","cache":"0"}', 1, '*'),
(4, 42, 'Recently Added Articles', '', '', 4, 'cpanel', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_latest', 3, 1, '{"count":"5","ordering":"c_dsc","catid":"","user_id":"0","layout":"_:default","moduleclass_sfx":"","cache":"0"}', 1, '*'),
(8, 43, 'Toolbar', '', '', 1, 'toolbar', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_toolbar', 3, 1, '', 1, '*'),
(9, 44, 'Quick Icons', '', '', 1, 'icon', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_quickicon', 3, 1, '', 1, '*'),
(10, 45, 'Logged-in Users', '', '', 2, 'cpanel', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_logged', 3, 1, '{"count":"5","name":"1","layout":"_:default","moduleclass_sfx":"","cache":"0"}', 1, '*'),
(12, 46, 'Admin Menu', '', '', 1, 'menu', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_menu', 3, 1, '{"layout":"","moduleclass_sfx":"","shownew":"1","showhelp":"1","cache":"0"}', 1, '*'),
(13, 47, 'Admin Submenu', '', '', 1, 'submenu', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_submenu', 3, 1, '', 1, '*'),
(14, 48, 'User Status', '', '', 2, 'status', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_status', 3, 1, '', 1, '*'),
(15, 49, 'Title', '', '', 1, 'title', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_title', 3, 1, '', 1, '*'),
(16, 50, 'Login Form', '', '', 7, 'position-7', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_login', 1, 1, '{"greeting":"1","name":"0"}', 0, '*'),
(17, 51, 'Breadcrumbs', '', '', 1, 'position-2', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_breadcrumbs', 1, 1, '{"moduleclass_sfx":"","showHome":"1","homeText":"","showComponent":"1","separator":"","cache":"1","cache_time":"900","cachemode":"itemid"}', 0, '*'),
(79, 52, 'Multilanguage status', '', '', 1, 'status', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'mod_multilangstatus', 3, 1, '{"layout":"_:default","moduleclass_sfx":"","cache":"0"}', 1, '*'),
(86, 53, 'Joomla Version', '', '', 1, 'footer', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_version', 3, 1, '{"format":"short","product":"1","layout":"_:default","moduleclass_sfx":"","cache":"0"}', 1, '*'),
(87, 55, 'EasyBlog - Archive Module', '', '', 0, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'mod_easyblogarchive', 1, 1, '', 0, '*'),
(88, 56, 'EasyBlog - Biography Module', '', '', 0, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'mod_easyblogbio', 1, 1, '', 0, '*'),
(89, 57, 'EasyBlog - Calendar Module', '', '', 0, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'mod_easyblogcalendar', 1, 1, '', 0, '*'),
(90, 58, 'Easyblog - Categories Module', '', '', 0, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'mod_easyblogcategories', 1, 1, '', 0, '*'),
(91, 59, 'EasyBlog - Image Wall Module', '', '', 0, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'mod_easyblogimagewall', 1, 1, '', 0, '*'),
(92, 60, 'EasyBlog - Latest Bloggers Module', '', '', 0, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'mod_easybloglatestblogger', 1, 1, '', 0, '*'),
(93, 61, 'EasyBlog - Latest Blogs Module', '', '', 0, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'mod_easybloglatestblogs', 1, 1, '', 0, '*'),
(94, 62, 'EasyBlog - Latest Comments Module', '', '', 0, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'mod_easybloglatestcomment', 1, 1, '', 0, '*'),
(95, 63, 'EasyBlog - Posts List', '', '', 0, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'mod_easybloglist', 1, 1, '', 0, '*'),
(96, 64, 'EasyBlog - Most Commented Post Module', '', '', 0, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'mod_easyblogmostcommentedpost', 1, 1, '', 0, '*'),
(97, 65, 'EasyBlog - Most Popular Post Module', '', '', 0, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'mod_easyblogmostpopularpost', 1, 1, '', 0, '*'),
(98, 66, 'EasyBlog - Post Map Module', '', '', 0, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'mod_easyblogpostmap', 1, 1, '', 0, '*'),
(99, 67, 'EasyBlog - Post Meta Module', '', '', 0, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'mod_easyblogpostmeta', 1, 1, '', 0, '*'),
(100, 68, 'EasyBlog - Quick Post Module', '', '', 0, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'mod_easyblogquickpost', 1, 1, '', 0, '*'),
(101, 69, 'EasyBlog - Random Post Module', '', '', 0, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'mod_easyblograndompost', 1, 1, '', 0, '*'),
(102, 70, 'EasyBlog - Related Posts Module', '', '', 0, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'mod_easyblogrelatedpost', 1, 1, '', 0, '*'),
(103, 71, 'EasyBlog - Search Blogs Module', '', '', 0, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'mod_easyblogsearch', 1, 1, '', 0, '*'),
(104, 72, 'EasyBlog - Showcase Module', '', '', 0, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'mod_easyblogshowcase', 1, 1, '', 0, '*'),
(105, 73, 'EasyBlog - Subscribe Module', '', '', 0, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'mod_easyblogsubscribe', 1, 1, '', 0, '*'),
(106, 74, 'EasyBlog - Subscribers Listing Module', '', '', 0, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'mod_easyblogsubscribers', 1, 1, '', 0, '*'),
(107, 75, 'EasyBlog - Tag Cloud Module', '', '', 0, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'mod_easyblogtagcloud', 1, 1, '', 0, '*'),
(108, 76, 'EasyBlog - Team Blogs Module', '', '', 0, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'mod_easyblogteamblogs', 1, 1, '', 0, '*'),
(109, 77, 'EasyBlog - Ticker Module', '', '', 0, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'mod_easyblogticker', 1, 1, '', 0, '*'),
(110, 78, 'EasyBlog - Top Blogs Module', '', '', 0, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'mod_easyblogtopblogs', 1, 1, '', 0, '*'),
(111, 79, 'EasyBlog - Welcome Module', '', '', 0, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'mod_easyblogwelcome', 1, 1, '', 0, '*'),
(112, 81, 'JS Activity Stream', '', '', 0, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'mod_community_activitystream', 1, 1, '', 0, '*'),
(113, 82, 'JS Discussions', '', '', 0, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'mod_community_discussions', 1, 1, '', 0, '*'),
(114, 83, 'JS Events', '', '', 1, 'js_side_frontpage_bottom', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_community_events', 1, 1, '{"default":""}', 0, '*'),
(115, 84, 'JS Events Calendar', '', '', 0, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'mod_community_eventscalendar', 1, 1, '', 0, '*'),
(116, 85, 'JS Groups', '', '', 1, 'js_side_frontpage_bottom', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_community_groups', 1, 1, '{"default":""}', 0, '*'),
(117, 86, 'JS Hello Me', '', '', 0, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'mod_community_hellome', 1, 1, '', 0, '*'),
(118, 87, 'JS Members', '', '', 1, 'js_side_frontpage_top', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_community_members', 1, 1, '{"default":""}', 0, '*'),
(119, 88, 'JS Members Search', '', '', 0, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'mod_community_memberssearch', 1, 1, '', 0, '*'),
(120, 89, 'JS Nearby Events Search', '', '', 0, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'mod_community_nearbyevents', 1, 1, '', 0, '*'),
(121, 90, 'JS Notifications', '', '', 0, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'mod_community_notifications', 1, 1, '', 0, '*'),
(122, 91, 'JS Photo Comments', '', '', 0, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'mod_community_photocomments', 1, 1, '', 0, '*'),
(123, 92, 'JS Photos', '', '', 1, 'js_side_frontpage', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_community_photos', 1, 1, '{"default":""}', 0, '*'),
(124, 93, 'JS Statistics', '', '', 0, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'mod_community_statistics', 1, 1, '', 0, '*'),
(125, 94, 'JS Top Members', '', '', 0, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'mod_community_topmembers', 1, 1, '', 0, '*'),
(126, 95, 'JS Video Comments', '', '', 0, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'mod_community_videocomments', 1, 1, '', 0, '*'),
(127, 96, 'JS Videos', '', '', 1, 'js_side_frontpage', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_community_videos', 1, 1, '{"default":""}', 0, '*'),
(128, 104, 'Simple Registration', '', '', 0, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'mod_simpleregistration', 1, 1, '', 0, '*');

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_modules_menu`
--

CREATE TABLE IF NOT EXISTS `n1wr9_modules_menu` (
  `moduleid` int(11) NOT NULL DEFAULT '0',
  `menuid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`moduleid`,`menuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `n1wr9_modules_menu`
--

INSERT INTO `n1wr9_modules_menu` (`moduleid`, `menuid`) VALUES
(1, 0),
(2, 0),
(3, 0),
(4, 0),
(6, 0),
(7, 0),
(8, 0),
(9, 0),
(10, 0),
(12, 0),
(13, 0),
(14, 0),
(15, 0),
(16, 0),
(17, 0),
(79, 0),
(86, 0),
(87, 0),
(88, 0),
(89, 0),
(90, 0),
(91, 0),
(92, 0),
(93, 0),
(94, 0),
(95, 0),
(96, 0),
(97, 0),
(98, 0),
(99, 0),
(100, 0),
(101, 0),
(102, 0),
(103, 0),
(104, 0),
(105, 0),
(106, 0),
(107, 0),
(108, 0),
(109, 0),
(110, 0),
(111, 0),
(114, 0),
(116, 0),
(118, 0),
(123, 0),
(127, 0);

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_newsfeeds`
--

CREATE TABLE IF NOT EXISTS `n1wr9_newsfeeds` (
  `catid` int(11) NOT NULL DEFAULT '0',
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  `alias` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `link` varchar(200) NOT NULL DEFAULT '',
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `numarticles` int(10) unsigned NOT NULL DEFAULT '1',
  `cache_time` int(10) unsigned NOT NULL DEFAULT '3600',
  `checked_out` int(10) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `rtl` tinyint(4) NOT NULL DEFAULT '0',
  `access` int(10) unsigned NOT NULL DEFAULT '0',
  `language` char(7) NOT NULL DEFAULT '',
  `params` text NOT NULL,
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(10) unsigned NOT NULL DEFAULT '0',
  `created_by_alias` varchar(255) NOT NULL DEFAULT '',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(10) unsigned NOT NULL DEFAULT '0',
  `metakey` text NOT NULL,
  `metadesc` text NOT NULL,
  `metadata` text NOT NULL,
  `xreference` varchar(50) NOT NULL COMMENT 'A reference to enable linkages to external data sets.',
  `publish_up` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_down` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `description` text NOT NULL,
  `version` int(10) unsigned NOT NULL DEFAULT '1',
  `hits` int(10) unsigned NOT NULL DEFAULT '0',
  `images` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_access` (`access`),
  KEY `idx_checkout` (`checked_out`),
  KEY `idx_state` (`published`),
  KEY `idx_catid` (`catid`),
  KEY `idx_createdby` (`created_by`),
  KEY `idx_language` (`language`),
  KEY `idx_xreference` (`xreference`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_overrider`
--

CREATE TABLE IF NOT EXISTS `n1wr9_overrider` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `constant` varchar(255) NOT NULL,
  `string` text NOT NULL,
  `file` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_poster`
--

CREATE TABLE IF NOT EXISTS `n1wr9_poster` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `greeting` varchar(25) NOT NULL,
  `published` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `n1wr9_poster`
--

INSERT INTO `n1wr9_poster` (`id`, `greeting`, `published`) VALUES
(1, 'Hello World!', 0),
(2, 'Good bye World!', 0);

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_poster_categories`
--

CREATE TABLE IF NOT EXISTS `n1wr9_poster_categories` (
  `category_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `n1wr9_poster_categories`
--

INSERT INTO `n1wr9_poster_categories` (`category_id`, `title`, `parent_id`, `created`) VALUES
(1, 'Кухня', 0, '2016-05-08 00:00:00'),
(2, 'Столовая', 0, '2016-05-08 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_poster_fields`
--

CREATE TABLE IF NOT EXISTS `n1wr9_poster_fields` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `n1wr9_poster_fields`
--

INSERT INTO `n1wr9_poster_fields` (`id`, `type`, `name`) VALUES
(1, 'text', 'Имя пользователя'),
(2, 'text', 'Имя эксперта/Название компании'),
(3, 'text', 'Категория'),
(4, 'text', 'Контактное лицо'),
(5, 'text', 'Телефон'),
(6, 'text', 'Имя (в открытом доступе)'),
(7, 'text', 'Фамилия (в открытом доступе)'),
(8, 'textarea', 'Описание рода деятельности'),
(9, 'textarea', 'Предоставляемые услуги'),
(10, 'textarea', 'География работ'),
(11, 'text', 'Сайт'),
(12, 'textarea', 'Профессиональная информация'),
(13, 'textarea', 'Награды и дипломы');

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_poster_fields_values`
--

CREATE TABLE IF NOT EXISTS `n1wr9_poster_fields_values` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `field_id` int(11) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_poster_profiles`
--

CREATE TABLE IF NOT EXISTS `n1wr9_poster_profiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `avatar` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `n1wr9_poster_profiles`
--

INSERT INTO `n1wr9_poster_profiles` (`id`, `name`, `description`, `avatar`) VALUES
(1, 'Домовладелец', 'Я владелец дома, квартиры или меня просто интересует ремонт и дизайн интерьера.', ''),
(2, 'Эксперт', 'Я предлагаю услуги по дизайну интерьера или продаю товары для обустройства дома.', '');

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_poster_profiles_fields`
--

CREATE TABLE IF NOT EXISTS `n1wr9_poster_profiles_fields` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent` int(11) NOT NULL,
  `field_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `n1wr9_poster_profiles_fields`
--

INSERT INTO `n1wr9_poster_profiles_fields` (`id`, `parent`, `field_id`) VALUES
(1, 1, 6),
(2, 1, 7),
(3, 2, 1),
(4, 2, 2),
(5, 2, 3),
(6, 2, 4),
(7, 2, 5),
(8, 2, 8),
(9, 2, 9),
(10, 2, 10),
(11, 2, 11),
(12, 2, 12),
(13, 2, 13);

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_poster_projects`
--

CREATE TABLE IF NOT EXISTS `n1wr9_poster_projects` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_by` bigint(20) unsigned NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `title` text NOT NULL,
  `permalink` text NOT NULL,
  `content` longtext NOT NULL,
  `images` text NOT NULL,
  `intro` longtext NOT NULL,
  `category_id` bigint(20) unsigned NOT NULL,
  `published` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `n1wr9_poster_projects`
--

INSERT INTO `n1wr9_poster_projects` (`id`, `created_by`, `created`, `modified`, `title`, `permalink`, `content`, `images`, `intro`, `category_id`, `published`) VALUES
(1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'first_project', 'first_project', 'first_project_long', '["\\/images\\/proj\\/1.jpg","\\/images\\/proj\\/2.jpg","\\/images\\/proj\\/3.jpg","\\/images\\/proj\\/4.jpg","\\/images\\/proj\\/5.jpg"]', 'first_project', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_poster_register`
--

CREATE TABLE IF NOT EXISTS `n1wr9_poster_register` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `token` varchar(200) NOT NULL,
  `username` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created` datetime DEFAULT NULL,
  `ip` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_poster_register_auth_token`
--

CREATE TABLE IF NOT EXISTS `n1wr9_poster_register_auth_token` (
  `token` varchar(200) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `auth_key` varchar(200) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `n1wr9_poster_register_auth_token`
--

INSERT INTO `n1wr9_poster_register_auth_token` (`token`, `ip`, `auth_key`, `created`) VALUES
('51b8e7558cc334b3067feeed381bb9c1', '127.0.0.1', '79e90756a5c2c0414da8e4a7913badf6', '2016-05-25 12:26:35');

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_poster_users`
--

CREATE TABLE IF NOT EXISTS `n1wr9_poster_users` (
  `userid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `avatar` text NOT NULL,
  `cover` text NOT NULL,
  `followers` int(11) NOT NULL DEFAULT '0',
  `following` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `n1wr9_poster_users`
--

INSERT INTO `n1wr9_poster_users` (`userid`, `avatar`, `cover`, `followers`, `following`) VALUES
(10, '', '', 0, 0),
(11, '', '', 0, 0),
(12, '', '', 0, 0),
(13, '', '', 0, 0),
(14, '', '', 0, 0),
(15, '', '', 0, 0),
(16, '', '', 0, 0),
(18, '', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_postinstall_messages`
--

CREATE TABLE IF NOT EXISTS `n1wr9_postinstall_messages` (
  `postinstall_message_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `extension_id` bigint(20) NOT NULL DEFAULT '700' COMMENT 'FK to #__extensions',
  `title_key` varchar(255) NOT NULL DEFAULT '' COMMENT 'Lang key for the title',
  `description_key` varchar(255) NOT NULL DEFAULT '' COMMENT 'Lang key for description',
  `action_key` varchar(255) NOT NULL DEFAULT '',
  `language_extension` varchar(255) NOT NULL DEFAULT 'com_postinstall' COMMENT 'Extension holding lang keys',
  `language_client_id` tinyint(3) NOT NULL DEFAULT '1',
  `type` varchar(10) NOT NULL DEFAULT 'link' COMMENT 'Message type - message, link, action',
  `action_file` varchar(255) DEFAULT '' COMMENT 'RAD URI to the PHP file containing action method',
  `action` varchar(255) DEFAULT '' COMMENT 'Action method name or URL',
  `condition_file` varchar(255) DEFAULT NULL COMMENT 'RAD URI to file holding display condition method',
  `condition_method` varchar(255) DEFAULT NULL COMMENT 'Display condition method, must return boolean',
  `version_introduced` varchar(50) NOT NULL DEFAULT '3.2.0' COMMENT 'Version when this message was introduced',
  `enabled` tinyint(3) NOT NULL DEFAULT '1',
  PRIMARY KEY (`postinstall_message_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `n1wr9_postinstall_messages`
--

INSERT INTO `n1wr9_postinstall_messages` (`postinstall_message_id`, `extension_id`, `title_key`, `description_key`, `action_key`, `language_extension`, `language_client_id`, `type`, `action_file`, `action`, `condition_file`, `condition_method`, `version_introduced`, `enabled`) VALUES
(1, 700, 'PLG_TWOFACTORAUTH_TOTP_POSTINSTALL_TITLE', 'PLG_TWOFACTORAUTH_TOTP_POSTINSTALL_BODY', 'PLG_TWOFACTORAUTH_TOTP_POSTINSTALL_ACTION', 'plg_twofactorauth_totp', 1, 'action', 'site://plugins/twofactorauth/totp/postinstall/actions.php', 'twofactorauth_postinstall_action', 'site://plugins/twofactorauth/totp/postinstall/actions.php', 'twofactorauth_postinstall_condition', '3.2.0', 1),
(2, 700, 'COM_CPANEL_WELCOME_BEGINNERS_TITLE', 'COM_CPANEL_WELCOME_BEGINNERS_MESSAGE', '', 'com_cpanel', 1, 'message', '', '', '', '', '3.2.0', 1);

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_redirect_links`
--

CREATE TABLE IF NOT EXISTS `n1wr9_redirect_links` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `old_url` varchar(255) NOT NULL,
  `new_url` varchar(255) DEFAULT NULL,
  `referer` varchar(150) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `hits` int(10) unsigned NOT NULL DEFAULT '0',
  `published` tinyint(4) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `header` smallint(3) NOT NULL DEFAULT '301',
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_link_old` (`old_url`),
  KEY `idx_link_modifed` (`modified_date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_schemas`
--

CREATE TABLE IF NOT EXISTS `n1wr9_schemas` (
  `extension_id` int(11) NOT NULL,
  `version_id` varchar(20) NOT NULL,
  PRIMARY KEY (`extension_id`,`version_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `n1wr9_schemas`
--

INSERT INTO `n1wr9_schemas` (`extension_id`, `version_id`) VALUES
(700, '3.4.0-2015-02-26'),
(10081, '0.0.6');

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_session`
--

CREATE TABLE IF NOT EXISTS `n1wr9_session` (
  `session_id` varchar(200) NOT NULL DEFAULT '',
  `client_id` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `guest` tinyint(4) unsigned DEFAULT '1',
  `time` varchar(14) DEFAULT '',
  `data` mediumtext,
  `userid` int(11) DEFAULT '0',
  `username` varchar(150) DEFAULT '',
  PRIMARY KEY (`session_id`),
  KEY `userid` (`userid`),
  KEY `time` (`time`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `n1wr9_session`
--

INSERT INTO `n1wr9_session` (`session_id`, `client_id`, `guest`, `time`, `data`, `userid`, `username`) VALUES
('ef4l3ln99qdolhb6o46v29h803', 0, 1, '1464180388', 'joomla|s:1552:"TzoyNDoiSm9vbWxhXFJlZ2lzdHJ5XFJlZ2lzdHJ5IjoyOntzOjc6IgAqAGRhdGEiO086ODoic3RkQ2xhc3MiOjE6e3M6OToiX19kZWZhdWx0IjtPOjg6InN0ZENsYXNzIjozOntzOjc6InNlc3Npb24iO086ODoic3RkQ2xhc3MiOjM6e3M6NzoiY291bnRlciI7aTo5O3M6NToidGltZXIiO086ODoic3RkQ2xhc3MiOjM6e3M6NToic3RhcnQiO2k6MTQ2NDE4MDM1MztzOjQ6Imxhc3QiO2k6MTQ2NDE4MDM4ODtzOjM6Im5vdyI7aToxNDY0MTgwMzg4O31zOjU6InRva2VuIjtzOjMyOiI1MmIyNTMxODBmZTQ5MjNiZGQ5NTU0MWY1MDExM2U3MiI7fXM6ODoicmVnaXN0cnkiO086MjQ6Ikpvb21sYVxSZWdpc3RyeVxSZWdpc3RyeSI6Mjp7czo3OiIAKgBkYXRhIjtPOjg6InN0ZENsYXNzIjowOnt9czo5OiJzZXBhcmF0b3IiO3M6MToiLiI7fXM6NDoidXNlciI7Tzo1OiJKVXNlciI6MjY6e3M6OToiACoAaXNSb290IjtiOjA7czoyOiJpZCI7aTowO3M6NDoibmFtZSI7TjtzOjg6InVzZXJuYW1lIjtOO3M6NToiZW1haWwiO047czo4OiJwYXNzd29yZCI7TjtzOjE0OiJwYXNzd29yZF9jbGVhciI7czowOiIiO3M6NToiYmxvY2siO047czo5OiJzZW5kRW1haWwiO2k6MDtzOjEyOiJyZWdpc3RlckRhdGUiO047czoxMzoibGFzdHZpc2l0RGF0ZSI7TjtzOjEwOiJhY3RpdmF0aW9uIjtOO3M6NjoicGFyYW1zIjtOO3M6NjoiZ3JvdXBzIjthOjE6e2k6MDtzOjE6IjkiO31zOjU6Imd1ZXN0IjtpOjE7czoxMzoibGFzdFJlc2V0VGltZSI7TjtzOjEwOiJyZXNldENvdW50IjtOO3M6MTI6InJlcXVpcmVSZXNldCI7TjtzOjEwOiIAKgBfcGFyYW1zIjtPOjI0OiJKb29tbGFcUmVnaXN0cnlcUmVnaXN0cnkiOjI6e3M6NzoiACoAZGF0YSI7Tzo4OiJzdGRDbGFzcyI6MDp7fXM6OToic2VwYXJhdG9yIjtzOjE6Ii4iO31zOjE0OiIAKgBfYXV0aEdyb3VwcyI7YToyOntpOjA7aToxO2k6MTtpOjk7fXM6MTQ6IgAqAF9hdXRoTGV2ZWxzIjthOjM6e2k6MDtpOjE7aToxO2k6MTtpOjI7aTo1O31zOjE1OiIAKgBfYXV0aEFjdGlvbnMiO047czoxMjoiACoAX2Vycm9yTXNnIjtOO3M6MTM6IgAqAHVzZXJIZWxwZXIiO086MTg6IkpVc2VyV3JhcHBlckhlbHBlciI6MDp7fXM6MTA6IgAqAF9lcnJvcnMiO2E6MDp7fXM6MzoiYWlkIjtpOjA7fX19czo5OiJzZXBhcmF0b3IiO3M6MToiLiI7fQ==";', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_tags`
--

CREATE TABLE IF NOT EXISTS `n1wr9_tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0',
  `lft` int(11) NOT NULL DEFAULT '0',
  `rgt` int(11) NOT NULL DEFAULT '0',
  `level` int(10) unsigned NOT NULL DEFAULT '0',
  `path` varchar(255) NOT NULL DEFAULT '',
  `title` varchar(255) NOT NULL,
  `alias` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `note` varchar(255) NOT NULL DEFAULT '',
  `description` mediumtext NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `checked_out` int(11) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `access` int(10) unsigned NOT NULL DEFAULT '0',
  `params` text NOT NULL,
  `metadesc` varchar(1024) NOT NULL COMMENT 'The meta description for the page.',
  `metakey` varchar(1024) NOT NULL COMMENT 'The meta keywords for the page.',
  `metadata` varchar(2048) NOT NULL COMMENT 'JSON encoded metadata properties.',
  `created_user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `created_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by_alias` varchar(255) NOT NULL DEFAULT '',
  `modified_user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `modified_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `images` text NOT NULL,
  `urls` text NOT NULL,
  `hits` int(10) unsigned NOT NULL DEFAULT '0',
  `language` char(7) NOT NULL,
  `version` int(10) unsigned NOT NULL DEFAULT '1',
  `publish_up` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_down` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `tag_idx` (`published`,`access`),
  KEY `idx_access` (`access`),
  KEY `idx_checkout` (`checked_out`),
  KEY `idx_path` (`path`),
  KEY `idx_left_right` (`lft`,`rgt`),
  KEY `idx_alias` (`alias`),
  KEY `idx_language` (`language`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `n1wr9_tags`
--

INSERT INTO `n1wr9_tags` (`id`, `parent_id`, `lft`, `rgt`, `level`, `path`, `title`, `alias`, `note`, `description`, `published`, `checked_out`, `checked_out_time`, `access`, `params`, `metadesc`, `metakey`, `metadata`, `created_user_id`, `created_time`, `created_by_alias`, `modified_user_id`, `modified_time`, `images`, `urls`, `hits`, `language`, `version`, `publish_up`, `publish_down`) VALUES
(1, 0, 0, 1, 0, '', 'ROOT', 'root', '', '', 1, 0, '0000-00-00 00:00:00', 1, '', '', '', '', 42, '2011-01-01 00:00:01', '', 0, '0000-00-00 00:00:00', '', '', 0, '*', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_template_styles`
--

CREATE TABLE IF NOT EXISTS `n1wr9_template_styles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `template` varchar(50) NOT NULL DEFAULT '',
  `client_id` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `home` char(7) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL DEFAULT '',
  `params` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_template` (`template`),
  KEY `idx_home` (`home`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `n1wr9_template_styles`
--

INSERT INTO `n1wr9_template_styles` (`id`, `template`, `client_id`, `home`, `title`, `params`) VALUES
(4, 'beez3', 0, '0', 'Beez3 - Default', '{"wrapperSmall":"53","wrapperLarge":"72","logo":"images\\/joomla_black.png","sitetitle":"Joomla!","sitedescription":"Open Source Content Management","navposition":"left","templatecolor":"personal","html5":"0"}'),
(5, 'hathor', 1, '0', 'Hathor - Default', '{"showSiteName":"0","colourChoice":"","boldText":"0"}'),
(7, 'protostar', 0, '1', 'protostar - Default', '{"templateColor":"","logoFile":"","googleFont":"1","googleFontName":"Open+Sans","fluidContainer":"0"}'),
(8, 'isis', 1, '1', 'isis - Default', '{"templateColor":"","logoFile":""}');

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_ucm_base`
--

CREATE TABLE IF NOT EXISTS `n1wr9_ucm_base` (
  `ucm_id` int(10) unsigned NOT NULL,
  `ucm_item_id` int(10) NOT NULL,
  `ucm_type_id` int(11) NOT NULL,
  `ucm_language_id` int(11) NOT NULL,
  PRIMARY KEY (`ucm_id`),
  KEY `idx_ucm_item_id` (`ucm_item_id`),
  KEY `idx_ucm_type_id` (`ucm_type_id`),
  KEY `idx_ucm_language_id` (`ucm_language_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_ucm_content`
--

CREATE TABLE IF NOT EXISTS `n1wr9_ucm_content` (
  `core_content_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `core_type_alias` varchar(255) NOT NULL DEFAULT '' COMMENT 'FK to the content types table',
  `core_title` varchar(255) NOT NULL,
  `core_alias` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `core_body` mediumtext NOT NULL,
  `core_state` tinyint(1) NOT NULL DEFAULT '0',
  `core_checked_out_time` varchar(255) NOT NULL DEFAULT '',
  `core_checked_out_user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `core_access` int(10) unsigned NOT NULL DEFAULT '0',
  `core_params` text NOT NULL,
  `core_featured` tinyint(4) unsigned NOT NULL DEFAULT '0',
  `core_metadata` varchar(2048) NOT NULL COMMENT 'JSON encoded metadata properties.',
  `core_created_user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `core_created_by_alias` varchar(255) NOT NULL DEFAULT '',
  `core_created_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `core_modified_user_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'Most recent user that modified',
  `core_modified_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `core_language` char(7) NOT NULL,
  `core_publish_up` datetime NOT NULL,
  `core_publish_down` datetime NOT NULL,
  `core_content_item_id` int(10) unsigned DEFAULT NULL COMMENT 'ID from the individual type table',
  `asset_id` int(10) unsigned DEFAULT NULL COMMENT 'FK to the #__assets table.',
  `core_images` text NOT NULL,
  `core_urls` text NOT NULL,
  `core_hits` int(10) unsigned NOT NULL DEFAULT '0',
  `core_version` int(10) unsigned NOT NULL DEFAULT '1',
  `core_ordering` int(11) NOT NULL DEFAULT '0',
  `core_metakey` text NOT NULL,
  `core_metadesc` text NOT NULL,
  `core_catid` int(10) unsigned NOT NULL DEFAULT '0',
  `core_xreference` varchar(50) NOT NULL COMMENT 'A reference to enable linkages to external data sets.',
  `core_type_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`core_content_id`),
  KEY `tag_idx` (`core_state`,`core_access`),
  KEY `idx_access` (`core_access`),
  KEY `idx_alias` (`core_alias`),
  KEY `idx_language` (`core_language`),
  KEY `idx_title` (`core_title`),
  KEY `idx_modified_time` (`core_modified_time`),
  KEY `idx_created_time` (`core_created_time`),
  KEY `idx_content_type` (`core_type_alias`),
  KEY `idx_core_modified_user_id` (`core_modified_user_id`),
  KEY `idx_core_checked_out_user_id` (`core_checked_out_user_id`),
  KEY `idx_core_created_user_id` (`core_created_user_id`),
  KEY `idx_core_type_id` (`core_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Contains core content data in name spaced fields' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_ucm_history`
--

CREATE TABLE IF NOT EXISTS `n1wr9_ucm_history` (
  `version_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ucm_item_id` int(10) unsigned NOT NULL,
  `ucm_type_id` int(10) unsigned NOT NULL,
  `version_note` varchar(255) NOT NULL DEFAULT '' COMMENT 'Optional version name',
  `save_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `editor_user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `character_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'Number of characters in this version.',
  `sha1_hash` varchar(50) NOT NULL DEFAULT '' COMMENT 'SHA1 hash of the version_data column.',
  `version_data` mediumtext NOT NULL COMMENT 'json-encoded string of version data',
  `keep_forever` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0=auto delete; 1=keep',
  PRIMARY KEY (`version_id`),
  KEY `idx_ucm_item_id` (`ucm_type_id`,`ucm_item_id`),
  KEY `idx_save_date` (`save_date`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `n1wr9_ucm_history`
--

INSERT INTO `n1wr9_ucm_history` (`version_id`, `ucm_item_id`, `ucm_type_id`, `version_note`, `save_date`, `editor_user_id`, `character_count`, `sha1_hash`, `version_data`, `keep_forever`) VALUES
(1, 1, 1, '', '2016-04-19 10:00:25', 311, 6028, '369a0cd0536ca3bbd79d6b927e2070330eb0ac58', '{"id":1,"asset_id":110,"title":"Getting started with Form2Content Lite","alias":"getting-started-with-form2content-lite","introtext":"<!--\\nThis is the FORM2CONTENT INTRO TEMPLATE for the BLOG CONTENT TYPE \\n\\nIt can be found in < root >\\/media\\/com_from2content\\/templates\\n\\nThe template shows you how you can:\\n\\n1) Add HTML\\/CSS for your article\\n2) Add F2C Template Parameters (placeholders for your form data)\\n3) Use basic SMARTY syntax\\n\\n-->\\n<!--block escaping so SMARTY doesn''t break on use of {} tags-->\\n<style>\\n.f2c_intro_image {float:left; padding:5px;}\\n<\\/style>\\n\\n\\n<div class=\\"f2c article_intro_wrapper\\">\\n\\t<!--check to add the read more around the image-->\\n    <a href=\\"index.php?option=com_content&view=article&id=0:getting-started-with-form2content-lite&catid=2:uncategorised\\" target=\\"_parent\\" title=\\"Getting started with Form2Content Lite\\">\\n    \\t\\t<img src=\\"images\\/stories\\/com_form2content\\/p1\\/f1\\/thumbs\\/2.png\\" alt=\\"Open Source Design\\" title=\\"F2C is developed by Open Source Design\\" class=\\"f2c_intro_image\\">\\n    \\t<\\/a>\\n    \\t<p>Thank you for downloading and installing Form2Content LITE. In this demo content and article we hope to help you get started using our Joomla Content Construction Kit.<\\/p>\\n<\\/div><!--article intro wrapper-->","fulltext":"<!--If no article text, NO read more button will generate because the template will be empty! -->\\n<!--PLEASE REMEMBER THAT YOU CAN HIDE THE INTRO in your article by using the Joomla article setting => show intro: NO -->\\n\\t\\t\\t<img src=\\"images\\/stories\\/com_form2content\\/p1\\/f1\\/thumbs\\/2.png\\" alt=\\"Open Source Design\\" title=\\"F2C is developed by Open Source Design\\" class=\\"f2c_intro_image\\" style=\\"float:right; padding-left:15px;\\">\\n\\t    <div><p><strong>Getting started with Form2Content!<\\/strong><\\/p>\\r\\n<p>In the below steps we will show you how to create your own Joomla articles via Form2Content.<br \\/><a href=\\"http:\\/\\/documentation.form2content.com\\/f2c-getting-started\\/32-getting-started-f2c-step-by-step\\">http:\\/\\/documentation.form2content.com\\/f2c-getting-started\\/32-getting-started-f2c-step-by-step<\\/a><\\/p>\\r\\n<h2>What type of articles do you want to create?<\\/h2>\\r\\n<p>The installed demo <em>content type<\\/em> is an example of a blog. Each time a F2C form is filled out a Joomla article is created. In the content type manager you define permissions, in which category the Joomla article is saved and article settings like show\\/hide title, intro etc.<\\/p>\\r\\n<p><a href=\\"http:\\/\\/documentation.form2content.com\\/f2c-content-types\\">http:\\/\\/documentation.form2content.com\\/f2c-content-types<\\/a><\\/p>\\r\\n<h2>Define the fields to collect the article data<\\/h2>\\r\\n<p>In the F2C Content Type manager you will find the link to the F2C <em>Fields Manager<\\/em> (cog icon in the second column). In the field manager you define the data you want to collect via a range of different fields. In our <em>blog example<\\/em> we have used single-select list, multiline text field, an editor, image upload etc.<\\/p>\\r\\n<p><a href=\\"http:\\/\\/documentation.form2content.com\\/f2c-field-types\\">http:\\/\\/documentation.form2content.com\\/f2c-field-types<\\/a><\\/p>\\r\\n<h2>Define the article template (layout with placeholders)<\\/h2>\\r\\n<p>Now that we can collect the article data we need to create a template to display this data within the Joomla article. Each created article will look teh same since we use the same layout (template).<\\/p>\\r\\n<p><strong>The Form2Content rule:<\\/strong> Form fields data + template layout = Joomla article html<\\/p>\\r\\n<p>Please see our other example article about where the F2C article templates are located and how the placeholders for the data work.<\\/p>\\r\\n<p><a href=\\"http:\\/\\/documentation.form2content.com\\/f2c-templating\\">http:\\/\\/documentation.form2content.com\\/f2c-templating<\\/a><\\/p>\\r\\n<h2>When all works in the back-end, create a menu link to the front-end<\\/h2>\\r\\n<p>When you can create Joomla article via Form2Content in the back-end you can add the front-end access and let your website users add Joomla articles with great ease ... and they all look the same!<\\/p>\\r\\n<p><a href=\\"http:\\/\\/documentation.form2content.com\\/f2c-front-end\\">http:\\/\\/documentation.form2content.com\\/f2c-front-end<\\/a><\\/p><\\/div>\\n    \\n        <p><strong>Source:<\\/strong> <a href=\\"http:\\/\\/documentation.form2content.com\\/\\" target=\\"_blank\\" title=\\"Form2Content Documentation\\">Form2Content Documentation<\\/a><\\/p>\\n    \\n                        <p><strong>Author:<\\/strong> Patrick Faasse, Julien Brouns - creators of Form2Content Joomla CCK<\\/p>\\n                    ","state":0,"catid":"2","created":"2016-04-19 10:00:25","created_by":"311","created_by_alias":"","modified":"0000-00-00 00:00:00","modified_by":null,"checked_out":null,"checked_out_time":null,"publish_up":"2016-04-19 10:00:25","publish_down":"0000-00-00 00:00:00","images":"{\\"image_intro\\":\\"\\",\\"float_intro\\":\\"\\",\\"image_intro_alt\\":\\"\\",\\"image_intro_caption\\":\\"\\",\\"image_fulltext\\":\\"\\",\\"float_fulltext\\":\\"\\",\\"image_fulltext_alt\\":\\"\\",\\"image_fulltext_caption\\":\\"\\"}","urls":"{\\"urla\\":\\"\\",\\"urlatext\\":\\"\\",\\"targeta\\":\\"\\",\\"urlb\\":\\"\\",\\"urlbtext\\":\\"\\",\\"targetb\\":\\"\\",\\"urlc\\":\\"\\",\\"urlctext\\":\\"\\",\\"targetc\\":\\"\\"}","attribs":"{\\"show_title\\":\\"\\",\\"link_titles\\":\\"\\",\\"show_intro\\":\\"0\\",\\"show_category\\":\\"\\",\\"link_category\\":\\"\\",\\"show_parent_category\\":\\"\\",\\"link_parent_category\\":\\"\\",\\"show_author\\":\\"\\",\\"link_author\\":\\"\\",\\"show_create_date\\":\\"\\",\\"show_modify_date\\":\\"\\",\\"show_publish_date\\":\\"\\",\\"show_item_navigation\\":\\"\\",\\"show_icons\\":\\"\\",\\"show_print_icon\\":\\"\\",\\"show_email_icon\\":\\"\\",\\"show_vote\\":\\"\\",\\"show_hits\\":\\"\\",\\"show_noauth\\":\\"\\",\\"alternative_readmore\\":\\"\\",\\"article_layout\\":\\"\\",\\"info_block_position\\":\\"0\\"}","version":1,"ordering":null,"metakey":"","metadesc":"","access":"1","hits":null,"metadata":"{\\"robots\\":\\"\\",\\"author\\":\\"\\",\\"rights\\":\\"\\",\\"xreference\\":\\"\\"}","featured":"0","language":"*","xreference":null}', 0),
(2, 1, 1, '', '2016-04-19 10:00:25', 311, 6030, '5e8a1d2044f2a9d524975d5e239dbeaf675dd536', '{"id":1,"asset_id":"110","title":"Getting started with Form2Content Lite","alias":"getting-started-with-form2content-lite","introtext":"<!--\\nThis is the FORM2CONTENT INTRO TEMPLATE for the BLOG CONTENT TYPE \\n\\nIt can be found in < root >\\/media\\/com_from2content\\/templates\\n\\nThe template shows you how you can:\\n\\n1) Add HTML\\/CSS for your article\\n2) Add F2C Template Parameters (placeholders for your form data)\\n3) Use basic SMARTY syntax\\n\\n-->\\n<!--block escaping so SMARTY doesn''t break on use of {} tags-->\\n<style>\\n.f2c_intro_image {float:left; padding:5px;}\\n<\\/style>\\n\\n\\n<div class=\\"f2c article_intro_wrapper\\">\\n\\t<!--check to add the read more around the image-->\\n    <a href=\\"index.php?option=com_content&view=article&id=1:getting-started-with-form2content-lite&catid=2:uncategorised\\" target=\\"_parent\\" title=\\"Getting started with Form2Content Lite\\">\\n    \\t\\t<img src=\\"images\\/stories\\/com_form2content\\/p1\\/f1\\/thumbs\\/2.png\\" alt=\\"Open Source Design\\" title=\\"F2C is developed by Open Source Design\\" class=\\"f2c_intro_image\\">\\n    \\t<\\/a>\\n    \\t<p>Thank you for downloading and installing Form2Content LITE. In this demo content and article we hope to help you get started using our Joomla Content Construction Kit.<\\/p>\\n<\\/div><!--article intro wrapper-->","fulltext":"<!--If no article text, NO read more button will generate because the template will be empty! -->\\n<!--PLEASE REMEMBER THAT YOU CAN HIDE THE INTRO in your article by using the Joomla article setting => show intro: NO -->\\n\\t\\t\\t<img src=\\"images\\/stories\\/com_form2content\\/p1\\/f1\\/thumbs\\/2.png\\" alt=\\"Open Source Design\\" title=\\"F2C is developed by Open Source Design\\" class=\\"f2c_intro_image\\" style=\\"float:right; padding-left:15px;\\">\\n\\t    <div><p><strong>Getting started with Form2Content!<\\/strong><\\/p>\\r\\n<p>In the below steps we will show you how to create your own Joomla articles via Form2Content.<br \\/><a href=\\"http:\\/\\/documentation.form2content.com\\/f2c-getting-started\\/32-getting-started-f2c-step-by-step\\">http:\\/\\/documentation.form2content.com\\/f2c-getting-started\\/32-getting-started-f2c-step-by-step<\\/a><\\/p>\\r\\n<h2>What type of articles do you want to create?<\\/h2>\\r\\n<p>The installed demo <em>content type<\\/em> is an example of a blog. Each time a F2C form is filled out a Joomla article is created. In the content type manager you define permissions, in which category the Joomla article is saved and article settings like show\\/hide title, intro etc.<\\/p>\\r\\n<p><a href=\\"http:\\/\\/documentation.form2content.com\\/f2c-content-types\\">http:\\/\\/documentation.form2content.com\\/f2c-content-types<\\/a><\\/p>\\r\\n<h2>Define the fields to collect the article data<\\/h2>\\r\\n<p>In the F2C Content Type manager you will find the link to the F2C <em>Fields Manager<\\/em> (cog icon in the second column). In the field manager you define the data you want to collect via a range of different fields. In our <em>blog example<\\/em> we have used single-select list, multiline text field, an editor, image upload etc.<\\/p>\\r\\n<p><a href=\\"http:\\/\\/documentation.form2content.com\\/f2c-field-types\\">http:\\/\\/documentation.form2content.com\\/f2c-field-types<\\/a><\\/p>\\r\\n<h2>Define the article template (layout with placeholders)<\\/h2>\\r\\n<p>Now that we can collect the article data we need to create a template to display this data within the Joomla article. Each created article will look teh same since we use the same layout (template).<\\/p>\\r\\n<p><strong>The Form2Content rule:<\\/strong> Form fields data + template layout = Joomla article html<\\/p>\\r\\n<p>Please see our other example article about where the F2C article templates are located and how the placeholders for the data work.<\\/p>\\r\\n<p><a href=\\"http:\\/\\/documentation.form2content.com\\/f2c-templating\\">http:\\/\\/documentation.form2content.com\\/f2c-templating<\\/a><\\/p>\\r\\n<h2>When all works in the back-end, create a menu link to the front-end<\\/h2>\\r\\n<p>When you can create Joomla article via Form2Content in the back-end you can add the front-end access and let your website users add Joomla articles with great ease ... and they all look the same!<\\/p>\\r\\n<p><a href=\\"http:\\/\\/documentation.form2content.com\\/f2c-front-end\\">http:\\/\\/documentation.form2content.com\\/f2c-front-end<\\/a><\\/p><\\/div>\\n    \\n        <p><strong>Source:<\\/strong> <a href=\\"http:\\/\\/documentation.form2content.com\\/\\" target=\\"_blank\\" title=\\"Form2Content Documentation\\">Form2Content Documentation<\\/a><\\/p>\\n    \\n                        <p><strong>Author:<\\/strong> Patrick Faasse, Julien Brouns - creators of Form2Content Joomla CCK<\\/p>\\n                    ","state":0,"catid":"2","created":"2016-04-19 10:00:25","created_by":"311","created_by_alias":"","modified":"0000-00-00 00:00:00","modified_by":null,"checked_out":null,"checked_out_time":null,"publish_up":"2016-04-19 10:00:25","publish_down":"0000-00-00 00:00:00","images":"{\\"image_intro\\":\\"\\",\\"float_intro\\":\\"\\",\\"image_intro_alt\\":\\"\\",\\"image_intro_caption\\":\\"\\",\\"image_fulltext\\":\\"\\",\\"float_fulltext\\":\\"\\",\\"image_fulltext_alt\\":\\"\\",\\"image_fulltext_caption\\":\\"\\"}","urls":"{\\"urla\\":\\"\\",\\"urlatext\\":\\"\\",\\"targeta\\":\\"\\",\\"urlb\\":\\"\\",\\"urlbtext\\":\\"\\",\\"targetb\\":\\"\\",\\"urlc\\":\\"\\",\\"urlctext\\":\\"\\",\\"targetc\\":\\"\\"}","attribs":"{\\"show_title\\":\\"\\",\\"link_titles\\":\\"\\",\\"show_intro\\":\\"0\\",\\"show_category\\":\\"\\",\\"link_category\\":\\"\\",\\"show_parent_category\\":\\"\\",\\"link_parent_category\\":\\"\\",\\"show_author\\":\\"\\",\\"link_author\\":\\"\\",\\"show_create_date\\":\\"\\",\\"show_modify_date\\":\\"\\",\\"show_publish_date\\":\\"\\",\\"show_item_navigation\\":\\"\\",\\"show_icons\\":\\"\\",\\"show_print_icon\\":\\"\\",\\"show_email_icon\\":\\"\\",\\"show_vote\\":\\"\\",\\"show_hits\\":\\"\\",\\"show_noauth\\":\\"\\",\\"alternative_readmore\\":\\"\\",\\"article_layout\\":\\"\\",\\"info_block_position\\":\\"0\\"}","version":1,"ordering":null,"metakey":"","metadesc":"","access":"1","hits":null,"metadata":"{\\"robots\\":\\"\\",\\"author\\":\\"\\",\\"rights\\":\\"\\",\\"xreference\\":\\"\\"}","featured":"0","language":"*","xreference":null}', 0),
(3, 2, 1, '', '2016-04-19 10:00:25', 311, 4711, 'b80e8c15a1a8146ca0136d4c746e2400601d21fb', '{"id":2,"asset_id":112,"title":"Article templates, the true strength of Form2Content","alias":"article-templates-the-true-strength-of-form2content","introtext":"<!--\\nThis is the FORM2CONTENT INTRO TEMPLATE for the BLOG CONTENT TYPE \\n\\nIt can be found in < root >\\/media\\/com_from2content\\/templates\\n\\nThe template shows you how you can:\\n\\n1) Add HTML\\/CSS for your article\\n2) Add F2C Template Parameters (placeholders for your form data)\\n3) Use basic SMARTY syntax\\n\\n-->\\n<!--block escaping so SMARTY doesn''t break on use of {} tags-->\\n<style>\\n.f2c_intro_image {float:left; padding:5px;}\\n<\\/style>\\n\\n\\n<div class=\\"f2c article_intro_wrapper\\">\\n\\t<!--check to add the read more around the image-->\\n    <a href=\\"index.php?option=com_content&view=article&id=0:article-templates-the-true-strength-of-form2content&catid=2:uncategorised\\" target=\\"_parent\\" title=\\"Article templates, the true strength of Form2Content\\">\\n    \\t\\t<img src=\\"images\\/stories\\/com_form2content\\/p1\\/f2\\/thumbs\\/2.png\\" alt=\\"Open Source Design\\" title=\\"F2C is developed by Open Source Design\\" class=\\"f2c_intro_image\\">\\n    \\t<\\/a>\\n    \\t<p>With a content construction kit there is always a small learning curve. Hopefully our BLOG demo will help you understand the relation between the Form2Contnet submission form (data) and the creation of your Joomla article quickly.<\\/p>\\n<\\/div><!--article intro wrapper-->","fulltext":"<!--If no article text, NO read more button will generate because the template will be empty! -->\\n<!--PLEASE REMEMBER THAT YOU CAN HIDE THE INTRO in your article by using the Joomla article setting => show intro: NO -->\\n\\t\\t\\t<img src=\\"images\\/stories\\/com_form2content\\/p1\\/f2\\/thumbs\\/2.png\\" alt=\\"Open Source Design\\" title=\\"F2C is developed by Open Source Design\\" class=\\"f2c_intro_image\\" style=\\"float:right; padding-left:15px;\\">\\n\\t    <div><p>In the Joomla back-end under components you can find the link to Form2Content. One of the links is to the Form2Content Template manager.<\\/p>\\r\\n<p>The F2C article templates are used to render the form data into the layout of your Joomla article. Probably the easiest way to understand this is to have a look at the two files we have included to generate the BLOG demo articles.<br \\/>The two files can be seen in the F2C Template Manager or via FTP:<\\/p>\\r\\n<p>&lt; root &gt;\\/media\\/com_form2content\\/templates<\\/p>\\r\\n<p>blog_intro_template.tpl<br \\/>blog_main_template.tpl<\\/p>\\r\\n<p><strong>Use of Smarty Templating and Template parameters (placeholders)<\\/strong><\\/p>\\r\\n<p>In the two F2C article templates included we have added extra documentation to show what you can do with them. This will hopefully get you to grips with the syntax quickly!<\\/p>\\r\\n<p><a href=\\"http:\\/\\/documentation.form2content.com\\/f2c-templating\\" target=\\"_blank\\">PLEASE read all the documentation on Form2Content templating here!<\\/a><\\/p>\\r\\n<p>\\u00a0<\\/p>\\r\\n<p>\\u00a0<\\/p><\\/div>\\n    \\n        <p><strong>Source:<\\/strong> <a href=\\"http:\\/\\/documentation.form2content.com\\/f2c-templating\\" target=\\"_blank\\" title=\\"F2C Documentatation\\">F2C Documentatation on article templates<\\/a><\\/p>\\n    \\n                        <p><strong>Author:<\\/strong> Patrick Faasse, Julien Brouns - creators of Form2Content Joomla CCK<\\/p>\\n                    ","state":0,"catid":"2","created":"2016-04-19 10:00:25","created_by":"311","created_by_alias":"","modified":"0000-00-00 00:00:00","modified_by":null,"checked_out":null,"checked_out_time":null,"publish_up":"2016-04-19 10:00:25","publish_down":"0000-00-00 00:00:00","images":"{\\"image_intro\\":\\"\\",\\"float_intro\\":\\"\\",\\"image_intro_alt\\":\\"\\",\\"image_intro_caption\\":\\"\\",\\"image_fulltext\\":\\"\\",\\"float_fulltext\\":\\"\\",\\"image_fulltext_alt\\":\\"\\",\\"image_fulltext_caption\\":\\"\\"}","urls":"{\\"urla\\":\\"\\",\\"urlatext\\":\\"\\",\\"targeta\\":\\"\\",\\"urlb\\":\\"\\",\\"urlbtext\\":\\"\\",\\"targetb\\":\\"\\",\\"urlc\\":\\"\\",\\"urlctext\\":\\"\\",\\"targetc\\":\\"\\"}","attribs":"{\\"show_title\\":\\"\\",\\"link_titles\\":\\"\\",\\"show_intro\\":\\"0\\",\\"show_category\\":\\"\\",\\"link_category\\":\\"\\",\\"show_parent_category\\":\\"\\",\\"link_parent_category\\":\\"\\",\\"show_author\\":\\"\\",\\"link_author\\":\\"\\",\\"show_create_date\\":\\"\\",\\"show_modify_date\\":\\"\\",\\"show_publish_date\\":\\"\\",\\"show_item_navigation\\":\\"\\",\\"show_icons\\":\\"\\",\\"show_print_icon\\":\\"\\",\\"show_email_icon\\":\\"\\",\\"show_vote\\":\\"\\",\\"show_hits\\":\\"\\",\\"show_noauth\\":\\"\\",\\"alternative_readmore\\":\\"\\",\\"article_layout\\":\\"\\",\\"info_block_position\\":\\"0\\"}","version":1,"ordering":null,"metakey":"","metadesc":"","access":"1","hits":null,"metadata":"{\\"robots\\":\\"\\",\\"author\\":\\"\\",\\"rights\\":\\"\\",\\"xreference\\":\\"\\"}","featured":"0","language":"*","xreference":null}', 0),
(4, 2, 1, '', '2016-04-19 10:00:25', 311, 4713, 'd93eb217e2d36ba248c4d85728a5586b80b96ac5', '{"id":2,"asset_id":"112","title":"Article templates, the true strength of Form2Content","alias":"article-templates-the-true-strength-of-form2content","introtext":"<!--\\nThis is the FORM2CONTENT INTRO TEMPLATE for the BLOG CONTENT TYPE \\n\\nIt can be found in < root >\\/media\\/com_from2content\\/templates\\n\\nThe template shows you how you can:\\n\\n1) Add HTML\\/CSS for your article\\n2) Add F2C Template Parameters (placeholders for your form data)\\n3) Use basic SMARTY syntax\\n\\n-->\\n<!--block escaping so SMARTY doesn''t break on use of {} tags-->\\n<style>\\n.f2c_intro_image {float:left; padding:5px;}\\n<\\/style>\\n\\n\\n<div class=\\"f2c article_intro_wrapper\\">\\n\\t<!--check to add the read more around the image-->\\n    <a href=\\"index.php?option=com_content&view=article&id=2:article-templates-the-true-strength-of-form2content&catid=2:uncategorised\\" target=\\"_parent\\" title=\\"Article templates, the true strength of Form2Content\\">\\n    \\t\\t<img src=\\"images\\/stories\\/com_form2content\\/p1\\/f2\\/thumbs\\/2.png\\" alt=\\"Open Source Design\\" title=\\"F2C is developed by Open Source Design\\" class=\\"f2c_intro_image\\">\\n    \\t<\\/a>\\n    \\t<p>With a content construction kit there is always a small learning curve. Hopefully our BLOG demo will help you understand the relation between the Form2Contnet submission form (data) and the creation of your Joomla article quickly.<\\/p>\\n<\\/div><!--article intro wrapper-->","fulltext":"<!--If no article text, NO read more button will generate because the template will be empty! -->\\n<!--PLEASE REMEMBER THAT YOU CAN HIDE THE INTRO in your article by using the Joomla article setting => show intro: NO -->\\n\\t\\t\\t<img src=\\"images\\/stories\\/com_form2content\\/p1\\/f2\\/thumbs\\/2.png\\" alt=\\"Open Source Design\\" title=\\"F2C is developed by Open Source Design\\" class=\\"f2c_intro_image\\" style=\\"float:right; padding-left:15px;\\">\\n\\t    <div><p>In the Joomla back-end under components you can find the link to Form2Content. One of the links is to the Form2Content Template manager.<\\/p>\\r\\n<p>The F2C article templates are used to render the form data into the layout of your Joomla article. Probably the easiest way to understand this is to have a look at the two files we have included to generate the BLOG demo articles.<br \\/>The two files can be seen in the F2C Template Manager or via FTP:<\\/p>\\r\\n<p>&lt; root &gt;\\/media\\/com_form2content\\/templates<\\/p>\\r\\n<p>blog_intro_template.tpl<br \\/>blog_main_template.tpl<\\/p>\\r\\n<p><strong>Use of Smarty Templating and Template parameters (placeholders)<\\/strong><\\/p>\\r\\n<p>In the two F2C article templates included we have added extra documentation to show what you can do with them. This will hopefully get you to grips with the syntax quickly!<\\/p>\\r\\n<p><a href=\\"http:\\/\\/documentation.form2content.com\\/f2c-templating\\" target=\\"_blank\\">PLEASE read all the documentation on Form2Content templating here!<\\/a><\\/p>\\r\\n<p>\\u00a0<\\/p>\\r\\n<p>\\u00a0<\\/p><\\/div>\\n    \\n        <p><strong>Source:<\\/strong> <a href=\\"http:\\/\\/documentation.form2content.com\\/f2c-templating\\" target=\\"_blank\\" title=\\"F2C Documentatation\\">F2C Documentatation on article templates<\\/a><\\/p>\\n    \\n                        <p><strong>Author:<\\/strong> Patrick Faasse, Julien Brouns - creators of Form2Content Joomla CCK<\\/p>\\n                    ","state":0,"catid":"2","created":"2016-04-19 10:00:25","created_by":"311","created_by_alias":"","modified":"0000-00-00 00:00:00","modified_by":null,"checked_out":null,"checked_out_time":null,"publish_up":"2016-04-19 10:00:25","publish_down":"0000-00-00 00:00:00","images":"{\\"image_intro\\":\\"\\",\\"float_intro\\":\\"\\",\\"image_intro_alt\\":\\"\\",\\"image_intro_caption\\":\\"\\",\\"image_fulltext\\":\\"\\",\\"float_fulltext\\":\\"\\",\\"image_fulltext_alt\\":\\"\\",\\"image_fulltext_caption\\":\\"\\"}","urls":"{\\"urla\\":\\"\\",\\"urlatext\\":\\"\\",\\"targeta\\":\\"\\",\\"urlb\\":\\"\\",\\"urlbtext\\":\\"\\",\\"targetb\\":\\"\\",\\"urlc\\":\\"\\",\\"urlctext\\":\\"\\",\\"targetc\\":\\"\\"}","attribs":"{\\"show_title\\":\\"\\",\\"link_titles\\":\\"\\",\\"show_intro\\":\\"0\\",\\"show_category\\":\\"\\",\\"link_category\\":\\"\\",\\"show_parent_category\\":\\"\\",\\"link_parent_category\\":\\"\\",\\"show_author\\":\\"\\",\\"link_author\\":\\"\\",\\"show_create_date\\":\\"\\",\\"show_modify_date\\":\\"\\",\\"show_publish_date\\":\\"\\",\\"show_item_navigation\\":\\"\\",\\"show_icons\\":\\"\\",\\"show_print_icon\\":\\"\\",\\"show_email_icon\\":\\"\\",\\"show_vote\\":\\"\\",\\"show_hits\\":\\"\\",\\"show_noauth\\":\\"\\",\\"alternative_readmore\\":\\"\\",\\"article_layout\\":\\"\\",\\"info_block_position\\":\\"0\\"}","version":1,"ordering":null,"metakey":"","metadesc":"","access":"1","hits":null,"metadata":"{\\"robots\\":\\"\\",\\"author\\":\\"\\",\\"rights\\":\\"\\",\\"xreference\\":\\"\\"}","featured":"0","language":"*","xreference":null}', 0),
(5, 1, 1, '', '2016-05-06 12:45:04', 311, 6045, 'f67f256f36328599122021bc31d7943376df4855', '{"id":"1","asset_id":"110","title":"Getting started with Form2Content Lite","alias":"getting-started-with-form2content-lite","introtext":"<!--\\nThis is the FORM2CONTENT INTRO TEMPLATE for the BLOG CONTENT TYPE \\n\\nIt can be found in < root >\\/media\\/com_from2content\\/templates\\n\\nThe template shows you how you can:\\n\\n1) Add HTML\\/CSS for your article\\n2) Add F2C Template Parameters (placeholders for your form data)\\n3) Use basic SMARTY syntax\\n\\n-->\\n<!--block escaping so SMARTY doesn''t break on use of {} tags-->\\n<style>\\n.f2c_intro_image {float:left; padding:5px;}\\n<\\/style>\\n\\n\\n<div class=\\"f2c article_intro_wrapper\\">\\n\\t<!--check to add the read more around the image-->\\n    <a href=\\"index.php?option=com_content&view=article&id=1:getting-started-with-form2content-lite&catid=2:uncategorised\\" target=\\"_parent\\" title=\\"Getting started with Form2Content Lite\\">\\n    \\t\\t<img src=\\"images\\/stories\\/com_form2content\\/p1\\/f1\\/thumbs\\/2.png\\" alt=\\"Open Source Design\\" title=\\"F2C is developed by Open Source Design\\" class=\\"f2c_intro_image\\">\\n    \\t<\\/a>\\n    \\t<p>Thank you for downloading and installing Form2Content LITE. In this demo content and article we hope to help you get started using our Joomla Content Construction Kit.<\\/p>\\n<\\/div><!--article intro wrapper-->","fulltext":"<!--If no article text, NO read more button will generate because the template will be empty! -->\\n<!--PLEASE REMEMBER THAT YOU CAN HIDE THE INTRO in your article by using the Joomla article setting => show intro: NO -->\\n\\t\\t\\t<img src=\\"images\\/stories\\/com_form2content\\/p1\\/f1\\/thumbs\\/2.png\\" alt=\\"Open Source Design\\" title=\\"F2C is developed by Open Source Design\\" class=\\"f2c_intro_image\\" style=\\"float:right; padding-left:15px;\\">\\n\\t    <div><p><strong>Getting started with Form2Content!<\\/strong><\\/p>\\r\\n<p>In the below steps we will show you how to create your own Joomla articles via Form2Content.<br \\/><a href=\\"http:\\/\\/documentation.form2content.com\\/f2c-getting-started\\/32-getting-started-f2c-step-by-step\\">http:\\/\\/documentation.form2content.com\\/f2c-getting-started\\/32-getting-started-f2c-step-by-step<\\/a><\\/p>\\r\\n<h2>What type of articles do you want to create?<\\/h2>\\r\\n<p>The installed demo <em>content type<\\/em> is an example of a blog. Each time a F2C form is filled out a Joomla article is created. In the content type manager you define permissions, in which category the Joomla article is saved and article settings like show\\/hide title, intro etc.<\\/p>\\r\\n<p><a href=\\"http:\\/\\/documentation.form2content.com\\/f2c-content-types\\">http:\\/\\/documentation.form2content.com\\/f2c-content-types<\\/a><\\/p>\\r\\n<h2>Define the fields to collect the article data<\\/h2>\\r\\n<p>In the F2C Content Type manager you will find the link to the F2C <em>Fields Manager<\\/em> (cog icon in the second column). In the field manager you define the data you want to collect via a range of different fields. In our <em>blog example<\\/em> we have used single-select list, multiline text field, an editor, image upload etc.<\\/p>\\r\\n<p><a href=\\"http:\\/\\/documentation.form2content.com\\/f2c-field-types\\">http:\\/\\/documentation.form2content.com\\/f2c-field-types<\\/a><\\/p>\\r\\n<h2>Define the article template (layout with placeholders)<\\/h2>\\r\\n<p>Now that we can collect the article data we need to create a template to display this data within the Joomla article. Each created article will look teh same since we use the same layout (template).<\\/p>\\r\\n<p><strong>The Form2Content rule:<\\/strong> Form fields data + template layout = Joomla article html<\\/p>\\r\\n<p>Please see our other example article about where the F2C article templates are located and how the placeholders for the data work.<\\/p>\\r\\n<p><a href=\\"http:\\/\\/documentation.form2content.com\\/f2c-templating\\">http:\\/\\/documentation.form2content.com\\/f2c-templating<\\/a><\\/p>\\r\\n<h2>When all works in the back-end, create a menu link to the front-end<\\/h2>\\r\\n<p>When you can create Joomla article via Form2Content in the back-end you can add the front-end access and let your website users add Joomla articles with great ease ... and they all look the same!<\\/p>\\r\\n<p><a href=\\"http:\\/\\/documentation.form2content.com\\/f2c-front-end\\">http:\\/\\/documentation.form2content.com\\/f2c-front-end<\\/a><\\/p><\\/div>\\n    \\n        <p><strong>Source:<\\/strong> <a href=\\"http:\\/\\/documentation.form2content.com\\/\\" target=\\"_blank\\" title=\\"Form2Content Documentation\\">Form2Content Documentation<\\/a><\\/p>\\n    \\n                        <p><strong>Author:<\\/strong> Patrick Faasse, Julien Brouns - creators of Form2Content Joomla CCK<\\/p>\\n                    ","state":1,"catid":"2","created":"2016-04-19 10:00:25","created_by":"311","created_by_alias":"","modified":"2016-05-06 12:45:04","modified_by":"311","checked_out":"0","checked_out_time":"0000-00-00 00:00:00","publish_up":"2016-04-19 10:00:25","publish_down":"0000-00-00 00:00:00","images":"{\\"image_intro\\":\\"\\",\\"float_intro\\":\\"\\",\\"image_intro_alt\\":\\"\\",\\"image_intro_caption\\":\\"\\",\\"image_fulltext\\":\\"\\",\\"float_fulltext\\":\\"\\",\\"image_fulltext_alt\\":\\"\\",\\"image_fulltext_caption\\":\\"\\"}","urls":"{\\"urla\\":\\"\\",\\"urlatext\\":\\"\\",\\"targeta\\":\\"\\",\\"urlb\\":\\"\\",\\"urlbtext\\":\\"\\",\\"targetb\\":\\"\\",\\"urlc\\":\\"\\",\\"urlctext\\":\\"\\",\\"targetc\\":\\"\\"}","attribs":"{\\"show_title\\":\\"\\",\\"link_titles\\":\\"\\",\\"show_intro\\":\\"0\\",\\"show_category\\":\\"\\",\\"link_category\\":\\"\\",\\"show_parent_category\\":\\"\\",\\"link_parent_category\\":\\"\\",\\"show_author\\":\\"\\",\\"link_author\\":\\"\\",\\"show_create_date\\":\\"\\",\\"show_modify_date\\":\\"\\",\\"show_publish_date\\":\\"\\",\\"show_item_navigation\\":\\"\\",\\"show_icons\\":\\"\\",\\"show_print_icon\\":\\"\\",\\"show_email_icon\\":\\"\\",\\"show_vote\\":\\"\\",\\"show_hits\\":\\"\\",\\"show_noauth\\":\\"\\",\\"alternative_readmore\\":\\"\\",\\"article_layout\\":\\"\\",\\"info_block_position\\":\\"0\\"}","version":2,"ordering":"0","metakey":"","metadesc":"","access":"1","hits":"0","metadata":"{\\"robots\\":\\"\\",\\"author\\":\\"\\",\\"rights\\":\\"\\",\\"xreference\\":\\"\\"}","featured":"0","language":"*","xreference":""}', 0),
(6, 2, 1, '', '2016-05-06 12:46:06', 311, 4728, '3d82e0be46ba4def825e74b8d70ae20e13da264b', '{"id":"2","asset_id":"112","title":"Article templates, the true strength of Form2Content","alias":"article-templates-the-true-strength-of-form2content","introtext":"<!--\\nThis is the FORM2CONTENT INTRO TEMPLATE for the BLOG CONTENT TYPE \\n\\nIt can be found in < root >\\/media\\/com_from2content\\/templates\\n\\nThe template shows you how you can:\\n\\n1) Add HTML\\/CSS for your article\\n2) Add F2C Template Parameters (placeholders for your form data)\\n3) Use basic SMARTY syntax\\n\\n-->\\n<!--block escaping so SMARTY doesn''t break on use of {} tags-->\\n<style>\\n.f2c_intro_image {float:left; padding:5px;}\\n<\\/style>\\n\\n\\n<div class=\\"f2c article_intro_wrapper\\">\\n\\t<!--check to add the read more around the image-->\\n    <a href=\\"index.php?option=com_content&view=article&id=2:article-templates-the-true-strength-of-form2content&catid=2:uncategorised\\" target=\\"_parent\\" title=\\"Article templates, the true strength of Form2Content\\">\\n    \\t\\t<img src=\\"images\\/stories\\/com_form2content\\/p1\\/f2\\/thumbs\\/2.png\\" alt=\\"Open Source Design\\" title=\\"F2C is developed by Open Source Design\\" class=\\"f2c_intro_image\\">\\n    \\t<\\/a>\\n    \\t<p>With a content construction kit there is always a small learning curve. Hopefully our BLOG demo will help you understand the relation between the Form2Contnet submission form (data) and the creation of your Joomla article quickly.<\\/p>\\n<\\/div><!--article intro wrapper-->","fulltext":"<!--If no article text, NO read more button will generate because the template will be empty! -->\\n<!--PLEASE REMEMBER THAT YOU CAN HIDE THE INTRO in your article by using the Joomla article setting => show intro: NO -->\\n\\t\\t\\t<img src=\\"images\\/stories\\/com_form2content\\/p1\\/f2\\/thumbs\\/2.png\\" alt=\\"Open Source Design\\" title=\\"F2C is developed by Open Source Design\\" class=\\"f2c_intro_image\\" style=\\"float:right; padding-left:15px;\\">\\n\\t    <div><p>In the Joomla back-end under components you can find the link to Form2Content. One of the links is to the Form2Content Template manager.<\\/p>\\r\\n<p>The F2C article templates are used to render the form data into the layout of your Joomla article. Probably the easiest way to understand this is to have a look at the two files we have included to generate the BLOG demo articles.<br \\/>The two files can be seen in the F2C Template Manager or via FTP:<\\/p>\\r\\n<p>&lt; root &gt;\\/media\\/com_form2content\\/templates<\\/p>\\r\\n<p>blog_intro_template.tpl<br \\/>blog_main_template.tpl<\\/p>\\r\\n<p><strong>Use of Smarty Templating and Template parameters (placeholders)<\\/strong><\\/p>\\r\\n<p>In the two F2C article templates included we have added extra documentation to show what you can do with them. This will hopefully get you to grips with the syntax quickly!<\\/p>\\r\\n<p><a href=\\"http:\\/\\/documentation.form2content.com\\/f2c-templating\\" target=\\"_blank\\">PLEASE read all the documentation on Form2Content templating here!<\\/a><\\/p>\\r\\n<p>\\u00a0<\\/p>\\r\\n<p>\\u00a0<\\/p><\\/div>\\n    \\n        <p><strong>Source:<\\/strong> <a href=\\"http:\\/\\/documentation.form2content.com\\/f2c-templating\\" target=\\"_blank\\" title=\\"F2C Documentatation\\">F2C Documentatation on article templates<\\/a><\\/p>\\n    \\n                        <p><strong>Author:<\\/strong> Patrick Faasse, Julien Brouns - creators of Form2Content Joomla CCK<\\/p>\\n                    ","state":1,"catid":"2","created":"2016-04-19 10:00:25","created_by":"311","created_by_alias":"","modified":"2016-05-06 12:46:06","modified_by":"311","checked_out":"0","checked_out_time":"0000-00-00 00:00:00","publish_up":"2016-04-19 10:00:25","publish_down":"0000-00-00 00:00:00","images":"{\\"image_intro\\":\\"\\",\\"float_intro\\":\\"\\",\\"image_intro_alt\\":\\"\\",\\"image_intro_caption\\":\\"\\",\\"image_fulltext\\":\\"\\",\\"float_fulltext\\":\\"\\",\\"image_fulltext_alt\\":\\"\\",\\"image_fulltext_caption\\":\\"\\"}","urls":"{\\"urla\\":\\"\\",\\"urlatext\\":\\"\\",\\"targeta\\":\\"\\",\\"urlb\\":\\"\\",\\"urlbtext\\":\\"\\",\\"targetb\\":\\"\\",\\"urlc\\":\\"\\",\\"urlctext\\":\\"\\",\\"targetc\\":\\"\\"}","attribs":"{\\"show_title\\":\\"\\",\\"link_titles\\":\\"\\",\\"show_intro\\":\\"0\\",\\"show_category\\":\\"\\",\\"link_category\\":\\"\\",\\"show_parent_category\\":\\"\\",\\"link_parent_category\\":\\"\\",\\"show_author\\":\\"\\",\\"link_author\\":\\"\\",\\"show_create_date\\":\\"\\",\\"show_modify_date\\":\\"\\",\\"show_publish_date\\":\\"\\",\\"show_item_navigation\\":\\"\\",\\"show_icons\\":\\"\\",\\"show_print_icon\\":\\"\\",\\"show_email_icon\\":\\"\\",\\"show_vote\\":\\"\\",\\"show_hits\\":\\"\\",\\"show_noauth\\":\\"\\",\\"alternative_readmore\\":\\"\\",\\"article_layout\\":\\"\\",\\"info_block_position\\":\\"0\\"}","version":2,"ordering":"0","metakey":"","metadesc":"","access":"1","hits":"0","metadata":"{\\"robots\\":\\"\\",\\"author\\":\\"\\",\\"rights\\":\\"\\",\\"xreference\\":\\"\\"}","featured":"0","language":"*","xreference":""}', 0);

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_updates`
--

CREATE TABLE IF NOT EXISTS `n1wr9_updates` (
  `update_id` int(11) NOT NULL AUTO_INCREMENT,
  `update_site_id` int(11) DEFAULT '0',
  `extension_id` int(11) DEFAULT '0',
  `name` varchar(100) DEFAULT '',
  `description` text NOT NULL,
  `element` varchar(100) DEFAULT '',
  `type` varchar(20) DEFAULT '',
  `folder` varchar(20) DEFAULT '',
  `client_id` tinyint(3) DEFAULT '0',
  `version` varchar(32) DEFAULT '',
  `data` text NOT NULL,
  `detailsurl` text NOT NULL,
  `infourl` text NOT NULL,
  `extra_query` varchar(1000) DEFAULT '',
  PRIMARY KEY (`update_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Available Updates' AUTO_INCREMENT=42 ;

--
-- Dumping data for table `n1wr9_updates`
--

INSERT INTO `n1wr9_updates` (`update_id`, `update_site_id`, `extension_id`, `name`, `description`, `element`, `type`, `folder`, `client_id`, `version`, `data`, `detailsurl`, `infourl`, `extra_query`) VALUES
(1, 3, 0, 'Latvian', '', 'pkg_lv-LV', 'package', '', 0, '3.4.3.1', '', 'https://update.joomla.org/language/details3/lv-LV_details.xml', '', ''),
(2, 3, 0, 'Macedonian', '', 'pkg_mk-MK', 'package', '', 0, '3.5.0.1', '', 'https://update.joomla.org/language/details3/mk-MK_details.xml', '', ''),
(3, 3, 0, 'Norwegian Bokmal', '', 'pkg_nb-NO', 'package', '', 0, '3.5.1.1', '', 'https://update.joomla.org/language/details3/nb-NO_details.xml', '', ''),
(4, 3, 0, 'Norwegian Nynorsk', '', 'pkg_nn-NO', 'package', '', 0, '3.4.2.1', '', 'https://update.joomla.org/language/details3/nn-NO_details.xml', '', ''),
(5, 3, 0, 'Persian', '', 'pkg_fa-IR', 'package', '', 0, '3.5.1.1', '', 'https://update.joomla.org/language/details3/fa-IR_details.xml', '', ''),
(6, 3, 0, 'Polish', '', 'pkg_pl-PL', 'package', '', 0, '3.5.0.1', '', 'https://update.joomla.org/language/details3/pl-PL_details.xml', '', ''),
(7, 1, 700, 'Joomla', '', 'joomla', 'file', '', 0, '3.5.1', '', 'https://update.joomla.org/core/sts/extension_sts.xml', '', ''),
(8, 3, 0, 'Portuguese', '', 'pkg_pt-PT', 'package', '', 0, '3.5.1.1', '', 'https://update.joomla.org/language/details3/pt-PT_details.xml', '', ''),
(9, 3, 10002, 'Russian', '', 'pkg_ru-RU', 'package', '', 0, '3.5.0.6', '', 'https://update.joomla.org/language/details3/ru-RU_details.xml', '', ''),
(10, 3, 0, 'English AU', '', 'pkg_en-AU', 'package', '', 0, '3.5.1.2', '', 'https://update.joomla.org/language/details3/en-AU_details.xml', '', ''),
(11, 3, 0, 'Slovak', '', 'pkg_sk-SK', 'package', '', 0, '3.5.1.2', '', 'https://update.joomla.org/language/details3/sk-SK_details.xml', '', ''),
(12, 3, 0, 'English US', '', 'pkg_en-US', 'package', '', 0, '3.5.1.1', '', 'https://update.joomla.org/language/details3/en-US_details.xml', '', ''),
(13, 3, 0, 'Swedish', '', 'pkg_sv-SE', 'package', '', 0, '3.5.1.1', '', 'https://update.joomla.org/language/details3/sv-SE_details.xml', '', ''),
(14, 3, 0, 'Syriac', '', 'pkg_sy-IQ', 'package', '', 0, '3.4.5.1', '', 'https://update.joomla.org/language/details3/sy-IQ_details.xml', '', ''),
(15, 3, 0, 'Tamil', '', 'pkg_ta-IN', 'package', '', 0, '3.5.1.2', '', 'https://update.joomla.org/language/details3/ta-IN_details.xml', '', ''),
(16, 3, 0, 'Thai', '', 'pkg_th-TH', 'package', '', 0, '3.5.1.1', '', 'https://update.joomla.org/language/details3/th-TH_details.xml', '', ''),
(17, 3, 0, 'Turkish', '', 'pkg_tr-TR', 'package', '', 0, '3.5.1.1', '', 'https://update.joomla.org/language/details3/tr-TR_details.xml', '', ''),
(18, 3, 0, 'Ukrainian', '', 'pkg_uk-UA', 'package', '', 0, '3.5.1.1', '', 'https://update.joomla.org/language/details3/uk-UA_details.xml', '', ''),
(19, 3, 0, 'Uyghur', '', 'pkg_ug-CN', 'package', '', 0, '3.3.0.1', '', 'https://update.joomla.org/language/details3/ug-CN_details.xml', '', ''),
(20, 3, 0, 'Albanian', '', 'pkg_sq-AL', 'package', '', 0, '3.1.1.1', '', 'https://update.joomla.org/language/details3/sq-AL_details.xml', '', ''),
(21, 3, 0, 'Basque', '', 'pkg_eu-ES', 'package', '', 0, '3.5.1.2', '', 'https://update.joomla.org/language/details3/eu-ES_details.xml', '', ''),
(22, 3, 0, 'Hindi', '', 'pkg_hi-IN', 'package', '', 0, '3.3.6.1', '', 'https://update.joomla.org/language/details3/hi-IN_details.xml', '', ''),
(23, 3, 0, 'Portuguese Brazil', '', 'pkg_pt-BR', 'package', '', 0, '3.5.1.1', '', 'https://update.joomla.org/language/details3/pt-BR_details.xml', '', ''),
(24, 3, 0, 'Serbian Latin', '', 'pkg_sr-YU', 'package', '', 0, '3.5.0.1', '', 'https://update.joomla.org/language/details3/sr-YU_details.xml', '', ''),
(25, 3, 0, 'Spanish', '', 'pkg_es-ES', 'package', '', 0, '3.5.1.1', '', 'https://update.joomla.org/language/details3/es-ES_details.xml', '', ''),
(26, 3, 0, 'Bosnian', '', 'pkg_bs-BA', 'package', '', 0, '3.4.8.1', '', 'https://update.joomla.org/language/details3/bs-BA_details.xml', '', ''),
(27, 3, 0, 'Serbian Cyrillic', '', 'pkg_sr-RS', 'package', '', 0, '3.5.0.1', '', 'https://update.joomla.org/language/details3/sr-RS_details.xml', '', ''),
(28, 3, 0, 'Vietnamese', '', 'pkg_vi-VN', 'package', '', 0, '3.2.1.1', '', 'https://update.joomla.org/language/details3/vi-VN_details.xml', '', ''),
(29, 3, 0, 'Bahasa Indonesia', '', 'pkg_id-ID', 'package', '', 0, '3.3.0.2', '', 'https://update.joomla.org/language/details3/id-ID_details.xml', '', ''),
(30, 3, 0, 'Finnish', '', 'pkg_fi-FI', 'package', '', 0, '3.5.1.1', '', 'https://update.joomla.org/language/details3/fi-FI_details.xml', '', ''),
(31, 3, 0, 'Swahili', '', 'pkg_sw-KE', 'package', '', 0, '3.5.1.1', '', 'https://update.joomla.org/language/details3/sw-KE_details.xml', '', ''),
(32, 3, 0, 'Montenegrin', '', 'pkg_srp-ME', 'package', '', 0, '3.3.1.1', '', 'https://update.joomla.org/language/details3/srp-ME_details.xml', '', ''),
(33, 3, 0, 'English CA', '', 'pkg_en-CA', 'package', '', 0, '3.5.1.2', '', 'https://update.joomla.org/language/details3/en-CA_details.xml', '', ''),
(34, 3, 0, 'French CA', '', 'pkg_fr-CA', 'package', '', 0, '3.5.1.2', '', 'https://update.joomla.org/language/details3/fr-CA_details.xml', '', ''),
(35, 3, 0, 'Welsh', '', 'pkg_cy-GB', 'package', '', 0, '3.3.0.2', '', 'https://update.joomla.org/language/details3/cy-GB_details.xml', '', ''),
(36, 3, 0, 'Sinhala', '', 'pkg_si-LK', 'package', '', 0, '3.3.1.1', '', 'https://update.joomla.org/language/details3/si-LK_details.xml', '', ''),
(37, 3, 0, 'Dari Persian', '', 'pkg_prs-AF', 'package', '', 0, '3.4.4.1', '', 'https://update.joomla.org/language/details3/prs-AF_details.xml', '', ''),
(38, 3, 0, 'Turkmen', '', 'pkg_tk-TM', 'package', '', 0, '3.5.0.1', '', 'https://update.joomla.org/language/details3/tk-TM_details.xml', '', ''),
(39, 3, 0, 'Irish', '', 'pkg_ga-IE', 'package', '', 0, '3.5.1.1', '', 'https://update.joomla.org/language/details3/ga-IE_details.xml', '', ''),
(40, 3, 0, 'Dzongkha', '', 'pkg_dz-BT', 'package', '', 0, '3.4.5.1', '', 'https://update.joomla.org/language/details3/dz-BT_details.xml', '', ''),
(41, 3, 0, 'Slovenian', '', 'pkg_sl-SI', 'package', '', 0, '3.5.1.1', '', 'https://update.joomla.org/language/details3/sl-SI_details.xml', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_update_sites`
--

CREATE TABLE IF NOT EXISTS `n1wr9_update_sites` (
  `update_site_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT '',
  `type` varchar(20) DEFAULT '',
  `location` text NOT NULL,
  `enabled` int(11) DEFAULT '0',
  `last_check_timestamp` bigint(20) DEFAULT '0',
  `extra_query` varchar(1000) DEFAULT '',
  PRIMARY KEY (`update_site_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Update Sites' AUTO_INCREMENT=6 ;

--
-- Dumping data for table `n1wr9_update_sites`
--

INSERT INTO `n1wr9_update_sites` (`update_site_id`, `name`, `type`, `location`, `enabled`, `last_check_timestamp`, `extra_query`) VALUES
(1, 'Joomla! Core', 'collection', 'http://update.joomla.org/core/list.xml', 1, 1464172990, ''),
(2, 'Joomla! Extension Directory', 'collection', 'http://update.joomla.org/jed/list.xml', 1, 1464172990, ''),
(3, 'Accredited Joomla! Translations', 'collection', 'http://update.joomla.org/language/translationlist_3.xml', 1, 1464172988, ''),
(4, 'Joomla! Update Component Update Site', 'extension', 'http://update.joomla.org/core/extensions/com_joomlaupdate.xml', 1, 1464172988, ''),
(5, 'Form2content Lite', 'extension', 'http://www.form2content.com/index.php?option=com_ars&view=update&task=stream&format=xml&id=2', 1, 1464172988, '');

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_update_sites_extensions`
--

CREATE TABLE IF NOT EXISTS `n1wr9_update_sites_extensions` (
  `update_site_id` int(11) NOT NULL DEFAULT '0',
  `extension_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`update_site_id`,`extension_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Links extensions to update sites';

--
-- Dumping data for table `n1wr9_update_sites_extensions`
--

INSERT INTO `n1wr9_update_sites_extensions` (`update_site_id`, `extension_id`) VALUES
(1, 700),
(2, 700),
(3, 600),
(3, 10002),
(4, 28),
(5, 10083);

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_usergroups`
--

CREATE TABLE IF NOT EXISTS `n1wr9_usergroups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'Adjacency List Reference Id',
  `lft` int(11) NOT NULL DEFAULT '0' COMMENT 'Nested set lft.',
  `rgt` int(11) NOT NULL DEFAULT '0' COMMENT 'Nested set rgt.',
  `title` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_usergroup_parent_title_lookup` (`parent_id`,`title`),
  KEY `idx_usergroup_title_lookup` (`title`),
  KEY `idx_usergroup_adjacency_lookup` (`parent_id`),
  KEY `idx_usergroup_nested_set_lookup` (`lft`,`rgt`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `n1wr9_usergroups`
--

INSERT INTO `n1wr9_usergroups` (`id`, `parent_id`, `lft`, `rgt`, `title`) VALUES
(1, 0, 1, 22, 'Public'),
(2, 1, 8, 19, 'Registered'),
(3, 2, 9, 14, 'Author'),
(4, 3, 10, 13, 'Editor'),
(5, 4, 11, 12, 'Publisher'),
(6, 1, 4, 7, 'Manager'),
(7, 6, 5, 6, 'Administrator'),
(8, 1, 20, 21, 'Super Users'),
(9, 1, 2, 3, 'Guest'),
(10, 2, 15, 16, 'Домовладелец'),
(11, 2, 17, 18, 'Эксперт');

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_users`
--

CREATE TABLE IF NOT EXISTS `n1wr9_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `username` varchar(150) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `password` varchar(100) NOT NULL DEFAULT '',
  `block` tinyint(4) NOT NULL DEFAULT '0',
  `sendEmail` tinyint(4) DEFAULT '0',
  `registerDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `lastvisitDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `activation` varchar(100) NOT NULL DEFAULT '',
  `params` text NOT NULL,
  `lastResetTime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Date of last password reset',
  `resetCount` int(11) NOT NULL DEFAULT '0' COMMENT 'Count of password resets since lastResetTime',
  `otpKey` varchar(1000) NOT NULL DEFAULT '' COMMENT 'Two factor authentication encrypted keys',
  `otep` varchar(1000) NOT NULL DEFAULT '' COMMENT 'One time emergency passwords',
  `requireReset` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'Require user to reset password on next login',
  PRIMARY KEY (`id`),
  KEY `idx_name` (`name`),
  KEY `idx_block` (`block`),
  KEY `username` (`username`),
  KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=323 ;

--
-- Dumping data for table `n1wr9_users`
--

INSERT INTO `n1wr9_users` (`id`, `name`, `username`, `email`, `password`, `block`, `sendEmail`, `registerDate`, `lastvisitDate`, `activation`, `params`, `lastResetTime`, `resetCount`, `otpKey`, `otep`, `requireReset`) VALUES
(311, 'Super User', 'admin', 'webmaster.work2@gmail.com', '$2y$10$Tv1lCTMV7o52taNsHkALo.aFaKlGxC573FY6B.piyUhGgD9nXM2nq', 0, 1, '2016-04-14 09:17:47', '2016-05-25 10:43:07', '0', '{"update_cache_list":1}', '0000-00-00 00:00:00', 0, '', '', 0),
(321, 'sloker', 'sloker', 'slavis2007@yandex.ru', '95ce85fad763fd1c8278abf1026cfadb:nHF7Nz3IxIwElRYZNpfWO57iSTzgKAwy', 1, 0, '2016-05-22 14:02:41', '0000-00-00 00:00:00', 'fd2b846ebe86e1c24dbf56971719499d', '{"update_cache_list":1}', '0000-00-00 00:00:00', 0, '', '', 0),
(322, 'dascsdc', 'dascsdc', 'ascsdck@mail.ru', '125d3475d830d89defff2e963dd06188:D8tk2PvaDsN6hUznKwT058ggkNoQFedT', 1, 0, '2016-05-22 14:13:06', '0000-00-00 00:00:00', '92d4bb4b13dbad07ed61d5be1246e3c1', '{"update_cache_list":1}', '0000-00-00 00:00:00', 0, '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_user_keys`
--

CREATE TABLE IF NOT EXISTS `n1wr9_user_keys` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `series` varchar(255) NOT NULL,
  `invalid` tinyint(4) NOT NULL,
  `time` varchar(200) NOT NULL,
  `uastring` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `series` (`series`),
  UNIQUE KEY `series_2` (`series`),
  UNIQUE KEY `series_3` (`series`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_user_notes`
--

CREATE TABLE IF NOT EXISTS `n1wr9_user_notes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `catid` int(10) unsigned NOT NULL DEFAULT '0',
  `subject` varchar(100) NOT NULL DEFAULT '',
  `body` text NOT NULL,
  `state` tinyint(3) NOT NULL DEFAULT '0',
  `checked_out` int(10) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `created_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_user_id` int(10) unsigned NOT NULL,
  `modified_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `review_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_up` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_down` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `idx_user_id` (`user_id`),
  KEY `idx_category_id` (`catid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_user_profiles`
--

CREATE TABLE IF NOT EXISTS `n1wr9_user_profiles` (
  `user_id` int(11) NOT NULL,
  `profile_key` varchar(100) NOT NULL,
  `profile_value` text NOT NULL,
  `ordering` int(11) NOT NULL DEFAULT '0',
  UNIQUE KEY `idx_user_id_profile_key` (`user_id`,`profile_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Simple user profile storage table';

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_user_usergroup_map`
--

CREATE TABLE IF NOT EXISTS `n1wr9_user_usergroup_map` (
  `user_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'Foreign Key to #__users.id',
  `group_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'Foreign Key to #__usergroups.id',
  PRIMARY KEY (`user_id`,`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `n1wr9_user_usergroup_map`
--

INSERT INTO `n1wr9_user_usergroup_map` (`user_id`, `group_id`) VALUES
(311, 8),
(312, 2),
(313, 2),
(314, 2),
(315, 2),
(316, 2),
(317, 2),
(318, 2),
(319, 2),
(320, 2),
(321, 2),
(322, 2);

-- --------------------------------------------------------

--
-- Table structure for table `n1wr9_viewlevels`
--

CREATE TABLE IF NOT EXISTS `n1wr9_viewlevels` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `title` varchar(100) NOT NULL DEFAULT '',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `rules` varchar(5120) NOT NULL COMMENT 'JSON encoded access control.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_assetgroup_title_lookup` (`title`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `n1wr9_viewlevels`
--

INSERT INTO `n1wr9_viewlevels` (`id`, `title`, `ordering`, `rules`) VALUES
(1, 'Public', 0, '[1]'),
(2, 'Registered', 2, '[6,2,8]'),
(3, 'Special', 3, '[6,3,8]'),
(5, 'Guest', 1, '[9]'),
(6, 'Super Users', 4, '[8]');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
