<?php

class Offer extends Controller {

	function __construct() {
		parent::__construct();	
	}
	
	function index() {		
		$this->view->render('offer/top');
	}

	function show($key) {		
		$this->view->renderOffer($key);
	}

	function getOffer($key) {
		$this->model->getOffer($key);
	}


}