#
#<?php die('Forbidden.'); ?>
#Date: 2016-04-19 10:00:24 UTC
#Software: Joomla Platform 13.1.0 Stable [ Curiosity ] 24-Apr-2013 00:00 GMT

#Fields: datetime	priority clientip	category	message
2016-04-19T10:00:24+00:00	WARNING 91.144.174.213	deprecated	JFile::getName is deprecated. Use native basename() syntax.
2016-04-19T10:00:24+00:00	DEBUG 91.144.174.213	databasequery	SELECT count(*)
FROM n1wr9_f2c_project
WHERE title = 'Blog articles'
2016-04-19T10:00:24+00:00	WARNING 91.144.174.213	deprecated	JFile::getName is deprecated. Use native basename() syntax.
2016-04-19T10:00:24+00:00	DEBUG 91.144.174.213	databasequery	SHOW FULL COLUMNS FROM `n1wr9_f2c_project`
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	INSERT INTO `n1wr9_f2c_project`
(`title`,`created_by`,`created`,`modified`,`version`,`published`,`settings`,`attribs`,`metadata`,`metakey`,`metadesc`) VALUES 
('Blog articles','311','2016-04-19 10:00:24','2016-04-19 10:00:24','5.5.1','1','{\"article_caption\":\"Blog article\",\"title_front_end\":\"1\",\"title_caption\":\"Blog article title\",\"title_default\":\"\",\"title_alias_front_end\":\"1\",\"title_alias_caption\":\"\",\"frontend_templsel\":\"0\",\"intro_template\":\"blog_intro_template.tpl\",\"main_template\":\"blog_main_template.tpl\",\"frontend_pubsel\":\"1\",\"tags_front_end\":\"1\",\"tags_caption\":\"Add tags to your blog\",\"tag_field_ajax_mode\":\"1\",\"tags_allow_custom\":\"1\"}','{\"show_title\":\"\",\"link_titles\":\"\",\"show_tags\":\"\",\"show_intro\":\"0\",\"show_category\":\"\",\"link_category\":\"\",\"show_parent_category\":\"\",\"link_parent_category\":\"\",\"show_author\":\"\",\"link_author\":\"\",\"show_create_date\":\"\",\"show_modify_date\":\"\",\"show_publish_date\":\"\",\"show_item_navigation\":\"\",\"show_icons\":\"\",\"show_print_icon\":\"\",\"show_email_icon\":\"\",\"show_vote\":\"\",\"show_hits\":\"\",\"show_noauth\":\"\",\"alternative_readmore\":\"\",\"article_layout\":\"\"}','{\"robots\":\"\",\"author\":\"\",\"rights\":\"\",\"xreference\":\"\"}','','')
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SHOW FULL COLUMNS FROM `n1wr9_assets`
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT `id`
FROM `n1wr9_assets`
WHERE `name` = 'com_form2content'
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT *
FROM n1wr9_assets
WHERE `id` = '107'
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT `id`
FROM `n1wr9_assets`
WHERE `name` = 'com_form2content.project.1'
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT COUNT(id)
FROM `n1wr9_assets`
WHERE `id` = 107
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	LOCK TABLES `n1wr9_assets` WRITE
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT id, parent_id, level, lft, rgt
FROM n1wr9_assets
WHERE id = 107 LIMIT 0, 1
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	UPDATE n1wr9_assets
SET lft = lft + 2
WHERE lft > 194
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	UPDATE n1wr9_assets
SET rgt = rgt + 2
WHERE rgt >= 194
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	INSERT INTO `n1wr9_assets`
(`name`,`title`,`rules`,`parent_id`,`level`,`lft`,`rgt`) VALUES 
('com_form2content.project.1','Blog articles','{}','107','2','194','195')
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	UNLOCK TABLES
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	UPDATE `n1wr9_f2c_project`
SET asset_id = 108
WHERE `id` = '1'
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT title
FROM n1wr9_f2c_project
WHERE id=1
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT fieldname, name
FROM n1wr9_f2c_projectfields prf
INNER JOIN n1wr9_f2c_fieldtype flt ON prf.fieldtypeid = flt.id
WHERE projectid=1
ORDER BY ordering ASC
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT *
FROM n1wr9_f2c_project
WHERE `id` = '1'
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	UPDATE `n1wr9_f2c_project` SET `title`='Blog articles',`created_by`='311',`created`='2016-04-19 10:00:24',`modified`='2016-04-19 10:00:24',`version`='5.5.1',`published`='1',`settings`='{\"article_caption\":\"Blog article\",\"title_front_end\":\"1\",\"title_caption\":\"Blog article title\",\"title_default\":\"\",\"title_alias_front_end\":\"1\",\"title_alias_caption\":\"\",\"frontend_templsel\":\"0\",\"intro_template\":\"default_intro_template_Blog articles.tpl\",\"main_template\":\"default_main_template_Blog articles.tpl\",\"frontend_pubsel\":\"1\",\"tags_front_end\":\"1\",\"tags_caption\":\"Add tags to your blog\",\"tag_field_ajax_mode\":\"1\",\"tags_allow_custom\":\"1\"}',`attribs`='{\"show_title\":\"\",\"link_titles\":\"\",\"show_tags\":\"\",\"show_intro\":\"0\",\"show_category\":\"\",\"link_category\":\"\",\"show_parent_category\":\"\",\"link_parent_category\":\"\",\"show_author\":\"\",\"link_author\":\"\",\"show_create_date\":\"\",\"show_modify_date\":\"\",\"show_publish_date\":\"\",\"show_item_navigation\":\"\",\"show_icons\":\"\",\"show_print_icon\":\"\",\"show_email_icon\":\"\",\"show_vote\":\"\",\"show_hits\":\"\",\"show_noauth\":\"\",\"alternative_readmore\":\"\",\"article_layout\":\"\"}',`metadata`='{\"robots\":\"\",\"author\":\"\",\"rights\":\"\",\"xreference\":\"\"}',`metakey`='',`metadesc`='',`images`='',`urls`='' WHERE `id`='1'
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT `id`
FROM `n1wr9_assets`
WHERE `name` = 'com_form2content'
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT *
FROM n1wr9_assets
WHERE `id` = '107'
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT `id`
FROM `n1wr9_assets`
WHERE `name` = 'com_form2content.project.1'
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT *
FROM n1wr9_assets
WHERE `id` = '108'
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT COUNT(id)
FROM `n1wr9_assets`
WHERE `id` = 107
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	LOCK TABLES `n1wr9_assets` WRITE
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	UPDATE `n1wr9_assets` SET `name`='com_form2content.project.1',`title`='Blog articles',`rules`='{}',`parent_id`='107',`level`='2',`lft`='194',`rgt`='195' WHERE `id`='108'
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	UNLOCK TABLES
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT name
FROM n1wr9_f2c_fieldtype
WHERE id = 2
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SHOW FULL COLUMNS FROM `n1wr9_f2c_projectfields`
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT id, ordering
FROM n1wr9_f2c_projectfields
WHERE ordering >= 0 AND projectid = 1
ORDER BY ordering
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT COUNT(*)
FROM n1wr9_f2c_projectfields
WHERE fieldname = 'intro' AND id <> -1 AND projectid = 1
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT MAX(ordering)
FROM n1wr9_f2c_projectfields
WHERE projectid = 1
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	INSERT INTO `n1wr9_f2c_projectfields`
(`projectid`,`fieldname`,`title`,`description`,`fieldtypeid`,`settings`,`ordering`,`frontvisible`) VALUES 
('1','intro','Article introduction','Shown in category blog layout','2','{\"mlt_max_num_chars\":\"250\"}','1','1')
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT title
FROM n1wr9_f2c_project
WHERE id=1
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT fieldname, name
FROM n1wr9_f2c_projectfields prf
INNER JOIN n1wr9_f2c_fieldtype flt ON prf.fieldtypeid = flt.id
WHERE projectid=1
ORDER BY ordering ASC
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT name
FROM n1wr9_f2c_fieldtype
WHERE id = 6
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT id, ordering
FROM n1wr9_f2c_projectfields
WHERE ordering >= 0 AND projectid = 1
ORDER BY ordering
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT COUNT(*)
FROM n1wr9_f2c_projectfields
WHERE fieldname = 'image' AND id <> -1 AND projectid = 1
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT MAX(ordering)
FROM n1wr9_f2c_projectfields
WHERE projectid = 1
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	INSERT INTO `n1wr9_f2c_projectfields`
(`projectid`,`fieldname`,`title`,`description`,`fieldtypeid`,`settings`,`ordering`,`frontvisible`) VALUES 
('1','image','Blog image','','6','{\"img_max_width\":\"960\",\"img_max_height\":\"480\",\"img_output_mode\":\"0\"}','2','1')
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT title
FROM n1wr9_f2c_project
WHERE id=1
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT fieldname, name
FROM n1wr9_f2c_projectfields prf
INNER JOIN n1wr9_f2c_fieldtype flt ON prf.fieldtypeid = flt.id
WHERE projectid=1
ORDER BY ordering ASC
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT name
FROM n1wr9_f2c_fieldtype
WHERE id = 9
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT id, ordering
FROM n1wr9_f2c_projectfields
WHERE ordering >= 0 AND projectid = 1
ORDER BY ordering
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT COUNT(*)
FROM n1wr9_f2c_projectfields
WHERE fieldname = 'source' AND id <> -1 AND projectid = 1
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT MAX(ordering)
FROM n1wr9_f2c_projectfields
WHERE projectid = 1
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	INSERT INTO `n1wr9_f2c_projectfields`
(`projectid`,`fieldname`,`title`,`description`,`fieldtypeid`,`settings`,`ordering`,`frontvisible`) VALUES 
('1','source','Article source (link)','','9','{\"lnk_output_mode\":\"0\",\"lnk_attributes_url\":\"\",\"lnk_attributes_display_as\":\"placeholder=\\\"link text\\\"\",\"lnk_attributes_title\":\"placeholder=\\\"title text\\\"\",\"lnk_attributes_target\":\"\",\"lnk_add_http_prefix\":\"0\"}','3','1')
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT title
FROM n1wr9_f2c_project
WHERE id=1
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT fieldname, name
FROM n1wr9_f2c_projectfields prf
INNER JOIN n1wr9_f2c_fieldtype flt ON prf.fieldtypeid = flt.id
WHERE projectid=1
ORDER BY ordering ASC
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT name
FROM n1wr9_f2c_fieldtype
WHERE id = 5
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT id, ordering
FROM n1wr9_f2c_projectfields
WHERE ordering >= 0 AND projectid = 1
ORDER BY ordering
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT COUNT(*)
FROM n1wr9_f2c_projectfields
WHERE fieldname = 'author' AND id <> -1 AND projectid = 1
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT MAX(ordering)
FROM n1wr9_f2c_projectfields
WHERE projectid = 1
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	INSERT INTO `n1wr9_f2c_projectfields`
(`projectid`,`fieldname`,`title`,`description`,`fieldtypeid`,`settings`,`ordering`,`frontvisible`) VALUES 
('1','author','Display author name?','','5','{\"ssl_display_mode\":\"0\",\"ssl_show_empty_choice_text\":\"1\",\"ssl_empty_choice_text\":\"- make a choice -\",\"ssl_options\":{\"no\":\"No author name\",\"joomla\":\"Joomla author name\",\"custom\":\"Custom name (from textbox below)\"}}','4','1')
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT title
FROM n1wr9_f2c_project
WHERE id=1
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT fieldname, name
FROM n1wr9_f2c_projectfields prf
INNER JOIN n1wr9_f2c_fieldtype flt ON prf.fieldtypeid = flt.id
WHERE projectid=1
ORDER BY ordering ASC
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT name
FROM n1wr9_f2c_fieldtype
WHERE id = 1
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT id, ordering
FROM n1wr9_f2c_projectfields
WHERE ordering >= 0 AND projectid = 1
ORDER BY ordering
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT COUNT(*)
FROM n1wr9_f2c_projectfields
WHERE fieldname = 'author_name' AND id <> -1 AND projectid = 1
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT MAX(ordering)
FROM n1wr9_f2c_projectfields
WHERE projectid = 1
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	INSERT INTO `n1wr9_f2c_projectfields`
(`projectid`,`fieldname`,`title`,`description`,`fieldtypeid`,`settings`,`ordering`,`frontvisible`) VALUES 
('1','author_name','Author name (custom)','','1','{}','5','1')
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT title
FROM n1wr9_f2c_project
WHERE id=1
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT fieldname, name
FROM n1wr9_f2c_projectfields prf
INNER JOIN n1wr9_f2c_fieldtype flt ON prf.fieldtypeid = flt.id
WHERE projectid=1
ORDER BY ordering ASC
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT name
FROM n1wr9_f2c_fieldtype
WHERE id = 11
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT id, ordering
FROM n1wr9_f2c_projectfields
WHERE ordering >= 0 AND projectid = 1
ORDER BY ordering
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT COUNT(*)
FROM n1wr9_f2c_projectfields
WHERE fieldname = 'info_article' AND id <> -1 AND projectid = 1
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT MAX(ordering)
FROM n1wr9_f2c_projectfields
WHERE projectid = 1
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	INSERT INTO `n1wr9_f2c_projectfields`
(`projectid`,`fieldname`,`title`,`description`,`fieldtypeid`,`settings`,`ordering`,`frontvisible`) VALUES 
('1','info_article','','','11','{\"inf_text\":\"<p>The introduction text from above is shown in the Category Blog Layout. The text for the article below is shown on the Article page. If the introduction text shows up above the article text you can choose to hide this using the Joomla article paramaters <strong>display intro<\\/strong> and setting it to <strong>no<\\/strong>.<\\/p>\\r\\n<p>If <strong>NO<\\/strong> content is added in the article text, there weill be <strong>NO<\\/strong> Read More link! Do not use the read more button of the editor.<\\/p>\"}','6','1')
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT title
FROM n1wr9_f2c_project
WHERE id=1
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT fieldname, name
FROM n1wr9_f2c_projectfields prf
INNER JOIN n1wr9_f2c_fieldtype flt ON prf.fieldtypeid = flt.id
WHERE projectid=1
ORDER BY ordering ASC
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT name
FROM n1wr9_f2c_fieldtype
WHERE id = 3
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT id, ordering
FROM n1wr9_f2c_projectfields
WHERE ordering >= 0 AND projectid = 1
ORDER BY ordering
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT COUNT(*)
FROM n1wr9_f2c_projectfields
WHERE fieldname = 'article' AND id <> -1 AND projectid = 1
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT MAX(ordering)
FROM n1wr9_f2c_projectfields
WHERE projectid = 1
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	INSERT INTO `n1wr9_f2c_projectfields`
(`projectid`,`fieldname`,`title`,`description`,`fieldtypeid`,`settings`,`ordering`,`frontvisible`) VALUES 
('1','article','Article text','','3','{}','7','1')
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT title
FROM n1wr9_f2c_project
WHERE id=1
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT fieldname, name
FROM n1wr9_f2c_projectfields prf
INNER JOIN n1wr9_f2c_fieldtype flt ON prf.fieldtypeid = flt.id
WHERE projectid=1
ORDER BY ordering ASC
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT *
FROM n1wr9_f2c_project
WHERE `id` = '1'
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT pf.*, ft.name
FROM n1wr9_f2c_projectfields pf
INNER JOIN n1wr9_f2c_fieldtype ft ON pf.fieldtypeid = ft.id
WHERE pf.projectid = 1
ORDER BY pf.ordering ASC
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT id
FROM n1wr9_categories
WHERE extension = 'com_content' AND published = 1 LIMIT 0, 1
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SHOW FULL COLUMNS FROM `n1wr9_f2c_form`
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT title, alias
FROM `n1wr9_categories`
WHERE id = 2
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT id, ordering
FROM n1wr9_f2c_form
WHERE ordering >= 0 AND catid = 2 AND state >= 0
ORDER BY ordering
2016-04-19T10:00:25+00:00	WARNING 91.144.174.213	deprecated	JApplication is deprecated.
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SHOW FULL COLUMNS FROM `n1wr9_content`
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT *
FROM n1wr9_f2c_form
WHERE `alias` = 'getting-started-with-form2content-lite' AND `catid` = '2'
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT *
FROM n1wr9_content
WHERE `alias` = 'getting-started-with-form2content-lite' AND `catid` = '2'
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	INSERT INTO `n1wr9_f2c_form`
(`id`,`projectid`,`title`,`alias`,`created_by`,`created_by_alias`,`created`,`modified`,`metakey`,`metadesc`,`catid`,`intro_template`,`main_template`,`reference_id`,`publish_up`,`publish_down`,`state`,`featured`,`access`,`attribs`,`metadata`,`language`) VALUES 
('0','1','Getting started with Form2Content Lite','getting-started-with-form2content-lite','311','','2016-04-19 10:00:25','0000-00-00 00:00:00','','','2','blog_intro_template.tpl','blog_main_template.tpl','0','2016-04-19 10:00:25','0000-00-00 00:00:00','0','0','1','{\"show_title\":\"\",\"link_titles\":\"\",\"show_intro\":\"0\",\"show_category\":\"\",\"link_category\":\"\",\"show_parent_category\":\"\",\"link_parent_category\":\"\",\"show_author\":\"\",\"link_author\":\"\",\"show_create_date\":\"\",\"show_modify_date\":\"\",\"show_publish_date\":\"\",\"show_item_navigation\":\"\",\"show_icons\":\"\",\"show_print_icon\":\"\",\"show_email_icon\":\"\",\"show_vote\":\"\",\"show_hits\":\"\",\"show_noauth\":\"\",\"alternative_readmore\":\"\",\"article_layout\":\"\",\"info_block_position\":\"0\"}','{\"robots\":\"\",\"author\":\"\",\"rights\":\"\",\"xreference\":\"\"}','*')
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT asset_id
FROM n1wr9_f2c_project
WHERE id = 1
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT `id`
FROM `n1wr9_assets`
WHERE `name` = 'com_form2content.form.1'
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT COUNT(id)
FROM `n1wr9_assets`
WHERE `id` = 108
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	LOCK TABLES `n1wr9_assets` WRITE
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT id, parent_id, level, lft, rgt
FROM n1wr9_assets
WHERE id = 108 LIMIT 0, 1
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	UPDATE n1wr9_assets
SET lft = lft + 2
WHERE lft > 195
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	UPDATE n1wr9_assets
SET rgt = rgt + 2
WHERE rgt >= 195
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	INSERT INTO `n1wr9_assets`
(`name`,`title`,`rules`,`parent_id`,`level`,`lft`,`rgt`) VALUES 
('com_form2content.form.1','Getting started with Form2Content Lite','{\"core.delete\":[],\"core.edit\":[],\"core.edit.state\":[]}','108','3','195','196')
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	UNLOCK TABLES
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	UPDATE `n1wr9_f2c_form`
SET asset_id = 109
WHERE `id` = '1'
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	INSERT INTO `n1wr9_f2c_fieldcontent`
(formid, fieldid, attribute, content) VALUES 
(1,1,'VALUE','Thank you for downloading and installing Form2Content LITE. In this demo content and article we hope to help you get started using our Joomla Content Construction Kit.')
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	INSERT INTO `n1wr9_f2c_fieldcontent`
(formid, fieldid, attribute, content) VALUES 
(1,2,'VALUE','{\"filename\":\"2.png\",\"width\":700,\"height\":360,\"widthThumbnail\":150,\"heightThumbnail\":78,\"alt\":\"Open Source Design\",\"title\":\"F2C is developed by Open Source Design\"}')
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	INSERT INTO `n1wr9_f2c_fieldcontent`
(formid, fieldid, attribute, content) VALUES 
(1,3,'VALUE','{\"url\":\"http:\\/\\/documentation.form2content.com\\/\",\"display\":\"Form2Content Documentation\",\"title\":\"Form2Content Documentation\",\"target\":\"_blank\"}')
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	INSERT INTO `n1wr9_f2c_fieldcontent`
(formid, fieldid, attribute, content) VALUES 
(1,4,'VALUE','custom')
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	INSERT INTO `n1wr9_f2c_fieldcontent`
(formid, fieldid, attribute, content) VALUES 
(1,5,'VALUE','Patrick Faasse, Julien Brouns - creators of Form2Content Joomla CCK')
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	INSERT INTO `n1wr9_f2c_fieldcontent`
(formid, fieldid, attribute, content) VALUES 
(1,7,'VALUE','<p><strong>Getting started with Form2Content!</strong></p>\r\n<p>In the below steps we will show you how to create your own Joomla articles via Form2Content.<br /><a href=\"http://documentation.form2content.com/f2c-getting-started/32-getting-started-f2c-step-by-step\">http://documentation.form2content.com/f2c-getting-started/32-getting-started-f2c-step-by-step</a></p>\r\n<h2>What type of articles do you want to create?</h2>\r\n<p>The installed demo <em>content type</em> is an example of a blog. Each time a F2C form is filled out a Joomla article is created. In the content type manager you define permissions, in which category the Joomla article is saved and article settings like show/hide title, intro etc.</p>\r\n<p><a href=\"http://documentation.form2content.com/f2c-content-types\">http://documentation.form2content.com/f2c-content-types</a></p>\r\n<h2>Define the fields to collect the article data</h2>\r\n<p>In the F2C Content Type manager you will find the link to the F2C <em>Fields Manager</em> (cog icon in the second column). In the field manager you define the data you want to collect via a range of different fields. In our <em>blog example</em> we have used single-select list, multiline text field, an editor, image upload etc.</p>\r\n<p><a href=\"http://documentation.form2content.com/f2c-field-types\">http://documentation.form2content.com/f2c-field-types</a></p>\r\n<h2>Define the article template (layout with placeholders)</h2>\r\n<p>Now that we can collect the article data we need to create a template to display this data within the Joomla article. Each created article will look teh same since we use the same layout (template).</p>\r\n<p><strong>The Form2Content rule:</strong> Form fields data + template layout = Joomla article html</p>\r\n<p>Please see our other example article about where the F2C article templates are located and how the placeholders for the data work.</p>\r\n<p><a href=\"http://documentation.form2content.com/f2c-templating\">http://documentation.form2content.com/f2c-templating</a></p>\r\n<h2>When all works in the back-end, create a menu link to the front-end</h2>\r\n<p>When you can create Joomla article via Form2Content in the back-end you can add the front-end access and let your website users add Joomla articles with great ease ... and they all look the same!</p>\r\n<p><a href=\"http://documentation.form2content.com/f2c-front-end\">http://documentation.form2content.com/f2c-front-end</a></p>')
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT *
FROM n1wr9_f2c_form
WHERE `id` = '1'
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT title, alias
FROM `n1wr9_categories`
WHERE id = 2
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT pf.*,fc.attribute, fc.content, fc.id AS fieldcontentid, IFNULL(fc.formid, 1) as formid,ft.name
FROM n1wr9_f2c_projectfields pf
LEFT JOIN n1wr9_f2c_fieldcontent fc ON fc.fieldid = pf.id AND fc.formid = 1
INNER JOIN n1wr9_f2c_fieldtype ft ON pf.fieldtypeid = ft.id
WHERE pf.projectid = 1
ORDER BY pf.ordering, pf.fieldtypeid, fc.id
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT *
FROM n1wr9_f2c_form
WHERE `id` = '1'
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT title, alias
FROM `n1wr9_categories`
WHERE id = 2
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT pf.*,fc.attribute, fc.content, fc.id AS fieldcontentid, IFNULL(fc.formid, 1) as formid,ft.name
FROM n1wr9_f2c_projectfields pf
LEFT JOIN n1wr9_f2c_fieldcontent fc ON fc.fieldid = pf.id AND fc.formid = 1
INNER JOIN n1wr9_f2c_fieldtype ft ON pf.fieldtypeid = ft.id
WHERE pf.projectid = 1
ORDER BY pf.ordering, pf.fieldtypeid, fc.id
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SHOW FULL COLUMNS FROM `n1wr9_users`
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT *
FROM `n1wr9_users`
WHERE `id` = 311
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT `g`.`id`,`g`.`title`
FROM `n1wr9_usergroups` AS g
INNER JOIN `n1wr9_user_usergroup_map` AS m ON m.group_id = g.id
WHERE `m`.`user_id` = 311
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT count(*)
FROM `n1wr9_content`
WHERE id=0
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT *
FROM n1wr9_f2c_project
WHERE `id` = '1'
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT pf.*, ft.name
FROM n1wr9_f2c_projectfields pf
INNER JOIN n1wr9_f2c_fieldtype ft ON pf.fieldtypeid = ft.id
WHERE pf.projectid = 1
ORDER BY pf.ordering ASC
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT `id`
FROM `n1wr9_assets`
WHERE `name` = 'com_content'
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT a.rules
FROM n1wr9_assets AS a
WHERE (a.id = 8)
GROUP BY a.id, a.rules, a.lft
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	INSERT INTO `n1wr9_content`
(`title`,`alias`,`introtext`,`fulltext`,`state`,`catid`,`created`,`created_by`,`created_by_alias`,`modified`,`publish_up`,`publish_down`,`images`,`urls`,`attribs`,`version`,`metakey`,`metadesc`,`access`,`metadata`,`featured`,`language`) VALUES 
('Getting started with Form2Content Lite','getting-started-with-form2content-lite','<!--\nThis is the FORM2CONTENT INTRO TEMPLATE for the BLOG CONTENT TYPE \n\nIt can be found in < root >/media/com_from2content/templates\n\nThe template shows you how you can:\n\n1) Add HTML/CSS for your article\n2) Add F2C Template Parameters (placeholders for your form data)\n3) Use basic SMARTY syntax\n\n-->\n<!--block escaping so SMARTY doesn\'t break on use of {} tags-->\n<style>\n.f2c_intro_image {float:left; padding:5px;}\n</style>\n\n\n<div class=\"f2c article_intro_wrapper\">\n	<!--check to add the read more around the image-->\n    <a href=\"index.php?option=com_content&view=article&id=0:getting-started-with-form2content-lite&catid=2:uncategorised\" target=\"_parent\" title=\"Getting started with Form2Content Lite\">\n    		<img src=\"images/stories/com_form2content/p1/f1/thumbs/2.png\" alt=\"Open Source Design\" title=\"F2C is developed by Open Source Design\" class=\"f2c_intro_image\">\n    	</a>\n    	<p>Thank you for downloading and installing Form2Content LITE. In this demo content and article we hope to help you get started using our Joomla Content Construction Kit.</p>\n</div><!--article intro wrapper-->','<!--If no article text, NO read more button will generate because the template will be empty! -->\n<!--PLEASE REMEMBER THAT YOU CAN HIDE THE INTRO in your article by using the Joomla article setting => show intro: NO -->\n			<img src=\"images/stories/com_form2content/p1/f1/thumbs/2.png\" alt=\"Open Source Design\" title=\"F2C is developed by Open Source Design\" class=\"f2c_intro_image\" style=\"float:right; padding-left:15px;\">\n	    <div><p><strong>Getting started with Form2Content!</strong></p>\r\n<p>In the below steps we will show you how to create your own Joomla articles via Form2Content.<br /><a href=\"http://documentation.form2content.com/f2c-getting-started/32-getting-started-f2c-step-by-step\">http://documentation.form2content.com/f2c-getting-started/32-getting-started-f2c-step-by-step</a></p>\r\n<h2>What type of articles do you want to create?</h2>\r\n<p>The installed demo <em>content type</em> is an example of a blog. Each time a F2C form is filled out a Joomla article is created. In the content type manager you define permissions, in which category the Joomla article is saved and article settings like show/hide title, intro etc.</p>\r\n<p><a href=\"http://documentation.form2content.com/f2c-content-types\">http://documentation.form2content.com/f2c-content-types</a></p>\r\n<h2>Define the fields to collect the article data</h2>\r\n<p>In the F2C Content Type manager you will find the link to the F2C <em>Fields Manager</em> (cog icon in the second column). In the field manager you define the data you want to collect via a range of different fields. In our <em>blog example</em> we have used single-select list, multiline text field, an editor, image upload etc.</p>\r\n<p><a href=\"http://documentation.form2content.com/f2c-field-types\">http://documentation.form2content.com/f2c-field-types</a></p>\r\n<h2>Define the article template (layout with placeholders)</h2>\r\n<p>Now that we can collect the article data we need to create a template to display this data within the Joomla article. Each created article will look teh same since we use the same layout (template).</p>\r\n<p><strong>The Form2Content rule:</strong> Form fields data + template layout = Joomla article html</p>\r\n<p>Please see our other example article about where the F2C article templates are located and how the placeholders for the data work.</p>\r\n<p><a href=\"http://documentation.form2content.com/f2c-templating\">http://documentation.form2content.com/f2c-templating</a></p>\r\n<h2>When all works in the back-end, create a menu link to the front-end</h2>\r\n<p>When you can create Joomla article via Form2Content in the back-end you can add the front-end access and let your website users add Joomla articles with great ease ... and they all look the same!</p>\r\n<p><a href=\"http://documentation.form2content.com/f2c-front-end\">http://documentation.form2content.com/f2c-front-end</a></p></div>\n    \n        <p><strong>Source:</strong> <a href=\"http://documentation.form2content.com/\" target=\"_blank\" title=\"Form2Content Documentation\">Form2Content Documentation</a></p>\n    \n                        <p><strong>Author:</strong> Patrick Faasse, Julien Brouns - creators of Form2Content Joomla CCK</p>\n                    ','0','2','2016-04-19 10:00:25','311','','0000-00-00 00:00:00','2016-04-19 10:00:25','0000-00-00 00:00:00','{\"image_intro\":\"\",\"float_intro\":\"\",\"image_intro_alt\":\"\",\"image_intro_caption\":\"\",\"image_fulltext\":\"\",\"float_fulltext\":\"\",\"image_fulltext_alt\":\"\",\"image_fulltext_caption\":\"\"}','{\"urla\":\"\",\"urlatext\":\"\",\"targeta\":\"\",\"urlb\":\"\",\"urlbtext\":\"\",\"targetb\":\"\",\"urlc\":\"\",\"urlctext\":\"\",\"targetc\":\"\"}','{\"show_title\":\"\",\"link_titles\":\"\",\"show_intro\":\"0\",\"show_category\":\"\",\"link_category\":\"\",\"show_parent_category\":\"\",\"link_parent_category\":\"\",\"show_author\":\"\",\"link_author\":\"\",\"show_create_date\":\"\",\"show_modify_date\":\"\",\"show_publish_date\":\"\",\"show_item_navigation\":\"\",\"show_icons\":\"\",\"show_print_icon\":\"\",\"show_email_icon\":\"\",\"show_vote\":\"\",\"show_hits\":\"\",\"show_noauth\":\"\",\"alternative_readmore\":\"\",\"article_layout\":\"\",\"info_block_position\":\"0\"}','1','','','1','{\"robots\":\"\",\"author\":\"\",\"rights\":\"\",\"xreference\":\"\"}','0','*')
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT `asset_id`
FROM `n1wr9_categories`
WHERE `id` = 2
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT `id`
FROM `n1wr9_assets`
WHERE `name` = 'com_content.article.1'
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT COUNT(id)
FROM `n1wr9_assets`
WHERE `id` = 27
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	LOCK TABLES `n1wr9_assets` WRITE
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT id, parent_id, level, lft, rgt
FROM n1wr9_assets
WHERE id = 27 LIMIT 0, 1
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	UPDATE n1wr9_assets
SET lft = lft + 2
WHERE lft > 19
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	UPDATE n1wr9_assets
SET rgt = rgt + 2
WHERE rgt >= 19
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	INSERT INTO `n1wr9_assets`
(`name`,`title`,`rules`,`parent_id`,`level`,`lft`,`rgt`) VALUES 
('com_content.article.1','Getting started with Form2Content Lite','{\"core.admin\":{\"7\":1},\"core.manage\":{\"6\":1},\"core.create\":{\"3\":1},\"core.delete\":[],\"core.edit\":{\"4\":1},\"core.edit.state\":{\"5\":1},\"core.edit.own\":[]}','27','3','19','20')
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	UNLOCK TABLES
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	UPDATE `n1wr9_content`
SET asset_id = 110
WHERE `id` = 1
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SHOW FULL COLUMNS FROM `n1wr9_ucm_history`
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SHOW FULL COLUMNS FROM `n1wr9_content_types`
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT *
FROM n1wr9_content_types
WHERE `type_alias` = 'com_content.article'
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT *
FROM `n1wr9_ucm_history`
WHERE `ucm_item_id` = 1 AND `ucm_type_id` = 1 AND `sha1_hash` = '369a0cd0536ca3bbd79d6b927e2070330eb0ac58' LIMIT 0, 1
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT *
FROM n1wr9_content_types
WHERE `type_id` = '1'
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	INSERT INTO `n1wr9_ucm_history`
(`ucm_item_id`,`ucm_type_id`,`save_date`,`editor_user_id`,`character_count`,`sha1_hash`,`version_data`) VALUES 
('1','1','2016-04-19 10:00:25','311','6028','369a0cd0536ca3bbd79d6b927e2070330eb0ac58','{\"id\":1,\"asset_id\":110,\"title\":\"Getting started with Form2Content Lite\",\"alias\":\"getting-started-with-form2content-lite\",\"introtext\":\"<!--\\nThis is the FORM2CONTENT INTRO TEMPLATE for the BLOG CONTENT TYPE \\n\\nIt can be found in < root >\\/media\\/com_from2content\\/templates\\n\\nThe template shows you how you can:\\n\\n1) Add HTML\\/CSS for your article\\n2) Add F2C Template Parameters (placeholders for your form data)\\n3) Use basic SMARTY syntax\\n\\n-->\\n<!--block escaping so SMARTY doesn\'t break on use of {} tags-->\\n<style>\\n.f2c_intro_image {float:left; padding:5px;}\\n<\\/style>\\n\\n\\n<div class=\\\"f2c article_intro_wrapper\\\">\\n\\t<!--check to add the read more around the image-->\\n    <a href=\\\"index.php?option=com_content&view=article&id=0:getting-started-with-form2content-lite&catid=2:uncategorised\\\" target=\\\"_parent\\\" title=\\\"Getting started with Form2Content Lite\\\">\\n    \\t\\t<img src=\\\"images\\/stories\\/com_form2content\\/p1\\/f1\\/thumbs\\/2.png\\\" alt=\\\"Open Source Design\\\" title=\\\"F2C is developed by Open Source Design\\\" class=\\\"f2c_intro_image\\\">\\n    \\t<\\/a>\\n    \\t<p>Thank you for downloading and installing Form2Content LITE. In this demo content and article we hope to help you get started using our Joomla Content Construction Kit.<\\/p>\\n<\\/div><!--article intro wrapper-->\",\"fulltext\":\"<!--If no article text, NO read more button will generate because the template will be empty! -->\\n<!--PLEASE REMEMBER THAT YOU CAN HIDE THE INTRO in your article by using the Joomla article setting => show intro: NO -->\\n\\t\\t\\t<img src=\\\"images\\/stories\\/com_form2content\\/p1\\/f1\\/thumbs\\/2.png\\\" alt=\\\"Open Source Design\\\" title=\\\"F2C is developed by Open Source Design\\\" class=\\\"f2c_intro_image\\\" style=\\\"float:right; padding-left:15px;\\\">\\n\\t    <div><p><strong>Getting started with Form2Content!<\\/strong><\\/p>\\r\\n<p>In the below steps we will show you how to create your own Joomla articles via Form2Content.<br \\/><a href=\\\"http:\\/\\/documentation.form2content.com\\/f2c-getting-started\\/32-getting-started-f2c-step-by-step\\\">http:\\/\\/documentation.form2content.com\\/f2c-getting-started\\/32-getting-started-f2c-step-by-step<\\/a><\\/p>\\r\\n<h2>What type of articles do you want to create?<\\/h2>\\r\\n<p>The installed demo <em>content type<\\/em> is an example of a blog. Each time a F2C form is filled out a Joomla article is created. In the content type manager you define permissions, in which category the Joomla article is saved and article settings like show\\/hide title, intro etc.<\\/p>\\r\\n<p><a href=\\\"http:\\/\\/documentation.form2content.com\\/f2c-content-types\\\">http:\\/\\/documentation.form2content.com\\/f2c-content-types<\\/a><\\/p>\\r\\n<h2>Define the fields to collect the article data<\\/h2>\\r\\n<p>In the F2C Content Type manager you will find the link to the F2C <em>Fields Manager<\\/em> (cog icon in the second column). In the field manager you define the data you want to collect via a range of different fields. In our <em>blog example<\\/em> we have used single-select list, multiline text field, an editor, image upload etc.<\\/p>\\r\\n<p><a href=\\\"http:\\/\\/documentation.form2content.com\\/f2c-field-types\\\">http:\\/\\/documentation.form2content.com\\/f2c-field-types<\\/a><\\/p>\\r\\n<h2>Define the article template (layout with placeholders)<\\/h2>\\r\\n<p>Now that we can collect the article data we need to create a template to display this data within the Joomla article. Each created article will look teh same since we use the same layout (template).<\\/p>\\r\\n<p><strong>The Form2Content rule:<\\/strong> Form fields data + template layout = Joomla article html<\\/p>\\r\\n<p>Please see our other example article about where the F2C article templates are located and how the placeholders for the data work.<\\/p>\\r\\n<p><a href=\\\"http:\\/\\/documentation.form2content.com\\/f2c-templating\\\">http:\\/\\/documentation.form2content.com\\/f2c-templating<\\/a><\\/p>\\r\\n<h2>When all works in the back-end, create a menu link to the front-end<\\/h2>\\r\\n<p>When you can create Joomla article via Form2Content in the back-end you can add the front-end access and let your website users add Joomla articles with great ease ... and they all look the same!<\\/p>\\r\\n<p><a href=\\\"http:\\/\\/documentation.form2content.com\\/f2c-front-end\\\">http:\\/\\/documentation.form2content.com\\/f2c-front-end<\\/a><\\/p><\\/div>\\n    \\n        <p><strong>Source:<\\/strong> <a href=\\\"http:\\/\\/documentation.form2content.com\\/\\\" target=\\\"_blank\\\" title=\\\"Form2Content Documentation\\\">Form2Content Documentation<\\/a><\\/p>\\n    \\n                        <p><strong>Author:<\\/strong> Patrick Faasse, Julien Brouns - creators of Form2Content Joomla CCK<\\/p>\\n                    \",\"state\":0,\"catid\":\"2\",\"created\":\"2016-04-19 10:00:25\",\"created_by\":\"311\",\"created_by_alias\":\"\",\"modified\":\"0000-00-00 00:00:00\",\"modified_by\":null,\"checked_out\":null,\"checked_out_time\":null,\"publish_up\":\"2016-04-19 10:00:25\",\"publish_down\":\"0000-00-00 00:00:00\",\"images\":\"{\\\"image_intro\\\":\\\"\\\",\\\"float_intro\\\":\\\"\\\",\\\"image_intro_alt\\\":\\\"\\\",\\\"image_intro_caption\\\":\\\"\\\",\\\"image_fulltext\\\":\\\"\\\",\\\"float_fulltext\\\":\\\"\\\",\\\"image_fulltext_alt\\\":\\\"\\\",\\\"image_fulltext_caption\\\":\\\"\\\"}\",\"urls\":\"{\\\"urla\\\":\\\"\\\",\\\"urlatext\\\":\\\"\\\",\\\"targeta\\\":\\\"\\\",\\\"urlb\\\":\\\"\\\",\\\"urlbtext\\\":\\\"\\\",\\\"targetb\\\":\\\"\\\",\\\"urlc\\\":\\\"\\\",\\\"urlctext\\\":\\\"\\\",\\\"targetc\\\":\\\"\\\"}\",\"attribs\":\"{\\\"show_title\\\":\\\"\\\",\\\"link_titles\\\":\\\"\\\",\\\"show_intro\\\":\\\"0\\\",\\\"show_category\\\":\\\"\\\",\\\"link_category\\\":\\\"\\\",\\\"show_parent_category\\\":\\\"\\\",\\\"link_parent_category\\\":\\\"\\\",\\\"show_author\\\":\\\"\\\",\\\"link_author\\\":\\\"\\\",\\\"show_create_date\\\":\\\"\\\",\\\"show_modify_date\\\":\\\"\\\",\\\"show_publish_date\\\":\\\"\\\",\\\"show_item_navigation\\\":\\\"\\\",\\\"show_icons\\\":\\\"\\\",\\\"show_print_icon\\\":\\\"\\\",\\\"show_email_icon\\\":\\\"\\\",\\\"show_vote\\\":\\\"\\\",\\\"show_hits\\\":\\\"\\\",\\\"show_noauth\\\":\\\"\\\",\\\"alternative_readmore\\\":\\\"\\\",\\\"article_layout\\\":\\\"\\\",\\\"info_block_position\\\":\\\"0\\\"}\",\"version\":1,\"ordering\":null,\"metakey\":\"\",\"metadesc\":\"\",\"access\":\"1\",\"hits\":null,\"metadata\":\"{\\\"robots\\\":\\\"\\\",\\\"author\\\":\\\"\\\",\\\"rights\\\":\\\"\\\",\\\"xreference\\\":\\\"\\\"}\",\"featured\":\"0\",\"language\":\"*\",\"xreference\":null}')
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT `version_id`
FROM `n1wr9_ucm_history`
WHERE `ucm_item_id` = 1 AND `ucm_type_id` = 1 AND `keep_forever` != 1
ORDER BY `save_date` DESC  LIMIT 0, 10
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT *
FROM n1wr9_content
WHERE `id` = '1'
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT `t`.`id`
FROM `n1wr9_tags` AS t 
INNER JOIN `n1wr9_contentitem_tag_map` AS m ON `m`.`tag_id` = `t`.`id` AND `m`.`type_alias` = 'com_content.article' AND `m`.`content_item_id` IN ( 1)
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	UPDATE `n1wr9_content` SET `title`='Getting started with Form2Content Lite',`alias`='getting-started-with-form2content-lite',`introtext`='<!--\nThis is the FORM2CONTENT INTRO TEMPLATE for the BLOG CONTENT TYPE \n\nIt can be found in < root >/media/com_from2content/templates\n\nThe template shows you how you can:\n\n1) Add HTML/CSS for your article\n2) Add F2C Template Parameters (placeholders for your form data)\n3) Use basic SMARTY syntax\n\n-->\n<!--block escaping so SMARTY doesn\'t break on use of {} tags-->\n<style>\n.f2c_intro_image {float:left; padding:5px;}\n</style>\n\n\n<div class=\"f2c article_intro_wrapper\">\n	<!--check to add the read more around the image-->\n    <a href=\"index.php?option=com_content&view=article&id=1:getting-started-with-form2content-lite&catid=2:uncategorised\" target=\"_parent\" title=\"Getting started with Form2Content Lite\">\n    		<img src=\"images/stories/com_form2content/p1/f1/thumbs/2.png\" alt=\"Open Source Design\" title=\"F2C is developed by Open Source Design\" class=\"f2c_intro_image\">\n    	</a>\n    	<p>Thank you for downloading and installing Form2Content LITE. In this demo content and article we hope to help you get started using our Joomla Content Construction Kit.</p>\n</div><!--article intro wrapper-->',`fulltext`='<!--If no article text, NO read more button will generate because the template will be empty! -->\n<!--PLEASE REMEMBER THAT YOU CAN HIDE THE INTRO in your article by using the Joomla article setting => show intro: NO -->\n			<img src=\"images/stories/com_form2content/p1/f1/thumbs/2.png\" alt=\"Open Source Design\" title=\"F2C is developed by Open Source Design\" class=\"f2c_intro_image\" style=\"float:right; padding-left:15px;\">\n	    <div><p><strong>Getting started with Form2Content!</strong></p>\r\n<p>In the below steps we will show you how to create your own Joomla articles via Form2Content.<br /><a href=\"http://documentation.form2content.com/f2c-getting-started/32-getting-started-f2c-step-by-step\">http://documentation.form2content.com/f2c-getting-started/32-getting-started-f2c-step-by-step</a></p>\r\n<h2>What type of articles do you want to create?</h2>\r\n<p>The installed demo <em>content type</em> is an example of a blog. Each time a F2C form is filled out a Joomla article is created. In the content type manager you define permissions, in which category the Joomla article is saved and article settings like show/hide title, intro etc.</p>\r\n<p><a href=\"http://documentation.form2content.com/f2c-content-types\">http://documentation.form2content.com/f2c-content-types</a></p>\r\n<h2>Define the fields to collect the article data</h2>\r\n<p>In the F2C Content Type manager you will find the link to the F2C <em>Fields Manager</em> (cog icon in the second column). In the field manager you define the data you want to collect via a range of different fields. In our <em>blog example</em> we have used single-select list, multiline text field, an editor, image upload etc.</p>\r\n<p><a href=\"http://documentation.form2content.com/f2c-field-types\">http://documentation.form2content.com/f2c-field-types</a></p>\r\n<h2>Define the article template (layout with placeholders)</h2>\r\n<p>Now that we can collect the article data we need to create a template to display this data within the Joomla article. Each created article will look teh same since we use the same layout (template).</p>\r\n<p><strong>The Form2Content rule:</strong> Form fields data + template layout = Joomla article html</p>\r\n<p>Please see our other example article about where the F2C article templates are located and how the placeholders for the data work.</p>\r\n<p><a href=\"http://documentation.form2content.com/f2c-templating\">http://documentation.form2content.com/f2c-templating</a></p>\r\n<h2>When all works in the back-end, create a menu link to the front-end</h2>\r\n<p>When you can create Joomla article via Form2Content in the back-end you can add the front-end access and let your website users add Joomla articles with great ease ... and they all look the same!</p>\r\n<p><a href=\"http://documentation.form2content.com/f2c-front-end\">http://documentation.form2content.com/f2c-front-end</a></p></div>\n    \n        <p><strong>Source:</strong> <a href=\"http://documentation.form2content.com/\" target=\"_blank\" title=\"Form2Content Documentation\">Form2Content Documentation</a></p>\n    \n                        <p><strong>Author:</strong> Patrick Faasse, Julien Brouns - creators of Form2Content Joomla CCK</p>\n                    ',`state`='0',`catid`='2',`created`='2016-04-19 10:00:25',`created_by`='311',`created_by_alias`='',`modified`='0000-00-00 00:00:00',`publish_up`='2016-04-19 10:00:25',`publish_down`='0000-00-00 00:00:00',`images`='{\"image_intro\":\"\",\"float_intro\":\"\",\"image_intro_alt\":\"\",\"image_intro_caption\":\"\",\"image_fulltext\":\"\",\"float_fulltext\":\"\",\"image_fulltext_alt\":\"\",\"image_fulltext_caption\":\"\"}',`urls`='{\"urla\":\"\",\"urlatext\":\"\",\"targeta\":\"\",\"urlb\":\"\",\"urlbtext\":\"\",\"targetb\":\"\",\"urlc\":\"\",\"urlctext\":\"\",\"targetc\":\"\"}',`attribs`='{\"show_title\":\"\",\"link_titles\":\"\",\"show_intro\":\"0\",\"show_category\":\"\",\"link_category\":\"\",\"show_parent_category\":\"\",\"link_parent_category\":\"\",\"show_author\":\"\",\"link_author\":\"\",\"show_create_date\":\"\",\"show_modify_date\":\"\",\"show_publish_date\":\"\",\"show_item_navigation\":\"\",\"show_icons\":\"\",\"show_print_icon\":\"\",\"show_email_icon\":\"\",\"show_vote\":\"\",\"show_hits\":\"\",\"show_noauth\":\"\",\"alternative_readmore\":\"\",\"article_layout\":\"\",\"info_block_position\":\"0\"}',`version`='1',`metakey`='',`metadesc`='',`access`='1',`metadata`='{\"robots\":\"\",\"author\":\"\",\"rights\":\"\",\"xreference\":\"\"}',`featured`='0',`language`='*' WHERE `id`='1'
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT `asset_id`
FROM `n1wr9_categories`
WHERE `id` = 2
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT `id`
FROM `n1wr9_assets`
WHERE `name` = 'com_content.article.1'
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT *
FROM n1wr9_assets
WHERE `id` = '110'
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT COUNT(id)
FROM `n1wr9_assets`
WHERE `id` = 27
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	LOCK TABLES `n1wr9_assets` WRITE
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	UPDATE `n1wr9_assets` SET `name`='com_content.article.1',`title`='Getting started with Form2Content Lite',`rules`='{\"core.admin\":{\"7\":1},\"core.manage\":{\"6\":1},\"core.create\":{\"3\":1},\"core.delete\":[],\"core.edit\":{\"4\":1},\"core.edit.state\":{\"5\":1},\"core.edit.own\":[]}',`parent_id`='27',`level`='3',`lft`='19',`rgt`='20' WHERE `id`='110'
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	UNLOCK TABLES
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT *
FROM n1wr9_content_types
WHERE `type_alias` = 'com_content.article'
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT *
FROM `n1wr9_ucm_history`
WHERE `ucm_item_id` = 1 AND `ucm_type_id` = 1 AND `sha1_hash` = '5e8a1d2044f2a9d524975d5e239dbeaf675dd536' LIMIT 0, 1
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT *
FROM n1wr9_content_types
WHERE `type_id` = '1'
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	INSERT INTO `n1wr9_ucm_history`
(`ucm_item_id`,`ucm_type_id`,`save_date`,`editor_user_id`,`character_count`,`sha1_hash`,`version_data`) VALUES 
('1','1','2016-04-19 10:00:25','311','6030','5e8a1d2044f2a9d524975d5e239dbeaf675dd536','{\"id\":1,\"asset_id\":\"110\",\"title\":\"Getting started with Form2Content Lite\",\"alias\":\"getting-started-with-form2content-lite\",\"introtext\":\"<!--\\nThis is the FORM2CONTENT INTRO TEMPLATE for the BLOG CONTENT TYPE \\n\\nIt can be found in < root >\\/media\\/com_from2content\\/templates\\n\\nThe template shows you how you can:\\n\\n1) Add HTML\\/CSS for your article\\n2) Add F2C Template Parameters (placeholders for your form data)\\n3) Use basic SMARTY syntax\\n\\n-->\\n<!--block escaping so SMARTY doesn\'t break on use of {} tags-->\\n<style>\\n.f2c_intro_image {float:left; padding:5px;}\\n<\\/style>\\n\\n\\n<div class=\\\"f2c article_intro_wrapper\\\">\\n\\t<!--check to add the read more around the image-->\\n    <a href=\\\"index.php?option=com_content&view=article&id=1:getting-started-with-form2content-lite&catid=2:uncategorised\\\" target=\\\"_parent\\\" title=\\\"Getting started with Form2Content Lite\\\">\\n    \\t\\t<img src=\\\"images\\/stories\\/com_form2content\\/p1\\/f1\\/thumbs\\/2.png\\\" alt=\\\"Open Source Design\\\" title=\\\"F2C is developed by Open Source Design\\\" class=\\\"f2c_intro_image\\\">\\n    \\t<\\/a>\\n    \\t<p>Thank you for downloading and installing Form2Content LITE. In this demo content and article we hope to help you get started using our Joomla Content Construction Kit.<\\/p>\\n<\\/div><!--article intro wrapper-->\",\"fulltext\":\"<!--If no article text, NO read more button will generate because the template will be empty! -->\\n<!--PLEASE REMEMBER THAT YOU CAN HIDE THE INTRO in your article by using the Joomla article setting => show intro: NO -->\\n\\t\\t\\t<img src=\\\"images\\/stories\\/com_form2content\\/p1\\/f1\\/thumbs\\/2.png\\\" alt=\\\"Open Source Design\\\" title=\\\"F2C is developed by Open Source Design\\\" class=\\\"f2c_intro_image\\\" style=\\\"float:right; padding-left:15px;\\\">\\n\\t    <div><p><strong>Getting started with Form2Content!<\\/strong><\\/p>\\r\\n<p>In the below steps we will show you how to create your own Joomla articles via Form2Content.<br \\/><a href=\\\"http:\\/\\/documentation.form2content.com\\/f2c-getting-started\\/32-getting-started-f2c-step-by-step\\\">http:\\/\\/documentation.form2content.com\\/f2c-getting-started\\/32-getting-started-f2c-step-by-step<\\/a><\\/p>\\r\\n<h2>What type of articles do you want to create?<\\/h2>\\r\\n<p>The installed demo <em>content type<\\/em> is an example of a blog. Each time a F2C form is filled out a Joomla article is created. In the content type manager you define permissions, in which category the Joomla article is saved and article settings like show\\/hide title, intro etc.<\\/p>\\r\\n<p><a href=\\\"http:\\/\\/documentation.form2content.com\\/f2c-content-types\\\">http:\\/\\/documentation.form2content.com\\/f2c-content-types<\\/a><\\/p>\\r\\n<h2>Define the fields to collect the article data<\\/h2>\\r\\n<p>In the F2C Content Type manager you will find the link to the F2C <em>Fields Manager<\\/em> (cog icon in the second column). In the field manager you define the data you want to collect via a range of different fields. In our <em>blog example<\\/em> we have used single-select list, multiline text field, an editor, image upload etc.<\\/p>\\r\\n<p><a href=\\\"http:\\/\\/documentation.form2content.com\\/f2c-field-types\\\">http:\\/\\/documentation.form2content.com\\/f2c-field-types<\\/a><\\/p>\\r\\n<h2>Define the article template (layout with placeholders)<\\/h2>\\r\\n<p>Now that we can collect the article data we need to create a template to display this data within the Joomla article. Each created article will look teh same since we use the same layout (template).<\\/p>\\r\\n<p><strong>The Form2Content rule:<\\/strong> Form fields data + template layout = Joomla article html<\\/p>\\r\\n<p>Please see our other example article about where the F2C article templates are located and how the placeholders for the data work.<\\/p>\\r\\n<p><a href=\\\"http:\\/\\/documentation.form2content.com\\/f2c-templating\\\">http:\\/\\/documentation.form2content.com\\/f2c-templating<\\/a><\\/p>\\r\\n<h2>When all works in the back-end, create a menu link to the front-end<\\/h2>\\r\\n<p>When you can create Joomla article via Form2Content in the back-end you can add the front-end access and let your website users add Joomla articles with great ease ... and they all look the same!<\\/p>\\r\\n<p><a href=\\\"http:\\/\\/documentation.form2content.com\\/f2c-front-end\\\">http:\\/\\/documentation.form2content.com\\/f2c-front-end<\\/a><\\/p><\\/div>\\n    \\n        <p><strong>Source:<\\/strong> <a href=\\\"http:\\/\\/documentation.form2content.com\\/\\\" target=\\\"_blank\\\" title=\\\"Form2Content Documentation\\\">Form2Content Documentation<\\/a><\\/p>\\n    \\n                        <p><strong>Author:<\\/strong> Patrick Faasse, Julien Brouns - creators of Form2Content Joomla CCK<\\/p>\\n                    \",\"state\":0,\"catid\":\"2\",\"created\":\"2016-04-19 10:00:25\",\"created_by\":\"311\",\"created_by_alias\":\"\",\"modified\":\"0000-00-00 00:00:00\",\"modified_by\":null,\"checked_out\":null,\"checked_out_time\":null,\"publish_up\":\"2016-04-19 10:00:25\",\"publish_down\":\"0000-00-00 00:00:00\",\"images\":\"{\\\"image_intro\\\":\\\"\\\",\\\"float_intro\\\":\\\"\\\",\\\"image_intro_alt\\\":\\\"\\\",\\\"image_intro_caption\\\":\\\"\\\",\\\"image_fulltext\\\":\\\"\\\",\\\"float_fulltext\\\":\\\"\\\",\\\"image_fulltext_alt\\\":\\\"\\\",\\\"image_fulltext_caption\\\":\\\"\\\"}\",\"urls\":\"{\\\"urla\\\":\\\"\\\",\\\"urlatext\\\":\\\"\\\",\\\"targeta\\\":\\\"\\\",\\\"urlb\\\":\\\"\\\",\\\"urlbtext\\\":\\\"\\\",\\\"targetb\\\":\\\"\\\",\\\"urlc\\\":\\\"\\\",\\\"urlctext\\\":\\\"\\\",\\\"targetc\\\":\\\"\\\"}\",\"attribs\":\"{\\\"show_title\\\":\\\"\\\",\\\"link_titles\\\":\\\"\\\",\\\"show_intro\\\":\\\"0\\\",\\\"show_category\\\":\\\"\\\",\\\"link_category\\\":\\\"\\\",\\\"show_parent_category\\\":\\\"\\\",\\\"link_parent_category\\\":\\\"\\\",\\\"show_author\\\":\\\"\\\",\\\"link_author\\\":\\\"\\\",\\\"show_create_date\\\":\\\"\\\",\\\"show_modify_date\\\":\\\"\\\",\\\"show_publish_date\\\":\\\"\\\",\\\"show_item_navigation\\\":\\\"\\\",\\\"show_icons\\\":\\\"\\\",\\\"show_print_icon\\\":\\\"\\\",\\\"show_email_icon\\\":\\\"\\\",\\\"show_vote\\\":\\\"\\\",\\\"show_hits\\\":\\\"\\\",\\\"show_noauth\\\":\\\"\\\",\\\"alternative_readmore\\\":\\\"\\\",\\\"article_layout\\\":\\\"\\\",\\\"info_block_position\\\":\\\"0\\\"}\",\"version\":1,\"ordering\":null,\"metakey\":\"\",\"metadesc\":\"\",\"access\":\"1\",\"hits\":null,\"metadata\":\"{\\\"robots\\\":\\\"\\\",\\\"author\\\":\\\"\\\",\\\"rights\\\":\\\"\\\",\\\"xreference\\\":\\\"\\\"}\",\"featured\":\"0\",\"language\":\"*\",\"xreference\":null}')
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT `version_id`
FROM `n1wr9_ucm_history`
WHERE `ucm_item_id` = 1 AND `ucm_type_id` = 1 AND `keep_forever` != 1
ORDER BY `save_date` DESC  LIMIT 0, 10
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	UPDATE n1wr9_content
SET `checked_out` = 0
	, `checked_out_time` = '0000-00-00 00:00:00'
