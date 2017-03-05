<form action='<?=MYLINK;?>notice/edit' method='POST' id='captcha-form' name='captcha-form'>
<input type='hidden' name='id' value='<?=$data['id']?>'/>
	<table>
		<tr>
			<td>Ім’я</td>
			<td><input type='text' name='user_name' required='required' value='<?=$data["name"]?>' /></td>
		</tr>
		<tr>
			<td>E-mail</td>
			<td><input type='email' name='user_email' required='required' value='<?=$data["email"]?>' /></td>
		</tr>
		<tr>
			<td>Сайт</td>
			<td><input type='url' name='user_website' value='<?=$data["website"]?>' /></td>
		</tr>
		<tr>
			<td>Дата</td>
			<td><input type='url' value='<?=$data["date"]?>' disabled /></td>
		</tr>
		<tr>
			<td>Ip</td>
			<td><input type='url' value='<?=$data["ip"]?>' disabled /></td>
		</tr>
		<tr>
			<td>Браузер</td>
			<td><input type='url' value='<?=$data["browser"]?>' disabled /></td>
		</tr>
		<tr>
			<td colspan='2' >
			<textarea name='user_notice' required='required' cols='80' rows='5' placeholder='Text...'><?=$data["text"]?></textarea></td>
		</tr>
		<tr>
			<td colspan='2'><input type='submit' name='save_btn' value='Зберегти' /></td>
		</tr>
	</table>
</form>