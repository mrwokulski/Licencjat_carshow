<?php

class Logout_Model extends Model {

	function __construct() {
		parent::__construct();
        Session::init();
	}

	public function logOut()
    {
        Session::set('log', false);
        Session::destroy();
	    header('Location: '.URL);
	}

}