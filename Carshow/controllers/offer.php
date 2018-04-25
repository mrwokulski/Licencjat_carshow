<?php

class Offer extends Controller {

	function __construct() {
		parent::__construct();	
	}
	
	function index() {		
		$this->view->render('offer/1/index');
	}

	function show($key) {		
		$this->view->render("offer/$key/index");
	}

	function getOffer($key) {
		$this->model->getOffer($key);
	}


}