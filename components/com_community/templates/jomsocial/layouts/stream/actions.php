<?php
/**
 * @copyright (C) 2013 iJoomla, Inc. - All rights reserved.
 * @license GNU General Public License, version 2 (http://www.gnu.org/licenses/gpl-2.0.html)
 * @author iJoomla.com <webmaster@ijoomla.com>
 * @url https://www.jomsocial.com/license-agreement
 * The PHP code portions are distributed under the GPL license. If not otherwise stated, all images, manuals, cascading style sheets, and included JavaScript *are NOT GPL, and are released under the IJOOMLA Proprietary Use License v1.0
 * More info at https://www.jomsocial.com/license-agreement
 */
defined('_JEXEC') or die();
?>

<?php if ($allowComment || $allowLike || $showLike) { ?>
<div class="joms-stream__status--mobile">

<?php if ($allowLike || $showLike) { ?>
<?php if ($act->likeCount > 0 && $showLike) { ?>

    <a href="javascript:" onclick="joms.api.streamShowLikes('<?php echo $act->id; ?>', 'popup');">
        <span class="joms-like__counter--<?php echo $act->id; ?>"><?php echo $act->likeCount; ?></span>
        <svg viewBox="0 0 16 16" class="joms-icon">
            <use xlink:href="<?php echo CRoute::getURI(); ?>#joms-icon-thumbs-up"></use>
        </svg>
    </a>

<?php } ?>
<?php } ?>

<?php if ($allowComment) { ?>

    <a href="javascript:" onclick="joms.api.streamShowComments('<?php echo $act->id; ?>');">
        <span class="joms-comment__counter--<?php echo $act->id; ?>"><?php echo $act->commentCount; ?></span>
        <svg viewBox="0 0 16 16" class="joms-icon">
            <use xlink:href="<?php echo CRoute::getURI(); ?>#joms-icon-bubble"></use>
        </svg>
    </a>

<?php } ?>

</div>
<?php } ?>

<div class="joms-stream__actions">

    <!-- liked -->
    <?php if ($allowLike) { ?>
        <?php $userLiked = $act->userLiked == COMMUNITY_LIKE; ?>
        <a href="javascript:"
            class="joms-button--liked<?php echo $userLiked ? ' liked' : '' ?>"
            data-lang-like="<?php echo JText::_('COM_COMMUNITY_LIKE'); ?>"
            data-lang-unlike="<?php echo JText::_('COM_COMMUNITY_UNLIKE'); ?>"
            onclick="joms.api.stream<?php echo $userLiked ? 'Unlike' : 'Like' ?>('<?php echo $act->id; ?>');">
            <svg viewBox="0 0 16 16" class="joms-icon">
                <use xlink:href="<?php echo CRoute::getURI(); ?>#joms-icon-thumbs-<?php echo $userLiked ? 'down' : 'up' ?>"></use>
            </svg>
            <span><?php echo JText::_($userLiked ? 'COM_COMMUNITY_UNLIKE' : 'COM_COMMUNITY_LIKE'); ?></span>
        </a>
    <?php } ?>

    <!-- share -->
    <?php
    if ($my->id > 0 && $my->id != $act->actor && ( ($act->access == 0 || $act->access == 10) && ($act->group_access == 0 && $act->event_access == 0)) && $act->app != 'groups.bulletin'
        && $act->app != 'cover.upload' && strpos($act->app,'comment') === false && strpos($act->app,'featured') === false && $act->app != 'groups.discussion.reply') {
        ?>

    <?php

        // Re-share shared stream will share the original stream.
        $shareId = $act->id;
        if ( $act->app == 'profile.status.share' ) {
            $shareId = $act->params->get('activityId');
        }

    ?>

    <a class="joms-button--share" href="javascript:" onclick="joms.api.streamShare('<?php echo $shareId; ?>');">
        <svg viewBox="0 0 16 16" class="joms-icon">
            <use xlink:href="<?php echo CRoute::getURI(); ?>#joms-icon-redo"></use>
        </svg>
        <span><?php echo JText::_('COM_COMMUNITY_SHARE'); ?></span>
    </a>

    <?php } ?>

</div>

<?php if ($allowLike || $showLike) { ?>
<?php if ($act->likeCount > 0 && $showLike) { ?>

<div class="joms-stream__status">
    <a href="javascript:" onclick="joms.api.streamShowLikes('<?php echo $act->id; ?>');"><?php
        echo ($act->likeCount > 1)
            ? JText::sprintf('COM_COMMUNITY_LIKE_THIS_MANY', $act->likeCount)
            : JText::sprintf('COM_COMMUNITY_LIKE_THIS', $act->likeCount);
    ?></a>
</div>

<?php } ?>
<?php } ?>
