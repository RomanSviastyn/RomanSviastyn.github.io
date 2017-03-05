<form action='<?=MYLINK;?>notice/add' method='POST' id='captcha-form' name='captcha-form'>
	<table>
		<tr>
			<td>Ім’я</td>
			<td><input type='text' name='user_name' required='required' /></td>
		</tr>
		<tr>
			<td>E-mail</td>
			<td><input type='email' name='user_email' required='required' /></td>
		</tr>
		<tr>
			<td>Сайт</td>
			<td><input type='url' name='user_website' /></td>
		</tr>
		<tr>
			<td colspan='2' ><textarea name='user_notice' required='required' cols='80' rows='8' placeholder='Text...' /></textarea></td>
		</tr>
		<tr>
			<td colspan='2'>Введіть текст з картинки</td>
		</tr>
		<tr>
			<td>
				<img src='<?=MYLINK;?>php/captcha.php' alt='' id='captcha' />
				<img src='<?=MYLINK;?>img/refresh.png' alt='refresh captcha' id='refresh-captcha' />
			</td>
			<td>
				<input name='user_captcha' type='text' required='required' maxlength='6' />
			</td>
		</tr>
		<tr>
			<td colspan='2'><input type='submit' value='Надіслати' /></td>
		</tr>
	</table>
</form>