WHERE `id` = '1'
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SHOW FULL COLUMNS FROM `n1wr9_content_frontpage`
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	DELETE 
FROM n1wr9_content_frontpage
WHERE content_id = 1
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT content_id, ordering
FROM n1wr9_content_frontpage
WHERE ordering >= 0
ORDER BY ordering
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT *
FROM n1wr9_f2c_form
WHERE `id` = '1'
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT `t`.`id`
FROM `n1wr9_tags` AS t 
INNER JOIN `n1wr9_contentitem_tag_map` AS m ON `m`.`tag_id` = `t`.`id` AND `m`.`type_alias` = 'com_content.article' AND `m`.`content_item_id` IN ( 1)
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT *
FROM n1wr9_f2c_form
WHERE `alias` = 'getting-started-with-form2content-lite' AND `catid` = '2'
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT *
FROM n1wr9_content
WHERE `alias` = 'getting-started-with-form2content-lite' AND `catid` = '2'
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	UPDATE `n1wr9_f2c_form` SET `projectid`='1',`title`='Getting started with Form2Content Lite',`alias`='getting-started-with-form2content-lite',`created_by`='311',`created_by_alias`='',`created`='2016-04-19 10:00:25',`modified`='2016-04-19 10:00:25',`metakey`='',`metadesc`='',`catid`='2',`intro_template`='blog_intro_template.tpl',`main_template`='blog_main_template.tpl',`reference_id`='1',`ordering`='0',`publish_up`='2016-04-19 10:00:25',`publish_down`='0000-00-00 00:00:00',`state`='0',`featured`='0',`access`='1',`attribs`='{\"show_title\":\"\",\"link_titles\":\"\",\"show_intro\":\"0\",\"show_category\":\"\",\"link_category\":\"\",\"show_parent_category\":\"\",\"link_parent_category\":\"\",\"show_author\":\"\",\"link_author\":\"\",\"show_create_date\":\"\",\"show_modify_date\":\"\",\"show_publish_date\":\"\",\"show_item_navigation\":\"\",\"show_icons\":\"\",\"show_print_icon\":\"\",\"show_email_icon\":\"\",\"show_vote\":\"\",\"show_hits\":\"\",\"show_noauth\":\"\",\"alternative_readmore\":\"\",\"article_layout\":\"\",\"info_block_position\":\"0\"}',`metadata`='{\"robots\":\"\",\"author\":\"\",\"rights\":\"\",\"xreference\":\"\"}',`language`='*',`extended`='{\"tags\":\"\"}' WHERE `id`='1'
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT asset_id
FROM n1wr9_f2c_project
WHERE id = 1
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT `id`
FROM `n1wr9_assets`
WHERE `name` = 'com_form2content.form.1'
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT *
FROM n1wr9_assets
WHERE `id` = '109'
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT COUNT(id)
FROM `n1wr9_assets`
WHERE `id` = 108
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	LOCK TABLES `n1wr9_assets` WRITE
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	UPDATE `n1wr9_assets` SET `name`='com_form2content.form.1',`title`='Getting started with Form2Content Lite',`rules`='{\"core.delete\":[],\"core.edit\":[],\"core.edit.state\":[]}',`parent_id`='108',`level`='3',`lft`='197',`rgt`='198' WHERE `id`='109'
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	UNLOCK TABLES
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT id
FROM n1wr9_categories
WHERE extension = 'com_content' AND published = 1 LIMIT 0, 1
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT title, alias
FROM `n1wr9_categories`
WHERE id = 2
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT id, ordering
FROM n1wr9_f2c_form
WHERE ordering >= 0 AND catid = 2 AND state >= 0
ORDER BY ordering
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	UPDATE n1wr9_f2c_form
SET ordering = 1
WHERE `id` = '1'
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT *
FROM n1wr9_f2c_form
WHERE `alias` = 'article-templates-the-true-strength-of-form2content' AND `catid` = '2'
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT *
FROM n1wr9_content
WHERE `alias` = 'article-templates-the-true-strength-of-form2content' AND `catid` = '2'
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	INSERT INTO `n1wr9_f2c_form`
(`id`,`projectid`,`title`,`alias`,`created_by`,`created_by_alias`,`created`,`modified`,`metakey`,`metadesc`,`catid`,`intro_template`,`main_template`,`reference_id`,`publish_up`,`publish_down`,`state`,`featured`,`access`,`attribs`,`metadata`,`language`) VALUES 
('0','1','Article templates, the true strength of Form2Content','article-templates-the-true-strength-of-form2content','311','','2016-04-19 10:00:25','0000-00-00 00:00:00','','','2','blog_intro_template.tpl','blog_main_template.tpl','0','2016-04-19 10:00:25','0000-00-00 00:00:00','0','0','1','{\"show_title\":\"\",\"link_titles\":\"\",\"show_intro\":\"0\",\"show_category\":\"\",\"link_category\":\"\",\"show_parent_category\":\"\",\"link_parent_category\":\"\",\"show_author\":\"\",\"link_author\":\"\",\"show_create_date\":\"\",\"show_modify_date\":\"\",\"show_publish_date\":\"\",\"show_item_navigation\":\"\",\"show_icons\":\"\",\"show_print_icon\":\"\",\"show_email_icon\":\"\",\"show_vote\":\"\",\"show_hits\":\"\",\"show_noauth\":\"\",\"alternative_readmore\":\"\",\"article_layout\":\"\",\"info_block_position\":\"0\"}','{\"robots\":\"\",\"author\":\"\",\"rights\":\"\",\"xreference\":\"\"}','*')
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT asset_id
FROM n1wr9_f2c_project
WHERE id = 1
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT `id`
FROM `n1wr9_assets`
WHERE `name` = 'com_form2content.form.2'
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT COUNT(id)
FROM `n1wr9_assets`
WHERE `id` = 108
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	LOCK TABLES `n1wr9_assets` WRITE
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT id, parent_id, level, lft, rgt
FROM n1wr9_assets
WHERE id = 108 LIMIT 0, 1
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	UPDATE n1wr9_assets
SET lft = lft + 2
WHERE lft > 199
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	UPDATE n1wr9_assets
SET rgt = rgt + 2
WHERE rgt >= 199
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	INSERT INTO `n1wr9_assets`
(`name`,`title`,`rules`,`parent_id`,`level`,`lft`,`rgt`) VALUES 
('com_form2content.form.2','Article templates, the true strength of Form2Content','{\"core.delete\":[],\"core.edit\":[],\"core.edit.state\":[]}','108','3','199','200')
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	UNLOCK TABLES
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	UPDATE `n1wr9_f2c_form`
SET asset_id = 111
WHERE `id` = '2'
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	INSERT INTO `n1wr9_f2c_fieldcontent`
(formid, fieldid, attribute, content) VALUES 
(2,1,'VALUE','With a content construction kit there is always a small learning curve. Hopefully our BLOG demo will help you understand the relation between the Form2Contnet submission form (data) and the creation of your Joomla article quickly.')
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	INSERT INTO `n1wr9_f2c_fieldcontent`
(formid, fieldid, attribute, content) VALUES 
(2,2,'VALUE','{\"filename\":\"2.png\",\"width\":700,\"height\":360,\"widthThumbnail\":150,\"heightThumbnail\":78,\"alt\":\"Open Source Design\",\"title\":\"F2C is developed by Open Source Design\"}')
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	INSERT INTO `n1wr9_f2c_fieldcontent`
(formid, fieldid, attribute, content) VALUES 
(2,3,'VALUE','{\"url\":\"http:\\/\\/documentation.form2content.com\\/f2c-templating\",\"display\":\"F2C Documentatation on article templates\",\"title\":\"F2C Documentatation\",\"target\":\"_blank\"}')
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	INSERT INTO `n1wr9_f2c_fieldcontent`
(formid, fieldid, attribute, content) VALUES 
(2,4,'VALUE','custom')
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	INSERT INTO `n1wr9_f2c_fieldcontent`
(formid, fieldid, attribute, content) VALUES 
(2,5,'VALUE','Patrick Faasse, Julien Brouns - creators of Form2Content Joomla CCK')
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	INSERT INTO `n1wr9_f2c_fieldcontent`
(formid, fieldid, attribute, content) VALUES 
(2,7,'VALUE','<p>In the Joomla back-end under components you can find the link to Form2Content. One of the links is to the Form2Content Template manager.</p>\r\n<p>The F2C article templates are used to render the form data into the layout of your Joomla article. Probably the easiest way to understand this is to have a look at the two files we have included to generate the BLOG demo articles.<br />The two files can be seen in the F2C Template Manager or via FTP:</p>\r\n<p>&lt; root &gt;/media/com_form2content/templates</p>\r\n<p>blog_intro_template.tpl<br />blog_main_template.tpl</p>\r\n<p><strong>Use of Smarty Templating and Template parameters (placeholders)</strong></p>\r\n<p>In the two F2C article templates included we have added extra documentation to show what you can do with them. This will hopefully get you to grips with the syntax quickly!</p>\r\n<p><a href=\"http://documentation.form2content.com/f2c-templating\" target=\"_blank\">PLEASE read all the documentation on Form2Content templating here!</a></p>\r\n<p> </p>\r\n<p> </p>')
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT *
FROM n1wr9_f2c_form
WHERE `id` = '2'
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT title, alias
FROM `n1wr9_categories`
WHERE id = 2
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT pf.*,fc.attribute, fc.content, fc.id AS fieldcontentid, IFNULL(fc.formid, 2) as formid,ft.name
FROM n1wr9_f2c_projectfields pf
LEFT JOIN n1wr9_f2c_fieldcontent fc ON fc.fieldid = pf.id AND fc.formid = 2
INNER JOIN n1wr9_f2c_fieldtype ft ON pf.fieldtypeid = ft.id
WHERE pf.projectid = 1
ORDER BY pf.ordering, pf.fieldtypeid, fc.id
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT *
FROM n1wr9_f2c_form
WHERE `id` = '2'
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT title, alias
FROM `n1wr9_categories`
WHERE id = 2
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT pf.*,fc.attribute, fc.content, fc.id AS fieldcontentid, IFNULL(fc.formid, 2) as formid,ft.name
FROM n1wr9_f2c_projectfields pf
LEFT JOIN n1wr9_f2c_fieldcontent fc ON fc.fieldid = pf.id AND fc.formid = 2
INNER JOIN n1wr9_f2c_fieldtype ft ON pf.fieldtypeid = ft.id
WHERE pf.projectid = 1
ORDER BY pf.ordering, pf.fieldtypeid, fc.id
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT count(*)
FROM `n1wr9_content`
WHERE id=0
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT *
FROM n1wr9_f2c_project
WHERE `id` = '1'
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT pf.*, ft.name
FROM n1wr9_f2c_projectfields pf
INNER JOIN n1wr9_f2c_fieldtype ft ON pf.fieldtypeid = ft.id
WHERE pf.projectid = 1
ORDER BY pf.ordering ASC
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT `id`
FROM `n1wr9_assets`
WHERE `name` = 'com_content'
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT a.rules
FROM n1wr9_assets AS a
WHERE (a.id = 8)
GROUP BY a.id, a.rules, a.lft
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	INSERT INTO `n1wr9_content`
(`title`,`alias`,`introtext`,`fulltext`,`state`,`catid`,`created`,`created_by`,`created_by_alias`,`modified`,`publish_up`,`publish_down`,`images`,`urls`,`attribs`,`version`,`metakey`,`metadesc`,`access`,`metadata`,`featured`,`language`) VALUES 
('Article templates, the true strength of Form2Content','article-templates-the-true-strength-of-form2content','<!--\nThis is the FORM2CONTENT INTRO TEMPLATE for the BLOG CONTENT TYPE \n\nIt can be found in < root >/media/com_from2content/templates\n\nThe template shows you how you can:\n\n1) Add HTML/CSS for your article\n2) Add F2C Template Parameters (placeholders for your form data)\n3) Use basic SMARTY syntax\n\n-->\n<!--block escaping so SMARTY doesn\'t break on use of {} tags-->\n<style>\n.f2c_intro_image {float:left; padding:5px;}\n</style>\n\n\n<div class=\"f2c article_intro_wrapper\">\n	<!--check to add the read more around the image-->\n    <a href=\"index.php?option=com_content&view=article&id=0:article-templates-the-true-strength-of-form2content&catid=2:uncategorised\" target=\"_parent\" title=\"Article templates, the true strength of Form2Content\">\n    		<img src=\"images/stories/com_form2content/p1/f2/thumbs/2.png\" alt=\"Open Source Design\" title=\"F2C is developed by Open Source Design\" class=\"f2c_intro_image\">\n    	</a>\n    	<p>With a content construction kit there is always a small learning curve. Hopefully our BLOG demo will help you understand the relation between the Form2Contnet submission form (data) and the creation of your Joomla article quickly.</p>\n</div><!--article intro wrapper-->','<!--If no article text, NO read more button will generate because the template will be empty! -->\n<!--PLEASE REMEMBER THAT YOU CAN HIDE THE INTRO in your article by using the Joomla article setting => show intro: NO -->\n			<img src=\"images/stories/com_form2content/p1/f2/thumbs/2.png\" alt=\"Open Source Design\" title=\"F2C is developed by Open Source Design\" class=\"f2c_intro_image\" style=\"float:right; padding-left:15px;\">\n	    <div><p>In the Joomla back-end under components you can find the link to Form2Content. One of the links is to the Form2Content Template manager.</p>\r\n<p>The F2C article templates are used to render the form data into the layout of your Joomla article. Probably the easiest way to understand this is to have a look at the two files we have included to generate the BLOG demo articles.<br />The two files can be seen in the F2C Template Manager or via FTP:</p>\r\n<p>&lt; root &gt;/media/com_form2content/templates</p>\r\n<p>blog_intro_template.tpl<br />blog_main_template.tpl</p>\r\n<p><strong>Use of Smarty Templating and Template parameters (placeholders)</strong></p>\r\n<p>In the two F2C article templates included we have added extra documentation to show what you can do with them. This will hopefully get you to grips with the syntax quickly!</p>\r\n<p><a href=\"http://documentation.form2content.com/f2c-templating\" target=\"_blank\">PLEASE read all the documentation on Form2Content templating here!</a></p>\r\n<p> </p>\r\n<p> </p></div>\n    \n        <p><strong>Source:</strong> <a href=\"http://documentation.form2content.com/f2c-templating\" target=\"_blank\" title=\"F2C Documentatation\">F2C Documentatation on article templates</a></p>\n    \n                        <p><strong>Author:</strong> Patrick Faasse, Julien Brouns - creators of Form2Content Joomla CCK</p>\n                    ','0','2','2016-04-19 10:00:25','311','','0000-00-00 00:00:00','2016-04-19 10:00:25','0000-00-00 00:00:00','{\"image_intro\":\"\",\"float_intro\":\"\",\"image_intro_alt\":\"\",\"image_intro_caption\":\"\",\"image_fulltext\":\"\",\"float_fulltext\":\"\",\"image_fulltext_alt\":\"\",\"image_fulltext_caption\":\"\"}','{\"urla\":\"\",\"urlatext\":\"\",\"targeta\":\"\",\"urlb\":\"\",\"urlbtext\":\"\",\"targetb\":\"\",\"urlc\":\"\",\"urlctext\":\"\",\"targetc\":\"\"}','{\"show_title\":\"\",\"link_titles\":\"\",\"show_intro\":\"0\",\"show_category\":\"\",\"link_category\":\"\",\"show_parent_category\":\"\",\"link_parent_category\":\"\",\"show_author\":\"\",\"link_author\":\"\",\"show_create_date\":\"\",\"show_modify_date\":\"\",\"show_publish_date\":\"\",\"show_item_navigation\":\"\",\"show_icons\":\"\",\"show_print_icon\":\"\",\"show_email_icon\":\"\",\"show_vote\":\"\",\"show_hits\":\"\",\"show_noauth\":\"\",\"alternative_readmore\":\"\",\"article_layout\":\"\",\"info_block_position\":\"0\"}','1','','','1','{\"robots\":\"\",\"author\":\"\",\"rights\":\"\",\"xreference\":\"\"}','0','*')
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT `asset_id`
FROM `n1wr9_categories`
WHERE `id` = 2
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT `id`
FROM `n1wr9_assets`
WHERE `name` = 'com_content.article.2'
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT COUNT(id)
FROM `n1wr9_assets`
WHERE `id` = 27
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	LOCK TABLES `n1wr9_assets` WRITE
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT id, parent_id, level, lft, rgt
FROM n1wr9_assets
WHERE id = 27 LIMIT 0, 1
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	UPDATE n1wr9_assets
SET lft = lft + 2
WHERE lft > 21
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	UPDATE n1wr9_assets
SET rgt = rgt + 2
WHERE rgt >= 21
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	INSERT INTO `n1wr9_assets`
(`name`,`title`,`rules`,`parent_id`,`level`,`lft`,`rgt`) VALUES 
('com_content.article.2','Article templates, the true strength of Form2Content','{\"core.admin\":{\"7\":1},\"core.manage\":{\"6\":1},\"core.create\":{\"3\":1},\"core.delete\":[],\"core.edit\":{\"4\":1},\"core.edit.state\":{\"5\":1},\"core.edit.own\":[]}','27','3','21','22')
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	UNLOCK TABLES
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	UPDATE `n1wr9_content`
SET asset_id = 112
WHERE `id` = 2
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT *
FROM n1wr9_content_types
WHERE `type_alias` = 'com_content.article'
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT *
FROM `n1wr9_ucm_history`
WHERE `ucm_item_id` = 2 AND `ucm_type_id` = 1 AND `sha1_hash` = 'b80e8c15a1a8146ca0136d4c746e2400601d21fb' LIMIT 0, 1
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT *
FROM n1wr9_content_types
WHERE `type_id` = '1'
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	INSERT INTO `n1wr9_ucm_history`
(`ucm_item_id`,`ucm_type_id`,`save_date`,`editor_user_id`,`character_count`,`sha1_hash`,`version_data`) VALUES 
('2','1','2016-04-19 10:00:25','311','4711','b80e8c15a1a8146ca0136d4c746e2400601d21fb','{\"id\":2,\"asset_id\":112,\"title\":\"Article templates, the true strength of Form2Content\",\"alias\":\"article-templates-the-true-strength-of-form2content\",\"introtext\":\"<!--\\nThis is the FORM2CONTENT INTRO TEMPLATE for the BLOG CONTENT TYPE \\n\\nIt can be found in < root >\\/media\\/com_from2content\\/templates\\n\\nThe template shows you how you can:\\n\\n1) Add HTML\\/CSS for your article\\n2) Add F2C Template Parameters (placeholders for your form data)\\n3) Use basic SMARTY syntax\\n\\n-->\\n<!--block escaping so SMARTY doesn\'t break on use of {} tags-->\\n<style>\\n.f2c_intro_image {float:left; padding:5px;}\\n<\\/style>\\n\\n\\n<div class=\\\"f2c article_intro_wrapper\\\">\\n\\t<!--check to add the read more around the image-->\\n    <a href=\\\"index.php?option=com_content&view=article&id=0:article-templates-the-true-strength-of-form2content&catid=2:uncategorised\\\" target=\\\"_parent\\\" title=\\\"Article templates, the true strength of Form2Content\\\">\\n    \\t\\t<img src=\\\"images\\/stories\\/com_form2content\\/p1\\/f2\\/thumbs\\/2.png\\\" alt=\\\"Open Source Design\\\" title=\\\"F2C is developed by Open Source Design\\\" class=\\\"f2c_intro_image\\\">\\n    \\t<\\/a>\\n    \\t<p>With a content construction kit there is always a small learning curve. Hopefully our BLOG demo will help you understand the relation between the Form2Contnet submission form (data) and the creation of your Joomla article quickly.<\\/p>\\n<\\/div><!--article intro wrapper-->\",\"fulltext\":\"<!--If no article text, NO read more button will generate because the template will be empty! -->\\n<!--PLEASE REMEMBER THAT YOU CAN HIDE THE INTRO in your article by using the Joomla article setting => show intro: NO -->\\n\\t\\t\\t<img src=\\\"images\\/stories\\/com_form2content\\/p1\\/f2\\/thumbs\\/2.png\\\" alt=\\\"Open Source Design\\\" title=\\\"F2C is developed by Open Source Design\\\" class=\\\"f2c_intro_image\\\" style=\\\"float:right; padding-left:15px;\\\">\\n\\t    <div><p>In the Joomla back-end under components you can find the link to Form2Content. One of the links is to the Form2Content Template manager.<\\/p>\\r\\n<p>The F2C article templates are used to render the form data into the layout of your Joomla article. Probably the easiest way to understand this is to have a look at the two files we have included to generate the BLOG demo articles.<br \\/>The two files can be seen in the F2C Template Manager or via FTP:<\\/p>\\r\\n<p>&lt; root &gt;\\/media\\/com_form2content\\/templates<\\/p>\\r\\n<p>blog_intro_template.tpl<br \\/>blog_main_template.tpl<\\/p>\\r\\n<p><strong>Use of Smarty Templating and Template parameters (placeholders)<\\/strong><\\/p>\\r\\n<p>In the two F2C article templates included we have added extra documentation to show what you can do with them. This will hopefully get you to grips with the syntax quickly!<\\/p>\\r\\n<p><a href=\\\"http:\\/\\/documentation.form2content.com\\/f2c-templating\\\" target=\\\"_blank\\\">PLEASE read all the documentation on Form2Content templating here!<\\/a><\\/p>\\r\\n<p>\\u00a0<\\/p>\\r\\n<p>\\u00a0<\\/p><\\/div>\\n    \\n        <p><strong>Source:<\\/strong> <a href=\\\"http:\\/\\/documentation.form2content.com\\/f2c-templating\\\" target=\\\"_blank\\\" title=\\\"F2C Documentatation\\\">F2C Documentatation on article templates<\\/a><\\/p>\\n    \\n                        <p><strong>Author:<\\/strong> Patrick Faasse, Julien Brouns - creators of Form2Content Joomla CCK<\\/p>\\n                    \",\"state\":0,\"catid\":\"2\",\"created\":\"2016-04-19 10:00:25\",\"created_by\":\"311\",\"created_by_alias\":\"\",\"modified\":\"0000-00-00 00:00:00\",\"modified_by\":null,\"checked_out\":null,\"checked_out_time\":null,\"publish_up\":\"2016-04-19 10:00:25\",\"publish_down\":\"0000-00-00 00:00:00\",\"images\":\"{\\\"image_intro\\\":\\\"\\\",\\\"float_intro\\\":\\\"\\\",\\\"image_intro_alt\\\":\\\"\\\",\\\"image_intro_caption\\\":\\\"\\\",\\\"image_fulltext\\\":\\\"\\\",\\\"float_fulltext\\\":\\\"\\\",\\\"image_fulltext_alt\\\":\\\"\\\",\\\"image_fulltext_caption\\\":\\\"\\\"}\",\"urls\":\"{\\\"urla\\\":\\\"\\\",\\\"urlatext\\\":\\\"\\\",\\\"targeta\\\":\\\"\\\",\\\"urlb\\\":\\\"\\\",\\\"urlbtext\\\":\\\"\\\",\\\"targetb\\\":\\\"\\\",\\\"urlc\\\":\\\"\\\",\\\"urlctext\\\":\\\"\\\",\\\"targetc\\\":\\\"\\\"}\",\"attribs\":\"{\\\"show_title\\\":\\\"\\\",\\\"link_titles\\\":\\\"\\\",\\\"show_intro\\\":\\\"0\\\",\\\"show_category\\\":\\\"\\\",\\\"link_category\\\":\\\"\\\",\\\"show_parent_category\\\":\\\"\\\",\\\"link_parent_category\\\":\\\"\\\",\\\"show_author\\\":\\\"\\\",\\\"link_author\\\":\\\"\\\",\\\"show_create_date\\\":\\\"\\\",\\\"show_modify_date\\\":\\\"\\\",\\\"show_publish_date\\\":\\\"\\\",\\\"show_item_navigation\\\":\\\"\\\",\\\"show_icons\\\":\\\"\\\",\\\"show_print_icon\\\":\\\"\\\",\\\"show_email_icon\\\":\\\"\\\",\\\"show_vote\\\":\\\"\\\",\\\"show_hits\\\":\\\"\\\",\\\"show_noauth\\\":\\\"\\\",\\\"alternative_readmore\\\":\\\"\\\",\\\"article_layout\\\":\\\"\\\",\\\"info_block_position\\\":\\\"0\\\"}\",\"version\":1,\"ordering\":null,\"metakey\":\"\",\"metadesc\":\"\",\"access\":\"1\",\"hits\":null,\"metadata\":\"{\\\"robots\\\":\\\"\\\",\\\"author\\\":\\\"\\\",\\\"rights\\\":\\\"\\\",\\\"xreference\\\":\\\"\\\"}\",\"featured\":\"0\",\"language\":\"*\",\"xreference\":null}')
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT `version_id`
FROM `n1wr9_ucm_history`
WHERE `ucm_item_id` = 2 AND `ucm_type_id` = 1 AND `keep_forever` != 1
ORDER BY `save_date` DESC  LIMIT 0, 10
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT *
FROM n1wr9_content
WHERE `id` = '2'
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT `t`.`id`
FROM `n1wr9_tags` AS t 
INNER JOIN `n1wr9_contentitem_tag_map` AS m ON `m`.`tag_id` = `t`.`id` AND `m`.`type_alias` = 'com_content.article' AND `m`.`content_item_id` IN ( 2)
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	UPDATE `n1wr9_content` SET `title`='Article templates, the true strength of Form2Content',`alias`='article-templates-the-true-strength-of-form2content',`introtext`='<!--\nThis is the FORM2CONTENT INTRO TEMPLATE for the BLOG CONTENT TYPE \n\nIt can be found in < root >/media/com_from2content/templates\n\nThe template shows you how you can:\n\n1) Add HTML/CSS for your article\n2) Add F2C Template Parameters (placeholders for your form data)\n3) Use basic SMARTY syntax\n\n-->\n<!--block escaping so SMARTY doesn\'t break on use of {} tags-->\n<style>\n.f2c_intro_image {float:left; padding:5px;}\n</style>\n\n\n<div class=\"f2c article_intro_wrapper\">\n	<!--check to add the read more around the image-->\n    <a href=\"index.php?option=com_content&view=article&id=2:article-templates-the-true-strength-of-form2content&catid=2:uncategorised\" target=\"_parent\" title=\"Article templates, the true strength of Form2Content\">\n    		<img src=\"images/stories/com_form2content/p1/f2/thumbs/2.png\" alt=\"Open Source Design\" title=\"F2C is developed by Open Source Design\" class=\"f2c_intro_image\">\n    	</a>\n    	<p>With a content construction kit there is always a small learning curve. Hopefully our BLOG demo will help you understand the relation between the Form2Contnet submission form (data) and the creation of your Joomla article quickly.</p>\n</div><!--article intro wrapper-->',`fulltext`='<!--If no article text, NO read more button will generate because the template will be empty! -->\n<!--PLEASE REMEMBER THAT YOU CAN HIDE THE INTRO in your article by using the Joomla article setting => show intro: NO -->\n			<img src=\"images/stories/com_form2content/p1/f2/thumbs/2.png\" alt=\"Open Source Design\" title=\"F2C is developed by Open Source Design\" class=\"f2c_intro_image\" style=\"float:right; padding-left:15px;\">\n	    <div><p>In the Joomla back-end under components you can find the link to Form2Content. One of the links is to the Form2Content Template manager.</p>\r\n<p>The F2C article templates are used to render the form data into the layout of your Joomla article. Probably the easiest way to understand this is to have a look at the two files we have included to generate the BLOG demo articles.<br />The two files can be seen in the F2C Template Manager or via FTP:</p>\r\n<p>&lt; root &gt;/media/com_form2content/templates</p>\r\n<p>blog_intro_template.tpl<br />blog_main_template.tpl</p>\r\n<p><strong>Use of Smarty Templating and Template parameters (placeholders)</strong></p>\r\n<p>In the two F2C article templates included we have added extra documentation to show what you can do with them. This will hopefully get you to grips with the syntax quickly!</p>\r\n<p><a href=\"http://documentation.form2content.com/f2c-templating\" target=\"_blank\">PLEASE read all the documentation on Form2Content templating here!</a></p>\r\n<p> </p>\r\n<p> </p></div>\n    \n        <p><strong>Source:</strong> <a href=\"http://documentation.form2content.com/f2c-templating\" target=\"_blank\" title=\"F2C Documentatation\">F2C Documentatation on article templates</a></p>\n    \n                        <p><strong>Author:</strong> Patrick Faasse, Julien Brouns - creators of Form2Content Joomla CCK</p>\n                    ',`state`='0',`catid`='2',`created`='2016-04-19 10:00:25',`created_by`='311',`created_by_alias`='',`modified`='0000-00-00 00:00:00',`publish_up`='2016-04-19 10:00:25',`publish_down`='0000-00-00 00:00:00',`images`='{\"image_intro\":\"\",\"float_intro\":\"\",\"image_intro_alt\":\"\",\"image_intro_caption\":\"\",\"image_fulltext\":\"\",\"float_fulltext\":\"\",\"image_fulltext_alt\":\"\",\"image_fulltext_caption\":\"\"}',`urls`='{\"urla\":\"\",\"urlatext\":\"\",\"targeta\":\"\",\"urlb\":\"\",\"urlbtext\":\"\",\"targetb\":\"\",\"urlc\":\"\",\"urlctext\":\"\",\"targetc\":\"\"}',`attribs`='{\"show_title\":\"\",\"link_titles\":\"\",\"show_intro\":\"0\",\"show_category\":\"\",\"link_category\":\"\",\"show_parent_category\":\"\",\"link_parent_category\":\"\",\"show_author\":\"\",\"link_author\":\"\",\"show_create_date\":\"\",\"show_modify_date\":\"\",\"show_publish_date\":\"\",\"show_item_navigation\":\"\",\"show_icons\":\"\",\"show_print_icon\":\"\",\"show_email_icon\":\"\",\"show_vote\":\"\",\"show_hits\":\"\",\"show_noauth\":\"\",\"alternative_readmore\":\"\",\"article_layout\":\"\",\"info_block_position\":\"0\"}',`version`='1',`metakey`='',`metadesc`='',`access`='1',`metadata`='{\"robots\":\"\",\"author\":\"\",\"rights\":\"\",\"xreference\":\"\"}',`featured`='0',`language`='*' WHERE `id`='2'
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT `asset_id`
FROM `n1wr9_categories`
WHERE `id` = 2
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT `id`
FROM `n1wr9_assets`
WHERE `name` = 'com_content.article.2'
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT *
FROM n1wr9_assets
WHERE `id` = '112'
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT COUNT(id)
FROM `n1wr9_assets`
WHERE `id` = 27
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	LOCK TABLES `n1wr9_assets` WRITE
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	UPDATE `n1wr9_assets` SET `name`='com_content.article.2',`title`='Article templates, the true strength of Form2Content',`rules`='{\"core.admin\":{\"7\":1},\"core.manage\":{\"6\":1},\"core.create\":{\"3\":1},\"core.delete\":[],\"core.edit\":{\"4\":1},\"core.edit.state\":{\"5\":1},\"core.edit.own\":[]}',`parent_id`='27',`level`='3',`lft`='21',`rgt`='22' WHERE `id`='112'
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	UNLOCK TABLES
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT *
FROM n1wr9_content_types
WHERE `type_alias` = 'com_content.article'
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT *
FROM `n1wr9_ucm_history`
WHERE `ucm_item_id` = 2 AND `ucm_type_id` = 1 AND `sha1_hash` = 'd93eb217e2d36ba248c4d85728a5586b80b96ac5' LIMIT 0, 1
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT *
FROM n1wr9_content_types
WHERE `type_id` = '1'
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	INSERT INTO `n1wr9_ucm_history`
(`ucm_item_id`,`ucm_type_id`,`save_date`,`editor_user_id`,`character_count`,`sha1_hash`,`version_data`) VALUES 
('2','1','2016-04-19 10:00:25','311','4713','d93eb217e2d36ba248c4d85728a5586b80b96ac5','{\"id\":2,\"asset_id\":\"112\",\"title\":\"Article templates, the true strength of Form2Content\",\"alias\":\"article-templates-the-true-strength-of-form2content\",\"introtext\":\"<!--\\nThis is the FORM2CONTENT INTRO TEMPLATE for the BLOG CONTENT TYPE \\n\\nIt can be found in < root >\\/media\\/com_from2content\\/templates\\n\\nThe template shows you how you can:\\n\\n1) Add HTML\\/CSS for your article\\n2) Add F2C Template Parameters (placeholders for your form data)\\n3) Use basic SMARTY syntax\\n\\n-->\\n<!--block escaping so SMARTY doesn\'t break on use of {} tags-->\\n<style>\\n.f2c_intro_image {float:left; padding:5px;}\\n<\\/style>\\n\\n\\n<div class=\\\"f2c article_intro_wrapper\\\">\\n\\t<!--check to add the read more around the image-->\\n    <a href=\\\"index.php?option=com_content&view=article&id=2:article-templates-the-true-strength-of-form2content&catid=2:uncategorised\\\" target=\\\"_parent\\\" title=\\\"Article templates, the true strength of Form2Content\\\">\\n    \\t\\t<img src=\\\"images\\/stories\\/com_form2content\\/p1\\/f2\\/thumbs\\/2.png\\\" alt=\\\"Open Source Design\\\" title=\\\"F2C is developed by Open Source Design\\\" class=\\\"f2c_intro_image\\\">\\n    \\t<\\/a>\\n    \\t<p>With a content construction kit there is always a small learning curve. Hopefully our BLOG demo will help you understand the relation between the Form2Contnet submission form (data) and the creation of your Joomla article quickly.<\\/p>\\n<\\/div><!--article intro wrapper-->\",\"fulltext\":\"<!--If no article text, NO read more button will generate because the template will be empty! -->\\n<!--PLEASE REMEMBER THAT YOU CAN HIDE THE INTRO in your article by using the Joomla article setting => show intro: NO -->\\n\\t\\t\\t<img src=\\\"images\\/stories\\/com_form2content\\/p1\\/f2\\/thumbs\\/2.png\\\" alt=\\\"Open Source Design\\\" title=\\\"F2C is developed by Open Source Design\\\" class=\\\"f2c_intro_image\\\" style=\\\"float:right; padding-left:15px;\\\">\\n\\t    <div><p>In the Joomla back-end under components you can find the link to Form2Content. One of the links is to the Form2Content Template manager.<\\/p>\\r\\n<p>The F2C article templates are used to render the form data into the layout of your Joomla article. Probably the easiest way to understand this is to have a look at the two files we have included to generate the BLOG demo articles.<br \\/>The two files can be seen in the F2C Template Manager or via FTP:<\\/p>\\r\\n<p>&lt; root &gt;\\/media\\/com_form2content\\/templates<\\/p>\\r\\n<p>blog_intro_template.tpl<br \\/>blog_main_template.tpl<\\/p>\\r\\n<p><strong>Use of Smarty Templating and Template parameters (placeholders)<\\/strong><\\/p>\\r\\n<p>In the two F2C article templates included we have added extra documentation to show what you can do with them. This will hopefully get you to grips with the syntax quickly!<\\/p>\\r\\n<p><a href=\\\"http:\\/\\/documentation.form2content.com\\/f2c-templating\\\" target=\\\"_blank\\\">PLEASE read all the documentation on Form2Content templating here!<\\/a><\\/p>\\r\\n<p>\\u00a0<\\/p>\\r\\n<p>\\u00a0<\\/p><\\/div>\\n    \\n        <p><strong>Source:<\\/strong> <a href=\\\"http:\\/\\/documentation.form2content.com\\/f2c-templating\\\" target=\\\"_blank\\\" title=\\\"F2C Documentatation\\\">F2C Documentatation on article templates<\\/a><\\/p>\\n    \\n                        <p><strong>Author:<\\/strong> Patrick Faasse, Julien Brouns - creators of Form2Content Joomla CCK<\\/p>\\n                    \",\"state\":0,\"catid\":\"2\",\"created\":\"2016-04-19 10:00:25\",\"created_by\":\"311\",\"created_by_alias\":\"\",\"modified\":\"0000-00-00 00:00:00\",\"modified_by\":null,\"checked_out\":null,\"checked_out_time\":null,\"publish_up\":\"2016-04-19 10:00:25\",\"publish_down\":\"0000-00-00 00:00:00\",\"images\":\"{\\\"image_intro\\\":\\\"\\\",\\\"float_intro\\\":\\\"\\\",\\\"image_intro_alt\\\":\\\"\\\",\\\"image_intro_caption\\\":\\\"\\\",\\\"image_fulltext\\\":\\\"\\\",\\\"float_fulltext\\\":\\\"\\\",\\\"image_fulltext_alt\\\":\\\"\\\",\\\"image_fulltext_caption\\\":\\\"\\\"}\",\"urls\":\"{\\\"urla\\\":\\\"\\\",\\\"urlatext\\\":\\\"\\\",\\\"targeta\\\":\\\"\\\",\\\"urlb\\\":\\\"\\\",\\\"urlbtext\\\":\\\"\\\",\\\"targetb\\\":\\\"\\\",\\\"urlc\\\":\\\"\\\",\\\"urlctext\\\":\\\"\\\",\\\"targetc\\\":\\\"\\\"}\",\"attribs\":\"{\\\"show_title\\\":\\\"\\\",\\\"link_titles\\\":\\\"\\\",\\\"show_intro\\\":\\\"0\\\",\\\"show_category\\\":\\\"\\\",\\\"link_category\\\":\\\"\\\",\\\"show_parent_category\\\":\\\"\\\",\\\"link_parent_category\\\":\\\"\\\",\\\"show_author\\\":\\\"\\\",\\\"link_author\\\":\\\"\\\",\\\"show_create_date\\\":\\\"\\\",\\\"show_modify_date\\\":\\\"\\\",\\\"show_publish_date\\\":\\\"\\\",\\\"show_item_navigation\\\":\\\"\\\",\\\"show_icons\\\":\\\"\\\",\\\"show_print_icon\\\":\\\"\\\",\\\"show_email_icon\\\":\\\"\\\",\\\"show_vote\\\":\\\"\\\",\\\"show_hits\\\":\\\"\\\",\\\"show_noauth\\\":\\\"\\\",\\\"alternative_readmore\\\":\\\"\\\",\\\"article_layout\\\":\\\"\\\",\\\"info_block_position\\\":\\\"0\\\"}\",\"version\":1,\"ordering\":null,\"metakey\":\"\",\"metadesc\":\"\",\"access\":\"1\",\"hits\":null,\"metadata\":\"{\\\"robots\\\":\\\"\\\",\\\"author\\\":\\\"\\\",\\\"rights\\\":\\\"\\\",\\\"xreference\\\":\\\"\\\"}\",\"featured\":\"0\",\"language\":\"*\",\"xreference\":null}')
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT `version_id`
FROM `n1wr9_ucm_history`
WHERE `ucm_item_id` = 2 AND `ucm_type_id` = 1 AND `keep_forever` != 1
ORDER BY `save_date` DESC  LIMIT 0, 10
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	UPDATE n1wr9_content
SET `checked_out` = 0
	, `checked_out_time` = '0000-00-00 00:00:00'
