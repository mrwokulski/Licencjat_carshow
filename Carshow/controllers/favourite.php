<?php

class Favourite extends Controller {

	function __construct() {
		parent::__construct();
	}

	function add($id){
		$this->model->add($id);
	}

	function index() {
		$this->view->offers = $this->model->getFavs(); 
		$this->view->render('favourite/index');
	}

	
}
