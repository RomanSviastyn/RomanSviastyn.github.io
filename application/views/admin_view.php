<table id='table' class="sortable">
	<thead>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Дата додавання</th>
			<th>Скарга</th>
			<th class='nosort' title='Редагувати'>Ред.</th>
			<th class='nosort' title='Видалити'>Вид.</th>
		</tr>
	</thead>
	<tbody>
	<?php
	if(!empty($data))
		foreach($data as $item)
			echo "<tr>
					<td>".$item['id']."</td>
					<td>".$item['name']."</td>
					<td>".$item['date']."</td>
					<td>".mb_strimwidth($item['text'], 0, 100)."</td>
					<td>
					<a href='".MYLINK."notice/edit/?id=".$item['id']."' title='Редагувати'><div id='edit_notice'></div></a>
					<!--
						<form action='".MYLINK."notice/edit' method='POST'>
							<input type='hidden' name='id' value='".$item['id']."' />
							<input type='submit' name='edit_btn' id='edit_notice' value='' title='Редагувати'/>
						</form>
					-->
					</td>
					<td>
						<form action='".MYLINK."notice/delete' method='POST'>
							<input type='hidden' name='id' value='".$item['id']."' />
							<input type='submit' name='delete_btn' id='delete_notice' value='' title='Видалити' />
						</form>
					</td>
				</tr>";
	?>
	</tbody>
</table>
<?php
	if(empty($data))
		echo "<h2><center>Немає записів!</center></h2>";
	else
	{
?>
<div id='pagination'></div>
<script src='<?=MYLINK;?>js/sorting.js'></script>
<script type='text/javascript'>
	var sorter = new TINY.table.sorter("sorter", 10);
	sorter.head = "head";
	sorter.asc = "asc";
	sorter.desc = "desc";
	sorter.paginate = true;
	sorter.init("table",2);
</script>
<?php
}?>