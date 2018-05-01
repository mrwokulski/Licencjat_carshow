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

	function sendMessage($id) {
		$this->model->sendMessage($id);
	}

	function unreadMessage($id1) {
		$this->model->unreadMessage($id1);
	}
	function unreadMessages() {
		$this->model->unreadMessages();
	}

	

	function message($id_1, $id_2){
		$this->view->messageAuthor = $this->model->messageAuthor($id_1,$id_2);
		$this->view->message = $this->model->message($id_1, $id_2);
		$this->view->idOne = $id_1;
		$this->view->idTwo = $id_2;
		$this->view->render('userpanel/message');
	}

	function myoffer() {
		$this->view->render('userpanel/myOffers');
	}


}
