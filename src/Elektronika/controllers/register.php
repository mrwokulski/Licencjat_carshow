<?php

class Register extends Controller {

	function __construct() {
		parent::__construct();	
	}
	
	function index() {
		$this->view->render('register/index');
	}

	function newAccount(){
		$this->model->newAccount();
	}
	

}