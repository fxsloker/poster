<?php

/**
* @package      EasyBlog
* @copyright    Copyright (C) 2010 - 2014 Stack Ideas Sdn Bhd. All rights reserved.
* @license      GNU/GPL, see LICENSE.php
* EasyBlog is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/
defined('_JEXEC') or die('Unauthorized Access');
?>
<div class="eb-composer-toolbar-set row-table" data-name="block-drop">

    <div class="col-cell cell-tight">
        <div class="eb-composer-toolbar-group row-table">
            <div class="eb-composer-toolbar-item col-cell">
                <i class="fa fa-dot-circle-o"></i>
                <span><?php echo JText::_('COM_EASYBLOG_COMPOSER_BLOCKS_DROP_DESC');?></span>
            </div>
        </div>
    </div>

    <div class="col-cell">&nbsp;</div>

    <div class="col-cell cell-tight">
        <div class="eb-composer-toolbar-group row-table">
            <div class="eb-composer-toolbar-item is-button col-cell" data-eb-blocks-cancel-drop-button>
                <i class="fa fa-close"></i>
                <span><?php echo JText::_('COM_EASYBLOG_COMPOSER_BLOCKS_CANCEL_DROP');?></span>
            </div>
        </div>
    </div>

</div>