WHERE `id` = '2'
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	DELETE 
FROM n1wr9_content_frontpage
WHERE content_id = 2
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT content_id, ordering
FROM n1wr9_content_frontpage
WHERE ordering >= 0
ORDER BY ordering
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT *
FROM n1wr9_f2c_form
WHERE `id` = '2'
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT `t`.`id`
FROM `n1wr9_tags` AS t 
INNER JOIN `n1wr9_contentitem_tag_map` AS m ON `m`.`tag_id` = `t`.`id` AND `m`.`type_alias` = 'com_content.article' AND `m`.`content_item_id` IN ( 2)
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT *
FROM n1wr9_f2c_form
WHERE `alias` = 'article-templates-the-true-strength-of-form2content' AND `catid` = '2'
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT *
FROM n1wr9_content
WHERE `alias` = 'article-templates-the-true-strength-of-form2content' AND `catid` = '2'
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	UPDATE `n1wr9_f2c_form` SET `projectid`='1',`title`='Article templates, the true strength of Form2Content',`alias`='article-templates-the-true-strength-of-form2content',`created_by`='311',`created_by_alias`='',`created`='2016-04-19 10:00:25',`modified`='2016-04-19 10:00:25',`metakey`='',`metadesc`='',`catid`='2',`intro_template`='blog_intro_template.tpl',`main_template`='blog_main_template.tpl',`reference_id`='2',`ordering`='0',`publish_up`='2016-04-19 10:00:25',`publish_down`='0000-00-00 00:00:00',`state`='0',`featured`='0',`access`='1',`attribs`='{\"show_title\":\"\",\"link_titles\":\"\",\"show_intro\":\"0\",\"show_category\":\"\",\"link_category\":\"\",\"show_parent_category\":\"\",\"link_parent_category\":\"\",\"show_author\":\"\",\"link_author\":\"\",\"show_create_date\":\"\",\"show_modify_date\":\"\",\"show_publish_date\":\"\",\"show_item_navigation\":\"\",\"show_icons\":\"\",\"show_print_icon\":\"\",\"show_email_icon\":\"\",\"show_vote\":\"\",\"show_hits\":\"\",\"show_noauth\":\"\",\"alternative_readmore\":\"\",\"article_layout\":\"\",\"info_block_position\":\"0\"}',`metadata`='{\"robots\":\"\",\"author\":\"\",\"rights\":\"\",\"xreference\":\"\"}',`language`='*',`extended`='{\"tags\":\"\"}' WHERE `id`='2'
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT asset_id
FROM n1wr9_f2c_project
WHERE id = 1
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT `id`
FROM `n1wr9_assets`
WHERE `name` = 'com_form2content.form.2'
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT *
FROM n1wr9_assets
WHERE `id` = '111'
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	SELECT COUNT(id)
FROM `n1wr9_assets`
WHERE `id` = 108
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	LOCK TABLES `n1wr9_assets` WRITE
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	UPDATE `n1wr9_assets` SET `name`='com_form2content.form.2',`title`='Article templates, the true strength of Form2Content',`rules`='{\"core.delete\":[],\"core.edit\":[],\"core.edit.state\":[]}',`parent_id`='108',`level`='3',`lft`='201',`rgt`='202' WHERE `id`='111'
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	UNLOCK TABLES
2016-04-19T10:00:25+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-04-19T10:00:25+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-04-19T10:00:25+00:00	WARNING 91.144.174.213	deprecated	JResponse is deprecated.
2016-04-19T10:00:25+00:00	DEBUG 91.144.174.213	databasequery	UPDATE `n1wr9_session`
SET `data` = 'joomla|s:2796:\"TzoyNDoiSm9vbWxhXFJlZ2lzdHJ5XFJlZ2lzdHJ5IjoyOntzOjc6IgAqAGRhdGEiO086ODoic3RkQ2xhc3MiOjE6e3M6OToiX19kZWZhdWx0IjtPOjg6InN0ZENsYXNzIjo1OntzOjc6InNlc3Npb24iO086ODoic3RkQ2xhc3MiOjM6e3M6NzoiY291bnRlciI7aToyMDtzOjU6InRpbWVyIjtPOjg6InN0ZENsYXNzIjozOntzOjU6InN0YXJ0IjtpOjE0NjEwNTkyMzY7czo0OiJsYXN0IjtpOjE0NjEwNjAwMjM7czozOiJub3ciO2k6MTQ2MTA2MDAyNDt9czo1OiJ0b2tlbiI7czozMjoiNzljYzkxYzg3YWNjNmIzMTQ5ZTA5NjZjZTk0NDE3NmEiO31zOjg6InJlZ2lzdHJ5IjtPOjI0OiJKb29tbGFcUmVnaXN0cnlcUmVnaXN0cnkiOjI6e3M6NzoiACoAZGF0YSI7Tzo4OiJzdGRDbGFzcyI6Mzp7czoxMToiYXBwbGljYXRpb24iO086ODoic3RkQ2xhc3MiOjE6e3M6NDoibGFuZyI7czowOiIiO31zOjEzOiJjb21faW5zdGFsbGVyIjtPOjg6InN0ZENsYXNzIjo0OntzOjc6Im1lc3NhZ2UiO3M6MDoiIjtzOjE3OiJleHRlbnNpb25fbWVzc2FnZSI7czowOiIiO3M6MTI6InJlZGlyZWN0X3VybCI7TjtzOjY6Im1hbmFnZSI7Tzo4OiJzdGRDbGFzcyI6NDp7czo2OiJmaWx0ZXIiO086ODoic3RkQ2xhc3MiOjU6e3M6Njoic2VhcmNoIjtzOjA6IiI7czo5OiJjbGllbnRfaWQiO3M6MDoiIjtzOjY6InN0YXR1cyI7czowOiIiO3M6NDoidHlwZSI7czowOiIiO3M6NToiZ3JvdXAiO3M6MDoiIjt9czo4OiJvcmRlcmNvbCI7czo0OiJuYW1lIjtzOjk6Im9yZGVyZGlybiI7czozOiJhc2MiO3M6MTA6ImxpbWl0c3RhcnQiO3M6MToiMCI7fX1zOjY6Imdsb2JhbCI7Tzo4OiJzdGRDbGFzcyI6MTp7czo0OiJsaXN0IjtPOjg6InN0ZENsYXNzIjoxOntzOjU6ImxpbWl0IjtpOjA7fX19czo5OiJzZXBhcmF0b3IiO3M6MToiLiI7fXM6NDoidXNlciI7Tzo1OiJKVXNlciI6Mjg6e3M6OToiACoAaXNSb290IjtiOjE7czoyOiJpZCI7czozOiIzMTEiO3M6NDoibmFtZSI7czoxMDoiU3VwZXIgVXNlciI7czo4OiJ1c2VybmFtZSI7czo1OiJhZG1pbiI7czo1OiJlbWFpbCI7czoyNToid2VibWFzdGVyLndvcmsyQGdtYWlsLmNvbSI7czo4OiJwYXNzd29yZCI7czo2MDoiJDJ5JDEwJFR2MWxDVE1WN281MnRhTnNIa0FMby5hRmFLbEd4QzU3M0ZZNkIucGl5VWhHZ0Q5blhNMm5xIjtzOjE0OiJwYXNzd29yZF9jbGVhciI7czowOiIiO3M6NToiYmxvY2siO3M6MToiMCI7czo5OiJzZW5kRW1haWwiO3M6MToiMSI7czoxMjoicmVnaXN0ZXJEYXRlIjtzOjE5OiIyMDE2LTA0LTE0IDA5OjE3OjQ3IjtzOjEzOiJsYXN0dmlzaXREYXRlIjtzOjE5OiIyMDE2LTA0LTE4IDEyOjAzOjQyIjtzOjEwOiJhY3RpdmF0aW9uIjtzOjE6IjAiO3M6NjoicGFyYW1zIjtzOjIzOiJ7InVwZGF0ZV9jYWNoZV9saXN0IjoxfSI7czo2OiJncm91cHMiO2E6MTp7aTo4O3M6MToiOCI7fXM6NToiZ3Vlc3QiO2k6MDtzOjEzOiJsYXN0UmVzZXRUaW1lIjtzOjE5OiIwMDAwLTAwLTAwIDAwOjAwOjAwIjtzOjEwOiJyZXNldENvdW50IjtzOjE6IjAiO3M6MTI6InJlcXVpcmVSZXNldCI7czoxOiIwIjtzOjEwOiIAKgBfcGFyYW1zIjtPOjI0OiJKb29tbGFcUmVnaXN0cnlcUmVnaXN0cnkiOjI6e3M6NzoiACoAZGF0YSI7Tzo4OiJzdGRDbGFzcyI6MTp7czoxNzoidXBkYXRlX2NhY2hlX2xpc3QiO2k6MTt9czo5OiJzZXBhcmF0b3IiO3M6MToiLiI7fXM6MTQ6IgAqAF9hdXRoR3JvdXBzIjthOjI6e2k6MDtpOjE7aToxO2k6ODt9czoxNDoiACoAX2F1dGhMZXZlbHMiO2E6NTp7aTowO2k6MTtpOjE7aToxO2k6MjtpOjI7aTozO2k6MztpOjQ7aTo2O31zOjE1OiIAKgBfYXV0aEFjdGlvbnMiO047czoxMjoiACoAX2Vycm9yTXNnIjtOO3M6MTM6IgAqAHVzZXJIZWxwZXIiO086MTg6IkpVc2VyV3JhcHBlckhlbHBlciI6MDp7fXM6MTA6IgAqAF9lcnJvcnMiO2E6MDp7fXM6MzoiYWlkIjtpOjA7czo2OiJvdHBLZXkiO3M6MDoiIjtzOjQ6Im90ZXAiO3M6MDoiIjt9czoxNjoiam9tc29jaWFsX3VzZXJpcCI7czoxNDoiOTEuMTQ0LjE3NC4yMTMiO3M6MTE6ImFwcGxpY2F0aW9uIjtPOjg6InN0ZENsYXNzIjoxOntzOjU6InF1ZXVlIjtOO319fXM6OToic2VwYXJhdG9yIjtzOjE6Ii4iO30=\";'
	, `time` = '1461060025'
