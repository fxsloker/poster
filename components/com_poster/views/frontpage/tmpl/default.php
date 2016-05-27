<?php 
defined('_JEXEC') or die('The way is shut!');
?>

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

        <div id="register-button">
            <button id="submit" type="submit" class="button">
                <?php echo JText::_('JREGISTER') ?>
            </button>
        </div>
        <?php echo JHTML::_( 'form.token' ); ?>
    </form>
</div>