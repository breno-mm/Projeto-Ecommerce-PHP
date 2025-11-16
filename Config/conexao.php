<?php

class Conexao {

	public static $instance;
	public function __construct(){}

	public static function getinstance(){
		if(!isset(self::$instance))
		{
			try{
				self::$instance = new PDO(
				"mysql:host=mysqldb;dbname=ecommerce",
				"root",
				"root123",
				array(PDO::ATTR_PERSISTENT => true));
			
			}catch (PDOException $e) {
				print("Erro de conexão com o banco de dados!!!");
				echo '<p>'.$e->getMessage().'</p>';
			}
		}

		return self::$instance;
	}
}