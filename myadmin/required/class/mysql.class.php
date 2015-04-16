<?php
	
	class MysqlConnect
	{
		const SERVER = "localhost";
		const USER = "root";
		const PWD = "";
		const DB = "vasesdho_sud";
		
		private $connex;
		private $tb;
		
		// instance de la classe
		private static $instance;		
		
		public function Connecter()
		{
			if($this->connex = mysql_connect(self::SERVER,self::USER,self::PWD)){
				if($this->tb = mysql_select_db(self::DB,$this->connex)){
					return true;
				}else{
					return mysql_error();
				}
			}else{
				return mysql_error();
			}
		}
		


		// Un constructeur privé ; empêche la création directe d'objet
		private function __construct() 
		{
		}

		// La méthode singleton
		public static function singleton() 
		{
			if (!isset(self::$instance)) {
				$c = __CLASS__;
				self::$instance = new $c;
				self::$instance->Connecter();
			}

			// return self::$instance;
		}


		// Prévient les utilisateurs sur le clônage de l'instance
		public function __clone()
		{
			trigger_error('Le clônage n\'est pas autorisé.', E_USER_ERROR);
		}
	}
	
	
	
?>