<?php
    /**
     * @copyright (C) 2015 iJoomla, Inc. - All rights reserved.
     * @license GNU General Public License, version 2 (http://www.gnu.org/licenses/gpl-2.0.html)
     * @author iJoomla.com <webmaster@ijoomla.com>
     * @url https://www.jomsocial.com/license-agreement
     * The PHP code portions are distributed under the GPL license. If not otherwise stated, all images, manuals, cascading style sheets, and included JavaScript *are NOT GPL, and are released under the IJOOMLA Proprietary Use License v1.0
     * More info at https://www.jomsocial.com/license-agreement
     */

defined('_JEXEC') or die('Unauthorized Access');
$svgPath = CFactory::getPath('template://assets/icon/joms-icon.svg');
include_once $svgPath;

?>

<div class="joms-module">

<!-- simple search form -->
<form name="jsform-search-simplesearch" class="js-form" action="<?php echo CRoute::_('index.php?option=com_community&view=search&task=display') ?>"
      method="post">

    <div class="joms-form__group">
        <input type="text" class="joms-input--search" placeholder="<?php echo JText::_('MOD_COMMUNITY_MEMBERLIST_USERNAME_PLACEHOLDER') ?>" name="q" style="width:75%" />
        <span class="joms-gap--inline"></span>
        <button type="submit" class="joms-button--primary joms-button--small joms-inline--desktop">
            <svg class="joms-icon joms-icon--white" viewBox="0 0 14 20">
                <use xlink:href="<?php echo CRoute::getURI(); ?>#joms-icon-search"/>
            </svg>
        </button>
    </div>
    <div class="joms-form__group">
        <?php if (isset($postresult) && $postresult && COwnerHelper::isCommunityAdmin()) { ?>
            <a href="javascript:"
               onclick="joms_search_save();"><?php echo JText::_('COM_COMMUNITY_MEMBERLIST_SAVE_SEARCH'); ?></a>
            <script>
                joms_search_history = <?php echo empty($filterJson) ? "''" : $filterJson ?>;
                joms_search_save = function () {
                    joms.api.searchSave({
                        keys: '<?php echo $keyList ?>',
                        json: joms_search_history,
                        operator: joms.jQuery('[name=operator]:checked').val(),
                        avatar_only: joms.jQuery('[name=avatar]')[0].checked
                    });
                };
            </script>
        <?php } ?>
    </div>

</form>


</div>
