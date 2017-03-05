<?php
class Controller_main extends Controller
{
	function __construct()
	{
		$this->model = new Model_main();
		$this->view = new View();
		$_SESSION['title'] = "Книга скарг і пропозицій";
	}

	function action_index()
	{
		$this->view->generate('main_view.php', 'template_view.php', $this->model->get_data());
	}
}
?>