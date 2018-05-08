<?php

class Admin extends Controller {

	function __construct() {
		parent::__construct();
		$this->view->onlyForAdmin();
	}
	
	function index() {				
		$this->view->users = $this->model->stats()[0];
		$this->view->offers_act = $this->model->stats()[1];
		$this->view->offers_end = $this->model->stats()[2];
		$this->view->offers_today = $this->model->stats()[3];
		$this->view->render('admin/index');			
	}

	function users() {
		$users = $this->model->users();		
		$this->view->users = $users;
		$this->view->render('admin/users');				
	}

	function settings(){
		$this->view->settings = $this->model->getSettings();
		$this->view->render('admin/settings');
	}

	function editSettings(){
		$this->model->editSettings();
	}


	function edit_user($id){
		$this->view->user = $this->model->user($id);	
		$this->view->render('admin/edit_user');		
	}

	function editUser($id){
		$this->model->editUser($id);
	}

	function banUser($id){
		$this->model->banUser($id);
	}

	function isBanned($id){
		$this->model->isBanned($id);
	}


	
	

	
}