WHERE `session_id` = '9gi7pp2j7rojvs8h2rejbo9ps3'
2016-04-19T10:00:36+00:00	DEBUG 91.144.174.213	databasequery	SELECT COUNT(*)
FROM `n1wr9_f2c_form` AS a
LEFT JOIN `n1wr9_content` c ON a.reference_id = c.id
LEFT JOIN `n1wr9_f2c_project` p ON a.projectid = p.id
LEFT JOIN `n1wr9_users` u ON a.created_by = u.id
LEFT JOIN `n1wr9_categories` AS cc ON a.catid = cc.id
LEFT JOIN `n1wr9_languages` AS l ON l.lang_code = a.language
LEFT JOIN n1wr9_viewlevels AS ag ON ag.id = a.access
WHERE (a.state = 0 OR a.state = 1)
2016-04-19T10:00:36+00:00	DEBUG 91.144.174.213	databasequery	SELECT a.*,c.state, c.publish_up as publish_up_c, c.publish_down as publish_down_c,p.title as project_title,u.name as author_name,cc.title AS category_title,l.title AS language_title,ag.title AS access_level
FROM `n1wr9_f2c_form` AS a
LEFT JOIN `n1wr9_content` c ON a.reference_id = c.id
LEFT JOIN `n1wr9_f2c_project` p ON a.projectid = p.id
LEFT JOIN `n1wr9_users` u ON a.created_by = u.id
LEFT JOIN `n1wr9_categories` AS cc ON a.catid = cc.id
LEFT JOIN `n1wr9_languages` AS l ON l.lang_code = a.language
LEFT JOIN n1wr9_viewlevels AS ag ON ag.id = a.access
WHERE (a.state = 0 OR a.state = 1)
ORDER BY a.title asc
2016-04-19T10:00:36+00:00	DEBUG 91.144.174.213	databasequery	SELECT id AS value, title AS text
FROM n1wr9_f2c_project
ORDER BY title
2016-04-19T10:00:36+00:00	DEBUG 91.144.174.213	databasequery	SELECT u.id AS value, u.name AS text
FROM n1wr9_users AS u
INNER JOIN n1wr9_content AS c ON c.created_by = u.id
GROUP BY u.id
ORDER BY u.name
2016-04-19T10:00:36+00:00	DEBUG 91.144.174.213	databasequery	SELECT a.id, a.title, a.level
FROM n1wr9_categories AS a
WHERE a.parent_id > 0 AND extension = 'com_content' AND a.published IN (0,1)
ORDER BY a.lft
2016-04-19T10:00:37+00:00	DEBUG 91.144.174.213	databasequery	SELECT a.id AS value, a.title AS text
FROM `n1wr9_viewlevels` AS a
GROUP BY a.id, a.title, a.ordering
ORDER BY a.ordering ASC
2016-04-19T10:00:37+00:00	DEBUG 91.144.174.213	databasequery	SELECT a.lang_code AS value, a.title AS text, a.title_native
FROM n1wr9_languages AS a
WHERE a.published >= 0
ORDER BY a.title
2016-04-19T10:00:37+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-04-19T10:00:37+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-04-19T10:00:37+00:00	DEBUG 91.144.174.213	databasequery	SELECT a.id, a.title, a.level, a.parent_id
FROM n1wr9_tags AS a
WHERE a.parent_id > 0 AND a.published IN (1)
ORDER BY a.lft
2016-04-19T10:00:37+00:00	WARNING 91.144.174.213	deprecated	JFile::getName is deprecated. Use native basename() syntax.
2016-04-19T10:00:37+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-04-19T10:00:37+00:00	DEBUG 91.144.174.213	databasequery	SELECT m.id, m.title, m.module, m.position, m.content, m.showtitle, m.params, mm.menuid
FROM n1wr9_modules AS m
LEFT JOIN n1wr9_modules_menu AS mm ON mm.moduleid = m.id
LEFT JOIN n1wr9_extensions AS e ON e.element = m.module AND e.client_id = m.client_id
WHERE m.published = 1 AND e.enabled = 1 AND (m.publish_up = '0000-00-00 00:00:00' OR m.publish_up <= '2016-04-19 10:00:37') AND (m.publish_down = '0000-00-00 00:00:00' OR m.publish_down >= '2016-04-19 10:00:37') AND m.access IN (1,1,2,3,6) AND m.client_id = 1 AND (mm.menuid = 0 OR mm.menuid <= 0)
ORDER BY m.position, m.ordering
2016-04-19T10:00:37+00:00	WARNING 91.144.174.213	deprecated	JSubMenuHelper::getEntries() is deprecated. Use JHtmlSidebar::getEntries() instead.
2016-04-19T10:00:37+00:00	WARNING 91.144.174.213	deprecated	JSubMenuHelper::getFilters() is deprecated. Use JHtmlSidebar::getFilters() instead.
2016-04-19T10:00:37+00:00	WARNING 91.144.174.213	deprecated	JSubMenuHelper::getAction() is deprecated. Use JHtmlSidebar::getAction() instead.
2016-04-19T10:00:37+00:00	DEBUG 91.144.174.213	databasequery	SELECT COUNT(*)
FROM n1wr9_messages
WHERE state = 0 AND user_id_to = 311
2016-04-19T10:00:37+00:00	DEBUG 91.144.174.213	databasequery	SELECT COUNT(session_id)
FROM n1wr9_session
WHERE guest = 0 AND client_id = 1
2016-04-19T10:00:37+00:00	DEBUG 91.144.174.213	databasequery	SELECT COUNT(session_id)
FROM n1wr9_session
WHERE guest = 0 AND client_id = 0
2016-04-19T10:00:37+00:00	DEBUG 91.144.174.213	databasequery	SELECT a.*, SUM(b.home) AS home,b.language,l.image,l.sef,l.title_native
FROM n1wr9_menu_types AS a
LEFT JOIN n1wr9_menu AS b ON b.menutype = a.menutype AND b.home != 0
LEFT JOIN n1wr9_languages AS l ON l.lang_code = language
WHERE (b.client_id = 0 OR b.client_id IS NULL)
GROUP BY a.id, a.menutype, a.description, a.title, b.menutype,b.language,l.image,l.sef,l.title_native
2016-04-19T10:00:37+00:00	DEBUG 91.144.174.213	databasequery	SELECT m.id, m.title, m.alias, m.link, m.parent_id, m.img, e.element
FROM n1wr9_menu AS m
LEFT JOIN n1wr9_extensions AS e ON m.component_id = e.extension_id
WHERE m.client_id = 1 AND e.enabled = 1 AND m.id > 1
ORDER BY m.lft
2016-04-19T10:00:37+00:00	WARNING 91.144.174.213	deprecated	This method is typehinted to be an array in \Joomla\Utilities\ArrayHelper::toString.
2016-04-19T10:00:37+00:00	WARNING 91.144.174.213	deprecated	JResponse is deprecated.
2016-04-19T10:00:37+00:00	WARNING 91.144.174.213	deprecated	JError::getErrors() is deprecated.
2016-04-19T10:00:37+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-04-19T10:00:37+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-04-19T10:00:37+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-04-19T10:00:37+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-04-19T10:00:37+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-04-19T10:00:37+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-04-19T10:00:37+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-04-19T10:00:37+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-04-19T10:00:37+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-04-19T10:00:37+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-04-19T10:00:37+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-04-19T10:00:37+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-04-19T10:00:37+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-04-19T10:00:37+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-04-19T10:00:37+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-04-19T10:00:37+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-04-19T10:00:37+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-04-19T10:00:37+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-04-19T10:00:37+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-04-19T10:00:37+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-04-22T16:32:45+00:00	DEBUG 91.144.174.213	databasequery	SELECT COUNT(*)
FROM `n1wr9_f2c_project` AS a
LEFT JOIN `n1wr9_users` u ON a.created_by = u.id
2016-04-22T16:32:45+00:00	DEBUG 91.144.174.213	databasequery	SELECT a.*,u.name AS username
FROM `n1wr9_f2c_project` AS a
LEFT JOIN `n1wr9_users` u ON a.created_by = u.id
ORDER BY a.title asc LIMIT 0, 20
2016-04-22T16:32:45+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-04-22T16:32:45+00:00	WARNING 91.144.174.213	deprecated	JFile::getName is deprecated. Use native basename() syntax.
2016-04-22T16:32:45+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-04-22T16:32:45+00:00	DEBUG 91.144.174.213	databasequery	SELECT m.id, m.title, m.module, m.position, m.content, m.showtitle, m.params, mm.menuid
FROM n1wr9_modules AS m
LEFT JOIN n1wr9_modules_menu AS mm ON mm.moduleid = m.id
LEFT JOIN n1wr9_extensions AS e ON e.element = m.module AND e.client_id = m.client_id
WHERE m.published = 1 AND e.enabled = 1 AND (m.publish_up = '0000-00-00 00:00:00' OR m.publish_up <= '2016-04-22 16:32:45') AND (m.publish_down = '0000-00-00 00:00:00' OR m.publish_down >= '2016-04-22 16:32:45') AND m.access IN (1,1,2,3,6) AND m.client_id = 1 AND (mm.menuid = 0 OR mm.menuid <= 0)
ORDER BY m.position, m.ordering
2016-04-22T16:32:45+00:00	WARNING 91.144.174.213	deprecated	JSubMenuHelper::getEntries() is deprecated. Use JHtmlSidebar::getEntries() instead.
2016-04-22T16:32:45+00:00	WARNING 91.144.174.213	deprecated	JSubMenuHelper::getFilters() is deprecated. Use JHtmlSidebar::getFilters() instead.
2016-04-22T16:32:45+00:00	WARNING 91.144.174.213	deprecated	JSubMenuHelper::getAction() is deprecated. Use JHtmlSidebar::getAction() instead.
2016-04-22T16:32:45+00:00	DEBUG 91.144.174.213	databasequery	SELECT COUNT(*)
FROM n1wr9_messages
WHERE state = 0 AND user_id_to = 311
2016-04-22T16:32:45+00:00	DEBUG 91.144.174.213	databasequery	SELECT COUNT(session_id)
FROM n1wr9_session
WHERE guest = 0 AND client_id = 1
2016-04-22T16:32:45+00:00	DEBUG 91.144.174.213	databasequery	SELECT COUNT(session_id)
FROM n1wr9_session
WHERE guest = 0 AND client_id = 0
2016-04-22T16:32:45+00:00	DEBUG 91.144.174.213	databasequery	SELECT a.*, SUM(b.home) AS home,b.language,l.image,l.sef,l.title_native
FROM n1wr9_menu_types AS a
LEFT JOIN n1wr9_menu AS b ON b.menutype = a.menutype AND b.home != 0
LEFT JOIN n1wr9_languages AS l ON l.lang_code = language
WHERE (b.client_id = 0 OR b.client_id IS NULL)
GROUP BY a.id, a.menutype, a.description, a.title, b.menutype,b.language,l.image,l.sef,l.title_native
2016-04-22T16:32:45+00:00	DEBUG 91.144.174.213	databasequery	SELECT m.id, m.title, m.alias, m.link, m.parent_id, m.img, e.element
FROM n1wr9_menu AS m
LEFT JOIN n1wr9_extensions AS e ON m.component_id = e.extension_id
WHERE m.client_id = 1 AND e.enabled = 1 AND m.id > 1
ORDER BY m.lft
2016-04-22T16:32:45+00:00	WARNING 91.144.174.213	deprecated	JResponse is deprecated.
2016-04-22T16:32:45+00:00	WARNING 91.144.174.213	deprecated	JError::getErrors() is deprecated.
2016-04-22T16:32:45+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-04-22T16:32:45+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-04-22T16:32:45+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-04-22T16:32:45+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-04-22T16:32:45+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-04-22T16:32:45+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-04-22T16:32:45+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-04-22T16:32:45+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-04-22T16:32:45+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-04-22T16:32:45+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-04-22T16:32:45+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-04-22T16:32:45+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-04-22T16:32:45+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-04-22T16:32:45+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-04-22T16:32:45+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-04-23T14:08:30+00:00	DEBUG 91.144.174.213	databasequery	SELECT COUNT(*)
FROM `n1wr9_f2c_project` AS a
LEFT JOIN `n1wr9_users` u ON a.created_by = u.id
2016-04-23T14:08:30+00:00	DEBUG 91.144.174.213	databasequery	SELECT a.*,u.name AS username
FROM `n1wr9_f2c_project` AS a
LEFT JOIN `n1wr9_users` u ON a.created_by = u.id
ORDER BY a.title asc LIMIT 0, 20
2016-04-23T14:08:30+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-04-23T14:08:30+00:00	WARNING 91.144.174.213	deprecated	JFile::getName is deprecated. Use native basename() syntax.
2016-04-23T14:08:30+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-04-23T14:08:30+00:00	DEBUG 91.144.174.213	databasequery	SELECT m.id, m.title, m.module, m.position, m.content, m.showtitle, m.params, mm.menuid
FROM n1wr9_modules AS m
LEFT JOIN n1wr9_modules_menu AS mm ON mm.moduleid = m.id
LEFT JOIN n1wr9_extensions AS e ON e.element = m.module AND e.client_id = m.client_id
WHERE m.published = 1 AND e.enabled = 1 AND (m.publish_up = '0000-00-00 00:00:00' OR m.publish_up <= '2016-04-23 14:08:30') AND (m.publish_down = '0000-00-00 00:00:00' OR m.publish_down >= '2016-04-23 14:08:30') AND m.access IN (1,1,2,3,6) AND m.client_id = 1 AND (mm.menuid = 0 OR mm.menuid <= 0)
ORDER BY m.position, m.ordering
2016-04-23T14:08:30+00:00	WARNING 91.144.174.213	deprecated	JSubMenuHelper::getEntries() is deprecated. Use JHtmlSidebar::getEntries() instead.
2016-04-23T14:08:30+00:00	WARNING 91.144.174.213	deprecated	JSubMenuHelper::getFilters() is deprecated. Use JHtmlSidebar::getFilters() instead.
2016-04-23T14:08:30+00:00	WARNING 91.144.174.213	deprecated	JSubMenuHelper::getAction() is deprecated. Use JHtmlSidebar::getAction() instead.
2016-04-23T14:08:30+00:00	DEBUG 91.144.174.213	databasequery	SELECT COUNT(*)
FROM n1wr9_messages
WHERE state = 0 AND user_id_to = 311
2016-04-23T14:08:30+00:00	DEBUG 91.144.174.213	databasequery	SELECT COUNT(session_id)
FROM n1wr9_session
WHERE guest = 0 AND client_id = 1
2016-04-23T14:08:30+00:00	DEBUG 91.144.174.213	databasequery	SELECT COUNT(session_id)
FROM n1wr9_session
WHERE guest = 0 AND client_id = 0
2016-04-23T14:08:30+00:00	DEBUG 91.144.174.213	databasequery	SELECT a.*, SUM(b.home) AS home,b.language,l.image,l.sef,l.title_native
FROM n1wr9_menu_types AS a
LEFT JOIN n1wr9_menu AS b ON b.menutype = a.menutype AND b.home != 0
LEFT JOIN n1wr9_languages AS l ON l.lang_code = language
WHERE (b.client_id = 0 OR b.client_id IS NULL)
GROUP BY a.id, a.menutype, a.description, a.title, b.menutype,b.language,l.image,l.sef,l.title_native
2016-04-23T14:08:30+00:00	DEBUG 91.144.174.213	databasequery	SELECT m.id, m.title, m.alias, m.link, m.parent_id, m.img, e.element
FROM n1wr9_menu AS m
LEFT JOIN n1wr9_extensions AS e ON m.component_id = e.extension_id
WHERE m.client_id = 1 AND e.enabled = 1 AND m.id > 1
ORDER BY m.lft
2016-04-23T14:08:30+00:00	WARNING 91.144.174.213	deprecated	JResponse is deprecated.
2016-04-23T14:08:30+00:00	WARNING 91.144.174.213	deprecated	JError::getErrors() is deprecated.
2016-04-23T14:08:30+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-04-23T14:08:30+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-04-23T14:08:30+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-04-23T14:08:30+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-04-23T14:08:30+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-04-23T14:08:30+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-04-23T14:08:30+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-04-23T14:08:30+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-04-23T14:08:30+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-04-23T14:08:30+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-04-23T14:08:30+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-04-23T14:08:30+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-04-23T14:08:30+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-04-23T14:08:30+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:44:05+00:00	DEBUG 91.144.174.213	databasequery	SELECT COUNT(*)
FROM `n1wr9_f2c_project` AS a
LEFT JOIN `n1wr9_users` u ON a.created_by = u.id
2016-05-06T12:44:05+00:00	DEBUG 91.144.174.213	databasequery	SELECT a.*,u.name AS username
FROM `n1wr9_f2c_project` AS a
LEFT JOIN `n1wr9_users` u ON a.created_by = u.id
ORDER BY a.title asc LIMIT 0, 20
2016-05-06T12:44:05+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:44:05+00:00	WARNING 91.144.174.213	deprecated	JFile::getName is deprecated. Use native basename() syntax.
2016-05-06T12:44:05+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:44:05+00:00	DEBUG 91.144.174.213	databasequery	SELECT m.id, m.title, m.module, m.position, m.content, m.showtitle, m.params, mm.menuid
FROM n1wr9_modules AS m
LEFT JOIN n1wr9_modules_menu AS mm ON mm.moduleid = m.id
LEFT JOIN n1wr9_extensions AS e ON e.element = m.module AND e.client_id = m.client_id
WHERE m.published = 1 AND e.enabled = 1 AND (m.publish_up = '0000-00-00 00:00:00' OR m.publish_up <= '2016-05-06 12:44:05') AND (m.publish_down = '0000-00-00 00:00:00' OR m.publish_down >= '2016-05-06 12:44:05') AND m.access IN (1,1,2,3,6) AND m.client_id = 1 AND (mm.menuid = 0 OR mm.menuid <= 0)
ORDER BY m.position, m.ordering
2016-05-06T12:44:05+00:00	WARNING 91.144.174.213	deprecated	JSubMenuHelper::getEntries() is deprecated. Use JHtmlSidebar::getEntries() instead.
2016-05-06T12:44:05+00:00	WARNING 91.144.174.213	deprecated	JSubMenuHelper::getFilters() is deprecated. Use JHtmlSidebar::getFilters() instead.
2016-05-06T12:44:05+00:00	WARNING 91.144.174.213	deprecated	JSubMenuHelper::getAction() is deprecated. Use JHtmlSidebar::getAction() instead.
2016-05-06T12:44:05+00:00	DEBUG 91.144.174.213	databasequery	SELECT COUNT(*)
FROM n1wr9_messages
WHERE state = 0 AND user_id_to = 311
2016-05-06T12:44:05+00:00	DEBUG 91.144.174.213	databasequery	SELECT COUNT(session_id)
FROM n1wr9_session
WHERE guest = 0 AND client_id = 1
2016-05-06T12:44:05+00:00	DEBUG 91.144.174.213	databasequery	SELECT COUNT(session_id)
FROM n1wr9_session
WHERE guest = 0 AND client_id = 0
2016-05-06T12:44:05+00:00	DEBUG 91.144.174.213	databasequery	SELECT a.*, SUM(b.home) AS home,b.language,l.image,l.sef,l.title_native
FROM n1wr9_menu_types AS a
LEFT JOIN n1wr9_menu AS b ON b.menutype = a.menutype AND b.home != 0
LEFT JOIN n1wr9_languages AS l ON l.lang_code = language
WHERE (b.client_id = 0 OR b.client_id IS NULL)
GROUP BY a.id, a.menutype, a.description, a.title, b.menutype,b.language,l.image,l.sef,l.title_native
2016-05-06T12:44:05+00:00	DEBUG 91.144.174.213	databasequery	SELECT m.id, m.title, m.alias, m.link, m.parent_id, m.img, e.element
FROM n1wr9_menu AS m
LEFT JOIN n1wr9_extensions AS e ON m.component_id = e.extension_id
WHERE m.client_id = 1 AND e.enabled = 1 AND m.id > 1
ORDER BY m.lft
2016-05-06T12:44:05+00:00	WARNING 91.144.174.213	deprecated	JResponse is deprecated.
2016-05-06T12:44:05+00:00	WARNING 91.144.174.213	deprecated	JError::getErrors() is deprecated.
2016-05-06T12:44:05+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:44:05+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:44:05+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:44:05+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:44:05+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:44:05+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:44:05+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:44:05+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:44:05+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:44:05+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:44:05+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:44:05+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:44:05+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:44:05+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:45:00+00:00	DEBUG 91.144.174.213	databasequery	SELECT COUNT(*)
FROM `n1wr9_f2c_form` AS a
LEFT JOIN `n1wr9_content` c ON a.reference_id = c.id
LEFT JOIN `n1wr9_f2c_project` p ON a.projectid = p.id
LEFT JOIN `n1wr9_users` u ON a.created_by = u.id
LEFT JOIN `n1wr9_categories` AS cc ON a.catid = cc.id
LEFT JOIN `n1wr9_languages` AS l ON l.lang_code = a.language
LEFT JOIN n1wr9_viewlevels AS ag ON ag.id = a.access
WHERE (a.state = 0 OR a.state = 1)
2016-05-06T12:45:00+00:00	DEBUG 91.144.174.213	databasequery	SELECT a.*,c.state, c.publish_up as publish_up_c, c.publish_down as publish_down_c,p.title as project_title,u.name as author_name,cc.title AS category_title,l.title AS language_title,ag.title AS access_level
FROM `n1wr9_f2c_form` AS a
LEFT JOIN `n1wr9_content` c ON a.reference_id = c.id
LEFT JOIN `n1wr9_f2c_project` p ON a.projectid = p.id
LEFT JOIN `n1wr9_users` u ON a.created_by = u.id
LEFT JOIN `n1wr9_categories` AS cc ON a.catid = cc.id
LEFT JOIN `n1wr9_languages` AS l ON l.lang_code = a.language
LEFT JOIN n1wr9_viewlevels AS ag ON ag.id = a.access
WHERE (a.state = 0 OR a.state = 1)
ORDER BY a.title asc LIMIT 0, 20
2016-05-06T12:45:00+00:00	DEBUG 91.144.174.213	databasequery	SELECT id AS value, title AS text
FROM n1wr9_f2c_project
ORDER BY title
2016-05-06T12:45:00+00:00	DEBUG 91.144.174.213	databasequery	SELECT u.id AS value, u.name AS text
FROM n1wr9_users AS u
INNER JOIN n1wr9_content AS c ON c.created_by = u.id
GROUP BY u.id
ORDER BY u.name
2016-05-06T12:45:00+00:00	DEBUG 91.144.174.213	databasequery	SELECT a.id, a.title, a.level
FROM n1wr9_categories AS a
WHERE a.parent_id > 0 AND extension = 'com_content' AND a.published IN (0,1)
ORDER BY a.lft
2016-05-06T12:45:00+00:00	DEBUG 91.144.174.213	databasequery	SELECT a.id AS value, a.title AS text
FROM `n1wr9_viewlevels` AS a
GROUP BY a.id, a.title, a.ordering
ORDER BY a.ordering ASC
2016-05-06T12:45:00+00:00	DEBUG 91.144.174.213	databasequery	SELECT a.lang_code AS value, a.title AS text, a.title_native
FROM n1wr9_languages AS a
WHERE a.published >= 0
ORDER BY a.title
2016-05-06T12:45:00+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:45:00+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:45:00+00:00	DEBUG 91.144.174.213	databasequery	SELECT a.id, a.title, a.level, a.parent_id
FROM n1wr9_tags AS a
WHERE a.parent_id > 0 AND a.published IN (1)
ORDER BY a.lft
2016-05-06T12:45:00+00:00	WARNING 91.144.174.213	deprecated	JFile::getName is deprecated. Use native basename() syntax.
2016-05-06T12:45:00+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:45:00+00:00	DEBUG 91.144.174.213	databasequery	SELECT m.id, m.title, m.module, m.position, m.content, m.showtitle, m.params, mm.menuid
FROM n1wr9_modules AS m
LEFT JOIN n1wr9_modules_menu AS mm ON mm.moduleid = m.id
LEFT JOIN n1wr9_extensions AS e ON e.element = m.module AND e.client_id = m.client_id
WHERE m.published = 1 AND e.enabled = 1 AND (m.publish_up = '0000-00-00 00:00:00' OR m.publish_up <= '2016-05-06 12:45:00') AND (m.publish_down = '0000-00-00 00:00:00' OR m.publish_down >= '2016-05-06 12:45:00') AND m.access IN (1,1,2,3,6) AND m.client_id = 1 AND (mm.menuid = 0 OR mm.menuid <= 0)
ORDER BY m.position, m.ordering
2016-05-06T12:45:01+00:00	WARNING 91.144.174.213	deprecated	JSubMenuHelper::getEntries() is deprecated. Use JHtmlSidebar::getEntries() instead.
2016-05-06T12:45:01+00:00	WARNING 91.144.174.213	deprecated	JSubMenuHelper::getFilters() is deprecated. Use JHtmlSidebar::getFilters() instead.
2016-05-06T12:45:01+00:00	WARNING 91.144.174.213	deprecated	JSubMenuHelper::getAction() is deprecated. Use JHtmlSidebar::getAction() instead.
2016-05-06T12:45:01+00:00	DEBUG 91.144.174.213	databasequery	SELECT COUNT(*)
FROM n1wr9_messages
WHERE state = 0 AND user_id_to = 311
2016-05-06T12:45:01+00:00	DEBUG 91.144.174.213	databasequery	SELECT COUNT(session_id)
FROM n1wr9_session
WHERE guest = 0 AND client_id = 1
2016-05-06T12:45:01+00:00	DEBUG 91.144.174.213	databasequery	SELECT COUNT(session_id)
FROM n1wr9_session
WHERE guest = 0 AND client_id = 0
2016-05-06T12:45:01+00:00	DEBUG 91.144.174.213	databasequery	SELECT a.*, SUM(b.home) AS home,b.language,l.image,l.sef,l.title_native
FROM n1wr9_menu_types AS a
LEFT JOIN n1wr9_menu AS b ON b.menutype = a.menutype AND b.home != 0
LEFT JOIN n1wr9_languages AS l ON l.lang_code = language
WHERE (b.client_id = 0 OR b.client_id IS NULL)
GROUP BY a.id, a.menutype, a.description, a.title, b.menutype,b.language,l.image,l.sef,l.title_native
2016-05-06T12:45:01+00:00	DEBUG 91.144.174.213	databasequery	SELECT m.id, m.title, m.alias, m.link, m.parent_id, m.img, e.element
FROM n1wr9_menu AS m
LEFT JOIN n1wr9_extensions AS e ON m.component_id = e.extension_id
WHERE m.client_id = 1 AND e.enabled = 1 AND m.id > 1
ORDER BY m.lft
2016-05-06T12:45:01+00:00	WARNING 91.144.174.213	deprecated	This method is typehinted to be an array in \Joomla\Utilities\ArrayHelper::toString.
2016-05-06T12:45:01+00:00	WARNING 91.144.174.213	deprecated	JResponse is deprecated.
2016-05-06T12:45:01+00:00	WARNING 91.144.174.213	deprecated	JError::getErrors() is deprecated.
2016-05-06T12:45:01+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:45:01+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:45:01+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:45:01+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:45:01+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:45:01+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:45:01+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:45:01+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:45:01+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:45:01+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:45:01+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:45:01+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:45:01+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:45:01+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:45:01+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:45:01+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:45:01+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:45:01+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:45:01+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:45:01+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:45:03+00:00	DEBUG 91.144.174.213	databasequery	SHOW FULL COLUMNS FROM `n1wr9_f2c_form`
2016-05-06T12:45:04+00:00	DEBUG 91.144.174.213	databasequery	SELECT *
FROM n1wr9_f2c_form
WHERE `id` = '1'
2016-05-06T12:45:04+00:00	DEBUG 91.144.174.213	databasequery	SELECT *
FROM n1wr9_f2c_form
WHERE `id` = '1'
2016-05-06T12:45:04+00:00	DEBUG 91.144.174.213	databasequery	SELECT title, alias
FROM `n1wr9_categories`
WHERE id = 2
2016-05-06T12:45:04+00:00	DEBUG 91.144.174.213	databasequery	SELECT pf.*,fc.attribute, fc.content, fc.id AS fieldcontentid, IFNULL(fc.formid, 1) as formid,ft.name
FROM n1wr9_f2c_projectfields pf
LEFT JOIN n1wr9_f2c_fieldcontent fc ON fc.fieldid = pf.id AND fc.formid = 1
INNER JOIN n1wr9_f2c_fieldtype ft ON pf.fieldtypeid = ft.id
WHERE pf.projectid = 1
ORDER BY pf.ordering, pf.fieldtypeid, fc.id
2016-05-06T12:45:04+00:00	DEBUG 91.144.174.213	databasequery	SELECT *
FROM n1wr9_f2c_form
WHERE `id` = '1'
2016-05-06T12:45:04+00:00	DEBUG 91.144.174.213	databasequery	SELECT title, alias
FROM `n1wr9_categories`
WHERE id = 2
2016-05-06T12:45:04+00:00	DEBUG 91.144.174.213	databasequery	SELECT pf.*,fc.attribute, fc.content, fc.id AS fieldcontentid, IFNULL(fc.formid, 1) as formid,ft.name
FROM n1wr9_f2c_projectfields pf
LEFT JOIN n1wr9_f2c_fieldcontent fc ON fc.fieldid = pf.id AND fc.formid = 1
INNER JOIN n1wr9_f2c_fieldtype ft ON pf.fieldtypeid = ft.id
WHERE pf.projectid = 1
ORDER BY pf.ordering, pf.fieldtypeid, fc.id
2016-05-06T12:45:04+00:00	DEBUG 91.144.174.213	databasequery	SHOW FULL COLUMNS FROM `n1wr9_users`
2016-05-06T12:45:04+00:00	DEBUG 91.144.174.213	databasequery	SELECT *
FROM `n1wr9_users`
WHERE `id` = 311
2016-05-06T12:45:04+00:00	DEBUG 91.144.174.213	databasequery	SELECT `g`.`id`,`g`.`title`
FROM `n1wr9_usergroups` AS g
INNER JOIN `n1wr9_user_usergroup_map` AS m ON m.group_id = g.id
WHERE `m`.`user_id` = 311
2016-05-06T12:45:04+00:00	DEBUG 91.144.174.213	databasequery	SHOW FULL COLUMNS FROM `n1wr9_content`
2016-05-06T12:45:04+00:00	DEBUG 91.144.174.213	databasequery	SELECT *
FROM n1wr9_content
WHERE `id` = '1'
2016-05-06T12:45:04+00:00	DEBUG 91.144.174.213	databasequery	SELECT count(*)
FROM `n1wr9_content`
WHERE id=1
2016-05-06T12:45:04+00:00	DEBUG 91.144.174.213	databasequery	SHOW FULL COLUMNS FROM `n1wr9_f2c_project`
2016-05-06T12:45:04+00:00	DEBUG 91.144.174.213	databasequery	SELECT *
FROM n1wr9_f2c_project
WHERE `id` = '1'
2016-05-06T12:45:04+00:00	DEBUG 91.144.174.213	databasequery	SELECT pf.*, ft.name
FROM n1wr9_f2c_projectfields pf
INNER JOIN n1wr9_f2c_fieldtype ft ON pf.fieldtypeid = ft.id
WHERE pf.projectid = 1
ORDER BY pf.ordering ASC
2016-05-06T12:45:04+00:00	DEBUG 91.144.174.213	databasequery	SELECT *
FROM n1wr9_content
WHERE `id` = '1'
2016-05-06T12:45:04+00:00	DEBUG 91.144.174.213	databasequery	SELECT `t`.`id`
FROM `n1wr9_tags` AS t 
INNER JOIN `n1wr9_contentitem_tag_map` AS m ON `m`.`tag_id` = `t`.`id` AND `m`.`type_alias` = 'com_content.article' AND `m`.`content_item_id` IN ( 1)
2016-05-06T12:45:04+00:00	DEBUG 91.144.174.213	databasequery	UPDATE `n1wr9_content` SET `title`='Getting started with Form2Content Lite',`alias`='getting-started-with-form2content-lite',`introtext`='<!--\nThis is the FORM2CONTENT INTRO TEMPLATE for the BLOG CONTENT TYPE \n\nIt can be found in < root >/media/com_from2content/templates\n\nThe template shows you how you can:\n\n1) Add HTML/CSS for your article\n2) Add F2C Template Parameters (placeholders for your form data)\n3) Use basic SMARTY syntax\n\n-->\n<!--block escaping so SMARTY doesn\'t break on use of {} tags-->\n<style>\n.f2c_intro_image {float:left; padding:5px;}\n</style>\n\n\n<div class=\"f2c article_intro_wrapper\">\n	<!--check to add the read more around the image-->\n    <a href=\"index.php?option=com_content&view=article&id=1:getting-started-with-form2content-lite&catid=2:uncategorised\" target=\"_parent\" title=\"Getting started with Form2Content Lite\">\n    		<img src=\"images/stories/com_form2content/p1/f1/thumbs/2.png\" alt=\"Open Source Design\" title=\"F2C is developed by Open Source Design\" class=\"f2c_intro_image\">\n    	</a>\n    	<p>Thank you for downloading and installing Form2Content LITE. In this demo content and article we hope to help you get started using our Joomla Content Construction Kit.</p>\n</div><!--article intro wrapper-->',`fulltext`='<!--If no article text, NO read more button will generate because the template will be empty! -->\n<!--PLEASE REMEMBER THAT YOU CAN HIDE THE INTRO in your article by using the Joomla article setting => show intro: NO -->\n			<img src=\"images/stories/com_form2content/p1/f1/thumbs/2.png\" alt=\"Open Source Design\" title=\"F2C is developed by Open Source Design\" class=\"f2c_intro_image\" style=\"float:right; padding-left:15px;\">\n	    <div><p><strong>Getting started with Form2Content!</strong></p>\r\n<p>In the below steps we will show you how to create your own Joomla articles via Form2Content.<br /><a href=\"http://documentation.form2content.com/f2c-getting-started/32-getting-started-f2c-step-by-step\">http://documentation.form2content.com/f2c-getting-started/32-getting-started-f2c-step-by-step</a></p>\r\n<h2>What type of articles do you want to create?</h2>\r\n<p>The installed demo <em>content type</em> is an example of a blog. Each time a F2C form is filled out a Joomla article is created. In the content type manager you define permissions, in which category the Joomla article is saved and article settings like show/hide title, intro etc.</p>\r\n<p><a href=\"http://documentation.form2content.com/f2c-content-types\">http://documentation.form2content.com/f2c-content-types</a></p>\r\n<h2>Define the fields to collect the article data</h2>\r\n<p>In the F2C Content Type manager you will find the link to the F2C <em>Fields Manager</em> (cog icon in the second column). In the field manager you define the data you want to collect via a range of different fields. In our <em>blog example</em> we have used single-select list, multiline text field, an editor, image upload etc.</p>\r\n<p><a href=\"http://documentation.form2content.com/f2c-field-types\">http://documentation.form2content.com/f2c-field-types</a></p>\r\n<h2>Define the article template (layout with placeholders)</h2>\r\n<p>Now that we can collect the article data we need to create a template to display this data within the Joomla article. Each created article will look teh same since we use the same layout (template).</p>\r\n<p><strong>The Form2Content rule:</strong> Form fields data + template layout = Joomla article html</p>\r\n<p>Please see our other example article about where the F2C article templates are located and how the placeholders for the data work.</p>\r\n<p><a href=\"http://documentation.form2content.com/f2c-templating\">http://documentation.form2content.com/f2c-templating</a></p>\r\n<h2>When all works in the back-end, create a menu link to the front-end</h2>\r\n<p>When you can create Joomla article via Form2Content in the back-end you can add the front-end access and let your website users add Joomla articles with great ease ... and they all look the same!</p>\r\n<p><a href=\"http://documentation.form2content.com/f2c-front-end\">http://documentation.form2content.com/f2c-front-end</a></p></div>\n    \n        <p><strong>Source:</strong> <a href=\"http://documentation.form2content.com/\" target=\"_blank\" title=\"Form2Content Documentation\">Form2Content Documentation</a></p>\n    \n                        <p><strong>Author:</strong> Patrick Faasse, Julien Brouns - creators of Form2Content Joomla CCK</p>\n                    ',`state`='1',`catid`='2',`created`='2016-04-19 10:00:25',`created_by`='311',`created_by_alias`='',`modified`='2016-05-06 12:45:04',`modified_by`='311',`checked_out`='0',`checked_out_time`='0000-00-00 00:00:00',`publish_up`='2016-04-19 10:00:25',`publish_down`='0000-00-00 00:00:00',`images`='{\"image_intro\":\"\",\"float_intro\":\"\",\"image_intro_alt\":\"\",\"image_intro_caption\":\"\",\"image_fulltext\":\"\",\"float_fulltext\":\"\",\"image_fulltext_alt\":\"\",\"image_fulltext_caption\":\"\"}',`urls`='{\"urla\":\"\",\"urlatext\":\"\",\"targeta\":\"\",\"urlb\":\"\",\"urlbtext\":\"\",\"targetb\":\"\",\"urlc\":\"\",\"urlctext\":\"\",\"targetc\":\"\"}',`attribs`='{\"show_title\":\"\",\"link_titles\":\"\",\"show_intro\":\"0\",\"show_category\":\"\",\"link_category\":\"\",\"show_parent_category\":\"\",\"link_parent_category\":\"\",\"show_author\":\"\",\"link_author\":\"\",\"show_create_date\":\"\",\"show_modify_date\":\"\",\"show_publish_date\":\"\",\"show_item_navigation\":\"\",\"show_icons\":\"\",\"show_print_icon\":\"\",\"show_email_icon\":\"\",\"show_vote\":\"\",\"show_hits\":\"\",\"show_noauth\":\"\",\"alternative_readmore\":\"\",\"article_layout\":\"\",\"info_block_position\":\"0\"}',`version`='2',`ordering`='0',`metakey`='',`metadesc`='',`access`='1',`hits`='0',`metadata`='{\"robots\":\"\",\"author\":\"\",\"rights\":\"\",\"xreference\":\"\"}',`featured`='0',`language`='*',`xreference`='' WHERE `id`='1'
2016-05-06T12:45:04+00:00	DEBUG 91.144.174.213	databasequery	SELECT `asset_id`
FROM `n1wr9_categories`
WHERE `id` = 2
2016-05-06T12:45:04+00:00	DEBUG 91.144.174.213	databasequery	SHOW FULL COLUMNS FROM `n1wr9_assets`
2016-05-06T12:45:04+00:00	DEBUG 91.144.174.213	databasequery	SELECT `id`
FROM `n1wr9_assets`
WHERE `name` = 'com_content.article.1'
2016-05-06T12:45:04+00:00	DEBUG 91.144.174.213	databasequery	SELECT *
FROM n1wr9_assets
WHERE `id` = '110'
2016-05-06T12:45:04+00:00	DEBUG 91.144.174.213	databasequery	SELECT COUNT(id)
FROM `n1wr9_assets`
WHERE `id` = 27
2016-05-06T12:45:04+00:00	DEBUG 91.144.174.213	databasequery	LOCK TABLES `n1wr9_assets` WRITE
2016-05-06T12:45:04+00:00	DEBUG 91.144.174.213	databasequery	UPDATE `n1wr9_assets` SET `name`='com_content.article.1',`title`='Getting started with Form2Content Lite',`rules`='{\"core.admin\":{\"7\":1},\"core.manage\":{\"6\":1},\"core.create\":{\"3\":1},\"core.delete\":[],\"core.edit\":{\"4\":1},\"core.edit.state\":{\"5\":1},\"core.edit.own\":[]}',`parent_id`='27',`level`='3',`lft`='19',`rgt`='20' WHERE `id`='110'
2016-05-06T12:45:04+00:00	DEBUG 91.144.174.213	databasequery	UNLOCK TABLES
2016-05-06T12:45:04+00:00	DEBUG 91.144.174.213	databasequery	SHOW FULL COLUMNS FROM `n1wr9_ucm_history`
2016-05-06T12:45:04+00:00	DEBUG 91.144.174.213	databasequery	SHOW FULL COLUMNS FROM `n1wr9_content_types`
2016-05-06T12:45:04+00:00	DEBUG 91.144.174.213	databasequery	SELECT *
FROM n1wr9_content_types
WHERE `type_alias` = 'com_content.article'
2016-05-06T12:45:04+00:00	DEBUG 91.144.174.213	databasequery	SELECT *
FROM `n1wr9_ucm_history`
WHERE `ucm_item_id` = 1 AND `ucm_type_id` = 1 AND `sha1_hash` = 'f67f256f36328599122021bc31d7943376df4855' LIMIT 0, 1
2016-05-06T12:45:04+00:00	DEBUG 91.144.174.213	databasequery	SELECT *
FROM n1wr9_content_types
WHERE `type_id` = '1'
2016-05-06T12:45:04+00:00	DEBUG 91.144.174.213	databasequery	INSERT INTO `n1wr9_ucm_history`
(`ucm_item_id`,`ucm_type_id`,`save_date`,`editor_user_id`,`character_count`,`sha1_hash`,`version_data`) VALUES 
('1','1','2016-05-06 12:45:04','311','6045','f67f256f36328599122021bc31d7943376df4855','{\"id\":\"1\",\"asset_id\":\"110\",\"title\":\"Getting started with Form2Content Lite\",\"alias\":\"getting-started-with-form2content-lite\",\"introtext\":\"<!--\\nThis is the FORM2CONTENT INTRO TEMPLATE for the BLOG CONTENT TYPE \\n\\nIt can be found in < root >\\/media\\/com_from2content\\/templates\\n\\nThe template shows you how you can:\\n\\n1) Add HTML\\/CSS for your article\\n2) Add F2C Template Parameters (placeholders for your form data)\\n3) Use basic SMARTY syntax\\n\\n-->\\n<!--block escaping so SMARTY doesn\'t break on use of {} tags-->\\n<style>\\n.f2c_intro_image {float:left; padding:5px;}\\n<\\/style>\\n\\n\\n<div class=\\\"f2c article_intro_wrapper\\\">\\n\\t<!--check to add the read more around the image-->\\n    <a href=\\\"index.php?option=com_content&view=article&id=1:getting-started-with-form2content-lite&catid=2:uncategorised\\\" target=\\\"_parent\\\" title=\\\"Getting started with Form2Content Lite\\\">\\n    \\t\\t<img src=\\\"images\\/stories\\/com_form2content\\/p1\\/f1\\/thumbs\\/2.png\\\" alt=\\\"Open Source Design\\\" title=\\\"F2C is developed by Open Source Design\\\" class=\\\"f2c_intro_image\\\">\\n    \\t<\\/a>\\n    \\t<p>Thank you for downloading and installing Form2Content LITE. In this demo content and article we hope to help you get started using our Joomla Content Construction Kit.<\\/p>\\n<\\/div><!--article intro wrapper-->\",\"fulltext\":\"<!--If no article text, NO read more button will generate because the template will be empty! -->\\n<!--PLEASE REMEMBER THAT YOU CAN HIDE THE INTRO in your article by using the Joomla article setting => show intro: NO -->\\n\\t\\t\\t<img src=\\\"images\\/stories\\/com_form2content\\/p1\\/f1\\/thumbs\\/2.png\\\" alt=\\\"Open Source Design\\\" title=\\\"F2C is developed by Open Source Design\\\" class=\\\"f2c_intro_image\\\" style=\\\"float:right; padding-left:15px;\\\">\\n\\t    <div><p><strong>Getting started with Form2Content!<\\/strong><\\/p>\\r\\n<p>In the below steps we will show you how to create your own Joomla articles via Form2Content.<br \\/><a href=\\\"http:\\/\\/documentation.form2content.com\\/f2c-getting-started\\/32-getting-started-f2c-step-by-step\\\">http:\\/\\/documentation.form2content.com\\/f2c-getting-started\\/32-getting-started-f2c-step-by-step<\\/a><\\/p>\\r\\n<h2>What type of articles do you want to create?<\\/h2>\\r\\n<p>The installed demo <em>content type<\\/em> is an example of a blog. Each time a F2C form is filled out a Joomla article is created. In the content type manager you define permissions, in which category the Joomla article is saved and article settings like show\\/hide title, intro etc.<\\/p>\\r\\n<p><a href=\\\"http:\\/\\/documentation.form2content.com\\/f2c-content-types\\\">http:\\/\\/documentation.form2content.com\\/f2c-content-types<\\/a><\\/p>\\r\\n<h2>Define the fields to collect the article data<\\/h2>\\r\\n<p>In the F2C Content Type manager you will find the link to the F2C <em>Fields Manager<\\/em> (cog icon in the second column). In the field manager you define the data you want to collect via a range of different fields. In our <em>blog example<\\/em> we have used single-select list, multiline text field, an editor, image upload etc.<\\/p>\\r\\n<p><a href=\\\"http:\\/\\/documentation.form2content.com\\/f2c-field-types\\\">http:\\/\\/documentation.form2content.com\\/f2c-field-types<\\/a><\\/p>\\r\\n<h2>Define the article template (layout with placeholders)<\\/h2>\\r\\n<p>Now that we can collect the article data we need to create a template to display this data within the Joomla article. Each created article will look teh same since we use the same layout (template).<\\/p>\\r\\n<p><strong>The Form2Content rule:<\\/strong> Form fields data + template layout = Joomla article html<\\/p>\\r\\n<p>Please see our other example article about where the F2C article templates are located and how the placeholders for the data work.<\\/p>\\r\\n<p><a href=\\\"http:\\/\\/documentation.form2content.com\\/f2c-templating\\\">http:\\/\\/documentation.form2content.com\\/f2c-templating<\\/a><\\/p>\\r\\n<h2>When all works in the back-end, create a menu link to the front-end<\\/h2>\\r\\n<p>When you can create Joomla article via Form2Content in the back-end you can add the front-end access and let your website users add Joomla articles with great ease ... and they all look the same!<\\/p>\\r\\n<p><a href=\\\"http:\\/\\/documentation.form2content.com\\/f2c-front-end\\\">http:\\/\\/documentation.form2content.com\\/f2c-front-end<\\/a><\\/p><\\/div>\\n    \\n        <p><strong>Source:<\\/strong> <a href=\\\"http:\\/\\/documentation.form2content.com\\/\\\" target=\\\"_blank\\\" title=\\\"Form2Content Documentation\\\">Form2Content Documentation<\\/a><\\/p>\\n    \\n                        <p><strong>Author:<\\/strong> Patrick Faasse, Julien Brouns - creators of Form2Content Joomla CCK<\\/p>\\n                    \",\"state\":1,\"catid\":\"2\",\"created\":\"2016-04-19 10:00:25\",\"created_by\":\"311\",\"created_by_alias\":\"\",\"modified\":\"2016-05-06 12:45:04\",\"modified_by\":\"311\",\"checked_out\":\"0\",\"checked_out_time\":\"0000-00-00 00:00:00\",\"publish_up\":\"2016-04-19 10:00:25\",\"publish_down\":\"0000-00-00 00:00:00\",\"images\":\"{\\\"image_intro\\\":\\\"\\\",\\\"float_intro\\\":\\\"\\\",\\\"image_intro_alt\\\":\\\"\\\",\\\"image_intro_caption\\\":\\\"\\\",\\\"image_fulltext\\\":\\\"\\\",\\\"float_fulltext\\\":\\\"\\\",\\\"image_fulltext_alt\\\":\\\"\\\",\\\"image_fulltext_caption\\\":\\\"\\\"}\",\"urls\":\"{\\\"urla\\\":\\\"\\\",\\\"urlatext\\\":\\\"\\\",\\\"targeta\\\":\\\"\\\",\\\"urlb\\\":\\\"\\\",\\\"urlbtext\\\":\\\"\\\",\\\"targetb\\\":\\\"\\\",\\\"urlc\\\":\\\"\\\",\\\"urlctext\\\":\\\"\\\",\\\"targetc\\\":\\\"\\\"}\",\"attribs\":\"{\\\"show_title\\\":\\\"\\\",\\\"link_titles\\\":\\\"\\\",\\\"show_intro\\\":\\\"0\\\",\\\"show_category\\\":\\\"\\\",\\\"link_category\\\":\\\"\\\",\\\"show_parent_category\\\":\\\"\\\",\\\"link_parent_category\\\":\\\"\\\",\\\"show_author\\\":\\\"\\\",\\\"link_author\\\":\\\"\\\",\\\"show_create_date\\\":\\\"\\\",\\\"show_modify_date\\\":\\\"\\\",\\\"show_publish_date\\\":\\\"\\\",\\\"show_item_navigation\\\":\\\"\\\",\\\"show_icons\\\":\\\"\\\",\\\"show_print_icon\\\":\\\"\\\",\\\"show_email_icon\\\":\\\"\\\",\\\"show_vote\\\":\\\"\\\",\\\"show_hits\\\":\\\"\\\",\\\"show_noauth\\\":\\\"\\\",\\\"alternative_readmore\\\":\\\"\\\",\\\"article_layout\\\":\\\"\\\",\\\"info_block_position\\\":\\\"0\\\"}\",\"version\":2,\"ordering\":\"0\",\"metakey\":\"\",\"metadesc\":\"\",\"access\":\"1\",\"hits\":\"0\",\"metadata\":\"{\\\"robots\\\":\\\"\\\",\\\"author\\\":\\\"\\\",\\\"rights\\\":\\\"\\\",\\\"xreference\\\":\\\"\\\"}\",\"featured\":\"0\",\"language\":\"*\",\"xreference\":\"\"}')
2016-05-06T12:45:04+00:00	DEBUG 91.144.174.213	databasequery	SELECT `version_id`
FROM `n1wr9_ucm_history`
WHERE `ucm_item_id` = 1 AND `ucm_type_id` = 1 AND `keep_forever` != 1
ORDER BY `save_date` DESC  LIMIT 0, 10
2016-05-06T12:45:04+00:00	DEBUG 91.144.174.213	databasequery	UPDATE n1wr9_content
SET `checked_out` = 0
	, `checked_out_time` = '0000-00-00 00:00:00'
