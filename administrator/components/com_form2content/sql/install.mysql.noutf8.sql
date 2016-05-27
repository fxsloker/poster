DROP TABLE IF EXISTS `#__f2c_fieldcontent`;
DROP TABLE IF EXISTS `#__f2c_fieldtype`;
DROP TABLE IF EXISTS `#__f2c_form`;
DROP TABLE IF EXISTS `#__f2c_project`;
DROP TABLE IF EXISTS `#__f2c_projectfields`;
DROP TABLE IF EXISTS `#__f2c_translation`;

CREATE TABLE  `#__f2c_project` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `asset_id` int(10) unsigned NOT NULL,  
  `title` varchar(100) NOT NULL default '',
  `created_by` int(10) unsigned NOT NULL default '0',
  `created` datetime NOT NULL default '0000-00-00 00:00:00',
  `modified` datetime NOT NULL default '0000-00-00 00:00:00',
  `version` varchar(10) NOT NULL default '',
  `published` tinyint(1) NOT NULL default '0',
  `settings` text NOT NULL,
  `attribs` text NOT NULL,
  `metadata` text NOT NULL,  
  `metakey` text NOT NULL,
  `metadesc` text NOT NULL,
  `images` text NOT NULL,
  `urls` text NOT NULL,   
  PRIMARY KEY  (`id`)
);	  

CREATE TABLE  `#__f2c_projectfields` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `projectid` int(10) unsigned NOT NULL default '0',
  `fieldname` varchar(45) NOT NULL default '',
  `title` varchar(45) NOT NULL default '',
  `description` varchar(100) NOT NULL default '',
  `fieldtypeid` int(10) unsigned NOT NULL default '0',
  `settings` text,
  `ordering` int(10) unsigned NOT NULL default '0',
  `frontvisible` tinyint(1) unsigned NOT NULL default '1',    
  PRIMARY KEY  (`id`)
);			  

CREATE TABLE  `#__f2c_fieldcontent` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `formid` int(10) unsigned NOT NULL default '0',
  `fieldid` int(10) unsigned NOT NULL default '0',
  `attribute` varchar(10) NOT NULL DEFAULT 'VALUE',
  `content` mediumtext NOT NULL,
  PRIMARY KEY  (`id`)
);


CREATE TABLE  `#__f2c_fieldtype` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `description` varchar(45) NOT NULL default '',
  `name` varchar(45) NOT NULL default '',
  PRIMARY KEY  (`id`)
);

INSERT INTO `#__f2c_fieldtype` (`id`, `description`, `name`) VALUES (1, 'Single line text (textbox)', 'Singlelinetext');
INSERT INTO `#__f2c_fieldtype` (`id`, `description`, `name`) VALUES (2, 'Multi-line text (text area)', 'Multilinetext');
INSERT INTO `#__f2c_fieldtype` (`id`, `description`, `name`) VALUES (3, 'Multi-line text (editor)', 'Editor');
INSERT INTO `#__f2c_fieldtype` (`id`, `description`, `name`) VALUES (5, 'Single select list', 'Singleselectlist');
INSERT INTO `#__f2c_fieldtype` (`id`, `description`, `name`) VALUES (6, 'Image', 'Image');
INSERT INTO `#__f2c_fieldtype` (`id`, `description`, `name`) VALUES (9, 'Hyperlink', 'Hyperlink');
INSERT INTO `#__f2c_fieldtype` (`id`, `description`, `name`) VALUES (11, 'Info Text', 'Infotext');

CREATE TABLE  `#__f2c_form` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `asset_id` int(10) unsigned NOT NULL,      
  `projectid` int(10) unsigned NOT NULL default '0',
  `title` varchar(255) NOT NULL default '',
  `alias` varchar(255) NOT NULL default '',
  `created_by` int(10) unsigned NOT NULL default '0',
  `created_by_alias` varchar(255) NOT NULL, 
  `created` datetime NOT NULL default '0000-00-00 00:00:00',
  `modified` datetime NOT NULL default '0000-00-00 00:00:00',
  `metakey` text,
  `metadesc` text,
  `catid` int(10) NOT NULL default '0',
  `intro_template` varchar(100) NOT NULL default '',
  `main_template` varchar(100),
  `reference_id` int,
  `ordering` int(11) NOT NULL default '0',
  `publish_up` datetime NOT NULL default '0000-00-00 00:00:00',
  `publish_down` datetime NOT NULL default '0000-00-00 00:00:00',
  `state` tinyint(3) NOT NULL DEFAULT '0',
  `featured` tinyint(3) NOT NULL DEFAULT '0',
  `access` int(10) unsigned NOT NULL DEFAULT '0',
  `attribs` text NOT NULL,
  `metadata` text NOT NULL,
  `language` char(7) NOT NULL,
  `extended` text NOT NULL,  
  PRIMARY KEY  (`id`)
);	  

CREATE TABLE `#__f2c_translation` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `language_id` varchar(10) NOT NULL default '',
  `reference_id` int(10) unsigned NOT NULL default '0',
  `title_translation` mediumtext NOT NULL,
  `description_translation` mediumtext,
  `modified` datetime NOT NULL default '0000-00-00 00:00:00',
  `modified_by` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`)
);