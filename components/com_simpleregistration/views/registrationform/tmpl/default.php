<?php defined('_JEXEC') or die('The way is shut!');
/**
* @version		  $Id: views/registrationform/tmpl/default.php 2013-03-17 15:35:00Z zanardi $
* @package		  GiBi SimpleRegistration
* @author       GiBiLogic
* @authorEmail  info@gibilogic.com
* @authorUrl    http://www.gibilogic.com
* @copyright	  Copyright (C) 2011-2013 GiBiLogic snc. All rights reserved.
* @license		  GNU/GPL v2 or later
*/
?>

<?php if ( $this->params->def( 'show_page_title', 1 ) ) : ?>
	<h1 class="componentheading<?php echo $this->escape($this->params->get('pageclass_sfx','')); ?>">
		<?php echo $this->escape($this->params->get('page_title')); ?>
	</h1>
<?php endif; ?>

<div class="registration">
	<form action="<?php echo JRoute::_($this->_url."&task=save") ?>" method="post" name="adminForm" id="adminForm" class="form-validate form-horizontal">
		<div class="control-group">
			<div class="control-label">
				<label class="label-left" for="email"><?php echo JText::_('JGLOBAL_EMAIL'); ?>: </label>
			</div>
			<div class="controls">
				<input type="text" name="email" id="email" class="validate-email required">
			</div>
		</div>
		<?php if( $this->params->get('requestpassword') ) : ?>
		<div class="control-group">
			<div class="control-label">
				<label class="label-left" for="password"><?php echo JText::_('JGLOBAL_PASSWORD'); ?>: </label>
			</div>
			<div class="controls">
				<input type="password" name="password" id="password">
			</div>
		</div>
		<?php endif ?>
		<div id="register-button">
			<button id="submit" type="submit" class="button">
				<?php echo JText::_('JREGISTER') ?>
			</button>
		</div>
		<?php echo JHTML::_( 'form.token' ); ?>
	</form>
</div>