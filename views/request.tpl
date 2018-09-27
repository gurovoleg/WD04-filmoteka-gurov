<div class="panel-holder mb-40">
	<div class="title-3 mt-0">Информация о пользователе</div>
	<form action="set-cookie.php" method="POST">
		
		<div class="form-group">
			<label class="label">Имя
				<input class="input" name="user-name" type="text"/>
			</label>
		</div>

		<div class="form-group">
			<label class="label">Город
				<input class="input" name="user-city" type="text"/>
			</label>
		</div>
		
		<input class="button mr-10" type="submit" name="add-user-info" value="Сохранить" />
		<input class="button button--remove" type="submit" name="delete-user-info" value="Удалить сохраненные данные" />
	</form>
	</div>
</div>