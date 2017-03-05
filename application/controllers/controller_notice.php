<?php
class Controller_notice extends Controller
{
	public $id;
	public $data;

	function __construct()
	{
		$this->model = new Model_notice();
		$this->view = new View();
		$_SESSION['title'] = "Книга скарг і пропозицій";
	}

	function action_index()
	{
		$this->view->generate('main_view.php', 'template_view.php', $this->model->select_data_table());
	}

	function action_add()
	{
		$_SESSION['title'] = "Додати новий запис";
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			$_SESSION['error'] = "Запис НЕ додано!";
			$captcha = correctInput($_POST['user_captcha']);
			if(!empty($captcha) && shifr(strtolower($captcha)) == $_SESSION['secret_code'])
			{
				$name = correctInput($_POST['user_name']);
				$email = correctInput($_POST['user_email']);
				$website = correctInput($_POST['user_website']);
				$notice = correctInput($_POST['user_notice']);
				$this->data = array(0=>array("name"=>$name, "email"=>$email, "website"=>$website, "text"=>$notice));
				if(!empty($name) && !empty($email) && !empty($notice))
				{
					if($this->model->insert_data($name, $email, $website, $notice))
					{
						$_SESSION['error'] = "Запис додано успішно!";
						$this->data = $this->model->select_data_table();
					}
				}
			}
			else
			{
				$_SESSION['error'] = "Текст з картинки неправильний!";
			}
		}
		$this->view->generate('add_notice_view.php', 'template_view.php', $this->data);
	}

	function action_edit()
	{
		if(!is_Admin())
			DO_EXIT("main");
		$_SESSION['title'] = "Редагувати запис";
		if($_SERVER['REQUEST_METHOD'] == "GET")
		{
			$this->id = intval(correctInput($_GET['id']));
			$this->data = $this->model->select_data_row($this->id);
			if(!empty($this->id) && !empty($this->data))
				$this->view->generate('edit_notice_view.php', 'template_view.php', $this->data);
		}
		else
		{
			if($_SERVER['REQUEST_METHOD'] == "POST")
			{
				$_SESSION['error'] = "Запис НЕ редаговано!";
				$this->id = intval(correctInput($_POST['id']));
				$this->data = $this->model->select_data_table($this->id);
				if(!empty($this->id) && !empty($this->data))
				{
					$name = correctInput($_POST['user_name']);
					$email = correctInput($_POST['user_email']);
					$website = correctInput($_POST['user_website']);
					$notice = correctInput($_POST['user_notice']);
					$this->data = array(0=>array("name"=>$name,"email"=>$email,"website"=>$website,"text"=>$notice));
					if(!empty($name) && !empty($email) && !empty($notice))
					{
						if($this->model->update_data($this->id, $name, $email, $website, $notice))
						{
							$_SESSION['error'] = "Запис редаговано успішно!";
						}
					}
					DO_EXIT("notice/edit/?id=".$this->id);
				}
			}
			else
				DO_EXIT("404");
		}
	}

	function action_delete()
	{
		if(!is_Admin())
			DO_EXIT('main');
		$_SESSION['error'] = "Запис НЕ видалено!";
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			if($_POST['id'])
			{
				$this->id = intval(correctInput($_POST['id']));
				$this->data = $this->model->select_data_row($this->id);
				if(!empty($this->id) && !empty($this->data))
				{
					if($this->model->delete_data($this->id))
					{
						$_SESSION['error'] = "Запис видалено успішно!";
					}
				}
			}
		}
		DO_EXIT('admin');
	}
}
?>