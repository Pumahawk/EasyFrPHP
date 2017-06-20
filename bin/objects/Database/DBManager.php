<?php

namespace Database;

use Option\Option;

class DBManager{

	static public $dbManager;

	public $pdo;

	function __construct($config){

		$dsn = $config['type'].':dbname='.$config['database'].';host='.$config['host'];
		$user = $config['username'];
		$password = $config['password'];

		try {
			$dbh = new \PDO($dsn, $user, $password);
			$this -> pdo = $dbh;
		} catch (PDOException $e) {
			echo 'Connection failed: ' . $e->getMessage();
			$this -> pdo = false;
		}
	}

	public function makeStatic(){
		DBManager::$DBManager = $this;
	}
}
