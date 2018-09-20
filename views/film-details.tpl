<div class="title-1">Информация о фильме</div>
<div class="card mb-20">
	<!-- row -->
	<div class="row">
		<!-- col -->
		<div class="col-auto">
			<img src="<?=IMG_PATH.$film['photo'];?>" alt="<?=$film['name'];?>">
		</div>
		<!-- //col -->
		
		<!-- col -->
		<div class="col">
			<div class="card__header">
				<h4 class="title-4"> <?=$film['name'];?> </h4>
				<div class="buttons">
					<?php if ( isAdmin() ) { ?>
						<a href="edit-film.php?id=<?=$film['id'];?>" class="button button--edit">Изменить</a>
						<a href="index.php?action=delete&id=<?=$film['id'];?>" class="button button--remove">Удалить</a>
					<?php } ?>
				</div>
			</div>
			<div class="badge"> <?php echo $film['genre'];?> </div>
			<div class="badge"> <?php echo $film['year'];?> </div> 
			<p><?php echo $film['description'];?></p>
		</div>
		<!--// col -->
	</div>
	<!-- //row -->
	


</div>
