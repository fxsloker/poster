<?php
defined('_JEXEC') or die('Restricted access');
?>

<div class="container profile-carded">
	<div class="container">
		<div class="profile-header">
			<div class="profile-pic-container">
				<a href="<?=$_SERVER['REQUEST_URI'] ?>" class="profile-pic-border">
					<img class="profile-pic" src="http://st.hzcdn.com/fimgs/d6e3f9e30706425d_8000-w173-h173-b0-p0--webmaster_work2.jpg">
				</a>
			</div>
			<img id="coverImage" class="cover-image custom-cover " src="http://st.hzcdn.com/simgs/577166a2055144ac_17-0707/home-design.jpg">
			<div class="profile-info">
				<div class="profile-title">
					<h1>
						<a class="profile-full-name" href="<?=$_SERVER['REQUEST_URI'] ?>"><?=$user[0]->username ?></a>
					</h1>
					<div class="profile-pro-reviews">
						<a href="" class="pro-review-string review-me-link">
							Получить отзывы
							<span class="more-icon"></span>
						</a>
					</div>
				</div>
			</div>
			<div class="change-cover-photo">
				<a id="changeCoverPhoto">Изменить обложку</a>
			</div>
			<div class="profile-pro-actions">
				<a href="" class="profile-action-button">Редактировать профиль</a>
				<div class="profile-view-link">
					<a href="" class="icon-wrap colorLink text-m text-dt-s">
						Посмотреть мой профиль
					</a>
				</div>
			</div>
		</div>
	</div>
	<div class="container"></div>
</div>