<?php

class Myoffers extends Controller {

	function __construct() {
		parent::__construct();
	}


	function index() {
		$this->view->offers = $this->model->getMyOffers(); 
		$this->view->render('myoffers/index');
	}

	
}
