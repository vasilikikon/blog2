<?php 
 
 namespace App\Core;
 use PDO;
use PDOException;


class Database extends PDO {
	private static $INSTANCE;
 

	public function __construct() {
   $config = require __DIR__ . "/../../config/config.php";
   $dsn = 'mysql:host=' . $config['host'] .
           ';dbname=' . $config['dbname'] .
           ';charset=' . 'utf8' .
           ';port=' . $config['dbport'];

    try {
      parent::__construct($dsn, $config['dbuser'], $config['dbpassword']);
      } catch (PDOException $e) {
      echo "Error: ".$e->getMessage();
    }
	}

	public static function getInstance() {
		if(!self::$INSTANCE) {
			self::$INSTANCE = new self;
		}
		return self::$INSTANCE;
	}
}
 
 ?>