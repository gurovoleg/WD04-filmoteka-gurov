<div class="title-1">Фильмотека</div>
		
<?php while ($row = mysqli_fetch_array($result)) {?>

	<div class="card mb-20">
		<div class="row">
			<div class="col-auto">
				<img src="<?=IMG_PATH_MIN.$row['photo'];?>" alt="<?=$row['name'];?>">
			</div>

			<div class="col">
				<div class="card__header">
					<h4 class="title-4"> <?=$row['name'];?> </h4>
					<div class="buttons">
						<?php if ( isAdmin() ) { ?>
							<a href="edit-film.php?id=<?=$row['id'];?>" class="button button--edit">Изменить</a>
							<a href="?action=delete&id=<?=$row['id'];?>" class="button button--remove">Удалить</a>
						<?php } ?>
					</div>
				</div>
				<div class="badge"> <?php echo $row['genre'];?> </div>
				<div class="badge"> <?php echo $row['year'];?> </div>
				<div class="mt-20">
					<a href="film-details.php?id=<?=$row['id'];?>" class="button">Подробнее</a>
				</div>
			</div>
		</div>
	</div>

<?php } ?>