WHERE `id` = '1'
2016-05-06T12:45:04+00:00	DEBUG 91.144.174.213	databasequery	SHOW FULL COLUMNS FROM `n1wr9_content_frontpage`
2016-05-06T12:45:04+00:00	DEBUG 91.144.174.213	databasequery	DELETE 
FROM n1wr9_content_frontpage
WHERE content_id = 1
2016-05-06T12:45:04+00:00	DEBUG 91.144.174.213	databasequery	SELECT content_id, ordering
FROM n1wr9_content_frontpage
WHERE ordering >= 0
ORDER BY ordering
2016-05-06T12:45:04+00:00	DEBUG 91.144.174.213	databasequery	SELECT *
FROM n1wr9_f2c_form
WHERE `id` = '1'
2016-05-06T12:45:04+00:00	DEBUG 91.144.174.213	databasequery	SELECT `t`.`id`
FROM `n1wr9_tags` AS t 
INNER JOIN `n1wr9_contentitem_tag_map` AS m ON `m`.`tag_id` = `t`.`id` AND `m`.`type_alias` = 'com_content.article' AND `m`.`content_item_id` IN ( 1)
2016-05-06T12:45:04+00:00	DEBUG 91.144.174.213	databasequery	SHOW FULL COLUMNS FROM `n1wr9_content`
2016-05-06T12:45:04+00:00	DEBUG 91.144.174.213	databasequery	SELECT *
FROM n1wr9_f2c_form
WHERE `alias` = 'getting-started-with-form2content-lite' AND `catid` = '2'
2016-05-06T12:45:04+00:00	DEBUG 91.144.174.213	databasequery	SELECT *
FROM n1wr9_content
WHERE `alias` = 'getting-started-with-form2content-lite' AND `catid` = '2'
2016-05-06T12:45:04+00:00	DEBUG 91.144.174.213	databasequery	UPDATE `n1wr9_f2c_form` SET `projectid`='1',`title`='Getting started with Form2Content Lite',`alias`='getting-started-with-form2content-lite',`created_by`='311',`created_by_alias`='',`created`='2016-04-19 10:00:25',`modified`='2016-05-06 12:45:04',`metakey`='',`metadesc`='',`catid`='2',`intro_template`='blog_intro_template.tpl',`main_template`='blog_main_template.tpl',`reference_id`='1',`ordering`='1',`publish_up`='2016-04-19 10:00:25',`publish_down`='0000-00-00 00:00:00',`state`='1',`featured`='0',`access`='1',`attribs`='{\"show_title\":\"\",\"link_titles\":\"\",\"show_intro\":\"0\",\"show_category\":\"\",\"link_category\":\"\",\"show_parent_category\":\"\",\"link_parent_category\":\"\",\"show_author\":\"\",\"link_author\":\"\",\"show_create_date\":\"\",\"show_modify_date\":\"\",\"show_publish_date\":\"\",\"show_item_navigation\":\"\",\"show_icons\":\"\",\"show_print_icon\":\"\",\"show_email_icon\":\"\",\"show_vote\":\"\",\"show_hits\":\"\",\"show_noauth\":\"\",\"alternative_readmore\":\"\",\"article_layout\":\"\",\"info_block_position\":\"0\"}',`metadata`='{\"robots\":\"\",\"author\":\"\",\"rights\":\"\",\"xreference\":\"\"}',`language`='*',`extended`='{\"tags\":\"\"}' WHERE `id`='1'
2016-05-06T12:45:04+00:00	DEBUG 91.144.174.213	databasequery	SELECT asset_id
FROM n1wr9_f2c_project
WHERE id = 1
2016-05-06T12:45:04+00:00	DEBUG 91.144.174.213	databasequery	SELECT `id`
FROM `n1wr9_assets`
WHERE `name` = 'com_form2content.form.1'
2016-05-06T12:45:04+00:00	DEBUG 91.144.174.213	databasequery	SELECT *
FROM n1wr9_assets
WHERE `id` = '109'
2016-05-06T12:45:04+00:00	DEBUG 91.144.174.213	databasequery	SELECT COUNT(id)
FROM `n1wr9_assets`
WHERE `id` = 108
2016-05-06T12:45:04+00:00	DEBUG 91.144.174.213	databasequery	LOCK TABLES `n1wr9_assets` WRITE
2016-05-06T12:45:04+00:00	DEBUG 91.144.174.213	databasequery	UPDATE `n1wr9_assets` SET `name`='com_form2content.form.1',`title`='Getting started with Form2Content Lite',`rules`='{\"core.delete\":[],\"core.edit\":[],\"core.edit.state\":[]}',`parent_id`='108',`level`='3',`lft`='199',`rgt`='200' WHERE `id`='109'
2016-05-06T12:45:04+00:00	DEBUG 91.144.174.213	databasequery	UNLOCK TABLES
2016-05-06T12:45:04+00:00	DEBUG 91.144.174.213	databasequery	SELECT `core_content_id`
FROM `n1wr9_ucm_content`
WHERE `core_type_alias` = 'com_content.article' AND `core_content_item_id` IN (1)
2016-05-06T12:45:04+00:00	DEBUG 91.144.174.213	databasequery	SHOW FULL COLUMNS FROM `n1wr9_ucm_content`
2016-05-06T12:45:04+00:00	DEBUG 91.144.174.213	databasequery	UPDATE `n1wr9_session`
SET `data` = 'joomla|s:2472:\"TzoyNDoiSm9vbWxhXFJlZ2lzdHJ5XFJlZ2lzdHJ5IjoyOntzOjc6IgAqAGRhdGEiO086ODoic3RkQ2xhc3MiOjE6e3M6OToiX19kZWZhdWx0IjtPOjg6InN0ZENsYXNzIjo1OntzOjc6InNlc3Npb24iO086ODoic3RkQ2xhc3MiOjM6e3M6NzoiY291bnRlciI7aTo3O3M6NToidGltZXIiO086ODoic3RkQ2xhc3MiOjM6e3M6NToic3RhcnQiO2k6MTQ2MjUzODYyMjtzOjQ6Imxhc3QiO2k6MTQ2MjUzODcwMDtzOjM6Im5vdyI7aToxNDYyNTM4NzAzO31zOjU6InRva2VuIjtzOjMyOiIwM2NiZTU4YzI0ZTI2MGVhNWUyYWNlMzliOWU1YTBjOCI7fXM6ODoicmVnaXN0cnkiO086MjQ6Ikpvb21sYVxSZWdpc3RyeVxSZWdpc3RyeSI6Mjp7czo3OiIAKgBkYXRhIjtPOjg6InN0ZENsYXNzIjoyOntzOjExOiJhcHBsaWNhdGlvbiI7Tzo4OiJzdGRDbGFzcyI6MTp7czo0OiJsYW5nIjtzOjA6IiI7fXM6MTM6ImNvbV9pbnN0YWxsZXIiO086ODoic3RkQ2xhc3MiOjI6e3M6NzoibWVzc2FnZSI7czowOiIiO3M6MTc6ImV4dGVuc2lvbl9tZXNzYWdlIjtzOjA6IiI7fX1zOjk6InNlcGFyYXRvciI7czoxOiIuIjt9czo0OiJ1c2VyIjtPOjU6IkpVc2VyIjoyODp7czo5OiIAKgBpc1Jvb3QiO2I6MTtzOjI6ImlkIjtzOjM6IjMxMSI7czo0OiJuYW1lIjtzOjEwOiJTdXBlciBVc2VyIjtzOjg6InVzZXJuYW1lIjtzOjU6ImFkbWluIjtzOjU6ImVtYWlsIjtzOjI1OiJ3ZWJtYXN0ZXIud29yazJAZ21haWwuY29tIjtzOjg6InBhc3N3b3JkIjtzOjYwOiIkMnkkMTAkVHYxbENUTVY3bzUydGFOc0hrQUxvLmFGYUtsR3hDNTczRlk2Qi5waXlVaEdnRDluWE0ybnEiO3M6MTQ6InBhc3N3b3JkX2NsZWFyIjtzOjA6IiI7czo1OiJibG9jayI7czoxOiIwIjtzOjk6InNlbmRFbWFpbCI7czoxOiIxIjtzOjEyOiJyZWdpc3RlckRhdGUiO3M6MTk6IjIwMTYtMDQtMTQgMDk6MTc6NDciO3M6MTM6Imxhc3R2aXNpdERhdGUiO3M6MTk6IjIwMTYtMDUtMDUgMDk6MTc6MDQiO3M6MTA6ImFjdGl2YXRpb24iO3M6MToiMCI7czo2OiJwYXJhbXMiO3M6MjM6InsidXBkYXRlX2NhY2hlX2xpc3QiOjF9IjtzOjY6Imdyb3VwcyI7YToxOntpOjg7czoxOiI4Ijt9czo1OiJndWVzdCI7aTowO3M6MTM6Imxhc3RSZXNldFRpbWUiO3M6MTk6IjAwMDAtMDAtMDAgMDA6MDA6MDAiO3M6MTA6InJlc2V0Q291bnQiO3M6MToiMCI7czoxMjoicmVxdWlyZVJlc2V0IjtzOjE6IjAiO3M6MTA6IgAqAF9wYXJhbXMiO086MjQ6Ikpvb21sYVxSZWdpc3RyeVxSZWdpc3RyeSI6Mjp7czo3OiIAKgBkYXRhIjtPOjg6InN0ZENsYXNzIjoxOntzOjE3OiJ1cGRhdGVfY2FjaGVfbGlzdCI7aToxO31zOjk6InNlcGFyYXRvciI7czoxOiIuIjt9czoxNDoiACoAX2F1dGhHcm91cHMiO2E6Mjp7aTowO2k6MTtpOjE7aTo4O31zOjE0OiIAKgBfYXV0aExldmVscyI7YTo1OntpOjA7aToxO2k6MTtpOjE7aToyO2k6MjtpOjM7aTozO2k6NDtpOjY7fXM6MTU6IgAqAF9hdXRoQWN0aW9ucyI7TjtzOjEyOiIAKgBfZXJyb3JNc2ciO047czoxMzoiACoAdXNlckhlbHBlciI7TzoxODoiSlVzZXJXcmFwcGVySGVscGVyIjowOnt9czoxMDoiACoAX2Vycm9ycyI7YTowOnt9czozOiJhaWQiO2k6MDtzOjY6Im90cEtleSI7czowOiIiO3M6NDoib3RlcCI7czowOiIiO31zOjE2OiJqb21zb2NpYWxfdXNlcmlwIjtzOjE0OiI5MS4xNDQuMTc0LjIxMyI7czoxMToiYXBwbGljYXRpb24iO086ODoic3RkQ2xhc3MiOjE6e3M6NToicXVldWUiO2E6MTp7aTowO2E6Mjp7czo3OiJtZXNzYWdlIjtzOjQwOiIxINGB0YLQsNGC0YzRjyDQvtC/0YPQsdC70LjQutC+0LLQsNC90LAuIjtzOjQ6InR5cGUiO3M6NzoibWVzc2FnZSI7fX19fX1zOjk6InNlcGFyYXRvciI7czoxOiIuIjt9\";'
	, `time` = '1462538704'
WHERE `session_id` = '1la0886g2n07g5bov7pg0a3t84'
2016-05-06T12:45:04+00:00	DEBUG 91.144.174.213	databasequery	SELECT COUNT(*)
FROM `n1wr9_f2c_form` AS a
LEFT JOIN `n1wr9_content` c ON a.reference_id = c.id
LEFT JOIN `n1wr9_f2c_project` p ON a.projectid = p.id
LEFT JOIN `n1wr9_users` u ON a.created_by = u.id
LEFT JOIN `n1wr9_categories` AS cc ON a.catid = cc.id
LEFT JOIN `n1wr9_languages` AS l ON l.lang_code = a.language
LEFT JOIN n1wr9_viewlevels AS ag ON ag.id = a.access
WHERE (a.state = 0 OR a.state = 1)
2016-05-06T12:45:04+00:00	DEBUG 91.144.174.213	databasequery	SELECT a.*,c.state, c.publish_up as publish_up_c, c.publish_down as publish_down_c,p.title as project_title,u.name as author_name,cc.title AS category_title,l.title AS language_title,ag.title AS access_level
FROM `n1wr9_f2c_form` AS a
LEFT JOIN `n1wr9_content` c ON a.reference_id = c.id
LEFT JOIN `n1wr9_f2c_project` p ON a.projectid = p.id
LEFT JOIN `n1wr9_users` u ON a.created_by = u.id
LEFT JOIN `n1wr9_categories` AS cc ON a.catid = cc.id
LEFT JOIN `n1wr9_languages` AS l ON l.lang_code = a.language
LEFT JOIN n1wr9_viewlevels AS ag ON ag.id = a.access
WHERE (a.state = 0 OR a.state = 1)
ORDER BY a.title asc LIMIT 0, 20
2016-05-06T12:45:04+00:00	DEBUG 91.144.174.213	databasequery	SELECT id AS value, title AS text
FROM n1wr9_f2c_project
ORDER BY title
2016-05-06T12:45:04+00:00	DEBUG 91.144.174.213	databasequery	SELECT u.id AS value, u.name AS text
FROM n1wr9_users AS u
INNER JOIN n1wr9_content AS c ON c.created_by = u.id
GROUP BY u.id
ORDER BY u.name
2016-05-06T12:45:04+00:00	DEBUG 91.144.174.213	databasequery	SELECT a.id, a.title, a.level
FROM n1wr9_categories AS a
WHERE a.parent_id > 0 AND extension = 'com_content' AND a.published IN (0,1)
ORDER BY a.lft
2016-05-06T12:45:04+00:00	DEBUG 91.144.174.213	databasequery	SELECT a.id AS value, a.title AS text
FROM `n1wr9_viewlevels` AS a
GROUP BY a.id, a.title, a.ordering
ORDER BY a.ordering ASC
2016-05-06T12:45:04+00:00	DEBUG 91.144.174.213	databasequery	SELECT a.lang_code AS value, a.title AS text, a.title_native
FROM n1wr9_languages AS a
WHERE a.published >= 0
ORDER BY a.title
2016-05-06T12:45:04+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:45:04+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:45:04+00:00	DEBUG 91.144.174.213	databasequery	SELECT a.id, a.title, a.level, a.parent_id
FROM n1wr9_tags AS a
WHERE a.parent_id > 0 AND a.published IN (1)
ORDER BY a.lft
2016-05-06T12:45:04+00:00	WARNING 91.144.174.213	deprecated	JFile::getName is deprecated. Use native basename() syntax.
2016-05-06T12:45:04+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:45:04+00:00	DEBUG 91.144.174.213	databasequery	SELECT m.id, m.title, m.module, m.position, m.content, m.showtitle, m.params, mm.menuid
FROM n1wr9_modules AS m
LEFT JOIN n1wr9_modules_menu AS mm ON mm.moduleid = m.id
LEFT JOIN n1wr9_extensions AS e ON e.element = m.module AND e.client_id = m.client_id
WHERE m.published = 1 AND e.enabled = 1 AND (m.publish_up = '0000-00-00 00:00:00' OR m.publish_up <= '2016-05-06 12:45:04') AND (m.publish_down = '0000-00-00 00:00:00' OR m.publish_down >= '2016-05-06 12:45:04') AND m.access IN (1,1,2,3,6) AND m.client_id = 1 AND (mm.menuid = 0 OR mm.menuid <= 0)
ORDER BY m.position, m.ordering
2016-05-06T12:45:04+00:00	WARNING 91.144.174.213	deprecated	JSubMenuHelper::getEntries() is deprecated. Use JHtmlSidebar::getEntries() instead.
2016-05-06T12:45:04+00:00	WARNING 91.144.174.213	deprecated	JSubMenuHelper::getFilters() is deprecated. Use JHtmlSidebar::getFilters() instead.
2016-05-06T12:45:04+00:00	WARNING 91.144.174.213	deprecated	JSubMenuHelper::getAction() is deprecated. Use JHtmlSidebar::getAction() instead.
2016-05-06T12:45:04+00:00	DEBUG 91.144.174.213	databasequery	SELECT COUNT(*)
FROM n1wr9_messages
WHERE state = 0 AND user_id_to = 311
2016-05-06T12:45:04+00:00	DEBUG 91.144.174.213	databasequery	SELECT COUNT(session_id)
FROM n1wr9_session
WHERE guest = 0 AND client_id = 1
2016-05-06T12:45:04+00:00	DEBUG 91.144.174.213	databasequery	SELECT COUNT(session_id)
FROM n1wr9_session
WHERE guest = 0 AND client_id = 0
2016-05-06T12:45:04+00:00	DEBUG 91.144.174.213	databasequery	SELECT a.*, SUM(b.home) AS home,b.language,l.image,l.sef,l.title_native
FROM n1wr9_menu_types AS a
LEFT JOIN n1wr9_menu AS b ON b.menutype = a.menutype AND b.home != 0
LEFT JOIN n1wr9_languages AS l ON l.lang_code = language
WHERE (b.client_id = 0 OR b.client_id IS NULL)
GROUP BY a.id, a.menutype, a.description, a.title, b.menutype,b.language,l.image,l.sef,l.title_native
2016-05-06T12:45:04+00:00	DEBUG 91.144.174.213	databasequery	SELECT m.id, m.title, m.alias, m.link, m.parent_id, m.img, e.element
FROM n1wr9_menu AS m
LEFT JOIN n1wr9_extensions AS e ON m.component_id = e.extension_id
WHERE m.client_id = 1 AND e.enabled = 1 AND m.id > 1
ORDER BY m.lft
2016-05-06T12:45:04+00:00	WARNING 91.144.174.213	deprecated	This method is typehinted to be an array in \Joomla\Utilities\ArrayHelper::toString.
2016-05-06T12:45:04+00:00	WARNING 91.144.174.213	deprecated	JResponse is deprecated.
2016-05-06T12:45:04+00:00	WARNING 91.144.174.213	deprecated	JError::getErrors() is deprecated.
2016-05-06T12:45:04+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:45:04+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:45:04+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:45:04+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:45:04+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:45:04+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:45:04+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:45:04+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:45:04+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:45:04+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:45:04+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:45:04+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:45:04+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:45:04+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:45:04+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:45:04+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:45:04+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:45:04+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:45:04+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:45:04+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:45:18+00:00	DEBUG 91.144.174.213	databasequery	SHOW FULL COLUMNS FROM `n1wr9_f2c_form`
2016-05-06T12:45:18+00:00	INFO 91.144.174.213	controller	Holding edit ID com_form2content.edit.form.1 Array (     [0] => 1 ) 
2016-05-06T12:45:18+00:00	DEBUG 91.144.174.213	databasequery	UPDATE `n1wr9_session`
SET `data` = 'joomla|s:2524:\"TzoyNDoiSm9vbWxhXFJlZ2lzdHJ5XFJlZ2lzdHJ5IjoyOntzOjc6IgAqAGRhdGEiO086ODoic3RkQ2xhc3MiOjE6e3M6OToiX19kZWZhdWx0IjtPOjg6InN0ZENsYXNzIjo1OntzOjc6InNlc3Npb24iO086ODoic3RkQ2xhc3MiOjM6e3M6NzoiY291bnRlciI7aTo5O3M6NToidGltZXIiO086ODoic3RkQ2xhc3MiOjM6e3M6NToic3RhcnQiO2k6MTQ2MjUzODYyMjtzOjQ6Imxhc3QiO2k6MTQ2MjUzODcwNDtzOjM6Im5vdyI7aToxNDYyNTM4NzE4O31zOjU6InRva2VuIjtzOjMyOiIwM2NiZTU4YzI0ZTI2MGVhNWUyYWNlMzliOWU1YTBjOCI7fXM6ODoicmVnaXN0cnkiO086MjQ6Ikpvb21sYVxSZWdpc3RyeVxSZWdpc3RyeSI6Mjp7czo3OiIAKgBkYXRhIjtPOjg6InN0ZENsYXNzIjozOntzOjExOiJhcHBsaWNhdGlvbiI7Tzo4OiJzdGRDbGFzcyI6MTp7czo0OiJsYW5nIjtzOjA6IiI7fXM6MTM6ImNvbV9pbnN0YWxsZXIiO086ODoic3RkQ2xhc3MiOjI6e3M6NzoibWVzc2FnZSI7czowOiIiO3M6MTc6ImV4dGVuc2lvbl9tZXNzYWdlIjtzOjA6IiI7fXM6MTY6ImNvbV9mb3JtMmNvbnRlbnQiO086ODoic3RkQ2xhc3MiOjE6e3M6NDoiZWRpdCI7Tzo4OiJzdGRDbGFzcyI6MTp7czo0OiJmb3JtIjtPOjg6InN0ZENsYXNzIjoyOntzOjI6ImlkIjthOjE6e2k6MDtpOjE7fXM6NDoiZGF0YSI7Tjt9fX19czo5OiJzZXBhcmF0b3IiO3M6MToiLiI7fXM6NDoidXNlciI7Tzo1OiJKVXNlciI6Mjg6e3M6OToiACoAaXNSb290IjtiOjE7czoyOiJpZCI7czozOiIzMTEiO3M6NDoibmFtZSI7czoxMDoiU3VwZXIgVXNlciI7czo4OiJ1c2VybmFtZSI7czo1OiJhZG1pbiI7czo1OiJlbWFpbCI7czoyNToid2VibWFzdGVyLndvcmsyQGdtYWlsLmNvbSI7czo4OiJwYXNzd29yZCI7czo2MDoiJDJ5JDEwJFR2MWxDVE1WN281MnRhTnNIa0FMby5hRmFLbEd4QzU3M0ZZNkIucGl5VWhHZ0Q5blhNMm5xIjtzOjE0OiJwYXNzd29yZF9jbGVhciI7czowOiIiO3M6NToiYmxvY2siO3M6MToiMCI7czo5OiJzZW5kRW1haWwiO3M6MToiMSI7czoxMjoicmVnaXN0ZXJEYXRlIjtzOjE5OiIyMDE2LTA0LTE0IDA5OjE3OjQ3IjtzOjEzOiJsYXN0dmlzaXREYXRlIjtzOjE5OiIyMDE2LTA1LTA1IDA5OjE3OjA0IjtzOjEwOiJhY3RpdmF0aW9uIjtzOjE6IjAiO3M6NjoicGFyYW1zIjtzOjIzOiJ7InVwZGF0ZV9jYWNoZV9saXN0IjoxfSI7czo2OiJncm91cHMiO2E6MTp7aTo4O3M6MToiOCI7fXM6NToiZ3Vlc3QiO2k6MDtzOjEzOiJsYXN0UmVzZXRUaW1lIjtzOjE5OiIwMDAwLTAwLTAwIDAwOjAwOjAwIjtzOjEwOiJyZXNldENvdW50IjtzOjE6IjAiO3M6MTI6InJlcXVpcmVSZXNldCI7czoxOiIwIjtzOjEwOiIAKgBfcGFyYW1zIjtPOjI0OiJKb29tbGFcUmVnaXN0cnlcUmVnaXN0cnkiOjI6e3M6NzoiACoAZGF0YSI7Tzo4OiJzdGRDbGFzcyI6MTp7czoxNzoidXBkYXRlX2NhY2hlX2xpc3QiO2k6MTt9czo5OiJzZXBhcmF0b3IiO3M6MToiLiI7fXM6MTQ6IgAqAF9hdXRoR3JvdXBzIjthOjI6e2k6MDtpOjE7aToxO2k6ODt9czoxNDoiACoAX2F1dGhMZXZlbHMiO2E6NTp7aTowO2k6MTtpOjE7aToxO2k6MjtpOjI7aTozO2k6MztpOjQ7aTo2O31zOjE1OiIAKgBfYXV0aEFjdGlvbnMiO047czoxMjoiACoAX2Vycm9yTXNnIjtOO3M6MTM6IgAqAHVzZXJIZWxwZXIiO086MTg6IkpVc2VyV3JhcHBlckhlbHBlciI6MDp7fXM6MTA6IgAqAF9lcnJvcnMiO2E6MDp7fXM6MzoiYWlkIjtpOjA7czo2OiJvdHBLZXkiO3M6MDoiIjtzOjQ6Im90ZXAiO3M6MDoiIjt9czoxNjoiam9tc29jaWFsX3VzZXJpcCI7czoxNDoiOTEuMTQ0LjE3NC4yMTMiO3M6MTE6ImFwcGxpY2F0aW9uIjtPOjg6InN0ZENsYXNzIjoxOntzOjU6InF1ZXVlIjtOO319fXM6OToic2VwYXJhdG9yIjtzOjE6Ii4iO30=\";'
	, `time` = '1462538718'
WHERE `session_id` = '1la0886g2n07g5bov7pg0a3t84'
2016-05-06T12:45:18+00:00	DEBUG 91.144.174.213	databasequery	SHOW FULL COLUMNS FROM `n1wr9_f2c_form`
2016-05-06T12:45:18+00:00	DEBUG 91.144.174.213	databasequery	SELECT *
FROM n1wr9_f2c_form
WHERE `id` = '1'
2016-05-06T12:45:18+00:00	DEBUG 91.144.174.213	databasequery	SELECT title, alias
FROM `n1wr9_categories`
WHERE id = 2
2016-05-06T12:45:18+00:00	DEBUG 91.144.174.213	databasequery	SELECT pf.*,fc.attribute, fc.content, fc.id AS fieldcontentid, IFNULL(fc.formid, 1) as formid,ft.name
FROM n1wr9_f2c_projectfields pf
LEFT JOIN n1wr9_f2c_fieldcontent fc ON fc.fieldid = pf.id AND fc.formid = 1
INNER JOIN n1wr9_f2c_fieldtype ft ON pf.fieldtypeid = ft.id
WHERE pf.projectid = 1
ORDER BY pf.ordering, pf.fieldtypeid, fc.id
2016-05-06T12:45:18+00:00	DEBUG 91.144.174.213	databasequery	SHOW FULL COLUMNS FROM `n1wr9_f2c_project`
2016-05-06T12:45:18+00:00	DEBUG 91.144.174.213	databasequery	SELECT *
FROM n1wr9_f2c_project
WHERE `id` = '1'
2016-05-06T12:45:18+00:00	DEBUG 91.144.174.213	databasequery	SELECT pf.*, ft.name
FROM n1wr9_f2c_projectfields pf
INNER JOIN n1wr9_f2c_fieldtype ft ON pf.fieldtypeid = ft.id
WHERE pf.projectid = 1
ORDER BY pf.ordering ASC
2016-05-06T12:45:18+00:00	DEBUG 91.144.174.213	databasequery	SELECT *
FROM n1wr9_f2c_form
WHERE `id` = '1'
2016-05-06T12:45:18+00:00	DEBUG 91.144.174.213	databasequery	SELECT title, alias
FROM `n1wr9_categories`
WHERE id = 2
2016-05-06T12:45:18+00:00	DEBUG 91.144.174.213	databasequery	SELECT pf.*,fc.attribute, fc.content, fc.id AS fieldcontentid, IFNULL(fc.formid, 1) as formid,ft.name
FROM n1wr9_f2c_projectfields pf
LEFT JOIN n1wr9_f2c_fieldcontent fc ON fc.fieldid = pf.id AND fc.formid = 1
INNER JOIN n1wr9_f2c_fieldtype ft ON pf.fieldtypeid = ft.id
WHERE pf.projectid = 1
ORDER BY pf.ordering, pf.fieldtypeid, fc.id
2016-05-06T12:45:18+00:00	DEBUG 91.144.174.213	databasequery	SELECT *
FROM n1wr9_content
WHERE id = 1
2016-05-06T12:45:18+00:00	DEBUG 91.144.174.213	databasequery	SELECT pf.*,fc.attribute, fc.content, fc.id AS fieldcontentid, IFNULL(fc.formid, 1) as formid,ft.name
FROM n1wr9_f2c_projectfields pf
LEFT JOIN n1wr9_f2c_fieldcontent fc ON fc.fieldid = pf.id AND fc.formid = 1
INNER JOIN n1wr9_f2c_fieldtype ft ON pf.fieldtypeid = ft.id
WHERE pf.projectid = 1
ORDER BY pf.ordering, pf.fieldtypeid
2016-05-06T12:45:19+00:00	DEBUG 91.144.174.213	databasequery	SELECT *
FROM n1wr9_languages
WHERE published=1
ORDER BY ordering ASC
2016-05-06T12:45:19+00:00	DEBUG 91.144.174.213	databasequery	SELECT template
FROM n1wr9_template_styles
WHERE client_id=0 AND home='1'
2016-05-06T12:45:19+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:45:19+00:00	WARNING 91.144.174.213	deprecated	The use of formvalidation is deprecated use formvalidator instead.
2016-05-06T12:45:19+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:45:19+00:00	DEBUG 91.144.174.213	databasequery	SELECT a.id, a.title, a.level
FROM n1wr9_categories AS a
WHERE a.parent_id > 0 AND extension = 'com_content' AND a.published IN (0,1)
ORDER BY a.lft
2016-05-06T12:45:19+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:45:19+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:45:19+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:45:19+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:45:19+00:00	DEBUG 91.144.174.213	databasequery	SHOW FULL COLUMNS FROM `n1wr9_users`
2016-05-06T12:45:19+00:00	DEBUG 91.144.174.213	databasequery	SELECT *
FROM `n1wr9_users`
WHERE `id` = 311
2016-05-06T12:45:19+00:00	DEBUG 91.144.174.213	databasequery	SELECT `g`.`id`,`g`.`title`
FROM `n1wr9_usergroups` AS g
INNER JOIN `n1wr9_user_usergroup_map` AS m ON m.group_id = g.id
WHERE `m`.`user_id` = 311
2016-05-06T12:45:19+00:00	DEBUG 91.144.174.213	databasequery	SELECT e.element, e.name
FROM n1wr9_extensions as e
WHERE e.client_id = 0 AND e.type = 'template' AND e.enabled = 1
2016-05-06T12:45:19+00:00	WARNING 91.144.174.213	deprecated	JAccess::getActions is deprecated. Use JAccess::getActionsFromFile or JAccess::getActionsFromData instead.
2016-05-06T12:45:19+00:00	DEBUG 91.144.174.213	databasequery	SELECT a.rules
FROM n1wr9_assets AS a
WHERE (a.id = 109)
GROUP BY a.id, a.rules, a.lft
2016-05-06T12:45:19+00:00	DEBUG 91.144.174.213	databasequery	SELECT a.id AS value, a.title AS text, COUNT(DISTINCT b.id) AS level, a.parent_id
FROM n1wr9_usergroups AS a
LEFT JOIN `n1wr9_usergroups` AS b ON a.lft > b.lft AND a.rgt < b.rgt
GROUP BY a.id, a.title, a.lft, a.rgt, a.parent_id
ORDER BY a.lft ASC
2016-05-06T12:45:19+00:00	DEBUG 91.144.174.213	databasequery	SELECT parent.id, parent.lft, parent.rgt
FROM n1wr9_usergroups AS parent
ORDER BY parent.lft
2016-05-06T12:45:19+00:00	DEBUG 91.144.174.213	databasequery	SELECT b.rules
FROM n1wr9_assets AS a
LEFT JOIN n1wr9_assets AS b ON b.lft <= a.lft AND b.rgt >= a.rgt
WHERE (a.id = 109)
GROUP BY b.id, b.rules, b.lft
ORDER BY b.lft
2016-05-06T12:45:19+00:00	DEBUG 91.144.174.213	databasequery	SELECT `a`.`id` AS `value`, `a`.`title` AS `text`
FROM `n1wr9_viewlevels` AS `a`
GROUP BY `a`.`id`,`a`.`title`,`a`.`ordering`
ORDER BY `a`.`ordering` ASC,`title` ASC
2016-05-06T12:45:19+00:00	DEBUG 91.144.174.213	databasequery	SELECT a.lang_code AS value, a.title AS text, a.title_native
FROM n1wr9_languages AS a
WHERE a.published >= 0
ORDER BY a.title
2016-05-06T12:45:19+00:00	DEBUG 91.144.174.213	databasequery	SELECT DISTINCT a.id AS value, a.path, a.title AS text, a.level, a.published, a.lft
FROM n1wr9_tags AS a
LEFT JOIN `n1wr9_tags` AS b ON a.lft > b.lft AND a.rgt < b.rgt
WHERE `a`.`lft` > 0 AND a.published IN (0,1)
ORDER BY a.lft ASC
2016-05-06T12:45:19+00:00	WARNING 91.144.174.213	deprecated	JFile::getName is deprecated. Use native basename() syntax.
2016-05-06T12:45:19+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:45:19+00:00	DEBUG 91.144.174.213	databasequery	SELECT m.id, m.title, m.module, m.position, m.content, m.showtitle, m.params, mm.menuid
FROM n1wr9_modules AS m
LEFT JOIN n1wr9_modules_menu AS mm ON mm.moduleid = m.id
LEFT JOIN n1wr9_extensions AS e ON e.element = m.module AND e.client_id = m.client_id
WHERE m.published = 1 AND e.enabled = 1 AND (m.publish_up = '0000-00-00 00:00:00' OR m.publish_up <= '2016-05-06 12:45:19') AND (m.publish_down = '0000-00-00 00:00:00' OR m.publish_down >= '2016-05-06 12:45:19') AND m.access IN (1,1,2,3,6) AND m.client_id = 1 AND (mm.menuid = 0 OR mm.menuid <= 0)
ORDER BY m.position, m.ordering
2016-05-06T12:45:19+00:00	WARNING 91.144.174.213	deprecated	JSubMenuHelper::getEntries() is deprecated. Use JHtmlSidebar::getEntries() instead.
2016-05-06T12:45:19+00:00	WARNING 91.144.174.213	deprecated	JSubMenuHelper::getFilters() is deprecated. Use JHtmlSidebar::getFilters() instead.
2016-05-06T12:45:19+00:00	WARNING 91.144.174.213	deprecated	JSubMenuHelper::getAction() is deprecated. Use JHtmlSidebar::getAction() instead.
2016-05-06T12:45:19+00:00	DEBUG 91.144.174.213	databasequery	SELECT COUNT(*)
FROM n1wr9_messages
WHERE state = 0 AND user_id_to = 311
2016-05-06T12:45:19+00:00	DEBUG 91.144.174.213	databasequery	SELECT COUNT(session_id)
FROM n1wr9_session
WHERE guest = 0 AND client_id = 1
2016-05-06T12:45:19+00:00	DEBUG 91.144.174.213	databasequery	SELECT COUNT(session_id)
FROM n1wr9_session
WHERE guest = 0 AND client_id = 0
2016-05-06T12:45:19+00:00	DEBUG 91.144.174.213	databasequery	SELECT m.id, m.title, m.alias, m.link, m.parent_id, m.img, e.element
FROM n1wr9_menu AS m
LEFT JOIN n1wr9_extensions AS e ON m.component_id = e.extension_id
WHERE m.client_id = 1 AND e.enabled = 1 AND m.id > 1
ORDER BY m.lft
2016-05-06T12:45:19+00:00	WARNING 91.144.174.213	deprecated	This method is typehinted to be an array in \Joomla\Utilities\ArrayHelper::toString.
2016-05-06T12:45:19+00:00	WARNING 91.144.174.213	deprecated	JResponse is deprecated.
2016-05-06T12:45:19+00:00	WARNING 91.144.174.213	deprecated	JError::getErrors() is deprecated.
2016-05-06T12:45:19+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:45:19+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:45:19+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:45:19+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:45:19+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:45:19+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:45:19+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:45:19+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:45:19+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:45:19+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:45:19+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:45:19+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:45:19+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:45:19+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:45:19+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:45:19+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:45:19+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:45:19+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:45:19+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:45:19+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:45:19+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:45:19+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:45:19+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:45:19+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:45:19+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:45:19+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:45:19+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:45:19+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:45:19+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:45:19+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:45:19+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:45:19+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:45:19+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:45:19+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:45:19+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:45:19+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:45:19+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:01+00:00	DEBUG 91.144.174.213	databasequery	SHOW FULL COLUMNS FROM `n1wr9_f2c_form`
2016-05-06T12:46:01+00:00	INFO 91.144.174.213	controller	Releasing edit ID com_form2content.edit.form.1 Array ( ) 
2016-05-06T12:46:01+00:00	DEBUG 91.144.174.213	databasequery	SHOW FULL COLUMNS FROM `n1wr9_f2c_project`
2016-05-06T12:46:01+00:00	DEBUG 91.144.174.213	databasequery	SELECT *
FROM n1wr9_f2c_project
WHERE `id` = '1'
2016-05-06T12:46:01+00:00	DEBUG 91.144.174.213	databasequery	SELECT pf.*, ft.name
FROM n1wr9_f2c_projectfields pf
INNER JOIN n1wr9_f2c_fieldtype ft ON pf.fieldtypeid = ft.id
WHERE pf.projectid = 1
ORDER BY pf.ordering ASC
2016-05-06T12:46:01+00:00	DEBUG 91.144.174.213	databasequery	UPDATE `n1wr9_session`
SET `data` = 'joomla|s:2516:\"TzoyNDoiSm9vbWxhXFJlZ2lzdHJ5XFJlZ2lzdHJ5IjoyOntzOjc6IgAqAGRhdGEiO086ODoic3RkQ2xhc3MiOjE6e3M6OToiX19kZWZhdWx0IjtPOjg6InN0ZENsYXNzIjo1OntzOjc6InNlc3Npb24iO086ODoic3RkQ2xhc3MiOjM6e3M6NzoiY291bnRlciI7aToxMTtzOjU6InRpbWVyIjtPOjg6InN0ZENsYXNzIjozOntzOjU6InN0YXJ0IjtpOjE0NjI1Mzg2MjI7czo0OiJsYXN0IjtpOjE0NjI1Mzg3MTg7czozOiJub3ciO2k6MTQ2MjUzODc2MTt9czo1OiJ0b2tlbiI7czozMjoiMDNjYmU1OGMyNGUyNjBlYTVlMmFjZTM5YjllNWEwYzgiO31zOjg6InJlZ2lzdHJ5IjtPOjI0OiJKb29tbGFcUmVnaXN0cnlcUmVnaXN0cnkiOjI6e3M6NzoiACoAZGF0YSI7Tzo4OiJzdGRDbGFzcyI6Mzp7czoxMToiYXBwbGljYXRpb24iO086ODoic3RkQ2xhc3MiOjE6e3M6NDoibGFuZyI7czowOiIiO31zOjEzOiJjb21faW5zdGFsbGVyIjtPOjg6InN0ZENsYXNzIjoyOntzOjc6Im1lc3NhZ2UiO3M6MDoiIjtzOjE3OiJleHRlbnNpb25fbWVzc2FnZSI7czowOiIiO31zOjE2OiJjb21fZm9ybTJjb250ZW50IjtPOjg6InN0ZENsYXNzIjoxOntzOjQ6ImVkaXQiO086ODoic3RkQ2xhc3MiOjE6e3M6NDoiZm9ybSI7Tzo4OiJzdGRDbGFzcyI6Mjp7czoyOiJpZCI7YTowOnt9czo0OiJkYXRhIjtOO319fX1zOjk6InNlcGFyYXRvciI7czoxOiIuIjt9czo0OiJ1c2VyIjtPOjU6IkpVc2VyIjoyODp7czo5OiIAKgBpc1Jvb3QiO2I6MTtzOjI6ImlkIjtzOjM6IjMxMSI7czo0OiJuYW1lIjtzOjEwOiJTdXBlciBVc2VyIjtzOjg6InVzZXJuYW1lIjtzOjU6ImFkbWluIjtzOjU6ImVtYWlsIjtzOjI1OiJ3ZWJtYXN0ZXIud29yazJAZ21haWwuY29tIjtzOjg6InBhc3N3b3JkIjtzOjYwOiIkMnkkMTAkVHYxbENUTVY3bzUydGFOc0hrQUxvLmFGYUtsR3hDNTczRlk2Qi5waXlVaEdnRDluWE0ybnEiO3M6MTQ6InBhc3N3b3JkX2NsZWFyIjtzOjA6IiI7czo1OiJibG9jayI7czoxOiIwIjtzOjk6InNlbmRFbWFpbCI7czoxOiIxIjtzOjEyOiJyZWdpc3RlckRhdGUiO3M6MTk6IjIwMTYtMDQtMTQgMDk6MTc6NDciO3M6MTM6Imxhc3R2aXNpdERhdGUiO3M6MTk6IjIwMTYtMDUtMDUgMDk6MTc6MDQiO3M6MTA6ImFjdGl2YXRpb24iO3M6MToiMCI7czo2OiJwYXJhbXMiO3M6MjM6InsidXBkYXRlX2NhY2hlX2xpc3QiOjF9IjtzOjY6Imdyb3VwcyI7YToxOntpOjg7czoxOiI4Ijt9czo1OiJndWVzdCI7aTowO3M6MTM6Imxhc3RSZXNldFRpbWUiO3M6MTk6IjAwMDAtMDAtMDAgMDA6MDA6MDAiO3M6MTA6InJlc2V0Q291bnQiO3M6MToiMCI7czoxMjoicmVxdWlyZVJlc2V0IjtzOjE6IjAiO3M6MTA6IgAqAF9wYXJhbXMiO086MjQ6Ikpvb21sYVxSZWdpc3RyeVxSZWdpc3RyeSI6Mjp7czo3OiIAKgBkYXRhIjtPOjg6InN0ZENsYXNzIjoxOntzOjE3OiJ1cGRhdGVfY2FjaGVfbGlzdCI7aToxO31zOjk6InNlcGFyYXRvciI7czoxOiIuIjt9czoxNDoiACoAX2F1dGhHcm91cHMiO2E6Mjp7aTowO2k6MTtpOjE7aTo4O31zOjE0OiIAKgBfYXV0aExldmVscyI7YTo1OntpOjA7aToxO2k6MTtpOjE7aToyO2k6MjtpOjM7aTozO2k6NDtpOjY7fXM6MTU6IgAqAF9hdXRoQWN0aW9ucyI7TjtzOjEyOiIAKgBfZXJyb3JNc2ciO047czoxMzoiACoAdXNlckhlbHBlciI7TzoxODoiSlVzZXJXcmFwcGVySGVscGVyIjowOnt9czoxMDoiACoAX2Vycm9ycyI7YTowOnt9czozOiJhaWQiO2k6MDtzOjY6Im90cEtleSI7czowOiIiO3M6NDoib3RlcCI7czowOiIiO31zOjE2OiJqb21zb2NpYWxfdXNlcmlwIjtzOjE0OiI5MS4xNDQuMTc0LjIxMyI7czoxMToiYXBwbGljYXRpb24iO086ODoic3RkQ2xhc3MiOjE6e3M6NToicXVldWUiO047fX19czo5OiJzZXBhcmF0b3IiO3M6MToiLiI7fQ==\";'
	, `time` = '1462538761'
