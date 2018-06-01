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
		$this->view->users = $this->model->users();
		$this->view->render('admin/users');				
	}


	function offers() {
		$this->view->offers = $this->model->offers();		
		$this->view->render('admin/offers');				
	}

	function category() {
		$this->view->category = $this->model->getCategory();		
		$this->view->render('admin/category');				
	}

	function newCategory() {			
		$this->view->render('admin/add_category');				
	}

	function editCategory($id){
		$this->view->category = $this->model->category($id);	
		$this->view->render('admin/edit_category');
	}

	function saveCategory($id){
		$this->model->editCategory($id);		
	}

	function addCategory() {			
		$this->model->newCategory();			
	}

	function archive() {
		$this->view->offers = $this->model->endedOffers();		
		$this->view->render('admin/archive');				
	}

	function settings(){
		$this->view->settings = $this->model->getSettings();
		$this->view->render('admin/settings');
	}

	function closeOffer($id){
		$this->model->closeOffer($id);
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