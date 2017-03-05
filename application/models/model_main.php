<?php
class Model_main extends Model
{
	public function get_data()
	{
		return $this->get_table("notice", NULL, "date", "DESC");
	}
}
?>