<div class="card mb-20"> 
	<div class="card__header">
		<h4 class="title-4"> <?php echo $film['name'];?> </h4>
	</div>
	<div class="badge"> <?php echo $film['genre'];?> </div>
	<div class="badge"> <?php echo $film['year'];?> </div>
	<p><?php echo $film['description'];?></p>
</div>

<div class="panel-holder mt-40 mb-40">
	<div class="title-4 mt-0">Редактировать фильм</div>
	<form id="form-film-update" enctype="multipart/form-data" action="edit-film.php?id=<?php echo $film['id'];?>" method="POST">
		
		<div class="form-group">
			<label class="label">Название фильма
				<input id="film-title" class="input" name="title" type="text" value="<?php echo $film['name'];?>"/>
			</label>
		</div>
		<!-- row -->
		<div class="row">
			<!-- col -->
			<div class="col">
				<div class="form-group">
					<label class="label">Жанр
						<input class="input" name="genre" type="text" value="<?php echo $film['genre'];?>"/>
					</label>
				</div>
			</div>
			<!--// col -->
			
			<!-- col -->
			<div class="col">
				<div class="form-group">
					<label class="label">Год
						<input class="input" name="year" type="text" value="<?php echo $film['year'];?>"/>
					</label>
				</div>
			</div>
			<!--// col -->
		</div>
		<!-- row -->
		<label class="label">Описание</label>
		<textarea class="textarea mb-20" name="description"><?php echo $film['description'];?></textarea>
		
		<div class="mb-20">
			<input type="file" name="photo">
		</div>
		
		<input class="button" type="submit" name="update-Film" value="Сохранить изменения" />
	</form>
	</div>
</div>