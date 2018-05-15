<?php

class Search extends Controller {

	function __construct() {
		parent::__construct();
	}

	function index() {
		$this->view->render('search/index');
	}

	function search() {
		$this->model->search();
	}
}