WHERE `session_id` = '1la0886g2n07g5bov7pg0a3t84'
2016-05-06T12:46:01+00:00	DEBUG 91.144.174.213	databasequery	SELECT COUNT(*)
FROM `n1wr9_f2c_form` AS a
LEFT JOIN `n1wr9_content` c ON a.reference_id = c.id
LEFT JOIN `n1wr9_f2c_project` p ON a.projectid = p.id
LEFT JOIN `n1wr9_users` u ON a.created_by = u.id
LEFT JOIN `n1wr9_categories` AS cc ON a.catid = cc.id
LEFT JOIN `n1wr9_languages` AS l ON l.lang_code = a.language
LEFT JOIN n1wr9_viewlevels AS ag ON ag.id = a.access
WHERE (a.state = 0 OR a.state = 1)
2016-05-06T12:46:01+00:00	DEBUG 91.144.174.213	databasequery	SELECT a.*,c.state, c.publish_up as publish_up_c, c.publish_down as publish_down_c,p.title as project_title,u.name as author_name,cc.title AS category_title,l.title AS language_title,ag.title AS access_level
FROM `n1wr9_f2c_form` AS a
LEFT JOIN `n1wr9_content` c ON a.reference_id = c.id
LEFT JOIN `n1wr9_f2c_project` p ON a.projectid = p.id
LEFT JOIN `n1wr9_users` u ON a.created_by = u.id
LEFT JOIN `n1wr9_categories` AS cc ON a.catid = cc.id
LEFT JOIN `n1wr9_languages` AS l ON l.lang_code = a.language
LEFT JOIN n1wr9_viewlevels AS ag ON ag.id = a.access
WHERE (a.state = 0 OR a.state = 1)
ORDER BY a.title asc LIMIT 0, 20
2016-05-06T12:46:01+00:00	DEBUG 91.144.174.213	databasequery	SELECT id AS value, title AS text
FROM n1wr9_f2c_project
ORDER BY title
2016-05-06T12:46:01+00:00	DEBUG 91.144.174.213	databasequery	SELECT u.id AS value, u.name AS text
FROM n1wr9_users AS u
INNER JOIN n1wr9_content AS c ON c.created_by = u.id
GROUP BY u.id
ORDER BY u.name
2016-05-06T12:46:01+00:00	DEBUG 91.144.174.213	databasequery	SELECT a.id, a.title, a.level
FROM n1wr9_categories AS a
WHERE a.parent_id > 0 AND extension = 'com_content' AND a.published IN (0,1)
ORDER BY a.lft
2016-05-06T12:46:01+00:00	DEBUG 91.144.174.213	databasequery	SELECT a.id AS value, a.title AS text
FROM `n1wr9_viewlevels` AS a
GROUP BY a.id, a.title, a.ordering
ORDER BY a.ordering ASC
2016-05-06T12:46:01+00:00	DEBUG 91.144.174.213	databasequery	SELECT a.lang_code AS value, a.title AS text, a.title_native
FROM n1wr9_languages AS a
WHERE a.published >= 0
ORDER BY a.title
2016-05-06T12:46:01+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:01+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:01+00:00	DEBUG 91.144.174.213	databasequery	SELECT a.id, a.title, a.level, a.parent_id
FROM n1wr9_tags AS a
WHERE a.parent_id > 0 AND a.published IN (1)
ORDER BY a.lft
2016-05-06T12:46:01+00:00	WARNING 91.144.174.213	deprecated	JFile::getName is deprecated. Use native basename() syntax.
2016-05-06T12:46:01+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:01+00:00	DEBUG 91.144.174.213	databasequery	SELECT m.id, m.title, m.module, m.position, m.content, m.showtitle, m.params, mm.menuid
FROM n1wr9_modules AS m
LEFT JOIN n1wr9_modules_menu AS mm ON mm.moduleid = m.id
LEFT JOIN n1wr9_extensions AS e ON e.element = m.module AND e.client_id = m.client_id
WHERE m.published = 1 AND e.enabled = 1 AND (m.publish_up = '0000-00-00 00:00:00' OR m.publish_up <= '2016-05-06 12:46:01') AND (m.publish_down = '0000-00-00 00:00:00' OR m.publish_down >= '2016-05-06 12:46:01') AND m.access IN (1,1,2,3,6) AND m.client_id = 1 AND (mm.menuid = 0 OR mm.menuid <= 0)
ORDER BY m.position, m.ordering
2016-05-06T12:46:01+00:00	WARNING 91.144.174.213	deprecated	JSubMenuHelper::getEntries() is deprecated. Use JHtmlSidebar::getEntries() instead.
2016-05-06T12:46:01+00:00	WARNING 91.144.174.213	deprecated	JSubMenuHelper::getFilters() is deprecated. Use JHtmlSidebar::getFilters() instead.
2016-05-06T12:46:01+00:00	WARNING 91.144.174.213	deprecated	JSubMenuHelper::getAction() is deprecated. Use JHtmlSidebar::getAction() instead.
2016-05-06T12:46:01+00:00	DEBUG 91.144.174.213	databasequery	SELECT COUNT(*)
FROM n1wr9_messages
WHERE state = 0 AND user_id_to = 311
2016-05-06T12:46:01+00:00	DEBUG 91.144.174.213	databasequery	SELECT COUNT(session_id)
FROM n1wr9_session
WHERE guest = 0 AND client_id = 1
2016-05-06T12:46:01+00:00	DEBUG 91.144.174.213	databasequery	SELECT COUNT(session_id)
FROM n1wr9_session
WHERE guest = 0 AND client_id = 0
2016-05-06T12:46:01+00:00	DEBUG 91.144.174.213	databasequery	SELECT a.*, SUM(b.home) AS home,b.language,l.image,l.sef,l.title_native
FROM n1wr9_menu_types AS a
LEFT JOIN n1wr9_menu AS b ON b.menutype = a.menutype AND b.home != 0
LEFT JOIN n1wr9_languages AS l ON l.lang_code = language
WHERE (b.client_id = 0 OR b.client_id IS NULL)
GROUP BY a.id, a.menutype, a.description, a.title, b.menutype,b.language,l.image,l.sef,l.title_native
2016-05-06T12:46:01+00:00	DEBUG 91.144.174.213	databasequery	SELECT m.id, m.title, m.alias, m.link, m.parent_id, m.img, e.element
FROM n1wr9_menu AS m
LEFT JOIN n1wr9_extensions AS e ON m.component_id = e.extension_id
WHERE m.client_id = 1 AND e.enabled = 1 AND m.id > 1
ORDER BY m.lft
2016-05-06T12:46:01+00:00	WARNING 91.144.174.213	deprecated	This method is typehinted to be an array in \Joomla\Utilities\ArrayHelper::toString.
2016-05-06T12:46:01+00:00	WARNING 91.144.174.213	deprecated	JResponse is deprecated.
2016-05-06T12:46:01+00:00	WARNING 91.144.174.213	deprecated	JError::getErrors() is deprecated.
2016-05-06T12:46:01+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:01+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:01+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:01+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:01+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:01+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:02+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:02+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:02+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:02+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:02+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:02+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:02+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:02+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:02+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:02+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:02+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:02+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:02+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:02+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:02+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:06+00:00	DEBUG 91.144.174.213	databasequery	SHOW FULL COLUMNS FROM `n1wr9_f2c_form`
2016-05-06T12:46:06+00:00	DEBUG 91.144.174.213	databasequery	SELECT *
FROM n1wr9_f2c_form
WHERE `id` = '2'
2016-05-06T12:46:06+00:00	DEBUG 91.144.174.213	databasequery	SELECT *
FROM n1wr9_f2c_form
WHERE `id` = '2'
2016-05-06T12:46:06+00:00	DEBUG 91.144.174.213	databasequery	SELECT title, alias
FROM `n1wr9_categories`
WHERE id = 2
2016-05-06T12:46:06+00:00	DEBUG 91.144.174.213	databasequery	SELECT pf.*,fc.attribute, fc.content, fc.id AS fieldcontentid, IFNULL(fc.formid, 2) as formid,ft.name
FROM n1wr9_f2c_projectfields pf
LEFT JOIN n1wr9_f2c_fieldcontent fc ON fc.fieldid = pf.id AND fc.formid = 2
INNER JOIN n1wr9_f2c_fieldtype ft ON pf.fieldtypeid = ft.id
WHERE pf.projectid = 1
ORDER BY pf.ordering, pf.fieldtypeid, fc.id
2016-05-06T12:46:06+00:00	DEBUG 91.144.174.213	databasequery	SELECT *
FROM n1wr9_f2c_form
WHERE `id` = '2'
2016-05-06T12:46:06+00:00	DEBUG 91.144.174.213	databasequery	SELECT title, alias
FROM `n1wr9_categories`
WHERE id = 2
2016-05-06T12:46:06+00:00	DEBUG 91.144.174.213	databasequery	SELECT pf.*,fc.attribute, fc.content, fc.id AS fieldcontentid, IFNULL(fc.formid, 2) as formid,ft.name
FROM n1wr9_f2c_projectfields pf
LEFT JOIN n1wr9_f2c_fieldcontent fc ON fc.fieldid = pf.id AND fc.formid = 2
INNER JOIN n1wr9_f2c_fieldtype ft ON pf.fieldtypeid = ft.id
WHERE pf.projectid = 1
ORDER BY pf.ordering, pf.fieldtypeid, fc.id
2016-05-06T12:46:06+00:00	DEBUG 91.144.174.213	databasequery	SHOW FULL COLUMNS FROM `n1wr9_users`
2016-05-06T12:46:06+00:00	DEBUG 91.144.174.213	databasequery	SELECT *
FROM `n1wr9_users`
WHERE `id` = 311
2016-05-06T12:46:06+00:00	DEBUG 91.144.174.213	databasequery	SELECT `g`.`id`,`g`.`title`
FROM `n1wr9_usergroups` AS g
INNER JOIN `n1wr9_user_usergroup_map` AS m ON m.group_id = g.id
WHERE `m`.`user_id` = 311
2016-05-06T12:46:06+00:00	DEBUG 91.144.174.213	databasequery	SHOW FULL COLUMNS FROM `n1wr9_content`
2016-05-06T12:46:06+00:00	DEBUG 91.144.174.213	databasequery	SELECT *
FROM n1wr9_content
WHERE `id` = '2'
2016-05-06T12:46:06+00:00	DEBUG 91.144.174.213	databasequery	SELECT count(*)
FROM `n1wr9_content`
WHERE id=2
2016-05-06T12:46:06+00:00	DEBUG 91.144.174.213	databasequery	SHOW FULL COLUMNS FROM `n1wr9_f2c_project`
2016-05-06T12:46:06+00:00	DEBUG 91.144.174.213	databasequery	SELECT *
FROM n1wr9_f2c_project
WHERE `id` = '1'
2016-05-06T12:46:06+00:00	DEBUG 91.144.174.213	databasequery	SELECT pf.*, ft.name
FROM n1wr9_f2c_projectfields pf
INNER JOIN n1wr9_f2c_fieldtype ft ON pf.fieldtypeid = ft.id
WHERE pf.projectid = 1
ORDER BY pf.ordering ASC
2016-05-06T12:46:06+00:00	DEBUG 91.144.174.213	databasequery	SELECT *
FROM n1wr9_content
WHERE `id` = '2'
2016-05-06T12:46:06+00:00	DEBUG 91.144.174.213	databasequery	SELECT `t`.`id`
FROM `n1wr9_tags` AS t 
INNER JOIN `n1wr9_contentitem_tag_map` AS m ON `m`.`tag_id` = `t`.`id` AND `m`.`type_alias` = 'com_content.article' AND `m`.`content_item_id` IN ( 2)
2016-05-06T12:46:06+00:00	DEBUG 91.144.174.213	databasequery	UPDATE `n1wr9_content` SET `title`='Article templates, the true strength of Form2Content',`alias`='article-templates-the-true-strength-of-form2content',`introtext`='<!--\nThis is the FORM2CONTENT INTRO TEMPLATE for the BLOG CONTENT TYPE \n\nIt can be found in < root >/media/com_from2content/templates\n\nThe template shows you how you can:\n\n1) Add HTML/CSS for your article\n2) Add F2C Template Parameters (placeholders for your form data)\n3) Use basic SMARTY syntax\n\n-->\n<!--block escaping so SMARTY doesn\'t break on use of {} tags-->\n<style>\n.f2c_intro_image {float:left; padding:5px;}\n</style>\n\n\n<div class=\"f2c article_intro_wrapper\">\n	<!--check to add the read more around the image-->\n    <a href=\"index.php?option=com_content&view=article&id=2:article-templates-the-true-strength-of-form2content&catid=2:uncategorised\" target=\"_parent\" title=\"Article templates, the true strength of Form2Content\">\n    		<img src=\"images/stories/com_form2content/p1/f2/thumbs/2.png\" alt=\"Open Source Design\" title=\"F2C is developed by Open Source Design\" class=\"f2c_intro_image\">\n    	</a>\n    	<p>With a content construction kit there is always a small learning curve. Hopefully our BLOG demo will help you understand the relation between the Form2Contnet submission form (data) and the creation of your Joomla article quickly.</p>\n</div><!--article intro wrapper-->',`fulltext`='<!--If no article text, NO read more button will generate because the template will be empty! -->\n<!--PLEASE REMEMBER THAT YOU CAN HIDE THE INTRO in your article by using the Joomla article setting => show intro: NO -->\n			<img src=\"images/stories/com_form2content/p1/f2/thumbs/2.png\" alt=\"Open Source Design\" title=\"F2C is developed by Open Source Design\" class=\"f2c_intro_image\" style=\"float:right; padding-left:15px;\">\n	    <div><p>In the Joomla back-end under components you can find the link to Form2Content. One of the links is to the Form2Content Template manager.</p>\r\n<p>The F2C article templates are used to render the form data into the layout of your Joomla article. Probably the easiest way to understand this is to have a look at the two files we have included to generate the BLOG demo articles.<br />The two files can be seen in the F2C Template Manager or via FTP:</p>\r\n<p>&lt; root &gt;/media/com_form2content/templates</p>\r\n<p>blog_intro_template.tpl<br />blog_main_template.tpl</p>\r\n<p><strong>Use of Smarty Templating and Template parameters (placeholders)</strong></p>\r\n<p>In the two F2C article templates included we have added extra documentation to show what you can do with them. This will hopefully get you to grips with the syntax quickly!</p>\r\n<p><a href=\"http://documentation.form2content.com/f2c-templating\" target=\"_blank\">PLEASE read all the documentation on Form2Content templating here!</a></p>\r\n<p> </p>\r\n<p> </p></div>\n    \n        <p><strong>Source:</strong> <a href=\"http://documentation.form2content.com/f2c-templating\" target=\"_blank\" title=\"F2C Documentatation\">F2C Documentatation on article templates</a></p>\n    \n                        <p><strong>Author:</strong> Patrick Faasse, Julien Brouns - creators of Form2Content Joomla CCK</p>\n                    ',`state`='1',`catid`='2',`created`='2016-04-19 10:00:25',`created_by`='311',`created_by_alias`='',`modified`='2016-05-06 12:46:06',`modified_by`='311',`checked_out`='0',`checked_out_time`='0000-00-00 00:00:00',`publish_up`='2016-04-19 10:00:25',`publish_down`='0000-00-00 00:00:00',`images`='{\"image_intro\":\"\",\"float_intro\":\"\",\"image_intro_alt\":\"\",\"image_intro_caption\":\"\",\"image_fulltext\":\"\",\"float_fulltext\":\"\",\"image_fulltext_alt\":\"\",\"image_fulltext_caption\":\"\"}',`urls`='{\"urla\":\"\",\"urlatext\":\"\",\"targeta\":\"\",\"urlb\":\"\",\"urlbtext\":\"\",\"targetb\":\"\",\"urlc\":\"\",\"urlctext\":\"\",\"targetc\":\"\"}',`attribs`='{\"show_title\":\"\",\"link_titles\":\"\",\"show_intro\":\"0\",\"show_category\":\"\",\"link_category\":\"\",\"show_parent_category\":\"\",\"link_parent_category\":\"\",\"show_author\":\"\",\"link_author\":\"\",\"show_create_date\":\"\",\"show_modify_date\":\"\",\"show_publish_date\":\"\",\"show_item_navigation\":\"\",\"show_icons\":\"\",\"show_print_icon\":\"\",\"show_email_icon\":\"\",\"show_vote\":\"\",\"show_hits\":\"\",\"show_noauth\":\"\",\"alternative_readmore\":\"\",\"article_layout\":\"\",\"info_block_position\":\"0\"}',`version`='2',`ordering`='0',`metakey`='',`metadesc`='',`access`='1',`hits`='0',`metadata`='{\"robots\":\"\",\"author\":\"\",\"rights\":\"\",\"xreference\":\"\"}',`featured`='0',`language`='*',`xreference`='' WHERE `id`='2'
2016-05-06T12:46:06+00:00	DEBUG 91.144.174.213	databasequery	SELECT `asset_id`
FROM `n1wr9_categories`
WHERE `id` = 2
2016-05-06T12:46:06+00:00	DEBUG 91.144.174.213	databasequery	SHOW FULL COLUMNS FROM `n1wr9_assets`
2016-05-06T12:46:06+00:00	DEBUG 91.144.174.213	databasequery	SELECT `id`
FROM `n1wr9_assets`
WHERE `name` = 'com_content.article.2'
2016-05-06T12:46:06+00:00	DEBUG 91.144.174.213	databasequery	SELECT *
FROM n1wr9_assets
WHERE `id` = '112'
2016-05-06T12:46:06+00:00	DEBUG 91.144.174.213	databasequery	SELECT COUNT(id)
FROM `n1wr9_assets`
WHERE `id` = 27
2016-05-06T12:46:06+00:00	DEBUG 91.144.174.213	databasequery	LOCK TABLES `n1wr9_assets` WRITE
2016-05-06T12:46:06+00:00	DEBUG 91.144.174.213	databasequery	UPDATE `n1wr9_assets` SET `name`='com_content.article.2',`title`='Article templates, the true strength of Form2Content',`rules`='{\"core.admin\":{\"7\":1},\"core.manage\":{\"6\":1},\"core.create\":{\"3\":1},\"core.delete\":[],\"core.edit\":{\"4\":1},\"core.edit.state\":{\"5\":1},\"core.edit.own\":[]}',`parent_id`='27',`level`='3',`lft`='21',`rgt`='22' WHERE `id`='112'
2016-05-06T12:46:06+00:00	DEBUG 91.144.174.213	databasequery	UNLOCK TABLES
2016-05-06T12:46:06+00:00	DEBUG 91.144.174.213	databasequery	SHOW FULL COLUMNS FROM `n1wr9_ucm_history`
2016-05-06T12:46:06+00:00	DEBUG 91.144.174.213	databasequery	SHOW FULL COLUMNS FROM `n1wr9_content_types`
2016-05-06T12:46:06+00:00	DEBUG 91.144.174.213	databasequery	SELECT *
FROM n1wr9_content_types
WHERE `type_alias` = 'com_content.article'
2016-05-06T12:46:06+00:00	DEBUG 91.144.174.213	databasequery	SELECT *
FROM `n1wr9_ucm_history`
WHERE `ucm_item_id` = 2 AND `ucm_type_id` = 1 AND `sha1_hash` = '3d82e0be46ba4def825e74b8d70ae20e13da264b' LIMIT 0, 1
2016-05-06T12:46:06+00:00	DEBUG 91.144.174.213	databasequery	SELECT *
FROM n1wr9_content_types
WHERE `type_id` = '1'
2016-05-06T12:46:06+00:00	DEBUG 91.144.174.213	databasequery	INSERT INTO `n1wr9_ucm_history`
(`ucm_item_id`,`ucm_type_id`,`save_date`,`editor_user_id`,`character_count`,`sha1_hash`,`version_data`) VALUES 
('2','1','2016-05-06 12:46:06','311','4728','3d82e0be46ba4def825e74b8d70ae20e13da264b','{\"id\":\"2\",\"asset_id\":\"112\",\"title\":\"Article templates, the true strength of Form2Content\",\"alias\":\"article-templates-the-true-strength-of-form2content\",\"introtext\":\"<!--\\nThis is the FORM2CONTENT INTRO TEMPLATE for the BLOG CONTENT TYPE \\n\\nIt can be found in < root >\\/media\\/com_from2content\\/templates\\n\\nThe template shows you how you can:\\n\\n1) Add HTML\\/CSS for your article\\n2) Add F2C Template Parameters (placeholders for your form data)\\n3) Use basic SMARTY syntax\\n\\n-->\\n<!--block escaping so SMARTY doesn\'t break on use of {} tags-->\\n<style>\\n.f2c_intro_image {float:left; padding:5px;}\\n<\\/style>\\n\\n\\n<div class=\\\"f2c article_intro_wrapper\\\">\\n\\t<!--check to add the read more around the image-->\\n    <a href=\\\"index.php?option=com_content&view=article&id=2:article-templates-the-true-strength-of-form2content&catid=2:uncategorised\\\" target=\\\"_parent\\\" title=\\\"Article templates, the true strength of Form2Content\\\">\\n    \\t\\t<img src=\\\"images\\/stories\\/com_form2content\\/p1\\/f2\\/thumbs\\/2.png\\\" alt=\\\"Open Source Design\\\" title=\\\"F2C is developed by Open Source Design\\\" class=\\\"f2c_intro_image\\\">\\n    \\t<\\/a>\\n    \\t<p>With a content construction kit there is always a small learning curve. Hopefully our BLOG demo will help you understand the relation between the Form2Contnet submission form (data) and the creation of your Joomla article quickly.<\\/p>\\n<\\/div><!--article intro wrapper-->\",\"fulltext\":\"<!--If no article text, NO read more button will generate because the template will be empty! -->\\n<!--PLEASE REMEMBER THAT YOU CAN HIDE THE INTRO in your article by using the Joomla article setting => show intro: NO -->\\n\\t\\t\\t<img src=\\\"images\\/stories\\/com_form2content\\/p1\\/f2\\/thumbs\\/2.png\\\" alt=\\\"Open Source Design\\\" title=\\\"F2C is developed by Open Source Design\\\" class=\\\"f2c_intro_image\\\" style=\\\"float:right; padding-left:15px;\\\">\\n\\t    <div><p>In the Joomla back-end under components you can find the link to Form2Content. One of the links is to the Form2Content Template manager.<\\/p>\\r\\n<p>The F2C article templates are used to render the form data into the layout of your Joomla article. Probably the easiest way to understand this is to have a look at the two files we have included to generate the BLOG demo articles.<br \\/>The two files can be seen in the F2C Template Manager or via FTP:<\\/p>\\r\\n<p>&lt; root &gt;\\/media\\/com_form2content\\/templates<\\/p>\\r\\n<p>blog_intro_template.tpl<br \\/>blog_main_template.tpl<\\/p>\\r\\n<p><strong>Use of Smarty Templating and Template parameters (placeholders)<\\/strong><\\/p>\\r\\n<p>In the two F2C article templates included we have added extra documentation to show what you can do with them. This will hopefully get you to grips with the syntax quickly!<\\/p>\\r\\n<p><a href=\\\"http:\\/\\/documentation.form2content.com\\/f2c-templating\\\" target=\\\"_blank\\\">PLEASE read all the documentation on Form2Content templating here!<\\/a><\\/p>\\r\\n<p>\\u00a0<\\/p>\\r\\n<p>\\u00a0<\\/p><\\/div>\\n    \\n        <p><strong>Source:<\\/strong> <a href=\\\"http:\\/\\/documentation.form2content.com\\/f2c-templating\\\" target=\\\"_blank\\\" title=\\\"F2C Documentatation\\\">F2C Documentatation on article templates<\\/a><\\/p>\\n    \\n                        <p><strong>Author:<\\/strong> Patrick Faasse, Julien Brouns - creators of Form2Content Joomla CCK<\\/p>\\n                    \",\"state\":1,\"catid\":\"2\",\"created\":\"2016-04-19 10:00:25\",\"created_by\":\"311\",\"created_by_alias\":\"\",\"modified\":\"2016-05-06 12:46:06\",\"modified_by\":\"311\",\"checked_out\":\"0\",\"checked_out_time\":\"0000-00-00 00:00:00\",\"publish_up\":\"2016-04-19 10:00:25\",\"publish_down\":\"0000-00-00 00:00:00\",\"images\":\"{\\\"image_intro\\\":\\\"\\\",\\\"float_intro\\\":\\\"\\\",\\\"image_intro_alt\\\":\\\"\\\",\\\"image_intro_caption\\\":\\\"\\\",\\\"image_fulltext\\\":\\\"\\\",\\\"float_fulltext\\\":\\\"\\\",\\\"image_fulltext_alt\\\":\\\"\\\",\\\"image_fulltext_caption\\\":\\\"\\\"}\",\"urls\":\"{\\\"urla\\\":\\\"\\\",\\\"urlatext\\\":\\\"\\\",\\\"targeta\\\":\\\"\\\",\\\"urlb\\\":\\\"\\\",\\\"urlbtext\\\":\\\"\\\",\\\"targetb\\\":\\\"\\\",\\\"urlc\\\":\\\"\\\",\\\"urlctext\\\":\\\"\\\",\\\"targetc\\\":\\\"\\\"}\",\"attribs\":\"{\\\"show_title\\\":\\\"\\\",\\\"link_titles\\\":\\\"\\\",\\\"show_intro\\\":\\\"0\\\",\\\"show_category\\\":\\\"\\\",\\\"link_category\\\":\\\"\\\",\\\"show_parent_category\\\":\\\"\\\",\\\"link_parent_category\\\":\\\"\\\",\\\"show_author\\\":\\\"\\\",\\\"link_author\\\":\\\"\\\",\\\"show_create_date\\\":\\\"\\\",\\\"show_modify_date\\\":\\\"\\\",\\\"show_publish_date\\\":\\\"\\\",\\\"show_item_navigation\\\":\\\"\\\",\\\"show_icons\\\":\\\"\\\",\\\"show_print_icon\\\":\\\"\\\",\\\"show_email_icon\\\":\\\"\\\",\\\"show_vote\\\":\\\"\\\",\\\"show_hits\\\":\\\"\\\",\\\"show_noauth\\\":\\\"\\\",\\\"alternative_readmore\\\":\\\"\\\",\\\"article_layout\\\":\\\"\\\",\\\"info_block_position\\\":\\\"0\\\"}\",\"version\":2,\"ordering\":\"0\",\"metakey\":\"\",\"metadesc\":\"\",\"access\":\"1\",\"hits\":\"0\",\"metadata\":\"{\\\"robots\\\":\\\"\\\",\\\"author\\\":\\\"\\\",\\\"rights\\\":\\\"\\\",\\\"xreference\\\":\\\"\\\"}\",\"featured\":\"0\",\"language\":\"*\",\"xreference\":\"\"}')
2016-05-06T12:46:06+00:00	DEBUG 91.144.174.213	databasequery	SELECT `version_id`
FROM `n1wr9_ucm_history`
WHERE `ucm_item_id` = 2 AND `ucm_type_id` = 1 AND `keep_forever` != 1
ORDER BY `save_date` DESC  LIMIT 0, 10
2016-05-06T12:46:06+00:00	DEBUG 91.144.174.213	databasequery	UPDATE n1wr9_content
SET `checked_out` = 0
	, `checked_out_time` = '0000-00-00 00:00:00'
WHERE `id` = '2'
2016-05-06T12:46:06+00:00	DEBUG 91.144.174.213	databasequery	SHOW FULL COLUMNS FROM `n1wr9_content_frontpage`
2016-05-06T12:46:06+00:00	DEBUG 91.144.174.213	databasequery	DELETE 
FROM n1wr9_content_frontpage
WHERE content_id = 2
2016-05-06T12:46:06+00:00	DEBUG 91.144.174.213	databasequery	SELECT content_id, ordering
FROM n1wr9_content_frontpage
WHERE ordering >= 0
ORDER BY ordering
2016-05-06T12:46:06+00:00	DEBUG 91.144.174.213	databasequery	SELECT *
FROM n1wr9_f2c_form
WHERE `id` = '2'
2016-05-06T12:46:06+00:00	DEBUG 91.144.174.213	databasequery	SELECT `t`.`id`
FROM `n1wr9_tags` AS t 
INNER JOIN `n1wr9_contentitem_tag_map` AS m ON `m`.`tag_id` = `t`.`id` AND `m`.`type_alias` = 'com_content.article' AND `m`.`content_item_id` IN ( 2)
2016-05-06T12:46:06+00:00	DEBUG 91.144.174.213	databasequery	SHOW FULL COLUMNS FROM `n1wr9_content`
2016-05-06T12:46:06+00:00	DEBUG 91.144.174.213	databasequery	SELECT *
FROM n1wr9_f2c_form
WHERE `alias` = 'article-templates-the-true-strength-of-form2content' AND `catid` = '2'
2016-05-06T12:46:06+00:00	DEBUG 91.144.174.213	databasequery	SELECT *
FROM n1wr9_content
WHERE `alias` = 'article-templates-the-true-strength-of-form2content' AND `catid` = '2'
2016-05-06T12:46:06+00:00	DEBUG 91.144.174.213	databasequery	UPDATE `n1wr9_f2c_form` SET `projectid`='1',`title`='Article templates, the true strength of Form2Content',`alias`='article-templates-the-true-strength-of-form2content',`created_by`='311',`created_by_alias`='',`created`='2016-04-19 10:00:25',`modified`='2016-05-06 12:46:06',`metakey`='',`metadesc`='',`catid`='2',`intro_template`='blog_intro_template.tpl',`main_template`='blog_main_template.tpl',`reference_id`='2',`ordering`='0',`publish_up`='2016-04-19 10:00:25',`publish_down`='0000-00-00 00:00:00',`state`='1',`featured`='0',`access`='1',`attribs`='{\"show_title\":\"\",\"link_titles\":\"\",\"show_intro\":\"0\",\"show_category\":\"\",\"link_category\":\"\",\"show_parent_category\":\"\",\"link_parent_category\":\"\",\"show_author\":\"\",\"link_author\":\"\",\"show_create_date\":\"\",\"show_modify_date\":\"\",\"show_publish_date\":\"\",\"show_item_navigation\":\"\",\"show_icons\":\"\",\"show_print_icon\":\"\",\"show_email_icon\":\"\",\"show_vote\":\"\",\"show_hits\":\"\",\"show_noauth\":\"\",\"alternative_readmore\":\"\",\"article_layout\":\"\",\"info_block_position\":\"0\"}',`metadata`='{\"robots\":\"\",\"author\":\"\",\"rights\":\"\",\"xreference\":\"\"}',`language`='*',`extended`='{\"tags\":\"\"}' WHERE `id`='2'
2016-05-06T12:46:06+00:00	DEBUG 91.144.174.213	databasequery	SELECT asset_id
FROM n1wr9_f2c_project
WHERE id = 1
2016-05-06T12:46:06+00:00	DEBUG 91.144.174.213	databasequery	SELECT `id`
FROM `n1wr9_assets`
WHERE `name` = 'com_form2content.form.2'
2016-05-06T12:46:06+00:00	DEBUG 91.144.174.213	databasequery	SELECT *
FROM n1wr9_assets
WHERE `id` = '111'
2016-05-06T12:46:06+00:00	DEBUG 91.144.174.213	databasequery	SELECT COUNT(id)
FROM `n1wr9_assets`
WHERE `id` = 108
2016-05-06T12:46:06+00:00	DEBUG 91.144.174.213	databasequery	LOCK TABLES `n1wr9_assets` WRITE
2016-05-06T12:46:06+00:00	DEBUG 91.144.174.213	databasequery	UPDATE `n1wr9_assets` SET `name`='com_form2content.form.2',`title`='Article templates, the true strength of Form2Content',`rules`='{\"core.delete\":[],\"core.edit\":[],\"core.edit.state\":[]}',`parent_id`='108',`level`='3',`lft`='201',`rgt`='202' WHERE `id`='111'
2016-05-06T12:46:06+00:00	DEBUG 91.144.174.213	databasequery	UNLOCK TABLES
2016-05-06T12:46:06+00:00	DEBUG 91.144.174.213	databasequery	SELECT `core_content_id`
FROM `n1wr9_ucm_content`
WHERE `core_type_alias` = 'com_content.article' AND `core_content_item_id` IN (2)
2016-05-06T12:46:06+00:00	DEBUG 91.144.174.213	databasequery	SHOW FULL COLUMNS FROM `n1wr9_ucm_content`
2016-05-06T12:46:06+00:00	DEBUG 91.144.174.213	databasequery	UPDATE `n1wr9_session`
SET `data` = 'joomla|s:2648:\"TzoyNDoiSm9vbWxhXFJlZ2lzdHJ5XFJlZ2lzdHJ5IjoyOntzOjc6IgAqAGRhdGEiO086ODoic3RkQ2xhc3MiOjE6e3M6OToiX19kZWZhdWx0IjtPOjg6InN0ZENsYXNzIjo1OntzOjc6InNlc3Npb24iO086ODoic3RkQ2xhc3MiOjM6e3M6NzoiY291bnRlciI7aToxMztzOjU6InRpbWVyIjtPOjg6InN0ZENsYXNzIjozOntzOjU6InN0YXJ0IjtpOjE0NjI1Mzg2MjI7czo0OiJsYXN0IjtpOjE0NjI1Mzg3NjE7czozOiJub3ciO2k6MTQ2MjUzODc2Njt9czo1OiJ0b2tlbiI7czozMjoiMDNjYmU1OGMyNGUyNjBlYTVlMmFjZTM5YjllNWEwYzgiO31zOjg6InJlZ2lzdHJ5IjtPOjI0OiJKb29tbGFcUmVnaXN0cnlcUmVnaXN0cnkiOjI6e3M6NzoiACoAZGF0YSI7Tzo4OiJzdGRDbGFzcyI6Mzp7czoxMToiYXBwbGljYXRpb24iO086ODoic3RkQ2xhc3MiOjE6e3M6NDoibGFuZyI7czowOiIiO31zOjEzOiJjb21faW5zdGFsbGVyIjtPOjg6InN0ZENsYXNzIjoyOntzOjc6Im1lc3NhZ2UiO3M6MDoiIjtzOjE3OiJleHRlbnNpb25fbWVzc2FnZSI7czowOiIiO31zOjE2OiJjb21fZm9ybTJjb250ZW50IjtPOjg6InN0ZENsYXNzIjoxOntzOjQ6ImVkaXQiO086ODoic3RkQ2xhc3MiOjE6e3M6NDoiZm9ybSI7Tzo4OiJzdGRDbGFzcyI6Mjp7czoyOiJpZCI7YTowOnt9czo0OiJkYXRhIjtOO319fX1zOjk6InNlcGFyYXRvciI7czoxOiIuIjt9czo0OiJ1c2VyIjtPOjU6IkpVc2VyIjoyODp7czo5OiIAKgBpc1Jvb3QiO2I6MTtzOjI6ImlkIjtzOjM6IjMxMSI7czo0OiJuYW1lIjtzOjEwOiJTdXBlciBVc2VyIjtzOjg6InVzZXJuYW1lIjtzOjU6ImFkbWluIjtzOjU6ImVtYWlsIjtzOjI1OiJ3ZWJtYXN0ZXIud29yazJAZ21haWwuY29tIjtzOjg6InBhc3N3b3JkIjtzOjYwOiIkMnkkMTAkVHYxbENUTVY3bzUydGFOc0hrQUxvLmFGYUtsR3hDNTczRlk2Qi5waXlVaEdnRDluWE0ybnEiO3M6MTQ6InBhc3N3b3JkX2NsZWFyIjtzOjA6IiI7czo1OiJibG9jayI7czoxOiIwIjtzOjk6InNlbmRFbWFpbCI7czoxOiIxIjtzOjEyOiJyZWdpc3RlckRhdGUiO3M6MTk6IjIwMTYtMDQtMTQgMDk6MTc6NDciO3M6MTM6Imxhc3R2aXNpdERhdGUiO3M6MTk6IjIwMTYtMDUtMDUgMDk6MTc6MDQiO3M6MTA6ImFjdGl2YXRpb24iO3M6MToiMCI7czo2OiJwYXJhbXMiO3M6MjM6InsidXBkYXRlX2NhY2hlX2xpc3QiOjF9IjtzOjY6Imdyb3VwcyI7YToxOntpOjg7czoxOiI4Ijt9czo1OiJndWVzdCI7aTowO3M6MTM6Imxhc3RSZXNldFRpbWUiO3M6MTk6IjAwMDAtMDAtMDAgMDA6MDA6MDAiO3M6MTA6InJlc2V0Q291bnQiO3M6MToiMCI7czoxMjoicmVxdWlyZVJlc2V0IjtzOjE6IjAiO3M6MTA6IgAqAF9wYXJhbXMiO086MjQ6Ikpvb21sYVxSZWdpc3RyeVxSZWdpc3RyeSI6Mjp7czo3OiIAKgBkYXRhIjtPOjg6InN0ZENsYXNzIjoxOntzOjE3OiJ1cGRhdGVfY2FjaGVfbGlzdCI7aToxO31zOjk6InNlcGFyYXRvciI7czoxOiIuIjt9czoxNDoiACoAX2F1dGhHcm91cHMiO2E6Mjp7aTowO2k6MTtpOjE7aTo4O31zOjE0OiIAKgBfYXV0aExldmVscyI7YTo1OntpOjA7aToxO2k6MTtpOjE7aToyO2k6MjtpOjM7aTozO2k6NDtpOjY7fXM6MTU6IgAqAF9hdXRoQWN0aW9ucyI7TjtzOjEyOiIAKgBfZXJyb3JNc2ciO047czoxMzoiACoAdXNlckhlbHBlciI7TzoxODoiSlVzZXJXcmFwcGVySGVscGVyIjowOnt9czoxMDoiACoAX2Vycm9ycyI7YTowOnt9czozOiJhaWQiO2k6MDtzOjY6Im90cEtleSI7czowOiIiO3M6NDoib3RlcCI7czowOiIiO31zOjE2OiJqb21zb2NpYWxfdXNlcmlwIjtzOjE0OiI5MS4xNDQuMTc0LjIxMyI7czoxMToiYXBwbGljYXRpb24iO086ODoic3RkQ2xhc3MiOjE6e3M6NToicXVldWUiO2E6MTp7aTowO2E6Mjp7czo3OiJtZXNzYWdlIjtzOjQwOiIxINGB0YLQsNGC0YzRjyDQvtC/0YPQsdC70LjQutC+0LLQsNC90LAuIjtzOjQ6InR5cGUiO3M6NzoibWVzc2FnZSI7fX19fX1zOjk6InNlcGFyYXRvciI7czoxOiIuIjt9\";'
	, `time` = '1462538766'
