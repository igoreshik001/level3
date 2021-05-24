<body>
	<center>
		<form action="/admin/adduser" method="post">
			<label for="fname">Имя: <span class="text-danger">*</span></label><br>
			<input type="text" id="name" name="name" required><br>
			<label for="lname">Пароль: <span class="text-danger">*</span></label><br>
			<input type="password" id="pass" name="pass" required><br><br>
			<input type="submit" value="Добавить">
		</form>
		{result}
	</center>
</body>
</html> 