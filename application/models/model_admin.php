<?php
class Model_admin extends Model
{
	public function get_data()
	{
		return $this->get_table('notice');
	}

	public function get_access($login, $password)
	{
		$login = correctInput($login);
		$password = shifr(correctInput($password));
		$row = $this->get_row("users", "login", $login, "pass", $password);
		if(!empty($row))
		{
			$_SESSION['admin'] = $login;
			return true;
		}
		return false;
	}
}
?>
