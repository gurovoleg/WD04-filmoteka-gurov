<?php if ($addSuccess) { ?>
	<div class="notify notify--success mt-20 mb-20">Фильм добавлен</div>
<?php } ?>

<?php if ($updateSuccess) { ?>
	<div class="notify notify--update mb-20">Информация по фильму обновлена</div>
<?php } ?>

<?php if ($deleteSuccess) { ?>
	<div class="notify notify--update mb-20">Фильм удален</div>
<?php } ?>

<?php if ($errorData != "") { ?>
	<div class="notify notify--error mt-20 mb-20"><?php echo $errorData; ?></div>
<?php } ?>