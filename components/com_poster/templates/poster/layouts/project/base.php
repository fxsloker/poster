<?php
defined('_JEXEC') or die();
?>
<div class="leftSideContentNarrow">
    <div class="spaceContent">
        <div class="userDetails">
            <div class="viewSpaceImage">
                <img src="<?=$images[0] ?>" id="viewImage">
            </div>
            <div style="clear:left;height:1px;"></div>
            <div class="spaceDetails">
                <h1 class="viewSpaceTitle header-1"><?=$title ?></h1>
            </div>
        </div>
    </div>
</div>
<div class="rightSideBarWide">
    <div class="r-sidebar">
        <h2 class="r-sidebar-header header-6">
            Фотографии в <?=$title ?>
        </h2>
        <div class="reloadMe rimg">
            <?php foreach ($images as $img): ?>
                <div style="width:24%;float:left;margin-right:1.3%;">
					<img src="<?=$img ?>" id="smallImg">
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>