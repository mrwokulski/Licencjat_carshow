<?php

class Logout_Model extends Model {

	function __construct() {
		parent::__construct();
	}

	public function logOut(){	

	  Session::init();
	  Session::destroy();
	  header('Location: ../index');	
	}

}