WHERE `session_id` = '1la0886g2n07g5bov7pg0a3t84'
2016-05-06T12:46:06+00:00	DEBUG 91.144.174.213	databasequery	SELECT COUNT(*)
FROM `n1wr9_f2c_form` AS a
LEFT JOIN `n1wr9_content` c ON a.reference_id = c.id
LEFT JOIN `n1wr9_f2c_project` p ON a.projectid = p.id
LEFT JOIN `n1wr9_users` u ON a.created_by = u.id
LEFT JOIN `n1wr9_categories` AS cc ON a.catid = cc.id
LEFT JOIN `n1wr9_languages` AS l ON l.lang_code = a.language
LEFT JOIN n1wr9_viewlevels AS ag ON ag.id = a.access
WHERE (a.state = 0 OR a.state = 1)
2016-05-06T12:46:06+00:00	DEBUG 91.144.174.213	databasequery	SELECT a.*,c.state, c.publish_up as publish_up_c, c.publish_down as publish_down_c,p.title as project_title,u.name as author_name,cc.title AS category_title,l.title AS language_title,ag.title AS access_level
FROM `n1wr9_f2c_form` AS a
LEFT JOIN `n1wr9_content` c ON a.reference_id = c.id
LEFT JOIN `n1wr9_f2c_project` p ON a.projectid = p.id
LEFT JOIN `n1wr9_users` u ON a.created_by = u.id
LEFT JOIN `n1wr9_categories` AS cc ON a.catid = cc.id
LEFT JOIN `n1wr9_languages` AS l ON l.lang_code = a.language
LEFT JOIN n1wr9_viewlevels AS ag ON ag.id = a.access
WHERE (a.state = 0 OR a.state = 1)
ORDER BY a.title asc LIMIT 0, 20
2016-05-06T12:46:06+00:00	DEBUG 91.144.174.213	databasequery	SELECT id AS value, title AS text
FROM n1wr9_f2c_project
ORDER BY title
2016-05-06T12:46:06+00:00	DEBUG 91.144.174.213	databasequery	SELECT u.id AS value, u.name AS text
FROM n1wr9_users AS u
INNER JOIN n1wr9_content AS c ON c.created_by = u.id
GROUP BY u.id
ORDER BY u.name
2016-05-06T12:46:06+00:00	DEBUG 91.144.174.213	databasequery	SELECT a.id, a.title, a.level
FROM n1wr9_categories AS a
WHERE a.parent_id > 0 AND extension = 'com_content' AND a.published IN (0,1)
ORDER BY a.lft
2016-05-06T12:46:06+00:00	DEBUG 91.144.174.213	databasequery	SELECT a.id AS value, a.title AS text
FROM `n1wr9_viewlevels` AS a
GROUP BY a.id, a.title, a.ordering
ORDER BY a.ordering ASC
2016-05-06T12:46:06+00:00	DEBUG 91.144.174.213	databasequery	SELECT a.lang_code AS value, a.title AS text, a.title_native
FROM n1wr9_languages AS a
WHERE a.published >= 0
ORDER BY a.title
2016-05-06T12:46:06+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:06+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:06+00:00	DEBUG 91.144.174.213	databasequery	SELECT a.id, a.title, a.level, a.parent_id
FROM n1wr9_tags AS a
WHERE a.parent_id > 0 AND a.published IN (1)
ORDER BY a.lft
2016-05-06T12:46:06+00:00	WARNING 91.144.174.213	deprecated	JFile::getName is deprecated. Use native basename() syntax.
2016-05-06T12:46:06+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:06+00:00	DEBUG 91.144.174.213	databasequery	SELECT m.id, m.title, m.module, m.position, m.content, m.showtitle, m.params, mm.menuid
FROM n1wr9_modules AS m
LEFT JOIN n1wr9_modules_menu AS mm ON mm.moduleid = m.id
LEFT JOIN n1wr9_extensions AS e ON e.element = m.module AND e.client_id = m.client_id
WHERE m.published = 1 AND e.enabled = 1 AND (m.publish_up = '0000-00-00 00:00:00' OR m.publish_up <= '2016-05-06 12:46:06') AND (m.publish_down = '0000-00-00 00:00:00' OR m.publish_down >= '2016-05-06 12:46:06') AND m.access IN (1,1,2,3,6) AND m.client_id = 1 AND (mm.menuid = 0 OR mm.menuid <= 0)
ORDER BY m.position, m.ordering
2016-05-06T12:46:06+00:00	WARNING 91.144.174.213	deprecated	JSubMenuHelper::getEntries() is deprecated. Use JHtmlSidebar::getEntries() instead.
2016-05-06T12:46:06+00:00	WARNING 91.144.174.213	deprecated	JSubMenuHelper::getFilters() is deprecated. Use JHtmlSidebar::getFilters() instead.
2016-05-06T12:46:06+00:00	WARNING 91.144.174.213	deprecated	JSubMenuHelper::getAction() is deprecated. Use JHtmlSidebar::getAction() instead.
2016-05-06T12:46:06+00:00	DEBUG 91.144.174.213	databasequery	SELECT COUNT(*)
FROM n1wr9_messages
WHERE state = 0 AND user_id_to = 311
2016-05-06T12:46:06+00:00	DEBUG 91.144.174.213	databasequery	SELECT COUNT(session_id)
FROM n1wr9_session
WHERE guest = 0 AND client_id = 1
2016-05-06T12:46:06+00:00	DEBUG 91.144.174.213	databasequery	SELECT COUNT(session_id)
FROM n1wr9_session
WHERE guest = 0 AND client_id = 0
2016-05-06T12:46:06+00:00	DEBUG 91.144.174.213	databasequery	SELECT a.*, SUM(b.home) AS home,b.language,l.image,l.sef,l.title_native
FROM n1wr9_menu_types AS a
LEFT JOIN n1wr9_menu AS b ON b.menutype = a.menutype AND b.home != 0
LEFT JOIN n1wr9_languages AS l ON l.lang_code = language
WHERE (b.client_id = 0 OR b.client_id IS NULL)
GROUP BY a.id, a.menutype, a.description, a.title, b.menutype,b.language,l.image,l.sef,l.title_native
2016-05-06T12:46:06+00:00	DEBUG 91.144.174.213	databasequery	SELECT m.id, m.title, m.alias, m.link, m.parent_id, m.img, e.element
FROM n1wr9_menu AS m
LEFT JOIN n1wr9_extensions AS e ON m.component_id = e.extension_id
WHERE m.client_id = 1 AND e.enabled = 1 AND m.id > 1
ORDER BY m.lft
2016-05-06T12:46:06+00:00	WARNING 91.144.174.213	deprecated	This method is typehinted to be an array in \Joomla\Utilities\ArrayHelper::toString.
2016-05-06T12:46:06+00:00	WARNING 91.144.174.213	deprecated	JResponse is deprecated.
2016-05-06T12:46:06+00:00	WARNING 91.144.174.213	deprecated	JError::getErrors() is deprecated.
2016-05-06T12:46:06+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:06+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:06+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:06+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:06+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:06+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:06+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:06+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:06+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:06+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:06+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:06+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:06+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:06+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:06+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:06+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:06+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:06+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:06+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:06+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:12+00:00	DEBUG 91.144.174.213	databasequery	SELECT COUNT(*)
FROM `n1wr9_f2c_project` AS a
LEFT JOIN `n1wr9_users` u ON a.created_by = u.id
2016-05-06T12:46:12+00:00	DEBUG 91.144.174.213	databasequery	SELECT a.*,u.name AS username
FROM `n1wr9_f2c_project` AS a
LEFT JOIN `n1wr9_users` u ON a.created_by = u.id
ORDER BY a.title asc LIMIT 0, 20
2016-05-06T12:46:12+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:12+00:00	WARNING 91.144.174.213	deprecated	JFile::getName is deprecated. Use native basename() syntax.
2016-05-06T12:46:12+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:12+00:00	DEBUG 91.144.174.213	databasequery	SELECT m.id, m.title, m.module, m.position, m.content, m.showtitle, m.params, mm.menuid
FROM n1wr9_modules AS m
LEFT JOIN n1wr9_modules_menu AS mm ON mm.moduleid = m.id
LEFT JOIN n1wr9_extensions AS e ON e.element = m.module AND e.client_id = m.client_id
WHERE m.published = 1 AND e.enabled = 1 AND (m.publish_up = '0000-00-00 00:00:00' OR m.publish_up <= '2016-05-06 12:46:12') AND (m.publish_down = '0000-00-00 00:00:00' OR m.publish_down >= '2016-05-06 12:46:12') AND m.access IN (1,1,2,3,6) AND m.client_id = 1 AND (mm.menuid = 0 OR mm.menuid <= 0)
ORDER BY m.position, m.ordering
2016-05-06T12:46:12+00:00	WARNING 91.144.174.213	deprecated	JSubMenuHelper::getEntries() is deprecated. Use JHtmlSidebar::getEntries() instead.
2016-05-06T12:46:12+00:00	WARNING 91.144.174.213	deprecated	JSubMenuHelper::getFilters() is deprecated. Use JHtmlSidebar::getFilters() instead.
2016-05-06T12:46:12+00:00	WARNING 91.144.174.213	deprecated	JSubMenuHelper::getAction() is deprecated. Use JHtmlSidebar::getAction() instead.
2016-05-06T12:46:12+00:00	DEBUG 91.144.174.213	databasequery	SELECT COUNT(*)
FROM n1wr9_messages
WHERE state = 0 AND user_id_to = 311
2016-05-06T12:46:12+00:00	DEBUG 91.144.174.213	databasequery	SELECT COUNT(session_id)
FROM n1wr9_session
WHERE guest = 0 AND client_id = 1
2016-05-06T12:46:12+00:00	DEBUG 91.144.174.213	databasequery	SELECT COUNT(session_id)
FROM n1wr9_session
WHERE guest = 0 AND client_id = 0
2016-05-06T12:46:12+00:00	DEBUG 91.144.174.213	databasequery	SELECT a.*, SUM(b.home) AS home,b.language,l.image,l.sef,l.title_native
FROM n1wr9_menu_types AS a
LEFT JOIN n1wr9_menu AS b ON b.menutype = a.menutype AND b.home != 0
LEFT JOIN n1wr9_languages AS l ON l.lang_code = language
WHERE (b.client_id = 0 OR b.client_id IS NULL)
GROUP BY a.id, a.menutype, a.description, a.title, b.menutype,b.language,l.image,l.sef,l.title_native
2016-05-06T12:46:12+00:00	DEBUG 91.144.174.213	databasequery	SELECT m.id, m.title, m.alias, m.link, m.parent_id, m.img, e.element
FROM n1wr9_menu AS m
LEFT JOIN n1wr9_extensions AS e ON m.component_id = e.extension_id
WHERE m.client_id = 1 AND e.enabled = 1 AND m.id > 1
ORDER BY m.lft
2016-05-06T12:46:12+00:00	WARNING 91.144.174.213	deprecated	JResponse is deprecated.
2016-05-06T12:46:12+00:00	WARNING 91.144.174.213	deprecated	JError::getErrors() is deprecated.
2016-05-06T12:46:12+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:12+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:12+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:12+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:12+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:12+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:12+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:12+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:12+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:12+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:12+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:12+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:12+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:12+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:16+00:00	DEBUG 91.144.174.213	databasequery	SHOW FULL COLUMNS FROM `n1wr9_f2c_project`
2016-05-06T12:46:16+00:00	INFO 91.144.174.213	controller	Holding edit ID com_form2content.edit.project.1 Array (     [0] => 1 ) 
2016-05-06T12:46:16+00:00	DEBUG 91.144.174.213	databasequery	UPDATE `n1wr9_session`
SET `data` = 'joomla|s:2608:\"TzoyNDoiSm9vbWxhXFJlZ2lzdHJ5XFJlZ2lzdHJ5IjoyOntzOjc6IgAqAGRhdGEiO086ODoic3RkQ2xhc3MiOjE6e3M6OToiX19kZWZhdWx0IjtPOjg6InN0ZENsYXNzIjo1OntzOjc6InNlc3Npb24iO086ODoic3RkQ2xhc3MiOjM6e3M6NzoiY291bnRlciI7aToxNjtzOjU6InRpbWVyIjtPOjg6InN0ZENsYXNzIjozOntzOjU6InN0YXJ0IjtpOjE0NjI1Mzg2MjI7czo0OiJsYXN0IjtpOjE0NjI1Mzg3NzI7czozOiJub3ciO2k6MTQ2MjUzODc3Njt9czo1OiJ0b2tlbiI7czozMjoiMDNjYmU1OGMyNGUyNjBlYTVlMmFjZTM5YjllNWEwYzgiO31zOjg6InJlZ2lzdHJ5IjtPOjI0OiJKb29tbGFcUmVnaXN0cnlcUmVnaXN0cnkiOjI6e3M6NzoiACoAZGF0YSI7Tzo4OiJzdGRDbGFzcyI6Mzp7czoxMToiYXBwbGljYXRpb24iO086ODoic3RkQ2xhc3MiOjE6e3M6NDoibGFuZyI7czowOiIiO31zOjEzOiJjb21faW5zdGFsbGVyIjtPOjg6InN0ZENsYXNzIjoyOntzOjc6Im1lc3NhZ2UiO3M6MDoiIjtzOjE3OiJleHRlbnNpb25fbWVzc2FnZSI7czowOiIiO31zOjE2OiJjb21fZm9ybTJjb250ZW50IjtPOjg6InN0ZENsYXNzIjoxOntzOjQ6ImVkaXQiO086ODoic3RkQ2xhc3MiOjI6e3M6NDoiZm9ybSI7Tzo4OiJzdGRDbGFzcyI6Mjp7czoyOiJpZCI7YTowOnt9czo0OiJkYXRhIjtOO31zOjc6InByb2plY3QiO086ODoic3RkQ2xhc3MiOjI6e3M6MjoiaWQiO2E6MTp7aTowO2k6MTt9czo0OiJkYXRhIjtOO319fX1zOjk6InNlcGFyYXRvciI7czoxOiIuIjt9czo0OiJ1c2VyIjtPOjU6IkpVc2VyIjoyODp7czo5OiIAKgBpc1Jvb3QiO2I6MTtzOjI6ImlkIjtzOjM6IjMxMSI7czo0OiJuYW1lIjtzOjEwOiJTdXBlciBVc2VyIjtzOjg6InVzZXJuYW1lIjtzOjU6ImFkbWluIjtzOjU6ImVtYWlsIjtzOjI1OiJ3ZWJtYXN0ZXIud29yazJAZ21haWwuY29tIjtzOjg6InBhc3N3b3JkIjtzOjYwOiIkMnkkMTAkVHYxbENUTVY3bzUydGFOc0hrQUxvLmFGYUtsR3hDNTczRlk2Qi5waXlVaEdnRDluWE0ybnEiO3M6MTQ6InBhc3N3b3JkX2NsZWFyIjtzOjA6IiI7czo1OiJibG9jayI7czoxOiIwIjtzOjk6InNlbmRFbWFpbCI7czoxOiIxIjtzOjEyOiJyZWdpc3RlckRhdGUiO3M6MTk6IjIwMTYtMDQtMTQgMDk6MTc6NDciO3M6MTM6Imxhc3R2aXNpdERhdGUiO3M6MTk6IjIwMTYtMDUtMDUgMDk6MTc6MDQiO3M6MTA6ImFjdGl2YXRpb24iO3M6MToiMCI7czo2OiJwYXJhbXMiO3M6MjM6InsidXBkYXRlX2NhY2hlX2xpc3QiOjF9IjtzOjY6Imdyb3VwcyI7YToxOntpOjg7czoxOiI4Ijt9czo1OiJndWVzdCI7aTowO3M6MTM6Imxhc3RSZXNldFRpbWUiO3M6MTk6IjAwMDAtMDAtMDAgMDA6MDA6MDAiO3M6MTA6InJlc2V0Q291bnQiO3M6MToiMCI7czoxMjoicmVxdWlyZVJlc2V0IjtzOjE6IjAiO3M6MTA6IgAqAF9wYXJhbXMiO086MjQ6Ikpvb21sYVxSZWdpc3RyeVxSZWdpc3RyeSI6Mjp7czo3OiIAKgBkYXRhIjtPOjg6InN0ZENsYXNzIjoxOntzOjE3OiJ1cGRhdGVfY2FjaGVfbGlzdCI7aToxO31zOjk6InNlcGFyYXRvciI7czoxOiIuIjt9czoxNDoiACoAX2F1dGhHcm91cHMiO2E6Mjp7aTowO2k6MTtpOjE7aTo4O31zOjE0OiIAKgBfYXV0aExldmVscyI7YTo1OntpOjA7aToxO2k6MTtpOjE7aToyO2k6MjtpOjM7aTozO2k6NDtpOjY7fXM6MTU6IgAqAF9hdXRoQWN0aW9ucyI7TjtzOjEyOiIAKgBfZXJyb3JNc2ciO047czoxMzoiACoAdXNlckhlbHBlciI7TzoxODoiSlVzZXJXcmFwcGVySGVscGVyIjowOnt9czoxMDoiACoAX2Vycm9ycyI7YTowOnt9czozOiJhaWQiO2k6MDtzOjY6Im90cEtleSI7czowOiIiO3M6NDoib3RlcCI7czowOiIiO31zOjE2OiJqb21zb2NpYWxfdXNlcmlwIjtzOjE0OiI5MS4xNDQuMTc0LjIxMyI7czoxMToiYXBwbGljYXRpb24iO086ODoic3RkQ2xhc3MiOjE6e3M6NToicXVldWUiO047fX19czo5OiJzZXBhcmF0b3IiO3M6MToiLiI7fQ==\";'
	, `time` = '1462538776'
WHERE `session_id` = '1la0886g2n07g5bov7pg0a3t84'
2016-05-06T12:46:16+00:00	DEBUG 91.144.174.213	databasequery	SHOW FULL COLUMNS FROM `n1wr9_f2c_project`
2016-05-06T12:46:16+00:00	DEBUG 91.144.174.213	databasequery	SELECT *
FROM n1wr9_f2c_project
WHERE `id` = '1'
2016-05-06T12:46:16+00:00	DEBUG 91.144.174.213	databasequery	SELECT pf.*, ft.name
FROM n1wr9_f2c_projectfields pf
INNER JOIN n1wr9_f2c_fieldtype ft ON pf.fieldtypeid = ft.id
WHERE pf.projectid = 0
ORDER BY pf.ordering ASC
2016-05-06T12:46:16+00:00	DEBUG 91.144.174.213	databasequery	SELECT *
FROM n1wr9_f2c_project
WHERE `id` = '1'
2016-05-06T12:46:16+00:00	DEBUG 91.144.174.213	databasequery	SELECT pf.*, ft.name
FROM n1wr9_f2c_projectfields pf
INNER JOIN n1wr9_f2c_fieldtype ft ON pf.fieldtypeid = ft.id
WHERE pf.projectid = 0
ORDER BY pf.ordering ASC
2016-05-06T12:46:16+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:16+00:00	WARNING 91.144.174.213	deprecated	The use of formvalidation is deprecated use formvalidator instead.
2016-05-06T12:46:16+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:16+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:16+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:16+00:00	DEBUG 91.144.174.213	databasequery	SELECT e.element, e.name
FROM n1wr9_extensions as e
WHERE e.client_id = 0 AND e.type = 'template' AND e.enabled = 1
2016-05-06T12:46:16+00:00	DEBUG 91.144.174.213	databasequery	SELECT id, fieldname FROM n1wr9_f2c_projectfields WHERE fieldtypeid = 6 AND projectid = 1 ORDER BY fieldname ASC
2016-05-06T12:46:16+00:00	DEBUG 91.144.174.213	databasequery	SELECT id, fieldname FROM n1wr9_f2c_projectfields WHERE fieldtypeid = 6 AND projectid = 1 ORDER BY fieldname ASC
2016-05-06T12:46:16+00:00	DEBUG 91.144.174.213	databasequery	SELECT id, fieldname FROM n1wr9_f2c_projectfields WHERE fieldtypeid = 9 AND projectid = 1 ORDER BY fieldname ASC
2016-05-06T12:46:16+00:00	DEBUG 91.144.174.213	databasequery	SELECT id, fieldname FROM n1wr9_f2c_projectfields WHERE fieldtypeid = 9 AND projectid = 1 ORDER BY fieldname ASC
2016-05-06T12:46:16+00:00	DEBUG 91.144.174.213	databasequery	SELECT id, fieldname FROM n1wr9_f2c_projectfields WHERE fieldtypeid = 9 AND projectid = 1 ORDER BY fieldname ASC
2016-05-06T12:46:16+00:00	WARNING 91.144.174.213	deprecated	JAccess::getActions is deprecated. Use JAccess::getActionsFromFile or JAccess::getActionsFromData instead.
2016-05-06T12:46:16+00:00	DEBUG 91.144.174.213	databasequery	SELECT a.rules
FROM n1wr9_assets AS a
WHERE (a.id = 108)
GROUP BY a.id, a.rules, a.lft
2016-05-06T12:46:16+00:00	DEBUG 91.144.174.213	databasequery	SELECT a.id AS value, a.title AS text, COUNT(DISTINCT b.id) AS level, a.parent_id
FROM n1wr9_usergroups AS a
LEFT JOIN `n1wr9_usergroups` AS b ON a.lft > b.lft AND a.rgt < b.rgt
GROUP BY a.id, a.title, a.lft, a.rgt, a.parent_id
ORDER BY a.lft ASC
2016-05-06T12:46:16+00:00	DEBUG 91.144.174.213	databasequery	SELECT parent.id, parent.lft, parent.rgt
FROM n1wr9_usergroups AS parent
ORDER BY parent.lft
2016-05-06T12:46:16+00:00	DEBUG 91.144.174.213	databasequery	SELECT b.rules
FROM n1wr9_assets AS a
LEFT JOIN n1wr9_assets AS b ON b.lft <= a.lft AND b.rgt >= a.rgt
WHERE (a.id = 108)
GROUP BY b.id, b.rules, b.lft
ORDER BY b.lft
2016-05-06T12:46:17+00:00	WARNING 91.144.174.213	deprecated	JFile::getName is deprecated. Use native basename() syntax.
2016-05-06T12:46:17+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:17+00:00	DEBUG 91.144.174.213	databasequery	SELECT m.id, m.title, m.module, m.position, m.content, m.showtitle, m.params, mm.menuid
FROM n1wr9_modules AS m
LEFT JOIN n1wr9_modules_menu AS mm ON mm.moduleid = m.id
LEFT JOIN n1wr9_extensions AS e ON e.element = m.module AND e.client_id = m.client_id
WHERE m.published = 1 AND e.enabled = 1 AND (m.publish_up = '0000-00-00 00:00:00' OR m.publish_up <= '2016-05-06 12:46:17') AND (m.publish_down = '0000-00-00 00:00:00' OR m.publish_down >= '2016-05-06 12:46:17') AND m.access IN (1,1,2,3,6) AND m.client_id = 1 AND (mm.menuid = 0 OR mm.menuid <= 0)
ORDER BY m.position, m.ordering
2016-05-06T12:46:17+00:00	WARNING 91.144.174.213	deprecated	JSubMenuHelper::getEntries() is deprecated. Use JHtmlSidebar::getEntries() instead.
2016-05-06T12:46:17+00:00	WARNING 91.144.174.213	deprecated	JSubMenuHelper::getFilters() is deprecated. Use JHtmlSidebar::getFilters() instead.
2016-05-06T12:46:17+00:00	WARNING 91.144.174.213	deprecated	JSubMenuHelper::getAction() is deprecated. Use JHtmlSidebar::getAction() instead.
2016-05-06T12:46:17+00:00	DEBUG 91.144.174.213	databasequery	SELECT COUNT(*)
FROM n1wr9_messages
WHERE state = 0 AND user_id_to = 311
2016-05-06T12:46:17+00:00	DEBUG 91.144.174.213	databasequery	SELECT COUNT(session_id)
FROM n1wr9_session
WHERE guest = 0 AND client_id = 1
2016-05-06T12:46:17+00:00	DEBUG 91.144.174.213	databasequery	SELECT COUNT(session_id)
FROM n1wr9_session
WHERE guest = 0 AND client_id = 0
2016-05-06T12:46:17+00:00	DEBUG 91.144.174.213	databasequery	SELECT m.id, m.title, m.alias, m.link, m.parent_id, m.img, e.element
FROM n1wr9_menu AS m
LEFT JOIN n1wr9_extensions AS e ON m.component_id = e.extension_id
WHERE m.client_id = 1 AND e.enabled = 1 AND m.id > 1
ORDER BY m.lft
2016-05-06T12:46:17+00:00	WARNING 91.144.174.213	deprecated	JResponse is deprecated.
2016-05-06T12:46:17+00:00	WARNING 91.144.174.213	deprecated	JError::getErrors() is deprecated.
2016-05-06T12:46:17+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:17+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:17+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:17+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:17+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:17+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:17+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:17+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:17+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:17+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:17+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:17+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:17+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:17+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:17+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:17+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:17+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:17+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:17+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:17+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:17+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:17+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:17+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:17+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:17+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:17+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:27+00:00	DEBUG 91.144.174.213	databasequery	SHOW FULL COLUMNS FROM `n1wr9_f2c_project`
2016-05-06T12:46:27+00:00	WARNING 91.144.174.213	deprecated	JAccess::getActions is deprecated. Use JAccess::getActionsFromFile or JAccess::getActionsFromData instead.
2016-05-06T12:46:27+00:00	DEBUG 91.144.174.213	databasequery	SELECT *
FROM n1wr9_f2c_project
WHERE `id` = '1'
2016-05-06T12:46:27+00:00	DEBUG 91.144.174.213	databasequery	UPDATE `n1wr9_f2c_project` SET `title`='Blog articles',`created_by`='311',`created`='2016-04-19 10:00:24',`modified`='2016-05-06 12:46:27',`version`='5.5.1',`published`='1',`settings`='{\"article_caption\":\"Blog article\",\"title_front_end\":\"1\",\"title_caption\":\"Blog article title\",\"title_default\":\"\",\"title_alias_front_end\":\"1\",\"title_alias_caption\":\"\",\"frontend_templsel\":\"1\",\"intro_template\":\"default_intro_template_Blog articles.tpl\",\"main_template\":\"default_main_template_Blog articles.tpl\",\"frontend_pubsel\":\"1\",\"tags_front_end\":\"1\",\"tags_caption\":\"Add tags to your blog\",\"tag_field_ajax_mode\":\"1\",\"tags_allow_custom\":\"1\"}',`attribs`='{\"show_title\":\"\",\"link_titles\":\"\",\"show_tags\":\"\",\"show_intro\":\"0\",\"show_category\":\"\",\"link_category\":\"\",\"show_parent_category\":\"\",\"link_parent_category\":\"\",\"show_author\":\"\",\"link_author\":\"\",\"show_create_date\":\"\",\"show_modify_date\":\"\",\"show_publish_date\":\"\",\"show_item_navigation\":\"\",\"show_icons\":\"\",\"show_print_icon\":\"\",\"show_email_icon\":\"\",\"show_vote\":\"\",\"show_hits\":\"\",\"show_noauth\":\"\",\"alternative_readmore\":\"\",\"article_layout\":\"\"}',`metadata`='{\"robots\":\"\",\"author\":\"\",\"rights\":\"\",\"xreference\":\"\"}',`metakey`='',`metadesc`='',`images`='{\"image_intro\":\"\",\"imagetype_intro\":\"full\",\"float_intro\":\"\",\"image_intro_alt\":\"\",\"image_intro_caption\":\"\",\"image_fulltext\":\"\",\"imagetype_fulltext\":\"full\",\"float_fulltext\":\"\",\"image_fulltext_alt\":\"\",\"image_fulltext_caption\":\"\"}',`urls`='{\"urla\":\"\",\"urlatext\":\"\",\"targeta\":\"\",\"urlb\":\"\",\"urlbtext\":\"\",\"targetb\":\"\",\"urlc\":\"\",\"urlctext\":\"\",\"targetc\":\"\"}' WHERE `id`='1'
2016-05-06T12:46:27+00:00	DEBUG 91.144.174.213	databasequery	SHOW FULL COLUMNS FROM `n1wr9_assets`
2016-05-06T12:46:27+00:00	DEBUG 91.144.174.213	databasequery	SELECT `id`
FROM `n1wr9_assets`
WHERE `name` = 'com_form2content'
2016-05-06T12:46:27+00:00	DEBUG 91.144.174.213	databasequery	SELECT *
FROM n1wr9_assets
WHERE `id` = '107'
2016-05-06T12:46:27+00:00	DEBUG 91.144.174.213	databasequery	SELECT `id`
FROM `n1wr9_assets`
WHERE `name` = 'com_form2content.project.1'
2016-05-06T12:46:27+00:00	DEBUG 91.144.174.213	databasequery	SELECT *
FROM n1wr9_assets
WHERE `id` = '108'
2016-05-06T12:46:27+00:00	DEBUG 91.144.174.213	databasequery	SELECT COUNT(id)
FROM `n1wr9_assets`
WHERE `id` = 107
2016-05-06T12:46:27+00:00	DEBUG 91.144.174.213	databasequery	LOCK TABLES `n1wr9_assets` WRITE
2016-05-06T12:46:27+00:00	DEBUG 91.144.174.213	databasequery	UPDATE `n1wr9_assets` SET `name`='com_form2content.project.1',`title`='Blog articles',`rules`='{\"core.create\":[],\"form2content.trash\":[],\"form2content.trash.own\":[],\"core.delete\":[],\"form2content.delete.own\":[],\"core.edit\":[],\"core.edit.state\":[],\"core.edit.own\":[],\"form2content.edit.state.own\":[]}',`parent_id`='107',`level`='2',`lft`='198',`rgt`='203' WHERE `id`='108'
2016-05-06T12:46:27+00:00	DEBUG 91.144.174.213	databasequery	UNLOCK TABLES
2016-05-06T12:46:27+00:00	INFO 91.144.174.213	controller	Holding edit ID com_form2content.edit.project.1 Array (     [0] => 1 ) 
2016-05-06T12:46:27+00:00	DEBUG 91.144.174.213	databasequery	SELECT *
FROM n1wr9_f2c_project
WHERE `id` = '1'
2016-05-06T12:46:27+00:00	DEBUG 91.144.174.213	databasequery	UPDATE `n1wr9_session`
SET `data` = 'joomla|s:2744:\"TzoyNDoiSm9vbWxhXFJlZ2lzdHJ5XFJlZ2lzdHJ5IjoyOntzOjc6IgAqAGRhdGEiO086ODoic3RkQ2xhc3MiOjE6e3M6OToiX19kZWZhdWx0IjtPOjg6InN0ZENsYXNzIjo1OntzOjc6InNlc3Npb24iO086ODoic3RkQ2xhc3MiOjM6e3M6NzoiY291bnRlciI7aToxODtzOjU6InRpbWVyIjtPOjg6InN0ZENsYXNzIjozOntzOjU6InN0YXJ0IjtpOjE0NjI1Mzg2MjI7czo0OiJsYXN0IjtpOjE0NjI1Mzg3NzY7czozOiJub3ciO2k6MTQ2MjUzODc4Nzt9czo1OiJ0b2tlbiI7czozMjoiMDNjYmU1OGMyNGUyNjBlYTVlMmFjZTM5YjllNWEwYzgiO31zOjg6InJlZ2lzdHJ5IjtPOjI0OiJKb29tbGFcUmVnaXN0cnlcUmVnaXN0cnkiOjI6e3M6NzoiACoAZGF0YSI7Tzo4OiJzdGRDbGFzcyI6Mzp7czoxMToiYXBwbGljYXRpb24iO086ODoic3RkQ2xhc3MiOjE6e3M6NDoibGFuZyI7czowOiIiO31zOjEzOiJjb21faW5zdGFsbGVyIjtPOjg6InN0ZENsYXNzIjoyOntzOjc6Im1lc3NhZ2UiO3M6MDoiIjtzOjE3OiJleHRlbnNpb25fbWVzc2FnZSI7czowOiIiO31zOjE2OiJjb21fZm9ybTJjb250ZW50IjtPOjg6InN0ZENsYXNzIjoxOntzOjQ6ImVkaXQiO086ODoic3RkQ2xhc3MiOjI6e3M6NDoiZm9ybSI7Tzo4OiJzdGRDbGFzcyI6Mjp7czoyOiJpZCI7YTowOnt9czo0OiJkYXRhIjtOO31zOjc6InByb2plY3QiO086ODoic3RkQ2xhc3MiOjI6e3M6MjoiaWQiO2E6MTp7aTowO2k6MTt9czo0OiJkYXRhIjtOO319fX1zOjk6InNlcGFyYXRvciI7czoxOiIuIjt9czo0OiJ1c2VyIjtPOjU6IkpVc2VyIjoyODp7czo5OiIAKgBpc1Jvb3QiO2I6MTtzOjI6ImlkIjtzOjM6IjMxMSI7czo0OiJuYW1lIjtzOjEwOiJTdXBlciBVc2VyIjtzOjg6InVzZXJuYW1lIjtzOjU6ImFkbWluIjtzOjU6ImVtYWlsIjtzOjI1OiJ3ZWJtYXN0ZXIud29yazJAZ21haWwuY29tIjtzOjg6InBhc3N3b3JkIjtzOjYwOiIkMnkkMTAkVHYxbENUTVY3bzUydGFOc0hrQUxvLmFGYUtsR3hDNTczRlk2Qi5waXlVaEdnRDluWE0ybnEiO3M6MTQ6InBhc3N3b3JkX2NsZWFyIjtzOjA6IiI7czo1OiJibG9jayI7czoxOiIwIjtzOjk6InNlbmRFbWFpbCI7czoxOiIxIjtzOjEyOiJyZWdpc3RlckRhdGUiO3M6MTk6IjIwMTYtMDQtMTQgMDk6MTc6NDciO3M6MTM6Imxhc3R2aXNpdERhdGUiO3M6MTk6IjIwMTYtMDUtMDUgMDk6MTc6MDQiO3M6MTA6ImFjdGl2YXRpb24iO3M6MToiMCI7czo2OiJwYXJhbXMiO3M6MjM6InsidXBkYXRlX2NhY2hlX2xpc3QiOjF9IjtzOjY6Imdyb3VwcyI7YToxOntpOjg7czoxOiI4Ijt9czo1OiJndWVzdCI7aTowO3M6MTM6Imxhc3RSZXNldFRpbWUiO3M6MTk6IjAwMDAtMDAtMDAgMDA6MDA6MDAiO3M6MTA6InJlc2V0Q291bnQiO3M6MToiMCI7czoxMjoicmVxdWlyZVJlc2V0IjtzOjE6IjAiO3M6MTA6IgAqAF9wYXJhbXMiO086MjQ6Ikpvb21sYVxSZWdpc3RyeVxSZWdpc3RyeSI6Mjp7czo3OiIAKgBkYXRhIjtPOjg6InN0ZENsYXNzIjoxOntzOjE3OiJ1cGRhdGVfY2FjaGVfbGlzdCI7aToxO31zOjk6InNlcGFyYXRvciI7czoxOiIuIjt9czoxNDoiACoAX2F1dGhHcm91cHMiO2E6Mjp7aTowO2k6MTtpOjE7aTo4O31zOjE0OiIAKgBfYXV0aExldmVscyI7YTo1OntpOjA7aToxO2k6MTtpOjE7aToyO2k6MjtpOjM7aTozO2k6NDtpOjY7fXM6MTU6IgAqAF9hdXRoQWN0aW9ucyI7TjtzOjEyOiIAKgBfZXJyb3JNc2ciO047czoxMzoiACoAdXNlckhlbHBlciI7TzoxODoiSlVzZXJXcmFwcGVySGVscGVyIjowOnt9czoxMDoiACoAX2Vycm9ycyI7YTowOnt9czozOiJhaWQiO2k6MDtzOjY6Im90cEtleSI7czowOiIiO3M6NDoib3RlcCI7czowOiIiO31zOjE2OiJqb21zb2NpYWxfdXNlcmlwIjtzOjE0OiI5MS4xNDQuMTc0LjIxMyI7czoxMToiYXBwbGljYXRpb24iO086ODoic3RkQ2xhc3MiOjE6e3M6NToicXVldWUiO2E6MTp7aTowO2E6Mjp7czo3OiJtZXNzYWdlIjtzOjQzOiLQn9GD0L3QutGCINGD0YHQv9C10YjQvdC+INGB0L7RhdGA0LDQvdGR0L0uIjtzOjQ6InR5cGUiO3M6NzoibWVzc2FnZSI7fX19fX1zOjk6InNlcGFyYXRvciI7czoxOiIuIjt9\";'
	, `time` = '1462538787'
