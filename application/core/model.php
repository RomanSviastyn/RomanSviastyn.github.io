<?php
class Model
{
	protected $db;

	public function __construct()
	{
		$this->db = mysql_connect(HOST,USER,PASS);
		if(!$this->db)
		{
			exit("Помилка з’єднання з базою даних!".mysql_error());
		}
		if(!mysql_select_db(DB,$this->db))
		{
			exit("База даних не існує!".mysql_error());
		}
		mysql_query("SET NAMES 'UTF-8'");
	}

	public function create_query($query)
	{
		$result = mysql_query($query);
		if(!$result)
			return NULL;
		$row = array();
		for($i = 0; $i < mysql_num_rows($result); $i++)
		{
			$row[] = mysql_fetch_array($result,MYSQL_ASSOC);
		}
		return $row;
	}

	public function get_table($table, $search=NULL, $order_by=NULL, $direction=NULL)
	{
		$query = "SELECT * FROM ".$table;
		if(!empty($search))
		{	
			$query .= " WHERE (".$search[0]['col']." = '".$search[0]['search']."')";
			foreach($search as $item)
				$query .= " AND (".$item['col']." = '".$item['search']."')";
		}
		if(!empty($order_by))
			$query .= " ORDER BY ".$order_by." ".$direction;
		$result = mysql_query($query);
		if(!$result)
			return NULL;
		$row = array();
		for($i = 0; $i < mysql_num_rows($result); $i++)
		{
			$row[] = mysql_fetch_array($result,MYSQL_ASSOC);
		}
		return $row;
	}

	public function get_row($table, $col=NULL, $search=NULL, $col2=NULL, $search2=NULL)
	{
		$query = "SELECT * FROM ".$table;
		if(!empty($col) || !empty($search))
		{
			$query .= " WHERE ".$col." = '".$search."'";
			if(!empty($col2) || !empty($search2))
				$query .= " AND ".$col2." = '".$search2."'";
		}
		$result = mysql_query($query);
		if(!$result)
			return NULL;
		$row = mysql_fetch_array($result,MYSQL_ASSOC);
		return $row;
	}

	public function get_data()
	{
		
	}
}

?>