<?php

class Logout extends Admin
{

	function __construct() {
		parent::__construct();	
	}
	
	function index() {
		$this->model->logOut();
		$this->view->render('login/index');
	}

	function logOut(){
		$this->model->logOut();
	}
	

}