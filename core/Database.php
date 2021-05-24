<?php
namespace core;


class Database 
{
	function __construct() 
	{
		try {
			$this->conn = new \PDO("mysql:host=".DBHOST.";dbname=".DBNAME, DBUSER, DBPASS);
			$this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
		} catch (\PDOException $e) {
			echo "Connection failed: " . $e->getMessage();
		}
	}

	function get($sql){
		$stmt = $this->conn->prepare($sql);
		// $stmt->bindValue(1, 5);
		// $stmt->bindValue(2, 7);
		// $stmt->bindValue(3, 9);
		$stmt->execute();
		return ($stmt->fetchAll());
	}

	function add($sql){
		$this->conn->exec($sql);
		// $stmt->bindValue(1, 5);
		// $stmt->bindValue(2, 7);
		// $stmt->bindValue(3, 9);
		$last_id = $this->conn->lastInsertId();
		return ($last_id);
	}
}