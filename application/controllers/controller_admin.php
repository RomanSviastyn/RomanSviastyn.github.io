<?php
session_start();
class Controller_admin extends Controller
{
	function __construct()
	{
		$this->model = new Model_admin();
		$this->view = new View();
	}

	function action_index()
	{
		if(isset($_SESSION['admin']))
		{
			$_SESSION['title'] = "Адмін-панель";
			$this->view->generate('admin_view.php', 'template_view.php', $this->model->get_data());
		}
		else
			$this->view->generate('login_view.php', 'template_view.php');
	}

	function action_login()
	{
		if(isset($_SESSION['admin']))
			DO_EXIT("admin");
		$_SESSION['title'] = "Авторизація";
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			if(isset($_POST['login']) && isset($_POST['password']))
			{
				if($this->model->get_access($_POST['login'], $_POST['password']))
					DO_EXIT("admin");
				else
					$_SESSION['error'] = "Логін чи пароль неправильний!<br />Спробуйте ще раз!";
			}
		}
		$this->view->generate('login_view.php', 'template_view.php');
	}

	function action_logout()
	{
		if(isset($_SESSION['admin'])) unset($_SESSION['admin']);
		DO_EXIT("admin/login");
	}
}
?>