<?php
	class Database{
		private $host = "localhost";
		private $user = "root";
		private $namedb = "db_lr";
		private $password ="";

		public $pdo; 

		public function __construct(){
			if (!isset($this->pdo)) {
				try {
					$link = new PDO("mysql:host=".$this->host.";dbname=".$this->namedb,$this->user, $this->password);
					$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$link->exec("SET CHARACTER set utf8");
					$this->pdo = $link;
					//echo "lolo";
				} 
				catch (PDOException $e) {
					die("Faild to Connection".$e->getMessage());
				}
			}
		}
	}
?>
