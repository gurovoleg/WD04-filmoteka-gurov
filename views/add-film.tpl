<div class="panel-holder mb-40">
	<div class="title-3 mt-0">Добавить фильм</div>
	<form id="form-film-add" enctype="multipart/form-data" action="add-film.php" method="POST">
		<!-- добавляем скрытый инпут с атрибутом id формы, чтобы понять с какой формы пришел запрос -->
		<!-- можно так же делать через кнопку, но первый вариант работает если форма передается просто по submit -->
		<input type="hidden" name ="form-film-add">
		
		<div class="notify notify--error display-none mb-20">Необходимо заполнить все поля!</div>
		
		<div class="form-group">
			<label class="label">Название фильма
				<input id="film-title" class="input" name="title" type="text" placeholder="Такси 2" />
			</label>
		</div>
		
		<div class="row">
			<div class="col">
				<div class="form-group">
					<label class="label">Жанр
						<input class="input" name="genre" type="text" placeholder="комедия" />
					</label>
				</div>
			</div>
			<div class="col">
				<div class="form-group">
					<label class="label">Год
						<input class="input" name="year" type="text" placeholder="2000" />
					</label>
				</div>
			</div>
		</div>
		<textarea class="textarea mb-20" name="description" placeholder="Добавьте описание фильма"></textarea>
		<div class="mb-20">
			<input type="file" name="photo">
		</div>
		<input class="button" type="submit" name="add-newFilm" value="Добавить" />
	</form>
	</div>
</div>