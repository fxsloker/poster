<?php /* Smarty version Smarty-3.1.14, created on 2016-04-19 13:00:25
         compiled from "/var/www/hozmarket/data/www/xn--h1aaggsl.xn--p1ai/media/com_form2content/templates/blog_intro_template.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1967123194571601b9704f37-94179966%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '95676f6c349e549f7d4cad112e49343c643e8f33' => 
    array (
      0 => '/var/www/hozmarket/data/www/xn--h1aaggsl.xn--p1ai/media/com_form2content/templates/blog_intro_template.tpl',
      1 => 1461060025,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1967123194571601b9704f37-94179966',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'IMAGE' => 0,
    'ARTICLE' => 0,
    'JOOMLA_ARTICLE_LINK' => 0,
    'JOOMLA_TITLE' => 0,
    'IMAGE_THUMB_URL_RELATIVE' => 0,
    'IMAGE_ALT' => 0,
    'IMAGE_TITLE' => 0,
    'INTRO' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_571601b97615b5_09779985',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_571601b97615b5_09779985')) {function content_571601b97615b5_09779985($_smarty_tpl) {?><!--
This is the FORM2CONTENT INTRO TEMPLATE for the BLOG CONTENT TYPE 

It can be found in < root >/media/com_from2content/templates

The template shows you how you can:

1) Add HTML/CSS for your article
2) Add F2C Template Parameters (placeholders for your form data)
3) Use basic SMARTY syntax

-->
<!--block escaping so SMARTY doesn't break on use of {} tags-->
<style>
.f2c_intro_image {float:left; padding:5px;}
</style>


<div class="f2c article_intro_wrapper">
<?php if ($_smarty_tpl->tpl_vars['IMAGE']->value){?>
	<?php if ($_smarty_tpl->tpl_vars['ARTICLE']->value){?><!--check to add the read more around the image-->
    <a href="<?php echo $_smarty_tpl->tpl_vars['JOOMLA_ARTICLE_LINK']->value;?>
" target="_parent" title="<?php echo $_smarty_tpl->tpl_vars['JOOMLA_TITLE']->value;?>
">
    <?php }?>
		<img src="images/stories/<?php echo $_smarty_tpl->tpl_vars['IMAGE_THUMB_URL_RELATIVE']->value;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['IMAGE_ALT']->value;?>
" title="<?php echo $_smarty_tpl->tpl_vars['IMAGE_TITLE']->value;?>
" class="f2c_intro_image">
    <?php if ($_smarty_tpl->tpl_vars['ARTICLE']->value){?>
	</a>
    <?php }?>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['INTRO']->value){?>
	<p><?php echo $_smarty_tpl->tpl_vars['INTRO']->value;?>
</p>
<?php }?>
</div><!--article intro wrapper--><?php }} ?>