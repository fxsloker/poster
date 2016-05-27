<?php /* Smarty version Smarty-3.1.14, created on 2016-04-19 13:00:25
         compiled from "/var/www/hozmarket/data/www/xn--h1aaggsl.xn--p1ai/media/com_form2content/templates/blog_main_template.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1237991600571601b97ad181-86493352%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e9e8537b7e2cb4ce69594c7c5bdcf8ea43ff99a1' => 
    array (
      0 => '/var/www/hozmarket/data/www/xn--h1aaggsl.xn--p1ai/media/com_form2content/templates/blog_main_template.tpl',
      1 => 1461060025,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1237991600571601b97ad181-86493352',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ARTICLE' => 0,
    'IMAGE' => 0,
    'IMAGE_THUMB_URL_RELATIVE' => 0,
    'IMAGE_ALT' => 0,
    'IMAGE_TITLE' => 0,
    'SOURCE' => 0,
    'SOURCE_URL' => 0,
    'SOURCE_TARGET' => 0,
    'SOURCE_TITLE' => 0,
    'SOURCE_DISPLAY' => 0,
    'AUTHOR' => 0,
    'AUTHOR_NAME' => 0,
    'JOOMLA_AUTHOR' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_571601b980f856_31986462',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_571601b980f856_31986462')) {function content_571601b980f856_31986462($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['ARTICLE']->value){?><!--If no article text, NO read more button will generate because the template will be empty! -->
<!--PLEASE REMEMBER THAT YOU CAN HIDE THE INTRO in your article by using the Joomla article setting => show intro: NO -->
	<?php if ($_smarty_tpl->tpl_vars['IMAGE']->value){?>
		<img src="images/stories/<?php echo $_smarty_tpl->tpl_vars['IMAGE_THUMB_URL_RELATIVE']->value;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['IMAGE_ALT']->value;?>
" title="<?php echo $_smarty_tpl->tpl_vars['IMAGE_TITLE']->value;?>
" class="f2c_intro_image" style="float:right; padding-left:15px;">
	<?php }?>
    <div><?php echo $_smarty_tpl->tpl_vars['ARTICLE']->value;?>
</div>
    
    <?php if ($_smarty_tpl->tpl_vars['SOURCE']->value){?>
    <p><strong>Source:</strong> <a href="<?php echo $_smarty_tpl->tpl_vars['SOURCE_URL']->value;?>
" target="<?php echo $_smarty_tpl->tpl_vars['SOURCE_TARGET']->value;?>
" title="<?php echo $_smarty_tpl->tpl_vars['SOURCE_TITLE']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['SOURCE_DISPLAY']->value;?>
</a></p>
    <?php }?>

    <?php if ($_smarty_tpl->tpl_vars['AUTHOR']->value=='custom'){?>
            <?php if ($_smarty_tpl->tpl_vars['AUTHOR_NAME']->value){?>
        <p><strong>Author:</strong> <?php echo $_smarty_tpl->tpl_vars['AUTHOR_NAME']->value;?>
</p>
            <?php }else{ ?>
            <p><strong>Author:</strong> webmaster</p>
            <?php }?>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['AUTHOR']->value=='joomla'){?>
            <p><strong>Author:</strong> <?php echo $_smarty_tpl->tpl_vars['JOOMLA_AUTHOR']->value;?>
</p>
    <?php }?>
<?php }?><?php }} ?>