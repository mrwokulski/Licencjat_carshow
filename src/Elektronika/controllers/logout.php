<?php

class Logout extends Controller
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