<?php

namespace Database;

use PDOException;

class DBManager{

    static public $PDO;
    protected $baseDirectoryLoader;

	public $pdo;

    public function getBaseDirectoryLoader()
    {
        return $this->baseDirectoryLoader;
    }
    public function setBaseDirectoryLoader($baseDirectoryLoader)
    {
        $this->baseDirectoryLoader = $baseDirectoryLoader;
    }

    function __construct($config, $queryDirectory = 'app/query'){
	    
	    $this -> baseDirectoryLoader = $queryDirectory;
	    
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
		DBManager::$PDO = $this;
	}
	static function loadQuery($query){
	    return file_get_contents($this -> baseDirectoryLoader .'/'.$query.'.sql', true);
	}
}
