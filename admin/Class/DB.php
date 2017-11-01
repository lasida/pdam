<?php

class DB
{
	protected $db;

	function __construct($table)
	{
		$this->db = $table;
	}

	public function getAll()
	{
		$sql = mysql_query("SELECT * FROM $this->db");
		return $sql;
	}

	public function count()
	{
		$q = mysql_query("SELECT COUNT(*) FROM $this->db");
		$sql = mysql_result($q, 0);
		return $sql;
	}

	public function getOne($field,$term)
	{
		$sql = mysql_query("SELECT * FROM $this->db WHERE $field = '$term'");
		return $sql;
	}
}