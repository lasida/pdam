<?php

class Setting
{
	protected $db;
	
	function __construct()
	{
		$sql = mysql_query("select * from setting where id = '1' limit 1");
		$this->db = $sql;
	}

	public function getHarga()
	{
		$val = mysql_fetch_array($this->db);
		return $val['harga_per_kubik'];
	}

	public function updateHarga($harga)
	{
		mysql_query("update setting set harga_per_kubik='$harga' where id='1'")or die (mysql_error());
		return true;
	}
}