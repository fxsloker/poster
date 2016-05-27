<?php
defined('_JEXEC') or die();
?>

<form action="" method="POST">
	<?php foreach ($fields as $field): ?>
		<div>
			<?php if ($field->type == 'textarea'): ?>
				<?=$field->name ?> <br>
				<textarea name="<?=$field->name ?>"></textarea>
			<?php else: ?>
				<?=$field->name ?> <br>
				<input type="<?=$field->type  ?>" name="<?=$field->name ?>">
			<?php endif; ?>
		</div>
	<?php endforeach; ?>
	<input type="submit" value="Отправить">
</form>

