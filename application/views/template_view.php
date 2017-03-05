<!DOCTYPE html>
<html lang='rus'>
<head>
	<meta charset='UTF-8'>
	<meta http-equiv='X-UA-Compatible' content='IE=edge'>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
	<meta name="author" content="Roman Sviastyn">
	<?php
	echo "
	<title>".$_SESSION['title']."</title>
	<!--<link href='".MYLINK."css/bootstrap.min.css' rel='stylesheet'> -->
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	  <script src='https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js'></script>
	  <script src='https://oss.maxcdn.com/respond/1.4.2/respond.min.js'></script>
	<![endif]-->
	<link rel='stylesheet' href='".MYLINK."css/reset.css'>
	<link rel='stylesheet' href='".MYLINK."css/main.css'>
	<link rel='shortcut icon' href='".MYLINK."img/book.ico' type='image/x-icon' />
	<script src='".MYLINK."js/jquery-3.1.1.min.js'></script>
	";
	?>
</head>
<body>
	<header>
		<div class="container">
			<h1><?=$_SESSION['title']?></h1>
		</div>
	</header>
	<nav>
		<div class="container">
			<ul>
				<?php
				echo"
					<li><a href='".MYLINK."'>Головна</a></li>
					<li><a href='".MYLINK."notice/add'>Додати запис</a></li>";
					if(is_Admin())
						echo "<li><a href='".MYLINK."admin'>Адмін-панель</a></li><li><a href='".MYLINK."admin/logout'>Вийти</a></li>";
					else
						echo "<li><a href='".MYLINK."admin/login'>Авторизація</a></li>";
				?>
			</ul>
		</div>
	</nav>
	<div class="content">
		<div class="container">
	<?php include 'application/views/'.$content_view;?>
		</div>
	</div>
	<footer>
		<div class='container'>
			<ul>
			<?php
			echo"
				<li><a href='".MYLINK."'>Головна</a></li>
				<li><a href='".MYLINK."notice/add'>Додати запис</a></li>";
				if(is_Admin())
					echo "<li><a href='".MYLINK."admin'>Адмін-панель</a></li><li><a href='".MYLINK."admin/logout'>Вийти</a></li>";
				else
					echo "<li><a href='".MYLINK."admin/login'>Авторизація</a></li>";
			?>
			</ul>
			<div class='copyright'>&copy; 2017 Львів by <a href="https://vk.com/roman_svyastyn" target="_blank" title='Автор'>Roman Sviastyn</a></div>
		</div>
	</footer>
<script src='<?=MYLINK;?>js/main.js'></script>
</body>
</html>