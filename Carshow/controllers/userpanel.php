<?php

class Userpanel extends Controller {

	function __construct() {
		parent::__construct();
		Session::init();
		$logged = Session::get('loggedIn');
		if($logged == false){
			Session::destroy();
			header('location: '.$url.'login');
			exit;
		}

	}

	function index() {
		$this->view->render('userpanel/index');
	}

	function settings() {
		$this->view->render('userpanel/settings');
	}

	function addOffer() {
		$this->view->render('userpanel/addOffer');
	}
	function messages() {
		$this->view->render('userpanel/messages');
	}
	function myoffer() {
		$this->view->render('userpanel/myOffers');
	}


}
