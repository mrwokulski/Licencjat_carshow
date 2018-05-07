<?php

class Userpanel extends Controller {

	function __construct() {
		parent::__construct();		
		$this->view->onlyForLogged();
	}	

	function index() {
		$this->view->data = $this->model->userData();
		$this->view->render('userpanel/settings');
	}

	function settings() {
		$this->view->data = $this->model->userData();
		$this->view->render('userpanel/settings');
	}

	function addOffer() {
		$this->view->render('userpanel/addOffer');
	}

	function messages() {
		$this->view->messages = $this->model->showMessagesUnread();
		$this->view->messagesRead = $this->model->showMessagesRead();
		$this->view->render('userpanel/messages');
	}

	function change($type) {		

		if($type == "password"){
			$this->view->type = "password";	
		} 
		else if($type == "email"){
			$this->view->type = "email";			
		}
		else if($type == "phone"){
			$this->view->type = "phone";
		} 
		else if($type == "personal"){
			$this->view->data = $this->model->userData();
			$this->view->type = "personal";
		} 
		else {
			$this->settings();
			exit;
		}

	$this->view->render('userpanel/change');

	}

	function changePost($type) {
		if($type == "password")
			$this->model->changePassword();
		else if($type == "email")
			$this->model->changeEmail();
		else if($type == "phone")
			$this->model->changePhone();
		else if($type == "personal")
			$this->model->changePersonal();
		else 
			$this->settings();		

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
