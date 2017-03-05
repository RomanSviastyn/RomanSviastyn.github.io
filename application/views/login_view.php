<form action="<?=MYLINK;?>admin/login" method="post" id="login-form">
	<table class="login">
		<tr>
			<td>Логін</td>
			<td><input type="text" name="login" required="required" maxlength='20' /></td>
		</tr>
		<tr>
			<td>Пароль</td>
			<td><input type="password" name="password" required="required" maxlength='20' /></td>
		</tr>
		<th colspan="2">
		<input type="submit" value="Увійти в кабінет" name="btn"></th>
	</table>
</form>