<?php

class Error_Code extends Controller {

	function __construct() {
		parent::__construct();
	}
	
	function index() {
		$this->view->msg = 'Ta strona nie istnieje';
		$this->view->render('error/index');
	}

}