WHERE `session_id` = '1la0886g2n07g5bov7pg0a3t84'
2016-05-06T12:46:27+00:00	DEBUG 91.144.174.213	databasequery	SHOW FULL COLUMNS FROM `n1wr9_f2c_project`
2016-05-06T12:46:27+00:00	DEBUG 91.144.174.213	databasequery	SELECT *
FROM n1wr9_f2c_project
WHERE `id` = '1'
2016-05-06T12:46:27+00:00	DEBUG 91.144.174.213	databasequery	SELECT pf.*, ft.name
FROM n1wr9_f2c_projectfields pf
INNER JOIN n1wr9_f2c_fieldtype ft ON pf.fieldtypeid = ft.id
WHERE pf.projectid = 0
ORDER BY pf.ordering ASC
2016-05-06T12:46:28+00:00	DEBUG 91.144.174.213	databasequery	SELECT *
FROM n1wr9_f2c_project
WHERE `id` = '1'
2016-05-06T12:46:28+00:00	DEBUG 91.144.174.213	databasequery	SELECT pf.*, ft.name
FROM n1wr9_f2c_projectfields pf
INNER JOIN n1wr9_f2c_fieldtype ft ON pf.fieldtypeid = ft.id
WHERE pf.projectid = 0
ORDER BY pf.ordering ASC
2016-05-06T12:46:28+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:28+00:00	WARNING 91.144.174.213	deprecated	The use of formvalidation is deprecated use formvalidator instead.
2016-05-06T12:46:28+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:28+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:28+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:28+00:00	DEBUG 91.144.174.213	databasequery	SELECT e.element, e.name
FROM n1wr9_extensions as e
WHERE e.client_id = 0 AND e.type = 'template' AND e.enabled = 1
2016-05-06T12:46:28+00:00	DEBUG 91.144.174.213	databasequery	SELECT id, fieldname FROM n1wr9_f2c_projectfields WHERE fieldtypeid = 6 AND projectid = 1 ORDER BY fieldname ASC
2016-05-06T12:46:28+00:00	DEBUG 91.144.174.213	databasequery	SELECT id, fieldname FROM n1wr9_f2c_projectfields WHERE fieldtypeid = 6 AND projectid = 1 ORDER BY fieldname ASC
2016-05-06T12:46:28+00:00	DEBUG 91.144.174.213	databasequery	SELECT id, fieldname FROM n1wr9_f2c_projectfields WHERE fieldtypeid = 9 AND projectid = 1 ORDER BY fieldname ASC
2016-05-06T12:46:28+00:00	DEBUG 91.144.174.213	databasequery	SELECT id, fieldname FROM n1wr9_f2c_projectfields WHERE fieldtypeid = 9 AND projectid = 1 ORDER BY fieldname ASC
2016-05-06T12:46:28+00:00	DEBUG 91.144.174.213	databasequery	SELECT id, fieldname FROM n1wr9_f2c_projectfields WHERE fieldtypeid = 9 AND projectid = 1 ORDER BY fieldname ASC
2016-05-06T12:46:28+00:00	WARNING 91.144.174.213	deprecated	JAccess::getActions is deprecated. Use JAccess::getActionsFromFile or JAccess::getActionsFromData instead.
2016-05-06T12:46:28+00:00	DEBUG 91.144.174.213	databasequery	SELECT a.rules
FROM n1wr9_assets AS a
WHERE (a.id = 108)
GROUP BY a.id, a.rules, a.lft
2016-05-06T12:46:28+00:00	DEBUG 91.144.174.213	databasequery	SELECT a.id AS value, a.title AS text, COUNT(DISTINCT b.id) AS level, a.parent_id
FROM n1wr9_usergroups AS a
LEFT JOIN `n1wr9_usergroups` AS b ON a.lft > b.lft AND a.rgt < b.rgt
GROUP BY a.id, a.title, a.lft, a.rgt, a.parent_id
ORDER BY a.lft ASC
2016-05-06T12:46:28+00:00	DEBUG 91.144.174.213	databasequery	SELECT parent.id, parent.lft, parent.rgt
FROM n1wr9_usergroups AS parent
ORDER BY parent.lft
2016-05-06T12:46:28+00:00	DEBUG 91.144.174.213	databasequery	SELECT b.rules
FROM n1wr9_assets AS a
LEFT JOIN n1wr9_assets AS b ON b.lft <= a.lft AND b.rgt >= a.rgt
WHERE (a.id = 108)
GROUP BY b.id, b.rules, b.lft
ORDER BY b.lft
2016-05-06T12:46:28+00:00	WARNING 91.144.174.213	deprecated	JFile::getName is deprecated. Use native basename() syntax.
2016-05-06T12:46:28+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:28+00:00	DEBUG 91.144.174.213	databasequery	SELECT m.id, m.title, m.module, m.position, m.content, m.showtitle, m.params, mm.menuid
FROM n1wr9_modules AS m
LEFT JOIN n1wr9_modules_menu AS mm ON mm.moduleid = m.id
LEFT JOIN n1wr9_extensions AS e ON e.element = m.module AND e.client_id = m.client_id
WHERE m.published = 1 AND e.enabled = 1 AND (m.publish_up = '0000-00-00 00:00:00' OR m.publish_up <= '2016-05-06 12:46:28') AND (m.publish_down = '0000-00-00 00:00:00' OR m.publish_down >= '2016-05-06 12:46:28') AND m.access IN (1,1,2,3,6) AND m.client_id = 1 AND (mm.menuid = 0 OR mm.menuid <= 0)
ORDER BY m.position, m.ordering
2016-05-06T12:46:28+00:00	WARNING 91.144.174.213	deprecated	JSubMenuHelper::getEntries() is deprecated. Use JHtmlSidebar::getEntries() instead.
2016-05-06T12:46:28+00:00	WARNING 91.144.174.213	deprecated	JSubMenuHelper::getFilters() is deprecated. Use JHtmlSidebar::getFilters() instead.
2016-05-06T12:46:28+00:00	WARNING 91.144.174.213	deprecated	JSubMenuHelper::getAction() is deprecated. Use JHtmlSidebar::getAction() instead.
2016-05-06T12:46:28+00:00	DEBUG 91.144.174.213	databasequery	SELECT COUNT(*)
FROM n1wr9_messages
WHERE state = 0 AND user_id_to = 311
2016-05-06T12:46:28+00:00	DEBUG 91.144.174.213	databasequery	SELECT COUNT(session_id)
FROM n1wr9_session
WHERE guest = 0 AND client_id = 1
2016-05-06T12:46:28+00:00	DEBUG 91.144.174.213	databasequery	SELECT COUNT(session_id)
FROM n1wr9_session
WHERE guest = 0 AND client_id = 0
2016-05-06T12:46:28+00:00	DEBUG 91.144.174.213	databasequery	SELECT m.id, m.title, m.alias, m.link, m.parent_id, m.img, e.element
FROM n1wr9_menu AS m
LEFT JOIN n1wr9_extensions AS e ON m.component_id = e.extension_id
WHERE m.client_id = 1 AND e.enabled = 1 AND m.id > 1
ORDER BY m.lft
2016-05-06T12:46:28+00:00	WARNING 91.144.174.213	deprecated	JResponse is deprecated.
2016-05-06T12:46:28+00:00	WARNING 91.144.174.213	deprecated	JError::getErrors() is deprecated.
2016-05-06T12:46:28+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:28+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:28+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:28+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:28+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:28+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:28+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:28+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:28+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:28+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:28+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:28+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:28+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:28+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:28+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:28+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:28+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:28+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:28+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:28+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:28+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:28+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:28+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:28+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:28+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:28+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:28+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:56+00:00	DEBUG 91.144.174.213	databasequery	SHOW FULL COLUMNS FROM `n1wr9_f2c_project`
2016-05-06T12:46:56+00:00	WARNING 91.144.174.213	deprecated	JAccess::getActions is deprecated. Use JAccess::getActionsFromFile or JAccess::getActionsFromData instead.
2016-05-06T12:46:56+00:00	DEBUG 91.144.174.213	databasequery	SELECT *
FROM n1wr9_f2c_project
WHERE `id` = '1'
2016-05-06T12:46:56+00:00	DEBUG 91.144.174.213	databasequery	UPDATE `n1wr9_f2c_project` SET `title`='Blog articles',`created_by`='311',`created`='2016-04-19 10:00:24',`modified`='2016-05-06 12:46:56',`version`='5.5.1',`published`='1',`settings`='{\"article_caption\":\"Blog article\",\"title_front_end\":\"1\",\"title_caption\":\"Blog article title\",\"title_default\":\"\",\"title_alias_front_end\":\"1\",\"title_alias_caption\":\"\",\"frontend_templsel\":\"1\",\"intro_template\":\"default_intro_template_Blog articles.tpl\",\"main_template\":\"default_main_template_Blog articles.tpl\",\"frontend_pubsel\":\"1\",\"tags_front_end\":\"1\",\"tags_caption\":\"Add tags to your blog\",\"tag_field_ajax_mode\":\"1\",\"tags_allow_custom\":\"1\"}',`attribs`='{\"show_title\":\"\",\"link_titles\":\"1\",\"show_tags\":\"\",\"show_intro\":\"0\",\"show_category\":\"\",\"link_category\":\"\",\"show_parent_category\":\"\",\"link_parent_category\":\"\",\"show_author\":\"\",\"link_author\":\"\",\"show_create_date\":\"\",\"show_modify_date\":\"\",\"show_publish_date\":\"\",\"show_item_navigation\":\"\",\"show_icons\":\"\",\"show_print_icon\":\"\",\"show_email_icon\":\"\",\"show_vote\":\"\",\"show_hits\":\"\",\"show_noauth\":\"\",\"alternative_readmore\":\"\",\"article_layout\":\"\"}',`metadata`='{\"robots\":\"\",\"author\":\"\",\"rights\":\"\",\"xreference\":\"\"}',`metakey`='',`metadesc`='',`images`='{\"image_intro\":\"\",\"imagetype_intro\":\"full\",\"float_intro\":\"\",\"image_intro_alt\":\"\",\"image_intro_caption\":\"\",\"image_fulltext\":\"\",\"imagetype_fulltext\":\"full\",\"float_fulltext\":\"\",\"image_fulltext_alt\":\"\",\"image_fulltext_caption\":\"\"}',`urls`='{\"urla\":\"\",\"urlatext\":\"\",\"targeta\":\"\",\"urlb\":\"\",\"urlbtext\":\"\",\"targetb\":\"\",\"urlc\":\"\",\"urlctext\":\"\",\"targetc\":\"\"}' WHERE `id`='1'
2016-05-06T12:46:56+00:00	DEBUG 91.144.174.213	databasequery	SHOW FULL COLUMNS FROM `n1wr9_assets`
2016-05-06T12:46:56+00:00	DEBUG 91.144.174.213	databasequery	SELECT `id`
FROM `n1wr9_assets`
WHERE `name` = 'com_form2content'
2016-05-06T12:46:56+00:00	DEBUG 91.144.174.213	databasequery	SELECT *
FROM n1wr9_assets
WHERE `id` = '107'
2016-05-06T12:46:56+00:00	DEBUG 91.144.174.213	databasequery	SELECT `id`
FROM `n1wr9_assets`
WHERE `name` = 'com_form2content.project.1'
2016-05-06T12:46:56+00:00	DEBUG 91.144.174.213	databasequery	SELECT *
FROM n1wr9_assets
WHERE `id` = '108'
2016-05-06T12:46:56+00:00	DEBUG 91.144.174.213	databasequery	SELECT COUNT(id)
FROM `n1wr9_assets`
WHERE `id` = 107
2016-05-06T12:46:56+00:00	DEBUG 91.144.174.213	databasequery	LOCK TABLES `n1wr9_assets` WRITE
2016-05-06T12:46:56+00:00	DEBUG 91.144.174.213	databasequery	UPDATE `n1wr9_assets` SET `name`='com_form2content.project.1',`title`='Blog articles',`rules`='{\"core.create\":[],\"form2content.trash\":[],\"form2content.trash.own\":[],\"core.delete\":[],\"form2content.delete.own\":[],\"core.edit\":[],\"core.edit.state\":[],\"core.edit.own\":[],\"form2content.edit.state.own\":[]}',`parent_id`='107',`level`='2',`lft`='198',`rgt`='203' WHERE `id`='108'
2016-05-06T12:46:56+00:00	DEBUG 91.144.174.213	databasequery	UNLOCK TABLES
2016-05-06T12:46:56+00:00	INFO 91.144.174.213	controller	Holding edit ID com_form2content.edit.project.1 Array (     [0] => 1 ) 
2016-05-06T12:46:56+00:00	DEBUG 91.144.174.213	databasequery	SELECT *
FROM n1wr9_f2c_project
WHERE `id` = '1'
2016-05-06T12:46:56+00:00	DEBUG 91.144.174.213	databasequery	UPDATE `n1wr9_session`
SET `data` = 'joomla|s:2744:\"TzoyNDoiSm9vbWxhXFJlZ2lzdHJ5XFJlZ2lzdHJ5IjoyOntzOjc6IgAqAGRhdGEiO086ODoic3RkQ2xhc3MiOjE6e3M6OToiX19kZWZhdWx0IjtPOjg6InN0ZENsYXNzIjo1OntzOjc6InNlc3Npb24iO086ODoic3RkQ2xhc3MiOjM6e3M6NzoiY291bnRlciI7aToyMDtzOjU6InRpbWVyIjtPOjg6InN0ZENsYXNzIjozOntzOjU6InN0YXJ0IjtpOjE0NjI1Mzg2MjI7czo0OiJsYXN0IjtpOjE0NjI1Mzg3ODc7czozOiJub3ciO2k6MTQ2MjUzODgxNjt9czo1OiJ0b2tlbiI7czozMjoiMDNjYmU1OGMyNGUyNjBlYTVlMmFjZTM5YjllNWEwYzgiO31zOjg6InJlZ2lzdHJ5IjtPOjI0OiJKb29tbGFcUmVnaXN0cnlcUmVnaXN0cnkiOjI6e3M6NzoiACoAZGF0YSI7Tzo4OiJzdGRDbGFzcyI6Mzp7czoxMToiYXBwbGljYXRpb24iO086ODoic3RkQ2xhc3MiOjE6e3M6NDoibGFuZyI7czowOiIiO31zOjEzOiJjb21faW5zdGFsbGVyIjtPOjg6InN0ZENsYXNzIjoyOntzOjc6Im1lc3NhZ2UiO3M6MDoiIjtzOjE3OiJleHRlbnNpb25fbWVzc2FnZSI7czowOiIiO31zOjE2OiJjb21fZm9ybTJjb250ZW50IjtPOjg6InN0ZENsYXNzIjoxOntzOjQ6ImVkaXQiO086ODoic3RkQ2xhc3MiOjI6e3M6NDoiZm9ybSI7Tzo4OiJzdGRDbGFzcyI6Mjp7czoyOiJpZCI7YTowOnt9czo0OiJkYXRhIjtOO31zOjc6InByb2plY3QiO086ODoic3RkQ2xhc3MiOjI6e3M6MjoiaWQiO2E6MTp7aTowO2k6MTt9czo0OiJkYXRhIjtOO319fX1zOjk6InNlcGFyYXRvciI7czoxOiIuIjt9czo0OiJ1c2VyIjtPOjU6IkpVc2VyIjoyODp7czo5OiIAKgBpc1Jvb3QiO2I6MTtzOjI6ImlkIjtzOjM6IjMxMSI7czo0OiJuYW1lIjtzOjEwOiJTdXBlciBVc2VyIjtzOjg6InVzZXJuYW1lIjtzOjU6ImFkbWluIjtzOjU6ImVtYWlsIjtzOjI1OiJ3ZWJtYXN0ZXIud29yazJAZ21haWwuY29tIjtzOjg6InBhc3N3b3JkIjtzOjYwOiIkMnkkMTAkVHYxbENUTVY3bzUydGFOc0hrQUxvLmFGYUtsR3hDNTczRlk2Qi5waXlVaEdnRDluWE0ybnEiO3M6MTQ6InBhc3N3b3JkX2NsZWFyIjtzOjA6IiI7czo1OiJibG9jayI7czoxOiIwIjtzOjk6InNlbmRFbWFpbCI7czoxOiIxIjtzOjEyOiJyZWdpc3RlckRhdGUiO3M6MTk6IjIwMTYtMDQtMTQgMDk6MTc6NDciO3M6MTM6Imxhc3R2aXNpdERhdGUiO3M6MTk6IjIwMTYtMDUtMDUgMDk6MTc6MDQiO3M6MTA6ImFjdGl2YXRpb24iO3M6MToiMCI7czo2OiJwYXJhbXMiO3M6MjM6InsidXBkYXRlX2NhY2hlX2xpc3QiOjF9IjtzOjY6Imdyb3VwcyI7YToxOntpOjg7czoxOiI4Ijt9czo1OiJndWVzdCI7aTowO3M6MTM6Imxhc3RSZXNldFRpbWUiO3M6MTk6IjAwMDAtMDAtMDAgMDA6MDA6MDAiO3M6MTA6InJlc2V0Q291bnQiO3M6MToiMCI7czoxMjoicmVxdWlyZVJlc2V0IjtzOjE6IjAiO3M6MTA6IgAqAF9wYXJhbXMiO086MjQ6Ikpvb21sYVxSZWdpc3RyeVxSZWdpc3RyeSI6Mjp7czo3OiIAKgBkYXRhIjtPOjg6InN0ZENsYXNzIjoxOntzOjE3OiJ1cGRhdGVfY2FjaGVfbGlzdCI7aToxO31zOjk6InNlcGFyYXRvciI7czoxOiIuIjt9czoxNDoiACoAX2F1dGhHcm91cHMiO2E6Mjp7aTowO2k6MTtpOjE7aTo4O31zOjE0OiIAKgBfYXV0aExldmVscyI7YTo1OntpOjA7aToxO2k6MTtpOjE7aToyO2k6MjtpOjM7aTozO2k6NDtpOjY7fXM6MTU6IgAqAF9hdXRoQWN0aW9ucyI7TjtzOjEyOiIAKgBfZXJyb3JNc2ciO047czoxMzoiACoAdXNlckhlbHBlciI7TzoxODoiSlVzZXJXcmFwcGVySGVscGVyIjowOnt9czoxMDoiACoAX2Vycm9ycyI7YTowOnt9czozOiJhaWQiO2k6MDtzOjY6Im90cEtleSI7czowOiIiO3M6NDoib3RlcCI7czowOiIiO31zOjE2OiJqb21zb2NpYWxfdXNlcmlwIjtzOjE0OiI5MS4xNDQuMTc0LjIxMyI7czoxMToiYXBwbGljYXRpb24iO086ODoic3RkQ2xhc3MiOjE6e3M6NToicXVldWUiO2E6MTp7aTowO2E6Mjp7czo3OiJtZXNzYWdlIjtzOjQzOiLQn9GD0L3QutGCINGD0YHQv9C10YjQvdC+INGB0L7RhdGA0LDQvdGR0L0uIjtzOjQ6InR5cGUiO3M6NzoibWVzc2FnZSI7fX19fX1zOjk6InNlcGFyYXRvciI7czoxOiIuIjt9\";'
	, `time` = '1462538816'
WHERE `session_id` = '1la0886g2n07g5bov7pg0a3t84'
2016-05-06T12:46:56+00:00	DEBUG 91.144.174.213	databasequery	SHOW FULL COLUMNS FROM `n1wr9_f2c_project`
2016-05-06T12:46:56+00:00	DEBUG 91.144.174.213	databasequery	SELECT *
FROM n1wr9_f2c_project
WHERE `id` = '1'
2016-05-06T12:46:56+00:00	DEBUG 91.144.174.213	databasequery	SELECT pf.*, ft.name
FROM n1wr9_f2c_projectfields pf
INNER JOIN n1wr9_f2c_fieldtype ft ON pf.fieldtypeid = ft.id
WHERE pf.projectid = 0
ORDER BY pf.ordering ASC
2016-05-06T12:46:56+00:00	DEBUG 91.144.174.213	databasequery	SELECT *
FROM n1wr9_f2c_project
WHERE `id` = '1'
2016-05-06T12:46:56+00:00	DEBUG 91.144.174.213	databasequery	SELECT pf.*, ft.name
FROM n1wr9_f2c_projectfields pf
INNER JOIN n1wr9_f2c_fieldtype ft ON pf.fieldtypeid = ft.id
WHERE pf.projectid = 0
ORDER BY pf.ordering ASC
2016-05-06T12:46:56+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:56+00:00	WARNING 91.144.174.213	deprecated	The use of formvalidation is deprecated use formvalidator instead.
2016-05-06T12:46:56+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:56+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:56+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:56+00:00	DEBUG 91.144.174.213	databasequery	SELECT e.element, e.name
FROM n1wr9_extensions as e
WHERE e.client_id = 0 AND e.type = 'template' AND e.enabled = 1
2016-05-06T12:46:56+00:00	DEBUG 91.144.174.213	databasequery	SELECT id, fieldname FROM n1wr9_f2c_projectfields WHERE fieldtypeid = 6 AND projectid = 1 ORDER BY fieldname ASC
2016-05-06T12:46:56+00:00	DEBUG 91.144.174.213	databasequery	SELECT id, fieldname FROM n1wr9_f2c_projectfields WHERE fieldtypeid = 6 AND projectid = 1 ORDER BY fieldname ASC
2016-05-06T12:46:56+00:00	DEBUG 91.144.174.213	databasequery	SELECT id, fieldname FROM n1wr9_f2c_projectfields WHERE fieldtypeid = 9 AND projectid = 1 ORDER BY fieldname ASC
2016-05-06T12:46:56+00:00	DEBUG 91.144.174.213	databasequery	SELECT id, fieldname FROM n1wr9_f2c_projectfields WHERE fieldtypeid = 9 AND projectid = 1 ORDER BY fieldname ASC
2016-05-06T12:46:56+00:00	DEBUG 91.144.174.213	databasequery	SELECT id, fieldname FROM n1wr9_f2c_projectfields WHERE fieldtypeid = 9 AND projectid = 1 ORDER BY fieldname ASC
2016-05-06T12:46:56+00:00	WARNING 91.144.174.213	deprecated	JAccess::getActions is deprecated. Use JAccess::getActionsFromFile or JAccess::getActionsFromData instead.
2016-05-06T12:46:56+00:00	DEBUG 91.144.174.213	databasequery	SELECT a.rules
FROM n1wr9_assets AS a
WHERE (a.id = 108)
GROUP BY a.id, a.rules, a.lft
2016-05-06T12:46:56+00:00	DEBUG 91.144.174.213	databasequery	SELECT a.id AS value, a.title AS text, COUNT(DISTINCT b.id) AS level, a.parent_id
FROM n1wr9_usergroups AS a
LEFT JOIN `n1wr9_usergroups` AS b ON a.lft > b.lft AND a.rgt < b.rgt
GROUP BY a.id, a.title, a.lft, a.rgt, a.parent_id
ORDER BY a.lft ASC
2016-05-06T12:46:56+00:00	DEBUG 91.144.174.213	databasequery	SELECT parent.id, parent.lft, parent.rgt
FROM n1wr9_usergroups AS parent
ORDER BY parent.lft
2016-05-06T12:46:56+00:00	DEBUG 91.144.174.213	databasequery	SELECT b.rules
FROM n1wr9_assets AS a
LEFT JOIN n1wr9_assets AS b ON b.lft <= a.lft AND b.rgt >= a.rgt
WHERE (a.id = 108)
GROUP BY b.id, b.rules, b.lft
ORDER BY b.lft
2016-05-06T12:46:56+00:00	WARNING 91.144.174.213	deprecated	JFile::getName is deprecated. Use native basename() syntax.
2016-05-06T12:46:56+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:56+00:00	DEBUG 91.144.174.213	databasequery	SELECT m.id, m.title, m.module, m.position, m.content, m.showtitle, m.params, mm.menuid
FROM n1wr9_modules AS m
LEFT JOIN n1wr9_modules_menu AS mm ON mm.moduleid = m.id
LEFT JOIN n1wr9_extensions AS e ON e.element = m.module AND e.client_id = m.client_id
WHERE m.published = 1 AND e.enabled = 1 AND (m.publish_up = '0000-00-00 00:00:00' OR m.publish_up <= '2016-05-06 12:46:56') AND (m.publish_down = '0000-00-00 00:00:00' OR m.publish_down >= '2016-05-06 12:46:56') AND m.access IN (1,1,2,3,6) AND m.client_id = 1 AND (mm.menuid = 0 OR mm.menuid <= 0)
ORDER BY m.position, m.ordering
2016-05-06T12:46:56+00:00	WARNING 91.144.174.213	deprecated	JSubMenuHelper::getEntries() is deprecated. Use JHtmlSidebar::getEntries() instead.
2016-05-06T12:46:56+00:00	WARNING 91.144.174.213	deprecated	JSubMenuHelper::getFilters() is deprecated. Use JHtmlSidebar::getFilters() instead.
2016-05-06T12:46:56+00:00	WARNING 91.144.174.213	deprecated	JSubMenuHelper::getAction() is deprecated. Use JHtmlSidebar::getAction() instead.
2016-05-06T12:46:56+00:00	DEBUG 91.144.174.213	databasequery	SELECT COUNT(*)
FROM n1wr9_messages
WHERE state = 0 AND user_id_to = 311
2016-05-06T12:46:56+00:00	DEBUG 91.144.174.213	databasequery	SELECT COUNT(session_id)
FROM n1wr9_session
WHERE guest = 0 AND client_id = 1
2016-05-06T12:46:56+00:00	DEBUG 91.144.174.213	databasequery	SELECT COUNT(session_id)
FROM n1wr9_session
WHERE guest = 0 AND client_id = 0
2016-05-06T12:46:56+00:00	DEBUG 91.144.174.213	databasequery	SELECT m.id, m.title, m.alias, m.link, m.parent_id, m.img, e.element
FROM n1wr9_menu AS m
LEFT JOIN n1wr9_extensions AS e ON m.component_id = e.extension_id
WHERE m.client_id = 1 AND e.enabled = 1 AND m.id > 1
ORDER BY m.lft
2016-05-06T12:46:56+00:00	WARNING 91.144.174.213	deprecated	JResponse is deprecated.
2016-05-06T12:46:56+00:00	WARNING 91.144.174.213	deprecated	JError::getErrors() is deprecated.
2016-05-06T12:46:56+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:56+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:56+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:56+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:56+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:56+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:56+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:56+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:56+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:56+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:56+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:56+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:56+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:56+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:56+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:56+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:56+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:56+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:56+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:56+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:56+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:56+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:56+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:56+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:56+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:46:56+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:49:23+00:00	DEBUG 91.144.174.213	databasequery	SHOW FULL COLUMNS FROM `n1wr9_f2c_project`
2016-05-06T12:49:23+00:00	INFO 91.144.174.213	controller	Releasing edit ID com_form2content.edit.project.1 Array ( ) 
2016-05-06T12:49:23+00:00	DEBUG 91.144.174.213	databasequery	UPDATE `n1wr9_session`
SET `data` = 'joomla|s:2596:\"TzoyNDoiSm9vbWxhXFJlZ2lzdHJ5XFJlZ2lzdHJ5IjoyOntzOjc6IgAqAGRhdGEiO086ODoic3RkQ2xhc3MiOjE6e3M6OToiX19kZWZhdWx0IjtPOjg6InN0ZENsYXNzIjo1OntzOjc6InNlc3Npb24iO086ODoic3RkQ2xhc3MiOjM6e3M6NzoiY291bnRlciI7aToyMjtzOjU6InRpbWVyIjtPOjg6InN0ZENsYXNzIjozOntzOjU6InN0YXJ0IjtpOjE0NjI1Mzg2MjI7czo0OiJsYXN0IjtpOjE0NjI1Mzg4MTY7czozOiJub3ciO2k6MTQ2MjUzODk2Mzt9czo1OiJ0b2tlbiI7czozMjoiMDNjYmU1OGMyNGUyNjBlYTVlMmFjZTM5YjllNWEwYzgiO31zOjg6InJlZ2lzdHJ5IjtPOjI0OiJKb29tbGFcUmVnaXN0cnlcUmVnaXN0cnkiOjI6e3M6NzoiACoAZGF0YSI7Tzo4OiJzdGRDbGFzcyI6Mzp7czoxMToiYXBwbGljYXRpb24iO086ODoic3RkQ2xhc3MiOjE6e3M6NDoibGFuZyI7czowOiIiO31zOjEzOiJjb21faW5zdGFsbGVyIjtPOjg6InN0ZENsYXNzIjoyOntzOjc6Im1lc3NhZ2UiO3M6MDoiIjtzOjE3OiJleHRlbnNpb25fbWVzc2FnZSI7czowOiIiO31zOjE2OiJjb21fZm9ybTJjb250ZW50IjtPOjg6InN0ZENsYXNzIjoxOntzOjQ6ImVkaXQiO086ODoic3RkQ2xhc3MiOjI6e3M6NDoiZm9ybSI7Tzo4OiJzdGRDbGFzcyI6Mjp7czoyOiJpZCI7YTowOnt9czo0OiJkYXRhIjtOO31zOjc6InByb2plY3QiO086ODoic3RkQ2xhc3MiOjI6e3M6MjoiaWQiO2E6MDp7fXM6NDoiZGF0YSI7Tjt9fX19czo5OiJzZXBhcmF0b3IiO3M6MToiLiI7fXM6NDoidXNlciI7Tzo1OiJKVXNlciI6Mjg6e3M6OToiACoAaXNSb290IjtiOjE7czoyOiJpZCI7czozOiIzMTEiO3M6NDoibmFtZSI7czoxMDoiU3VwZXIgVXNlciI7czo4OiJ1c2VybmFtZSI7czo1OiJhZG1pbiI7czo1OiJlbWFpbCI7czoyNToid2VibWFzdGVyLndvcmsyQGdtYWlsLmNvbSI7czo4OiJwYXNzd29yZCI7czo2MDoiJDJ5JDEwJFR2MWxDVE1WN281MnRhTnNIa0FMby5hRmFLbEd4QzU3M0ZZNkIucGl5VWhHZ0Q5blhNMm5xIjtzOjE0OiJwYXNzd29yZF9jbGVhciI7czowOiIiO3M6NToiYmxvY2siO3M6MToiMCI7czo5OiJzZW5kRW1haWwiO3M6MToiMSI7czoxMjoicmVnaXN0ZXJEYXRlIjtzOjE5OiIyMDE2LTA0LTE0IDA5OjE3OjQ3IjtzOjEzOiJsYXN0dmlzaXREYXRlIjtzOjE5OiIyMDE2LTA1LTA1IDA5OjE3OjA0IjtzOjEwOiJhY3RpdmF0aW9uIjtzOjE6IjAiO3M6NjoicGFyYW1zIjtzOjIzOiJ7InVwZGF0ZV9jYWNoZV9saXN0IjoxfSI7czo2OiJncm91cHMiO2E6MTp7aTo4O3M6MToiOCI7fXM6NToiZ3Vlc3QiO2k6MDtzOjEzOiJsYXN0UmVzZXRUaW1lIjtzOjE5OiIwMDAwLTAwLTAwIDAwOjAwOjAwIjtzOjEwOiJyZXNldENvdW50IjtzOjE6IjAiO3M6MTI6InJlcXVpcmVSZXNldCI7czoxOiIwIjtzOjEwOiIAKgBfcGFyYW1zIjtPOjI0OiJKb29tbGFcUmVnaXN0cnlcUmVnaXN0cnkiOjI6e3M6NzoiACoAZGF0YSI7Tzo4OiJzdGRDbGFzcyI6MTp7czoxNzoidXBkYXRlX2NhY2hlX2xpc3QiO2k6MTt9czo5OiJzZXBhcmF0b3IiO3M6MToiLiI7fXM6MTQ6IgAqAF9hdXRoR3JvdXBzIjthOjI6e2k6MDtpOjE7aToxO2k6ODt9czoxNDoiACoAX2F1dGhMZXZlbHMiO2E6NTp7aTowO2k6MTtpOjE7aToxO2k6MjtpOjI7aTozO2k6MztpOjQ7aTo2O31zOjE1OiIAKgBfYXV0aEFjdGlvbnMiO047czoxMjoiACoAX2Vycm9yTXNnIjtOO3M6MTM6IgAqAHVzZXJIZWxwZXIiO086MTg6IkpVc2VyV3JhcHBlckhlbHBlciI6MDp7fXM6MTA6IgAqAF9lcnJvcnMiO2E6MDp7fXM6MzoiYWlkIjtpOjA7czo2OiJvdHBLZXkiO3M6MDoiIjtzOjQ6Im90ZXAiO3M6MDoiIjt9czoxNjoiam9tc29jaWFsX3VzZXJpcCI7czoxNDoiOTEuMTQ0LjE3NC4yMTMiO3M6MTE6ImFwcGxpY2F0aW9uIjtPOjg6InN0ZENsYXNzIjoxOntzOjU6InF1ZXVlIjtOO319fXM6OToic2VwYXJhdG9yIjtzOjE6Ii4iO30=\";'
	, `time` = '1462538963'
WHERE `session_id` = '1la0886g2n07g5bov7pg0a3t84'
2016-05-06T12:49:24+00:00	DEBUG 91.144.174.213	databasequery	SELECT COUNT(*)
FROM `n1wr9_f2c_project` AS a
LEFT JOIN `n1wr9_users` u ON a.created_by = u.id
2016-05-06T12:49:24+00:00	DEBUG 91.144.174.213	databasequery	SELECT a.*,u.name AS username
FROM `n1wr9_f2c_project` AS a
LEFT JOIN `n1wr9_users` u ON a.created_by = u.id
ORDER BY a.title asc LIMIT 0, 20
2016-05-06T12:49:24+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:49:24+00:00	WARNING 91.144.174.213	deprecated	JFile::getName is deprecated. Use native basename() syntax.
2016-05-06T12:49:24+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:49:24+00:00	DEBUG 91.144.174.213	databasequery	SELECT m.id, m.title, m.module, m.position, m.content, m.showtitle, m.params, mm.menuid
FROM n1wr9_modules AS m
LEFT JOIN n1wr9_modules_menu AS mm ON mm.moduleid = m.id
LEFT JOIN n1wr9_extensions AS e ON e.element = m.module AND e.client_id = m.client_id
WHERE m.published = 1 AND e.enabled = 1 AND (m.publish_up = '0000-00-00 00:00:00' OR m.publish_up <= '2016-05-06 12:49:24') AND (m.publish_down = '0000-00-00 00:00:00' OR m.publish_down >= '2016-05-06 12:49:24') AND m.access IN (1,1,2,3,6) AND m.client_id = 1 AND (mm.menuid = 0 OR mm.menuid <= 0)
ORDER BY m.position, m.ordering
2016-05-06T12:49:24+00:00	WARNING 91.144.174.213	deprecated	JSubMenuHelper::getEntries() is deprecated. Use JHtmlSidebar::getEntries() instead.
2016-05-06T12:49:24+00:00	WARNING 91.144.174.213	deprecated	JSubMenuHelper::getFilters() is deprecated. Use JHtmlSidebar::getFilters() instead.
2016-05-06T12:49:24+00:00	WARNING 91.144.174.213	deprecated	JSubMenuHelper::getAction() is deprecated. Use JHtmlSidebar::getAction() instead.
2016-05-06T12:49:24+00:00	DEBUG 91.144.174.213	databasequery	SELECT COUNT(*)
FROM n1wr9_messages
WHERE state = 0 AND user_id_to = 311
2016-05-06T12:49:24+00:00	DEBUG 91.144.174.213	databasequery	SELECT COUNT(session_id)
FROM n1wr9_session
WHERE guest = 0 AND client_id = 1
2016-05-06T12:49:24+00:00	DEBUG 91.144.174.213	databasequery	SELECT COUNT(session_id)
FROM n1wr9_session
WHERE guest = 0 AND client_id = 0
2016-05-06T12:49:24+00:00	DEBUG 91.144.174.213	databasequery	SELECT a.*, SUM(b.home) AS home,b.language,l.image,l.sef,l.title_native
FROM n1wr9_menu_types AS a
LEFT JOIN n1wr9_menu AS b ON b.menutype = a.menutype AND b.home != 0
LEFT JOIN n1wr9_languages AS l ON l.lang_code = language
WHERE (b.client_id = 0 OR b.client_id IS NULL)
GROUP BY a.id, a.menutype, a.description, a.title, b.menutype,b.language,l.image,l.sef,l.title_native
2016-05-06T12:49:24+00:00	DEBUG 91.144.174.213	databasequery	SELECT m.id, m.title, m.alias, m.link, m.parent_id, m.img, e.element
FROM n1wr9_menu AS m
LEFT JOIN n1wr9_extensions AS e ON m.component_id = e.extension_id
WHERE m.client_id = 1 AND e.enabled = 1 AND m.id > 1
ORDER BY m.lft
2016-05-06T12:49:24+00:00	WARNING 91.144.174.213	deprecated	JResponse is deprecated.
2016-05-06T12:49:24+00:00	WARNING 91.144.174.213	deprecated	JError::getErrors() is deprecated.
2016-05-06T12:49:24+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:49:24+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:49:24+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:49:24+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:49:24+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:49:24+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:49:24+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:49:24+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:49:24+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:49:24+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:49:24+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:49:24+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:49:24+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
2016-05-06T12:49:24+00:00	WARNING 91.144.174.213	deprecated	JHtml::getJSObject is deprecated. Use json_encode instead.
