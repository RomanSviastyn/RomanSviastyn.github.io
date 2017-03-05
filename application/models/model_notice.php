<?php
class Model_notice extends Model
{
	public function insert_data($name, $email, $website=NULL, $text)
	{
		$ip = getIp();
		$browser = getBrowser();
		$query = "INSERT INTO `notice`(`name`, `email`, `website`, `date`, `text`, `ip`, `browser`) VALUES ('$name','$email','$website', NOW(),'$text','$ip','$browser')";
		return mysql_query($query);
	}

	public function update_data($id, $name, $email, $website, $notice)
	{
		$query = "UPDATE `notice` SET `name`='$name',`email`='$email',`website`='$website',`text`='$notice' WHERE `id`=$id";
		return mysql_query($query);
	}

	public function delete_data($id)
	{
		$query = "DELETE FROM `notice` WHERE `id`=$id";
		return mysql_query($query);
	}

	public function select_data_table()
	{
		return $this->get_table("notice");
	}

	public function select_data_row($id)
	{
		return $this->get_row('notice', "id", $id);
	}
}
?>