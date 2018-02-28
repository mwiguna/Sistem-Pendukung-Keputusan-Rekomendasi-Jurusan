<?php

class Config {
	private static $_instance = null;

	/* Database Configuration [ MySql ]
	*
	* This is configuration of your database connection
	* Please Complete this part
	*
	*/

	public function dbConfig(){
	    $this->host  = "localhost";
	    $this->db    = "tugas_spk";
	    $this->user  = "root";
	    $this->pass  = "";
	    return $this;
	}

 	/* Auth Configuration
 	*
 	* tableUser is the name of your table which become auth
 	* fieldId is the field which is Primary Key of tableUser
 	* whereId is the name of Session which is your declare when you are login,
 	* and whereId will become index of fieldId as well.
 	*
 	*/

	public function authConfig(){

		$this->tableUser = 'users';
		$this->fieldId   = 'id';
		$this->whereId   = $_SESSION['id'];
		return $this;

	}


	// ------------------------------------------------------------- //
	

	/*
	* The Configuration has finished.
	*
	* If you need help you can call us.
	*
	* If you found some bugs you can report to us as well.
	*
	* Documentation :
	* https://mwiguna.github.io/delavix
	*
	* Github :
	* https//github.com/mwiguna/delavix
	*
	*
	* Delavix PHP Framework
	* Copyright (c) 2016 - 2017 Delavix
	* Author : M. Wiguna Saputra
	*
	*
	*/

	public static function getInstance(){
    	if(!isset(self::$_instance)) self::$_instance = new Config();
    	return self::$_instance;
 	}

}