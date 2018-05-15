<?php

class Database extends PDO{

	public function __construct(){

		$config = require_once 'DbConfig.php';

		parent::__construct('mysql:host='.$config["host"].';dbname='.$config["database"].';charset=utf8;', $config['user'],$config['password'], [
			PDO::ATTR_EMULATE_PREPARES => false, 
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
	}


}