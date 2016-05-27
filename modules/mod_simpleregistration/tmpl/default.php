<?php
/**
 * @version		  tmpl/default.php 2013-08-28 07:31:00 UTC zanardi
 * @package		  GiBi SimpleRegistration
 * @author       GiBiLogic <info@gibilogic.com>
 * @authorUrl    http://www.gibilogic.com
 * @copyright	  Copyright (C) 2011-2013 GiBiLogic snc. All rights reserved.
 * @license		  GNU/GPL v2 or later
 * @todo        add return url
 */
defined('_JEXEC') or die();
?>
<div class="registration">
	<form action="<?php echo JRoute::_($action_url) ?>" method="post" name="adminForm" id="adminForm" class="form-validate form-horizontal">
		<div class="control-group">
			<div class="control-label">
				<label class="label-left" for="email"><?php echo JText::_('JGLOBAL_EMAIL'); ?>: </label>
			</div>
			<div class="controls">
				<input type="text" name="email" id="email" class="validate-email required">
			</div>
		</div>
		<?php if( $params->get('requestpassword') ) : ?>
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
