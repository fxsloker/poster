<?php
defined('_JEXEC') or die();
?>

<div class="browsePhotos">
	<div class="headerContainer">
		<h1 class="header-1">Фото: <?=$categoryName ?></h1> 
	</div>
</div>

<div class="browseSpacesContext">
	<?php foreach ($projects as $project): ?>
		<div class="content-row">
			<div class="portrait whiteCard">
				<div class="photo">
					<div class="imageArea">
						<img src="<?=$project->image ?>">
					</div>
				</div>
				<div class="photoMeta">
					<div class="uploader">
						
					</div>
					<div class="photoInfo">
						<a href="/?option=com_poster&view=project&project_id=<?=$project->id ?>"><?=$project->title ?></a>
						<div class="photo-description">
							<?=$project->content ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
</div>