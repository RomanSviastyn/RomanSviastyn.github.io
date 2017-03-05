<table id='table'>
	<thead>
		<tr>
			<th>Name</th>
			<th>E-mail</th>
			<th>Дата додавання</th>
			<th>Text</th>
		</tr>
	</thead>
	<tbody>
	<?php
	foreach($data as $item)
		echo "<tr>
				<td>".$item['name']."</td>
				<td>".$item['email']."</td>
				<td>".$item['date']."</td>
				<td>".$item['text']."</td>
			</tr>";
	?>
	</tbody>
</table>
<div id='pagination'></div>
<!--
<form action='add_notice' method='POST' id='captcha-form' name='captcha-form'>
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
			<td colspan='2' ><textarea name='user_notice' required='required' cols='80' placeholder='Text...' /></textarea></td>
		</tr>
		<tr>
			<td colspan='2'>Введіть текст з картинки</td>
		</tr>
		<tr>
			<td>
				<img src='../../php/captcha.php' alt='' id='captcha' />
				<img src='img/refresh.png' alt='refresh captcha' id='refresh-captcha' />
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
-->
<div class='add_notice'><a href='<?=MYLINK;?>notice/add'>Додати запис</a></div>
<!--
<script src='http://code.jquery.com/jquery.min.js'></script>
<script src='js/bootstrap.min.js'></script>
-->

<script src='<?=MYLINK;?>js/sorting.js'></script>
<script type="text/javascript">
	var sorter = new TINY.table.sorter("sorter", 5);
	sorter.head = "head";
	sorter.asc = "asc";
	sorter.desc = "desc";
	sorter.paginate = true;
	sorter.init("table",2);
</script>