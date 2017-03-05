<?php

class Controller_404 extends Controller
{
	function action_index()
	{
		$_SESSION['title'] = "ERROR 404: Сторінку не знайдено";
		$this->view->generate('404_view.php', 'template_view.php');
	}
}
?>
